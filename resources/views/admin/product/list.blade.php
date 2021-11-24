@extends('admin.layout.index')
@section('product')
class="active"
@endsection
@section('content')

<div id="content" class="span10" style="min-height: 1000px;">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i> <a href="admin/dashboard">Dashboard</a> <i class="icon-angle-right"></i> 
		</li>
		<li>
			<a href="admin/product/list">Product</a>
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
	<p><a href="admin/product/add"><button class="btn btn-primary"><i class="icon-plus"></i> Add</button></a></p>
	<div class="row-fluid">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i><span class="break"></span>Members</h2>
				
			</div>
			<div class="box-content">
				<table class="table">
				  <thead>
					  
				  </thead>   
				  <tbody>
				  	<tr>
						<th style="text-align: center;">STT</th>
						<th></th>
						<th>Name</th>
						<th>Category</th>
						<th>Hot</th>
						<th>Status</th>
						<th style="text-align: center;">Hits</th>
						<th>date</th>
						<th>date up</th>
						<th>Actions</th>
				  </tr>
				  	@foreach($product as $val)
				  	<?php $stt-- ?>
					<tr>
						<td style="text-align: center;">{{$stt+1}}</td>
						<td><img style="max-height:50px" src="{{$val->img}}"/></td>
						<td>{{$val->name}}</td>
						<td><?php if(isset($val->Category->name)){echo $val->Category->name;} ?></td>
						<td class="center">
							<?php
								if($val['hot']==1) echo "Hot";
								//else echo "<span style='color: red;'>Hidden</span>";
							?>
						</td>
						<td class="center">
							<?php
								//if($val['product_status']==1) echo "Public";
								// else echo "<span style='color: red;'>Hidden</span>";
							?>
						</td>
						<td style="text-align: center;">{{$val->hits}}</td>
						<td>{{$val->date}}</td>
						<td>{{$val->date_up}}</td>
						
						<td>
							<!--a title="xem" class="btn btn-success" target="_blank" href="{{asset('')}}">
								<i class="halflings-icon white zoom-in"></i>  
							</a-->
							<a title="sửa" class="btn btn-info" href="admin/product/edit/{{$val->id}}">
								<i class="halflings-icon white edit"></i>  
							</a>
							<!--a title="mặt bằng" class="btn btn-primary" href="admin/matbang/list/{{$val->id}}">
								<i class="halflings-icon white qrcode"></i>  
							</a-->
							<a title="Ảnh" class="btn btn-warning" href="admin/image/list/{{$val->id}}">
								<i class="halflings-icon white picture"></i>  
							</a>
							<a title="xóa" class="btn btn-danger" href="admin/product/delete/{{$val->id}}">
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