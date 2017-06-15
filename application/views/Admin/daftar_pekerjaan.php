<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Daftar Pekerjaan <small>Beserta Divisi dan Port</small></h1>
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
          <table class="table table-bordered table-striped tabelpekerjaan">
           <thead>
            <tr class="bg-blue">
              <th style="width:130px">Nama Divisi</th>
              <th style="width:130px">Open</th>
              <th style="width:130px">Pendding</th>
              <th style="width:130px">Closed</th>
              <th style="width:130px">Total Pekerja</th>
              <th>Action</th>
            </tr>
           </thead>
           <tbody>
            <tr>
              <td>Admin</td>
              <td><?php echo $bali_open1; ?></td>
              <td><?php echo $bali_pendding1; ?></td>
              <td><?php echo $bali_closed1; ?></td>
              <td><?php echo $bali_anggota1; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/1/1'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Bongkar</td>
              <td><?php echo $bali_open2; ?></td>
              <td><?php echo $bali_pendding2; ?></td>
              <td><?php echo $bali_closed2; ?></td>
              <td><?php echo $bali_anggota2; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/1/2'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Cafe</td>
              <td><?php echo $bali_open3; ?></td>
              <td><?php echo $bali_pendding3; ?></td>
              <td><?php echo $bali_closed3; ?></td>
              <td><?php echo $bali_anggota3; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/1/3'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Cashier</td>
              <td><?php echo $bali_open4; ?></td>
              <td><?php echo $bali_pendding2; ?></td>
              <td><?php echo $bali_closed4; ?></td>
              <td><?php echo $bali_anggota4; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/1/4'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Cso</td>
              <td><?php echo $bali_open5; ?></td>
              <td><?php echo $bali_pendding5; ?></td>
              <td><?php echo $bali_closed5; ?></td>
              <td><?php echo $bali_anggota5; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/1/5'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Fiber Optic</td>
              <td><?php echo $bali_open6; ?></td>
              <td><?php echo $bali_pendding6; ?></td>
              <td><?php echo $bali_closed6; ?></td>
              <td><?php echo $bali_anggota6; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/1/6'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Maintenance</td>
              <td><?php echo $bali_open7; ?></td>
              <td><?php echo $bali_pendding7; ?></td>
              <td><?php echo $bali_closed7; ?></td>
              <td><?php echo $bali_anggota7; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/1/7'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Marketing</td>
              <td><?php echo $bali_open8; ?></td>
              <td><?php echo $bali_pendding8; ?></td>
              <td><?php echo $bali_closed8; ?></td>
              <td><?php echo $bali_anggota8; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/1/8'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Na</td>
              <td><?php echo $bali_open9; ?></td>
              <td><?php echo $bali_pendding9; ?></td>
              <td><?php echo $bali_closed9; ?></td>
              <td><?php echo $bali_anggota9; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/1/9'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Rutang</td>
              <td><?php echo $bali_open10; ?></td>
              <td><?php echo $bali_pendding10; ?></td>
              <td><?php echo $bali_closed10; ?></td>
              <td><?php echo $bali_anggota10; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/1/10'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Wireless</td>
              <td><?php echo $bali_open11; ?></td>
              <td><?php echo $bali_pendding11; ?></td>
              <td><?php echo $bali_closed11; ?></td>
              <td><?php echo $bali_anggota11; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/1/11'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
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
          <table class="table table-bordered table-striped tabelpekerjaan">
           <thead>
            <tr class="bg-blue">
              <th style="width:130px">Nama Divisi</th>
              <th style="width:130px">Open</th>
              <th style="width:130px">Pendding</th>
              <th style="width:130px">Closed</th>
              <th style="width:130px">Total Pekerja</th>
              <th>Action</th>
            </tr>
           </thead>
           <tbody>
            <tr>
              <td>Admin</td>
              <td><?php echo $blp_open1; ?></td>
              <td><?php echo $blp_pendding1; ?></td>
              <td><?php echo $blp_closed1; ?></td>
              <td><?php echo $blp_anggota1; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/2/1'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Bongkar</td>
              <td><?php echo $blp_open2; ?></td>
              <td><?php echo $blp_pendding2; ?></td>
              <td><?php echo $blp_closed2; ?></td>
              <td><?php echo $blp_anggota2; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/2/2'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Cafe</td>
              <td><?php echo $blp_open3; ?></td>
              <td><?php echo $blp_pendding3; ?></td>
              <td><?php echo $blp_closed3; ?></td>
              <td><?php echo $blp_anggota3; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/2/3'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Cashier</td>
              <td><?php echo $blp_open4; ?></td>
              <td><?php echo $blp_pendding2; ?></td>
              <td><?php echo $blp_closed4; ?></td>
              <td><?php echo $blp_anggota4; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/2/4'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Cso</td>
              <td><?php echo $blp_open5; ?></td>
              <td><?php echo $blp_pendding5; ?></td>
              <td><?php echo $blp_closed5; ?></td>
              <td><?php echo $bali_anggota5; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/2/5'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Fiber Optic</td>
              <td><?php echo $blp_open6; ?></td>
              <td><?php echo $blp_pendding6; ?></td>
              <td><?php echo $blp_closed6; ?></td>
              <td><?php echo $blp_anggota6; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/2/6'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Maintenance</td>
              <td><?php echo $blp_open7; ?></td>
              <td><?php echo $blp_pendding7; ?></td>
              <td><?php echo $blp_closed7; ?></td>
              <td><?php echo $blp_anggota7; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/2/7'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Marketing</td>
              <td><?php echo $blp_open8; ?></td>
              <td><?php echo $blp_pendding8; ?></td>
              <td><?php echo $blp_closed8; ?></td>
              <td><?php echo $blp_anggota8; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/2/8'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Na</td>
              <td><?php echo $blp_open9; ?></td>
              <td><?php echo $blp_pendding9; ?></td>
              <td><?php echo $blp_closed9; ?></td>
              <td><?php echo $blp_anggota9; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/2/9'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Rutang</td>
              <td><?php echo $blp_open10; ?></td>
              <td><?php echo $blp_pendding10; ?></td>
              <td><?php echo $blp_closed10; ?></td>
              <td><?php echo $blp_anggota10; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/2/10'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Wireless</td>
              <td><?php echo $blp_open11; ?></td>
              <td><?php echo $blp_pendding11; ?></td>
              <td><?php echo $blp_closed11; ?></td>
              <td><?php echo $blp_anggota11; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/2/11'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
           </tbody>
          </table>
        </div>
      </div>
    </div>

     <!-- Table malang -->
     <div class="tab-pane" id="mlg">
       <div class="box-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped tabelpekerjaan">
           <thead>
            <tr class="bg-blue">
              <th style="width:130px">Nama Divisi</th>
              <th style="width:130px">Open</th>
              <th style="width:130px">Pendding</th>
              <th style="width:130px">Closed</th>
              <th style="width:130px">Total Pekerja</th>
              <th>Action</th>
            </tr>
           </thead>
           <tbody>
            <tr>
              <td>Admin</td>
              <td><?php echo $mlg_open1; ?></td>
              <td><?php echo $mlg_pendding1; ?></td>
              <td><?php echo $mlg_closed1; ?></td>
              <td><?php echo $mlg_anggota1; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/3/1'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Bongkar</td>
              <td><?php echo $mlg_open2; ?></td>
              <td><?php echo $mlg_pendding2; ?></td>
              <td><?php echo $mlg_closed2; ?></td>
              <td><?php echo $blp_anggota2; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/3/2'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Cafe</td>
              <td><?php echo $mlg_open3; ?></td>
              <td><?php echo $mlg_pendding3; ?></td>
              <td><?php echo $mlg_closed3; ?></td>
              <td><?php echo $mlg_anggota3; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/3/3'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Cashier</td>
              <td><?php echo $mlg_open4; ?></td>
              <td><?php echo $mlg_pendding2; ?></td>
              <td><?php echo $mlg_closed4; ?></td>
              <td><?php echo $blp_anggota4; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/3/4'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Cso</td>
              <td><?php echo $mlg_open5; ?></td>
              <td><?php echo $mlg_pendding5; ?></td>
              <td><?php echo $mlg_closed5; ?></td>
              <td><?php echo $bali_anggota5; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/3/5'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Fiber Optic</td>
              <td><?php echo $mlg_open6; ?></td>
              <td><?php echo $mlg_pendding6; ?></td>
              <td><?php echo $mlg_closed6; ?></td>
              <td><?php echo $mlg_anggota6; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/3/6'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Maintenance</td>
              <td><?php echo $mlg_open7; ?></td>
              <td><?php echo $mlg_pendding7; ?></td>
              <td><?php echo $mlg_closed7; ?></td>
              <td><?php echo $mlg_anggota7; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/3/7'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Marketing</td>
              <td><?php echo $mlg_open8; ?></td>
              <td><?php echo $mlg_pendding8; ?></td>
              <td><?php echo $mlg_closed8; ?></td>
              <td><?php echo $mlg_anggota8; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/3/8'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Na</td>
              <td><?php echo $mlg_open9; ?></td>
              <td><?php echo $mlg_pendding9; ?></td>
              <td><?php echo $mlg_closed9; ?></td>
              <td><?php echo $mlg_anggota9; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/3/9'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Rutang</td>
              <td><?php echo $mlg_open10; ?></td>
              <td><?php echo $mlg_pendding10; ?></td>
              <td><?php echo $mlg_closed10; ?></td>
              <td><?php echo $mlg_anggota10; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/3/10'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Wireless</td>
              <td><?php echo $mlg_open11; ?></td>
              <td><?php echo $mlg_pendding11; ?></td>
              <td><?php echo $mlg_closed11; ?></td>
              <td><?php echo $mlg_anggota11; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/3/11'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
           </tbody>
          </table>
         </div>
       </div>
     </div>

     <!-- Table samarinda -->
     <div class="tab-pane" id="smr">
       <div class="box-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped tabelpekerjaan">
           <thead>
            <tr class="bg-blue">
              <th style="width:130px">Nama Divisi</th>
              <th style="width:130px">Open</th>
              <th style="width:130px">Pendding</th>
              <th style="width:130px">Closed</th>
              <th style="width:130px">Total Pekerja</th>
              <th>Action</th>
            </tr>
           </thead>
           <tbody>
            <tr>
              <td>Admin</td>
              <td><?php echo $smr_open1; ?></td>
              <td><?php echo $smr_pendding1; ?></td>
              <td><?php echo $smr_closed1; ?></td>
              <td><?php echo $smr_anggota1; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/4/1'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Bongkar</td>
              <td><?php echo $smr_open2; ?></td>
              <td><?php echo $smr_pendding2; ?></td>
              <td><?php echo $smr_closed2; ?></td>
              <td><?php echo $blp_anggota2; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/4/2'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Cafe</td>
              <td><?php echo $smr_open3; ?></td>
              <td><?php echo $smr_pendding3; ?></td>
              <td><?php echo $smr_closed3; ?></td>
              <td><?php echo $smr_anggota3; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/4/3'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Cashier</td>
              <td><?php echo $smr_open4; ?></td>
              <td><?php echo $smr_pendding2; ?></td>
              <td><?php echo $smr_closed4; ?></td>
              <td><?php echo $blp_anggota4; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/4/4'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Cso</td>
              <td><?php echo $smr_open5; ?></td>
              <td><?php echo $smr_pendding5; ?></td>
              <td><?php echo $smr_closed5; ?></td>
              <td><?php echo $bali_anggota5; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/4/5'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Fiber Optic</td>
              <td><?php echo $smr_open6; ?></td>
              <td><?php echo $smr_pendding6; ?></td>
              <td><?php echo $smr_closed6; ?></td>
              <td><?php echo $smr_anggota6; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/4/6'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Maintenance</td>
              <td><?php echo $smr_open7; ?></td>
              <td><?php echo $smr_pendding7; ?></td>
              <td><?php echo $smr_closed7; ?></td>
              <td><?php echo $smr_anggota7; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/4/7'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Marketing</td>
              <td><?php echo $smr_open8; ?></td>
              <td><?php echo $smr_pendding8; ?></td>
              <td><?php echo $smr_closed8; ?></td>
              <td><?php echo $smr_anggota8; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/4/8'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Na</td>
              <td><?php echo $smr_open9; ?></td>
              <td><?php echo $smr_pendding9; ?></td>
              <td><?php echo $smr_closed9; ?></td>
              <td><?php echo $smr_anggota9; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/4/9'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Rutang</td>
              <td><?php echo $smr_open10; ?></td>
              <td><?php echo $smr_pendding10; ?></td>
              <td><?php echo $smr_closed10; ?></td>
              <td><?php echo $smr_anggota10; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/4/10'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
            <tr>
              <td>Wireless</td>
              <td><?php echo $smr_open11; ?></td>
              <td><?php echo $smr_pendding11; ?></td>
              <td><?php echo $smr_closed11; ?></td>
              <td><?php echo $smr_anggota11; ?></td>
              <td><a href="<?php echo base_url('Admin/Home/statuspekerjaan/4/11'); ?>" class="btn bg-olive btn-sm" ><i class="fa fa-eye"></i> Lihat</a></td>
            </tr>
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
