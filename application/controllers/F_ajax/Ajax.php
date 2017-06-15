<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('M_ajax');
		$this->load->helper('url');
		$this->load->library('session','database');
	}

// modal laporan
function modallaporan($id_report){
  //$data = $this->M_ajax->filter_report($id_report);
	//$dataRemarks = $this->M_ajax->filterRemaks($id_report);
	$data = array($this->M_ajax->filter_report($id_report),$this->M_ajax->filterRemaks($id_report)
	);
  echo json_encode($data);
}

// modal lihat laporan
function lihatlaporan($id_report){
	$where = array('id_report' => $id_report);
	$data =array(
		$this->M_ajax->filter($where,'update_report'),$this->M_ajax->filter($where,'progress_report'),$this->M_ajax->filterRemaks($id_report)
	);
	echo json_encode($data);
}


//input laporan
function inputlaporan_pegawai(){

	$idReport = $this->input->post('idReport');
	$jenisLaporan = $this->input->post('jenisLaporan');
	$isiLaporan = $this->input->post('isiLaporan');
	$now = new DateTime('now', new DateTimeZone('Asia/Kuala_Lumpur'));
	$waktu = $now->format('H:i:s');

	/* data update */
	$idStatus = $this->input->post('id_status_report');
	$progresBar = $this->input->post('progress_bar');
	$upwhere = array('id_report' => $idReport);
	$updatedata = array(
		'id_status_report' => $idStatus,
		'progress_bar' => $progresBar
	);
	/*****/

	if($jenisLaporan == '1'){
		$sendDB = 'update_report';
		$dataInput = array(
			'id_report'  =>	$idReport,
			'tgl_update' => date('d/m/Y'),
			'time_update' => $waktu,
			'isi_update' => $isiLaporan
		);
	}elseif($jenisLaporan == '2'){
		$sendDB = 'progress_report';
		$dataInput = array(
			'id_report'  		=>	$idReport,
			'tgl_progress'  => date('d/m/Y'),
			'time_progress' => $waktu,
			'isi_progress'  => $isiLaporan
		);
	}

	$this->M_ajax->input($dataInput,$sendDB);
	$this->M_ajax->update($upwhere,$updatedata,'master_report');
	echo json_encode(array("status" => TRUE));
}

function sendRemarks(){
	$now = new DateTime('now', new DateTimeZone('Asia/Kuala_Lumpur'));
	$waktu = $now->format('H:i:s');

	$dataSend = array(
		'id_report' 			 => $this->input->post('id_report'),
		'id_user_pengirim' => $this->input->post('idPengirim'),
		'tgl_remarks' 		 => date('d/m/Y'),
		'time_remarks'		 => $waktu,
		'id_status_pengirim'  => $this->input->post('id_status_pengirim'),
		'isi_remarks'			 => $this->input->post('isi_remarks')
	);
	$this->M_ajax->input($dataSend,'remarks_report');
	echo json_encode(array("status" => TRUE));
}

function coba($cariID){
	$waktu = array("Setiap Hari" , date('d', strtotime('+1 days')), date('D', strtotime('+1 days')));
	$where = array(
		'id_user_pegawai' => $cariID
	);
	$hasil = $this->M_ajax->coba($where,'master_report');
	if($hasil > 0){
		$result = $hasil;
	}
	echo json_encode($result);
}

// update dan cek laporan untuk hari ini ketika pegawai berhasil login
function update_notification(){
	$cekIdPgw = array(
		'id_user_pegawai' => $this->session->userdata('IdUser'),
		'cek_on'					=> "1"
	);
	$getCEK = $this->M_ajax->where($cekIdPgw,'master_report');
		$update = array(
			'cek_on' 			 => "2",
			'click_on_off' => "1"
		);
	//$Cek	= $this->M_login->update($cekIdPgw,$update,'master_report');
}

// konfirmasi akun pegawai
function konfirmasi_akun($kode_pegawai){
	$now = new DateTime('now', new DateTimeZone('Asia/Kuala_Lumpur'));
	$timeNow = $now->format('H:i:s');
	$data_konfirmasi = array(
		'id_status_akun' => "2",
		'waktu_aktif'		 => date('d/m/Y')." ".$timeNow
	);
  // Pencarian Sesuai session Login
  $where = array(
    'kode_pegawai' => $kode_pegawai
  );

	$hasil = $this->M_ajax->where($where,'user_pegawai');
 	if(!empty($hasil)){
 		$this->M_ajax->update($where,$data_konfirmasi,'user_pegawai');
 		$data['hasil'] = 'Berhasil';
 	}else{
 		$data['hasil'] = 'Error';
 	}
 	echo json_encode($data);
}

//sound_bell remarks
function nonbellremark($id_remarks){
	$data_update = array('sound_bell' => "1",'notifikasi_cek' => "1");
	$where = array(
    'id_remarks' => $id_remarks
  );
  $this->M_ajax->update($where,$data_update,'remarks_report');
}

// notifikasi cek sound_bell
function ceksound($id_remarks){
	$data_update = array('notifikasi_cek' => "1");
	$where = array(
    'id_remarks' => $id_remarks
  );
  $this->M_ajax->update($where,$data_update,'remarks_report');
}

//notifikasi bar_remarks pegawai
function bar_remarks_notifikasi(){
	$data = array($this->M_ajax->notifikasi_remarks_bar($this->session->userdata('IdUser')),$this->M_ajax->jumlah_remarks_bar($this->session->userdata('IdUser')));
	echo json_encode($data);
}

// notifikasi bar remarks kabag
function kabag_bar_notif_remarks(){
	$idDivisi = $this->session->userdata('IdDivisiKabag');
	$idPort		= $this->session->userdata('IdPortKabag');
	$data = array($this->M_ajax->kabag_notifikasi_bar_remarks($idPort,$idDivisi),$this->M_ajax->kabag_jumlah_remarks($idPort,$idDivisi));
	echo json_encode($data);
}


}
?>
