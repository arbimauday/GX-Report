<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

	protected $v_index 	 = 'Kabag/tabel_pekerja_hari_ini';
  protected $v_pekerjaan_pegawai = 'Kabag/tabel_pekerjaan_pegawai';
	protected $v_cek_pekerjaan_hari_ini = 'Kabag/list_cek_pekerjaan_hari_ini';
	protected $v_anggota = 'Kabag/list_anggota';
	protected $v_remarks = 'Kabag/Remarks';
	protected $v_profilPegawai = 'Kabag/view_profil';
	protected $v_pengaturan_pekerjaan = 'Kabag/pengaturan_pekerjaan';
	protected $v_daftar_pekerjaan = 'Kabag/Daftar_pekerjaan';
	protected $v_gantikanNamaPekerja = 'Kabag/gantikan_pekerja';
	protected $v_pengaturanPegawai = 'Kabag/pengaturan_pegawai';
	protected $v_histo_laporan = 'Kabag/history_laporan';
	protected $v_detail_laporan = 'Kabag/detail_laporan';
	protected $v_list_pekerjaan_pegawai = 'Kabag/list_pekerjaan_pegawai';

	function __construct(){
		parent::__construct();
		$this->load->model('M_login','M_laporan');
		$this->load->helper('url');
		$this->load->library('session','database');
	}

	function index(){
		$where = array(
			'id_port' 	=> $this->session->userdata('IdPortKabag'),
			'id_divisi' => $this->session->userdata('IdDivisiKabag'),
			'id_status_akun' => "2",
			'id_level_akun' => "1"
		);

		$data['daftar_anggota'] = $this->M_laporan->filter($where,'user_pegawai')->result();

    $data['title'] = 'Home Kabaga : Perjaan Hari Ini';
    $data['content'] = $this->v_index;
    $this->load->view('Kabag/template_kabag',$data);
  }

	function Cek_Pekerjaan($id_user_pegawai,$call_name){
		$jenis_pekerjaan = array("1","2");
		$jenis_report = array("1","2","3");
		//data pegawai
		$getidportpgw = $this->session->userdata('IdPortKabag');
		$getiddivisipgw = $this->session->userdata('IdDivisiKabag');
		$data['date_now'] = date('d/m/Y');


		//$data['table_routine'] = $this->M_laporan->pekerjaan_hari_ini($wrproject,$wr2,$id_user_pegawai,$getidportpgw,$getiddivisipgw)->result();

		$data['table_routine'] = $this->M_laporan->TabelList_pekerjaanhariini($id_user_pegawai,$data['date_now'],$getidportpgw,$getiddivisipgw,$jenis_pekerjaan,$jenis_report)->result();

		//$data['table_project'] = $this->M_laporan->pekerjaan_hari_ini($wrproject,'4',$id_user_pegawai,$getidportpgw,$getiddivisipgw)->result();
		$data['table_project'] = $this->M_laporan->TabelList_pekerjaanhariini($id_user_pegawai,$data['date_now'],$getidportpgw,$getiddivisipgw,$jenis_pekerjaan,"4")->result();

		$data['id_user_pegawai'] = $id_user_pegawai;
		$data['nama_pekerja'] = $call_name;
		$data['title'] = 'Cek - Pekerjaan : '.$call_name.'='.$id_user_pegawai;
    $data['content'] = $this->v_cek_pekerjaan_hari_ini;
    $this->load->view('Kabag/template_kabag',$data);
	}

// history laporan pegawai
	function History_Laporan($id_user_pegawai,$call_name){
		$get_tgl = $this->input->post('tgl');
		if(!empty($get_tgl)){
			$date_all = $this->input->post('tgl');
		}else {
			$date_all = date('d/m/Y');
		}
		$getidportpgw = $this->session->userdata('IdPortKabag');
		$getiddivisipgw = $this->session->userdata('IdDivisiKabag');

		$data['_history'] = $this->M_laporan->list_history_laporan($id_user_pegawai,$date_all,$getidportpgw,$getiddivisipgw)->result();

		$data['id_user_pegawai'] = $id_user_pegawai;
		$data['call_name'] = $call_name;
		$data['tgl_history'] = $date_all;

		$data['title'] = 'History Laporan : '.$date_all;
    $data['content'] = $this->v_histo_laporan;
    $this->load->view('Kabag/template_kabag',$data);
	}

