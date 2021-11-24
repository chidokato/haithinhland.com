@extends('admin.layout.index')
@section('news')
class="active"
@endsection
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

	@if(session('loi'))
		<div class="alert alert-error">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>
			{{session('loi')}} !
			</strong>
		</div>
	@endif



	<form action="admin/news/edit/{{$news['id']}}" method="POST" enctype="multipart/form-data">
	<p> <button type="submit" class="btn btn-primary"><i class="icon-save"></i> Save</button> </p>

	<input type="hidden" name="_token" value="{{csrf_token()}}" />

	<div class="row-fluid">
		<div class="box span6">
			<div class="box-header">
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>Content</h2>
			</div>
			<div class="box-content form-horizontal">
				<fieldset>
					<div class="control-group">
						<label>Name</label>
						<div>
							<div>
							  <input value="{!! old('name'), isset($news['name'])?$news['name']:null !!}" name='name' type="text" placeholder="Name ..." class="span12">
							</div>
						</div>
					</div>

					<div>
						<div class="control-group span6">
							<label for="selectError">Category</label>
							<div>
								<select name="cat_id" >
									<?php addeditcatecogy ($datacategory,0, $str='',$news['cat_id']) ?>
								</select>
							</div>
						</div>
						<div class="control-group span6">
							<label>Tag</label>
							<div>
								<div>
								  <input value="{!! old('tag'), isset($news['tag'])?$news['tag']:null !!}" name='tag' type="text" placeholder="tag ..." class="span12">
								</div>
							</div>
						</div>
				  	</div>
					
					<div class="control-group">
						<label>Url</label>
						<div>
							<div>
							  <input value="{!! old('slug'), isset($news['slug'])?$news['slug']:null !!}" name='slug' type="text" placeholder="Url ..." class="span12">
							</div>
						</div>
					</div>
				  	
				  	<div class="control-group">
						<img style="max-height: 100px;" src="{!! $news['img'] !!}">
					</div>
					<div class="control-group">
						<label>Images</label>
						<input type="text" name="img" id="image" class="span10"><button onclick="BrowseServer();" class="btn" type="button">Go!</button>
					</div>

					<div class="control-group">
						<label>Status</label>
						<div>
						  	<label class="radio">
								<input <?php if($news['status'] == 1){ echo 'checked'; } ?> type="radio" name="status"  value="1" >Public
						  	</label>
						  	<label class="radio" style="padding-top: 5px;">
								<input <?php if($news['status'] == 0){ echo 'checked'; } ?> type="radio" name="status"  value="0" >Hidden
						  	</label>
						</div>
					</div>

					<div class="control-group">
						<label>Hot news</label>
						<div>
						  	<label class="radio">
								<input <?php if($news['hot'] == 0){ echo 'checked'; } ?> type="radio" name="hot"  value="0" >No
						  	</label>
						  	<label class="radio" style="padding-top: 5px;">
								<input <?php if($news['hot'] == 1){ echo 'checked'; } ?> type="radio" name="hot"  value="1" >Yes
						  	</label>
						</div>
					</div>
				</fieldset>
			</div>
		</div><!--/span-->
		<div class="box span6">
			<div class="box-header">
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
							  <input value="{!! old('title'), isset($news['title'])?$news['title']:null !!}" name='title' type="text" placeholder="Title ..." class="span12">
							</div>
						</div>
					</div>

					<div class="control-group">
						<label>Description ( <small>Còn lại <input readonly type="text" name="left" size=3 maxlength=3 value="{!! $news['desc_size'] !!}" style='color: red; width: 23px; background: none; border: none; padding: 0px; margin-bottom: 1px;' > ký tự</small> )</label>
						<div>
							<div>
								<input value="{!! old('description'), isset($news['description'])?$news['description']:null !!}" name="description" placeholder="Description ..." type="text" id="fname" onKeyDown="CountLeft(this.form.fname, this.form.left,160);" onKeyUp="CountLeft(this.form.fname,this.form.left,160);" class="span12 typeahead">
						 	            
							</div>
						</div>
					</div>

					<div class="control-group">
						<label>keywords</label>
						<div>
							<div>
							  <input value="{!! old('keywords'), isset($news['keywords'])?$news['keywords']:null !!}" name='keywords' type="text" placeholder="keywords ..." class="span12">
							</div>
						</div>
					</div>

					<div class="control-group">
						<label for="selectError3">Robot</label>
						<div>
						  	<select name='robot' id="selectError3">
								<option <?php if($news['robot'] == 0){ echo 'selected'; } ?> value="0">index, follow</option>
								<option <?php if($news['robot'] == 1){ echo 'selected'; } ?> value="1">noindex, nofollow</option>
						  	</select>
						</div>
				 	</div>
				</fieldset>
			</div>
		</div><!--/span-->
	</div><!--/row-->

	<div class="row-fluid">
		<div class="box span12">
			<div class="box-header">
				<h2><i class="halflings-icon white th"></i><span class="break"></span>Content</h2>
			</div>
			<div class="box-content form-horizontal">
				<fieldset>
					<div class="control-group">
						<label for="selectError3">Mô tả ngắn</label>
						<textarea class="span12" rows="3" name="detail">{!! old('detail'), isset($news['detail'])?$news['detail']:null !!}</textarea>
					</div>
					<div class="control-group">
						<label for="selectError3">Nội dung</label>
						<textarea class="span12 ckeditor" rows="3" name="content">{!! old('content'), isset($news['content'])?$news['content']:null !!}</textarea>
					</div>
					
				</fieldset>
			</div>
		</div><!--/span-->
	</div>
	<p> <button type="submit" class="btn btn-primary"><i class="icon-save"></i> Save</button> </p>
	
	</form>
</div>

@endsection


@section('script')
	<script type="text/javascript">
		$(document).ready(function(){
			//alert('ok');
			$("#menu").change(function(){
				var mid = $(this).val();
				//alert(mid)
				$.get("admin/ajax/menusub/"+mid,function(data){
					$("#menusub").html(data);
				});
			});

		});
	</script>

	<SCRIPT LANGUAGE="JavaScript">
		function CountLeft(field, count, max) {
		if (field.value.length > max)
		field.value = field.value.substring(0, max);
		else
		count.value = max - field.value.length;
		}
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

