<?php 
include 'class.php';


$dataong = $apiongkir->tampil_ongkir(501,$_POST['id_kota'],$_POST['total_berat'],$_POST['ekspedisi']);

echo "<pre>";
print_r($_POST);
echo "</pre>";

 ?>





<option value="">Pilih kota</option>
 <?php foreach ($dataong as $key => $value): ?>
 	<option value=""
 	nama="<?php echo $value['service'] ?>"
 	biaya="<?php echo $value['cost']['0']['value'] ?>"
 	lama = "<?php echo $value['cost']['0']['etd'] ?>"
 	>
 		<?php echo $value['service']; ?>
 		Rp. <?php echo number_format($value['cost']['0']['value']) ?> 
 		<?php echo $value['cost']['0']['etd']; ?>
 	</option>
 <?php endforeach ?>