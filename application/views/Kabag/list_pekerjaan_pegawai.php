<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>List Pekerjaan <small>|| <b><?php echo $call_name; ?></b> <button class="btn btn-danger btn-xs" onclick="history.go(-1);">Kembali</button></small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-bookmark"></i> Data Pekerjaan</a></li>
      <li class="active">List Pekerjaan</li>
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
             <th style="width:10px">Category</th>
             <th style="width:500px">Judul Pekerjaan</th>
             <th style="width:60px">Due Date</th>
             <th style="width:50px">Status</th>
             <th style="width:350px">Progress</th>
             <th>Action</th>
            </tr>
           </thead>
           <tbody>
            <?php foreach ($table_routine as $u) { if($u->status_report == 'Closed'){
              $css_tr = 'class="success"';
            }elseif ($u->status_report == 'Pending') {
              $css_tr = 'class="warning"';
            }else{
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
               <a href="<?php echo base_url('Kabag/Home/Remarks/'.$u->id_report); ?>" class="btn btn-primary btn-sm" style="padding:2px 6px;"><i class="fa fa-comments-o" style="font-size:20px;"></i></a>
               <?php if($u->progress_bar < '100'){?>
               <a href="<?php echo base_url('Kabag/Home/gantikanNamaPekerja/'.$u->id_report.'/'.$u->id_user_pegawai.'/'.urlencode($u->judul_pekerjaan)); ?>" class="btn btn-default btn-sm"><i class="fa fa-cogs"></i> Pengaturan</a>
               <?php }else{ ?>
                 <a href="<?php echo base_url('Kabag/Home/pengaturan_pekerjaan/'.$u->call_name.'/'.$u->id_user_pegawai.'/'.$u->id_report); ?>" class="btn bg-purple btn-sm"><i class="fa fa-wrench"></i> Tinjau</a>
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
            <th style="width:500px">Judul Pekerjaan</th>
            <th style="width:60px">Due Date</th>
            <th style="width:50px">Status</th>
            <th style="width:350px">Progress</th>
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
               <a href="<?php echo base_url('Kabag/Home/Remarks/'.$u->id_report); ?>" class="btn btn-primary btn-sm" style="padding:2px 6px;"><i class="fa fa-comments-o" style="font-size:20px;"></i></a>
               <?php if($u->progress_bar < '100'){?>
               <a href="<?php echo base_url('Kabag/Home/gantikanNamaPekerja/'.$u->id_report.'/'.$u->id_user_pegawai.'/'.urlencode($u->judul_pekerjaan)); ?>" class="btn btn-default btn-sm"><i class="fa fa-cogs"></i> Pengaturan</a>
               <?php }else{ ?>
                 <a href="<?php echo base_url('Kabag/Home/pengaturan_pekerjaan/'.$u->call_name.'/'.$u->id_user_pegawai.'/'.$u->id_report); ?>" class="btn bg-purple btn-sm"><i class="fa fa-wrench"></i> Tinjau</a>
               <?php } ?>
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
