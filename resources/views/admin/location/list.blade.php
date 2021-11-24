@extends('admin.layout.index')

@section('content')

<div id="content" class="span10" style="min-height: 1000px;">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>
			@if(session('Alerts'))
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>
					{{session('Alerts')}} !
					</strong>
				</div>
			@endif
			<p>
				<a href="admin/location/addcity"><button class="btn  btn-primary"><i class="icon-plus"></i> Thêm tỉnh thành </button></a>
				<a href="admin/location/adddistrict"><button class="btn  btn-primary"><i class="icon-plus"></i> Thêm quận huyện </button></a>
			</p>
			<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Members</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  	<thead>
							  	
						  	</thead>   
						  	<tbody>
						  		<tr>
								  	<th>ID</th>
									<th>Name</th>
									<th>Alias</th>
									<th>date</th>
									<th>date up</th>
								    <th>Actions</th>
							  	</tr>
							  	@foreach($city as $val)
							  	<tr>
							  		<td>{{$val->id}}</td>
							  		<td>{{$val->name}}</td>
							  		<td>{{$val->slug}}</td>
							  		<td>{{$val->date}}</td>
							  		<td>{{$val->date_up}}</td>
							  		<td>
							  			<!-- <a class="btn btn-success" target="_blank" href="">
											<i class="halflings-icon white zoom-in"></i>  
										</a> -->
										<a class="btn btn-info" href="admin/location/editcity/{{$val->id}}">
											<i class="halflings-icon white edit"></i>  
										</a>
										<a class="btn btn-danger" href="admin/location/deletecity/{{$val->id}}">
											<i class="halflings-icon white trash"></i> 
										</a>
							  		</td>
							  	</tr>
								  	<?php $district = $val->district; ?>
								  	@foreach($district as $val2)
								  	<tr>
								  		<td>{{$val2->id}}</td>
								  		<td>---| {{$val2->name}}</td>
								  		<td>{{$val2->slug}}</td>
								  		<td>{{$val2->date}}</td>
								  		<td>{{$val2->date_up}}</td>
								  		<td>
								  			<!-- <a class="btn btn-success" target="_blank" href="">
												<i class="halflings-icon white zoom-in"></i>  
											</a> -->
											<a class="btn btn-info btn-setting" href="admin/location/editdistrict/{{$val2->id}}">
												<i class="halflings-icon white edit"></i>  
											</a>
											<a class="btn btn-danger" href="admin/location/deletedistrict/{{$val2->id}}">
												<i class="halflings-icon white trash"></i> 
											</a>
								  		</td>
								  	</tr>
							  		@endforeach
							  	@endforeach
						  	</tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

		</div>

@endsection