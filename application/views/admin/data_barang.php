<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
	$(document).ready(function() {
		const flashData = $(".flash-data").data("flashdata");
		if (flashData) {
			Swal.fire(
				'Data',
				'Berhasil' + flashData,
				'success'
			);
		}
		$('.cetak').click(function() {
			var url = "<?php echo site_url('admin/data_barang/cetak_brg'); ?>";
			window.location = url;
			return false;
		});
		$('.delete').click(function() {
			var id = $(this).attr('data');
			var url = "<?php echo site_url('admin/data_barang/hapus'); ?>/" + id;
			Swal.fire({
				title: 'Anda Yakin?',
				text: "Data Akan Dihapus",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes'
			}).then((result) => {
				if (result.isConfirmed) {
					window.location = url;
					return false;
				}
			})
		});
	});
</script>
<div class="container-fluid">
	<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>
	<button class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#tambah_barang">
		<i class="fas fa-plus fa-sm"></i>Tambah</button>
	<button type="button" class="cetak btn btn-sm btn-warning mb-3"><i class="fas fa-print fa-sm"></i></button>

	<table class="table table-border">
		<tr>
			<th>NO</th>
			<th>NAMA BARANG</th>
			<th>KETERANGAN</th>
			<th>KATEGORI</th>
			<th>HARGA</th>
			<th>STOK</th>
			<th colspan="3">AKSI</th>
		</tr>
		<?php
		$no = 1;
		foreach ($barang as $brg) : ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $brg->nama_brg ?></td>
				<td><?php echo $brg->keterangan ?></td>
				<td><?php echo $brg->kategori ?></td>
				<td><?php echo $brg->harga ?></td>
				<td><?php echo $brg->stok ?></td>
				<td><?php echo anchor('admin/data_barang/edit/'  . $brg->id_brg, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
				<td><button type="button" data="<?php echo $brg->id_brg ?>" class="delete btn btn-sm btn-danger"><i class="fas fa-trash fa-sm"></i></button></td>
			<?php endforeach; ?>
	</table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Form Input Produk</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url() . 'admin/data_barang/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama Barang</label>
						<input type="text" name="nama_brg" class="form-control">
					</div>

					<div class="form-group">
						<label>Keterangan</label>
						<input type="text" name="keterangan" class="form-control">
					</div>

					<div class="form-group">
						<label>Kategori</label>
						<select class="form-control" name="kategori">
							<?php
							foreach ($k->result() as $key) {
								echo "<option value='" . $key->kode . "' " . ($key->kode == $kategori ? "selected" : "") . ">" . $key->ket . "</option>";
							}
							?>
						</select>
					</div>

					<div class="form-group">
						<label>Harga</label>
						<input type="text" name="harga" class="form-control">
					</div>

					<div class="form-group">
						<label>Stok</label>
						<input type="text" name="stok" class="form-control">
					</div>

					<div class="form-group">
						<label>Gambar Produk</label><br>
						<input type="file" name="gambar" class="form-control">
					</div>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
			</form>
		</div>
	</div>
</div>