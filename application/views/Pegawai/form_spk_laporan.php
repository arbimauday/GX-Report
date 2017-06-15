<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>SPK Pekerjaan <small></small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-random"></i> SPK Pekerjaan</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-12 connectedSortable">
        <div class="box box-primary">
         <div class="box-header with-border">
          <h3 class="box-title">Form Pekerjaan</h3>
          <div class="box-tools pull-right" data-toggle="tooltip">
           <div class="btn-group" data-toggle="btn-toggle">
             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
             </button>
           </div>
          </div>
         </div>
      <!-- /.box-header -->
      <!-- form start -->
         <form method="post" action="<?php echo base_url(); ?>Pegawai/Home/input_spk_pekerjaan">

          <div class="box-body">
           <div class="col-md-8 col-md-offset-2">
            <div class="form-group col-md-12">
             <label for="exampleInputEmail1">Judul Pekerjaan</label>
             <small class="text-red pull-right">Pemberian JUDUL PEKERJAAN tidak boleh sama</small>
             <input class="form-control" placeholder="JUDUL PEKERJAAN / TITEL" type="text" name="judul_pekerjaan" maxlength="100" required>
            </div>

            <div class="form-group col-md-6">
             <label for="exampleInputEmail1">Jenis Pekerjaan</label>
             <select class="form-control select2 select2-hidden-accessible" name="id_jenis_pekerjaan" required>
               <option value=""></option>
               <option value="1">Routin</option>
               <option value="2">Project</option>
             </select>
            </div>
            <div class="form-group col-md-6">
             <label for="exampleInputEmail1">Category</label>
             <select class="form-control select2 select2-hidden-accessible" name="id_category" required>
               <option value=""></option>
               <?php  for ($x = 01; $x <= 5; $x++) { ?>
               <option value="<?php echo $x; ?>">Level <?php echo $x; ?></option>
               <?php } ?>
             </select>
            </div>

            <div class="form-group col-md-6">
             <label for="exampleInputEmail1">Jenis Report</label>
             <select class="form-control select2 select2-hidden-accessible" name="id_jenis_report"  id="id_report" onChange="edit_date()" required>
               <option value=""></option>
               <option value="1">Harian</option>
               <option value="2">Mingguan</option>
               <option value="3">Bulanan</option>
               <option value="4">Project</option>
             </select>
            </div>

            <script>
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

             <select class="form-control" id="tj2" style="display:none;">
               <option value="">-- Hari --</option>
               <option value="Mon">Senin</option>
               <option value="Tue">Selasa</option>
               <option value="Wed">Rabu</option>
               <option value="Thu">Kamis</option>
               <option value="Fri">Jumat</option>
               <option value="Sat">Saptu</option>
               <option value="Sun">Minggu</option>
             </select>

             <select id="tj3" class="form-control" style="display:none;">
               <option value=""> -- Pilih Tanggal (1 - 31)</option>
               <?php  for ($x = 01; $x <= 31; $x++) { ?>
               <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
               <?php } ?>
             </select>

             <input class="form-control datepicker" id="tj4" placeholder="dd/mm/yyyy" style="display:none;" data-date-format="dd/mm/yyyy" type="text" maxlength="12">
            </div>

            <div class="form-group col-md-6">
             <label for="exampleInputEmail1">Tanggal</label>
             <input class="form-control" placeholder="dd/mm/yyyy" name="tgl_report" readonly value="<?php echo date('d/m/Y'); ?>" type="text" maxlength="12" required class="form-control">
            </div>
            <div class="form-group col-md-6">
             <label for="exampleInputEmail1">Reminder By</label>
             <select class="form-control select2 select2-hidden-accessible" name="id_reminder_by" required>
               <option value=""></option>
               <option value="1">No Need</option>
               <!--option value="2">Report a days</option-->
               <option value="3">SMS</option>
               <option value="4">Email</option>
               <!--option value="5">Pop Up My Account</option-->
             </select>
            </div>

            <!--div class="form-group col-md-6">
             <label for="exampleInputEmail1">SMS To</label>
             <input class="form-control" placeholder="081xxxxxxx" name="sms_to" type="number" required class="form-control">
            </div>
            <div class="form-group col-md-6">
             <label for="exampleInputEmail1">Email To</label>
             <input class="form-control" placeholder="@exemple " name="email_to" type="email" maxlength="50" required class="form-control">
           </div-->

            <div class="form-group col-md-12">
             <label for="exampleInputPassword1">Detail</label>
             <textarea class="form-control" rows="6" required placeholder="text..." name="pekerjaan"></textarea>
            </div>

           </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </div>
         </form>
        </div>
      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->
</div>
