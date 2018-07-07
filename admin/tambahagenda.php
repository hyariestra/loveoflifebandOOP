<?php 

$now = date("d-m-Y");

 ?>
<h2>Tambah Agenda</h2>
<form method="POST" enctype="multipart/form-data">
<div class="form-group">
	<label>Nama Acara</label>
	<input type="text" name="nama" class="form-control">
</div>
<div class="form-group">
	<label>Tanggal</label>
	<input readonly="" class="form-control" value="<?php echo $now ?>" type="text" id="datepicker" name="tanggal">
</div>

<div class="form-group">
	<label>Keterangan</label>
	<textarea class="form-control" name="keterangan"></textarea>
</div>

<div class="form-group">
	<label>Gambar</label>
	<input type="file" name="gambar" class="form-control">
</div>

<button type="submit" class="btn btn-primary" name="save">Simpan</button>
</form>

<?php 

if (isset($_POST["save"])) 
{
	$hasil= $agenda->simpanagenda($_POST["nama"],$_POST["tanggal"],$_POST["keterangan"],$_FILES["gambar"]);
	if ($hasil=="sukses") 
	{
		echo "<script>alert('sukses,data berhasil disimpan');</script>";
		echo "<script>location='index.php?halaman=agenda';</script>";
	}
	else
	{

		echo "<script>alert('gagal');</script>";
		echo "<script>location='index.php?halaman=agenda;</script>";
	}
}

?>


  <script>
  $( function() {
 $('#datepicker').datepicker({ "format" : "dd-mm-yyyy", }).val();
  } );
  </script>
