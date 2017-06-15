<?php
class M_laporan extends CI_Model{
  // filter pekerjaan hari ini untuk di update ke dalam history laporan
  function filter_update_report(){
    $jdw = array("Setiap Hari" , date('d'), date('D'), date('d/m/Y'));
    $statusRpt = array('1','2');
    $query = $this->db->select('*')
      ->from('master_report')
      ->where_in('master_report.waktu_jenis_report', $jdw)
      ->where_in('master_report.id_status_report', $statusRpt)
      ->get();
    return $query;
  }

  // input cek data pekerjaan
  function filter_report_update_baru($idPgw,$noReport){
    $jdw = array("Setiap Hari" , date('d'), date('D'), date('d/m/Y'));
    $statusRpt = array('1','2');
    $query = $this->db->select('*')
      ->from('master_report')
      ->where_in('master_report.no_report', $noReport)
      ->where_in('master_report.id_user_pegawai', $idPgw)
      ->where_in('master_report.waktu_jenis_report', $jdw)
      ->where_in('master_report.id_status_report', $statusRpt)
      ->get();
    return $query;
  }

  /***********  Fung Input, Edit, dan Update untuk umum **********/
  function input($data,$table){
  $this->db->insert($table,$data);
  }
  // 2. fungsi edit / filter untuk umum
  function filter($where,$table){
  return $this->db->get_where($table,$where);
  }
  // 3. fungsi update untuk umum
  function update($where,$data,$table){
  $this->db->where($where);
  $this->db->update($table,$data);
  }
  // view data
  function view($table){
  $this->db->order_by('id', 'DESC');
  return $this->db->get('master_spk');
  }

  // filter pegawai sesuai data yang di cari
  function filter_pgw($where,$table){
  return $this->db->get_where($table,$where);
  }

  /** View profil  **/
  function view_profil($where,$iddivisi,$idport){
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
      ->where_in('master_pegawai.id_divisi',$iddivisi)
      ->where_in('master_pegawai.id_port',$idport)
      ->get();
    return $query;
  }

  // mengambil data report
  function hasil_laporan($where1,$where2,$where3,$idport,$iddivisi){
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
      ->where_in('master_report.id_user_pegawai', $where3)
      ->where_in('master_report.id_jenis_pekerjaan', $where1)
      ->where_in('master_report.id_jenis_report', $where2)
      ->where_in('master_report.id_port', $idport)
      ->where_in('master_report.id_divisi', $iddivisi)
      ->get();
    return $query;
  }

  // list pekerjaan hari ini
  function pekerjaan_hari_ini($where1,$where2,$idpgw,$idport,$iddivisi){
    $jdw = array("Setiap Hari" , date('d'), date('D'), date('d/m/Y'));
    $sts = array('1','2');
    $query = $this->db->select('*')
      ->from('master_report')
      ->join('master_reminder','master_reminder.no_report = master_report.no_report')
      ->join('user_pegawai','user_pegawai.id_user_pegawai = master_report.id_user_pegawai')
      ->join('category','category.id_category = master_report.id_category')
      ->join('jenis_pekerjaan','jenis_pekerjaan.id_jenis_pekerjaan = master_report.id_jenis_pekerjaan')
      ->join('master_port','master_port.id_port = master_report.id_port')
      ->join('master_divisi','master_divisi.id_divisi = master_report.id_divisi')
      ->join('jenis_report','jenis_report.id_jenis_report = master_report.id_jenis_report')
      ->join('status_report','status_report.id_status_report = master_report.id_status_report')
      ->where_in('master_report.id_user_pegawai', $idpgw)
      ->where_in('master_report.id_port', $idport)
      ->where_in('master_report.id_divisi', $iddivisi)
      ->where_in('master_report.id_jenis_pekerjaan', $where1)
      ->where_in('master_report.id_jenis_report', $where2)
      ->where_in('master_report.waktu_jenis_report', $jdw)
      ->where_in('master_report.id_status_report', $sts)
      ->get();
    return $query;
  }

  // filter data report
  function getjadwal_report($where,$id_user,$idport,$iddivisi){
    $query = $this->db->select('*')
      ->from('master_report')
      ->where_in('master_report.id_user_pegawai', $id_user)
      ->where_in('master_report.waktu_jenis_report', $where)
      ->where_in('master_report.id_port', $idport)
      ->where_in('master_report.id_divisi', $iddivisi)
      ->get();
    return $query;
  }

