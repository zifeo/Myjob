<div class="ui segment">
	<div class="ui top attached label caps">Information de l'annonce</div>
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
		<label>{{ label('description') }} <small>(supporte le balisage Markdown)</small></label>
		{!! Form::textarea('description', null, form('description')) !!}
	</div>
</div>
	        
<div class="ui segment">
	<div class="ui top attached label caps">Détails du job</div>
	<div class="two fields">
		<div class="field">
			<label>{{ label('starts_at') }} <small>(dès aujourd'hui)</small></label>
			{!! Form::text('starts_at', date('c'), [
                'id' => 'starts_at',
                'class' => 'datepicker date',
                'placeholder' => date('c'),
                'required'
            ]) !!}
		</div>
		<div class="field">
			<label>{{ label('ends_at') }} <small>(si applicable)</small></label>
			{!! Form::text('ends_at', null, [
                'id' => 'ends_at',
                'readOnly',
                'class' => 'datepicker date',
                'placeholder' => date('c', strtotime('now +15days'))
            ]) !!}
		</div>
	</div>
	<div class="two fields">
		<div class="field">
			<label>{{ label('duration') }}</label>
			{!! Form::text('duration', null, [
	            'placeholder' => trans('ads.indicative_duration_placeholder'),
	            'data-minlength' => '2',
	            'maxlength' => '100'
	        ]) !!}
		</div>
		<div class="field">
	        <label>{{ label('salary') }}</label>
 			{!! Form::text('salary', null, [
	 			'placeholder' => trans('ads.salary'),
 				'id' => 'salary',
				'data-minlength' => '3',
	            'maxlength' => '15'
			]) !!}
		</div>
	</div>
	<div class="two fields">
		<div class="field">
			<label>{{ label('skills') }} <small>(si applicable)</small></label>
			{!! Form::text('skills', null, [
	            'placeholder' => trans('ads.skills_placeholder'),
	            'data-minlength' => '5',
	            'maxlength' => '100'
	        ]) !!}
		</div>
		<div class="field">
			<label>{{ label('languages') }} <small>(si applicable)</small></label>
			{!! Form::text('languages', null, [
	            'placeholder' => trans('ads.languages_placeholder'),
	            'data-minlength' => '3',
	            'maxlength' => '50'
	        ]) !!}
		</div>
	</div>
</div>

<div class="ui segment">
	<div class="ui top attached label caps">Information de contact</div>
	<div class="two fields">
		<div class="field">
			<label>{{ label('contact_first_name') }}</label>
			{!! Form::text('contact_first_name', null, [
	            'placeholder' => trans('ads.first_name_placeholder'), 
	            'required',
	            'data-minlength' => '2',
	            'maxlength' => '50'
	        ]) !!}
		</div>
		<div class="field">
			<label>{{ label('contact_last_name') }}</label>
			{!! Form::text('contact_last_name', null, [
	            'placeholder' => trans('ads.last_name_placeholder'), 
	            'required',
	            'data-minlength' => '2',
	            'maxlength' => '50'
	        ]) !!}
		</div>
	</div>
	<div class="two fields">
		<div class="field">
			<label>{{ label('contact_email') }}</label>
			{!! Form::email('contact_email', null, [
	            'placeholder' => trans('ads.email_placeholder'), 
	            'required',
	            'type' => 'email',
	            'maxlength' => '75'
	        ]) !!}
		</div>
		<div class="field">
			<label>{{ label('contact_phone') }}</label>
			{!! Form::text('contact_phone', null, [
	            'placeholder' => trans('ads.phone_placeholder'),
	            'data-minlength' => '4',
	            'maxlength' => '20'
	        ]) !!}
		</div>
	</div>
</div>