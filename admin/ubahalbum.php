<?php 

$id = $_GET['idb'];

$det = $album->ambilalbum($id);

//print_r($det);

 ?>
<h2>Ubah Album</h2>
<form method="POST" enctype="multipart/form-data">
<div class="form-group">
	<label>Judul Album</label>
	<input type="text" value="<?php echo $det['judul_album'] ?>" name="judul" class="form-control">
</div>
<div class="form-group">
	<label>Artis</label>
	<input type="text" value="<?php echo $det['artis'] ?>" name="artis" class="form-control">
</div>

<div class="form-group">
	<label>Keterangan</label>
	<input type="text" name="keterangan" value="<?php echo $det['keterangan'] ?>" class="form-control">
</div>


<button type="submit" class="btn btn-primary" name="ubah">Simpan</button>
</form>

<?php 

if (isset($_POST["ubah"])) 
{
	$hasil= $album->ubahalbum($_POST["judul"],$_POST["artis"],$_POST["keterangan"],$id);
	if ($hasil=="sukses") 
	{
		echo "<script>alert('sukse,data berhasil disimpan');</script>";
		echo "<script>location='index.php?halaman=album';</script>";
	}
	else
	{

		echo "<script>alert('inputan masih ada yang kosong');</script>";
		echo "<script>location='index.php?halaman=ubahalbum&idb=$id;</script>";
	}
}

?>


  <script>
  $( function() {
 $('#datepicker').datepicker({ "format" : "dd-mm-yyyy", }).val();
  } );
  </script>
