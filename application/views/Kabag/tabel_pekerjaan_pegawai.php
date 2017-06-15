<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Hasil Laporan <small><?php echo $nameSelect; ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-bookmark"></i> Laporan Pekerjaan</a></li>
      <li class="active">Anggota Pekerjaan</li>
      <li class="active">Hasil Laporan</li>
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
      </ul>
    <div class="tab-content">
     <!-- Table Routine -->
     <div class="tab-pane active" id="routine">
      <section id="new">
        <!--h4 class="page-header">Report</h4-->
        <div class="box-body">
         <div class="table-responsive">
         <table id="example1" class="table table-bordered table-striped">
           <thead>
            <tr class="bg-blue">
             <th style="width:10px">#</th>
             <th style="width:500px">Judul Pekerjaan</th>
             <th style="width:90px">Due Date</th>
             <th style="width:50px">Status</th>
             <th style="width:350px">Progress</th>
             <th>Action</th>
            </tr>
           </thead>
           <tbody>
            <?php $no = 0;
            foreach ($table_routine as $u) {
              $no += 1;
            ?>
            <tr>
             <td><?php echo $no;?></td>
             <td><?php echo $u->judul_pekerjaan;?></td>
             <td><?php echo $u->jenis_report;?></td>
             <td><?php echo $u->status_report; ?></td>
             <td>
               <div class="progress-group">
                <span class="progress-text">Laporan Progress</span>
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
             <td>
               <button data-toggle="tooltip" title="Action Laporan" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" style="padding:2px 6px;" onclick="modallaporan('<?php echo $u->id_report; ?>')"><i class="fa fa-external-link-square" style="font-size:20px;"></i></button>
               <button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="lihatlaporan('<?php echo $u->id_report; ?>','<?php echo $u->judul_pekerjaan; ?>')">Lihat Laporan</button>
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
            <th style="width:10px">#</th>
            <th style="width:500px">Judul Pekerjaan</th>
            <th style="width:60px">Due Date</th>
            <th style="width:50px">Status</th>
            <th style="width:350px">Progress</th>
            <th>Action</th>
           </tr>
          </thead>
          <tbody>
            <?php $no = 0;
            foreach ($table_project as $u) {
              $no += 1;
            ?>
            <tr>
             <td><?php echo $no;?></td>
             <td><?php echo $u->judul_pekerjaan;?></td>
             <td><?php echo $u->jenis_report;?></td>
             <td><?php echo $u->status_report; ?></td>
             <td>
               <div class="progress-group">
                <span class="progress-text">Laporan Progress</span>
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
             </td>
             <td>
               <button data-toggle="tooltip" title="Action Laporan" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" style="padding:2px 6px;" onclick="modallaporan('<?php echo $u->id_report; ?>')"><i class="fa fa-external-link-square" style="font-size:20px;"></i></button>
               <button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="lihatlaporan('<?php echo $u->id_report; ?>','<?php echo $u->judul_pekerjaan; ?>')">Lihat Laporan</button>
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

    <!-- *************************
    batas tabel dan box chat remark
    ****************************-->

    <!--div class="row">
    <div class="col-md-4">
      <div class="box box-primary direct-chat direct-chat-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Remarks Kabag to Staff</h3>
          <div class="box-tools pull-right">
          <span data-toggle="tooltip" title="3" class="badge bg-light-blue">3</span>
          <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
          <i class="fa fa-comments"></i></button>
          </div>
        </div>
        <!-- /.box-header ->
        <div class="box-body">
          <div class="direct-chat-messages">
            <div class="direct-chat-msg">
            <div class="direct-chat-info clearfix">
            <span class="direct-chat-name pull-left">Alexander Pierce</span>
            <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
            </div>
            <!-- /.direct-chat-info ->
            <img class="direct-chat-img" src="<?php echo base_url(); ?>assets-admin/dist/img/user1-128x128.jpg" alt="Message User Image">
            <div class="direct-chat-text">
              Send...
            </div>
            </div>

            <!-- Message to the right ->
            <div class="direct-chat-msg right">
            <div class="direct-chat-info clearfix">
            <span class="direct-chat-name pull-right">Sarah Bullock</span>
            <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
            </div>
            <img class="direct-chat-img" src="<?php echo base_url(); ?>assets-admin/dist/img/user3-128x128.jpg" alt="Message User Image">
            <div class="direct-chat-text">Message Text..</div>
            </div>
          </div>
        </div>
        <!-- /.box-body ->
        <div class="box-footer">
          <form method="post">
          <div class="input-group">
          <input type="text" placeholder="Type Message ..." class="form-control">
          <span class="input-group-btn">
          <button type="button" class="btn btn-primary btn-flat">Send</button>
          </span>
          </div>
          </form>
        </div>
        <!-- /.box-footer->
      </div>

    </div>

  </div-->
  </section>


</div>




<!-- Model membuat laporan -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-blue">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center text-white" id="exampleModalLabel">Laporan Pekerjaan</h4>
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

        <form id="formLaporan" method="post" >
          <input type="hidden" name="idReport" id="idsend">
          <div class="form-group col-md-12">
            <label for="recipient-name" class="control-label">Jenis Laporan</label>
            <select class="form-control select2 select2-hidden-accessible" aria-hidden="true" name="jenisLaporan" id="jenisLaporan" tabindex="-1">
              <option value=""></option>
              <option value="1">Pekerjaan Hari Ini</option>
              <option value="2">Progress Pekerjaan</option>
            </select>
          </div>
          <div class="form-group col-md-12">
            <label for="message-text" class="control-label">Laporan</label>
            <textarea class="form-control" placeholder="text.." name="isiLaporan" id="isiLaporan"></textarea>
          </div>

          <div class="form-group col-md-6">
            <label for="recipient-name" class="control-label">Status</label>
            <select class="form-control select2 select2-hidden-accessible"  id="id_status_report" name="id_status_report">
              <option value=""></option>
              <option value="1">Open</option>
              <option value="2">Pending</option>
              <option value="3">Closed</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="message-text" class="control-label">Persentasi Pekerjaan (%)</label>
            <input class="form-control" max="100" type="number" name="progress_bar" id="progress_bar">
          </div>

        </form>

        </div>
      </div>
      <div class="modal-footer" style="text-align:center;background:#f3f3f3;">
        <button type="button" onclick="inputLaporan()" class="btn btn-primary">Kirim</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal lihar laporan dan membuat remarks -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-blue">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center text-white" id="exampleModalLabel">Lihat Laporan</h4>
      </div>
      <div class="modal-body">
        <div class="row">

          <div class="col-xs-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
             <li class="active"><a href="#LaporanPekerjaan" data-toggle="tab">Laporan Pekerjaan</a></li>
             <li  onclick="location.href='#CekLaporan';"><a href="#CekLaporan" data-toggle="tab">Laporan Progress</a></li>
             <li><a href="#BuatRemarks" data-toggle="tab">Remarks</a></li>
             <!--li><a href="#KirimPDF" data-toggle="tab">Kirim PDF</a></li-->
            </ul>
          <div class="tab-content">
           <!-- BUAT LAPORAN -->
           <div class="tab-pane active" id="LaporanPekerjaan">
            <section id="new">
              <div class="box-body">
              <div class="table-responsive">

                <div class="box-body">
                <div class="direct-chat-messages" id="HasillaporanUpdate">
                  <!-- isi laporan -->
                </div>
                </div>

              </div>
              </div>
            </section>
           </div>

           <!-- CEK LAPORAN -->
           <div class="tab-pane" id="CekLaporan">
             <div class="box-body">
              <div class="table-responsive">
                <!-- tabel progress -->
                <div class="box-body">
                <div class="direct-chat-messages" id="_laporanProgress">
                  <!-- isi laporan -->
                </div>
                </div>
               </div>
             </div>
           </div>

           <!-- BUAT REMARKS -->
           <div class="tab-pane" id="BuatRemarks">
             <div class="box-body">
              <div class="table-responsive">

                <div class="box-body">
                <div class="direct-chat-messages" id="_Remarks">

                <!--div class="direct-chat-msg right">
                <div class="direct-chat-info clearfix">
                <!--span class="direct-chat-name pull-right">Sarah Bullock</span->
                <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                </div>
                <!--img class="direct-chat-img" src="<!?php echo base_url(); ?>assets-admin/dist/img/user3-128x128.jpg" alt="Message User Image"->
                <div class="direct-chat-text">Message Text..</div>
                </div-->

                </div>
                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                  <form  method="post" id="_formRemarks">
                  <div class="input-group">
                  <!-- data tersembunyi -->
                  <input type="hidden" id="reportto_remarks" name="id_report">
                  <input type="hidden" value="<?php echo $_SESSION['IdKabag']; ?>" name="idPengirim">
                  <input type="hidden" value="2" name="status_pengirim">

                  <input type="text" name="isi_remarks" placeholder="Type Message ..." class="form-control">
                  <span class="input-group-btn">
                  <button type="button" onclick="inputRemarks()" class="btn btn-primary btn-flat">Send</button>
                  </span>
                  </div>
                  </form>
                </div>

               </div>
             </div>
           </div>

           <!-- KIRIM PDF -->
           <div class="tab-pane" id="KirimPDF">
             <div class="box-body">
              <div class="table-responsive">

              <form id="formSendEmail" action="<?php echo base_url('Pdf/Pdf/SendEmail'); ?>" method="post">
                <!--hidden input-->
                <input type="hidden" name="idReportSend" id="idReportSend">
                <div class="form-group col-md-6">
                  <label for="message-text" class="control-label">Tgl Update</label>
                  <input type="text" placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy" name="tglUpdate" class="form-control datepicker">
                </div>
                <div class="form-group col-md-6">
                  <label for="message-text" class="control-label">Tgl Progress</label>
                  <input type="text" placeholder="dd/mm/yyyy" name="tglProgress" data-date-format="dd/mm/yyyy" class="form-control datepicker">
                </div>

                <div class="form-group col-md-6">
                  <label for="message-text" class="control-label">Your Email</label>
                  <input type="email" name="myEmail" placeholder="@excample" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="message-text" class="control-label">Your Password Email</label>
                  <input type="password" name="passwordEmail" placeholder="Password" class="form-control">
                </div>

                <div class="form-group col-md-12">
                  <label for="message-text" class="control-label">Subjek Laporan</label>
                  <textarea class="form-control" placeholder="text.." name="JudulPekerjaan" id="JudulPekerjaan"></textarea>
                </div>

                <div class="form-group col-md-12">
                  <label for="message-text" class="control-label">Notes Laporan</label>
                  <textarea class="form-control" placeholder="text.." name="catatanTo"></textarea>
                </div>

                <div class="form-group col-md-12">
                  <label for="message-text" class="control-label">Send To</label>
                  <input type="email" name="emailTo" placeholder="@excample" class="form-control">
                </div>

                <div class="form-group col-md-12 text-center">
                  <button type="button" onclick="SendEmail('')" class="btn btn-success btn-sm">Send</button>
                </div>
              </form>

               </div>
             </div>
           </div>

        </div>
        </div>
        </div>

        </div>
      </div>
      <div class="modal-footer bg-blue" style="text-align:center;background:#f3f3f3;">
        <!--button type="button" class="btn btn-primary">Conver to PDF</button-->
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
    $('#kolompkj').text(data.pekerjaan);
    $('#tdjp').text(': '+data.nama_pekerjaan);
    $('#tdctg').text(': '+data.category);
    $('#tdjrp').text(': '+data.jenis_report);
    $('#tdjdrm').text(': '+data.waktu_jenis_report);
    $('#tdtgl').text(': '+data.tgl_report);
    $('#tdrb').text(': '+data.reminder);
    $('#tdst').text(': '+data.status_report);
    $('#idsend').val(data.id_report);
    $('#widthProgress').css('width', data.progress_bar+'%');
    $('#widthProgress b').text(data.progress_bar+'%');
    $('#bviewTop').text(data.progress_bar+'%');
    //background progress_bar
    if(data.progress_bar < '35'){
      $('#widthProgress').addClass("progress-bar progress-bar-red");
    }else if (data.progress_bar < '65') {
      $('#widthProgress').addClass("progress-bar progress-bar-yellow");
    }else {
      $('#widthProgress').addClass("progress-bar progress-bar-green");
    }

    $('#exampleModal').modal('show');
  },
  error: function (jqXHR, textStatus, errorThrown){
    $('#exampleModal').modal('hide');
    alert('Data Tidak di temukan..');
  }
  });
}

