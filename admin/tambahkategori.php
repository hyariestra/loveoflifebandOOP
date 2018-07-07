<h2>tambah kategori</h2>
<form method="POST">
<div class="form-group">
	
	<label>Kategori</label>
	<input type="text" class="form-control" name="kategori">
</div>
<button type="submit" name="save" class="btn btn-primary"><i class="fa fa-check"></i>Simpan</button>
</form>

<?php 
//jk tombol disimoan maka objek kategori menjalanka funsgi simpan_kategori

if (isset($_POST['save']))
 {
	$kategori->simpan_kategori($_POST['kategori']);
	echo"<script>alert('data tersimpan');</script>";
	echo"<script>window.location='index.php?halaman=kategori';</script>";
}


 ?>