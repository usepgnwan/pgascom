   <div class="container-fluid" id="container-wrapper">
   	<div class="d-sm-flex align-items-center justify-content-between mb-4">
   		<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>

   	</div>

   	<!-- Row -->
   	<div class="row">
   		<!-- Datatables -->
   		<div class="col-lg-12">
   			<!-- <div class="from-group mb-2">
   				<button class="btn btn-primary" id="creatData" value="new">Tambah Data</button>
   			</div> -->
   			<div class="card mb-4">
   				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
   					<!-- <h6 class="m-0 font-weight-bold text-primary">DataTables</h6> -->
   				</div>
   				<div class="table-responsive p-3">
   					<table class="table align-items-center table-flush" id="dataTable">
   						<thead class="thead-light">
   							<tr>
   								<th>No-Booking</th>
   								<th>User Pemesan</th>
   								<th>Email</th>
   								<th>Moda Transportasi</th>
   								<th>Kota Asal</th>
   								<th>Kota Tujuan</th>
   								<th>Tanggal Pemesanan</th>
   								<th>Jumlah Tiket</th>
   								<!-- <th>Token</th> -->
   								<th>Verifikasi</th>
   								<th>Action</th>
   							</tr>
   						</thead>
   						<tfoot>
   							<tr>
   								<th>No-Booking</th>
   								<th>User Pemesan</th>
   								<th>Email</th>
   								<th>Moda Transportasi</th>
   								<th>Kota Asal</th>
   								<th>Kota Tujuan</th>
   								<th>Tanggal Pemesanan</th>
   								<th>Jumlah Tiket</th>
   								<!-- <th>Token</th> -->
   								<th>Verifikasi</th>
   								<th>Action</th>
   							</tr>
   						</tfoot>
   						<tbody>
   						</tbody>
   					</table>
   				</div>
   			</div>
   		</div>


   	</div>



   </div>
   <!-- Modal -->
   <div class="modal fade" id="modal-boking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   	<div class="modal-dialog modal-lg" role="document">
   		<div class="modal-content">
   			<div class="modal-header">
   				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
   				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
   					<span aria-hidden="true">&times;</span>
   				</button>
   			</div>
   			<div class="modal-body">
   				<div class="row">
   					<div class="col-sm-3"><b>No-Booking</b></div>
   					<div class="col-sm-3">: <span id="id-boking"> BK-00834534</span></div>
   					<div class="col-sm-2"><b>Tanggal Booking</b></div>
   					<div class="col-sm-4">: <span id="tgl-boking"> BK-00834534</span></div>
   					<div class="col-sm-3"><b>Nama Pemesan</b></div>
   					<div class="col-sm-3">: <span id="nama-pemesan"> BK-00834534</span></div>
   					<div class="col-sm-2"><b>Email</b></div>
   					<div class="col-sm-4">: <span id="email-pemesan"> BK-00834534</span></div>
   					<div class="col-sm-3"><b>Kota Asal</b></div>
   					<div class="col-sm-3">: <span id="kota-asal"> BK-00834534</span></div>
   					<div class="col-sm-2"><b>Kota Tujuan</b></div>
   					<div class="col-sm-4">: <span id="kota-tujuan"> BK-00834534</span></div>
   					<div class="col-sm-3"><b>Keberangkatan</b></div>
   					<div class="col-sm-3">: <span id="tgl-berangkat"> BK-00834534</span></div>
   					<div class="col-sm-2"><b>Sampai</b></div>
   					<div class="col-sm-4">: <span id="tgl-sampai"> BK-00834534</span></div>
   					<div class="col-sm-3"><b>Transportasi</b></div>
   					<div class="col-sm-3">: <span id="transportasi"> BK-00834534</span></div>
   					<div class="col-sm-2"><b>Status Tiket</b></div>
   					<div class="col-sm-4">: <span id="status"> BK-00834534</span></div>

   				</div>
   				<hr>
   				<div class="row">
   					<div class="col-lg-12">
   						<div class="table-responsive p-3">
   							<table class="table align-items-center table-flush" id="dataTable">
   								<thead class="thead-light">
   									<tr>
   										<th>No-Tiket</th>
   										<th>Nama</th>
   										<th>Alamat</th>
   										<th>Jenis Kelamin</th>
   										<th>Status</th>
   									</tr>
   								</thead>
   								<tbody id="body-tiket">
   								</tbody>
   							</table>
   						</div>
   					</div>
   				</div>
   			</div>
   			<div class="modal-footer">
   				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
   			</div>
   		</div>
   	</div>
   </div>

   <script>
   	let table;
   	$(document).ready(function() {
   		// $('#dataTable').DataTable(); // ID From dataTable 

   		table = $('#dataTable').DataTable({
   			"processing": true, //Feature control the processing indicator.
   			"lengthChange": true,
   			"serverSide": true,
   			"order": [],
   			// Load data for the table's content from an Ajax source
   			"ajax": {
   				"url": "<?php echo site_url('booking_tiket/datatable'); ?>",
   				"type": "POST"
   			},
   			"columnDefs": [{
   				"targets": [-1],
   				"orderable": false,
   			}, ],
   		});
   	});

   	$('#creatData').click(function() {

   		$('#modal-rute').modal('show');
   		$('.btn-save').val('tambah');
   		$('.modal-title').html('Menambah Data Rute');
   		$('#form-rute')[0].reset();
   		$("input[type=hidden]").val('');
   	});

   	$('body').on('click', '.verif-boking', function() {
   		let id = $(this).data('id');
   		swal({
   			title: "Yakin",
   			text: "Verifikasi Boking Tiket " + id + " ?",
   			buttons: true,
   			dangerMode: true,
   			icon: "warning",
   		}).then((ok) => {
   			if (ok) {
   				$.ajax({
   					'url': "<?php echo base_url('booking_tiket/verifikasiBokingTiket/'); ?>" + id,
   					'method': 'POST',
   					'success': function(data) {
   						if (data == 'success') {
   							swal("Berhasil Verifikasi Boking Tiket " + id, {
   								icon: "success"
   							}).then(() => {
   								table.draw();
   							});
   						}
   					}
   				});

   			}
   		});
   	});

   	$('body').on('click', '.lihat-boking', function() {
   		let id = $(this).data('id');
   		$('#modal-boking').modal('show');
   		$('.btn-save').val('edit');
   		$('.modal-title').html('Detail Boking Tiket');
   		$.ajax({
   			url: '<?= base_url("booking_tiket/getDetailBoking/") ?>' + id,
   			method: 'GET',
   			dataType: 'json',
   			success: function(data) {
   				$('#id-boking').html(data.info.id_booking);
   				$('#tgl-boking').html(data.info.created_at);
   				$('#nama-pemesan').html(data.info.pemesan);
   				$('#email-pemesan').html(data.info.email_pemesan);
   				$('#kota-asal').html(data.info.kota_asal);
   				$('#kota-tujuan').html(data.info.kota_tujuan);
   				$('#tgl-berangkat').html(data.info.tanggal_keberangkatan);
   				$('#tgl-sampai').html(data.info.tanggal_sampai);
   				$('#transportasi').html(data.info.nama_transportasi);
   				let status;
   				if (data.info.status_boking == 'proses') {
   					status = 'Terverifikasi, Menunggu Approval';
   				} else if (data.info.status_boking == 'valid') {
   					status = '<span class="badge badge-success">Tiket Aktif</span>';
   				} else if (data.info.status_boking == 'unvalid') {
   					status = 'Tiket Ditolak';
   				}
   				$('#status').html(status);
   				$('#body-tiket').html('');
   				$.each(data.detail_tiket, function(i, res) {

   					$('#body-tiket').append(`
					   <tr>
					   		<td>${res.id}</td>
							<td>${res.nama}</td>
							<td>${res.alamat}</td>
							<td>${res.jenis_kelamin}</td>
							<td>${res.status_tiket}</td>
						</tr>
					`);
   				});
   			}
   		});
   	});
   </script>
