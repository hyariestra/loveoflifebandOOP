<?php 

if (isset($_GET['aksi'])) {
	if ($_GET['aksi']=='hapus') {
		$client->hapus_client($_GET['idnya']);
		echo"<script>alert('Data Berhasil Dihapus');</script>";
		echo"<script>window.alert='index.php?halaman=client';</script>";
	}
}

 ?>

<h2>Data Client</h2>
<table class="table table-striped table-bordered data">
	<thead>
		<tr>
			<th>No</th>
			<th>Keterangan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	$no=1;
	$be=$client->tampil_client();
	foreach ($be as $rita) {
	
	 ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $rita['keterangan']?></td>
			
			<td>
			<a href="index.php?halaman=ubahclient&idb=<?php echo $rita['id_client'];?>" class="btn btn-info"><i class="fa fa-remove"></i> Edit</a>
			<a href="index.php?halaman=client&aksi=hapus&idnya=<?php echo $rita['id_client'];?>" class="btn btn-danger"><i class="fa fa-edit"></i>Hapus</a>
			</td>
		</tr>
	<?php
	$no++;
	}
	?>
	</tbody>
	
</table>
<a href="index.php?halaman=tambahclient" class="btn btn-primary">Tambah client</a>