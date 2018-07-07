
<?php include 'class.php'; ?>

<?php 

$id = $_GET['id'];

$get = $tiket->printtiket();

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
    background-image: url(https://htmlpdfapi.com/uploads/images/568b96887261690f6dbe0000/content_background-concert-3.jpg?1451988615);
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
    margin-bottom: 40px;
    font-weight: 700;
    font-size: 1.6em;
    line-height: 40px;
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
  <div class="container">
    <div class="left">
        <div class="event"><p style="color: white;font-size: 20px;">Live in concert</p></div>
        <div class="title">Joe Doe</div>
        <div class="info">Saturday // August 25 2020 // The Plaza // New York</div>
      </div>
      
  </div>
</body>
</html>
