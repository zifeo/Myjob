<?php

function label($field) {
	return trans('ads.labels.' . $field);
}

function form($field) {
	
	$config = config('data.ad')[$field];
	$attrs = [
		'id' => $field,
		
	];
	
	if (existTrans('ads.placeholders', $field))
		$attrs['placeholder'] = trans('ads.placeholders.' . $field);
	if (isset($config['class']))
		$attrs['class'] = $config['class'];
	
	if (isset($config['required']))
		$attrs[] = 'required';	
	if (isset($config['readOnly']))
		$attrs[] = 'readOnly';
		
	if (isset($config['email']))
		$attrs['datatype'] = 'email';
	
	if (isset($config['min']))
		$attrs['minlength'] = $config['min'];
	if (isset($config['max']))
		$attrs['maxlength'] = $config['max'];
		
	return $attrs;
}

function existTrans($subname, $name) {
	$trans = trans($subname . '.' . $name);
	return $trans != $subname . '.' . $name && ! empty($trans);
}