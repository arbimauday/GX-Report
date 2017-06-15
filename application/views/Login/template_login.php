<?php
if ($_SERVER["SERVER_PORT"] != 443) {
    $redir = "Location: https://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    header($redir);
    exit();
}
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
  <title><?php echo $title; ?></title>

  <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/animate.min.css" rel="stylesheet">

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
  <link rel="stylesheet" href="<?php echo base_url();?>assets/datatables/dataTables.bootstrap.css"/>
  <!---end script-->

  <!--** Sweet Alert **-->
  <script src="<?php echo base_url();?>assets-admin/sweet-alert/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>assets-admin/sweet-alert/sweetalert.css">
  <!-- tutup -->
</head>
<body style="background:#fbfbfb;">
<!-- Header -->
<div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation" style="background:#004988;border-radius:0;border:none;">
  <div class="container-fluid">
    <div class="navbar-header" style="background:none;"><a class="" href="<?php echo base_url();?>"><img class="col-md-offset-5 col-sm-offset-5 col-xs-offset-3" src="<?php echo base_url();?>assets/images/logo.png"></a>
    </div>
  </div>
</div>
<!-- tutup header-->
<?php if($content !="") $this->load->view($content); ?>

</body>
</html>
