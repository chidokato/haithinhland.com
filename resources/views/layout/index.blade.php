<!DOCTYPE HTML>
<html lang="vi-VN">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T428PJM');</script>
<!-- End Google Tag Manager -->

<base href="{{asset('')}}">
<!-- seo -->
<title>@yield('title')</title>
<meta name="description" content="@yield('description')"/>
<meta name="keywords" itemprop="keywords" content="@yield('keywords')" />
<meta name="news_keywords" content="@yield('keywords')" />
<meta name="robots" content="@yield('robots')"/>
<link rel="shortcut icon" href="{{$head_setting->img}}" />
<link rel="canonical" href="@yield('url')"/>
<link rel="alternate" href="{{asset('')}}" hreflang="vi-vn" />
<!-- and seo -->
<!-- og -->
<meta property="og:locale" content="vi_VN">
<meta property="og:title" itemprop="title" content="@yield('title')">
<meta property="og:type" content="article">
<meta property="article:author" content="https://www.facebook.com/profile.php?id=100036334062760">
<meta property="article:publisher" content="https://www.facebook.com/profile.php?id=100036334062760">
<meta property="og:description" itemprop="description" content="@yield('description')">
<meta property="og:url" itemprop="url" content="@yield('url')">
<meta property="og:site_name" content="{{$head_setting->name}}">
<meta property="og:image" itemprop="image" content="@yield('img')">
<meta property="og:image:alt" content="@yield('title')">
<meta property="fb:app_id" content="1056060257782954">
<!-- and og -->
<!-- twitter -->




<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta property="article:author" content="admin" />

<!-- css -->
<link href="fondend/templates/acore/core.css" rel="stylesheet" />
<link href="fondend/templates/frontend/resources/fonts/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="fondend/templates/frontend/resources/uikit/css/uikit.modify.css" rel="stylesheet" />
<link href="fondend/templates/frontend/resources/library/css/reset.css" rel="stylesheet" />
<link href="fondend/templates/frontend/resources/library/css/library.css" rel="stylesheet" />
<link href="fondend/templates/frontend/resources/uikit/css/components/slideshow.min.css" rel="stylesheet" />
<link href="fondend/templates/frontend/resources/plugins/lightslider-master/dist/css/lightslider.min.css" rel="stylesheet" />
<link href="fondend/templates/frontend/resources/style.css" rel="stylesheet" />
<script src="fondend/templates/frontend/resources/library/js/jquery.js"></script>
<script src="fondend/templates/frontend/resources/uikit/js/uikit.min.js"></script>
<!-- and css -->
<!-- ananytisc -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', '{{$head_setting->analytics}}', 'auto');
  ga('send', 'pageview');

</script>
<!-- ananytisc -->
<!-- facebook -->
<div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId={{$head_setting->fb_app_id}}";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
<!-- facebook -->
@yield('css')
<!-- js -->
<!-- and js -->
{!! $head_setting->code_header !!}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {
  $("a[href*='#']:not([href='#])").click(function() {
    let target = $(this).attr("href");
    $('html,body').stop().animate({
      scrollTop: $(target).offset().top
    }, 500);
    event.preventDefault();
  });
});
</script>


</head>

@include('layout.function')

<body>
    
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T428PJM"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

{!! $head_setting->code_body !!}



@yield('content')
  
@include('layout.footer')

@include('layout.popup')

@yield('script')


</body>
</html>