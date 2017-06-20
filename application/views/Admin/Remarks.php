<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Remarks <button type="button"onclick="self.history.back()" class="btn btn-danger btn-xs">Kembali</button></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-comments-o"></i> Remarks</a></li>
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
        <div class="box" style="border-radius:1%;border-top:0px;box-shadow:0 10px 20px rgba(0, 0, 0, 0.2);">
         <div class="box-header" style="background:#3c8dbc;color:#fff;border-radius:2%;">
          <h3 class="box-title">Info Pekerjaan</h3>
         </div>
         <?php foreach ($tabelPekerjaan as $u) { ?>
         <table class="table table-striped">
          <tbody>
           <tr>
            <td style="width:120px">Nama Pekerja</td>
            <td style="width:1px">:</td>
            <td><?php echo $u->call_name; ?></td>
           </tr>
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
         <?php } ?>
        </div>
       </div>

       <div class="col-md-5">
        <!-- Remarks -->
        <div class="direct-chat-messages" style="background:#f9f9f9;border:1px solid #d6d6d6;" id="_Remarks">
        </div>
        <!-- tutup -->
        <form  method="post" id="_formRemarks">
        <div class="input-group">
        <!-- data tersembunyi -->
        <input type="hidden" id="reportto_remarks" name="id_report" value="<?php echo $id_report; ?>">
        <input type="hidden" value="<?php echo $_SESSION['IdAdmin']; ?>" name="idPengirim">
        <input type="hidden" value="3" name="id_status_pengirim">

        <input type="text" name="isi_remarks" placeholder="Remark.." class="form-control">
        <span class="input-group-btn">
        <button type="button" id="btnsendRemarks" onclick="inputRemarks()" class="btn btn-primary btn-flat">Send</button>
        </span>
        </div>
        </form>
       </div>

      </div>
     </div>
    </div>
    </div>
  </section>

</div>


<script>
function showUp(){
 var objDiv = document.getElementById("_Remarks");
 objDiv.scrollTop = objDiv.scrollHeight;
}
$(document).ready(function(){
  setTimeout(showUp,1000);
});

var refreshId = setInterval(function()
{
  $.ajax({
    url : "<?php echo base_url('F_ajax/Ajax/modallaporan/'.$id_report);?>",
    dataType: "JSON",
    success: function(data){
      $('#reportto_remarks').val(<?php echo $id_report; ?>);
      $('#kolompkj').text(data[0].pekerjaan);
      $('#tdjdP').text(data[0].judul_pekerjaan);
      $('#tdjp').text(data[0].nama_pekerjaan);
      $('#tdctg').text(data[0].category);
      $('#tdjrp').text(data[0].jenis_report);
      $('#tdjdrm').text(data[0].waktu_jenis_report);
      $('#tdtgl').text(data[0].tgl_report);
      $('#tdrb').text(data[0].reminder);
      $('#tdst').text(data[0].status_report);
      $('#idsend').val(data[0].id_report);
      $('#widthProgress').css('width', data[0].progress_bar+'%');
      $('#widthProgress b').text(data[0].progress_bar+'%');
      $('#bviewTop').text(data[0].progress_bar+'%');
      //background progress_bar
      if(data[0].progress_bar < 35){
        $('#widthProgress').addClass("progress-bar progress-bar-red");
      }else if (data[0].progress_bar < 65) {
        $('#widthProgress').addClass("progress-bar progress-bar-yellow");
      }else {
        $('#widthProgress').addClass("progress-bar progress-bar-green");
      }
      // remarks
      $('#_Remarks').html('');
      for(i=0;i<data[1].length;i++){
        if(data[1][i].cek_admin == '0'){
          $('#chatAudio')[0].play();
          $.ajax({url : "<?php echo base_url();?>F_ajax/Ajax/nonbellremark/"+data[1][i].id_remarks+"/3"});
          $('#_Remarks').animate({scrollTop: $('#_Remarks')[0].scrollHeight}, 10);// auto scroll ke bawah
        }else if (data[1][i].cek_admin == '1') {
          $.ajax({url : "<?php echo base_url();?>F_ajax/Ajax/nonbellremark/"+data[1][i].id_remarks+"/3"});
        }

        if(data[1][i].id_status_pengirim == '3'){ // angka 3 adalah status pengirim admin
          $('#_Remarks').append(
            '<div class="direct-chat-msg right"><div class="direct-chat-info clearfix"><span class="direct-chat-name pull-right" id="viewhasil">'+data[1][i].call_name+'</span><span class="direct-chat-timestamp pull-left" id="nametitle">'+data[1][i].tgl_remarks+' '+data[1][i].time_remarks+'</span></div><img class="direct-chat-img" src="<?php echo base_url(); ?>assets-admin/dist/img/boxed-bg.jpg" alt="Message User Image"><div class="direct-chat-text">'+data[1][i].isi_remarks+'</div></div>'
          );
        }else {
          $('#_Remarks').append(
            '<div class="direct-chat-msg left"><div class="direct-chat-info clearfix"><span class="direct-chat-name pull-left" id="viewhasil">'+data[1][i].call_name+'</span><span class="direct-chat-timestamp pull-right" id="nametitle">'+data[1][i].tgl_remarks+' '+data[1][i].time_remarks+'</span></div><img class="direct-chat-img" src="<?php echo base_url(); ?>assets-admin/dist/img/boxed-bg.jpg" alt="Message User Image"><div class="direct-chat-text">'+data[1][i].isi_remarks+'</div></div>'
          );
        }
        $('div.right div.direct-chat-text').css('background','#c6dcf8');
        $('div.right div.direct-chat-text').css('border','#c6dcf8');
      }
    },
    error: function (jqXHR, textStatus, errorThrown){
    }
  });
}, 1000);

//input Laporan
$('[name="isi_remarks"]').keypress(function (e) {
  if (e.which == 13) {
    $("#btnsendRemarks").click();
  return false;// return false menjaga page sehingga tidak reload
  }
});

function inputRemarks(){
  var cek1 = $('[name="isi_remarks"]').val();

  if(cek1 == ''){
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
        $('[name="isi_remarks"]').val('');
        $('#_Remarks').animate({scrollTop: $('#_Remarks')[0].scrollHeight}, 1000);
      },
      error: function (jqXHR, textStatus, errorThrown){
        swal({
          title: "",
          text: "Gagal terkirim!",
          type: "error",
          timer: 1500,
          showConfirmButton: false
        });
      }
    });
  }
}
</script>
