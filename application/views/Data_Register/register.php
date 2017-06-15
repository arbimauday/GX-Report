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

  <!-- Bootstrap core CSS -->

  <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

  <link href="<?php echo base_url();?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

  <!--script datepicker-->
  <link href="<?php echo base_url();?>assets/alat/date_picker_bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <!--end-->

  <!-- Custom styling plus plugins -->
  <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="<?php echo base_url();?>assets/css/icheck/flat/green.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/css/floatexamples.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" />

  <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/nprogress.js"></script>

  <!-- Script TinyMCE -->
<script src="<?php echo base_url();?>assets/tinymce/js/tinymce/tinymce.dev.js"></script>
<script src="<?php echo base_url();?>assets/tinymce/js/tinymce/plugins/table/plugin.dev.js"></script>
<script src="<?php echo base_url();?>assets/tinymce/js/tinymce/plugins/paste/plugin.dev.js"></script>
<script src="<?php echo base_url();?>assets/tinymce/js/tinymce/plugins/spellchecker/plugin.dev.js"></script>

<script>
   // block text untuk angka
	function hanyaAngka(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))

  return false;
  return true;
  }
</script>

</head>
<body style="background:none;">

<div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation" style="background:#004988;border-radius:0;border-color:none;">
  <div class="container-fluid">
   <div class="navbar-header" style="background:none;"><a class="" href="<?php echo base_url();?>"><img class="col-md-offset-5" src="<?php echo base_url();?>assets/images/logo.png"></a>
   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
   </button>
   </div>
   <div class="collapse navbar-collapse navbar-menubuilder">
      <ul class="nav navbar-nav navbar-right">
        <li style="background:#efefef;"><a href="<?php echo base_url();?>Login"><i class="fa fa-sign-in" aria-hidden="true" style="color:#545454;font-size:18px;"></i> Sign-In</a>
        </li>
      </ul>
   </div>
  </div>
</div>

<!--div class="main_container"-->

</br></br>

