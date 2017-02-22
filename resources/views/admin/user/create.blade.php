@extends('admin.layout')

@section('content')    
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Add users</h1>Breadcrumb
</div>

<div class="col-sm-6 col-sm-offset-4 main">

    <div class="panel panel-default">
    	<div class="panel-heading">
    		Add a new User
		</div>
    	<div class="panel panel-body">
			<form>
				<div class="form-group">
				<label for="name">Name</label>
					<input type="text" value="name" class="form-control">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" value="name" class="form-control">
				</div>
				<div class="form-group">
					<label for="hostname">Hostname</label>
					<input type="text" class="form-control">
				</div>
			</form>
		</div>
	</div>
</div>    
@endsection
