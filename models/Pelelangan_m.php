<?php 

class Pelelangan_m extends CI_Model {

	public function insert($data){
		return $this->db->insert('tlelang',$data);

	}

	public function get_data_lelang(){

		$this->db->select('*');
		$this->db->from('tlelang');
		$this->db->join('tref_kategori','tref_kategori.id_kategori = tlelang.id_kategori');
		$this->db->order_by('date_publish','DESC');
		return $this->db->get()->result();	 
			}

	public function detail_pelelangan($id){

		return $this->db->query("select * from tlelang where id_lelang =$id");

	}

	public function update_lelang($data,$id){
		 $this->db->update('tlelang',$data,$id);
	}

	public function delete_lelang($id){
		$this->db->where('id_lelang', $id);
		$this->db->delete('tlelang');
	}


	public function daftarkan($data){
		return $this->db->insert('ttrans_lelang',$data);
	}

	public function get_total_rows(){

		$this->db->select('*');
		$this->db->join('tprovider','tprovider.id_provider = ttrans_lelang.id_provider');
		$this->db->join('tlelang','tlelang.id_lelang = ttrans_lelang.id_lelang');
		$this->db->order_by('ttrans_lelang.date','DESC');
		return $this->db->get('ttrans_lelang')->num_rows();
	}
	public function get_all_total_rows($limit,$offset){

		$this->db->select('*');
		$this->db->from('ttrans_lelang');
		$this->db->join('tprovider','tprovider.id_provider = ttrans_lelang.id_provider');
		$this->db->join('tlelang','tlelang.id_lelang = ttrans_lelang.id_lelang');
		$this->db->where('ttrans_lelang.status',0);
		$this->db->order_by('ttrans_lelang.date','DESC');
		$this->db->limit($limit,$offset);
		return $this->db->get_where()->result();
	}

	public function get_total_rows_approved(){

		$this->db->select('*');
		$this->db->from('ttrans_lelang');
		$this->db->join('tprovider','tprovider.id_provider = ttrans_lelang.id_provider');
		$this->db->join('tlelang','tlelang.id_lelang = ttrans_lelang.id_lelang');
		$this->db->where('ttrans_lelang.status',1);
		$this->db->order_by('ttrans_lelang.date','DESC');
		return $this->db->get_where()->result();
	}

	public function get_total_rows_rejected(){

		$this->db->select('*');
		$this->db->from('ttrans_lelang');
		$this->db->join('tprovider','tprovider.id_provider = ttrans_lelang.id_provider');
		$this->db->join('tlelang','tlelang.id_lelang = ttrans_lelang.id_lelang');
		$this->db->where('ttrans_lelang.status',2);
		$this->db->order_by('ttrans_lelang.date','DESC');
		return $this->db->get_where()->result();
	}

	public function detail_trasaction($id){
		return $this->db->query("SELECT * FROM ttrans_lelang AS ttl INNER JOIN tprovider AS tpv ON tpv.id_provider = ttl.id_provider INNER JOIN tlelang AS tle ON tle.id_lelang = ttl.id_lelang where ttl.noid=$id");
	}
	public function detail_trasaction_prv($filter,$id){
		return $this->db->query("SELECT * FROM ttrans_lelang  where id_lelang=$id and id_provider='$filter' ");
	}

	public function get_by_lelang_prov($id_lelang,$id_provider){
		$cek_trasaksi =  $this->db->get_where('ttrans_lelang',

			array(	'id_lelang'=> $id_lelang,
						'id_provider'=> $id_provider
						
						))->row();

			return $cek_trasaksi;
	}

	public function approved_lelang($id,$aprv){
		 $this->db->set("status",$aprv);
   			
   			 $this->db->where('noid',$id);
   			 $this->db->update("ttrans_lelang");

	}
	public function rejected_lelang($id,$aprv){
		 $this->db->set("status",$aprv);
   			
   			 $this->db->where('noid',$id);
   			 $this->db->update("ttrans_lelang");

	}
	public function get_status($id,$filter){
		$this->db->select('*');
		$this->db->from('ttrans_lelang');
		$this->db->join('tprovider','tprovider.id_provider = ttrans_lelang.id_provider');
		$this->db->where('id_lelang',$id);
		$this->db->where('kode_user',$filter);
		return $this->db->get_where()->row();
	}

	public function get_lelang($filter){
		$this->db->select('tll.judul,trll.date,trll.status');
		$this->db->from('ttrans_lelang trll');
		$this->db->join('tlelang tll','tll.id_lelang = trll.id_lelang');
		$this->db->where('trll.kode_user',$filter);
		return $this->db->get_where()->result();

	}

	public function save_comment($data){
		$this->db->insert('taanjz_comment',$data);

	}
	public function get_comment_anj($id){

	return $this->db->query("Select * from taanjz_comment where id_lelang = $id order by date DESC");	
	}


}


?>
