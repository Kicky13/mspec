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
					<li class="nav-item" id="examCounter">
						<a href="#" id="timecounter" class="nav-link"></a>
					</li>
					<li class="nav-item" id="examStart">
						<a href="#" onclick="startExam()" class="nav-link">Start</a>
					</li>
					<li class="nav-item" id="examSubmit">
						<a href="#" onclick="submitLJK()" class="nav-link">Submit</a>
					</li>
					<!--					<li class="nav-item">-->
					<!--						<a href="-->
					<? //= base_url('Login/doLogout'); ?><!--" class="nav-link">Logout</a>-->
					<!--					</li>-->
					<!--					<li class="nav-item">-->
					<!--						<a href="-->
					<? //= base_url('Login/doLogout'); ?><!--" class="nav-link">Logout</a>-->
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
					<div class="col-md-12" id="scoreSection">
						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">Your Score</h3>
								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i
											class="fas fa-minus"></i>
									</button>
								</div>
								<!-- /.card-tools -->
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<d1 class="row" style="margin-left: 15px; margin-right: 15px">
									<dt class="col-sm-4">Number of Question</dt>
									<dd id="total_quest" class="col-sm-8">40</dd>
									<dt class="col-sm-4">Minutes Done</dt>
									<dd id="minutes_done" class="col-sm-8">25 Mins</dd>
									<dt class="col-sm-4">Answered</dt>
									<dd id="answered_quest" class="col-sm-8">25</dd>
									<dt class="col-sm-4">Is True</dt>
									<dd id="true_quest" class="col-sm-8">10</dd>
									<dt class="col-sm-4">Is False</dt>
									<dd id="false_quest" class="col-sm-8">23</dd>
									<dt class="col-sm-4">Answered Percentage</dt>
									<dd id="percentage_answered" class="col-sm-8">50%</dd>
									<dt class="col-sm-4">Percentage of True</dt>
									<dd id="percentage_true" class="col-sm-8">50%</dd>
									<dt class="col-sm-4">Percentage of False</dt>
									<dd id="percentage_false" class="col-sm-8">75%</dd>
									<dt class="col-sm-4">Your Score</dt>
									<dd class="col-sm-8"><h1 id="score">100</h1></dd>
								</d1>
							</div>
							<!-- /.card-body -->
						</div>
					</div>
					<div class="col-md-12">
						<div class="card card-success">
							<div class="card-header">
								<h3 class="card-title">Exam Info</h3>
								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i
											class="fas fa-minus"></i>
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
									<dd id="level" class="col-sm-8">II ( Two )</dd>
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
										Cert. no. 126596
									</dd>
									<dt class="col-sm-4">Rule</dt>
									<dd id="rules" class="col-sm-8">'Attention :
										1.Do not write nor make any drawing on the QUESTION SHEET.
										2.The QUESTION SHEET AND ANSWER SHEET shall be returned back to the examiner
										3.In one question may consist more than one correct answer, please choose the
										best correct answer by put marking / blacken the “ circle “ consistently on the
										ANSWER SHEET to the following questions as applicable ; if change the answer;
										cross out twice and then put marking / blacken the “ circle “ at the new answer,
										following to put the initial
										4.The questions consist of dual language, should any conflict between them, the
										English version shall govern'
									</dd>
								</d1>
							</div>
							<!-- /.card-body -->
						</div>
					</div>
					<div class="row" id="questionSection">
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
<!--										<div class="tab-pane active" id="tab_1">-->
<!--											A wonderful serenity has taken possession of my entire soul,-->
<!--											like these sweet mornings of spring which I enjoy with my whole heart.-->
<!--											I am alone, and feel the charm of existence in this spot,-->
<!--											which was created for the bliss of souls like mine. I am so happy,-->
<!--											my dear friend, so absorbed in the exquisite sense of mere tranquil-->
<!--											existence,-->
<!--											that I neglect my talents. I should be incapable of drawing a single stroke-->
<!--											at the present moment; and yet I feel that I never was a greater artist than-->
<!--											now.-->
<!--											<div class="row">-->
<!--												<div class="col-4">-->
<!--													<input type="radio" id="ans1a" name="ans1" value="a"> A. Ini itu-->
<!--												</div>-->
<!--												<div class="col-4">-->
<!--													<input type="radio" id="ans1b" name="ans1" value="b"> A. Ini itu-->
<!--												</div>-->
<!--												<div class="col-4">-->
<!--													<input type="radio" id="ans1c" name="ans1" value="c"> A. Ini itu-->
<!--												</div>-->
<!--												<div class="col-4">-->
<!--													<input type="radio" id="ans1d" name="ans1" value="d"> A. Ini itu-->
<!--												</div>-->
<!--												<div class="col-4">-->
<!--													<input type="radio" id="ans1e" name="ans1" value="e"> A. Ini itu-->
<!--												</div>-->
<!--											</div>-->
<!--										</div>-->
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
			<h5>Checklist</h5>
			<p>See your done worklist here!</p>
			<div class="col-lg-12">
				<div class="row pre-scrollable" id="sidebarContent">
