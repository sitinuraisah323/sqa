<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Tahfidz extends CI_Controller 
{
    public function __construct()
	{
        parent::__construct();
		$this->load->model('MateriModel','materi');
        $this->load->model('ExamModel','exam');
        $this->load->model('TaskModel','task');
        $this->load->model('SertificateModel','sertificate');
          $this->load->library('form_validation');
          $this->load->helper(array('url','download'));	

          if ($this->session->userdata('email') == NULL) {

            redirect('auth');
        }
    }
     public function index()
    {
        // $data['tahsin'] = $this->materi->db->where('id_program',1)->get('materi')->result();
        $data['tahfidz'] = $this->materi->db->where('id_program',2)->get('materi')->result();
        // $data['tilawah'] = $this->materi->db->where('id_program',3)->get('materi')->result();
        //  $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        
        // // echo "Selamat Datang User " . $data['user']['nama'];

        // $this->load->view('admin/index', $data );
        // $model = new JadwalModel();
        // $data['product']  = $model->getProduct()->getResult();
        // $data['category'] = $model->getCategory()->getResult();
        return $this->load->view('sertifikat/tahfidz/index', $data);
    }

    public function valueList()
    {
        $postData = $this->input->post();

     $data = $this->sertificate->getEmployees($postData);
// var_dump($data['data']); exit;
    echo json_encode($data);
    }

    public function generate()
    {
        // $postData = $this->input->post();

    // Get data
    // $data = $this->task->getEmployees();
        // var_dump($data['data']); exit;
$sertificate = $this->sertificate;
    $this->materi->db->select(" count(*) as allcount ");
    $this->materi->db->where('id_program',2);
    $materis = $this->db->get('materi')->result();

    $this->exam->db->select("count(*) as allcount ");
    $this->exam->db->where('id_program',2);
    $exam = $this->db->get('exam')->result();

    $this->task->db->select("users.id,users.nama, users.email, 
    ( select sum(task.taskValue) from task where users.id = task.id_user and id_program=2) as nilai, 
    ( select sum(exam.taskValue) from exam where users.id = exam.id_user and id_program=2) as ujian ");
    $records = $this->db->get('users')->result();
// var_dump($records);exit;
$rata = 0;

    foreach($records as $data){
        // echo $data->nilai;
                // echo $materis[0]->allcount;exit;
        // echo $data->ujian;
        // echo $exam[0]->allcount;

        $rata = ($data->nilai/$materis[0]->allcount)*70/100 + ($data->ujian/$exam[0]->allcount)*3/100;
                // var_dump($data);
// var_dump($rata);
         if($rata>70){
            $ket ="Lulus";
          
             $val = array( 
            "date"=>date('Y-m-d'),
              
              "id_program"=>2,
              "id_user"=>$data->id,
              "nama"=>$data->nama,
              "email"=>$data->email,
            //   "nilai"=>$data->nilai/$materis[0]->allcount,
            //   "ujian"=>$data->ujian/$exam[0]->allcount,
              "value"=> $rata,
              "descriptions"=>$ket,
              
          ); 
        //   var_dump($val);
        //             var_dump($rata);

        $this->sertificate->db->select("id as id_sertif ");
        $this->sertificate->db->where('id_user',$data->id)
        ->where('id_program',2);
         $sertif = $this->db->get('sertificate')->result();
        // var_dump($sertif);
        if($sertif){
            foreach($sertif as $sertif){
        $sertificate->update($val, $sertif->id_sertif);
// echo 'update';
            }
             
           
        //   var_dump('yes');exit;
        }else{
            $this->db->insert('sertificate',$val);
            // echo 'insert';

        }
            // var_dump($val);

         }
                
    }
 
        $data = $this->materi->db->where('id_program',2)->get('materi')->result();
            $this->load->view("sertifikat/tahfidz/index", array(
                    'tahfidz' =>$data,
                    // 'message' => $message
                ));
        
    }

    
 
     public function pdf($id)
	{		
		$this->load->library('pdf');
        
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// require_once APPPATH.'controllers/pdf/header.php';
        
		// $lm = $this->lm();
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('TCPDF Example 051');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(0);
        $pdf->SetFooterMargin(0);

        // remove default footer
        $pdf->setPrintFooter(false);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('times', '', 20);
                $data =  $this->sertificate->db->select('sertificate.*, program.nama as program')
                ->join('program', 'program.id=sertificate.id_program')
                ->where('sertificate.id', $id)->get('sertificate')->row();
                    //  var_dump($data);
                    // echo $data->program;exit;

                $pdf->AddPage('L', 'A3');


        // -- set new background ---

        // get the current page break margin
        $bMargin = $pdf->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $pdf->getAutoPageBreak();
        // disable auto-page-break
        $pdf->SetAutoPageBreak(false, 0);
        // set bacground image
        $img_file = K_PATH_IMAGES.'bg1.jpg';
        $pdf->Image($img_file, 0, 0, 450, 297, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $pdf->setPageMark();

        $date = date('d',strtotime($data->date));
        $month = date('F',strtotime($data->date));
        $year = date('Y',strtotime($data->date));

        $program = strtoupper($data->program);
        $nama = strtoupper($data->nama);
        // Print a text
        $html = '<br><br><br><br><span style="color:black;text-align:center;font-weight:bold;font-size:40pt;">SERTIFIKAT '.$program.' </span>
        <br><br>
                <table>

                <p style="color:black;text-align:center;font-weight:bold;font-size:15pt;">Diberikan Kepada :</p>

                    <h4 style="color:black;text-align:center;font-weight:bold;font-size:30pt;">  '.$nama.'</h4>
                
                </table>
        <br>
                <p style="color:black;text-align:center;font-weight:bold;font-size:15pt;">Atas partisipasi dalam <b>Program '.$data->program.' Online</b></p>
                <p style="color:black;text-align:center;font-weight:bold;font-size:15pt;">Komunitas Sahabat Quran Akhwat</p>
        <br><br><br><br>
                <div style="color:black;text-align:right;font-weight:bold;font-size:15pt;" >Jakarta, '.$date.' '.$month.' '.$year.'     </div>
                <div style="color:black;text-align:right;font-weight:bold;font-size:15pt;" >Yang bertanda tangan,</div><br><br><br>
                <div style="color:black;text-align:right;font-weight:bold;font-size:15pt;" >Nining</div>';
        $pdf->writeHTML($html, true, false, true, false, '');

        // ---------------------------------------------------------

        //Close and output PDF document
        $pdf->Output('Sertificate_Program'.date('d-m-Y').'.pdf', 'D');

    }

    

    public function profil()
    {
        $data['user'] = $this->db->join('user_role', 'user_role.id=users.role_id')->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('user/profil', $data);
    }
}