@extends('admin/layout/index')
@section('content')
<div class="card">
	<div class="card-header">
	<form class="navbar-left navbar-form nav-search mr-md-3" action="">
						<div class="input-group">
							<input type="text" placeholder="用户名搜索 ..." class="form-control" value='' name='content'>
							<div class="input-group-append">
								<span class="input-group-text">	
									<input type="submit"  value='搜索'>
								</span>
							</div>
						</div>
					</form>
		<table class="table mt-3 text-center">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">标题</th>
					<th scope="col">主播</th>
					<th scope="col">封面</th>
					<th scope="col">音乐</th>
					<th scope="col">操作</th>
				</tr>
			</thead>
			<tbody>
			@foreach($data as $k=>$v)
				<tr>
					<td>{{$v->id}}</td>
					<td>{{$v->title}}</td>
					<td>{{$v->tname}}</td>				
					<td><img src='{{$v->img}}' style="width:100px;height:100px;border-radius: 10px;" /></td>
					<td><audio controls="" src="{{$v->music}}" class='audio'></td>

					<td>
						<a href="/admin/ting/{{ $v->id }}/edit">修改</a>
						<a href="javascript:;" onclick="del({{$v->id}},this)">删除</a>
					</td>
				</tr>
			@endforeach
			<script type="text/javascript">

						$('audio').each(function(){
							$(this).mouseover(function(){
								$('.audio').pause();
								//$(this).play();

							})
							
							

						})
					</script>
			</tbody>
		</table>
	</div>
	<div id="paging">
		{{ $data->links() }}
	</div>
</div>
<div class='hidden'>
	{{ csrf_field() }}
</div>
<script type="text/javascript">
	function del(id,obj){
		$.post('/admin/ting/'+id,{'_token':$('.hidden input').val(),'_method':'DELETE'},function(msg){
			if(msg=='success'){
				$(obj).parent().parent().remove();
			}else{
				alert('删除失败');
			}
		},'html');
	}


	

</script>
<style type="text/css">
	a{
		color:#555;
	}
	#paging{
		margin:0 auto;
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