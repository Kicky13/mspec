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
						<h3>List Peserta Ujian</h3>
						<input type="hidden" id="idEvent" value="<?= $id; ?>">
					</div>
					<div class="card-body">
						<table id="table1" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>Nama Peserta</th>
								<th>Paket</th>
								<th>Certificate</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							</tbody>
							<tfoot>
							<tr>
								<th>Nama Peserta</th>
								<th>Paket</th>
								<th>Certificate</th>
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
						<h3>Tambah Peserta Ujian</h3>
					</div>
					<form role="form" id="add-new-paket" name="add-new-paket">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="PARTICIPANT">Peserta</label>
										<select id="PARTICIPANT" name="PARTICIPANT" class="form-control select2bs4">
											<option selected="selected" disabled>Please Select one</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="PAKET">Paket Ujian</label>
										<select id="PAKET" name="PAKET" class="form-control select2bs4">
											<option selected="selected" disabled>Please Select one</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="MAX_SCORE">Certificate</label>
										<input type="text" placeholder="Nomor Sertifikat Peserta"
											   class="form-control" id="CERTIFICATE" name="CERTIFICATE">
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

        getSemuaPesertaUjian();

        getPeserta();

        getPaket();

        $('#submit').click(function () {
            console.log('submit');
            if (validateForm('submit')) {
                var formData = new FormData();
                var selectedPeserta = document.getElementById('PARTICIPANT');
                var selectedPaket = document.getElementById('PAKET');
                var certificate = $('#CERTIFICATE').val();
                var peserta = selectedPeserta.options[selectedPeserta.selectedIndex].value;
                var paket = selectedPaket.options[selectedPaket.selectedIndex].value;
                console.log($('#idEvent').val() + '/' + peserta + '/' + paket);
                formData.append('EVENT', $('#idEvent').val());
                formData.append('PAKET', paket);
                formData.append('PESERTA', peserta);
                formData.append('CERTIFICATE', certificate);
                submitForm(formData);
            } else {
                Swal.fire(
                    'ERROR!',
                    'Please fill insert form correctly',
                    'error'
                );
            }
        });
    });

    function getPaket() {
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: '<?=base_url('Soal/getPaketSoal'); ?>',
            success: function (res) {
                console.log(res);
                var examinerOpt = '<option selected="selected" disabled>Please Select one</option>';
                $.each(res, function (index, value) {
                    examinerOpt += '<option value="' + value.ID + '">' + value.SHEET_NO + '</option>';
                });
                document.getElementById('PAKET').innerHTML = examinerOpt;
            }
        });
    }

    function getPeserta() {
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: '<?=base_url('User/getSemuaPeserta'); ?>',
            success: function (res) {
                console.log(res);
                var examinerOpt = '<option selected="selected" disabled>Please Select one</option>';
                $.each(res, function (index, value) {
                    examinerOpt += '<option value="' + value.ID + '">' + value.NAME + '</option>';
                });
                document.getElementById('PARTICIPANT').innerHTML = examinerOpt;
            }
        });
    }

    function submitForm(inputData) {
        console.log(inputData);
        $.ajax({
            type: 'POST',
            data: inputData,
            dataType: 'JSON',
            processData: false,
            contentType: false,
            url: '<?=base_url('Schedule/insertPesertaTest'); ?>',
            success: function (res) {
                console.log(res);
                var item = res.data;
                var pushData = {
                    "ID": item.ID,
                    "NAME": item.NAME,
                    "SHEET_NO": item.SHEET_NO,
                    "ENCODE": item.ENCODE,
					"CERTIFICATE": item.CERTIFICATE
                };
                Swal.fire(
                    res.message.title,
                    res.message.content,
                    res.message.type
                );
                if (res.message.type === 'success') {
                    pushToData(pushData);
                    reloadDataTable();
				}
            },
        });
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

    function validateForm() {
        var selectedPeserta = document.getElementById('PARTICIPANT');
        var selectedPaket = document.getElementById('PAKET');
        var peserta = selectedPeserta.options[selectedPeserta.selectedIndex].value;
        var paket = selectedPaket.options[selectedPaket.selectedIndex].value;
        return !(peserta === '' || paket === '' || typeof peserta === 'undefined' || typeof paket === 'undefined');
    }

    function getSemuaPesertaUjian() {
        var idEvent = $('#idEvent').val();
        $.ajax({
            url: '<?=base_url('Schedule/getSemuaPesertaTest/'); ?>' + idEvent,
            type: 'GET',
            dataType: 'JSON',
            success: function (res) {
                var response = res.data;
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
            url: '<?=base_url("Schedule/deletePeserta/"); ?>' + id,
            type: 'POST',
            success: function (res) {
                console.log(res);
                Swal.fire(
                    'Deleted!',
                    'Data has been deleted',
                    'success'
                );
				window.location.reload();
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
        document.location.href = '<?=base_url('Schedule/editEventPage/'); ?>' + id;
    }

    function pushToData(item) {
        var btn  = '<div class="btn-group">' +
            '<button class="btn-danger deleteButton" onclick="onClickDeactive(' + item.ID + ')"><i class="ion-close"></i></button>' +
            '</div>';
        var temp = [
            item.NAME,
            item.SHEET_NO,
			item.CERTIFICATE,
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
