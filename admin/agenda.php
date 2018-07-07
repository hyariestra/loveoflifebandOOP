<?php


	if (@$_GET['aksi']=='hapus') 
	{
		$agenda->hapusagenda($_GET['idb']);
		echo "<script>alert('Data Berhasil terhapus')</script>";
		echo "<script>window.location='index.php?halaman=agenda';</script>";
	}


$semua=$agenda->tampilagenda();
 ?>



<h2>Agenda</h2>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Agenda</th>
			<th>Tanggal</th>
			<th>Keterangan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($semua as $key => $value) {
	?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value['nama_acara'];?></td>
			<td><?php echo $value['tanggal'];?></td>
			<td><?php echo $value['keterangan']?></td>
			
			<td>
			<a href="index.php?halaman=ubahagenda&idb=<?php echo $value['id_agenda'];?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
			<a href="index.php?halaman=agenda&aksi=hapus&idb=<?php echo $value['id_agenda'];?>" class="btn btn-danger"><i class="fa fa-remove"></i>Hapus</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<br>
<a href="index.php?halaman=tambahagenda" class="btn btn-primary">Tambah Agenda</a>