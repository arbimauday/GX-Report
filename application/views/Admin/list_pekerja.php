<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Pegawai Aktif</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-user"></i> Pegawai GX</a></li>
      <li class="active">Pegawai Aktif</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
    <div class="col-xs-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
       <li class="active"><a href="#bali" data-toggle="tab">Bali</a></li>
       <li><a href="#blp" data-toggle="tab">Balikpapan</a></li>
       <li><a href="#mlg" data-toggle="tab">Malang</a></li>
       <li><a href="#smr" data-toggle="tab">Samarinda</a></li>
      </ul>

    <div class="tab-content">
     <!-- Table bali -->
     <div class="tab-pane active" id="bali">
      <section id="new">
        <!--h4 class="page-header">Report</h4-->
        <div class="box-body">
         <div class="table-responsive">
         <table id="example1" class="table table-bordered table-striped">
           <thead>
            <tr class="bg-blue">
             <th>Nama Lengkap</th>
             <th style="width:10px">L/P</th>
             <th style="width:70px">Divisi</th>
             <th style="width:110px">Status Pegawai</th>
             <th style="width:100px">Level Akun</th>
             <th>Action</th>
            </tr>
           </thead>
           <tbody>
            <?php foreach ($pgw_bali as $u) { ?>
            <tr>
             <td><?php echo $u->nama_lengkap;?></td>
             <td><?php echo $u->jenis_kelamin;?></td>
             <td><?php echo $u->divisi; ?></td>
             <td><?php echo $u->status_pegawai; ?></td>
             <td><?php echo $u->nama_level; ?></td>
             <td><a href="<?php echo base_url('Admin/Home/profil_pegawai/'.$u->nama_lengkap.'/'.$u->kode_pegawai.'/'.$u->id_divisi.'/'.$u->id_port);?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat Profil</a>
             <a class="btn bg-purple btn-sm" href="<?php echo base_url('Admin/Home/pengaturanPegawai/'.$u->kode_pegawai.'/'.$u->call_name); ?>"><i class="fa fa-cogs"></i> Pengaturan</a></td>
           </tr>
           <?php } ?>
          </tbody>
          </table>
        </div>
        </div>
      </section>
     </div>

     <!-- Table balikpapan -->
     <div class="tab-pane" id="blp">
       <div class="box-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped example1">
            <thead>
             <tr class="bg-blue">
               <th>Nama Lengkap</th>
               <th style="width:10px">L/P</th>
               <th style="width:70px">Divisi</th>
               <th style="width:110px">Status Pegawai</th>
               <th style="width:100px">Level Akun</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
             <?php foreach ($pgw_blp as $u) { ?>
             <tr>
              <td><?php echo $u->nama_lengkap;?></td>
              <td><?php echo $u->jenis_kelamin;?></td>
              <td><?php echo $u->divisi; ?></td>
              <td><?php echo $u->status_pegawai; ?></td>
              <td><?php echo $u->nama_level; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/profil_pegawai/'.$u->nama_lengkap.'/'.$u->kode_pegawai.'/'.$u->id_divisi.'/'.$u->id_port);?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat Profil</a>
              <a class="btn bg-purple btn-sm" href="<?php echo base_url('Admin/Home/pengaturanPegawai/'.$u->kode_pegawai.'/'.$u->call_name); ?>"><i class="fa fa-cogs"></i> Pengaturan</a></td>
            </tr>
            <?php } ?>
           </tbody>
           </table>
         </div>
       </div>
     </div>

     <!-- Table malang -->
     <div class="tab-pane" id="mlg">
       <div class="box-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped example1">
            <thead>
             <tr class="bg-blue">
               <th>Nama Lengkap</th>
               <th style="width:10px">L/P</th>
               <th style="width:70px">Divisi</th>
               <th style="width:110px">Status Pegawai</th>
               <th style="width:100px">Level Akun</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
             <?php foreach ($pgw_mlg as $u) { ?>
             <tr>
              <td><?php echo $u->nama_lengkap;?></td>
              <td><?php echo $u->jenis_kelamin;?></td>
              <td><?php echo $u->divisi; ?></td>
              <td><?php echo $u->status_pegawai; ?></td>
              <td><?php echo $u->nama_level; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/profil_pegawai/'.$u->nama_lengkap.'/'.$u->kode_pegawai.'/'.$u->id_divisi.'/'.$u->id_port);?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat Profil</a>
              <a class="btn bg-purple btn-sm" href="<?php echo base_url('Admin/Home/pengaturanPegawai/'.$u->kode_pegawai.'/'.$u->call_name); ?>"><i class="fa fa-cogs"></i> Pengaturan</a></td>
            </tr>
            <?php } ?>
           </tbody>
           </table>
         </div>
       </div>
     </div>

     <!-- Table samarinda -->
     <div class="tab-pane" id="smr">
       <div class="box-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped example1">
            <thead>
             <tr class="bg-blue">
               <th>Nama Lengkap</th>
               <th style="width:10px">L/P</th>
               <th style="width:70px">Divisi</th>
               <th style="width:110px">Status Pegawai</th>
               <th style="width:100px">Level Akun</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
             <?php foreach ($pgw_smr as $u) { ?>
             <tr>
              <td><?php echo $u->nama_lengkap;?></td>
              <td><?php echo $u->jenis_kelamin;?></td>
              <td><?php echo $u->divisi; ?></td>
              <td><?php echo $u->status_pegawai; ?></td>
              <td><?php echo $u->nama_level; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/profil_pegawai/'.$u->nama_lengkap.'/'.$u->kode_pegawai.'/'.$u->id_divisi.'/'.$u->id_port);?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat Profil</a>
              <a class="btn bg-purple btn-sm" href="<?php echo base_url('Admin/Home/pengaturanPegawai/'.$u->kode_pegawai.'/'.$u->call_name); ?>"><i class="fa fa-cogs"></i> Pengaturan</a></td>
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
