<?php 

if (isset($_GET['aksi'])) {
	if ($_GET['aksi']=='hapus') {
		$halamanstatis->hapus_halamanstatis($_GET['idnya']);
		echo"<script>alert('tersimpan');</script>";
		echo"<script>window.alert='index.php?halaman=halamanstatis';</script>";
	}
}

 ?>

<h3>Halaman Statis</h3>
<table class="table table-striped table-bordered data">
	<thead>
		<tr>
			<th>No</th>
			<th>Judul Halaman</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	$no=1;
	$be=$halamanstatis->tampil_halamanstatis();
	foreach ($be as $rita) {
	
	 ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $rita['judul']?></td>
			<td><?php echo $rita['status']?></td>
			
			<td>
			<a href="index.php?halaman=ubahhalamanstatis&idb=<?php echo $rita['id_hal'];?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
			</td>
		</tr>
	<?php
	$no++;
	}
	?>
	</tbody>
</table>
<a href="index.php?halaman=tambahhalamanstatis" class="btn btn-primary">Tambah Halaman statis</a>