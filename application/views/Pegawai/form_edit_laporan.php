<script src="<?php echo base_url();?>assets-admin/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
  tinymce.init({
    selector:'textarea',
    menubar: false,
    plugins: "textcolor",
    toolbar: "insertfile undo redo | forecolor backcolor | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
  });
</script>

<!-- plugins upload images -->
<link href="<?php echo base_url(); ?>assets-admin/upload-img/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets-admin/upload-img/js/plugins/sortable.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets-admin/upload-img/js/fileinput.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
<!-- tutup plugins -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Laporkan Pekerjaan<small><?php echo date('d/m/Y'); ?></small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-random"></i> Laporan</a></li>
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
          <h3 class="box-title"><?php foreach ($data_pekerjaaan as $u){ echo $u->judul_pekerjaan; } ?></h3>
          <div class="box-tools pull-right" data-toggle="tooltip">
           <div class="btn-group" data-toggle="btn-toggle">
             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
             </button>
           </div>
          </div>
         </div>
      <!-- /.box-header -->
          <div class="box-body">
           <div class="col-md-4">
            <div class="col-md-12">
                <table class="table table-striped">
                  <tbody>
                   <?php foreach ($data_pekerjaaan as $u){ ?>
                   <tr>
                    <td style="width:120px">Jenis Pekerjaan</td>
                    <td>: <?php echo $u->jenis_report; ?></td>
                   </tr>
                   <tr>
                    <td>Category</td>
                    <td>: <?php echo $u->category; ?></td>
                   </tr>
                   <tr>
                    <td>Jenis Report</td>
                    <td>: <?php echo $u->jenis_report; ?></td>
                   </tr>
                   <tr>
                    <td>Jadwal Reminder</td>
                    <td>: <?php echo $u->waktu_jenis_report; ?></td>
                   </tr>
                   <tr>
                    <td>Tanggal</td>
                    <td>: <?php echo $u->tgl_report; ?></td>
                   </tr>
                   <tr>
                    <td>Reminder By</td>
                    <td>: <?php echo $u->reminder; ?></td>
                   </tr>
                   <tr>
                    <td>Status</td>
                    <td>: <?php echo $u->status_report; ?></td>
                   </tr>
                   <tr>
                     <td colspan="2">
                       <div class="progress-group">
                        <span class="progress-text">Persentasi Pekerjaan</span>
                        <span class="progress-number"><b><?php echo $u->progress_bar; ?>%</b></span>
                        <?php $cekBG = $u->progress_bar;
                          if($cekBG < '35'){
                            $Cbg = 'class="progress-bar progress-bar-red"';
                          }else if($cekBG < '65'){
                            $Cbg = 'class="progress-bar progress-bar-yellow"';
                          }else{
                            $Cbg = 'class="progress-bar progress-bar-green"';
                          }
                        ?>
                        <div class="progress">
                          <div <?php echo $Cbg; ?> style="width:<?php echo $u->progress_bar;?>%">
                            <b><?php echo $u->progress_bar; ?>%</b>
                          </div>
                        </div>
                      </div>
                     </td>
                   </tr>
                   <?php } ?>
                 </tbody>
                </table>

                <label for="message-text" class="control-label">Detail Pekerjaan :</label>
                <?php foreach ($data_pekerjaaan as $u){ ?>
                <p class="message form-control" style="height:auto;"><?php echo $u->pekerjaan; ?></p>
                <?php } ?>
            </div>
           </div>

           <div class="col-md-8">
            <form action="<?php echo base_url('Pegawai/Home/inputlaporan_pegawai'); ?>" method="post" enctype="multipart/form-data">
              <input type="hidden" name="idReport" value="<?php echo $u->id_report; ?>">
              <div class="form-group col-md-12">
                <label for="recipient-name" class="control-label">Jenis Laporan</label>
                <select class="form-control select2 select2-hidden-accessible" aria-hidden="true" name="jenisLaporan" required>
                  <option value="1">Pekerjaan Hari Ini</option>
                  <!--option value=""></option>
                  <option value="2">Progress Pekerjaan</option-->
                </select>
              </div>

              <?php foreach ($edit_report as $up) { ?>
              <div class="form-group col-md-6">
                <label for="recipient-name" class="control-label">Status</label>
                <select class="form-control select2 select2-hidden-accessible" required name="id_status_report">
                  <option value="<?php echo $up->id_update_status_report; ?>"><?php echo $up->status_report; ?></option>
                  <option value="1">Open</option>
                  <option value="2">Pending</option>
                  <option value="3">Closed</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="message-text" class="control-label">Persentasi Pekerjaan (%)</label>
                <input required class="form-control" max="100" type="number" name="progress_bar" value="<?php echo $up->update_progress; ?>">
              </div>
              <div class="form-group col-md-12">
                <label for="message-text" class="control-label">Laporan</label>
                <textarea class="form-control" placeholder="text.." name="isiLaporan" rows="8"><?php echo $up->isi_update; ?></textarea>
              </div>
              <div class="form-group col-md-6">
                <label for="recipient-name" class="control-label">Jenis Pengiriman</label>
                <select class="form-control select2 select2-hidden-accessible" name="id_kirim_report" aria-hidden="true" required>
                  <option value="<?php echo $up->id_kirim_report; ?>"><?php echo $up->status_kirim_report; ?></option>
                  <option value="1">Tunda</option>
                  <option value="2">Langsung</option>
                </select>
              </div>
              <?php } ?>
              <div class="form-group col-md-12">
                <label class="control-label">Images &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-red">max size img for uploads : 1 MB</span></label>
                <input id="file-3" name="img_file[]" type="file" multiple accept="image/x-png,image/gif,image/jpeg">
              </div>
              <div  class="box-footer form-group col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Kirim</button>
              </div>
            </form>

           </div>
          </div>
          <!-- /.box-body -->
        </div>
      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->
