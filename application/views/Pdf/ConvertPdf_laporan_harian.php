<html>
<head>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!--===> Cop Laporan <===-->
<div style="padding:0;margin:0;">
  <div style="width:50%;float:left;font-size:12px;">
  <h3 style="margin:0;font-family:arial;">GlobalXtreme</h3>
  <p style="margin:0;font-family:arial,sans-serif;font-size:10px;">Jl. Raya Kerobokan 388x Br. Semer,<br>Kuta, Bali (80361) Indonesia</p>
  <p style="margin:0;font-family:arial,sans-serif;font-size:10px;">P. (0361) 736811 </p>
  <p style="margin:0;font-family:arial,sans-serif;font-size:10px;">E. info@globalxtreme.net</p>
  </div>
  <div style="width:50%;float:right;font-size:12px;">
    <p style="text-align:right;margin:0;padding-right:35px;"><img src="./assets-admin/img/logo.png"></p>
  </div>
</div>
<!-- laporan pekerjaan -->
<div class="counter" style="padding:0;margin:0;">
  <p style="font-family:'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;text-align:center;font-size:15px;">Laporan Pekerjaan</p>
  <table style="font-size:12px;">
    <tr>
      <td>Nama Pegawai</td><td>:</td><td><?php echo $_SESSION['NamaPegawai']; ?></td>
    </tr>
    <tr>
      <td>Port / Divisi</td><td>:</td><td><?php echo $_SESSION['NamaPort'].' / '.$_SESSION['NamaDivisi']; ?></td>
    </tr>
    <tr>
      <td>Tanggal Laporan</td><td>:</td><td><?php echo date('d/m/Y'); ?></td>
    </tr>
  </table>
</div>
<br>
<table  style="font-family:'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;font-size:12px;border-collapse:none;margin:0;" width="100%">
  <tbody>
   <?php if(!empty($laporan)){
     foreach ($laporan as $u) {
   ?>
   <tr>
    <td style="height:0px;border-top:1px solid #d6d6d6;font-size:14px;" colspan="3"></td>
   </tr>
   <tr>
     <td style="height:20px;width:149;padding:0 6px 0 6px;">Judul Pekerjaan</td>
     <td width="3px">:</td>
     <td style="padding:0 6px 0 6px;"><?php echo $u->judul_pekerjaan; ?></td>
   </tr>
   <tr>
     <td style="height:20px;width:149;padding:0 6px 0 6px;">Category / Persentasi</td>
     <td width="3px">:</td>
     <td style="padding:0 6px 0 6px;"><?php echo $u->category. ' / ' .$u->progress_bar.'%'; ?></td>
   </tr>
   <tr>
     <td style="height:20px;padding:0 6px 0 6px;">Status / Jenis Pekerjaan</td>
     <td width="3px">:</td>
     <td style="padding:0 6px 0 6px;"><?php echo $u->status_report.' / '.$u->nama_pekerjaan; ?></td>
   </tr>
   <tr>
     <td style="height:20px;padding:0 6px 0 6px;">Jenis Laporan / Waktu</td>
     <td width="3px">:</td>
     <td style="height:30px;padding:0 6px 0 6px;"><?php echo $u->jenis_report.' - '.$u->tgl_update.' '.$u->time_update; ?></td>
   </tr>
   <tr>
     <td style="height:20px;padding:0 6px 0 6px;" valign="top">Isi laporan</td>
     <td width="3px" valign="top">:</td>
     <td style="height:20px;padding:0 6px 5px 6px;"><?php echo $u->isi_update; ?></td>
   </tr>
   <?php } }else {?>
   <tr style="background:#f1f1f1;">
     <td style="height:30px;text-align:center;font-size:14px;" colspan="6">Laporan belum di buat</td>
   </tr>
   <tr>
    <td style="" colspan="2"></td>
   </tr>
   <?php } ?>
  </tbody>
</table>
<!--br>
<br>
<table>
  <tr>
    <td valign="top"><img src="./uploads/laporan/590da4be5751206051706imgDSC_0185.jpg" height="80%"></td>
    <td valign="top"><img src="./uploads/laporan/59102f55c97c008051757imgketong.jpg"></td>
  </tr>
  <tr>
    <td><img src="./uploads/laporan/59102f55d4f5a08051757imgzf.jpg"></td>
    <td><img src="./uploads/laporan/59102f55d478a08051757imgwhit nana.jpg"></td>
  </tr>
</table-->

</body>
</html>
