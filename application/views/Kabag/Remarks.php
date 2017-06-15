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
        <div class="form-group col-md-12">
         <table class="table table-striped">
          <tbody>
           <tr>
            <td style="width:120px">Judul Pekerjaan</td>
            <td width="2px">:</td>
            <td id="tdjdP"></td>
           </tr>
           <tr>
            <td style="width:120px">Jenis Pekerjaan</td>
            <td width="2px">:</td>
            <td id="tdjp"></td>
           </tr>
           <tr>
            <td>Category</td>
            <td width="2px">:</td>
            <td id="tdctg"></td>
           </tr>
           <tr>
            <td>Jenis Report</td>
            <td width="2px">:</td>
            <td id="tdjrp"></td>
           </tr>
           <tr>
            <td>Jadwal Reminder</td>
            <td width="2px">:</td>
            <td id="tdjdrm"></td>
           </tr>
           <tr>
            <td>Tanggal</td>
            <td width="2px">:</td>
            <td id="tdtgl"></td>
           </tr>
           <tr>
            <td>Reminder By</td>
            <td width="2px">:</td>
            <td id="tdrb"></td>
           </tr>
           <tr>
            <td>Status</td>
            <td width="2px">:</td>
            <td id="tdst"></td>
           </tr>
           <tr>
             <td colspan="3">
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
        <div class="form-group col-md-12">
          <label for="message-text" class="control-label">Detail Pekerjaan :</label>
          <p class="message form-control" style="height:auto;" id="kolompkj"></p>
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
        <input type="hidden" id="reportto_remarks" name="id_report">
        <input type="hidden" value="<?php echo $_SESSION['IdKabag']; ?>" name="idPengirim">
        <input type="hidden" value="1" name="id_status_pengirim">

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
        if(data[1][i].id_status_pengirim == '2' && data[1][i].sound_bell == '0'){
          $('#chatAudio')[0].play();
          $.ajax({url : "<?php echo base_url();?>F_ajax/Ajax/nonbellremark/"+data[1][i].id_remarks});
          $('#_Remarks').animate({scrollTop: $('#_Remarks')[0].scrollHeight}, 10);
        }

        $('#_Remarks').append(
          '<div class="direct-chat-msg '+data[1][i].posisi_kbg+'"><div class="direct-chat-info clearfix"><span class="direct-chat-name pull-'+data[1][i].posisi_kbg+'" id="viewhasil">'+data[1][i].call_name+'</span><span class="direct-chat-timestamp pull-'+data[1][i].posisi_pgw+'" id="nametitle">'+data[1][i].tgl_remarks+' '+data[1][i].time_remarks+'</span></div><img class="direct-chat-img" src="<?php echo base_url(); ?>assets-admin/dist/img/boxed-bg.jpg" alt="Message User Image"><div class="direct-chat-text">'+data[1][i].isi_remarks+'</div></div>'
        );
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
