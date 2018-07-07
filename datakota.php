<?php 
include 'class.php';


$datakot = $apiongkir->tampil_kota($_POST['idprov']);

 ?>



 <option value="">Pilih kota</option>
 <?php foreach ($datakot as $key => $value): ?>
 	<option value="<?php echo $value['city_id'] ?>" nama="<?php echo $value['city_name'] ?>" kodepos="<?php echo $value['postal_code'] ?>" tipe="<?php echo $value['type'] ?>" >
 		<?php echo $value['type']; ?>
 		<?php echo $value['city_name']; ?>
 	</option>
 <?php endforeach ?>