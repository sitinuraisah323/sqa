<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Mentor extends CI_Controller 
{
    public function __construct()
	{
        parent::__construct();
        $this->load->model('UsersModel', 'users');
        $this->load->model('RoleModel', 'role');
        $this->load->library('form_validation');

        if ($this->session->userdata('email') == NULL) {

            redirect('auth');
        }

    }


    // public function index()
    // {
    //     $data["products"] = $this->product_model->getAll();
    //     $this->load->view("admin/product/list", $data);
    // }
     public function index()
    {
        // if($_POST['search']){
        //     $data['users'] = $this->users->search($_POST['search']);
        // }else{
            $data['users'] = $this->users->get_mentor();
        // }
        
        $this->load->view('datamaster/mentor/index',$data);
    }

    public function add()
    {
       $users = $this->users;
        $validation = $this->form_validation;
        $validation->set_rules($users->rules());

        if ($validation->run()) {
			
                $data = [
                'nama'=> htmlspecialchars($_POST['nama'],true),
                'email'=> htmlspecialchars($_POST['email'], true),
                'image'=> 'default.jpg',
                'password'=> password_hash($_POST['password'], PASSWORD_DEFAULT),
                'role_id'=>$_POST['role_id'],
                'is_active' => 1,
                'date_created'=>time()
            ];

            $this->db->insert('users',$data);
            $message = $this->session->set_flashdata('success', 'Data Success di Tambahkan');
            $data['users'] = $this->users->get_mentor();
            $this->load->view("datamaster/mentor/index", $data);
            
        }

        if(! $_POST){
        $this->load->view("datamaster/mentor/add");
        }
        
    }

    public function edit($id)
    {

        if (!isset($id)) redirect('mentor');
       
        $users = $this->users;
        $validation = $this->form_validation;
        $validation->set_rules($users->rules());

        if ($validation->run()) {

            if($_POST['password'] == ''){
					unset($_POST['password']);
				}else{
					$data['password'] = password_hash(	$_POST['password'],PASSWORD_DEFAULT);
				}
             $data = [
                'nama'=> htmlspecialchars($_POST['nama'],true),
                'email'=> htmlspecialchars($_POST['email'], true),
                'image'=> 'default.jpg',
                'password'=> password_hash($_POST['password'], PASSWORD_DEFAULT),
                'role_id'=>$_POST['role_id'],
                'is_active' => 1,
                'date_created'=>time()
            ];
               
            $users->update($data, $this->input->post('id'));
            $message = $this->session->set_flashdata('success', 'Data Success di Update');
             $data['users'] = $this->users->get_mentor();
            $this->load->view("datamaster/mentor/index", $data);
               
        }

        $peserta = $users->find($id);
        $role = $this->role->get_role();
        if (!$peserta) show_404();
        $this->load->view("datamaster/mentor/edit", array(
                    'peserta' =>$peserta,
                    'role' => $role,
                ));
        
    }
 public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->users->delete($id)) {
            redirect(site_url('mentor'));
        }
    }
 
    public function pdf()
	{		
		$this->load->library('pdf');
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// require_once APPPATH.'controllers/pdf/header.php';
		// $lm = $this->lm();

		$data =  $this->users->get_mentor();
			
		$pdf->AddPage('L', 'A3');
		$view = $this->load->view('datamaster/mentor/pdf',[
			'peserta'=> $data,
		],true);

		$pdf->writeHTML($view);

		$pdf->Output('Daftar Mentor'.date('d-m-Y').'.pdf', 'D');
	}

    public function excel()
	{		

		$this->load->library('PHPExcel');

		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("O'nur")
		       		->setLastModifiedBy("O'nur")
		      		->setTitle("Reports")
		       		->setSubject("Widams")
		       		->setDescription("widams report ")
		       		->setKeywords("phpExcel")
					->setCategory("well Data");		
	
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->getColumnDimension('A');
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'No');
		$objPHPExcel->getActiveSheet()->getColumnDimension('B');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Nama');
		$objPHPExcel->getActiveSheet()->getColumnDimension('C');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Email');
		$objPHPExcel->getActiveSheet()->getColumnDimension('D');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Status');
		
	        $satu = 0;
	        $dua = 0;
			$date = date('Y-m-d');
				
        $data =  $this->users->get_mentor();
		
		$no=2;
		
		//$currdate = new DateTime($currdate); 

		foreach ($data as $row) 
		{
			
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$no, $no-1);	
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$no, $row->nama);	
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$no, $row->email);				  	
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$no, $row->role);	
			$no++;
		}

		//Redirect output to a client’s WBE browser (Excel5)
		$filename ="Daftar Mentor".date('Y-m-d H:i:s');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');

	}
}