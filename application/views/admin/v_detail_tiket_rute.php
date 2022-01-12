   <div class="container-fluid" id="container-wrapper">
   	<div class="d-sm-flex align-items-center justify-content-between mb-4">
   		<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>

   	</div>

   	<!-- Row -->
   	<div class="row">
   		<!-- Datatables -->
   		<div class="col-lg-12">
   			<div class="row">
   				<div class="col-sm-3"><b>Kota Asal</b></div>
   				<div class="col-sm-3">: <?= $rute['kota_asal']; ?> </div>
   				<div class="col-sm-3"><b>Kota Tujuan</b></div>
   				<div class="col-sm-3">: <?= $rute['kota_tujuan']; ?> </div>
   				<div class="col-sm-3"><b>Keberangkatan</b></div>
   				<div class="col-sm-3">: <?= date('d M Y h:i A', strtotime($rute['tanggal_keberangkatan'])); ?> </div>
   				<div class="col-sm-3"><b>Sampai</b></div>
   				<div class="col-sm-3">: <?= date('d M Y h:i A', strtotime($rute['tanggal_sampai'])); ?> </div>
   				<div class="col-sm-3"><b>Moda Transportasi</b></div>
   				<div class="col-sm-3">: <?= $rute['nama_transportasi']; ?> </div>
   				<div class="col-sm-3"><b>Slot</b></div>
   				<div class="col-sm-3">: <?= $rute['slot']; ?> </div>
   			</div>
   		</div>

   		<div class="col-lg-12">
   			<hr>
   			<div class="card mb-4">
   				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
   					<!-- <h6 class="m-0 font-weight-bold text-primary">DataTables</h6> -->
   				</div>
   				<div class="table-responsive p-3">
   					<table class="table align-items-center table-flush" id="dataTable">
   						<thead class="thead-light">
   							<tr>
   								<th>#</th>
   								<th>No-Booking</th>
   								<th>Pemesan</th>
   								<th>No-Tiket</th>
   								<th>Nama</th>
   								<th>Alamat</th>
   								<th>Jenis Kelamin</th>
   								<th>Status Tiket</th>
   								<th>Status</th>
   								<th>Tanggal Pemesanan</th>
   							</tr>
   						</thead>
   						<tfoot>
   							<tr>
   								<th>#</th>
   								<th>No-Booking</th>
   								<th>Pemesan</th>
   								<th>No-Tiket</th>
   								<th>Nama</th>
   								<th>Alamat</th>
   								<th>Jenis Kelamin</th>
   								<th>Status Tiket</th>
   								<th>Status</th>
   								<th>Tanggal Pemesanan</th>
   							</tr>
   						</tfoot>
   						<tbody>
   							<?php $no = 1;
								foreach ($tiket as $t) : ?>
   								<tr>
   									<td><?= $no++; ?></td>
   									<td><?= $t['id_booking']; ?></td>
   									<td><?= $t['pemesan']; ?></td>
   									<td><?= $t['id']; ?></td>
   									<td><?= $t['nama']; ?></td>
   									<td><?= $t['alamat']; ?></td>
   									<td><?= $t['jenis_kelamin']; ?></td>
   									<td><?= $t['status_tiket']; ?></td>
   									<td> <span class="badge badge-success">Tiket Aktif</span></td>
   									<td><?= date('d M Y h:i A', strtotime($t['created_at'])); ?></td>
   								</tr>
   							<?php endforeach; ?>
   						</tbody>
   					</table>
   				</div>
   			</div>
   		</div>


   	</div>



   </div>


   <script>
   	let table;
   	$(document).ready(function() {
   		$('#dataTable').DataTable(); // ID From dataTable  
   	});
   </script>
