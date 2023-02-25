<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model 
{
    public function __construct()
    {
    	$this->load->database();
    }
    
    public function hapusUser($id)
    {
        $this->db->delete('user', ['id' => $id]);
    }
     public function hapusBed($id_bed)
    {
         $this->db->delete('tb_bed', ['id_bed' => $id_bed]);
    }
    public function hapusRole($id)
    {
         $this->db->delete('user_role', ['id' => $id]);
    }
  
   

	
}