<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class DetailMateriAdmin extends CI_Controller 
{
    public function __construct()
	{
        parent::__construct();
		$this->load->model('MateriModel','materi');
          $this->load->library('form_validation');
          $this->load->helper(array('url','download'));	
          $this->load->model('TaskModel','task');
          $this->load->model('AssessmentModel', 'assessment');

          if ($this->session->userdata('email') == NULL) {

            redirect('auth');
        }
    }
    public function index($id)
    {
        $data['tahsin'] = $this->materi->db->where('id',$id)->get('materi')->result();
        $data['task'] = $this->task->db->select('users.*, task.*, task.id as id_task')->join('users', 'users.id=task.id_user')->where('id_materi',$id)->get('task')->result();
        
        $this->load->view('DetailMateriAdmin/index', $data );
    }

    function add(){
        $data['taskValue']=$this->input->post('nilai');
        $data['id_task']=$this->input->post('id_task');
        $data['id_materi']=$this->input->post('id_materi');       
        $data['id_program']=$this->input->post('id_program');
        $data['id_user']=$this->input->post('id_user');

        $id_task=$this->input->post('id_task');
                // var_dump($data);exit;

        $assessment = $this->assessment;
        $tasks = $this->task;
        $validation = $this->form_validation;
        $validation->set_rules($assessment->rules());
         
                $task = $this->task->db->where('id',$id_task)->get('task')->result();
                foreach($task as $task){
                    $dataTask['date']=$task->date;       
                    $dataTask['answer']=$task->answer;
                    $dataTask['file']=$task->file;
                    $dataTask['id_materi']=$task->id_materi;       
                    $dataTask['id_program']=$task->id_program;
                    $dataTask['id_user']=$task->id_user;
                    $dataTask['taskValue']=$this->input->post('nilai');
                    $dataTask['status']='1';
                }
                $tasks->update($dataTask, $task->id);

                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible col-md-4 mx-auto fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button> <strong> Success Memberi Nilai</strong> </div>');

                $data['tahsin'] = $this->materi->db->where('id',$data['id_materi'])->get('materi')->result();
                $data['task'] = $this->task->db->select('users.*, task.*, task.id as id_task')->join('users', 'users.id=task.id_user')->where('id_materi',$data['id_materi'])->get('task')->result();
        
            $this->load->view('detailMateriAdmin/index', $data );
        // }
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
        $data = $this->materi->db->where('id',$id)->get('materi')->row();
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