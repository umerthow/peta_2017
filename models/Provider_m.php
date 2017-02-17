<?php

class Provider_m extends  CI_model {



	public function get($filter){
		
		$this->db->select('*');
		$this->db->from('tprovider');
		$this->db->join('project_umar_user', 'project_umar_user.kd_user = tprovider.kd_user' );
		$this->db->where('tprovider.kd_user',$filter );

		if(empty($this->db->get()->result())){

			$this->session->set_flashdata('petunjuk','Anda belum mengisi form perusahaan');
		}else {
			$this->db->select('*');
			$this->db->from('tprovider');
			$this->db->join('project_umar_user', 'project_umar_user.kd_user = tprovider.kd_user' );
			$this->db->where('tprovider.kd_user',$filter );
			
			$this->db->group_by('tprovider.kd_user');
			$this->session->set_flashdata('hello','Welcome Back ! ');
			return  $this->db->get()->result();

		}
		//$this->db->query("Select * from tprovider order by id_provider");
	
	}

	public function get_all_pddk_bj(){
		$this->db->select('*');
		$this->db->from('tpddk_bjj');
		$this->db->join('tprovider','tprovider.id_provider = tpddk_bjj.id_provider');
		 $this->db->join('tref_kategori trk','trk.id_kategori = tpddk_bjj.id_kategori');
		$this->db->where('tpddk_bjj.status', 0);
		return $this->db->get()->result();
	}

	public function get_one_pddk_bj($id){
		$this->db->select('*');
		$this->db->from('tpddk_bjj');
		$this->db->join('tprovider','tprovider.id_provider = tpddk_bjj.id_provider');
		 $this->db->join('tref_kategori trk','trk.id_kategori = tpddk_bjj.id_kategori');
		$this->db->where('tpddk_bjj.status', 0);
		$this->db->where('tpddk_bjj.id_course', $id);
		return $this->db->get()->row();
	}

public function get_request_karyawan(){

		$this->db->select('*');
		$this->db->from('trequest_info');
		$this->db->where('status',0);
		$this->db->where('date_request between CURDATE() - INTERVAL 30 DAY AND CURDATE()');
		$this->db->order_by('id_request','DESC');
		return  $this->db->get()->result();
	}

	public function get_by_profil($filter){


		$this->db->select('*');
		$this->db->from('tprovider');
		$this->db->join('project_umar_user', 'project_umar_user.kd_user = tprovider.kd_user' );
		$this->db->where('tprovider.kd_user',$filter );

		if(empty($this->db->get()->row())){

			$this->session->set_flashdata('petunjuk','Anda belum mengisi form perusahaan, Silahkan Registrasi dahulu');
		}else {
			$this->db->select('*');
			$this->db->from('tprovider');
			$this->db->join('project_umar_user', 'project_umar_user.kd_user = tprovider.kd_user' );
			$this->db->where('tprovider.kd_user',$filter );
			
			$this->db->group_by('tprovider.kd_user');
			$this->session->set_flashdata('hello','Welcome Back ! ');
			return  $this->db->get()->row();

		}

	}

	





	public function get_course($id){

		$this->db->select('*');
		$this->db->from('tpelatihan');
		$this->db->join('tprovider','tprovider.id_provider = tpelatihan.id_provider');
		$this->db->join('tref_kategori','tref_kategori.id_kategori = tpelatihan.id_kategori');
		$this->db->where('tpelatihan.id_provider', $id);
		
		if(empty($this->db->get()->result())){
			  
			    $this->session->set_flashdata('belum', 'Anda belum mengisi data pelatihan');
			} else {

				$this->db->select('*');
				$this->db->from('tpelatihan');
				$this->db->join('tprovider','tprovider.id_provider = tpelatihan.id_provider');
				$this->db->join('tref_kategori','tref_kategori.id_kategori = tpelatihan.id_kategori');
				$this->db->where('tpelatihan.id_provider', $id);
			   return $this->db->get()->result();
			}
		 

	}

	public function get_all_pddk_course($filter,$id){

		$this->db->select('*');
		$this->db->from('tpddk_bjj');
		$this->db->join('tprovider','tprovider.id_provider = tpddk_bjj.id_provider');
		$this->db->join('tref_kategori','tref_kategori.id_kategori = tpddk_bjj.id_kategori');
		$this->db->where('tpddk_bjj.id_provider', $id);
		
		if(empty($this->db->get()->result())){
			  
			    $this->session->set_flashdata('belum', 'Anda belum mengisi data pelatihan');
			} else {

				$this->db->select('*');
				$this->db->from('tpddk_bjj');
				$this->db->join('tprovider','tprovider.id_provider = tpddk_bjj.id_provider');
				$this->db->join('tref_kategori','tref_kategori.id_kategori = tpddk_bjj.id_kategori');
				$this->db->where('tpddk_bjj.id_provider', $id);
			   return $this->db->get()->result();
			}
		 

	}

