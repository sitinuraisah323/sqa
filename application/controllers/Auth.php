<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->library('session');

    }
    public function index()
 {
    if($this->session->userdata('email')){
        redirect('Users');
    }
     $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
     $this->form_validation->set_rules('password', 'Password', 'trim|required');
     if ($this->form_validation->run() == false) {
        $this->load->view( 'auth/login' );
     }else{
         $this->_login();
     }
    }

    private function _login()
{
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    
    $user = $this->db->select('users.*, user_role.*, users.id as user_id')->join('user_role','user_role.id = users.role_id')->get_where('users', ['email' => $email])->row_array();
    $program = $this->db->join('program', 'program.id=user_program.program_id')->get_where('user_program', ['user_id'=> $user['user_id']], ['status'=> 'ACTIVE'] )->row_array();

    // var_dump($userProgram); exit;
    $tahsin = $this->db->get_where('user_program', ['user_id' => $user['id'], 'program_id' => 1 ])
    ->row_array();
    $tahfidz = $this->db->get_where('user_program', ['user_id' => $user['id'], 'program_id' => 2 ])
    ->row_array();
    $tilawah = $this->db->get_where('user_program', ['user_id' => $user['id'], 'program_id' => 3 ])
    ->row_array();

    $id = $user['id'];
    if ($user) {
        //jika user active
        if ($user['is_active']==1) {
            //cek password
            if (password_verify($password, $user['password'])) {
                    //  (select program_id from user_program where user_program.user_id = $id and user_program.status='ACTIVE') as  program_id

                $data= [
                    'email'=> $user['email'],
                    'role_id'=> $user['role_id'],
                    'id' => $user['user_id'],
                    'nama' => $user['nama'],
                    'role' => $user['role'],   
                    
                ];
                if($program){
                    $data['program'] = $program['nama'];
                    $data['program_id'] = $program['program_id'];
                }
                if($tahsin){
                    $data['tahsin'] = $tahsin['program_id'];
                }else{
                    $data['tahsin'] = 0;
                }
                if($tahfidz){
                    $data['tahfidz'] = $tahfidz['program_id'];
                }else{
                    $data['tahfidz'] = 0;
                }
                if($tilawah){
                    $data['tilawah'] = $tilawah['program_id'];
                }else{
                    $data['tilawah'] = 0;
                }
                // foreach($user_program as $program){
                //     $data['program'];
                // }
                // var_dump($data); exit;
                $this->session->set_userdata($data);
                
            //     session()->set(array(
            //         'user'  => $data,
            //         'logged_in' => true,
            //         // 'privileges'    => $privileges,
            // // 'notifications' => $notifications,
            //     ));
                redirect('users');
            }else{
                 $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible col-md-4 mx-auto fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button> <strong>Password anda Salah !</strong> </div>');
            redirect('auth');
            }
            
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible col-md-4 mx-auto fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button> <strong>Akun anda belum di Aktivasi !</strong> Segera Aktivasi dengan menghubungi admin SQAkhwat.</div>');
            redirect('auth');
        }
        
        
    }else{
         $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible col-md-4 mx-auto fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button> <strong>Maaf Email anda belum terdaftar !</strong> Segera lakukan pendaftaran atau gunakan email yang sudah terdaftar.</div>');
            redirect('auth');
    }
}
    
    public function register()
 {
     $this->form_validation->set_rules('name', 'Name', 'required|trim');
     $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]',[
         'is_unique'=> 'Email Anda Sudah Terdaftar '
     ]);
     $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[7]|matches[password1]', [
         'min_length'=>'Password Anda Terlalu Pendek',
     ]);
     $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password]',[
         'matches'=>'Konfirmasi Password Anda Salah !!!'
     ]);

     if($this->form_validation->run() == false){
        $this->load->view( 'auth/register' );
     }else{
            $data = [
                'nama'=> htmlspecialchars($this->input->post('name',true)),
                'email'=> htmlspecialchars($this->input->post('email', true)),
                'image'=> 'default.jpg',
                'password'=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id'=>2,
                'is_active' => 1,
                'date_created'=>time()
            ];
            
            $this->db->insert('users', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible col-md-4 mx-auto fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button> <strong>Registrasi anda Berhasil !</strong> Segera Login dengan Akun anda.</div>');
            redirect('auth');
    }
    
}
    
    public function logout()
    {
        // $this->session->unset_userdata('email');
        // $this->session->unset_userdata('role_id');
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible col-md-4 mx-auto fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button> <strong>Anda Sudah Logout!</strong> Segera Login dengan Akun anda.</div>');
            redirect('auth');
    }
    

}