<div class="right_col" role="main">
  <div class="">
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <!--div class="x_panel"-->
      <div class="col-md-12 col-sm-12 col-xs-12" ><h2 style="font-size:30px;" align="center"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i> Form Register Pegawai GlobalXtreme - <?php echo $port_select; ?></h2></div>
    <div class="x_content">
    <br />
    <!-- Part Form -->
    <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>Register/daftar" class="myform" enctype="multipart/form-data">

    <!-- 1. Info Kendaraan -->
    <div class="form-group" style="background:#fdfdfd;border-bottom:2px solid #dedede;border-top:2px solid #dedede;">
      <div class="col-md-12">
      <label for="middle-name" class="control-label"><h4><span  class="btn btn-primary btn-sm" style="border-radius:50%;">1.</span> Data Pribadi </h4>
      </label>
      </div>

      <div class="col-md-12">

        <!-- 1 -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
            <label for="middle-name" class="control-label">Nama Lengkap<span >*</span></label>
            <input name="nama_lengkap" placeholder="Nama Lengkap" class="form-control col-md-12 col-xs-12" maxlength="50" required>
            </div>
          </div>

          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
            <label for="middle-name" class="control-label">Tgl Lahir<span >*</span></label>
              <input placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy" type="text" name="tgl_lahir" maxlength="12" required class="form-control datepicker col-md-7 col-xs-12">
            </div>
          </div>

          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
            <label for="middle-name" required class="control-label">Agama<span >*</span></label>
            <select class="select2_group form-control" required  name="id_agama">
              <option value=""></option>
              <option value="1">Buddha</option>
              <option value="2">Hindu</option>
              <option value="3">Islam</option>
              <option value="4">Katolik</option>
              <option value="5">Kristen</option>
              <option value="6">Kong Hu Cu</option>
            </select>
            </div>
          </div>

          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
            <label for="middle-name" class="control-label">Jenis Kelamin<span >*</span></label>
            <select class="select2_group form-control" required name="jenis_kelamin">
              <option value=""></option>
              <option value="L">Laki-Laki</option>
              <option value="P">Perempuan</option>
            </select>
            </div>
          </div>

        <!-- baris 2 -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
            <label for="middle-name" class="control-label">Asal Kota<span >*</span></label>
            <input type="text" name="asal_kota" placeholder="Asal Kota" maxlength="50" required class="form-control col-md-12 col-xs-12">
            </div>
          </div>

          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
            <label for="middle-name" class="control-label">Alamat<span >*</span></label>
            <input type="text" required name="alamat" placeholder="Alamat" class="form-control col-md-12 col-xs-12" maxlength="50">
            </div>
          </div>

          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
            <label for="middle-name" class="control-label">Email<span >*</span></label>
            <input type="email" required name="email" maxlength="25" placeholder="@example" class="form-control col-md-12 col-sm-12 col-xs-12">
            </div>
          </div>

          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
            <label for="middle-name" class="control-label">No. Hp<span >*</span></label>
            <input type="text" onkeypress="return hanyaAngka(event)" required maxlength="15" name="no_hp" placeholder="No. Hp (Aktif)" class="form-control col-md-12 col-sm-12 col-xs-12">
            </div>
          </div>

        <!-- baris 3 -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
            <label for="middle-name" class="control-label">Lulusan<span >*</span></label>
            <select class="select2_group form-control col-md-6" required name="lulusan">
              <option value=""></option>
              <option value="SD">SD</option>
              <option value="SMP">SMP</option>
              <option value="SMA/SMK">SMA/SMK</option>
              <option value="S1">S1</option>
              <option value="S2">S2</option>
              <option value="S3">S3</option>
              <option value="D1">D1</option>
              <option value="D2">D2</option>
              <option value="D3">D3</option>
            </select>
            </div>
          </div>

          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
            <label for="middle-name" class="control-label">Status Perkawinan<span >*</span></label>
            <select class="select2_group form-control" required  name="status_perkawinan" onchange="autovalue()">
              <option value=""></option>
              <option value="Belum Menikah">Belum Menikah</option>
              <option value="Menikah">Menikah</option>
              <option value="Janda">Janda</option>
              <option value="Duda">Duda</option>
            </select>
            </div>
          </div>
          <script>
          function autovalue() {
            var cek = $('[name="status_perkawinan"]').val();
            if(cek == 'Belum Menikah'){
              $('[name="nama_suami_istri"]').val('-');
              $('[name="jumlah_anak"]').val('0');
              $('[name="nama_suami_istri"]').prop('readonly', true);
              $('[name="jumlah_anak"]').prop('readonly', true);

              document.getElementById("ptkp_show").required = false;
              document.getElementById("ptkp_show").style.display = 'none';
              document.getElementById("ptkp_show").name = '';
              document.getElementById("ptkp_hide").style.display = '';
              document.getElementById("ptkp_hide").name = 'ptkp';
            }else {
              $('[name="nama_suami_istri"]').val('');
              $('[name="jumlah_anak"]').val('');
              $('[name="nama_suami_istri"]').prop('readonly', false);
              $('[name="jumlah_anak"]').prop('readonly', false);

              document.getElementById("ptkp_show").required = true;
              document.getElementById("ptkp_show").style.display = '';
              document.getElementById("ptkp_show").name = 'ptkp';
              document.getElementById("ptkp_hide").style.display = 'none';
              document.getElementById("ptkp_hide").name = '';
            }
          }
          </script>

          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
            <label for="middle-name" class="control-label">Nama Suami/Istri</label>
            <input type="text" maxlength="25" placeholder="Nama Suami/Istri" name="nama_suami_istri" class="form-control col-md-12 col-sm-12 col-xs-12">
            </div>
          </div>

          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
            <label for="middle-name" class="control-label">Jumlah Anak</label>
            <input type="number" name="jumlah_anak" placeholder="Jumlah Anak" class="form-control col-md-12 col-sm-12 col-xs-12">
            </div>
          </div>

        <!-- baris 4 -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
            <label for="middle-name" class="control-label">Foto KTP<span >*</span></label>
            <input type="file" name="foto_ktp" required class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
            <label for="middle-name" class="control-label">Foto Pegawai<span >*</span></label>
            <input type="file" name="foto_pegawai" required class="form-control col-md-7 col-xs-12">
            </div>
          </div>
      </div>


      <!-- Keterangan Keluarga -->
      <div class="col-md-12">
        <div class="col-md-6 col-sm-6 col-xs-12">
        <fieldset class="scheduler-border">
            <legend class="scheduler-border btn btn-primary btn-sm">Keterangan Keluarga</legend>

            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
              <label for="middle-name" class="control-label">Nama Ayah<span >*</span></label>
              <input type="text" maxlength="50" name="nama_ayah" placeholder="Nama Ayah" class="form-control col-md-12 col-sm-12 col-xs-12" required>
              </div>
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
              <label for="middle-name" class="control-label">Nama Ibu<span >*</span></label>
              <input type="text" maxlength="50" name="nama_ibu" placeholder="Nama Ibu" class="form-control col-md-12 col-sm-12 col-xs-12"  required>
              </div>
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
              <label for="middle-name" class="control-label">Alamat<span >*</span></label>
              <input type="text" maxlength="50" name="alamat_orang_tua" placeholder="Alamat" class="form-control col-md-12 col-sm-12 col-xs-12"  required>
              </div>
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
              <label for="middle-name" class="control-label">Kota<span >*</span></label>
              <input type="text" maxlength="50" name="kota_orang_tua" placeholder="Kota" class="form-control col-md-12 col-sm-12 col-xs-12"  required>
              </div>
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
              <label for="middle-name" class="control-label">Telpon</label>
              <input type="text" onkeypress="return hanyaAngka(event)" maxlength="15" name="no_hp_orang_tua" placeholder="Telpon" class="form-control col-md-12 col-sm-12 col-xs-12">
              </div>
            </div>

        </fieldset>
        </div>

        <!-- Keterangan Orang yang bisa di hubungi-->
        <div class="col-md-6 col-sm-6 col-xs-12">
        <fieldset class="scheduler-border">
            <legend class="scheduler-border btn btn-primary btn-sm">Orang Yang Dapat di Hubungi</legend>

            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
              <label for="middle-name" class="control-label">Nama<span >*</span></label>
              <input type="text" maxlength="50" name="nama_orang_dekat" placeholder="Nama" class="form-control col-md-12 col-sm-12 col-xs-12" required>
              </div>
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
              <label for="middle-name" class="control-label">Alamat<span >*</span></label>
              <input type="text" maxlength="50" name="alamat_orang_dekat" placeholder="Alamat" class="form-control col-md-12 col-sm-12 col-xs-12" required>
              </div>
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
              <label for="middle-name" class="control-label">Hubungan<span >*</span></label>
              <select class="select2_group form-control" name="hubungan" required>
                <option value=""></option>
                <option value="ORANG TUA">ORANG TUA</option>
                <option value="SAUDARA KANDUNG">SAUDARA KANDUNG</option>
                <option value="OM/TANTE">OM/TANTE</option>
                <option value="NA">SAUDARA SEPUPU</option>
                <option value="TEMAN">TEMAN</option>
                <option value="SUAMI/ISTRI">SUAMI/ISTRI</option>
              </select>
              </div>
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
              <label for="middle-name" class="control-label">Kota<span >*</span></label>
              <input type="text" maxlength="30" name="kota_orang_dekat" placeholder="Kota" class="form-control col-md-12 col-sm-12 col-xs-12"  required>
              </div>
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
              <label for="middle-name" class="control-label">Telpon<span >*</span></label>
              <input type="text" onkeypress="return hanyaAngka(event)" maxlength="15" name="no_hp_orang_dekat" placeholder="Telpon" class="form-control col-md-12 col-sm-12 col-xs-12"  required>
              </div>
            </div>
        </fieldset>
        </div>
      </div>

      <!-- Pekerjaan Terakir -->
      <div class="col-md-12">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <fieldset class="scheduler-border">
            <legend class="scheduler-border btn btn-primary btn-sm">Pekerjaan Sebelumnya</legend>

            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
              <label for="middle-name" class="control-label">Nama Perusahaan</label>
              <input type="text" maxlength="50" name="nama_perusahaan_lama" placeholder="Nama Perusahaan Lama" class="form-control col-md-12 col-sm-12 col-xs-12">
              </div>
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
              <label for="middle-name" class="control-label">Jabatan</label>
              <input type="text" maxlength="20" name="jabatan_lama" placeholder="Jabatan Lama" class="form-control col-md-12 col-sm-12 col-xs-12">
              </div>
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
              <label for="middle-name" class="control-label">Alamat Perusahaan</label>
              <input type="text" maxlength="50" name="alamat_perusahaan_lama" placeholder="Alamat Perusahaan" class="form-control col-md-12 col-sm-12 col-xs-12">
              </div>
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
              <label for="middle-name" class="control-label">Contact Person</label>
              <input type="text" maxlength="25" name="contact_person" placeholder="Contact Person" class="form-control col-md-12 col-sm-12 col-xs-12">
              </div>
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
              <label for="middle-name" class="control-label">Telpon</label>
              <input type="text" maxlength="15" name="no_telpon_perusahaan_lama" onkeypress="return hanyaAngka(event)" placeholder="Telpon" class="form-control col-md-12 col-sm-12 col-xs-12">
              </div>
            </div>
        </fieldset>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
        <fieldset class="scheduler-border">
            <legend class="scheduler-border btn btn-primary btn-sm">Akun Bank</legend>

            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
              <label for="middle-name" class="control-label">Nama Bank<span >*</span></label>
              <input type="text" maxlength="30" name="nama_bank" placeholder="Nama Bank" class="form-control col-md-12 col-sm-12 col-xs-12" required>
              </div>
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
              <label for="middle-name" class="control-label">No Akun<span >*</span></label>
              <input type="text" onkeypress="return hanyaAngka(event)" maxlength="30" name="no_akun_bank" placeholder="No Akun" class="form-control col-md-12 col-sm-12 col-xs-12"  required>
              </div>
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
              <label for="middle-name" class="control-label">Nama Pemilik<span >*</span></label>
              <input type="text" maxlength="50" name="nama_pemilik" placeholder="Nama Pemilik" class="form-control col-md-12 col-sm-12 col-xs-12" required>
              </div>
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
              <label for="middle-name" class="control-label">Cabang<span >*</span></label>
              <input type="text" maxlength="20" name="cabang_bank" placeholder="Cabang Bank" class="form-control col-md-12 col-sm-12 col-xs-12">
              </div>
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
              <label for="middle-name" class="control-label">Kota<span >*</span></label>
              <input type="text" maxlength="20" name="kota_bank" placeholder="Kota" class="form-control col-md-12 col-sm-12 col-xs-12" required>
              </div>
            </div>

        </fieldset>
        </div>
      </div>

    </div>

    <!-- 2. Info Data karyawan -->
    <div class="form-group" style="background:#fdfdfd;border-bottom:2px solid #dedede;border-top:2px solid #dedede;">
      <div class="col-md-12">
      <label for="middle-name" class="control-label"><h4><span  class="btn btn-primary btn-sm" style="border-radius:50%;">2.</span> Data Karyawan</h4></label>
      </div>

      <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- 2.2 bagian 1 -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="middle-name" class="control-label">Divisi <span >*</span></label>
            <select class="select2_group form-control" id="selectUsers2" onChange="Choice2();" required>
              <option value=""></option>
              <option value="ADMIN">ADMIN</option>
              <option value="BONGKAR">BONGKAR</option>
              <option value="CAFE">CAFE</option>
              <option value="CASHIER">CASHIER</option>
              <option value="CSO">CSO</option>
              <option value="FIBER OPTIC">FIBER OPTIC</option>
              <option value="MAINTENANCE">MAINTENANCE</option>
              <option value="MARKETING">MARKETING</option>
              <option value="NA">NA</option>
              <option value="RUTANG">RUTANG</option>
              <option value="WIRELESS">WIRELESS</option>
            </select>
          </div>
        </div>

