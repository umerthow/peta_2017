<?php

class Verifikasi_m extends CI_Model {


		public function approved_course($id,$aprv){

			 $this->db->set("status",3);
   			
   			 $this->db->where('id_course',$id);
   			 $this->db->update("tpelatihan");

			}

			public function rejected_course($id,$aprv){

			 $this->db->set("status",4);
   			
   			 $this->db->where('id_course',$id);
   			 $this->db->update("tpelatihan");

			}



		public function get_date(){

			$this->db->select('*');
			$this->db->from('tview_calendar');
			return $this->db->get_where()->result();
		


		}

		public function approved_usul($id,$aprv,$reason_apv){

			 $this->db->set("status",1);
   			 $this->db->set('reason_apv',$reason_apv);	
   			 $this->db->where('id_tp',$id);
   			 $this->db->update("ttrans_pelatihan");

			}

			public function rejected_usul($id,$aprv){

			 $this->db->set("status",2);
			  $this->db->set("status_evaluasi_1",2);
   			
   			 $this->db->where('id_tp',$id);
   			 $this->db->update("ttrans_pelatihan");

			}


			public function approved_request($id,$aprv){

			 $this->db->set("status",1);
   			
   			 $this->db->where('id_request',$id);
   			 $this->db->update("trequest_info");

			}

