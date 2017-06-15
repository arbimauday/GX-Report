<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>History Laporan &nbsp;&nbsp;<small><?php echo $call_name .' || '.$tgl_history; ?></small> <a class="btn btn-danger btn-xs" href="<?php echo base_url('Kabag/Home'); ?>">Kembali</a>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-bookmark"></i> Data Pekerjaan</a></li>
      <li class="active">Anggota Pekerjaan</li>
      <li class="active">History Laporan</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
    <div class="col-xs-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
       <li class="active"><a href="#routine" data-toggle="tab">Hasil Laporan</a></li>
      </ul>

    <div class="tab-content">
     <!-- Table Routine -->
      <form method="post" action="<?php echo base_url('Kabag/Home/History_Laporan/'.$id_user_pegawai.'/'.$call_name); ?>">
        <div class="input-group margin col-md-2">
          <input class="form-control datepicker" placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy" type="text" name="tgl" maxlength="12" required class="form-control">
          <span class="input-group-btn">
          <button class="btn btn-success btn-flat" type="submit">Cari</button>
          </span>
        </div>
      </form>

     <div class="tab-pane active" id="routine">
      <section id="new">
        <!--h4 class="page-header">Report</h4-->
        <div class="box-body">
         <div class="table-responsive">
          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr class="bg-blue">
                  <th>Judul Pekerjaan</th>
                  <th width="150px">Category / Persentasi</th>
                  <th width="150px">Status / Jenis Pekerjaan</th>
                  <th width="100px">Jenis Laporan</th>
                  <th width="15px">Keterangan</th>
                  <th width="15px">Action</th>
                 </tr>
                </thead>
                <tbody>
                 <?php foreach ($_history as $u) { ?>
                 <tr>
                  <td><?php echo $u->judul_pekerjaan; ?></td>
                  <td><?php echo $u->category. ' / ' .$u->progress_bar.'%'; ?></td>
                  <td><?php echo $u->status_report.' / '.$u->nama_pekerjaan; ?></td>
                  <td><?php echo $u->jenis_report; ?></td>
                  <td class="text-center">
                    <?php if($u->ket_report){
                    echo '<i class="fa fa-check text-green"></i>';
                    }else{
                    echo '<i class="fa fa-remove text-red"></i>';
                    } ?>
                  </td>
                  <td>
                    <?php
                      $to = DateTime::createFromFormat ( "d/m/Y", $tgl_history );
                      $date_con = $to->format('dmY');
                    ?>
                    <a href="<?php echo base_url('Kabag/Home/detail_laporan/'.$id_user_pegawai.'/'.$u->id_report.'/'.$date_con.'/'.$call_name); ?>" class="btn btn-warning btn-sm" style="padding:2px 6px;"><i class="fa fa-eye" style="font-size:15px;"></i></a>
                  </td>
                 </tr>
                 <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
         </div>
        </div>
      </section>
     </div>

     <!-- Table Project -->
     <div class="tab-pane" id="project">
       <div class="box-body">
        <div class="table-responsive">

         </div>
       </div>
     </div>

    </div>
    </div>
    </div>
    </div>
  </section>
</div>
