<?php 

if (isset($_GET['aksi'])) {
	if ($_GET['aksi']=='hapus') {
		$subpaket->hapus_subpaket($_GET['idnya']);
		echo"<script>alert('Data Berhasil di hapus');</script>";
		echo"<script>window.alert='index.php?halaman=paket';</script>";
	}
}

 ?>

<h2>Produk</h2>
<table class="table table-striped table-bordered data">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Kategori</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	$no=1;
	$be=$subpaket->tampil_paket();
	foreach ($be as $rita) {
	
	 ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $rita['nama_produk']?></td>
			<td><?php echo $rita['judul']?></td>
			
			<td>
			<a href="index.php?halaman=ubahsubpaket&idb=<?php echo $rita['id_subpaket'];?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
			<a href="index.php?halaman=subpaket&aksi=hapus&idnya=<?php echo $rita['id_subpaket'];?>" class="btn btn-danger"><i class="fa fa-remove"></i>Hapus</a>
			</td>
		</tr>
	<?php
	$no++;
	}
	?>
	</tbody>
</table>
<a href="index.php?halaman=tambahsubpaket" class="btn btn-primary">Tambah Paket</a>