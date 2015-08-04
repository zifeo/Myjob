<h2 class="ui center aligned icon header">
	<i class="suitcase icon"></i>
	{{ trans('general.titles.publishers') }}
</h2>
<a class="ui large red button" href="{{ action('AdController@create') }}">{{ trans('general.buttons.offer') }}</a>
<div class="ui list">
	<div class="item">{{ trans('general.texts.noinscription') }}</div>
	<a class="item" href="{{ action('PublicController@connectCreate') }}">{{ trans('general.texts.peopleepfl') }}</a>
	<a class="disabled item">{{ trans('general.texts.oldad') }}</a>
</div>