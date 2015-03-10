<?php

class ModerationController extends BaseController {

    /**
    * Display the moderation panel, with the Ads to be moderated
    */
    public function adsToModerate() {
        $ads_to_moderate = Ad::whereNull('validated_at')->get();

        return View::make('moderation')
            ->with('ads_to_moderate', $ads_to_moderate)
            ->with('category_names', Category::get_category_names());
    }
}
