<h2>Ubah Produk</h2>

<?php 

$det=$paket->ambil_paket($_GET['idb']);

foreach ($det as $ail) 
{
	


	?>

	<form method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label>Nama Paket</label>
			<input type="text" name="nama_paket" class="form-control" value="<?php echo $ail['nama_paket'];?>">
		</div>
		
		<div class="form-group">
			<label>Gambar</label>
			<br>
			<img src="../pictures/kategori/<?php echo $ail['gambar'];?>" width="200" alt="">
			<br>
			<br>
			<input type="file" name="gambar" class="form-control">
		</div>
		<div class="form-group">
			<label>Status</label>
			<select class="form-control" name="status">
			<?php if ($ail['status']=='Aktif'): ?>
				<option selected value="Aktif">Aktif</option>
				<option value="Tidak Aktif">Tidak Aktif</option>
			<?php endif ?>
			<?php if ($ail['status']=='Tidak Aktif'): ?>
				<option value="Aktif">Aktif</option>
				<option selected value="Tidak Aktif">Tidak Aktif</option>
			<?php endif ?>

			</select>
		</div>
		<button type="submit" class="btn btn-primary" name="save">Simpan</button>
	</form>
	<?php
}
?>

<?php 
if (isset($_POST['save'])) {
	$paket->ubah_paket($_GET['idb'],$_POST['nama_paket'],$_FILES['gambar'],$_POST['status']);
	echo"<script>alert('Paket Berhasil Diubah');</script>";
	echo"<script>window.location='index.php?halaman=paket';</script>";
}
?>