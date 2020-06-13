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
		<div class="modal loader" id="loader-modal"></div>
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
							<button type="submit" id="saveUpload" value="submit" class="btn btn-primary">Submit</button>
							<button hidden type="submit" id="isLoading" disabled class="btn secondary">
								<div class="spinner-border text-blue" role="status">
									<span class="sr-only">Loading...</span>
								</div>
							</button>
						</div>
					</form>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<div class="modal fade" id="modal-view">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Detail Jawaban</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<table id="tableJawaban" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>Opsi</th>
									<th>Deskripsi Jawaban</th>
									<th>Nilai</th>
									<th>Action</th>
									<!--								<th>Action</th>-->
								</tr>
								</thead>
								<tbody id="tbody-jawaban">
								</tbody>
								<tfoot>
								<tr>
									<th>Opsi</th>
									<th>Deskripsi Jawaban</th>
									<th>Nilai</th>
									<th>Action</th>
									<!--								<th>Action</th>-->
								</tr>
								</tfoot>
							</table>
						</div>
						<div class="row" id="update-answer-section" hidden>
							<div class="col-md-12">
								<h3>Edit Jawaban</h3>
								<form role="form" id="update-answer" name="update-question">
									<div class="form-group">
										<label for="ABJAD">Abjad</label>
										<input type="text" id="ABJAD" name="ABJAD" class="form-control" placeholder="Inputkan abjad pada pilihan (Ex: A,B,C,D,E or 1, 2, 3, 4 etc">
									</div>
									<div class="form-group">
										<label for="ANSWER">Content</label>
										<textarea class="form-control" rows="5" id="ANSWER" name="ANSWER"
												  placeholder="Deskripsikan Jawaban disini"></textarea>
									</div>
									<div class="form-group">
										<label for="VALUE">Value</label>
										<div class="row">
											<div class="col-md-3">
												<input onclick="changeValue(1)" value="1" type="radio" id="VALUETRUE" name="VALUEOPT">
												<label> True</label>
											</div>
											<div class="col-md-3">
												<input onclick="changeValue(0)" value="0" type="radio" id="VALUEFALSE" name="VALUEOPT">
												<label> False</label>
											</div>
										</div>
										<input type="hidden" value="" id="VALUE" name="VALUE">
									</div>
									<!-- /.card-body -->
									<div class="card-footer">
										<button type="button" id="updateJawaban" class="btn btn-success">Update</button>
									</div>
								</form>
							</div>
						</div>
					</div>
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
								<h3>List Soal</h3>
							</div>
							<div class="col-6">
								<button type="button" data-toggle="modal" data-target="#modal-default"
										class="btn btn-success">
									<i class="ion-android-add"></i> Upload Soal
								</button>
							</div>
						</div>
					</div>
					<div class="card-body">
						<table id="tableSoal" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>Kode Soal</th>
								<th>Pertanyaan</th>
								<th>Jawaban Benar</th>
								<th>Deskripsi Jawaban</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							</tbody>
							<tfoot>
							<tr>
								<th>Kode Soal</th>
								<th>Pertanyaan</th>
								<th>Jawaban Benar</th>
								<th>Deskripsi Jawaban</th>
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
		<div class="row" id="update-question-section" hidden>
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3>Sunting Pertanyaan</h3>
					</div>
					<form role="form" id="update-question" name="update-question">
						<div class="card-body">
							<div class="text-center">
								<img style="margin-bottom: 2%" class="img-fluid" src="" name="IMAGEVIEW" id="IMAGEVIEW"
									 width="1000" height="1000">
							</div>
							<div class="form-group">
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="IMAGE" name="IMAGE">
									<label class="custom-file-label" for="excel">Choose file</label>
								</div>
							</div>
							<div class="form-group">
								<label for="QUESTION">Question</label>
								<textarea class="form-control" rows="5" id="QUESTION" name="QUESTION"
										  placeholder="Deskripsikan Pertanyaan disini"></textarea>
							</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<button type="button" id="updateSoal" class="btn btn-success">Update</button>
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
    var idPaket = $('#idPaket').val();
    var isLoading = false;
    $(function () {
        console.log('Ready');
        $('#IMAGE').change(function () {
            readURL(this);
        });
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
                beforeSend: function () {
                    document.getElementById('saveUpload').setAttribute('hidden', true);
                    document.getElementById('isLoading').removeAttribute('hidden');
                },
                success: function (res) {
                    console.log(res);
                    Swal.fire(
                        res.title,
                        res.message,
                        res.type,
                    );
                    if (res.type === 'success') {
                        window.location.reload();
                    }
                }
            });
        });

        $('#updateJawaban').click(function () {
			var id = document.getElementById('updateJawaban').getAttribute('data-id');
			var content = $('#ANSWER').val();
			var abjad = $('#ABJAD').val();
			var value = $('#VALUE').val();
			var updateBody = {
			    ID: id,
			    ANSWER_TEXT: content,
				ALPHA: abjad,
				VALUE: value
			}
			updateJawaban(updateBody);
        });

        $('#updateSoal').click(function () {
            var id = document.getElementById('updateSoal').getAttribute('data-id');
            var content = $('#QUESTION').val();
            var img = document.getElementById('IMAGE');
            console.log(img.files[0]);
            var formData = new FormData();
            typeof img.files[0] === 'undefined' ? console.log('image kosong') : formData.append('IMAGE', img.files[0]);
            formData.append('CONTENT', content);
            formData.append('ID', id);
            updateSoal(formData);
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

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#IMAGEVIEW').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function refreshData() {
		data = [];
		getSoal();
    }

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

    function updateSoal(inputData) {
        $.ajax({
            type: 'POST',
            data: inputData,
            dataType: 'JSON',
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            url: '<?= base_url('Soal/questionUpdate'); ?>',
            success: function (res) {
                console.log(res);
                var alert = res.alert;
                if (alert.type === 'success') {
                    swal.fire(alert.header, alert.body, alert.type);
                    document.getElementById('update-question-section').setAttribute('hidden', true);
                    // window.location.reload();
					refreshData();
                }
            }
        })
    }

    function getSoal() {
        $.ajax({
            url: '<?=base_url('Soal/getSoalPerPaket/'); ?>' + idPaket,
            type: 'GET',
            dataType: 'JSON',
            success: function (res) {
                console.log(res);
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

    function editQuestion(id) {
        document.getElementById('updateSoal').removeAttribute('data-id');
        var elementID = 'question' + id;
        var element = document.getElementById(elementID);
        var content = element.getAttribute('data-content');
        var img = element.getAttribute('data-image');
        console.log(img);
        $('#QUESTION').val(content);
        document.getElementById('IMAGEVIEW').src = img;
        document.getElementById('update-question-section').removeAttribute('hidden');
        console.log(element.getAttribute('data-content'));
        document.getElementById('updateSoal').setAttribute('data-id', id);
        window.scrollTo(0, document.body.scrollHeight);
    }

    function pushToDataSoal(item) {
        var img = (item.IMAGE == null) ? '' : item.IMAGE;
        var btn = '<div class="btn-group">' +
            '<button class="btn-success" onclick="answerDetail(' + item.QUESTION_ID + ')"><i class="ion-eye"></i></button>' +
            '<button class="btn-info" id="question' + item.QUESTION_ID + '" data-image="' + img + '" data-content="' + item.CONTENT + '" onclick="editQuestion(' + item.QUESTION_ID + ')"><i class="ion-edit"></i></button>' +
            '<button class="btn-danger" onclick="onclickDeleteSoal(' + item.QUESTION_ID + ')"><i class="ion-close"></i></button>' +
            '</div>';
        var temp = [
            item.SHEET_NO + '-' + item.QUESTION_ID,
            item.CONTENT,
            item.ALPHA,
            item.ANSWER_TEXT,
            btn,
        ];
        data.push(temp);
    }

    function onclickDeleteSoal(id) {
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
                var formData = new FormData();
                console.log(id + ':' + $('#idPaket').val());
                formData.append('SOAL_ID', id);
                formData.append('PAKET_ID', $('#idPaket').val());
                deleteSoal(formData);
            }
        });
    }

    function changeValue(value) {
		document.getElementById('VALUE').value = value;
    }

    function deleteSoal(inputData) {
        $.ajax({
            url: '<?=base_url("Soal/deleteSoal"); ?>',
            type: 'POST',
            data: inputData,
            dataType: 'JSON',
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            success: function (res) {
                console.log(res);
                Swal.fire(
                    'Deleted!',
                    'Data has been deleted',
                    'success'
                );
                if (res.status === 'success') {
                    // window.location.reload();
					refreshData();
                }
            }
        });
    }

    function updateJawaban(body) {
		$.ajax({
			url: '<?= base_url('Soal/answerUpdate'); ?>',
			dataType: 'JSON',
			type: 'POST',
			data: body,
			success: function (res) {
				console.log(res);
				var alert = res.alert;
				swal.fire(
				    alert.header,
					alert.body,
					alert.type
				);
				document.getElementById('update-answer-section').setAttribute('hidden', true);
				$('#modal-view').modal('hide');
				refreshData();
            }
		});
    }

    function editJawaban(id) {
        document.getElementById('VALUETRUE').checked = false;
        document.getElementById('VALUEFALSE').checked = false;
		var elementID = document.getElementById('jawaban' + id);
		var content = elementID.getAttribute('data-content');
		var abjad = elementID.getAttribute('data-code');
		var value = elementID.getAttribute('data-value');
		$('#ABJAD').val(abjad);
		$('#ANSWER').val(content);
		$('#VALUE').val(value);
		document.getElementById('updateJawaban').setAttribute('data-id', id);
        if (value == 1) {
		    document.getElementById('VALUETRUE').checked = true;
		} else {
		    document.getElementById('VALUEFALSE').checked = true;
		}
		document.getElementById('update-answer-section').removeAttribute('hidden');
    }

    function answerDetail(id) {
        $.ajax({
            url: '<?=base_url("Soal/answerDetail/"); ?>' + id,
            type: 'POST',
            dataType: 'JSON',
            success: function (res) {
                if (res.status === 'success') {
                    var body = '';
                    var data = res.data;
                    console.log(data);
                    for (var i = 0; i < data.length; i++) {
                        var nilai = data[i].VALUE == 0 ? 'FALSE' : 'TRUE';
                        body += '<tr>';
                        body += '<td>' + data[i].ALPHA + '</td>';
                        body += '<td>' + data[i].ANSWER_TEXT + '</td>';
                        body += '<td>' + nilai + '</td>';
                        body += '<td><button data-value="' + data[i].VALUE + '" data-code="' + data[i].ALPHA + '" data-content="' + data[i].ANSWER_TEXT + '" id="jawaban' + data[i].ID + '" onclick="editJawaban(' + data[i].ID + ')" class="btn-success"><i class="ion-edit"></i></button></td>';
                        body += '</tr>';
                    }
                    document.getElementById('tbody-jawaban').innerHTML = body;
                    document.getElementById('update-answer-section').setAttribute('hidden', true);
                    $('#modal-view').modal('show');
                }
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
