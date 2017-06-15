<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script-->
<script>
   // block text untuk angka
	function hanyaAngka(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))

  return false;
  return true;
  }
</script>


<div class="content-wrapper">
  <section class="content" style="padding-left:0px;padding-right:0px;">
  <!-- Info boxes -->
    <div class="row">
    <!-- fix for small devices only -->
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box box-widget widget-user">
          <div class="widget-user-header" style="height:200px;background:url('http://docs.layerswp.com/wp-content/uploads/home-bg.png');color:#fff;border-bottom:5px solid #006ca2;"><!--bg-aqua-active"-->
            <?php foreach($view_profil as $u) { ?>
            <h3 class="widget-user-username"><b><?php echo $u->nama_lengkap; ?></b></h3>
            <h5 class="widget-user-desc"><?php echo $u->divisi." / ".$u->nama_port; } ?></h5>
          </div>
          <div class="widget-user-image" style="top:145px;margin-left:-60px;">
            <img class="img-responsive" src="<?php echo base_url('assets-admin/dist/img/avt_p.jpg'); ?>" style="width:120px;" alt="User Avatar">
          </div>
          <div class="box-footer">
            <div class="row" style="padding:0;margin:0;">
              <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="description-block">
                <h3><i class="fa fa-whatsapp text-green"></i></h3>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-4 col-md-4">
                <div class="description-block">
                <h3 onmouseover="this.style.color='#565656';" onmouseout="this.style.color='#000';" style="cursor: pointer;font-size:30px;"> <!--id="imgClick"--><i class="fa fa-camera"></i></h3>
                </div>
                <form method="post" id="updateImg">
                  <input type="file" style="display:none;" id="imgProfil" accept="image/x-png,image/gif,image/jpeg">
                </form>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="description-block">
                <!--h5 class="description-header">35</h5>
                <span class="description-text">Job</span-->
                <h2 class="text-yellow" style="font-size:15px;"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></h2>
                <span class="description-header">Poin Job</span>
                </div>
              </div>
            </div>
          </div>

          <div class="box-footer no-padding">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs" style="margin:0 auto;display:table;">
               <li  class="active"><a href="#Biodata" data-toggle="tab"><i class="fa fa-share-alt"></i> Biodata</a></li>
               <li><a href="#Jabatan" data-toggle="tab"><i class="fa fa-sort-amount-desc"></i> Jabatan</a></li>
               <li><a href="#Akun" data-toggle="tab"><i class="fa fa-user"></i> Akun</a></li>
              </ul>
            <div class="tab-content">
             <!-- Table Biodata -->
             <div class="tab-pane active" id="Biodata">
               <div class="box-footer no-padding">
               <?php foreach($view_profil as $u) { ?>
               <div class="col-md-6" style="padding:0;">
                 <div class="box direct-chat direct-chat-primary table-responsive"  style="border-radius:0;">
                   <div class="box-header with-border">
                     <h3 class="box-title">Info Pribadi &nbsp;&nbsp;
                       <button type="button" class="btn btn-primary btn-xs" id="edit-info" onclick="showInfo()"><i class="fa fa-pencil"></i> Edit</button>
                     </h3>
                   </div>
                   <!--p class="text-muted text-center">Software Engineer</p-->
                 <div class="col-md-6" id="info-show-1">
                   <table class="table">
                   <thead class="thead-inverse">
                     <tr>
                       <td>
                         Nama Lengkap :
                         <div class="col-md-12"><b><?php echo $u->nama_lengkap ?></b></div>
                       </td>
                     </tr>

                     <tr>
                       <td>
                         Tgl Lahir :<br>
                         <div class="col-md-12"><b><?php echo $u->tgl_lahir; ?></b></div>
                       </td>
                     </tr>

                     <tr>
                       <td>
                         Agama :
                         <div class="col-md-12"><b><?php echo $u->agama; ?><b></div>
                       </td>
                     </tr>

                     <tr>
                       <td>
                         Jenis Kelamin :
                         <div class="col-md-12"><b><?php echo $u->jenis_kelamin; ?></b></div>
                       </td>
                     </tr>

                     <tr>
                       <td>
                         Asal Kota :
                         <div class="col-md-12"><b><?php echo $u->asal_kota; ?></b></div>
                       </td>
                     </tr>

                     <tr>
                       <td>
                         Alamat :
                         <div class="col-md-12"><b><?php echo $u->alamat; ?></b></div>
                       </td>
                     </tr>
                   </thead>
                   </table>
                 </div>
                 <div class="col-md-6" id="info-show-2">
                   <table class="table">
                   <thead class="thead-inverse">
                     <tr>
                       <td>
                         Lulusan :
                         <div class="col-md-12"><b><?php echo $u->lulusan; ?></b></div>
                       </td>
                     </tr>

                     <tr>
                       <td>
                         Email :
                         <div class="col-md-12"><b><?php echo $u->email; ?></b></div>
                       </td>
                     </tr>

                     <tr>
                       <td>
                         No. Hp :
                         <div class="col-md-12"><b><?php echo $u->no_hp; ?></b></div>
                       </td>
                     </tr>

                     <tr>
                       <td>
                         Status Perkawinan :
                         <div class="col-md-12"><b><?php echo $u->status_perkawinan; ?></b></div>
                       </td>
                     </tr>

                     <tr>
                       <td>
                         Nama Suami/Istri :
                         <div class="col-md-12"><b><?php echo $u->nama_suami_istri; ?></b></div>
                       </td>
                     </tr>

                     <tr>
                       <td>
                         Jumlah Anak :
                         <div class="col-md-12"><b><?php echo $u->jumlah_anak; ?></b></div>
                       </td>
                     </tr>
                   <thead class="thead-inverse">
                   </table>
                 </div>

                 <!-- tampilan edit infor pribadi -->
                 <form action="<?php echo base_url('Pegawai/Home/updateInfoPribadi'); ?>" method="post">
                   <input type="hidden" name="id_pegawai" value="<?php echo $u->id_pegawai; ?>">
                 <div class="col-md-6" id="info-hide-1" style="display:none;">
                   <table class="table">
                   <thead class="thead-inverse">
                     <tr>
                       <td>
                         Nama Lengkap
                         <input class="form-control" name="nama_lengkap" value="<?php echo $u->nama_lengkap ?>" placeholder="Nama Lengkap" maxlength="50" required>
                       </td>
                     </tr>

                     <tr>
                       <td>
                         Tgl Lahir
                         <input placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy" value="<?php echo $u->tgl_lahir; ?>" type="text" name="tgl_lahir" maxlength="12" required class="form-control datepicker">
                       </td>
                     </tr>

                     <tr>
                       <td>
                         Agama
                         <select class="select2_group form-control" required  name="id_agama">
                           <option value="<?php echo $u->id_agama; ?>"><?php echo $u->agama; ?></option>
                           <option value="1">Buddha</option>
                           <option value="2">Hindu</option>
                           <option value="3">Islam</option>
                           <option value="4">Katolik</option>
                           <option value="5">Kristen</option>
                           <option value="6">Kong Hu Cu</option>
                         </select>
                       </td>
                     </tr>

                     <tr>
                       <td>
                         Jenis Kelamin
                         <select class="select2_group form-control" required name="jenis_kelamin">
                           <option value="<?php echo $u->jenis_kelamin; ?>"><?php echo $u->jenis_kelamin; ?></option>
                           <option value="L">L</option>
                           <option value="P">P</option>
                         </select>
                       </td>
                     </tr>

                     <tr>
                       <td>
                         Asal Kota
                         <input type="text" name="asal_kota" placeholder="Asal Kota" maxlength="50" required class="form-control" value="<?php echo $u->asal_kota; ?>">
                       </td>
                     </tr>

                     <tr>
                       <td>
                         Alamat
                         <input type="text" required name="alamat" placeholder="Alamat" value="<?php echo $u->alamat; ?>" class="form-control" maxlength="50">
                       </td>
                     </tr>
                   </thead>
                   </table>
                 </div>
                 <div class="col-md-6" id="info-hide-2" style="display:none;">
                   <table class="table">
                   <thead class="thead-inverse">
                     <tr>
                       <td  width="auto">
                         Lulusan
                         <select class="form-control select2 select2-hidden-accessible" required name="lulusan">
                           <option value="<?php echo $u->lulusan; ?>"><?php echo $u->lulusan; ?></option>
                           <option value="SD">SD</option>
                           <option value="SMP">SMP</option>
                           <option value="SMA/SMK">SMA/SMK</option>
                           <option value="S1">S1</option>
                           <option value="S2">S2</option>
                           <option value="S3">S3</option>
                           <option value="D1">D1</option>
                           <option value="D2">D2</option>
                           <option value="D3">D3</option>
                         </select>
                       </td>
                     </tr>

                     <tr>
                       <td>
                         Email
                         <input type="email" required name="email" maxlength="25" placeholder="@example" class="form-control" value="<?php echo $u->email; ?>" required>
                       </td>
                     </tr>

                     <tr>
                       <td>
                         No. Hp
                         <input type="text" onkeypress="return hanyaAngka(event)" required maxlength="15" name="no_hp" placeholder="No. Hp (Aktif)" class="form-control" value="<?php echo $u->no_hp; ?>" required>
                       </td>
                     </tr>

                     <tr>
                       <td>
                         Status Perkawinan
                         <select class="select2_group form-control" required  name="status_perkawinan">
                           <option value="<?php echo $u->status_perkawinan; ?>"><?php echo $u->status_perkawinan; ?></option>
                           <option value="Belum Menikah">Belum Menikah</option>
                           <option value="Menikah">Menikah</option>
                           <option value="Janda">Janda</option>
                           <option value="Duda">Duda</option>
                         </select>
                       </td>
                     </tr>

                     <tr>
                       <td>
                         Nama Suami/Istri
                         <input type="text" maxlength="25" placeholder="Nama Suami/Istri" name="nama_suami_istri" class="form-control" value="<?php echo $u->nama_suami_istri; ?>" required>
                       </td>
                     </tr>

                     <tr>
                       <td>
                         Jumlah Anak
                         <input type="number" name="jumlah_anak" placeholder="Jumlah Anak" class="form-control" value="<?php echo $u->jumlah_anak; ?>" required>
                       </td>
                     </tr>
                   </thead>
                   </table>
                 </div>
                 <div class="col-md-12 text-center" id="btn-upload-info" style="display:none;">
                   <table class="table" style="margin-bottom:0px;">
                       <tr>
                         <td>
                           <button type="button" class="btn btn-danger btn-sm" onclick="cancelShowinfo()">Cancel</button>
                           <button type="submit" class="btn btn-success btn-sm" onclick="">Update</button>
                         </td>
                       </tr>
                   </table>
                 </div>
                 </form>

                 </div>
               </div>

               <!-- data orang tua dan keluarga yang dapat di hubungi-->
               <div class="col-md-3 col-sm-6" style="padding:0;">
                 <div class="box direct-chat direct-chat-primary table-responsive"  style="border-radius:0;">
                   <div class="box-header with-border">
                     <h3 class="box-title">Keterangan Orang Tua &nbsp;&nbsp;<button type="button" class="btn btn-primary btn-xs" onclick="showOrtu()" id="btn-edit-ortu"><i class="fa fa-pencil"></i> Edit</button></h3>
                   </div>
                   <div class="col-md-12">
                     <table class="table" id="table-show-ortu">
                     <thead class="thead-inverse">
                       <tr>
                         <td>
                           Nama Ayah :
                           <div class="col-md-12"><b><?php echo $u->nama_ayah; ?></b></div>
                         </td>
                       </tr>

                       <tr>
                         <td>
                           Nama Ibu :
                           <div class="col-md-12"><b><?php echo $u->nama_ibu; ?></b></div>
                         </td>
                       </tr>

                       <tr>
                         <td>
                           Kota :
                           <div class="col-md-12"><b><?php echo $u->kota_orang_tua; ?></b></div>
                         </td>
                       </tr>

                       <tr>
                         <td>
                           Alamat :
                           <div class="col-md-12"><b><?php echo $u->alamat_orang_tua; ?></b></div>
                         </td>
                       </tr>

                       <tr>
                         <td>
                           Telpon :
                           <div class="col-md-12"><b><?php echo $u->no_hp_orang_tua; ?></b></div>
                         </td>
                       </tr>
                     </thead>
                     </table>

                     <!-- form edit keterangan orang tua -->
                     <form action="<?php echo base_url('Pegawai/Home/updateKet_Ortu'); ?>" method="post">
                       <input type="hidden" name="id_pegawai" value="<?php echo $u->id_pegawai; ?>">
                       <table class="table" id="table-hide-ortu" style="display:none;margin-bottom:0;">
                         <thead class="thead-inverse">
                         <tr>
                           <td>
                             Nama Ayah
                             <input type="text" maxlength="50" value="<?php echo $u->nama_ayah; ?>" name="nama_ayah" placeholder="Nama Ayah"  class="form-control" required>
                           </td>
                         </tr>

                         <tr>
                           <td>
                             Nama Ibu
                             <input type="text" maxlength="50" value="<?php echo $u->nama_ibu; ?>" name="nama_ibu" placeholder="Nama Ibu"  class="form-control"  required>
                           </td>
                         </tr>

                         <tr>
                           <td>
                             Kota
                             <input type="text" maxlength="50" name="kota_orang_tua" value="<?php echo $u->kota_orang_tua; ?>" placeholder="Kota"  class="form-control"  required>
                           </td>
                         </tr>

                         <tr>
                           <td>
                             Alamat
                             <input type="text"  maxlength="50" name="alamat_orang_tua" placeholder="Alamat" class="form-control" value="<?php echo $u->alamat_orang_tua; ?>"  required>
                           </td>
                         </tr>

                         <tr>
                           <td>
                             Telpon
                             <input type="text" onkeypress="return hanyaAngka(event)" maxlength="15" name="no_hp_orang_tua" placeholder="Telpon" class="form-control" value="<?php echo $u->no_hp_orang_tua; ?>">
                           </td>
                         </tr>

                         <tr>
                           <td class="text-center" style="margin:0px;">
                             <button type="button" id="cancel-ortu" onclick="cancelOrtu()" class="btn btn-danger btn-sm">Cancel</button>
                             <button type="submit" id="update-ortu" class="btn btn-success btn-sm">Update</button>
                           </td>
                         </tr>
                         </thead>
                       </table>
                     </form>
                   </div>
                 </div>
               </div>

               <!-- keterangan orang yang dapat dihubungi -->
               <div class="col-md-3 col-sm-6" style="padding:0;">
                 <div class="box direct-chat direct-chat-primary table-responsive"  style="border-radius:0;">
                   <div class="box-header with-border">
                     <h3 class="box-title">Orang Yang Dapat di Hubungi &nbsp;&nbsp;<button type="button" id="btn-orang-dekat" class="btn btn-primary btn-xs" onclick="showorgdekat()"><i class="fa fa-pencil"></i> Edit</button></h3>
                   </div>
                   <div class="col-md-12">
                     <table class="table" id="table-show-orgdekat">
                     <thead class="thead-inverse">
                       <tr>
                         <td>
                           Nama :
                           <div class="col-md-12"><b><?php echo $u->nama_orang_dekat; ?></b></div>
                         </td>
                       </tr>

                       <tr>
                         <td>
                           Hubungan :
                           <div class="col-md-12"><b><?php echo $u->hubungan; ?></b></div>
                         </td>
                       </tr>

                       <tr>
                         <td>
                           Kota :
                           <div class="col-md-12"><b><?php echo $u->kota_orang_dekat; ?></b></div>
                         </td>
                       </tr>

                       <tr>
                         <td>
                           Alamat :
                           <div class="col-md-12"><b><?php echo $u->alamat_orang_dekat; ?></b></div>
                         </td>
                       </tr>

                       <tr>
                         <td>
                           No. Telpon :
                           <div class="col-md-12"><b><?php echo $u->no_hp_orang_dekat; ?></b></div>
                         </td>
                       </tr>
                     </thead>
                     </table>

                     <form action="<?php echo base_url('Pegawai/Home/updateOrg_dekat') ?>" method="post">
                       <input type="hidden" name="id_pegawai" value="<?php echo $u->id_pegawai; ?>">
                     <table class="table" id="table-hide-orgdekat" style="display:none;margin-bottom:0;">
                       <tr>
                         <td>
                           Nama
                           <input type="text" maxlength="50" name="nama_orang_dekat" placeholder="Nama"  class="form-control" required value="<?php echo $u->nama_orang_dekat; ?>">
                         </td>
                       </tr>

                       <tr>
                         <td>
                           Hubungan
                           <select class="select2_group form-control" name="hubungan" required>
                             <option value="<?php echo $u->hubungan; ?>"><?php echo $u->hubungan; ?></option>
                             <option value="ORANG TUA">ORANG TUA</option>
                             <option value="SAUDARA KANDUNG">SAUDARA KANDUNG</option>
                             <option value="OM/TANTE">OM/TANTE</option>
                             <option value="NA">SAUDARA SEPUPU</option>
                             <option value="TEMAN">TEMAN</option>
                             <option value="SUAMI/ISTRI">SUAMI/ISTRI</option>
                           </select>
                         </td>
                       </tr>

                       <tr>
                         <td>
                           Kota
                           <input type="text" maxlength="30" name="kota_orang_dekat" placeholder="Kota"  class="form-control"  required value="<?php echo $u->kota_orang_dekat; ?>">
                         </td>
                       </tr>

                       <tr>
                         <td>
                           Alamat
                           <input type="text" maxlength="50" name="alamat_orang_dekat" placeholder="Alamat"  class="form-control" required value="<?php echo $u->alamat_orang_dekat; ?>">
                         </td>
                       </tr>

                       <tr>
                         <td>
                           No Hp
                           <input type="text" onkeypress="return hanyaAngka(event)" maxlength="15" name="no_hp_orang_dekat" placeholder="Telpon" class="form-control"  required value="<?php echo $u->no_hp_orang_dekat; ?>">
                         </td>
                       </tr>

                       <tr>
                         <td class="text-center">
                           <button type="button" onclick="cancelOrgdekat()" class="btn btn-danger btn-sm">Cancel</button>
                           <button type="submit" class="btn btn-success btn-sm">Update</button>
                         </td>
                       </tr>
                     </table>
                     </form>

                 </div>
                 </div>
               </div>

               <!-- akun bank akun histoyr pekerjaan -->
               <div class="col-md-12 col-sm-12" style="padding:0;">
                <div class="col-md-6 col-sm-6" style="padding:0;">
                 <div class="box direct-chat direct-chat-primary table-responsive"  style="border-radius:0;">
                   <div class="box-header with-border">
                     <h3 class="box-title">Pekerjaan Sebelumnya</h3>
                   </div>
                   <div class="col-md-12">
                     <table class="table">
                     <thead class="thead-inverse">
                       <tr>
                         <td>
                           Nama Perusahaan :
                           <div class="col-md-12"><b><?php echo $u->nama_perusahaan_lama; ?></b></div>
                         </td>
                       </tr>

                       <tr>
                         <td>
                           Jabatan :
                           <div class="col-md-12"><b><?php echo $u->jabatan_lama; ?></b></div>
                         </td>
                       </tr>

                       <tr>
                         <td>
                           Alamat :
                           <div class="col-md-12"><b><?php echo $u->alamat_perusahaan_lama; ?></b></div>
                         </td>
                       </tr>

                       <tr>
                         <td>
                           Contact Person :
                           <div class="col-md-12"><b><?php echo $u->contact_person; ?></b></div>
                         </td>
                       </tr>

                       <tr>
                         <td>
                           No. Telpon :
                           <div class="col-md-12"><b><?php echo $u->no_telpon_perusahaan_lama; ?></b></div>
                         </td>
                       </tr>
                     </thead>
                     </table>
                   </div>
                 </div>
                </div>

                <div class="col-md-6 col-sm-6" style="padding:0;">
                 <div class="box direct-chat direct-chat-primary table-responsive"  style="border-radius:0;">
                   <div class="box-header with-border">
                     <h3 class="box-title">Akun Bank&nbsp;&nbsp;<button type="button" class="btn btn-primary btn-xs" onclick="showAkunBank()" id="edit_Akunbank"><i class="fa fa-pencil"></i> Edit</button></h3>
                   </div>
                   <div class="col-md-12">
                    <table class="table" id="table-show-akunbank">
                     <thead class="thead-inverse">
                       <tr>
                        <td>
                          Nama Bank :
                          <div class="col-md-12"><b><?php echo $u->nama_bank; ?></b></div>
                        </td>
                       </tr>

                       <tr>
                        <td>
                         No Akun Bank :
                         <div class="col-md-12"><b><?php echo $u->no_akun_bank; ?></b></div>
                        </td>
                       </tr>

                       <tr>
                        <td>
                         Nama Pemilik :
                         <div class="col-md-12"><b><?php echo $u->nama_pemilik; ?></b></div>
                        </td>
                       </tr>

                       <tr>
                        <td>
                         Cabang :
                         <div class="col-md-12"><b><?php echo $u->cabang_bank; ?></b></div>
                        </td>
                       </tr>

                       <tr>
                        <td>
                         Kota Bank :
                         <div class="col-md-12"><b><?php echo $u->kota_bank; ?></b></div>
                        </td>
                       </tr>
                     </thead>
                    </table>

                    <form action="<?php echo base_url('Pegawai/Home/Update_akunbank'); ?>" method="post">
                      <input type="hidden" name="id_pegawai" value="<?php echo $u->id_pegawai; ?>">
                      <table class="table" id="table-hide-akunbank" style="display:none;margin-bottom:0;">
                       <thead class="thead-inverse">
                         <tr>
                           <td>
                             Nama Bank
                             <input type="text" maxlength="30" name="nama_bank" placeholder="Nama Bank" class="form-control" required value="<?php echo $u->nama_bank; ?>">
                           </td>
                         </tr>

                         <tr>
                           <td>
                             No Akun Bank
                             <input type="text" onkeypress="return hanyaAngka(event)" maxlength="30" name="no_akun_bank" placeholder="No Akun" class="form-control" required value="<?php echo $u->no_akun_bank; ?>">
                           </td>
                         </tr>

                         <tr>
                           <td>
                             Nama Pemilik
                             <input type="text" maxlength="50" name="nama_pemilik" placeholder="Nama Pemilik" class="form-control" required value="<?php echo $u->nama_pemilik; ?>">
                           </td>
                         </tr>

                         <tr>
                           <td>
                             Cabang
                             <input type="text" maxlength="20" name="cabang_bank" placeholder="Cabang Bank" class="form-control" value="<?php echo $u->cabang_bank; ?>">
                           </td>
                         </tr>

                         <tr>
                           <td>
                             Kota Bank
                             <input type="text" maxlength="20" name="kota_bank" placeholder="Kota" class="form-control" required value="<?php echo $u->kota_bank; ?>">
                           </td>
                         </tr>

                         <tr>
                           <td class="text-center">
                             <button type="button" class="btn btn-danger btn-sm" onclick="cancelAkunBank()">Cancel</button>
                             <button type="submit" class="btn btn-success btn-sm">Update</button>
                           </td>
                         </tr>
                       </thead>
                      </table>
                    </form>

                   </div>
                 </div>
                </div>

               </div>

               <?php } ?>
               </div>
             </div>

             <!-- Table Biodata -->
             <div class="tab-pane" id="Jabatan">
              <div class="box-footer no-padding" style="border-top:0px">
              <?php foreach($view_profil as $u) { ?>
               <div class="col-md-6 col-md-offset-3" style="padding:0;">
                <div class="box direct-chat direct-chat-primary table-responsive"  style="border-radius:0;">
                 <div class="box-header with-border">
                  <h3 class="box-title">Info Pegawai</h3>
                 </div>

                 <div class="col-md-6">
                  <table class="table">
                   <thead class="thead-inverse">
                   <tr>
                    <td>
                      Kode Pegawai :
                      <div class="col-md-12"><b><?php echo $u->kode_pegawai; ?></b></div>
                    </td>
                   </tr>
                   <tr>
                    <td>
                      NIP :
                      <div class="col-md-12"><b><?php echo $u->nip; ?></b></div>
                    </td>
                   </tr>
                   <tr>
                    <td>
                      Divisi :
                      <div class="col-md-12"><b><?php echo $u->divisi; ?></b></div>
                    </td>
                   </tr>
                   <tr>
                    <td>
                      Status Pegawai :
                      <div class="col-md-12"><b><?php echo $u->status_pegawai; ?></b></div>
                    </td>
                   </tr>
                   <tr>
                    <td>
                      Kode Shif :
                      <div class="col-md-12"><b><?php echo $u->kode_shif; ?></b></div>
                    </td>
                   </tr>
                   <tr>
                    <td>
                      Tgl Masuk :
                      <div class="col-md-12"><b><?php echo $u->tgl_thn_masuk; ?></b></div>
                    </td>
                   </tr>
                   <tr>
                    <td>
                      Tgl Pengangkatan :
                      <div class="col-md-12"><b><?php echo $u->tgl_thn_pengangkatan; ?></b></div>
                    </td>
                   </tr>
                   </thead>
                  </table>
                 </div>

                 <div class="col-md-6">
                  <table class="table">
                   <thead class="thead-inverse">
                    <tr>
                     <td>
                      Port :
                      <div class="col-md-12"><b><?php echo $u->nama_port; ?></b></div>
                     </td>
                    </tr>
                    <tr>
                     <td>
                      No. KTP :
                      <div class="col-md-12"><b><?php echo $u->no_ktp; ?></b></div>
                     </td>
                    </tr>
                    <tr>
                     <td>
                      PTKP :
                      <div class="col-md-12"><b><?php echo $u->ptkp; ?></b></div>
                     </td>
                    </tr>
                    <tr>
                     <td>
                      Jumlah Hutang :
                      <div class="col-md-12"><b><?php echo $u->jumlah_hutang; ?></b></div>
                     </td>
                    </tr>
                    <tr>
                     <td>
                      Tgl Jatuh Tempo :
                      <div class="col-md-12"><b><?php echo $u->jatuh_tempo_hutang; ?></b></div>
                     </td>
                    </tr>
                    <tr>
                     <td>
                      Sampai Batas Tgl :
                      <div class="col-md-12"><b><?php echo $u->tgl_batas; ?></b></div>
                     </td>
                    </tr>
                    <tr>
                     <td>
                      Tgl Resign :
                      <div class="col-md-12"><b><?php echo $u->tgl_berhenti; ?></b></div>
                     </td>
                    </tr>
                   </thead>
                  </table>
                 </div>

                </div>
               </div>
              <?php } ?>
              </div>
             </div>

             <!-- Table Biodata -->
             <div class="tab-pane" id="Akun">
              <div class="box-footer no-padding" style="border-top:0px">
               <?php foreach ($view_profil as $u) { ?>
               <div class="col-md-6 col-md-offset-3" style="padding:0;">
                <div class="box direct-chat direct-chat-primary table-responsive"  style="border-radius:0;">
                 <div class="box-header with-border">
                  <h3 class="box-title">Akun Pegawai</h3>
                 </div>
                 <div class="col-md-12">
                  <table class="table">
                   <thead class="thead-inverse">
                    <tr>
                     <td>
                      Nama Panggilan :
                      <div class="col-md-12"><b><?php echo $u->call_name; ?></b></div>
                     </td>
                    </tr>
                    <tr>
                     <td>
                      UserName :
                      <div class="col-md-12"><b><?php echo $u->user; ?></b></div>
                     </td>
                    </tr>
                    <tr>
                     <td>
                      Status Akun :
                      <div class="col-md-12"><b><?php echo $u->status_akun; ?></b></div>
                     </td>
                    </tr>
                    <tr>
                     <td>
                      Level Akun :
                      <div class="col-md-12"><b><?php echo $u->nama_level; ?></b></div>
                     </td>
                    </tr>
                    <tr>
                     <td>
                      Waktu Daftar :
                      <div class="col-md-12"><b><?php echo $u->waktu_daftar; ?></b></div>
                     </td>
                    </tr>
                   </thead>
                  </table>
                 </div>
                </div>
               </div>
               <?php } ?>
              </div>
             </div>

            </div>
            </div>
          </div>
          <!-- isi data -->


      </div>
      </div>
  </div><!-- /.row -->

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<script>
$("#imgClick i").click(function () {
/*$("input[type='file']").trigger('click');*/
$('#myModal').modal('show');
});
/*$('input[type="file"]').on('change', function() {
var val = $(this).val();
if(val){
  $('#myModal').modal('show');
}
$(this).siblings('span').text(val);
});*/
</script>
<!-- Modal croping images-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Upload Profil</h4>
</div>
<div class="modal-body">
<form method="post" id="upload_image" enctype="multipart/form-data">
<label>Select File <br />
<input type="file" name="image_upload" id="image_upload" />
<br />
<input type="submit" name="upload" id="upload" class="btn btn-info" value="Upload" />
</form>
<br />
<br />
<div id="preview"></div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
<button type="button" class="btn btn-primary">Upload</button>
</div>
</div>
</div>
</div>

