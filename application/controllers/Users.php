<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Users extends CI_Controller 
{
    public function index()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $role = $this->session->userdata('role_id');
        // var_dump($this->session->userdata()); exit;
        // echo "Selamat Datang User " . $data['user']['nama'];
        // if ($role == 2) {
        //     $this->load->view('program/index', $data );
        // }else{
            $this->load->view('user/index', $data );
        // }
    }

    public function profil()
    {
        $data['user'] = $this->db->join('user_role', 'user_role.id=users.role_id')->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('user/profil', $data);
    }
}