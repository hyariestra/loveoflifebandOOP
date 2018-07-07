<?php 

if (isset($_GET['aksi'])) {
	if ($_GET['aksi']=='hapus') {
		$trans->hapus_trans($_GET['idnya']);
		echo"<script>alert('data berhasil dihapus');</script>";
		echo"<script>window.alert='index.php?halaman=transportasi';</script>";
	}
}

 ?>

<h2>Data Transportasi</h2>
<table class="table table-striped table-bordered data">
	<thead>
		<tr>
			<th>No</th>
		
			<th>Judul</th>
			<th>Keterangan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	$no=1;
	$be=$trans->tampil_trans();
	foreach ($be as $rita) {
	
	 ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $rita['judul'];?></td>
			<td><?php echo $rita['ket'];?></td>
			<td>
			<a href="index.php?halaman=ubahtrans&idb=<?php echo $rita['id_trans'];?>" class="btn btn-info"><i class="fa fa-remove"></i> Edit</a>
			<a href="index.php?halaman=transportasi&aksi=hapus&idnya=<?php echo $rita['id_trans'];?>" class="btn btn-danger"><i class="fa fa-edit"></i>Hapus</a>
			</td>
		</tr>
	<?php
	$no++;
	}
	?>
	</tbody>
</table>
<a href="index.php?halaman=tambahtrans" class="btn btn-primary">Tambah Kendaraan</a>