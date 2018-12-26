@extends('admin/layout/index')
@section('content')
<form class="navbar-left navbar-form nav-search mr-md-3" action="/admin/cate" method="get">
						<div class="input-group" id="cate">
							<input type="text" placeholder="分类名称" name="name" value="{{ $params['name'] or '' }}" class="form-control"><br>
							<div class="form-group">
								<select class="form-control" id="exampleFormControlSelect1" name="cate">
								 				<option @if(isset($params['cate']) && $params['cate'] == '1') selected @endif value="1">文章</option>
												<option @if(isset($params['cate']) && $params['cate'] == '2') selected @endif value="2">碎片</option>
												<option @if(isset($params['cate']) && $params['cate'] == '3') selected @endif value="3">电台</option>
								</select>
							</div>
							<div class="input-group-append">
								<span class="input-group-text">
									<input type="submit"  value="搜索" class="btn btn-primary btn-border btn-round">
								</span>
							</div>
						</div>
</form>
<div class="card-body">
<table class="table table-hover">
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">分类名称</th>
			<th scope="col">分类图片</th>
			<th scope="col">创建时间</th>
			<th scope="col">操作</th>
		</tr>
	</thead>
	<tbody>
	@foreach($data as $k=>$v)
		<tr>
			<td>{{ $v->id }}</td>
			<td>{{ $v->name }}</td>
			<td><img src="{{ $v->path }}" alt="" width="100px" height="100px"></td>
			<td>{{ $v->created_at }}</td>
			<td>
			    <form action="/admin/cate/{{ $v->id }}/edit" method="get" style="display:inline-block">
			    	<input type="hidden" name="cate" value="{{ $params['cate'] }}">
                    <input type="submit" value="修改" class="btn btn-danger">
			    </form>
			    <a href="javascript:;" onclick="destroy({{ $v->id }},this)" class="btn btn-warning">删除</a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
<div id="paging">
		{{ $data->appends($params)->links() }}	
</div>	

</div>
<div class="hidden">
	{{ csrf_field() }}
</div>
<script>
		function destroy(id,obj){
			$.post('/admin/cate/'+id,{'cate':$('#cate .form-control').eq(1).val(),'_token':$('.hidden input').val(),'_method':'DELETE'},function(msg){
				if(msg == 'success'){
					$(obj).parent().parent().remove();
				}else{
					alert('删除失败');
				}
				console.log(msg);
			},'html');
		}
</script>

<style type="text/css">
#paging{
	margin-left:40%;
}
#paging .active{
		background: blue;
	}
#paging .active span{
	color:#fff;
}
#paging li{
	width:30px;
	height:30px;
	border:1px solid #ccc;
	border-radius: 100%;
	text-align: center;
	line-height: 30px;
	margin:13px 6px;
}
#paging li:hover{
	background: #eee;
	color:blue;
}
#paging .disabled{
	background: #eee;
}

</style>
@endsection