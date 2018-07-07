<?php 

$album  = $album->tampilalbum();

$now = date("d-m-Y");

 ?>
<h2>Tambah Lagu</h2>
<form method="POST" enctype="multipart/form-data">
<div class="form-group">
	<label>Judul Album</label>
	<select name="idalbum" class="form-control">
		<?php 

		foreach ($album as $key => $value) {
		 ?>
		 <option value="<?php echo $value['id_album'] ?>" ><?php echo $value['judul_album'] ?></option>
			
		<?php } ?>

	</select>
</div>
<div class="form-group">
	<label>Judul Lagu</label>
	<input type="text" name="judul" class="form-control">
</div>

<div class="form-group">
	<label>File</label>
	<input type="file" name="lagu" class="form-control">
</div>


<button type="submit" class="btn btn-primary" name="save">Simpan</button>
</form>

<?php 

if (isset($_POST["save"])) 
{
	$hasil= $lagu->simpanlagu($_POST["idalbum"],$_POST["judul"],$_FILES["lagu"]);
	if ($hasil=="sukses") 
	{
		echo "<script>alert('sukse,data berhasil disimpan');</script>";
		echo "<script>location='index.php?halaman=lagu';</script>";
	}
	else
	{

		echo "<script>alert('inputan masih ada yang kosong');</script>";
		echo "<script>location='index.php?halaman=tambahlagu;</script>";
	}
}

?>


<script>
	$( function() {
		$('#datepicker').datepicker({ "format" : "dd-mm-yyyy", }).val();
	} );
</script>