  // filter detail laporan
  function detaillaporan($idreport,$tgl){
    $query = $this->db->select('*')
      ->from('update_report')
      ->join('status_report','status_report.id_status_report = update_report.	id_update_status_report')
      ->where_in('update_report.id_report', $idreport)
      ->where_in('update_report.tgl_update', $tgl)
      ->get();
    return $query;
  }

  // filter cak laporan
  function ceklaporan($id_report,$tgl){
    $query = $this->db->select('*')
      ->from('update_report')
      ->where_in('update_report.id_report', $id_report)
      ->where_in('update_report.tgl_update', $tgl)
      //->where_in('update_report.id_kirim_report', 2)
      ->get();
    return $query;
  }
  // filter untuk edit laporan
  function _edit_report($id_report){
    $query = $this->db->select('*')
      ->from('update_report')
      ->join('status_report','status_report.id_status_report = update_report.id_update_status_report')
      ->join('status_kirim_report','status_kirim_report.id_kirim_report = update_report.id_kirim_report')
      ->where_in('update_report.id_report', $id_report)
      ->where_in('update_report.id_kirim_report', 1)
      ->order_by('id_update','DESC')
      ->limit(1)
      ->get();
    return $query;
  }

  function getReport_onebyone($id_report,$id_user){
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
      ->where_in('master_report.id_user_pegawai', $id_user)
      ->get();
    return $query;
  }

  // rangkuman laporan sesuai id spk dan id report
  function rangkuman_report($id_report){
    $query = $this->db->select('*')
      ->from('update_report')
      ->join('master_report','master_report.id_report = update_report.id_report')
      ->join('user_pegawai','user_pegawai.id_user_pegawai = update_report.id_pengirim_report')
      ->join('status_report','status_report.id_status_report = update_report.	id_update_status_report')
      ->where_in('update_report.id_report', $id_report)
      ->order_by('id_update','DESC')
      ->get();
    return $query;
  }

// menampilakan list pekerjaan hari ini, menggunakan history report harian
function TabelList_pekerjaanhariini($id_user_pegawai,$tgl,$idport,$iddivisi,$id_jenis_pekerjaan,$id_jenis_report){
  $query = $this->db->select('*')
    ->from('master_report')
    ->join('history_report_harian','history_report_harian.id_report = master_report.id_report')
    ->join('category','category.id_category = master_report.id_category')
    ->join('status_report','status_report.id_status_report = master_report.id_status_report')
    ->join('jenis_pekerjaan','jenis_pekerjaan.id_jenis_pekerjaan = master_report.id_jenis_pekerjaan')
    ->join('jenis_report','jenis_report.id_jenis_report = master_report.id_jenis_report')
    ->where_in('history_report_harian.id_user_pegawai', $id_user_pegawai)
    ->where_in('history_report_harian.tgl_history_report', $tgl)
    ->where_in('master_report.id_port', $idport)
    ->where_in('master_report.id_divisi', $iddivisi)
    ->where_in('master_report.id_jenis_pekerjaan', $id_jenis_pekerjaan)
    ->where_in('master_report.id_jenis_report', $id_jenis_report)
    ->get();
  return $query;
}


// list report history pekerjaan
  function list_history_laporan($id_user_pegawai,$tgl,$idport,$iddivisi){
    $query = $this->db->select('*')
      ->from('master_report')
      ->join('history_report_harian','history_report_harian.id_report = master_report.id_report')
      ->join('category','category.id_category = master_report.id_category')
      ->join('status_report','status_report.id_status_report = master_report.id_status_report')
      ->join('jenis_pekerjaan','jenis_pekerjaan.id_jenis_pekerjaan = master_report.id_jenis_pekerjaan')
      ->join('jenis_report','jenis_report.id_jenis_report = master_report.id_jenis_report')
      ->where_in('history_report_harian.id_user_pegawai', $id_user_pegawai)
      ->where_in('history_report_harian.tgl_history_report', $tgl)
      ->where_in('master_report.id_port', $idport)
      ->where_in('master_report.id_divisi', $iddivisi)
      ->get();
    return $query;
  }

// cek laporan untuk diconvertpdf
  function convertPDF($id_report,$tgl){
    $query = $this->db->select('*')
      ->from('master_report')
      ->join('master_reminder','master_reminder.no_report = master_report.no_report')
      ->join('user_pegawai','user_pegawai.id_user_pegawai = master_report.id_user_pegawai')
      ->join('category','category.id_category = master_report.id_category')
      ->join('jenis_pekerjaan','jenis_pekerjaan.id_jenis_pekerjaan = master_report.id_jenis_pekerjaan')
      ->join('master_port','master_port.id_port = master_report.id_port')
      ->join('master_divisi','master_divisi.id_divisi = master_report.id_divisi')
      ->join('jenis_report','jenis_report.id_jenis_report = master_report.id_jenis_report')
      ->join('status_report','status_report.id_status_report = master_report.id_status_report')
      ->join('update_report','update_report.id_report = master_report.id_report')
      ->where_in('update_report.id_report', $id_report)
      ->where_in('update_report.tgl_update', $tgl)
      ->get();
    return $query;
  }

