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
 	<link href="<?= base_url('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
 	<!-- Page level plugins -->
 	<script src="<?= base_url('assets/admin/vendor/jquery/jquery.min.js'); ?>"></script>
 	<script src="<?= base_url('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
 	<script src="<?= base_url('assets/admin/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
 	<script src="<?= base_url('assets/admin/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
 	<script src="<?= base_url('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
 </head>

 <body class="bg-gradient-login">
 	<!-- Register Content -->
 	<div class="container-login">
 		<div class="row justify-content-center">
 			<div class="col-xl-10 col-lg-12 col-md-9">
 				<div class="card shadow-sm my-5">
 					<div class="card-body p-0">
 						<div class="row">
 							<div class="col-lg-12 mt-4">

 								<div class="text-center">
 									<h1 class="h4 text-gray-900 mb-4">List Tiket Boking.</h1>
 								</div>
 							</div>
 							<?php if ($this->session->flashdata('success_msg')) : ?>
 								<div class="col-lg-12">
 									<div class="alert alert-success alert-dismissible fade show" role="alert">
 										<?= $this->session->flashdata('success_msg'); ?>
 										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 											<span aria-hidden="true">&times;</span>
 										</button>
 									</div>
 								</div>
 							<?php endif; ?>

 							<div class="row p-4" style="margin: 5px auto !important; width: 100% !important;">
 								<div class=" ">
 								</div>
 								<div class="col-sm-2"><b>Nama Pemesan</b></div>
 								<div class="col-sm-4">: <?= $this->session->nama; ?> </div>
 								<div class="col-sm-2"><b>NIP</b></div>
 								<div class="col-sm-4">: <?= $this->session->nip; ?> </div>
 								<div class="col-sm-2"><b>Email</b></div>
 								<div class="col-sm-4">: <?= $this->session->email; ?> </div>
 								<div class="col-sm-2"><b>Alamat</b></div>
 								<div class="col-sm-4">: <?= $this->session->alamat; ?> </div>
 							</div>
 							<div class="col-lg-12">
 								<hr>
 								<div class="table-responsive p-3">
 									<table class="table align-items-center table-flush" id="dataTable">
 										<thead class="thead-light">
 											<tr>
 												<th>No-Boking</th>
 												<th>No-Tiket</th>
 												<th>Nama</th>
 												<th>Alamat</th>
 												<th>Jenis Kelamin</th>
 												<th>Status</th>
 												<th>Tanggal Boking</th>
 											</tr>
 										</thead>
 										<tbody id="body-tiket">
 											<?php foreach ($tiket as $t) : ?>
 												<tr>
 													<td><?= $t['id_booking']; ?></td>
 													<td><?= $t['id']; ?></td>
 													<td><?= $t['nama']; ?></td>
 													<td><?= $t['alamat']; ?></td>
 													<td><?= $t['jenis_kelamin']; ?></td>
 													<td><?= $t['status_verifikasi'] == 'valid' ? '<span class="badge badge-success"> Tiket Aktif </span>' :  $t['status_verifikasi']; ?></td>
 													<td><?= date('d M Y H:i A', strtotime($t['created_at'])); ?></td>
 												</tr>
 											<?php endforeach; ?>
 										</tbody>
 									</table>
 								</div>
 							</div>
 							<div class="col-lg-12">
 								<div class="login-form">
 									<hr>
 									<div class="text-center">
 										<a class="font-weight-bold small" href="<?= base_url('mudik'); ?>">Kembali Kehalaman Depan</a>
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



 </body>
 <script>
 	$(document).ready(function() {
 		$('#dataTable').dataTable();
 	});
 </script>

 </html>
