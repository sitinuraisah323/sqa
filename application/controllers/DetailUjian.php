<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class DetailUjian extends CI_Controller 
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
        $data['tahsin'] = $this->ujian->db->where('id',$id)->get('examquestion ')->result();
        $data['task'] = $this->exam->db->where('id_examquestion',$id)->where('id_user',$this->session->userdata('id'))->get('exam')->result();
        
        $this->load->view('detailUjian/index', $data );
    }

    public function add($id)
    {
        $exam = $this->exam;
        $validation = $this->form_validation;
        $validation->set_rules($exam->rules());

        // if ($validation->run()) {
			
                $data=array(
                    "date"=>$_POST['date'],
                    "answer"=>$_POST['answer'],
                    "id_examquestion"=>$_POST['id_materi'],
                    "id_program"=>$_POST['id_program'],
                    // 'file' =>  $this->upload->data("file"),
                    "id_user"=>$_POST['id_user'],
                );

                if($_FILES['file']['name']){
					$config['upload_path']          = 'storage/task/';
					$config['allowed_types']        = 'jpg|png|jpeg|pdf|doc|docs|xls|docx|xlsx|mp3|wma';
                    $config['max_size']  = '2048';
                    // $config['remove_space'] = TRUE;

					if(!is_dir($config['upload_path'])){
						mkdir($config['upload_path'],0777, true);
					}
					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload('file'))
					{
						$error = array('error' => $this->upload->display_errors());

						return $this->sendMessage(false, $error['error'],500);
					}
					else
					{
						$data['file'] = $this->upload->data('file_name');
					}
				}

                // var_dump($data); exit;
                $this->db->insert('exam',$data);
                $this->session->set_flashdata('success', 'Berhasil disimpan');
                
                 $data['tahsin'] = $this->ujian->db->where('id',$_POST['id_materi'])->get('examquestion')->result();
               $data['task'] = $this->exam->db->where('id_examquestion',$_POST['id_materi'])->where('id_user',$this->session->userdata('id'))->get('exam')->result();
        
            $this->load->view('detailUjian/index', $data );
            // $this->load->view("DetailMateri/index");
            
            
        // }
                // echo 'yes'; exit;

        // $data['tahsin'] = $this->materi->db->where('id',$id)->get('materi')->result();
        // $data['task'] = $this->task->db->where('id_materi',$_POST['id_materi'])->where('id_user',$this->session->userdata('id'))->get('task')->result();

        // $this->load->view('detailMateri/index', $data );
        
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