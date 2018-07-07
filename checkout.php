<?php include 'header.php'; ?>
	<style type="text/css">
	table, th, td {
   border: 1px solid #473b6b !important;
}
</style>

<?php if ($_SESSION['user']=='' OR $_SESSION['user']==NULL): ?>

<?php 

echo "<script>alert('Anda Harus Login Untuk Melakukan Checkout');</script>";
  
echo "<script>window.location='register.php';</script>";

 ?>

 <?php else: ?>

	<section class="portfolio-agileinfo" id="gallery">
		<div class="container">
			<h3 class="heading-agileinfo" data-aos="zoom-in">Checkout<span></span></h3>
			<table id="tableins" class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Produk</th>
						<th>Berat</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Subberat</th>
						<th>Subharga</th>
					</tr>
				</thead>
				<tbody>

					<?php $totalbelanja=0; ?>
					<?php 

					$keranjang = $_SESSION['keranjang'];
					$no = 1;
					foreach ($keranjang as $key => $value) {
						$semua = mysqli_query($mysqli, "SELECT * from barang WHERE id_barang = '".$value['id']."' ");


						$row = mysqli_fetch_assoc($semua);
						$totalbelanja+=$row['harga']; 

						?>

					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $row['nama_barang'] ?></td>
						<td><?php echo $row['berat_barang'] ?></td>
						<td><?php echo $row['harga'] ?></td>
						<td><?php echo $value['jumlah'] ?></td>
						<td><?php echo $row['berat_barang']*$value['jumlah'] ?></td>
						<td><?php echo $row['harga']*$value['jumlah'] ?></td>
					</tr>
						<?php 
						$no++;
					}
					?>

				</tbody>
				<tfoot>
					<tr>
						<th colspan="6">Total Belanja</th>
						<th id="totbayar">-</th>
					</tr>
					<tr>
						<th colspan="6">Total Ongkir</th>
						<th id="total_ongkir"></th>
					</tr>
					<tr>
						<th colspan="6">Total Bayar</th>
						<th id="total_bayar"></th>
					</tr>
				</tfoot>
			</table>


			<h3>Form Check Out</h3>
			<form method="POST">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>Provinsi</label>
							<select class="form-control" name="provinsi"></select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Kota</label>
							<select class="form-control" name="kota"></select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Ekspedisi</label>
							<select class="form-control" name="ekspedisi"></select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Ongkir</label>
							<select class="form-control" name="ongkir"></select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Nama Penerima</label>
							<input type="text" class="form-control" value="<?php echo $_SESSION['user']['nama'] ?>" name="nama_penerima">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Telepon Penerima</label>
							<input type="text" class="form-control" value="<?php echo $_SESSION['user']['no_telpon'] ?>" name="telepon_penerima">
						</div>
					</div>

				</div>
				<div class="form-group">
					<label>Alamat Penerima</label>
					<textarea class="form-control" name="alamat_penerima"><?php echo $_SESSION['user']['alamat'] ?></textarea>
				</div>
				<input type="hidden" name="total_belanja" value="">
				<input type="hidden" name="total_berat" value="">
				<input type="hidden" name="nama_provinsi" placeholder="nama_provinsi">
				<input type="hidden" name="nama_kota" placeholder="nama_kota">
				<input type="hidden" name="tipe" placeholder="tipe">
				<input type="hidden" name="kodepos" placeholder="kodepos">
				<input type="hidden" name="nama_ekspedisi" placeholder="nama_ekspedisi">
				<input type="hidden" name="nama_paket" placeholder="nama_paket">
				<input type="hidden" name="biaya_paket" placeholder="biaya_paket">
				<input type="hidden" name="lama_paket" placeholder="lama_paket">
				<input type="hidden" name="total_bayar" placeholder="total_bayar">
				

				<button name="cek" class="btn btn-primary">Check out</button>
			</form>
		</div>
</section>




<?php

$idlast = @$_SESSION['idlast']['id']; 


//jika tombol login ditekan, maka objek pengguna menjalankan fungsi login_pengguna()
if (isset($_POST['cek']))
{
	$teslogin=$produk->simpancheckout($_POST['nama_penerima'],$_POST['telepon_penerima'],$_POST['alamat_penerima'],$_POST['total_belanja'],$_POST['total_berat'],$_POST['nama_provinsi'],$_POST['nama_kota'],$_POST['tipe'],$_POST['kodepos'],$_POST['nama_ekspedisi'],$_POST['nama_paket'],$_POST['biaya_paket'],$_POST['lama_paket'],$_POST['total_bayar']);

	if ($teslogin=="sukses") 
	{
		echo "<script>alert('sukses,data berhasil disimpan');</script>";
		echo "<script>location='nota.php?id=".$_SESSION['idlast']['id']." ';</script>";
	}
	else
	{

		echo "<script>alert('inputan masih ada yang kosong');</script>";
		echo "<script>location='index.php?halaman=tambahalbum;</script>";
	}

}