// list semua pekerjaan masing2 pegawai
	function List_pekerjaan_pegawai($idpgw,$call_name){
		$wr2 = array("1","2","3");
		$wrproject = array("1","2");
		$getidportpgw = $this->session->userdata('IdPortKabag');
		$getiddivisipgw = $this->session->userdata('IdDivisiKabag');

		$data['table_routine'] = $this->M_laporan->hasil_laporan($wrproject,$wr2,$idpgw,$getidportpgw,$getiddivisipgw)->result();

		$data['table_project'] = $this->M_laporan->hasil_laporan($wrproject,'4',$idpgw,$getidportpgw,$getiddivisipgw)->result();

		$data['call_name'] = $call_name;
		$data['title'] = 'List Pekerjaan :: '.$call_name;
    $data['content'] = $this->v_list_pekerjaan_pegawai;
    $this->load->view('Kabag/template_kabag',$data);
	}

// detail report harian pegawai
	function detail_laporan($idpgw,$idReport,$tglReport,$call_name,$urladd){
		//ket pekerjaan
		$data['tabelPekerjaan'] = $this->M_laporan->getReport_onebyone($idReport,$idpgw)->result();
		if(empty($data['tabelPekerjaan'])){
			redirect(base_url('Kabag/Home'));
		}
		//ket laporan
		$to = DateTime::createFromFormat ( "dmY", $tglReport );
		$date_con = $to->format('d/m/Y');

		$data['laporan_text'] = $this->M_laporan->detaillaporan($idReport,$date_con)->result();

		$where_img = array(
			'id_report' => $idReport,
			'tgl_upload_img' => $date_con
		);
		$data['img_laporan'] = $this->M_laporan->filter($where_img,"upload_report_image")->result();

		$data['idpgw'] = $idpgw;
		$data['call_name'] = $call_name;
		$data['idReport'] = $idReport;
		$data['urladd'] = $urladd;
		$data['_tgl'] = $tglReport;
		$data['title'] = 'Detail Laporan : '.$idReport;
    $data['content'] = $this->v_detail_laporan;
    $this->load->view('Kabag/template_kabag',$data);
	}

// Remarks pekerjaan
	function Remarks($id_report){
		$data['id_report'] = $id_report;
		$data['title'] = 'Cek Remarks :';
    $data['content'] = $this->v_remarks;
    $this->load->view('Kabag/template_kabag',$data);
	}

  function Check_pekerjaan($id_user_pegawai,$call_name){
		// filter data id jenis report untuk tabel routine
		// catatan : 1 atau 2 where data pertama untuk mencari jenis pekerjaan
		$idport = $this->session->userdata('IdPortKabag');
		$iddivisi = $this->session->userdata('IdDivisiKabag');
		$wr2 = array("1","2","3");
		$wrproject = array("1","2");

		$data['nameSelect'] = $call_name;
		$data['table_routine'] = $this->M_laporan->hasil_laporan($wrproject,$wr2,$id_user_pegawai,$idport,$iddivisi)->result();

		$data['table_project'] = $this->M_laporan->hasil_laporan($wrproject,'4',$id_user_pegawai,$idport,$iddivisi)->result();

    $data['title'] = 'Home-Kabag';
    $data['content'] = $this->v_pekerjaan_pegawai;
    $this->load->view('Kabag/template_kabag',$data);
  }

	function Anggota(){
		$where = array(
			'id_port' 	=> $this->session->userdata('IdPortKabag'),
			'id_divisi' => $this->session->userdata('IdDivisiKabag'),
			'id_status_akun' => "2",
			'id_level_akun' => "1"
		);

		$data['daftar_anggota'] = $this->M_laporan->filter($where,'user_pegawai')->result();

    $data['title'] = 'Anggota Pekerjaan :: '.$this->session->userdata('NamaPort').' / '.$this->session->userdata('NamaDivisi');
    $data['content'] = $this->v_anggota;
    $this->load->view('Kabag/template_kabag',$data);
	}

