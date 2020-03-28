<?php $this->load->view('parts/header'); ?>
<?php $this->load->view('parts/sideBar'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Exam Schedule</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Exam Schedule</li>
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
						<h3>List Jadwal Ujian</h3>
					</div>
					<div class="card-body">
						<table id="table1" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>Kode Ujian</th>
								<th>Nama Ujian</th>
								<th>Tanggal</th>
								<th>Jam Masuk / Jam Selesai</th>
								<th>Nama Penguji</th>
							</tr>
							</thead>
							<tbody>
							</tbody>
							<tfoot>
							<tr>
								<th>Kode Ujian</th>
								<th>Nama Ujian</th>
								<th>Tanggal</th>
								<th>Jam Masuk / Jam Selesai</th>
								<th>Nama Penguji</th>
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
						<h3>Tambah Paket Soal</h3>
					</div>
					<form role="form" id="add-new-paket" name="add-new-paket">
						<div class="card-body">
							<div class="form-group">
								<label for="SHEET_NO">Nama Ujian</label>
								<input type="text" class="form-control" id="EVENT_TITLE" name="EVENT_TITLE" placeholder="Masukkan Nama Ujian">
							</div>
							<div class="form-group">
								<label for="METHOD">Tanggal Pelaksanaan</label>
								<input type="text" class="form-control" id="EVENT_DATE" name="EVENT_DATE" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
							</div>
							<div class="form-group">
								<label>Penguji</label>
								<select id="EXAMINER" name="EXAMINER" class="form-control select2bs4">
									<option selected="selected" disabled>Please Select one</option>
								</select>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="NDE_LEVEL">Jam Mulai</label>
										<div class="input-group date" id="EVENT_START" data-target-input="nearest">
											<input type="text" class="form-control datetimepicker-input" data-target="#EVENT_START"/>
											<div class="input-group-append" data-target="#EVENT_START" data-toggle="datetimepicker">
												<div class="input-group-text"><i class="far fa-clock"></i></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="DURATION">Jam Selesai</label>
										<div class="input-group date" id="EVENT_END" data-target-input="nearest">
											<input type="text" class="form-control datetimepicker-input" data-target="#EVENT_END"/>
											<div class="input-group-append" data-target="#EVENT_END" data-toggle="datetimepicker">
												<div class="input-group-text"><i class="far fa-clock"></i></div>
											</div>
										</div>
									</div>
								</div>
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
        $('.select2bs4').select2();

        $('#EVENT_START').datetimepicker({
            format: 'LT'
        });

        $('#EVENT_END').datetimepicker({
            format: 'LT'
        });

        $('#EVENT_DATE').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });

		getSemuaUjian();

		getExaminer();

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

    function getExaminer() {
		$.ajax({
			type: 'POST',
			dataType: 'JSON',
			url: '<?=base_url('Schedule/examiner'); ?>',
			success: function (res) {
				console.log(res);
				var examinerOpt = '<option selected="selected" disabled>Please Select one</option>';
				$.each(res.data, function (index, value) {
					examinerOpt += '<option value="' + value.ID + '">' + value.NAME + '</option>';
                });
				document.getElementById('EXAMINER').innerHTML = examinerOpt;
            }
		});
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

    function getSemuaUjian() {
        $.ajax({
            url: '<?=base_url('Schedule/getSemuaTest'); ?>',
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
                if (res.status === 'success') {
                    window.location.reload();
                }
            }
        })
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
    }

    function editData(id) {
        document.getElementById('headTitle').innerText = 'Update Peserta';
        var comp = document.getElementById('edit' + id);
        var avatar = comp.getAttribute('data-avatar');
        var company = comp.getAttribute('data-company');
        var username = comp.getAttribute('data-username');
        var name = comp.getAttribute('data-name');
        var companyloc = comp.getAttribute('data-companyloc');
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
        console.log(company);
    }

    function pushToData(item) {
        var avatar = item.AVATAR;
        var btn  = '<div class="btn-group">' +
            '<button data-avatar="' + avatar + '" data-username="' + item.USERNAME + '" data-company="' + item.COMPANY + '" data-companyloc="' + item.COMPANY_LOCATION + '" data-name="' + item.NAME + '" class="btn-info edit" id="edit' + item.ID + '" onclick="editData(' + item.ID + ')"><i class="ion-android-create"></i></button>' +
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
