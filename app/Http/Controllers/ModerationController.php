<?php
	
namespace Myjob\Http\Controllers;

use View, Log, Input;
use Myjob\Models\Ad;
use Myjob\Models\Category;

class ModerationController extends Controller {
	
    /**
    * Display the moderation panel, with the Ads to be moderated
    */
    public function adsToModerate() {
        $ads_to_moderate = Ad::whereNull('validated_at')->get();

        return View::make('moderation')
            ->with('ads_to_moderate', $ads_to_moderate)
            ->with('category_names', Category::get_id_name_mapping());
    }

    public function validation() {
	    
        $id = Input::get('id');
        $accepted = Input::get('accepted');
        $ad = Ad::find($id);

        if ($ad == null || ($accepted != 0 && $accepted != 1)) {
            Log::critical("Invalid arguments posted to moderation.");
            abort(400);
        }

        $ad->is_validated = $accepted;
        $ad->validated_at = date('Y-m-d H:i:s');
		$ad->save();
        echo "ok";
        
    }
}
