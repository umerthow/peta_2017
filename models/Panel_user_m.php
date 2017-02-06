<?php

class Panel_user_m extends CI_Model {

public function __destruct() {  

}  

	public function get_by_username_password($username, $password) {

			//$this->forum  = new MySQLi('202.137.4.184', 'root', 'HCIS4perumnas01', 'hcis_perumnas', 0, '/var/run/mysqld/mysqld.sock');
			if ($this->forum = $this->load->database("forum",TRUE))   

			
     		//print_r($db['forum']);
  
			$this->forum->reconnect();
			$user =  $this->forum->get_where('tuser',
		
				array(
						'user'=>$username,
						'pass'=>md5($password),
						)
						
					)->row();
					return $user;
	}

	public function get_by_username_password_auth($username, $password){

		if ($this->forum = $this->load->database("forum",TRUE))   

			
     		//print_r($db['forum']);
  
			$this->forum->reconnect();
			$user =  $this->forum->get_where('tuser',
		
				array(
						'user'=>$username,
						'pass'=>$password,
						)
						
					)->row();
					return $user;

	}


	public function get_by_user($filter){

		$this->forum = $this->load->database("forum",TRUE);

	     return	$this->forum->query("SELECT tp.ID_Pegawai,tus.group,tp.nip, tp.nama_lengkap ,tru.nama_unor, trj.nama_jab FROM tpegawai AS tp
							JOIN tuser AS tus ON tp.NIP=tus.NIP
							JOIN tref_jabatan AS trj ON tp.kode_jab= trj.kode_jab
							JOIN tref_unor AS tru ON tp.kode_unor = tru.kode_unor
							WHERE tp.nip=$filter
							GROUP BY tp.NIP"); 
		
		//return $this->forum->get()->result();
 		}

 		
	public function get_kompetensi($milik){
 		$this->forum = $this->load->database("forum",TRUE);
 	return $this->forum->query("SELECT trk.`ID_KOMPETENSI`,trk.`NAMA_KOMPETENSI`
								FROM tref_kompetensi  AS trk
								WHERE  trk.`ID_KATEGORI_KOMPETENSI`=1 GROUP BY trk.NAMA_KOMPETENSI" )->result();

 	}


 	public function get_atasan(){
 		$this->forum = $this->load->database("forum",TRUE);
 		  return	$this->forum->query("SELECT tp.NIP,tp.nama_lengkap FROM tpegawai AS tp
							
							WHERE kode_dupeg=1
							GROUP BY tp.NIP"); 


 	}
	public function registration($data){

		$this->db->insert('ttrans_pelatihan',$data);

	}

	public function registration_pddk($data){

		$this->db->insert('ttrans_pddk',$data);

	}

	public function get_by_nip_course($id_course,$nip){

		$user =  $this->db->get_where('ttrans_pelatihan',

			array(	'NIP'=> $nip,
						'id_course'=> $id_course
						
						))->row();

			return $user;

	}

	public function get_by_nip_pnddk($id_course,$nip){
		$user =  $this->db->get_where('ttrans_pddk',

			array(	'NIP'=> $nip,
						'id_course'=> $id_course
						
						))->row();

			return $user;

	}


         
        public function get_survey($nip){
		 $this->db->select('*');
		 $this->db->from('ttrans_pelatihan as ttrs');
		 $this->db->where('ttrs.NIP',$nip);
		 $this->db->where('ttrs.status_evaluasi_1','0');
		 $this->db->order_by('ttrs.date','DESC');
		 return $this->db->get_where('')->result();
	}

	public function polling_m($table,$vote){

		$this->db->query("UPDATE $table SET vote =vote + 1 where id_kategori=$vote");
	 	
	}

	public function comment_save($data){
		$this->db->insert('tcomment',$data);
	}

	public function get_all_comment(){
		$this->db->select('*');
		$this->db->from('tcomment');
		$this->db->limit(10);
		$this->db->order_by('date','DESC');
		return $this->db->get_where()->result();

	}

	public function get_pencarian($kata_kunci){

		$this->db->select('*');
		$this->db->from('tpelatihan');
		$this->db->join('tref_kategori','tref_kategori.id_kategori = tpelatihan.id_kategori');
		$this->db->like('judul_course',$kata_kunci);
		$this->db->or_like('nama_kategori',$kata_kunci);
		$this->db->or_like('kota_course',$kata_kunci);
		$this->db->where('tpelatihan.status',3);
		$this->db->having('tpelatihan.status',3);
	    return $this->db->get_where('')->result();
	}

	public function get_pencarian2($kata_kunci){

		$this->db->select('*');
		$this->db->from('tpelatihan as tp');
		$this->db->join('tref_kategori as trk','trk.id_kategori = tp.id_kategori');
		$this->db->like('tp',$kata_kunci);
		$this->db->or_like('tp',$kata_kunci);
		$this->db->or_like('tp',$kata_kunci);
		$this->db->where('tp.status',3);
		$this->db->having('tp.status',3);
	    return $this->db->get_where()->result();
	}

	public function add_new_request($data){
		$this->session->set_flashdata('berhasil', 'Usulan pelatihan Anda berhasil ditambahkan ');
		return $this->db->insert('trequest_info',$data);
	}

	public function pelatihanku($filter){

		$this->db->select('tpv.id_provider,tpv.nama_provider,tp.id_course,ttp.id_tp,ttp.NIP,ttp.nama_pegawai,tp.judul_course,tr.nama_kategori,tp.waktu_in,tp.waktu_out,tp.kota_course,ttp.status,ttp.status_post3,ttp.status_evaluasi_1,ttp.status_laporan');
		$this->db->from('ttrans_pelatihan AS ttp');
		$this->db->join('tpelatihan as tp','tp.id_course=ttp.id_course');
		$this->db->join('tref_kategori as tr','tr.id_kategori=tp.id_kategori');
		$this->db->join('tprovider as tpv', 'tpv.id_provider = ttp.id_provider');
		$this->db->where('ttp.NIP',$filter);
		$this->db->order_by('ttp.date','DSC');
		return $this->db->get_where()->result();

	}

	public function pget_all_pddk_list($filter){
		$this->db->select('*');
		$this->db->join('tpddk_bjj','tpddk_bjj.id_course=ttrans_pddk.id_course');
		$this->db->join('tref_kategori','tref_kategori.id_kategori=tpddk_bjj.id_kategori');
		//$this->db->join('ttrans_lv3_pddk_pre','ttrans_lv3_pddk_pre.id_tpddk = ttrans_pddk.id_tpddk' );
		$this->db->where('ttrans_pddk.status',0);
		$this->db->where('ttrans_pddk.NIP',$filter);
		$this->db->group_by('ttrans_pddk.id_tpddk');
		$this->db->order_by('Nama_pegawai','DSC');
		return $this->db->get('ttrans_pddk')->result();

	}



	public function evaluasi_1($filter){

		$this->db->select('tpv.id_provider,tpv.nama_provider,tp.id_course,ttp.id_tp,ttp.NIP,ttp.nama_pegawai,tp.judul_course,tr.nama_kategori,tp.waktu_in,tp.waktu_out,tp.kota_course,ttp.status,ttp.status_evaluasi_1');
		$this->db->from('ttrans_pelatihan AS ttp');
		$this->db->join('tpelatihan as tp','tp.id_course=ttp.id_course');
		$this->db->join('tref_kategori as tr','tr.id_kategori=tp.id_kategori');
		$this->db->join('tprovider as tpv', 'tpv.id_provider = ttp.id_provider');
		$this->db->where('ttp.NIP',$filter);
		$this->db->having('ttp.status_evaluasi_1',0);
		$this->db->order_by('ttp.date','DSC');
		return $this->db->get_where()->result();

	}

	public function update_status_ev_1($status,$id){

		$this->db->query("UPDATE ttrans_pelatihan SET status_evaluasi_1 =$status where id_tp=$id");

	}

	public function get_view_training($id){

	return $this->db->query("Select * from tview_trans_pelatihan where id_tp = $id");

	}

	public function add_new_survey($data){
		$this->session->set_flashdata('berhasil', 'Usulan pelatihan Anda berhasil ditambahkan ');
		return $this->db->insert('tevaluasi',$data);
	}

	public function add_rating(){
		$this->db->query("UPDATE tprovider  SET rating =
		(SELECT  AVG(rata_rata) AS rat FROM tevaluasi WHERE tprovider.`id_provider`=tevaluasi.`id_provider` )");
	}


	public function pendidikan_need_approve($id){

		$this->db->select('ttp.id_tpddk,tp.id_course,tp.judul_course,tpv.nama_provider,ttp.Nama_pegawai,tp.judul_course,tr.nama_kategori,tp.waktu_in,tp.waktu_out,tp.kota_course,ttp.status_atasan,ttp.status_rekan,ttp.status_bawahan,ttp.status_atasan_post,ttp.status_bawahan_post,ttp.status_rekan_post');
		$this->db->from('ttrans_pddk ttp');
		$this->db->join('tpddk_bjj as tp','tp.id_course=ttp.id_course');
		$this->db->join('tref_kategori as tr','tr.id_kategori=tp.id_kategori');
		$this->db->join('tprovider as tpv', 'tpv.id_provider = ttp.id_provider');
		//$this->db->join('ttujuan_course ttc','ttc.id_course = ttp.id_course');
		$this->db->where('ttp.id_tpddk',$id);
		$this->db->where('ttp.status',0);
		$this->db->order_by('ttp.date','DSC');
		return $this->db->get_where()->result();

	}

	public function tujuan_need_approval($id){
		$this->db->select('ttp.id_tpddk,tp.id_course,ttc.id_tujuan,tp.judul_course,tpv.nama_provider,ttc.tujuan_pelatihan,ttp.Nama_pegawai,tp.judul_course,tr.nama_kategori,tp.waktu_in,tp.waktu_out,tp.kota_course');
		$this->db->from('ttrans_pddk ttp');
		$this->db->join('tpddk_bjj as tp','tp.id_course=ttp.id_course');
		$this->db->join('tref_kategori as tr','tr.id_kategori=tp.id_kategori');
		$this->db->join('tprovider as tpv', 'tpv.id_provider = ttp.id_provider');
		$this->db->join('ttujuan_course ttc','ttc.id_course = ttp.id_course');
		$this->db->where('ttp.id_tpddk',$id);
		$this->db->where('ttp.status',0);
		$this->db->order_by('ttp.date','DSC');
		return $this->db->get_where()->result();
	}


	public function pelatihan_need_approve($id){
		$this->db->select('tpv.id_provider,tpv.nama_provider,ttp.id_tp,tp.id_course,ttp.NIP,ttp.Nama_pegawai,tp.judul_course,tr.nama_kategori,tp.waktu_in,tp.waktu_out,tp.kota_course, tp.skill, 
			tp.knowledge,
			tp.attitude,
			tp.attitude1,
			tp.attitude2,
			tp.attitude3,
			tp.attitude4,
			tp.attitude5,
			tp.attitude6,
			tp.attitude7,				
			ttp.status');
		$this->db->from('ttrans_pelatihan AS ttp');
		$this->db->join('tpelatihan as tp','tp.id_course=ttp.id_course');
		$this->db->join('tref_kategori as tr','tr.id_kategori=tp.id_kategori');
		$this->db->join('tprovider as tpv', 'tpv.id_provider = ttp.id_provider');
		$this->db->where('ttp.id_tp',$id);
		$this->db->where('ttp.status',0);
		$this->db->order_by('ttp.date','DSC');
		return $this->db->get_where()->result();

	}

	public function pelatihan_need_approve_post($id){
		$this->db->select('tpv.id_provider,tpv.nama_provider,ttp.id_tp,tp.id_course,ttp.NIP,ttp.Nama_pegawai,tp.judul_course,tr.nama_kategori,tp.waktu_in,tp.waktu_out,tp.kota_course, tp.skill, 
			tp.knowledge,
			tp.attitude,
			tp.attitude1,
			tp.attitude2,
			tp.attitude3,
			tp.attitude4,
			tp.attitude5,
			tp.attitude6,
			tp.attitude7,				
			ttp.status');
		$this->db->from('ttrans_pelatihan AS ttp');
		$this->db->join('tpelatihan as tp','tp.id_course=ttp.id_course');
		$this->db->join('tref_kategori as tr','tr.id_kategori=tp.id_kategori');
		$this->db->join('tprovider as tpv', 'tpv.id_provider = ttp.id_provider');
		$this->db->where('ttp.id_tp',$id);
		$this->db->where('ttp.status',1);
		$this->db->order_by('ttp.date','DSC');
		return $this->db->get_where()->result();

	}
	public function pelatihan_need_approve_post3($id){
		$this->db->select('tpv.id_provider,tpv.nama_provider,ttp.id_tp,tp.id_course,tl3.id_tl3pre,ttp.NIP,ttp.Nama_pegawai,tp.judul_course,tr.nama_kategori,tp.waktu_in,tp.waktu_out,tp.kota_course, tp.skill, 
			tp.knowledge,
			tp.attitude,
			tp.attitude1,
			tp.attitude2,
			tp.attitude3,
			tp.attitude4,
			tp.attitude5,
			tp.attitude6,
			tp.attitude7,				
			ttp.status');
		$this->db->from('ttrans_pelatihan AS ttp');
		$this->db->join('tpelatihan as tp','tp.id_course=ttp.id_course');
		$this->db->join('tref_kategori as tr','tr.id_kategori=tp.id_kategori');
		$this->db->join('tprovider as tpv', 'tpv.id_provider = ttp.id_provider');
		$this->db->join('ttrans_lv3_pre as tl3','tl3.id_tp=ttp.id_tp' );
		$this->db->where('ttp.id_tp',$id);
		$this->db->where('ttp.status',1);
		$this->db->order_by('ttp.date','DSC');
		return $this->db->get_where()->result();

	}


	public function input_evaluasi_3($data){
		$this->db->insert('ttrans_lv3_pre',$data);

	}
	public function update_statuspre($status,$id){
		$this->db->query("UPDATE ttrans_pelatihan SET status =$status  where id_tp=$id");
	}

	public function update_statuspre_pddk($status,$id){
		$this->db->query("UPDATE ttrans_pddk SET status_atasan = $status  where id_tpddk=$id");
	}

	public function update_statuspost($status,$id){

		$this->db->query("UPDATE ttrans_pelatihan SET status_post3 =$status  where id_tp=$id");
	}
	public function nilai_ev4($data){
		$this->db->insert('ttrans_lv4',$data);

	}
	public function get_jumlah(){

		return $this->db->query(" select * from trequest_info where judul_course='OLDP' ");
		
	}

	public function get_by_nip_pddk($id_course,$nip){

		$user =  $this->db->get_where('trequest_info',

			array(	'NIP'=> $nip,
						'judul_course'=> $id_course
						
						))->row();

			return $user;

	}

	public function get_soal_kompetensi($id){
		$this->db->select('*');
		$this->db->from('tsoal_kompetensi as tsk');
		$this->db->where('id_kompetensi',$id);
		return $this->db->get_where()->result_array();
	}

	public function get_item_soal($id,$code){

		$this->db->select('*');
		$this->db->from('tsoal_kompetensi as tsk');
		$this->db->join('tsoal_kompetensi_item as tski','tsk.ids=tski.ids');
		$this->db->where('tsk.id_kompetensi',$id);
		$this->db->where('tsk.ids',$code);

		return $this->db->get_where()->result_array();
	}

	public function get_items($id){
		$this->db->select('*');
		$this->db->from('tsoal_kompetensi as tsk');
		$this->db->join('tsoal_kompetensi_item as tski','tsk.ids=tski.ids');
		$this->db->where('tsk.id_kompetensi',$id);
		$this->db->where('tsk.ids',1);



		return $this->db->get_where()->result_array();
	}


	public function get_all_course_limit($kategori) {

		$date = date("Y-m-d");
		$this->db->select('*');
		$this->db->from('tpelatihan');
		$this->db->join('tref_kategori','tref_kategori.id_kategori = tpelatihan.id_kategori');
		$this->db->join('tprovider','tprovider.id_provider = tpelatihan.id_provider');
		$this->db->where('tpelatihan.status',3);
		$this->db->where('tpelatihan.id_kategori',$kategori);
		$this->db->having('tpelatihan.waktu_in >=', $date );
		$this->db->order_by('tpelatihan.waktu_in','ASC');
		$this->db->limit(5);
		return $this->db->get_where()->result();
	}


	public 	function insert_laporan_training($data,$id_tp)
	{
		$this->db->insert('tlaporan',$data);
		if($id_tp > 0) {

			$this->db->where('id_tp', $id_tp);
			$this->db->set('status_laporan',2);
			$this->db->update('ttrans_pelatihan');

		}
		
	}

	public function del_doc_pelatihan($id){

		$this->db->where('noid', $id);
		$this->db->delete('tlaporan');
	}

	public function get_list_doc_pelatihan($id){
		$this->db->select('*');
		$this->db->from('tlaporan');
		$this->db->where('tlaporan.id_tp',$id);
		return $this->db->get_where()->result_array();
	}

	public function cek_laporan_peserta($nip){
		$this->db->select('*');
		$this->db->from('ttrans_pelatihan');
		$this->db->where('ttrans_pelatihan.nip',$nip);
		$this->db->where('ttrans_pelatihan.status',1);
		$this->db->where('ttrans_pelatihan.status_laporan',0);
		return $this->db->get_where()->result_array();

	}


}



?>