<?php 
$id=  $_GET['idb'];
$det = $gallery->ambilgallery($id);

 ?>
<h2>ubah Gambar</h2>
<form method="POST" enctype="multipart/form-data">
<div class="form-group">
	<label>Keterangan</label>
	<input type="text" value="<?php echo $det['keterangan'] ?>" name="keterangan" class="form-control">
</div>
<div class="form-group">
	<label>Tanggal</label>
	<input readonly="" class="form-control" value="<?php echo $det['tanggal'] ?>" type="text" id="datepicker" name="tanggal">
</div>

<div class="form-group">
	<label>Gambar</label>
	<br>
	<img style="margin-bottom: 20px; width: 300px" src="upload/gallery/<?php echo $det['gambar'] ?>">
	<input type="file" name="gambar" class="form-control">
</div>

<div class="form-group">
	<label>Tampilkan Dalam</label>
	<select class="form-control" name="status">
		<option value="1" <?php if ($det['status']=='1') {echo "selected"; }  ?>>Tampilkan Dalam Gallery</option>
		<option value="2" <?php if ($det['status']=='2') {echo "selected"; }  ?> >Tampilkan Dalam Giggs</option>
	</select>
</div>
<button type="submit" class="btn btn-primary" name="ubah">Simpan</button>
</form>

<?php 

if (isset($_POST["ubah"])) 
{
	$hasil= $gallery->simpanubahgallery($_POST["keterangan"],$_POST["tanggal"],$_FILES["gambar"],$_POST["status"],$id);
	if ($hasil=="sukses") 
	{
		echo "<script>alert('sukses, data berhasil tersimpan');</script>";
		echo "<script>location='index.php?halaman=gallery';</script>";
	}
	else
	{

		echo "<script>alert('gagal,file yang di upload format tidak cocok');</script>";
		echo "<script>location='index.php?halaman=ubahgallery&idb=$id;</script>";
	}
}

?>


  <script>
  $( function() {
 $('#datepicker').datepicker({ "format" : "dd-mm-yyyy", }).val();
  } );
  </script>