<!--					<div style="margin-bottom: 5px" class="col-3 number-button">-->
<!--						<button type="button" class="btn btn-block btn-primary btn-flat">1</button>-->
<!--					</div>-->
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

<!-- Sweetalert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<script>
    var question = [];
    var kunci = [];
    var countDownDate = new Date().getTime();
    var duration;
    var sheetID;
    var eventID;
    var inAnswer;
    var isTrue, isFalse;
    var timeFinished;
    var startTime;
    var endTime;
    var maxScore;

    $(function () {
        window.onbeforeunload = function() {
            return 'You have unsaved changes!';
        };
        console.log('ready');
        getExamQuestion();
        document.getElementById('examCounter').setAttribute('hidden', true);
        document.getElementById('examSubmit').setAttribute('hidden', true);
        document.getElementById('questionSection').setAttribute('hidden', true);
        document.getElementById('scoreSection').setAttribute('hidden', true);
    });

    function startExam() {
		var endDate = new Date().getTime();
		countDownDate = endDate + (1000 * 60 * duration);
        // Update the count down every 1 second
        var x = setInterval(function () {

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
                document.getElementById("timecounter").innerHTML = "EXPIRED";
                sendLjk();
            }
        }, 1000);
        document.getElementById('examStart').setAttribute('hidden', true);
        document.getElementById('examCounter').removeAttribute('hidden');
        document.getElementById('examSubmit').removeAttribute('hidden');
        document.getElementById('questionSection').removeAttribute('hidden');
        startTime = new Date().getTime();
    }

    function submitLJK() {
        Swal.fire({
            title: 'Are You Sure Finish Your Exam Now?',
            text: 'You won\'t able to revert this',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, submit it'
        }).then(res => {
            if (res.value) {
                countDownDate = new Date().getTime();
            }
        });
    }

    function sendLjk() {
        var ljk = JSON.stringify(kunci);
        endTime = new Date().getTime();
        openResult();
        $.ajax({
            url: '<?=base_url('Soal/submitLjk'); ?>',
            type: 'POST',
            dataType: 'JSON',
            data: {
                kunci: ljk,
                sheet: sheetID,
				event: eventID,
				duration: timeFinished,
				answered: inAnswer,
				trueAnswer: isTrue,
				falseAnswer: isFalse,
				maxScore: maxScore
            },
            success: function (res) {
                if (typeof res.typemsg !== 'undefined' && res.typemsg === 'success') {
                    document.getElementById('examSubmit').setAttribute('hidden', true);
                    document.getElementById('questionSection').setAttribute('hidden', true);
                    document.getElementById('scoreSection').removeAttribute('hidden');
				} else {
                    Swal.fire(
                        res.titlemsg,
						res.contentmsg,
						res.typemsg
					);
				}
            }
        });
    }

    function openResult() {
		console.log(startTime);
		var totalSoal = kunci.length;
		var answered = 0;
		var timeUse = endTime - startTime;
		var trueAns = 0;
		var falseAns = 0;
		for (i = 0; i < kunci.length; i++) {
		    if (typeof kunci[i]['answerID'] !== 'undefined') {
		        answered++;
		        if (kunci[i]['answerID'] == kunci[i]['keyAnswer']) {
		            trueAns++;
				}
			}
		}
		falseAns = answered - trueAns;
		inAnswer = answered;
		isTrue = trueAns;
		isFalse = falseAns;
        var hours = Math.floor((timeUse % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((timeUse % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeUse % (1000 * 60)) / 1000);
		var answerPercent = (answered / totalSoal) * 100;
		var truePercent = (trueAns / answered) * 100;
		var falsePercent = (falseAns / answered) * 100;
		var score = (maxScore / totalSoal) * trueAns;
		timeFinished = (hours == 0) ? minutes + ' Minutes ' + seconds + ' Seconds' : hours + ' hours ' + minutes + ' Minutes ' + seconds + ' Seconds';
		document.getElementById('total_quest').innerText = totalSoal;
		document.getElementById('answered_quest').innerText = answered;
		document.getElementById('true_quest').innerText = trueAns;
		document.getElementById('false_quest').innerText = falseAns;
        document.getElementById('minutes_done').innerText = (hours == 0) ? minutes + ' Minutes ' + seconds + ' Seconds' : hours + ' hours ' + minutes + ' Minutes ' + seconds + ' Seconds';
        document.getElementById('percentage_answered').innerText = answerPercent + '%';
		document.getElementById('percentage_true').innerText = truePercent + '%';
        document.getElementById('percentage_false').innerText = falsePercent + '%';
        document.getElementById('score').innerText = score;
    }

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
                var data = res.data;
                document.getElementById('part_name').innerText = '<?=$this->session->userdata('NAME'); ?>';
                document.getElementById('event_date').innerText = data.EVENT_DATE;
                document.getElementById('method').innerText = data.METHOD;
                document.getElementById('level').innerText = data.NDE_LEVEL;
                document.getElementById('examination').innerText = data.EXAM_AREA;
                document.getElementById('quest_no').innerText = data.SHEET_NO;
                document.getElementById('duration').innerText = data.DURATION + ' Minutes';
                document.getElementById('typeofexam').innerText = data.EXAM_TYPE;
                document.getElementById('company').innerText = '<?=$this->session->userdata('COMPANY'); ?>';
                document.getElementById('companyloc').innerText = '<?=$this->session->userdata('COMPANY_LOCATION'); ?>';
                document.getElementById('examiner').innerText = data.NAME;
                document.getElementById('rules').innerText = data.RULES;
                question = data.QUESTIONS;
                duration = data.DURATION;
                sheetID = data.SHEET_ID;
                maxScore = data.MAX_SCORE;
                eventID = data.EVENT_ID;
                if (data.COMPLETED_STATUS == 1) {
                    document.getElementById('examStart').setAttribute('hidden', true);
                    document.getElementById("timecounter").innerHTML = "EXPIRED";
                    document.getElementById('examCounter').removeAttribute('hidden');
				}
                buildPanelContent();
                buildTab();
                buildSidebar();
                buildKunciJawaban();
            }
        });
    }

    function buildTab() {
        var inner = '';
        for (i = 0; i < question.length; i++) {
            inner += '<li class="nav-item"><a class="nav-link" href="#tabno_' + question[i]['NUMBER'] + '" data-toggle="tab">' + question[i]['NUMBER'] + '</a></li>';
        }
        document.getElementById('tabHeader').innerHTML = inner;
    }

    function buildPanelContent() {
        var inner = '';
        for (i = 0; i < question.length; i++) {
            var answer = question[i]['ANSWER'];
            inner += '<div class="tab-pane" id="tabno_' + question[i]['NUMBER'] + '">';
            inner += '' + question[i]['QUESTION'];
            inner += '<div class="row">';
            for (j = 0; j < answer.length; j++) {
                inner += '<div class="col-6">';
                inner += '<input onclick="doAnswer(' + question[i]['NUMBER'] + ', ' + question[i]['QUESTION_ID'] + ', ' + j + ')" type="radio" id="ans_' + question[i]['NUMBER'] + '_' + answer[j]['ALPHA'] + '" name="ans_' + question[i]['NUMBER'] + '" value="' + answer[j]['ALPHA'] + '"> ' + answer[j]['ALPHA'] + '. ' + answer[j]['ANSWER_TEXT'];
                inner += '</div>';
            }
            inner += '</div>';
            inner += '</div>';
        }
        document.getElementById('tabContent').innerHTML = inner;
    }

    function buildSidebar() {
        var inner = '';
        for (i = 0; i < question.length; i++) {
            inner += '<div style="margin-bottom: 5px" class="col-3 number-button">';
            inner += '<button type="button" id="checklist_' + question[i]['NUMBER'] + '" class="btn btn-block btn-primary btn-flat">' + question[i]['NUMBER'] + '</button>';
            inner += '</div>';
		}
        document.getElementById('sidebarContent').innerHTML = inner;
    }
    
    function buildKunciJawaban() {
		for (i = 0; i < question.length; i++) {
		    var answer = question[i]['ANSWER'];
            var numberkey = {
                questionID: question[i]['QUESTION_ID'],
                questionNo: question[i]['NUMBER']
            };
		    for (j = 0; j < answer.length; j++) {
		        if (answer[j]['VALUE'] === '1') {
		            numberkey['keyAnswer'] = j;
				}
			}
			kunci.push(numberkey);
		}
    }

    function doAnswer(number, id, jawaban) {
        var indexArray = number - 1;
        console.log(indexArray);
        console.log(number + ':' + id + ':' + jawaban);
        var newValue = {
            questionID: kunci[indexArray]['questionID'],
			questionNo: kunci[indexArray]['questionNo'],
			answerID: jawaban,
			keyAnswer: kunci[indexArray]['keyAnswer']
		};
        kunci[indexArray] = newValue;
        document.getElementById('checklist_' + number).removeAttribute('class');
        document.getElementById('checklist_' + number).setAttribute('class', 'btn btn-block btn-success btn-flat');
    }
</script>
</body>

<!-- Mirrored from adminlte.io/themes/v3/pages/layout/top-nav.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Jan 2020 04:53:27 GMT -->
</html>
