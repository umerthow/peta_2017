<?php

class Training_m extends  CI_model {


	public function get_view_training(){

		$this->db->select('*');
		$this->db->join('tpelatihan','tpelatihan.id_course=ttrans_pelatihan.id_course');
		$this->db->join('tref_kategori','tref_kategori.id_kategori=tpelatihan.id_kategori');
		$this->db->where('ttrans_pelatihan.status',0);
		$this->db->order_by('nama_pegawai','DSC');
		return $this->db->get('ttrans_pelatihan')->num_rows();
	}

		public function get_all_view_training(){


		$this->db->select('ttrans_pelatihan.NIP,ttrans_pelatihan.id_tp,ttrans_pelatihan.Nama_pegawai,tpelatihan.judul_course,tpelatihan.waktu_in,tpelatihan.waktu_out,ttrans_pelatihan.date,ttrans_pelatihan.status');
		$this->db->from('ttrans_pelatihan');
		$this->db->join('tpelatihan','tpelatihan.id_course=ttrans_pelatihan.id_course');
		$this->db->join('tref_kategori','tref_kategori.id_kategori=tpelatihan.id_kategori');
		$this->db->where('ttrans_pelatihan.status',0);
		$this->db->or_where('ttrans_pelatihan.status',5);
		$this->db->order_by('date','DESC');
		
		return $this->db->get_where()->result();
	
	}

	public function get_all_view_training_approved(){
		$this->db->select('ttrans_pelatihan.NIP,ttrans_pelatihan.id_tp,ttrans_pelatihan.Nama_pegawai,tpelatihan.judul_course,tpelatihan.waktu_in,tpelatihan.waktu_out,tpelatihan.kota_course,ttrans_pelatihan.date,ttrans_pelatihan.status');
		$this->db->from('ttrans_pelatihan');
		$this->db->join('tpelatihan','tpelatihan.id_course=ttrans_pelatihan.id_course');
		$this->db->join('tref_kategori','tref_kategori.id_kategori=tpelatihan.id_kategori');
		$this->db->where('ttrans_pelatihan.status',1);
		$this->db->order_by('nama_pegawai','DSC');
		
		return $this->db->get_where()->result();

	}

	public function get_all_view_training_rejected(){
		$this->db->select('ttrans_pelatihan.NIP,ttrans_pelatihan.id_tp,ttrans_pelatihan.Nama_pegawai,tpelatihan.judul_course,tpelatihan.waktu_in,tpelatihan.waktu_out,tpelatihan.kota_course,ttrans_pelatihan.date,ttrans_pelatihan.status');
		$this->db->from('ttrans_pelatihan');
		$this->db->join('tpelatihan','tpelatihan.id_course=ttrans_pelatihan.id_course');
		$this->db->join('tref_kategori','tref_kategori.id_kategori=tpelatihan.id_kategori');
		$this->db->where('ttrans_pelatihan.status',2);
		$this->db->order_by('nama_pegawai','DSC');
		
		return $this->db->get_where()->result();

	}

	public function get_all_view_month(){
		
		$this->db->select('ttrans_pelatihan.NIP,ttrans_pelatihan.id_tp,ttrans_pelatihan.Nama_pegawai,tpelatihan.judul_course,tpelatihan.waktu_in,tpelatihan.waktu_out,ttrans_pelatihan.date,ttrans_pelatihan.status');
		$this->db->from('ttrans_pelatihan');
		$this->db->join('tpelatihan','tpelatihan.id_course=ttrans_pelatihan.id_course');
		$this->db->join('tref_kategori','tref_kategori.id_kategori=tpelatihan.id_kategori');
		$this->db->where('ttrans_pelatihan.status',0);
		//$this->db->or_where('ttrans_pelatihan.status',5);
		$this->db->where('tpelatihan.waktu_in BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 60 DAY)');
		$this->db->order_by('date','DESC');
		
	
		
		return $this->db->get_where()->result();
	}

	public function get_detail_usul_course($id){

		$this->db->get('tview_trans_pelatihan');
		return $this->db->query("select * from tview_trans_pelatihan where id_tp=$id");

	}

	public function get_detail_usul_pddk($id){
		$this->db->get('tview_trans_pendidikan');
		return $this->db->query("select * from tview_trans_pendidikan where id_tpddk=$id");
	}

	public function get_detail_request_course($id){

		$this->db->get('trequest_info');
		return $this->db->query("select * from trequest_info as trf inner join tref_kategori as trk on trk.id_kategori=trf.id_kategori where id_request=$id");

	}


	public function get_view_request(){

		$this->db->select('*');
		$this->db->join('tref_kategori','tref_kategori.id_kategori=trequest_info.id_kategori');
		$this->db->where('trequest_info.status',0);
		$this->db->order_by('Nama_pegawai','DSC');
		return $this->db->get('trequest_info')->num_rows();
	}

	public function get_view_request_1(){

		$this->db->select('*');
		$this->db->join('tref_kategori','tref_kategori.id_kategori=trequest_info.id_kategori');
		$this->db->where('trequest_info.status',1);
		$this->db->order_by('Nama_pegawai','DSC');
		return $this->db->get('trequest_info')->num_rows();
	}



	public function get_all_view_training_request(){

		$this->db->select('*');
		$this->db->from('trequest_info');
		$this->db->join('tref_kategori','tref_kategori.id_kategori=trequest_info.id_kategori');
		$this->db->where('trequest_info.status',0);
		$this->db->where('date_request between CURDATE() - INTERVAL 30 DAY AND CURDATE()');
		$this->db->order_by('id_request','DESC');
		return $this->db->get_where()->result();
	
	}

	public function get_all_view_training_request_approved(){
		$this->db->select('*');
		$this->db->from('trequest_info');
		$this->db->join('tref_kategori','tref_kategori.id_kategori=trequest_info.id_kategori');
		$this->db->where('trequest_info.status',1);
		$this->db->order_by('Nama_pegawai','DSC');
		
		return $this->db->get_where()->result();

	}

	public function get_all_view_training_request_rejected(){
		$this->db->select('*');
		$this->db->from('trequest_info');
		$this->db->join('tref_kategori','tref_kategori.id_kategori=trequest_info.id_kategori');
		$this->db->where('trequest_info.status',2);
		$this->db->order_by('Nama_pegawai','DSC');
	
		return $this->db->get_where()->result();

	}

	public function get_list_doc_pelatihan($id){
		$this->db->select('*');
		$this->db->from('tlaporan');
		$this->db->where('tlaporan.id_tp',$id);
		return $this->db->get_where()->result_array();
	}


}

?>