<?php
class M_ajax extends CI_Model{

/***********  Fung Input, Edit, dan Update untuk umum **********/
function input($data,$table){
  $this->db->insert($table,$data);
}
function where($where,$table){
  return $this->db->get_where($table,$where)->result();
}
function edit($where,$table){
  return $this->db->get_where($table,$where);
}
function update($where,$data,$table){
  $this->db->where($where);
  $this->db->update($table,$data);
}
/* Tutup */

function filter($where,$table){
  $this->db->order_by('tgl_update' or 'tgl_progress', 'DESC');
  return $this->db->get_where($table,$where)->result();
}

function coba($where,$table){
  $jdw = array("Setiap Hari" , date('d', strtotime('+1 days')), date('D', strtotime('+1 days')));
  $query = $this->db->select('*')
    ->from($table)
    ->where_in('master_report.id_user_pegawai', $where)
    ->where_in('master_report.waktu_jenis_report', $jdw)
    ->get();
  return $query->num_rows();
}

function filter_report($id_report){
  $query = $this->db->select('*')
    ->from('master_report')
    ->join('master_reminder','master_reminder.no_report = master_report.no_report')
    ->join('user_pegawai','user_pegawai.id_user_pegawai = master_report.id_user_pegawai')
    ->join('jenis_pekerjaan','jenis_pekerjaan.id_jenis_pekerjaan = master_report.id_jenis_pekerjaan')
    ->join('master_port','master_port.id_port = master_report.id_port')
    ->join('master_divisi','master_divisi.id_divisi = master_report.id_divisi')
    ->join('jenis_report','jenis_report.id_jenis_report = master_report.id_jenis_report')
    ->join('category','category.id_category = master_report.id_category')
    ->join('status_report','status_report.id_status_report = master_report.id_status_report')
    ->join('reminder_by','reminder_by.id_reminder_by = master_reminder.id_reminder_by')
    ->where_in('master_report.id_report', $id_report)
    ->get();
  return $query->row();
}

//send pesan email
function _whereSendeEmail($where,$table){
  $this->db->order_by('tgl_update' or 'tgl_progress', 'DESC');
  return $this->db->get_where($table,$where);
}

function sendemail($id_report){
  $query = $this->db->select('*')
    ->from('master_report')
    ->join('master_reminder','master_reminder.no_report = master_report.no_report')
    ->join('user_pegawai','user_pegawai.id_user_pegawai = master_report.id_user_pegawai')
    ->join('jenis_pekerjaan','jenis_pekerjaan.id_jenis_pekerjaan = master_report.id_jenis_pekerjaan')
    ->join('master_port','master_port.id_port = master_report.id_port')
    ->join('master_divisi','master_divisi.id_divisi = master_report.id_divisi')
    ->join('jenis_report','jenis_report.id_jenis_report = master_report.id_jenis_report')
    ->join('category','category.id_category = master_report.id_category')
    ->join('status_report','status_report.id_status_report = master_report.id_status_report')
    ->join('reminder_by','reminder_by.id_reminder_by = master_reminder.id_reminder_by')
    ->where_in('master_report.id_report', $id_report)
    ->get();
  return $query;
}

// filter remaks
function filterRemaks($idReport){
  $query = $this->db->select('*')
    ->from('remarks_report')
    ->join('user_pegawai','user_pegawai.id_user_pegawai = remarks_report.id_user_pengirim')
    ->join('status_pengirim','status_pengirim.id_status_pengirim = remarks_report.id_status_pengirim')
    ->where_in('remarks_report.id_report', $idReport)
    ->order_by('id_remarks', 'ASC')
    ->get();
  return $query->result();
}

// notifikasi remarks bar pegawai
function notifikasi_remarks_bar($IdUser){
  $query = $this->db->select('*')
    ->from('master_report')
    ->join('remarks_report','remarks_report.id_report = master_report.id_report')
    ->join('user_pegawai','user_pegawai.id_user_pegawai = remarks_report.id_user_pengirim')
    ->where_in('master_report.id_user_pegawai', $IdUser)
    ->where_in('remarks_report.id_status_pengirim', 1)
    ->where_in('remarks_report.sound_bell', 0)
    ->order_by('id_remarks', 'DESC')
    ->get();
  return $query->result();
}
function jumlah_remarks_bar($IdUser){
  $query = $this->db->select('*')
    ->from('master_report')
    ->join('remarks_report','remarks_report.id_report = master_report.id_report')
    ->where_in('master_report.id_user_pegawai', $IdUser)
    ->where_in('remarks_report.id_status_pengirim', 1)
    ->where_in('remarks_report.sound_bell', 0)
    ->get();
  return $query->num_rows();
}

//notifikasi bar remarks untuk Kabag
function kabag_notifikasi_bar_remarks($idPort,$idDivisi){
  $query = $this->db->select('*')
    ->from('master_report')
    ->join('remarks_report','remarks_report.id_report = master_report.id_report')
    ->join('user_pegawai','user_pegawai.id_user_pegawai = master_report.id_user_pegawai')
    ->where_in('master_report.id_port', $idPort)
    ->where_in('master_report.id_divisi', $idDivisi)
    ->where_in('remarks_report.id_status_pengirim', 2)
    ->where_in('remarks_report.sound_bell', 0)
    ->order_by('id_remarks', 'DESC')
    ->get();
  return $query->result();
}
function kabag_jumlah_remarks($idPort,$idDivisi){
  $query = $this->db->select('*')
    ->from('master_report')
    ->join('remarks_report','remarks_report.id_report = master_report.id_report')
    ->where_in('master_report.id_port', $idPort)
    ->where_in('master_report.id_divisi', $idDivisi)
    ->where_in('remarks_report.id_status_pengirim', 2)
    ->where_in('remarks_report.sound_bell', 0)
    ->get();
  return $query->num_rows();
}


}

?>
