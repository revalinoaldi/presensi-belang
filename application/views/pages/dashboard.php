<!-- Row -->
<div class="row">
	<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
		<div class="panel panel-default card-view pa-0">
			<div class="panel-wrapper collapse in">
				<div class="panel-body pa-0">
					<div class="sm-data-box">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
									<span class="txt-dark block counter"><span class="counter-anim"><?= count($emp) ?></span></span>
									<span class="weight-500 uppercase-font block font-13">Total Karyawan</span>
								</div>
								<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
									<i class="icon-user-following data-right-rep-icon txt-light-grey"></i>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default card-view pa-0">
			<div class="panel-wrapper collapse in">
				<div class="panel-body pa-0">
					<div class="sm-data-box">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
									<span class="txt-dark block counter">
										<span class="counter-anim"><?= count($jabatan) ?></span>
									</span>
									<span class="weight-500 uppercase-font block">Total Jabatan</span>
								</div>
								<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
									<i class="icon-control-rewind data-right-rep-icon txt-light-grey"></i>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default card-view pa-0">
			<div class="panel-wrapper collapse in">
				<div class="panel-body pa-0">
					<div class="sm-data-box">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
									<span class="txt-dark block counter"><span class="counter-anim">0</span></span>
									<span class="weight-500 uppercase-font block">Cuti Bulanan</span>
								</div>
								<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
									<i class="icon-layers data-right-rep-icon txt-light-grey"></i>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
	<!-- <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12"> -->
		<div class="panel panel-default card-view">
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="calendar-wrap">
						<div id="calendar_small" class="small-calendar"></div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
<!-- /Row -->

<!-- Row -->
<!-- <div class="row">
	
	<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
		<div class="panel panel-default card-view panel-refresh">
			<div class="refresh-container">
				<div class="la-anim-1"></div>
			</div>
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Departmental Patients</h6>
				</div>
				<div class="pull-right">
					<a href="#" class="pull-left inline-block refresh mr-15">
						<i class="zmdi zmdi-replay"></i>
					</a>
					<a href="#" class="pull-left inline-block full-screen mr-15">
						<i class="zmdi zmdi-fullscreen"></i>
					</a>
					<div class="pull-left inline-block dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert"></i></a>
						<ul class="dropdown-menu bullet dropdown-menu-right"  role="menu">
							<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>Edit</a></li>
							<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i>Delete</a></li>
							<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>New</a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div id="morris_donut_chart" class="morris-chart donut-chart" style="height:346px;"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default card-view panel-refresh">
			<div class="refresh-container">
				<div class="la-anim-1"></div>
			</div>
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">General Appoinments</h6>
				</div>
				<div class="pull-right">
					<a href="#" class="pull-left inline-block refresh mr-15">
						<i class="zmdi zmdi-replay"></i>
					</a>
					<div class="pull-left inline-block dropdown mr-15">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert"></i></a>
						<ul class="dropdown-menu bullet dropdown-menu-right"  role="menu">
							<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>Devices</a></li>
							<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i>General</a></li>
							<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>Referral</a></li>
						</ul>
					</div>
					<a class="pull-left inline-block close-panel" href="#" data-effect="fadeOut">
						<i class="zmdi zmdi-close"></i>
					</a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div id="appoinmnts_chart" class="morris-chart" style="height:345px;"></div>
				</div>	
			</div>
		</div>
	</div>
</div> -->
<!-- /Row -->

<!-- Data table JavaScript -->
<script src="<?= base_url('assets/') ?>vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>

<!-- Slimscroll JavaScript -->
<script src="<?= base_url('assets/') ?>dist/js/jquery.slimscroll.js"></script>

<!-- simpleWeather JavaScript -->
<script src="<?= base_url('assets/') ?>vendors/bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
<script src="<?= base_url('assets/') ?>dist/js/simpleweather-data.js"></script>

<!-- Progressbar Animation JavaScript -->
<script src="<?= base_url('assets/') ?>vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>

<!-- Fancy Dropdown JS -->
<script src="<?= base_url('assets/') ?>dist/js/dropdown-bootstrap-extended.js"></script>

<!-- Sparkline JavaScript -->
<script src="<?= base_url('assets/') ?>vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>

<!-- Owl JavaScript -->
<script src="<?= base_url('assets/') ?>vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>

<!-- ChartJS JavaScript -->
<script src="<?= base_url('assets/') ?>vendors/chart.js/Chart.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="<?= base_url('assets/') ?>vendors/bower_components/raphael/raphael.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/bower_components/morris.js/morris.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>

<!-- Calender JavaScripts -->
<script src="<?= base_url('assets/') ?>vendors/bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/jquery-ui.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="<?= base_url('assets/') ?>dist/js/fullcalendar-data.js"></script>

<!-- Switchery JavaScript -->
<script src="<?= base_url('assets/') ?>vendors/bower_components/switchery/dist/switchery.min.js"></script>

<!-- Bootstrap Select JavaScript -->
<script src="<?= base_url('assets/') ?>vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

	<script src="<?= base_url('assets/') ?>dist/js/dashboard4-data.js"></script>

<script type="text/javascript">
	<?php 
	if (@$this->session->flashdata('notif')) { ?>
		$(window).load(function(){
	window.setTimeout(function(){
		$.toast({
			heading: 'Selamat Datang <?= $this->session->userdata('nama'); ?>',
			text: 'Terimakasih Atas Dedikasi Anda.',
			position: 'top-right',
			loaderBg:'#f0c541',
			icon: 'success',
			hideAfter: 3500, 
			stack: 6
		});
	}, 3000);
});
	<?php } ?>
</script>