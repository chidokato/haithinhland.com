@extends('admin.layout.index')

@section('content')

<div id="content" class="span10" style="min-height: 1000px;">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i> <a href="admin/dashboard">Dashboard</a> <i class="icon-angle-right"></i> 
		</li>
		<li>
			<a href="admin/category/list">Mặt bằng</a> <i class="icon-angle-right"></i> 
		</li>
		<li>
			<a>Sửa mặt bằng</a>
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
		<div class="box span6">
			<div class="box-header">
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>{{$product->name}}</h2>
			</div>
			<div class="box-content">
				<form class="form-horizontal" action="admin/matbang/edit/{{$matbang->id}}/{{$product->id}}" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				  	<fieldset>
						<div class="control-group">
						  	<label>Name</label>
						  	<div>
								<input required value="{{$matbang->name}}" type="text" name="name" class="span12"  />
						  	</div>
						</div>
						

						<div class="control-group">
						  	<label for="fileInput"></label>
						  	<div>
								<img style="max-height: 150px;" src="{{$matbang->img}}">
						  	</div>
						</div>

						<div class="control-group">
						  	<label>Image</label>
							<input required type="text" name="img" id="image" class="span10"><button onclick="BrowseServer();" class="btn" type="button">Go!</button>
						</div>  

						<div class="form-actions">
						  	<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
				  	</fieldset>
				</form>   

			</div>
		</div><!--/span-->

		<div class="box span6">
			<div class="box-header">
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>Mặt bằng căn hộ - {{$product->name}}</h2>
				<div class="box-icon">
					<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" action="admin/matbang/add2/{{$product->id}}" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				  	<fieldset>
						<div class="control-group span6">
						  	<label>Name</label>
						  	<div>
								<input required type="text" name="name" class="span12"  />
						  	</div>
						</div>
						
						<div class="control-group span6">
							<label for="selectError">Category</label>
							<div>
							  	<select name="mb_id" class="span12">
							  		@foreach($product->matbangtoa as $val)
							  		<option value="{!! $val['id'] !!}">{!! $val['name'] !!}</option>
							  		@endforeach
							  	</select>
							</div>
					  	</div>

						<div class="control-group">
						  	<div class="control-group">
						  	<label>Image</label>
								<input required type="text" name="img" id="image1" class="span10"><button onclick="BrowseServer1();" class="btn" type="button">Go!</button>
							</div>  
						</div>          
						
						<div class="form-actions">
						  	<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
				  	</fieldset>
				</form>   

			</div>
		</div><!--/span-->
	</div>

	<div class="row-fluid">		
		<div class="box span12">
			<div class="box-header">
				<h2><i class="halflings-icon white white hand-top"></i><span class="break"></span>hình ảnh</h2>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
				  	<tbody>
				  		<tr>
						  	<th>STT</th>
							<th>Name</th>
							<th>mặt bằng tòa</th>
							<th>mặt bằng căn hộ</th>
						    <th>Actions</th>
					  	</tr>
					  	@foreach($product->matbangtoa as $val)
							<tr>
								<td>{!! $val['id'] !!}</td>
								<td>{!! $val['name'] !!}</td>
								<td><a href="{!! $val['img'] !!}"><img style="height: 60px;" src="{!! $val['img'] !!}"></a></td>
								<td></td>
								<td>
									<a class="btn btn-info" href="admin/matbang/edit/{!! $val['id'] !!}/{{$product->id}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="admin/matbang/delete/{!! $val['id'] !!}/{{$product->id}}">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							@foreach($val->matbangcan as $val2)
							<tr>
								<td>{!! $val2['id'] !!}</td>
								<td>{!! $val2['name'] !!}</td>
								<td></td>
								<td><a href="{!! $val2['img'] !!}"><img style="height: 60px;" src="{!! $val2['img'] !!}"></a></td>
								<td>
									<a class="btn btn-info" href="admin/matbang/edit2/{!! $val2['id'] !!}/{{$product->id}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="admin/matbang/delete2/{!! $val2['id'] !!}/{{$product->id}}">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							@endforeach
						@endforeach
						
				  	</tbody>
			  </table>            
			</div>	
		</div>
	</div><!--/row-->
</div>

@endsection