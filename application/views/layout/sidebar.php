<ul class="nav navbar-nav side-nav nicescroll-bar">
	<li class="navigation-header">
		<span>Main</span> 
		<i class="zmdi zmdi-more"></i>
	</li>
	<li>
		<a class="active" href="<?php echo base_url('dashboard') ?>">
			<div class="pull-left">
				<i class="zmdi zmdi-landscape mr-20"></i>
				<span class="right-nav-text">Dashboard</span>
			</div>
			<div class="pull-right">
				<i class="zmdi zmdi"></i>
			</div>
			<div class="clearfix">
			</div>
		</a>
	</li>
	
	<li>
		<a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr"><div class="pull-left"><i class="zmdi zmdi-book mr-20"></i><span class="right-nav-text">Data Utama</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
		<ul id="ecom_dr" class="collapse collapse-level-1">
			<li>
				<a href="<?php echo base_url('karyawan') ?>">Data Karyawan</a>
			</li>
			<li>
				<a href="<?php echo base_url('jabatan') ?>">Data Jabatan</a>
			</li>
			<li>
				<a href="<?php echo base_url('tunjangankaryawan') ?>">Data Tunjangan</a>
			</li>
			<li>
				<a href="<?php echo base_url('Users') ?>">Data Users</a>
			</li>
		</ul>
	</li>
	<li>
		<a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr"><div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span class="right-nav-text">Transaksi </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
		<ul id="app_dr" class="collapse collapse-level-1">
			<li>
				<a href="<?php echo base_url('absensi') ?>"> Daftar Absensi</a>
			</li>
			<li>
				<a href="<?php echo base_url('absensi/lembur') ?>">Daftar Lembur</a>
			</li>
		</ul>
	</li>
	<li>
		<a href="javascript:void(0);" data-toggle="collapse" data-target="#lap_dr"><div class="pull-left"><i class="zmdi zmdi-receipt mr-20"></i><span class="right-nav-text">Laporan </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
		<ul id="lap_dr" class="collapse collapse-level-1">
			<li>
				<a href="calendar.html">Daftar Absensi</a>
			</li>
			<li>
				<a href="<?php echo base_url('laporan') ?>">Daftar Gaji karyawan</a>
			</li>
			<li>
				<a href="weather.html">Slip Gaji Kotor</a>
			</li>
		</ul>
	</li>
	<li><hr class="light-grey-hr mb-10"/></li>
	<li class="navigation-header">
		<span>component</span> 
		<i class="zmdi zmdi-more"></i>
	</li>
	
</ul>