// lihat profil
function my_profil(){
	$idport = $this->session->userdata('IdPortKabag');
	$iddivisi = $this->session->userdata('IdDivisiKabag');
	$data['view_profil'] = $this->M_laporan->view_profil($this->session->userdata('KabagKP'),$iddivisi,$idport)->result();

	$data['title'] = 'Profile :: '.$this->session->userdata('NameCallKabag') ;
	$data['content'] = $this->v_profilPegawai;
	$data['plugins'] = '';
	$this->load->view('Kabag/template_kabag',$data);
}

function profil_pegawai($call_name, $kode_pegawai, $id_divisi, $id_port){
	$idport = $this->session->userdata('IdPortKabag');
	$iddivisi = $this->session->userdata('IdDivisiKabag');
	$data['view_profil'] = $this->M_laporan->view_profil($kode_pegawai,$iddivisi,$idport)->result();

	$data['title'] = 'Profile :: '.$call_name ;
	$data['content'] = $this->v_profilPegawai;
	$data['plugins'] = '';
	$this->load->view('Kabag/template_kabag',$data);
}

// pengaturan pekerja berfungsi sebagai menggantikan posisi si pekerja
function pengaturan_pekerjaan($nama_pekerja,$id_user_pegawai,$idPekerjaan){
	$data['pengaturan_pekerjaan'] = $this->M_laporan->pengaturan_pekerjaan($idPekerjaan)->result();
	$data['nama_pekerja'] = $nama_pekerja;
	$data['id_user_pegawai'] = $id_user_pegawai;

	$data['title'] = 'Pengaturan Pekerjaan';
	$data['content'] = $this->v_pengaturan_pekerjaan;
	$this->load->view('Kabag/template_kabag',$data);
}

// update data pengaturan pekerjaan
function updatepengaturanpekerjaan(){
	$idReport = $this->input->post('id_report');
	$id_status_report = $this->input->post('id_status_report');
	if($id_status_report == '3'){
		$progress_bar = '100';
	}else{
		$progress_bar = $this->input->post('progress_bar');
	}

	$where = array('id_report' => $idReport);
	$dataWhere = $this->M_laporan->filter($where,'master_report')->result();

	$dataupdate = array(
		'id_status_report' => $id_status_report,
		'progress_bar' => $progress_bar
	);
	echo '<script src="'.base_url().'assets-admin/sweet-alert/sweetalert-dev.js"></script>
	<link rel="stylesheet" href="'.base_url().'assets-admin/sweet-alert/sweetalert.css">';
	if($dataWhere){
		$this->M_laporan->update($where,$dataupdate,'master_report');
		echo '<script>setInterval(function(){
			swal({
			title: "",
			text: "Proses Update selesai!",
			type: "success",
			timer: 1000,
			showConfirmButton: false
		});})</script>';
		echo "<script>setInterval(function(){
			window.location.href = '".base_url()."Kabag/Home/daftar_pekerjaan';},1000)</script>";
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

// daftara pekerjaan di filter sesuai dengan divisi kabag dan port kabag
function daftar_pekerjaan(){
	$idPort = $this->session->userdata('IdPortKabag');
	$idDivisi = $this->session->userdata('IdDivisiKabag');
	//tabel
	$data['table_open'] = $this->M_laporan->daftar_pekerjaan($idPort,$idDivisi,'1')->result();
	$data['table_pending'] = $this->M_laporan->daftar_pekerjaan($idPort,$idDivisi,'2')->result();
	$data['table_closed'] = $this->M_laporan->daftar_pekerjaan($idPort,$idDivisi,'3')->result();

	// num_rows atau jumlah data
	$data['jumlah_open'] = $this->M_laporan->daftar_pekerjaan($idPort,$idDivisi,'1')->num_rows();
	$data['jumlah_pending'] = $this->M_laporan->daftar_pekerjaan($idPort,$idDivisi,'2')->num_rows();
	$data['jumlah_closed'] = $this->M_laporan->daftar_pekerjaan($idPort,$idDivisi,'3')->num_rows();

	$data['title'] = 'Daftar Pekerjaan';
	$data['content'] = $this->v_daftar_pekerjaan;
	$this->load->view('Kabag/template_kabag',$data);
}

