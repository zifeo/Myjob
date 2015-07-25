@extends('layout')

@section('content')

<div class="row">
	<div class="eight wide column">
	    <h2 class="ui header">{{ trans('help.faq_title') }}</h2>

		<div class="ui accordion">
			@forelse ($faq_items as $faq_item)
			<div class="title">
				<i class="dropdown icon"></i>
				{{ App::getLocale() == 'en' ? $faq_item->question_en : $faq_item->question_fr }}
			</div>
			<div class="content">
				<p class="transition">
					{{ App::getLocale() == 'en' ? $faq_item->answer_en : $faq_item->answer_fr }}
				</p>
			</div>
			@empty
			<p>Pas de question-réponse pour le moment.</p>
			@endforelse
		</div>
	</div>
	<div class="eight wide column">
	    <h2 class="ui header">{{ trans('help.contact_us') }}</h2>

		<p>{{ trans('help.contact_us_text') }}</p>
		<div class="ui form">
			<div class="three fields">
				<div class="field">
					{!! Form::text('contact_first_name', null, [
			            'placeholder' => trans('ads.first_name_placeholder'), 
			            'required',
			            'data-minlength' => '2',
			            'maxlength' => '50'
			        ]) !!}
				</div>
				<div class="field">
					{!! Form::text('contact_last_name', null, [
			            'placeholder' => trans('ads.last_name_placeholder'), 
			            'required',
			            'data-minlength' => '2',
			            'maxlength' => '50'
			        ]) !!}
				</div>
				<div class="field">
					{!! Form::email('contact_email', null, [
			            'placeholder' => trans('ads.email_placeholder'), 
			            'required',
			            'type' => 'email',
			            'maxlength' => '75'
			        ]) !!}
				</div>
			</div>
			<div class="field">
				{!! Form::textarea('description', null, [
		            'placeholder' => trans('ads.description_placeholder'), 
		            'rows' => 7, 
		            'required',
		            'data-minlength' => '10',
		            'maxlength' => '1500',
		            'data-stopshouting'
		        ]) !!}
   			</div>
			{!! Form::submit('Envoyer', [
				'class' => 'ui red button mt'
			]) !!}
		</div>
	</div>
</div>

@stop