  // filter cak email untuk mengirim email
  function filter_Email(){
    $query = $this->db->select('*')
      ->from('master_pegawai')
      ->join('user_pegawai','user_pegawai.kode_pegawai = master_pegawai.kode_pegawai')
      ->where_in('user_pegawai.id_level_akun', 1)
      ->where_in('user_pegawai.id_status_akun', 2)
      ->get();
    return $query;
  }

  // reminder job send to email
  function JobSendEmail($where1,$wr2,$idpgw,$idport,$iddivisi,$jdw){
    $sts = array('1','2');
    $query = $this->db->select('*')
      ->from('master_report')
      ->join('master_reminder','master_reminder.no_report = master_report.no_report')
      ->join('user_pegawai','user_pegawai.id_user_pegawai = master_report.id_user_pegawai')
      ->join('category','category.id_category = master_report.id_category')
      ->join('jenis_pekerjaan','jenis_pekerjaan.id_jenis_pekerjaan = master_report.id_jenis_pekerjaan')
      ->join('master_port','master_port.id_port = master_report.id_port')
      ->join('master_divisi','master_divisi.id_divisi = master_report.id_divisi')
      ->join('jenis_report','jenis_report.id_jenis_report = master_report.id_jenis_report')
      ->join('status_report','status_report.id_status_report = master_report.id_status_report')
      ->where_in('master_report.id_user_pegawai', $idpgw)
      ->where_in('master_report.id_port', $idport)
      ->where_in('master_report.id_divisi', $iddivisi)
      ->where_in('master_report.id_jenis_pekerjaan', $where1)
      ->where_in('master_reminder.id_reminder_by', $wr2)
      ->where_in('master_report.waktu_jenis_report', $jdw)
      ->where_in('master_report.id_status_report', $sts)
      ->get();
    return $query;
  }

  function pengaturan_pekerjaan($idPekerjaan){
    $query = $this->db->select('*')
      ->from('master_report')
      ->join('user_pegawai','user_pegawai.id_user_pegawai = master_report.id_user_pegawai')
      ->join('master_reminder','master_reminder.no_report = master_report.no_report')
      ->join('category','category.id_category = master_report.id_category')
      ->join('jenis_pekerjaan','jenis_pekerjaan.id_jenis_pekerjaan = master_report.id_jenis_pekerjaan')
      ->join('master_port','master_port.id_port = master_report.id_port')
      ->join('master_divisi','master_divisi.id_divisi = master_report.id_divisi')
      ->join('jenis_report','jenis_report.id_jenis_report = master_report.id_jenis_report')
      ->join('status_report','status_report.id_status_report = master_report.id_status_report')
      ->join('reminder_by','reminder_by.id_reminder_by = master_reminder.id_reminder_by')
      ->where_in('master_report.id_report', $idPekerjaan)
      ->get();
    return $query;
  }

  // daftar pekerjaan masing2 divisi
  // terdapat dalam controller kabag
  function daftar_pekerjaan($idPort,$idDivisi,$idstatus){
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
      ->where_in('master_report.id_port', $idPort)
      ->where_in('master_report.id_divisi', $idDivisi)
      ->where_in('master_report.id_status_report', $idstatus)
      ->get();
    return $query;
  }

  // mengabil data pekerjaan sesuai dengan idreprot yang di gunakan didalam menu kabag
  function FunctionName($value='')
  {
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