	public function get_all_pddk_course_tujuan($id){

		$this->db->select('*');
		$this->db->from('tpddk_bjj');
		$this->db->join('ttujuan_course','ttujuan_course.id_course = tpddk_bjj.id_course');
		$this->db->where('tpddk_bjj.id_course', $id);
		return $this->db->get()->result();


	}



	public function get_kategori(){
		
		return $this->db->get('tref_kategori')->result();
	}

	public function get_kota(){

		$this->db->select('*');
		$this->db->from('tref_kabkota');
		$this->db->order_by('nama_kabkota','ACS');
		return $this->db->get()->result();
	}


	public function insert($data){

		$this->db->insert('tprovider',$data);

	}

	public function get_detail($id){

			return $this->db->query("select * from tprovider where id_provider =$id");

		}

	public function update($data,$id){

			$this->db->update('tprovider',$data,$id);
		}

	public function delete_user($id){

		$this->db->where('id_provider', $id);
		$this->db->delete('tprovider');
	}

	public function get_latih($id){
		
		$this->db->select('*');
		$this->db->from('tpelatihan');
		$this->db->join('tprovider','tprovider.id_provider = tpelatihan.id_provider');
		$this->db->join('tref_kategori','tref_kategori.id_kategori = tpelatihan.id_kategori');
		$this->db->where('tpelatihan.id_course', $id);
		
		if(empty($this->db->get()->row())){
			  
			    $this->session->set_flashdata('message', 'Anda belum mengisi data pelatihan');
			} else {

				$this->db->select('*');
				$this->db->from('tpelatihan');
				$this->db->join('tprovider','tprovider.id_provider = tpelatihan.id_provider');
				$this->db->join('tref_kategori','tref_kategori.id_kategori = tpelatihan.id_kategori');
				$this->db->where('tpelatihan.id_course', $id);
			   return $this->db->get()->row();
			}


	
	}
	

	public function get_latih_pddk(){
	
	  return $this->db->query("SELECT MAX(id_course) as id_course ,id_provider FROM tpddk_bjj ORDER BY id_course DESC")->result();
	}

	public function get_latih_bjjg($id){
		
		$this->db->select('*');
		$this->db->from('tpddk_bjj');
		$this->db->join('tprovider','tprovider.id_provider = tpddk_bjj.id_provider');
		$this->db->join('tref_kategori','tref_kategori.id_kategori = tpddk_bjj.id_kategori');
		$this->db->where('tpddk_bjj.id_course', $id);
		
		if(empty($this->db->get()->row())){
			  
			    $this->session->set_flashdata('message', 'Anda belum mengisi data pelatihan');
			} else {

				$this->db->select('*');
				$this->db->from('tpddk_bjj');
				$this->db->join('tprovider','tprovider.id_provider = tpddk_bjj.id_provider');
				$this->db->join('tref_kategori','tref_kategori.id_kategori = tpddk_bjj.id_kategori');
				$this->db->where('tpddk_bjj.id_course', $id);
			   return $this->db->get()->row();
			}


	
	}

	public function get_latih_course($id){

		$this->db->select('*');
		$this->db->from('tprovider');
		$this->db->where('id_provider', $id);
		
		if(empty($this->db->get()->row())){
			  
			    $this->session->set_flashdata('message', 'Anda belum mengisi data pelatihan');
			} else {

				$this->db->select('*');
				$this->db->from('tprovider');
				
				$this->db->where('id_provider', $id);
			   return $this->db->get()->row();
			}



	}

	public function tambah_latih($data){
		$this->session->set_flashdata('berhasil', 'Data pelatihan berhasil ditambah');
		return $this->db->insert('tpelatihan',$data);

	}

	public function tambah_pddk_bj($data){
		return $this->db->insert('tpddk_bjj',$data);
	}

	public function delete_latih($id){

		$this->db->where('id_course', $id);
		$this->db->delete('tpelatihan');
	}

	public function delete_latih_pddk($id){

		$this->db->where('id_course', $id);
		$this->db->delete('tpddk_bjj');
	}

	public function detail_pelatihan($id){


		return $this->db->query("select * from tpelatihan join tref_kategori on tpelatihan.id_kategori=tref_kategori.id_kategori where id_course=$id");


	}

	public function update_latih($data,$id){

			$this->db->update('tpelatihan',$data,$id);

		}


