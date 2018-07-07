<?php include 'header.php'; ?>

	<section class="portfolio-agileinfo" id="gallery">
		<div class="container">
			<h3 class="heading-agileinfo" data-aos="zoom-in">Gallery<span>Events Is A Professionally Managed Event</span></h3>
				<div class="gallery-grids">
					<div class="tab_img">
						
						
						<?php 

						foreach ($gallery as $key => $value) {
							
						 ?>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="admin/upload/gallery/<?php echo $value['gambar'] ?>" class="b-link-stripe b-animate-go lightninBox" data-lb-group="1">
								<img src="admin/upload/gallery/<?php echo $value['gambar'] ?>" class="img-responsive" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									
								</div>
							</a>
						</div>
						<?php } ?>
						<div class="clearfix"> </div>
					</div>
				
			</div>
		</div>
</section>
	
	<?php include 'footer.php'; ?>