<script>
// script mendapat kode shif
  var luar          = new Array();
  var admin         = new Array();
  var bongkar       = new Array();
  var cafe          = new Array();
  var cashier       = new Array();
  var cso           = new Array();
  var fiber_optik   = new Array();
  var maintenance   = new Array();
  var marketing     = new Array();
  var na            = new Array();
  var rutang        = new Array();
  var wireless      = new Array();


  luar[0]     = "";
  <?php
  $types1 = array("");
  foreach($admin as $u){ $types1[] = $u->nama_lengkap; } ?>
  admin[1]     = "<?php echo count($types1); ?>";

  <?php
  $types2 = array("");
  foreach($bongkar as $u){ $types2[] = $u->nama_lengkap; } ?>
  bongkar[2] = "<?php echo count($types2); ?>";

  <?php
  $types3 = array("");
  foreach($cafe as $u){ $types3[] = $u->nama_lengkap; } ?>
  cafe[3] = "<?php echo count($types3); ?>";

  <?php
  $types4 = array("");
  foreach($cashier as $u){ $types4[] = $u->nama_lengkap; } ?>
  cashier[4]    = "<?php echo count($types4); ?>";

  <?php
  $types5 = array("");
  foreach($cso as $u){ $types5[] = $u->nama_lengkap; } ?>
  cso[5]     = "<?php echo count($types5); ?>";

  <?php
  $types6 = array("");
  foreach($fo as $u){ $types6[] = $u->nama_lengkap; } ?>
  fiber_optik[6] = "<?php echo count($types6); ?>";

  <?php
  $types7 = array("");
  foreach($maintenance as $u){ $types7[] = $u->nama_lengkap; } ?>
  maintenance[7]  = "<?php echo count($types7); ?>";

  <?php
  $types8 = array("");
  foreach($marketing as $u){ $types8[] = $u->nama_lengkap; } ?>
  marketing[8]   = "<?php echo count($types8); ?>";

  <?php
  $types9 = array("");
  foreach($na as $u){ $types9[] = $u->nama_lengkap; } ?>
  na[9]   = "<?php echo count($types9); ?>";

  <?php
  $types10 = array("");
  foreach($rutang as $u){ $types10[] = $u->nama_lengkap; } ?>
  rutang[10]    = "<?php echo count($types10); ?>";

  <?php
  $types11 = array("");
  foreach($wl as $u){ $types11[] = $u->nama_lengkap; } ?>
  wireless[11]   = "<?php echo count($types11); ?>";

  function Choice2() {
  //x = document.getElementById("users");
    y = document.getElementById("selectUsers2").value;
    y2 = document.getElementById("selectUsers2");

  if(y == "ADMIN"){
    document.getElementById("kode_shif").value = y+admin[y2.selectedIndex];
    document.getElementById("id_divisi").value = "1";
  }else if(y == "BONGKAR"){
    document.getElementById("kode_shif").value = y+bongkar[y2.selectedIndex];
    document.getElementById("id_divisi").value = "2";
  }else if(y == "CAFE"){
    document.getElementById("kode_shif").value = y+cafe[y2.selectedIndex];
    document.getElementById("id_divisi").value = "3";
  }else if (y == "CASHIER"){
    document.getElementById("kode_shif").value = y+cashier[y2.selectedIndex];
    document.getElementById("id_divisi").value = "4";
  }else if (y == "CSO"){
    document.getElementById("kode_shif").value = y+cso[y2.selectedIndex];
    document.getElementById("id_divisi").value = "5";
  }else if (y == "FIBER OPTIC"){
    document.getElementById("kode_shif").value = y+fiber_optik[y2.selectedIndex];
    document.getElementById("id_divisi").value = "6";
  }else if (y == "MAINTENANCE"){
    document.getElementById("kode_shif").value = y+maintenance[y2.selectedIndex];
    document.getElementById("id_divisi").value = "7";
  }else if (y == "MARKETING"){
    document.getElementById("kode_shif").value = y+marketing[y2.selectedIndex];
    document.getElementById("id_divisi").value = "8";
  }else if (y == "NA"){
    document.getElementById("kode_shif").value = y+na[y2.selectedIndex];
    document.getElementById("id_divisi").value = "9";
  }else if (y == "RUTANG"){
    document.getElementById("kode_shif").value = y+rutang[y2.selectedIndex];
    document.getElementById("id_divisi").value = "10";
  }else if (y == "WIRELESS"){
    document.getElementById("kode_shif").value = y+wireless[y2.selectedIndex];
    document.getElementById("id_divisi").value = "11";
  }else {}

  }
