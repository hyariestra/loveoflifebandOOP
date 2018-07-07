<?php 

$now = date("d-m-Y");

 ?>
<h2>Tambah Album</h2>
<form method="POST" enctype="multipart/form-data">
<div class="form-group">
	<label>Judul Album</label>
	<input type="text" name="judul" class="form-control">
</div>
<div class="form-group">
	<label>Artis</label>
	<input type="text" name="artis" class="form-control">
</div>

<div class="form-group">
	<label>Keterangan</label>
	<input type="text" name="keterangan" class="form-control">
</div>


<button type="submit" class="btn btn-primary" name="save">Simpan</button>
</form>

<?php 

if (isset($_POST["save"])) 
{
	$hasil= $album->simpanalbum($_POST["judul"],$_POST["artis"],$_POST["keterangan"]);
	if ($hasil=="sukses") 
	{
		echo "<script>alert('sukse,data berhasil disimpan');</script>";
		echo "<script>location='index.php?halaman=album';</script>";
	}
	else
	{

		echo "<script>alert('inputan masih ada yang kosong');</script>";
		echo "<script>location='index.php?halaman=tambahalbum;</script>";
	}
}

?>


  <script>
  $( function() {
 $('#datepicker').datepicker({ "format" : "dd-mm-yyyy", }).val();
  } );
  </script>
