<?php 

$album  = $album->tampilalbum();
$id = $_GET['idb'];
$det = $lagu->ambillagu($id);

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
		 <option value="<?php echo $value['id_album']; ?>" <?php if($value['id_album']==$det['id_album']){echo"selected";} ?>><?php echo $value['judul_album']; ?></option>
			
		<?php } ?>

	</select>
</div>
<div class="form-group">
	<label>Judul Lagu</label>
	<input type="text" value="<?php echo $det['judul_lagu'] ?>" name="judul" class="form-control">
</div>

<div class="form-group">
	<label>File</label>
	<br>
	<audio controls>
		<source src="upload/lagu/<?php echo $det['file'] ?>" type="audio/ogg">
		</audio>
	<input type="file" name="lagu" class="form-control">
</div>


<button type="submit" class="btn btn-primary" name="ubah">Simpan</button>
</form>

<?php 

if (isset($_POST["ubah"])) 
{
	$hasil= $lagu->simpanubahlagu($_POST["idalbum"],$_POST["judul"],$_FILES["lagu"],$id);
	if ($hasil=="sukses") 
	{
		echo "<script>alert('sukse,data berhasil disimpan');</script>";
		echo "<script>location='index.php?halaman=lagu';</script>";
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
