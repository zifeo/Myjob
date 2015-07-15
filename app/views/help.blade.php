@extends('layout')

@section('content')


@if (! empty($faq_items))

	<h3>FAQ</h3>

	<div class="panel-group" id="faq" role="tablist" aria-multiselectable="true">

	@foreach ($faq_items as $faq_item)

		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="heading{{ $faq_item->position }}">
				<h4 class="panel-title">
					<a class="collapsed" role="button" data-toggle="collapse" data-parent="#faq" href="#collapse{{ $faq_item->position }}" aria-expanded="false" aria-controls="collapse{{ $faq_item->position }}">
						{{ $faq_item->question }}
					</a>
				</h4>
			</div>

			<div id="collapse{{ $faq_item->position }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $faq_item->position }}">
				<div class="panel-body">
					{{ $faq_item->answer }}
				</div>
			</div>
		</div>

	@endforeach

	</div>

@endif




<h3>Contact us</h3>

Hello, please contact us!



@stop