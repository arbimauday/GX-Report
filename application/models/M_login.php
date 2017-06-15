<?php
class M_login extends CI_Model{

public function cek_akun_pegawai($user,$pass){
  $query = $this->db->select('*')
    ->from('user_pegawai')
    ->join('master_pegawai','master_pegawai.kode_pegawai = user_pegawai.kode_pegawai')
    ->join('master_port','master_port.id_port = user_pegawai.id_port')
    ->join('master_status_akun','master_status_akun.id_status_akun = user_pegawai.id_status_akun')
    ->join('master_divisi','master_divisi.id_divisi = user_pegawai.id_divisi')
    ->where_in('user_pegawai.user', $user)
    ->where_in('user_pegawai.pass', $pass)
    //->where_in('user_pegawai.id_port', $id_port)
    ->where_in('user_pegawai.id_status_akun', 2)
    ->get();
  return $query->result();
}

function cek_and_recek_user($where,$table){
  return $this->db->get_where($table,$where)->num_rows();
}

public function cek_akun_kabag($user,$pass,$id_port,$id_level_akun){
  $query = $this->db->select('*')
    ->from('user_pegawai')
    ->join('master_port','master_port.id_port = user_pegawai.id_port')
    ->join('master_divisi','master_divisi.id_divisi = user_pegawai.id_divisi')
    ->join('level_akun','level_akun.id_level_akun = user_pegawai.id_level_akun')
    ->where_in('user_pegawai.user',$user)
    ->where_in('user_pegawai.pass',$pass)
    ->where_in('user_pegawai.id_port',$id_port)
    ->where_in('user_pegawai.id_status_akun', 2)
    ->where_in('user_pegawai.id_level_akun',$id_level_akun)
    ->get();
  return $query->result();
}

public function cek_akun_admin($user,$pass){
  $query = $this->db->select('*')
    ->from('user_pegawai')
    ->join('level_akun','level_akun.id_level_akun = user_pegawai.id_level_akun')
    ->where_in('user_pegawai.user',$user)
    ->where_in('user_pegawai.pass',$pass)
    ->where_in('user_pegawai.id_level_akun',3)
    ->get();
  return $query->result();
}


// notifikasi
/***********  Fung Input, Edit, dan Update untuk umum **********/
function input($data,$table){
  $this->db->insert($table,$data);
}
function filter($where,$table){
  return $this->db->get_where($table,$where)->result();
}
function update($where,$data,$table){
  $this->db->where($where);
  $this->db->update($table,$data);
}
/* Tutup */
function coba($where,$table){
  $jdw = array("Setiap Hari" , date('d', strtotime('+1 days')), date('D', strtotime('+1 days')));
  $query = $this->db->select('*')
    ->from($table)
    ->where_in('master_report.id_user_pegawai', $where)
    ->where_in('master_report.waktu_jenis_report', $jdw)
    ->get();
  return $query->num_rows();
}


}
?>
