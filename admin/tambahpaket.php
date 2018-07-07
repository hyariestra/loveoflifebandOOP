<h2>Tambah Kategori</h2>
<form method="pOST" enctype="multipart/form-data">
<div class="form-group">
	<label>Judul</label>
	<input type="text" name="nama_paket" class="form-control">
</div>

<div class="form-group">
	<label>Gambar</label>
	<input type="file" name="gambar" class="form-control">
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
	$paket->simpan_paket($_POST['nama_paket'],$_FILES['gambar'],$_POST['status']);
	echo"<script>alert('paket tersimpan');</script>";
	echo"<script>window.location='index.php?halaman=paket';</script>";
}
 ?>