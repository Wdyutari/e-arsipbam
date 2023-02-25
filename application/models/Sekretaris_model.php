<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekretaris_model extends CI_Model 
{
    public function __construct()
    {
    	$this->load->database();
    }
    
    public function hapusUser($id)
    {
        $this->db->delete('user', ['id' => $id]);
    }
     public function hapusDok($id_dok_sekretaris)
    {
         $this->db->delete('tb_dok_sekretaris', ['id_dok_sekretaris' => $id_dok_sekretaris]);
    }
  
   

	
}