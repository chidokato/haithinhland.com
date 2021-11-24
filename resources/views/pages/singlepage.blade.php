@extends('layout.index')

@section('title')
<?php if ( $category['title'] == '' ) echo $category['name']; else echo $category['title']; ?>
@endsection
@section('description')
<?php echo $category['description']; ?>
@endsection
@section('keywords')
<?php echo $category['keywords']; ?>
@endsection
@section('robots')
<?php if ( $category['robot'] == 0 ) echo "index, follow";  elseif ( $category['robot'] == 1 ) echo "noindex, nofollow"; ?>
@endsection
@section('url')
<?php echo asset('').$category['slug']; ?>
@endsection

@section('content')
<section>
    <div class="bg-white container">
        <div class="row">
            
            <div class="col-md-9">
                <div class="main-body">
                    <h1 class="titie">{{$category->name}}</h1>
                    <div class="main-content">
						<div class="content">
							{!!$category->content!!}
						</div>
                    </div>
                </div>
            </div>
			@include('layout.sitebar')
        </div>
    </div>
</section>
@endsection