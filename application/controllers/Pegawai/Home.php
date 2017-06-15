<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

	protected $v_index 	 = 'Pegawai/table_report';
  protected $v_form_laporan 	 = 'Pegawai/form_spk_laporan';
  protected $v_pekerjaan_hari_ini = 'Pegawai/list_pekerjaan_hari_ini';
  protected $v_form_laporan_harian = 'Pegawai/form_laporan_harian';
	protected $v_histo_laporan = 'Pegawai/history_laporan';
	protected $v_remarks = 'Pegawai/Remarks';
	protected $v_profilPegawai = 'Pegawai/view_profil';
	protected $v_detail_laporan = 'Pegawai/detail_laporan';
	protected $v_form_edit_laporan = 'Pegawai/form_edit_laporan';
	protected $v_edit_akun = 'Pegawai/Edit_akun';
	protected $v_pengaturan_pekerjaan = 'Pegawai/Pengaturan_pekerjaan';

	public function __construct(){
		parent::__construct();
		$this->load->model('M_login','M_laporan');
		$this->load->helper('url');
		$this->load->library('session','database');
	}

	/* input otomatis history laporan harian secara otomatis menggunakan cron job cpanel */
	function input_history_laporan(){
		$hasil = $this->M_laporan->filter_update_report()->result();
		foreach ($hasil as $u){
			$dataInput = array(
			 'id_report' => $u->id_report,
			 'id_user_pegawai' => $u->id_user_pegawai,
			 'tgl_history_report' => date('d/m/Y')
			);
			$cek_data = $this->M_laporan->filter($dataInput,'history_report_harian')->num_rows();
			if(empty($cek_data )){
				$input = $this->M_laporan->input($dataInput,'history_report_harian');
			}
		}
	}
	/* end */

	/* tampilan awal untuk tampilan pegawai */
  function List_Pekerjaan(){
		// filter data id jenis report untuk tabel routine
		// catatan : 1 atau 2 where data pertama untuk mencari jenis pekerjaan
		$wr2 = array("1","2","3");
		$wrproject = array("1","2");
		$idportpgw = $this->session->userdata('IdPort');
		$iddivisipgw = $this->session->userdata('IdDivisi');
		$iduserpgw = $this->session->userdata('IdUser');

		$data['table_routine'] = $this->M_laporan->hasil_laporan($wrproject,$wr2,$iduserpgw,$idportpgw,$iddivisipgw)->result();

		$data['table_project'] = $this->M_laporan->hasil_laporan($wrproject,'4',$iduserpgw,$idportpgw,$iddivisipgw)->result();

    $data['title'] = 'List Pekerjaan ::';
    $data['content'] = $this->v_index;
    $this->load->view('Pegawai/template_pegawai',$data);
  }

	/* List Pekerjaan untuk pegawai paga hari ini */
	function index(){
		$iduserpgw = $this->session->userdata('IdUser');
		$idportpgw = $this->session->userdata('IdPort');
		$iddivisipgw = $this->session->userdata('IdDivisi');
		$tgl = date('d/m/Y');
		$jenis_pekerjaan = array("1","2");
		$jenis_report = array("1","2","3");

		//$data['table_routine'] = $this->M_laporan->pekerjaan_hari_ini($wrproject,$wr2,$iduserpgw,$idportpgw,$iddivisipgw)->result();
		$data['table_routine'] = $this->M_laporan->TabelList_pekerjaanhariini($iduserpgw,$tgl,$idportpgw,$iddivisipgw,$jenis_pekerjaan,$jenis_report)->result();

		//$data['table_project'] = $this->M_laporan->pekerjaan_hari_ini($wrproject,'4',$iduserpgw,$idportpgw,$iddivisipgw)->result();
		$data['table_project'] = $this->M_laporan->TabelList_pekerjaanhariini($iduserpgw,$tgl,$idportpgw,$iddivisipgw,$jenis_pekerjaan,"4")->result();

		// cek laporan hari Ini
		$jdw = array("Setiap Hari" , date('d'), date('D'), date('d/m/Y'));
		$result_where = $this->M_laporan->getjadwal_report($jdw,$iduserpgw,$idportpgw,$iddivisipgw)->result();
		foreach ($result_where as $no){
			$cek[]= $no->id_report;
		}
		$tgl = date('d/m/Y');
		$data['jumlah_laporan'] = $this->M_laporan->ceklaporan($cek,$tgl)->num_rows();
		$data['jumlah_pekerjaan'] = $this->M_laporan->getjadwal_report($jdw,$iduserpgw,$idportpgw,$iddivisipgw)->num_rows();

    $data['title'] = 'Pekerjaan Hari Ini';
    $data['content'] = $this->v_pekerjaan_hari_ini;
    $this->load->view('Pegawai/template_pegawai',$data);
	}

	/* Buat SPK Pekerjaan Pegawai */
  function Buat_SPK_Pekerjaan(){
    $data['title'] = 'SPK Pekerjaan Pegawai';
    $data['content'] = $this->v_form_laporan;
    $this->load->view('Pegawai/template_pegawai',$data);
  }
	// input spk pekerjaan pegawai baru
	function input_spk_pekerjaan(){
		// divisi dan report
		$cekDivisi = $this->session->userdata('IdDivisi');
		$cekPort = $this->session->userdata('IdPort');

		/*********** Mengambil No_report***************/
		$table = 'master_report';
		$kolom = 'no_report';
		//$get_no = $this->M_laporan->no_report($table,$kolom);
		//$no_report = "R".date('dmy').$get_no;
		$no_report = "PCR".$cekPort."0".$cekDivisi.date('dmyis');

		$id_jenis_pekerjaan = $this->input->post('id_jenis_pekerjaan');
		$id_jenis_report = $this->input->post('id_jenis_report');
		$id_category = $this->input->post('id_category');
		$tgl_report	 = $this->input->post('tgl_report');
		$waktu_reminder	= $this->input->post('waktu_reminder');
		$id_reminder_by = $this->input->post('id_reminder_by');
		$pekerjaan = $this->input->post('pekerjaan');
		$judul_pekerjaan = ucwords($this->input->post('judul_pekerjaan'));

		if($id_reminder_by == "1"){
			$on_off = "0";
		}else {
			$on_off = "1";
		}

		$input1 = array(
			'no_report' 				 => $no_report,
			'id_user_pegawai' 	 => $this->session->userdata('IdUser'),
			'judul_pekerjaan'		 => $judul_pekerjaan,
			'tgl_report' 				 => $tgl_report,
			'no_report'  				 => $no_report,
			'id_divisi' 		 		 => $cekDivisi,
			'id_port'				 	 	 => $cekPort,
			'id_jenis_pekerjaan' => $id_jenis_pekerjaan,
			'id_jenis_report'		 => $id_jenis_report,
			'waktu_jenis_report' => $waktu_reminder,
			'id_category'				 => $id_category,
			'pekerjaan'					 => $pekerjaan,
			'id_status_report'	 => "1"
		);

		$input2 = array(
			'no_report' => $no_report,
			'id_reminder_by' => $id_reminder_by,
			'waktu_reminder' => $waktu_reminder,
			'on_off'				 =>	$on_off
		);

		if (!empty($judul_pekerjaan) && !empty($pekerjaan) && !empty($id_jenis_pekerjaan) && !empty($id_jenis_report) && !empty($tgl_report) && !empty($waktu_reminder)) {
			$this->M_laporan->input($input1,'master_report');
			$this->M_laporan->input($input2,'master_reminder');

			// input data baru kedalam history laporan

			$idPGW = $this->session->userdata('IdUser');
			$history = $this->M_laporan->filter_report_update_baru($idPGW,$no_report)->result();
			foreach ($history as $u){
				$dataInput = array(
				 'id_report' => $u->id_report,
				 'id_user_pegawai' => $u->id_user_pegawai,
				 'tgl_history_report' => date('d/m/Y')
				);
				$cek_data = $this->M_laporan->filter($dataInput,'history_report_harian')->num_rows();
			}
			if(empty($cek_data)){ $this->M_laporan->input($dataInput,'history_report_harian');
			}
			//end history laporan

			echo "<script language='javascript'>
		    window.alert('Sukses..')
		    window.location.href='".base_url()."Pegawai/Home';
		    </script>";
		}else {
			echo "<script language='javascript'>
		    window.alert('Tidak dapat proses..')
		    window.location.href='".base_url()."Pegawai/Home';
		    </script>";
		}

  }

	/* Proses Laporan Harian pekerjaan pegawai */
	function Laporan($idReport,$titlePekerjaan){
		$data['data_pekerjaaan'] = $this->M_laporan->getReport_onebyone($idReport,$this->session->userdata('IdUser'))->result();
		if(empty($data['data_pekerjaaan'])){
			redirect(base_url('Pegawai/Home'));
		}
		// rangkuman laporan
		$data['rangkuman_report'] = $this->M_laporan->rangkuman_report($idReport)->result();
		// foreach untuk mencari image
		foreach ($$data['rangkuman_report'] as $vl) {
			$where_img = array(
				'id_report' => $vl->id_report,
				'tgl_upload_img' => $vl->tgl_update
			);
		}
		$data['img_laporan'] = $this->M_laporan->filter($where_img,"upload_report_image")->result();

		$data['title'] = 'Laporan : '.$titlePekerjaan.'=?'.$idReport;
    $data['content'] = $this->v_form_laporan_harian;
    $this->load->view('Pegawai/template_pegawai',$data);
	}
	//input laporan harian
	function inputlaporan_pegawai(){
		$idReport = $this->input->post('idReport');
		$jenisLaporan = $this->input->post('jenisLaporan');
		$isiLaporan = $this->input->post('isiLaporan');
		$id_kirim_report = $this->input->post('id_kirim_report');
		$now = new DateTime('now', new DateTimeZone('Asia/Kuala_Lumpur'));
		$waktu = $now->format('H:i:s');

		if($id_kirim_report == '1'){
			$result_date = '00/00/0000';
		}else{
			$result_date = date('d/m/Y');
		}

		echo '<script src="'.base_url().'assets-admin/sweet-alert/sweetalert-dev.js"></script>
	  <link rel="stylesheet" href="'.base_url().'assets-admin/sweet-alert/sweetalert.css">';
		if($this->input->post('cek') == "Tidak" && empty($isiLaporan)){
			// notifikasi alert tidak ada laporan yang di kirim
			echo '<script>setInterval(function(){
				swal({
				title: "",
				text: "Tidak ada laporan yang di kirim",
				type: "error",
				timer: 1000,
				showConfirmButton: false
			});})</script>';
			echo "<script>setInterval(function(){
				window.location.href = '".base_url()."Pegawai/Home';},1000)</script>";
		}else{
			/* data update */
			$progresBar = $this->input->post('progress_bar');
			// otomatis update status pekerjaan CLOSED
			if($progresBar == '100'){
				$idStatus = '3';
			}else{
				$idStatus = $this->input->post('id_status_report');
			}
			$upwhere = array('id_report' => $idReport);
			$updatedata = array(
				'id_status_report' => $idStatus,
				'tgl_update_report' => $result_date,
				'progress_bar' => $progresBar
			);
			/*****/

			if($jenisLaporan == '1'){
				$sendDB = 'update_report';
				$dataInput = array(
					'id_report'  =>	$idReport,
					'tgl_update' => date('d/m/Y'),
					'time_update' => $waktu,
					'isi_update' => $isiLaporan,
					'id_update_status_report' => $idStatus,
					'update_progress'	=> $progresBar,
					'id_kirim_report' => $id_kirim_report,
					'id_pengirim_report' =>$this->session->userdata('IdUser')
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

			if($this->input->post('cek') == "Yes"){
				$number_of_files = sizeof($_FILES['img_file']['tmp_name']);
				if($number_of_files > 0){
					for ($i = 0;$i < $number_of_files; $i++){
						$img_file = uniqid().date('dmys')."img".$_FILES['img_file']['name'][$i];
						$uploadData[$i] = array(
						 'id_report' => $idReport,
						 'tgl_upload_img' => date("d/m/Y"),
						 'time_upload_img' => $waktu,
						 'img_upload' =>	$img_file
						);

						if(!empty($_FILES['img_file']['size'][$i])){
							move_uploaded_file($_FILES['img_file']['tmp_name'][$i],"uploads/laporan/".$img_file);
							$this->M_laporan->input($uploadData[$i],'upload_report_image');
						}
					}
				}
			}

			/* update data laporan dalam history */
			$whereData_history = array(
				'id_report' => $idReport,
				'tgl_history_report' => date('d/m/Y')
			);
			$updateData_history = array(
				'id_user_pegawai' => $this->session->userdata('IdUser'),
				'ket_report' => "1"
			);
			/* end */

			$this->M_laporan->input($dataInput,$sendDB);
			$this->M_laporan->update($upwhere,$updatedata,'master_report');
			$this->M_laporan->update($whereData_history,$updateData_history,'history_report_harian');

			echo '<script>setInterval(function(){
				swal({
				title: "",
				text: "Succes",
				type: "success",
				timer: 1000,
				showConfirmButton: false
			});})</script>';
			echo "<script>setInterval(function(){
				window.location.href = '".base_url()."Pegawai/Home';},1000)</script>";
		}

	}
	// edit laporan dengan status pengiriman tunda
	function edit_laporan($idReport,$titlePekerjaan){
		$data['data_pekerjaaan'] = $this->M_laporan->getReport_onebyone($idReport,$this->session->userdata('IdUser'))->result();
		if(empty($data['data_pekerjaaan'])){
			redirect(base_url('Pegawai/Home'));
		}
		$data['edit_report'] = $this->M_laporan->_edit_report($idReport)->result();
		if(!empty($data['edit_report'])){
			foreach ($data['edit_report'] as $u) {
				$date_con =  $u->tgl_update;
			}
			$where_img = array(
				'id_report' => $idReport,
				'tgl_upload_img' => $date_con
			);
			$data['img_laporan'] = $this->M_laporan->filter($where_img,"upload_report_image")->result();

			$data['title'] = 'Edit Laporan :'.$titlePekerjaan.'=?'.$idReport;
	    $data['content'] = $this->v_form_edit_laporan;
	    $this->load->view('Pegawai/template_pegawai',$data);
		}else {
			echo '<script src="'.base_url().'assets-admin/sweet-alert/sweetalert-dev.js"></script>
		  <link rel="stylesheet" href="'.base_url().'assets-admin/sweet-alert/sweetalert.css">';
			echo '<script>setInterval(function(){
				swal({
				title: "",
				text: "Laporan ini tidak bisa di edit",
				type: "warning",
				timer: 1200,
				showConfirmButton: false
			});})</script>';
			echo "<script>setInterval(function(){
				window.location.href = '".base_url()."Pegawai/Home';},1000)</script>";
		}
	}

	function Remarks($id_report){
		$data['id_report'] = $id_report;
		$data['title'] = 'Remarks :';
    $data['content'] = $this->v_remarks;
    $this->load->view('Pegawai/template_pegawai',$data);
	}

	function History_Laporan(){
		$get_tgl = $this->input->post('tgl');
		if(!empty($get_tgl)){
			$date_all = $this->input->post('tgl');
			$to = DateTime::createFromFormat ('d/m/Y', $date_all);
			$date_tgl = $to->format('d');
			$date_hari = $to->format('D');
		}else {
			$date_tgl = date('d');
			$date_hari = date('D');
			$date_all = date('d/m/Y');
		}
		// data Pegawai
		$iduserpgw = $this->session->userdata('IdUser');
		$idportpgw = $this->session->userdata('IdPort');
		$iddivisipgw = $this->session->userdata('IdDivisi');
		// cek laporan hari Ini
		$jdw = array("Setiap Hari" , $date_tgl, $date_hari, $date_all);
		//$result_where = $this->M_laporan->getjadwal_report($jdw,$iduserpgw,$idportpgw,$iddivisipgw)->result();
		$result_where = $this->M_laporan->list_history_laporan($iduserpgw,$date_all)->result();
		foreach ($result_where as $no){
			$cek[]= $no->id_report;
		}
		//$data['_history'] = $this->M_laporan->convertPDF($cek,$date_all)->result();

		$data['_history'] = $this->M_laporan->list_history_laporan($iduserpgw,$date_all,$idportpgw,$iddivisipgw)->result();
		$data['tgl_history'] = $date_all;

		// pembatas convertPDF
		$data['jumlah_laporan'] = $this->M_laporan->ceklaporan($cek,$date_all)->num_rows();
		$data['jumlah_pekerjaan'] = $this->M_laporan->list_history_laporan($iduserpgw,$date_all,$idportpgw,$iddivisipgw)->num_rows();

		$data['title'] = 'History Laporan : '.$date_all;
    $data['content'] = $this->v_histo_laporan;
    $this->load->view('Pegawai/template_pegawai',$data);
	}

	function detail_laporan($idReport,$tglReport,$urladd){
		//ket pekerjaan
		$where_pekerjaan = array('id_report' => $idReport);
		$data['tabelPekerjaan'] = $this->M_laporan->getReport_onebyone($idReport,$this->session->userdata('IdUser'))->result();
		if(empty($data['tabelPekerjaan'])){
			redirect(base_url('Pegawai/Home'));
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

		$data['urladd'] = $urladd;
		$data['_tgl'] = $tglReport;
		$data['title'] = 'Detail Laporan : '.$idReport;
    $data['content'] = $this->v_detail_laporan;
    $this->load->view('Pegawai/template_pegawai',$data);
	}

	// back history
	function back_history(){
		$this->session->set_flashdata('message', '<script>location.reload();</script>');
	}

	// lihat profil Pegawai
	function profil_pegawai(){
		$idportpgw = $this->session->userdata('IdPort');
		$iddivisipgw = $this->session->userdata('IdDivisi');
		$data['view_profil'] = $this->M_laporan->view_profil($this->session->userdata('KodePegawai'),$iddivisipgw,$idportpgw)->result();

		$data['title'] = 'Profile :: '.$this->session->userdata('NamaPegawai') ;
		$data['content'] = $this->v_profilPegawai;
		$data['plugins'] = '';
		$this->load->view('Pegawai/template_pegawai',$data);
	}

	function Akun(){
		$idportpgw = $this->session->userdata('IdPort');
		$iddivisipgw = $this->session->userdata('IdDivisi');
		$data['view_profil'] = $this->M_laporan->view_profil($this->session->userdata('KodePegawai'),$iddivisipgw,$idportpgw)->result();

		$data['title'] = 'Profile :: '.$this->session->userdata('NamaPegawai') ;
		$data['content'] = $this->v_edit_akun;
		$data['plugins'] = '';
		$this->load->view('Pegawai/template_pegawai',$data);
	}

	/** Update data akun pegawai **/
	function updateInfoPribadi(){
		// format huruf besar di awal kalimat 'strtolower'
		$id_pegawai = $this->input->post('id_pegawai');
		$nama_lengkap	= ucwords($this->input->post('nama_lengkap'));
		$tgl_lahir = $this->input->post('tgl_lahir');
		$id_agama = $this->input->post('id_agama');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$asal_kota = ucwords($this->input->post('asal_kota'));
		$alamat	= ucwords($this->input->post('alamat'));
		$lulusan	= $this->input->post('lulusan');
		$email	= $this->input->post('email');
		$no_hp	= $this->input->post('no_hp');
		$status_perkawinan	= $this->input->post('status_perkawinan');
		$nama_suami_istri	= ucwords($this->input->post('nama_suami_istri'));
		$jumlah_anak	= $this->input->post('jumlah_anak');

		$where = array(
			'id_pegawai' => $id_pegawai
		);

		$dataUp = array(
			'nama_lengkap' => $nama_lengkap,
			'tgl_lahir' => $tgl_lahir,
			'jenis_kelamin' => $jenis_kelamin,
			'id_agama' => $id_agama,
			'asal_kota' => $asal_kota,
			'alamat'	=> $alamat,
			'email' => $email,
			'no_hp' => $no_hp,
			'lulusan' => $lulusan,
			'status_perkawinan' => $status_perkawinan,
			'nama_suami_istri' => $nama_suami_istri,
			'jumlah_anak' => $jumlah_anak
		);

		echo '<script src="'.base_url().'assets-admin/sweet-alert/sweetalert-dev.js"></script>
	  <link rel="stylesheet" href="'.base_url().'assets-admin/sweet-alert/sweetalert.css">';
		$cek = $this->M_laporan->filter($where,'master_pegawai')->num_rows();
		if($cek){
			$this->M_laporan->update($where,$dataUp,'master_pegawai');
			echo '<script>setInterval(function(){
				swal({
				title: "",
				text: "Proses upload selesai!",
				type: "success",
				timer: 1000,
				showConfirmButton: false
			});})</script>';
			echo "<script>setInterval(function(){
				window.location.href = '".base_url()."Pegawai/Home/Akun';},1000)</script>";
		}else {
			echo '<script>setInterval(function(){
				swal({
				title: "",
				text: "Tidak dapat memproses!",
				type: "error",
				timer: 1000,
				showConfirmButton: false
			});})</script>';
			echo "<script>setInterval(function(){
				window.location.href = '".base_url()."Pegawai/Home/Akun';},1000)</script>";
		}
	}

	function updateKet_Ortu(){
		$id_pegawai = $this->input->post('id_pegawai');
		$nama_ayah = ucwords($this->input->post('nama_ayah'));
		$nama_ibu = ucwords($this->input->post('nama_ibu'));
		$kota_orang_tua = ucwords($this->input->post('kota_orang_tua'));
		$alamat_orang_tua = ucwords($this->input->post('alamat_orang_tua'));
		$no_hp_orang_tua = $this->input->post('no_hp_orang_tua');

		$where = array(
			'id_pegawai' => $id_pegawai
		);

		$dataUp = array(
			'nama_ayah' => $nama_ayah,
			'nama_ibu'	=> $nama_ibu,
			'alamat_orang_tua' => $alamat_orang_tua,
			'kota_orang_tua'	=> $kota_orang_tua,
			'no_hp_orang_tua'	=> $no_hp_orang_tua
		);

		echo '<script src="'.base_url().'assets-admin/sweet-alert/sweetalert-dev.js"></script>
	  <link rel="stylesheet" href="'.base_url().'assets-admin/sweet-alert/sweetalert.css">';
		$cek = $this->M_laporan->filter($where,'master_pegawai')->num_rows();
		if($cek){
			$this->M_laporan->update($where,$dataUp,'master_pegawai');
			echo '<script>setInterval(function(){
				swal({
				title: "",
				text: "Proses upload selesai!",
				type: "success",
				timer: 1000,
				showConfirmButton: false
			});})</script>';
			echo "<script>setInterval(function(){
				window.location.href = '".base_url()."Pegawai/Home/Akun';},1000)</script>";
		}else {
			echo '<script>setInterval(function(){
				swal({
				title: "",
				text: "Tidak dapat memproses!",
				type: "error",
				timer: 1000,
				showConfirmButton: false
			});})</script>';
			echo "<script>setInterval(function(){
				window.location.href = '".base_url()."Pegawai/Home/Akun';},1000)</script>";
		}
	}

	function updateOrg_dekat(){
		$id_pegawai = $this->input->post('id_pegawai');
		$nama_orang_dekat = ucwords($this->input->post('nama_orang_dekat'));
		$hubungan = $this->input->post('hubungan');
		$kota_orang_dekat = ucwords($this->input->post('kota_orang_dekat'));
		$alamat_orang_dekat = ucwords($this->input->post('alamat_orang_dekat'));
		$no_hp_orang_dekat = $this->input->post('no_hp_orang_dekat');

		$where = array(
			'id_pegawai' => $id_pegawai
		);

		$dataUp = array(
			'nama_orang_dekat' => $nama_orang_dekat,
			'hubungan'	=> $hubungan,
			'alamat_orang_dekat' => $alamat_orang_dekat,
			'kota_orang_dekat' => $kota_orang_dekat,
			'no_hp_orang_dekat'	=> $no_hp_orang_dekat
		);

		echo '<script src="'.base_url().'assets-admin/sweet-alert/sweetalert-dev.js"></script>
	  <link rel="stylesheet" href="'.base_url().'assets-admin/sweet-alert/sweetalert.css">';
		$cek = $this->M_laporan->filter($where,'master_pegawai')->num_rows();
		if($cek){
			$this->M_laporan->update($where,$dataUp,'master_pegawai');
			echo '<script>setInterval(function(){
				swal({
				title: "",
				text: "Proses upload selesai!",
				type: "success",
				timer: 1000,
				showConfirmButton: false
			});})</script>';
			echo "<script>setInterval(function(){
				window.location.href = '".base_url()."Pegawai/Home/Akun';},1000)</script>";
		}else {
			echo '<script>setInterval(function(){
				swal({
				title: "",
				text: "Tidak dapat memproses!",
				type: "error",
				timer: 1000,
				showConfirmButton: false
			});})</script>';
			echo "<script>setInterval(function(){
				window.location.href = '".base_url()."Pegawai/Home/Akun';},1000)</script>";
		}
	}

	function Update_akunbank(){
		$id_pegawai = $this->input->post('id_pegawai');
		$nama_bank = strtoupper($this->input->post('nama_bank'));
		$no_akun_bank = $this->input->post('no_akun_bank');
		$nama_pemilik = ucwords($this->input->post('nama_pemilik'));
		$cabang_bank = ucwords($this->input->post('cabang_bank'));
		$kota_bank = ucwords($this->input->post('kota_bank'));

		$where = array(
			'id_pegawai' => $id_pegawai
		);

		$dataUp = array(
			'nama_bank' 	 => $nama_bank,
			'no_akun_bank' => $no_akun_bank,
			'nama_pemilik' => $nama_pemilik,
			'cabang_bank'  => $cabang_bank,
			'kota_bank'		 => $kota_bank
		);

		echo '<script src="'.base_url().'assets-admin/sweet-alert/sweetalert-dev.js"></script>
	  <link rel="stylesheet" href="'.base_url().'assets-admin/sweet-alert/sweetalert.css">';
		$cek = $this->M_laporan->filter($where,'master_pegawai')->num_rows();
		if($cek){
			$this->M_laporan->update($where,$dataUp,'master_pegawai');
			echo '<script>setInterval(function(){
				swal({
				title: "",
				text: "Proses upload selesai!",
				type: "success",
				timer: 1000,
				showConfirmButton: false
			});})</script>';
			echo "<script>setInterval(function(){
				window.location.href = '".base_url()."Pegawai/Home/Akun';},1000)</script>";
		}else {
			echo '<script>setInterval(function(){
				swal({
				title: "",
				text: "Tidak dapat memproses!",
				type: "error",
				timer: 1000,
				showConfirmButton: false
			});})</script>';
			echo "<script>setInterval(function(){
				window.location.href = '".base_url()."Pegawai/Home/Akun';},1000)</script>";
		}
	}

	function pengaturan_pekerjaan($idPekerjaan){
		$data['pengaturan_pekerjaan'] = $this->M_laporan->pengaturan_pekerjaan($idPekerjaan)->result();
		$data['title'] = 'Pengaturan Pekerjaan';
    $data['content'] = $this->v_pengaturan_pekerjaan;
    $this->load->view('Pegawai/template_pegawai',$data);
	}

	function update_pengaturan_pekerjaan($noReport){
		$id_jenis_pekerjaan = $this->input->post('id_jenis_pekerjaan');
		$id_category = $this->input->post('id_category');
		$id_jenis_report = $this->input->post('id_jenis_report');
		$waktu_reminder = $this->input->post('waktu_reminder');
		$id_reminder_by = $this->input->post('id_reminder_by');

		$where_cek = array('no_report' => $noReport);
		$dataUp1 = array(
			'id_jenis_pekerjaan' => $id_jenis_pekerjaan,
			'id_jenis_report' => $id_jenis_report,
			'id_category' => $id_category,
			'waktu_jenis_report' => $waktu_reminder
		);
		if($id_reminder_by == '1'){
			$on_off = "0";
		}else {
			$on_off = "1";
		}
		$dataUp2 = array(
			'id_reminder_by' => $id_reminder_by,
			'waktu_reminder' => $waktu_reminder,
			'on_off' => $on_off
		);

		$cekReport = $this->M_laporan->filter($where_cek,'master_report')->result();
		$cekReminder = $this->M_laporan->filter($where_cek,'master_report')->result();

		echo '<script src="'.base_url().'assets-admin/sweet-alert/sweetalert-dev.js"></script>
	  <link rel="stylesheet" href="'.base_url().'assets-admin/sweet-alert/sweetalert.css">';

		if(!empty($cekReport) && !empty($cekReminder)){
			$this->M_laporan->update($where_cek,$dataUp1,'master_report');
			$this->M_laporan->update($where_cek,$dataUp2,'master_reminder');

			echo '<script>setInterval(function(){
				swal({
				title: "",
				text: "Proses selesai!",
				type: "success",
				timer: 1000,
				showConfirmButton: false
			});})</script>';
			echo "<script>setInterval(function(){
				window.location.href = '".base_url()."Pegawai/Home/List_Pekerjaan';},1000)</script>";
		}else {
			echo '<script>setInterval(function(){
				swal({
				title: "",
				text: "Tidak dapat memproses! data tersebut tidak ditemukan",
				type: "error",
				timer: 1000,
				showConfirmButton: false
			});})</script>';
			echo "<script>setInterval(function(){
				window.location.href = '".base_url()."Pegawai/Home/List_Pekerjaan';},1000)</script>";
		}

	}

}
?>
