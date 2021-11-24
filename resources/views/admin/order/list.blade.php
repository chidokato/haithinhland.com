@extends('admin.layout.index')

@section('order')
class="active"
@endsection

@section('content')

<div id="content" class="span12" style="min-height: 1000px;">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i> <a href="admin/dashboard">Dashboard</a> <i class="icon-angle-right"></i> 
		</li>
		<li>
			<a href="admin/order/list">order</a> <i class="icon-angle-right"></i> 
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

	<div class="row-fluid">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i><span class="break"></span>{{$count}} khách chưa check</h2>
				
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
				  	<thead>
					  	
				  	</thead>   
				  	<tbody>
				  		<tr>
						  	<th>STT</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>link</th>
							<th>date</th>
						    <th>Actions</th>
					  	</tr>
					  	
					  	@foreach($order as $val)
					  	<?php $stt--; ?>
					  	<tr>
					  		<td>{{$stt + 1}}</td>
					  		<td <?php if($val->view == 0){echo "style='color: red;'";} ?> >{{$val->name}}</td>
					  		<td>{{$val->email}}</td>
					  		<td>{{$val->phone}}</td>
					  		<td>{{$val->link}}</td>
					  		<td>{{$val->date}}</td>
					  		<td>
					  			<a class="btn btn-success" href="admin/order/check/{{$val->id}}">
									<i class="halflings-icon white check"></i> 
								</a>
								<a class="btn btn-danger" href="admin/order/delete/{{$val->id}}">
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