	public function get_all($limit,$offset){
		
		$this->db->select('*');
		$this->db->from('tprovider');
		$this->db->limit($limit,$offset);
		return $this->db->get_where()->result();
		
		//return $this->db->limit($limit,$offset)->get_where('project_umar_stokbuku');
	
		
	}

	



	public function get_all_course($limit,$offset){
		
		$this->db->select('*');
		$this->db->from('tpelatihan');
		$this->db->join('tref_kategori','tref_kategori.id_kategori = tpelatihan.id_kategori');
		$this->db->where('tpelatihan.status',0);
		$this->db->order_by('tpelatihan.id_course','DESC');
		//$this->db->limit($limit,$offset);
		return $this->db->get_where()->result();
		
		//return $this->db->limit($limit,$offset)->get_where('project_umar_stokbuku');
	
		
	}

	var $table_a ='tpelatihan';
	var $column_order_a = array(null,'judul_course','nama_provider','nama_kategori','waktu_in','waktu_out','kota_course','status');
	var $column_search_a = array('judul_course','kota_course','nama_provider');
	var $order_a = array('id_course' => 'asc');
	
	public function query_training(){
		$this->db->select('id_course, judul_course,nama_provider,nama_kategori,waktu_in,waktu_out,kota_course,status');
		$this->db->from('tpelatihan');
		$this->db->join('tref_kategori','tref_kategori.id_kategori = tpelatihan.id_kategori');
		$this->db->join('tprovider','tprovider.id_provider = tpelatihan.id_provider');
		
	}


