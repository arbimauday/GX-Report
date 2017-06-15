<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Pekerjaan Hari Ini <!--small>to <!?php echo $_SESSION['NamaPegawai']; ?></small-->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-bookmark"></i> Data Pekerjaan</a></li>
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
     <!-- Table Routine -->
     <?php if(!empty($jumlah_laporan) && !empty($jumlah_pekerjaan)){ if($jumlah_laporan == $jumlah_pekerjaan){ ?>
     <div><a class="btn btn-danger btn-sm" href="<?php echo base_url('Pdf/Pdf/Convert_to_pdf'); ?>" target="_blank">Conver laporan to PDF</a></div>
     <?php } } ?>
     <div class="tab-pane active" id="routine">
      <section id="new">
        <!--h4 class="page-header">Report</h4-->
        <div class="box-body">
         <div class="table-responsive">
         <table id="example1" class="table table-bordered table-striped">
           <thead>
            <tr class="bg-blue">
             <th style="width:10px">Category</th>
             <th style="width:400px">Judul Pekerjaan</th>
             <th style="width:100px">Due Date</th>
             <th style="width:40px">Status</th>
             <th style="width:200px">Progress</th>
             <th style="width:110px">Action</th>
            </tr>
           </thead>
           <tbody>
            <?php foreach ($table_routine as $u) {
              if($u->status_report == 'Closed'){
                $css_tr = 'class="success"';
              }elseif ($u->status_report == 'Pending') {
                $css_tr = 'class="warning"';
              }else {
                $css_tr = '';
              }
            ?>
            <tr <?php echo $css_tr; ?>>
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
             <td>
               <a href="<?php echo base_url('Pegawai/Home/Remarks/'.$u->id_report); ?>" class="btn btn-primary btn-sm" style="padding:2px 6px;"><i class="fa fa-comments-o" style="font-size:20px;"></i></a>
               <!--?php
                if($u->tgl_update_report == '00/00/0000'){
               ?>
                <a href="<!?php echo base_url('Pegawai/Home/edit_laporan/'.$u->id_report.'/'.$u->judul_pekerjaan); ?>" class="btn btn-default"><i class="fa fa-pencil"></i> Edit</a-->
               <?php
                if($u->tgl_update_report == date('d/m/Y')){
                  $to = DateTime::createFromFormat ( "d/m/Y", $u->tgl_update_report );
                  $date_con = $to->format('dmY');
                  echo '<a href="'.base_url('').'Pegawai/Home/detail_laporan/'.$u->id_report.'/'.$date_con.'/Url=add12927190218" class="btn btn-default" style="background-color:#ecf0f5;"><i class="fa fa-check text-green"></i> Lihat laporan</a>';
                }else {
               ?>
                <a href="<?php echo base_url('Pegawai/Home/Laporan/'.$u->id_report.'/'.urlencode($u->judul_pekerjaan)); ?>" class="btn btn-default">Laporan</a>
               <?php } ?>
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
            <th style="width:400px">Judul Pekerjaan</th>
            <th style="width:100px">Due Date</th>
            <th style="width:40px">Status</th>
            <th style="width:200px">Progress</th>
            <th style="width:110px">Action</th>
           </tr>
          </thead>
          <tbody>
            <?php foreach ($table_project as $u) { if($u->status_report == 'Closed'){
              $css_tr = 'class="success"';
            }elseif ($u->status_report == 'Pending') {
              $css_tr = 'class="warning"';
            }else {
              $css_tr = '';
            }
          ?>
           <tr <?php echo $css_tr; ?>>
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
             <td>
               <a href="<?php echo base_url('Pegawai/Home/Remarks/'.$u->id_report); ?>" class="btn btn-primary btn-sm" style="padding:2px 6px;"><i class="fa fa-comments-o" style="font-size:20px;"></i></a>
               <?php //}else {
                if($u->id_status_report == '3'){
                  $to = DateTime::createFromFormat ( "d/m/Y", $u->tgl_update_report );
                  $date_con = $to->format('dmY');
               ?>
                <a href="<?php echo base_url('Pegawai/Home/detail_laporan/'.$u->id_report.'/'.$date_con); ?>" class="btn btn-success btn-sm" style="padding:2px 6px;"><i class="fa fa-check" style="font-size:20px;"></i> Cek Laporan</a>
               <?php  }else{
                if($u->tgl_update_report == date('d/m/Y')){
                  echo '&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check text-green"></i>';
                }else {
               ?>
                <a href="<?php echo base_url('Pegawai/Home/Laporan/'.$u->id_report.'/'.urlencode($u->judul_pekerjaan)); ?>" class="btn btn-default">Laporan</a>
               <?php } } ?>
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
<script>
var refreshId = setInterval(function()
{
var container = document.getElementById("_Remarks");
var content = container.innerHTML;
container.innerHTML= content;
}, 1000);
// ajax model view data
function modallaporan(id_report){
  //setTimeout(modallaporan(id_report),1000);
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
        '<div class="direct-chat-msg '+data[1][i].posisi_pgw+'"><div class="direct-chat-info clearfix"><span class="direct-chat-name pull-'+data[1][i].posisi_pgw+'" id="viewhasil">'+data[1][i].call_name+'</span><span class="direct-chat-timestamp pull-'+data[1][i].posisi_kbg+'" id="nametitle">'+data[1][i].tgl_remarks+' '+data[1][i].time_remarks+'</span></div><img class="direct-chat-img" src="<?php echo base_url(); ?>assets-admin/dist/img/boxed-bg.jpg" alt="Message User Image"><div class="direct-chat-text">'+data[1][i].isi_remarks+'</div></div>'
        );
      }

      //location.reload('<?php echo base_url('F_ajax/Ajax/modallaporan/')?> + id_report)');
      //setTimeout(window.refresh('<?php echo base_url('F_ajax/Ajax/modallaporan/')?>' + id_report),1000)
    },
    error: function (jqXHR, textStatus, errorThrown){
    //setTimeout(ces)
    //setTimeout(modallaporan(id_report),1000);
    //setTimeout(reload('<?php echo base_url('F_ajax/Ajax/modallaporan/')?> + id_report)'),10)
    }
  });

  //$('#_Remarks').load($('#_Remarks'));
  //setTimeout(reload('<?php echo base_url('F_ajax/Ajax/modallaporan/')?> + id_report)'),10)
  //setTimeout($("#_Remarks").load($("#_Remarks")),10);
  //
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
        //$('#exampleModal').modal('hide');
        swal({
          title: "Sukses!",
          type: "success",
          showCancelButton: false,
          confirmButtonColor: "#149609",
          confirmButtonText: "Ok!",
          closeOnConfirm: true
        });
        $('[name="isi_remarks"]').val('');
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
