<!DOCTYPE >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--[if !mso]><!-->
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!--<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title></title>
<style type="text/css">
table{
	border-spacing: 0;
}
</style>
</head>
<body style="margin:0 auto;background:#cacaca;">
<section style="margin:0 auto;width:100%;">
	<table>
	<tr>
	<td width="25%"><td>
	<td width="50%">
	<div style="background:#001b7b;padding-left:50px;height:60px;position: relative;">
		<img src="http://arbaxtreme.tv/GX-Report/assets/images/logo.png" style="margin-top:3px;">
		<!--div style="position: absolute;top: 20px;right: 15px;">
			<a href="" target="_blank" style="background:#ffc000;padding:7px 20px;text-decoration:none;border-radius:5px;">Login</a>
		</div-->
	</div>
  <?php if(!empty($ResultJob)){ ?>
	<div style="font-family: Arial, sans-serif;font-size:17px;padding:20px;padding-left:50px;background:#efefef;">Reminder list job <?php echo date('d-M-Y', strtotime('+1 days', strtotime( date('d-M-Y') ))); ?></div>
	<div style="background:#f7f7f7;padding:10px;">
	<table style="margin:0 auto;font-family: Arial, sans-serif;width:95%;font-size:13px;">
		<?php foreach ($ResultJob as $u){ ?>
		<tr>
			<td>Level</td>
			<td>:</td>
			<td><?php echo $u->category; ?></td>
		</tr>
		<tr>
			<td>Due Date</td>
			<td>:</td>
			<td><?php echo $u->jenis_report; ?></td>
		</tr>
		<tr>
			<td>Status</td>
			<td>:</td>
			<td> <?php echo $u->status_report; ?> / <?php echo $u->progress_bar; ?>%</td>
		</tr>
		<tr>
			<td width="120px" valign="top">Judul Pekerjaan</td>
			<td width="11px" valign="top">:</td>
			<td><?php echo $u->judul_pekerjaan; ?></td>
		</tr>
		<tr>
			<td colspan="3"><hr style="border-width:0;height:1px;background-color:#b5b5b5;"></td>
		</tr>
		<?php }?>
	</table>
	</div>
  <?php }else {?>
  <div align="center" style="background:#e0e0e0;"><img src="http://arbaxtreme.tv/GX-Report/bg.png" width="550px" height="auto"></div>
  <div style="font-family: Arial, sans-serif;font-size:17px;padding:20px;padding-left:50px;background:#efefef;text-align:center;">Tidak ada "Daftar Pekerjaan" untuk hari ini, mungkin anda ingin membuatnya<br>Silakan Login untuk membuatnya </div>
  <?php } ?>
  <div style="font-family: Arial, sans-serif;font-size:17px;padding:20px;padding-left:50px;background:#efefef;"><a href="https://arbaxtreme.tv/GX-Report/Login/Pegawai" style="text-decoration:none;background:#f1b000;padding:7px 20px;text-decoration:none;border-radius:5px;margin:43%;color:#000;" target="_blank"><b>Login</b></a>
  </div>
	<div>
		<div style="font-family:Arial, sans-serif;font-size:13px;color:#828282;text-align:center;background:#e2e2e2;padding:10px 0;">
			<div> <span style="font-size:14px;">Jl. Raya Kerobokan 388x, Br. Semer, Kerobokan Kelod, Kuta,<br/> Kabupaten Badung, Bali 80361</span> <br/><br/>
				Copyright &#169; 2017 <a href="http://www.globalxtreme.net" target="_blank" style="text-decoration:none;color:#828282;"><span style="color:#828282;text-decoration:none;">GlobalXtreme</span></a>. All&nbsp;rights&nbsp;reserved.</div>
		</div>
	</div>
	</td>
	<td width="25%"></td>
	</tr>
	</table>
</section>
</body>
</html>
