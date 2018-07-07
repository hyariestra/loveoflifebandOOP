<?php


	if (@$_GET['aksi']=='hapus') 
	{
		$tiket->hapustiket($_GET['idb']);
		echo "<script>alert('Data Berhasil terhapus')</script>";
		echo "<script>window.location='index.php?halaman=tiket';</script>";
	}


$semua=$tiket->tampiltiket();
 ?>



<h2>tiket</h2>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Tiket</th>
			<th>Tempat</th>
			<th>Tanggal</th>
			<th>Harga</th>
			<th>Keterangan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($semua as $key => $value) {
	?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value['nama_tiket'];?></td>
			<td><?php echo $value['tempat'];?></td>
			<td><?php echo $value['tanggal']?></td>
			<td><?php echo $value['harga']?></td>
			<td><?php echo $value['keterangan']?></td>
			
			<td>
			<a href="index.php?halaman=ubahtiket&idb=<?php echo $value['id_barang'];?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
			<a href="index.php?halaman=tiket&aksi=hapus&idb=<?php echo $value['id_barang'];?>" class="btn btn-danger"><i class="fa fa-remove"></i>Hapus</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahtiket" class="btn btn-primary">Tambah tiket</a>