<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-12">

    <div class="panel panel-info" style="border:1px solid #f7f5f5;">
      <div class="panel-heading" style="background:#3a5795;color:#fff;border:none;">
        <div class="panel-title text-center">Sign In Kabag</div>
      </div>

      <div style="padding-top:10px;background:#f1f1f1;" class="panel-body" >
      <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

      <form id="form_action" method="post">
        <label for="middle-name" class="control-label">Username<span >*</span></label>
        <div style="margin-bottom: 10px;" class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user" style="color:#3a5795;"></i></span>
        <input id="user" type="text" class="form-control" name="user_kabag" placeholder="username" required>
        </div>

        <label for="middle-name" class="control-label">Password<span >*</span></label>
        <div style="margin-bottom: 10px" class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock" style="color:#3a5795;"></i></span>
          <input id="pass" type="password" class="form-control" name="pass_kabag" placeholder="password" required>
        </div>

        <label for="middle-name" class="control-label">Select Port<span >*</span></label>
        <div style="margin-bottom: 25px" class="input-group">
          <span class="input-group-addon"><i class="fa fa-sort-amount-asc" aria-hidden="true" style="color:#3a5795;"></i></span>
          <select required id="idport" class="form-control" name="id_port">
            <option value=""></option>
            <option value="1">Bali</option>
            <option value="2">Balikpapan</option>
            <option value="3">Malang</option>
            <option value="4">Samarinda</option>
          </select>
        </div>

        <div style="margin-top:10px" class="form-group">
          <div class="col-sm-12 col-xm controls">
          <button type="button" class="btn btn-success" onclick="action_login()" id="btn-run">Login  </button>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-12 col-xs-12 col-sm-12 control">
          <div style="border-top: 1px solid #d8d8d8; padding-top:15px; font-size:85%" class="col-md-12 col-sm-12 col-xs-12">
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
$('#form_action').keypress(function (e) {
  if (e.which == 13) {
    $("#btn-run").click();
  return false;
  }
});

  function action_login(){
    var user1 = document.getElementById("user").value;
    var pass2 = document.getElementById("pass").value;
    var idport3 = document.getElementById("idport").value;

    if(user1 == "" && pass2 == "" && idport3 == ""){
      swal({
        title: "",
        text: "Column can't be empty!",
        type: "error",
        timer: 1700,
        showConfirmButton: false
      });
    }else {

      $.ajax({
        url : "<?php echo base_url('Login/cek_user_kabag'); ?>",
        type: "POST",
        data: $('#form_action').serialize(),
        dataType: "JSON",
        success: function(data){
        //console.log(data.NameU);
          if(data == 'Success'){
            swal({
              title: "",
              text: "Succes",
              type: "success",
              timer: 1000,
              showConfirmButton: false
            });
            setInterval(function(){window.location.href = '<?php echo base_url();?>Kabag/Home';},1100)
          }else{
            swal({
              title: "",
              text: "Username or password not detected",
              type: "error",
              timer: 1700,
              showConfirmButton: false
            });
          }
        },
        error: function (jqXHR, textStatus, errorThrown){
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
