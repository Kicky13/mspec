<?php $this->load->view('parts/header'); ?>
<?php $this->load->view('parts/sideBar'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Dashboard</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?=base_url('Home'); ?>">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-md-12">
					<!-- Widget: user widget style 2 -->
					<div class="card card-widget widget-user-2">
						<!-- Add the bg color to the header using any of the bg-* classes -->
						<div class="widget-user-header bg-warning">
							<div class="widget-user-image">
								<img class="img-circle elevation-2" id="useravatar" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
							</div>
							<!-- /.widget-user-image -->
							<h3 class="widget-user-username" id="nameofuser">Nadia Carmichael</h3>
							<h5 class="widget-user-desc" id="companyofuser">Lead Developer</h5>
						</div>
						<div class="card-footer p-0">
							<ul class="nav flex-column">
								<li class="nav-item">
									<a href="#" class="nav-link">
										Projects <span class="float-right badge bg-primary">31</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">
										Tasks <span class="float-right badge bg-info">5</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">
										Completed Projects <span class="float-right badge bg-success">12</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">
										Followers <span class="float-right badge bg-danger">842</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- /.widget-user -->
				</div>
			</div>
			<!-- /.row (main row) -->
		</div><!-- /.container-fluid -->
	</section>
<aside class="control-sidebar control-sidebar-dark">
	<!-
	<!-- /.content -->
	</div>
	<!-- jQuery -->
	<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?=base_url()?>assets/dist/js/adminlte.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="<?=base_url()?>assets/dist/js/pages/dashboard.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script>
        $(function () {
            console.log('Ready');
            checkAdminMenu();
            document.getElementById('adminmenu').setAttribute('hidden', true);
        });
	</script>
	<script src="<?=base_url()?>assets/dist/js/demo.js"></script>
	<!-- /.content-wrapper -->
	<?php $this->load->view('parts/footer'); ?>

	<!-- Control Sidebar -->- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<?php $this->load->view('parts/bottom'); ?>
