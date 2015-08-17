<h2 class="ui center aligned icon header">
	<i class="student icon"></i>
	{{ trans('general.titles.students') }}
</h2>
<a class="ui large red button" href="{{ action('AdController@index') }}">{{ trans('general.buttons.seek') }}</a>
<div class="ui list">
	<div class="item">{{ trans('general.texts.tequila') }}</div>
	<a class="item" href="https://gaspar.epfl.ch/cgi-bin/gaspar-web/lostpwd">{{ trans('general.texts.newpassword') }}</a>
	<a class="item" href="{{ action('PublicController@help') }}">{{ trans('general.texts.outsideepfl') }}</a>
</div>