// modal lihat Laporan
function lihatlaporan(id_report,judulpekerjaan) {
  $('#reportto_remarks').val(id_report);
  $('#idReportSend').val(id_report);
  $('#JudulPekerjaan').val(judulpekerjaan);

  $.ajax({
  url : "<?php echo base_url('F_ajax/Ajax/lihatlaporan/')?>" + id_report,
  dataType: "JSON",
  success: function(data){
    $('#HasillaporanUpdate').html('');
    $('#_laporanProgress').html('');
    $('#_Remarks').html('');

    for(i=0;i<data[0].length;i++){
      $('#HasillaporanUpdate').append('<div class="direct-chat-msg right"><div class="direct-chat-info clearfix"><span class="direct-chat-timestamp pull-left">'+data[0][i].tgl_update+' '+ data[0][i].time_update+'</span></div><div class="direct-chat-text">'+ data[0][i].isi_update+'</div></div>'
      );
    }

    for(x=0;x<data[1].length;x++){
      $('#_laporanProgress').append('<div class="direct-chat-msg right"><div class="direct-chat-info clearfix"><span class="direct-chat-timestamp pull-left">'+data[1][x].tgl_progress+' '+data[1][x].time_progress+'</span></div><div class="direct-chat-text">'+data[1][x].isi_progress+'</div></div>'
      );
    }

    for(i=0;i<data[2].length;i++){
      $('#_Remarks').append(
        '<div class="direct-chat-msg '+data[2][i].posisi_kbg+'"><div class="direct-chat-info clearfix"><span class="direct-chat-name pull-'+data[2][i].posisi_kbg+'" id="viewhasil">'+data[2][i].call_name+'</span><span class="direct-chat-timestamp pull-'+data[2][i].posisi_pgw+'" id="nametitle">'+data[2][i].tgl_remarks+' '+data[2][i].time_remarks+'</span></div><div class="direct-chat-text">'+data[2][i].isi_remarks+'</div></div>'
      );
    }

    //$('#exampleModal').modal('show');
  },
  error: function (jqXHR, textStatus, errorThrown){
    //alert('Data Tidak di temukan..');
  }
  });
}

