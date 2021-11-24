@extends('admin.layout.index')
@section('news')
class="active"
@endsection
@section('content')

<style type="text/css">
	.pagination{
		padding-bottom: 10px
	}
	.pagination li{
	    float: left;
	    list-style: none;
	    margin: 5px;
	    color: #fff;
	    margin-top: -10px;
	}
	.pagination li a{
		color: #fff;
		padding: 5px 10px;
	    background-color: #5bc0de;
	}
	.pagination li a:hover{
		text-decoration: none;
		background-color: #e25a59;
	}
	.pagination .active{
		background-color: #e25a59;
		padding: 5px 10px;
	    margin-top: -15px;
	}
	.pagination .disabled{
		background-color: #5bc0de;
		padding: 5px 10px;
	    margin-top: -15px;
	}
</style>

<div id="content" class="span12" style="min-height: 1000px;">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i> <a href="admin/dashboard">Dashboard</a> <i class="icon-angle-right"></i> 
				</li>
				<li>
					<a href="admin/news/list">News</a>
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
			<p><a href="admin/news/add"><button class="btn btn-primary"><i class="icon-plus"></i> Add</button></a></p>
			<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Members</h2>
						
					</div>
					<div class="box-content">
					{!! $news->links() !!}  
						<table class="table">
						  <thead>
							  
						  </thead>   
						  <tbody>
						  	<tr>
								<th>ID</th>
								<th></th>
								<th>Name</th>
								<th>Category</th>
								<th>Hot</th>
								<th>Status</th>
								<th>Hits</th>
								<th>date</th>
								<th>date up</th>
								<th>Actions</th>
						  </tr>
						  	@foreach($news as $val)
						  	
							<tr>
								<td>{{$val->id}}</td>
								<td><img style="max-height: 70px;" src="{{$val->img}}"></td>
								<td>{{$val->name}}</td>
								<td><?php if(isset($val->Category->name)){echo $val->Category->name;} ?></td>
								<td class="center">
									<?php
										if($val['hot']==1) echo "Hot";
										// else echo "<span style='color: red;'>Hidden</span>";
									?>
								</td>
								<td class="center">
									<?php
										if($val['status']==1) echo "Public";
										// else echo "<span style='color: red;'>Hidden</span>";
									?>
								</td>
								<td class="center">{{$val->hits}}</td>
								<td class="center">{{$val->date}}</td>
								<td class="center">{{$val->date_up}}</td>
								
								<td class="center">
									<a class="btn btn-success" target="_blank" href="{{asset('')}}/{{$val->slug}}/{{$val->id}}.html">
										<i class="halflings-icon white zoom-in"></i>  
									</a>
									<a class="btn btn-info" href="admin/news/edit/{{$val->id}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="admin/news/delete/{{$val->id}}">
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