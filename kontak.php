<?php include 'header.php' ?>

<style type="text/css">
	p.about{
		font-size: 20px;
		font-weight: 700;
	}

</style>

<section class="portfolio-agileinfo" id="gallery">
		<div class="container">
		<h3 class="heading-agileinfo" data-aos="zoom-in">Book An Event<span class="thr"></span></h3>
			<div class="book-appointment" data-aos="zoom-in">
				<form  method="post">
					<div class="gaps">
						<p></p>
						<input type="text" name="nama" placeholder="Name" required="" />
					</div>
					<div class="gaps">
						<p></p>
						<input type="email" name="email" placeholder="Email" required="" />
					</div>
					<div class="gaps">
						<p></p>
						<input type="text" name="telp" placeholder="Phone Number" required="" />
					</div>
					<div class="gaps">
						<textarea name="pesan" placeholder="Message..." required=""></textarea>
					</div>
					<input type="submit" name="kirim" value="Kirim Pesan">
				</form>
			</div>
			
		</div>
</section>

<?php 

if (isset($_POST["kirim"])) 
{
	$hasil= $pesan->simpanpesan($_POST["nama"],$_POST["email"],$_POST["telp"],$_POST['pesan']);
	if ($hasil=="sukses") 
	{
		echo "<script>alert('sukses,data berhasil disimpan');</script>";
		echo "<script>location='kontak.php';</script>";
	}
	else
	{

		echo "<script>alert('inputan masih ada yang kosong');</script>";
		echo "<script>location='index.php?halaman=tambahalbum;</script>";
	}
}

?>


	<?php include 'footer.php'; ?>







