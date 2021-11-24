@extends('admin.layout.index')

@section('setting')
class="active"
@endsection

@section('content')

<div id="content" class="span10" style="min-height: 1000px;">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i> <a href="admin/dashboard">Dashboard</a> <i class="icon-angle-right"></i> 
		</li>
		<li>
			<a href="admin/category/list">setting</a>
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

	<form action="admin/setting/edit/{{$data['id']}}" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{csrf_token()}}" />

	<p>
		<button type="submit" class="btn  btn-primary"><i class="icon-save"></i> Save </button>
	</p>
	
	<div class="row-fluid">
		<div class="box span6">
			<div class="box-header">
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>Content</h2>
			</div>
			<div class="box-content form-horizontal">
				<fieldset>
					<div class="control-group">
						<label >Name</label>
					  	<input value="{!! old('name'), isset($data['name'])?$data['name']:null !!}" name='name' type="text" placeholder="Name ..." class="span12">
					</div>
					<div class="control-group">
						<label >address</label>
					  	<input value="{!! old('address'), isset($data['address'])?$data['address']:null !!}" name='address' type="text" placeholder="address ..." class="span12">
					</div>
					<div class="control-group">
						<label >email</label>
					  	<input value="{!! old('email'), isset($data['email'])?$data['email']:null !!}" name='email' type="text" placeholder="email ..." class="span12">
					</div>
					<div class="">
						<div class="control-group">
							<label >hotline</label>
						  	<input value="{!! old('hotline'), isset($data['hotline'])?$data['hotline']:null !!}" name='hotline' type="text" placeholder="hotline ..." class="span12">
						</div>
						<div class="control-group">
							<label >hotline</label>
						  	<input value="{!! old('hotline1'), isset($data['hotline1'])?$data['hotline1']:null !!}" name='hotline1' type="text" placeholder="hotline1 ..." class="span12">
						</div>
					</div>
					<div>
						<div class="control-group">
							<label >Analytics</label>
						  	<input value="{!! old('analytics'), isset($data['analytics'])?$data['analytics']:null !!}" name='analytics' type="text" placeholder="analytics ..." class="span12">
						</div>
						<div class="control-group">
							<label >Fb app id</label>
						  	<input value="{!! old('fb_app_id'), isset($data['fb_app_id'])?$data['fb_app_id']:null !!}" name='fb_app_id' type="text" placeholder="fb app id ..." class="span12">
						</div>
					</div>
					<div class="control-group">
						<img style="max-height: 100px;" src="{{$data->img}}">
					</div>
					<div class="control-group">
						<label>Favicon</label>
						<input type="text" name="img" id="image" class="span10"><button onclick="BrowseServer();" class="btn" type="button">Go!</button>
					</div>
				</fieldset>
			</div>
		</div><!--/span-->

		<div class="box span6">
			<div class="box-header">
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>Seo</h2>
			</div>
			<div class="box-content form-horizontal">
				<fieldset>
					<div class="control-group">
						<label >Title</label>
						<input value="{!! old('title'), isset($data['title'])?$data['title']:null !!}" name='title' type="text" placeholder="title ..." class="span12">
					</div>
					<div class="control-group">
						<label >description</label>
					  	<input value="{!! old('description'), isset($data['description'])?$data['description']:null !!}" name='description' type="text" placeholder="description ..." class="span12">
					</div>
					<div class="control-group">
						<label >Keywords</label>
					  	<input value="{!! old('keywords'), isset($data['keywords'])?$data['keywords']:null !!}" name='keywords' type="text" placeholder="keywords ..." class="span12">
					</div>
					<div class="control-group">
						<label>Robot</label>
						  	<select name='robot' class="span12">
								<option <?php if($data['robot']==0){echo'selected';} ?> value="0">index, follow</option>
								<option <?php if($data['robot']==1){echo'selected';} ?> value="1">noindex, nofollow</option>
						  	</select>
				 	</div>
				</fieldset>
			</div>
		</div><!--/span-->

		<div class="box span6">
			<div class="box-header">
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>Social</h2>
			</div>
			<div class="box-content form-horizontal">
				<fieldset>
					<div class="control-group">
						<label >Facebook</label>
					  	<input value="{!! old('facebook'), isset($data['facebook'])?$data['facebook']:null !!}" name='facebook' type="text" placeholder="facebook ..." class="span12">
					</div>
					<div class="control-group">
						<label >google_plus</label>
					  	<input value="{!! old('google_plus'), isset($data['google_plus'])?$data['google_plus']:null !!}" name='google_plus' type="text" placeholder="google_plus ..." class="span12">
					</div>
					<div class="control-group">
						<label >youtube</label>
					  	<input value="{!! old('youtube'), isset($data['youtube'])?$data['youtube']:null !!}" name='youtube' type="text" placeholder="youtube ..." class="span12">
					</div>
					<div class="control-group">
						<label >twitter</label>
					  	<input value="{!! old('twitter'), isset($data['twitter'])?$data['twitter']:null !!}" name='twitter' type="text" placeholder="twitter ..." class="span12">
					</div>
				</fieldset>
			</div>
		</div><!--/span-->

	</div><!--/row-->

	<div class="row-fluid">
		<div class="box span12">
			<div class="box-header">
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>side_bar</h2>
			</div>
			<div>
				<textarea class="form-control span12" id="message" name="side_bar" rows="10" placeholder="side_bar ...">{!! $data['side_bar'] !!}</textarea>
			</div>
		</div><!--/span-->
	</div>

	<div class="row-fluid">
		<div class="box span12">
			<div class="box-header">
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>Code header</h2>
			</div>
			<div>
				<textarea class="form-control span12" id="message" name="code_header" rows="10" placeholder="Code header ...">{!! $data['code_header'] !!}</textarea>
			</div>
		</div><!--/span-->
	</div>

	<div class="row-fluid">
		<div class="box span12">
			<div class="box-header">
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>Code body</h2>
			</div>
			<div>
				<textarea class="form-control span12" id="message" name="code_body" rows="10" placeholder="Code body ...">{!! $data['code_body'] !!}</textarea>
			</div>
		</div><!--/span-->
	</div>
	</form>
</div>

@endsection