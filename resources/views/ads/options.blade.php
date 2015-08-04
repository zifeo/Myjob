@extends('layout.layout')

@section('content')
<div class="row">
	<div class="five wide column">
		
		<h3 class="ui header">{{ trans('general.titles.notifications') }}</h2>
		
		<p>{{ trans('general.texts.notifications') }}</p>
		
		<a class="ui small red button mt" href="{{ action('PublicController@help') }}">
			<i class="help icon"></i>
			{{ trans('general.buttons.ask') }}
		</a>
		
	</div>
	<div class="eleven wide column">
		
		<div class="ui form">
			<div class="ui segment">
				<div class="field">
					<div class="ui toggle checkbox">
						<input type="checkbox" name="gift"class="hidden">
						<label>Do not include a receipt in the package</label>
					</div>
				</div>
			</div>
			<div class="ui segment">
				<div class="field">
					<div class="ui toggle checkbox">
						<input type="checkbox" name="gift"class="hidden">
						<label>Do not include a receipt in the package</label>
					</div>
				</div>
			</div>
			<div class="ui segment">
				<div class="field">
					<div class="ui toggle checkbox">
						<input type="checkbox" name="gift"class="hidden">
						<label>Do not include a receipt in the package</label>
					</div>
				</div>
			</div>
				
		</div>
		
	</div>
</div>
@stop