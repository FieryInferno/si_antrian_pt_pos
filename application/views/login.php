<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
	<title>Login</title>
	<link rel="icon" href="<?php echo base_url() ?>upload/logo.png" type="image/png">
	<link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
	<style type="text/css">
		body {
			font-family: 'Roboto', sans-serif;
			background-image: url('landingpage/img/banner/login2.png');
			height: 100vh;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}

		.form-control {
			min-height: 41px;
			box-shadow: none;
			border-color: #ddd;
		}

		.form-control,
		.btn {
			border-radius: 3px;
		}

		.signup-form {
			width: 600px;
			margin: 0 auto;
			padding: 20px 0;
		}

		.signup-form form {
			color: #555;
			border-radius: 3px;
			margin-bottom: 15px;
			background: white;
			border: 1px solid #f3f3f3;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			padding: 30px;
			padding-bottom: 0px;
			padding-top: 25px;
		}

		.signup-form h2 {
			color: #636363;
			font-weight: bold;
			margin-top: 0;
			text-align: center;
		}

		.signup-form p {
			text-align: center;
		}

		.signup-form hr {
			margin: 0 -30px 20px;
		}

		.signup-form .form-group {
			margin-bottom: 20px;
		}

		.signup-form label {
			font-weight: normal;
			font-size: 13px;
		}

		.signup-form input[type="checkbox"] {
			margin-top: 2px;
		}

		.signup-form .btn {
			font-size: 16px;
			font-weight: bold;
			background: #3598dc;
			border: none;
			min-width: 100px;
		}

		.signup-form .btn:hover,
		.signup-form .btn:active {
			background: #2389cd;
			outline: none !important;
		}

		.signup-form a {
			text-decoration: underline;
		}

		.signup-form a:hover {
			text-decoration: none;
		}

		.signup-form form a {
			color: #3598dc;
			text-decoration: none;
		}

		.signup-form form a:hover {
			text-decoration: underline;
		}
	</style>
</head>

<body>
	<br><br><br><br>
	<div class="container">

		<div class="row justify-content-center">
			<div class="col-lg-6">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<div class="row">
							<div class="col-lg">
								<div class="p-5">
									<div class="text-center">
										<img src="<?php echo base_url() ?>upload/logo.png" width="75px">
										<h2>Login</h2>
										<h1 class="h4 text-gray-900 mb-4">Sistem Informasi Antrian Pelayanan</h1>
									</div>

									<?php if ($error = $this->session->flashdata('pesan')) { ?>
										<div class="alert alert-dismissible alert-danger">
											<button type="button" class="close" data-dismiss="alert">&times;</button>
											<?php echo $error; ?>
										</div>

									<?php } ?>
									<form action="<?php echo base_url('login/user_login'); ?>" method="post">
										<fieldset>
											<div class="form-group" id="only-number">
												<label>Username</label>
												<input type="text" class="form-control" id="numberya" name="username" value="<?php echo set_value('username'); ?>" placeholder="Username">
												<?php echo form_error('username', '<span class="text-danger">', '</span>'); ?>
											</div>
											<div class="form-group">
												<label>Password</label>
												<input type="password" class="form-control" name="password" id="password" data-toggle="password" value="<?php echo set_value('password'); ?>" placeholder="Password">
												<?php echo form_error('password', '<span class="text-danger">', '</span>'); ?>
											</div>
											<div class="form-group" style="padding-bottom: 20px;">
												<button type="submit" class="btn btn-success btn-lg  btn-block">
													<i class="fa fa-sign-in"></i> Login
												</button>
											</div>

									</form>
									</fieldset>
									</form>

								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
	<!-- Bootstrap core JavaScript-->
	<script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
	<script type="text/javascript">
		$("#password").password('toggle');
	</script>
	<script>
		$(function() {
			$('#only-number').on('keydown', '#number', function(e) {
				-1 !== $
					.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) || /65|67|86|88/
					.test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey) ||
					35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey || 48 > e.keyCode || 57 < e.keyCode) &&
					(96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
			});
		})
	</script>
	<script>
		$(function() {
			$('#only-number2').on('keydown', '#number2', function(e) {
				-1 !== $
					.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) || /65|67|86|88/
					.test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey) ||
					35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey || 48 > e.keyCode || 57 < e.keyCode) &&
					(96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
			});
		})
	</script>
</body>

</html>