</script>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="form-group">
          <label for="middle-name" class="control-label">Port</label>
          <input type="text" maxlength="25" placeholder="" readonly value="<?php echo $port_select; ?>" class="form-control col-md-12 col-sm-12 col-xs-12">
          <input type="hidden" value="<?php echo $id_port; ?>" name="id_port">
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="middle-name" class="control-label">Status Pegawai <span >*</span></label>
            <select class="select2_group form-control" required  name="id_status_pegawai" onclick="autotgl_pengangkatan()">
              <option value=""></option>
              <option value="1">PKL</option>
              <option value="2">TRAINING</option>
              <option value="3">TETAP</option>
              <option value="4">KABAG</option>
              <option value="5">KABID</option>
              <option value="6">RESIGN</option>
            </select>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="middle-name" class="control-label">Tanggal dan Tahun Masuk <span >*</span></label>
            <input class="form-control datepicker" placeholder="yyyy/mm/dd" data-date-format="yyyy/mm/dd" type="text" name="tgl_thn_masuk" required  class="form-control col-md-12 col-sm-12 col-xs-12">
          </div>
        </div>

        <!-- Get ID divisi for input-->
        <input id="id_divisi" name="id_divisi" type="hidden">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="middle-name" class="control-label">Kode Shif <span >*</span></label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" maxlength="100" readonly name="kode_shif" id="kode_shif" placeholder="Kode Shif" class="form-control col-md-12 col-sm-12 col-xs-12">
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="middle-name" class="control-label">No. KTP <span >*</span></label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" maxlength="30" required name="no_ktp" placeholder="No. KTP" class="form-control col-md-12 col-sm-12 col-xs-12">
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="middle-name" class="control-label">Jatuh Tempo Hutang</label>
            <input class="form-control datepicker" placeholder="yyyy/mm/dd" data-date-format="yyyy/mm/dd" type="text" name="jatuh_tempo_hutang"  class="form-control col-md-12 col-sm-12 col-xs-12">
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="middle-name" class="control-label">PTKP <span >*</span></label>
            <select class="select2_group form-control" required  name="ptkp" id="ptkp_show">
              <option value=""></option>
              <option value="Menikah, 0 anak">Menikah, 0 anak</option>
              <option value="Menikah, 1 anak">Menikah, 1 anak</option>
              <option value="Menikah, 2 anak">Menikah, 2 anak</option>
              <option value="Menikah, 3 anak">Menikah, 3 anak</option>
              <option value="Cerai, 0 anak">Cerai, 0 anak</option>
              <option value="Cerai, 0 anak">Cerai, 1 anak</option>
              <option value="Cerai, 0 anak">Cerai, 2 anak</option>
              <option value="Cerai, 0 anak">Cerai, 3 anak</option>
            </select>
            <input type="text" class="form-control col-md-12 col-sm-12 col-xs-12" readonly value="Belum Menikah" id="ptkp_hide" style="display:none;">
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="middle-name" class="control-label">Tanggal dan Tahun Pengangkatan <span >*</span></label>
            <input placeholder="yyyy/mm/dd" data-date-format="yyyy/mm/dd" type="text" name="tgl_thn_pengangkatan" required  class="form-control col-md-12 col-sm-12 col-xs-12 datepicker" id="tgl_show">

            <input type="text" class="form-control col-md-12 col-sm-12 col-xs-12" readonly value="0000/00/00" id="tgl_hide" style="display:none;">
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="middle-name" class="control-label">Jumlah Hutang</label>
            <input type="number" onkeyup="this.value = this.value.toUpperCase()" maxlength="100" name="jumlah_hutang" placeholder="- - - - - - - - - - - -" class="form-control col-md-12 col-sm-12 col-xs-12">
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="middle-name" class="control-label">Sampai Batas Tanggal</label>
            <input data-date-format="yyyy/mm/dd" placeholder="yyyy/mm/dd" type="text" name="tgl_batas"  class="form-control datepicker col-md-12 col-sm-12 col-xs-12">
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="middle-name" class="control-label">Tgl Resend <block style="color:#000;">(di isi Jika ingin berhenti bekerja)</block></label>
            <input class="form-control datepicker" placeholder="yyyy/mm/dd" data-date-format="yyyy/mm/dd" type="text" name="tgl_berhenti" class="form-control col-md-12 col-sm-12 col-xs-12">
          </div>
        </div>

        </div>
      </div>
      <!--  3. Regis Akun Karyawan -->
      <div class="container">
      <div class="form-group" style="background:#fdfdfd;border-bottom:2px solid #dedede;border-top:2px solid #dedede;">
        <div class="col-md-12">
        <label for="middle-name" class="control-label"><h4><span  class="btn btn-primary btn-sm" style="border-radius:50%;">3.</span> Register Akun Karyawan</h4></label>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
            <label for="middle-name" class="control-label">Call Name <span >*</span></label>
            <input type="text" required  minlength="3" maxlength="30" name="call_name" placeholder="Call Name" class="form-control">
            </div>
          </div>

          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
            <label for="middle-name" class="control-label">User Name <span >*</span></label>
            <input type="text" required  minlength="5" maxlength="15" name="user" placeholder="User Name" class="form-control">
            </div>
          </div>

          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
            <label for="middle-name" class="control-label">Password <span >*</span></label>
            <input type="password" required minlength="8"  name="pass" placeholder="*************" class="form-control">
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-12 col-sm-12 col-xs-12" align="center">
      <button type="submit" class="btn btn-success" name="tambah">Daftar</button>
      </div>
    </div>
    </form>
    </div>
      <!--/div-->
    </div>
    </div>
