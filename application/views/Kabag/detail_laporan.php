<?php $to = DateTime::createFromFormat ('dmY', $_tgl);
$date_tgl = $to->format('d/m/Y'); ?>
<form id="form_backHistory" method="post" action="<?php echo base_url('Kabag/Home/History_Laporan/'.$idpgw.'/'.$call_name);?>">
  <input type="hidden" name="tgl" value="<?php echo $date_tgl; ?>">
</form>
<script>
  function backpage() {
    document.getElementById("form_backHistory").submit();
  }
</script>
<!-- back to history -->


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Detail Laporan &nbsp;&nbsp;<small><?php echo $call_name .' || '.$date_tgl; ?></small>
      <?php
      if(!empty($urladd)){
        echo '<a href="javascript:window.history.go(-1);" class="btn btn-danger btn-xs">Kembali</a>';
      }else {
        echo '<button type="button" onclick="backpage()" class="btn btn-danger btn-xs">Kembali</button>';
      }
      ?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-bookmark"></i> Data Pekerjaan</a></li>
      <li class="active">Anggota Pekerja</li>
      <li class="active">History Laporan</li>
      <li class="active">Detail Laporan</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
    <!-- Detail -->
    <div class="col-md-12">
     <div class="box box-primary">
      <div class="box-body">
       <div class="col-md-5">
        <?php foreach ($tabelPekerjaan as $u) { ?>
        <div class="form-group col-md-12">
         <table class="table table-striped">
           <tbody>
            <tr>
             <td colspan="2" style="background:#3c8dbc;color:#fff;font-size:18px;"> Pekerjaan</td>
            </tr>
            <tr>
             <td style="width:120px">Jenis Pekerjaan</td>
             <td>: <?php echo $u->jenis_report; ?></td>
            </tr>
            <tr>
             <td>Category</td>
             <td>: <?php echo $u->category; ?></td>
            </tr>
            <tr>
             <td>Jenis Report</td>
             <td>: <?php echo $u->jenis_report; ?></td>
            </tr>
            <tr>
             <td>Jadwal Reminder</td>
             <td>: <?php echo $u->waktu_jenis_report; ?></td>
            </tr>
            <tr>
             <td>Tanggal</td>
             <td>: <?php echo $u->tgl_report; ?></td>
            </tr>
            <tr>
             <td>Reminder By</td>
             <td>: <?php echo $u->reminder; ?></td>
            </tr>
            <tr>
             <td>Status</td>
             <td>: <?php echo $u->status_report; ?></td>
            </tr>
            <tr>
              <td colspan="2">
                <div class="progress-group">
                 <span class="progress-text">Persentasi Pekerjaan</span>
                 <span class="progress-number"><b><?php echo $u->progress_bar; ?>%</b></span>
                 <?php $cekBG = $u->progress_bar;
                   if($cekBG < '35'){
                     $Cbg = 'class="progress-bar progress-bar-red"';
                   }else if($cekBG < '65'){
                     $Cbg = 'class="progress-bar progress-bar-yellow"';
                   }else{
                     $Cbg = 'class="progress-bar progress-bar-green"';
                   }
                 ?>
                 <div class="progress">
                   <div <?php echo $Cbg; ?> style="width:<?php echo $u->progress_bar;?>%">
                     <b><?php echo $u->progress_bar; ?>%</b>
                   </div>
                 </div>
               </div>
              </td>
            </tr>
          </tbody>
         </table>
        </div>
        <div class="form-group col-md-12">
          <label for="message-text" class="control-label">Detail Pekerjaan :</label>
          <p class="message form-control" style="height:auto;"><?php echo $u->pekerjaan; ?></p>
        </div>
        <?php } ?>
       </div>

       <div class="col-md-5">
         <div class="form-group col-md-12">
          <table class="table table-striped">
           <tbody>
            <tr>
             <td colspan="3" style="background:#3c8dbc;color:#fff;font-size:18px;">Detail Laporan</td>
            </tr>
            <?php if(!empty($laporan_text)){ foreach ($laporan_text as $u) { ?>
            <tr>
             <td style="width:120px">Waktu Laporan</td>
             <td width="1px">:</td>
             <td ><?php echo $u->tgl_update .' '. $u->time_update; ?></td>
            </tr>
            <tr>
             <td style="width:120px">Progress</td>
             <td width="1px">:</td>
             <td ><?php echo $u->status_report .' / '. $u->update_progress; ?>%</td>
            </tr>
            <tr>
             <td colspan="3">
               <label for="message-text" class="control-label">Isi Laporan :</label>
               <div class="message form-control" style="height:auto;"><?php echo $u->isi_update; ?></div>
             </td>
            </tr>
            <?php } }else { ?>
            <tr>
              <td colspan="3">
                <p class="message">Tidak ada laporan text</p>
              </td>
            </tr>
            <?php } ?>
           </tbody>
          </table>
         </div>

         <div class="form-group col-md-12">
           <label for="message-text" class="control-label">Gambar :</label><br>
         <?php if(!empty($img_laporan)){ foreach ($img_laporan as $u) { ?>
           <img class="img-thumbnail" onclick="upimg('#popimg<?php echo $u->id_upload_image; ?>')" style="width:50px;height:50px;cursor: pointer;" src="<?php echo base_url('uploads/laporan/'.$u->img_upload); ?>" id="popimg<?php echo $u->id_upload_image; ?>" data-toggle="modal" data-target="#myModal">
         <?php } }else { ?>
           <p class="message">Tidak ada gambar</p>
         <?php } ?>
         </div>
       </div>

      </div>
     </div>
    </div>
    </div>
  </section>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-body">
     <img class="showimage img-responsive" rows="2" src="">
    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </div>
  </div>
</div>

<script>
function upimg(id){
  var popimg = $(id).attr('src');
  console.log(popimg);
  $('#myModal').on('show.bs.modal', function(){
  $(".showimage").attr("src", popimg);
  });
}
</script>
