@extends('layout.index')

@section('title')
<?php if ( $singleproduct['title'] == '' ) echo $singleproduct['name']; else echo $singleproduct['title']; ?>
@endsection
@section('description')
<?php echo $singleproduct['description']; ?>
@endsection
@section('keywords')
<?php echo $singleproduct['keywords']; ?>
@endsection
@section('robots')
<?php if ( $singleproduct['robot'] == 0 ) echo "index, follow";  elseif ( $singleproduct['robot'] == 1 ) echo "noindex, nofollow"; ?>
@endsection
@section('url')
<?php echo asset('').$singleproduct->category['slug'].'/'.$singleproduct['slug'].'/'.$singleproduct['id'].'.html'; ?>
@endsection
@section('img')
<?php echo "http://haithinhland.com".$singleproduct['img']; ?>
@endsection

@section('content')

<header class="pc-header uk-visible-large">
	
	<section class="upper">
		<div class="uk-container uk-container-center">
			<div class="uk-flex uk-flex-middle uk-flex-space-between container">
				@foreach($head_logo as $val)
				<div class="logo" itemscope itemtype="http://schema.org/Hotel">
					<a itemprop="url" href="{{asset('')}}" title="{{$val->name}}">
						<img src="{{$val->img}}" style='height: 80px;' alt="{{$val->name}}" itemprop="logo" />
					</a>
					<span class="uk-hidden">{{$val->name}}</span>
				</div>
				@endforeach
				<div class="hd-search header-search">
					<form action="" method="" class="uk-form form">
						<input type="text" name="keyword" class="uk-width-1-1 input-text keyword" placeholder="Tìm kiếm sản phẩm..." />
						<button type="submit" name="" class="btn-submit">Tìm kiếm</button>
					</form>
					<div class="searchResult"></div>
				</div>
				<div class="hd-hotline">
					<span class="label">Hotline</span>
					<a class="number" href="tel:{{$head_setting->hotline}}" title="Hotline">{{$head_setting->hotline}}</a>
				</div>
			</div><!-- .container -->
		</div>
	</section><!-- .upper -->
	<div style='background-color: #2b5aa6;'>
	<section class="lower">
		<div class="uk-container uk-container-center">
			<nav class="main-nav">
				<ul class="uk-navbar-nav uk-clearfix main-menu">
					<li>
                        <a href="{{asset('')}}">Trang chủ</a>
                    </li>
					@foreach($head_category as $item)
                        @if($item['parent'] == 0)
                            <li class='<?php if($activemenu == $item->slug){echo 'active';} ?>'>
                                <a href="{{$item->slug}}">{{$item->name}}</a>
                                <?php $count = DB::table('tbl_category')->where('parent',$item->id)->count(); ?>
                                <?php if($count>0) { subcategory ($head_category,$item['id']); } ?>
                            </li>
                        @endif
                    @endforeach
				</ul>
			</nav><!-- .main-nav -->		
		</div>
	</section><!-- .lower -->
	</div>
</header><!-- .header -->
<!-- MOBILE HEADER -->
<header class="mobile-header uk-hidden-large">
	<section class="upper">
		<a class="moblie-menu-btn skin-1" href="#offcanvas" class="offcanvas" data-uk-offcanvas="{target:'#offcanvas'}">
			<span>Menu</span>
		</a>
		<div class="logo">
			@foreach($head_logo as $val)
			<a href="{{asset('')}}" title="{{$val->name}}"><img src="{{$val->img}}" alt="{{$val->name}}" /></a>
			@endforeach
		</div>
		<a class="mobile-hotline" href="tel: {{$head_setting->hotline}}" title="Hotline">
			<span class="label">Hotline: </span>
			<span class="value">{{$head_setting->hotline}}</span>
		</a>
	</section><!-- .upper -->
	<section class="lower">
		<div class="mobile-search header-search">
			<form action="#" method="" class="uk-form form">
				<input type="text" name="" class="uk-width-1-1 input-text keyword" placeholder="Bạn muốn tìm gì hôm nay?" />
				<button type="submit" name="" value="" class="btn-submit">Tìm kiếm</button>
			</form>
			<div class="searchResult"></div>
		</div>
	</section>
</header><!-- .mobile-header -->

