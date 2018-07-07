<style type="text/css">
table, th, td {
	border: 1px solid #473b6b !important;
}
</style>



<?php 


$det = $profil->ambil_profil();

$id = $_GET['id'];

$info = $pembelian->ambil_pembelian($id);

$detkonfirmasi = $pembelian->ambilpembayaran($id);





?>

<section class="invoice">
	<!-- title row -->
	<div class="row">
		<div class="col-xs-12">
			<h2 class="page-header">
				<i class="fa fa-globe"></i> Life Of Live Manajemen.
				<?php $tgl =  $info['0']['tanggal_pembelian'];

				$tglbatas = $info['0']['tanggal_batas_bayar'];
				?>
				<small class="pull-right"><?php echo date('d-m-Y', strtotime($tgl));  ?></small>
			</h2>
		</div><!-- /.col -->
	</div>
	<!-- info row -->
	<div class="row invoice-info">
		<div class="col-sm-4 invoice-col">
			Dari
			<address>
				<strong><?php echo $det['nama_usaha'] ?></strong><br>
				<?php echo $det['alamat'] ?><br>
				Klaten<br>
				55060<br>
				Phone: <?php echo $det['telp'] ?><br>
				Email: <?php echo $det['email'] ?>
			</address>
		</div><!-- /.col -->
		<div class="col-sm-4 invoice-col">
			Kepada
			<address>
				<strong><?php echo $info['0']['nama_penerima'] ?></strong><br>
				<?php echo $info['0']['tipe']." ".$info['0']['nama_kota'] ?><br>
				<?php echo $info['0']['nama_provinsi']; ?><br>
				<?php echo $info['0']['kode_pos']; ?><br>
				Phone: <?php echo $info['0']['telp_penerima'] ?><br>
				Email: <?php echo $info['0']['email'] ?>
			</address>
		</div><!-- /.col -->
		<div class="col-sm-4 invoice-col">
			<b>Kode Invoice #<?php echo $info['0']['kode_pembelian'] ?></b><br>
			<br>
			<b>Batas Pembayaran:</b> <?php echo date('d-m-Y', strtotime($tglbatas)) ?><br>

		</div><!-- /.col -->
	</div><!-- /.row -->

	<!-- Table row -->
	<div class="row">
		<div class="col-xs-12 table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Produk</th>
						<th>Jumlah</th>
						<th>Harga</th>
						<th>Subtotal</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($info as $key => $value) {
						$jumlahharga =  $value['jumlah_beli']*$value['harga_beli'];
						?>
						<tr>

							<td><?php echo $no; ?></td>
							<td><?php echo $value['nama_beli'] ?></td>
							<td><?php echo $value['jumlah_beli'] ?></td>
							<td>Rp. <?php echo number_format($value['harga_beli'])  ?>,00</td>
							<td>Rp .<?php echo number_format($jumlahharga) ?>,00</td>
						</tr>
						<?php 
						$no++;
					} ?>
				</tbody>
			</table>
		</div><!-- /.col -->
	</div><!-- /.row -->

	<div class="row">
		<!-- accepted payments column -->
		<div class="col-xs-6">
			<p class="lead">Payment Methods:</p>
			<img style="width: 100px;" src="../images/mandirilogo.png" alt="Visa">

			<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
				<b><?php echo $det['rekening'] ?></b>
			</p>
		</div><!-- /.col -->
		<div class="col-xs-6">
			<div class="table-responsive">
				<table class="table">
					<tr>
						<th style="width:50%">Total Belanja:</th>
						<td>Rp. <?php echo number_format($value['total_pembelian']) ; ?>,00</td>
					</tr>
					<tr>
						<th>Total Ongkos Kirim</th>
						<td>Rp. <?php echo number_format($value['biaya_pengiriman']) ; ?>,00</td>
					</tr>
					<tr>
						<th>Total Bayar</th>
						<td>Rp. <?php echo number_format($value['total_bayar']);  ?>,00</td>
					</tr>

				</table>
			</div>
		</div><!-- /.col -->
	</div><!-- /.row -->

	<!-- this row will not appear when printing -->

</section>


<section class="invoice">
	
	<?php if ($detkonfirmasi=='' OR $detkonfirmasi==NULL): ?>
		<button disabled="" style="width: 100%;" type="button" class="btn btn-danger">
			<span class="glyphicon glyphicon-remove
			"></span>
			Belum Ada Pembayaran
		</button>

		
	<?php else: ?>
		<button onclick="showpembayaran()" style="width: 100%;" type="button" class="btn btn-warning">
			<span class="glyphicon glyphicon-menu-hamburger
			"></span>
			Lihat Pembayaran
		</button>
	<?php endif ?>



	<br>
	<div id="pembayaran">
		<div class="form-group">
			<label>Kode Pembelian</label>
			<input type="text" value="<?php echo $detkonfirmasi['kode_pembelian'] ?>" readonly class="form-control" >
		</div>
		<div class="form-group">
			<label>Tanggal Pembayaran</label>
			<input type="text" value="<?php echo $detkonfirmasi['tanggal_pembayaran'] ?>" readonly class="form-control" >
		</div>
		<div class="form-group">
			<label>Nama Bank</label>
			<input type="text" value="<?php echo $detkonfirmasi['bank_pembayaran'] ?>" readonly class="form-control" >
		</div>
		<div class="form-group">
			<label>Atas Nama</label>
			<input type="text" value="<?php echo $detkonfirmasi['nama_pembayaran'] ?>" readonly class="form-control" >
		</div>
		<div class="form-group">
			<label>Bukti Pembayaran</label>
			<br>
			<img style="width: 400px;height: auto;" src="upload/konfirmasi/<?php echo $detkonfirmasi['bukti_pembayaran'] ?>">
			<br>

			<a href="upload/konfirmasi/<?php echo $detkonfirmasi['bukti_pembayaran'] ?>" download>Download Gambar Bukti Pembayaran</a>

		</div>
	</div>


</section>


<script type="text/javascript">
	$(document).ready(function(){
		$("#pembayaran").hide();
	});

	function showpembayaran()
	 {
		$("#pembayaran").toggle('slow');
	}

</script>