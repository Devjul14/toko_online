<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
		$(".back").click(function(){
            var url = "<?php echo site_url('admin/invoice');?>";
            window.location = url;
            return false; 
		});
		$(".cetak").click(function(){
			var id = $(".data").data("href");
			var url = "<?php echo site_url('admin/invoice/cetak'); ?>/" + id;
            window.location = url;
            return false;
		});
	});
</script>
<div class="container-fluid">
	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th>No. Invoice</th>
			<th>ID BARANG</th>
			<th>NAMA PRODUK</th>
			<th>JUMLAH PESANAN</th>
			<th>HARGA SATUAN</th>
			<th>SUB-TOTAL</th>
		</tr>
		<?php 
		$total = 0;
			foreach ($pesanan as $psn) :
			$subtotal = $psn->jumlah * $psn->harga;
			$total += $subtotal;
		
		 ?>
		 <tr class="data" data-href="<?php echo $invoice->id; ?>">
			<td><?php echo $invoice->id ?></td>
		 	<td><?php echo $psn->id_barang ?></td>
		 	<td><?php echo $psn->nama_barang?></td>
		 	<td><?php echo $psn->jumlah ?></td>
		 	<td><?php echo number_format($psn->harga,0,',','.') ?></td>
		 	<td><?php echo number_format($subtotal,0,',','.') ?></td>

		 </tr>
		<?php endforeach ?>
		<tr>
			<td colspan="4" align="right">Grand Total</td>
			<td align="left">IDR <?php echo number_format($total,0,',','.') ?></td>
		</tr>
	</table>
	<button class="back  btn btn-sm btn-info">Back</button>
	<button class="cetak  btn btn-sm btn-warning"><i class="fa fa-print"></i></button>
	<!-- <a href="<?php echo base_url('admin/invoice/cetak/'.$invoice->id); ?> "><div class="btn btn-sm btn-warning"><i class="fa fa-print"></i></div></a> -->

</div>