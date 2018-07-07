<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<?php 

	include 'class.php';
	$gallery = $gallery->tampilgallery();
	$pro = $profil->ambil_profil();
	$age = $agenda->tampilagendadepan();

	?>

	<title><?php echo $pro['title'] ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="<?php echo $pro['meta'] ?>" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- bootstrap-css -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!--// bootstrap-css -->
	<!-- css -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link href="css/jQuery.lightninBox.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
	<!-- animation -->
	<link href="css/aos.css" rel="stylesheet" type="text/css" media="all" /><!-- //animation effects-css-->
	<!-- //animation -->
	<!--// css -->
	<!-- font-awesome icons -->
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- //font-awesome icons -->
	<!-- font -->
	<link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Oswald:400,500,600,700" rel="stylesheet">
	<!-- //font -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<script src="js/bootstrap.js"></script>

	


</head>
<body style="background: #aea3a259;">




	<?php 


	$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	$uri_segments = explode('/', $uri_path);


	if ($uri_segments[2]=='index.php' OR $uri_segments[2]=='')
	{
		$isi = '<h3>Life Of Love</h3>';


	}else
	{
		$isi = '';	
		$wid = 'height: 400px;width: auto;';
	}

	?>

	<!-- w3-banner -->
	<div class="w3-banner jarallax">
		<div class="wthree-different-dot">
			<div class="head">
				<div class="container">
					<div class=" navbar-fixed-top">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<div class="navbar-brand logo ">
								<h1><a href="index.html">Love Of Live</a></h1>
							</div>

						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav link-effect-4">
								<li class="active first-list"><a href="index.php">Home</a></li>
								<li><a href="store.php" ">Store</a></li>
								<li><a href="songs.php" ">Songs</a></li>
								<li><a href="#services" ">Agenda</a></li>
								<li><a href="gallery.php">Photos</a></li>
								<li><a href="kontak.php" ">Contact</a></li>
								<li><a href="tiket.php">Tiket</a></li>
								<!--<li><a href="#contact" ">Contact</a></li> -->

								<?php if (@$_SESSION['user']==''): ?>
									<li><a href="register.php" ><span class="glyphicon glyphicon-user"></span></a></li>
									<li><a href="keranjang.php" ><span class="glyphicon glyphicon-shopping-cart"></span></a></li>

								<?php else: ?>
									<li>
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span><span class="caret"></span></a>
										<ul class="dropdown-menu"> 
											<li><a title="dashboard user" href="profil.php?id=<?php echo $_SESSION['user']['id_user'] ?>">Hai,<?php echo $_SESSION['user']['nama'] ?></a></li>
											<li><a href="logout.php">Logout</a></li>
										</ul>
									</li>

									<?php if (@$_SESSION['keranjang']=='' OR @$_SESSION['keranjang']==NULL): ?>
										<li>
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-shopping-cart"></span><span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="keranjang.php" >Keranjang Kosong</a></li>
											</ul>
										</li>
									<?php else: ?>
										<li>
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-shopping-cart"></span><span class="caret"></span></a>
											<ul class="dropdown-menu">

												<?php 

												$keranjang = $_SESSION['keranjang'];


												foreach ($keranjang as $key => $value) {

													$semua = mysqli_query($mysqli, "SELECT * from barang WHERE id_barang = '".$value['id']."' ");


													$row = mysqli_fetch_assoc($semua);

													?>
													<li><a href="detail.php?id=<?php echo $row['id_barang'] ?>"><?php echo $row['nama_barang'] ?></a></li>

													<?php 
												}
												?>
												<li><a href="keranjang.php" >Check Out</a></li>
											</ul>
										</li>
									<?php endif ?>




								<?php endif ?>

								<!-- <li>
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span data-letters="Pages">More</span><span class="caret"></span></a>
									<ul class="dropdown-menu"> 
										<li><a href="#client" class="scroll">Testimonials</a></li>
										<li><a href="#pricing" class="scroll">Pricing</a></li>
										<li><a href="#team" class="scroll">Team</a></li>
										<li><a href="#event" class="scroll">Events</a></li>
									</ul>
								</li> -->   
								
								
							</ul>
						</div><!-- /.navbar-collapse -->
					</div>
				</div>
			</div>
			<!-- banner -->
			<div class="banner">
				<div class="container">
					<div class="slider">
						
						<script src="js/responsiveslides.min.js"></script>
						<script>
								// You can also use "$(window).load(function() {"
								$(function () {
								// Slideshow 4
								$("#slider3").responsiveSlides({
									auto: true,
									pager: true,
									nav: true,
									speed: 500,
									namespace: "callbacks",
									before: function () {
										$('.events').append("<li>before event fired.</li>");
									},
									after: function () {
										$('.events').append("<li>after event fired.</li>");
									}
								});				
							});
						</script>
						<div style="<?php echo $wid ?>"  id="top" class="callbacks_container-wrap">
							<ul class="rslides" id="slider3">
								<li>
									<div class="slider-info" data-aos="fade-left">
										<?php echo $isi; ?>
									</div>
								</li>

							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- //banner -->
		</div>
	</div>