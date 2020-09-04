<?php $this->load->view('parts/header'); ?>
<?php $this->load->view('parts/sideBar'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Exam Result</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Exam Result</li>
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
						<h3>List Hasil Ujian</h3>
						<button type="button" id="switchToExam" class="btn btn-flat">Switch to view by Exam</button>
					</div>
					<div class="card-body">
						<table id="table1" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>Kode Ujian</th>
								<th>Tanggal Ujian</th>
								<th>Company</th>
								<th>Name</th>
								<th>Paket Soal</th>
								<th>Exam Area</th>
								<th>Exan Type</th>
								<th>Nilai</th>
							</tr>
							</thead>
							<tbody>
							</tbody>
							<tfoot>
							<tr>
								<th>Kode Ujian</th>
								<th>Tanggal Ujian</th>
								<th>Company</th>
								<th>Name</th>
								<th>Paket Soal</th>
								<th>Exam Area</th>
								<th>Exan Type</th>
								<th>Nilai</th>
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
        $('.select2bs4').select2();

        $('#EVENT_START').datetimepicker({
            format: 'LT'
        });

        $('#EVENT_END').datetimepicker({
            format: 'LT'
        });

        $('#switchToExam').click(function () {
			gotoResult();
        });

        $('#EVENT_DATE').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });

        getSemuaUjian();
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

    function getSemuaUjian() {
        $.ajax({
            url: '<?=base_url('Result/getSemuaResultByID'); ?>',
            type: 'GET',
            dataType: 'JSON',
            success: function (res) {
                var response = res.data;
                response.forEach(pushToData);
                reloadDataTable();
            }
        });
    }

    function gotoResult() {
        document.location.href = '<?=base_url('Result/'); ?>';
    }

    function gotoDetailResult(encode) {
        document.location.href = '<?=base_url('Result/detailResultPage/'); ?>' + encode;
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
        var temp = [
            item.ENCODE,
            item.EVENT_DATE,
            item.COMPANY,
			item.NAME,
            item.SHEET_NO,
            item.EXAM_AREA,
			item.EXAM_TYPE,
			item.SCORE
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
