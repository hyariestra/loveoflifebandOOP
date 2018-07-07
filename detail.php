<?php include 'header.php'; ?>

<?php 

$id = $_GET['id'];
$det = $produk->ambilproduk($id);

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
			<div class="col-md-6">
				<img style="padding-top: 30px; padding-bottom: 30px" class="responsive" src="admin/upload/produk/<?php echo $det['foto'] ?>">
			</div>
			<div class="col-md-6">
				<div style="padding-top: 30px; padding-bottom: 30px;" >
					<p class="judul"><?php echo $det['nama_barang'] ?></p>
					<hr>
					<p class="isi">Harga : Rp <?php echo number_format($det['harga']) ?>,-</p>
					<p class="isi">Stok : <?php echo $det['stok'] ?></p>
					<p class="isi">Berat : <?php echo $det['berat_barang'] ?> Gram</p>
					<p class="isi">Deskripsi:</p>
					<p class="isi"><?php echo $det['keterangan'] ?></p>
					<hr>
					<form class="form-inline" method="post">
						<input type="hidden" name="id" value="<?php echo $det['id_barang']; ?>">
						<input placeholder="masukan jumlah produk" style="width: 80%" type="number" min="1" class="form-control" name="jumlah"><button name="simpan"  style="margin-left: 10px;" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span> Buy</button>
					</form>
				</div>
			</div>
		</div>
		
	</div>
</section>


<?php 
//jika tombol login ditekan, maka objek pengguna menjalankan fungsi login_pengguna()
if (isset($_POST['simpan']))
{
	$tesbeli=$produk->simpankeranjang($_POST['id'],$_POST['jumlah']);
 //jika username dan pass benar maka masuk ke index.php
	if ($tesbeli=="sukses")
	{
		echo "<script>alert('Produk Masuk Ke Keranjang Belanja');</script>";
		echo "<script>window.location='keranjang.php';</script>";
	}
 //jika tidak, kemabli ke form login
	else
	{
		echo "<script>alert('Jumlah Yang Anda masukan Kosong');</script>";
		echo "<script>window.location='register.php';</script>";
	}

}

?>


<?php include 'footer.php'; ?>