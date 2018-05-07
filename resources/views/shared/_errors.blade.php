
@if(count($errors) > 0)
	<div class="alert alert-danger">
		@foreach($errors->all() as $error)
			{{ $error }} <br>
		@endforeach
	</div>
@endif

@foreach(['success', 'warning', 'info', 'danger'] as $msg)
	@if(session()->has($msg))
		<div class="alert alert-{{ $msg }}">
			{{ session()->get($msg) }}
		</div>
	@endif
@endforeach