			public function inserttopelatihan($id){
				return $this->db->query("
					INSERT INTO tpelatihan
					(id_provider,id_kategori,judul_course,tujuan_pelatihan,waktu_in,waktu_out,kota_course,gatel,content,tempat_pelatihan,biaya_course,CP,skill,knowledge,attitude,attitude1,attitude2,attitude3,attitude4,attitude5,attitude6,attitude7,STATUS) 
					SELECT 
					IF(id_kategori=0,0,69),id_kategori, judul_course,keterangan,waktu_in,ADDDATE(waktu_in,INTERVAL 30 DAY) AS waktu_out,kota_course,gatel,content,lokasi_pelatihan,biaya,IF(id_kategori=0,0,'Dept Diklat'),skill,knowledge,attitude,attitude1,attitude2,attitude3,attitude4,attitude5,attitude6,attitude7,IF(id_kategori=0,0,3)
					FROM `trequest_info` WHERE id_request=$id
					");
			}

			public function rejected_request($id,$aprv){

			 $this->db->set("status",2);
   			
   			 $this->db->where('id_request',$id);
   			 $this->db->update("trequest_info");

			}

	
			//model pendidikan berjenjang

			public function detail_ev3_pddk($id){
				return $this->db->query('SELECT a.`id_ev3_pddk`,a.`item`,
				SUM(a.nilai *(1-ABS(SIGN(a.id_atasan-0)))) AS nilai_atasan,
				SUM(a.nilai *(1-ABS(SIGN(a.id_atasan-1)))) AS nilai_rekan,
				SUM(a.nilai *(1-ABS(SIGN(a.id_atasan-2)))) AS nilai_bawahan,
				(IFNULL(SUM(a.nilai *(1-ABS(SIGN(a.id_atasan-0)))),0) + IFNULL(SUM(a.nilai *(1-ABS(SIGN(a.id_atasan-1)))),0 ) + IFNULL(SUM(a.nilai *(1-ABS(SIGN(a.id_atasan-2)))),0 )) AS total
				FROM ttrans_lv3_pddk_pre AS a 
				WHERE a.`id_tpddk`='.$id.'
				GROUP BY a.id_item' );
				}


			public function detail_ev3_pddk_avg($id){
				return $this->db->query('select a.`id_ev3_pddk`,a.`item`,
						SUM(a.nilai *(1-ABS(SIGN(a.id_atasan-0))))/COUNT(DISTINCT a.item) as avg_atasan,
						SUM(a.nilai *(1-ABS(SIGN(a.id_atasan-1))))/COUNT(DISTINCT a.item) AS avg_rekan,
						SUM(a.nilai *(1-ABS(SIGN(a.id_atasan-2))))/COUNT(DISTINCT a.item) AS avg_bawahan,
						IFNULL((SUM(a.nilai *(1-ABS(SIGN(a.id_atasan-0))))/COUNT(DISTINCT a.item)),0) + 
						IFNULL((SUM(a.nilai *(1-ABS(SIGN(a.id_atasan-1))))/COUNT(DISTINCT a.item)),0 ) + 
						IFNULL((SUM(a.nilai *(1-ABS(SIGN(a.id_atasan-2))))/COUNT(DISTINCT a.item)),0 ) as avg_total
						from ttrans_lv3_pddk_pre as a 
						where a.`id_tpddk`='.$id.' ');
						}

			public function detail_post_ev3_pddk($id){
				return $this->db->query('SELECT a.`id_ev3_post`,a.`item`,
				SUM(a.nilai *(1-ABS(SIGN(a.id_atasan-0)))) AS nilai_atasan,
				SUM(a.nilai *(1-ABS(SIGN(a.id_atasan-1)))) AS nilai_rekan,
				SUM(a.nilai *(1-ABS(SIGN(a.id_atasan-2)))) AS nilai_bawahan,
				(IFNULL(SUM(a.nilai *(1-ABS(SIGN(a.id_atasan-0)))),0) + IFNULL(SUM(a.nilai *(1-ABS(SIGN(a.id_atasan-1)))),0 ) + IFNULL(SUM(a.nilai *(1-ABS(SIGN(a.id_atasan-2)))),0 )) AS total
				FROM ttrans_lv3_pddk_post AS a 
				WHERE a.`id_tpddk`='.$id.'
				GROUP BY a.id_item' );
			}			
	

			public function detail_post_ev3_pddk_avg($id){
				return $this->db->query('select a.`id_ev3_post`,a.`item`,
						SUM(a.nilai *(1-ABS(SIGN(a.id_atasan-0))))/COUNT(DISTINCT a.item) as avg_atasan,
						SUM(a.nilai *(1-ABS(SIGN(a.id_atasan-1))))/COUNT(DISTINCT a.item) AS avg_rekan,
						SUM(a.nilai *(1-ABS(SIGN(a.id_atasan-2))))/COUNT(DISTINCT a.item) AS avg_bawahan,
						IFNULL((SUM(a.nilai *(1-ABS(SIGN(a.id_atasan-0))))/COUNT(DISTINCT a.item)),0) + 
						IFNULL((SUM(a.nilai *(1-ABS(SIGN(a.id_atasan-1))))/COUNT(DISTINCT a.item)),0 ) + 
						IFNULL((SUM(a.nilai *(1-ABS(SIGN(a.id_atasan-2))))/COUNT(DISTINCT a.item)),0 ) as avg_total
						from ttrans_lv3_pddk_post as a 
						where a.`id_tpddk`='.$id.' ');
			}


			//model_evaluasi_start
			
			public function get_detail_ev3($id){

				//return $this->db->query('SELECT * FROM ttrans_lv3_pre WHERE id_tp='.$id.' AND nilai_pre3 <>0');

				//return $this->db->query('SELECT  * FROM ttrans_lv3_pre AS tpre  JOIN ttrans_lv3_post AS tpost ON tpost.id_tp =tpre.id_tp  WHERE  tpost.id_tp='.$id.'  AND tpre.item=tpost.item ORDER BY tpre.item ASC');
				return $this->db->query('SELECT tpre.id_tl3pre, tpre.item,tpre.nilai_pre3,tpost.nilai_post3 AS tps FROM ttrans_lv3_pre AS tpre  LEFT JOIN 
ttrans_lv3_post AS tpost ON tpost.id_tl3pre =tpre.id_tl3pre 
WHERE  tpre.id_tp='.$id.'  GROUP BY  tpre.item,tpost.item ORDER BY tpre.item DESC');

			}
// return $this->db->query('SELECT tpre.id_tl3pre, tpre.item,tpre.nilai_pre3,tpost.nilai_post3 AS tps FROM ttrans_lv3_pre AS tpre  LEFT JOIN 
// ttrans_lv3_post AS tpost ON tpost.id_tl3pre =tpre.id_tl3pre 
// WHERE  tpre.id_tp='.$id.'  ORDER BY tpre.item DESC
// ');

// 			}


			public function get_detail_ev3_post($id){

			return $this->db->query('SELECT  tpost.nilai_post3 as tpr FROM ttrans_lv3_pre AS tpre  RIGHT JOIN ttrans_lv3_post AS tpost ON tpost.id_tp =tpre.id_tp OR tpre.id_tp='.$id.'
WHERE  tpost.id_tp='.$id.' AND tpre.item=tpost.item ORDER BY tpre.item ASC');
			//	return $this->db->query('SELECT * FROM ttrans_lv3_pre AS tpre INNER JOIN ttrans_lv3_post AS tpost ON tpost.id_tp =tpre.id_tp 
			//								WHERE tpost.id_tp='.$id.' GROUP BY tpost.item');
				

			}

			public function get_detail_ev3_avg($id){
				return $this->db->query('SELECT  AVG(nilai_pre3) AS abc ,AVG(nilai_post3) AS def FROM ttrans_lv3_pre AS tpre 
					LEFT JOIN  ttrans_lv3_post AS tpost ON tpost.id_tp =tpre.id_tp WHERE tpre.id_tp='.$id.'');
			}

			public function get_all_pre_avg(){
				return $this->db->query('select ttp.NIP,ttp.Nama_pegawai,tlp3.id_tp,tp.judul_course,AVG(tlp3.nilai_pre3) as pre_rata2
					from ttrans_pelatihan as ttp inner join ttrans_lv3_pre as tlp3  on ttp.`id_tp`=tlp3.id_tp
					inner join tpelatihan as tp on tp.id_course = ttp.id_course');
			}

			public function get_kompt($id){
					 $this->db->select('a.nama_kompetensi,c.item,c.level');
					$this->db->from('ttrans_kompt a');
					$this->db->join('ttrans_result_soal b','a.id_tp=b.id_tp');
					$this->db->join('tsoal_kompetensi_item c','c.idsi=b.level');
					$this->db->where('a.id_tp',$id);
					$this->db->group_by('a.nama_kompetensi');
					$this->db->order_by('a.nama_kompetensi DESC');
					return $this->db->get()->result();

			}

			public function get_all_list(){

				$this->db->select('*');
				$this->db->join('tpelatihan','tpelatihan.id_course=ttrans_pelatihan.id_course');
				$this->db->join('tref_kategori','tref_kategori.id_kategori=tpelatihan.id_kategori');
				$this->db->join('ttrans_lv3_pre','ttrans_lv3_pre.id_tp = ttrans_pelatihan.id_tp' );
				$this->db->where('ttrans_pelatihan.status',1);
				$this->db->group_by('ttrans_pelatihan.id_tp');
				$this->db->order_by('nama_pegawai','DSC');
				return $this->db->get('ttrans_pelatihan')->result();

			}

			public function get_all_list_post(){
				$this->db->select('*');
				$this->db->join('tpelatihan','tpelatihan.id_course=ttrans_pelatihan.id_course');
				$this->db->join('tref_kategori','tref_kategori.id_kategori=tpelatihan.id_kategori');
				$this->db->join('ttrans_lv3_pre','ttrans_lv3_pre.id_tp = ttrans_pelatihan.id_tp' );
				$this->db->where('ttrans_pelatihan.status',1);
				$this->db->group_by('ttrans_pelatihan.id_tp');
				$this->db->order_by('tgl_post3','DESC');
				return $this->db->get('ttrans_pelatihan')->result();
			}


			public function get_all_pddk_list_post(){
				$this->db->select('*');
				$this->db->join('tpddk_bjj','tpddk_bjj.id_course=ttrans_pddk.id_course');
				$this->db->join('tref_kategori','tref_kategori.id_kategori=tpddk_bjj.id_kategori');
				//$this->db->join('ttrans_lv3_pddk_pre','ttrans_lv3_pddk_pre.id_tpddk = ttrans_pddk.id_tpddk' );
				$this->db->where('ttrans_pddk.status',0);
				$this->db->group_by('ttrans_pddk.id_tpddk');
				$this->db->order_by('Nama_pegawai','DSC');
				return $this->db->get('ttrans_pddk')->result();
			}

			public function get_all_pddk_list(){

				$this->db->select('*');
				$this->db->join('tpddk_bjj','tpddk_bjj.id_course=ttrans_pddk.id_course');
				$this->db->join('tref_kategori','tref_kategori.id_kategori=tpddk_bjj.id_kategori');
				//$this->db->join('ttrans_lv3_pddk_pre','ttrans_lv3_pddk_pre.id_tpddk = ttrans_pddk.id_tpddk' );
				$this->db->where('ttrans_pddk.status',0);
				$this->db->group_by('ttrans_pddk.id_tpddk');
				$this->db->order_by('Nama_pegawai','DSC');
				return $this->db->get('ttrans_pddk')->result();

			}

			public function get_all_list_level1(){
				$this->db->select('*');
				$this->db->join('tpelatihan','tpelatihan.id_course=ttrans_pelatihan.id_course');
				$this->db->join('tref_kategori','tref_kategori.id_kategori=tpelatihan.id_kategori');
				$this->db->join('tprovider','tprovider.id_provider=tpelatihan.id_provider');
				$this->db->where('ttrans_pelatihan.status',1);
				//$this->db->where('ttrans_pelatihan.status_evaluasi_1',0);
				$this->db->order_by('ttrans_pelatihan.status_evaluasi_1','DESC');
				return $this->db->get('ttrans_pelatihan')->result();

			}

			public function get_all_list_ev4(){

			$this->db->select('*');
			$this->db->join('tview_trans_pelatihan','tview_trans_pelatihan.id_tp = ttrans_lv4.id_tp' );
			$this->db->where('status',1);
			return $this->db->get_where('ttrans_lv4')->result();
			}

			public function get_nilai($id){
				$this->db->select('*');
				$this->db->from('ttrans_lv4');
				$this->db->where('id_tp',$id);
				return $this->db->get()->row();

			}

			public function update_penilaix($data,$id) {

   			 $this->db->where('id_tpddk',$id);
   			 $this->db->update("ttrans_pddk",$data);
			}

			public function get_all_effe(){
				return $this->db->query('SELECT  ttrp.`NIP`, ttrp.`Nama_pegawai`, tp.`judul_course`,  tpre.`id_tp` , AVG(nilai_pre3) AS pre_evaluasi ,AVG(nilai_post3) AS post_evaluasi FROM ttrans_lv3_pre AS tpre 
					LEFT JOIN  ttrans_lv3_post AS tpost ON tpost.id_tp =tpre.id_tp
					left join `ttrans_pelatihan` as ttrp on ttrp.`id_tp` = tpre.`id_tp`
					inner join `tpelatihan`as tp on tp.`id_course` = ttrp.`id_course`
 					group by tpre.`id_tp` ')->result();

				
				}

		
}



?>