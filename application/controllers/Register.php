<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{

	//protected $login = 'Karyawan-bali/Admin';
  //protected $view_karyawan = 'view_karyawan';

	function __construct(){
		parent::__construct();
		$this->load->model('M_pegawai');
		$this->load->helper('url');
		$this->load->library('session','database');
	}

 //------------------------------------------------------------------------------------------------//
function one(){
 $this->load->view('Data_Register/Home_awal');
}

// form regirtrasi
function index(){
// view port
$data['port_select'] = $this->input->post('port_select');
// membatasi
$port_select = $this->input->post('port_select');
// Port Bali
if($port_select == 'Bali'){
	$data['id_port'] = '1'; // Get Id Port perdaerah
}elseif($port_select == 'Balikpapan'){
  $data['id_port'] = '2'; // Get Id Port perdaerah
}elseif($port_select == 'Malang'){
  $data['id_port'] = '3'; // Get Id Port perdaerah
}elseif($port_select == 'Samarinda'){
  $data['id_port'] = '4'; // Get Id Port perdaerah
}else{
		redirect(base_url('Register/one'));
}

/******** KODE SHIF ********/
$where_admin       = array('id_divisi' => "1", 'id_port' => $data['id_port']);
$where_bongkar     = array('id_divisi' => "2", 'id_port' => $data['id_port']);
$where_cafe        = array('id_divisi' => "3", 'id_port' => $data['id_port']);
$where_cashier     = array('id_divisi' => "4", 'id_port' => $data['id_port']);
$where_cso         = array('id_divisi' => "5", 'id_port' => $data['id_port']);
$where_fo          = array('id_divisi' => "6", 'id_port' => $data['id_port']);
$where_maintenance = array('id_divisi' => "7", 'id_port' => $data['id_port']);
$where_marketing   = array('id_divisi' => "8", 'id_port' => $data['id_port']);
$where_na          = array('id_divisi' => "9", 'id_port' => $data['id_port']);
$where_rutang      = array('id_divisi' => "10", 'id_port' => $data['id_port']);
$where_wl          = array('id_divisi' => "11", 'id_port' => $data['id_port']);
/********* TUTUP *******/
/********* view jumlah divisi***********/
$data['admin'] = $this->M_pegawai->get_register($where_admin,'master_pegawai')->result();
$data['bongkar'] = $this->M_pegawai->get_register($where_bongkar,'master_pegawai')->result();
$data['cafe'] = $this->M_pegawai->get_register($where_cafe,'master_pegawai')->result();
$data['cashier'] = $this->M_pegawai->get_register($where_cashier,'master_pegawai')->result();
$data['cso'] = $this->M_pegawai->get_register($where_cso,'master_pegawai')->result();
$data['fo'] = $this->M_pegawai->get_register($where_fo,'master_pegawai')->result();
$data['maintenance'] = $this->M_pegawai->get_register($where_maintenance,'master_pegawai')->result();
$data['marketing'] = $this->M_pegawai->get_register($where_marketing,'master_pegawai')->result();
$data['na'] = $this->M_pegawai->get_register($where_na,'master_pegawai')->result();
$data['rutang'] = $this->M_pegawai->get_register($where_rutang,'master_pegawai')->result();
$data['wl'] = $this->M_pegawai->get_register($where_wl,'master_pegawai')->result();
/******** TUTUP *********/
if(!empty($port_select)){
	$data['title'] = 'Register :: Pegawai';
	$data['plugins'] = '';
	$this->load->view('Data_Register/register',$data);
}else{ redirect(base_url('Register/one')); }
}

// proses mendaftar
function daftar(){
$nama_lengkap   	       =	ucwords($this->input->post('nama_lengkap'));
$tgl_lahir               =	$this->input->post('tgl_lahir');
$jenis_kelamin           =	$this->input->post('jenis_kelamin');
$id_agama                =	$this->input->post('id_agama');
$asal_kota               =	ucwords($this->input->post('asal_kota'));
$alamat                  =	ucwords($this->input->post('alamat'));
$email                   =	$this->input->post('email');
$no_hp                   =	$this->input->post('no_hp');
$lulusan                 =	$this->input->post('lulusan');
$status_perkawinan       =	$this->input->post('status_perkawinan');
$nama_suami_istri        =	ucwords($this->input->post('nama_suami_istri'));
$jumlah_anak             =	$this->input->post('jumlah_anak');
$nama_ayah               =	ucwords($this->input->post('nama_ayah'));
$nama_ibu                =	ucwords($this->input->post('nama_ibu'));
$alamat_orang_tua        =	ucwords($this->input->post('alamat_orang_tua'));
$kota_orang_tua          =	ucwords($this->input->post('kota_orang_tua'));
$no_hp_orang_tua         =	$this->input->post('no_hp_orang_tua');
$nama_orang_dekat        =	ucwords($this->input->post('nama_orang_dekat'));
$hubungan    						 =	$this->input->post('hubungan');
$alamat_orang_dekat      =	ucwords($this->input->post('alamat_orang_dekat'));
$kota_orang_dekat        =	ucwords($this->input->post('kota_orang_dekat'));
$no_hp_orang_dekat       =	$this->input->post('no_hp_orang_dekat');
$nama_perusahaan_lama    =	ucwords($this->input->post('nama_perusahaan_lama'));
$jabatan_lama            =	ucwords($this->input->post('jabatan_lama'));
$alamat_perusahaan_lama	 =	ucwords($this->input->post('alamat_perusahaan_lama'));
$contact_person			     =	ucwords($this->input->post('contact_person'));
$no_telpon_perusahaan_lama             =	$this->input->post('no_telpon_perusahaan_lama');
$nama_bank               =	strtoupper($this->input->post('nama_bank'));
$no_akun_bank            =	$this->input->post('no_akun_bank');
$nama_pemilik            =	ucwords($this->input->post('nama_pemilik'));
$cabang_bank             =	ucwords($this->input->post('cabang_bank'));
$kota_bank               =	ucwords($this->input->post('kota_bank'));
$id_divisi               =	$this->input->post('id_divisi');
$id_status_pegawai       =  $this->input->post('id_status_pegawai');
$tgl_thn_masuk           =	$this->input->post('tgl_thn_masuk');
$kode_shif               =	$this->input->post('kode_shif');
$no_ktp                  =	$this->input->post('no_ktp');
$id_port             		 =  $this->input->post('id_port');
$ptkp                    =	$this->input->post('ptkp');
$tgl_thn_pengangkatan    =	$this->input->post('tgl_thn_pengangkatan');
$jumlah_hutang           =	$this->input->post('jumlah_hutang');
$jatuh_tempo_hutang      =	$this->input->post('jatuh_tempo_hutang');
$tgl_batas               =	$this->input->post('tgl_batas');
$tgl_berhenti            =	$this->input->post('tgl_berhenti');
$call_name               =  ucwords($this->input->post('call_name'));
$user			               =	$this->input->post('user');
$pass               		 =	$this->input->post('pass');

$kodeunik = $this->M_pegawai->getkodeunik($id_port,"master_pegawai");
/* Menambah angka terakir pada nomor unik tersebut */
	$file = 'no_kodePegawai.txt';
	$current = file_get_contents($file);
	$current = $current + 1;
	file_put_contents($file, $current);
/* Tutup */
if($id_port == '1'){ // Bali
  $kode_pegawai = "PGB01".date("ymds").$current.$kodeunik;
  $nip = "BL".date("ymds").$current.$kodeunik;
}elseif($id_port == '2'){ // Balikpapan
  $kode_pegawai = "PGB02".date("ymds").$kodeunik;
  $nip = "BP".date("ymds").$current.$kodeunik;
}elseif ($id_port == '3') { // Malang
  $kode_pegawai = "PGM03".date("ymds").$current.$kodeunik;
  $nip = "ML".date("ymds").$current.$kodeunik;
}elseif ($id_port == '4') { // Samarinda
  $kode_pegawai = "PGS04".date("ymds").$current.$kodeunik;
  $nip = "SM".date("ymds").$current.$kodeunik;
}
/*************** Tutup *************/
$where_nama = array('nama_lengkap' => $nama_lengkap);
$data['cek1'] = $this->M_pegawai->edit_pegawai($where_nama,'master_pegawai')->result();
// Check username
$where_user = array('user' => $user);
$data['cek2'] = $this->M_pegawai->edit_pegawai($where_user,'user_pegawai')->result();
// Check kode pagawai
$where_kode_pg = array('kode_pegawai' => $kode_pegawai);
$data['cek3'] = $this->M_pegawai->edit_pegawai($where_kode_pg,'master_pegawai')->result();

/********* Tutup *********/
if(!empty($data['cek1'])){
  echo '<script>setTimeout(function(){ alert("Nama sudah terdaftar!"); }, 10);
  setInterval(function(){history.go(-2);},100)</script>';
}else if(!empty($data['cek2'])){
  echo '<script>setTimeout(function() { alert("UserName sudah terdaftar!"); }, time);
  setInterval(function(){history.go(-2);},100)</script>';
}else if(!empty($data['cek3'])){
  echo '<script>setTimeout(function() { alert("Kode Pegawai sudah terdaftar, coba lagi!"); }, time);
  setInterval(function(){history.go(-2);},100)</script>';
}else{
  //image ktp
  $ktp = $nama_lengkap."-".$id_divisi."-".$_FILES['foto_ktp']['name'];
  move_uploaded_file($_FILES['foto_ktp']['tmp_name'],"uploads/ktp/".$nama_lengkap."-".$id_divisi."-".$_FILES['foto_ktp']['name']);

  //image pegawai
  $profil = $kode_pegawai."-".$nama_lengkap."-".$_FILES['foto_pegawai']['name'];
  move_uploaded_file($_FILES['foto_pegawai']['tmp_name'],"uploads/pegawai/".$kode_pegawai."-".$nama_lengkap."-".$_FILES['foto_pegawai']['name']);

$data_pegawai = array(
  'nama_lengkap' 						=>$nama_lengkap,
  'tgl_lahir' 							=>$tgl_lahir,
  'jenis_kelamin' 					=>$jenis_kelamin,
  'id_agama'								=>$id_agama,
  'asal_kota' 							=>$asal_kota,
  'alamat' 									=>$alamat,
  'email' 									=>$email,
  'no_hp'										=>$no_hp,
  'lulusan' 								=>$lulusan,
  'status_perkawinan' 			=>$status_perkawinan,
  'nama_suami_istri' 				=>$nama_suami_istri,
  'jumlah_anak'							=>$jumlah_anak,
  'foto_ktp'								=>$ktp,
  'foto_pegawai'						=>$profil,
  'nama_ayah' 							=>$nama_ayah,
  'nama_ibu'								=>$nama_ibu,
  'alamat_orang_tua' 				=>$alamat_orang_tua,
  'kota_orang_tua'					=>$kota_orang_tua,
  'no_hp_orang_tua' 				=>$no_hp_orang_tua,
  'nama_orang_dekat' 				=>$nama_orang_dekat,
  'hubungan'						 		=>$hubungan,
  'alamat_orang_dekat' 			=>$alamat_orang_dekat,
  'kota_orang_dekat' 				=>$kota_orang_dekat,
  'no_hp_orang_dekat' 			=>$no_hp_orang_dekat,
  'nama_perusahaan_lama' 		=>$nama_perusahaan_lama,
  'jabatan_lama' 						=>$jabatan_lama,
  'alamat_perusahaan_lama'  =>$alamat_perusahaan_lama,
  'contact_person' 					=>$contact_person,
  'no_telpon_perusahaan_lama'	=>$no_telpon_perusahaan_lama,
  'nama_bank' 							=>$nama_bank,
  'no_akun_bank'						=>$no_akun_bank,
  'nama_pemilik' 						=>$nama_pemilik,
  'cabang_bank' 						=>$cabang_bank,
  'kota_bank' 							=>$kota_bank,
  'kode_pegawai' 						=>$kode_pegawai,
  'nip' 										=>$nip,
  'id_divisi'								=>$id_divisi,
  'id_status_pegawai' 			=>$id_status_pegawai,
  'tgl_thn_masuk' 					=>$tgl_thn_masuk,
  'kode_shif' 							=>$kode_shif,
  'no_ktp' 									=>$no_ktp,
  'id_port'									=>$id_port,
  'ptkp' 										=>$ptkp,
  'tgl_thn_pengangkatan' 		=>$tgl_thn_pengangkatan,
  'jumlah_hutang' 					=>$jumlah_hutang,
  'jatuh_tempo_hutang' 			=>$jatuh_tempo_hutang,
  'tgl_batas' 							=>$tgl_batas,
  'tgl_berhenti' 						=>$tgl_berhenti
);
// mendapatkan waktu otomatis
$now = new DateTime('now', new DateTimeZone('Asia/Kuala_Lumpur'));
$waktu_daftar = $now->format('H:i:s');
// get status akun
if($id_status_pegawai == "4"){
  $id_level_akun = "2";
}else {
  $id_level_akun = "1";
}
$data_akun = array(
  'kode_pegawai' 	 =>$kode_pegawai,
  'call_name' 	   =>ucfirst($call_name),
  'user'				 	 =>$user,
  'pass'				   =>md5($pass),
  'id_port'			 	 =>$id_port,
  'id_divisi'			 =>$id_divisi,
  'id_status_akun' => "1",
  'id_level_akun'	 =>$id_level_akun,
  'waktu_daftar' 	 =>date('d/m/Y')." ".$waktu_daftar
);

$this->M_pegawai->input_pegawai($data_pegawai,'master_pegawai');
$this->M_pegawai->input_pegawai($data_akun,'user_pegawai');
redirect(base_url().'Register/Result/'.$id_port.'/'.$kode_pegawai.'/'.$id_divisi);
}
}

// tampilkan hasil daftar
function Result($port,$kode_pegawai,$divisi){
	$where_data = array('kode_pegawai' => $kode_pegawai);
	$data['view_karyawan'] = $this->M_pegawai->view_register($where_data,'master_pegawai')->result();
	$data['title'] = 'View-Karyawan';
	$data['plugins'] = '';
	$this->load->view('Data_Register/view_hasil_daftar',$data);
}

} ?>
