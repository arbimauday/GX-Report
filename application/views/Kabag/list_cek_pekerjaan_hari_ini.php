<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Pekerjaan Hari Ini <small> <?php echo $nama_pekerja.' || '.$date_now; ?></small> <button class="btn btn-danger btn-xs" onclick="history.go(-1);">Kembali</button></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-bookmark"></i> Data Pekerjaan</a></li>
      <li class="active">Anggota Pekerja</li>
      <li class="active">Pekerjaan Hari Ini</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
    <div class="col-xs-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
       <li class="active"><a href="#routine" data-toggle="tab">Routine</a></li>
       <li><a href="#project" data-toggle="tab">Project</a></li>
       <li></li>
      </ul>

    <div class="tab-content">
     <div class="tab-pane active" id="routine">
      <section id="new">
        <!--h4 class="page-header">Report</h4-->
        <div class="box-body">
         <div class="table-responsive">
         <table id="example1" class="table table-bordered table-striped">
           <thead>
            <tr class="bg-blue">
             <th style="width:10px">Category</th>
             <th style="width:500px">Judul Pekerjaan</th>
             <th style="width:90px">Due Date</th>
             <th style="width:50px">Status</th>
             <th style="width:200px">Progress</th>
             <th width="15px">Keterangan</th>
             <th>Action</th>
            </tr>
           </thead>
           <tbody>
            <?php foreach ($table_routine as $u) { ?>
            <tr>
             <td><?php echo $u->category;?></td>
             <td><?php echo $u->judul_pekerjaan;?></td>
             <td><?php echo $u->jenis_report;?></td>
             <td><?php echo $u->status_report; ?></td>
             <td>
               <div class="progress-group">
                <span class="progress-text">Progress</span>
                <span class="progress-number"><b><?php echo $u->progress_bar; ?>%</b></span>
                <div class="progress xs">
                  <?php $cekBG = $u->progress_bar;
                    if($cekBG < '35'){
                      $Cbg = 'class="progress-bar progress-bar-red"';
                    }else if($cekBG < '65'){
                      $Cbg = 'class="progress-bar progress-bar-yellow"';
                    }else{
                      $Cbg = 'class="progress-bar progress-bar-green"';
                    }
                  ?>
                  <div <?php echo $Cbg;?> style="width:<?php echo $u->progress_bar;?>%"></div>
                </div>
              </div>
             </td>
             <td class="text-center">
              <?php
               if(!empty($u->ket_report)){
                echo '<i class="fa fa-check text-green"></i>';
               }else {
                echo '<i class="fa fa-remove text-red"></i>';
               }
              ?>
             </td>
             <td>
              <a href="<?php echo base_url('Kabag/Home/Remarks/'.$u->id_report); ?>" class="btn btn-primary btn-sm" style="padding:2px 6px;"><i class="fa fa-comments-o" style="font-size:20px;"></i></a>
              <?php
                $to = DateTime::createFromFormat ( "d/m/Y", $date_now );
                $date_con = $to->format('dmY');
              ?>
              <a href="<?php echo base_url('Kabag/Home/detail_laporan/'.$id_user_pegawai.'/'.$u->id_report.'/'.$date_con.'/'.$nama_pekerja.'/Url=add12927190218'); ?>" class="btn btn-default" style="background-color:#ecf0f5;">Lihat laporan</a>
             </td>
           </tr>
           <?php } ?>
          </tbody>
          </table>
        </div>
        </div>
      </section>
     </div>

     <!-- Table Project -->
     <div class="tab-pane" id="project">
       <div class="box-body">
        <div class="table-responsive">
        <table id="example3" class="table table-bordered table-striped">
          <thead>
           <tr class="bg-blue">
            <th style="width:10px">Category</th>
            <th style="width:500px">Judul Pekerjaan</th>
            <th style="width:90px">Due Date</th>
            <th style="width:50px">Status</th>
            <th style="width:200px">Progress</th>
            <th style="width:15px">Keterangan</th>
            <th>Action</th>
           </tr>
          </thead>
          <tbody>
            <?php foreach ($table_project as $u) { ?>
              <tr>
               <td><?php echo $u->category;?></td>
               <td><?php echo $u->judul_pekerjaan;?></td>
               <td><?php echo $u->jenis_report;?></td>
               <td><?php echo $u->status_report; ?></td>
               <td>
                 <div class="progress-group">
                  <span class="progress-text">Progress</span>
                  <span class="progress-number"><b><?php echo $u->progress_bar; ?>%</b></span>
                  <div class="progress xs">
                    <?php $cekBG = $u->progress_bar;
                      if($cekBG < '35'){
                        $Cbg = 'class="progress-bar progress-bar-red"';
                      }else if($cekBG < '65'){
                        $Cbg = 'class="progress-bar progress-bar-yellow"';
                      }else{
                        $Cbg = 'class="progress-bar progress-bar-green"';
                      }
                    ?>
                    <div <?php echo $Cbg;?> style="width:<?php echo $u->progress_bar;?>%"></div>
                  </div>
                </div>
               </td>
               <td class="text-center">
                <?php
                 if(!empty($u->ket_report)){
                  echo '<i class="fa fa-check text-green"></i>';
                 }else {
                  echo '<i class="fa fa-remove text-red"></i>';
                 }
                ?>
               </td>
               <td>
                <a href="<?php echo base_url('Kabag/Home/Remarks/'.$u->id_report); ?>" class="btn btn-primary btn-sm" style="padding:2px 6px;"><i class="fa fa-comments-o" style="font-size:20px;"></i></a>
                <?php
                  $to = DateTime::createFromFormat ( "d/m/Y", $date_now );
                  $date_con = $to->format('dmY');
                ?>
                <a href="<?php echo base_url('Kabag/Home/detail_laporan/'.$id_user_pegawai.'/'.$u->id_report.'/'.$date_con.'/'.$nama_pekerja.'/Url=add12927190218'); ?>" class="btn btn-default" style="background-color:#ecf0f5;">Lihat laporan</a>
               </td>
             </tr>
           <?php } ?>
         </tbody>
         </table>
         </div>
       </div>
     </div>

    </div>
    </div>
    </div>
    </div>
  </section>