</div>
</div>

  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

  <!-- gauge js -->
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/gauge/gauge.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/gauge/gauge_demo.js"></script>
  <!-- bootstrap progress js -->
  <script src="<?php echo base_url();?>assets/js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="<?php echo base_url();?>assets/js/icheck/icheck.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/moment/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/datepicker/daterangepicker.js"></script>
  <!-- chart js -->
  <script src="<?php echo base_url();?>assets/js/chartjs/chart.min.js"></script>

  <script src="<?php echo base_url();?>assets/js/custom.js"></script>

  <!-- flot js -->
  <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/jquery.flot.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/jquery.flot.pie.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/jquery.flot.orderBars.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/jquery.flot.time.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/date.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/jquery.flot.spline.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/jquery.flot.stack.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/curvedLines.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/jquery.flot.resize.js"></script>

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

  <script>
    $(document).ready(function() {
      // [17, 74, 6, 39, 20, 85, 7]
      //[82, 23, 66, 9, 99, 6, 2]
      var data1 = [
        [gd(2012, 1, 1), 17],
        [gd(2012, 1, 2), 74],
        [gd(2012, 1, 3), 6],
        [gd(2012, 1, 4), 39],
        [gd(2012, 1, 5), 20],
        [gd(2012, 1, 6), 85],
        [gd(2012, 1, 7), 7]
      ];

      var data2 = [
        [gd(2012, 1, 1), 82],
        [gd(2012, 1, 2), 23],
        [gd(2012, 1, 3), 66],
        [gd(2012, 1, 4), 9],
        [gd(2012, 1, 5), 119],
        [gd(2012, 1, 6), 6],
        [gd(2012, 1, 7), 9]
      ];
      $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
        data1, data2
      ], {
        series: {
          lines: {
            show: false,
            fill: true
          },
          splines: {
            show: true,
            tension: 0.4,
            lineWidth: 1,
            fill: 0.4
          },
          points: {
            radius: 0,
            show: true
          },
          shadowSize: 2
        },
        grid: {
          verticalLines: true,
          hoverable: true,
          clickable: true,
          tickColor: "#d5d5d5",
          borderWidth: 1,
          color: '#fff'
        },
        colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
        xaxis: {
          tickColor: "rgba(51, 51, 51, 0.06)",
          mode: "time",
          tickSize: [1, "day"],
          //tickLength: 10,
          axisLabel: "Date",
          axisLabelUseCanvas: true,
          axisLabelFontSizePixels: 12,
          axisLabelFontFamily: 'Verdana, Arial',
          axisLabelPadding: 10
            //mode: "time", timeformat: "%m/%d/%y", minTickSize: [1, "day"]
        },
        yaxis: {
          ticks: 8,
          tickColor: "rgba(51, 51, 51, 0.06)",
        },
        tooltip: false
      });

      function gd(year, month, day) {
        return new Date(year, month - 1, day).getTime();
      }
    });
  </script>

  <!-- worldmap -->
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/maps/jquery-jvectormap-2.0.3.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/maps/gdp-data.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/maps/jquery-jvectormap-world-mill-en.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/maps/jquery-jvectormap-us-aea-en.js"></script>
  <!-- pace -->
  <script src="<?php echo base_url();?>assets/js/pace/pace.min.js"></script>

  <script type="text/javascript">