</div>

<script>
  /*  $('#file-fr').fileinput({
        language: 'fr',
        uploadUrl: '#',
        allowedFileExtensions: ['jpg', 'png', 'gif']
    });
    $('#file-es').fileinput({
        language: 'es',
        uploadUrl: '#',
        allowedFileExtensions: ['jpg', 'png', 'gif']
    });
    $("#file-0").fileinput({
        'allowedFileExtensions': ['jpg', 'png', 'gif']
    });
    $("#file-1").fileinput({
        uploadUrl: '#', // you must set a valid URL here else you will get an error
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        overwriteInitial: false,
        maxFileSize: 1000,
        maxFilesNum: 10,
        //allowedFileTypes: ['image', 'video', 'flash'],
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });
    /*
     $(".file").on('fileselect', function(event, n, l) {
     alert('File Selected. Name: ' + l + ', Num: ' + n);
     });
     */
    $("#file-3").fileinput({
        showUpload: false,
        showCaption: true,
        browseClass: "btn btn-primary btn-file",
        fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
        overwriteInitial: false,
        initialPreviewAsData: true,
        initialPreview: [
          <?php
          foreach ($img_laporan as $u) {
            echo '"'.base_url('uploads/laporan/'.$u->img_upload).'",';
          }
          ?>
        ],
        initialPreviewConfig: [
            {caption: "transport-1.jpg", size: 329892, width: "120px", url: "{$url}", key: 1},
            {caption: "transport-2.jpg", size: 872378, width: "120px", url: "{$url}", key: 2},
            {caption: "transport-3.jpg", size: 632762, width: "120px", url: "{$url}", key: 3}
        ]
    });
    $("#file-4").fileinput({
        uploadExtraData: {kvId: '10'}
    });
    $(".btn-warning").on('click', function () {
        var $el = $("#file-4");
        if ($el.attr('disabled')) {
            $el.fileinput('enable');
        } else {
            $el.fileinput('disable');
        }
    });
    $(".btn-info").on('click', function () {
        $("#file-4").fileinput('refresh', {previewClass: 'bg-info'});
    });
/*
    $(document).ready(function () {
        $("#test-upload").fileinput({
            'showPreview': false,
            'allowedFileExtensions': ['jpg', 'png', 'gif'],
            'elErrorContainer': '#errorBlock'
        });
        $("#kv-explorer").fileinput({
            'theme': 'explorer',
            'uploadUrl': '#',
            overwriteInitial: false,
            initialPreviewAsData: true,
            initialPreview: [
                "http://lorempixel.com/1920/1080/nature/1",
                "http://lorempixel.com/1920/1080/nature/2",
                "http://lorempixel.com/1920/1080/nature/3"
            ],
            initialPreviewConfig: [
                {caption: "nature-1.jpg", size: 329892, width: "120px", url: "{$url}", key: 1},
                {caption: "nature-2.jpg", size: 872378, width: "120px", url: "{$url}", key: 2},
                {caption: "nature-3.jpg", size: 632762, width: "120px", url: "{$url}", key: 3}
            ]
        });
    });*/
</script>
