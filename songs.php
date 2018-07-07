<?php include 'header.php';

$semua=$album->tampilalbum();


 ?>



<section class="team" id="team">
	<div class="container">
		<h3 class="heading-agileinfo" data-aos="zoom-in">Play Songs<span>Play The Music!</span></h3>
		<div class="team-grid-top">
			<div class="row">
				<div class="col-md-4">
					<img class="responsive" src="images/mid1.jpg">
				</div>
				<div class="col-md-8">
					<div class="panel panel-default">
						<!-- Default panel contents -->

						<?php 
						foreach ($semua as $key => $value) {
							
						 ?>
						<div class="panel-heading"><?php echo $value['judul_album'] ?> </div>
						<ul class="list-group">
							
							<?php 

						 $songs = mysqli_query($mysqli, "SELECT * from lagu WHERE id_album = '".$value['id_album']."' ");

							foreach ($songs as $row){
							


							 ?>
							<li class="list-group-item"><?php echo $row['judul_lagu'] ?><span style="float: right;"><audio controls controlsList="nodownload"><source src="admin/upload/lagu/<?php echo $row['file'] ?>" type="audio/mpeg"></audio></span> 
							</li>
							<?php } ?>
						</ul>

						<?php } ?>
					</div>
				</div>
			</div>	
		</div>
	</div>
</section>

<?php include 'footer.php'; ?>