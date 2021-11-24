<!DOCTYPE html>
<html lang="en">
<head>
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Trang quản trị</title>
	<base href="{{asset('')}}">
	<meta name="description" content="Trang quản trị">
	<meta name="author" content="chidokato">
	<meta name="keyword" content="Trang quản trị">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link href="admin_asset/css/bootstrap.min.css" rel="stylesheet">
	<link href="admin_asset/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="admin_asset/css/style.css" rel="stylesheet">
	<link href="admin_asset/css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="admin_asset/img/favicon.ico">

	<script src="admin_asset/ckeditor/ckeditor.js"></script>
	<!-- end: Favicon -->
	<style type="text/css">
		label {
		    font-weight: 600;
		    padding-left: 5px;
		}
	</style>
	@yield('css')
		
</head>
	@yield('function')
<body>
	<!-- start: Header -->
	@include('admin.layout.navbar')
	<!-- start: Header -->
	
<div class="container-fluid-full">
	<div class="row-fluid">
				
		<!-- start: Main Menu -->
		@include('admin.layout.sidebar')
		<!-- end: Main Menu -->
		
		<!-- start: Content -->
		@yield('content')
		
		<!--/.fluid-container-->
	
		<!-- end: Content -->

	</div><!--/#content.span10-->
</div><!--/fluid-row-->
	<footer>
		<p>
			<span style="text-align:left;float:left">&copy; 2013 <a href="" alt="Bootstrap_Metro_Dashboard">JANUX Responsive Dashboard</a></span>
		</p>
	</footer>
	<!-- start: JavaScript-->
		<script src="admin_asset/js/jquery-1.9.1.min.js"></script>
		<script src="admin_asset/js/jquery-migrate-1.0.0.min.js"></script>
		<script src="admin_asset/js/jquery-ui-1.10.0.custom.min.js"></script>
		<script src="admin_asset/js/jquery.ui.touch-punch.js"></script>
		<script src="admin_asset/js/modernizr.js"></script>
		<script src="admin_asset/js/bootstrap.min.js"></script>
		<script src="admin_asset/js/jquery.cookie.js"></script>
		<script src='admin_asset/js/fullcalendar.min.js'></script>
		<script src='admin_asset/js/jquery.dataTables.min.js'></script>
		<script src="admin_asset/js/excanvas.js"></script>
		<script src="admin_asset/js/jquery.flot.js"></script>
		<script src="admin_asset/js/jquery.flot.pie.js"></script>
		<script src="admin_asset/js/jquery.flot.stack.js"></script>
		<script src="admin_asset/js/jquery.flot.resize.min.js"></script>
		<script src="admin_asset/js/jquery.chosen.min.js"></script>
		<script src="admin_asset/js/jquery.uniform.min.js"></script>
		<script src="admin_asset/js/jquery.cleditor.min.js"></script>
		<script src="admin_asset/js/jquery.noty.js"></script>
		<script src="admin_asset/js/jquery.elfinder.min.js"></script>
		<script src="admin_asset/js/jquery.raty.min.js"></script>
		<script src="admin_asset/js/jquery.iphone.toggle.js"></script>
		<script src="admin_asset/js/jquery.uploadify-3.1.min.js"></script>
		<script src="admin_asset/js/jquery.gritter.min.js"></script>
		<script src="admin_asset/js/jquery.imagesloaded.js"></script>
		<script src="admin_asset/js/jquery.masonry.min.js"></script>
		<script src="admin_asset/js/jquery.knob.modified.js"></script>
		<script src="admin_asset/js/jquery.sparkline.min.js"></script>
		<script src="admin_asset/js/counter.js"></script>
		<script src="admin_asset/js/retina.js"></script>
		<script src="admin_asset/js/custom.js"></script>

		<script type="text/javascript">
	    function BrowseServer()
	    {
	        var finder = new CKFinder();
	        finder.BasePath = 'admin_asset/ckeditor/ckfinder/';
	        finder.SelectFunction = SetFileField;
	        finder.Popup();
	    }
	    function BrowseServer1()
	    {
	        var finder = new CKFinder();
	        finder.BasePath = 'admin_asset/ckeditor/ckfinder/';
	        finder.SelectFunction = SetFileField1;
	        finder.Popup();
	    }
	    </script>
	    <script type="text/javascript"> function SetFileField(fileUrl) {document.getElementById('image').value = fileUrl; }</script>
	    <script type="text/javascript"> function SetFileField1(fileUrl) {document.getElementById('image1').value = fileUrl; }</script>
	    <script type="text/javascript" src="admin_asset/ckeditor/ckfinder/ckfinder_v1.js"></script>
		<!-- end: JavaScript-->
		@yield('script')
	
</body>
</html>