</div>

<!-- Model membuat laporan -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-blue">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center text-white" id="exampleModalLabel">Remarks</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="form-group col-md-12">
            <label for="message-text" class="control-label">Pekerjaan</label>
            <p class="message form-control" id="kolompkj"></p>
          </div>

          <div class="form-group col-md-12">
            <table class="table table-striped">
              <tbody>
               <tr>
                <td style="width:120px">Jenis Pekerjaan</th>
                <td id="tdjp"></th>
               </tr>
               <tr>
                <td>Category</th>
                <td id="tdctg"></th>
               </tr>
               <tr>
                <td>Jenis Report</th>
                <td id="tdjrp"></th>
               </tr>
               <tr>
                <td>Jadwal Reminder</th>
                <td id="tdjdrm"></th>
               </tr>
               <tr>
                <td>Tanggal</th>
                <td id="tdtgl"></th>
               </tr>
               <tr>
                <td>Reminder By</th>
                <td id="tdrb"></th>
               </tr>
               <tr>
                <td>Status</th>
                <td id="tdst"></th>
               </tr>
               <tr>
                 <td colspan="2">
                   <div class="progress-group">
                    <span class="progress-text">Persentasi Pekerjaan</span>
                    <span class="progress-number"><b id="bviewTop"></b></span>
                    <div class="progress">
                      <div id="widthProgress"><b></b></div>
                    </div>
                  </div>
                 </td>
               </tr>
             </tbody>
            </table>
          </div>
        <!-- Remarks -->
        <div class="box-body">
        <div class="direct-chat-messages" id="_Remarks">
        </div>
        </div>
        <!-- tutup -->

        </div>
      </div>
      <div class="modal-footer" style="text-align:center;background:#f3f3f3;">
        <!--button type="button" onclick="inputLaporan()" class="btn btn-primary">Kirim</button-->
        <form  method="post" id="_formRemarks">
        <div class="input-group">
        <!-- data tersembunyi -->
        <input type="hidden" id="reportto_remarks" name="id_report">
        <input type="hidden" value="<?php echo $_SESSION['IdKabag']; ?>" name="idPengirim">
        <input type="hidden" value="1" name="status_pengirim">

        <input type="text" name="isi_remarks" placeholder="Message.." class="form-control">
        <span class="input-group-btn">
        <button type="button" onclick="inputRemarks()" class="btn btn-primary btn-flat">Send</button>
        </span>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
