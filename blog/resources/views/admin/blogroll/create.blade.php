@extends('admin/layout/index')
@section('content')
	@if(count($errors) >0)
		<div calss='alert alert-danger'>
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

 <form action="/admin/blogroll" method="post" enctype="multipart/form-data">

   {{ csrf_field() }}
   
	<div class="form-group">
		<label for="bname">链接名称:</label>
		<input type="text" class="form-control" id="bname"  name="bname" placeholder="链接名称">
	</div>
	<div class="form-group">
		<label for="burl">链接地址:</label>
		<input type="text" class="form-control" id="burl"  name="burl" placeholder="链接地址">
	</div>
	<input type="submit" value="添加" class="btn btn-success">
	</form>

@endsection