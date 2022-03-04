<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_data extends CI_Model {
 	

	public function jumlah_data(){
		return $this->db->get('t_pengaduan')->num_rows();
	}

	public function get_pengaduan($number,$offset)
	{
		$query = $this->db->get('t_pengaduan',$number,$offset);
		return $query->result_array();
	}

    public function get_hubungikami($number,$offset)
    {
        $query = $this->db->get('t_contact_us',$number,$offset);
        return $query->result_array();
    }

    public function jumlah_databerita(){
		return $this->db->get('t_berita')->num_rows();
	}

    public function get_berita($number,$offset)
    {
        $query = $this->db->get('t_berita',$number,$offset);
        return $query->result_array();
    }
    
}   