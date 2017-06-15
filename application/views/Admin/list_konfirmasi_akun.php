<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>konfirmasi Akun</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-bookmark"></i> Data Pegawai</a></li>
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
         <!--button type="button" class="btn btn-danger" style="margin-bottom:10px;">Konfirmasi</button>
         <br-->
         <table id="example1" class="table table-bordered table-striped">
           <thead>
            <tr class="bg-blue">
             <th>Nama Lengkap</th>
             <th style="width:10px">L/P</th>
             <th>Tgl lahir</th>
             <th>Status Pekerkawinan</th>
             <th>Divisi</th>
             <th>Status Pegawai</th>
             <th>Level Akun</th>
             <th>Action</th>
            </tr>
           </thead>
           <tbody>
            <?php foreach ($pgw_bali as $u) { ?>
            <tr>
             <td><?php echo $u->nama_lengkap;?></td>
             <td><?php echo $u->jenis_kelamin;?></td>
             <td><?php echo $u->tgl_lahir;?></td>
             <td><?php echo $u->status_perkawinan; ?></td>
             <td><?php echo $u->divisi; ?></td>
             <td><?php echo $u->status_pegawai; ?></td>
             <td><?php echo $u->nama_level; ?></td>
             <td>
               <a href="<?php echo base_url('Admin/Home/profil_pegawai/'.$u->nama_lengkap.'/'.$u->kode_pegawai.'/'.$u->id_divisi.'/'.$u->id_port);?>" class="btn btn-warning btn-sm" style="padding:2px 6px;" target="_blank">View</a> /
               <a onClick="action('<?php echo $u->nama_port;?>','<?php echo $u->kode_pegawai; ?>');" class="btn btn-primary btn-xs">Konfirmasi</a>
             </td>
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
              <th>Tgl lahir</th>
              <th>Status Pekerkawinan</th>
              <th>Divisi</th>
              <th>Status Pegawai</th>
              <th>Level Akun</th>
              <th>Action</th>
             </tr>
            </thead>
            <tbody>
             <?php foreach ($pgw_blp as $u) { ?>
             <tr>
              <td><?php echo $u->nama_lengkap;?></td>
              <td><?php echo $u->jenis_kelamin;?></td>
              <td><?php echo $u->tgl_lahir;?></td>
              <td><?php echo $u->status_perkawinan; ?></td>
              <td><?php echo $u->divisi; ?></td>
              <td><?php echo $u->status_pegawai; ?></td>
              <td><?php echo $u->nama_level; ?></td>
              <td>
                <a href="<?php echo base_url('Admin/Home/profil_pegawai/'.$u->nama_lengkap.'/'.$u->kode_pegawai.'/'.$u->id_divisi.'/'.$u->id_port);?>" class="btn btn-warning btn-sm" style="padding:2px 6px;" target="_blank">View</a> /
                <a onClick="action('<?php echo $u->nama_port;?>','<?php echo $u->kode_pegawai; ?>');" class="btn btn-primary btn-xs">Konfirmasi</a>
              </td>
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
              <th>Tgl lahir</th>
              <th>Status Pekerkawinan</th>
              <th>Divisi</th>
              <th>Status Pegawai</th>
              <th>Level Akun</th>
              <th>Action</th>
             </tr>
            </thead>
            <tbody>
             <?php foreach ($pgw_mlg as $u) { ?>
             <tr>
              <td><?php echo $u->nama_lengkap;?></td>
              <td><?php echo $u->jenis_kelamin;?></td>
              <td><?php echo $u->tgl_lahir;?></td>
              <td><?php echo $u->status_perkawinan; ?></td>
              <td><?php echo $u->divisi; ?></td>
              <td><?php echo $u->status_pegawai; ?></td>
              <td><?php echo $u->nama_level; ?></td>
              <td>
                <a href="<?php echo base_url('Admin/Home/profil_pegawai/'.$u->nama_lengkap.'/'.$u->kode_pegawai.'/'.$u->id_divisi.'/'.$u->id_port);?>" class="btn btn-warning btn-sm" style="padding:2px 6px;" target="_blank">View</a> /
                <a onClick="action('<?php echo $u->nama_port;?>','<?php echo $u->kode_pegawai; ?>');" class="btn btn-primary btn-xs">Konfirmasi</a>
              </td>
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
              <th>Tgl lahir</th>
              <th>Status Pekerkawinan</th>
              <th>Divisi</th>
              <th>Status Pegawai</th>
              <th>Level Akun</th>
              <th>Action</th>
             </tr>
            </thead>
            <tbody>
             <?php foreach ($pgw_smr as $u) { ?>
             <tr>
              <td><?php echo $u->nama_lengkap;?></td>
              <td><?php echo $u->jenis_kelamin;?></td>
              <td><?php echo $u->tgl_lahir;?></td>
              <td><?php echo $u->status_perkawinan; ?></td>
              <td><?php echo $u->divisi; ?></td>
              <td><?php echo $u->status_pegawai; ?></td>
              <td><?php echo $u->nama_level; ?></td>
              <td>
                <a href="<?php echo base_url('Admin/Home/profil_pegawai/'.$u->nama_lengkap.'/'.$u->kode_pegawai.'/'.$u->id_divisi.'/'.$u->id_port);?>" class="btn btn-warning btn-sm" style="padding:2px 6px;" target="_blank">View</a> /
                <a onClick="action('<?php echo $u->nama_port;?>','<?php echo $u->kode_pegawai; ?>');" class="btn btn-primary btn-xs">Konfirmasi</a>
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
function action(id_port, kode_pegawai){
  console.log(id_port);
  swal({
  title: "Kamu yakin?",
  text: "Akun yang telah di konfirmasi tidak bisa di kembalikan!",
  type: "warning",
  showCancelButton: true,
  cancelButtonText: 'Batal',
  confirmButtonColor: "#149609",
  confirmButtonText: "Konfirmasi",
  closeOnConfirm: false
},function(){
  $.ajax({
    url : "<?php echo base_url('F_ajax/Ajax/konfirmasi_akun/'); ?>"+ kode_pegawai,
    dataType: "JSON",
    success: function(data){
      if(data.hasil == 'Berhasil'){
        swal({
          title: "Sukses",
          text: "Konfirmasi berhasil",
          type: "success",
          timer: 1500,
          showConfirmButton: false
        },function() {
          location.reload();
        });

      }else {
        swal({
          title: "",
          text: "Proses konfirmasi gagal!",
          type: "error",
          timer: 1000,
          showConfirmButton: false
        },function() {
          location.reload();
        });
      }
    },
    error: function (jqXHR, textStatus, errorThrown){
      swal({
        title: "",
        text: "Proses Error!",
        type: "error",
        timer: 1500,
        showConfirmButton: false
      });
    }
});
});
}
</script>