//input Laporan
function inputLaporan(){
  var cek1 = $('#jenisLaporan').val();
  var cek2 = $('#isiLaporan').val();
  var cek3 = $('#id_status_report').val();
  var cek4 = $('#progress_bar').val();
  var minprogress = document.getElementById("progress_bar").min;

  if(cek1 =='' || cek2 =='' || cek3 =='' || cek4 ==''){
    swal({
      title: "Upss tidak terkirim!",
      text: "Masih ada kolom yang kosong.",
      timer: 2500,
      showConfirmButton: false
    });
  }else{

    if(cek4 < 0){
      swal({
        title: "Opss..!",
        text: "<span style='color:#c31500'>Persentasi Pekerjaan</span> tidak boleh Min. (-)",
        timer: 2500,
        html: true,
        showConfirmButton: false
      });
    }else{
      if(cek4 > 100){
        swal({
          title: "Opss..!",
          text: "<span style='color:#c31500'>Persentasi Pekerjaan</span> Maksimal 100%.",
          timer: 2500,
          html: true,
          showConfirmButton: false
        });
      }else{

        $.ajax({
          url : "<?php echo base_url('F_ajax/Ajax/inputlaporan_pegawai/')?>",
          type: "POST",
          data: $('#formLaporan').serialize(),
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

  }

}

//input Laporan
function inputRemarks(){
  var cek1 = $('#isiRemarks').val();

  if(cek1 ==''){
    swal({
      title: "Upss tidak terkirim!",
      text: "Pesan kosong tidak di perboleh.",
      timer: 2500,
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

function SendEmail() {
  var cek1 = $('[name="tglUpdate"]').val();
  var cek2 = $('[name="tglProgress"]').val();
  var cek3 = $('[name="myEmail"]').val();
  var cek4 = $('[name="passwordEmail"]').val();
  var cek5 = $('[name="emailTo"]').val();
  var cek6 = $('[name="idReportSend"]').val();

  if(cek1 =='' || cek2 =='' || cek3 =='' || cek4 =='' || cek5 =='' || cek6 ==''){
    swal({
      title: "Upss tidak dapt terkirim!",
      text: "Pengisian Data Belum Lengkap.",
      timer: 2500,
      showConfirmButton: false
    });
  }else{
    document.getElementById("formSendEmail").submit();
    setTimeout(function(){
      swal({
      title: "",
      text: "Mohon menunggu sebentar..",
      imageUrl: "<?php echo base_url('assets-admin/example/images/loading.gif'); ?>",
      showConfirmButton: false
      });
    }, 10);

    /*$.ajax({
      url : "<!?php echo base_url('Pdf/Pdf/SendEmail/')?>",
      type: "POST",
      data: $('#formSendEmail').serialize(),
      dataType: "JSON",
      success: function(data){
        if(data == 'sukses'){
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
        }else {
          swal({
            title: "Gagal terkirim!",
            type: "error",
            showCancelButton: false,
            confirmButtonColor: "#F27474",
            confirmButtonText: "Ok",
            closeOnConfirm: true
          });
        }
      },
      error: function (jqXHR, textStatus, errorThrown){
        swal({
          title: "Proses Error!",
          type: "error",
          showCancelButton: false,
          confirmButtonColor: "#F27474",
          confirmButtonText: "Ok",
          closeOnConfirm: true
        }/*,function(){
          location.reload();
        }*//*);
      }
    });*/
  }
}

</script>
