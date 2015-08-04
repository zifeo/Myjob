<div class="ui segment">
	<div class="field">
		<div class="ui toggle checkbox">
			{!! Form::checkbox('notifications_instant', 1, null, ['class' => 'hidden']) !!}
			<label>{{ trans('options.labels.notifications_instant') }}</label>
		</div>
	</div>
</div>
<div class="ui segment">
	<div class="field">
		<div class="ui toggle checkbox">
			{!! Form::checkbox('notifications_day', 1, null, ['class' => 'hidden']) !!}
			<label>{{ trans('options.labels.notifications_day') }}</label>
		</div>
	</div>
</div>
<div class="ui segment">
	<div class="field">
		<div class="ui toggle checkbox">
			{!! Form::checkbox('notifications_week', 1, null, ['class' => 'hidden']) !!}
			<label>{{ trans('options.labels.notifications_week') }}</label>
		</div>
	</div>
</div>