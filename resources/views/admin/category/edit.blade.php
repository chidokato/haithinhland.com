@extends('admin.layout.index')

@section('category')
class="active"
@endsection

@section('content')

<div id="content" class="span10" style="min-height: 1000px;">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i> <a href="admin/dashboard">Dashboard</a> <i class="icon-angle-right"></i> 
				</li>
				<li>
					<a href="admin/category/list">Category</a> <i class="icon-angle-right"></i> 
				</li>
				<li>
					<a href="">edit</a> 
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



			<form action="admin/category/edit/{{$data['id']}}" method="POST">
			
			<input type="hidden" name="_token" value="{{csrf_token()}}" />

			<p>
				<button type="submit" class="btn  btn-primary"><i class="icon-save"></i> Save </button>
				<button type="reset" class="btn  btn-primary"><i class="icon-refresh"></i> Reset</button>
			</p>
			
			<div class="row-fluid">
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Content</h2>
					</div>
					<div class="box-content form-horizontal">
						<fieldset>
							<div class="control-group">
								<label class="" >Name</label>
								<div class="">
									<div class="">
									  <input value="{!! old('name'), isset($data['name'])?$data['name']:null !!}" name='name' type="text" placeholder="Name ..." class="span12 ">
									</div>
								</div>
							</div>

							<div class="control-group">
								<label class="" >Slug</label>
								<div class="">
									<div class="">
									  <input value="{!! old('slug'), isset($data['slug'])?$data['slug']:null !!}" name='slug' type="text" placeholder="Slug ..." class="span12 ">
									</div>
								</div>
							</div>

							<div class="control-group">
								<label class="" for="selectError">Level</label>
								<div class="">
								  	<select name="parent" class="span12">
								  		<option value="0">-- ROOT --</option>
								  		<?php addeditcatecogy ($categoryparent,0,$str='',$data['parent']); ?>
								  	</select>
								</div>
						  	</div>

							<!-- <div class="control-group">
								<label class="" >Parent</label>
								<div class="">
									<div class="">
									  <input name='parent' type="text" placeholder="Parent ..." class="span6 ">
									</div>
								</div>
							</div> -->
							<div class="control-group">
								<label class="" >View</label>
								<div class="">
									<div class="">
									  <input value="{!! old('view'), isset($data['views'])?$data['views']:null !!}" name='view' type="text" placeholder="View ..." class="span12 ">
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
								<label class="" >Title</label>
								<div class="">
									<div class="">
									  <input value="{!! old('title'), isset($data['title'])?$data['title']:null !!}" name='title' type="text" placeholder="Title ..." class="span12 ">
									</div>
								</div>
							</div>

							<div class="control-group">
								<label class="" >Description</label>
								<div class="">
									<div class="">
									  <input value="{!! old('description'), isset($data['description'])?$data['description']:null !!}" name='description' type="text" placeholder="Description ..." class="span12 ">
									</div>
								</div>
							</div>

							<div class="control-group">
								<label class="" >keywords</label>
								<div class="">
									<div class="">
									  <input value="{!! old('keywords'), isset($data['keywords'])?$data['keywords']:null !!}" name='keywords' type="text" placeholder="keywords ..." class="span12 ">
									</div>
								</div>
							</div>

							<div class="control-group">
								<label class="" for="selectError3">Robot</label>
								<div class="">
								  	<select name='robot' class="span12">
										<option value="0">index, follow</option>
										<option value="1">noindex, nofollow</option>
								  	</select>
								</div>
						 	</div>
						</fieldset>
					</div>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>SEO</h2>
						
					</div>
					<div class="box-content form-horizontal">
						<textarea class="span12  ckeditor" name="content">{!! old('content', isset($data['content']) ? $data['content']:null) !!}</textarea>
					</div>
				</div><!--/span-->
				
			</div>

			

			</form>
</div>

@endsection

@section('function')
	<?php 
		function addeditcatecogy ($data, $parent=0, $str='',$select=0)
{
	foreach ($data as $value) {
		if ($value['parent'] == $parent) {
			if($select != 0 && $value['id'] == $select )
			{ ?>
				<option value="<?php echo $value['id']; ?>" selected> <?php echo $str.$value['name']; ?> </option>
			<?php } else { ?>
				<option value="<?php echo $value['id']; ?>" > <?php echo $str.$value['name']; ?> </option>
			<?php }
			
			addeditcatecogy ($data, $value['id'], $str.'---',$select);
		}
	}
}
	?>
@endsection