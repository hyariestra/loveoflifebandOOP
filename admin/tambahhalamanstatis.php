<h3>Tambah Halaman Statis</h3>
<form method="pOST" enctype="multipart/form-data">
<div class="form-group">
	<label>Judul</label>
	<input type="text" name="judul" class="form-control">
</div>

<div class="form-group">
	<label>Isi</label>
	<textarea class="form-control" rows="10" name="isi" id="editorku"></textarea>
</div>
<div class="form-group">
	<label>Status</label>
	<select class="form-control" name="status">
		<option value="Aktif">Aktif</option>
		<option value="Tidak Aktif">Tidak Aktif</option>
	</select>
</div>

<button type="submit" class="btn btn-primary" name="save">Simpan</button>
</form>

<?php 
if (isset($_POST['save'])) {
	$halamanstatis->simpan_halaman($_POST['judul'],$_POST['isi'],$_POST['status']);
	echo"<script>alert('Halaman tersimpan');</script>";
	echo"<script>window.location='index.php?halaman=statis';</script>";
}
 ?>