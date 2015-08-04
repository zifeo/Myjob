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
		{!! Form::text('title', null, form('title')) !!}
	</div>
	<div class="two fields">
		<div class="field">
			<label>{{ label('category_id') }}</label>
 			{!! Form::select('category_id', $categories, null, form('category_id')) !!}
		</div>
		<div class="field">
			<label>{{ label('place') }}</label>
			{!! Form::text('place', null, form('place')) !!}
		</div>
	</div>
	<div class="field">
		<label>{{ label('description') }} <small>({{ trans('ads.markdown') }})</small></label>
		{!! Form::textarea('description', null, form('description')) !!}
	</div>
</div>
	        
<div class="ui segment">
	<div class="ui top attached label caps">{{ trans('ads.sections.details') }}</div>
	<div class="two fields">
		<div class="field">
			<label>{{ label('starts_at') }} <small>({{ trans('ads.startingtoday') }})</small></label>
			{!! Form::text('starts_at', date('c'), form('starts_at')) !!}
		</div>
		<div class="field">
			<label>{{ label('ends_at') }} <small>({{ trans('ads.optional') }})</small></label>
			{!! Form::text('ends_at', null, form('ends_at')) !!}
		</div>
	</div>
	<div class="two fields">
		<div class="field">
			<label>{{ label('duration') }}</label>
			{!! Form::text('duration', null, form('duration')) !!}
		</div>
		<div class="field">
	        <label>{{ label('salary') }}</label>
 			{!! Form::text('salary', null, form('salary')) !!}
		</div>
	</div>
	<div class="two fields">
		<div class="field">
			<label>{{ label('skills') }} <small>({{ trans('ads.optional') }})</small></label>
			{!! Form::text('skills', null, form('skills')) !!}
		</div>
		<div class="field">
			<label>{{ label('languages') }} <small>({{ trans('ads.optional') }})</small></label>
			{!! Form::text('languages', null, form('languages')) !!}
		</div>
	</div>
</div>

<div class="ui segment">
	<div class="ui top attached label caps">{{ trans('ads.sections.publisher') }}</div>
	<div class="two fields">
		<div class="field">
			<label>{{ label('contact_first_name') }}</label>
			{!! Form::text('contact_first_name', null, form('contact_first_name')) !!}
		</div>
		<div class="field">
			<label>{{ label('contact_last_name') }}</label>
			{!! Form::text('contact_last_name', null, form('contact_last_name')) !!}
		</div>
	</div>
	<div class="two fields">
		<div class="field">
			<label>{{ label('contact_email') }}</label>
			{!! Form::email('contact_email', null, form('contact_email')) !!}
		</div>
		<div class="field">
			<label>{{ label('contact_phone') }} <small>({{ trans('ads.optional') }})</small></label>
			{!! Form::text('contact_phone', null, form('contact_phone')) !!}
		</div>
	</div>
</div>