@extends('layout.index')

@section('title')
Thành công
@endsection
@section('description')
Thành công
@endsection
@section('keywords')
Thành công
@endsection
@section('robots')
index
@endsection
@section('url')
index
@endsection
@section('img')

@endsection

@section('content')
@include('layout.header')
<section id="body">
    
    <div id="product-page" class="page-body">
        <div class="breadcrumb">
            <div class="uk-container uk-container-center">
                <ul class="uk-breadcrumb">
                    <li class="uk-active"><a href="{{asset('')}}" title="Trang chủ"><i class="fa fa-home"></i> Trang chủ</a></li>
                    <li class="uk-active">thành công</li>
                </ul>
            </div>
        </div><!-- .breadcrumb -->
    <div class="uk-container uk-container-center">
        <div class="uk-grid ">
            <div class="uk-width-large-3-4">
                <section class="artcatalogue">
					<header class="panel-head">
                        <h1 class="heading-2"><span>Thành công</span></h1>
                    </header>
                    <section class="panel-body">
						<div class='detail-content'>
							Cảm ơn quý khách đã đăng ký nhận tư vấn tại Hải Thịnh Land
						</div>
                    </section><!-- .panel-body -->
                </section>
            </div><!-- .uk-width-larg-3-4 -->
        </div><!-- .uk-grid -->
    </div><!-- .uk-container -->
    
</div>

</section><!-- #body -->
@endsection