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
		.title-box {
			padding: 20px;
			border: 1px;
			border-color: black;
			border-style: solid;
		}
		h5, dd {
			font-weight: bold;
		}
	</style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
	<div class="content-wrapper">
		<div class="row" style="margin-left: 3%; margin-top: 1%; margin-bottom: 2%">
			<img src="<?= base_url() ?>assets/img/logo_MSS.jpg" alt="logo" width="10%" height="10%">
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 title-box">
				<div class="row">
					<div class="col-md-4">
						<h5>Question Sheet no.</h5>
					</div>
					<div class="col-md-1">
						<h5>:</h5>
					</div>
					<div style="align-items: flex-start" class="col-md-7">
						<h5 style="text-align: left"><?= $header['SHEET_NO']; ?></h5>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<h5>Method</h5>
					</div>
					<div class="col-md-1">
						<h5>:</h5>
					</div>
					<div style="align-items: flex-start" class="col-md-7">
						<h5 style="text-align: left"><?= $header['METHOD']; ?></h5>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<h5>Examination Area</h5>
					</div>
					<div class="col-md-1">
						<h5>:</h5>
					</div>
					<div style="align-items: flex-start" class="col-md-7">
						<h5 style="text-align: left"><?= $header['EXAM_AREA']; ?></h5>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<h5>NDE-Level</h5>
					</div>
					<div class="col-md-1">
						<h5>:</h5>
					</div>
					<div style="align-items: flex-start" class="col-md-7">
						<h5 style="text-align: left"><?= $header['NDE_LEVEL']; ?></h5>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<h5>Duration</h5>
					</div>
					<div class="col-md-1">
						<h5>:</h5>
					</div>
					<div style="align-items: flex-start" class="col-md-7">
						<h5 style="text-align: left"><?= $header['DURATION']; ?> Minutes</h5>
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
		<!-- Rules -->
		<div class="row" style="margin-top: 1%">
			<div class="col-md-2"></div>
			<div class="col-md-8 title-box">
				<input type="hidden" id="rulesContent" value="<?= $header['RULES']; ?>">
				<d1 class="row">
					<dd class="col-md-12" id="rules"></dd>
				</d1>
			</div>
			<div class="col-md-2"></div>
		</div>
		<!-- Rules End -->
		<div class="row" style="margin-top: 4%">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<?php
				$no = 1;
				$print = '';
				foreach ($soal as $pert) {
					$print .= '<div class="row">';
					$print .= '<div class="col-md-1"><p>' . $no . '</p></div>';
					$print .= '<div class="col-md-11" style="align-content: flex-start">';
					$print .= '<p>' . $pert['CONTENT'] .'</p>';
					if ($pert['IMAGE'] !== null) {
						$print .= '<img style="margin-bottom: 2%" src="' . $pert['IMAGE'] . '" class="img-fluid" width="400" height="400">';
					}
					foreach ($pert['ANSWER'] as $jawaban) {
						$print .= '<p>' . $jawaban['ALPHA'] . '. ' . $jawaban['ANSWER_TEXT'] . '</p>';
					}
					$print .= '</div>';
					$print .= '</div>';
					$no++;
				}
				echo $print;
				?>
<!--				<div class="row">-->
<!--					<div class="col-md-1">-->
<!--						<p>1.</p>-->
<!--					</div>-->
<!--					<div class="col-md-11" style="align-content: flex-start">-->
<!--						<p>sljalsjdklasjdlkajslkdjaklsjdlkasjkdljaskldjlkasjdklasjdkljaslkdjl;cmsa;mc;asmcksamdlkasmdkamsldmakslmdlkasmdlkasmdkl</p>-->
<!--						<p>a. sdaklsdkalsjdlkas</p>-->
<!--						<p>b. sandlkaslmkldmlas</p>-->
<!--						<p>c. klsmdasmmcsklsma</p>-->
<!--						<p>d. kfoekopweofkopekofowpkeopfkwope</p>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="row">-->
<!--					<div class="col-md-1">-->
<!--						1.-->
<!--					</div>-->
<!--					<div class="col-md-11" style="align-content: flex-start">-->
<!--						<p>sljalsjdklasjdlkajslkdjaklsjdlkasjkdljaskldjlkasjdklasjdkljaslkdjl;cmsa;mc;asmcksamdlkasmdkamsldmakslmdlkasmdlkasmdkl</p>-->
<!--						<img style="margin-bottom: 2%" src="--><?//=base_url();?><!--uploads/soal_img/5.jpg" class="img-fluid" width="400" height="400">-->
<!--						<p>a. sdaklsdkalsjdlkas</p>-->
<!--						<p>b. sandlkaslmkldmlas</p>-->
<!--						<p>c. klsmdasmmcsklsma</p>-->
<!--						<p>d. kfoekopweofkopekofowpkeopfkwope</p>-->
<!--					</div>-->
<!--				</div>-->
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
		writeRules();
		window.print();
    });

    function writeRules() {
		var rules = $('#rulesContent').val();
		document.getElementById('rules').innerText = rules;
    }
</script>
</body>

<!-- Mirrored from adminlte.io/themes/v3/pages/layout/top-nav.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Jan 2020 04:53:27 GMT -->
</html>
