<h2>Ubah Berita</h2>

<?php 

$det=$testimoni->ambil_testi($_GET['idb']);

foreach ($det as $ail) 
{
	


	?>

	<form method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label>Keterangan</label>
			<input type="text" name="keterangan" class="form-control" value="<?php echo $ail['keterangan'];?>">
		</div>
		
		<div class="form-group">
			<label>Gambar</label>
			<br>
			<img src="../pictures/testimoni/<?php echo $ail['gambar'];?>" width="200" alt="">
			<br>
			<br>
			<input type="file" name="gambar" class="form-control">
		</div>
		
		<button type="submit" class="btn btn-primary" name="save">Simpan</button>
	</form>
	<?php
}
?>

<?php 
if (isset($_POST['save'])) {
	$testimoni->ubah_testi($_GET['idb'],$_POST['keterangan'],$_FILES['gambar']);
	echo"<script>alert('testimoni Berhasil Diubah');</script>";
	echo"<script>window.location='index.php?halaman=testimoni';</script>";
}
?>