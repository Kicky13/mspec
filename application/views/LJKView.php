<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<style>
		table, td, th {
			border: 1px solid;
			text-align: center;
			color: black;
		}
		.radioljk {
			background-color: black;
		}
	</style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
	<div class="content-wrapper">
		<div class="row" style="margin-left: 3%; margin-top: 1%">
			<img src="<?= base_url() ?>assets/img/logo_MSS.jpg" alt="logo" width="10%" height="10%">
		</div>
		<div class="row" style="margin-top: 1%">
			<div class="col-md-4"> </div>
			<div class="col-md-4">
				<h2 class="text-center">ANSWER SHEET</h2>
			</div>
			<div class="col-md-4"> </div>
		</div>
		<div class="row"> </div>
		<div class="row"> </div>
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-4">
						<h5>Name</h5>
					</div>
					<div class="col-md-1">
						<h5>:</h5>
					</div>
					<input id="idHeader" type="hidden" value="<?= $main['HEADER_ID']; ?>">
					<div class="col-md-7">
						<h5><?= $main['NAME']; ?></h5>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<h5>Signature</h5>
					</div>
					<div class="col-md-1">
						<h5>:</h5>
					</div>
					<div class="col-md-7">
						<h5></h5>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<h5>Date</h5>
					</div>
					<div class="col-md-1">
						<h5>:</h5>
					</div>
					<div class="col-md-7">
						<h5><?= $main['EVENT_DATE']; ?></h5>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<h5>Method</h5>
					</div>
					<div class="col-md-1">
						<h5>:</h5>
					</div>
					<div class="col-md-7">
						<h5><?= $main['METHOD']; ?></h5>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<h5>Level</h5>
					</div>
					<div class="col-md-1">
						<h5>:</h5>
					</div>
					<div class="col-md-7">
						<h5><?= $main['NDE_LEVEL']; ?></h5>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<h5>Examination</h5>
					</div>
					<div class="col-md-1">
						<h5>:</h5>
					</div>
					<div class="col-md-6">
						<h5><?= $main['EXAM_AREA']; ?></h5>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<h5>Reference</h5>
					</div>
					<div class="col-md-1">
						<h5>:</h5>
					</div>
					<div class="col-md-6">
						<h5>N/A</h5>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-4">
						<h5>Duration</h5>
					</div>
					<div class="col-md-1">
						<h5>:</h5>
					</div>
					<div class="col-md-6">
						<h5><?= $main['DURATION']; ?> Minutes</h5>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<h5>Question No.</h5>
					</div>
					<div class="col-md-1">
						<h5>:</h5>
					</div>
					<div class="col-md-6">
						<h5><?= $main['SHEET_NO']; ?></h5>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<h5>Type of Exam</h5>
					</div>
					<div class="col-md-1">
						<h5>:</h5>
					</div>
					<div class="col-md-6">
						<h5><?= $main['EXAM_TYPE']; ?></h5>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<h5>Company</h5>
					</div>
					<div class="col-md-1">
						<h5>:</h5>
					</div>
					<div class="col-md-6">
						<h5><?= $main['COMPANY'] == '' ? 'PRIVATE' : $main['COMPANY']; ?></h5>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<h5>Location</h5>
					</div>
					<div class="col-md-1">
						<h5>:</h5>
					</div>
					<div class="col-md-6">
						<h5>MSS Surabaya</h5>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<h5>Grade</h5>
					</div>
					<div class="col-md-1">
						<h5>:</h5>
					</div>
					<div class="col-md-6">
						<h5></h5>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<h5>Examiner</h5>
					</div>
					<div class="col-md-1">
						<h5>:</h5>
					</div>
					<div class="col-md-6">
						<h5><?= $main['EXAMINER']; ?></h5>
						<h5>NDE-Level III</h5>
						<h5>Cert. No 12345</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top: 2%">
			<div class="col-md-1"></div>
			<div class="col-md-5" id="leftsidex">
				<table align="center" border="1" style="table-layout: fixed; min-width: 100%;">
					<thead>
						<tr>
							<th></th>
							<?php foreach ($main['CHOICE'] as $item) {
								echo '<th>' . $item . '</th>';
							} ?>
						</tr>
					</thead>
					<tbody>
					<?php for($i = 0; $i < $main['SIDENUMBER']; $i++) {
						echo '<tr>';
						echo '<td>' . ($i + 1) .'</td>';
						for ($j = 0; $j <= $main['TOTALCHOICE']; $j++) {
							$idRadio = $i . '_' .$j;
							echo '<td>
									<input id="' . $idRadio .'" type="radio">
								  </td>';
						}
						echo '</tr>';
					} ?>
					</tbody>
				</table>
			</div>
			<div align="center" class="col-md-5" id="rightsidex">
				<table align="center" border="1" style="table-layout: fixed; min-width: 100%;">
					<thead>
					<tr>
						<th></th>
						<?php foreach ($main['CHOICE'] as $item) {
							echo '<th>' . $item . '</th>';
						} ?>
					</tr>
					</thead>
					<tbody>
					<?php for($i = 0; $i < $main['SIDENUMBER']; $i++) {
						echo '<tr>';
						echo '<td>' . ($i + 1 + $main['SIDENUMBER']) .'</td>';
						for ($j = 0; $j <= $main['TOTALCHOICE']; $j++) {
							$idRadio = ($i + $main['SIDENUMBER']) . '_' .$j;
							echo '<td>
									<input id="' . $idRadio .'" type="radio">
								  </td>';
						}
						echo '</tr>';
					} ?>
					</tbody>
				</table>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- Sweetalert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<script>
    $(function () {
        console.log('Ready');
        getSemuaJawaban();
    });
    function getSemuaJawaban() {
        var idHeader = $('#idHeader').val();
        $.ajax({
            url: '<?=base_url('Result/getJawabanLJK/'); ?>' + idHeader,
            type: 'GET',
            dataType: 'JSON',
            success: function (res) {
                console.log(res);
                var data = res.data;
                for (var i = 0; i < data.length; i++) {
                    document.getElementById(i + '_' + data[i].ANSWER).setAttribute('checked', true);
				}
                window.print();
            }
        });
    }
</script>
</body>

<!-- Mirrored from adminlte.io/themes/v3/pages/layout/top-nav.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Jan 2020 04:53:27 GMT -->
</html>
