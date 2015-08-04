@extends('layout')

@section('content')

@if (count($faq_items))

	<h3>{{ trans('help.faq_title') }}</h3>

	<div class="panel-group" id="faq" role="tablist" aria-multiselectable="true">

	@foreach ($faq_items as $faq_item)

		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="heading{{ $faq_item->position }}">
				<h4 class="panel-title">
					<a class="collapsed" role="button" data-toggle="collapse" data-parent="#faq" href="#collapse{{ $faq_item->position }}" aria-expanded="false" aria-controls="collapse{{ $faq_item->position }}">
						{{ App::getLocale() == 'en' ? $faq_item->question_en : $faq_item->question_fr }}
					</a>
				</h4>
			</div>

			<div id="collapse{{ $faq_item->position }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $faq_item->position }}">
				<div class="panel-body">
					{{ App::getLocale() == 'en' ? $faq_item->answer_en : $faq_item->answer_fr }}
				</div>
			</div>
		</div>

	@endforeach

	</div>

@endif


<h3>{{ trans('help.contact_us') }}</h3>

<div class="panel panel-default">
	<div class="panel-body">
		@if (! empty($faq_items))
			<p>
				{{ trans('help.contact_us_text') }}
			</p>
		@endif

		<a href="mailto:myjob@epfl.ch">
			<button type="button" class="btn btn-default">
				<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> myjob@epfl.ch
			</button>
		</a>
	</div>
</div>

@stop