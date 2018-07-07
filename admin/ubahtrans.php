<h2>Ubah Transport</h2>

<?php 

$det=$trans->ambil_trans($_GET['idb']);

foreach ($det as $ail) 
{
	


	?>

	<form method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label>Judul</label>
			<input type="text" name="judul" class="form-control" value="<?php echo $ail['judul'];?>">
		</div>
		
		<div class="form-group">
			<label>Isi</label>
			<textarea class="form-control" rows="10" id="editorku" name="isi"><?php echo $ail['ket'];?></textarea>
		</div>
		<div class="form-group">
			<label>Gambar</label>
			<br>
			<img src="../assets/images/transportation/<?php echo $ail['gambar'];?>" width="200" alt="">
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
	$trans->ubah_trans($_GET['idb'],$_POST['judul'],$_POST['isi'],$_FILES['gambar']);
	echo"<script>alert('data tersimpan');</script>";
	echo"<script>window.location='index.php?halaman=transportasi';</script>";
}
?>