<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Profile <button class="btn btn-danger btn-xs" onclick="history.go(-1);">Kembali</button></h1>
  </section>
  <!-- Main content -->
  <section class="content">
  <!-- Info boxes -->
    <div class="row">
    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
      <div class="panel panel-default ">
       <div class="panel-heading">
          <h4><?php foreach($view_profil as $u) {echo $u->nama_lengkap; } ?></h4>
       </div>
      <div class="panel-body">
      <div class="table-responsive">

      <!--- Profil data pegawai --->
      <?php foreach($view_profil as $u) { ?>

      <!-- 1. Info data Pribadi -->
      <div class="form-group">
        <div class="col-md-12" >
        <label for="middle-name" class="control-label"><h4><span  class="btn btn-primary btn-sm" style="border-radius:50%;">1.</span> Data Pribadi</h4>
        </label>
        </div>

        <div class="col-md-12 col-sm-12 col-xm-12">
          <div class="col-md-6 col-sm-6 col-xm-6">
            <div class="form-group" style="background:#f7f7f7;color:#337ab7;border-top:3px solid #04579e;">

            <table class="table">
            <thead class="thead-inverse">
              <tr>
                <td width="135px">Nama Lengkap</td>
                <td width="1px">:</td>
                <td><?php echo $u->nama_lengkap ?></td>
              </tr>

              <tr>
                <td>Tgl Lahir</td>
                <td>:</td>
                <td><?php echo $u->tgl_lahir; ?></td>
              </tr>

              <tr>
                <td>Agama</td>
                <td>:</td>
                <td><?php echo $u->agama; ?></td>
              </tr>

              <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?php echo $u->jenis_kelamin; ?></td>
              </tr>

              <tr>
                <td>Asal Kota</td>
                <td>:</td>
                <td><?php echo $u->asal_kota; ?></td>
              </tr>

              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo $u->alamat; ?></td>
              </tr>

              <tr>
                <td>Profil</td>
                <td>:</td>
                <td><a href="<?php echo base_url().'uploads/pegawai/'.$u->foto_pegawai; ?>" target="_blank" class="btn btn-danger btn-xs">Lihat</a></td>
              </tr>
            </thead>
            </table>

            </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xm-6">
            <div class="form-group" style="background:#f7f7f7;color:#337ab7;border-top:3px solid #04579e;">

            <table class="table">
            <thead class="thead-inverse">
              <tr>
                <td width="135px">Lulusan</td>
                <td width="1px">:</td>
                <td><?php echo $u->lulusan; ?></td>
              </tr>

              <tr>
                <td>Email</td>
                <td>:</td>
                <td><?php echo $u->email; ?></td>
              </tr>

              <tr>
                <td>No. Hp</td>
                <td>:</td>
                <td><?php echo $u->no_hp; ?></td>
              </tr>

              <tr>
                <td>Status Perkawinan</td>
                <td>:</td>
                <td><?php echo $u->status_perkawinan; ?></td>
              </tr>

              <tr>
                <td>Nama Suari/Istri</td>
                <td>:</td>
                <td><?php echo $u->nama_suami_istri; ?></td>
              </tr>

              <tr>
                <td>Jumlah Anak</td>
                <td>:</td>
                <td><?php echo $u->jumlah_anak; ?></td>
              </tr>

              <tr>
                <td>KTP</td>
                <td>:</td>
                <td><a href="<?php echo base_url().'uploads/ktp/'.$u->foto_ktp; ?>" target="_blank" class="btn btn-danger btn-xs">Lihat</a></td>
              </tr>
            </thead>
            </table>

            </div>
          </div>

          <!--- Keterangan Orang Tua --->
          <div class="col-md-6 col-sm-6 col-xm-6">
            <div class="form-group" style="background:#f7f7f7;color:#337ab7;">
            <table class="table">
            <thead class="thead-inverse">
              <tr>
                <td colspan="3" class="text-center" style="background:#04579e;color:#fff;">Keterangan Orang Tua</td>
              </tr>
              <tr>
                <td width="135px">Nama Ayah</td>
                <td width="1px">:</td>
                <td><?php echo $u->nama_ayah; ?></td>
              </tr>

              <tr>
                <td>Nama Ibu</td>
                <td>:</td>
                <td><?php echo $u->nama_ibu; ?></td>
              </tr>

              <tr>
                <td>Kota</td>
                <td>:</td>
                <td><?php echo $u->kota_orang_tua; ?></td>
              </tr>

              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo $u->alamat_orang_tua; ?></td>
              </tr>

              <tr>
                <td>No. Telpon</td>
                <td>:</td>
                <td><?php echo $u->no_hp_orang_tua; ?></td>
              </tr>
            </thead>
            </table>

            </div>
          </div>

          <!--- Keterangan Orang yang dapapt di hubungi ---->
          <div class="col-md-6 col-sm-6 col-xm-6">
            <div class="form-group" style="background:#f7f7f7;color:#337ab7;">
            <table class="table">
            <thead class="thead-inverse">
              <tr>
                <td colspan="3" class="text-center" style="background:#04579e;color:#fff;">Orang Yang Dapat di Hubungi</td>
              </tr>
              <tr>
                <td width="135px">Nama</td>
                <td width="1px">:</td>
                <td><?php echo $u->nama_orang_dekat; ?></td>
              </tr>

              <tr>
                <td>Hubungan</td>
                <td>:</td>
                <td><?php echo $u->hubungan; ?></td>
              </tr>

              <tr>
                <td>Kota</td>
                <td>:</td>
                <td><?php echo $u->kota_orang_dekat; ?></td>
              </tr>

              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo $u->alamat_orang_dekat; ?></td>
              </tr>

              <tr>
                <td>No. Telpon</td>
                <td>:</td>
                <td><?php echo $u->no_hp_orang_dekat; ?></td>
              </tr>
            </thead>
            </table>

            </div>
          </div>

          <!--- Pekerjaan Sebelumnya --->
          <div class="col-md-6 col-sm-6 col-xm-6">
            <div class="form-group" style="background:#f7f7f7;color:#337ab7;">
            <table class="table">
            <thead class="thead-inverse">
              <tr>
                <td colspan="3" class="text-center" style="background:#04579e;color:#fff;">Pekerjaan Sebelumnya</td>
              </tr>
              <tr>
                <td width="135px">Nama Perusahaan</td>
                <td width="1px">:</td>
                <td><?php echo $u->nama_perusahaan_lama; ?></td>
              </tr>

              <tr>
                <td>Alamat Perusahaan</td>
                <td>:</td>
                <td><?php echo $u->alamat_perusahaan_lama; ?></td>
              </tr>

              <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><?php echo $u->jabatan_lama; ?></td>
              </tr>

              <tr>
                <td>Contact Person</td>
                <td>:</td>
                <td><?php echo $u->contact_person; ?></td>
              </tr>

              <tr>
                <td>No. Telpon</td>
                <td>:</td>
                <td><?php echo $u->no_telpon_perusahaan_lama; ?></td>
              </tr>
            </thead>
            </table>

            </div>
          </div>

          <!--- Akun Bank --->
          <div class="col-md-6 col-sm-6 col-xm-6">
            <div class="form-group" style="background:#f7f7f7;color:#337ab7;">
            <table class="table">
            <thead class="thead-inverse">
              <tr>
                <td colspan="3" class="text-center" style="background:#04579e;color:#fff;">Akun Bank</td>
              </tr>
              <tr>
                <td width="135px">Nama Bank</td>
                <td width="1px">:</td>
                <td><?php echo $u->nama_bank; ?></td>
              </tr>

              <tr>
                <td>Nama Pemilik</td>
                <td>:</td>
                <td><?php echo $u->nama_pemilik; ?></td>
              </tr>

              <tr>
                <td>No Akun</td>
                <td>:</td>
                <td><?php echo $u->no_akun_bank; ?></td>
              </tr>

              <tr>
                <td>Cabang</td>
                <td>:</td>
                <td><?php echo $u->cabang_bank; ?></td>
              </tr>

              <tr>
                <td>Kota</td>
                <td>:</td>
                <td><?php echo $u->kota_bank; ?></td>
              </tr>
            </thead>
            </table>

            </div>
          </div>

        </div>
      </div>

      <!-- 2. Info data Pegawai -->
      <div class="form-group">
        <div class="col-md-12" >
        <label for="middle-name" class="control-label"><h4><span  class="btn btn-primary btn-sm" style="border-radius:50%;">2.</span> Data Pegawai</h4>
        </label>
        </div>

        <div class="col-md-12 col-sm-12 col-xm-12">
          <div class="col-md-6 col-sm-6 col-xm-6">
            <div class="form-group" style="background:#f7f7f7;color:#337ab7;border-top:3px solid #04579e;">

            <table class="table">
            <thead class="thead-inverse">
              <tr>
                <td>Kode Pegawai</td>
                <td>:</td>
                <td><?php echo $u->kode_pegawai; ?></td>
              </tr>

              <tr>
                <td>NIP</td>
                <td>:</td>
                <td><?php echo $u->nip; ?></td>
              </tr>

              <tr>
                <td>Divisi</td>
                <td>:</td>
                <td><?php echo $u->divisi; ?></td>
              </tr>

              <tr>
                <td>Status Pegawai</td>
                <td>:</td>
                <td><?php echo $u->status_pegawai; ?></td>
              </tr>

              <tr>
                <td>Kode Shif</td>
                <td>:</td>
                <td><?php echo $u->kode_shif; ?></td>
              </tr>

              <tr>
                <td width="135px">Tgl & Masuk</td>
                <td width="2px">:</td>
                <td><?php echo $u->tgl_thn_masuk; ?></td>
              </tr>

              <tr>
                <td width="135px">Tgl Pengangkatan</td>
                <td width="1px">:</td>
                <td><?php echo $u->tgl_thn_pengangkatan; ?></td>
              </tr>
            </thead>
            </table>

            </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xm-6">
            <div class="form-group" style="background:#f7f7f7;color:#337ab7;border-top:3px solid #04579e;">

            <table class="table">
            <thead class="thead-inverse">
              <tr>
                <td>Port</td>
                <td>:</td>
                <td><?php echo $u->nama_port; ?></td>
              </tr>

              <tr>
                <td>No. KTP</td>
                <td>:</td>
                <td><?php echo $u->no_ktp; ?></td>
              </tr>

              <tr>
                <td>PTKP</td>
                <td>:</td>
                <td><?php echo $u->ptkp; ?></td>
              </tr>

              <tr>
                <td>Jumlah Hutang</td>
                <td>:</td>
                <td><?php echo $u->jumlah_hutang; ?></td>
              </tr>

              <tr>
                <td>Tgl Jatuh Tempo</td>
                <td>:</td>
                <td><?php echo $u->jatuh_tempo_hutang; ?><a href="#"></a></td>
              </tr>

              <tr>
                <td>Sampai Batas Tgl</td>
                <td>:</td>
                <td><?php echo $u->tgl_batas; ?></td>
              </tr>

              <tr>
                <td width="135px">Tgl Resign</td>
                <td width="1px">:</td>
                <td><?php echo $u->tgl_berhenti; ?></td>
              </tr>
            </thead>
            </table>

            </div>
          </div>
        </div>
      </div>

      <!-- akun pegawai -->
      <div class="form-group">
        <div class="col-md-12" >
        <label for="middle-name" class="control-label"><h4><span  class="btn btn-primary btn-sm" style="border-radius:50%;">3.</span> Akun Pegawai</h4>
        </label>
        </div>

        <div class="col-md-12 col-sm-12 col-xm-12">
          <div class="col-md-6 col-sm-6 col-xm-6">
            <div class="form-group" style="background:#f7f7f7;color:#337ab7;border-top:3px solid #04579e;">

            <table class="table">
            <thead class="thead-inverse">
              <tr>
                <td width="135px">Call Name</td>
                <td width="1px">:</td>
                <td><?php echo $u->call_name; ?></td>
              </tr>

              <tr>
                <td>User Name</td>
                <td>:</td>
                <td><?php echo $u->user; ?></td>
              </tr>

              <tr>
                <td>Status Akun</td>
                <td>:</td>
                <td><?php echo $u->status_akun; ?></td>
              </tr>

              <tr>
                <td>Level Akun</td>
                <td>:</td>
                <td><?php echo $u->nama_level; ?></td>
              </tr>

              <tr>
                <td>Waktu Daftar</td>
                <td>:</td>
                <td><?php echo $u->waktu_daftar; ?></td>
              </tr>
            </thead>
            </table>

            </div>
          </div>
        </div>
      </div>
      <?php } ?>

      <!--- Tutup Profil --->



      </div>
      </div>
    </div>
    </div>

    </div><!-- /.row -->

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
