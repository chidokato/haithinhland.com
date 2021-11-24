@extends('layout.index')

@section('title')
<?php if ( $head_setting['title'] == '' ) echo $head_setting['name']; else echo $head_setting['title']; ?>
@endsection
@section('description')
<?php echo $head_setting['description']; ?>
@endsection
@section('keywords')
<?php echo $head_setting['keywords']; ?>
@endsection
@section('robots')
<?php if ( $head_setting['robot'] == 0 ) echo "index, follow";  elseif ( $head_setting['robot'] == 1 ) echo "noindex, nofollow"; ?>
@endsection
@section('url')
<?php echo asset(''); ?>
@endsection
@section('img')
http://diaochaiphat.vn/public/upload/files/%C4%90OHP.jpg
@endsection

@section('content')
@include('layout.header')
<?php use App\product; ?>
<section id="body">
	<section class="main-slide">
        <div class="uk-slidenav-position slide-show" data-uk-slideshow="{autoplay: true, autoplayInterval: 7500, animation: 'random-fx'}">
            <ul class="uk-slideshow">
                @foreach($home_slide as $val)
                <li><img src="{{$val->img}}" alt="{{$val->name}}" /></li>
                @endforeach
            </ul>
            <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
            <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
            <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
                <?php $i = 0; ?>
                @foreach($home_slide as $val)
                <li data-uk-slideshow-item="{{$i}}"><a href="#"></a></li>
                <?php $i = $i+1; ?>
                @endforeach
            </ul>
        </div>
    </section><!-- .main-slide -->
    <h1 style='position: absolute;
    left: -1000px;'>{{ $head_setting['title'] }}</h1>
    <div id="homepage" class="page-body">
        <div class="uk-container uk-container-center">
			<section class="homepage-featured-news">
                <header class="panel-head">
                    <h2 class="heading-1"><a href="tin-tuc-bds" title="Tin tức">Tin tức bất động sản</a></h2>
                </header>
                <section class="panel-body">
                    <ul class="uk-grid lib-grid-20 uk-grid-width-large-1-2 list-article">
                        @foreach($tintuc as $val)
                        <li>
                            <article class="article uk-clearfix">
                                <div class="thumb">
                                    <a class="image img-cover img-zoomin" href="{{$val->slug}}/{{$val->id}}.html" title="{{$val->name}}"><img src="{{$val->img}}" alt="{{$val->name}}" /></a>
                                </div>
                                <div class="infor">
                                    <div class="meta"><i class="fa fa-clock-o"></i> {{$val->date}}</div>
                                    <h3 class="title"><a href="{{$val->slug}}/{{$val->id}}.html" title="">{{$val->name}}</a></h3>
                                    <div class="description">{{$val->detail}}</div>
                                    <div class="viewmore"><a href="{{$val->slug}}/{{$val->id}}.html" title="Xem thêm">Xem thêm <i class="fa fa-angle-double-right"></i></a></div>
                                </div>
                            </article>
                        </li>
                        @endforeach
                    </ul>
                </section>
            </section>
            <div class="uk-grid ">
                <div class="uk-width-large-1-1">
                    <section class="homepage-category">
                        <header class="panel-head uk-flex uk-flex-middle">
                            <h2 class="heading" style='color:#fff'>Dự án nổi bật</h2>
                        </header>
                        <section class="panel-body">
                            <ul class="uk-grid lib-grid-20 uk-grid-width-1-2 uk-grid-width-medium-1-4 uk-grid-width-large-1-4 list-product" data-uk-grid-match="{target:'.title'}">
                                @foreach($hotproduct as $val)
                                <li>
                                    <div class="product">
                                        <div class="thumb"><a class="image img-cover img-shine" href="{{$val->category->slug}}/{{$val->slug}}/{{$val->id}}.html" title="{{$val->name}}"><img src="{{$val->img}}" alt="{{$val->name}}" /></a><span class='price'><strong>Giá:</strong><i>{{$val->price}}</i></span></div>
                                        <div class="infor">
                                            <h3 class="title"><a href="{{$val->category->slug}}/{{$val->slug}}/{{$val->id}}.html" title="{{$val->name}}">{{$val->name}}</a></h3>
                                            <span>{{$val->address}}, {{$val->district->name}}, {{$val->district->city->name}}</span>
                                        </div>
										
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </section><!-- .panel-body -->
                    </section><!-- .homepage-category -->
                    @foreach($home_category as $home_category)
					<?php $home_product = product::where('cat_id',$home_category["id"])->take(8)->orderBy('id','desc')->get(); ?>
					@if(count($home_product)>0)
                    <section class="homepage-category">
                        <header class="panel-head uk-flex uk-flex-middle">
                            <h2 class="heading"><a href='{{$home_category->slug}}'>{{$home_category->name}}</a></h2>
                        </header>
                        <section class="panel-body">
                            <ul class="uk-grid lib-grid-20 uk-grid-width-1-2 uk-grid-width-medium-1-4 uk-grid-width-large-1-4 list-product" data-uk-grid-match="{target:'.title'}">
								
                                @foreach($home_product as $val)
                                <li>
                                    <div class="product">
                                        <div class="thumb">
											<a class="image img-cover img-shine" href="{{$home_category->slug}}/{{$val->slug}}/{{$val->id}}.html">
												<img src="{{$val->img}}" alt="{{$val->name}}" />
											</a>
											<span class='price'>
												<strong>Giá:</strong><i>{{$val->price}}</i>
											</span>
										</div>
                                        <div class="infor">
                                            <h3 class="title"><a href="{{$home_category->slug}}/{{$val->slug}}/{{$val->id}}.html" title="{{$val->name}}">{{$val->name}}</a></h3> 
                                            <span>{{$val->address}}, {{$val->district->name}}, {{$val->district->city->name}}</span>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </section><!-- .panel-body -->
                    </section><!-- .homepage-category -->
					@endif
                    @endforeach
                </div>
                
            </div>
            
            
           
            

            <section style='margin-bottom: 50px;'>
                <header class="panel-head">
                    <h2 class="heading-1"><a href="san-pham-thuc-te.html" title="Sản phẩm thực tế">Đối tác đầu tư</a></h2>
                </header>
                <section class="panel-body">
                    <div class="uk-slidenav-position slider" data-uk-slider="{autoplay: true, autoplayInterval: 10500}">
                        <div class="uk-slider-container">
                            <ul class="uk-slider uk-grid lib-grid-20 uk-grid-width-1-4 uk-grid-width-medium-1-4 uk-grid-width-large-1-6 list-article" data-uk-grid-match="{target:'.title'}" >
                                <li>
                                    <article class="article">
                                        <div class="thumb">
                                            <a class="image img-cover img-flash" ><img src="/public/upload/images/logo-doi-tac-1.jpg" alt="logo đối tác" /></a>
                                        </div>
                                    </article><!-- .article -->
                                </li>
                                <li>
                                    <article class="article">
                                        <div class="thumb">
                                            <a class="image img-cover img-flash" ><img src="/public/upload/images/logo-doi-tac-2.jpg" alt="logo đối tác" /></a>
                                        </div>
                                    </article><!-- .article -->
                                </li>
                                <li>
                                    <article class="article">
                                        <div class="thumb">
                                            <a class="image img-cover img-flash" ><img src="/public/upload/images/logo-doi-tac-3.jpg" alt="logo đối tác" /></a>
                                        </div>
                                    </article><!-- .article -->
                                </li>
                                <li>
                                    <article class="article">
                                        <div class="thumb">
                                            <a class="image img-cover img-flash" ><img src="/public/upload/images/logo-doi-tac-4.jpg" alt="logo đối tác" /></a>
                                        </div>
                                    </article><!-- .article -->
                                </li>
                                <li>
                                    <article class="article">
                                        <div class="thumb">
                                            <a class="image img-cover img-flash" ><img src="/public/upload/images/logo-doi-tac-5.jpg" alt="logo đối tác" /></a>
                                        </div>
                                    </article><!-- .article -->
                                </li>
                                <li>
                                    <article class="article">
                                        <div class="thumb">
                                            <a class="image img-cover img-flash" ><img src="/public/upload/images/logo-doi-tac-6.jpg" alt="logo đối tác" /></a>
                                        </div>
                                    </article><!-- .article -->
                                </li>
                            </ul>
                        </div>
                    </div><!-- .slider -->
                </section><!-- .panel-body -->
            </section><!-- .actual-products -->

        </div><!-- .uk-container -->
    </div><!-- .page-body -->   
</section><!-- #body -->
@endsection
