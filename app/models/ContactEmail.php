<?php

class ContactEmail extends Eloquent {
    protected $softDelete = true;
    protected $primaryKey = 'contact_email';
    protected $guarded = ['*'];

}