<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

class SendReminder extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->library('MyPHPMailer'); // load library
    $this->load->model('M_laporan');
    $this->load->helper('url');
  }

function Email_Reminder(){
  $Result_Email = $this->M_laporan->filter_Email()->result();
  foreach ($Result_Email as $u) {
    // get Pekerjaan pegawai untuk di kirimkan
    //$wr2 = array("1","2","3","4");
    $wr2 = '4';
    $wrproject = array("1","2");
    $iduserpgw = $u->id_user_pegawai;
    $idportpgw = $u->id_port;
    $iddivisipgw = $u->id_divisi;
    $getJadwal = array(
      "Setiap Hari", date('d', strtotime('+1 day', strtotime('d'))), date('D', strtotime('+1 day', strtotime(date('D')))), date('d/m/Y'));
    $data['ResultJob'] = $this->M_laporan->JobSendEmail($wrproject,$wr2,$iduserpgw,$idportpgw,$iddivisipgw,$getJadwal)->result();

    $tgl_Reminder = date('d-M-Y', strtotime('+1 days', strtotime( date('d-M-Y') )));

    $isiEmail = $this->load->view('Notifikasi/SendEmail',$data,true); //isi pesan dari email
    $mail = new PHPMailer();
    $mail->IsHTML(true);   // set email format to HTML
    $mail->IsSMTP();   // we are going to use SMTP
    $mail->SMTPAuth   = true; // enabled SMTP authentication
    $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
    $mail->Host       = "smtp.gmail.com"; // setting GMail as our SMTP server
    $mail->Port       = 465; // SMTP port to connect to GMail
    $mail->Username   = "arbimauday@gmail.com";  // alamat email kamu
    $mail->Password   = "arbianto"; // password GMail
    $mail->SetFrom('info@globalxtreme.net', "Globalxtreme:: Reminder JOB - ".$tgl_Reminder);  //Siapa yg mengirim email
    $mail->Subject    = "Reminder : Daftar Pekerjaan ".$tgl_Reminder;
    $mail->Body       = $isiEmail;
    //$mail->AddAttachment($isiEmail);

    //->message($body)
    //->attach($pdfFilePath)
    $toEmail = $u->email; // siapa yg menerima email ini
    $mail->AddAddress($toEmail);

    if(!$mail->Send()) {
        $data = "Eror: ".$mail->ErrorInfo;
    }else {
        //$data = "sukses";
        echo "<script>alert('Sukses Terkirim!');</script>";
        //location.href = '".base_url()."Pegawai/Home';

    }
  }
}

function Reminder_sms(){
  $data['Result_sms'] = $this->M_laporan->filter_Email()->result();
  foreach ($data['Result_sms'] as $u) {
    $wr2 = '3';// id number reminder by sms
    $wrproject = array("1","2");
    $iduserpgw = $u->id_user_pegawai;
    $idportpgw = $u->id_port;
    $iddivisipgw = $u->id_divisi;
    $getJadwal = array(
      "Setiap Hari", date('d', strtotime('+1 day', strtotime('d'))), date('D', strtotime('+1 day', strtotime(date('D')))), date('d/m/Y'));
    $ResultJob = $this->M_laporan->JobSendEmail($wrproject,$wr2,$iduserpgw,$idportpgw,$iddivisipgw,$getJadwal)->result();
    if(!empty($ResultJob)){
      $notujuan = $u->no_hp;
      $isipesan = "";
foreach ($ResultJob as $ux){
$isipesan = 'Level :'. $ux->category.
'Due Date :'. $ux->jenis_report.
'Status :'.  $ux->status_report .'/'. $ux->progress_bar. '%'.
'Judul Pekerjaan :'. $ux->judul_pekerjaan.
'------------------';
}
echo $isipesan;
      $userkey = 'yaemjp';
      $passkey = 'gxapp';
      $isi=urlencode($isipesan);
      $hp=str_replace('+62', '0', $notujuan);
      $hp=str_replace(' ', '', $hp);
      $hp=str_replace('.', '', $hp);
      $hp=str_replace(',', '', $hp);
      $url="https://reguler.zenziva.net/apps/smsapi.php?userkey=$userkey&passkey=$passkey&nohp=$notujuan&pesan=$isi ";
      $data=file_get_contents($url);

      echo "<script>window.alert('success');</script>";
      //$this->load->view('Notifikasi/Send_sms',$data);
    }else{
      echo "<script>window.alert('Something wrong');</script>";
    }
  }
}

function send_sms_reminder(){
    /*$notujuan = $u->no_hp;
    $isipesan = $this->input->post('isi_pesan');*/
$notujuan = $this->input->post('no_hp');
$isipesan = $this->input->post('isipesan');
//$isipesan = "Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting.";

    //user key
    /*$userkeyanda = 'yagcjd';
    $passkeyanda = 'abimdy';*/

    $userkey = 'yaemjp';
    $passkey = 'gxapp';

    $isi=urlencode($isipesan);
    $hp=str_replace('+62', '0', $notujuan);
    $hp=str_replace(' ', '', $hp);
    $hp=str_replace('.', '', $hp);
    $hp=str_replace(',', '', $hp);
    /*$url="https://alpha.zenziva.net/apps/smsapi.php?userkey=$userkeyanda&passkey=$passkeyanda&nohp=$notujuan&pesan=$isi";*/
    $url="https://reguler.zenziva.net/apps/smsapi.php?userkey=$userkey&passkey=$passkey&nohp=$notujuan&pesan=$isi ";
    $data=file_get_contents($url);

    $oke = "http://193.105.74.159/api/v3/sendsms/plain?user=internationalsms&password=RJ2GUe7y&sender=KAPNFO&SMSText=TEST&type=longsms&GSM=6285858600379";
    $data2=file_get_contents($oke);

    if(eregi('success', $data) == true){
      echo "<script>window.alert('SMS Berhasil terkirim');</script>";
    }else {
      echo "<script>window.alert('SMS gagal');</script>";
    }

//tes ke dua
/*$url = "https://reguler.zenziva.net/apps/smsapi.php";
$curlHandle = curl_init();
curl_setopt($curlHandle, CURLOPT_URL, $url);
curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$notujuan.'&pesan='.urlencode($isipesan));
curl_setopt($curlHandle, CURLOPT_HEADER, 0);
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
curl_setopt($curlHandle, CURLOPT_POST, 1);
$results = curl_exec($curlHandle);
curl_close($curlHandle);*/
}

}
?>
