<?php


class User extends CI_controller{


public function __construct(){
	parent:: __construct();	
	
	
	
	
	}

	
	public function login()
	{
		
		if ($this->session->userdata('is_login') ){
			
			 redirect('dashboard');
		}
		
		$data['title'] = 'login';
		$data['page_name'] = 'user/login';

		
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
		
		if($this->form_validation->run() == FALSE)
			{
				$this->load->view('main_layout_login', $data);
			
			}
			else 
			{
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				
				
			//proses login
			$user= $this->user_m->get_by_username_password($username,$password);
			
			
			//check akun
			if ($user)
			{
				
				//buiat session
								$data_user = array(
								'nama_depan' =>$user->nama_depan,
								'user_id'	=>$user->id,
								'level' =>$user->level,
								'kd_user'=>$user->kd_user,
								'status' =>$user->status,
								'is_login' => TRUE
								);
								
				$this->session->set_userdata($data_user);
				
				redirect('dashboard');
			}
				else
				{
					//pesan gagal
					$this->session->set_flashdata('error','Akun anda salah silahkan periksa dan Login kembali!');
					redirect('user/login');
				}
			}
		}
	
	
	public function logout()
	{
		
		$data_user = array (
		'nama_depan',
		'user_id',
		'status',
		'is_login',
		
		
		);
		$this->session->unset_userdata($data_user);
		
		redirect('user/login');
			
		
		
	}
	
	public function index(){

		if (! $this->session->userdata('is_login') ){
			
			 redirect('user/login');
		}else {



		$data['title']='Buku Kita';
		$data['page_name'] = 'user/index';
		
		
	
		
		
		//$data['user'] = $this->user_m->get_all();//panggil model
		
		
		/*$data = array (
			
			'nama_lengkap' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'paket'=> $this->input->post('paket'),
			
			);*/
			
		//pagging
		$data['base_url']=site_url('user/index/');
		$data['total_rows']=$this->user_m->get_total_rows();
		$data['per_page'] =10;
			
		//config for bootstrap pagination class integration
		  $data['full_tag_open'] = "<ul class='pagination'>";
		$data['full_tag_close'] ="</ul>";
		$data['num_tag_open'] = '<li>';
		$data['num_tag_close'] = '</li>';
		$data['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$data['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$data['next_tag_open'] = "<li>";
		$data['next_tagl_close'] = "</li>";
		$data['prev_tag_open'] = "<li>";
		$data['prev_tagl_close'] = "</li>";
		$data['first_tag_open'] = "<li>";
		$data['first_tagl_close'] = "</li>";
		$data['last_tag_open'] = "<li>";
		$data['last_tagl_close'] = "</li>";

		$data['num_links'] = 9;


		//inisialisasi
		$this->pagination->initialize($data);
		
		//buat paggingnya
		$data['pagination']=$this->pagination->create_links();


		$limit=$data['per_page']; //batas data dalam 1 halaman
		$offset=$this->uri->segment(3); // ambil data  dalam 1 halaman
		//$data['buku'] = $this->buku_model->get_all($limit,$offset); //panggil model
		$data['user'] = $this->user_m->get_all($limit,$offset);
		$keyword = '';
		$data['keyword'] = $keyword;
		$this->load->view('main_layout', $data);
		
		}
	}
	
	public function user_list(){
	$keyword = $this->uri->segment(3, $this->input->post('keyword', TRUE));
	$kata_kunci = $this->input->post('keyword');
	$data['title']='Provider';
	$data['keyword']=$keyword;
	$data['page_name']= 'user/search_user';
	$data['user'] = $this->user_m->get_pencarian_user($kata_kunci);
	$this->load->view('main_layout',$data);
	}
		
	
	public function tambah() {

		if (! $this->session->userdata('is_login') ){
			
			 redirect('user/login');
		}else {
		
		$data['title']='Provider';
		$data['page_name']= 'user/tambah';
		$data['sku'] = $this->user_m->get_sku();
		$this->load->helper('string');
		
		$this->form_validation->set_rules('nama_depan','nama_depan','required');
		$this->form_validation->set_rules('nama_belakang','nama_belakang','required');
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
		
		
		
		if($this->form_validation->run() == FALSE ){
		
		
		$this->load->view('main_layout',$data);
		
	}else
		{
		
		
		$data = array (
			
			'nama_depan' => $this->input->post('nama_depan'),
			'nama_belakang' => $this->input->post('nama_belakang'),
			'username' => $this->input->post('username'),
			'password'=>sha1( $this->input->post('password')),
			'level'=>$this->input->post('level'),
			'kd_user'=>$this->input->post('kd_user')
			
			);
		$data['user'] = $this->user_m->insert($data);//panggil model
		$this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
		redirect('user');
		}

		}	
	}


	public function edit($id){
		$data['title']='Provider';
		$data['page_name']= 'user/edit';

		$data['edit_user']= $this->user_m->get_detail($id)->row();
		$this->load->view('main_layout',$data);
			

	}


	public function edit_account(){
		$data['title']='Provider';
		$data['page_name']= 'user/edit_account';
		$filter=$this->session->userdata('kd_user');
		$data['edit_user']= $this->user_m->get_detail_acc($filter);
		$this->load->view('main_layout',$data);
			

	}


	public function account(){
		$data['title']='Provider';
		$data['page_name']= 'user/account';
		$filter=$this->session->userdata('kd_user');

	    $data['provider'] = $this->user_m->get_me($filter);
	    $this->session->set_flashdata('message', 'Data Berhasil Diupdate');
		$this->load->view('main_layout',$data);
	}




	public function proses_edit(){

		$id['id'] = $this->input->post('id');
		$data = array (
			
			'nama_depan' => $this->input->post('nama_depan'),
			'nama_belakang' => $this->input->post('nama_belakang'),
			'username' => $this->input->post('username'),
			'password'=> sha1($this->input->post('password')),
			'level' => $this->input->post('level'),
			
			);
		$data['user'] = $this->user_m->update($data,$id);//panggil model
		$this->session->set_flashdata('message', 'Data Berhasil Diupdate');
		redirect('user');
	
	}


	public function proses_edit_account(){

		$id['id'] = $this->input->post('id');
		$data = array (
			
			'nama_depan' => $this->input->post('nama_depan'),
			'nama_belakang' => $this->input->post('nama_belakang'),
			'username' => $this->input->post('username'),
			'password'=> sha1($this->input->post('password')),
			
			);
		$data['user'] = $this->user_m->update($data,$id);//panggil model
		$this->session->set_flashdata('message', 'Account Berhasil Diupdate');
		redirect('user/account');
	}

	public function delete($id){
		
		$this->user_m->delete_user($id);
		$this->session->set_flashdata('message', 'Data telah dihapus');
		redirect('user');

	}

}
?>