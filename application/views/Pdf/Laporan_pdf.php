<html>
<head>
</head>
<body style="margin:0;padding:0;">
  <!--===> COP SURAT SPK <===-->
<div style="padding:0;margin:0;">
  <div style="width:50%;float:left;font-size:12px;">
  <h3 style="margin:0;font-family:arial;">GLOBALXTREME</h3>
  <p style="margin:0;font-family:arial,sans-serif;font-size:10px;">Jl. Raya Kerobokan 388x, Br Semer<br>Kuta, Bali (80361) Indonesia</p>
  <p style="margin:0;font-family:arial,sans-serif;font-size:10px;">P. (0361) 736811 </p>
  <p style="margin:0;font-family:arial,sans-serif;font-size:10px;">E. info@globalxtreme.net</p>
</div>
<div style="width:50%;float:right;font-size:12px;">
  <p style="text-align:right;margin:0;padding-right:30px;"><img src="./assets-admin/img/logo.png"></p>
</div>
  <!--hr style="margin-top:0;border:1px solid red;"-->
</div>
<br>
<!-- JUDUL SURAT-->
<div style="margin-top:0;font-size:17px;text-align:center;">
  Laporan Pekerjaan</div>

<!-- ISI KETERANGAN SPK -->
<div style="padding: 0px 10px;background:;border-radius:5px;margin:0;">
  <?php
     foreach($dataReport as $u){
   ?>
  <div style="width:100%;font-size:12px;">
  <table style="font-size:12px;">
    <tr>
      <td>Nama Pegawai</td><td>:</td><td><?php echo $u->call_name; ?></td>
    </tr>
    <tr>
      <td>Port / Divisi</td><td>:</td><td><?php echo $u->nama_port.' / '.$u->divisi; ?></td>
    </tr>
    <tr>
      <td>Judul Pekerjaan</td><td>:</td><td><?php echo $u->judul_pekerjaan; ?></td>
    </tr>
    <tr>
      <td>Status Pekerjaan</td><td>:</td><td><?php echo $u->status_report; ?></td>
    </tr>
    <tr>
      <td>Persentasi Pekerjaan</td><td>:</td><td><?php echo $u->progress_bar.'%'; ?></td>
    </tr>
  </table>
  </div>
  <?php } ?>
</div>


<!--  TABEL BARANG YANG DI BELI  -->
<div style="height:290px;margin:10px 0 0 0;">
  <table style="border-collapse:none;margin:0;" width="100%">
    <tr style="background:#3385ff;">
      <td style="text-align:center;height:30px;border-right:1px solid #4d94ff;" width="500">Laporan Pekerjaan</td>
      <td style="text-align:center;height:30px;border-right:1px solid #4d94ff;" width="150">Waktu Update</td>
    </tr>

    <?php
      foreach($dataUpdate as $u){
    ?>
    <tr style="text-align:center;background:#f7f7f7;border-bottom:1px solid #e6e6e6;height:30px;">
    <td style="padding-left:10px;border-right:1px solid #e6f0ff;border-bottom:1px solid #e6e6e6;"><?php echo $u->isi_update; ?></td>
    <td style="padding-left:10px;border-right:1px solid #e6f0ff;border-bottom:1px solid #e6e6e6;"><?php echo $u->tgl_update.' '.$u->time_update; ?></td>
    </tr>
    <?php } ?>

    <tr style="background:#3385ff;color:#fff;">
      <td style="text-align:center;height:30px;border-right:1px solid #4d94ff;" width="500">Laporan Progress</td>
      <td style="text-align:center;height:30px;border-right:1px solid #4d94ff;" width="150">Waktu Update</td>
    </tr>
    <?php
      foreach($dataProgress as $u){
    ?>
    <tr style="text-align:center;background:#f7f7f7;border-bottom:1px solid #e6e6e6;height:30px;">
    <td style="padding-left:10px;border-right:1px solid #e6f0ff;border-bottom:1px solid #e6e6e6;"><?php echo $u->isi_progress; ?></td>
    <td style="padding-left:10px;border-right:1px solid #e6f0ff;border-bottom:1px solid #e6e6e6;"><?php echo $u->tgl_progress.' '.$u->time_progress; ?></td>
    </tr>
    <?php } ?>
  </table>
</div>


</body>
</html>
