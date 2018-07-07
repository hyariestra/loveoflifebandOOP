<?php include 'header.php'; ?>
<?php $semua=$tiket->tampiltiket(); ?>

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
</style>
<section class="team" id="team">
	<div class="container">
			<h3 class="heading-agileinfo" data-aos="zoom-in">Ticket<span>Buy Ticket</span></h3>
		<div class="team-grid-top">
			
			<?php 

			foreach ($semua as $key => $value) {

			 ?>
			
			<div class="col-md-3 team1" data-aos="fade-left">


				<div class="inner-team1">
					<div class="img__wrap">
						<img class="img__img" src="admin/upload/tiket/<?php echo $value['gambar'] ?>" alt="" />
						<a href="detailtiket.php?id=<?php echo $value['id_tiket'] ?>">
							
						<div class="img__description_layer">
							<p class="img__description">Buy</p>
						</div>
						</a>

					</div>
				<h4><?php echo $value['nama_tiket'];?></h4>
				<h3><?php echo $value['tanggal'] ?></h3>
				<h3>Rp. <?php echo number_format($value['harga']);?></h3>
					<!-- <div style="margin-top: 10px;" class="team-social">
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
						<a href="#"><i class="fa fa-pinterest-p"></i></a>
					</div> -->
				</div>

				 

			</div>
			<?php } ?>

			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
		
	</div>
</section>

<?php include 'footer.php'; ?>