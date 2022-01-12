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
 							<div class="col-lg-12 mt-4">

 								<div class="text-center">
 									<h1 class="h4 text-gray-900 mb-4">Silahkan Isi Form Untuk Melanjutkan Boking Tiket</h1>
 								</div>
 							</div>
 							<div class="row p-4" style="margin: 0px 25px auto !important;">
 								<div class=" ">


 								</div>
 								<div class="col-sm-3"><b>Nama Pemesan</b></div>
 								<div class="col-sm-3">: <?= $this->session->nama; ?> </div>
 								<div class="col-sm-3"><b>NIP</b></div>
 								<div class="col-sm-3">: <?= $this->session->nip; ?> </div>
 								<div class="col-sm-3"><b>EMAIL</b></div>
 								<div class="col-sm-3">: <?= $this->session->email; ?> </div>
 								<div class="col-sm-3"><b>Alamat</b></div>
 								<div class="col-sm-3">: <?= $this->session->alamat; ?> </div>

 								<div class="col-sm-3"><b>Kota Asal</b></div>
 								<div class="col-sm-3">: <?= $rute['kota_asal'] ?> </div>
 								<div class="col-sm-3"><b>Kota Tujuan</b></div>
 								<div class="col-sm-3">: <?= $rute['kota_tujuan'] ?> </div>
 								<div class="col-sm-3"><b>Keberangkatan</b></div>
 								<div class="col-sm-3">: <?= date('Y M d H:i A', strtotime($rute['tanggal_keberangkatan'])); ?> </div>
 								<div class="col-sm-3"><b>Sampai</b></div>
 								<div class="col-sm-3">: <?= date('Y M d H:i A', strtotime($rute['tanggal_sampai'])); ?> </div>
 								<div class="col-sm-3"><b>Moda Transportasi</b></div>
 								<div class="col-sm-3">: <?= $rute['nama_transportasi'] ?></div>
 								<!-- <div class="col-sm-3"><b>Slot</b></div>
 								<div class="col-sm-3">: 2 </div> -->
 							</div>
 							<div class="col-lg-12">
 								<hr>
 								<div class="login-form">
 									<?php if ($jumlah_tiket != 0) : ?>
 										<form action="<?php echo base_url('mudik/store_booking_tiket'); ?>" method="POST">
 											<input type="hidden" name="id_rute" value="<?= $id_rute; ?>" class="form-control" placeholder="Masukan Nama">
 											<input type="hidden" name="iduser" value="<?= $this->session->id; ?>" class="form-control" placeholder="Masukan Nama">
 											<?php for ($i = 0; $i < $jumlah_tiket; $i++) : ?>
 												<div>
 													<h3 class="h4 text-gray-900 mb-4">Data Formulir Ke- <?= $i + 1; ?></h3>
 													<div class="form-group">
 														<label>Nama</label>
 														<input type="text" name="nama[]" class="form-control" placeholder="Masukan Nama" required>
 													</div>
 													<div class="form-group">
 														<label>Jenis Kelamin</label>
 														<select name="jenis_kelamin[]" class="form-control" id="">
 															<option value="laki-laki">Laki-laki</option>
 															<option value="perempuan">Perempuan</option>
 														</select>
 													</div>
 													<div class="form-group">
 														<label>Alamat</label>
 														<textarea name="alamat[]" class="form-control" id="" cols="30" rows="10" required></textarea>
 													</div>
 													<div class="form-group">
 														<label>Status Tiket</label>
 														<select name="status_tiket[]" class="form-control" id="">
 															<option value="pribadi">Pribadi</option>
 															<option value="istri">Istri</option>
 															<option value="suami">Suami</option>
 															<option value="anak">Anak</option>
 															<option value="rekan_kerja">Rekan Kerja</option>
 														</select>
 													</div>
 												</div>
 												<hr>
 											<?php endfor; ?>
 											<div class="form-group">
 												<button type="submit" class="btn btn-primary btn-block">Booking Tiket</button>
 											</div>
 										</form>
 									<?php else : ?>
 										<div class="text-center">
 											<h1 class="h4 text-gray-900 mb-4">Jumlah Tiket Tidak Terpilih</h1>
 										</div>
 									<?php endif; ?>
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

 </html>
