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
							<li class="breadcrumb-item"><a href="#">Home</a></li>
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
					<div class="col-lg-6 col-6">
						<!-- small box -->
						<div class="small-box bg-success">
							<div class="inner">
								<h3>150</h3>

								<p>Bank Soal</p>
							</div>
							<div class="icon">
								<i class="ion ion-ios-copy"></i>
							</div>
							<a href="<?= base_url('Soal'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-6 col-6">
						<!-- small box -->
						<div class="small-box bg-warning">
							<div class="inner">
								<h3>44</h3>

								<p>Users</p>
							</div>
							<div class="icon">
								<i class="ion ion-person-add"></i>
							</div>
							<a href="<?= base_url('User'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="row">
<!--					<div class="col-lg-6 col-6">-->
						<!-- small box -->
<!--						<div class="small-box bg-danger">-->
<!--							<div class="inner">-->
<!--								<h3>150</h3>-->
<!---->
<!--								<p>Soal dan Kunci Jawaban</p>-->
<!--							</div>-->
<!--							<div class="icon">-->
<!--								<i class="ion ion-android-bulb"></i>-->
<!--							</div>-->
<!--							<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
<!--						</div>-->
<!--					</div>-->
					<!-- ./col -->
					<div class="col-lg-12 col-12">
						<!-- small box -->
						<div class="small-box bg-info">
							<div class="inner">
								<h3>75</h3>

								<p>Exams Schedule</p>
							</div>
							<div class="icon">
								<i class="ion ion-ios-calendar"></i>
							</div>
							<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
				<!-- /.row (main row) -->
			</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<?php $this->load->view('parts/footer'); ?>

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
	</aside>
	<!-- /.control-sidebar -->
<?php $this->load->view('parts/bottom'); ?>
