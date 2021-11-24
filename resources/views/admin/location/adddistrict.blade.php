@extends('admin.layout.index')

@section('content')
<div id="content" class="span10" style="min-height: 1000px;">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Forms</a>
				</li>
			</ul>

			@if(count($errors) > 0)
				@foreach($errors->all() as $err)
					<div class="alert alert-error">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>{{$err}} !</strong>
					</div>
				@endforeach
			@endif

			@if(session('Alerts'))
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>
					{{session('Alerts')}} !
					</strong>
				</div>
			@endif



			<form action="admin/location/adddistrict" method="POST">
			<p>
				<button type="submit" class="btn  btn-primary"><i class="icon-save"></i> Save</button>
				<button type="reset" class="btn  btn-primary"><i class="icon-refresh"></i> Reset</button>
			</p>
			
			<input type="hidden" name="_token" value="{{csrf_token()}}" />

			<div class="row-fluid sortable">
				<div class="box span6">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Content</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content form-horizontal">
						<fieldset>
							<div class="control-group">
								<label for="prependedInput">Name</label>
								<div class="warning">
									<div>
									  <input value="{!! old('name') !!}" name='name' type="text" placeholder="Name ..." class="span12">
									</div>
								</div>
							</div>

							<div class="control-group">
								<label>Level</label>
								<div>
								  	<select name="city_id" class="chzn-done">
								  		@foreach($city as $val)
								  		<option value="{{$val->id}}">{{$val->name}}</option>
								  		@endforeach
								  	</select>
								</div>
						  	</div>

							<!-- <div class="control-group">
								<label for="prependedInput">Parent</label>
								<div class="warning">
									<div>
									  <input name='parent' type="text" placeholder="Parent ..." class="span12">
									</div>
								</div>
							</div> -->
							<div class="control-group">
								<label for="prependedInput">View</label>
								<div class="warning">
									<div>
									  <input name='view' type="text" placeholder="View ..." class="span12">
									</div>
								</div>
							</div>

							
						</fieldset>
					</div>
				</div><!--/span-->
			
				<div class="box span6">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>SEO</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content form-horizontal">
						<fieldset>
							<div class="control-group">
								<label for="prependedInput">Title</label>
								<div class="warning">
									<div>
									  <input name='title' type="text" placeholder="Title ..." class="span12">
									</div>
								</div>
							</div>

							<div class="control-group">
								<label for="prependedInput">Description</label>
								<div class="warning">
									<div>
									  <input name='description' type="text" placeholder="Description ..." class="span12">
									</div>
								</div>
							</div>

							<div class="control-group">
								<label for="prependedInput">keywords</label>
								<div class="warning">
									<div>
									  <input name='keywords' type="text" placeholder="keywords ..." class="span12">
									</div>
								</div>
							</div>

							<div class="control-group">
								<label for="selectError3">Robot</label>
								<div>
								  	<select name='robot' id="selectError3">
										<option value="0">index, follow</option>
										<option value="1">noindex, nofollow</option>
								  	</select>
								</div>
						 	</div>
						</fieldset>
					</div>
				</div><!--/span-->
			</div><!--/row-->
			</form>
</div>

@endsection

@section('function')
	<?php 
		function menuparent ($datamenu, $parent_id=0, $str='',$select=0)
{
	foreach ($datamenu as $value) {
		if ($value['parent_id'] == $parent_id) {
			if($select != 0 && $value['id'] == $select )
			{ ?>
				<option value="<?php echo $value['id']; ?>" selected> <?php echo $str.$value['menu_name']; ?> </option>
			<?php } else { ?>
				<option value="<?php echo $value['id']; ?>" > <?php echo $str.$value['menu_name']; ?> </option>
			<?php }
			
			menuparent ($datamenu, $value['id'], $str.'---',$select);
		}
	}
}
	?>
@endsection