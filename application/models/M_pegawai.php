<?php
class M_pegawai extends CI_Model{

/*** Where Regrester For get number id kode_shif***/
function get_register($where,$table){
return $this->db->get_where($table,$where);
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
    ->where_in('master_pegawai.kode_pegawai',$where)
    ->get();
  return $query;
}


/***********  Fung Input, Edit, dan Update untuk umum **********/
//1. input
function input_pegawai($data,$table){
$this->db->insert($table,$data);
}
  // 2. fungsi edit / filter untuk umum
function edit_pegawai($where,$table){
return $this->db->get_where($table,$where);
}
  // 3. fungsi update untuk umum
function update_pagawai($where,$data,$table){
$this->db->where($where);
$this->db->update($table,$data);
}
/***************** tutup ****************/

/******* Nomor pegawai dan NIP *********/
function getkodeunik($id_port,$table) {
  $q = $this->db->query("SELECT MAX(RIGHT(kode_pegawai,4)) as kode_pegawai FROM $table Where id_port='$id_port'");
  $kd = "";
  if($q){
    foreach($q->result() as $k){
      $nilaikode = $k->kode_pegawai;
      $kode2 = (int) $nilaikode;
      $kode = $kode2 + 1;
      $kode_otomatis = str_pad($kode, 4, "0", STR_PAD_LEFT);
    }
  }else{
    $kd = "0001";
  }
  return $kode_otomatis;
}

}
?>
