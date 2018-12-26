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

 <form action="/admin/ting/{{$data->id}}" method="post" enctype="multipart/form-data">

   {{ csrf_field() }}
   
	<div class="form-group">
		<label for="title">电台标题:</label>
		<input type="text" class="form-control" id="title" value="{{ $data->title }}" name="title" placeholder="电台标题">
	</div>
	<div class="form-group">
			<label for="tingcate">电台类别:</label>
			<select class="form-control" id="tingcate" name="tingcate">
				<option value="">爱情</option>
				<option value="">旅行</option>
				<option value="">故事</option>
			</select>
	</div>
	<div class="form-group">
		<label for="tname">主播:</label>
		<input type="text" class="form-control" id="tname" value="{{ $data->tname }}" name="tname" placeholder="主播">
	</div>
	<div class="form-group">
		<label for="img">封面:</label>
		<div><input type="file" name="img"></div>
	</div>
	<input type="submit" value="修改" class="btn btn-success">
	</form>

@endsection