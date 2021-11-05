<div class="mobile-only-brand pull-left">
	<div class="nav-header pull-left">
		<div class="logo-wrap">
			<a href="index.html">
				<img class="brand-img" src="<?= base_url('assets/') ?>img/logo.png" alt="brand"/>
				<span class="brand-text">Penggajian</span>
			</a>
		</div>
	</div>	
	<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
	<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
	<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>

</div>
<div id="mobile_only_nav" class="mobile-only-nav pull-right">
	<ul class="nav navbar-right top-nav pull-right">
	
		<li class="dropdown auth-drp">
			<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="<?= base_url('assets/') ?>img/avatar/<?= $this->session->userdata('avatar'); ?>" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
			<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
				<li>
					<a href="<?= site_url('dashboard/form') ?>"><i class="zmdi zmdi-settings"></i><span>Settings</span></a>
				</li>
				<li>
					<a href="<?= site_url('login/logout') ?>"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
				</li>
					</ul>	
				</li>
			
			</ul>
		</li>
	</ul>
</div>	