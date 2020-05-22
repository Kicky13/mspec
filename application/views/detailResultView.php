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
						<button type="button" class="btn btn-primary">LJK</button>
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
								<th>No</th>
								<th>Kode Event</th>
								<th>No Cert</th>
								<th>Name</th>
								<th>Method</th>
								<th>Date</th>
								<th>Paket</th>
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
								<th>Paket</th>
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
    $(function () {
        getSemuaPesertaUjian();
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
		$('#modal-default').modal();
    }

    function getSemuaPesertaUjian() {
        var idEvent = $('#idEvent').val();
        $.ajax({
            url: '<?=base_url('Result/getSemuaResultTest/'); ?>' + idEvent,
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

    function pushToData(item) {
        var numb = data.length + 1;
        var ljk = item.LJK;
        var btn  = '';
        for (var i = 0; i < ljk.length; i++) {
            if (i === ljk.length - 1) {
                btn += '<a href="#" id="modalLink'+ ljk[i].ID + '" data-true="'+ ljk[i].TRUE_ANSWER + '" data-false="'+ ljk[i].FALSE_ANSWER + '" data-answered="'+ ljk[i].ANSWERED + '" data-score="'+ ljk[i].SCORE + '" data-timefinish="'+ ljk[i].TIME_FINISHED + '" onclick="openModal(' + ljk[i].ID + ')">' + ljk[i].SHEET_NO + '</a>';
			} else {
                btn += '<a href="#" id="modalLink'+ ljk[i].ID + '" data-true="'+ ljk[i].TRUE_ANSWER + '" data-false="'+ ljk[i].FALSE_ANSWER + '" data-answered="'+ ljk[i].ANSWERED + '" data-score="'+ ljk[i].SCORE + '" data-timefinish="'+ ljk[i].TIME_FINISHED + '" onclick="openModal(' + ljk[i].ID + ')">' + ljk[i].SHEET_NO + '</a>, ';
			}
		}
        var temp = [
            numb,
            item.ENCODE,
            item.CERTIFICATE,
            item.NAME,
            item.METHOD,
            item.EVENT_DATE,
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
