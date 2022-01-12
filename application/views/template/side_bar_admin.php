<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
		<div class="sidebar-brand-icon">
			<img src="<?= base_url('assets/admin/img/logo/logo2.png'); ?>" width="90px">
		</div>
		<div class="sidebar-brand-text mx-3">PGASCOM</div>
	</a>
	<hr class="sidebar-divider my-0">
	<!-- <li class="nav-item active">
		<a class="nav-link" href="index.html">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li> -->
	<hr class="sidebar-divider">
	<div class="sidebar-heading">
		Features
	</div>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
			<i class="far fa-fw fa-window-maximize"></i>
			<span>Data Master</span>
		</a>
		<div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Data Master</h6>
				<a class="collapse-item" href="<?= base_url('kota'); ?>">Nama Kota</a>
				<a class="collapse-item" href="<?= base_url('moda_transportasi'); ?>">Moda Transportasi</a>
				<a class="collapse-item" href="<?= base_url('user'); ?>">List User</a>
			</div>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true" aria-controls="collapseForm">
			<i class="fab fa-fw fa-wpforms"></i>
			<span>Rute</span>
		</a>
		<div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Rute</h6>
				<a class="collapse-item" href="<?= base_url('rute'); ?>">Rute Transportasi</a>
				<a class="collapse-item" href="<?= base_url('booking_tiket'); ?>">Boking Tiket</a>
			</div>
		</div>
	</li>
</ul>
