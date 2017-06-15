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

  <title>Result ::</title>

  <!-- Bootstrap core CSS -->

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
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" />

  <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/nprogress.js"></script>

  <!-- Script TinyMCE -->
<script src="<?php echo base_url();?>assets/tinymce/js/tinymce/tinymce.dev.js"></script>
<script src="<?php echo base_url();?>assets/tinymce/js/tinymce/plugins/table/plugin.dev.js"></script>
<script src="<?php echo base_url();?>assets/tinymce/js/tinymce/plugins/paste/plugin.dev.js"></script>
<script src="<?php echo base_url();?>assets/tinymce/js/tinymce/plugins/spellchecker/plugin.dev.js"></script>
<!-- End Script TinyMCE -->

   <style>
   .myImg {
       border-radius: 5px;
       cursor: pointer;
       transition: 0.3s;
   }

   .myImg:hover {opacity: 0.7;}

   /* The Modal (background) */
   .modal {
       display: none; /* Hidden by default */
       position: fixed; /* Stay in place */
       z-index: 1; /* Sit on top */
       padding-top: 100px; /* Location of the box */
       left: 0;
       top: 0;
       width: 100%; /* Full width */
       height: 100%; /* Full height */
       overflow: auto; /* Enable scroll if needed */
       background-color: rgb(0,0,0); /* Fallback color */
       background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
   }

   /* Modal Content (image) */
   .modal-content {
       margin: auto;
       display: block;
       width: 80%;
       max-width: 700px;
   }

   /* Caption of Modal Image */
   #caption {
       margin: auto;
       display: block;
       width: 80%;
       max-width: 700px;
       text-align: center;
       color: #ccc;
       padding: 10px 0;
       height: 150px;
   }

   /* Add Animation */
   .modal-content, #caption {
       -webkit-animation-name: zoom;
       -webkit-animation-duration: 0.6s;
       animation-name: zoom;
       animation-duration: 0.6s;
   }

   @-webkit-keyframes zoom {
       from {-webkit-transform:scale(0)}
       to {-webkit-transform:scale(1)}
   }

   @keyframes zoom {
       from {transform:scale(0)}
       to {transform:scale(1)}
   }

   /* The Close Button */
   .close {
       position: absolute;
       top: 15px;
       right: 35px;
       color: #f1f1f1;
       font-size: 40px;
       font-weight: bold;
       transition: 0.3s;
   }

   .close:hover,
   .close:focus {
       color: #bbb;
       text-decoration: none;
       cursor: pointer;
   }

   /* 100% Image Width on Smaller Screens */
   @media only screen and (max-width: 700px){
       .modal-content {
           width: 100%;
       }
   }
   #snackbar2 {
       visibility: hidden;
       min-width: 250px;
       margin-left: -200px;
       background-color: #51c182;
       color: #fff;
       text-align: center;
       border-radius: 2px;
       padding: 10px 15px;
       position: fixed;
       z-index: 1;
       left: 50%;
       top: 20%;
       font-size: 17px;
   }

   #snackbar2.show {
       visibility: visible;
       -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
       animation: fadein 0.5s, fadeout 0.5s 2.5s;
   }

   @-webkit-keyframes fadein {
       from {top: 0; opacity: 0;}
       to {top: 20%; opacity: 1;}
   }

   @keyframes fadein {
       from {top: 0; opacity: 0;}
       to {top: 20%; opacity: 1;}
   }

   @-webkit-keyframes fadeout {
       from {top: 20%; opacity: 1;}
       to {top: 0; opacity: 0;}
   }

   @keyframes fadeout {
       from {top: 20%; opacity: 1;}
       to {top: 0; opacity: 0;}
   }
   </style>


</head>


<body style="background:none;">

