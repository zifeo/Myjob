<div class="ui segment">
	<div class="ui top attached label caps">Information de l'annonce </div>
	<div class="field">
		<label>{{ trans('ads.ad_title') }}</label>
		{!! Form::text('title', null, [
            'placeholder' => trans('ads.ad_title_placeholder'), 
            'required', 
            'data-minlength' => '5',
            'maxlength' => '50',
            'data-stopshouting'
        ]) !!}
	</div>
	<div class="two fields">
		<div class="field">
			<label>{{ trans('ads.category') }}</label>
 			{!! Form::select('category_id', $categories, null, [
            	'class' => 'ui selection dropdown', 
				'id' => 'category_id'
			]) !!}
		</div>
	</div>
	<div class="field">
		<label>{{ trans('ads.description') }} <small>(supporte le balisage Markdown)</small></label>
		{!! Form::textarea('description', null, [
            'placeholder' => trans('ads.description_placeholder'), 
            'rows' => 7, 
            'required',
            'data-minlength' => '10',
            'maxlength' => '1500',
            'data-stopshouting'
        ]) !!}
	</div>
</div>
	        
<div class="ui segment">
	<div class="ui top attached label caps">Détails du job</div>
	<div class="two fields">
		<div class="field">
			<label>Date de début <small>(par défaut, dès aujourd'hui)</small></label>
			{!! Form::text('starts_at', date('d-m-Y'), [
                'id' => 'starts_at', 
                'required'
            ]) !!}
		</div>
		<div class="field">
			<label>Date de fin <small>(si applicable)</small></label>
			{!! Form::text('ends_at', 
                date('d-m-Y', strtotime('now +15days')), [
                'id' => 'ends_at'
            ]) !!}
		</div>
	</div>
	<div class="two fields">
		<div class="field">
			<label>{{ trans('ads.workplace') }}</label>
			{!! Form::text('place', null, [
	            'placeholder' => trans('ads.workplace_placeholder'),
	            'data-minlength' => '3',
	            'maxlength' => '15'
	        ]) !!}
		</div>
		<div class="field">
			<label>{{ trans('ads.indicative_duration') }}</label>
			{!! Form::text('duration', null, [
	            'placeholder' => trans('ads.indicative_duration_placeholder'),
	            'data-minlength' => '2',
	            'maxlength' => '100'
	        ]) !!}
		</div>
	</div>
	<div class="two fields">
		<div class="field">
			<label>{{ trans('ads.skills') }} <small>(si applicable)</small></label>
			{!! Form::text('skills', null, [
	            'placeholder' => trans('ads.skills_placeholder'),
	            'data-minlength' => '5',
	            'maxlength' => '100'
	        ]) !!}
		</div>
		<div class="field">
			<label>{{ trans('ads.languages') }} <small>(si applicable)</small></label>
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
	<div class="field">
		<label>{{ trans('ads.contact_person') }}</label>
		<div class="two fields">
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
		</div>
	</div>
	<div class="two fields">
		<div class="field">
			<label>Email</label>
			{!! Form::email('contact_email', null, [
	            'placeholder' => trans('ads.email_placeholder'), 
	            'required',
	            'type' => 'email',
	            'maxlength' => '75'
	        ]) !!}
		</div>
		<div class="field">
			<label>{{ trans('ads.phone') }}</label>
			{!! Form::text('contact_phone', null, [
	            'placeholder' => trans('ads.phone_placeholder'),
	            'data-minlength' => '4',
	            'maxlength' => '20'
	        ]) !!}
		</div>
	</div>
</div>

{!! Form::submit(trans('ads.new_ad_submit'), [
	'class' => 'ui red button mt'
]) !!}