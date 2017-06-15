<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Pengaturan Pekerjaan <small></small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-bookmark"></i> Data Pekerjaan</a></li>
      <li>List Pekerjaan</li>
      <li>Pengaturan Pekerjaan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-12 connectedSortable">
        <div class="box box-primary">
         <!-- form start -->
         <?php foreach ($pengaturan_pekerjaan as $u){ ?>
         <form method="post" action="<?php echo base_url('Pegawai/Home/update_pengaturan_pekerjaan/'.$u->no_report); ?>">
          <div class="box-body">
           <div class="col-md-8 col-md-offset-2">
            <div class="form-group col-md-6">
             <label for="exampleInputEmail1">Jenis Pekerjaan</label>
             <select class="form-control select2 select2-hidden-accessible" name="id_jenis_pekerjaan" required>
               <option value="<?php echo $u->id_jenis_pekerjaan; ?>"><?php echo $u->nama_pekerjaan; ?></option>
               <option value="1">Routin</option>
               <option value="2">Project</option>
             </select>
            </div>
            <div class="form-group col-md-6">
             <label for="exampleInputEmail1">Category</label>
             <select class="form-control select2 select2-hidden-accessible" name="id_category" required>
               <option value="<?php echo $u->id_category; ?>"><?php echo $u->category; ?></option>
               <?php  for ($x = 01; $x <= 5; $x++) { ?>
               <option value="<?php echo $x; ?>">Level <?php echo $x; ?></option>
               <?php } ?>
             </select>
            </div>

            <div class="form-group col-md-6">
             <label for="exampleInputEmail1">Jenis Report</label>
             <select class="form-control select2 select2-hidden-accessible" name="id_jenis_report"  id="id_report" onChange="edit_date()" required>
               <option value="<?php echo $u->id_jenis_report; ?>"><?php echo $u->jenis_report; ?></option>
               <option value="1">Harian</option>
               <option value="2">Mingguan</option>
               <option value="3">Bulanan</option>
               <option value="4">Project</option>
             </select>
            </div>

            <script>
            setInterval(edit_date,3);
            function edit_date() {
              y = document.getElementById("id_report").value;
              //var e = document.getElementById("id_report");
              //var strUser = e.options[e.selectedIndex].value;
              if(y == '1'){
                document.getElementById("tj1").value = "Setiap Hari";
                document.getElementById("tj1").readOnly = true;
                document.getElementById("tj1").style.display = '';
                document.getElementById("tj1").name = 'waktu_reminder';
                document.getElementById("tj1").required = true;

                document.getElementById("tj2").style.display = 'none';
                document.getElementById("tj2").name = '';
                document.getElementById("tj2").required = false;
                document.getElementById("tj3").style.display = 'none';
                document.getElementById("tj3").name = '';
                document.getElementById("tj3").required = false;
                document.getElementById("tj4").style.display = 'none';
                document.getElementById("tj4").name = '';
                document.getElementById("tj4").required = false;
              }else if(y == '2'){
                document.getElementById("tj2").style.display = '';
                document.getElementById("tj2").name = 'waktu_reminder';
                document.getElementById("tj2").required = true;

                document.getElementById("tj1").style.display = 'none';
                document.getElementById("tj1").name = '';
                document.getElementById("tj1").required = false;
                document.getElementById("tj3").style.display = 'none';
                document.getElementById("tj3").name = '';
                document.getElementById("tj3").required = false;
                document.getElementById("tj4").style.display = 'none';
                document.getElementById("tj4").name = '';
                document.getElementById("tj4").required = false;
              }else if(y == '3'){
                document.getElementById("tj3").style.display = '';
                document.getElementById("tj3").name = 'waktu_reminder';
                document.getElementById("tj3").required = true;

                document.getElementById("tj1").style.display = 'none';
                document.getElementById("tj1").name = '';
                document.getElementById("tj1").required = false;
                document.getElementById("tj2").style.display = 'none';
                document.getElementById("tj2").name = '';
                document.getElementById("tj2").required = false;
                document.getElementById("tj4").style.display = 'none';
                document.getElementById("tj4").name = '';
                document.getElementById("tj4").required = false;
              }else if(y == '4'){
                document.getElementById("tj4").style.display = '';
                document.getElementById("tj4").name = 'waktu_reminder';
                document.getElementById("tj4").required = true;

                document.getElementById("tj1").name = '';
                document.getElementById("tj1").style.display = 'none';
                document.getElementById("tj1").required = false;
                document.getElementById("tj2").name = '';
                document.getElementById("tj2").style.display = 'none';
                document.getElementById("tj2").required = false;
                document.getElementById("tj3").name = '';
                document.getElementById("tj3").style.display = 'none';
                document.getElementById("tj3").required = false;
              }else{
                document.getElementById("tj1").readOnly = true;
                document.getElementById("tj1").required = true;
                document.getElementById("tj1").value = "";
                document.getElementById("tj1").style.display = '';
                document.getElementById("tj1").name = 'waktu_reminder';

                document.getElementById("tj2").name = '';
                document.getElementById("tj2").style.display = 'none';
                document.getElementById("tj2").required = false;
                document.getElementById("tj3").name = '';
                document.getElementById("tj3").style.display = 'none';
                document.getElementById("tj3").required = false;
                document.getElementById("tj4").name = '';
                document.getElementById("tj4").style.display = 'none';
                document.getElementById("tj4").required = false;
              }
            }
            </script>
            <div class="form-group col-md-6">
             <label for="exampleInputPassword1">Tetapkan Jadwal Report</label>
             <input class="form-control" id="tj1" placeholder="dd/mm/yyyy" readonly type="text">

             <?php
             // if else menampilkan hari
              $cekDay = $u->waktu_jenis_report;
              if($cekDay == 'Mon'){
                $vewOut = 'Senin';
                $vewIn  = 'Mon';
              }elseif($cekDay == 'Tue'){
                $vewOut = 'Selasa';
                $vewIn  = 'Tue';
              }elseif($cekDay == 'Wed'){
                $vewOut = 'Rabu';
                $vewIn  = 'Wed';
              }elseif($cekDay == 'Thu'){
                $vewOut = 'Kamis';
                $vewIn  = 'Thu';
              }elseif($cekDay == 'Fri'){
                $vewOut = 'Jumat';
                $vewIn  = 'Fri';
              }elseif($cekDay == 'Sat'){
                $vewOut = 'Saptu';
                $vewIn  = 'Sat';
              }elseif($cekDay == 'Sun'){
                $vewOut = 'Minggu';
                $vewIn  = 'Sun';
              }else{
                $vewOut = '--Harian--';
                $vewIn  = '';
              }
             ?>

             <select class="form-control" id="tj2" style="display:none;">
               <option value="<?php echo $vewIn; ?>"><?php echo $vewOut; ?></option>
               <option value="Mon">Senin</option>
               <option value="Tue">Selasa</option>
               <option value="Wed">Rabu</option>
               <option value="Thu">Kamis</option>
               <option value="Fri">Jumat</option>
               <option value="Sat">Saptu</option>
               <option value="Sun">Minggu</option>
             </select>
             <?php
             $cekDate = $u->waktu_jenis_report;
             if($cekDate == '1'){
              $bln = '1';
              $blnv = '1';
             }elseif($cekDate == '2'){
              $bln = '2';
              $blnv = '2';
             }elseif($cekDate == '3'){
              $bln = '3';
              $blnv = '3';
             }elseif($cekDate == '4'){
              $bln = '4';
              $blnv = '4';
             }elseif($cekDate == '5'){
              $bln = '5';
              $blnv = '5';
             }elseif($cekDate == '6'){
              $bln = '6';
              $blnv = '6';
             }elseif($cekDate == '7'){
              $bln = '7';
              $blnv = '7';
             }elseif($cekDate == '8'){
              $bln = '8';
              $blnv = '8';
             }elseif($cekDate == '9'){
              $bln = '9';
              $blnv = '9';
             }elseif($cekDate == '10'){
              $bln = '10';
              $blnv = '10';
             }elseif($cekDate == '11'){
              $bln = '11';
              $blnv = '11';
             }elseif($cekDate == '12'){
              $bln = '12';
              $blnv = '12';
             }elseif($cekDate == '13'){
              $bln = '13';
              $blnv = '13';
             }elseif($cekDate == '14'){
              $bln = '14';
              $blnv = '14';
             }elseif($cekDate == '15'){
              $bln = '15';
              $blnv = '15';
             }elseif($cekDate == '16'){
              $bln = '16';
              $blnv = '16';
             }elseif($cekDate == '17'){
              $bln = '17';
              $blnv = '17';
             }elseif($cekDate == '18'){
              $bln = '18';
              $blnv = '18';
             }elseif($cekDate == '19'){
              $bln = '19';
              $blnv = '19';
             }elseif($cekDate == '20'){
              $bln = '20';
              $blnv = '20';
             }elseif($cekDate == '21'){
              $bln = '21';
              $blnv = '21';
             }elseif($cekDate == '22'){
              $bln = '22';
              $blnv = '22';
             }elseif($cekDate == '23'){
              $bln = '23';
              $blnv = '23';
             }elseif($cekDate == '24'){
              $bln = '24';
              $blnv = '24';
             }elseif($cekDate == '25'){
              $bln = '25';
              $blnv = '25';
             }elseif($cekDate == '26'){
              $bln = '26';
              $blnv = '26';
             }elseif($cekDate == '27'){
              $bln = '27';
              $blnv = '27';
             }elseif($cekDate == '28'){
              $bln = '28';
              $blnv = '28';
             }elseif($cekDate == '29'){
              $bln = '29';
              $blnv = '29';
             }elseif($cekDate == '30'){
              $bln = '30';
              $blnv = '30';
             }elseif($cekDate == '31'){
              $bln = '31';
              $blnv = '31';
             }else{
              $bln = '-- Pilih Tanggal (1 - 31) --';
              $blnv = '';
             }
             ?>
             <select id="tj3" class="form-control" style="display:none;">
               <option value="<?php echo $blnv; ?>"><?php echo $bln; ?></option>
               <?php  for ($x = 01; $x <= 31; $x++) { ?>
               <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
               <?php } ?>
             </select>
             <?php
             $Get_date  = $u->waktu_jenis_report;
             $date_cek = DateTime::createFromFormat ( "d/m/Y", $Get_date );
             if(!empty($date_cek)){
               $hasil_date_cek = $u->waktu_jenis_report;
             }else {
               $hasil_date_cek = '';
             }
             ?>
             <input class="form-control datepicker" id="tj4" placeholder="dd/mm/yyyy" style="display:none;" data-date-format="dd/mm/yyyy" type="text" value="<?php echo $hasil_date_cek; ?>" maxlength="12">
            </div>

            <div class="form-group col-md-12">
             <label for="exampleInputEmail1">Reminder By</label>
             <select class="form-control select2 select2-hidden-accessible" name="id_reminder_by" required>
               <option value="<?php echo $u->id_reminder_by; ?>"><?php echo $u->reminder; ?></option>
               <option value="1">No Need</option>
               <!--option value="2">Report a days</option-->
               <option value="3">SMS</option>
               <option value="4">Email</option>
               <!--option value="5">Pop Up My Account</option-->
             </select>
            </div>

            <div class="form-group col-md-12">
             <label for="exampleInputEmail1">Judul Pekerjaan</label>
             <p class="message form-control" style="height:auto;background:#f9f9f9;"><?php echo $u->judul_pekerjaan; ?></p>
            </div>

            <div class="form-group col-md-12">
             <label for="exampleInputPassword1">Detail</label>
             <p class="message form-control" style="height:auto;background:#f9f9f9;waktu_reminder"><?php echo $u->pekerjaan; ?></p>
            </div>

           </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="col-md-12 text-center">
            <a href="<?php echo base_url('Pegawai/Home/List_Pekerjaan'); ?>" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
         </form>
         <?php } ?>
        </div>
      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->
</div>
