<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{ 
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Admin_model');
        $this->load->model('Login_model');
       
        
       if($this->Login_model->is_role() != "1"){
            redirect("Auth");
        }

    }

    public function index()
    { 
        $data['title'] = "Halaman Admin";
        $data['user'] = $this->db->get_where('user', ['email' => $this
            ->session->userdata('email')])->row_array();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/admin_footer');
    }


public function role_user()
{
   $data['title'] = "Halaman Admin";
        $data['user'] = $this->db->get_where('user', ['email' => $this
            ->session->userdata('email')])->row_array();
        $data['tambah_role'] = $this->db->get('user_role')->result_array();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/role_user', $data);
        $this->load->view('templates/admin_footer'); 
}


public function tambah_role()
{
  $data =[
                'role' => $this->input->post('role'),
            ];

                $this->db->insert('user_role', $data);
                redirect('admin/role_user');

}

public function delete_role($id)
{
            $this->Admin_model->hapusRole($id);
            redirect('admin/role_user');
        }


    public function data_()
    {
        $data['title'] = "Halaman Admin";
        $data['user'] = $this->db->get_where('user', ['email' => $this
            ->session->userdata('email')])->row_array();
        $data['user_data']= $this->db->get('user')->result_array();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/data_user', $data);
        $this->load->view('templates/admin_footer');
    }


    public function data_user()
    {
        $data['title'] = "Halaman Admin";
        $data['user'] = $this->db->get_where('user', ['email' => $this
            ->session->userdata('email')])->row_array();
        $data['user_data']= $this->db->get('user')->result_array();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/data_user', $data);
        $this->load->view('templates/admin_footer');
    }
    public function tambah_user()
    {
       $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[user.email]',
            [
                'is_unique' => 'This email already registered'
            ]
        );
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[3]|matches[password2]',
            [
                'matches' => 'Password dont match',
                'min_length' => 'Password too short!'
            ]
        );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run()) {
            
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
                'role_id' => 1,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil ditambahkan  </div>');
            redirect('admin/data_user');
        
    }
}
    public function delete_user($id)
    {
        $this->Admin_model->hapusUser($id);
        redirect('admin/data_user');
        print_r($error);
    }
  
    
   
   

    
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->sess_destroy('email');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		You have been logged out!  </div>');
        redirect('auth');
    }
}
