<h2>Tambah Berita</h2>
<form method="POST" enctype="multipart/form-data">
<div class="form-group">
	<label>Judul</label>
	<input type="text" name="judul" class="form-control">
</div>
<div class="form-group">
	<label>Isi</label>
	<textarea class="form-control" rows="10" name="ket" id="editorku"></textarea>
</div>
<div class="form-group">
	<label>Gambar</label>
	<input type="file" name="gambar" class="form-control">
</div>
<button type="submit" class="btn btn-primary" name="save">Simpan</button>
</form>

<?php 
if (isset($_POST['save'])) {
	$trans->simpan_trans($_POST['judul'],$_POST['ket'],$_FILES['gambar']);
	echo"<script>alert('data tersimpan');</script>";
	echo"<script>window.location='index.php?halaman=transportasi';</script>";
}
 ?>