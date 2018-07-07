<?php 

$album  = $album->tampilalbum();

$now = date("d-m-Y");

 ?>
<h2>Tambah Produk</h2>
<form method="POST" enctype="multipart/form-data">

<div class="form-group">
	<label>Nama Tiket</label>
	<input type="text" name="nama" class="form-control">
</div>
<div class="form-group">
	<label>Tempat</label>
	<input type="text" name="tempat" class="form-control">
</div>
<div class="form-group">
	<label>Tanggal</label>
	<input readonly="" class="form-control" value="<?php echo $now ?>" type="text" id="datepicker" name="tanggal">
</div>
<div class="form-group">
	<label>Harga</label>
	<input  class="form-control"  type="text"  name="harga">
</div>
<div class="form-group">
	<label>keterangan</label>
	<textarea name="keterangan" class="form-control"></textarea>
</div>

<div class="form-group">
	<label>File</label>
	<input type="file" name="gambar" class="form-control">
</div>


<button type="submit" class="btn btn-primary" name="save">Simpan</button>
</form>

<?php 

if (isset($_POST["save"])) 
{
	
	$hasil= $tiket->simpantiket($_POST["nama"],$_POST["tempat"],$_POST["tanggal"],$_POST["harga"],$_POST["keterangan"],$_FILES["gambar"]);

	if ($hasil=="sukses") 
	{
		echo "<script>alert('sukses,data berhasil disimpan');</script>";
		echo "<script>location='index.php?halaman=tiket';</script>";
	}
	else
	{

		echo "<script>alert('inputan masih ada yang kosong');</script>";
		echo "<script>location='index.php?halaman=tambahtiket;</script>";
	}
}

?>


<script>
	$( function() {
		$('#datepicker').datepicker({ "format" : "dd-mm-yyyy", }).val();
	} );


</script>
