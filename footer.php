<div class="footer">
	<div class="container">
		<div class="f-bg-w3l">
		<div class="col-md-4 w3layouts_footer_grid" data-aos="fade-right">
					<h2>Contact Information</h2>
					    <ul class="con_inner_text">
							<li><span class="fa fa-map-marker" aria-hidden="true"></span><?php echo $pro['alamat'] ?></li>
							<li><span class="fa fa-envelope-o" aria-hidden="true"></span> <a href="mailto:<?php echo $pro['email'] ?>"><?php echo $pro['email'] ?></a></li>
							<li><span class="fa fa-phone" aria-hidden="true"></span><?php echo $pro['handphone'] ?></li>
						</ul>

					<ul class="social_agileinfo">
						<li><a href="<?php echo $pro['ins'] ?>" class="w3_instagram"><i class="fa fa-instagram"></i></a></li>
						<li><a href="<?php echo $pro['facebook'] ?>" class="w3_google"><i class="fa fa-youtube"></i></a></li>
					</ul>
				</div>
				<div class="col-md-4 w3layouts_footer_grid" data-aos="fade-down">
					<h2>Subscribe Newsletter</h2>
					<p>By subscribing to our mailing list you will always get latest news from us.</p>
					<form action="#" method="post">
						<input type="email" name="Email" placeholder="Enter your email..." required="">
						<button class="btn1"><i class="fa fa-envelope-o" aria-hidden="true"></i></button>
						<div class="clearfix"> </div>
					</form>
				</div>
				<div class="col-md-4 w3layouts_footer_grid" data-aos="fade-left">
					<h3>Recent Events</h3>
					  <ul class="con_inner_text midimg">

					  		<?php 

						foreach ($gallery as $key => $value) {
							

						 ?>

						<li><a href="admin/upload/gallery/<?php echo $value['gambar'] ?>"><img src="admin/upload/gallery/<?php echo $value['gambar'] ?>" alt="" class="img-responsive" /></a></li>
						<?php } ?>

				     </ul>
					
				</div>
				<div class="clearfix"> </div>
			</div>
			</div>
			<p class="copyright" data-aos="zoom-in">© 2017 New Party. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
	</div>
	<!-- //footer -->

<!-- js for portfolio lightbox -->
<script src="js/jQuery.lightninBox.js"></script>
<script type="text/javascript">
	$(".lightninBox").lightninBox();
</script>
<!-- /js for portfolio lightbox -->
<!-- flexSlider -->
				<script defer src="js/jquery.flexslider.js"></script>
				<script type="text/javascript">
					$(window).load(function(){
					  $('.flexslider').flexslider({
						animation: "slide",
						start: function(slider){
						  $('body').removeClass('loading');
						}
					  });
					});
				</script>
<!-- //flexSlider -->

<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>

	<script src="js/jarallax.js"></script>
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript">
		/* init Jarallax */
		$('.jarallax').jarallax({
			speed: 0.5,
			imgWidth: 1366,
			imgHeight: 768
		})
	</script><!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {

			$(window).scroll(function(){
				var scroll = $(window).scrollTop();
				if (scroll > 300) {
					$("#bs-example-navbar-collapse-1").css("background" , "#fd81c5");
				}

				else{
					$("#bs-example-navbar-collapse-1").css("background" , "");  	
				}
			})



			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	<!-- //here ends scrolling icon -->
<!-- scrolling script -->
<script type="text/javascript">

	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> 
<!-- //scrolling script -->
<!-- animation effects-js files-->
	<script src="js/aos.js"></script><!-- //animation effects-js-->
	<script src="js/aos1.js"></script><!-- //animation effects-js-->
<!-- animation effects-js files-->

</body>	
</html>