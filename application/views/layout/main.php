<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from hencework.com/theme/philbert/full-width-light/index4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Aug 2021 09:43:47 GMT -->
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Admin dashboard | W-Penggajian</title>
	<meta name="description" content="Philbert is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Philbert Admin, Philbertadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	
	<!-- Morris Charts CSS -->
    <link href="<?= base_url('assets/') ?>vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css"/>
	
	<!-- Data table CSS -->
	<link href="<?= base_url('assets/') ?>vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	<link href="<?= base_url('assets/') ?>vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
	
	<!-- bootstrap-select CSS -->
	<link href="<?= base_url('assets/') ?>vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>	
	
	<!-- Calendar CSS -->
	<link href="<?= base_url('assets/') ?>vendors/bower_components/fullcalendar/dist/fullcalendar.css" rel="stylesheet" type="text/css"/>
	
	<!-- Custom CSS -->
	<link href="<?= base_url('assets/') ?>dist/css/style.css" rel="stylesheet" type="text/css">

	<!-- jQuery -->
    <script src="<?= base_url('assets/') ?>vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url('assets/') ?>vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</head>

<body>
	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper theme-4-active pimary-color-green">
		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<?= $this->load->view('layout/header', '', TRUE); ?>
		</nav>
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<?= $this->load->view('layout/sidebar', '', TRUE); ?>
			
		</div>
		<!-- /Left Sidebar Menu -->
		

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				<?= @$content ? $this->load->view($content, '', TRUE) : '';  ?>
			</div>
			
			<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30">
				<?= $this->load->view('layout/footer', '', TRUE); ?>
			</footer>
			<!-- /Footer -->
			
		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
    
    
	
	
	<!-- Init JavaScript -->
	<script src="<?= base_url('assets/') ?>dist/js/init.js"></script>
</body>


<!-- Mirrored from hencework.com/theme/philbert/full-width-light/index4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Aug 2021 09:43:47 GMT -->
</html>
