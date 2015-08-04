<div class="col-sm-12 alert alert-{{ Session::get('type') }} alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert">
		<span aria-hidden="true">&times;</span>
		<span class="sr-only">{{ trans('general.close') }}</span>
	</button>
	{{ $errors->first() }}
</div>