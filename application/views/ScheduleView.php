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
								<th>Action</th>
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
						<h3>Tambah Jadwal Ujian</h3>
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
										<div class="input-group date" id="EVENT_START_T" data-target-input="nearest">
											<input type="text" id="EVENT_START" name="EVENT_START" placeholder="Klik tombol jam disebelah kanan untuk mengisi" class="form-control datetimepicker-input" data-target="#EVENT_START"/>
											<div class="input-group-append" data-target="#EVENT_START" data-toggle="datetimepicker">
												<div class="input-group-text"><i class="far fa-clock"></i></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="DURATION">Jam Selesai</label>
										<div class="input-group date" id="EVENT_END_T" data-target-input="nearest">
											<input type="text" id="EVENT_END" name="EVENT_END" placeholder="Klik tombol jam disebelah kanan untuk mengisi" class="form-control datetimepicker-input" data-target="#EVENT_END"/>
											<div class="input-group-append" data-target="#EVENT_END" data-toggle="datetimepicker">
												<div class="input-group-text"><i class="far fa-clock"></i></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="EVENT_LOCATION">Lokasi Ujian</label>
								<input type="text" class="form-control" id="EVENT_LOCATION" name="EVENT_LOCATION" placeholder="Masukkan Lokasi Ujian">
							</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<button type="button" id="submit" class="btn btn-primary">Submit</button>
							<button type="button" hidden id="update" class="btn btn-success">Update</button>
							<button type="button" hidden id="cancel" class="btn btn-danger">Cancel</button>
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
                var selected = document.getElementById('EXAMINER');
                var penguji = selected.options[selected.selectedIndex].value;
                var id = $(this).attr('data-id');
                console.log(penguji);
                formData.append('EVENT_TITLE', $('#EVENT_TITLE').val());
                formData.append('EVENT_DATE', $('#EVENT_DATE').val());
                formData.append('EVENT_LOCATION', $('#EVENT_LOCATION').val());
                formData.append('EVENT_START', $('#EVENT_START').val());
                formData.append('EVENT_END', $('#EVENT_END').val());
                formData.append('EXAMINER', penguji);
                formData.append('ID', id);
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
                var selected = document.getElementById('EXAMINER');
                var penguji = selected.options[selected.selectedIndex].value;
                formData.append('EVENT_TITLE', $('#EVENT_TITLE').val());
                formData.append('EVENT_DATE', $('#EVENT_DATE').val());
                formData.append('EVENT_START', $('#EVENT_START').val());
                formData.append('EVENT_END', $('#EVENT_END').val());
                formData.append('EVENT_LOCATION', $('#EVENT_LOCATION').val());
                formData.append('EXAMINER', penguji);
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

    function updateData(inputData) {
        $.ajax({
            type: 'POST',
            data: inputData,
            dataType: 'JSON',
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            url: '<?=base_url('Schedule/updateSchedule'); ?>',
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
					examinerOpt += '<option value="' + value.ID + '-' + value.NAME + '">' + value.NAME + '</option>';
                });
				document.getElementById('EXAMINER').innerHTML = examinerOpt;
            }
		});
    }

    function submitForm(inputData) {
        $.ajax({
            type: 'POST',
            data: inputData,
            dataType: 'JSON',
            processData: false,
            contentType: false,
            url: '<?=base_url('Schedule/insertJadwalTest'); ?>',
            success: function (res) {
                console.log(res);
                var item = res.data;
                var pushData = {
                    "ID": item.ID,
                    "EVENT_TITLE": item.EVENT_TITLE,
                    "EVENT_DATE": item.EVENT_DATE,
                    "EVENT_START": addSecond(item.EVENT_START),
                    "EVENT_END": addSecond(item.EVENT_END),
					"EVENT_LOCATION": item.EVENT_LOCATION,
					"ID_PENGUJI": item.ID_PENGUJI,
					"NAMA_PENGUJI": item.NAMA_PENGUJI,
					"ENCODE": item.ENCODE,
                };
                Swal.fire(
                    res.message.title,
                    res.message.content,
                    res.message.type
                );
                $('#EVENT_TITLE').val('');
                $('#EVENT_DATE').val('');
                $('#EVENT_START').val('');
                $('#EVENT_END').val('');
                pushToData(pushData);
                reloadDataTable();
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

    function validateForm(act) {
        var validated = false;
        var selected = document.getElementById('EXAMINER');
        var penguji = selected.options[selected.selectedIndex].value;
        if (act === 'submit') {
            validated = !($('#EXAMINER').val() === '' || $('#EVENT_TITLE').val() === '' || $('#EVENT_DATE').val() === '' || $('#EVENT_START').val() === '' || $('#EVENT_END').val() === '' || typeof penguji === 'undefined' || penguji === '' || penguji == null);
        } else if (act === 'update') {
            validated = !($('#EXAMINER').val() === '' || $('#EVENT_TITLE').val() === '' || $('#EVENT_DATE').val() === '' || $('#EVENT_START').val() === '' || $('#EVENT_END').val() === '' || typeof penguji === 'undefined' || penguji === '' || penguji == null);
        }
        return validated;
    }

    function getSemuaUjian() {
        $.ajax({
            url: '<?=base_url('Schedule/getSemuaTest'); ?>',
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
            url: '<?=base_url("Schedule/deleteSchedule/"); ?>' + id,
            type: 'POST',
            success: function (res) {
                console.log(res);
                Swal.fire(
                    'Deleted!',
                    'Data has been deleted',
                    'success'
                );
                // if (res.message.type == 'success') {
                    window.location.reload();
                // }
            }
        })
    }

    function cancelUpdate() {
        document.getElementById('submit').removeAttribute('hidden');
        document.getElementById('update').removeAttribute('data-id');
        document.getElementById('update').setAttribute('hidden', true);
        document.getElementById('cancel').setAttribute('hidden', true);
        $('#EVENT_END').val('');
        $('#EVENT_START').val('');
        $('#EVENT_TITLE').val('');
        $('#EVENT_DATE').val('');
    }

    function gotoPesertaList(encode) {
        document.location.href = '<?=base_url('Schedule/editEventPage/'); ?>' + encode;
    }

    function editData(id) {
		var title =  $('#edit' + id).attr('data-title');
		var evdate = $('#edit' + id).attr('data-date');
		var starttime = $('#edit' + id).attr('data-starttime');
		var endtime = $('#edit' + id).attr('data-endtime');
		var location = $('#edit' + id).attr('data-location');
		var penguji = $('#edit' + id).attr('data-penguji') + '-' + $('#edit' + id).attr('data-namapenguji');
		console.log(endtime.slice(5));
		if (location === 'null') {
		    location = '';
		}
		$('#EVENT_TITLE').val(title);
		$('#EVENT_DATE').val(dateFormatter(evdate));
		$('#EVENT_START').val(timeFormatterAMPM(starttime));
		$('#EVENT_END').val(timeFormatterAMPM(endtime));
		$('#EVENT_LOCATION').val(location);
		document.getElementById('EXAMINER').value = penguji;
		document.getElementById('update').removeAttribute('hidden');
		document.getElementById('update').setAttribute('data-id', id);
		document.getElementById('submit').setAttribute('hidden', true);
		document.getElementById('cancel').removeAttribute('hidden');
    }

    function dateFormatter(date) {
        var year = date.substr(0, 4);
        var month = date.substr(5, 2);
        var day = date.slice(-2);
        return newdate = day + '/' + month + '/' + year;
    }

    function addSecond(time) {
		return time + ':00';
    }

    function timeFormatterAMPM(time) {
        var hour = time.substr(0, 2);
        var min = time.substr(3, 2);
		if (hour > 12) {
		    hour = hour - 12;
		    var mode = 'PM';
		} else {
		    var mode = 'AM';
		}
		return hour + ':' + min + ' ' + mode;
    }

    function pushToData(item) {
        var btn  = '<div class="btn-group">' +
            '<button data-namapenguji="' + item.NAMA_PENGUJI + '" data-penguji="' + item.ID_PENGUJI + '" data-kode="' + item.ENCODE + '" data-title="' + item.EVENT_TITLE + '" data-date="' + item.EVENT_DATE + '" data-starttime="' + item.EVENT_START + '" data-endtime="' + item.EVENT_END + '" data-id="' + item.ID + '" class="btn-info edit" id="look' + item.ID + '" onclick="gotoPesertaList(' + item.ID + ')"><i class="ion-person"></i></button>' +
            '<button data-namapenguji="' + item.NAMA_PENGUJI + '" data-penguji="' + item.ID_PENGUJI + '" data-kode="' + item.ENCODE + '" data-title="' + item.EVENT_TITLE + '" data-date="' + item.EVENT_DATE + '" data-starttime="' + item.EVENT_START + '" data-endtime="' + item.EVENT_END + '" data-location="' + item.EVENT_LOCATION + '" data-id="' + item.ID + '" class="btn-success edit" id="edit' + item.ID + '" onclick="editData(' + item.ID + ')"><i class="ion-android-create"></i></button>' +
            '<button class="btn-danger deleteButton" onclick="onClickDeactive(' + item.ID + ')"><i class="ion-close"></i></button>' +
            '</div>';
        var time = item.EVENT_START + ' / ' + item.EVENT_END;
        var temp = [
            item.ENCODE,
            item.EVENT_TITLE,
            item.EVENT_DATE,
            time,
            item.NAMA_PENGUJI,
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
