<!DOCTYPE html>
<html lang="en">

<head>


	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="<?= base_url('assets/admin/img/logo/logo.png'); ?>" rel="icon">
	<title> Dashboard</title>
	<link href="<?= base_url('assets/admin/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/admin/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/admin/css/ruang-admin.min.css'); ?>" rel="stylesheet">

</head>

<body class="bg-gradient-login">
	<!-- Register Content -->
	<div class="container-login">
		<div class="row justify-content-center">
			<div class="col-xl-10 col-lg-12 col-md-9">
				<div class="card shadow-sm my-5">
					<div class="card-body p-0">
						<div class="row">
							<div class="col-lg-12">
								<div class="login-form">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Registrasi</h1>
									</div>
									<?php if (validation_errors()) { ?>
										<div class="alert alert-danger">
											<?php echo validation_errors(); ?>
										</div>
									<?php
									} ?>
									<?php if ($this->session->flashdata('error_msg')) : ?>
										<div class="alert alert-danger alert-dismissible fade show" role="alert">
											<?= $this->session->flashdata('error_msg'); ?>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									<?php endif; ?>
									<form action="<?= base_url('auth/storeRegistrasi'); ?>" method="POST">
										<div class="form-group">
											<label>NIP</label>
											<input type="text" name="nip" class="form-control" placeholder="Masukan Nomer Induk Pegawai">
										</div>
										<div class="form-group">
											<label>NAMA</label>
											<input type="text" name="nama" class="form-control" placeholder="Masukan Nama">
										</div>
										<div class="form-group">
											<label>Email</label>
											<input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Masuakn Alamat Email">
										</div>
										<div class="form-group">
											<label>Alamat</label>
											<textarea name="alamat" class="form-control" id="" cols="30" rows="10"></textarea>
										</div>
										<div class="form-group">
											<label>Password</label>
											<input type="password" name="password" class="form-control" placeholder="Password">
										</div>
										<div class="form-group">
											<label>Repeat Password</label>
											<input type="password" name="repeat_password" class="form-control" placeholder="Ulangi Password">
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-primary btn-block">Registrasi</button>
										</div>
									</form>
									<hr>
									<div class="text-center">
										<a class="font-weight-bold small" href="<?= base_url('auth/login') ?>">Login Disin</a>
										<a class="font-weight-bold small" href="<?= base_url('mudik') ?>">Kembali Kehalaman Depan</a>
									</div>
									<div class="text-center">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Register Content -->
	<script src="<?php base_url('assets/admin/vendor/jquery/jquery.min.js'); ?>"></script>
	<script src="<?php base_url('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
	<script src="<?php base_url('assets/admin/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
	<script src="<?php base_url('assets/admin/js/ruang-admin.min.js'); ?>"></script>
</body>

</html>
