<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Pengaturan Pekerjaan <small></small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-bookmark"></i> Daftar Pekerjaan</a></li>
      <li class="active">Daftar Perjaan</li>
      <li class="active">Pengaturan Perjaan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-12 connectedSortable">
        <div class="box box-primary">
         <?php foreach ($pengaturan_pekerjaan as $u){ ?>
          <div class="box-body">
           <div class="col-md-6" style="border: 1px solid #e6e6e6;padding-top: 12px;">
             <table class="table table-striped">
              <tbody>
               <tr>
                <td style="width:120px">Judul Pekerjaan</td>
                <td width="2px">:</td>
                <td><?php echo $u->judul_pekerjaan; ?></td>
               </tr>
               <tr>
                <td style="width:120px">Jenis Pekerjaan</td>
                <td width="2px">:</td>
                <td><?php echo $u->nama_pekerjaan; ?></td>
               </tr>
               <tr>
                <td>Category</td>
                <td width="2px">:</td>
                <td><?php echo $u->category; ?></td>
               </tr>
               <tr>
                <td>Jenis Report</td>
                <td width="2px">:</td>
                <td><?php echo $u->jenis_report; ?></td>
               </tr>
               <tr>
                <td>Jadwal Reminder</td>
                <td width="2px">:</td>
                <td><?php echo $u->waktu_jenis_report; ?></td>
               </tr>
               <tr>
                <td>Tanggal</td>
                <td width="2px">:</td>
                <td><?php echo $u->tgl_report; ?></td>
               </tr>
               <tr>
                <td>Reminder By</td>
                <td width="2px">:</td>
                <td><?php echo $u->reminder; ?></td>
               </tr>
               <tr>
                <td>Status</td>
                <td width="2px">:</td>
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
              </tbody>
            </table>
            <div class="form-group col-md-12">
             <label for="exampleInputPassword1">Detail</label>
             <p class="message form-control" style="height:auto;background:#f9f9f9;waktu_reminder"><?php echo $u->pekerjaan; ?></p>
            </div>
           </div>

          <form action="<?php echo base_url('Kabag/Home/updatepengaturanpekerjaan');?>" method="post">
           <input type="hidden" name="id_report" value="<?php echo $u->id_report;?>">
           <div class="col-md-4">
            <div class="col-md-12" style="border: 1px solid #e6e6e6;padding-top: 12px;background:#fdfdfd;">
            <div class="form-group col-md-12">
              <label for="recipient-name" class="control-label">Status</label>
              <select class="form-control select2 select2-hidden-accessible" required name="id_status_report">
                <option value="">-- Update Status --</option>
                <option value="1">Open</option>
                <option value="2">Pending</option>
                <option value="3">Closed</option>
              </select>
            </div>
            <div class="form-group col-md-12">
             <label for="message-text" class="control-label">Persentasi Pekerjaan (%)</label>
             <input required class="form-control" max="100" type="number" name="progress_bar" min="50">
            </div>
            <div  class="box-footer form-group col-md-12 text-center" style="border-top:1px solid #d6d6d6;background:none;">
              <a href="<?php //echo base_url('Kabag/Home/Cek_Pekerjaan/'.$id_user_pegawai.'/'.$nama_pekerja); ?>" onclick="self.history.back()" class="btn btn-danger">Kembali</a>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
           </div>
          </form>

          </div>
          <!-- /.box-body -->
         <?php } ?>
        </div>
      </section>
    </div>
  </section>
</div>
