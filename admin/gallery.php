<?php


	if (@$_GET['aksi']=='hapus') 
	{
		$gallery->hapusgallery($_GET['idb']);
		echo "<script>alert('Data Berhasil terhapus')</script>";
		echo "<script>window.location='index.php?halaman=gallery';</script>";
	}


$semua=$gallery->tampilgallery();
 ?>



<h2>Gallery</h2>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Keterangan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($semua as $key => $value) {
	?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value['keterangan']?></td>
			
			<td>
			<a href="index.php?halaman=ubahgallery&idb=<?php echo $value['id_gallery'];?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
			<a href="index.php?halaman=gallery&aksi=hapus&idb=<?php echo $value['id_gallery'];?>" class="btn btn-danger"><i class="fa fa-remove"></i>Hapus</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahgallery" class="btn btn-primary">Tambah Gambar</a>