<?php





	if (@$_GET['aksi']=='hapus') 
	{
		$album->hapusalbum($_GET['idb']);
		echo "<script>alert('Data Berhasil terhapus')</script>";
		echo "<script>window.location='index.php?halaman=album';</script>";
	}


$semua=$album->tampilalbum();
 ?>



<h2>Album</h2>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Judul Album</th>
			<th>Artis</th>
			<th>Keterangan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($semua as $key => $value) {
	?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value['judul_album'];?></td>
			<td><?php echo $value['artis'];?></td>
			<td><?php echo $value['keterangan']?></td>
			
			<td>
			<a href="index.php?halaman=ubahalbum&idb=<?php echo $value['id_album'];?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
			<a href="index.php?halaman=album&aksi=hapus&idb=<?php echo $value['id_album'];?>" class="btn btn-danger"><i class="fa fa-remove"></i>Hapus</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahalbum" class="btn btn-primary">Tambah Album</a>