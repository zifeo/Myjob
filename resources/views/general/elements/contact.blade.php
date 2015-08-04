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
