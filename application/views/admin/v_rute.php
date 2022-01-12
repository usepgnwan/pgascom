   <div class="container-fluid" id="container-wrapper">
   	<div class="d-sm-flex align-items-center justify-content-between mb-4">
   		<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>

   	</div>

   	<!-- Row -->
   	<div class="row">
   		<!-- Datatables -->
   		<div class="col-lg-12">
   			<div class="from-group mb-2">
   				<button class="btn btn-primary" id="creatData" value="new">Tambah Data</button>
   			</div>
   			<div class="card mb-4">
   				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
   					<!-- <h6 class="m-0 font-weight-bold text-primary">DataTables</h6> -->
   				</div>
   				<div class="table-responsive p-3">
   					<table class="table align-items-center table-flush" id="dataTable">
   						<thead class="thead-light">
   							<tr>
   								<th>#</th>
   								<th>Kota Asal</th>
   								<th>Kota Tujuan</th>
   								<th>Moda Transportasi</th>
   								<th>Tanggal Keberangkatan</th>
   								<th>Tanggal Sampai</th>
   								<th>Slot</th>
   								<th>Slot Tersedia</th>
   								<th>Action</th>
   							</tr>
   						</thead>
   						<tfoot>
   							<tr>
   								<th>#</th>
   								<th>Kota Asal</th>
   								<th>Kota Tujuan</th>
   								<th>Moda Transportasi</th>
   								<th>Tanggal Keberangkatan</th>
   								<th>Tanggal Sampai</th>
   								<th>Slot</th>
   								<th>Slot Tersedia</th>
   								<th>Action</th>
   							</tr>
   						</tfoot>
   						<tbody>
   							<!-- <tr>
   								<td>Bandung</td>
   								<td>Bandung</td>
   								<td>Bandung</td>
   								<td>Bandung</td>
   								<td>Bandung</td>
   								<td>Bandung</td>
   								<td>Bandung</td>
   								<td>Bandung</td>
   								<td>Bandung</td>
   							</tr> -->
   						</tbody>
   					</table>
   				</div>
   			</div>
   		</div>


   	</div>



   </div>
   <!-- Modal -->
   <div class="modal fade" id="modal-rute" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   	<div class="modal-dialog" role="document">
   		<div class="modal-content">
   			<div class="modal-header">
   				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
   				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
   					<span aria-hidden="true">&times;</span>
   				</button>
   			</div>
   			<div class="modal-body">
   				<form action="" name="form-rute" id="form-rute" enctype="multipart/form-data">
   					<div class="form-group">
   						<label for="">Moda Transportasi</label>
   						<input type="hidden" class="form-control" name="id_rute"></label>
   						<select class="form-control" name="nama_transportasi" id="nama_transportasi">
   							<option value="0">- Pilih -</option>
   							<?php foreach ($transportasi as $t) : ?>
   								<option value="<?= $t->id; ?>"><?= $t->nama_transportasi; ?></option>
   							<?php endforeach; ?>
   						</select>
   					</div>
   					<div class="form-group">
   						<label for="">Nama Kota Asal</label>
   						<select class="form-control" name="kota_asal" id="kota_asal">
   							<option value="0">- Pilih -</option>
   							<?php foreach ($kota as $k) : ?>
   								<option value="<?= $k->id; ?>"><?= $k->nama_kota; ?></option>
   							<?php endforeach; ?>
   						</select>
   					</div>
   					<div class="form-group">
   						<label for="">Nama Kota Tujuan</label>
   						<select class="form-control" name="kota_tujuan" id="kota_tujuan">
   							<option value="0">- Pilih -</option>
   							<?php foreach ($kota as $k) : ?>
   								<option value="<?= $k->id; ?>"><?= $k->nama_kota; ?></option>
   							<?php endforeach; ?>
   						</select>
   					</div>
   					<div class="form-group">
   						<label for="">Jam Keberangkatan</label>
   						<input type="datetime-local" class="form-control" name="jam_keberangkatan"></label>
   					</div>
   					<div class="form-group">
   						<label for="">Jam Sampai</label>
   						<input type="datetime-local" class="form-control" name="jam_sampai"></label>
   					</div>
   					<div class="form-group">
   						<label for="">Slot Tersedia</label>
   						<input type="number" class="form-control" name="slot" value="0"></label>
   					</div>

   				</form>

   			</div>
   			<div class="modal-footer">
   				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
   				<button type="button" class="btn btn-primary btn-save">Save changes</button>
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
   				"url": "<?php echo site_url('rute/datatable'); ?>",
   				"type": "POST"
   			},
   			"columnDefs": [{
   				"targets": [-1],
   				"orderable": false,
   			}, ],
   		});

   		table.on('draw.dt', function(data, type, row) {
   			var PageInfo = $('#dataTable').DataTable().page.info();
   			table.column(0, {
   				page: 'current'
   			}).nodes().each(function(cell, i) {
   				cell.innerHTML = i + 1 + PageInfo.start;
   			});
   		});
   	});

   	$('#creatData').click(function() {

   		$('#modal-rute').modal('show');
   		$('.btn-save').val('tambah');
   		$('.modal-title').html('Menambah Data Rute');
   		$('#form-rute')[0].reset();
   		$("input[type=hidden]").val('');
   	});

   	$('body').on('click', '.delete-rute', function() {
   		let id = $(this).data('id');
   		swal({
   			title: "Yakin",
   			text: "hapus Data?",
   			buttons: true,
   			dangerMode: true,
   			icon: "warning",
   		}).then((hapus) => {
   			if (hapus) {
   				$.ajax({
   					'url': "<?php echo base_url('rute/deleteRute/'); ?>" + id,
   					'method': 'DELETE',
   					'success': function(data) {
   						if (data == 'success') {
   							swal('Berhasil Hapus Rute', {
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

   	$('body').on('click', '.edit-rute', function() {
   		let id = $(this).data('id');
   		$('#modal-rute').modal('show');
   		$('.btn-save').val('edit');
   		$('.modal-title').html('Edit Data Rute');
   		$.ajax({
   			url: '<?= base_url("rute/editRute/") ?>' + id,
   			method: 'GET',
   			dataType: 'json',
   			success: function(data) {
   				$("[name='id_rute']").val(data.id);
   				$('[name="nama_transportasi"]').val(data.id_mode_transportasi);
   				$('[name="kota_asal"]').val(data.id_kota_asal);
   				$('[name="kota_tujuan"]').val(data.id_kota_tujuan);
   				$('[name="jam_keberangkatan"]').val(data.tanggal_keberangkatan);
   				$('[name="jam_sampai"]').val(data.tanggal_sampai);
   				$('[name="slot"]').val(data.slot);
   			}
   		});
   	});

   	$('.btn-save').click(function(e) {
   		e.preventDefault();
   		let check = $(this).val();
   		let url;
   		if (check == 'tambah') {
   			url = '<?= base_url("rute/storeRute") ?>'
   		} else {
   			url = '<?= base_url("rute/updateRute") ?>'
   		}
   		let data = $('#form-rute').serializeArray();

   		$.ajax({
   			url: url,
   			method: 'POST',
   			data: data,
   			success: function(data) {
   				if (data == 'error') {
   					swal('Periksa Kembali Inputan, Tidak Boleh Kosong', {
   						icon: 'error'
   					});
   				} else {
   					if (check == 'tambah') {
   						swal('Berhasil Menambah Data', {
   							icon: 'success'
   						}).then(function() {
   							$('#modal-rute').modal('hide');
   							table.draw();
   							$('#form-rute')[0].reset();
   							$("input[type=hidden]").val('');
   						});

   					} else {
   						swal('Berhasil Edit Data', {
   							icon: 'success'
   						}).then(function() {
   							$('#modal-rute').modal('hide');
   							table.draw();
   							$('#form-rute')[0].reset();
   							$("input[type=hidden]").val('');
   						});
   					}
   				}
   			}
   		});
   	})
   </script>
