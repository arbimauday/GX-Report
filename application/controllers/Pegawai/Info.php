<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller
{
  protected $v_index 	 = 'Pegawai/info_spk';

  function __construct(){
		parent::__construct();
		$this->load->model('M_login','M_laporan');
		$this->load->helper('url');
		$this->load->library('session','database');
	}

  public function home($no_report){
    $idUserPgw = $this->session->userdata('IdUser');
    $data['infoPekerjaan'] = $this->M_laporan->get_info_spk($no_report,$idUserPgw)->result();
		if(empty($data['infoPekerjaan'])){
			redirect(base_url('Pegawai/Home'));
		}

    $data['noReport'] = $no_report;
    $data['title'] = 'Info SPK';
    $data['content'] = $this->v_index;
    $this->load->view('Pegawai/template_pegawai',$data);
  }

}
?>
