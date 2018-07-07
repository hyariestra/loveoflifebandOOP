<h3>Ubah Halaman Statis</h3>

<?php 

$det=$halamanstatis->ambil_halaman($_GET['idb']);

foreach ($det as $ail) 
{
	


	?>

	<form method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label>Judul</label>
			<input type="text" name="judul" class="form-control" value="<?php echo $ail['judul'];?>">
		</div>
		<div class="form-group">
			<label>Isi</label>
			<textarea id="editorku" class="form-control" rows="10" name="isi"><?php echo $ail['isi'];?></textarea>
		</div>
		
		<div class="form-group">
			<label>Status</label>
			<select class="form-control" name="status">
			<?php if ($ail['status']=='Aktif'): ?>
				<option selected value="Aktif">Aktif</option>
				<option value="Tidak Aktif">Tidak Aktif</option>
			<?php endif ?>
			<?php if ($ail['status']=='Tidak Aktif'): ?>
				<option value="Aktif">Aktif</option>
				<option selected value="Tidak Aktif">Tidak Aktif</option>
			<?php endif ?>

			</select>
		</div>
		<button type="submit" class="btn btn-primary" name="save">Simpan</button>
	</form>
	<?php
}
?>

<?php 
if (isset($_POST['save'])) {
	$halamanstatis->ubah_halamanstatis($_GET['idb'],$_POST['judul'],$_POST['isi'],$_POST['status']);
	echo"<script>alert('Data Berhasil Diubah');</script>";
	echo"<script>window.location='index.php?halaman=statis';</script>";
}
?>