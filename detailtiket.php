<?php include 'header.php'; ?>

<?php 

$id = $_GET['id'];
$det = $tiket->ambiltiket($id);

?>

<style type="text/css">
.img__wrap {
	position: relative;
}

.img__description_layer {
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	background: rgba(36, 62, 206, 0.6);
	color: #fff;
	visibility: hidden;
	opacity: 0;
	display: flex;
	align-items: center;
	justify-content: center;

	/* transition effect. not necessary */
	transition: opacity .2s, visibility .2s;
}

.img__wrap:hover .img__description_layer {
	visibility: visible;
	opacity: 1;
}

.img__description {
	transition: .2s;
	transform: translateY(1em);

}

p.img__description {
	border-style: solid;
	color: white;
	padding: 30px 50px 30px 50px;

}

.img__wrap:hover .img__description {
	transform: translateY(0);
}

p.judul
{
	font-size: 36px;
	font-weight: 900;
	color: #aaaaaa;

}

p.isi
{
	font-size: 20px;
	font-weight: 200;
	color: #aaaaaa;

}
</style>
		


<section class="team" id="team">
	<div style="background: white" class="container">
		<div class="col-md-12">
			<div class="col-md-5">
				<img style="padding-top: 30px; padding-bottom: 30px" class="responsive" src="admin/upload/tiket/<?php echo $det['gambar'] ?>">
			</div>
			<div class="col-md-7">
				<div style="padding-top: 30px; padding-bottom: 30px;" >
					<p class="judul"><?php echo $det['nama_tiket'] ?></p>
					<hr>
					<p class="isi">Harga : Rp <?php echo number_format($det['harga']) ?>,-</p>
					<p class="isi">Tanggal Event :  <?php echo $det['tanggal'] ?></p>
					<p class="isi">Lokasi :  <?php echo $det['tempat'] ?></p>
					
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#home">Deskripsi</a></li>
						<li><a data-toggle="tab" href="#menu1">Admission Rules</a></li>
					</ul>

					<div class="tab-content">
						<div id="home" class="tab-pane fade in active">
							<br>
							<p class="isi"><?php echo $det['keterangan'] ?></p>
							
						</div>
						
						<div id="menu1" class="tab-pane fade">
							<br>
							<p class="isi">
								<li>Non-Refundable, Tiket yang sudah dibeli dan dikonfirmasi tidak dapat dikembalikan atau ditukar.
								</li>
								<li>Metode pembayaran yang tersedia adalah transfer Bank Mandiri sesuai dengan nomor rekening di nota/invoice</li>
								<li>Semua pelanggan diwajibkan melakukan registrasi/sign up untuk melakukan pembelian.</li>
								<li>Penjualan tiket oleh Love of Live Manajemen bisa dihentikan atau dimulai oleh Love of Live Manajemen berdasarkan kebijakan promotor (penyelengara acara).</li>
								
								<li>Tiket dapat diprint setelah muncul di Dashboard User</li> 
								
							</p>
						</div>
						
						
					</div>


					
					<hr>
					

					<?php if (@$_SESSION['user']=='' OR NULL): ?>
						<form class="form-inline" method="post">
							<input placeholder="masukan jumlah tiket" style="width: 80%" type="number" min="1" class="form-control" name="jumlah"><a onclick="valert()" style="margin-left: 10px;" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span> Buy</a>
						</form>

					<?php else: ?>
						<form class="form-inline" method="post">
							<input class="form-control" type="hidden" name="harga" value="<?php echo $det['harga']; ?>">
							<input class="form-control" type="hidden" name="tgltiket" value="<?php echo $det['tanggal']; ?>">
							<input class="form-control" type="hidden" name="regotiket" value="<?php echo $det['tempat']; ?>">
							<input class="form-control" type="hidden" name="namatiket" value="<?php echo $det['nama_tiket']; ?>">
							<input class="form-control" type="hidden" name="tempat" value="<?php echo $det['tempat']; ?>">
							<input class="form-control" type="hidden" name="id" value="<?php echo @$_SESSION['user']['id_user']; ?>">

							<div class="form-group">
								<label>Nama Pembeli</label>
								<input placeholder="masukan nama pembeli" style="width: 100%" type="text"  class="form-control" name="nama" value="<?php echo @$_SESSION['user']['nama']; ?>">
								
							</div>
							<div class="form-group">
								<label>Email</label>
								<input placeholder="masukan email pembeli" style="width: 100%" type="text"  class="form-control" name="email" value="<?php echo @$_SESSION['user']['email']; ?>">
							</div>
							<br>
							<br>
							
							<div class="form-group">
								<label>No Telp</label>
								<input placeholder="masukan nomor telp pembeli" style="width: 120%" type="text"  class="form-control" name="telp" value="<?php echo @$_SESSION['user']['no_telpon']; ?>">
							</div>
							<br>
							<br>
							<input placeholder="masukan jumlah tiket" style="width: 90%" type="number" min="1" class="form-control" name="jumlah">
							<br>
							<br>

							<button style="width: 90%" name="simpan"  style="margin-left: 10px;" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span> Buy</button>
						</form>
					<?php endif ?>

					



				</div>
			</div>
		</div>
		
	</div>
</section>









<?php 
//jika tombol login ditekan, maka objek pengguna menjalankan fungsi login_pengguna()
if (isset($_POST['simpan']))
{
	$tesbeli=$tiket->simpanbelitiket($_POST['harga'],$_POST['id'],$_POST['nama'],$_POST['email'],$_POST['telp'],$_POST['jumlah'],$_POST['tgltiket'],$_POST['regotiket'],$_POST['namatiket'],$_POST['tempat']);
 //jika username dan pass benar maka masuk ke index.php
	if ($tesbeli=="sukses")
	{
		echo "<script>alert('Data Berhasil Disimpan');</script>";
		echo "<script>window.location='notatiket.php?id=".$_SESSION['idlasttiket']['id']." ';</script>";
	}
 //jika tidak, kemabli ke form login
	else
	{
		echo "<script>alert('Jumlah Yang Anda masukan Kosong');</script>";
		echo "<script>window.location='register.php';</script>";
	}

}

?>

<script type="text/javascript">
	function valert() {
		alert('Anda Harus Login Untuk Melakukan Pembelian');
	}
</script>

<?php include 'footer.php'; ?>