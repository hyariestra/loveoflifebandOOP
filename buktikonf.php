<?php include 'header.php' ?>

<style type="text/css">
table, th, td {
	border: 1px solid #473b6b !important;
}
.info{
	margin-top: 40px;
	padding: 30px 30px 30px 30px; 
	background-color: #e74c3c;
	color: white;
	font-size: 25px;

}
</style>





<?php 


$det = $profil->ambil_profil();

$id = $_GET['id'];

$info = $pembelian->ambil_pembelian($id);

$detkonfirmasi = $pembelian->ambilpembayaran($id);


?>

	<?php if ($detkonfirmasi=='' OR $detkonfirmasi==NULL): ?>
		<div class="container">
			
			<section class="invoice">

				<div class="col-md-12">

					<div class="col-md-3">

					</div>
					<div class="info col-md-6">
						<span class="glyphicon glyphicon-remove"></span>
						Anda Belum Melakukan Konfirmasi Pembayaran
					</div>
					<div class="col-md-3">

					</div>
				</div>
			</section>
		</div>
<br>
<br>
<br>
	<?php else: ?>

<div class="container">
	<section class="invoice">
			
	<br>
	<div id="pembayaran">
		<div class="form-group">
			<label>Kode Pembelian</label>
			<input type="text" value="<?php echo $detkonfirmasi['kode_pembelian'] ?>" readonly class="form-control" >
		</div>
		<div class="form-group">
			<label>Tanggal Pembayaran</label>
			<input type="text" value="<?php echo $detkonfirmasi['tanggal_pembayaran'] ?>" readonly class="form-control" >
		</div>
		<div class="form-group">
			<label>Nama Bank</label>
			<input type="text" value="<?php echo $detkonfirmasi['bank_pembayaran'] ?>" readonly class="form-control" >
		</div>
		<div class="form-group">
			<label>Atas Nama</label>
			<input type="text" value="<?php echo $detkonfirmasi['nama_pembayaran'] ?>" readonly class="form-control" >
		</div>
		<div class="form-group">
			<label>Bukti Pembayaran</label>
			<br>
			<img style="width: 400px;height: auto;" src="admin/upload/konfirmasi/<?php echo $detkonfirmasi['bukti_pembayaran'] ?>">
			<br>

			<a href="admin/upload/konfirmasi/<?php echo $detkonfirmasi['bukti_pembayaran'] ?>" download>Download Gambar Bukti Pembayaran</a>

		</div>
	</div>


</section>
</div>
	<?php endif ?>


	<?php include 'footer.php'; ?>







