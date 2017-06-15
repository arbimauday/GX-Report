<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

	protected $v_index 	 = 'Admin/list_pekerja';
  protected $v_konfirmasi_akun 	 = 'Admin/list_konfirmasi_akun';
	protected $v_profilPegawai = 'Admin/view_profil';
	protected $v_pengaturanPegawai = 'Admin/pengaturan_pegawai';
	protected $v_daftar_pekerjaan = 'Admin/daftar_pekerjaan';
	protected $v_status_pekerjaan = 'Admin/daftar_status_pekerjaan';

	function __construct(){
		parent::__construct();
		$this->load->model(array('M_login','M_laporan','M_admin'));
		$this->load->helper('url');
		$this->load->library('session','database');
	}

function index(){
  // bali
	$data['pgw_bali'] = $this->M_admin->all_pekerja("1","2")->result();
  // balikpapan
	$data['pgw_blp'] = $this->M_admin->all_pekerja("2","2")->result();
  // malang
	$data['pgw_mlg'] = $this->M_admin->all_pekerja("3","2")->result();
  // samarinda
	$data['pgw_smr'] = $this->M_admin->all_pekerja("4","2")->result();

  $data['title'] = 'Home Admin : list pegawai';
  $data['content'] = $this->v_index;
  $this->load->view('Admin/template_admin',$data);
}
// list konfirmasi akun pegawai
function konfirmasi_akun(){
  // bali
  $data['pgw_bali'] = $this->M_admin->all_pekerja("1","1")->result();
  // balikpapan
  $data['pgw_blp'] = $this->M_admin->all_pekerja("2","1")->result();
  // malang
  $data['pgw_mlg'] = $this->M_admin->all_pekerja("3","1")->result();
  // samarinda
  $data['pgw_smr'] = $this->M_admin->all_pekerja("4","1")->result();

  $data['title'] = 'konfirmasi Akun::';
  $data['content'] = $this->v_konfirmasi_akun;
  $this->load->view('Admin/template_admin',$data);
}

function profil_pegawai($nama_lengkap, $kode_pegawai, $id_divisi, $id_port){
	$data['view_profil'] = $this->M_admin->view_register($kode_pegawai,'master_pegawai')->result();

	$data['title'] = 'Profile :: '.$nama_lengkap ;
	$data['content'] = $this->v_profilPegawai;
	$data['plugins'] = '';
	$this->load->view('Admin/template_admin',$data);
}

// pengaturan pegawa
function pengaturanPegawai($kode_pegawai,$addUrl){
	$data['view_profil'] = $this->M_admin->view_profil($kode_pegawai)->result();
	$data['title'] = 'Pengaturan posisi pegawai';
	$data['content'] = $this->v_pengaturanPegawai;
	$this->load->view('Admin/template_admin',$data);
}
// update posisi pegawai
function updatepengaturanpegawai(){
	$kodePegawai = $this->input->post('kode_pegawai');
	$iddivisi = $this->input->post('id_divisi');
	$idport = $this->input->post('id_port');
	$id_divisi_before = $this->input->post('id_divisi_before');
	$id_port_before = $this->input->post('id_port_before');
	// filter data menggunakan kode_pegawai
	$cek_where = $this->M_admin->filter_pegawai($kodePegawai)->result();

	$where = array('kode_pegawai' => $kodePegawai);

	$update_pgw = array(
		'id_divisi' => $iddivisi,
		'id_port'	=> $idport
	);
	$update_user = array(
		'id_port'	=> $idport,
		'id_divisi' => $iddivisi
	);

	$now = new DateTime('now', new DateTimeZone('Asia/Kuala_Lumpur'));
	$input = array(
		'kode_pegawai' => $kodePegawai,
		'id_divisi_before' =>$id_divisi_before,
		'id_divisi_after' =>$iddivisi,
		'id_port_before' =>$id_port_before,
		'id_port_after' =>$idport,
		'tgl_update_posisi' => date('d/m/Y')." ".$now->format('H:i:s')
	);

	echo '<script src="'.base_url().'assets-admin/sweet-alert/sweetalert-dev.js"></script>
	<link rel="stylesheet" href="'.base_url().'assets-admin/sweet-alert/sweetalert.css">';
	if($cek_where){
		$this->M_admin->update($where,$update_pgw,'master_pegawai');
		$this->M_admin->update($where,$update_user,'user_pegawai');
		// input data update_user_posisi
		$this->M_admin->input($input,'update_user_posisi');
		echo '<script>setInterval(function(){
			swal({
			title: "",
			text: "Proses Update selesai!",
			type: "success",
			timer: 1000,
			showConfirmButton: false
		});})</script>';
		echo "<script>setInterval(function(){
			window.location.href = '".base_url()."Admin/Home';},1000)</script>";
	}else{
		echo '<script>setInterval(function(){
			swal({
			title: "",
			text: "Tidak dapat memproses!",
			type: "error",
			timer: 1000,
			showConfirmButton: false
		});})</script>';
		echo "<script>setInterval(function(){window.history.back();},1000)</script>";
	}
}

