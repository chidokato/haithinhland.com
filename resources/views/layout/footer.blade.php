<section class="consultants-section">
	<div class="uk-container uk-container-center">
		<div class="uk-grid uk-flex-middle">
			<div class="uk-width-large-1-2 uk-visible-large">
				<div class="title">Bạn cần tư vấn? Gọi cho chúng tôi ngay bây giờ!</div>
				<div class="hotline">Hỗ trợ 24/7: <a href="tel: {{$head_setting->hotline}} " title="{{$head_setting->hotline}}">{{$head_setting->hotline}} </a></div>
			</div>
			<div class="uk-width-large-1-2">
				<form  action="dang-ky" method="POST" class="uk-form form">
					<label class="uk-width-1-1 input-label">
						<input type="hidden" name="_token" value="{{csrf_token()}}" />
						<input type="hidden" name="link" value="<?php echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>" />
						<input type="text" name="email" class="uk-width-1-1 input-text" placeholder="Nhập Email của bạn" />
					</label>
					<button type="submit" class="btn-submit">Đăng ký</button>
				</form>
														
			</div>
		</div><!-- .uk-grid -->
	</div>
</section><!-- .consultants-section -->
<footer class="footer"><!-- FOOTER -->
	<div class="overlay3">
		<div class="uk-container uk-container-center">
			<section class="upper">
				<div class="uk-grid uk-grid-medium">
					<div class="uk-width-small-1-2 uk-width-large-1-4 uk-width-xlarge-1-4">
						<section class="panel">
							<section class="panel-body">
								@foreach($head_logo as $val)
								<p style="text-align:center"><img src="{{$val->img}}" style='height: 80px;' alt="{{$val->name}}" itemprop="logo" /></p>	
								@endforeach
							</section>
						</section><!-- .panel -->
					</div>

					<div class="uk-width-small-1-1 uk-width-large-2-4 uk-width-xlarge-2-4">
						<section class="panel ft-contact">
							<header class="panel-head">
								<!-- <h3 class="heading"><span>Thông tin liên hệ</span></h3> -->
							</header>
							<section class="panel-body">
								<ul class="uk-list list">
									<li style="font-size: 1.4rem;"><div style='color: #fff; font-size: 14pt;'>{{$head_setting->name}}</div></li>
									<li >Địa chỉ: {{$head_setting->address}}</li>
									<li >Hotline: <a href="tel: {{$head_setting->hotline}}" title="Hotline">{{$head_setting->hotline}}</a> - @if($head_setting->hotline1) <a href="tel: {{$head_setting->hotline1}}" title="Hotline">{{$head_setting->hotline1}}</a> @endif</li>
									<li >Địa chỉ email: <a href="mailto: {{$head_setting->email}}" title="Email">{{$head_setting->email}}</a></li>
								</ul>
							</section>
						</section><!-- .panel -->
					</div>
					

					<div class="uk-width-small-1-2 uk-width-large-1-4 uk-width-xlarge-1-4">
						<section class="panel">
							<section class="panel-body">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.761739891235!2d105.8036336149322!3d21.002185786012763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x49dd20a8a17b681c!2zQuG6pXQgxJDhu5luZyBT4bqjbiDEkOG6uXAgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1546854203265" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
								
							</section>
						</section><!-- .panel -->
					</div>
					
				</div><!-- .uk-grid -->
			</section><!-- .upper -->
		</div>
	</div>

	
</footer><!--.footer -->
<!-- Mobile Hotline -->



<div id="offcanvas" class="uk-offcanvas offcanvas">
	<div class="uk-offcanvas-bar">
		<form class="uk-search" action="" data-uk-search="{}">
		    <input class="uk-search-field" type="search" name="keyword" placeholder="Tìm kiếm...">
        </form>
		<ul class="l1 uk-nav uk-nav-offcanvas uk-nav uk-nav-parent-icon" data-uk-nav>
			<li>
				<a href="{{asset('')}}">Trang chủ</a>
			</li>
			@foreach($head_category as $item)
				@if($item['parent'] == 0)
					<li>
						<a href="{{$item->slug}}">{{$item->name}}</a>
						<?php $count = DB::table('tbl_category')->where('parent',$item->id)->count(); ?>
						<?php if($count>0) { subcategory ($head_category,$item['id']); } ?>
					</li>
				@endif
			@endforeach
			
		</ul>
	</div>
</div><!-- #offcanvas -->	

<script src="fondend/templates/frontend/resources/uikit/js/components/slider.min.js"></script>
<script src="fondend/templates/frontend/resources/uikit/js/components/slideshow.min.js"></script>
<script src="fondend/templates/frontend/resources/uikit/js/components/sticky.min.js"></script>
<script src="fondend/templates/frontend/resources/uikit/js/components/accordion.min.js"></script>
<script src="fondend/templates/frontend/resources/uikit/js/components/lightbox.min.js"></script>
<script src="fondend/templates/frontend/resources/plugins/Readmore/readmore.min.js"></script>
<script src="fondend/templates/frontend/resources/plugins/lightslider-master/dist/js/lightslider.min.js"></script>
<script src="fondend/templates/frontend/resources/function.js"></script>
<script src="fondend/templates/frontend/resources/library/js/library.js"></script>
<script src="fondend/templates/acore/function.js" type="text/javascript"></script>

<div id="modal-cart" class="uk-modal">
	<div class="uk-modal-dialog" style="width:768px;">
		<a class="uk-modal-close uk-close"></a>
		<div class="cart-content">
		
		</div>
	</div>
</div>

<div id="modal-alert" class="uk-modal">
	<div class="uk-modal-dialog uk-modal-dialog-small">
	   <a class="uk-modal-close uk-close"></a>
		<div class="alert-content"></div>
	</div>
</div>

<script src="apis.google.com/js/platform.js" async defer>{lang: 'vi'}</script>