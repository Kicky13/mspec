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
						<h3>Sunting Paket Soal</h3>
						<input hidden id="idPaket" value="<?= $id; ?>">
					</div>
					<form role="form" id="update-paket" name="update-paket">
						<div class="card-body">
							<div class="form-group">
								<label for="SHEET_NO">Kode Paket</label>
								<input type="text" class="form-control" id="SHEET_NO" name="SHEET_NO"
									   placeholder="Masukkan Kode Paket">
							</div>
							<div class="form-group">
								<label for="METHOD">Method</label>
								<input type="text" class="form-control" id="METHOD" name="METHOD"
									   placeholder="Masukkan Method">
							</div>
							<div class="form-group">
								<label for="EXAM_AREA">Examination Area</label>
								<input type="text" class="form-control" id="EXAM_AREA" name="EXAM_AREA"
									   placeholder="Masukkan Examination Area">
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="NDE_LEVEL">NDE-Level</label>
										<input type="text" class="form-control" id="NDE_LEVEL" name="NDE_LEVEL"
											   placeholder="Masukkan NDE-Level Test">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="DURATION">Durasi</label>
										<div class="input-group">
											<input type="text" placeholder="Masukkan durasi test" class="form-control"
												   id="DURATION" name="DURATION">
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
										<input type="text" class="form-control" id="EXAM_TYPE" name="EXAM_TYPE"
											   placeholder="Masukkan Examination type">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="MAX_SCORE">Maximum Score</label>
										<input type="text" placeholder="Maksimum score 100 apabila kolom ini dikosongi"
											   class="form-control" id="MAX_SCORE" name="MAX_SCORE">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="RULES">Rules</label>
								<textarea class="form-control" rows="5" id="RULES" name="RULES"
										  placeholder="Deskripsikan Rule Test disini"></textarea>
							</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<button type="button" id="update" class="btn btn-success">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modal-default">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Upload Excel Bank Soal</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form id="upload" enctype="multipart/form-data">
						<div class="modal-body">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="excel">
								<label class="custom-file-label" for="excel">Choose file</label>
							</div>
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" id="saveUpload" value="submit" class="btn btn-primary">Save changes</button>
						</div>
					</form>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="col-12">
							<div class="col-6">
								<h3>List Paket Soal</h3>
							</div>
							<div class="col-6">
								<button type="button" data-toggle="modal" data-target="#modal-default"
										class="btn btn-success"><i class="ion-android-add"></i> Upload Soal
								</button>
							</div>
						</div>
					</div>
					<div class="card-body">
						<table id="tableSoal" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>No. Paket</th>
								<th>Pertanyaan</th>
								<th>Jawaban Benar</th>
								<th>Deskripsi Jawaban</th>
							</tr>
							</thead>
							<tbody>
							</tbody>
							<tfoot>
							<tr>
								<th>No. Paket</th>
								<th>Pertanyaan</th>
								<th>Jawaban Benar</th>
								<th>Deskripsi Jawaban</th>
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
    var idPaket = $('#idPaket').val();
    var isLoading = false;
    $(function () {
        console.log('Ready');
        getDetailPaket();
        getSoal();

        bsCustomFileInput.init();

        $('#upload').submit(function (e) {
			e.preventDefault();
			var formData = new FormData;
			const file = document.getElementById('excel');
			formData.append('uploaded', file.files[0]);
			console.log(file.files[0]);
			$.ajax({
				url: '<?=base_url('Soal/uploadSoal/'); ?>' + idPaket,
				type: 'POST',
				enctype: 'multipart/form-data',
				dataType: 'JSON',
                processData: false,
                contentType: false,
				data: formData,
				success: function (res) {
					console.log(res);
					Swal.fire(
					    res.title,
						res.message,
						res.type,
					);
					// location.reload();
                }
			});
        });

        $('#update').click(function () {
            console.log('Update');
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
            $.ajax({
                url: '<?= base_url('Soal/updatePaket/'); ?>' + idPaket,
                type: 'POST',
                dataType: 'JSON',
                data: inputData,
                success: function (res) {
                    console.log(res);
                    swal.fire(res.titlemsg, res.contentmsg, res.typemsg);
                }
            });
        });
    });

    function reloadDataTable() {
        $('#tableSoal').DataTable().destroy();
        $('#tableSoal').DataTable({
            data: data,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
        });
    }

    function getSoal() {
        $.ajax({
            url: '<?=base_url('Soal/getSoalPerPaket/'); ?>' + idPaket,
            type: 'GET',
            dataType: 'JSON',
            success: function (res) {
                var response = res;
                response.forEach(pushToDataSoal);
                reloadDataTable();
            }
        });
    }

    function getDetailPaket() {
        $.ajax({
            url: '<?=base_url('Soal/getDetailPaket/'); ?>' + idPaket,
            type: 'GET',
            dataType: 'JSON',
            success: function (response) {
                $('#SHEET_NO').val(response.SHEET_NO);
                $('#METHOD').val(response.METHOD);
                $('#EXAM_AREA').val(response.EXAM_AREA);
                $('#EXAM_TYPE').val(response.EXAM_TYPE);
                $('#DURATION').val(response.DURATION);
                $('#MAX_SCORE').val(response.MAX_SCORE);
                $('#RULES').val(response.RULES);
                $('#NDE_LEVEL').val(response.NDE_LEVEL);
            }
        })
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
        var btn = '<div class="btn-group">' +
            '<button class="btn-info edit" onclick="gotoEditPage(' + item.ID + ')"><i class="ion-android-create"></i></button>' +
            '<button class="btn-danger deleteButton" onclick="onClickDelete(' + item.ID + ')"><i class="ion-close"></i></button>' +
            '</div>';
        var temp = [
            item.SHEET_NO,
            item.METHOD,
            item.MAX_SCORE,
            item.MAX_SCORE,
            btn,
        ];
        data.push(temp);
    }
    function pushToDataSoal(item) {
        var btn = '<div class="btn-group">' +
            // '<button class="btn-info edit" onclick="gotoEditPage(' + item.ID + ')"><i class="ion-android-create"></i></button>' +
            // '<button class="btn-danger deleteButton" onclick="onClickDelete(' + item.ID + ')"><i class="ion-close"></i></button>' +
            '</div>';
        var temp = [
            item.SHEET_NO,
            item.CONTENT,
            item.ALPHA,
            item.ANSWER_TEXT,
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
