@if ($errors->any())
<div class="ui error visible message">
	<ul class="list">
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
        @endforeach
	</ul>
</div>
@endif

<div class="ui segment">
	<div class="ui top attached label caps">{{ trans('ads.sections.general') }}</div>
	<div class="field">
		<label>{{ label('title') }}</label>
		{!! Form::text('title', null, adform('title')) !!}
	</div>
	<div class="two fields">
		<div class="field">
			<label>{{ label('category_id') }}</label>
 			{!! Form::select('category_id', $categories, null, adform('category_id')) !!}
		</div>
		<div class="field">
			<label>{{ label('place') }}</label>
			{!! Form::text('place', null, adform('place')) !!}
		</div>
	</div>
	<div class="field">
		<label>{{ label('description') }}</label>
		{!! Form::textarea('description', null, adform('description')) !!}
	</div>
</div>
	        
<div class="ui segment">
	<div class="ui top attached label caps">{{ trans('ads.sections.details') }}</div>
	<div class="two fields">
		<div class="field">
			<label>{{ label('starts_at') }} <small>({{ trans('general.startingtoday') }})</small></label>
			{!! Form::text('starts_at', prefill($ad, date('c')), adform('starts_at')) !!}
		</div>
		<div class="field">
			<label>{{ label('ends_at') }} <small>({{ trans('general.optional') }})</small></label>
			{!! Form::text('ends_at', null, adform('ends_at')) !!}
		</div>
	</div>
	<div class="two fields">
		<div class="field">
			<label>{{ label('duration') }}</label>
			{!! Form::text('duration', null, adform('duration')) !!}
		</div>
		<div class="field">
	        <label>{{ label('salary') }}</label>
 			{!! Form::text('salary', null, adform('salary')) !!}
		</div>
	</div>
	<div class="two fields">
		<div class="field">
			<label>{{ label('skills') }} <small>({{ trans('general.optional') }})</small></label>
			{!! Form::text('skills', null, adform('skills')) !!}
		</div>
		<div class="field">
			<label>{{ label('languages') }} <small>({{ trans('general.optional') }})</small></label>
			{!! Form::text('languages', null, adform('languages')) !!}
		</div>
	</div>
</div>

<div class="ui segment">
	<div class="ui top attached label caps">{{ trans('ads.sections.publisher') }}</div>
	<div class="two fields">
		<div class="field">
			<label>{{ label('contact_first_name') }}</label>
			{!! Form::text('contact_first_name', isset($user) ? prefill($ad, $user): null, adform('contact_first_name')) !!}
		</div>
		<div class="field">
			<label>{{ label('contact_last_name') }}</label>
			{!! Form::text('contact_last_name', isset($user) ? prefill($ad, $user_last): null, adform('contact_last_name')) !!}
		</div>
	</div>
	<div class="two fields">
		<div class="field">
			<label>{{ label('contact_email') }}</label>
			{!! Form::email('contact_email', isset($user) ? prefill($ad, $user_email): null, adform('contact_email')) !!}
		</div>
		<div class="field">
			<label>{{ label('contact_phone') }} <small>({{ trans('general.optional') }})</small></label>
			{!! Form::text('contact_phone', null, adform('contact_phone')) !!}
		</div>
	</div>
</div>