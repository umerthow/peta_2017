<?php

class Buku_m extends CI_model {
	
	public function get_all(){
		
		$this->db->select('sb.*,kb.nama_kategori as kategori  ');
		$this->db->from('project_umar_stokbuku sb');
		$this->db->join('project_umar_kategoribuku kb','kb.kategori_id = sb.kategori_id');
		
		return $this->db->get()->result();
	
	
		
	}
	
	public function get_kategori(){
		
		return $this->db->get('project_umar_kategoribuku')->result();
	}
	
	
}



?>