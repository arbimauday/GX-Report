<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Pengaturan Pegawai <small></small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-users"></i> Pekerja</a></li>
      <li class="active">Anggota</li>
      <li class="active">Pindahkan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <!-- profil -->
      <section class="col-lg-12 connectedSortable">
        <div class="box box-primary">
         <?php foreach ($view_profil as $u){ ?>
          <div class="box-body">
          <div class="col-md-6" style="border: 1px solid #e6e6e6;padding-top:12px;margin-bottom:12px;">
             <table class="table table-striped">
              <tbody>
               <tr>
                <td colspan="3" align="center">
                  <?php $cekimg = $u->foto_pegawai;
                    if($cekimg){ ?>
                    <img class="img-responsive" src="<?php echo base_url('Uploads/pegawai/'.$u->foto_pegawai); ?>" style="width:300px;">
                  <?php  }else { ?>
                    <img class="img-responsive" src="<?php echo base_url('uploads/dafault/dafault.png'); ?>" style="width:300px;">
                  <?php  } ?>
                </td>
               </tr>
               <tr>
                <td style="width:120px">Nama Lengkap</td>
                <td width="2px">:</td>
                <td><?php echo $u->nama_lengkap; ?></td>
               </tr>
               <tr>
                <td style="width:120px">Nama Panggilan</td>
                <td width="2px">:</td>
                <td><?php echo $u->call_name; ?></td>
               </tr>
               <tr>
                <td>Divisi / Port</td>
                <td width="2px">:</td>
                <td><b><?php echo $u->divisi; ?></b> / <b><?php echo $u->nama_port; ?></td>
               </tr>
               <tr>
                <td>Nip</td>
                <td width="2px">:</td>
                <td><?php echo $u->nip; ?></td>
               </tr>
               <tr>
                <td>Status Pegawai</td>
                <td width="2px">:</td>
                <td><?php echo $u->status_pegawai; ?></td>
               </tr>
               <tr>
                <td>Tgl Masuk</td>
                <td width="2px">:</td>
                <td><?php echo $u->tgl_thn_masuk; ?></td>
               </tr>
              </tbody>
            </table>
          </div>

          <div class="col-md-4">
          <form action="<?php echo base_url('Admin/Home/updatepengaturanpegawai'); ?>" method="post">
           <input type="hidden" name="kode_pegawai" value="<?php echo $u->kode_pegawai;?>">
           <input type="hidden" name="id_port_before" value="<?php echo $u->id_divisi; ?>">
           <input type="hidden" name="id_divisi_before" value="<?php echo $u->id_port; ?>">

            <div class="col-md-12" style="border: 1px solid #e6e6e6;padding-top: 12px;background:#fdfdfd;">
            <div class="form-group col-md-12">
              <label for="recipient-name" class="control-label">Divisi</label>
              <select class="form-control select2 select2-hidden-accessible" required name="id_divisi">
                <option value="">-- Update Divisi --</option>
                <option value="1">Admin</option>
                <option value="2">Bongkar</option>
                <option value="3">Cafe</option>
                <option value="4">Cashier</option>
                <option value="5">Cso</option>
                <option value="6">Fiber Optic</option>
                <option value="7">Maintenance</option>
                <option value="8">Marketing</option>
                <option value="9">Na</option>
                <option value="10">Rutang</option>
                <option value="11">Wireless</option>
              </select>
            </div>
            <div class="form-group col-md-12">
             <label for="message-text" class="control-label">Port</label>
             <select class="form-control select2 select2-hidden-accessible" required name="id_port">
               <option value="">-- Update Port --</option>
               <option value="1">Bali</option>
               <option value="2">Balikpapan</option>
               <option value="3">Malang</option>
               <option value="4">Samarinda</option>
             </select>
            </div>
            <div  class="box-footer form-group col-md-12 text-center" style="border-top:1px solid #d6d6d6;background:none;">
              <button type="button" onclick="self.history.back()" class="btn btn-danger">Kembali</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
          </form>
         </div>
        </div>
          <!-- /.box-body -->
         <?php } ?>
        </div>
      </section>
      <!--/ profil -->
    </div>
  </section>
</div>
