<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class DetailUjianAdmin extends CI_Controller 
{
    public function __construct()
	{
        parent::__construct();
		$this->load->model('MateriModel','materi');
        $this->load->model('UjianModel','ujian');
        $this->load->model('ExamModel','exam');
          $this->load->library('form_validation');
          $this->load->helper(array('url','download'));	
          $this->load->model('TaskModel','task');

          if ($this->session->userdata('email') == NULL) {

            redirect('auth');
        }
    }
    public function index($id)
    {
        $data['tahsin'] = $this->ujian->db->where('id',$id)->get('examquestion')->result();
        $data['task'] = $this->exam->db->select('users.*, exam.*, exam.id as id_exam')->join('users', 'users.id=exam.id_user')->where('id_examquestion',$id)->get('exam')->result();
        
        $this->load->view('DetailUjianAdmin/index', $data );
    }

    public function add()
    {
        $data['taskValue']=$this->input->post('nilai');
        $data['id_examquestion']=$this->input->post('id_examquestion');
        $data['id_exam']=$this->input->post('id_exam');       
        $data['id_program']=$this->input->post('id_program');
        $data['id_user']=$this->input->post('id_user');

        $id_exam=$this->input->post('id_exam');
                // var_dump($data);exit;

        $exams = $this->exam;
        $validation = $this->form_validation;
        $validation->set_rules($exams->rules());
         
                $exam = $this->exam->db->where('id',$id_exam)->get('exam')->result();
                foreach($exam as $exam){
                    $dataExam['date']=$exam->date;       
                    $dataExam['answer']=$exam->answer;
                    $dataExam['file']=$exam->file;
                    $dataExam['id_examquestion']=$exam->id_examquestion;       
                    $dataExam['id_program']=$exam->id_program;
                    $dataExam['id_user']=$exam->id_user;
                    $dataExam['taskValue']=$this->input->post('nilai');
                    $dataExam['status']='1';
                }
                $exams->update($dataExam, $exam->id);

                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible col-md-4 mx-auto fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button> <strong> Success Memberi Nilai</strong> </div>');

                $data['tahsin'] = $this->ujian->db->where('id',$data['id_examquestion'])->get('examquestion')->result();
                $data['task'] = $this->exam->db->select('users.*, exam.*, exam.id as id_exam')->join('users', 'users.id=exam.id_user')->where('id_examquestion',$data['id_examquestion'])->get('exam')->result();
        // var_dump($data['tahsin']);exit;
            $this->load->view('detailUjianAdmin/index', $data );
    }
    
    public function add_tahfidz()
    {
         $materi = $this->materi;
        $validation = $this->form_validation;
        $validation->set_rules($materi->rules());

        if ($validation->run()) {
            // $jadwal->save();
            $data=array(
                "date"=>$_POST['date'],
                "title"=>$_POST['title'],
                "description"=>$_POST['description'],
                "id_program"=>$_POST['id_program'],
            );
            $this->db->insert('materi',$data);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
           $this->load->view("materi/index");

        }
        $this->load->view("jadwal/add_tahfidz");
        
    }

    public function add_tilawah()
    {
         $materi = $this->materi;
        $validation = $this->form_validation;
        $validation->set_rules($materi->rules());

        if ($validation->run()) {
            // $jadwal->save();
            $data=array(
                "date"=>$_POST['date'],
                "title"=>$_POST['title'],
                "description"=>$_POST['description'],
                "id_program"=>$_POST['id_program'],
            );
            $this->db->insert('materi',$data);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
           $this->load->view("materi/index");

        }
        $this->load->view("jadwal/add_tilawah");
        
    }
  public function edit_tahsin($id = null)
    {
        if (!isset($id)) redirect('materi');
       
        $materi = $this->materi;
        $validation = $this->form_validation;
        $validation->set_rules($materi->rules());

        if ($validation->run()) {
             $data=array(
                "date"=>$_POST['date'],
                "title"=>$_POST['title'],
                "description"=>$_POST['description'],
                "id_program"=>$_POST['id_program'],
            );
            $materi->update($data, $this->input->post('id'));
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["materi"] = $materi->find($id);
        if (!$data["materi"]) show_404();
        
        $this->load->view("materi/tahsin/edit_tahsin", $data);
    }

    public function edit_tahfidz($id = null)
    {
        if (!isset($id)) redirect('materi');
       
        $materi = $this->materi;
        $validation = $this->form_validation;
        $validation->set_rules($materi->rules());

        if ($validation->run()) {
             $data=array(
                "date"=>$_POST['date'],
                "title"=>$_POST['title'],
                "description"=>$_POST['description'],
                "id_program"=>$_POST['id_program'],
            );
            $materi->update($data, $this->input->post('id'));
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["materi"] = $materi->find($id);
        if (!$data["materi"]) show_404();
        
        $this->load->view("jadwal/edit_tahfidz", $data);
    }

    public function edit_tilawah($id = null)
    {
        if (!isset($id)) redirect('materi');
       
        $materi = $this->materi;
        $validation = $this->form_validation;
        $validation->set_rules($materi->rules());

        if ($validation->run()) {
             $data=array(
                "date"=>$_POST['date'],
                "title"=>$_POST['title'],
                "description"=>$_POST['description'],
                "id_program"=>$_POST['id_program'],
            );
            $materi->update($data, $this->input->post('id'));
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["materi"] = $materi->find($id);
        if (!$data["materi"]) show_404();
        
        $this->load->view("jadwal/edit_tilawah", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->materi->delete($id)) {
            redirect(site_url('materi'));
        }
    }
 
    public function pdf($id_program)
	{		
		$this->load->library('pdf');
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// require_once APPPATH.'controllers/pdf/header.php';
		// $lm = $this->lm();

		$data =  $this->jadwal->db->join('program', 'program.id=schedule.id_program')->where('id_program', $id_program)->get('schedule')->result();
			//  ->order_by('transpro.id','desc');

			
		$pdf->AddPage('L', 'A3');
		$view = $this->load->view('jadwal/pdf',[
			'jadwal'=> $data,
		],true);

		$pdf->writeHTML($view);

		$pdf->Output('Jadwal_Program_'.date('d-m-Y').'.pdf', 'D');
	}

    public function download($id)
    {
        $data = $this->ujian->db->where('id',$id)->get('examquestion')->row();
        force_download('storage/materi/'.$data->file,NULL);
    }

    public function download1($id)
    {
        $data = $this->task->db->where('id',$id)->get('task')->row();
        force_download('storage/task/'.$data->file,NULL);
    }

    public function profil()
    {
        $data['user'] = $this->db->join('user_role', 'user_role.id=users.role_id')->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('user/profil', $data);
    }
}