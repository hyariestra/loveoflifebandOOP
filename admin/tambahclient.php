<h2>Tambah client</h2>
<form method="POST" enctype="multipart/form-data">
<div class="form-group">
	<label>Keterangan</label>
	<input type="text" name="keterangan" class="form-control">
</div>

<div class="form-group">
	<label>Gambar</label>
	<input type="file" name="gambar" class="form-control">
</div>
<!-- <div class="form-group">
	<label>Status</label>
	<select class="form-control" name="status">
		<option value="Aktif">Aktif</option>
		<option value="Tidak Aktif">Tidak Aktif</option>
	</select>
</div> -->

<button type="submit" class="btn btn-primary" name="save">Simpan</button>
</form>

<?php 
if (isset($_POST['save'])) {
	$client->simpan_client($_POST['keterangan'],$_FILES['gambar']);
	echo"<script>alert('Data client tersimpan');</script>";
	echo"<script>window.location='index.php?halaman=client';</script>";
}
 ?>