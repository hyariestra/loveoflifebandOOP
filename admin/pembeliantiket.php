<?php


if (@$_GET['aksi']=='hapus') 
{
	$produk->hapusproduk($_GET['idb']);
	echo "<script>alert('Data Berhasil terhapus')</script>";
	echo "<script>window.location='index.php?halaman=produk';</script>";
}


$semua=$pembelian->tampilpembeliantiket();

?>



<h2>Pembelian Tiket</h2>
<table id="tabelku" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nomor Invoice</th>
			<th>Nama Buyer</th>
			<th>Event</th>
			<th>Tanggal Event</th>
			<th  style="width: 44px">Jumlah Pembelian Tiket</th>
			<th>Status Pembayaran</th>
			<th>Status Tiket</th>
			<th>Kode Tiket</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($semua as $key => $value)

		{

			if ($value['status_pembelian']=='Approved') {
				$gly = 'glyphicon glyphicon-ok-circle';
			}else
			{
				$gly = 'glyphicon glyphicon-remove-circle';
			}

			if ($value['pembayaran']=='Sudah konfirmasi') {
				$gly2 = 'glyphicon glyphicon-info-sign';
			}
			elseif ($value['pembayaran']=='Lunas') {
				$gly2 = 'glyphicon glyphicon-ok-sign';
			}

			else
			{
				$gly2 = 'glyphicon glyphicon-remove-sign';
			}
			?>
			<tr>
				<td><?php echo $key+1; ?></td>
				<td><?php echo $value['kode_pembelian'];?></td>
				<td><?php echo $value['nama_penerima'];?></td>
				<td><?php echo $value['nama_beli']?></td>
				<td><?php echo $value['tanggal_event_tiket']?></td>
				<td><?php echo $value['jumlah_pembelian']?></td>
				<td><span class="<?php echo $gly2 ?>"> </span> <?php echo $value['pembayaran']?></td>
				<td><span class="<?php echo $gly ?>"></span> <?php echo $value['status_pembelian']?></td>

				<td>
					<ul>
						<?php 
						$list = mysqli_query($mysqli, "SELECT*FROM pembelian_detail_tiket WHERE id_pembelian_tiket = '".$value['id_pembelian_tiket']."' ");

						foreach ($list as $row)
						{

							?>
							<li><?php echo $row['id_tiket']?></li>	

							<?php } ?>
						</ul>
					</td>
					<td>
						<a href="index.php?halaman=detpembeliantiket&id=<?php echo $value['id_pembelian_tiket'];?>" class="btn btn-info"><i class="fa fa-edit"></i> Detail</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>



		<script type="text/javascript">
			function openresi(obj,id)
			{
				var id = id;
				$('input[name=id]').val(id);
				$('#modal-id').modal('show');

				console.log(id);
			}
			function warn() {
				alert('Resi Belum Dapat Diinputkan!');

			}
		</script>


		
		


