<?php 
if (isset($_GET['aksi'])) {
	if ($_GET['aksi']=='hapus') {
		$kategori->hapus_kategori($_GET['idnya']);
		echo "<script>alert('kategori terhapus')</script>";
		echo "<script>location='index.php?halaman=gallery;</script>";
	}
}

?>



<table class="table table-striped table-bordered data">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Kategori</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>


		<?php 
		$no=1;
		$kate=$kategori->tampil_kategori();
		foreach ($kate as $gori) 
		{

			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $gori['kategori'];?></td>
				<td>
					<a href="index.php?halaman=ubahkategori&idnya=<?php echo $gori['id_kategori'];?>" class="btn btn-info"><i class="fa fa-edit"></i>Ubah</a>
					<a href="index.php?halaman=kategori&aksi=hapus&idnya=<?php echo $gori['id_kategori'];?>" class="btn btn-danger"><i class="fa fa-remove"></i>Hapus</a>
				</td>
				<tr>
					<?php $no++; } ?>
				</tbody>
			</table>
			<a href="index.php?halaman=tambahkategori" class="btn btn-primary"><i class="fa fa-plus"></i> tambah kategori</a>
			