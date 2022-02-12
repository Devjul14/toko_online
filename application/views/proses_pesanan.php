<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
		$(".cetak").click(function(){
			var id = $(".data").data("href");
			alert(id)
			var url = "<?php echo site_url('admin/invoice/cetak'); ?>/" + id;
            window.location = url;
            return false;
		});
	});
</script>
<div class="con-fluid">
	<div class="alert alert-success">
		<p class="text-center align-middle">Selamat Pesanan Anda Berhasil Di Proses</p>
	</div>
</div>
<!-- <?php var_dump($i['id']) ?> -->
<div class="container-fluid">
  <div class="button text-center" >
	  <span class="data" data-href="">
	  	<button type="button" class="cetak btn btn-warning">Cetak Struk</button>
	  </span>
  
  </div>
</div>
