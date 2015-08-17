<h3 class="ui header">{{ trans('general.titles.managing') }}</h3>
<p>{!! trans('general.texts.rules.visibility') !!}</p>
<a class="ui small red icon button mt" href="{{ url('help') }}">
	<i class="repeat icon"></i>
	{{ trans('general.buttons.reget') }}
</a>
<h3 class="ui header">{{ trans('general.titles.conditions') }}</h3>
<p>{{ trans('general.texts.rules.respect') }}</p>
<ol class="ui list">
	<li>{!! trans('general.texts.rules.rule1') !!}</li>
	<li>{!! trans('general.texts.rules.rule2') !!}</li>
	<li>{!! trans('general.texts.rules.rule3') !!}</li>
</ol>
<a class="ui small red button mt" href="{{ action('PublicController@help') }}">
	<i class="help icon"></i>
	{{ trans('general.buttons.ask') }}
</a>