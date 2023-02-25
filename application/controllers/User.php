
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    { 
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('User_model');
        $this->load->helper('url_helper');
        


    }
    public function index() 
    {
        $data['title'] = 'bpjs';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['tampil_bed'] = $this->User_model->get_all_bed();
        $data['tambah_bed'] = $this->db->get('tb_bed')->result_array();
        $data['updated_bed'] = $this->User_model->update_bed();
        $this->load->view('templates/user_header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/user_footer');
        
    }

 

 

 



    
    

}
