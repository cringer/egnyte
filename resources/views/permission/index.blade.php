@role('admin')
	@foreach ($permissions as $permission)
		<p>{{ $permission->name }}</p>
	@endforeach
@endrole
