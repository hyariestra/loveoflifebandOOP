<?php include 'header.php'; ?>

	<!-- //w3-banner -->
	<!-- modal -->
	<style type="text/css">
	
	p.img__description
	{
		font-size: 24px;
	}
	 
	p.about
	{
		    font-family: sans-serif;
    /* size: 30px; */
    font-size: 20px;
    text-align: center;
    font-weight: 10em;
    font-weight: bold;
	}
	.buttoncustom
	{
	margin-left: 45%;
	margin-top: -50px;
	}
	.img__wrap 
	{
		position: relative;
		width: 500px;
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

.img__wrap:hover .img__description {
  transform: translateY(0);
}
</style>
	<div class="modal about-modal fade" id="myModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header"> 
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						<h4 class="modal-title">New Party</h4>
					</div> 
					<div class="modal-body">
					<div class="agileits-w3layouts-info">
						<img src="images/g1.jpg" alt="" />
						<p>Duis venenatis, turpis eu bibendum porttitor, sapien quam ultricies tellus, ac rhoncus risus odio eget nunc. Pellentesque ac fermentum diam. Integer eu facilisis nunc, a iaculis felis. Pellentesque pellentesque tempor enim, in dapibus turpis porttitor quis. Suspendisse ultrices hendrerit massa. Nam id metus id tellus ultrices ullamcorper.  Cras tempor massa luctus, varius lacus sit amet, blandit lorem. Duis auctor in tortor sed tristique. Proin sed finibus sem.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- //modal -->
	<div class="banner-bottom" id="about">
		<div class="container">
			<h3 class="heading-agileinfo" data-aos="zoom-in">About Us<span>Love Of Life</span></h3>
			<div class="w3ls_banner_bottom_grids">

				<p class="about"><?php echo substr($pro['about'], 0,400)  ?>....</p>
				<div class="buttoncustom">
					
				<div class="more-button">
					<a href="about.php">Read More</a>
				</div>
				</div>
					
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- services -->
<div class="services jarallax" id="services">
		
		<div style="margin-left: 210px" class="container">

			<div class="col-md-6 ser-1" data-aos="fade-right">
				<div class="img__wrap">
					<a href="gallery.php">
						
					<img style="width: 500px; margin-top: 20px;" class="img__img" src="images/g3.jpg" />
					<div  class="img__description_layer">
						<p class="img__description">Gallery</p>
					</div>
					</a>
				</div>

			</div>
			
			<div class="col-md-6 ser-1" data-aos="fade-right">
				<div class="img__wrap">
					<a href="store.php">
						
					<img style="width: 500px; margin-top: 20px;" class="img__img" src="images/g3.jpg" />
					<div class="img__description_layer">
						<p class="img__description">Store</p>
					</div>
					</a>
				</div>

			</div>
			<div class="col-md-6 ser-1" data-aos="fade-right">
				<div class="img__wrap">
					<a href="songs.php">
						
					<img style="width: 500px; margin-top: 20px;" class="img__img" src="images/g3.jpg" />
					<div class="img__description_layer">
						<p class="img__description">Songs</p>
					</div>
					</a>
				</div>

			</div>
			<div class="col-md-6 ser-1" data-aos="fade-right">
				<div class="img__wrap">
					<a href="#">
						
					<img style="width: 500px; margin-top: 20px;" class="img__img" src="images/g3.jpg" />
					<div class="img__description_layer">
						<p class="img__description">This image looks super neat.</p>
					</div>
					</a>
				</div>

			</div>
			

			
			
			
			<div class="clearfix"></div>

		</div>
</div>
<!-- //services -->
	
	<section class="portfolio-agileinfo" id="gallery">
		<div class="container">
			<h3 class="heading-agileinfo" data-aos="zoom-in">Gallery<span>Our Newest Photos</span></h3>
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
<!-- /Portfolio section -->
	<!-- PARALAX Clients -->

	<!-- <div class="clients-main jarallax" id="client">
		<div class="container">
			
			<h3 class="heading-agileinfo" data-aos="zoom-in">TESTIMONIALS<span class="thr">Events Is A Professionally Managed Event </span></h3>
			<div class="col-md-offset-1 col-md-10">
				<div class="owl-carousel owl-theme">
					
					<?php 

					for ($i=0; $i < 10 ; $i++) { 
						
					 ?>
					<div style="background-color: green;padding: 20px 20px 20px 20px" class="item">
						<h4>3</h4>
					</div>
					<?php } ?>
					
				</div>
				<div class="owl-controls">
					<div class="owl-nav">
						
					</div>
					<div class="owl-dots">
						<div class="owl-dot active"><span></span></div>
						<div class="owl-dot"><span></span></div>
						<div class="owl-dot"><span></span></div>
					</div>
				</div>
			</div>
		
		</div>
	</div> -->
	<!--// Clients -->
	<!-- <div class="pricing" id="pricing">
		<div class="container">
			<h3 class="heading-agileinfo" data-aos="zoom-in">Pricing<span>Events Is A Professionally Managed Event</span></h3>
			<div class="w3ls_banner_bottom_grids">
				<div class="col-md-4 agileits_services_grid" data-aos="fade-right">
					<div class="w3_agile_services_grid1">
						<img src="images/g4.jpg" alt=" " class="img-responsive">
						<div class="w3_blur"></div>
					</div>
					<div class="pr-ta">
						<h3>Table deposit</h3>
						<p>Save the spot and be the first to party.</p>
						<span class="moto-color1_3"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp; December 28, 2017</span>
						<div class="tabl-erat">
							<div class="col-md-5 ratt">
								<h6>$99.55</h6>
							</div>
							<div class="col-md-7 tag">
								<a href="#book" class="scroll">Book Now</a>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="col-md-4 agileits_services_grid" data-aos="fade-up">
					<div class="w3_agile_services_grid1">
						<img src="images/g5.jpg" alt=" " class="img-responsive">
						<div class="w3_blur"></div>
					</div>
					<div class="pr-ta">
						<h3>Table deposit</h3>
						<p>Save the spot and be the first to party.</p>
						<span class="moto-color1_3"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp; December 28, 2017</span>
						<div class="tabl-erat">
							<div class="col-md-5 ratt">
								<h6>$99.55</h6>
							</div>
							<div class="col-md-7 tag">
								<a href="#book" class="scroll">Book Now</a>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="col-md-4 agileits_services_grid" data-aos="fade-left">
					<div class="w3_agile_services_grid1">
						<img src="images/g6.jpg" alt=" " class="img-responsive">
						<div class="w3_blur"></div>
					</div>
					<div class="pr-ta">
						<h3>Table deposit</h3>
						<p>Save the spot and be the first to party.</p>
						<span class="moto-color1_3"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp; December 28, 2017</span>
						<div class="tabl-erat">
							<div class="col-md-5 ratt">
								<h6>$99.55</h6>
							</div>
							<div class="col-md-7 tag">
								<a href="#book" class="scroll">Book Now</a>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div> -->
<!-- register -->
	<!-- <div class="register-sec-w3l jarallax" id="book">
		<div class="container">
		<h3 class="heading-agileinfo" data-aos="zoom-in">Book An Event<span class="thr">Events Is A Professionally Managed Event</span></h3>
			<div class="book-appointment" data-aos="zoom-in">
				<form action="#" method="post">
					<div class="gaps">
						<p></p>
						<input type="text" name="Name" placeholder="Name" required="" />
					</div>
					<div class="gaps">
						<p></p>
						<input type="email" name="email" placeholder="Email" required="" />
					</div>
					<div class="gaps">
						<p></p>
						<input type="text" name="Phone Number" placeholder="Phone Number" required="" />
					</div>
					<div class="gaps">
						<textarea name="Message" placeholder="Message..." required=""></textarea>
					</div>
					<input type="submit" value="Book Now">
				</form>
			</div>
			
		</div>
	</div> -->
	<!-- //register -->
<!-- Team section -->
<section class="team" id="team">
	<div class="container">
			<h3 class="heading-agileinfo" data-aos="zoom-in">OUR DJ TEAM<span>Events Is A Professionally Managed Event</span></h3>
		<div class="team-grid-top">
			<div class="col-md-3 team1" data-aos="fade-right">
				<div class="inner-team1">
				<img src="images/t1.jpg" alt="" />
				<h3>Steve</h3>
				<h4>Lorem</h4>
				<p>Lorem ipsum dolor sit amet, Phasselleous carnivel dolor</p>
					<div class="team-social">
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
						<a href="#"><i class="fa fa-pinterest-p"></i></a>
					</div>
				</div>
			</div>
			<div class="col-md-3 team1" data-aos="fade-down">
				<div class="inner-team1">
				<img src="images/t3.jpg" alt="" />
				<h3>Smith</h3>
				<h4>Lorem</h4>
				<p>Lorem ipsum dolor sit amet, Phasselleous carnivel dolor</p>
					<div class="team-social">
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
						<a href="#"><i class="fa fa-pinterest-p"></i></a>
					</div>
				</div>
			</div>
			<div class="col-md-3 team1" data-aos="fade-up">
				<div class="inner-team1">
				<img src="images/t2.jpg" alt="" />
				<h3>Warner</h3>
				<h4>Lorem</h4>
				<p>Lorem ipsum dolor sit amet, Phasselleous carnivel dolor</p>
					<div class="team-social">
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
						<a href="#"><i class="fa fa-pinterest-p"></i></a>
					</div>
				</div>
			</div>
			<div class="col-md-3 team1" data-aos="fade-left">
				<div class="inner-team1">
				<img src="images/t4.jpg" alt="" />
				<h3>Watson</h3>
				<h4>Lorem</h4>
				<p>Lorem ipsum dolor sit amet, Phasselleous carnivel dolor</p>
					<div class="team-social">
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
						<a href="#"><i class="fa fa-pinterest-p"></i></a>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
		
	</div>
</section>
<!-- //Team section -->
<!-- Stats -->
	
	<!-- //Stats -->

	 <!-- event schedule -->
                <div class="event-time " id="event">
                    <div class="container">
						<h3 class="heading-agileinfo" data-aos="zoom-in">Newest Agenda</h3>
                        <div class="testi-info">
                            <!-- Nav tabs -->
                            
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="testi">
                                    <div class="eventmain-info">
                                        
                                        <div class="event-subinfo">
                                        <?php 

                                        foreach ($age as $key => $value) {
                                        	

                                         ?>
                                            <div class="col-md-6 w3-latest-grid">
                                                <div class="col-md-6 col-xs-6 event-right  eventtxt-right" data-aos="fade-down">
                                                   <img width="200px" src="admin/upload/agenda/<?php echo $value['gambar'] ?>" class="img-responsive" alt="">
                                                </div>
                                                <div class="col-md-6 col-xs-6 event-left" data-aos="fade-left">
                                                    <h5><?php echo $value['tanggal'] ?></h5>

                                                    <h6>
                                                        <span class="icon-event" aria-hidden="true">Theme:</span> <?php echo $value['nama_acara'] ?></h6>
                                                   <p><?php echo substr($value['keterangan'], 0,50)  ?>
                                                       </p>
                                                    <a href="#" data-toggle="modal" data-target="#myModal">view details</a>
                                                </div>
                                                <div class="clearfix"> </div>
                                            </div>

                                            <?php } ?>

                                            
                                            <div class="clearfix"> </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
 <?php include 'footer.php'; ?>    
 