?>


	
	<?php include 'footer.php'; ?>

	<script>
				$(document).ready(function(){

			var table = $('#tableins').find('tr');
			var total=0;

			$.each(table,function(i,v){
				var jumlah = $(this).find('td:eq(6)').text();
				var jumlah = jumlah.replace(/,|\.00/g,'');
				var jum = (jumlah == "")? 0:jumlah;
				total +=+ parseInt(jum);


				$('#totbayar').html('Rp '+total);
				$('input[name=total_belanja]').val(total);

				//console.log(total);
			});

		});

		$(document).ready(function(){

			var table = $('#tableins').find('tr');
			var total=0;

			$.each(table,function(i,v){
				var jumlah = $(this).find('td:eq(5)').text();
				var jumlah = jumlah.replace(/,|\.00/g,'');
				var jum = (jumlah == "")? 0:jumlah;
				total +=+ parseInt(jum);


				//$('#totbayar').html(total);
				$('input[name=total_berat]').val(total);

				console.log(total);
			});

		});


		$(document).ready(function(){
			$.ajax({
				url:'dataprov.php',
				success:function(hasil)
				{
					$("select[name=provinsi]").html(hasil);
				}
			})
		});

		$(document).ready(function(){
			$("select[name=provinsi]").on("change",function(){
				//dapat IDprovinsi
				var id_prov = $(this).val();

				var nama_provinsi = $("option:selected").attr("nama");
				$("input[name=nama_provinsi]").val(nama_provinsi);
				$.ajax({
					url:'datakota.php',
					type:'POST',
					data:'idprov='+id_prov,
					success:function(hasil)
					{
						$("select[name=kota]").html(hasil);
					}
				})
				$("select[name=ekspedisi]").val(null);
				$("select[name=ongkir]").val(null);
				$('input[name=nama_kota]').val(null);
				$('input[name=tipe]').val(null);
				$('input[name=kodepos]').val(null);
				$('input[name=nama_ekspedisi]').val(null);
				$('input[name=nama_paket]').val(null);
				$('input[name=biaya_paket]').val(null);
				$('input[name=lama_paket]').val(null);
			})
		});

		$(document).ready(function(){
			$("select[name=kota]").on("change",function(){
				var nama_kota = $("option:selected",this).attr("nama");
				var tipe  = $("option:selected",this).attr("tipe");
				var kodepos  = $("option:selected",this).attr("kodepos");

				$("input[name=nama_kota]").val(nama_kota);
				$("input[name=tipe]").val(tipe);
				$("input[name=kodepos]").val(kodepos);
			})

			$.ajax({
				url:'dataekspedisi.php',
				success:function(hasil)
				{
					$("select[name=ekspedisi]").html(hasil);
				}
			})

			$("select[name=ekspedisi]").on("change",function(){
				var ekspedisi = $("option:selected",this).attr('nama');
				$("input[name='nama_ekspedisi']").val(ekspedisi);
			})

		});


		$(document).ready(function(){
			$("select[name=ekspedisi]").on("change",function(){
				var id_kota = $("select[name=kota]").val();
				var ekspedisi = $("select[name=ekspedisi]").val();
				var total_berat = $("input[name=total_berat]").val();
				$.ajax({
					url:'dataongkir.php',
					type: 'POST',
					data:'id_kota='+id_kota+'&ekspedisi='+ekspedisi+'&total_berat='+total_berat,
					success:function(hasil)
					{
						$("select[name=ongkir]").html(hasil);
						// /alert(hasil);
					}
				})
			})
			$('select[name=ongkir]').on("change",function(){
				var nama = $('option:selected',this).attr("nama");
				var biaya = $('option:selected',this).attr('biaya');
				var lama = $('option:selected',this).attr('lama');

				$('input[name=nama_paket]').val(nama);
				$('input[name=biaya_paket]').val(biaya);
				$('input[name=lama_paket]').val(lama);

				$('#total_ongkir').html('Rp. '+biaya);

				var total_belanja =  $('input[name=total_belanja]').val();
				var biaya_paket =  $('input[name=biaya_paket]').val();

				var total_bayar  = parseInt(total_belanja) + parseInt(biaya_paket) ;

				$('#total_bayar').html('Rp.'+total_bayar);

				$('input[name=total_bayar]').val(total_bayar);
			})

		});


	</script>
	<?php endif ?>
