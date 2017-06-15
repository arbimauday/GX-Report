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
    <h1>Laporkan Pekerjaan<small><?php echo date('d/m/Y'); ?></small>  <button class="btn btn-danger btn-xs" onclick="history.go(-1);">Kembali</button></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-bookmark"></i> Data Pekerjaan</a></li>
      <li class="active">Laporan Pekerjaan</li>
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
            <div class="col-md-12" style="border: 1px solid #e6e6e6;padding-top: 12px;">
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

              <div class="form-group col-md-6">
               <label for="recipient-name" class="control-label">Status</label>
               <select class="form-control select2 select2-hidden-accessible" required name="id_status_report">
                <option value="<?php echo $u->id_status_report; ?>"><?php echo $u->status_report; ?></option>
                <option value="1">Open</option>
                <option value="2">Pending</option>
                <option value="3">Closed</option>
               </select>
              </div>
              <div class="form-group col-md-6">
               <label for="message-text" class="control-label">Persentasi Pekerjaan (%)</label>
               <input required class="form-control" max="100" type="number" name="progress_bar" min="<?php echo $u->progress_bar; ?>">
              </div>
              <div class="form-group col-md-12">
               <label for="message-text" class="control-label">Laporan</label>
               <textarea class="form-control" placeholder="text.." name="isiLaporan" rows="8"></textarea>
              </div>
              <div class="form-group col-md-6">
               <label for="recipient-name" class="control-label">Jenis Pengiriman</label>
               <select class="form-control select2 select2-hidden-accessible" name="id_kirim_report" aria-hidden="true" required>
                <option value="2">Langsung</option>
                <!--option value=""></option>
                <option value="1">Tunda</option-->
               </select>
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Sertakan gambar ??</label><br>
                <div class="radio col-md-12">
                <label><input type="radio" required onclick="show()" name="cek" value="Yes"> Ya</label>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <label><input type="radio" name="cek" onclick="hide()" value="Tidak" required> Tidak</label>
                </div>
              </div>
              <div class="form-group col-md-12" style="display:none;" id="part-img">
                <label class="control-label">Images &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-red">max size img for uploads : 1 MB</span></label>
                <input id="file-5" name="img_file[]" class="file" type="file" multiple  data-preview-file-type="any" data-upload-url="#" accept="image/x-png,image/gif,image/jpeg">
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

      <!-- Rekapan laporan -->
      <section class="col-lg-12 connectedSortable">
        <div class="box box-info">
          <div class="box-header with-border">
           <h3 class="box-title">Rangkuman Laporan</h3>
           <div class="box-tools pull-right" data-toggle="tooltip">
            <div class="btn-group" data-toggle="btn-toggle">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
           </div>
          </div>
          <div class="box-body">
            <!--div class="direct-chat-messages" style="height:700px;">
            </div-->
           <div class="table-responsive">
            <table id="rangkuman_laporan" class="table table-bordered table-striped">
              <thead>
               <tr class="bg-info">
                <th style="width:90px;">Pengirim</th>
                <th style="width:100px;">Tanggal</th>
                <th style="width:80px;">Perkembangan</th>
                <th style="width:700px;">Isi Laporan</th>
                <th>Images</th>
               </tr>
              </thead>
              <tbody>
                <?php
                 foreach ($rangkuman_report as $rk) {
                ?>
                <tr>
                 <td><?php echo $rk->call_name; ?></td>
                 <td><?php echo $rk->tgl_update.'<br> '.$rk->time_update; ?></td>
                 <td><?php echo $rk->status_report .' / '. $rk->update_progress; ?>%</td>
                 <td style="text-align:left;"><?php echo $rk->isi_update; ?></td>
                 <td><?php foreach ($img_laporan as $ul) { ?>
                   <?php
                   if($rk->tgl_update == $ul->tgl_upload_img && $rk->id_report == $ul->id_report){ ?>
                   <img class="img-thumbnail" onclick="upimg('#popimg<?php echo $ul->id_upload_image; ?>')" style="width:50px;height:50px;cursor: pointer;" src="<?php echo base_url('uploads/laporan/'.$ul->img_upload); ?>" id="popimg<?php echo $ul->id_upload_image; ?>" data-toggle="modal" data-target="#myModal">
                 <?php }} ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
           </div>
          </div>
        </div>
      </section>
      <!--/ Rekapan laporan -->

    </div>
    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->
</div>

<!-- popup image -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-body">
     <img class="showimage img-responsive" rows="2" src="">
    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </div>
  </div>
</div>

<script>
function upimg(id){
  var popimg = $(id).attr('src');
  console.log(popimg);
  $('#myModal').on('show.bs.modal', function(){
  $(".showimage").attr("src", popimg);
  });
}
</script>
<!--/ popup image -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
function hide(){
    document.getElementById('part-img').style.display = "none";
}
function show(){
    document.getElementById('part-img').style.display = "block";
}

$("#file-5").fileinput({
  /*'allowedFileExtensions': ['jpg', 'png', 'gif'],
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-primary btn-lg",
        fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
        overwriteInitial: false,
        initialPreviewAsData: true,*/
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        //overwriteInitial: false,
        maxFileSize: 1000,
        maxFilesNum: 10,
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });/*
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
    });*/

</script>


<!-- script upload images manual -->
<!--input type="file" name="img_file[]" multiple id="gallery-photo-add" class="form-control" onclick="delimg()"-->
<!--
<div class="form-group col-md-12">
  <div class="gallery">
  </div>
</div>


$(function() {
  // Multiple images preview in browser
  var imagesPreview = function(input, placeToInsertImagePreview) {
    if (input.files) {
      var filesAmount = input.files.length;
      var noid = 1;
      var img = $(".gallery img").length;// menghitung jumlah images untuk looping
      for (i = img; i < filesAmount; i++) {
      var reader = new FileReader();
      reader.onload = function(event) {
        img++
      $($.parseHTML('<img class="img-thumbnail" onclick="upimg(aa'+img+')" style="width:50px;height:50px;cursor: pointer;" id="aa'+img+'" data-toggle="modal" data-target="#myModal">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
      //$('.gallery').append('<input type="hidden" name="titleimg" id="aa'+noid+'up">');
      }
      reader.readAsDataURL(input.files[i]);
      }
    }

  };

  $('#gallery-photo-add').on('change', function() {
    imagesPreview(this, 'div.gallery');
  });
});

function delimg(){
  //$('.gallery').html("");
}

function upimg(id) {
  var image = $(id).attr('src');
  /*var tit = $(id).attr('id')+'up';
  console.log(tit);*/
  $('#myModal').on('show.bs.modal', function(){
  $(".showimage").attr("src", image);

  });
}

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
   <div class="modal-content">
    <--div class="modal-header">
     <input type="text" id="iptimg" class="form-control modal-title" placeholder="ket image..">
    </div->
    <div class="modal-body">
     <img class="showimage img-responsive" rows="2" src="">
    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </div>
  </div>
</div>
-->
