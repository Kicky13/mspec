<?php $this->load->view('parts/header'); ?>
<?php $this->load->view('parts/sideBar'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Peserta</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Peserta</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3>List Semua Peserta</h3>
					</div>
					<div class="card-body">
						<table id="table1" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>Username</th>
								<th>Name</th>
								<th>Company</th>
								<th>Company Location</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							</tbody>
							<tfoot>
							<tr>
								<th>Username</th>
								<th>Name</th>
								<th>Company</th>
								<th>Company Location</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
							</tfoot>
						</table>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3>Tambah Peserta Baru</h3>
					</div>
					<form role="form" id="add-new-user" name="add-new-user">
						<div class="card-body">
							<div class="text-center">
								<img class="profile-user-img img-fluid img-circle" src="" name="AVATARVIEW" id="AVATARVIEW" width="300" height="300">
							</div>
							<div class="form-group">
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="AVATAR" name="AVATAR">
									<label class="custom-file-label" for="excel">Choose file</label>
								</div>
							</div>
							<div class="form-group">
								<label for="NAME">Name</label>
								<input type="text" class="form-control" id="NAME" name="NAME" placeholder="Masukkan Nama Peserta">
							</div>
							<div class="form-group">
								<label for="COMPANY">Company Name</label>
								<input type="text" class="form-control" id="COMPANY" name="COMPANNY" placeholder="Masukkan Nama Company, Bisa dikosongi apabila tidak diperlukan">
							</div>
							<div class="form-group">
								<label for="COMPANY_LOCATION">Company Address</label>
								<input type="text" class="form-control" id="COMPANY_LOCATION" name="COMPANY_LOCATION" placeholder="Masukkan Alamat Company">
							</div>
							<div class="form-group">
								<label for="PASSWORD">Login Password</label>
								<input type="password" class="form-control" id="PASSWORD" name="PASSWORD" placeholder="Masukkan Password untuk peserta login">
							</div>
							<div class="form-group">
								<label for="REPASSWORD">Retype Password</label>
								<input type="password" class="form-control" id="REPASSWORD" name="REPASSWORD" placeholder="Masukkan kembali Password untuk peserta login">
							</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<button type="button" id="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>

<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?= base_url() ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="<?= base_url() ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>

<Script>
    var data = [];
    $(function () {
        getSemuaPeserta();
        $('#AVATAR').change(function () {
			readURL(this);
        });
        $('#submit').click(function () {
            console.log('submit');
            var inputData = {
                "NAME": $('#NAME').val(),
				"AVATAR": $('#AVATAR').val(),
                "COMPANY": $('#COMPANY').val(),
                "COMPANY_LOCATION": $('#COMPANY_LOCATION').val(),
                "PASSWORD": $('#PASSWORD').val(),
				"STATUS": 'ACTIVE'
            };
            console.log(inputData);
            if ($('#PASSWORD').val() == $('#REPASSWORD').val()) {
                $.ajax({
                    type: 'POST',
                    data: inputData,
					dataType: 'JSON',
                    url: '<?=base_url('User/insertPeserta'); ?>',
                    success: function (res) {
                        console.log(res);
                        var id = res.id;
                        var name = inputData.NAME;
                        var pushData = {
                            "ID": id,
							"USERNAME": name.replace(/\s+/g, '').toLowerCase(),
                            "NAME": inputData.NAME,
                            "AVATAR": inputData.AVATAR,
                            "COMPANY": inputData.COMPANY,
                            "COMPANY_LOCATION": inputData.COMPANY_LOCATION,
                            "PASSWORD": inputData.PASSWORD,
                            "STATUS": 'ACTIVE'
						};
                        Swal.fire(
                            res.message.title,
                            res.message.content,
                            res.message.type
                        );
                        $('#NAME').val('');
                        $('#COMPANY').val('');
                        $('#COMPANY_LOCATION').val('');
                        $('#PASSWORD').val('');
                        $('#REPASSWORD').val('');
                        pushToData(pushData);
                        reloadDataTable();
                    },
                });
			} else {
                Swal.fire(
                    'ERROR!',
					'Please re-type your password correctly',
					'error'
				);
			}
        });
    });
    
    function readURL(input) {
		if (input.files && input.files[0]) {
		    var reader = new FileReader();

		    reader.onload = function (e) {
				$('#AVATARVIEW').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
		}
    }

    function reloadDataTable() {
        $('#table1').DataTable().destroy();
        $('#table1').DataTable({
            data: data,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
        });
    }

    function getSemuaPeserta() {
        $.ajax({
            url: '<?=base_url('User/getSemuaPeserta'); ?>',
            type: 'GET',
			dataType: 'JSON',
            success: function (res) {
                var response = res;
                response.forEach(pushToData);
                reloadDataTable();
            }
        });
    }

    function onClickDeactive(id) {
        console.log(id);
        Swal.fire({
            title: 'Are You Sure?',
            text: 'You won\'t able to revert this',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it'
        }).then(res => {
            if (res.value) {
                nonaktifPeserta(id);
            }
        });
    }

    function nonaktifPeserta(id) {
        $.ajax({
            url: '<?=base_url("User/nonaktifPeserta/"); ?>' + id,
            type: 'POST',
            success: function (res) {
                console.log(res);
                Swal.fire(
                    'Deactivates!',
                    'Your data has been deactivate with id ' + res,
                    'success'
                )
            }
        })
    }

    function gotoEditPage(idPeserta) {
        document.location.href = '<?=base_url('User/editPeserta/'); ?>' + idPeserta
    }

    function pushToData(item) {
        var btn  = '<div class="btn-group">' +
            '<button class="btn-info edit" onclick="gotoEditPage(' + item.ID + ')"><i class="ion-android-create"></i></button>' +
            '<button class="btn-danger deleteButton" onclick="onClickDeactive(' + item.ID + ')"><i class="ion-close"></i></button>' +
            '</div>';
        var temp = [
            item.USERNAME,
            item.NAME,
            item.COMPANY,
            item.COMPANY_LOCATION,
            item.STATUS,
            btn,
        ];
        data.push(temp);
    }
</Script>
<!-- /.content-wrapper -->
<?php $this->load->view('parts/footer'); ?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<?php $this->load->view('parts/bottom'); ?>
