<?php
/*if ($_SERVER["SERVER_PORT"] != 443) {
    $redir = "Location: https://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    header($redir);
    exit();
}*/
//session_start();
//echo validation_erros();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/TV.png"/>
  <title>Sms Gatway</title>

  <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/animate.min.css" rel="stylesheet">

  <!--script datepicker-->
  <link href="<?php echo base_url();?>assets/alat/date_picker_bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <!--end-->



  <!-- Custom styling plus plugins -->
  <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="<?php echo base_url();?>assets/css/icheck/flat/green.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/css/floatexamples.css" rel="stylesheet" type="text/css" />

  <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/nprogress.js"></script>
  <script src="<?php echo base_url();?>assets/js/paket.js"></script>

  <!---script datatables-->

  <link rel="stylesheet" href="<?php echo base_url();?>assets/datatables/datatables/dataTables.bootstrap.css"/>
  <!---end script-->

  <!-- Script TinyMCE -->
<script src="<?php echo base_url();?>assets/tinymce/js/tinymce/tinymce.dev.js"></script>
<script src="<?php echo base_url();?>assets/tinymce/js/tinymce/plugins/table/plugin.dev.js"></script>
<script src="<?php echo base_url();?>assets/tinymce/js/tinymce/plugins/paste/plugin.dev.js"></script>
<script src="<?php echo base_url();?>assets/tinymce/js/tinymce/plugins/spellchecker/plugin.dev.js"></script>
</head>
<body style="background:#fbfbfb;">
<!-- Header -->
<div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation" style="background:#004988;">
    <div class="container-fluid">
     <div class="navbar-header" style="background:none;"><a class="" href="<?php echo base_url();?>"><img class="col-md-offset-5" src="<?php echo base_url();?>assets/images/logo.png"></a>
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
     </button>
     </div>
    </div>
</div>
<!-- tutup header-->


  <div class="container">
      <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-12">
      <div class="panel panel-info" style="border:1px solid #f7f5f5;">
        <div class="panel-heading" style="background:#3a5795;color:#fff;border:none;">
          <div class="panel-title text-center">SEND SMS</div>
        </div>

        <div style="padding-top:10px;background:#f1f1f1;" class="panel-body" >
        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

        <form id="loginform" class="form-horizontal" role="form" action="<?php echo base_url('Notifikasi/SendReminder/send_sms_reminder');?>" method="post">

          <label for="middle-name" class="control-label">Phone Number<span >*</span></label>
          <div style="margin-bottom: 10px;" class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user" style="color:#3a5795;"></i></span>
          <input id="login-username" type="number" class="form-control" name="no_hp" placeholder="085xxxxxxx" value="<?php echo $no_tlpn; ?>" required>
          </div>

          <label for="middle-name" class="control-label">Message<span >*</span></label>
<textarea placeholder="text.." class="form-control" rows="5" name="isipesan"><?php foreach ($ResultJob as $u){ ?>
Level : <?php echo $u->category; ?>

Due Date : <?php echo $u->jenis_report; ?>

Status : <?php echo $u->status_report; ?> / <?php echo $u->progress_bar; ?>%
Judul Pekerjaan : <?php echo $u->judul_pekerjaan; ?>

------------------
<?php } ?>
</textarea>
          <div style="margin-top:10px" class="form-group">
            <div class="col-sm-12 col-xm controls">
            <button type="submit" class="btn btn-success" id="btn-login">Send  </button>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-12 col-xs-12 col-sm-12 control">
            <div style="border-top: 1px solid #d8d8d8; padding-top:15px; font-size:85%" class="col-md-12 col-sm-12 col-xs-12">
            Template By
            <a href="http://arbaxtreme.tv" onClick="$('#loginbox').hide(); $('#signupbox').show()">
            Arbaxtreme.tv
            </a>
            </div>
            </div>
          </div>
        </form>
    </div>
    </div>

    </div>

  </div>

</body>
</html>
