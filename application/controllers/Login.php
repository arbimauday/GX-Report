<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	protected $pegawai = 'Login/form_pegawai';
  protected $kabag   = 'Login/form_kabag';
  protected $admin   = 'Login/form_admin';

	function __construct(){
		parent::__construct();
		$this->load->model('M_login');
		$this->load->helper('form', 'cookie', 'url');
		$this->load->library('session','database');
	}

function index(){
  if(!empty($this->session->userdata('IdUser')) && !empty($this->session->userdata('UserPegawai')) && !empty($this->session->userdata('CallNamePegawai')) && $this->session->userdata('IdStatus') == "2"){
  redirect('Pegawai/Home');//url redirect pegawai
	}else if (!empty($this->session->userdata('IdKabag')) && !empty($this->session->userdata('UserKabag')) && !empty($this->session->userdata('IdPortKabag')) && !empty($this->session->userdata('IdDivisiKabag'))){
	redirect('Kabag/Home');//url redirect kabag
	}else if (!empty($this->session->userdata('IdAdmin')) && !empty($this->session->userdata('UserAdmin')) && !empty($this->session->userdata('IdLevelAdmin'))){
	redirect('Admin/Home');//url redirect	admin
	}else{
    $data['title'] = 'Login-Pegawai';
    $data['content'] = $this->pegawai;
    $data['plugins'] = '';
    $this->load->view('Login/template_login',$data);
  }
}

function cek_user_pegawai(){
	$user 	 = $this->input->post('user');
	$pass 	 = $this->input->post('pass');

	$cekuser = array('user' => $user);
	$cekpass = array('pass' => MD5($pass));
	$cekconfir = array('user' => $user,'pass' => MD5($pass),'id_status_akun' => "2");

	$result_user = $this->M_login->cek_and_recek_user($cekuser,'user_pegawai');

	$result_pass = $this->M_login->cek_and_recek_user($cekpass,'user_pegawai');

	$result_confir = $this->M_login->cek_and_recek_user($cekconfir,'user_pegawai');

	if(empty($result_user)){
		$data = "Belum terdaftar"; // cek user
	}elseif (empty($result_pass)) {
		$data = "Password salah"; // cek password
	}elseif (empty($result_confir)) {
		$data = "Belum di konfirmasi";// cek konfirmasi akun
	}else {
		$cekhasil = $this->M_login->cek_akun_pegawai($user,MD5($pass));
		foreach($cekhasil as $u_cek){
			$cek_akun = $u_cek->id_level_akun;
			if($cek_akun == '1'){// level pegawai
				foreach($cekhasil as $u){
		      $sess_data['IdUser'] = $u->id_user_pegawai;
		      $sess_data['UserPegawai'] = $u->user;
		      $sess_data['CallNamePegawai'] = $u->call_name;
		      $sess_data['IdPegawai'] 	= $u->id_pegawai;
		      $sess_data['NamaPegawai'] = $u->nama_lengkap;
		      $sess_data['KodePegawai'] = $u->kode_pegawai;
		      $sess_data['IdPort']      = $u->id_port;
		      $sess_data['NamaPort']    = $u->nama_port;
		      $sess_data['IdDivisi']    = $u->id_divisi;
		      $sess_data['NamaDivisi']  = $u->divisi;
		      $sess_data['IdStatus']    = $u->id_status_akun;
		      $sess_data['NamaStatus']  = $u->status_akun;
		      $this->session->set_userdata($sess_data);
					$data = "Success_pgw";
				}
			}elseif($cek_akun == '2'){// level kabag
				foreach($cekhasil as $u){
		      $sess_data['IdKabag'] 			= $u->id_user_pegawai;
		      $sess_data['NameCallKabag'] = $u->call_name;
		      $sess_data['KabagKP'] = $u->kode_pegawai;
		      $sess_data['IdPortKabag']   = $u->id_port;
		      $sess_data['PortKabag']     = $u->id_port;
		      $sess_data['IdDivisiKabag'] = $u->id_divisi;
		      $sess_data['DivisiKabag']  	= $u->divisi;
		      $sess_data['UserKabag']  		= $u->user;
		      $sess_data['LevelAkun']  		= $u->nama_level;
		      $sess_data['IdLevelAkun']  	= $u->id_level_akun;
		      $this->session->set_userdata($sess_data);
					$data = "Success_kbg";
		  	}
			}elseif ($cek_akun == '3') {// level admin
				foreach($cekhasil as $u){
		      $sess_data['IdAdmin'] = $u->id_user_pegawai;
		      $sess_data['NameCallAdmin'] = $u->call_name;
		      $sess_data['UserAdmin']  = $u->user;
		      $sess_data['IdLevelAdmin']  = $u->id_level_akun;
		      $sess_data['LevelAdmin']  = $u->nama_level;
		      $this->session->set_userdata($sess_data);
					$data = "Success_adm";
		  	}
			}else {
				$data = "";
			}
		}
	}




    // Proses membuat Session

	echo json_encode($data);
}

