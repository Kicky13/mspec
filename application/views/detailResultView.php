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
			<div class="modal fade" id="modal-default">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Result Detail</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-lg-5">
									<p>Time Finished</p>
								</div>
								<div class="col-lg-2">
									<p>:</p>
								</div>
								<div class="col-lg-5">
									<p id="time">2 Hour 5 Minutes</p>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-5">
									<p>Answered</p>
								</div>
								<div class="col-lg-2">
									<p>:</p>
								</div>
								<div class="col-lg-5">
									<p id="answered">0</p>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-5">
									<p>True Answer</p>
								</div>
								<div class="col-lg-2">
									<p>:</p>
								</div>
								<div class="col-lg-5">
									<p id="trueAns">0</p>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-5">
									<p>False Answer</p>
								</div>
								<div class="col-lg-2">
									<p>:</p>
								</div>
								<div class="col-lg-5">
									<p id="falseAns">0</p>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-5">
									<p>Score</p>
								</div>
								<div class="col-lg-2">
									<p>:</p>
								</div>
								<div class="col-lg-5">
									<p id="score">0</p>
								</div>
							</div>
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="button" id="openLJK" class="btn btn-primary">LJK</button>
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
							<h3>List Hasil Ujian</h3>
							<input type="hidden" id="idEvent" value="<?= $id; ?>">
						</div>
						<div class="card-body">
							<table id="table1" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th rowspan="2">No</th>
									<th rowspan="2">Kode Event</th>
									<th rowspan="2">No Cert</th>
									<th rowspan="2">Name</th>
									<th rowspan="2">Method</th>
									<th rowspan="2">Date</th>
									<th colspan="<?= $colspan; ?>" class="text-center">Paket</th>
								</tr>
								<tr>
									<?php foreach ($tablehead as $item) {
										echo "<th>" . $item['SHEET_NO'] . "</th>";
									} ?>
								</tr>
								</thead>
								<tbody>
								</tbody>
								<tfoot>
								<tr>
									<th>No</th>
									<th>Kode Event</th>
									<th>No Cert</th>
									<th>Name</th>
									<th>Method</th>
									<th>Date</th>
									<th colspan="<?= $colspan; ?>" class="text-center">Paket</th>
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
        var tablehead = [];
        var colspan;
        $(function () {
            getSemuaPesertaUjian();

            $('#openLJK').click(function () {
				var dok = document.getElementById('openLJK');
				var id = dok.getAttribute('data-id');
				window.open('<?=base_url('Result/openLJK/'); ?>' + id, '_blank');
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

        function openModal(id) {
            console.log(id);
            var element = document.getElementById('modalLink' + id);
            var time = element.getAttribute('data-timefinish');
            var answered = element.getAttribute('data-answered');
            var trueAns = element.getAttribute('data-true');
            var falseAns = element.getAttribute('data-false');
            var score = element.getAttribute('data-score');
            document.getElementById('time').innerText = time;
            document.getElementById('answered').innerText = answered;
            document.getElementById('falseAns').innerText = falseAns;
            document.getElementById('trueAns').innerText = trueAns;
            document.getElementById('score').innerText = score + '%';
            document.getElementById('openLJK').setAttribute('data-id', id);
            $('#modal-default').modal();
        }

        function getSemuaPesertaUjian() {
            var idEvent = $('#idEvent').val();
            $.ajax({
                url: '<?=base_url('Result/getSemuaResultTest/'); ?>' + idEvent,
                type: 'GET',
                dataType: 'JSON',
                success: function (res) {
                    var response = res.data.result;
                    tablehead = res.data.tablehead;
                    colspan = res.data.colspan;
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

        function pushToData(item) {
            var numb = data.length + 1;
            var ljk = item.LJK;
            var temp = [
                numb,
                item.ENCODE,
                item.CERTIFICATE,
                item.NAME,
                item.METHOD,
                item.EVENT_DATE,
            ];
            var indexArr = 6;
            for (var i = 0; i < colspan; i++) {
                if (ljk.length > 0) {
                    for (var j = 0; j < ljk.length; j++) {
                        if (tablehead[i]['SHEET_ID'] === ljk[j]['SHEET_ID']) {
                            var nilaiTemp = '<a href="#" id="modalLink'+ ljk[j].ID + '" data-true="'+ ljk[j].TRUE_ANSWER + '" data-false="'+ ljk[j].FALSE_ANSWER + '" data-answered="'+ ljk[j].ANSWERED + '" data-score="'+ ljk[j].SCORE + '" data-timefinish="'+ ljk[j].TIME_FINISHED + '" onclick="openModal(' + ljk[j].ID + ')">' + ljk[j].SCORE + '%</a>';
                            temp[indexArr] = nilaiTemp;
                            indexArr++;
                        } else {
                            nilaiTemp = '';
                            if (typeof temp[indexArr] === 'undefined' || temp[indexArr] == '') {
                                temp.push(nilaiTemp);
                            }
                        }
                    }
				} else {
                    var nilaiTemp = 'No Result Yet';
                    temp[indexArr] = nilaiTemp;
                    indexArr++;
				}
            }
            data.push(temp);
            console.log(data);
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
