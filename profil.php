<?php include 'header.php'; ?>
<style type="text/css">
table, th, td {
	border: 1px solid #473b6b !important;
}
thead
{
	background-color: #f8f8f8;
}
.note{
	font-size: 13px;
	font-style: italic;
}
</style>

<?php if ($_SESSION['user']=='' OR $_SESSION['user']==NULL): ?>

	<?php 

	echo "<script>alert('Anda Harus Login Untuk Mengakses Halaman Ini');</script>";

	echo "<script>window.location='register.php';</script>";

	?>

<?php else: ?>

	<?php 


	$det = $profil->ambil_profil();

	$id = $_GET['id'];

	$info = $user->historypembelian($id);
	$tiket = $user->historypembeliantiket($id);

	$detuser = $user->detailuser($id);

/*	echo "<pre>";
	print_r($tiket);
	echo "</pre>";

*/

	?>


	<section class="portfolio-agileinfo" id="gallery">
		<div class="container">
			<h3 class="heading-agileinfo" data-aos="zoom-in">Dashboard User<span></span></h3>

			<div style="background-color: white;padding-top: 20px;padding-bottom: 20px;" class="col-md-12">
				<div class="col-md-3">
					<ul class="nav nav-pills nav-stacked" role="tablist">
						<li role="presentation" class="active">
							<a href="#detail" aria-controls="detail" role="tab" data-toggle="tab">Pembelian Produk</a>
						</li>
						<li role="presentation">
							<a href="#tiket" aria-controls="deskripsi" role="tab" data-toggle="tab">Pembelian Tiket</a>
						</li>
						<li role="presentation">
							<a href="#deskripsi" aria-controls="deskripsi" role="tab" data-toggle="tab">Pengaturan</a>
						</li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="tab-content">
						<div id="detail" class="tab-pane fade in active">
							<h3>Riwayat Belanja</h3>
							<br>
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<td>No</td>
										<td>Invoice</td>
										<td>Tanggal Pembelian</td>
										<td>Total Pembelian</td>
										<td>Resi</td>
										<td  style="width: 15px;" >Status</td>
										<td>Aksi</td>
									</tr>
								</thead>
								<tbody>
									<?php
									$no=1;
									foreach ($info as $key => $value) 
									{

										$date = $value['tanggal_pembelian'];
										$date=date('d-m-Y', strtotime($date));

										?>
										<tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $value['kode_pembelian'] ?></td>
											<td style="width: 15%;"><?php echo $date; ?></td>
											<td>Rp. <?php echo number_format($value['total_bayar']) ?>,00</td>
											<td><?php echo $value['resi_pengiriman'] ?></td>
											<td><?php echo $value['status_pembelian'] ?></td>
											<td>
												<a title="Invoice dan Konfirmasi" href="nota.php?id=<?php echo $value['id_pembelian'] ?>" type="button" class="btn btn-info"><i class="fa fa-edit" style="font-size:15px"></i></a>
												<a title="Bukti Konfirmasi" href="buktikonf.php?id=<?php echo $value['id_pembelian'] ?>"  type="button" class="btn btn-warning"><i class="fa fa-credit-card" style="font-size: 15px;"></i></a>
											</td>
										</tr>

										<?php 
										$no++;
									} 

									?>
								</tbody>
							</table>
						</div>

						<div id="tiket" class="tab-pane fade">
							<br>
							<h3>Pembelian Tiket</h3>
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<td>No</td>
										<td>Nama Event</td>
										<td>Tanggal Event</td>
										<td>Lokasi</td>
										<td>Status Pembayaran</td>
										<td>Status Tiket</td>
										<td>Kode Tiket</td>
										<td>Aksi</td>
									</tr>
								</thead>
								<tbody>
									<?php 
									$no=1;
									foreach ($tiket as $key => $value) {

										$date = $value['tanggal_beli'];
										$date=date('d-m-Y', strtotime($date));


										if ($value['status_pembelian']=='Approved') {
											$gly = 'glyphicon glyphicon-ok-circle';
											$kode = $value['kode_pembelian'];
											$cetak = '<a target="_blank" class="btn btn-info" href="cetaktiket.php?id='.$value['id_pembelian_detail_tiket'].' "><span class="glyphicon glyphicon-print"></span> Cetak Tiket</a>';
										}else
										{
											$gly = 'glyphicon glyphicon-remove-circle';
											$kode = 'Anda Belum Mendapatkan Kode';
											$cetak = '<a onclick="warn()" class="btn btn-info"><span class="glyphicon glyphicon-print"></span> Cetak Tiket</a>';
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
											<td><?php echo $no; ?></td>
											<td><?php echo $value['nama_beli'] ?></td>
											<td><?php echo $date; ?></td>
											<td><?php echo $value['tempat_beli'] ?></td>
											<td><span class="<?php echo $gly2 ?>"> </span><?php echo $value['pembayaran'] ?></td>
											<td><span class="<?php echo $gly ?>"></span><?php echo $value['status_pembelian'] ?></td>
											<td><?php echo $kode; ?></td>
											<td><?php echo $cetak; ?></td>

										</tr>
										<?php
										$no++;
									} ?>
								</tbody>
							</table>
						</div>

						<div id="deskripsi" class="tab-pane fade">
							<h3>Pengaturan Profile</h3>
							<br>
							<form method="POST">
								<div class="form-group">
									<label>Email</label>
									<input readonly="" type="text" class="form-control" value="<?php echo $detuser['email'] ?>" name="">
									<span class="note">Alamat Email Tidak Dapat Diganti</span>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control" value="" name="pass">
									<span class="note">Biarkan Kosong Jika Tidak Dirubah</span>

								</div>
								<div class="form-group">
									<label>Nama</label>
									<input type="text" class="form-control" value="<?php echo $detuser['nama'] ?>" name="nama">

								</div>
								<div class="form-group">
									<label>No Telp</label>
									<input type="text" class="form-control" value="<?php echo $detuser['no_telpon'] ?>" name="telp">

								</div>
								<div class="form-group">
									<label>Jenis Kelamin</label>
									<select name="jk" class="form-control">
										<?php if ($detuser['jenis_kelamin']=='pria'): ?>
											<option selected="" value="pria">Pria</option>
											<option value="wanita">Wanita</option>

										<?php else: ?>		
											<option  value="pria">Pria</option>
											<option selected="" value="wanita">Wanita</option>
										<?php endif ?>

									</select>

								</div>
								<div class="form-group">
									<label>Alamat</label>
									<textarea name="alamat" class="form-control"><?php echo $detuser['alamat'] ?></textarea>
								</div>
								<button name="save" type="submit" class="btn btn-info">button</button>
							</form>
						</div>


					</div>
				</div>
			</div>



		</div>
	</section>

	<?php

	if (isset($_POST['save']))
	{
		$simpan=$user->ubahprofil($_POST['pass'],$_POST['nama'],$_POST['telp'],$_POST['jk'],$_POST['alamat'],$id);

		if ($simpan=="sukses") 
		{
			echo "<script>alert('Profil Berhasil Disimpan');</script>";
			echo "<script>location='profil.php?id=$id';</script>";
		}
		else
		{

			echo "<script>alert('inputan masih ada yang kosong');</script>";
			echo "<script>location='profil.php?id=$id';</script>";
		}

	}

	?>




	<script type="text/javascript">
		function warn() {
			alert('Anda Belum Dapat Mencetak TIket');
		}
	</script>
	
	<?php include 'footer.php'; ?>

	
<?php endif ?>
