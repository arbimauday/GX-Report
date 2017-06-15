<?php
class M_admin extends CI_Model{
/***********  Fung Input, Edit, dan Update untuk umum **********/
function input($data,$table){ //1. input
$this->db->insert($table,$data);
}
function edit($where,$table){  // 2. fungsi edit / filter untuk umum
return $this->db->get_where($table,$where);
}
function update($where,$data,$table){  // 3. fungsi update untuk umum
$this->db->where($where);
$this->db->update($table,$data);
}
function view($table){ // view
$this->db->order_by('id', 'DESC');
return $this->db->get($table);
}

function view_asc($table){ // view
return $this->db->get($table);
}
/***************** tutup ****************/

// list semua pekerja
function all_pekerja($where,$id_status_akun){
  $query = $this->db->select('*')
    ->from('master_pegawai')
    ->join('master_agama','master_agama.id_agama = master_pegawai.id_agama')
    ->join('user_pegawai','user_pegawai.kode_pegawai = master_pegawai.kode_pegawai')
    ->join('master_divisi','master_divisi.id_divisi = master_pegawai.id_divisi')
    ->join('master_status_pegawai','master_status_pegawai.id_status_pegawai = master_pegawai.id_status_pegawai')
    ->join('master_port','master_port.id_port = master_pegawai.id_port')
    ->join('level_akun','level_akun.id_level_akun = user_pegawai.id_level_akun')
    ->where_in('master_pegawai.id_port',$where)
    ->where_in('user_pegawai.id_status_akun',$id_status_akun)
    ->get();
  return $query;
}

/** View Data Pegawai perkode pegawai **/
function view_register($where,$table){
  $query = $this->db->select('*')
    ->from('master_pegawai')
    ->join('master_agama','master_agama.id_agama = master_pegawai.id_agama')
    ->join('master_port','master_port.id_port = master_pegawai.id_port')
    ->join('master_divisi','master_divisi.id_divisi = master_pegawai.id_divisi')
    ->join('master_status_pegawai','master_status_pegawai.id_status_pegawai = master_pegawai.id_status_pegawai')
    ->join('user_pegawai','user_pegawai.kode_pegawai = master_pegawai.kode_pegawai')
    ->join('master_status_akun','master_status_akun.id_status_akun = user_pegawai.id_status_akun')
    ->join('level_akun','level_akun.id_level_akun = user_pegawai.id_level_akun')
    ->where_in('master_pegawai.kode_pegawai',$where)
    ->get();
  return $query;
}

/** View profil  **/
function view_profil($where){
  $query = $this->db->select('*')
    ->from('master_pegawai')
    ->join('master_agama','master_agama.id_agama = master_pegawai.id_agama')
    ->join('master_port','master_port.id_port = master_pegawai.id_port')
    ->join('master_divisi','master_divisi.id_divisi = master_pegawai.id_divisi')
    ->join('master_status_pegawai','master_status_pegawai.id_status_pegawai = master_pegawai.id_status_pegawai')
    ->join('user_pegawai','user_pegawai.kode_pegawai = master_pegawai.kode_pegawai')
    ->join('master_status_akun','master_status_akun.id_status_akun = user_pegawai.id_status_akun')
    ->join('level_akun','level_akun.id_level_akun = user_pegawai.id_level_akun')
    ->where_in('master_pegawai.kode_pegawai',$where)
    ->get();
  return $query;
}

// filter pegawai yang mau di pindahkan posisinya
function filter_pegawai($kode_pegawai){
  $query = $this->db->select('*')
    ->from('master_pegawai')
    ->join('user_pegawai','user_pegawai.kode_pegawai = master_pegawai.kode_pegawai')
    ->where_in('user_pegawai.id_level_akun', 1)
    ->where_in('user_pegawai.id_status_akun', 2)
    ->where_in('master_pegawai.kode_pegawai', $kode_pegawai)
    ->get();
  return $query;
}

}
?>
