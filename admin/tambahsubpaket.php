<h2>Tambah Produk</h2>
<form method="POST" enctype="multipart/form-data">
<div class="form-group">
	<label>Nama Produk</label>
	<input type="text" name="judul" class="form-control">
</div>
<div class="form-group">
	<label>Kategori</label>
	<select class="form-control" name="kategori">

	<?php 
     
    $kate=$halamanstatis->tampil_halamanstatis();
    foreach ($kate as $gori) {
	 ?>
	<option value="<?php echo $gori['id_hal'];?>"> <?php echo $gori['judul'];?></option>

<?php
}
?>
	</select>
</div>
<div class="form-group">
	<label>Isi</label>
	<textarea class="form-control" rows="10" name="isi" id="editorku"></textarea>
</div>
<div class="form-group">
	<label>Gambar</label>
	<input type="file" name="gambar" class="form-control">
</div>
<button type="submit" class="btn btn-primary" name="save">Simpan</button>
</form>

<?php 
if (isset($_POST['save'])) {
	$subpaket->simpan_subpaket($_POST['judul'],$_POST['kategori'],$_POST['isi'],$_FILES['gambar']);
	echo"<script>alert('Produk tersimpan');</script>";
	echo"<script>window.location='index.php?halaman=subpaket';</script>";
}
 ?>