// ajax model view data
function modallaporan(id_report){
  $.ajax({
  url : "<?php echo base_url('F_ajax/Ajax/modallaporan/')?>" + id_report,
  dataType: "JSON",
  success: function(data){
    $('#reportto_remarks').val(id_report);
    $('#kolompkj').text(data[0].pekerjaan);
    $('#tdjp').text(': '+data[0].nama_pekerjaan);
    $('#tdctg').text(': '+data[0].category);
    $('#tdjrp').text(': '+data[0].jenis_report);
    $('#tdjdrm').text(': '+data[0].waktu_jenis_report);
    $('#tdtgl').text(': '+data[0].tgl_report);
    $('#tdrb').text(': '+data[0].reminder);
    $('#tdst').text(': '+data[0].status_report);
    $('#idsend').val(data[0].id_report);
    $('#widthProgress').css('width', data[0].progress_bar+'%');
    $('#widthProgress b').text(data[0].progress_bar+'%');
    $('#bviewTop').text(data[0].progress_bar+'%');
    //background progress_bar
    if(data[0].progress_bar < 35){
      $('#widthProgress').addClass("progress-bar progress-bar-red");
      $('#widthProgress').removeClass("progress-bar progress-bar-yellow");
      $('#widthProgress').addClass("progress-bar progress-bar-green");
    }else if (data[0].progress_bar < 65) {
      $('#widthProgress').addClass("progress-bar progress-bar-yellow");
      $('#widthProgress').removeClass("progress-bar progress-bar-red");
      $('#widthProgress').addClass("progress-bar progress-bar-green");
    }else {
      $('#widthProgress').addClass("progress-bar progress-bar-green");
      $('#widthProgress').removeClass("progress-bar progress-bar-red");
      $('#widthProgress').addClass("progress-bar progress-bar-yellow");
    }
    // remarks
    $('#_Remarks').html('');
    for(i=0;i<data[1].length;i++){
      $('#_Remarks').append(
        '<div class="direct-chat-msg '+data[1][i].posisi_kbg+'"><div class="direct-chat-info clearfix"><span class="direct-chat-name pull-'+data[1][i].posisi_kbg+'" id="viewhasil">'+data[1][i].call_name+'</span><span class="direct-chat-timestamp pull-'+data[1][i].posisi_pgw+'" id="nametitle">'+data[1][i].tgl_remarks+' '+data[1][i].time_remarks+'</span></div><img class="direct-chat-img" src="<?php echo base_url(); ?>assets-admin/dist/img/boxed-bg.jpg" alt="Message User Image"><div class="direct-chat-text">'+data[1][i].isi_remarks+'</div></div>'
      );
    }

    $('#exampleModal').modal('show');
  },
  error: function (jqXHR, textStatus, errorThrown){
    $('#exampleModal').modal('show');
  }
  });
}

//input Laporan
function inputRemarks(){
  var cek1 = $('[name="isi_remarks"]').val();

  if(cek1 ==''){
    swal({
      title: "",
      text: "Tidak bisa mengirim pesan kosong!",
      type: "error",
      timer: 1500,
      showConfirmButton: false
    });
  }else{
    $.ajax({
      url : "<?php echo base_url('F_ajax/Ajax/sendRemarks/')?>",
      type: "POST",
      data: $('#_formRemarks').serialize(),
      dataType: "JSON",
      success: function(data){
        $('#exampleModal').modal('hide');
        swal({
          title: "Sukses!",
          type: "success",
          showCancelButton: false,
          confirmButtonColor: "#149609",
          confirmButtonText: "Ok!",
          closeOnConfirm: true
        },function(){
          location.reload();
        });
      },
      error: function (jqXHR, textStatus, errorThrown){
        swal({
          title: "Gagal terkirim!",
          type: "error",
          showCancelButton: false,
          confirmButtonColor: "#F27474",
          confirmButtonText: "Ok",
          closeOnConfirm: true
        },function(){
          location.reload();
        });
      }
    });
  }
}
</script>
