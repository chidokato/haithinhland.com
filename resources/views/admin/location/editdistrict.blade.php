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
					<a href="#"></a>
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



			<form action="admin/location/editdistrict/{{$district['id']}}" method="POST">
			
			<input type="hidden" name="_token" value="{{csrf_token()}}" />

			<p>
				<button type="submit" class="btn  btn-primary"><i class="icon-save"></i> Save</button>
				<button type="reset" class="btn  btn-primary"><i class="icon-refresh"></i> Reset</button>
			</p>
			
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
								<label>Name</label>
								<div>
									<div>
									  <input value="{!! old('name', isset($district['name']) ? $district['name']:null) !!}" name='name' type="text" placeholder="Name ..." class="span12">
									</div>
								</div>
							</div>

							<div class="control-group">
								<label for="selectError">Level</label>
								<div>
								  	<select name="city_id" class="chzn-done">
								  		@foreach($city as $val)
								  		<option <?php if($district['city_id'] == $val['id']){echo "selected";} ?> value="{{$val->id}}">{{$val->name}}</option>
								  		@endforeach
								  	</select>
								</div>
						  	</div>

							<!-- <div class="control-group">
								<label>Parent</label>
								<div>
									<div>
									  <input name='parent' type="text" placeholder="Parent ..." class="span12">
									</div>
								</div>
							</div> -->
							<div class="control-group">
								<label>View</label>
								<div>
									<div>
									  <input value="{!! old('view', isset($district['view']) ? $district['view']:null) !!}" name='view' type="text" placeholder="View ..." class="span12">
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
								<label>Title</label>
								<div>
									<div>
									  <input value="{!! old('title', isset($district['title'])?$district['title']:null) !!}" name='title' type="text" placeholder="Title ..." class="span12">
									</div>
								</div>
							</div>

							<div class="control-group">
								<label>Description</label>
								<div>
									<div>
									  <input value="{!! old('description', isset($district['description'])?$district['description']:null) !!}" name='description' type="text" placeholder="Description ..." class="span12">
									</div>
								</div>
							</div>

							<div class="control-group">
								<label>keywords</label>
								<div>
									<div>
									  <input value="{!! old('keywords', isset($district['keywords'])?$district['keywords']:null) !!}" name='keywords' type="text" placeholder="keywords ..." class="span12">
									</div>
								</div>
							</div>

							<div class="control-group">
								<label for="selectError3">Robot</label>
								<div>
								  	<select name='robot' id="selectError3">
										<option <?php if($district['robot'] == 0){echo "selected";} ?> value="0">index, follow</option>
										<option <?php if($district['robot'] == 1){echo "selected";} ?> value="1">noindex, nofollow</option>
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

