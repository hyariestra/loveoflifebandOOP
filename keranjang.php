<?php include 'header.php'; ?>

<?php 

	if (@$_GET['aksi']=='hapus') 
	{
		$produk->hapuskeranjang($_GET['idb']);
		echo "<script>alert('Data Berhasil terhapus')</script>";
		echo "<script>window.location='keranjang.php';</script>";
	}

 ?>

<style type="text/css">
	table, th, td {
   border: 1px solid #473b6b !important;
}
</style>
	<section class="portfolio-agileinfo" id="gallery">
		<div class="container">
			<h3 class="heading-agileinfo" data-aos="zoom-in">Keranjang<span></span></h3>
			<table bordercolor="red" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Produk</th>
						<th>Harga</th>
						<th>Jumlah Pembelian</th>
						<th>Subtotal</th>
						<th>Aksi</th>
					</tr>
				</thead>

				<?php if (@$_SESSION['keranjang']==NULL OR @$_SESSION['keranjang']==''): 

				$a = 'disabled';

				?>

					<tbody>
						<tr>
							<td colspan="6">Tidak Ada Produk!</td>
						</tr>
					</tbody>

	 		 <?php else: 

	 		 $a = '';
	 		 ?>

				<tbody>

					<?php 

					$keranjang = $_SESSION['keranjang'];

				
					$no = 1;
					foreach ($keranjang as $key => $value) {

						$semua = mysqli_query($mysqli, "SELECT * from barang WHERE id_barang = '".$value['id']."' ");


						$row = mysqli_fetch_assoc($semua);

						?>


						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $row['nama_barang'] ?></td>
							<td>Rp. <?php echo number_format($row['harga']);  ?>,-</td>
							<td><?php echo $value['jumlah'] ?></td>
							<td>Rp. <?php echo number_format($row['harga']*$value['jumlah']); ?>,-</td>
							<td><a class="btn btn-large btn-block btn-danger" href="keranjang.php?aksi=hapus&idb=<?php echo $key;?>" role="button"><span class="glyphicon glyphicon-trash"></span> Hapus</a></td>

						</tr>
						<?php 
						$no++;
					}
					?>

				</tbody>
				
				<?php endif ?>
			</table>
			<div class="col-md-2">
				<div class="row">
					
				<a class="btn btn-large btn-block btn-warning" href="store.php" role="button">
				<i class="fa fa-cart-plus" style="font-size:20px"></i> Lanjutkan Berbelanja</a>
				</div>
			</div>
			<div style="float: right;" class="col-md-2">
				<div class="row">
						
				<a <?php echo $a ?> class="btn btn-large btn-block btn-success" href="checkout.php" role="button"><i class="fa fa-credit-card" style="font-size:20px"></i>  Lanjut Kepembayaran</a>
				</div>
			</div>
		</div>
</section>

	
	<?php include 'footer.php'; ?>