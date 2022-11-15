<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Tahsin extends CI_Controller 
{
    public function __construct()
	{
        parent::__construct();
		$this->load->model('MateriModel','materi');
        $this->load->model('TaskModel','task');
          $this->load->library('form_validation');
          $this->load->helper(array('url','download'));	

          if ($this->session->userdata('email') == NULL) {

            redirect('auth');
        }
    }
   
    public function index()
    {
        $data['tahsin'] = $this->materi->db->where('id_program',1)->get('materi')->result();
        // $role = $this->session->userdata('role_id');
        // // echo "Selamat Datang User " . $data['user']['nama'];
        // if ($role == 2) {
        //     $this->load->view('program/index', $data );
        // }else{
            $this->load->view('nilai/tahsin/index', $data );
        // }
    }

    public function valueList()
    {
        $postData = $this->input->post();
        // var_dump($postData);exit;
    // Get data
    $data = $this->task->getEmployeesTahsin($postData);
// var_dump($data['data']); exit;
    echo json_encode($data);
    }
    

    public function add()
    {
        $materi = $this->materi;
        $validation = $this->form_validation;
        $validation->set_rules($materi->rules());

        if ($validation->run()) {
			
                $data=array(
                    "date"=>$_POST['date'],
                    "title"=>$_POST['title'],
                    "description"=>$_POST['description'],
                    "task"=>$_POST['task'],
                    // 'file' =>  $this->upload->data("file"),
                    "id_program"=>$_POST['id_program'],
                );

                if($_FILES['file']['name']){
					$config['upload_path']          = 'storage/materi/';
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

                $this->db->insert('materi',$data);
                $message = $this->session->set_flashdata('success', 'Data Success Di tambahkan');
                
                $data = $this->materi->db->where('id_program',1)->get('materi')->result();
                $this->load->view("materi/tahsin/index", array(
                    'tahsin' =>$data,
                    'message' => $message
                ));
            
            
        }
        if(! $_POST){
        $this->load->view("materi/tahsin/add");
        }
        
    }
    
  public function edit($id = null)
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
                    "task"=>$_POST['task'],
                    // 'file' =>  $this->upload->data("file"),
                    "id_program"=>$_POST['id_program'],
                );

                if($_FILES['file']['name']){
					$config['upload_path']          = 'storage/materi/';
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

            //  $data=array(
            //     "date"=>$_POST['date'],
            //     "title"=>$_POST['title'],
            //     "description"=>$_POST['description'],
            //     "id_program"=>$_POST['id_program'],
            // );
            $materi->update($data, $this->input->post('id'));
            $message = $this->session->set_flashdata('success', 'Data Success di Update');
            $data = $this->materi->db->where('id_program',1)->get('materi')->result();
            $this->load->view("materi/tahsin/index", array(
                    'tahsin' =>$data,
                    'message' => $message
                ));
        }

        $data["materi"] = $materi->find($id);
        if (!$data["materi"]) show_404();
        
        $this->load->view("materi/tahsin/edit", $data);
    }

    public function delete($id)
    {
        if (!isset($id)) show_404();
        
        if ($this->materi->delete($id)) {
            // $message = $this->session->set_flashdata('success', 'Data Success di Hapus');
            redirect(site_url('materi/tahsin', ));
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

    // public function download($id)
    // {
    //     $data = $this->materi->db->where('id',$id)->get('materi')->row();
    //     force_download('storage/materi/'.$data->file,NULL);
    // }

    public function profil()
    {
        $data['user'] = $this->db->join('user_role', 'user_role.id=users.role_id')->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('user/profil', $data);
    }
}