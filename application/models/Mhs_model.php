<?php

class Mhs_model extends CI_Model
{
    public function getMhs($nrp)
    {
        $this->db->select('*, nama as text');
        $this->db->like('nrp',$nrp);
        return $this->db->get('mhs')->result_array();
    }
}
