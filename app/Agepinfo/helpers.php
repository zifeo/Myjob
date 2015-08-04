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

function formatDate($time = null) {
	return date('Y-m-d H:i:s', $time == null ? time(): $time);
}

function expired($ad) {
	return $ad->expires_at <= formatDate();
}

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