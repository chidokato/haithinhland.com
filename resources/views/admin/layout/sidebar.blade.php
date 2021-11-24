<?php 
      $sb_count = DB::table('tbl_order')->where('view',0)->count();
?>
<style type="text/css">
.sb_count{
border-radius: 100px;
text-align: center;
}
</style>
<div id="sidebar-left" class="span2">
	<div class="nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
      		<li @yield('dashboard') ><a href="admin/dashboard"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li> 
                  <li @yield('order')><a href="admin/order/list"><i class="icon-shopping-cart"></i><span class="hidden-tablet"> order </span> <span class="label label-important sb_count"> {{$sb_count}} </span></a> </li>
                  <li @yield('category')><a href="admin/category/list"><i class="icon-tasks"></i><span class="hidden-tablet"> Category</span></a></li>
                  <li @yield('product')><a href="admin/product/list"><i class="icon-edit"></i><span class="hidden-tablet"> Product</span></a></li>
                  <li @yield('news')><a href="admin/news/list"><i class="icon-list-alt"></i><span class="hidden-tablet"> News</span></a></li>
                  <li @yield('theme')><a href="admin/theme/list"><i class="icon-eye-open"></i><span class="hidden-tablet"> Themes</span></a></li>
                  <li @yield('setting')><a href="admin/setting/list"><i class="icon-cog"></i><span class="hidden-tablet"> Settings</span></a></li>
                  @if(Auth::User()->permission == 0)
                  <li @yield('user')><a href="admin/user/list"><i class="icon-user"></i><span class="hidden-tablet"> Users</span></a></li>
                  @endif
                  <li @yield('location')><a href="admin/location/list"><i class="icon-map-marker"></i><span class="hidden-tablet">Location</span></a></li>
                  <li onclick="BrowseServer();">
                        <a href="#"><i class="icon-picture"></i></i> Quản lý ảnh</a>
                  </li>
		</ul>
	</div>
</div>