$(document).ready(function(){
  $('#email').on('submit',function(e) {
  $.ajax({
      url:'subscribe_act.php', //nama action script php sobat
      data:$(this).serialize(),
      type:'POST',
      success:function(data){
        console.log(data);
     swal("Success!", "Message sent!", "success");
      },
      error:function(data){
     swal("Oops...", "Something went wrong :(", "error");
      }
    });
    e.preventDefault();
  });
});
</script>



  <script>
    $(function() {
      $('#world-map-gdp').vectorMap({
        map: 'world_mill_en',
        backgroundColor: 'transparent',
        zoomOnScroll: false,
        series: {
          regions: [{
            values: gdpData,
            scale: ['#E6F2F0', '#149B7E'],
            normalizeFunction: 'polynomial'
          }]
        },
        onRegionTipShow: function(e, el, code) {
          el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
        }
      });
    });
  </script>
  <!-- skycons -->
  <script src="js/skycons/skycons.min.js"></script>
  <script>
    var icons = new Skycons({
        "color": "#73879C"
      }),
      list = [
        "clear-day", "clear-night", "partly-cloudy-day",
        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
        "fog"
      ],
      i;

    for (i = list.length; i--;)
      icons.set(list[i], list[i]);

    icons.play();
  </script>

  <!-- dashbord linegraph -->
  <script>
    Chart.defaults.global.legend = {
      enabled: false
    };

    var data = {
      labels: [
        "Symbian",
        "Blackberry",
        "Other",
        "Android",
        "IOS"
      ],
      datasets: [{
        data: [15, 20, 30, 10, 30],
        backgroundColor: [
          "#BDC3C7",
          "#9B59B6",
          "#455C73",
          "#26B99A",
          "#3498DB"
        ],
        hoverBackgroundColor: [
          "#CFD4D8",
          "#B370CF",
          "#34495E",
          "#36CAAB",
          "#49A9EA"
        ]

      }]
    };

    var canvasDoughnut = new Chart(document.getElementById("canvas1"), {
      type: 'doughnut',
      tooltipFillColor: "rgba(51, 51, 51, 0.55)",
      data: data
    });
  </script>
  <!-- /dashbord linegraph -->

  <script>
    NProgress.done();
  </script>

