<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<style>
		::-webkit-scrollbar {
			width: 2px;
		}

		/* Track */
		::-webkit-scrollbar-track {
			background: #f1f1f1;
		}

		/* Handle */
		::-webkit-scrollbar-thumb {
			background: #888;
		}

		/* Handle on hover */
		::-webkit-scrollbar-thumb:hover {
			background: #555;
		}
	</style>

	<title>e-Exams | Top Navigator</title>

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand-md navbar-light fixed-top navbar-white">
		<div class="container">
			<a href="<?= base_url('Home') ?>" class="navbar-brand">
				<img src="<?= base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
					 class="brand-image img-circle elevation-3"
					 style="opacity: .8">
				<span class="brand-text font-weight-light">Admine-EXAMS</span>
			</a>

			<button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
					aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse order-3" id="navbarCollapse">
				<!-- Left navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="<?= base_url('Home'); ?>" class="nav-link">Home</a>
					</li>
					<li class="nav-item">
						<a href="#" id="timecounter" class="nav-link"></a>
					</li>
<!--					<li class="nav-item">-->
<!--						<a href="--><?//= base_url('Login/doLogout'); ?><!--" class="nav-link">Logout</a>-->
<!--					</li>-->
<!--					<li class="nav-item">-->
<!--						<a href="--><?//= base_url('Login/doLogout'); ?><!--" class="nav-link">Logout</a>-->
<!--					</li>-->
				</ul>
				<!-- SEARCH FORM -->
				<form class="form-inline ml-0 ml-md-3">
					<div class="input-group input-group-sm">
					</div>
				</form>
			</div>

			<!-- Right navbar links -->
			<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
				<li class="nav-item">
					<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
							class="fas fa-th-large"></i></a>
				</li>
			</ul>
		</div>
	</nav>
	<!-- /.navbar -->

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark"> Top Navigation</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">My Exam List</a></li>
							<li class="breadcrumb-item active">Top Navigation</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-success">
							<div class="card-header">
								<h3 class="card-title">Exam Info</h3>
								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
									</button>
								</div>
								<!-- /.card-tools -->
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<d1 class="row" style="margin-left: 15px; margin-right: 15px">
									<dt class="col-sm-4">Name</dt>
									<dd id="part_name" class="col-sm-8">Rizki Akbar Wahono</dd>
									<dt class="col-sm-4">Date</dt>
									<dd id="event_date" class="col-sm-8">25 April 2020</dd>
									<dt class="col-sm-4">Method</dt>
									<dd id="method" class="col-sm-8">Magnetic Particle Testing</dd>
									<dt class="col-sm-4">Level</dt>
									<dd id="level" class="col-sm-8">II ( Two ) </dd>
									<dt class="col-sm-4">Examination</dt>
									<dd id="examination" class="col-sm-8">GENERAL ( closed book )</dd>
									<dt class="col-sm-4">Duration</dt>
									<dd id="duration" class="col-sm-8">60 Minutes</dd>
									<dt class="col-sm-4">Question No.</dt>
									<dd id="quest_no" class="col-sm-8">MT- G - MSS – 17U01</dd>
									<dt class="col-sm-4">Type of Exam</dt>
									<dd id="typeofexam" class="col-sm-8">Reexamination</dd>
									<dt class="col-sm-4">Company</dt>
									<dd id="company" class="col-sm-8">Private</dd>
									<dt class="col-sm-4">Location</dt>
									<dd id="companyloc" class="col-sm-8">MSS Surabaya</dd>
									<dt class="col-sm-4">Grade</dt>
									<dd id="grade" class="col-sm-8"></dd>
									<dt class="col-sm-4">Examiner</dt>
									<dd id="examiner" class="col-sm-8">Adipadmo
										Reference : NA NDE – Level III
										Cert. no. 126596</dd>
									<dt class="col-sm-4">Rule</dt>
									<dd id="rules" class="col-sm-8">'Attention :
										1.Do not write nor make any drawing on the QUESTION SHEET.
										2.The QUESTION SHEET AND  ANSWER SHEET  shall be returned back to the examiner
										3.In one question may consist more than one correct answer, please choose the best  correct answer by put marking / blacken the “ circle “ consistently  on the  ANSWER SHEET to the following questions as applicable ; if change the answer; cross out twice and then put marking / blacken the “ circle “ at  the new answer, following to put the initial
										4.The questions consist of dual language, should any conflict between them,  the English version shall govern'</dd>
								</d1>
							</div>
							<!-- /.card-body -->
						</div>
					</div>
					<div class="row">
						<h5 class="mt-4 mb-2">Question</h5>
						<div class="col-12">
							<!-- Custom Tabs -->
							<div class="card">
								<div class="card-header d-flex p-0">
									<ul id="tabHeader" class="nav nav-pills ml-auto p-2">
										<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Tab
												1</a></li>
										<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Tab
												2</a></li>
										<li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Tab
												3</a></li>

									</ul>
								</div><!-- /.card-header -->
								<div class="card-body">
									<div class="tab-content" id="tabContent">
										<div class="tab-pane active" id="tab_1">
											A wonderful serenity has taken possession of my entire soul,
											like these sweet mornings of spring which I enjoy with my whole heart.
											I am alone, and feel the charm of existence in this spot,
											which was created for the bliss of souls like mine. I am so happy,
											my dear friend, so absorbed in the exquisite sense of mere tranquil
											existence,
											that I neglect my talents. I should be incapable of drawing a single stroke
											at the present moment; and yet I feel that I never was a greater artist than
											now.
											<div class="row">
												<div class="col-4">
													<input type="radio" id="ans1a" name="ans1" value="a"> A. Ini itu
												</div>
												<div class="col-4">
													<input type="radio" id="ans1b" name="ans1" value="b"> A. Ini itu
												</div>
												<div class="col-4">
													<input type="radio" id="ans1c" name="ans1" value="c"> A. Ini itu
												</div>
												<div class="col-4">
													<input type="radio" id="ans1d" name="ans1" value="d"> A. Ini itu
												</div>
												<div class="col-4">
													<input type="radio" id="ans1e" name="ans1" value="e"> A. Ini itu
												</div>
											</div>
										</div>
										<!-- /.tab-pane -->
										<div class="tab-pane" id="tab_2">
											The European languages are members of the same family. Their separate
											existence is a myth.
											For science, music, sport, etc, Europe uses the same vocabulary. The
											languages only differ
											in their grammar, their pronunciation and their most common words. Everyone
											realizes why a
											new common language would be desirable: one could refuse to pay expensive
											translators. To
											achieve this, it would be necessary to have uniform grammar, pronunciation
											and more common
											words. If several languages coalesce, the grammar of the resulting language
											is more simple
											and regular than that of the individual languages.
											<div class="row">
												<div class="col-4">
													<input type="radio" id="ans2a" name="ans2" value="a"> A. Ini itu
												</div>
												<div class="col-4">
													<input type="radio" id="ans2b" name="ans2" value="b"> A. Ini itu
												</div>
												<div class="col-4">
													<input type="radio" id="ans2c" name="ans2" value="c"> A. Ini itu
												</div>
												<div class="col-4">
													<input type="radio" id="ans2d" name="ans2" value="d"> A. Ini itu
												</div>
												<div class="col-4">
													<input type="radio" id="ans2e" name="ans2" value="e"> A. Ini itu
												</div>
											</div>
										</div>
										<!-- /.tab-pane -->
										<div class="tab-pane" id="tab_3">
											Lorem Ipsum is simply dummy text of the printing and typesetting industry.
											Lorem Ipsum has been the industry's standard dummy text ever since the
											1500s,
											when an unknown printer took a galley of type and scrambled it to make a
											type specimen book.
											It has survived not only five centuries, but also the leap into electronic
											typesetting,
											remaining essentially unchanged. It was popularised in the 1960s with the
											release of Letraset
											sheets containing Lorem Ipsum passages, and more recently with desktop
											publishing software
											like Aldus PageMaker including versions of Lorem Ipsum.
										</div>
										<!-- /.tab-pane -->
									</div>
									<!-- /.tab-content -->
								</div><!-- /.card-body -->
							</div>
							<!-- ./card -->
						</div>
						<!-- /.col -->
					</div>
				</div>
				<!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark fixed">
		<!-- Control sidebar content goes here -->
		<div class="p-3">
			<h5>Title</h5>
			<p>Sidebar content</p>
			<div class="col-lg-12">
				<div class="row pre-scrollable">
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
					<div style="margin-bottom: 5px" class="col-3 number-button">
						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>
					</div>
				</div>
			</div>
		</div>
	</aside>
	<!-- /.control-sidebar -->

	<!-- Main Footer -->
	<footer class="main-footer">
		<!-- To the right -->
		<div class="float-right d-none d-sm-inline">
			Anything you want
		</div>
		<!-- Default to the left -->
		<strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io/">AdminLTE.io</a>.</strong> All rights reserved.
	</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<script>
	var question = [];
    $(function () {
        console.log('ready');
        getExamQuestion();
    });
    
    function getExamQuestion() {
		var id = '<?=$ID; ?>';
		console.log(id);
		$.ajax({
			url: '<?=base_url('Schedule/getDoExamPackage'); ?>',
			type: 'POST',
			dataType: 'JSON',
			data: {
			    id: id,
			},
			success: function (res) {
				console.log(res);
				var data = res.data;
				$('#examiner');
				document.getElementById('part_name').innerText = '<?=$this->session->userdata('NAME'); ?>';
				document.getElementById('event_date').innerText = data.EVENT_DATE;
                document.getElementById('method').innerText = data.METHOD;
                document.getElementById('level').innerText = data.NDE_LEVEL;
                document.getElementById('examination').innerText = data.EXAM_AREA;
                document.getElementById('duration').innerText = data.DURATION + ' Minutes';
                document.getElementById('typeofexam').innerText = data.EXAM_TYPE;
                document.getElementById('company').innerText = '<?=$this->session->userdata('COMPANY'); ?>';
                document.getElementById('companyloc').innerText = '<?=$this->session->userdata('COMPANY_LOCATION'); ?>';
                document.getElementById('examiner').innerText = data.NAME;
                document.getElementById('rules').innerText = data.RULES;
                question = data.QUESTIONS;
                console.log(question);
            }
		});
    }
    
    function buildTab() {
        var inner = '';
		for(i = 0; i < question.length; i++) {
		    inner += '<li class="nav-item"><a class="nav-link" href="#tabno_' + question[i]['NUMBER'] +'" data-toggle="tab">No ' + question[i]['NUMBER'] + '</a></li>';
		}
		document.getElementById('tabHeader').innerHTML = inner;
    }
    
    function buildPanelContent() {
    <div class="tab-pane active" id="tab_1">
            A wonderful serenity has taken possession of my entire soul,
            like these sweet mornings of spring which I enjoy with my whole heart.
            I am alone, and feel the charm of existence in this spot,
            which was created for the bliss of souls like mine. I am so happy,
            my dear friend, so absorbed in the exquisite sense of mere tranquil
        existence,
            that I neglect my talents. I should be incapable of drawing a single stroke
        at the present moment; and yet I feel that I never was a greater artist than
        now.
        <div class="row">
            <div class="col-4">
            <input type="radio" id="ans1a" name="ans1" value="a"> A. Ini itu
        </div>
        <div class="col-4">
            <input type="radio" id="ans1b" name="ans1" value="b"> A. Ini itu
        </div>
        <div class="col-4">
            <input type="radio" id="ans1c" name="ans1" value="c"> A. Ini itu
        </div>
        <div class="col-4">
            <input type="radio" id="ans1d" name="ans1" value="d"> A. Ini itu
        </div>
        <div class="col-4">
            <input type="radio" id="ans1e" name="ans1" value="e"> A. Ini itu
        </div>
        </div>
        </div>

    }
    
    function buildSidebar() {
		
    }
    // Set the date we're counting down to
    var countDownDate = new Date("Apr 25, 2020 23:37:25").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("timecounter").innerHTML = hours + "h "
            + minutes + "m " + seconds + "s ";

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>
</body>

<!-- Mirrored from adminlte.io/themes/v3/pages/layout/top-nav.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Jan 2020 04:53:27 GMT -->
</html>
