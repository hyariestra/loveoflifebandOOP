<?php 

include '../class.php';


//jk blm login (kosong session) maka menampilkan hal login.php, utk login 

if (empty($_SESSION['admin']))
{
  echo "<script>alert('login dulu');</script>";
  echo "<script>window.location='login.php';</script>";
}


//jika ada aksi
//jika ada aksi sama dng logout, maka objek pengguna menjalankan fungsi logout_pengguna
if (isset($_GET['aksi'])) 
{
 if ($_GET['aksi']=='logout')
 {
  $pengguna->logout_pengguna();
  echo "<script>alert('anda telah logout');</script>";
  echo "<script>window.location='login.php';</script>";
}
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DASHBOARD ADMIN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
      <!-- iCheck -->
      <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
      <!-- Morris chart -->
      <link rel="stylesheet" href="plugins/morris/morris.css">
      <!-- jvectormap -->
      <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
      <!-- Date Picker -->
      <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
      <!-- bootstrap wysihtml5 - text editor -->
      <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

      <!--  datatable -->
      <script type="text/javascript" src="datatabs/media/js/jquery.js"></script>
      <script type="text/javascript" src="datatabs/media/js/jquery.dataTables.js"></script>
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="datatabs/media/css/jquery.dataTables.css">
      <link rel="stylesheet" type="text/css" href="datatabs/media/css/dataTables.bootstrap.css">


    </head>
    <body class="hold-transition skin-yellow sidebar-mini">
      <div class="wrapper">

        <header class="main-header">
          <!-- Logo -->
          <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
          </a>
          <!-- Header Navbar: style can be found in header.less -->
          <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
              <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="label label-success">4</span>
                  </a>

                </li>
                <!-- Notifications: style can be found in dropdown.less -->

                <!-- Tasks: style can be found in dropdown.less -->

                <!-- User Account: style can be found in dropdown.less -->

                <!-- Control Sidebar Toggle Button -->
                <li>
                  <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
              </ul>
            </div>
          </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
          <!-- sidebar: style can be found in sidebar.less -->
          <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
              <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
              </div>
              <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
            </div>
            <!-- search form -->
            
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
              <li class="active treeview">
                <a href="index.php">
                  <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>
              <li class="treeview">
                <a href="index.php?halaman=profil">
                  <i class="glyphicon glyphicon-home"></i> <span>Profil</span>

                </a>
              </li>
              <li class="treeview">
                <a href="index.php?halaman=pembelian">
                  <i class="glyphicon glyphicon-shopping-cart"></i> <span>Pembelian Produk</span>

                </a>
              </li>

              <li class="treeview">
                <a href="index.php?halaman=pembeliantiket">
                  <i class="glyphicon glyphicon-tag"></i> <span>Pembelian Tiket</span>

                </a>
              </li>

              <li class="treeview">
                <a href="index.php?halaman=gallery">
                  <i class="glyphicon glyphicon-picture"></i> <span>Gallery</span>

                </a>
              </li>
              <li class="treeview">
                <a href="index.php?halaman=agenda">
                  <i class="glyphicon glyphicon-film"></i> <span>Agenda</span>

                </a>
              </li>

              <li class="treeview">
                <a href="index.php?halaman=user">
                  <i class="glyphicon glyphicon-user"></i> <span>User</span>

                </a>
              </li>
              <li class="treeview">
                <a href="index.php?halaman=album">
                  <i class="glyphicon glyphicon-folder-close"></i> <span>Album Lagu</span>

                </a>
              </li>
              <li class="treeview">
                <a href="index.php?halaman=lagu">
                  <i class="glyphicon glyphicon-folder-open"></i> <span>Lagu</span>

                </a>
              </li>
              <li class="treeview">
                <a href="index.php?halaman=produk">
                  <i class="glyphicon glyphicon-file"></i> <span>Produk</span>

                </a>
              </li>
              <li class="treeview">
                <a href="index.php?halaman=tiket">
                  <i class="glyphicon glyphicon-file"></i> <span>Tiket</span>

                </a>
              </li>
              <!-- <li class="treeview">
                <a href="index.php?halaman=berita">
                  <i class="glyphicon glyphicon-pencil"></i> <span>Berita</span>

                </a>
              </li> -->
              <!-- <li class="treeview">
                <a href="index.php?halaman=transportasi">
                  <i class="fa fa-share"></i> <span>Transportasi</span>

                </a>
              </li> -->
              <li class="treeview">
                <a href="index.php?halaman=pesan">
                  <i class="glyphicon glyphicon-envelope"></i> <span>Pesan Masuk</span>

                </a>
              </li>
              
              <!-- <li class="treeview">
                <a href="index.php?halaman=paket">
                  <i class="  glyphicon glyphicon-th"></i> <span>Kategori Produk</span>

                </a>
              </li> -->
              
              
              
              <li class="treeview">
                <a href="index.php?aksi=logout">
                  <i class="fa fa-share"></i> <span>Log Out</span>

                </a>
              </li>
            </ul>
          </section>
          <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Dashboard
              <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Dashboard</li>
            </ol>
          </section>


          <section class="content">

            <div class="row">
              <div class="col-md-12">
                <div class="box">
                  <div class="box-body">

                    <?php 

                    if (isset($_GET['halaman'])) {
                      if ($_GET['halaman']=='gallery') {
                        include 'gallery.php';
                      }
                      elseif ($_GET['halaman']=='tambahgallery') {
                        include 'tambahgallery.php';
                      }                  
                      elseif ($_GET['halaman']=='detpembayaran') {
                        include 'detpembayaran.php';
                      }
                      elseif ($_GET['halaman']=='pembelian') {
                        include 'pembelian.php';
                      }
                      elseif ($_GET['halaman']=='agenda') {
                        include 'agenda.php';
                      }
                      elseif ($_GET['halaman']=='profil') {
                        include 'profil.php';
                      }
                      elseif ($_GET['halaman']=='tambahagenda') {
                        include 'tambahagenda.php';
                      }
                      elseif ($_GET['halaman']=='ubahgallery') {
                        include 'ubahgallery.php';
                      }
                      elseif ($_GET['halaman']=='ubahagenda') {
                        include 'ubahagenda.php';
                      }
                      elseif ($_GET['halaman']=='album') {
                        include 'album.php';
                      }
                      elseif ($_GET['halaman']=='tambahalbum') {
                        include 'tambahalbum.php';
                      }
                      elseif ($_GET['halaman']=='user') {
                        include 'user.php';
                      }
                      elseif ($_GET['halaman']=='detpembelian') {
                        include 'detpembelian.php';
                      }
                      elseif ($_GET['halaman']=='detpembeliantiket') {
                        include 'detpembeliantiket.php';
                      }
                      elseif ($_GET['halaman']=='ubahalbum') {
                        include 'ubahalbum.php';
                      }
                      elseif ($_GET['halaman']=='lagu') {
                        include 'lagu.php';
                      }
                      elseif ($_GET['halaman']=='tambahlagu') {
                        include 'tambahlagu.php';
                      }
                      elseif ($_GET['halaman']=='ubahlagu') {
                        include 'ubahlagu.php';
                      }
                      elseif ($_GET['halaman']=='produk') {
                        include 'produk.php';
                      }
                      elseif ($_GET['halaman']=='pembeliantiket') {
                        include 'pembeliantiket.php';
                      }
                      elseif ($_GET['halaman']=='tambahproduk') {
                        include 'tambahproduk.php';
                      }
                      elseif ($_GET['halaman']=='tambahtiket') {
                        include 'tambahtiket.php';
                      }
                      elseif ($_GET['halaman']=='tiket') {
                        include 'tiket.php';
                      }
                      elseif ($_GET['halaman']=='ubahproduk') {
                        include 'ubahproduk.php';
                      }elseif ($_GET['halaman']=='ubahberita') {
                        include 'ubahberita.php';
                      }elseif ($_GET['halaman']=='transportasi') {
                        include 'transportasi.php';
                      }elseif ($_GET['halaman']=='tambahtrans') {
                        include 'tambahtrans.php';
                      }elseif ($_GET['halaman']=='tambahtesti') {
                        include 'tambahtesti.php';
                      }elseif ($_GET['halaman']=='tambahclient') {
                        include 'tambahclient.php';
                      }elseif ($_GET['halaman']=='ubahclient') {
                        include 'ubahclient.php';
                      }elseif ($_GET['halaman']=='ubahtrans') {
                        include 'ubahtrans.php';
                      }elseif ($_GET['halaman']=='ubahsubpaket') {
                        include 'ubahsubpaket.php';
                      }elseif ($_GET['halaman']=='ubahtesti') {
                        include 'ubahtesti.php';
                      }elseif ($_GET['halaman']=='pesan') {
                        include 'pesan.php';
                      } elseif ($_GET['halaman']=='paket') {
                        include 'paket.php';
                      }elseif ($_GET['halaman']=='tambahpaket') {
                        include 'tambahpaket.php';
                      }elseif ($_GET['halaman']=='tambahsubpaket') {
                        include 'tambahsubpaket.php';
                      }elseif ($_GET['halaman']=='ubahpaket') {
                        include 'ubahpaket.php';
                      }elseif ($_GET['halaman']=='subpaket') {
                        include 'subpaket.php';
                      }elseif ($_GET['halaman']=='testimoni') {
                        include 'testimoni.php';
                      }elseif ($_GET['halaman']=='client') {
                        include 'client.php';
                      }


                    }

                    else
                    {
                      include 'home.php';
                    }

                    ?>

                  </div>
                </div>
              </div>

            </div>

          </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
        <footer class="main-footer">
          <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.0
          </div>
          <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
          <!-- Create the tabs -->
          <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
              <h3 class="control-sidebar-heading">Recent Activity</h3>
              <ul class="control-sidebar-menu">
                <li>
                  <a href="javascript::;">
                    <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                    <div class="menu-info">
                      <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                      <p>Will be 23 on April 24th</p>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="javascript::;">
                    <i class="menu-icon fa fa-user bg-yellow"></i>
                    <div class="menu-info">
                      <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                      <p>New phone +1(800)555-1234</p>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="javascript::;">
                    <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                    <div class="menu-info">
                      <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                      <p>nora@example.com</p>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="javascript::;">
                    <i class="menu-icon fa fa-file-code-o bg-green"></i>
                    <div class="menu-info">
                      <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                      <p>Execution time 5 seconds</p>
                    </div>
                  </a>
                </li>
              </ul><!-- /.control-sidebar-menu -->

              <h3 class="control-sidebar-heading">Tasks Progress</h3>
              <ul class="control-sidebar-menu">
                <li>
                  <a href="javascript::;">
                    <h4 class="control-sidebar-subheading">
                      Custom Template Design
                      <span class="label label-danger pull-right">70%</span>
                    </h4>
                    <div class="progress progress-xxs">
                      <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="javascript::;">
                    <h4 class="control-sidebar-subheading">
                      Update Resume
                      <span class="label label-success pull-right">95%</span>
                    </h4>
                    <div class="progress progress-xxs">
                      <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="javascript::;">
                    <h4 class="control-sidebar-subheading">
                      Laravel Integration
                      <span class="label label-warning pull-right">50%</span>
                    </h4>
                    <div class="progress progress-xxs">
                      <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="javascript::;">
                    <h4 class="control-sidebar-subheading">
                      Back End Framework
                      <span class="label label-primary pull-right">68%</span>
                    </h4>
                    <div class="progress progress-xxs">
                      <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                    </div>
                  </a>
                </li>
              </ul><!-- /.control-sidebar-menu -->

            </div><!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
              <form method="post">
                <h3 class="control-sidebar-heading">General Settings</h3>
                <div class="form-group">
                  <label class="control-sidebar-subheading">
                    Report panel usage
                    <input type="checkbox" class="pull-right" checked>
                  </label>
                  <p>
                    Some information about this general settings option
                  </p>
                </div><!-- /.form-group -->

                <div class="form-group">
                  <label class="control-sidebar-subheading">
                    Allow mail redirect
                    <input type="checkbox" class="pull-right" checked>
                  </label>
                  <p>
                    Other sets of options are available
                  </p>
                </div><!-- /.form-group -->

                <div class="form-group">
                  <label class="control-sidebar-subheading">
                    Expose author name in posts
                    <input type="checkbox" class="pull-right" checked>
                  </label>
                  <p>
                    Allow the user to show his name in blog posts
                  </p>
                </div><!-- /.form-group -->

                <h3 class="control-sidebar-heading">Chat Settings</h3>

                <div class="form-group">
                  <label class="control-sidebar-subheading">
                    Show me as online
                    <input type="checkbox" class="pull-right" checked>
                  </label>
                </div><!-- /.form-group -->

                <div class="form-group">
                  <label class="control-sidebar-subheading">
                    Turn off notifications
                    <input type="checkbox" class="pull-right">
                  </label>
                </div><!-- /.form-group -->

                <div class="form-group">
                  <label class="control-sidebar-subheading">
                    Delete chat history
                    <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                  </label>
                </div><!-- /.form-group -->
              </form>
            </div><!-- /.tab-pane -->
          </div>
        </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
      </div><!-- ./wrapper -->

   <!--  <script src="plugins/ckeditor/ckeditor.js"></script>
    <script>
      CKEDITOR.replace("editorku");
    </script> -->
    <script>
  $( function() {
 $('#datepicker').datepicker({ "format" : "dd-mm-yyyy", }).val();
  } );
  </script>
    <script src="../plugins/ckeditor/ckeditor.js"></script>
    <script>
      $(function () {
        $("#tabelku").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    <script>
      CKEDITOR.replace("editorku");
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.data').DataTable();
      });
    </script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
  </body>
  </html>
