<?php 
include 'class.php';


$datap = $apiongkir->tampil_provinsi();

 ?>

 <option value="">Pilih Provinsi</option>
 <?php foreach ($datap as $key => $value): ?>
 	<option value="<?php echo $value['province_id'] ?>" nama="<?php echo $value['province'] ?>" >
 		<?php echo $value['province']; ?>
 	</option>
 <?php endforeach ?>