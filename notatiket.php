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

//print_r(@$_SESSION['idlasttiket']);

$det = $profil->ambil_profil();

$id = $_GET['id'];

$info = $tiket->ambil_pembelian_tiket($id);

/*

echo "<pre>";
print_r($info);
echo "</pre>";

*/

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
 								<?php $tgl =  $info['tanggal_pembelian'];

 			
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
 								<strong><?php echo $info['nama_penerima'] ?></strong><br>
 								Phone: <?php echo $info['telp_penerima'] ?><br>
 								Email: <?php echo $info['email_penerima'] ?>
 							</address>
 						</div><!-- /.col -->
 						<div class="col-sm-4 invoice-col">
 							<b>Kode Invoice #<?php echo $info['kode_pembelian'] ?></b><br>
 							
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
 									
 									$jumlahharga =  $info['jumlah_pembelian']*$info['total_pembelian'];
 									 ?>
 									<tr>

 										<td><?php echo $no; ?></td>
 										<td><?php echo $info['nama_event_tiket'] ?></td>
 										<td><?php echo $info['jumlah_pembelian'] ?></td>
 										<td>Rp. <?php echo number_format($info['total_pembelian'])  ?>,00</td>
 										<td>Rp .<?php echo number_format($jumlahharga) ?>,00</td>
 									</tr>
 								
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
 										<th>Total Bayar</th>
 										<td>Rp. <?php echo number_format($jumlahharga);  ?>,00</td>
 									</tr>
 									
 								</table>
 							</div>
 						</div><!-- /.col -->
 					</div><!-- /.row -->

 					<!-- this row will not appear when printing -->
 					<div class="row no-print">
 						<div class="col-xs-12">
 							<a href="nota-print-tiket.php?id=<?php echo $info['id_pembelian_tiket'] ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
 							<a href="konfirmasi-tiket.php?id=<?php echo $id ?>" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Konfirmasi Pembayaran</a>
 							</div>
 					</div>
 				</section><!-- /.content -->
 				<div class="clearfix"></div>
 			</div>



 		</div>
 	</section>



	
	<?php include 'footer.php'; ?>

	
	<?php endif ?>
