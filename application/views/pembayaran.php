<div class="container-fluid">
	<div class="row">
		<div class="col-md2"></div>
		<div class="col-md8">
			<div class="btn btn-sm btn-success">
				<?php 
				$grand_total =0;
				if ($keranjang= $this->cart->contents())
				{
					foreach ($keranjang as $items){
						$grand_total = $grand_total + $items['subtotal'];
					}
					echo "<h6>Total Belanja Anda: IDR ".number_format($grand_total,0,',','.');

				 ?>
			</div><br><br>
			<h3>Input Alamat Pengiriman Dan Pembayaran</h3>

			<form method="post" action="<?php echo base_url().'dashboard/proses_pesanan/'.$items['name'] ?>">
				<div class="form-group">
					<label>Nama Lengkap</label>
					<input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control">
				</div>
				<div class="form-group">
					<label>Alamat Lengkap</label>
					<input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
				</div>
				<div class="form-group">
					<label>NO Tlp</label>
					<input type="text" name="no_hp" placeholder="No Tlp Anda" class="form-control">
				</div>
				<div class="form-group">
					<label>Jasa Pengiriman</label>
					<select class="form-control">
						<option>J&E</option>
						<option>J&T</option>
						<option>TIKI</option>
						<option>GOJEK</option>
						<option>GRAB</option>
					</select>
				</div>
				<div class="form-group">
					<label>Link Bank</label>
					<select class="form-control">
						<option>BCA - 00000</option>
						<option>BRI - 00000</option>
						<option>MANDIRI - 0000</option>
						<option>BNI - 0000</option>
					</select>
				</div>

				<button  type="submit" class="btn btn-sm btn-primary mb-3">PESAN</button>

			</form>
		<?php }else{
			echo "<h5>Keranjang Anda Masih Kosong!";
		} ?>
		</div>

		<div class="col-md2"></div>
	</div>
</div>