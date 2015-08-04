@if (session('success'))
<div class="ui green nag">
	<i class="close icon"></i>
	<div class="title">
		<i class="checkmark icon"></i> {{ session('success') }}
	</div>
</div>
@elseif (session('info'))
<div class="ui teal nag">
	<i class="close icon"></i>
	<div class="title">
		<i class="info icon"></i> {{ session('info') }}
	</div>
</div>
@endif
<div class="middle aligned column">
	<a href="{{ action($auth ? 'AdController@index': 'PublicController@index') }}">
		<h1><img width="360" height="60" src="{{ asset('contents/images/myagep.svg') }}" alt="Myjob"></h1>
	</a>
</div>
<div class="right aligned column">
	<div class="lang-selector-wrapper">
		<a class="{{ App::getLocale() == 'fr' ? 'active ': ''}}item" href="?lang=fr">Fr<span>ançais</span></a>
		<a class="{{ App::getLocale() == 'en' ? 'active ': ''}}item" href="?lang=en">En<span>glish</span></a>
	</div>
	{!! Form::open(['action' => 'AdController@search', 'method' => 'GET']) !!}
		<div class="ui action input">
			{!! Form::text('q', isset($search) ? e($search): null, [
				'placeholder' => trans('general.search')
			]) !!}
			<button class="ui icon basic button"><i class="search icon"></i></button>
		</div>
	{!! Form::close() !!}
</div>