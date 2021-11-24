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
			<p><a href="admin/user/add"><button class="btn btn-primary"><i class="icon-plus"></i> Add</button></a></p>
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
								  <th>Permission</th>
								  <th>Hits</th>
								  <th>created_at</th>
								  <th>updated_at</th>
								  <th>Actions</th>
							  </tr>
						  	@foreach($user as $value)
							<tr>
								<td>{{$value->id}}</td>
								<td>{{$value->name}}</td>
								<td class="center">
									<?php
									if ($value->permission == 0) { echo "superadmin"; }
									if ($value->permission == 1) { echo "admin"; }
									if ($value->permission == 2) { echo "author"; }
									if ($value->permission == 3) { echo "member"; }
									?>
								</td>
								<td class="center">{{$value->hits}}</td>
								<td class="center">{{$value->created_at}}</td>
								<td class="center">{{$value->updated_at}}</td>
								
								<td class="center">
									<!-- <a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>  
									</a> -->
									<a class="btn btn-info" href="admin/user/edit/{{$value->id}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<?php if ($value->permission > 0) { ?>
									<a class="btn btn-danger" href="admin/user/delete/{{$value->id}}">
										<i class="halflings-icon white trash"></i> 
									</a>
									<?php } ?>
								</td>
							</tr>
							@endforeach
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

			
			
			
			
			
    

		</div>

@endsection