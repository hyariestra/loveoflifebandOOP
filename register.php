<?php include 'header.php'; ?>

<section class="team" id="team">
    <?php if (@$_SESSION['user']<>''): ?>

      <div class="container"> 
        <div style="background-color: white;border: 1px solid; padding: 30px 30px 30px 30px;">
          
      Anda Tidak Dapat Mengakses Halaman Ini Karena Database Kami telah mencatatan Anda Telah Login Dengan Email <?php echo $_SESSION['user']['email'] ?>
        </div>
      </div>

    <?php else: ?>


  <div class="container">

    <h3 class="heading-agileinfo" data-aos="zoom-in">Sign In/Up<span></span></h3>

    <ul class="nav nav-pills">
      <li style="background-color: #120b28"><a data-toggle="pill" href="#home">Sign In</a></li>
      <li style="background-color: #120b28"><a data-toggle="pill" href="#menu1">Sign Up</a></li>
    </ul>
    <br>
    <br>



    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h3 style="margin-bottom: 20px;">Sign In</h3>
        <div class="col-md-6">
         <form method="post" action="">
           <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" placeholder="Email" name="email_pelanggan">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Password" name="password_pelanggan">
          </div>

          <button class="btn btn-primary" style="background: #f53275;border-radius: 0px; border: 1px solid;" name="login">Sign In</button>

        </form>
      </div>

    </div>

    
    <div id="menu1" class="tab-pane fade">
      <h3 style="margin-bottom: 20px;">Sign Up</h3>
      <div class="col-md-6"> 
      	<form method="post">
         <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" placeholder="email" name="s_email">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" placeholder="password" name="s_password">
        </div>
        <div class="form-group">
          <label>Nama</label>
          <input type="text" class="form-control" placeholder="Nama Lengkap" name="s_nama">
        </div>
        <div class="form-group">
          <label>Telepon</label>
          <input type="text" class="form-control" placeholder="No Telepon" name="s_telepon">
        </div>
        <div class="form-group">
         <label>Alamat</label>
         <textarea class="form-control" placeholder="Alamat" name="s_alamat"></textarea>
       </div>
       <div class="form-group">
        <label>Jenis Kelamin</label>
        <select class="form-control" name="s_jk">
         <option value="Pria">Pria</option>
         <option value="Wanita">Wanita</option>
       </select>
     </div>

     <button class="btn btn-primary" style="background: #f53275;border-radius: 0px; border: 1px solid;" name="daftar">Daftar</button>
     <br>  
     <br>    
   </form>
 </div>
</div>


</div>
</div>

  <?php endif ?>
</section>

 <?php 
//jika tombol login ditekan, maka objek pengguna menjalankan fungsi login_pengguna()
            if (isset($_POST['login']))
            {
             $teslogin=$user->login_user($_POST['email_pelanggan'],$_POST['password_pelanggan']);
 //jika username dan pass benar maka masuk ke index.php
             if ($teslogin=="true")
              {
              echo "<script>alert('login sukses');</script>";
              echo "<script>window.location='index.php';</script>";
            }
 //jika tidak, kemabli ke form login
            else
            {
              echo "<script>alert('login gagal');</script>";
              echo "<script>window.location='register.php';</script>";
            }

          }

          ?>
<?php 

if (isset($_POST["daftar"])) 
{
	
	$hasil= $user->daftar_user($_POST["s_email"],$_POST["s_password"],$_POST["s_nama"],$_POST["s_telepon"],$_POST["s_alamat"],$_POST["s_jk"]);

	if ($hasil=="sukses") 
	{
		echo "<script>alert('Pendaftaran Sukses, SIlahkan Gunakan Email dan Password Untuk Login');</script>";
		echo "<script>location='register.php';</script>";
	}
	else
	{

		echo "<script>alert('inputan masih ada yang kosong');</script>";
		echo "<script>location='register.php';</script>";
	}
}

?>



<?php include 'footer.php'; ?>