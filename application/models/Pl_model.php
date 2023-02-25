<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pl_model extends CI_Model
{
    public function getPesanlayanan()
    {
        $query = $this->db->$this->db->get('layanan');
        return $this->db->query($query)->result();
    }
    public function getArtikel($idArtikel) 
    {
        $this->db->select("*");
        $this->db->where("id_artikel",$idArtikel);
        return $this->db->get('tb_artikel')->row();
    }
}
