<h2>Ubah Berita</h2>

<?php 

$det=$berita->ambil_berita($_GET['idb']);

foreach ($det as $ail) 
{
	


	?>

	<form method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label>Judul</label>
			<input type="text" name="judul" class="form-control" value="<?php echo $ail['judul'];?>">
		</div>
		<div class="form-group">
			<label>Kategori</label>
			<select class="form-control" name="kategori">
				<option value="">Pilih Kategori</option>
				<?php 

				$kate=$kategori->tampil_kategori();
				foreach ($kate as $gori) 
				{
    	//jika id_kategori sama langsung terselect
					if ($ail['id_kategori']==$gori['id_kategori'])
					{

						?>

						<option selected value="<?php echo $gori['id_kategori'];?>"> <?php echo $gori['kategori'];?></option>

						<?php
					}//tutup if
					else 
					{
						?>
						<option  value="<?php echo $gori['id_kategori'];?>"> <?php echo $gori['kategori'];?></option>
						<?php
					}//tutup else
}//tutup foreach
?>

</select>
</div>
<div class="form-group">
	<label>Isi</label>
	<textarea id="editorku" class="form-control" rows="10" name="isi"><?php echo $ail['isi'];?></textarea>
</div>
<div class="form-group">
	<label>Gambar</label>
	<br>
	<img src="../assets/images/article/<?php echo $ail['gambar'];?>" width="200" alt="">
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
	$berita->ubah_berita($_GET['idb'],$_POST['judul'],$_POST['kategori'],$_POST['isi'],$_FILES['gambar']);
	echo"<script>alert('berita tersimpan');</script>";
	echo"<script>window.location='index.php?halaman=berita';</script>";
}
 ?>