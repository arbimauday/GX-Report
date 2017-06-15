<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Daftar Pekerjaan <small>Beserta statusnya</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-bookmark"></i> Data Pekerjaan</a></li>
      <li class="active">Daftar Pekerjaan</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
    <div class="col-xs-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
       <li class="active"><a href="#open" data-toggle="tab"><i class="fa  fa-spinner text-red"></i> Open &nbsp;&nbsp;&nbsp;<small class="label bg-red"><?php echo $jumlah_open;?></small></a></li>
       <li><a href="#pending" data-toggle="tab"><i class="fa  fa-clock-o text-yellow"></i> Pending &nbsp;&nbsp;&nbsp;<small class="label bg-yellow"><?php echo $jumlah_pending;?></small></a></li>
       <li><a href="#closed" data-toggle="tab"><i class="fa fa-check text-green"></i> Closed &nbsp;&nbsp;&nbsp;<small class="label bg-green"><?php echo $jumlah_closed;?></small></a></li>
      </ul>

    <div class="tab-content">
      <div class="tab-pane active" id="open">
        <div class="box-body">
         <div class="table-responsive">
          <table class="table table-bordered table-striped example1">
           <thead>
            <tr class="bg-blue">
            <th>Judul Pekerjaan</th>
             <th width="150px">Pekerja</th>
             <th width="150px">Category / Persentasi</th>
             <th width="150px">Laporan / Pekerjaan</th>
             <th width="15px">Action</th>
            </tr>
           </thead>
           <tbody>
           <?php foreach ($table_open as $u) { ?>
            <tr>
             <td><?php echo $u->judul_pekerjaan; ?></td>
             <td><?php echo $u->call_name; ?></td>
             <td><?php echo $u->category. ' / ' .$u->progress_bar.'%'; ?></td>
             <td><?php echo $u->jenis_report.' / '.$u->nama_pekerjaan; ?></td>
             <td><a href="<?php echo base_url('Kabag/Home/gantikanNamaPekerja/'.$u->id_report.'/'.$u->id_user_pegawai.'/'.urlencode($u->judul_pekerjaan)); ?>" class="btn btn-default btn-sm"><i class="fa fa-cogs"></i> Pengaturan</a></td>
            </tr>
           <?php } ?>
           </tbody>
          </table>
         </div>
       </div>
     </div>

     <!-- Table Pending -->
     <div class="tab-pane" id="pending">
       <div class="box-body">
         <div class="table-responsive">
           <table class="table table-bordered table-striped example1">
             <thead>
              <tr class="bg-blue">
               <th>Judul Pekerjaan</th>
               <th width="150px">Pekerja</th>
               <th width="150px">Category / Persentasi</th>
               <th width="150px">Laporan / Pekerjaan</th>
               <th width="15px">Action</th>
              </tr>
             </thead>
             <tbody>
              <?php foreach ($table_pending as $u) { ?>
              <tr>
               <td><?php echo $u->judul_pekerjaan; ?></td>
               <td><?php echo $u->call_name; ?></td>
               <td><?php echo $u->category. ' / ' .$u->progress_bar.'%'; ?></td>
               <td><?php echo $u->jenis_report.' / '.$u->nama_pekerjaan; ?></td>
               <td><a href="<?php echo base_url('Kabag/Home/gantikanNamaPekerja/'.$u->id_report.'/'.$u->id_user_pegawai.'/'.urlencode($u->judul_pekerjaan)); ?>" class="btn btn-default btn-sm"><i class="fa fa-cogs"></i> Pengaturan</a></td>
              </tr>
              <?php } ?>
             </tbody>
           </table>
         </div>
       </div>
     </div>

     <!-- Table Closed -->
     <div class="tab-pane" id="closed">
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped example1">
            <thead>
             <tr class="bg-blue">
              <th width="70px">Tgl Closed</th>
              <th>Judul Pekerjaan</th>
              <th width="150px">Pekerja</th>
              <th width="150px">Category / Persentasi</th>
              <th width="150px">Laporan / Pekerjaan</th>
              <th>Action</th>
             </tr>
            </thead>
            <tbody>
             <?php foreach ($table_closed as $u) { ?>
             <tr>
              <td><?php echo $u->tgl_update_report; ?></td>
              <td><?php echo $u->judul_pekerjaan; ?></td>
              <td><?php echo $u->call_name; ?></td>
              <td><?php echo $u->category. ' / ' .$u->progress_bar.'%'; ?></td>
              <td><?php echo $u->jenis_report.' / '.$u->nama_pekerjaan; ?></td>
              <td><a href="<?php echo base_url('Kabag/Home/pengaturan_pekerjaan/'.$u->call_name.'/'.$u->id_user_pegawai.'/'.$u->id_report); ?>" class="btn bg-purple btn-sm"><i class="fa fa-wrench"></i> Tinjau</a></td>
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