	private function get_all_course_query(){
	
		$this->query_training();
 
        $i = 0;

        foreach ($this->column_search_a as $item) {
        	if($_POST['search']['value']) {

        		if($i===0) {
        			$this->db->group_start();
        			$this->db->like($item, $_POST['search']['value']);
        		} else {

        			$this->db->or_like($item, $_POST['search']['value']);
        		}

        		if (count($this->column_search_a) - 1 == $i)
        			$this->db->group_end();

        	} $i++;


        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_a[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 

        else if(isset($this->order_a))
        {
            $order = $this->order_a;
            $this->db->order_by(key($order), $order[key($order)]);
        }
	}

	public function get_all_course_all(){

		$this->get_all_course_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
		
		//return $this->db->limit($limit,$offset)->get_where('project_umar_stokbuku');
	
		
	}

	public function count_filtered()
    {
        $this->get_all_course_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
         $this->db->from($this->table_a);
        return $this->db->count_all_results();
    }









public function get_all_course_approved($data2,$limit){
		$date = date("Y-m-d");
		$this->db->select('*');
		$this->db->from('tpelatihan');
		$this->db->join('tref_kategori','tref_kategori.id_kategori = tpelatihan.id_kategori');
		$this->db->where('tpelatihan.status',3);
		if($limit==2) {
			$this->db->having('tpelatihan.waktu_in >=', $date );
		} 
		
	
		$this->db->order_by('tpelatihan.waktu_in','ASC');
		return $this->db->get_where()->result();
		
		//return $this->db->limit($limit,$offset)->get_where('project_umar_stokbuku');
	
		
	}

public function get_all_course_rejected($limit3,$offset3){
		
		$this->db->select('*');
		$this->db->from('tpelatihan');
		$this->db->join('tref_kategori','tref_kategori.id_kategori = tpelatihan.id_kategori');
		$this->db->where('tpelatihan.status',4);
		//$this->db->limit($limit3,$offset3);
		return $this->db->get_where()->result();
		
		//return $this->db->limit($limit,$offset)->get_where('project_umar_stokbuku');
	
		
	}






	public function get_total_rows(){
	
	//total data dalam 1 tabel	
	return $this->db->get('tprovider')->num_rows();
		
	}
	public function get_pencarian_provider($kata_kunci){
	//total data dalam 1 tabel	
		$this->db->select('*');
		$this->db->from('tprovider');
		$this->db->like('nama_provider',$kata_kunci);
		$this->db->or_like('pemilik',$kata_kunci);
		$this->db->or_like('no_siup',$kata_kunci);
		$this->db->or_like('alamat',$kata_kunci);
		$this->db->or_like('kota',$kata_kunci);
		$this->db->or_like('website',$kata_kunci);
		 return $this->db->get_where('')->result();	
	}




	public function get_total_rows_course(){
	
	//total data dalam 1 tabel	
	$this->db->select('*');
	//$this->db->from('tpelatihan');
	//$this->db->order_by('judul_course','DSC');
	$this->db->where('tpelatihan.status',0);
	return $this->db->get('tpelatihan')->num_rows();
		
	}

	public function get_total_rows_course_4(){
	
	//total data dalam 1 tabel	
	$this->db->select('*');
	$this->db->from('tpelatihan');
	//$this->db->order_by('judul_course','DSC');
	$this->db->where('tpelatihan.status',4);
	return $this->db->get_where()->num_rows();
		
	}


	public function get_total_rows_course_3(){
	$date = date("Y-m-d");
	$this->db->select('*');
	$this->db->from('tpelatihan');
	$this->db->where('tpelatihan.status',3);
	$this->db->where('waktu_in >=',$date);
	return $this->db->get_where()->num_rows();
		
	}

	public function get_total_rows_course_all(){
	
	//total data dalam 1 tabel	
	$this->db->select('*');
	//$this->db->from('tpelatihan');

	$this->db->order_by('judul_course','DSC');

	return $this->db->get('tpelatihan')->num_rows();
		
	}
	
	public function get_provider($id){


		$this->db->select('*');
		$this->db->from('tprovider');
		
		$this->db->where('tprovider.id_provider', $id);
		
		if(empty($this->db->get()->row())){
				$error =  $this->session->set_flashdata ('message', " data not foound");

				
			  
			    $this->session->set_flashdata('message', 'Anda belum mengisi data pelatihan');
			    echo show_error('Data Not Found') ;
			    redirect('provider');
				

			} else {

				$this->db->select('*');
				$this->db->from('tprovider');
				
				$this->db->where('tprovider.id_provider', $id);
			   return $this->db->get()->row();
			}
		
	}

	public function sendmessage($data){

		$this->db->insert('tpesan',$data);



	}


	public function get_message(){

		$this->db->select('*');
		$this->db->from('tpesan');
		$this->db->order_by('date','DESC');
		return $this->db->get_where()->result();
	}

	public function get_message_limit(){

		$this->db->select('*');
		$this->db->from('tpesan');
		$this->db->limit(2);
		$this->db->order_by('date','DESC');
		return $this->db->get_where()->result();
	}
	
	public function pernyataan_m($data,$filter){

 			$this->db->set("status",1);
   			
   			 $this->db->where('kd_user',$data);
   			 $this->db->update("project_umar_user");

	}

	public function realtime_info_m(){


		return $this->db->query("  SELECT  (
        SELECT COUNT(tp.id_course)
        FROM   tpelatihan AS tp  WHERE tp.status=0
        ) AS course,
        (
        SELECT COUNT(ttp.id_tp)
        FROM   ttrans_pelatihan AS ttp inner join tpelatihan as a on a.id_course = ttp.id_course WHERE ttp.STATUS=0 or ttp.status=5
        ) AS transaksi,
        (
        SELECT COUNT(tri.id_request)
        FROM   trequest_info AS tri WHERE STATUS=0 AND date_request between CURDATE() - INTERVAL 30 DAY AND CURDATE()
        ) AS info,
        (
		 SELECT COUNT(tps.id_pesan)
        FROM   tpesan AS tps WHERE STATUS=0
        ) AS pesan,
        (
         SELECT COUNT(ttl.noid)
        FROM   ttrans_lelang AS ttl WHERE STATUS=0
        ) AS new_lelang,
        (SELECT 
		(AVG(nilai_post3) -  AVG(nilai_pre3)) AS delta
		FROM ttrans_lv3_pre AS tpre 
		LEFT JOIN  ttrans_lv3_post AS tpost ON tpost.id_tp =tpre.id_tp
		LEFT JOIN `ttrans_pelatihan` AS ttrp ON ttrp.`id_tp` = tpre.`id_tp`
		INNER JOIN `tpelatihan`AS tp ON tp.`id_course` = ttrp.`id_course`
		WHERE nilai_post3 != 0 AND nilai_pre3 !=0
		) as new_delta
        
        
        ");


	}
	public function get_training_cetak($id){

		$this->db->from('ttrans_pelatihan');
		$this->db->join('tpelatihan','tpelatihan.id_course = ttrans_pelatihan.id_course');
		$this->db->join('tprovider','tprovider.id_provider = tpelatihan.id_provider');
		$this->db->join('tref_kategori','tref_kategori.id_kategori = tpelatihan.id_kategori');
		$this->db->where('ttrans_pelatihan.id_course', $id);
		$this->db->having('ttrans_pelatihan.status', 1);
		return  $this->db->get()->result();
	}

	public function get_by_user(){
		
		
	}

	function get_murid(){
		return $this->db->query("SELECT * from murid order by id DESC")->result();
	}

}

?>