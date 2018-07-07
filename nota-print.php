<?php 



include 'class.php';


$det = $profil->ambil_profil();

$id = $_GET['id'];

$info = $pembelian->ambil_pembelian($id);


 ?>

<head>
<title>Love Of Life</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="New Party Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
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
  <body onload="window.print();">
    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-globe"></i> Life Of Live Manajemen.
                <?php $tgl =  $info['0']['tanggal_pembelian'] ?>
                <small class="pull-right"><?php echo date('d-m-Y', strtotime($tgl));  ?></small>
              </h2>
          </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              Dari
              <address>
                <strong><?php echo $det['nama_usaha'] ?></strong><br>
                <?php echo $det['alamat'] ?><br>
                Klaten<br>
                55060<br>
                Phone: <?php echo $det['telp'] ?><br>
                Email: <?php echo $det['email'] ?>
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              Kepada
              <address>
                <strong><?php echo $info['0']['nama_penerima'] ?></strong><br>
                <?php echo $info['0']['tipe']." ".$info['0']['nama_kota'] ?><br>
                <?php echo $info['0']['nama_provinsi']; ?><br>
                <?php echo $info['0']['kode_pos']; ?><br>
                Phone: <?php echo $info['0']['telp_penerima'] ?><br>
                Email: <?php echo $info['0']['email'] ?>
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Kode Invoice #<?php echo $info['0']['kode_pembelian'] ?></b><br>
              <br>
              <b>Payment Due:</b> 2/22/2014<br>
              
            </div><!-- /.col -->
          </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                   foreach ($info as $key => $value) {
                  $jumlahharga =  $value['jumlah_beli']*$value['harga_beli'];
                   ?>
                  <tr>

                    <td><?php echo $no; ?></td>
                    <td><?php echo $value['nama_beli'] ?></td>
                    <td><?php echo $value['jumlah_beli'] ?></td>
                    <td>Rp. <?php echo number_format($value['harga_beli'])  ?>,00</td>
                    <td><?php echo number_format($jumlahharga) ?>,00</td>
                  </tr>
                  <?php 
                  $no++;
                } ?>
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
              <p class="lead">Payment Methods:</p>
              <img style="width: 100px;" src="images/mandirilogo.png" alt="Visa">
              
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                <b><?php echo $det['rekening'] ?></b>
              </p>
            </div><!-- /.col -->
            <div class="col-xs-6">
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Total Belanja:</th>
                    <td><?php echo number_format($value['total_pembelian']) ; ?>,00</td>
                  </tr>
                  <tr>
                    <th>Total Ongkos Kirim</th>
                    <td><?php echo number_format($value['biaya_pengiriman']) ; ?>,00</td>
                  </tr>
                  <tr>
                    <th>Total Bayar</th>
                    <td><?php echo number_format($value['total_bayar']);  ?>,00</td>
                  </tr>
                  
                </table>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
  </body>
</html>