public function Logout_pegawai(){
	if(!Empty($this->session->userdata('IdUser')) && !Empty($this->session->userdata('UserPegawai')) && !Empty($this->session->userdata('CallNamePegawai')) && !Empty($this->session->userdata('IdStatus'))){
		$del_dis =
    $this->session->unset_userdata($this->session->unset_userdata('IdUser'),$this->session->unset_userdata('UserPegawai'),$this->session->unset_userdata('CallNamePegawai'),$this->session->unset_userdata('IdStatus'));
	}
	  if($del_dis == false){
	    redirect(base_url().'Login');
	  }else {
	    echo " <script>alert('Gagal Log-Out..');history.go(-1);</script>";
	  }
}

// Proses kabag
function Kabag(){
  if(!empty($this->session->userdata('IdKabag')) && !empty($this->session->userdata('UserKabag')) && !empty($this->session->userdata('IdPortKabag')) && !empty($this->session->userdata('IdDivisiKabag'))){
  redirect('Kabag/Home');
  }else{
    $data['title'] = 'Login-Kabag';
    $data['content'] = $this->kabag;
    $data['plugins'] = '';
    $this->load->view('Login/template_login',$data);
  }
}

public function cek_user_kabag(){
  $user 	 = $this->input->post('user_kabag');
	$pass 	 = $this->input->post('pass_kabag');
	$id_port = $this->input->post('id_port');
	$id_level_akun = "2";
	$_cekUser = $this->M_login->cek_akun_kabag($user,md5($pass),$id_port,$id_level_akun);
  // Proses membuat Session
    foreach($_cekUser as $u){
      $sess_data['IdKabag'] 			= $u->id_user_pegawai;
      $sess_data['NameCallKabag'] = $u->call_name;
      $sess_data['KabagKP'] = $u->kode_pegawai;
      $sess_data['IdPortKabag']   = $u->id_port;
      $sess_data['PortKabag']     = $u->id_port;
      $sess_data['IdDivisiKabag'] = $u->id_divisi;
      $sess_data['DivisiKabag']  	= $u->divisi;
      $sess_data['UserKabag']  		= $u->user;
      $sess_data['LevelAkun']  		= $u->nama_level;
      $sess_data['IdLevelAkun']  	= $u->id_level_akun;
      $this->session->set_userdata($sess_data);
			$data = "Success";
  	}
	echo json_encode($data);
}

public function Logout_Kabag(){
	if(!Empty($this->session->userdata('IdKabag')) && !Empty($this->session->userdata('UserKabag')) && !Empty($this->session->userdata('NameCallKabag')) && !Empty($this->session->userdata('IdLevelAkun') == '2')){

		$del_dis2 =
    $this->session->unset_userdata($this->session->unset_userdata('IdKabag'),$this->session->unset_userdata('NameCallKabag'),$this->session->unset_userdata('IdPortKabag'),$this->session->unset_userdata('PortKabag'),$this->session->unset_userdata('IdLevelAkun'));
		if($del_dis2 == false){
	    redirect(base_url().'Login');
	  }else {
	    echo " <script>alert('Gagal Log-Out..');history.go(-1);</script>";
	  }
	}else {
		echo " <script>alert('Gagal Log-Out..');history.go(-1);</script>";
	}

}

// proses admin
function Admin(){
  if(!empty($this->session->userdata('IdAdmin')) && !empty($this->session->userdata('UserAdmin')) && !empty($this->session->userdata('IdLevelAdmin'))){
  redirect('Admin/Home');
  //url redirect
  }else{
    $data['title'] = 'Login-Admin';
    $data['content'] = $this->admin;
    $data['plugins'] = '';
    $this->load->view('Login/template_login',$data);
  }
}

public function cek_user_admin(){
  $user 	 = $this->input->post('user_Admin');
	$pass 	 = $this->input->post('pass_Admin');
	$_cekUser = $this->M_login->cek_akun_admin($user,md5($pass));
  // Proses membuat Session
  if(!empty($_cekUser)){
    foreach($_cekUser as $u){
      $sess_data['IdAdmin'] = $u->id_user_pegawai;
      $sess_data['NameCallAdmin'] = $u->call_name;
      $sess_data['UserAdmin']  = $u->user;
      $sess_data['IdLevelAdmin']  = $u->id_level_akun;
      $sess_data['LevelAdmin']  = $u->nama_level;
      $this->session->set_userdata($sess_data);
  	}
      $data['_cek'] = "Success";
  }else{
    $data['_cek'] = "Empty";
  }
	echo json_encode($data);
}

public function Logout_Admin(){
	if(!Empty($this->session->userdata('IdAdmin')) && !Empty($this->session->userdata('IdLevelAdmin')) && !Empty($this->session->userdata('UserAdmin'))){

		$del_dis2 =
    $this->session->unset_userdata($this->session->unset_userdata('IdAdmin'),$this->session->unset_userdata('IdLevelAdmin'),$this->session->unset_userdata('UserAdmin'));
		if($del_dis2 == false){
	    redirect(base_url().'Login');
	  }else {
	    echo " <script>alert('Gagal Log-Out..');history.go(-1);</script>";
	  }
	}else {
		echo " <script>alert('Gagal Log-Out..');history.go(-1);</script>";
	}

}

}
