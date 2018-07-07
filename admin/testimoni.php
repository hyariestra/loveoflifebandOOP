<?php 

if (isset($_GET['aksi'])) {
	if ($_GET['aksi']=='hapus') {
		$testimoni->hapus_testi($_GET['idnya']);
		echo"<script>alert('Data Berhasil Dihapus');</script>";
		echo"<script>window.alert='index.php?halaman=testimoni';</script>";
	}
}

 ?>

<h2>Data Testimoni</h2>
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
	$be=$testimoni->tampil_testimoni();
	foreach ($be as $rita) {
	
	 ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $rita['keterangan']?></td>
			
			<td>
			<a href="index.php?halaman=ubahtesti&idb=<?php echo $rita['id_tes'];?>" class="btn btn-info"><i class="fa fa-remove"></i> Edit</a>
			<a href="index.php?halaman=testimoni&aksi=hapus&idnya=<?php echo $rita['id_tes'];?>" class="btn btn-danger"><i class="fa fa-edit"></i>Hapus</a>
			</td>
		</tr>
	<?php
	$no++;
	}
	?>
	</tbody>
	
</table>
<a href="index.php?halaman=tambahtesti" class="btn btn-primary">Tambah Testimoni</a>