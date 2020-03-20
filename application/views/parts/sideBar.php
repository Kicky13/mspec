<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?=base_url('Home')?>" class="brand-link">
		<img src="<?=base_url()?>assets/dist/img/AdminLTELogo.png" alt="Admine-Exam Logo" class="brand-image img-circle elevation-3"
			 style="opacity: .8">
		<span class="brand-text font-weight-light">Admine-Exam</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
					 with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?=base_url('Home')?>" class="nav-link">
						<i class="nav-icon ion ion-home"></i>
						<p>
							Home
						</p>
					</a>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon ion ion-android-desktop"></i>
						<p>
							Quick Page
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="pages/charts/chartjs.html" class="nav-link">
								<i class="ion ion-clipboard nav-icon"></i>
								<p>Create Soal</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="pages/charts/flot.html" class="nav-link">
								<i class="ion ion-android-create nav-icon"></i>
								<p>Insert Pertanyaan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="pages/charts/inline.html" class="nav-link">
								<i class="ion ion-person-add nav-icon"></i>
								<p>Add User</p>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
