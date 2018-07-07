<?php 

//$album  = $album->tampilalbum();
$id = $_GET['idb'];
$det = $produk->ambilproduk($id);


$now = date("d-m-Y");

 ?>
<h2>Ubah Produk</h2>
<form method="POST" enctype="multipart/form-data">
<div class="form-group">
	<label>Kategori Produk</label>
	<select onchange="getkate(this)" id="getkategori" name="kategori" class="form-control">
		<option value="Album" <?php if($det['tipe']==='Album') echo 'selected="selected"';?> >Album</option>
		<option value="Kaos" <?php if($det['tipe']==='Kaos') echo 'selected="selected"';?> >Kaos</option>
		<option value="Tiket" <?php if($det['tipe']==='Tiket') echo 'selected="selected"';?> >Tiket</option>

	</select>
</div>

<div class="form-group">
	<label>Nama Produk</label>
	<input type="text" value="<?php echo $det['nama_barang'] ?>" name="produk" class="form-control">
</div>
<div class="form-group">
	<label>Harga</label>
	<input placeholder="mata uang rupiah" value="<?php echo $det['harga'] ?>" type="text" name="harga" class="form-control">
</div>
<div class="form-group">
	<label>Stok</label>
	<input min="1" type="text" value="<?php echo $det['stok'] ?>" name="stok" class="form-control">
</div>
<div id="hiddenberat" class="form-group">
	<label>Berat</label>
	<input value="0" value="<?php echo $det['berat_barang'] ?>" placeholder="berat dalam gram" type="text" name="berat" class="form-control">
</div>

<div class="form-group">
	<label>keterangan</label>
	<textarea name="keterangan" class="form-control"><?php echo $det['keterangan'] ?></textarea>
</div>

<div class="form-group">
	<label>File</label>
	<br>
	<img style="width: 200px;" src="upload/produk/<?php echo $det['foto'] ?>">
	<br>
	<br>
	<input type="file" value="" name="gambar" class="form-control">
</div>


<button type="submit" class="btn btn-primary" name="ubah">Simpan</button>
</form>

<?php 

if (isset($_POST["ubah"])) 
{
	
	$hasil= $produk->simpanubahproduk($_POST["kategori"],$_POST["produk"],$_POST["harga"],$_POST["stok"],$_POST["berat"],$_POST["keterangan"],$_FILES["gambar"],$id);

	if ($hasil=="sukses") 
	{
		echo "<script>alert('sukses,data berhasil dirubah');</script>";
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
	$( document ).ready(function() {
		getkate();

	});


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
