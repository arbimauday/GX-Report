<?php
if ($_SERVER["SERVER_PORT"] != 443) {
    $redir = "Location: https://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    header($redir);
    exit();
}

if(Empty($_SESSION['IdUser']) && Empty($_SESSION['UserPegawai']) && Empty($_SESSION['CallNamePegawai']) && Empty($_SESSION['IdStatus'])){
  redirect(base_url().'Login');
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="<?php echo base_url();?>assets-admin/img/faficon.png"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url();?>assets-admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets-admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets-admin/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets-admin/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets-admin/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets-admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets-admin/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets-admin/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets-admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets-admin/plugins/datatables/dataTables.bootstrap.css">

  <!-- Fungsi Memanggil DatePicker script datepicker -->
  <link href="<?php echo base_url();?>assets/alat/date_picker_bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <!--end-->

  <!--** Sweet Alert **-->
  <script src="<?php echo base_url();?>assets-admin/sweet-alert/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>assets-admin/sweet-alert/sweetalert.css">
  <!-- tutup -->
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <!-- Start of LiveChat (www.livechatinc.com) code -->
<!--script type="text/javascript">
window.__lc = window.__lc || {};
window.__lc.license = 8786211;
(function() {
  var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
  lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
})();
</script-->
<!-- End of LiveChat code -->
  <!--script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js";></script-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script type="text/javascript">
  var last = <?php echo $_SESSION['IdUser']; ?>;
  $('<audio id="chatAudio"><source src="<?php echo base_url(); ?>assets-admin/audio/notifikasi.ogg" type="audio/ogg"><source src="<?php echo base_url(); ?>assets-admin/audio/otifikasi.mp3" type="audio/mpeg"><source src="<?php echo base_url(); ?>assets-admin/audio/notifikasi.wav" type="audio/wav"></audio>').appendTo('body');
  $(document).ready(function(){
    function load() {
      $.ajax({ //create an ajax request to load_page.php
        type: "GET",
        url: '<?php echo base_url('F_ajax/Ajax/coba/'); ?>'+last,
        dataType: "html", //expect html to be returned
        success: function (response) {
          $("#notif").html(response);
          $("#messageid").text('You have '+ response +' messages');
          //$('#chatAudio')[0].play();
          // pinotifi
          /*if (!Notification) {
            alert('Browsermu tidak mendukung Web Notification.');
            return;
          }
          if (Notification.permission !== "granted"){
            Notification.requestPermission();
          }else {
            $('#chatAudio')[0].play();
            var notifikasi = new Notification('Reminder Job', {
              icon: 'fa fa-check-circle',
              title: "Sukses!",
              type: "success",
              text: "Ok!",
              body: response.judul_pekerjaan
            });
            notifikasi.onclick = function () {
            //window.open("http://goo.gl/dIf4s1");
            window.open("http://globalxtreme.net");
          };
          setTimeout(function(){
           notifikasi.close('');
          }, 2000);
          }*/
          //setTimeout(load, 3000)
          },
          error: function (jqXHR, textStatus, errorThrown){
          //alert("Hello");
          $("messageid").text('Your Messages');
          //  setTimeout(load, 3000)
          }
        });
      }

      //load(); //if you don't want the click
      //$("#display").click(load); //if you want to start the display on click
      setTimeout(load, 1000)
      setTimeout(notifikasi_bar_remarks, 1000)
  });

  function notifikasi_bar_remarks(){
    $.ajax({
      url: '<?php echo base_url('F_ajax/Ajax/bar_remarks_notifikasi'); ?>',
      dataType: "JSON", //expect html to be returned
      success: function (result) {
        $('#remarks_looping').html('');
        for(i=0;i<result[0].length;i++){
          // sound bell
          if(result[0][i].id_status_pengirim == '1' && result[0][i].notifikasi_cek == '0'){
            $('#chatAudio')[0].play();
            $.ajax({url : "<?php echo base_url();?>F_ajax/Ajax/ceksound/"+result[0][i].id_remarks});
          }

          $('#remarks_looping').append('<li><a href="<?php echo base_url('Pegawai/Home/Remarks/');?>'+result[0][i].id_report+'" style="padding:1px 10px;"><span><b>'+result[0][i].call_name+'</b><small class="pull-right"><i class="fa fa-clock-o text-blue"></i> '+result[0][i].time_remarks+'</small></span><br><span style="font-size:15px;">'+result[0][i].judul_pekerjaan+'</span><br><span>'+result[0][i].isi_remarks+'</span></a></li>');
        }
        $('#jmlRemarks').text(result[1]);
        if(result[1] == '0'){
          $('#cardRemarks').text('');
        }else {
          $('#cardRemarks').text(result[1]);
        }

      }
    });
    setTimeout(notifikasi_bar_remarks, 2000)
  }
  </script>
<!-- notifikasi -->


<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <span class="logo-mini"><b><?php echo $_SESSION['NamaDivisi'][0]; ?></b></span>
      <span class="logo-lg"><b><?php echo $_SESSION['NamaDivisi']; ?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bullhorn"></i>
              <span class="label label-danger" id="cardRemarks"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Remarks <b id="jmlRemarks"></b></li>
              <li>
                <ul class="menu" id="remarks_looping">
                </ul>
              </li>
            </ul>
          </li>

          <?php /*
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success" id="notif"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header" id="messageid"></li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url();?>assets-admin/dist/img/avt_p.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> ----
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li> */ ?>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>assets-admin/dist/img/avt_p.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['CallNamePegawai']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url();?>assets-admin/dist/img/avt_p.jpg" class="img-circle" alt="User Image" style="border:2px solid #fff;">
                <p>
                  <?php echo $_SESSION['CallNamePegawai']; ?>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url('Pegawai/Home/profil_pegawai');?>" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('Login/Logout_pegawai')?>" class="btn btn-default btn-flat">Sign-Out</a>
                </div>
              </li>
            </ul>
          </li>
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
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>assets-admin/dist/img/avt_p.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['CallNamePegawai']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="treeview">
          <a href="<?php echo base_url();?>Pegawai/Home/Buat_SPK_Pekerjaan">
            <i class="fa  fa-random"></i> <span>SPK Pekerjaan</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
          <i class="fa fa-bookmark"></i>
          <span>Data Pekerjaan</span>
          <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo base_url('Pegawai/Home'); ?>"><i class="fa fa-circle-o"></i>Pekerjaan Hari ini</a>
            </li>
            <li>
              <a href="<?php echo base_url('Pegawai/Home/List_Pekerjaan') ?>"><i class="fa fa-circle-o"></i> List Pekerjaan</a>
            </li>
          </ul>
        </li>

        <li class="treeview">
          <a href="">
            <i class="fa fa-gavel"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('Pegawai/Home/History_Laporan'); ?>"><i class="fa fa-circle-o"></i> History Laporan</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="">
            <i class="fa fa-user"></i> <span>Profil</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('Pegawai/Home/profil_pegawai');?>"><i class="fa fa-circle-o"></i> Data Profil</a></li>
            <li><a href="<?php echo base_url('Pegawai/Home/Akun');?>"><i class="fa fa-circle-o"></i> Edit Akun</a></li>
          </ul>
        </li>

        <!--li class="treeview">
          <a href="">
            <i class="fa fa-gavel"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> History Laporan</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa  fa-user"></i> <span>Menu 1</span>
          </a>
        </li-->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <?php if($content !="") $this->load->view($content); ?>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>GXTV</b>
    </div>
    <strong>&copy; 2017 <a href="http://www.globalxtreme.tv">www.globalxtreme.tv</a></strong> All rights
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
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
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
            <a href="javascript:void(0)">
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
            <a href="javascript:void(0)">
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
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
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
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url();?>assets-admin/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>assets-admin/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>assets-admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>assets-admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>assets-admin/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url();?>assets-admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>assets-admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>assets-admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>assets-admin/dist/js/pages/dashboard.js"></script>


<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>assets-admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>assets-admin/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets-admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets-admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets-admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets-admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets-admin/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets-admin/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $("#example3").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    // filter rangkuman laporan
    $('#rangkuman_laporan').DataTable({
      //data-firstsort:'desc'// hiden sortable
       "order": [[ 3, "desc" ]],
       "paging": true,
       "lengthChange": true,
       "searching": true,
       "ordering": false,
       "info": true,
       "autoWidth": false
    });
  });
</script>

<!-- ***** Fungsi Membuat DatePicker *****-->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/datepicker/daterangepicker.js"></script>
<!-- Datepicker jQuery Version 1.11.0 -->
  <script type="text/javascript" src="<?php echo base_url();?>assets/alat/date_picker_bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/alat/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js"charset="UTF-8"></script>
<!-- End Datepicker jQuery Version 1.11.0 -->
<!-- Fungsi datepickier yang digunakan -->
    <script type="text/javascript">
    $('.datepicker').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    </script>
<!--- Tutup Fungsi DatePicker --->

</body>
</html>