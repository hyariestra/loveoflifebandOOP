<?php 

$album  = $album->tampilalbum();

$now = date("d-m-Y");

 ?>
<h2>Tambah Produk</h2>
<form method="POST" enctype="multipart/form-data">
<div class="form-group">
	<label>Kategori Produk</label>
	<select onchange="getkate(this)" id="getkategori" name="kategori" class="form-control">
		<option value="Album" >Album</option>
		<option value="Kaos" >Kaos</option>
		<option value="Tiket" >Tiket</option>

	</select>
</div>

<div class="form-group">
	<label>Nama Produk</label>
	<input type="text" name="produk" class="form-control">
</div>
<div class="form-group">
	<label>Harga</label>
	<input placeholder="mata uang rupiah" type="text" name="harga" class="form-control">
</div>
<div class="form-group">
	<label>Stok</label>
	<input min="1" type="text" name="stok" class="form-control">
</div>
<div id="hiddenberat" class="form-group">
	<label>Berat</label>
	<input value="0" placeholder="berat dalam gram" type="text" name="berat" class="form-control">
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
	
	$hasil= $produk->simpanproduk($_POST["kategori"],$_POST["produk"],$_POST["harga"],$_POST["stok"],$_POST["berat"],$_POST["keterangan"],$_FILES["gambar"]);

	if ($hasil=="sukses") 
	{
		echo "<script>alert('sukses,data berhasil disimpan');</script>";
		echo "<script>location='index.php?halaman=produk';</script>";
	}
	else
	{

		echo "<script>alert('inputan masih ada yang kosong');</script>";
		echo "<script>location='index.php?halaman=tambahproduk;</script>";
	}
}

?>


<script>
	$( function() {
		$('#datepicker').datepicker({ "format" : "dd-mm-yyyy", }).val();
	} );

	function getkate(obj) {
		
		var c = $( "#getkategori option:selected" ).val();
		if (c=='Tiket')
		 {
		 	$("#hiddenberat").hide();

		}else{
			$("#hiddenberat").show();
		}
		
	}

</script>
