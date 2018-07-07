<?php


	if (@$_GET['aksi']=='hapus') 
	{
		$produk->hapusproduk($_GET['idb']);
		echo "<script>alert('Data Berhasil terhapus')</script>";
		echo "<script>window.location='index.php?halaman=produk';</script>";
	}


$semua=$pembelian->tampilpembelian();
 ?>



<h2>Produk</h2>
<table id="tabelku" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th style="width: 44px">Nomor Invoice</th>
			<th>Nama Buyer</th>
			<th>Status Pembayaran</th>
			<th>Status Pengiriman</th>
			<th>Ekspedisi</th>
			<th>Nomor Resi</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($semua as $key => $value)

	 {

	 	if ($value['status_pembelian']=='belum lunas') {
		$css = 'warn';
	}else
	{
		$css = 'openresi';
	}
	?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value['kode_pembelian'];?></td>
			<td><?php echo $value['nama_penerima'];?></td>
			<td><?php echo $value['status_pembelian']?></td>
			<td><?php echo $value['status_pengiriman']?></td>
			<td><?php echo $value['ekspedisi']?></td>
			<td><?php echo $value['resi_pengiriman']?></td>
			
			<td>
			<a href="index.php?halaman=detpembelian&id=<?php echo $value['id_pembelian'];?>" class="btn btn-info"><i class="fa fa-edit"></i> Detail</a>
			<a onclick="<?php echo $css ?>(this,<?php echo $value['id_pembelian'] ?>)" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>Masukan Resi</a>
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


<a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Trigger modal</a>
<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Masukan Nomor Resi</h4>
			</div>
			<div class="modal-body">
				<form method="POST">
					<input type="hidden" value="" name="id">

					<div class="form-group">
						<label>Nomor Resi</label>
						<input type="text" class="form-control" name="resi">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button name="save" type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>

				<?php 

				if (isset($_POST["save"])) 
				{
					$hasil= $pembelian->simpanresi($_POST["id"],$_POST["resi"]);
					if ($hasil=="sukses") 
					{
						echo "<script>alert('sukses, resi Sudah diinputkan');</script>";
						echo "<script>location='index.php?halaman=pembelian';</script>";
					}
					else
					{

						echo "<script>alert('Data Gagal Disimpan');</script>";
						echo "<script>location='index.php?halaman=pembelian;</script>";
					}
				}

				?>
			</div>
		</div>
	</div>
</div>


