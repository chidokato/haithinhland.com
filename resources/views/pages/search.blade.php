@extends('layout.index')

@section('title')
@endsection

@section('content')
@include('layout.header')
<section id="body">
    <div class="banner banner-catalogue uk-visible-large">
        <img src="/public/upload/images/banner_cat.jpg" alt="banner">
    </div>
    
    <div id="product-page" class="page-body">
        <div class="breadcrumb">
            <div class="uk-container uk-container-center">
                <ul class="uk-breadcrumb">
                    <li><a href="{{asset('')}}" title="Trang chủ"><i class="fa fa-home"></i> Trang chủ</a></li>
                                    
                    <li class="uk-active"><a>Tìm kiếm</a></li>
                </ul>
            </div>
        </div><!-- .breadcrumb -->
    <div class="uk-container uk-container-center">
        <div class="uk-grid ">
            
            <div class="uk-width-large-3-4">
                
                <section class="prdcatalogue">
                    <header class="panel-head">
                        <h1 class="heading-2"><span>Tìm kiếm dự án: {{$key}}</span></h1>
                    </header>
                    <section class="panel-body">
                        <ul class="uk-grid lib-grid-20 uk-grid-width-1-2 uk-grid-width-medium-1-3 list-product">
                            @foreach($product as $val)
                            <li>
                                <div class="product">
                                    <div class="thumb">
										<a class="image img-cover img-shine" href="{{$val->category->slug}}/{{$val->slug}}/{{$val->id}}.html" title="{{$val->name}}">
											<img src="{{$val->img}}" alt="{{$val->name}}" />
										</a>
										<span class='price'><strong>Giá:</strong><i>1 tỷ</i></span>
									</div>
                                    <div class="infor">
                                        <h3 class="title"><a href="{{$val->category->slug}}/{{$val->slug}}/{{$val->id}}.html" title="{{$val->name}}">{{$val->name}}</a></h3>
                                        <span title='{{$val->address}}, {{$val->district->name}}, {{$val->district->city->name}}'>{{$val->address}}, {{$val->district->name}}, {{$val->district->city->name}}</span>
                                    </div>
									
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </section><!-- .panel-body -->
					
                    <footer class="panel-foot">
                                   
                    </footer>
                </section><!-- .prdcatalogue -->
				<section class="artcatalogue">
                    <header class="panel-head">
                        <h1 class="heading-2"><span>Tìm kiến tin tức: {{$key}}</span></h1>
                    </header>
                    <section class="panel-body">
                        <ul class="uk-list list-article">
                            @foreach($news as $val)
                            <li>
                                <article class="article uk-clearfix">
                                    <div class="thumb img-flash">
                                        <a class="image img-cover" href="{{$val->slug}}/{{$val->id}}.html" title="{{$val->name}}"><img src="{{$val->img}}" alt="{{$val->name}}"></a>
                                    </div>
                                    <div class="info">
                                        <h2 class="title"><a href="{{$val->slug}}/{{$val->id}}.html" title="{{$val->name}}">{{$val->name}}</a></h2>
                                        <div class="meta"><i class="fa fa-clock-o"></i> 11/11/2017</div>
                                        <div class="description lib-line-4">{{$val->detail}}</div>
                                    </div>
                                </article><!-- .article-1 -->
                            </li>
                            @endforeach
                        </ul><!-- .list-article -->
                    </section><!-- .panel-body -->
                    <footer class="panel-foot">
                                        
                    </footer>
                </section>
            </div><!-- .uk-width-larg-3-4 -->
            @include('layout.sitebar')
        </div><!-- .uk-grid -->
    </div><!-- .uk-container -->
    
</div>

</section><!-- #body -->
@endsection