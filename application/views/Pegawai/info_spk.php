<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Info SPK <button class="btn btn-danger btn-xs" onclick="history.go(-1);">Kembali</button></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-info"></i> Info SPK</a></li>
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
         <?php foreach ($infoPekerjaan as $u) { ?>
          <div class="box" style="border-radius:1%;border-top:0px;box-shadow:0 10px 20px rgba(0, 0, 0, 0.2);">
          <div class="box-header" style="background:#3c8dbc;color:#fff;border-radius:2%;">
            <h3 class="box-title">Info Pekerjaan</h3>
          </div>
          <table class="table table-striped">
            <tbody>
             <tr>
              <td style="width:120px">No SPK</td>
              <td style="width:1px">:</td>
              <td><?php echo $u->no_report; ?></td>
             </tr>
             <tr>
              <td style="width:120px">Judul Pekerjaan</td>
              <td style="width:1px">:</td>
              <td><?php echo $u->judul_pekerjaan; ?></td>
             </tr>
             <tr>
              <td style="width:120px">Jenis Pekerjaan</td>
              <td style="width:1px">:</td>
              <td><?php echo $u->jenis_report; ?></td>
             </tr>
             <tr>
              <td>Category</td>
              <td style="width:1px">:</td>
              <td><?php echo $u->category; ?></td>
             </tr>
             <tr>
              <td>Jenis Report</td>
              <td style="width:1px">:</td>
              <td><?php echo $u->jenis_report; ?></td>
             </tr>
             <tr>
              <td>Jadwal Reminder</td>
              <td style="width:1px">:</td>
              <td><?php echo $u->waktu_jenis_report; ?></td>
             </tr>
             <tr>
              <td>Tanggal</td>
              <td style="width:1px">:</td>
              <td><?php echo $u->tgl_report; ?></td>
             </tr>
             <tr>
              <td>Reminder By</td>
              <td style="width:1px">:</td>
              <td><?php echo $u->reminder; ?></td>
             </tr>
             <tr>
              <td>Status</td>
              <td style="width:1px">:</td>
              <td><?php echo $u->status_report; ?></td>
             </tr>
             <tr>
               <td colspan="3">
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
             <tr>
               <td colspan="3">
                 <p style="font-weight:600;margin-bottom:5px;">Detail Pekerjaan</p>
                 <p class="message form-control" style="height:auto;"><?php echo $u->pekerjaan; ?></p>
               </td>
             </tr>
           </tbody>
          </table>
         </div>
         <?php } ?>
       </div>

       <div class="col-md-5 col-sm-12 col-xs-12">
         <?php foreach ($infoPekerjaan as $u) { ?>
          <div class="box" style="border-radius:1%;border-top:0px;box-shadow:0 10px 20px rgba(0, 0, 0, 0.2);">
          <div class="box-header" style="background:#3c8dbc;color:#fff;border-radius:2%;">
            <h3 class="box-title">Created By SPK</h3>
          </div>
          <table class="table table-striped">
            <tbody>
             <tr>
              <td style="width:120px">Created By SPK</td>
              <td style="width:1px">:</td>
              <td><?php echo $u->call_name; ?></td>
             </tr>
             <tr>
              <td style="width:120px">Waktu</td>
              <td style="width:1px">:</td>
              <td><?php echo $u->tgl_created_by_spk.' / '.$u->waktu_created_by_spk; ?></td>
             </tr>
           </tbody>
          </table>
         </div>
         <?php } ?>
       </div>

      </div>
     </div>
    </div>
    </div>
  </section>
</div>

<script>
setTimeout(update_notifikasi,500);
function update_notifikasi() {
  $.ajax({url : "<?php echo base_url('F_ajax/Ajax/updateInfo_notifikasi/'.$noReport);?>"});
}
</script>
