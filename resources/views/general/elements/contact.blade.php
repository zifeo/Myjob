@if ($errors->any())
<div class="ui error visible message">
	<ul class="list">
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
        @endforeach
	</ul>
</div>
@endif

<div class="three fields">
	<div class="field">
		{!! Form::text('first_name', isset($user) ? $user: null, contactForm('first_name')) !!}
	</div>
	<div class="field">
		{!! Form::text('last_name', isset($user_last) ? $user_last: null, contactForm('last_name')) !!}
	</div>
	<div class="field">
		{!! Form::email('email', isset($user_email) ? $user_email: null, contactForm('email')) !!}
	</div>
</div>
<div class="field">
	{!! Form::textarea('message', null, contactForm('message')) !!}
</div>