// dataftar pekerjaan sesuai dengan divisi
function DaftarPekerjaan(){
	// divisi
	$data['divisi'] = $this->M_admin->view_asc('master_divisi')->result();
	//status pekerjaan
	foreach ($data['divisi'] as $vl) {
		$nodivisi = $vl->id_divisi;
		//bali
		$where_a1 = array(
			'id_port' => "1",
			'id_divisi' => $nodivisi,
			'id_status_report' => "1"
		);
		$data['bali_open'.$nodivisi] = $this->M_admin->edit($where_a1,'master_report')->num_rows();

		$where_a2 = array(
			'id_port' => "1",
			'id_divisi' => $nodivisi,
			'id_status_report' => "2"
		);
		$data['bali_pendding'.$nodivisi] = $this->M_admin->edit($where_a2,'master_report')->num_rows();

		$where_a3 = array(
			'id_port' => "1",
			'id_divisi' => $nodivisi,
			'id_status_report' => "3"
		);
		$data['bali_closed'.$nodivisi] = $this->M_admin->edit($where_a3,'master_report')->num_rows();

		$where_a4 = array(
			'id_port' => "1",
			'id_divisi' => $nodivisi,
			'id_status_akun' => "2",
			'id_level_akun' => "1"
		);
		$data['bali_anggota'.$nodivisi] = $this->M_admin->edit($where_a4,'user_pegawai')->num_rows();

		// balikpapan
		$where_b1 = array(
			'id_port' => "2",
			'id_divisi' => $nodivisi,
			'id_status_report' => "1"
		);
		$data['blp_open'.$nodivisi] = $this->M_admin->edit($where_b1,'master_report')->num_rows();

		$where_b2 = array(
			'id_port' => "2",
			'id_divisi' => $nodivisi,
			'id_status_report' => "2"
		);
		$data['blp_pendding'.$nodivisi] = $this->M_admin->edit($where_b2,'master_report')->num_rows();

		$where_b3 = array(
			'id_port' => "2",
			'id_divisi' => $nodivisi,
			'id_status_report' => "3"
		);
		$data['blp_closed'.$nodivisi] = $this->M_admin->edit($where_b3,'master_report')->num_rows();

		$where_b4 = array(
			'id_port' => "2",
			'id_divisi' => $nodivisi,
			'id_status_akun' => "2",
			'id_level_akun' => "1"
		);
		$data['blp_anggota'.$nodivisi] = $this->M_admin->edit($where_b4,'user_pegawai')->num_rows();

		// malang
		$where_c1 = array(
			'id_port' => "4",
			'id_divisi' => $nodivisi,
			'id_status_report' => "1"
		);
		$data['mlg_open'.$nodivisi] = $this->M_admin->edit($where_c1,'master_report')->num_rows();

		$where_c2 = array(
			'id_port' => "3",
			'id_divisi' => $nodivisi,
			'id_status_report' => "2"
		);
		$data['mlg_pendding'.$nodivisi] = $this->M_admin->edit($where_c2,'master_report')->num_rows();

		$where_c3 = array(
			'id_port' => "3",
			'id_divisi' => $nodivisi,
			'id_status_report' => "3"
		);
		$data['mlg_closed'.$nodivisi] = $this->M_admin->edit($where_c3,'master_report')->num_rows();

		$where_c4 = array(
			'id_port' => "3",
			'id_divisi' => $nodivisi,
			'id_status_akun' => "2",
			'id_level_akun' => "1"
		);
		$data['mlg_anggota'.$nodivisi] = $this->M_admin->edit($where_c4,'user_pegawai')->num_rows();

		// samarinda
		$where_d1 = array(
			'id_port' => "4",
			'id_divisi' => $nodivisi,
			'id_status_report' => "1"
		);
		$data['smr_open'.$nodivisi] = $this->M_admin->edit($where_d1,'master_report')->num_rows();

		$where_d2 = array(
			'id_port' => "4",
			'id_divisi' => $nodivisi,
			'id_status_report' => "2"
		);
		$data['smr_pendding'.$nodivisi] = $this->M_admin->edit($where_d2,'master_report')->num_rows();

		$where_d3 = array(
			'id_port' => "4",
			'id_divisi' => $nodivisi,
			'id_status_report' => "3"
		);
		$data['smr_closed'.$nodivisi] = $this->M_admin->edit($where_d3,'master_report')->num_rows();

		$where_d4 = array(
			'id_port' => "4",
			'id_divisi' => $nodivisi,
			'id_status_akun' => "2",
			'id_level_akun' => "1"
		);
		$data['smr_anggota'.$nodivisi] = $this->M_admin->edit($where_d4,'user_pegawai')->num_rows();


	}

	$data['title'] = 'Daftar pekrjaan ::';
	$data['content'] = $this->v_daftar_pekerjaan;
	$this->load->view('Admin/template_admin',$data);
}

// detail perkerjaan berdasarakan status
function statuspekerjaan($idPort,$idDivisi){
	//tabel
	$data['table_open'] = $this->M_laporan->daftar_pekerjaan($idPort,$idDivisi,'1')->result();
	$data['table_pending'] = $this->M_laporan->daftar_pekerjaan($idPort,$idDivisi,'2')->result();
	$data['table_closed'] = $this->M_laporan->daftar_pekerjaan($idPort,$idDivisi,'3')->result();

	// num_rows atau jumlah data
	$data['jumlah_open'] = $this->M_laporan->daftar_pekerjaan($idPort,$idDivisi,'1')->num_rows();
	$data['jumlah_pending'] = $this->M_laporan->daftar_pekerjaan($idPort,$idDivisi,'2')->num_rows();
	$data['jumlah_closed'] = $this->M_laporan->daftar_pekerjaan($idPort,$idDivisi,'3')->num_rows();
	//title select
	$whereport = array('id_port' => $idPort);
	$wheredivisi = array('id_divisi' => $idDivisi);
	$port = $this->M_admin->edit($whereport,'master_port')->result();
	foreach ($port as $u) {
		$data['port'] = $u->nama_port;
	}
	$divisi = $this->M_admin->edit($wheredivisi,'master_divisi')->result();
	foreach ($divisi as $u) {
		$data['divisi'] = $u->divisi;
	}

	$data['title'] = 'Daftar Status Pekerjaan';
	$data['content'] = $this->v_status_pekerjaan;
	$this->load->view('Admin/template_admin',$data);
}

}
?>
