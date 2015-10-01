<?php

/**
 * This allow the specification of validator, both accessible in php & js.
 * Fields must be set mass assignable in the corresponding model.
 */
return [

	'ad'      => [
		'title'              => [
			'required' => true,
			'min'      => 5,
			'max'      => 50,
		],
		'category_id'        => [
			'categories' => true,
			'required'   => true,
			'class'      => 'ui selection dropdown',
		],
		'place'              => [
			'required' => true,
			'min'      => 2,
			'max'      => 30,
		],
		'description'        => [
			'required' => true,
			'min'      => 10,
			'max'      => 1500,
		],

		'starts_at'          => [
			'required' => true,
			'readOnly' => true,
			'class'    => 'datepicker date',
		],
		'ends_at'            => [
			'readOnly' => true,
			'class'    => 'datepicker date',
		],
		'duration'           => [
			'required' => true,
			'min'      => 2,
			'max'      => 50,
		],
		'salary'             => [
			'required' => true,
			'min'      => 2,
			'max'      => 50,
		],
		'skills'             => [
			'min' => 2,
			'max' => 50,
		],
		'languages'          => [
			'min' => 2,
			'max' => 50,
		],

		'contact_first_name' => [
			'required' => true,
			'min'      => 2,
			'max'      => 50,
		],
		'contact_last_name'  => [
			'required' => true,
			'min'      => 2,
			'max'      => 50,
		],
		'contact_email'      => [
			'required' => true,
			'email'    => true,
			'min'      => 5,
			'max'      => 100,
		],
		'contact_phone'      => [
			'min' => 5,
			'max' => 50,
		],
	],

	'contact' => [
		'first_name' => [
			'required' => true,
			'min'      => 2,
			'max'      => 50,
		],
		'last_name'  => [
			'required' => true,
			'min'      => 2,
			'max'      => 50,
		],
		'email'      => [
			'required' => true,
			'min'      => 2,
			'max'      => 100,
		],
		'message'    => [
			'required' => true,
			'min'      => 10,
			'max'      => 1500,
		],
	],

];