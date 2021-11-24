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



			<form action="admin/user/edit/{{$user->id}}" method="POST">
			<p>
				<button type="submit" class="btn btn-small btn-primary"><i class="icon-save"></i> Save</button>
				<button type="reset" class="btn btn-small btn-primary"><i class="icon-refresh"></i> Reset</button>
			</p>
			<input type="hidden" name="_token" value="{{csrf_token()}}" />
			<div class="row-fluid sortable">
				<div class="box span12">
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
								<label class="control-label" for="prependedInput">Name</label>
								<div class="warning">
									<div class="controls">
									  <input value="{{$user->name}}" name='name' type="text" placeholder="Name ..." class="span6 typeahead">
									</div>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="prependedInput">Email</label>
								<div class="warning">
									<div class="controls">
									  <input readonly value="{{$user->email}}" name='email' type="email" placeholder="Email ..." class="span6 typeahead">
									</div>
								</div>
							</div>

							<div class="">
								<div class="warning">
									<div class="controls">
									  <input type="checkbox" id='changepassword' name="changepassword" />  Edit password
									</div>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="prependedInput">Password</label>
								<div class="warning">
									<div class="controls">
									  <input disabled name='password' type="Password" placeholder="Password ..." class="span6 typeahead pass">
									</div>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="prependedInput">Password</label>
								<div class="warning">
									<div class="controls">
									  <input disabled name='passwordagain' type="Password" placeholder="Password ..." class="span6 typeahead pass">
									</div>
								</div>
							</div>

							
							
							<div class="control-group">
								<label class="control-label" for="selectError3">Permission</label>
								<div class="controls">
								  	<select <?php if ($user->permission == 0) { echo "disabled"; } ?> name='permission' id="selectError3">
										<option <?php if ($user->permission == 0) { echo "selected"; } ?> disabled value="0">superadmin</option>
										<option <?php if ($user->permission == 1) { echo "selected"; } ?> value="1">admin</option>
										<option <?php if ($user->permission == 2) { echo "selected"; } ?> value="2">author</option>
										<option <?php if ($user->permission == 3) { echo "selected"; } ?> value="3">member</option>
								  	</select>
								</div>
						 	</div>
							

							
						</fieldset>
					</div>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid sortable">
				<div class="box span12">
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
								<label class="control-label" for="prependedInput">Title</label>
								<div class="warning">
									<div class="controls">
									  <input value="{{$user->title}}" name='title' type="text" placeholder="Title ..." class="span6 typeahead">
									  <span class="help-inline"> < 60 ký tự </span>
									</div>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="prependedInput">Description</label>
								<div class="warning">
									<div class="controls">
									  <input value="{{$user->description}}" name='description' type="text" placeholder="Description ..." class="span6 typeahead">
									  <span class="help-inline"> < 150 ký tự </span>
									</div>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="prependedInput">keywords</label>
								<div class="warning">
									<div class="controls">
									  <input value="{{$user->keywords}}" name='keywords' type="text" placeholder="keywords ..." class="span6 typeahead">
									  <span class="help-inline"> 5 - 7 từ khóa </span>
									</div>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="selectError3">Robot</label>
								<div class="controls">
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

@section('script')
	<script>
		$(document).ready(function(){
			$('#changepassword').change(function(){
				if ($(this).is(":checked")) {
					$(".pass").removeAttr('disabled');
				}
				else
				{
					$(".pass").attr('disabled','');
				}
			});
		});
	</script >
@endsection