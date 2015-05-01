<?php

class ModerationController extends Controller {

    /**
    * Display the moderation panel, with the Ads to be moderated
    */
    public function adsToModerate() {
        $ads_to_moderate = Ad::whereNull('validated_at')->get();

        return View::make('moderation')
            ->with('ads_to_moderate', $ads_to_moderate)
            ->with('category_names', Category::get_category_names());
    }

    public function validate() {
        $id = Input::get('id');
        $accepted = Input::get('accepted');

        if ($accepted != 0 && $accepted != 1) {
            echo "failure";
            return;
        }

        $ad = Ad::find($id);

        $ad->is_validated = $accepted;
        $ad->validated_at = Carbon::now()->toDateTimeString();

        if ($ad->save()) {
            echo "ok";
        } else {
            echo "failure";
        }
    }
}
