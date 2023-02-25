<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model 
{
    public function __construct()
    {
    	$this->load->database();
    }

    public function get_keyword($keyword)
    {

      if(empty($keyword))
       return array();

        $result = $this->db->like('nama_dokter', $keyword)
                 ->or_like('spesialis', $keyword)
                 ->get('tb_dokter');

        return $result->result();
    }
    
    public function get_artikel($id_artikel)
    {		
		$this->db->where('id_artikel', $id_artikel);
        $query = $this->db->get('tb_artikel');
        return $query->result_array();
		
    }
    public function get_berita($id_berita)
    {
        $this->db->where('id_berita', $id_berita);
        $query = $this->db->get('tb_berita');
        return $query->result_array();
    }

    public function get_all_bed()
    {
      $query = $this->db->get('tb_bed');
        return $query->result_array();   
    }
    public function total_kapasitas()
    {
        $this->db->where('id_bed', $id_bed);
        $query = $this->db->get('tb_bed');
        return $query->result_array();
    }
    public function update_bed()
    {
        
        $this->db->select_max('updated');
        $query = $this->db->get('tb_bed');
        return $query->result_array();
    }
    
   
}
