@extends('admin/layout/index')
@section('content')
<form class="navbar-left navbar-form nav-search mr-md-3" action="/admin/article" method="get">
						<div class="input-group">
							<input type="text" placeholder="文章标题" name="title" value="{{ $params['title'] or '' }}" class="form-control"><br>
							<div class="form-group">
								<select class="form-control" id="exampleFormControlSelect1" name="cid">
								 				<option @if(isset($params['auth']) && $params['auth'] == '%') selected @endif value="%">不选择</option>
												@foreach($cates as $k=>$v)
                                                  <option @if(isset($params['cid']) && $params['cid'] ==  $v->id ) selected @endif value="{{ $v->id }}">{{ $v->name }}</option>
												@endforeach
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
			<th scope="col">分类</th>
			<th scope="col">用户</th>
			<th scope="col">标题</th>
			<th scope="col">封面图片</th>
			<th scope="col">喜欢次数</th>
			<th scope="col">浏览次数</th>
			<th scope="col">发表时间</th>
			<th scope="col">操作</th>
		</tr>
	</thead>
	<tbody>
	@foreach($articles as $k=>$v)
		<tr>
			<td>{{ $v->id }}</td>
			<td>{{ $v->ArticleCate->name }}</td>
			<td>{{ $v->User->uname }}</td>
			<td>{{ $v->title }}</td>
			<td><img src="{{ $v->image }}" alt="" width="100px" height="100px"></td>
			<td>{{ $v->like }}</td>
			<td>{{ $v->look }}</td>
			<td>{{ $v->created_at }}</td>
			<td>
			    <a href="/admin/article/{{ $v->id }}/edit" class="btn btn-danger">修改</a>
			    <a href="javascript:;" onclick="destroy({{ $v->id }},this)" class="btn btn-warning">删除</a>
			    <a href="javascript:;" onclick="showContent({{ $v->id }})" class="btn btn-info">内容</a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
<div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h4 class="modal-title" id="myModalLabel"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
	        ...
	      </div>
	    </div>
	  </div>
	</div>
<div id="paging">
	{{ $articles->appends($params)->links() }}	
</div>	

</div>
<div class="hidden">
	{{ csrf_field() }}
</div>
<script>
		function destroy(id,obj){
			$.post('/admin/article/'+id,{'_token':$('.hidden input').val(),'_method':'DELETE'},function(msg){
				if(msg == 'success'){
					$(obj).parent().parent().remove();
				}else{
					alert('删除失败');
				}
			},'html');
		}

		function showContent(id){
			var url = '/admin/article/'+id;
			$.get(url,function(data){
				if(data.msg != 'error'){
					console.log(data);
					// 修改模态框的值 并且显示
					$('#myModal h4').eq(0).html(data.title);
					$('#myModal .modal-body').html(data.content);
					// 显示模态框
					 $('#myModal').modal('show')
				}
			},'json');
			};
		
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