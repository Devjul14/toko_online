<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
	var mywindow;

	function openCenteredWindow(url) {
		var width = 1000;
		var height = 650;
		var left = parseInt((screen.availWidth / 2) - (width / 2));
		var top = parseInt((screen.availHeight / 2) - (height / 2));
		var windowFeatures = "width=" + width + ",height=" + height +
			",status,resizable,left=" + left + ",top=" + top +
			",screenX=" + left + ",screenY=" + top + ",scrollbars";
		mywindow = window.open(url, "subWind", windowFeatures);
	}
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
		$('.wa').click(function(){
			$(".modal-whatsapp").modal("show");
		});
		$(".send_wa").click(function() {
            var phone = $("[name='nohp']").val();
            if (phone == "") {
                alert("No. HP belum terisi");
            } else {
                
                var text = "Selamat datang di Toko Online.%0A";
                text += "Ini link Laporan Data Barang%0A";
                text += "<?php echo site_url('admin/data_barang/cetak_brg'); ?>";
                var url = "https://api.whatsapp.com/send?phone=" + phone + "&text=" + text;
                openCenteredWindow(url)
            }
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
	<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang">
		<i class="fas fa-plus fa-sm"></i>Tambah</button>
	<button type="button" class="cetak btn btn-sm btn-warning mb-3"><i class="fas fa-print fa-sm"></i></button>
	<button type="button" class="wa btn btn-sm btn-success mb-3">Send Wa</button>

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
			<tr id='data'>
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

<!-- Modal -->
<div class="modal modal-whatsapp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Input Nomor Hp</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
					<div class="form-group">
						<select class="form-control" name="nohp">
							<?php
							foreach ($u->result() as $key) {
								
								echo "<option value=" . $key->no_hp . ">" . $key->nama . "</option>";
							}
							?>
						</select>
					</div>
			</div>
			<div class="modal-footer">
				<button class="send_wa btn btn-success">Send</button>
			</div>
			</form>
		</div>
	</div>
</div>