<div class="right_col" role="main">
  <div class="">
  <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="col-md-12 col-sm-12 col-xs-12" style="background:#f5f5f5;border-top:3px solid #337ab7;"><?php if($view_karyawan == 0){
            echo 'Tidak Ada Karyawan';
      }else{


        foreach($view_karyawan as $u){ ?>
        <h2 style="font-size:30px;" align="center">
          <?php $atf = $u->id_status_akun;
        if($atf == "2"){
        $color='style="color:#42a723;"';
        }else{ $color='style="color:#b7b7b7;"'; ?>
        <div id="snackbar2"><i class="fa fa-hourglass-half fa-spin" aria-hidden="true" style="font-size:25px;"> </i><br><br>Please.. wait for confirmation from the admin</div>
        <script>
            var x = document.getElementById("snackbar2")
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show",""); }, 2500);
        </script>
        <?php } ?>

        <i class="fa fa-user" <?php echo $color; ?> aria-hidden="true"></i> <?php echo $u->nama_lengkap; ?></h2> <?php } } ?>
      </div>

          <div class="x_content">
            <br />


  <?php if($view_karyawan == 0){
       echo '<tr><td colspan="3">Tidak Ada Karyawan</td></tr>';
   }else{

   foreach($view_karyawan as $u){ ?>

    <!-- 1. Info Kendaraan -->
    <div class="form-group">
      <div class="col-md-12 col-xm-12 col-sm-12">
        <label align="center"><a href="<?php echo base_url('Register/one'); ?>" class="btn btn-warning">Kembali</a></label>
      </div>

      <div class="col-md-12">
      <label for="middle-name" class="control-label"><h4><span  class="btn btn-primary btn-sm" style="border-radius:50%;">1.</span> Data Pribadi </h4>
      </label>
      </div>

        <div class="col-md-4 col-xs-12 col-sm-12">
         <div class="form-group" style="background:#f7f7f7;color:#337ab7;border-top:3px solid #04579e;">
          <table class="table">
          <thead class="thead-inverse">
            <tr style="background:#04579e;color:#f7f7f7;font-size:15px;text-align:center;"><td colspan="3">Data Pribadi</td></tr>
            <tr>
             <td width="150px">Nama</td>
             <td width="1px">:</td>
             <td><?php echo $u->nama_lengkap; ?></td>
            </tr>
            <tr>
             <td>Tgl Lahir</td>
             <td>:</td>
             <td><?php echo $u->tgl_lahir;?></td>
            </tr>
            <tr>
             <td>Agama</td>
             <td>:</td>
             <td><?php echo $u->agama;?></td>
            </tr>
            <tr>
             <td>Jenis Kelamin</td>
             <td>:</td>
             <td><?php echo $u->jenis_kelamin;?></td>
            </tr>
            <tr>
             <td>Asal Kota</td>
             <td>:</td>
             <td><?php echo $u->asal_kota;?></td>
            </tr>
            <tr>
             <td>Alamat</td>
             <td>:</td>
             <td><?php echo $u->alamat;?></td>
            </tr>
            <tr>
             <td>Email</td>
             <td>:</td>
             <td><?php echo $u->email;?></td>
            </tr>
            <tr>
             <td>No HP</td>
             <td>:</td>
             <td><?php echo $u->no_hp;?></td>
            </tr>
            <tr>
             <td>Lulusan</td>
             <td>:</td>
             <td><?php echo $u->lulusan;?></td>
            </tr>
            <tr>
             <td>Status Perkawinan</td>
             <td>:</td>
             <td><?php echo $u->status_perkawinan;?></td>
            </tr>
            <tr>
             <td>Nama Suami / Istri</td>
             <td>:</td>
             <td><?php echo $u->nama_suami_istri; ?></td>
            </tr>
            <tr>
             <td>Jumlah Anak</td>
             <td>:</td>
             <td><?php echo $u->jumlah_anak; ?></td>
            </tr>
            <tr>
             <td>File KTP</td>
             <td>:</td>
             <td><img id="myImg" src="<?php echo base_url();?>uploads/ktp/<?php echo $u->foto_ktp; ?>" alt="<?php echo $u->foto_ktp; ?>" width="250" height="10" style="border:1px solid #d8d8d8;" class="img-thumbnail myImg"></td>
            </tr>
          </thead>
          </table>
         </div>
        </div>

        <div class="col-md-4 col-xs-12 col-sm-12">
          <div class="form-group" style="background:#f7f7f7;color:#337ab7;border-top:3px solid #04579e;">
          <table class="table">
          <thead class="thead-inverse">

            <tr style="background:#04579e;color:#f7f7f7;font-size:15px;text-align:center;">
              <td colspan="3">Keterangan Keluarga</td>
            </tr>
            <tr>
              <td width="100px">Nama Ayah</td>
              <td width="1px">:</td>
              <td><?php echo $u->nama_ayah; ?></td>
            </tr>
            <tr>
              <td>Nama Ibu</td>
              <td>:</td>
              <td><?php echo $u->nama_ibu; ?></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td><?php echo $u->alamat_orang_tua; ?></td>
            </tr>
            <tr>
              <td>Kota</td>
              <td>:</td>
              <td><?php echo $u->kota_orang_tua; ?></td>
            </tr>
            <tr>
              <td>Telpon</td>
              <td>:</td>
              <td><?php echo $u->no_hp_orang_tua; ?></td>
            </tr>

            <tr style="background:#04579e;color:#f7f7f7;font-size:15px;text-align:center;">
              <td colspan="3">Orang Yang Dapat Di Hubungi</td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td><?php echo $u->nama_orang_dekat; ?></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td><?php echo $u->alamat_orang_dekat; ?></td>
            </tr>
            <tr>
              <td>Hubungan</td>
              <td>:</td>
              <td><?php echo $u->hubungan; ?></td>
            </tr>
            <tr>
              <td>Kota</td>
              <td>:</td>
              <td><?php echo $u->kota_orang_dekat; ?></td>
            </tr>
            <tr>
              <td>Telpon</td>
              <td>:</td>
              <td><?php echo $u->no_hp_orang_dekat; ?></td>
            </tr>

          </thead>
          </table>
          </div>
        </div>

        <div class="col-md-4 col-xs-12 col-sm-12">
          <div class="form-group" style="background:#f7f7f7;color:#337ab7;border-top:3px solid #04579e;">
          <table class="table">
          <thead class="thead-inverse">

            <tr style="background:#04579e;color:#f7f7f7;font-size:15px;text-align:center;">
              <td colspan="3">Pekerjaan Sebelumnya</td>
            </tr>
            <tr>
              <td width="150px">Nama Perusahaan</td>
              <td width="1px">:</td>
              <td><?php echo $u->nama_perusahaan_lama; ?></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td><?php echo $u->alamat_perusahaan_lama; ?></td>
            </tr>
            <tr>
              <td>Jabatan</td>
              <td>:</td>
              <td><?php echo $u->jabatan_lama; ?></td>
            </tr>
            <tr>
              <td>Contacnt Person Lama</td>
              <td>:</td>
              <td><?php echo $u->contact_person; ?></td>
            </tr>
            <tr>
              <td>Telpon</td>
              <td>:</td>
              <td><?php echo $u->no_telpon_perusahaan_lama; ?></td>
            </tr>

            <tr style="background:#04579e;color:#f7f7f7;font-size:15px;text-align:center;"><td colspan="3">Akun Bank</td></tr>
            <tr><td>Nama Bank</td><td>:</td><td><?php echo $u->nama_bank; ?></td></tr>
            <tr><td>No. Akun</td><td>:</td><td><?php echo $u->no_akun_bank; ?></td></tr>
            <tr><td>Nama Pemilik</td><td>:</td><td><?php echo $u->nama_pemilik; ?></td></tr>
            <tr><td>Cabang Bank</td><td>:</td><td><?php echo $u->cabang_bank; ?></td></tr>
            <tr><td>Kota</td><td>:</td><td><?php echo $u->kota_bank; ?></td></tr>

          </thead>
          </table>
          </div>
        </div>

    <!-- 2. Info Data STNK -->
    <div class="form-group">
      <div class="col-md-12 col-xs-12 col-sm-12">
      <label for="middle-name" class="control-label"><h4><span  class="btn btn-primary btn-sm" style="border-radius:50%;">2.</span> Data Pegawai dan Akun User Name</h4></label>
      </div>

        <div class="col-md-6 col-xs-12 col-sm-12">
          <div class="form-group" style="background:#f7f7f7;color:#337ab7;border-top:3px solid #04579e;">
          <table class="table">
          <thead class="thead-inverse">
            <tr style="background:#04579e;color:#f7f7f7;font-size:15px;text-align:center;"><td colspan="3">Data Pegawai</td></tr>
            <tr>
              <td width="160px">Kode</td>
              <td width="1px">:</td>
              <td><?php echo $u->kode_pegawai; ?></td>
            </tr>
            <tr>
              <td>NIP</td>
              <td>:</td>
              <td><?php echo $u->nip; ?></td>
            </tr>
            <tr>
              <td>Nama Pegawai</td>
              <td>:</td>
              <td><?php echo $u->nama_lengkap; ?></td>
            </tr>
            <tr>
              <td>Tanggal Masuk</td>
              <td>:</td>
              <td><?php echo $u->tgl_thn_masuk; ?></td>
            </tr>
            <tr>
              <td>Tanggal Pengangkatan</td>
              <td>:</td>
              <td><?php echo $u->tgl_thn_pengangkatan; ?></td>
            </tr>
            <tr>
              <td>Divisi</td>
              <td>:</td>
              <td><?php echo $u->divisi; ?></td>
            </tr>
            <tr>
              <td>No KTP</td>
              <td>:</td>
              <td><?php echo $u->no_ktp; ?></td>
            </tr>
            <tr>
              <td>PTKP</td>
              <td>:</td>
              <td><?php echo $u->ptkp; ?></td>
            </tr>
            <tr>
              <td>Tgl Batas</td>
              <td>:</td>
              <td><?php echo $u->tgl_batas; ?></td>
            </tr>
            <tr>
              <td>Kode Shif</td>
              <td>:</td>
              <td><?php echo $u->kode_shif; ?></td>
            </tr>
            <tr>
              <td>Jumlah Hutang</td>
              <td>:</td>
              <td>Rp. <?php echo number_format($u->jumlah_hutang , 0, ',', '.'); ?></td>
            </tr>
            <tr>
              <td>Jatuh Tempo Hutang</td>
              <td>:</td>
              <td><?php echo $u->jatuh_tempo_hutang; ?></td>
            </tr>
            <tr>
              <td>Status Pegawai</td>
              <td>:</td>
              <td><?php echo $u->status_pegawai; ?></td>
            </tr>
            <tr>
              <td>Port Pegawai</td>
              <td>:</td>
              <td><?php echo $u->nama_port; ?></td>
            </tr>
            <tr>
              <td>Tgl Berhenti</td>
              <td>:</td>
              <td><?php echo $u->tgl_berhenti; ?></td>
            </tr>
          </thead>
          </table>
          </div>
        </div>


        <div class="col-md-6 col-xs-12 col-sm-12">
          <div class="form-group" style="background:#f7f7f7;color:#337ab7;border-top:3px solid #04579e;">
          <table class="table">
          <thead class="thead-inverse">
            <tr style="background:#04579e;color:#f7f7f7;font-size:15px;text-align:center;"><td colspan="3">User Pegawai</td></tr>
            <tr>
              <td width="120px">Call Name</td>
              <td width="1px">:</td>
              <td><?php echo $u->call_name; ?></td>
            </tr>
            <tr>
              <td>User Name</td>
              <td>:</td>
              <td><?php echo $u->user; ?></td>
            </tr>
            <tr>
              <td>Status</td>
              <td>:</td>
              <td><?php $le = $u->id_status_akun; if($le == 2){echo "Sudah di Konfirmasi";}else{echo "Menunggu Proses Konfirmasi";} ?></td>
            </tr>
            <tr>
             <td>Img Pegawai</td>
             <td>:</td>
             <td><img id="myImg2" src="<?php echo base_url();?>uploads/pegawai/<?php echo $u->foto_pegawai; ?>" alt="<?php echo $u->foto_pegawai; ?>" width="250" height="10" style="border:1px solid #d8d8d8;" class="img-thumbnail myImg"></td>
            </tr>
          </thead>
          </table>
          </div>
        </div>

      </div>



      <?php } } ?>

      <!--div class="form-group">
      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
      <button type=reset value=Kembali onclick=self.history.back() class="btn btn-danger">Back</button-->
      <!--button type="reset" class="btn btn-warning">Reset</button>
      <button type="submit" class="btn btn-success" value="klik" name="tambah">Submit</button-->
      </div>
      </div>

      </div>
      </div>
    </div>
