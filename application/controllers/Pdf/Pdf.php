<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library('MyPHPMailer'); // load library
        $this->load->model('M_laporan');
        $this->load->helper('url');
    }

function Convert_to_pdf(){
  $this->load->library('m_pdf');
  // cek laporan hari Ini
  $jdw = array("Setiap Hari", date('d'), date('D'), date('d/m/Y'));
  $result_where = $this->M_laporan->getjadwal_report($jdw,$this->session->userdata('IdUser'),$this->session->userdata('IdPort'),$this->session->userdata('IdDivisi'))->result();
  foreach ($result_where as $no){
    $cek[]= $no->id_report;
  }

  $this->data['laporan'] = $this->M_laporan->convertPDF($cek,date('d/m/Y'))->result();
  $this->data['title']="Laporan::";
	$html=$this->load->view('Pdf/ConvertPdf_laporan_harian',$this->data, true);
	$pdfFilePath ="Laporan Harian ".date('d-m-y').".pdf";
	$pdf = $this->m_pdf->load();
  $pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('D, d m Y'));
	$pdf->WriteHTML($html,2);
	$pdf->Output();
}

function Convert_pdf_history($tgl){
  $this->load->library('m_pdf');
  // cek laporan hari Ini
  $to = DateTime::createFromFormat ( "dmY", $tgl );
  $date_con = $to->format('d/m/Y');

  $jdw = array("Setiap Hari", date('d'), date('D'), $date_con);
  $result_where = $this->M_laporan->getjadwal_report($jdw,$this->session->userdata('IdUser'),$this->session->userdata('IdPort'),$this->session->userdata('IdDivisi'))->result();
  foreach ($result_where as $no){
    $cek[]= $no->id_report;
  }

  $this->data['laporan'] = $this->M_laporan->convertPDF($cek,$date_con)->result();
  $this->data['title']="Laporan::";
	$html=$this->load->view('Pdf/ConvertPdf_laporan_harian',$this->data, true);
	$pdfFilePath ="Laporan Harian ".$date_con.".pdf";
	$pdf = $this->m_pdf->load();
  $pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('D, d m Y'));
	$pdf->WriteHTML($html,2);
	$pdf->Output();
}

function SendEmail(){
  // hasil input
  $tglUpdate     = $this->input->post('tglUpdate');
  $tglProgress   = $this->input->post('tglProgress');
  $idReportSend  = $this->input->post('idReportSend');

  $catatanTo     = $this->input->post('catatanTo');
  $myEmail       = $this->input->post('myEmail');
  $passwordEmail = $this->input->post('passwordEmail');
  $emailTo       = $this->input->post('emailTo');
  $judulPekerjaan = $this->input->post('JudulPekerjaan');

  //load mPDF library
  $this->load->library('m_pdf');

  // filter data
  $whereUpdate = array(
    'id_report' => $idReportSend,
    'tgl_update'=> $tglUpdate
  );
  $whereProgress = array(
    'id_report'    => $idReportSend,
    'tgl_progress' => $tglProgress
  );
  $whereReport = array(
    'id_report' => $idReportSend
  );

  //hasil pencarian
  $this->data['dataUpdate'] = $this->M_ajax->_whereSendeEmail($whereUpdate,'update_report')->result();

  $this->data['dataProgress'] = $this->M_ajax->_whereSendeEmail($whereProgress,'progress_report')->result();

  $this->data['dataReport'] = $this->M_ajax->sendemail($whereReport)->result();

      //now pass the data//
  $this->data['title']="RAB";
  $html=$this->load->view('Pdf/Laporan_pdf',$this->data, true);
  $pdfFilePath =FCPATH ."Laporan ".date('d-m-y').".pdf";
  $pdf = $this->m_pdf->load();
  $pdf->WriteHTML($html);
  $pdf->Output($pdfFilePath, "F");

$fromEmail = $myEmail;
$isiEmail = $catatanTo;//isi pesan dari email
$mail = new PHPMailer();
$mail->IsHTML(false);    // set email format to HTML
$mail->IsSMTP();   // we are going to use SMTP
$mail->SMTPAuth   = true; // enabled SMTP authentication
$mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
$mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
$mail->Port       = 465;                   // SMTP port to connect to GMail
$mail->Username   = $fromEmail;  // alamat email kamu
$mail->Password   = $passwordEmail;            // password GMail
$mail->SetFrom('info@globalxtreme.net', $judulPekerjaan);  //Siapa yg mengirim email
$mail->Subject    = "Laporan Pekerjaan : ".$judulPekerjaan.' '.date('d/m/Y');
$mail->Body       = $isiEmail;
$mail->AddAttachment($pdfFilePath);

//->message($body)
//->attach($pdfFilePath)
$toEmail = $emailTo ; // siapa yg menerima email ini
$mail->AddAddress($toEmail);

if(!$mail->Send()) {
    $data = "Eror: ".$mail->ErrorInfo;
} else {
    //$data = "sukses";
    echo "<script>alert('Sukses Terkirim!');
    location.href = '".base_url()."Pegawai/Home';
    </script>";
}
//echo json_encode($data);

}
 //------------------------------------------------------------------------------------------//
}
?>
