<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">

<!-- Mirrored from adminlte.io/themes/v3/pages/examples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Jan 2020 04:53:57 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 3 | Log in</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?=base_url()?>assets/code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
	<div class="login-logo">
		<a href="../../index2.html"><b>e-</b>EXAMS</a>
	</div>
	<!-- /.login-logo -->
	<div class="card">
		<div class="card-body login-card-body">
			<p class="login-box-msg">Sign in to start your session</p>

			<form id="loginForm" name="loginForm">
				<div class="input-group mb-3">
					<input type="text" name="username" id="username" class="form-control" placeholder="Username">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-fingerprint"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" id="password" name="password" class="form-control" placeholder="Password">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="text" id="examcode" name="examcode" class="form-control" placeholder="Kode Ujian">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-book"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-8">

					</div>
					<!-- /.col -->
					<div class="col-4">
						<button type="submit" class="btn btn-primary btn-block">Sign In</button>
					</div>
					<!-- /.col -->
				</div>
			</form>

			<p class="mb-1">
				<a href="<?=base_url('Login'); ?>">Login as Administrator</a>
			</p>
		</div>
		<!-- /.login-card-body -->
	</div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>

<script>
    $(function () {
        console.log('Ready Function');

        $('#loginForm').on('submit', function (e) {
            e.preventDefault();
            var dataForm = {};
            $.each($('#loginForm').serializeArray(), function (i, field) {
                dataForm[field.name] = field.value;
            });
            $.ajax({
                type: 'POST',
                url: '<?=base_url('Login/authLoginPeserta')?>',
                data: dataForm,
                success: function (res) {
                    var alt = JSON.parse(res);
                    if (alt.error) {
                        document.getElementById(alt.element).classList.add('is-invalid');
                        $('#' + alt.element).val('');
                    } else {
                        document.location.href = "<?=base_url('Home')?>";
                    }
                },
            });
        });
    });
</script>

</body>

<!-- Mirrored from adminlte.io/themes/v3/pages/examples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Jan 2020 04:53:57 GMT -->
</html>
