<h2>Ubah Produk</h2>

<?php 

$det=$subpaket->ambil_subpaket($_GET['idb']);

foreach ($det as $ail) 
{
	
	?>

	<form method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label>Nama Produk</label>
			<input type="text" name="judul" class="form-control" value="<?php echo $ail['nama_produk'];?>">
		</div>
		<div class="form-group">
			<label>Kategori</label>
			<select class="form-control" name="kategori">
				<?php 

			   $kate=$halamanstatis->tampil_halamanstatis();
				foreach ($kate as $gori) 
				{
    	//jika id_kategori sama langsung terselect
					if ($ail['id_hal']==$gori['id_hal'])
					{

						?>

						<option selected value="<?php echo $gori['id_hal'];?>"> <?php echo $gori['judul'];?></option>

						<?php
					}//tutup if
					else 
					{
						?>
						<option  value="<?php echo $gori['id_hal'];?>"> <?php echo $gori['judul'];?></option>
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
	<img src="../pictures/produk/<?php echo $ail['gambar'];?>" width="200" alt="">
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
	$subpaket->ubah_subpaket($_GET['idb'],$_POST['judul'],$_POST['kategori'],$_POST['isi'],$_FILES['gambar']);
	echo"<script>alert('Produk Berhasil Diubah');</script>";
	echo"<script>window.location='index.php?halaman=subpaket';</script>";
}
 ?>