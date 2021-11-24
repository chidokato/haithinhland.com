@extends('admin.layout.index')

@section('content')

<div id="content" class="span10" style="min-height: 1000px;">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i> <a href="admin/dashboard">Dashboard</a> <i class="icon-angle-right"></i> 
		</li>
		<li>
			<a href="admin/category/list">Ảnh dự án</a>  
		</li>
		
	</ul>
	@if(session('Alerts'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>
			{{session('Alerts')}} !
			</strong>
		</div>
	@endif

	@if(count($errors) > 0)
		@foreach($errors->all() as $err)
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>{{$err}} !</strong>
			</div>
		@endforeach
	@endif


	


	

	<div class="row-fluid">
		<div class="box span6" style="">
			<div class="box-header" data-original-title="">
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>{{$product->name}}</h2>
				
			</div>
			<div class="box-content">
				<form class="form-horizontal" action="admin/image/edit/{{$image->id}}/{{$product->id}}" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				  	<fieldset>
						<div class="control-group">
						  	<label>Name</label>
						  	<div>
								<input value="{{$image->name}}" type="text" name="name" class="span12"  />
						  	</div>
						</div>
						

						<div class="control-group">
							<img style="max-height: 100px;" src="{{$image->img}}">
						</div>
						<div class="control-group">
							<label>Image</label>
							<input type="text" name="img" id="image" class="span10"><button onclick="BrowseServer();" class="btn" type="button">Go!</button>
						</div> 

						<div class="form-actions">
						  	<button type="submit" class="btn btn-primary">Save changes</button>
						  	<button type="reset" class="btn">Cancel</button>
						</div>
				  	</fieldset>
				</form>   

			</div>
		</div><!--/span-->

	</div>

	<div class="row-fluid">		
		

		<div class="box blue span12">
			<div class="box-header">
				<h2><i class="halflings-icon white white hand-top"></i><span class="break"></span>hình ảnh</h2>
			</div>
			<div class="box-content">
				<span class="quick-button span3" style='padding: 5px;'>
					<img style="max-height: 150px;" src="{{$product->img}}">
					
				</span>
				@foreach($imagelist as $val)
				<span class="quick-button span3" style='padding: 5px;'>
					<img style="max-height: 150px;" src="{!! $val['img'] !!}">
					<a href="admin/image/delete/{!! $val['id'] !!}/{{$product->id}}" class="notification blue">Xóa</a>
					<br>
					<a href="admin/image/edit/{!! $val['id'] !!}/{{$product->id}}" style='top: 25px;' href="#" class="notification blue">Sửa</a>
				</span>
				@endforeach
				<div class="clearfix"></div>
			</div>	
		</div>
	
	</div><!--/row-->

</div>

@endsection