<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Program extends CI_Controller 
{

    public function __construct()
	{
        parent::__construct();
		$this->load->model('UserProgramModel','userProgram');
        $this->load->model('ProgramModel','program');
          $this->load->library('form_validation');

          if ($this->session->userdata('email') == NULL) {

            redirect('auth');
        }
    }

    public function index()
    {
        $this->load->view('program/index');
    }

    public function add($id)
    {
        // $users = $this->users;
            $program = $this->program;
            $programs = $program->find($id);
            // echo $programs->nama; exit;
            $data=array(
                "user_id"=>$this->session->userdata('id'),
                "program_id"=>$id,
                
            );
            $program = array(
                "program_id"=>$id,
                'program' => $programs->nama
            );
            // var_dump($data['user_id']); exit;
            $this->session->set_userdata($program);
            // var_dump($this->session->userdata()); exit;

            $userProgram = $this->userProgram->db->where('user_id', $data['user_id'])->where('status', 'ACTIVE')->get('user_program')->result();
                    // var_dump($userProgram); exit;
    
            if($userProgram == NULL){
                $this->db->insert('user_program',$data);
                
                $this->session->set_flashdata('success', "<div class='alert alert-success alert-dismissible col-md-4 mx-auto fade show'>
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                                        </button> <strong>Selamat Anda sudah Terdaftar di program $programs->nama !</strong> </div>");
                return redirect('Jadwal');
            }else{

                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible col-md-4 mx-auto fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button> <strong>Anda Sudah Mengikuti Salah Satu Program SQA !</strong> </div>');
            redirect('program');
            }
            

        // }

        // $this->load->view("jadwal");
        
    }
}

