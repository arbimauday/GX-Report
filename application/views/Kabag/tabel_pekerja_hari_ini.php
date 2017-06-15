<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Anggota Pekerja
      <small><?php echo $_SESSION['DivisiKabag'].' || '. date('d/m/Y'); ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-bookmark"></i> Data Pekerjaan</a></li>
      <li class="active">Anggota Pekerja</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Main row -->
    <div class="row">
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-12 connectedSortable">
        <div class="box box-primary">
          <div class="box-header">
           <h3 class="box-title">Tabel Pekerja</h3>
           <div class="box-tools pull-right" data-toggle="tooltip">
            <div class="btn-group" data-toggle="btn-toggle">
             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
             </button>
            </div>
           </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
           <div class="col-sm-12 table-responsive">
           <table id="example1" class="table table-bordered table-striped">
             <thead>
              <tr>
               <th width="1px">#</th>
               <th>Nama Pegawai</th>
               <th>Ket Absen</th>
               <th>Aksi</th>
              </tr>
             </thead>
             <tbody>
              <?php $no=0; foreach ($daftar_anggota as $u) {
                $no += 1;
              ?>
              <tr>
               <td><?php echo $no; ?></td>
               <td><?php echo $u->call_name; ?></td>
               <td></td>
               <td>
                 <a href="<?php echo base_url('Kabag/Home/Cek_Pekerjaan/'.$u->id_user_pegawai.'/'.$u->call_name); ?>" class="btn bg-purple btn-sm" ><i class="fa fa-eye"></i> Pekerjaan Hari  Ini</a>
                 <a href="<?php echo base_url('Kabag/Home/History_Laporan/'.$u->id_user_pegawai.'/'.$u->call_name); ?>" class="btn bg-olive btn-sm" ><i class="fa  fa-paperclip"></i> History Laporan</a>
                 <a href="<?php echo base_url('Kabag/Home/List_pekerjaan_pegawai/'.$u->id_user_pegawai.'/'.$u->call_name); ?>" class="btn bg-purple btn-sm" style="background-color:#993d86 !important;"><i class="fa fa-sort-amount-desc"></i> List Pekerjaan</a>
               </td>
              </tr>
              <?php } ?>
            </tbody>
            </table>
            </div>
          </div>
        </div>


      </section>
    </div>

  </section>
  <!-- percobaan -->
  <!--div id="notif"></div>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js";></script>
  <script type="text/javascript">
  var last = <?php echo $_SESSION['IdUser']; ?>;
  $('<audio id="chatAudio"><source src="<?php echo base_url(); ?>assets-admin/audio/notifikasi.ogg" type="audio/ogg"><source src="<?php echo base_url(); ?>assets-admin/audio/otifikasi.mp3" type="audio/mpeg"><source src="<?php echo base_url(); ?>assets-admin/audio/notifikasi.wav" type="audio/wav"></audio>').appendTo('body');
  $(document).ready(function(){
    function load() {
          $.ajax({ //create an ajax request to load_page.php
              type: "GET",
              url: '<?php echo base_url('F_ajax/Ajax/coba/'); ?>'+last,
              dataType: "html", //expect html to be returned
              success: function (response) {
                  $("#notif").html(response);
                  $("#messageid").text('You have '+ response +' messages');
                  $('#chatAudio')[0].play();
                  // pinotifi
                  setTimeout(load, 3000)
              },
              error: function (jqXHR, textStatus, errorThrown){
                //alert("Hello");
                $("messageid").text('Your Messages');
                setTimeout(load, 3000)
              }
          });
      }

      load(); //if you don't want the click
      $("#display").click(load); //if you want to start the display on click
  });
</script-->
</div>
