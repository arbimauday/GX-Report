<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Penggantian Pekerja
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-bookmark"></i> Data Pekerjaan</a></li>
      <li class="active">Pekerjaan Hari Ini</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
    <!-- Detail -->
    <div class="col-md-12">
     <div class="box box-primary">
      <div class="box-body">
       <div class="col-md-6">
        <div class="form-group col-md-12" style="border: 1px solid #e6e6e6;padding-top: 12px;">
         <table class="table table-striped">
          <tbody>
           <tr>
            <td style="width:120px">Nama Pekerja</td>
            <td width="2px">:</td>
            <td id="nama_pekerjaan"></td>
           </tr>
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
           <tr>
             <td colspan="3">
               <p style="font-weight:600;margin-bottom:5px;">Detail Pekerjaan</p>
               <p class="message form-control" style="height:auto;" id="kolompkj"></p>
             </td>
           </tr>
          </tbody>
         </table>
        </div>
       </div>

       <div class="col-md-6" style="border:1px solid #dcdcdc;background:#f7f7f7;padding-top:10px;">
        <form action="<?php echo base_url('Kabag/Home/updateNamePekerja'); ?>" method="post">
         <div class="form-group col-md-12">
          <label class="control-label">Ganti Nama Pekerja</label>
          <input type="hidden" name="idReport" value="<?php echo $id_report; ?>">
          <select class="form-control select2 select2-hidden-accessible" name="idPegawai" required>
           <option value="">-- Daftar Pekerja --</option>
           <?php foreach ($listPekerja as $u) { ?>
           <option value="<?php echo $u->id_user_pegawai; ?>"><?php echo $u->call_name; ?></option>
           <?php } ?>
          </select>
         </div>
         <div class="form-group col-md-12 text-center">
           <button type="button"onclick="self.history.back()" class="btn btn-danger">Kembali</button>
           <button type="submit" class="btn btn-primary">Simpan</button>
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
var refreshId = setInterval(function()
{
  $.ajax({
    url : "<?php echo base_url('F_ajax/Ajax/modallaporan/'.$id_report);?>",
    dataType: "JSON",
    success: function(data){
      $('#reportto_remarks').val(<?php echo $id_report; ?>);
      $('#nama_pekerjaan').text(data[0].call_name);
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

    },
    error: function (jqXHR, textStatus, errorThrown){
    }
  });
}, 1000);


</script>
