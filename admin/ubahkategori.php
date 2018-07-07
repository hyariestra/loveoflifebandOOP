<h2>ubah kategori</h2>
<?php 

$kate=$kategori->ambil_kategori($_GET['idnya']);
foreach ($kate as $gori)
{
	?>
	<form method="POST">
		<div class="form-group"> 
			<label>Kategori</label>
			<input type="text" class="form-control" name="kategori" value="<?php echo $gori['kategori']; ?>"> 
		</div>
		<button type="submit" name="ubah" class="btn btn-primary"><i class="fa fa-pencil"></i> Ubah</button>
	</form>
	<?php
	}
	?>

<?php 
if (isset($_POST['ubah'])) {
	$kategori->ubah_kategori($_POST['kategori'],$_GET['idnya']);
	echo "<script>alert('data berhasil diubah');</script>";
	echo "<script>window.location='index.php?halaman=kategori';</script>";
}
 ?>