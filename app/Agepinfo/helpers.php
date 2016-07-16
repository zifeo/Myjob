<?php

/** Shortcut for label text. */
function label($field) {
	return trans('ads.labels.' . $field);
}

/** Shortcut for ad form. */
function adform($field) {
	return form($field, 'ad');
}

/** Shortcut for contact form. */
function contactForm($field) {
	return form($field, 'contact');
}

function form($field, $item) {

	$config = config('data.' . $item)[$field];
	$attrs = [
		'id' => $field,
	];

	if (existTrans($item . 's.placeholders', $field))
		$attrs['placeholder'] = trans($item . 's.placeholders.' . $field);
	if (isset($config['class']))
		$attrs['class'] = $config['class'];

	if (isset($config['required']))
		$attrs[] = 'required';
	if (isset($config['readOnly']))
		$attrs[] = 'readOnly';

	if (isset($config['min']))
		$attrs['minlength'] = $config['min'];
	if (isset($config['max']))
		$attrs['maxlength'] = $config['max'];

	return $attrs;
}

function prefill($model, $value) {
	return isset($value) && !isset($model) ? $value: null;
}

function existTrans($subname, $name) {
	$trans = trans($subname . '.' . $name);
	return $trans != $subname . '.' . $name && !empty($trans);
}

/** Format date to database compatible pattern given a timestamp or using current timestamp. */
function formatDate($time = null) {
	return date('Y-m-d H:i:s', $time == null ? time(): $time);
}

function expired($ad) {
	return $ad->expires_at <= formatDate();
}

/** Generate menu item. */
function item($nav, $action, $icon = null) {
	$navAction = config('myjob.routes.' . $nav);
	$activeHTML = $action == $navAction ? 'active ': '';
	$actionHTML = e(action($navAction));
	$iconHTML = $icon != null ? '<i class="' . $icon . ' icon"></i> ': '';
	$transHTML = e(trans('general.nav.' . $nav));
	return
		'<a class="' . $activeHTML . 'item" href="' . $actionHTML . '">
	' . $iconHTML . $transHTML . '
</a>';
}
