<?php 

if (isset($_GET['aksi'])) {
	if ($_GET['aksi']=='hapus') {
		$berita->hapus_berita($_GET['idnya']);
		echo"<script>alert('tersimpan');</script>";
		echo"<script>window.alert='index.php?halaman=paket';</script>";
	}
}

 ?>

<h2>Kategori Produk</h2>
<table class="table table-striped table-bordered data">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Paket</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	$no=1;
	$be=$paket->tampil_paket();
	foreach ($be as $rita) {
	
	 ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $rita['nama_paket']?></td>
			<td><?php echo $rita['status']?></td>
			
			<td>
			<a href="index.php?halaman=ubahpaket&idb=<?php echo $rita['id_paket'];?>" class="btn btn-info"><i class="fa fa-remove"></i> Edit</a>
			</td>
		</tr>
	<?php
	$no++;
	}
	?>
	</tbody>
</table>
<a href="index.php?halaman=tambahpaket" class="btn btn-primary">Tambah Paket</a>