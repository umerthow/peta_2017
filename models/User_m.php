<?php

class User_m extends CI_Model {


		public function get_by_username_password($username, $password)	
		{
		
		$user =  $this->db->get_where('project_umar_user',
		
		array(
				'username'=>$username,
				'password'=>sha1($password),
				)
				
			)->row();
		
			
			return $user;
			
		}
		
		public function get_all($limit,$offset){
			//$this->db->query("select * from project_umar_user as pus order by pus.id");
			// /return $this->db->get_where('project_umar_user');
		
			return $this->db->limit($limit,$offset)->get_where('project_umar_user');
			
		}

		public function get_pencarian_user($kata_kunci){
			$this->db->select('*');
		$this->db->from('project_umar_user');
		$this->db->like('nama_depan',$kata_kunci);
		$this->db->or_like('nama_belakang',$kata_kunci);
     	 return $this->db->get_where('')->result();	
		}


		public function insert($data){


			$this->db->insert('project_umar_user',$data);
		}

		

		public function get_detail($id){

			return $this->db->query("select * from project_umar_user where id=$id");

		}

		public function get_detail_acc($filter){

		$this->db->select('*');
		$this->db->from('project_umar_user');
		
		$this->db->where('kd_user',$filter );
		return $this->db->get()->row();

		}


		public function update($data,$id){

			$this->db->update('project_umar_user',$data,$id);
		}

		public function delete_user($id){

			$this->db->where('id', $id);
			$this->db->delete('project_umar_user');

		}


	public function get_total_rows(){
	
	//total data dalam 1 tabel	
	return $this->db->get('project_umar_user')->num_rows();
		
	}

	public function get_sku(){

		$sku  = 'P';
		$sku .=sprintf('%05d', $this->db->get('project_umar_user')->num_rows()+1);
		return $sku;


	}


	public function get_me($filter){

		$this->db->select('*');
		$this->db->from('project_umar_user');
		$this->db->where('kd_user',$filter );
		return $this->db->get()->row();


	}
}



?>