<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Jadwal extends CI_Controller 
{
    public function __construct()
	{
        parent::__construct();
		$this->load->model('JadwalModel','jadwal');
          $this->load->library('form_validation');

          if ($this->session->userdata('email') == NULL) {

            redirect('auth');
        }
    }
    
     public function index()
    {
        $data['tahsin'] = $this->jadwal->db->where('id_program',1)->get('schedule')->result();
        $data['tahfidz'] = $this->jadwal->db->where('id_program',2)->get('schedule')->result();
        $data['tilawah'] = $this->jadwal->db->where('id_program',3)->get('schedule')->result();
        //  $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        
        // // echo "Selamat Datang User " . $data['user']['nama'];

        // $this->load->view('admin/index', $data );
        // $model = new JadwalModel();
        // $data['product']  = $model->getProduct()->getResult();
        // $data['category'] = $model->getCategory()->getResult();
        return $this->load->view('jadwal/index', $data);
    }

    // public function index(){
    //     $data=array(
    //         "content"=>'Tampil_Modal',
    //         "all"=>$this->db->get('t_mod')->result(),
    //         "judul"=>"Modal",
    //     );
 
    //     $this->load->view('Template',$data);
    // }
 
    public function add()
    {
        $jadwal = $this->jadwal;
        $validation = $this->form_validation;
        $validation->set_rules($jadwal->rules());

        if ($validation->run()) {
            // $jadwal->save();
            $data=array(
                "time"=>$_POST['time'],
                "date"=>$_POST['date'],
                "venue"=>$_POST['venue'],
                "description"=>$_POST['description'],
                "id_program"=>$_POST['id_program'],
            );
            $this->db->insert('schedule',$data);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            // return redirect('Jadwal');

        }
        $this->load->view("jadwal/add");
        
    }
    
    public function add_tahfidz()
    {
        $jadwal = $this->jadwal;
        $validation = $this->form_validation;
        $validation->set_rules($jadwal->rules());

        if ($validation->run()) {
            // $jadwal->save();
            $data=array(
                "time"=>$_POST['time'],
                "date"=>$_POST['date'],
                "venue"=>$_POST['venue'],
                "description"=>$_POST['description'],
                "id_program"=>$_POST['id_program'],
            );
            $this->db->insert('schedule',$data);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            // return redirect('Jadwal');

        }
        $this->load->view("jadwal/add_tahfidz");
        
    }

    public function add_tilawah()
    {
        $jadwal = $this->jadwal;
        $validation = $this->form_validation;
        $validation->set_rules($jadwal->rules());

        if ($validation->run()) {
            // $jadwal->save();
            $data=array(
                "time"=>$_POST['time'],
                "date"=>$_POST['date'],
                "venue"=>$_POST['venue'],
                "description"=>$_POST['description'],
                "id_program"=>$_POST['id_program'],
            );
            $this->db->insert('schedule',$data);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            // return redirect('Jadwal');

        }
        $this->load->view("jadwal/add_tilawah");
        
    }
  public function edit_tahsin($id = null)
    {
        if (!isset($id)) redirect('jadwal');
       
        $jadwal = $this->jadwal;
        $validation = $this->form_validation;
        $validation->set_rules($jadwal->rules());

        if ($validation->run()) {
             $data=array(
                "time"=>$_POST['time'],
                "date"=>$_POST['date'],
                "venue"=>$_POST['venue'],
                "description"=>$_POST['description'],
                "id_program"=>$_POST['id_program'],
            );
            $jadwal->update($data, $this->input->post('id'));
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["jadwal"] = $jadwal->find($id);
        if (!$data["jadwal"]) show_404();
        
        $this->load->view("jadwal/edit_tahsin", $data);
    }

    public function edit_tahfidz($id = null)
    {
        if (!isset($id)) redirect('jadwal');
       
        $jadwal = $this->jadwal;
        $validation = $this->form_validation;
        $validation->set_rules($jadwal->rules());

        if ($validation->run()) {
             $data=array(
                "time"=>$_POST['time'],
                "date"=>$_POST['date'],
                "venue"=>$_POST['venue'],
                "description"=>$_POST['description'],
                "id_program"=>$_POST['id_program'],
            );
            $jadwal->update($data, $this->input->post('id'));
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["jadwal"] = $jadwal->find($id);
        if (!$data["jadwal"]) show_404();
        
        $this->load->view("jadwal/edit_tahfidz", $data);
    }

    public function edit_tilawah($id = null)
    {
        if (!isset($id)) redirect('jadwal');
       
        $jadwal = $this->jadwal;
        $validation = $this->form_validation;
        $validation->set_rules($jadwal->rules());

        if ($validation->run()) {
             $data=array(
                "time"=>$_POST['time'],
                "date"=>$_POST['date'],
                "venue"=>$_POST['venue'],
                "description"=>$_POST['description'],
                "id_program"=>$_POST['id_program'],
            );
            $jadwal->update($data, $this->input->post('id'));
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["jadwal"] = $jadwal->find($id);
        if (!$data["jadwal"]) show_404();
        
        $this->load->view("jadwal/edit_tilawah", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->jadwal->delete($id)) {
            redirect(site_url('jadwal'));
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
}