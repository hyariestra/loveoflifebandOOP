<style type="text/css">
table, th, td {
	border: 1px solid #473b6b !important;
}
</style>



<?php 


$det = $profil->ambil_profil();

$id = $_GET['id'];

$info = $tiket->ambil_pembelian_tiket($id);

$detkonfirmasi = $pembelian->ambilpembayarantiket($id);
/*
echo "<pre>";
print_r($detkonfirmasi);
echo "</pre>";
*/

?>

<section class="invoice">
	<!-- title row -->
	<div class="row">
		<div class="col-xs-12">
			<h2 class="page-header">
				<i class="fa fa-globe"></i> Life Of Live Manajemen.
				<?php $tgl =  $info['tanggal_pembelian'];


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
				<strong><?php echo $info['nama_penerima'] ?></strong><br>
				Phone: <?php echo $info['telp_penerima'] ?><br>
				Email: <?php echo $info['email_penerima'] ?>
			</address>
		</div><!-- /.col -->
		<div class="col-sm-4 invoice-col">
			<b>Kode Invoice #<?php echo $info['kode_pembelian'] ?></b><br>

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

					$jumlahharga =  $info['jumlah_pembelian']*$info['total_pembelian'];
					?>
					<tr>

						<td><?php echo $no; ?></td>
						<td><?php echo $info['nama_event_tiket'] ?></td>
						<td><?php echo $info['jumlah_pembelian'] ?></td>
						<td>Rp. <?php echo number_format($info['total_pembelian'])  ?>,00</td>
						<td>Rp .<?php echo number_format($jumlahharga) ?>,00</td>
					</tr>

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
						<th>Total Bayar</th>
						<td>Rp. <?php echo number_format($jumlahharga);  ?>,00</td>
					</tr>

				</table>
			</div>
		</div><!-- /.col -->
	</div><!-- /.row -->


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
			<label>Jumlah Yang dibayarkan</label>
			<input type="text" value="<?php echo $detkonfirmasi['jumlah_pembayaran'] ?>" readonly class="form-control" >
		</div>
		<div class="form-group">
			<label>Atas Nama</label>
			<input type="text" value="<?php echo $detkonfirmasi['nama_pembayaran'] ?>" readonly class="form-control" >
		</div>
		<div class="form-group">
			<label>Bukti Pembayaran</label>
			<br>
			<img style="width: 400px;height: auto;" src="upload/konfirmasitiket/<?php echo $detkonfirmasi['bukti_pembayaran'] ?>">
			<br>

			<a href="upload/konfirmasitiket/<?php echo $detkonfirmasi['bukti_pembayaran'] ?>" download>Download Gambar Bukti Pembayaran</a>

			<br>
			<br>
			<form method="POST">
				<div class="form-group">
					<button type="submit" name="submit" class="btn btn-warning">
						<span class="glyphicon glyphicon-ok-circle"></span>Terima Pembayaran
					</button>
				</div>
				<span style="font-style: italic;font-size: 12px">*jika button di Klik , pembeli sudah menerima tiket</span>
			</form>

		</div>
	</div>

	<?php 
	
	if (isset($_POST["submit"])) 
	{
		$hasil= $pembelian->konfirmasitiket($id);
		if ($hasil=="sukses") 
		{
			echo "<script>alert('sukses, pembayaran sudah di konfirmasi');</script>";
			echo "<script>location='index.php?halaman=pembeliantiket';</script>";
		}
		else
		{

			echo "<script>alert('Data Gagal Disimpan');</script>";
			echo "<script>location='index.php?halaman=pembeliantiket;</script>";
		}
	}

	?>



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