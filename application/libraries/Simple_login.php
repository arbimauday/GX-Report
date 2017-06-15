<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

class Simple_login {

	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}
	// Fungsi login
	public function login($username, $password, $port) {
		$query = $this->CI->db->get_where('users',array('username'=>$username,'password' => $password,'port'=>$port));
		if($query->num_rows() == 1) {
			$row 	= $this->CI->db->query('SELECT * FROM users where username = "'.$username.'"');
			//$admin 	= $row->row();
			//$id 	= $admin->id_user;
			$us 	    = $row->row();
			$name 	  = $us->nama;
      $username = $us->username;
      $divisi   = $us->divisi;
			$email 	  = $us->email;
			$port	  = $us->port;

      if($port){
        $this->CI->session->set_userdata('username', $username);
  			$this->CI->session->set_userdata('name', $name);
  			$this->CI->session->set_userdata('email', $email);
  			$this->CI->session->set_userdata('port', $port);
  			$this->CI->session->set_flashdata("sukses", '<script>alert("Login Sebagai Admin Berhasil");</script>');
  			//redirect(base_url('c_proses/index'));
				if($divisi == "ADMIN"){
          $this->CI->session->set_flashdata("Admin", '<script>alert("Login Success");</script>');
    			redirect(base_url('Karyawan-bali/Admin'));
        }else if($divisi == "BONGKAR"){
          $this->CI->session->set_flashdata("Bongkar", '<script>alert("Login Success");</script>');
    			redirect(base_url('Karyawan-bali/Bongakar'));
        }else if($divisi == "CAFE"){
          $this->CI->session->set_flashdata("Cafe", '<script>alert("Login Success");</script>');
    			redirect(base_url('Karyawan-bali/Cafe'));
        }else if($divisi == "CASHIER"){
          $this->CI->session->set_flashdata("Cashier", '<script>alert("Login Success");</script>');
    			redirect(base_url('Karyawan-bali/Cashier'));
        }else if($divisi == "CSO"){
          $this->CI->session->set_flashdata("Cso", '<script>alert("Login Success");</script>');
    			redirect(base_url('Karyawan-bali/Cso'));
        }else if($divisi == "FIBER OPTIC"){
          $this->CI->session->set_flashdata("Fiber Optic", '<script>alert("Login Success");</script>');
    			redirect(base_url('Karyawan-bali/Fo'));
        }else if($divisi == "MAINTENANCE"){
          $this->CI->session->set_flashdata("Maintenance", '<script>alert("Login Success");</script>');
    			redirect(base_url('Karyawan-bali/Maintenance'));
        }else if($divisi == "MARKETING"){
          $this->CI->session->set_flashdata("Marketing", '<script>alert("Login Success");</script>');
    			redirect(base_url('Karyawan-bali/Marketing'));
        }else if($divisi == "NA"){
          $this->CI->session->set_flashdata("Na", '<script>alert("Login Success");</script>');
    			redirect(base_url('Karyawan-bali/Na'));
        }else if($divisi == "RUTANG"){
          $this->CI->session->set_flashdata("Rutang", '<script>alert("Login Success");</script>');
    			redirect(base_url('Karyawan-bali/Rutang'));
        }else if($divisi == "WIRELESS"){
          $this->CI->session->set_flashdata("Wireless", '<script>alert("Login Success");</script>');
    			redirect(base_url('Karyawan-bali/Wl'));
        }else{
          $this->CI->session->set_flashdata('Upss..','Divisi Anda Tidak Termaksud');
    			redirect(base_url('P_login'));
        }
      }else{
        $this->CI->session->set_userdata('username', $username);
  			$this->CI->session->set_userdata('name', $name);
  			$this->CI->session->set_userdata('email', $email);
  			$this->CI->session->set_userdata('port', $port);
  			$this->CI->session->set_userdata('divisi', $divisi);

      }


		}else{
			$this->CI->session->set_flashdata('Upss..','Username/password salah');
			//redirect(base_url('P_login'));
		}
		return false;
	}
	// Proteksi halaman
	public function cek_login() {
		if($this->CI->session->userdata('username') == '') {
			$this->CI->session->set_flashdata("Upss..", '<script>alert("Anda belum Login");</script>');
		//	redirect(base_url('login/form_login'));
			echo '<script>alert("You Have Successfully updated this Record!");</script>';
		}
	}
	// Fungsi logout
	public function logout() {
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('id_login');
		$this->CI->session->unset_userdata('id');
		$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
		redirect(base_url('login/login'));
	}

}