// memberikan pekerjaan yang di tinggalkan oleh sang pekerja kepada orang lain
function gantikanNamaPekerja($id_report,$idpegawai,$judul_title){
	$idPort = $this->session->userdata('IdPortKabag');
	$idDivisi = $this->session->userdata('IdDivisiKabag');
	$whereData = array(
		'id_port' => $idPort,
		'id_divisi' => $idDivisi,
		'id_status_akun' => "2",
		'id_level_akun' => "1"
	);

	$data['listPekerja'] = $this->M_laporan->filter($whereData,'user_pegawai')->result();

	$data['id_report'] = $id_report;
	$data['title'] = 'Menggantikan Nama Pekerja';
	$data['content'] = $this->v_gantikanNamaPekerja;
	$this->load->view('Kabag/template_kabag',$data);
}

// update nama pegerja yang di ganti
function updateNamePekerja(){
	$idReprot = $this->input->post('idReport');
	$idPegawai = $this->input->post('idPegawai');
	$where = array('id_report' => $idReprot);
	$data = array('id_user_pegawai' => $idPegawai);
	$cek = $this->M_laporan->filter($where,'master_report')->num_rows();
	echo '<script src="'.base_url().'assets-admin/sweet-alert/sweetalert-dev.js"></script>
	<link rel="stylesheet" href="'.base_url().'assets-admin/sweet-alert/sweetalert.css">';
	if($cek){
		$update = $this->M_laporan->update($where,$data,'master_report');
		echo '<script>setInterval(function(){
			swal({
			title: "",
			text: "Proses upload selesai!",
			type: "success",
			timer: 1000,
			showConfirmButton: false
		});})</script>';
		echo "<script>setInterval(function(){
			window.location.href = '".base_url()."Kabag/Home/daftar_pekerjaan';},1000)</script>";
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

//pengaturan anggota pekerja untuk di pindahkan
function pengaturanPegawai($kode_pegawai,$addUrl){
	$idport = $this->session->userdata('IdPortKabag');
	$iddivisi = $this->session->userdata('IdDivisiKabag');
	$data['view_profil'] = $this->M_laporan->view_profil($kode_pegawai,$iddivisi,$idport)->result();
	if(empty($data['view_profil'])){
		redirect(base_url('Kabag/Home'));
	}
	$data['title'] = 'Pengaturan posisi pegawai';
	$data['content'] = $this->v_pengaturanPegawai;
	$this->load->view('Kabag/template_kabag',$data);
}

function updatepengaturanpegawai(){
	$kodePegawai = $this->input->post('kode_pegawai');
	$iddivisi = $this->input->post('id_divisi');
	$idport = $this->input->post('id_port');
	$id_divisi_before = $this->input->post('id_divisi_before');
	$id_port_before = $this->input->post('id_port_before');
	// filter data menggunakan kode_pegawai
	$cek_where = $this->M_laporan->filter_pegawai($kodePegawai)->result();

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
		$this->M_laporan->update($where,$update_pgw,'master_pegawai');
		$this->M_laporan->update($where,$update_user,'user_pegawai');
		// input data update_user_posisi
		$this->M_laporan->input($input,'update_user_posisi');
		echo '<script>setInterval(function(){
			swal({
			title: "",
			text: "Proses Update selesai!",
			type: "success",
			timer: 1000,
			showConfirmButton: false
		});})</script>';
		echo "<script>setInterval(function(){
			window.location.href = '".base_url()."Kabag/Home/Anggota';},1000)</script>";
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

}
?>