<script>
// display data pribadi
function showInfo(){
  document.getElementById('info-hide-1').style.display="block";
  document.getElementById('info-hide-2').style.display="block";
  document.getElementById('info-show-1').style.display="none";
  document.getElementById('info-show-2').style.display="none";
  document.getElementById('btn-upload-info').style.display="inline";

  document.getElementById('edit-info').style.display="none";
  document.getElementById('btn-edit-ortu').style.display="none";
  document.getElementById('btn-orang-dekat').style.display="none";
  document.getElementById('edit_Akunbank').style.display="none";
}
function cancelShowinfo() {
  document.getElementById('info-hide-1').style.display="none";
  document.getElementById('info-hide-2').style.display="none";
  document.getElementById('info-show-1').style.display="block";
  document.getElementById('info-show-2').style.display="block";
  document.getElementById('btn-upload-info').style.display="none";

  document.getElementById('edit-info').style.display="";
  document.getElementById('btn-edit-ortu').style.display="";
  document.getElementById('btn-orang-dekat').style.display="";
  document.getElementById('edit_Akunbank').style.display="";
}

// display tabel orang tua
function showOrtu() {
  document.getElementById('table-hide-ortu').style.display="";
  document.getElementById('table-show-ortu').style.display="none";

  document.getElementById('edit-info').style.display="none";
  document.getElementById('btn-edit-ortu').style.display="none";
  document.getElementById('btn-orang-dekat').style.display="none";
  document.getElementById('edit_Akunbank').style.display="none";
}
function cancelOrtu() {
  document.getElementById('table-hide-ortu').style.display="none";
  document.getElementById('table-show-ortu').style.display="block";

  document.getElementById('edit-info').style.display="";
  document.getElementById('btn-edit-ortu').style.display="";
  document.getElementById('btn-orang-dekat').style.display="";
  document.getElementById('edit_Akunbank').style.display="";
}

