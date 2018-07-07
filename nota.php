<?php include 'header.php'; ?>
	<style type="text/css">
	table, th, td {
   border: 1px solid #473b6b !important;
}
</style>

<?php if ($_SESSION['user']=='' OR $_SESSION['user']==NULL): ?>

<?php 

echo "<script>alert('Anda Harus Login Untuk Mengakses Halaman Ini');</script>";
  
echo "<script>window.location='register.php';</script>";

 ?>

 <?php else: ?>

<?php 


$det = $profil->ambil_profil();

$id = $_GET['id'];

$info = $pembelian->ambil_pembelian($id);

/*echo "<pre>";
print_r($info);
echo "</pre>";*/



 ?>


 	<section class="portfolio-agileinfo" id="gallery">
 		<div class="container">
 			<h3 class="heading-agileinfo" data-aos="zoom-in">Invoice<span></span></h3>

 			<div style="background-color: white;padding-left: 10px;padding-right: 10px;padding-bottom: 15px;" class="content-wrapper">
			<!-- Main content -->
 				<section class="invoice">
 					<!-- title row -->
 					<div class="row">
 						<div class="col-xs-12">
 							<h2 class="page-header">
 								<i class="fa fa-globe"></i> Life Of Live Manajemen.
 								<?php $tgl =  $info['0']['tanggal_pembelian'];

 								$tglbatas = $info['0']['tanggal_batas_bayar'];
 								 ?>
 								<small class="pull-right"><?php echo date('d-m-Y', strtotime($tgl));  ?></small>
 							</h2>
 						</div><!-- /.col -->
 					</div>
 					<!-- info row -->
 					<div class="row invoice-info">
 						<div class="col-sm-4 invoice-col">
 							Dari
 							<address>
 								<strong><?php echo $det['nama_usaha'] ?></strong><br>
 								<?php echo $det['alamat'] ?><br>
 								Klaten<br>
 								55060<br>
 								Phone: <?php echo $det['telp'] ?><br>
 								Email: <?php echo $det['email'] ?>
 							</address>
 						</div><!-- /.col -->
 						<div class="col-sm-4 invoice-col">
 							Kepada
 							<address>
 								<strong><?php echo $info['0']['nama_penerima'] ?></strong><br>
 								<?php echo $info['0']['tipe']." ".$info['0']['nama_kota'] ?><br>
 								<?php echo $info['0']['nama_provinsi']; ?><br>
 								<?php echo $info['0']['kode_pos']; ?><br>
 								Phone: <?php echo $info['0']['telp_penerima'] ?><br>
 								Email: <?php echo $info['0']['email'] ?>
 							</address>
 						</div><!-- /.col -->
 						<div class="col-sm-4 invoice-col">
 							<b>Kode Invoice #<?php echo $info['0']['kode_pembelian'] ?></b><br>
 							<br>
 							<b>Batas Pembayaran:</b> <?php echo date('d-m-Y', strtotime($tglbatas)) ?><br>
 							
 						</div><!-- /.col -->
 					</div><!-- /.row -->

 					<!-- Table row -->
 					<div class="row">
 						<div class="col-xs-12 table-responsive">
 							<table class="table table-striped">
 								<thead>
 									<tr>
 										<th>No</th>
 										<th>Nama Produk</th>
 										<th>Jumlah</th>
 										<th>Harga</th>
 										<th>Subtotal</th>
 									</tr>
 								</thead>
 								<tbody>
 									<?php
 									$no = 1;
 									 foreach ($info as $key => $value) {
 									$jumlahharga =  $value['jumlah_beli']*$value['harga_beli'];
 									 ?>
 									<tr>

 										<td><?php echo $no; ?></td>
 										<td><?php echo $value['nama_beli'] ?></td>
 										<td><?php echo $value['jumlah_beli'] ?></td>
 										<td>Rp. <?php echo number_format($value['harga_beli'])  ?>,00</td>
 										<td>Rp .<?php echo number_format($jumlahharga) ?>,00</td>
 									</tr>
 									<?php 
 									$no++;
 								} ?>
 								</tbody>
 							</table>
 						</div><!-- /.col -->
 					</div><!-- /.row -->

 					<div class="row">
 						<!-- accepted payments column -->
 						<div class="col-xs-6">
 							<p class="lead">Payment Methods:</p>
 							<img style="width: 100px;" src="images/mandirilogo.png" alt="Visa">
 							
 							<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
 								<b><?php echo $det['rekening'] ?></b>
 							</p>
 						</div><!-- /.col -->
 						<div class="col-xs-6">
 							<div class="table-responsive">
 								<table class="table">
 									<tr>
 										<th style="width:50%">Total Belanja:</th>
 										<td>Rp. <?php echo number_format($value['total_pembelian']) ; ?>,00</td>
 									</tr>
 									<tr>
 										<th>Total Ongkos Kirim</th>
 										<td>Rp. <?php echo number_format($value['biaya_pengiriman']) ; ?>,00</td>
 									</tr>
 									<tr>
 										<th>Total Bayar</th>
 										<td>Rp. <?php echo number_format($value['total_bayar']);  ?>,00</td>
 									</tr>
 									
 								</table>
 							</div>
 						</div><!-- /.col -->
 					</div><!-- /.row -->

 					<!-- this row will not appear when printing -->
 					<div class="row no-print">
 						<div class="col-xs-12">
 							<a href="nota-print.php?id=<?php echo $info['0']['id_pembelian'] ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
 							<a href="Konfirmasi.php?id=<?php echo $id ?>" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Konfirmasi Pembayaran</a>
 							</div>
 					</div>
 				</section><!-- /.content -->
 				<div class="clearfix"></div>
 			</div>



 		</div>
 	</section>

<?php

$idlast = @$_SESSION['idlast']['id']; 
//jika tombol login ditekan, maka objek pengguna menjalankan fungsi login_pengguna()
if (isset($_POST['cek']))
{
	$teslogin=$produk->simpancheckout($_POST['nama_penerima'],$_POST['telepon_penerima'],$_POST['alamat_penerima'],$_POST['total_belanja'],$_POST['total_berat'],$_POST['nama_provinsi'],$_POST['nama_kota'],$_POST['tipe'],$_POST['kodepos'],$_POST['nama_ekspedisi'],$_POST['nama_paket'],$_POST['biaya_paket'],$_POST['lama_paket'],$_POST['total_bayar']);

	if ($teslogin=="sukses") 
	{
		echo "<script>alert('sukse,data berhasil disimpan');</script>";
		echo "<script>location='index.php/".$idlast." ';</script>";
	}
	else
	{

		echo "<script>alert('inputan masih ada yang kosong');</script>";
		echo "<script>location='index.php?halaman=tambahalbum;</script>";
	}

}

?>


	
	<?php include 'footer.php'; ?>

	
	<?php endif ?>
