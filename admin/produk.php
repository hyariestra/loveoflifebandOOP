<?php


	if (@$_GET['aksi']=='hapus') 
	{
		$produk->hapusproduk($_GET['idb']);
		echo "<script>alert('Data Berhasil terhapus')</script>";
		echo "<script>window.location='index.php?halaman=produk';</script>";
	}


$semua=$produk->tampilproduk();
 ?>



<h2>Produk</h2>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Kategori</th>
			<th>Berat Barang</th>
			<th>Keterangan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($semua as $key => $value) {
	?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value['nama_barang'];?></td>
			<td><?php echo $value['harga'];?></td>
			<td><?php echo $value['tipe']?></td>
			<td><?php echo $value['berat_barang']?></td>
			<td><?php echo $value['keterangan']?></td>
			
			<td>
			<a href="index.php?halaman=ubahproduk&idb=<?php echo $value['id_barang'];?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
			<a href="index.php?halaman=produk&aksi=hapus&idb=<?php echo $value['id_barang'];?>" class="btn btn-danger"><i class="fa fa-remove"></i>Hapus</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah Produk</a>