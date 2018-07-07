<?php 

$now = date("d-m-Y");

 ?>
<h2>Tambah Gambar</h2>
<form method="POST" enctype="multipart/form-data">
<div class="form-group">
	<label>Keterangan</label>
	<input type="text" name="keterangan" class="form-control">
</div>
<div class="form-group">
	<label>Tanggal</label>
	<input readonly="" class="form-control" value="<?php echo $now ?>" type="text" id="datepicker" name="tanggal">
</div>

<div class="form-group">
	<label>Gambar</label>
	<input type="file" name="gambar" class="form-control">
</div>
<div class="form-group">
	<label>Tampilkan Dalam</label>
	<select class="form-control" name="status">
		<option value="1">Tampilkan Dalam Gallery</option>
		<option value="2">Tampilkan Dalam Giggs</option>
	</select>
</div>
<button type="submit" class="btn btn-primary" name="save">Simpan</button>
</form>

<?php 

if (isset($_POST["save"])) 
{
	$hasil= $gallery->simpangallery($_POST["keterangan"],$_POST["tanggal"],$_FILES["gambar"],$_POST["status"]);
	if ($hasil=="sukses") 
	{
		echo "<script>alert('sukse,data berhasil disimpan');</script>";
		echo "<script>location='index.php?halaman=gallery';</script>";
	}
	else
	{

		echo "<script>alert('gagal,file yang di upload format tidak cocok');</script>";
		echo "<script>location='index.php?halaman=gallery;</script>";
	}
}

?>


  
