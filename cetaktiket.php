<?php ob_start(); ?>
<?php include 'class.php'; ?>

<?php 

$id = $_GET['id'];

$get = $tiket->printtiket($id);


 ?>

<html>
<head>
  <title>Cetak PDF</title>
  <style>
  body {
    margin: 0;
    color: #ffffff;
    font-family: "Open Sans", sans-serif;
    font-weight: 400;
    font-size: 25px;
  }

  .container {
    width: 795px;
    margin: 0 auto;
  }

  .container {
    position: relative;
    height: 280px;
    width: 100%;

    background-repeat: no-repeat;
    overflow: hidden;
  }
  .container .left {
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    float: left;
    width: 635px;
    padding: 35px 0 0 60px;
  }
  .container .right {
    float: right;
    width: 160px;
    padding-top: 30px;
  }
  .container .event {
    margin-bottom: 10px;
    font-weight: 700;
    font-size: 1.6em;
    line-height: 10px;
    text-transform: uppercase;
    font-color:white;
  }
  .container .title {
    margin-bottom: 35px;
    color: #F5A623;
    font-size: 4em;
    line-height: 72px;
  }


  .container .info {
    font-size: 0.8em;
    text-transform: uppercase;
  }
  .container .seats {
    margin-bottom: 35px;
    font-size: 0.36em;
    text-transform: uppercase;
    text-align: right;
  }
  .container .seats:last-child {
    margin-bottom: 0;
  }
  .container .seats span {
    display: inline-block;
    width: 80px;
    margin-left: 15px;
    padding: 10px 0;
    color: #F5A623;
    background: rgba(255, 255, 255, 0.5);
    font-size: 2.777em;
    text-align: center;
    vertical-align: middle;
  }
</style>
</head>
<body>
  <div style="background-image: (http://lol/images/tiketback.jpg)" class="container">
    <div class="left">
        <div class="event"><p style="color: white;font-size: 20px;">Live in concert</p></div>
        <div class="event"><p style="color: white;font-size: 20px;"><?php echo $get['id_tiket'] ?>t</p></div>
        <div class="title"><p style="color: #d35400;font-size: 19px;"><?php echo $get['nama_beli'] ?></p></div>
        <div class="info"><p style="color: white"><?php echo $get['tanggal_beli'] ?> // <?php echo $get['tempat_beli'] ?></p></div>
      </div>
      

  </div>
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
        
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Data Siswa.pdf', 'D');
?>

