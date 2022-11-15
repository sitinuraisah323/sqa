<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Admin extends CI_Controller 
{
    public function index()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        
        // echo "Selamat Datang User " . $data['user']['nama'];

        $this->load->view('admin/index', $data );
    }

    public function profil()
    {
        $data['user'] = $this->db->join('user_role', 'user_role.id=users.role_id')->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('user/profil', $data);
    }

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
    
    public function edit($id = null)
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
}