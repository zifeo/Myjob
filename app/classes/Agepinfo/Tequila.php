<?php namespace Agepinfo;

//==========================================================================
//! Tequila authentification server class file for laravel
//  Based on https://tequila.epfl.ch/download/2.0/docs/writing-clients.pdf
//  Config file is in the config folder
//==========================================================================

final class Tequila {

	const CREATE_PATH = '/cgi-bin/tequila/createrequest';
	const AUTH_PATH   = '/cgi-bin/tequila/requestauth';
	const FETCH_PATCH = '/cgi-bin/tequila/fetchattributes';
    
    // check whether the user is logged in (basic auth + tequila auth) or not
    public static function check() {
        return \Auth::check() || self::checkTequila();
    }

	// check whether the user is a guest or not
    public static function guest() {
	    return !self::check();
    }
    
    // return the tequila authentication url after creating a request
    public static function url() {
	    
	    if (\Session::has('tequila'))
	    	return \Config::get('tequila.host') . self::AUTH_PATH . '?requestkey=' . \Session::get('tequila');
	    	
	    $response = self::createRequest();
	    \Session::put('tequila', $response['key']);
	    return \Config::get('tequila.host') . self::AUTH_PATH . '?requestkey=' . $response['key'];
    }
    
    // create a authentification request
    private static function createRequest() {

    	$host = \Config::get('tequila.host') . self::CREATE_PATH;
        $data = array(	'urlaccess'	=> \URL::current(),
            			'service'   => \Config::get('tequila.service'),
						'request' 	=> \Config::get('tequila.request'),
						'require' 	=> \Config::get('tequila.require'),
						'allows' 	=> \Config::get('tequila.allows'));

        return self::post($host, $data);
    }
	
	// check if the user is authentificated through tequila
	private static function checkTequila() {
		
		if (\Input::has('key') && \Session::get('tequila') == trim(\Input::get('key'))) {

			$host = \Config::get('tequila.host') . self::FETCH_PATCH;			

			$data = array('key' => \Session::get('tequila'));
			$reponse = self::post($host, $data);
						
			if (is_numeric($reponse['uniqueid']))
				return $reponse;

	       	/*$u = User::firstOrCreate($user);
			Auth::loginUsingId($u->id);*/
			
		}
		return false;
	}

	// curl post request with an associative array
    private static function post($url, $data) {
    
        $response = array();
    	$curl = curl_init($url);
    	$data = urldecode(http_build_query($data, '', "\n"));
        curl_setopt_array($curl, array(	CURLOPT_POST 			=> true, 
        								CURLOPT_POSTFIELDS 		=> $data,
										CURLOPT_URL 			=> $url,
										CURLOPT_RETURNTRANSFER 	=> true, 
										CURLOPT_PROTOCOLS 		=> CURLPROTO_HTTPS, 
										CURLOPT_SSL_VERIFYPEER 	=> true,
										CURLOPT_HEADER 			=> false));      
		$output = curl_exec($curl);
		parse_str(strtr($output, "\n", '&'), $response);
		$response['httpCode'] = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                
        if ($output === false)
        	\Log::error(curl_error($curl));
        
        if ($response['httpCode'] != 200)
        	\Log::error('invalid curl request header code : '. $response['httpCode']);
        	
        curl_close($curl);
		return $response;
    }
}