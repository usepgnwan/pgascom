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
	<link href="<?= base_url('assets/admin/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/admin/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<link href="<?= base_url('assets/admin/css/ruang-admin.min.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
	<!-- Page level plugins -->
	<script src="<?= base_url('assets/admin/vendor/jquery/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
	<script src="<?= base_url('assets/admin/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
	<script src="<?= base_url('assets/admin/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?= base_url('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
	<script src="<?= base_url('assets/sweatalert/sweetalert.min.js'); ?>"></script>
</head>

<body id="page-top">
	<div id="wrapper">
		<!-- Sidebar -->

		<?php $this->load->view('template/side_bar_admin'); ?>
		<!-- Sidebar -->
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">
				<!-- TopBar -->
				<?php $this->load->view('template/top_bar_admin'); ?>
				<!-- Topbar -->

				<!-- Container Fluid-->
				<?= $contents; ?>
				<!---Container Fluid-->
			</div>
			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>copyright &copy; <script>
								document.write(new Date().getFullYear());
							</script>
						</span>
					</div>
				</div>
			</footer>
			<!-- Footer -->
		</div>
	</div>

	<!-- Scroll to top -->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>


	<script src="<?= base_url('assets/admin/js/ruang-admin.min.js'); ?>"></script>
	<script src="<?= base_url('assets/admin/vendor/chart.js/Chart.min.js'); ?>"></script>
	<script src="<?= base_url('assets/admin/js/demo/chart-area-demo.js'); ?>"></script>
</body>

</html>
