<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekretaris extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Login_model');
        $this->load->model('Sekretaris_model');

        if ($this->Login_model->is_role() != "3") {
            redirect('Auth');
        }
    }

    public function index()
    {
        $data['title'] = "Halaman Sekretaris";
        $data['user'] = $this->db->get_where('user', [
            'email' => $this
                ->session->userdata('email')
        ])->row_array();
        $this->load->view('templates/sekretaris_header', $data);
        $this->load->view('templates/sekretaris_sidebar', $data);
        $this->load->view('templates/sekretaris_topbar', $data);
        $this->load->view('sekretaris/index', $data);
        $this->load->view('templates/sekretaris_footer');
    }


    public function data_dokumen()
    {
        $data['title'] = "Halaman Sekretaris";
        $data['user'] = $this->db->get_where('user', [
            'email' => $this
                ->session->userdata('email')
        ])->row_array();
        $data['tambah_dokumen'] = $this->db->get('tb_dok_sekretaris')->result_array();
        $this->load->view('templates/sekretaris_header', $data);
        $this->load->view('templates/sekretaris_sidebar', $data);
        $this->load->view('templates/sekretaris_topbar', $data);
        $this->load->view('sekretaris/data_dokumen', $data);
        $this->load->view('templates/sekretaris_footer');

    }


    public function tambah_dokumen()
    {
        $config['upload_path'] = './assets/upload/pdf_sekretaris/';
        $config['allowed_types'] = 'pdf';
        $config['file_name'] = 'sekretaris_' . time();
        $config['encrypt_name'] = FALSE;
        $config['max_size'] = 1000;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('url_dokumen')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            return print_r($error);
        }

        $uploadData = $this->upload->data();
        // PDF TO IMAGE
        $im = new Imagick();

        $im->readImage($uploadData['full_path'] . '[0]');
        $im->setImageAlphaChannel(Imagick::VIRTUALPIXELMETHOD_WHITE);
        $im->thumbnailImage(256, 0); // <== ATUR UKURAN MAKSIMAL PREVIEW DISINI
        $im->setImageFormat('jpg');

        $im->writeImage($uploadData['file_path'] . $uploadData['raw_name'] . '_preview.jpg');
        //END OF PDF TO IMAGE

        $data = [
            'nomor_dok' => $this->input->post('nomor_dok'),
            'nama_dokumen' => $this->input->post('nama_dokumen'),
            'jenis_dokumen' => $this->input->post('jenis_dokumen'),
            'url_dokumen' => $this->upload->data("file_name"),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->db->insert('tb_dok_sekretaris', $data);
        redirect('sekretaris/data_dokumen');

    }

    public function delete_dok($id_dok_sekretaris)
    {
        $this->Sekretaris_model->hapusDok($id_dok_sekretaris);
        redirect('sekretaris/data_dokumen');
    }

    public function update_dokumen()
    {
        $id_dok_sekretaris = $this->input->post('id_dok_sekretaris');
        $data = [
            'nomor_dok' => $this->input->post('nomor_dok'),
            'nama_dokumen' => $this->input->post('nama_dokumen'),
            'jenis_dokumen' => $this->input->post('jenis_dokumen'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id_dok_sekretaris', $id_dok_sekretaris);

        $response = $this->db->update('tb_dok_sekretaris', $data);
        if (!$response) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi Kesalahan!</div>');
            return redirect('sekretaris/data_dokumen');
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">  Data berhasil diedit! </div>');
        redirect('sekretaris/data_dokumen');
    }


    function viewfile()
    {
        $fname = $this->uri->segment(3);
        $tofile = realpath("./assets/upload/pdf_sekretaris/" . $fname);
        header('Content-Type: application/pdf');
        readfile($tofile);
    }

    public function viewPdf($id_dok_sekretaris)
    {

        if (isset($_POST['view'])) {

            header("content-type: application/pdf");

            readfile('./assets/upload/pdf_sekretaris/' . $id_dok_sekretaris . '.pdf');

        }

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