</div>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var img2 = document.getElementById('myImg2');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}
img2.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
</script>


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

   <script type="text/javascript">
       function validepopupform2(nama_kendaraan, no_polisi){
              window.opener.document.form_laporan_kerusakan.nama_kendaraan.value=nama_kendaraan;
              window.opener.document.form_laporan_kerusakan.no_polisi.value=no_polisi;
         self.close();
            }
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
<!-- datepicker -->
<script type="text/javascript">
  $(document).ready(function() {

    var cb = function(start, end, label) {
      console.log(start.toISOString(), end.toISOString(), label);
      $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
    }

    var optionSet1 = {
      startDate: moment().subtract(29, 'days'),
      endDate: moment(),
      minDate: '01/01/2012',
      maxDate: '12/31/2015',
      dateLimit: {
        days: 60
      },
      showDropdowns: true,
      showWeekNumbers: true,
      timePicker: false,
      timePickerIncrement: 1,
      timePicker12Hour: true,
      ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      opens: 'left',
      buttonClasses: ['btn btn-default'],
      applyClass: 'btn-small btn-primary',
      cancelClass: 'btn-small',
      format: 'MM/DD/YYYY',
      separator: ' to ',
      locale: {
        applyLabel: 'Submit',
        cancelLabel: 'Clear',
        fromLabel: 'From',
        toLabel: 'To',
        customRangeLabel: 'Custom',
        daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        firstDay: 1
      }
    };
    $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
    $('#reportrange').daterangepicker(optionSet1, cb);
    $('#reportrange').on('show.daterangepicker', function() {
      console.log("show event fired");
    });
    $('#reportrange').on('hide.daterangepicker', function() {
      console.log("hide event fired");
    });
    $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
      console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
    });
    $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
      console.log("cancel event fired");
    });
    $('#options1').click(function() {
      $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
    });
    $('#options2').click(function() {
      $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
    });
    $('#destroy').click(function() {
      $('#reportrange').data('daterangepicker').remove();
    });
  });
</script>


<script>
  NProgress.done();
</script>
<!-- /datepicker -->
<!-- /footer content -->
</body>

</html>
