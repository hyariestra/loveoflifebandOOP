<?php


	if (@$_GET['aksi']=='hapus') 
	{
		$lagu->hapuslagu($_GET['idb']);
		echo "<script>alert('Data Berhasil terhapus')</script>";
		echo "<script>window.location='index.php?halaman=lagu';</script>";
	}


$semua=$lagu->tampillagu();
 ?>



<h2>Lagu</h2>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Album</th>
			<th>Judul lagu</th>
			<th>Play</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($semua as $key => $value) {
	?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value['judul_album'];?></td>
			<td><?php echo $value['judul_lagu'];?></td>
			<td><?php echo $value['play']?></td>
			
			<td>
			<a href="index.php?halaman=ubahlagu&idb=<?php echo $value['id_lagu'];?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
			<a href="index.php?halaman=lagu&aksi=hapus&idb=<?php echo $value['id_lagu'];?>" class="btn btn-danger"><i class="fa fa-remove"></i>Hapus</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahlagu" class="btn btn-primary">Tambah Lagu</a>