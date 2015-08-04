<?php
	
namespace Myjob\Http\Controllers;

use Myjob\Models\Ad;
use Myjob\Models\Category;
use Log;

class ModerationController extends Controller {
	
    /**
    * Display the moderation panel, with the Ads to be moderated
    */
    public function adsToModerate() {
        $ads_to_moderate = Ad::whereNull('validated_at')->get();

        return view('ads.moderation', ['ads_to_moderate' => $ads_to_moderate, 'category_names' => Category::get_id_name_mapping()]);
    }

	    
    public function accept($url) {
	    return $this->validation($url, true);
    }
    
    public function refuse($url) {
	    return $this->validation($url, false);
    }
    
    public function enable($url) {
	    return $this->expiration($url, formatDate(strtotime('now +' . config('myjob.ads.validityWeeks') * 7 . 'days')));
    }
    
    public function disable($url) {
	    return $this->expiration($url, formatDate());
    }
    
	private function validation($url, $decision) {
		$ad = Ad::findOrFail($url);
	    $ad->validated = $decision;
        $ad->validated_at = formatDate();
		$ad->save();
        return redirect()->action('AdController@show', $url);
	}
	
	private function expiration($url, $date) {
		$ad = Ad::findOrFail($url);
	    $ad->expires_at = $date;
		$ad->save();
        return redirect()->action('AdController@show', $url);
	}
}
