<h2 class="ui center aligned header">{{ trans('general.titles.adopt') }}</h2>
<p>{!! trans('general.texts.description') !!}</p>
<div class="ui two statistics">
	<div class="red small statistic">
		<div class="value">
			{{ $students }}
		</div>
		<div class="label">
			{{ trans('general.titles.students') }}
		</div>
	</div>
	<div class="red small statistic">
		<div class="value">
			{{ $publishers }}
		</div>
		<div class="label">
			{{ trans('general.titles.publishers') }}
		</div>
	</div>
</div>