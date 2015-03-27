<?php

class ContactEmail extends Eloquent {
    protected $softDelete = true;
    protected $primaryKey = 'contact_email';
    protected $guarded = ['*'];
    
    const n_weeks_valid_secret = 2;


    public static function get_outdated_secrets($email)
    {
        $models = ContactEmail::where('contact_email', '=', $email)
            ->where('created_at', '<', date('Y-m-d H-i-s', strtotime('-' . self::n_weeks_valid_secret . ' weeks')))->get();

        return self::secrets_from_models($models);
    }

    public static function get_valid_secrets($email)
    {
        $models = ContactEmail::where('contact_email', '=', $email)
            ->where('created_at', '>=', date('Y-m-d H-i-s', strtotime('-' . self::n_weeks_valid_secret . ' weeks')))->get();

        return self::secrets_from_models($models);
    }

    public static function is_valid($secret, $email)
    {
        return in_array($secret, self::get_valid_secrets($email));
    }

    public static function is_outdated($secret, $email)
    {
        return in_array($secret, self::get_outdated_secrets($email));
    }

    private static function secrets_from_models($models)
    {
        $secrets = [];

        foreach ($models as $model) {
            array_push($secrets, $model->random_secret);
        }

        return $secrets;
    }
}