<section id="body">
	
	
	<div id="product-page" class="page-body">
		<div class="breadcrumb">
			<div class="uk-container uk-container-center">
				<ul class="uk-breadcrumb">
					<li class="uk-active"><a href="{{asset('')}}" title="Trang chủ"><i class="fa fa-home"></i> Trang chủ</a></li>
					<li class="uk-active"><a href="{{$singleproduct->category->slug}}" title="Trang chủ">{{$singleproduct->category->name}}</a></li>
					<li >{{$singleproduct->name}}</li>
				</ul>
			</div>
		</div><!-- .breadcrumb -->
		<div class="uk-container uk-container-center">
		<section class="prd-detail">
			<section class="panel-body">
				<script>
					 $(document).ready(function() {
						var wd_width = $(window).width();
						if(wd_width > 600) {
							$("#content-slider").lightSlider({
								loop:true,
								keyPress:true
							});
							$('#image-gallery').lightSlider({
								gallery:true,
								item:1,
								thumbItem:5,
								slideMargin: 0,
								speed:500,
								auto:true,
								loop:true,
								onSliderLoad: function() {
									$('#image-gallery').removeClass('cS-hidden');
								}  
							});
						}else {
							$("#content-slider").lightSlider({
								loop:true,
								keyPress:true
							});
							$('#image-gallery').lightSlider({
								gallery:true,
								item: 1,
								thumbItem: 3,
								slideMargin: 0,
								speed:500,
								auto:true,
								loop:true,
								onSliderLoad: function() {
									$('#image-gallery').removeClass('cS-hidden');
								}  
							});
						}
						
					});
				</script>
				<div class="uk-grid uk-grid-medium">
					<div class="uk-width-large-3-5">
						<div class="prd-gallerys">
							<div class="slider">
								<ul id="image-gallery" class="gallery list-unstyled cS-hidden">
									<li data-thumb="{{$singleproduct->img}}"> 
										<a class="image img-cover" href="{{$singleproduct->img}}" title="{{$singleproduct->name}}" data-uk-lightbox="{group:'gallerys'}">
											<img src="{{$singleproduct->img}}" alt="{{$singleproduct->name}}" />
										</a>
									</li>
									@foreach($singleproduct->image as $img)
									<li data-thumb="{{$img->img}}"> 
										<a class="image img-cover" href="{{$img->img}}" title="{{$img->name}}" data-uk-lightbox="{group:'gallerys'}">
											<img src="{{$img->img}}" alt="{{$img->name}}" />
										</a>
									</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
					<div class="uk-width-large-2-5">
						<div class="prd-desc">
							<h1 class="prd-title"><span>{{$singleproduct->name}}</span></h1>
							<div class="description">
								{!!$singleproduct->detail!!}
							</div>
						</div><!-- .prd-desc -->
					</div>
				</div><!-- .uk-grid -->
			</section><!-- .panel-body -->
		</section><!-- .prd-detail -->

		<section data-uk-sticky="{top: 0}">
			<nav class="product-nav" id='menu-center'>
				<ul>
					@if($singleproduct->heading6)
                    <li>
                        <a href="{{$singleproduct->category->slug}}/{{$singleproduct->slug}}/{{$singleproduct->id}}.html#chinh-sach">Chính sách ưu đãi</a>
                    </li>
                    @endif
					@if($singleproduct->heading)
					<li>
                        <a href="{{$singleproduct->category->slug}}/{{$singleproduct->slug}}/{{$singleproduct->id}}.html#tong-quan">Tổng quan</a>
                    </li>
                    @endif
                    @if($singleproduct->heading1)
                    <li>
                        <a href="{{$singleproduct->category->slug}}/{{$singleproduct->slug}}/{{$singleproduct->id}}.html#vi-tri">Vị trí</a>
                    </li>
                    @endif
                    @if($singleproduct->heading2)
                    <li>
                        <a href="{{$singleproduct->category->slug}}/{{$singleproduct->slug}}/{{$singleproduct->id}}.html#tien-ich">Tiện ích</a>
                    </li>
                    @endif
                    @if($singleproduct->heading3)
                    <li>
                        <a href="{{$singleproduct->category->slug}}/{{$singleproduct->slug}}/{{$singleproduct->id}}.html#mat-bang">Mặt bằng</a>
                    </li>
                    @endif
					
                    @if($singleproduct->heading4)
                    <li>
                        <a href="{{$singleproduct->category->slug}}/{{$singleproduct->slug}}/{{$singleproduct->id}}.html#noi-that">Nội thất - Nhà mẫu</a>
                    </li>
                    @endif
                    @if($singleproduct->heading5)
                    <li>
                        <a href="{{$singleproduct->category->slug}}/{{$singleproduct->slug}}/{{$singleproduct->id}}.html#tien-do">Tiến độ</a>
                    </li>
                    @endif
                    
                    <li>
                        <a href="{{$singleproduct->category->slug}}/{{$singleproduct->slug}}/{{$singleproduct->id}}.html#dang-ky">Nhận ưu đãi</a>
                    </li>
                    <div class='clr'></div>
				</ul>
			</nav><!-- .main-nav -->		
		</section><!-- .lower -->

		<div class="uk-grid lib-grid-20">
			<div class="uk-width-large-3-4">
				<section class="prd-detail">
					<section class="panel-body">
						@if($singleproduct->heading6)
						<div class="prd-content" id='chinh-sach'>
							<div class="chinh-sach">
							<h2>{{$singleproduct->heading6}}</h2>
							<div class="chinh-sach-content">{!!$singleproduct->content6!!}
								
							</div>
							</div>
						</div><!-- .prd-content -->
						@endif
						
						@if($singleproduct->heading)
						<div class="prd-content" id='tong-quan'>
							<ul class="uk-list uk-clearfix nav-tabs" data-uk-switcher="{connect:'#tabContent'}">
								<h2><li class="uk-active" aria-expanded="true">{{$singleproduct->heading}}</li></h2>
							</ul>
							<ul id="tabContent" class="uk-switcher tab-content">
								<li aria-hidden="false" class="uk-active">
									<article class="article detail-content">
										{!!$singleproduct->content!!}
									</article><!-- .article -->
								</li>
						   </ul> 
						</div><!-- .prd-content -->
						@endif
                    	@if($singleproduct->heading1)
						<div class="prd-content" id='vi-tri'>
							<ul class="uk-list uk-clearfix nav-tabs" data-uk-switcher="{connect:'#tabContent'}">
								<h2><li class="uk-active" aria-expanded="true">{{$singleproduct->heading1}}</li></h2>
							</ul>
							<ul id="tabContent" class="uk-switcher tab-content">
								<li aria-hidden="false" class="uk-active">
									<article class="article detail-content">
										{!!$singleproduct->content1!!}
									</article><!-- .article -->
								</li>
						   </ul> 
						</div><!-- .prd-content -->
						@endif
                    	@if($singleproduct->heading2)
						<div class="prd-content" id='tien-ich'>
							<ul class="uk-list uk-clearfix nav-tabs" data-uk-switcher="{connect:'#tabContent'}">
								<h2><li class="uk-active" aria-expanded="true">{{$singleproduct->heading2}}</li></h2>
							</ul>
							<ul id="tabContent" class="uk-switcher tab-content">
								<li aria-hidden="false" class="uk-active">
									<article class="article detail-content">
										{!!$singleproduct->content2!!}
									</article><!-- .article -->
								</li>
						   </ul> 
						</div><!-- .prd-content -->
						@endif
                    	@if($singleproduct->heading3)
						<div class="prd-content" id='mat-bang'>
							<ul class="uk-list uk-clearfix nav-tabs" data-uk-switcher="{connect:'#tabContent'}">
								<h2><li class="uk-active" aria-expanded="true">{{$singleproduct->heading3}}</li></h2>
							</ul>
							<ul id="tabContent" class="uk-switcher tab-content">
								<li aria-hidden="false" class="uk-active">
									<article class="article detail-content">
										{!!$singleproduct->content3!!}
										<p class='dangky' >
											<button id="myBtn1"> <i class="fa fa-download" aria-hidden="true"></i> Tải Bảng Giá Chi Tiết Từng Căn</button>
										</p>
									</article><!-- .article -->
								</li>
						   </ul> 
						</div><!-- .prd-content -->
						@endif
						
                    	@if($singleproduct->heading4)
						<div class="prd-content" id='noi-that'>
							<ul class="uk-list uk-clearfix nav-tabs" data-uk-switcher="{connect:'#tabContent'}">
								<h2><li class="uk-active" aria-expanded="true">{{$singleproduct->heading4}}</li></h2>
							</ul>
							<ul id="tabContent" class="uk-switcher tab-content">
								<li aria-hidden="false" class="uk-active">
									<article class="article detail-content">
										{!!$singleproduct->content4!!}
										<p class='dangky' >
											<button id="myBtn2"> <i class="fa fa-download" aria-hidden="true"></i> Đăng Ký Tham Quan Căn Hộ Mẫu</button>
										</p>
									</article><!-- .article -->
								</li>
						   </ul> 
						</div><!-- .prd-content -->
						@endif
                    	@if($singleproduct->heading5)
						<div class="prd-content" id='tien-do'>
							<ul class="uk-list uk-clearfix nav-tabs" data-uk-switcher="{connect:'#tabContent'}">
								<h2><li class="uk-active" aria-expanded="true">{{$singleproduct->heading5}}</li></h2>
							</ul>
							<ul id="tabContent" class="uk-switcher tab-content">
								<li aria-hidden="false" class="uk-active">
									<article class="article detail-content">
										{!!$singleproduct->content5!!}
									</article><!-- .article -->
								</li>
						   </ul> 
						</div><!-- .prd-content -->
						@endif
                    	
						<div class="prd-content" id='dang-ky'>
							<ul class="uk-list uk-clearfix nav-tabs" data-uk-switcher="{connect:'#tabContent'}">
								<li style='text-align: center;float: inherit;' class="uk-active" aria-expanded="true">Đăng Ký Đặt Chỗ & Nhận Thông Tin Ưu Đãi Mới Nhất</li>
							</ul>
							<ul id="tabContent" class="uk-switcher tab-content">
								<li style='border: none;' aria-hidden="false" class="uk-active">
									<article class="article detail-content">
										<div class="dat-cho">
											<div class="uk-grid ">
												<div class="uk-width-large-1-2">
													<div> <span>Quý Khách Hàng Vui Lòng Điền Đầy Đủ Thông Tin Để Nhận</span> <span>Ưu Đãi Từ Nhà Đầu Tư &amp; Bộ <i><u>SALEKIT</u></i> Bán Hàng Gồm:</span>
													<ul>
														<li class="first">Chính sách bán hàng <b>mới nhất</b></li>
														<li>Tiến độ thi công và thanh toán <b>nhanh nhất</b></li>
														<li>Chương trình <b>Ưu đãi</b> khuyến mại</li>
														<li><b>Hình ảnh</b> chi tiết về mặt bằng và nội thất căn hộ</li>
														<li class="last">Bảng <b>check căn hộ</b> và báo giá chi tiết</li>
													</ul>
													</div>
												</div>
												<div class="uk-width-large-1-2">
													<h3>ĐĂNG KÝ NHẬN THÔNG TIN ƯU ĐÃI</h3>
													<div class="form-right">
														<form action="dang-ky" method="POST">
															<input type="hidden" name="_token" value="{{csrf_token()}}" />
															<input type="hidden" name="link" value="<?php echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>" />
															<p style="text-align: center;"><input required name="name" style="width: 100%;" type="text" placeholder="Họ & Tên *"></p>
															<p style="text-align: center;"><input required name="email" style="width: 100%;" type="mail" placeholder="Địa chỉ Email *"></p>
															<p style="text-align: center;"><input required name="tel" style="width: 100%;" type="tel" placeholder="Số điện thoại *"></p>
															<p style="text-align: center;"><input type="submit" value="ĐĂNG KÝ"></p>
														</form>
													</div>
												</div>
											</div>
										</div>
									</article><!-- .article -->
								</li>
						   </ul> 
						</div><!-- .prd-content -->
						<section class="prdcatalogue prd-same">
							<header class="panel-head">
								<h2 class="heading-2"><span>Dự án danh mục {{$singleproduct->category->name}}</span></h2>
							</header>
							<section class="panel-body">
								<ul class="uk-grid lib-grid-20 uk-grid-width-1-2 uk-grid-width-medium-1-3 list-product">
									@foreach($lienquan as $val)
									<li>
										<div class="product">
											<div class="thumb"><a class="image img-cover img-shine" href="{{$val->category->slug}}/{{$val->slug}}/{{$val->id}}.html" title="{{$val->name}}"><img src="{{$val->img}}" alt="{{$val->name}}" /></a><span class='price'><strong>Giá:</strong><i>{{$val->price}}</i></span></div>
											<div class="infor">
												<h3 class="title"><a href="{{$val->category->slug}}/{{$val->slug}}/{{$val->id}}.html" title="{{$val->name}}">{{$val->name}}</a></h3>
												<span title='{{$val->address}}, {{$val->district->name}}, {{$val->district->city->name}}'>{{$val->address}}, {{$val->district->name}}, {{$val->district->city->name}}</span>
											</div>
										</div>
									</li>
									@endforeach
								</ul>
							</section><!-- .panel-body -->
						</section><!-- .prdcatalogue -->
					</section><!-- .panel-body -->
					
				</section><!-- .prd-detail -->
			</div>
			
			@include('layout.sitebarproduct')
			
		</div><!-- .uk-grid -->

		
			</div>
		
	</div>

</section><!-- #body -->

<style>
.dangky{    text-align: center !important;}
.dangky button{background-color: red;
	color: #fff;
	padding: 9px 15px;
	border: none;
	border-radius: 5px;}
</style>
<script type="text/javascript">
// popup

var btn1 = document.getElementById("myBtn1");
var btn2 = document.getElementById("myBtn2");
var btn3 = document.getElementById("myBtn3");

btn1.onclick = function() {
  modal.style.display = "block";
}
btn2.onclick = function() {
  modal.style.display = "block";
}
btn3.onclick = function() {
  modal.style.display = "block";
}

</script>

@endsection
@section('script')

@endsection