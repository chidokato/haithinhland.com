@extends('admin.layout.index')
@section('product')
class="active"
@endsection
@section('content')

<div id="content" class="span12" style="min-height: 1000px;">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i> <a href="admin/dashboard">Dashboard</a> <i class="icon-angle-right"></i> 
		</li>
		<li>
			<a href="admin/product/list">Product</a> <i class="icon-angle-right"></i> 
		</li>
		<li>
			<a href="">Add</a>
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



	<form action="admin/product/add" method="POST" enctype="multipart/form-data">
	<p><button type="submit" class="btn btn-primary"><i class="icon-save"></i> Save</button></p>
	<input type="hidden" name="_token" value="{{csrf_token()}}" />

	<div class="row-fluid">
		<div class="box span6">
			<div class="box-header" >
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>Tổng quan</h2>
				<div class="box-icon">
					<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
				</div>
			</div>
			<div class="box-content ">
				<fieldset>
					<div class="control-group">
						<label >Name</label>
						<div>
							<div>
							  <input required name='name' type="text" placeholder="Name ..." class="span12 ">
							</div>
						</div>
					</div>

					<div>
						<div class="control-group span6">
							<label >Category</label>
							<div>
								<select name="cat_id" class="span12">
									<?php addeditcatecogy ($data,0,$str='',old('parent')); ?>
								</select>
							</div>
						</div>
						<div class="control-group span6">
							<label >Tag</label>
							<div>
								<div>
								  <input name='tag' type="text" placeholder="tag ..." class="span12 ">
								</div>
							</div>
						</div>
				  	</div>

				  	<div>
				  		<div class="control-group span6">
							<label >Address</label>
							<div>
								<div>
								  <input name='address' type="text" placeholder="address ..." class="span12 ">
								</div>
							</div>
						</div>
						<div class="control-group span6">
							<label >price</label>
							<div>
								<div>
								  <input name='price' type="text" placeholder="price ..." class="span12 ">
								</div>
							</div>
						</div>
				  	</div>

					<div class="control-group">
						<label>location</label>
						<div>
						  	<select required class="span6 " id="city" >
						  		<option value="">--Tỉnh Thành--</option>
						  		@foreach($city as $val)
								<option  value="{{$val->id}}">{{$val->name}}</option>
								@endforeach
						  	</select>

						  	<select required name='dis_id' class="span6 " id="district" >
								<option value="">--Quận Huyện--</option>
						  	</select>
						</div>
				 	</div>
					
				</fieldset>
			</div>
		</div><!--/span-->
		<div class="box span6">
			<div class="box-header" >
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>SEO</h2>
				<div class="box-icon">
					<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
				</div>
			</div>
			<div class="box-content ">
				<fieldset>
					<div class="control-group">
						<label >Title</label>
						<div>
							<div>
							  <input name='title' type="text" placeholder="Title ..." class="span10 ">
							</div>
						</div>
					</div>

					<div class="control-group">
						<label >Description ( <small>Còn lại <input readonly type="text" name="left" size=3 maxlength=3 value="160" style='color: red; width: 23px; background: none; border: none; padding: 0px; margin-bottom: 1px;' > ký tự</small> )</label>
						<div>
							<div>
								<input name="description" placeholder="Description ..." type="text" id="fname" onKeyDown="CountLeft(this.form.fname, this.form.left,160);" onKeyUp="CountLeft(this.form.fname,this.form.left,160);" class="span12 typeahead">
				 	            
							  <!-- <input name='description' type="text" placeholder="Description ..." class="span10 "> -->
							</div>
						</div>
					</div>

					<div class="control-group">
						<label >keywords</label>
						<div>
							<div>
							  <input name='keywords' type="text" placeholder="keywords ..." class="span10 ">
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
	
	<div class="row-fluid ">
		<div class="box span4">
			<div class="box-header" >
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>Content</h2>
				<div class="box-icon">
					<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
				</div>
			</div>
			<div class="box-content ">
				<fieldset>
					<div class="control-group">
						<label>Image</label>
						<input style="margin-bottom: 0px;" type="text" name="img" id="image" class="span10"><button onclick="BrowseServer();" class="btn" type="button">Go!</button>
					</div>
					
					<div class="control-group">
						<label>Status</label>
						<div>
						  	<label class="radio">
								<input type="radio" name="status"  value="1" checked="">Public
						  	</label>
						  	<label class="radio" style="padding-top: 5px;">
								<input type="radio" name="status"  value="0">Hidden
						  	</label>
						</div>
					</div>
					<div class="control-group">
						<label>Hot</label>
						<div>
						  	<label class="radio" style="padding-top: 5px;">
								<input type="radio" name="hot"  value="0" checked="">No
						  	</label>
						  	<label class="radio">
								<input type="radio" name="hot"  value="1">Yes
						  	</label>
						</div>
					</div>
				</fieldset>
			</div>
		</div><!--/span-->
		<div class="box span8">
			<div class="box-header" >
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>Mô tả ngắn</h2>
				<div class="box-icon">
					<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
				</div>
			</div>
			<div class="box-content ">
				<fieldset>
					<textarea class="span12 ckeditor" name="detail"></textarea>
				</fieldset>
			</div>
		</div><!--/span-->
	</div><!--/row-->

	<div class="row-fluid">
		
		<div class="box span12">
			<div class="box-header">
				<h2><i class="halflings-icon white th"></i><span class="break"></span>content</h2>
			</div>
			<div class="box-content">
				<ul class="nav tab-menu nav-tabs" id="myTab">
					<li class="active"><a href="#0">Tổng quan</a></li>
					<li><a href="#1">Vị trí</a></li>
					<li><a href="#2">Tiện ích</a></li>
					<li><a href="#3">Mặt bằng</a></li>
					<li><a href="#4">Nội thất</a></li>
					<li><a href="#5">tiến độ</a></li>
					<li><a href="#6">Chính sách</a></li>
				</ul>
				 
				<div id="myTabContent" class="tab-content">
					<div class="tab-pane active" id="0">
						<input name='heading' type="text" placeholder="Content title ..." class="span12 ">
						<textarea class="span12  ckeditor" name="content"></textarea>
					</div>
					 <div class="tab-pane" id="1">
						<input name='heading1' type="text" placeholder="Content title ..." class="span12 ">
						<textarea class="span12  ckeditor" name="content1"></textarea>
					</div>
					<div class="tab-pane" id="2">
						<input name='heading2' type="text" placeholder="Content title ..." class="span12 ">
						<textarea class="span12  ckeditor" name="content2"></textarea>
					</div>
					<div class="tab-pane" id="3">
						<input name='heading3' type="text" placeholder="Content title ..." class="span12 ">
						<textarea class="span12  ckeditor" name="content3"></textarea>
					</div>
					<div class="tab-pane" id="4">
						<input name='heading4' type="text" placeholder="Content title ..." class="span12 ">
						<textarea class="span12  ckeditor" name="content4"></textarea>
					</div>
					<div class="tab-pane" id="5">
						<input name='heading5' type="text" placeholder="Content title ..." class="span12 ">
						<textarea class="span12  ckeditor" name="content5"></textarea>
					</div> 
					<div class="tab-pane" id="6">
						<input name='heading6' type="text" placeholder="Content title ..." class="span12 ">
						<textarea class="span12  ckeditor" name="content6"></textarea>
					</div>
					
				</div>
			</div>
		</div><!--/span-->

	</div>
	<p><button type="submit" class="btn btn-primary"><i class="icon-save"></i> Save</button></p>
	</form>
</div>

@endsection

@section('script')
	<SCRIPT LANGUAGE="JavaScript">
		function CountLeft(field, count, max) {
		if (field.value.length > max)
		field.value = field.value.substring(0, max);
		else
		count.value = max - field.value.length;
		}
	</script>


	<script type="text/javascript">
		$(document).ready(function(){
			//alert('ok');
			$("#city").change(function(){
				var city_id = $(this).val();
				//alert(mid)
				$.get("admin/ajax/location/"+city_id,function(data){
					$("#district").html(data);
				});
			});

		});
	</script>
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