// display tabel orang dekat
function showorgdekat() {
  document.getElementById('table-show-orgdekat').style.display="none";
  document.getElementById('table-hide-orgdekat').style.display="";

  document.getElementById('edit-info').style.display="none";
  document.getElementById('btn-edit-ortu').style.display="none";
  document.getElementById('btn-orang-dekat').style.display="none";
  document.getElementById('edit_Akunbank').style.display="none";
}
function cancelOrgdekat() {
  document.getElementById('table-show-orgdekat').style.display="";
  document.getElementById('table-hide-orgdekat').style.display="none";

  document.getElementById('edit-info').style.display="";
  document.getElementById('btn-edit-ortu').style.display="";
  document.getElementById('btn-orang-dekat').style.display="";
  document.getElementById('edit_Akunbank').style.display="";
}

// tabel akun bank
function showAkunBank() {
  document.getElementById('table-show-akunbank').style.display="none";
  document.getElementById('table-hide-akunbank').style.display="";

  document.getElementById('edit-info').style.display="none";
  document.getElementById('btn-edit-ortu').style.display="none";
  document.getElementById('btn-orang-dekat').style.display="none";
  document.getElementById('edit_Akunbank').style.display="none";
}

function cancelAkunBank() {
  document.getElementById('table-show-akunbank').style.display="";
  document.getElementById('table-hide-akunbank').style.display="none";

  document.getElementById('edit-info').style.display="";
  document.getElementById('btn-edit-ortu').style.display="";
  document.getElementById('btn-orang-dekat').style.display="";
  document.getElementById('edit_Akunbank').style.display="";
}

</script>

<script>
$(document).ready(function(){
    $('#upload_image').on('submit', function(event){
     event.preventDefault();
     $.ajax({
      url:"upload.php",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      success:function(data){
       $('#preview').html(data);
      }
     })
    });
});
</script>
