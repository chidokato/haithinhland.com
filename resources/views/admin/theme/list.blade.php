@extends('admin.layout.index')

@section('theme')
class="active"
@endsection

@section('content')

<div id="content" class="span10" style="min-height: 1000px;">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i> <a href="admin/dashboard">Dashboard</a> <i class="icon-angle-right"></i> 
				</li>
				<li>
					<a href="admin/theme/list">Theme</a>
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
			
			<p><a href="admin/theme/add"><button class="btn btn-primary"><i class="icon-plus"></i> Add</button></a></p>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Logo</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <tbody>
						  	<tr>
								  <th>ID</th>
								  <th>Image</th>
								  <th>Name</th>
								  <th>Note</th>
								  <th>link</th>
								  <th>Actions</th>
							  </tr>
						  	@foreach($logo as $val)
							<tr>
								<td>{{$val->id}}</td>
								<td><img style="max-height: 100px;" src="{{$val->img}}"></td>
								<td class="center">{{$val->name}}</td>
								<td class="center">Logo</td>
								<td class="center">{{$val->link}}</td>
								
								<td class="center">
									<!-- <a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>  
									</a> -->
									<a class="btn btn-info" href="admin/theme/edit/{{$val->id}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="admin/theme/delete/{{$val->id}}">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							@endforeach
							@foreach($banner as $val)
							<tr>
								<td>{{$val->id}}</td>
								<td><img style="max-height: 100px;" src="{{$val->img}}"></td>
								<td class="center">{{$val->name}}</td>
								<td class="center">Banner</td>
								<td class="center">{{$val->link}}</td>
								
								<td class="center">
									<!-- <a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>  
									</a> -->
									<a class="btn btn-info" href="admin/theme/edit/{{$val->id}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="admin/theme/delete/{{$val->id}}">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							@endforeach
							@foreach($slide as $val)
							<tr>
								<td>{{$val->id}}</td>
								<td><img style="max-height: 100px;" src="{{$val->img}}"></td>
								<td class="center">{{$val->name}}</td>
								<td class="center">Banner</td>
								<td class="center">{{$val->link}}</td>
								
								<td class="center">
									<!-- <a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>  
									</a> -->
									<a class="btn btn-info" href="admin/theme/edit/{{$val->id}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="admin/theme/delete/{{$val->id}}">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							@endforeach
							@foreach($banner1 as $val)
							<tr>
								<td>{{$val->id}}</td>
								<td><img style="max-height: 100px;" src="{{$val->img}}"></td>
								<td class="center">{{$val->name}}</td>
								<td class="center">banner1</td>
								<td class="center">{{$val->link}}</td>
								
								<td class="center">
									<!-- <a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>  
									</a> -->
									<a class="btn btn-info" href="admin/theme/edit/{{$val->id}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="admin/theme/delete/{{$val->id}}">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							@endforeach
							@foreach($banner2 as $val)
							<tr>
								<td>{{$val->id}}</td>
								<td><img style="max-height: 100px;" src="{{$val->img}}"></td>
								<td class="center">{{$val->name}}</td>
								<td class="center">banner2</td>
								<td class="center">{{$val->link}}</td>
								
								<td class="center">
									<!-- <a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>  
									</a> -->
									<a class="btn btn-info" href="admin/theme/edit/{{$val->id}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="admin/theme/delete/{{$val->id}}">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							@endforeach
							@foreach($banner3 as $val)
							<tr>
								<td>{{$val->id}}</td>
								<td><img style="max-height: 100px;" src="{{$val->img}}"></td>
								<td class="center">{{$val->name}}</td>
								<td class="center">banner3</td>
								<td class="center">{{$val->link}}</td>
								
								<td class="center">
									<!-- <a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>  
									</a> -->
									<a class="btn btn-info" href="admin/theme/edit/{{$val->id}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="admin/theme/delete/{{$val->id}}">
										<i class="halflings-icon white trash"></i> 
									</a>
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