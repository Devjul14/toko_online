<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title;?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/select2/select2.css">
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.fixedheadertable.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/library.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/select2/select2.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-barcode.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-qrcode.js"></script>
    <script src="<?php echo base_url();?>assets/js/html2pdf.bundle.js"></script>
    <script src="<?php echo base_url();?>assets/js/html2canvas.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.mask.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/library.js"></script>
  </head>
<body>
<script type="text/javascript">
$(document).ready(function(){
    window.print();
});
</script>
<table cellspacing="2" cellpadding="1" width="100%" align="right" border="0">
	<tr>
		<td>
			<b>JULIA STORE</b></font>
		</td>
	</tr>
	<tr>
		<td>
			<u><b>JL. POSONG</b></u>
		</td>
	</tr>
</table>
<br>
<br>
<table cellspacing="2" cellpadding="1"  width="100%" align="right">
	<tr>
		<!-- <td>No Nota </td>
		<td>:&nbsp;<?php echo $q->nota; ?>-Tal &nbsp; : <?php echo date("d/m/Y");?>-Shift: -</td> -->
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><span class="pull-right">Cirebon,&nbsp;<?php echo date("d-m-Y") ?></span></td>
	</tr>
	<tr>
		<td>No Invoice </td>
		<td>:&nbsp;<?php echo $c->no_invoice?></td>
	</tr>
	<tr>
		<td>Tgl Pesan</td>
		<td>:&nbsp;<?php echo $c->tgl_pesan?></td>
	</tr>
	<tr>
		<td>Nama</td>
		<td>:&nbsp;<?php echo $c->nama?></td>
	</tr>
	<tr>
		<td>Alamat </td>
		<td>:&nbsp;<?php echo $c->alamat?></td>
	</tr>
</table>
&nbsp;
<hr style="margin-bottom: 1px">
	<table cellspacing="2" cellpadding="1"  width="100%" align="right"border="0" rules="rows">
		<tbody>
		<?php
		$total = 0;
			foreach ($pesanan as $psn) :
			$i = 1;
			$subtotal = $psn->jumlah * $psn->harga;
			$total += $subtotal;
		
		 ?>
		 <tr>
			<td><?php $i++?></td>
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
		</tbody>
	</table>
	<hr style="margin-bottom: 1px">
&nbsp;
<p align="center"><b>TERIMA KASIH<br>SUDAH BERBELANJA DI TOKO KAMI</b></p>

<style type="text/css">
	html, body {
        width: 9cm;
        height: 14cm;
        display: block;
        /*font-family: "dotmatrik";*/
        font-family: sans-serif;
        margin:0.3cm;
    }
	.pull-right {
	    float: right;
	}
	.pull-left {
	    float: left;
	}
	th, td{
	    /*font-family: "dotmatrik";*/
	    font-family: sans-serif;
	    /* text-transform: uppercase; */
	}
	td {
	    font-size: 11px;
	}
	p {
	    font-size: 11px;
	}
	th {
	    font-size: 10px;
	    font-weight: bold;
	}
	@page {
      size: 9cm 14cm;
      margin:0.5cm;
    }
	.text-right{
	    align:right;
	}
</style>
</body>
</html>
