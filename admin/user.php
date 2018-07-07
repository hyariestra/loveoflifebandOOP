<?php


	if (@$_GET['aksi']=='hapus') 
	{
		$user->hapususer($_GET['idb']);
		echo "<script>alert('Data Berhasil terhapus')</script>";
		echo "<script>window.location='index.php?halaman=user';</script>";
	}


$semua=$user->tampiluser();
 ?>

<h2>user</h2>
<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Alamat</th>
			<th>no Telphon</th>
			<th>Jenis Kelamin</th>
			
		</tr>
	</thead>
	<tbody>
	<?php foreach ($semua as $key => $value) {
	?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value['nama'];?></td>
			<td><?php echo $value['email'];?></td>
			<td><?php echo $value['alamat']?></td>
			<td><?php echo $value['no_telpon']?></td>
			<td><?php echo $value['jenis_kelamin']?></td>
			
			
		</tr>
	<?php } ?>
	</tbody>
</table>
