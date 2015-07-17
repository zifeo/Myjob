<?php 
	
namespace Agepinfo;
use Session, Config, Log, Input, Auth, URL, User, Redirect, App;

//==========================================================================
//! Tequila authentification server class file for laravel
//  Based on https://tequila.epfl.ch/download/2.0/docs/writing-clients.pdf
//  Config file is in the config folder
//==========================================================================

final class Tequila {
	
	const CREATE_PATH = '/cgi-bin/tequila/createrequest';
	const AUTH_PATH   = '/cgi-bin/tequila/requestauth';
	const FETCH_PATCH = '/cgi-bin/tequila/fetchattributes';

	// check if the user is authentificated through tequila
	public static function auth() {
				
		if (Input::has('key') && Session::has('tequila') && Session::get('tequila') == Input::get('key')) {

			$host = Config::get('tequila.host') . self::FETCH_PATCH;			

			$data = ['key' => Session::get('tequila')];
			$reponse = self::post($host, $data);

	       	$u = User::sciperOrCreate($reponse["uniqueid"]);
	       	
	       	$u->email = $reponse["email"];
	       	$u->first_name = $reponse["firstname"];
	       	$u->last_name = $reponse["name"];
	       	$u->save();

			Auth::login($u);
			return Redirect::to(URL::route('ad.index'));
		}

		return Redirect::to(self::requestUrl());
	}
    
    // return the tequila authentication url after creating a request
    private static function requestUrl() {
	    
	    if (Session::has('tequila')) {
		    Log::error("invalid tequila token");
		    App::abort(500);
	    }
	   
	    $response = self::createRequest();
	    Session::put('tequila', $response['key']);
	    
	    return Config::get('tequila.host') . self::AUTH_PATH . '?requestkey=' . $response['key'];
    }
    
    // create a authentification request
    private static function createRequest() {

    	$host = Config::get('tequila.host') . self::CREATE_PATH;

        $data = [
        	'urlaccess'		=> URL::current(),
            'service'   	=> Config::get('tequila.service'),
			'request' 		=> Config::get('tequila.request'),
			'require' 		=> Config::get('tequila.require'),
			'allows' 		=> Config::get('tequila.allows')
		];

        return self::post($host, $data);
    }

	// curl post request with an associative array
    private static function post($url, $data) {
    
        $response = [];
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
        	Log::error(curl_error($curl));
        
        if ($response['httpCode'] != 200)
        	Log::error('invalid curl request header code : '. $response['httpCode']);
        	
        curl_close($curl);
		return $response;
    }
}