<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" target="_blank" href="{{asset('')}}"><span style='font-size: 1rem;'>views site</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						@if(Auth::User())
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> {{Auth::User()->name}} 
							</a>
						</li>
						<!-- end: User Dropdown -->
						@endif
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="admin/logout">
								<i class="halflings-icon white off"></i> Logout
							</a>
						</li>
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>