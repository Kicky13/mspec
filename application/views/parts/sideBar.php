<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?=base_url('Home')?>" class="brand-link">
		<img src="<?=base_url()?>assets/img/logo_MSS.jpg" alt="Admine-Exam Logo" class="brand-image img-circle elevation-3"
			 style="opacity: .8">
		<span class="brand-text font-weight-light">MSpec e-Exam</span>
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
				<?php if ($this->session->userdata('ROLE') == 'ADMIN') {
					echo '<li class="nav-item has-treeview" id="adminmenu">
					<a href="#" class="nav-link">
						<i class="nav-icon ion ion-android-desktop"></i>
						<p>
							Quick Page
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="' . base_url('Soal') . '" class="nav-link">
								<i class="ion ion-clipboard nav-icon"></i>
								<p>Create Soal</p>
							</a>
						</li>
<!--						<li class="nav-item">-->
<!--							<a href="pages/charts/flot.html" class="nav-link">-->
<!--								<i class="ion ion-android-create nav-icon"></i>-->
<!--								<p>Insert Pertanyaan</p>-->
<!--							</a>-->
<!--						</li>-->
						<li class="nav-item">
							<a href="' . base_url('User/admin') . '" class="nav-link">
								<i class="ion ion-person-add nav-icon"></i>
								<p>Add User</p>
							</a>
						</li>
					</ul>
				</li>';
				} ?>
				<li class="nav-item">
					<a href="<?=base_url('Login/doLogout')?>" class="nav-link">
						<i class="nav-icon ion ion-power"></i>
						<p>
							Logout
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>

<script>
	function checkAdminMenu() {
        var uniquerole = <?= $this->session->userdata('ROLE'); ?>;
	    if (uniquerole === 'PESERTA') {
	        document.getElementById('adminmenu').setAttribute('hidden', true);
		} else {
	        document.getElementById('adminmenu').removeAttribute('hidden');
		}
	}
</script>
