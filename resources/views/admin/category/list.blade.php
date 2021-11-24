@extends('admin.layout.index')

@section('category')
class="active"
@endsection

@section('content')

<div id="content" class="span12" style="min-height: 1000px;">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i> <a href="admin/dashboard">Dashboard</a> <i class="icon-angle-right"></i> 
		</li>
		<li>
			<a href="admin/category/list">Category</a> <i class="icon-angle-right"></i> 
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
	<p><a href="admin/category/add/1"><button class="btn btn-primary"><i class="icon-plus"></i> category product </button></a> <a href="admin/category/add/2"><button class="btn btn-primary"><i class="icon-plus"></i> category news</button></a> <a href="admin/category/add/3"><button class="btn btn-primary"><i class="icon-plus"></i> pages</button></a></p>

	<div class="row-fluid">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i><span class="break"></span>Category product</h2>
				
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
				  	<thead>
					  	
				  	</thead>   
				  	<tbody>
				  		<tr>
						  	<th>STT</th>
							<th>Name</th>
							<th>Sort by</th>
							<th>Alias</th>
							<th>Hits</th>
							<th>date</th>
							<th>date up</th>
						    <th>Actions</th>
					  	</tr>
					  	<?php dequycategory ($cat_data,0,$str='',old('parent_id')); ?>							
				  	</tbody>
			  </table>            
			</div>
		</div><!--/span-->
	</div><!--/row-->


	

</div>

@endsection

@section('function')
<?php 
	function dequycategory ($menulist, $parent_id=0, $str='')
	{
		foreach ($menulist as $value) 
		{
			if ($value['parent'] == $parent_id) 
			{ 
				?>
					<tr>
						<td><?php echo $value['views']; ?></td>
						<td><?php echo $str.$value['name']; ?></td>
						<td><?php
							if($value['sort_by'] == 1){echo 'Menu product';}
							if($value['sort_by'] == 2){echo 'Menu news';}
							if($value['sort_by'] == 3){echo 'Pages';}
						?></td>
						<td class="center"><?php echo $value['slug']; ?></td>
						<td class="center"><?php echo $value['hits']; ?></td>
						<td class="center"><?php echo $value['date']; ?></td>
						<td class="center"><?php echo $value['date_up']; ?></td>
						
						<td class="center">
							<a class="btn btn-success" href="#">
								<i class="halflings-icon white zoom-in"></i>  
							</a>
							<a class="btn btn-info" href="admin/category/edit/<?php echo $value['id']; ?>">
								<i class="halflings-icon white edit"></i>  
							</a>
							<a class="btn btn-danger" href="admin/category/delete/<?php echo $value['id']; ?>">
								<i class="halflings-icon white trash"></i> 
							</a>
						</td>
					</tr>
				<?php
				dequycategory ($menulist, $value['id'], $str.'--');
			}

		}
	}
?>
@endsection

