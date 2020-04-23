<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<style>
		::-webkit-scrollbar {
			width: 2px;
		}

		/* Track */
		::-webkit-scrollbar-track {
			background: #f1f1f1;
		}

		/* Handle */
		::-webkit-scrollbar-thumb {
			background: #888;
		}

		/* Handle on hover */
		::-webkit-scrollbar-thumb:hover {
			background: #555;
		}
	</style>

	<title>e-Exams | Top Navigator</title>

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
		<div class="container">
			<a href="<?= base_url('Home') ?>" class="navbar-brand">
				<img src="<?= base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
					 class="brand-image img-circle elevation-3"
					 style="opacity: .8">
				<span class="brand-text font-weight-light">Admine-EXAMS</span>
			</a>

			<button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
					aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse order-3" id="navbarCollapse">
				<!-- Left navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="<?= base_url('Home'); ?>" class="nav-link">Home</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('Login/doLogout'); ?>" class="nav-link">Logout</a>
					</li>
				</ul>
				<!-- SEARCH FORM -->
				<form class="form-inline ml-0 ml-md-3">
					<div class="input-group input-group-sm">
					</div>
				</form>
			</div>

			<!-- Right navbar links -->
			<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
				<li class="nav-item">
					<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
							class="fas fa-th-large"></i></a>
				</li>
			</ul>
		</div>
	</nav>
	<!-- /.navbar -->

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark"> Top Navigation</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">My Exam List</a></li>
							<li class="breadcrumb-item active">Top Navigation</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="row">
						<div class="col-lg-12">
							<div class="card card-primary card-outline">
								<div class="card-body">
									<p class="card-text">
										Some quick example text to build on the card title and make up the bulk of the
										card's
										content.
									</p>
								</div>
							</div><!-- /.card -->
						</div>
					</div>
					<div class="row">
						<h5 class="mt-4 mb-2">Tabs in Cards</h5>
						<div class="col-12">
							<!-- Custom Tabs -->
							<div class="card">
								<div class="card-header d-flex p-0">
									<ul class="nav nav-pills ml-auto p-2">
										<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Tab
												1</a></li>
										<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Tab
												2</a></li>
										<li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Tab
												3</a></li>
										<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Tab
												1</a></li>
										<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Tab
												2</a></li>
										<li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Tab
												3</a></li>
										<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Tab
												1</a></li>
										<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Tab
												2</a></li>
										<li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Tab
												3</a></li>
										<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Tab
												1</a></li>
										<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Tab
												2</a></li>
										<li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Tab
												3</a></li>
										<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Tab
												1</a></li>
										<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Tab
												2</a></li>
										<li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Tab
												3</a></li>
										<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Tab
												1</a></li>
										<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Tab
												2</a></li>
										<li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Tab
												3</a></li>
										<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Tab
												1</a></li>
										<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Tab
												2</a></li>
										<li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Tab
												3</a></li>
										<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Tab
												1</a></li>
										<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Tab
												2</a></li>
										<li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Tab
												3</a></li>
										<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Tab
												1</a></li>
										<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Tab
												2</a></li>
										<li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Tab
												3</a></li>
										<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Tab
												1</a></li>
										<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Tab
												2</a></li>
										<li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Tab
												3</a></li>

									</ul>
								</div><!-- /.card-header -->
								<div class="card-body">
									<div class="tab-content">
										<div class="tab-pane active" id="tab_1">
											A wonderful serenity has taken possession of my entire soul,
											like these sweet mornings of spring which I enjoy with my whole heart.
											I am alone, and feel the charm of existence in this spot,
											which was created for the bliss of souls like mine. I am so happy,
											my dear friend, so absorbed in the exquisite sense of mere tranquil
											existence,
											that I neglect my talents. I should be incapable of drawing a single stroke
											at the present moment; and yet I feel that I never was a greater artist than
											now.
										</div>
										<!-- /.tab-pane -->
										<div class="tab-pane" id="tab_2">
											The European languages are members of the same family. Their separate
											existence is a myth.
											For science, music, sport, etc, Europe uses the same vocabulary. The
											languages only differ
											in their grammar, their pronunciation and their most common words. Everyone
											realizes why a
											new common language would be desirable: one could refuse to pay expensive
											translators. To
											achieve this, it would be necessary to have uniform grammar, pronunciation
											and more common
											words. If several languages coalesce, the grammar of the resulting language
											is more simple
											and regular than that of the individual languages.
										</div>
										<!-- /.tab-pane -->
										<div class="tab-pane" id="tab_3">
											Lorem Ipsum is simply dummy text of the printing and typesetting industry.
											Lorem Ipsum has been the industry's standard dummy text ever since the
											1500s,
											when an unknown printer took a galley of type and scrambled it to make a
											type specimen book.
											It has survived not only five centuries, but also the leap into electronic
											typesetting,
											remaining essentially unchanged. It was popularised in the 1960s with the
											release of Letraset
											sheets containing Lorem Ipsum passages, and more recently with desktop
											publishing software
											like Aldus PageMaker including versions of Lorem Ipsum.
										</div>
										<!-- /.tab-pane -->
									</div>
									<!-- /.tab-content -->
								</div><!-- /.card-body -->
							</div>
							<!-- ./card -->
						</div>
						<!-- /.col -->
					</div>
				</div>
				<!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
		<div class="p-3">
			<h5>Title</h5>
			<p>Sidebar content</p>
			<div class="col-lg-12">
				<div class="row pre-scrollable">
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
				</div>
			</div>
		</div>
	</aside>
	<!-- /.control-sidebar -->

	<!-- Main Footer -->
	<footer class="main-footer">
		<!-- To the right -->
		<div class="float-right d-none d-sm-inline">
			Anything you want
		</div>
		<!-- Default to the left -->
		<strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io/">AdminLTE.io</a>.</strong> All rights reserved.
	</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<script>
	$(function () {
		console.log('ready');
    });
</script>
</body>

<!-- Mirrored from adminlte.io/themes/v3/pages/layout/top-nav.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Jan 2020 04:53:27 GMT -->
</html>
