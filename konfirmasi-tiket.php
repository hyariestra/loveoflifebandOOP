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

$info = $tiket->ambil_pembelian_tiket($id);

 ?>


 <section class="portfolio-agileinfo" id="gallery">
 	<div class="container">
 		<h3 class="heading-agileinfo" data-aos="zoom-in">Konfirmasi Pembayaran<span></span></h3>

 		<div style="background-color: white;padding-top: 15px; padding-left: 10px;padding-right: 10px;padding-bottom: 15px;" class="content-wrapper">
 			<form method="POST" enctype="multipart/form-data">
 				<div class="form-group">
 					<label>Kode Invoice</label>
 					<input type="text" value="<?php echo $info['kode_pembelian'] ?>" class="form-control" name="kode" readonly="">
 					<input type="hidden" value="<?php echo $info['id_pembelian_tiket'] ?>" class="form-control" name="id_pembelian" readonly="">
 				</div>
 				<div class="form-group">
 					<label>Total Pembayaran</label>
 					<input type="text" value="Rp. <?php echo number_format($info['total_bayar']); ?>,00" class="form-control" name="nominal" readonly="">
 				</div>
 				<div class="form-group">
 					<label>Bank</label>
 					<input type="text" class="form-control" name="bank" >
 				</div>
 				<div class="form-group">
 					<label>Atas Nama</label>
 					<input type="text" class="form-control" name="nama" >
 				</div>
 				<div class="form-group">
 					<label>Tanggal Konfirmasi Pembayaran</label>
 					<input type="text" value="<?php echo date('d-m-Y') ?>" class="form-control" name="tanggal" readonly="">
 				</div>
 				
 				<div class="form-group">
 					<label>Bukti Pembayaran</label>
 					<input type="file" class="form-control" name="gambar" >
 					<span style="font-size: 12px;font-style: italic;">File yang di upload harus bertipe 'GIF|JPG|PNG|PDF'</span>
 				</div>
 				<button type="submit" class="btn btn-primary" name="save">Kirim</button>
 			</form>
 		</div>



 	</div>
 </section>

<?php

if (isset($_POST['save']))
{
	$simpan=$pembelian->simpankonfirmasitiket($_POST['kode'],$_POST['id_pembelian'],$_POST['nominal'],$_POST['bank'],$_POST['nama'],$_POST['tanggal'],$_FILES['gambar']);

	if ($simpan=="sukses") 
	{
		echo "<script>alert('Konfirmasi Anda Telah tersimpan di Databasa Kami');</script>";
		echo "<script>location='index.php';</script>";
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
