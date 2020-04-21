<?php $this->load->view('parts/header'); ?>
<?php $this->load->view('parts/sideBar'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Paket Soal</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Paket Soal</li>
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
						<h3>List Paket Soal</h3>
					</div>
					<div class="card-body">
						<table id="table1" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>Kode Paket</th>
								<th>Method</th>
								<th>Exam Area</th>
								<th>NDE Level</th>
								<th>Duration</th>
								<th>Exam Type</th>
								<th>Max Score</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							</tbody>
							<tfoot>
							<tr>
								<th>Kode Paket</th>
								<th>Method</th>
								<th>Exam Area</th>
								<th>NDE Level</th>
								<th>Duration</th>
								<th>Exam Type</th>
								<th>Max Score</th>
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
						<h3>Tambah Paket Soal</h3>
					</div>
					<form role="form" id="add-new-paket" name="add-new-paket">
						<div class="card-body">
							<div class="form-group">
								<label for="SHEET_NO">Kode Paket</label>
								<input type="text" class="form-control" id="SHEET_NO" name="SHEET_NO" placeholder="Masukkan Kode Paket">
							</div>
							<div class="form-group">
								<label for="METHOD">Method</label>
								<input type="text" class="form-control" id="METHOD" name="METHOD" placeholder="Masukkan Method">
							</div>
							<div class="form-group">
								<label for="EXAM_AREA">Examination Area</label>
								<input type="text" class="form-control" id="EXAM_AREA" name="EXAM_AREA" placeholder="Masukkan Examination Area">
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="NDE_LEVEL">NDE-Level</label>
										<input type="text" class="form-control" id="NDE_LEVEL" name="NDE_LEVEL" placeholder="Masukkan NDE-Level Test">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="DURATION">Durasi</label>
										<div class="input-group">
											<input type="text" placeholder="Masukkan durasi test" class="form-control" id="DURATION" name="DURATION">
											<div class="input-group-append">
												<span class="input-group-text"> Minutes</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="EXAM_TYPE">Examination Type</label>
										<input type="text" class="form-control" id="EXAM_TYPE" name="EXAM_TYPE" placeholder="Masukkan Examination type">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="MAX_SCORE">Maximum Score</label>
										<input type="text" placeholder="Maksimum score 100 apabila kolom ini dikosongi" class="form-control" id="MAX_SCORE" name="MAX_SCORE">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="RULES">Rules</label>
								<textarea class="form-control" rows="5" id="RULES" name="RULES" placeholder="Deskripsikan Rule Test disini"></textarea>
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

<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
		getPaketSoal();
		checkAdminMenu();
		$('#submit').click(function () {
		    console.log('submit');
            var inputData = {
                "SHEET_NO": $('#SHEET_NO').val(),
				"METHOD": $('#METHOD').val(),
                "EXAM_AREA": $('#EXAM_AREA').val(),
                "NDE_LEVEL": $('#NDE_LEVEL').val(),
                "DURATION": $('#DURATION').val(),
                "EXAM_TYPE": $('#EXAM_TYPE').val(),
                "MAX_SCORE": $('#MAX_SCORE').val(),
                "RULES": $('#RULES').val()
			};
		    console.log(inputData);
			$.ajax({
				type: 'POST',
				data: inputData,
				url: '<?=base_url('Soal/insertSoal'); ?>',
				success: function (res) {
				    console.log(res);
					pushToData(inputData);
					reloadDataTable();
                    $('#SHEET_NO').val('');
                    $('#METHOD').val('');
                    $('#EXAM_AREA').val('');
                    $('#NDE_LEVEL').val('');
                    $('#DURATION').val('');
                    $('#EXAM_TYPE').val('');
                    $('#MAX_SCORE').val('');
                    $('#RULES').val('');
                },
			})
        });
    });

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

    function getPaketSoal() {
        $.ajax({
			url: '<?=base_url('Soal/getPaketSoal'); ?>',
			type: 'GET',
			success: function (res) {
				var response = JSON.parse(res);
				response.forEach(pushToData);
				reloadDataTable();
            }
		});
	}

	function onClickDelete(id) {
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
                deletePaketSoal(id);
            }
        });
    }

	function deletePaketSoal(idPaket) {
		$.ajax({
			url: '<?=base_url("Soal/deletePaket/"); ?>' + idPaket,
			type: 'POST',
			success: function (res) {
				console.log(res);
                Swal.fire(
                    'Deleted!',
                    'Your data has been deleted with id ' + res,
                    'success'
                )
            }
		})
    }

    function gotoEditPage(idPaket) {
		document.location.href = '<?=base_url('Soal/editPagePaket/'); ?>' + idPaket
    }

	function pushToData(item) {
        var btn  = '<div class="btn-group">' +
			'<button class="btn-info edit" onclick="gotoEditPage(' + item.ID + ')"><i class="ion-android-create"></i></button>' +
			'<button class="btn-danger deleteButton" onclick="onClickDelete(' + item.ID + ')"><i class="ion-close"></i></button>' +
			'</div>';
		var temp = [
		    item.SHEET_NO,
			item.METHOD,
			item.EXAM_AREA,
			item.NDE_LEVEL,
			item.DURATION + ' Minutes',
			item.EXAM_TYPE,
			item.MAX_SCORE,
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
