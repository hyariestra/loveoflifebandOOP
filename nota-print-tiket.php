<?php 



include 'class.php';


$det = $profil->ambil_profil();

$id = $_GET['id'];

$info = $tiket->ambil_pembelian_tiket($id);

 ?>

<head>
<title>Love Of Life</title>

<!-- bootstrap-css -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--// bootstrap-css -->
<!-- css -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link href="css/jQuery.lightninBox.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
<!-- animation -->
<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/bootstrap.js"></script>
</head>
  <body onload="window.print();">
    <div class="wrapper">
      <!-- Main content -->
      <section class="portfolio-agileinfo" id="gallery">
    <div class="container">
      <h3 class="heading-agileinfo" data-aos="zoom-in">Invoice<span></span></h3>

      <div style="background-color: white;padding-left: 10px;padding-right: 10px;padding-bottom: 15px;" class="content-wrapper">
      <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> Life Of Live Manajemen.
                <?php $tgl =  $info['tanggal_pembelian'];

      
                 ?>
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
                <strong><?php echo $info['nama_penerima'] ?></strong><br>
                Phone: <?php echo $info['telp_penerima'] ?><br>
                Email: <?php echo $info['email_penerima'] ?>
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Kode Invoice #<?php echo $info['kode_pembelian'] ?></b><br>
              
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
                  
                  $jumlahharga =  $info['jumlah_pembelian']*$info['total_pembelian'];
                   ?>
                  <tr>

                    <td><?php echo $no; ?></td>
                    <td><?php echo $info['nama_event_tiket'] ?></td>
                    <td><?php echo $info['jumlah_pembelian'] ?></td>
                    <td>Rp. <?php echo number_format($info['total_pembelian'])  ?>,00</td>
                    <td>Rp .<?php echo number_format($jumlahharga) ?>,00</td>
                  </tr>
                
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
                    <th>Total Bayar</th>
                    <td>Rp. <?php echo number_format($jumlahharga);  ?>,00</td>
                  </tr>
                  
                </table>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
          
        </section><!-- /.content -->
        <div class="clearfix"></div>
      </div>



    </div>
  </section><!-- /.content -->
    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
   
  </body>
</html>
