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
					<a href="admin/theme/list">Theme</a> <i class="icon-angle-right"></i>
				</li>
				<li>
					<a>Edit</a>
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

			@if(session('loi'))
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>
					{{session('loi')}} !
					</strong>
				</div>
			@endif



			<form action="admin/theme/edit/{{$theme['id']}}" method="POST" enctype="multipart/form-data">
			<p>
				<button type="submit" class="btn btn-small btn-primary"><i class="icon-save"></i> Save</button>
				<button type="reset" class="btn btn-small btn-primary"><i class="icon-refresh"></i> Reset</button>
			</p>

			<input type="hidden" name="_token" value="{{csrf_token()}}" />

			<div class="row-fluid">
				<div class="box span6">
					<div class="box-header">
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
									  <input value="{!! old('name'), isset($theme['name'])?$theme['name']:null !!}" name='name' type="text" placeholder="Name ..." class="span12">
									</div>
								</div>
							</div>

						  	<div class="control-group">
								<label>Link</label>
								<div>
									<div>
									  <input value="{!! old('link'), isset($theme['link'])?$theme['link']:null !!}" name='link' type="text" placeholder="link ..." class="span12">
									</div>
								</div>
							</div>

						  	<div class="control-group">
								<label>Vị trí</label>
								<div>
									<div>
										<select name="note" class="span12" >
											<option <?php if($theme['note'] == 'logo') echo "selected"; ?> value="logo">Logo</option>
											<option <?php if($theme['note'] == 'banner') echo "selected"; ?> value="banner">Banner top</option>
											<option <?php if($theme['note'] == 'slide') echo "selected"; ?> value="slide">Slide</option>
											<option <?php if($theme['note'] == '1') echo "selected"; ?> value="1">Banner 1</option>
											<option <?php if($theme['note'] == '2') echo "selected"; ?> value="2">Banner 2</option>
											<option <?php if($theme['note'] == '3') echo "selected"; ?> value="3">Banner 3</option>
									  	</select>
									</div>
								</div>
							</div>

						  	<div class="control-group">
								<img style="max-height: 100px;" src="{!! $theme['img'] !!}">
							</div>
							<div class="control-group">
								<label>Image</label>
								<input type="text" name="img" id="image" class="span10"><button onclick="BrowseServer();" class="btn" type="button">Go!</button>
							</div>
							
							
						</fieldset>
					</div>
				</div><!--/span-->
			</div><!--/row-->
			
			
			</form>
</div>

@endsection

