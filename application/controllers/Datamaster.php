<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Datamaster extends CI_Controller 
{
    public function __construct()
	{
        parent::__construct();
        $this->load->model('UsersModel', 'user');
    }
    public function peserta()
    {
       $this->user->db
       ->select('*')
       ->from('users')
       ->join('user_role', 'user_role.id=users.role_id')
       ->where('user_role.role', 'Member');
       $data = $this->user->get()->result();
       
       echo json_encode(array(
           'data' => $data,
           'status' => true,
           'message' => "Data berhasil"
       ));
       
    }

    public function profil()
    {
        $data['user'] = $this->db->join('user_role', 'user_role.id=users.role_id')->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('user/profil', $data);
    }
}