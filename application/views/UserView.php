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
								<th>Email</th>
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
								<th>Email</th>
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
						<h3 id="headTitle">Tambah Peserta Baru</h3>
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
							<div class="form-group" id="divUsername" hidden>
								<label for="NAME">Username</label>
								<input type="hidden" id="ID" name="ID" value="">
								<input type="text" class="form-control" id="USERNAME" name="USERNAME" placeholder="Masukkan Username Peserta">
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
								<label for="EMAIL">Email</label>
								<input type="email" class="form-control" id="EMAIL" name="EMAIL" placeholder="Masukkan Email">
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
							<button type="button" id="update" hidden class="btn btn-success">Update</button>
							<button type="button" id="cancel" hidden class="btn btn-danger">Cancel</button>
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

		$('#cancel').click(function () {
			cancelUpdate();
        });

		$('#update').click(function () {
			console.log('update');
			if (validateForm('update')) {
			    var formData = new FormData();
                var avatar = document.getElementById('AVATAR');
			    formData.append('NAME', $('#NAME').val());
			    formData.append('COMPANY', $('#COMPANY').val());
			    formData.append('COMPANY_LOCATION', $('#COMPANY_LOCATION').val());
			    formData.append('ID', $('#ID').val());
			    formData.append('EMAIL', $('#EMAIL').val());
			    formData.append('USERNAME', $('#USERNAME').val());
			    $('#AVATAR').val() === '' ? console.log('avatar kosong') : formData.append('AVATAR', avatar.files[0]);
			    if ($('#PASSWORD').val() === '') {
			        console.log('password kosong');
				} else {
                    if ($('#PASSWORD').val() == $('#REPASSWORD').val()) {
                        formData.append('PASSWORD', $('#PASSWORD').val());
                    } else {
                        Swal.fire(
                            'ERROR!',
                            'Please re-type your password correctly',
                            'error'
                        );
                    }
				}
			    updateData(formData);
			} else {
                Swal.fire(
                    'ERROR!',
                    'Please fill the form correctly',
                    'error'
                );
			}
        });

        $('#submit').click(function () {
            console.log('submit');
            if (validateForm('submit')) {
                var formData = new FormData();
                var avatar = document.getElementById('AVATAR');
                console.log(avatar.files[0]);
                formData.append('NAME', $('#NAME').val());
                formData.append('AVATAR', avatar.files[0]);
                formData.append('COMPANY', $('#COMPANY').val());
                formData.append('COMPANY_LOCATION', $('#COMPANY_LOCATION').val());
                formData.append('PASSWORD', $('#PASSWORD').val());
                formData.append('EMAIL', $('#EMAIL').val());
                formData.append('STATUS', 'ACTIVE');
                console.log(formData);
                if ($('#PASSWORD').val() == $('#REPASSWORD').val()) {
                    submitForm(formData);
                } else {
                    Swal.fire(
                        'ERROR!',
                        'Please re-type your password correctly',
                        'error'
                    );
                }
			} else {
                Swal.fire(
                    'ERROR!',
                    'Please fill insert form correctly',
                    'error'
                );
			}
        });
    });

    function updateData(inputData) {
		$.ajax({
			type: 'POST',
			data: inputData,
			dataType: 'JSON',
			enctype: 'multipart/form-data',
			processData: false,
			contentType: false,
			url: '<?=base_url('User/updatePeserta'); ?>',
			success: function (res) {
				console.log(res);
                Swal.fire(
                    res.message.title,
                    res.message.content,
                    res.message.type
                );
                if (res.message.type !== 'error') {
                    window.location.reload();
				}
            }
		})
    }

    function submitForm(inputData) {
        $.ajax({
            type: 'POST',
            data: inputData,
            enctype: 'multipart/form-data',
            dataType: 'JSON',
            processData: false,
            contentType: false,
            url: '<?=base_url('User/insertPeserta'); ?>',
            success: function (res) {
                console.log(res);
                var item = res.data;
                var name = item.NAME;
                var pushData = {
                    "ID": item.ID,
                    "USERNAME": name.replace(/\s+/g, '').toLowerCase(),
                    "NAME": name,
                    "AVATAR": item.AVATAR,
                    "COMPANY": item.COMPANY,
                    "COMPANY_LOCATION": item.COMPANY_LOCATION,
                    "PASSWORD": item.PASSWORD,
					"EMAIL": item.EMAIL,
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
                document.getElementById('AVATARVIEW').src = '';
                pushToData(pushData);
                reloadDataTable();
            },
        });
    }
    
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

    function validateForm(act) {
        var validated = false;
		if (act === 'submit') {
		    validated = !($('#NAME').val() === '' || $('#AVATAR').val() === '' || $('#PASSWORD').val() === '');
		} else if (act === 'update') {
			validated = $('#NAME').val() !== '';
		}
		return validated;
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
            url: '<?=base_url("User/deletePeserta/"); ?>' + id,
            type: 'POST',
            success: function (res) {
                console.log(res);
                Swal.fire(
                    'Deleted!',
                    'Data has been deleted',
                    'success'
                );
				// if (res.status === 'success') {
				    window.location.reload();
				// }
            }
        });
    }

    function cancelUpdate() {
        document.getElementById('headTitle').innerText = 'Tambah Peserta Baru';
        document.getElementById('submit').removeAttribute('hidden');
        document.getElementById('divUsername').setAttribute('hidden', true);
        document.getElementById('update').setAttribute('hidden', true);
        document.getElementById('cancel').setAttribute('hidden', true);
        document.getElementById('AVATARVIEW').src = '';
        document.getElementById('PASSWORD').placeholder = 'Masukkan Password untuk peserta login';
        $('#ID').val('');
        $('#USERNAME').val('');
        $('#NAME').val('');
        $('#COMPANY').val('');
        $('#COMPANY_LOCATION').val('');
        $('#PASSWORD').val('');
        $('#REPASSWORD').val('');
        $('#EMAIL').val('');
    }

    function editData(id) {
        document.getElementById('headTitle').innerText = 'Update Peserta';
        var comp = document.getElementById('edit' + id);
        var avatar = comp.getAttribute('data-avatar');
        var company = comp.getAttribute('data-company');
        var username = comp.getAttribute('data-username');
        var name = comp.getAttribute('data-name');
        var companyloc = comp.getAttribute('data-companyloc');
        var email = comp.getAttribute('data-email');
        document.getElementById('AVATARVIEW').src = avatar;
        document.getElementById('PASSWORD').placeholder = 'Masukkan Password apabila ingin mengganti password';
        document.getElementById('update').removeAttribute('hidden');
        document.getElementById('cancel').removeAttribute('hidden');
        document.getElementById('divUsername').removeAttribute('hidden');
        document.getElementById('submit').setAttribute('hidden', true);
        $('#ID').val(id);
        $('#USERNAME').val(username);
        $('#NAME').val(name);
        $('#COMPANY').val(company);
        $('#COMPANY_LOCATION').val(companyloc);
        $('#EMAIL').val(email);
		console.log(company);
    }

    function pushToData(item) {
        var avatar = item.AVATAR;
        var btn = '';
        btn += '<div class="btn-group">';
        btn += '<button data-email="' + item.EMAIL + '" data-avatar="' + avatar + '" data-username="' + item.USERNAME + '" data-company="' + item.COMPANY + '" data-companyloc="' + item.COMPANY_LOCATION + '" data-name="' + item.NAME + '" class="btn-info edit" id="edit' + item.ID + '" onclick="editData(' + item.ID + ')"><i class="ion-android-create"></i></button>';
        btn += '<button class="btn-danger deleteButton" onclick="onClickDeactive(' + item.ID + ')"><i class="ion-close"></i></button>';
        if (item.LOGSTATUS === 1) {
            btn += '<button class="btn-warning logoutButton" onclick="forceLogout(' + item.USER_ID + ')"><i class="ion-log-out"></i></button>';
		}
        btn += '</div>';
        var temp = [
            item.USERNAME,
            item.NAME,
            item.COMPANY,
            item.COMPANY_LOCATION,
			item.EMAIL,
            item.STATUS,
            btn,
        ];
        data.push(temp);
    }

    function forceLogout(userid) {
        $.ajax({
            url: '<?=base_url("User/logoutPeserta/"); ?>' + userid,
            type: 'POST',
            success: function (res) {
                console.log(res);
                Swal.fire(
                    'LOGOUT!',
                    'This user has been logout from current device',
                    'success'
                );
                // if (res.status === 'success') {
                window.location.reload();
                // }
            }
        });
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
