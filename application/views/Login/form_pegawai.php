<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-12 ">

    <div class="panel panel-info col-middle" style="border:1px solid #f7f5f5;">
      <div class="panel-heading" style="background:#3a5795;color:#fff;border:none;">
        <div class="panel-title text-center">Sign-In</div>
      </div>

      <div style="padding-top:10px;background:#f1f1f1;border-top:4px solid #2d4579;" class="panel-body" >
      <form id="formLogin">
        <label for="middle-name" class="control-label">Username<span >*</span></label>
        <div style="margin-bottom: 10px;" class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user" style="color:#3a5795;"></i></span>
        <input id="user" type="text" class="form-control" name="user" placeholder="username" required>
        </div>

        <label for="middle-name" class="control-label">Password<span >*</span></label>
        <div style="margin-bottom: 10px" class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock" style="color:#3a5795;"></i></span>
          <input id="pass" type="password" class="form-control" name="pass" placeholder="password" required>
        </div>

        <div style="margin-top:10px" class="form-group">
          <div class="col-sm-12 col-xs-12 col-md-12 controls">
          <button type="button" id="btn-run" class="btn btn-success col-sm-12 col-xs-12 col-md-12" onclick="actionlogin()"><i class="fa fa-sign-in"></i> Login </button>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-12 col-xs-12 col-sm-12 control">
          <div style="border-top: 1px solid #d8d8d8; padding-top:15px; font-size:85%" class="col-md-12 col-sm-12 col-xs-12 text-center">
          Template By
          <a href="http://globalxtreme.tv" target="_blank">
          Arbaxtreme.tv
          </a>
          </div>
          </div>
        </div>
      </form>
  </div>
  </div>
  </div>
</div>

<script>
  $('#formLogin').keypress(function (e) {
    if (e.which == 13) {
      $("#btn-run").click();
    return false;
    }
  });

  function actionlogin(){
    var user1 = document.getElementById("user").value;
    var pass2 = document.getElementById("pass").value;

    if(user1 == "" || pass2 == ""){
      swal({
        title: "",
        text: "Column can't be empty!",
        type: "error",
        timer: 1700,
        showConfirmButton: false
      });
    }else {
    $.ajax({
      url : "<?php echo base_url();?>Login/cek_user_pegawai",
      type: "POST",
      data: $('#formLogin').serialize(),
      dataType: "JSON",
      success: function(data){
        //if(!empty(data)){

          if(data == 'Success_pgw'){
            swal({
              title: "",
              text: "Succes",
              type: "success",
              timer: 1000,
              showConfirmButton: false
            });
            setInterval(function(){
              $.ajax({url : "<?php echo base_url();?>F_ajax/Ajax/update_notification"});
              window.location.href = '<?php echo base_url();?>Pegawai/Home';},1100)
          }else if(data == 'Success_kbg') {
            swal({
              title: "",
              text: "Succes",
              type: "success",
              timer: 1000,
              showConfirmButton: false
            });
            setInterval(function(){window.location.href = '<?php echo base_url();?>Kabag/Home';},1100)
          }else if (data == 'Success_adm') {
            swal({
              title: "",
              text: "Succes",
              type: "success",
              timer: 1000,
              showConfirmButton: false
            });
            setInterval(function(){window.location.href = '<?php echo base_url();?>Admin/Home';},1100)
          }else if (data == 'Belum terdaftar') {
            swal({
              title: "",
              text: "Username belum terdaftar",
              type: "warning",
              timer: 1500,
              showConfirmButton: false
            });
          }else if (data == 'Password salah') {
            swal({
              title: "",
              text: "Password yang anda masuk salah",
              type: "warning",
              timer: 1500,
              showConfirmButton: false
            });
          }else if (data == 'Belum di konfirmasi') {
            swal({
              title: "",
              text: "Akun Belum di Konfirmasi",
              type: "warning",
              timer: 1500,
              showConfirmButton: false
            });
          }else {
            swal({
              title: "",
              text: "Account is empty",
              type: "error",
              timer: 1200,
              showConfirmButton: false
            });
          }

        /*}else{
          swal({
            title: "",
            text: "Username or password not detected",
            type: "error",
            timer: 1700,
            showConfirmButton: false
          });
        }*/
      },
      error: function (jqXHR, dfxvxxzc, errorThrown){
        swal({
          title: "",
          text: "Account Empty",
          type: "error",
          timer: 1200,
          showConfirmButton: false
        });
      }
    });
   }
  }
</script>