<script>
// cek data untuk menjaga tidak kedoubelan
function cekdata_doubel(){
 $.ajax({
   type:"POST",
   url:'<?php echo base_url('Register/ajax_cek');?>',
   data: $('#_formRemarks').serialize(),
   dataType: "JSON",
   success: function(data){

   },
   error: function(jqXHR, textStatus, errorThrown){

   }

 });
}
</script>

<script>
// menampilkan tanggal masuk
function autotgl_pengangkatan() {
  var cekstatus = $('[name="id_status_pegawai"]').val();
  if(cekstatus == '1'){
    document.getElementById("tgl_show").style.display = 'none';
    document.getElementById("tgl_show").name = '';
    document.getElementById("tgl_show").required = false;
    document.getElementById("tgl_hide").style.display = '';
    document.getElementById("tgl_hide").name = 'tgl_thn_pengangkatan';
  }else if (cekstatus == '2') {
    document.getElementById("tgl_show").style.display = 'none';
    document.getElementById("tgl_show").name = '';
    document.getElementById("tgl_show").required = false;
    document.getElementById("tgl_hide").style.display = '';
    document.getElementById("tgl_hide").name = 'tgl_thn_pengangkatan';
  }else {
    document.getElementById("tgl_hide").style.display = 'none';
    document.getElementById("tgl_hide").name = '';
    document.getElementById("tgl_show").required = true;
    document.getElementById("tgl_show").style.display = '';
    document.getElementById("tgl_show").name = 'tgl_thn_pengangkatan';
  }
}
</script>

</body>
</html>
