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
								<th>Role</th>
								<th>Last Login</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							</tbody>
							<tfoot>
							<tr>
								<th>Username</th>
								<th>Name</th>
								<th>Role</th>
								<th>Last Login</th>
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
						<h3 id="headTitle">Tambah Admin/Penguji Baru</h3>
					</div>
					<form role="form" id="add-new-user" name="add-new-user">
						<div class="card-body">
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
								<label>Role</label>
								<select id="ROLE" name="ROLE" class="form-control select2bs4">
									<option selected="selected" disabled>Please Select one</option>
									<option value="ADMIN">ADMIN</option>
									<option value="PENGUJI">PENGUJI</option>
								</select>
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

<link rel="stylesheet" href="<?=base_url()?>assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/select2/css/select2.min.css">
<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?=base_url()?>assets/plugins/select2/js/select2.full.min.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?=base_url()?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?=base_url()?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url()?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets/dist/js/demo.js"></script>

<Script>
    var data = [];
    $(function () {
        getSemuaPeserta();
		checkAdminMenu();
        $('#cancel').click(function () {
            cancelUpdate();
        });

        $('#update').click(function () {
            console.log('update');
            if (validateForm('update')) {
                var formData = new FormData();
                var selected = document.getElementById('ROLE');
                var role = selected.options[selected.selectedIndex].value;
                formData.append('NAME', $('#NAME').val());
                formData.append('ID', $('#ID').val());
                formData.append('ROLE', role);
                formData.append('USERNAME', $('#USERNAME').val());
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
                var selected = document.getElementById('ROLE');
                var role = selected.options[selected.selectedIndex].value;
                var name = $('#NAME').val();
                formData.append('NAME', name);
                formData.append('ROLE', role);
                formData.append('PASSWORD', $('#PASSWORD').val());
                formData.append('USERNAME', name.replace(/\s+/g, '').toLowerCase());
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
            processData: false,
            contentType: false,
            url: '<?=base_url('User/updateAdmin'); ?>',
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
            url: '<?=base_url('User/insertAdmin'); ?>',
            success: function (res) {
                console.log(res);
                var item = res.data;
                var name = item.NAME;
                var pushData = {
                    "ID": item.ID,
                    "USERNAME": name.replace(/\s+/g, '').toLowerCase(),
                    "NAME": name,
                    "ROLE": item.ROLE,
					"LAST_LOGIN": item.LAST_LOGIN,
                    "PASSWORD": item.PASSWORD,
                };
                Swal.fire(
                    res.message.title,
                    res.message.content,
                    res.message.type
                );
                $('#NAME').val('');
                $('#ROLE').val('');
                $('#PASSWORD').val('');
                $('#REPASSWORD').val('');
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
            };

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
            validated = !($('#NAME').val() === '' || $('#PASSWORD').val() === '');
        } else if (act === 'update') {
            validated = $('#NAME').val() !== '';
        }
        return validated;
    }

    function getSemuaPeserta() {
        $.ajax({
            url: '<?=base_url('User/getSemuaAdmin'); ?>',
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
            url: '<?=base_url("User/deleteAdmin/"); ?>' + id,
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
        })
    }

    function cancelUpdate() {
        document.getElementById('headTitle').innerText = 'Tambah Peserta Baru';
        document.getElementById('submit').removeAttribute('hidden');
        document.getElementById('divUsername').setAttribute('hidden', true);
        document.getElementById('update').setAttribute('hidden', true);
        document.getElementById('cancel').setAttribute('hidden', true);
        document.getElementById('PASSWORD').placeholder = 'Masukkan Password untuk admmin login';
        $('#ID').val('');
        $('#USERNAME').val('');
        $('#NAME').val('');
        $('#ROLE').val('');
        $('#PASSWORD').val('');
        $('#REPASSWORD').val('');
    }

    function editData(id) {
        document.getElementById('headTitle').innerText = 'Update Peserta';
        var comp = document.getElementById('edit' + id);
        var username = comp.getAttribute('data-username');
        var name = comp.getAttribute('data-name');
        var roles = $('#edit' + id).attr('data-role');
        document.getElementById('ROLE').value = roles;
        document.getElementById('PASSWORD').placeholder = 'Masukkan Password apabila ingin mengganti password';
        document.getElementById('update').removeAttribute('hidden');
        document.getElementById('cancel').removeAttribute('hidden');
        document.getElementById('divUsername').removeAttribute('hidden');
        document.getElementById('submit').setAttribute('hidden', true);
        $('#ID').val(id);
        $('#USERNAME').val(username);
        $('#NAME').val(name);
    }

    function pushToData(item) {
        var btn  = '<div class="btn-group">' +
            '<button data-role="' + item.ROLE + '" data-username="' + item.USERNAME + '" data-name="' + item.NAME + '" class="btn-info edit" id="edit' + item.ID + '" onclick="editData(' + item.ID + ')"><i class="ion-android-create"></i></button>' +
            '<button class="btn-danger deleteButton" onclick="onClickDeactive(' + item.ID + ')"><i class="ion-close"></i></button>' +
            '</div>';
        var temp = [
            item.USERNAME,
            item.NAME,
            item.ROLE,
			item.LAST_LOGIN,
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
