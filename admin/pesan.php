<?php 

if (isset($_GET['aksi'])) {
	if ($_GET['aksi']=='hapus') {
		$berita->hapus_berita($_GET['idnya']);
		echo"<script>alert('tersimpan');</script>";
		echo"<script>window.alert='index.php?halaman=berita';</script>";
	}
}

 ?>

<h2>Pesan Yang Masuk</h2>
<table class="table table-striped table-bordered data">
	<thead>
		<tr>
			<th>No</th>
			<th>Pengirim</th>
			<th>Telephone</th>
			<th>Email Pengirim</th>
			<th>Isi Pesan</th>
			
		</tr>
	</thead>
	<tbody>
	<?php 
	$no=1;
	$be=$pesan->tampilpesan();
	foreach ($be as $rita) {
	
	 ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $rita['nama'];?></td>
			<td><?php echo $rita['telp'];?></td>
			<td><?php echo $rita['email'];?></td>
			<td><?php echo $rita['pesan'];?></td>
			
		</tr>
	<?php
	$no++;
	}
	?>
	</tbody>
</table>