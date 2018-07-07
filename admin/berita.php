<?php 

if (isset($_GET['aksi'])) {
	if ($_GET['aksi']=='hapus') {
		$berita->hapus_berita($_GET['idnya']);
		echo"<script>alert('Data Berhasil Dihapus');</script>";
		echo"<script>window.alert='index.php?halaman=berita';</script>";
	}
}

 ?>

<h2>Data berita</h2>
<table class="table table-striped table-bordered data">
	<thead>
		<tr>
			<th>No</th>
			<th>Kategori</th>
			<th>Judul</th>
			<th>Tanggal</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	$no=1;
	$be=$berita->tampil_berita();
	foreach ($be as $rita) {
	
	 ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $rita['kategori']?></td>
			<td><?php echo $rita['judul'];?></td>
			<td><?php echo $rita['tanggal'];?></td>
			<td>
			<a href="index.php?halaman=ubahberita&idb=<?php echo $rita['id_berita'];?>" class="btn btn-info"><i class="fa fa-remove"></i> Edit</a>
			<a href="index.php?halaman=berita&aksi=hapus&idnya=<?php echo $rita['id_berita'];?>" class="btn btn-danger"><i class="fa fa-edit"></i>Hapus</a>
			</td>
		</tr>
	<?php
	$no++;
	}
	?>
	</tbody>
	
</table>
<a href="index.php?halaman=tambahberita" class="btn btn-primary">Tambah Berita</a>