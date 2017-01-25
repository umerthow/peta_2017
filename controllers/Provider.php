<?php 
class Provider extends CI_Controller{


	public function __construct(){
	parent:: __construct();	
	
	if (! $this->session->userdata('is_login') ){
			
			 redirect('user/login');
		}
	
	
	}

	public function index() {
	$data['title']='Provider ';
	$data['page_name']= 'provider/index';

	$filter=$this->session->userdata('kd_user');
	$data['provider'] = $this->provider_m->get($filter);
	$data['kota']=$this->provider_m->get_kota();

	$this->form_validation->set_rules('nama_persh','nama_provider','required');
	$this->form_validation->set_rules('pemilik','pemilik','required');
	$this->form_validation->set_rules('no_siup','no_siup','required');
	$this->form_validation->set_rules('no_npwp','no_npwp','required');
	$this->form_validation->set_rules('alamat','alamat','required');
	$this->form_validation->set_rules('kota','kota','required');
	$this->form_validation->set_rules('email','email','required');
	$this->form_validation->set_rules('no_telp','telepon','required');

	if (empty($_FILES['cover']['name']))
		{
			$this->form_validation->set_rules('cover','doc_siup','required');
		}

	

	if($this->form_validation->run() == FALSE ){

		$this->load->view('main_layout',$data)	;

	}else {

		//proses insert
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'gif|jpg|png|pdf';
		$config['max_size'] = '2048'; //2mb
		
		$config['file_name'] = 'doc_0';
		$config['overwrite'] = false;
		$this->upload->initialize($config);
		
		if($this->upload->do_upload('cover'))
		{
			$image_data6 = $this->upload->data();
		} else
					{		
						$this->session->set_flashdata('error', '  Upload SIUP  Gagal Dimensi gambar tidak sesuai!');
					    redirect('Provider/profil');
					}

			if($this->upload->do_upload('poster'))
			{
				$image_data2 = $this->upload->data();
			} else
					{		
						$this->session->set_flashdata('error', '  Upload NPWP Gagal Dimensi gambar tidak sesuai!');
					    redirect('Provider/profil');
					}
			


		$data = array (
			
			'kd_user' => $this->input->post('kode_user'),
			'nama_provider' => $this->input->post('nama_persh'),
			'pemilik' => $this->input->post('pemilik'),
			'no_siup' => $this->input->post('no_siup'),
			'no_npwp'=> $this->input->post('no_npwp'),
			'alamat'=> $this->input->post('alamat'),
			'kota'=> $this->input->post('kota'),
			'website'=> $this->input->post('website'),
			'email'=> $this->input->post('email'),
			'telepon'=> $this->input->post('no_telp'),
			'doc_siup'=>$image_data6['file_name'],
			'doc_npwp' => $image_data2['file_name'],
			'keterangan'=> $this->input->post('keterangan'),

			);

				$this->provider_m->insert($data);//panggil model
				$this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
				redirect('Provider/profil');
				} 
	}



	public function profil(){
	$data['title']='Provider';
	$data['page_name']= 'provider/profil';
	$filter = $this->session->userdata('kd_user') ;
	$data['provider'] = $this->provider_m->get_by_profil($filter);
	$this->load->view('main_layout',$data);
	}




	public function edit($id){
		$data['title']='Provider';
		$data['page_name']= 'provider/edit';

		$data['edit_user']= $this->provider_m->get_detail($id)->row();
		$this->load->view('main_layout',$data);
	
	}

	public function proses_edit(){
		$id['id_provider'] = $this->input->post('id_provider');
		$data = array (
						
						'kd_user' => $this->input->post('kode_user'),
						'nama_provider' => $this->input->post('nama_persh'),
						'pemilik' => $this->input->post('pemilik'),
						'no_siup' => $this->input->post('no_siup'),
						'no_npwp'=> $this->input->post('no_npwp'),
						'alamat'=> $this->input->post('alamat'),
						'kota'=> $this->input->post('kota'),
						'website'=> $this->input->post('website'),
						'email'=> $this->input->post('email'),
						'telepon'=> $this->input->post('no_telp'),
						'keterangan'=> $this->input->post('keterangan'),
						'rating'=>$this->input->post('rating')
						);

		if ($_FILES['cover']['name'] != '')
				{

					$config['upload_path'] = './upload/';
					$config['allowed_types'] = 'gif|jpg|png|pdf';
					$config['max_size'] = '2048'; //2mb
					$config['max_width'] = '1024';
					$config['max_height'] = '768';
					$config['file_name'] = 'doc_0';
					$config['overwrite'] = true;
					$this->upload->initialize($config);

					if($this->upload->do_upload('cover'))
					{
						$image_data6 = $this->upload->data();
					}
						if($this->upload->do_upload('poster'))
						{
							$image_data2 = $this->upload->data();
						}

							else
						{
													
							$this->session->set_flashdata('error', ' Update & Upload Gagal Dimensi gambar/file tidak sesuai!');
						    redirect('Provider/profil');
						}


						$data['doc_siup']= $image_data6['file_name'];
						$data['doc_npwp'] = $image_data2['file_name'];
				}
		$data['user'] = $this->provider_m->update($data,$id);//panggil model
		$this->session->set_flashdata('message', 'Data Berhasil Diupdate');
		redirect('Provider/profil');
	}

	public function delete($id){

		$this->provider_m->delete_user($id);
		$this->session->set_flashdata('message', 'Data telah dihapus');
		redirect('Provider');
	}


	public function tambah($id){
	$id=$this->encrypt->decode($id);	
	$data['title']='Provider ';
	$data['page_name']= 'pelatihan/tambah';
	
	
	$data['provider'] = $this->provider_m->get_latih_course($id);
	$data['kategori'] = $this->provider_m->get_kategori();
	$data['kota']= $this->provider_m->get_kota();

	$this->form_validation->set_rules('judul','judul_course','required');
	$this->form_validation->set_rules('kategori','nama_kategori','required');
	$this->form_validation->set_rules('tujuan','tujuan_pelatihan','required');
	
	$this->form_validation->set_rules('tanggal','waktu','required');
	$this->form_validation->set_rules('lokasi','tempat_pelatihan','required');
	$this->form_validation->set_rules('rincian-knowledge','knowledge','required');

	if (empty($_FILES['brosur']['name']))
		{
			$this->form_validation->set_rules('brosur','brosur','required');
		}





	if($this->form_validation->run() == FALSE ){
		$this->load->view('main_layout',$data);
	//	redirect('pelatihan/tambah/',$id)	;

	}else {

		$config['upload_path'] = './brosur/';
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size'] = '2048'; //2mb
				$config['max_width'] = '1024';
				$config['max_height'] = '768';
				$config['file_name'] = 'doc_0';
				$config['overwrite'] = false;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$this->upload->do_upload('brosur');
				$image_data2 = $this->upload->data();

		//proses insert
		$data = array (
			
			'id_provider' => $this->input->post('kode_user'),
			'judul_course' => $this->input->post('judul'),
			'id_kategori' => $this->input->post('kategori'),
			'tujuan_pelatihan' => $this->input->post('tujuan'),
			'kota_course' =>$this->input->post('kota'),
			'waktu'=> $this->input->post('waktu'),
			'tempat_pelatihan'=> $this->input->post('lokasi'),
			'cp'=> $this->input->post('cp'),
			'gatel'=>$image_data2['file_name'],
			
			);

		 $this->provider_m->tambah_latih($data);
		 $this->session->set_flashdata('berhasil', 'Data pelatihan berhasil ditambah');
		echo "salah";

	    }
	}

	public function tambah_pb($id){
	$id=$this->encrypt->decode($id);		
	$data['title']='Provider ';
	$data['page_name']= 'pelatihan/tambah_pendidikan_berjenjang';
	
	
	$data['provider'] = $this->provider_m->get_latih_course($id);
	$data['kategori'] = $this->provider_m->get_kategori();
	$data['kota']= $this->provider_m->get_kota();

	$this->form_validation->set_rules('judul','judul_course','required');
	$this->form_validation->set_rules('kategori','nama_kategori','required');
	$this->form_validation->set_rules('tujuan','tujuan_pelatihan','required');
	
	$this->form_validation->set_rules('tanggal','waktu','required');
	$this->form_validation->set_rules('lokasi','tempat_pelatihan','required');
	$this->form_validation->set_rules('rincian-knowledge','knowledge','required');

	if (empty($_FILES['brosur']['name']))
		{
			$this->form_validation->set_rules('brosur','brosur','required');
		}





	if($this->form_validation->run() == FALSE ){
		$this->load->view('main_layout',$data);
	//	redirect('pelatihan/tambah/',$id)	;

	}else {

		$config['upload_path'] = './brosur/';
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size'] = '2048'; //2mb
				$config['max_width'] = '1024';
				$config['max_height'] = '768';
				$config['file_name'] = 'doc_0';
				$config['overwrite'] = false;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$this->upload->do_upload('brosur');
				$image_data2 = $this->upload->data();

		//proses insert
		$data = array (
			
			'id_provider' => $this->input->post('kode_user'),
			'judul_course' => $this->input->post('judul'),
			'id_kategori' => $this->input->post('kategori'),
			'tujuan_pelatihan' => $this->input->post('tujuan'),
			'kota_course' =>$this->input->post('kota'),
			'waktu'=> $this->input->post('waktu'),
			'tempat_pelatihan'=> $this->input->post('lokasi'),
			'cp'=> $this->input->post('cp'),
			'gatel'=>$image_data2['file_name'],
			
			);

		 $this->provider_m->tambah_latih($data);
		 $this->session->set_flashdata('berhasil', 'Data pelatihan berhasil ditambah');
		echo "salah";

	    }
	}


	public function tambah_kan(){
	$data['title']='Provider ';
	$data['page_name']= 'pelatihan/tambah';
	//$data2['page_name']= 'provider/index';

	$filter=$this->session->userdata('kd_user');
	$this->form_validation->set_rules('judul','judul_course','required');
	$this->form_validation->set_rules('kategori','nama_kategori','required');
	$this->form_validation->set_rules('tujuan','tujuan_pelatihan','required');
	$this->form_validation->set_rules('tanggal','waktu','required');
	$this->form_validation->set_rules('lokasi','tempat_pelatihan','required');
	$this->form_validation->set_rules('rincian-knowledge','knowledge','required');

	if($this->form_validation->run() == FALSE ){

		$this->session->set_flashdata('error', 'Data Tidak Lengkap,  Ulangi!');
		redirect('Provider/profil');

		}else 

		 {


			
			//$this->load->library('upload', $config);
			//$this->upload->initialize($config);

						
			if($this->upload->do_upload('brosur'))
			{
				$image_data2 = $this->upload->data();
			
			}
			
//proses update

				$config['upload_path'] = './brosur/';
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size'] = '2048'; //2mb
			
				$config['overwrite'] = false;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$this->upload->do_upload('brosur');
				$image_data2 = $this->upload->data();
				$data = array (

					'id_provider' => $this->input->post('kode_user'),
					'judul_course' => $this->input->post('judul'),
					'id_kategori' => $this->input->post('kategori'),
					'tujuan_pelatihan' => $this->input->post('tujuan'),
					'waktu_in'=> $this->input->post('tanggal'),
					'waktu_out'=> $this->input->post('tanggal_out'),
					'kota_course' =>$this->input->post('kota'),
					'tempat_pelatihan'=> $this->input->post('lokasi'),
					'cp'=> $this->input->post('cp'),
					'gatel'=>$image_data2['file_name'],
					'content'=> $this->input->post('telp_cp'),
					'skill'=>$this->input->post('rincian-skill'),
					'knowledge'=>$this->input->post('rincian-knowledge'),
					'attitude'=>$this->input->post('rincian-attitude3'),
					'attitude1'=>$this->input->post('rincian-attitude[0]'),
					 'attitude2'=>$this->input->post('rincian-attitude[1]'),
					 'attitude3'=>$this->input->post('rincian-attitude[2]'),
					 'attitude4'=>$this->input->post('rincian-attitude[3]'),
					 'attitude5'=>$this->input->post('rincian-attitude[4]'),
					 'attitude6'=>$this->input->post('rincian-attitude[5]'),
					 'attitude7'=>$this->input->post('rincian-attitude[6]'),
					'biaya_course'=> $this->input->post('biaya'),
					);
				
				 $this->provider_m->tambah_latih($data);
				 $this->session->set_flashdata('berhasil', ' Data pelatihan berhasil ditambah');
				 redirect('Provider/profil');
				}
}

	public function proses_tambah_pb(){
	$filter=$this->session->userdata('kd_user');
	$this->form_validation->set_rules('judul','judul_course','required');
	$this->form_validation->set_rules('kategori','nama_kategori','required');
	$this->form_validation->set_rules('tanggal','waktu','required');
	$this->form_validation->set_rules('lokasi','tempat_pelatihan','required');

	if($this->form_validation->run() == FALSE ){

		$this->session->set_flashdata('error', 'Data Tidak Lengkap,  Ulangi!');
		redirect('Provider/profil');

		}else 

		 {


			
			//$this->load->library('upload', $config);
			//$this->upload->initialize($config);

						
			if($this->upload->do_upload('brosur'))
			{
				$image_data2 = $this->upload->data();
			
			}
			
//proses update

				$config['upload_path'] = './brosur/';
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size'] = '2048'; //2mb
			
				$config['overwrite'] = false;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$this->upload->do_upload('brosur');
				$image_data2 = $this->upload->data();
				$data = array (

					'id_provider' => $this->input->post('kode_user'),
					'judul_course' => $this->input->post('judul'),
					'id_kategori' => $this->input->post('kategori'),
					'waktu_in'=> $this->input->post('tanggal'),
					'waktu_out'=> $this->input->post('tanggal_out'),
					'kota_course' =>$this->input->post('kota'),
					'tempat_pelatihan'=> $this->input->post('lokasi'),
					'cp'=> $this->input->post('cp'),
					'gatel'=>$image_data2['file_name'],
					'biaya_course'=> $this->input->post('biaya'),
					);
				
				 $this->provider_m->tambah_pddk_bj($data);
				 $this->session->set_flashdata('berhasil', ' Data pelatihan berhasil ditambah');
				 redirect('Provider/tujuan_pelatihan');
				}
				

	}

	public function tujuan_pelatihan(){

	$data['title']='Provider ';
	$data['page_name']= 'pelatihan/tujuan';

	$data['course'] = $this->provider_m->get_latih_pddk();

	$this->load->view('main_layout',$data);
	}

	public function tambah_kan_tujuan(){
		$id_course= $this->input->post('id_course');
		$id_provider= $this->input->post('id_provider');
		$tujuan = $this->input->post('tujuan_pelatihan');

		  $count = count($_POST['tujuan_pelatihan']);
		  for($i=0; $i<$count; $i++) {
		       $data = array(
		               'id_course'=>$id_course,
		               'id_provider' =>$id_provider,
		               'tujuan_pelatihan' => $tujuan[$i], 
		               'status' => 0
		                );
       $this->db->insert('ttujuan_course', $data); 
   }
	 $this->session->set_flashdata('berhasil', ' Data pelatihan berhasil ditambah');
	 redirect('Provider/profil');			

	}



	public function list_pelatihan($id){
	$id=$this->encrypt->decode($id);
	$data['title']='Provider ';
	$data['page_name']= 'pelatihan/list';
	$filter=$this->session->userdata('kd_user');
	$data['provider'] = $this->provider_m->get_course($id);
	$data['list_pddk'] = $this->provider_m->get_all_pddk_course($filter,$id);

	$this->load->view('main_layout',$data)	;
	
	
	// }
	
	
	// if (count($data) > 0 ) {
	
	// $this->load->view('main_layout',$data)	;
	
	// }else {
	// 	$this->session->set_flashdata('message', 'Record Not Found');
	// 	$this->load->view('main_layout',$data)	;
	// }

	}

	public function detail($id){

		$filter=$this->session->userdata('kd_user');
		$row = $this->provider_m->get_latih($id);
		if ($row) {

			$data = array (
				'nama_provider'=>$row->nama_provider,
				'id_course' => $row->id_course,
				'judul_course' => $row->judul_course,
				'tujuan_pelatihan'=>$row->tujuan_pelatihan,
				'nama_kategori'=>$row->nama_kategori,
				'waktu_in'=>$row->waktu_in,
				'waktu_out'=>$row->waktu_out,
				'tempat_pelatihan'=>$row->tempat_pelatihan,
				'kota_course'=>$row->kota_course,
				'cp'=>$row->CP,
				'content'=>$row->content,
				'skill'=>$row->skill,
				'knowledge'=>$row->knowledge,
				'attitude'=>$row->attitude,
				'attitude1'=>$row->attitude1,
				'attitude2'=>$row->attitude2,
				'attitude3'=>$row->attitude3,
				'attitude4'=>$row->attitude4,
				'attitude5'=>$row->attitude5,
				'attitude6'=>$row->attitude6,
				'attitude7'=>$row->attitude7,
				'biaya_course'=>$row->biaya_course,
				'gatel'=>$row->gatel,
				'rating' =>$row->rating
				
				);

		}
		if(empty($data)) { 

				$data['title']='Provider ';
				$data['page_name']= 'pelatihan/detail';
				$this->session->set_flashdata('cook', ' Data not found');
				$this->load->view('main_layout', $data);

		} else{



		$format = 'DATE_RFC822';
		$time = time();
		$data['title']='Provider ';
		$data['page_name']= 'pelatihan/detail';
		$this->load->view('main_layout', $data);

	 }
	}

	public function delete_pelatihan($id){

		$this->provider_m->delete_latih($id);
		$this->session->set_flashdata('message', 'Data telah dihapus');
		redirect('Provider/profil');
	}

	public function delete_pelatihan_pddk($id){
		$this->provider_m->delete_latih_pddk($id);
		$this->session->set_flashdata('message', 'Data telah dihapus');
		redirect('Provider/profil');

	}


	public function update_pelatihan($id){

		$data['title']='Provider';
		$data['page_name']= 'pelatihan/edit';
		$data['kategori']=$this->provider_m->get_kategori();
		$data['kota']= $this->provider_m->get_kota();
		$data['edit_pelatihan']= $this->provider_m->detail_pelatihan($id)->row();

		$this->load->view('main_layout',$data);
	}


	public function proses_edit_pelatihan(){

		$id['id_course'] = $this->input->post('kode_user');
		$data = array (
			
			'id_provider' => $this->input->post('id_provider'),
			'id_kategori' => $this->input->post('idkategori'),
			'judul_course' => $this->input->post('judul'),
			'tujuan_pelatihan' => $this->input->post('tujuan'),
			'waktu_in'=> $this->input->post('waktu_in'),
			'waktu_out'=> $this->input->post('waktu_out'),
			'kota_course' =>$this->input->post('kota'),
			'tempat_pelatihan'=> $this->input->post('lokasi'),
			'cp'=> $this->input->post('cp'),
			'content'=> $this->input->post('telp_cp'),
			'skill' => $this->input->post('rincian-skill'),
			'knowledge' => $this->input->post('rincian-knowledge'),
			'attitude' => $this->input->post('rincian-attitude'),
			'attitude1' => $this->input->post('attitude1'),
			'attitude2' => $this->input->post('attitude2'),
			'attitude3' => $this->input->post('attitude3'),
			'attitude4' => $this->input->post('attitude4'),
			'attitude5' => $this->input->post('attitude5'),
			'attitude6' => $this->input->post('attitude6'),
			'attitude7' => $this->input->post('attitude7'),
			'biaya_course'=> $this->input->post('biaya'),
			
			);

				if ($_FILES['brosur']['name'] != '')
				{
					$config['upload_path'] = './brosur/';
					$config['allowed_types'] = 'gif|jpg|png|pdf';
					$config['max_size'] = '2048'; //2mb
					
					$this->upload->initialize($config);
						
					if($this->upload->do_upload('brosur'))
					{
						$image_data = $this->upload->data();
					} 
					else
					{		
						$this->session->set_flashdata('error', ' Update & Upload Gagal Dimensi gambar tidak sesuai!');
					    redirect('Provider/profil');
					}
						$data['gatel'] = $image_data['file_name'];
				}
			 $this->provider_m->update_latih($data,$id);
			 $this->session->set_flashdata('berhasil', ' Data pelatihan berhasil diupdate');
			redirect('provider/profil');		
		}


	public function list_provider(){

	$keyword = '';
	$data['title']='Provider';
	$data['page_name']= 'provider/prov';
	

	//pagging
		$data['base_url']=site_url('provider/list_provider/');
		$data['total_rows']=$this->provider_m->get_total_rows();
		$data['per_page'] =5;

//config for bootstrap pagination class integration
		$data['full_tag_open'] = "<ul class='pagination' style='float: right'>";
		$data['full_tag_close'] ="</ul>";
		$data['num_tag_open'] = "<li>";
		$data['num_tag_close'] = "</li>";
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

		//inisialisasi
		$this->pagination->initialize($data);
		//buat paggingnya
		$data['pagination']=$this->pagination->create_links();
		$data['keyword']=$keyword;
		
		$limit=$data['per_page']; //batas data dalam 1 halaman
		$offset=$this->uri->segment(3) ? $this->uri->segment(3) : 0; // uri 1= nama controller, uri 2= method, mengambil url yg ke 3  (nama lain dari if else)
		$data['offset'] = $offset;
		$data['prov'] = $this->provider_m->get_all($limit,$offset);

		$this->load->view('main_layout',$data);


	}

	public function search_list(){
	$keyword = $this->uri->segment(3, $this->input->post('keyword', TRUE));
	$kata_kunci = $this->input->post('keyword');
	$data['title']='Provider';
	$data['keyword']=$keyword;
	$data['page_name']= 'provider/search_prov';
	$data['prov'] = $this->provider_m->get_pencarian_provider($kata_kunci);
	$this->load->view('main_layout',$data);
	}

	public function pelatihan_all(){

		$data['title']='Provider';
		$data['page_name']= 'pelatihan/pelatihan_all';

		//pagging
		
		$data['prov'] = $this->provider_m->get_all_course_all();



	    $this->load->view('main_layout',$data);


	}



	public function detail_provider($id){

		$row = $this->provider_m->get_provider($id);
		if ($row) {

			$data = array (
				'nama_provider'=>$row->nama_provider,
				'pemilik'=>$row->pemilik,
				'no_siup'=>$row->no_siup,
				'no_npwp'=>$row->no_npwp,
				'alamat'=>$row->alamat,
				'kota'=>$row->kota,
				'website'=>$row->website,
				'email'=>$row->email,
				'telepon'=>$row->telepon,
				'doc_siup'=>$row->doc_siup,
				'doc_npwp'=>$row->doc_npwp,
				'keterangan'=>$row->keterangan,
				'rating' =>$row->rating
				);

		}

		$data['list_pelatihan'] = $this->provider_m->get_course($id);
	
		$data['title']='Provider';
		$data['page_name']= 'provider/detail_prov';
		$this->load->view('main_layout', $data);


	}



		public function account(){
		$data['title']='Provider';
		$data['page_name']= 'provider/account';

		$this->load->view('main_layout', $data);


}



	public function course_filter(){
		$data['title']='Provider';
		$data['page_name']= 'verifikasi/index';


		$data['base_url']=site_url('provider/course_filter/');
		$data['total_rows']=$this->provider_m->get_total_rows_course();
		$data['per_page'] =4;
		$config['page_query_string'] = FALSE;
		//config for bootstrap pagination class integration
		$data['full_tag_open'] = "<ul class='pagination' style='float: right'>";
		$data['full_tag_close'] ="</ul>";
		$data['num_tag_open'] = "<li>";
		$data['num_tag_close'] = "</li>";
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

		$data['uri_segment'] = 3;
		$data['prefix'] = "";
		$offset=$this->uri->segment(4) ? $this->uri->segment(4) : 0;
		$data['suffix'] = "/".$this->uri->segment(4)."/".$this->uri->segment(5)."/";
		//$data['first_url'] = $base_uri."/0/".$this->uri->segment(4)."/".$this->uri->segment(5)."/";
		


		$this->pagination->initialize($data);
		//buat paggingnya
		$data['pagination']=$this->pagination->create_links();
		$limit=$data['per_page'];

//pagging menu tab 2

		$data2['base_url']=site_url('provider/course_filter/');
		$data2['total_rows']=$this->provider_m->get_total_rows_course_3();
		$data2['per_page'] =4;

		//config for bootstrap pagination class integration
		$data2['full_tag_open'] = "<ul class='pagination' style='float: right'>";
		$data2['full_tag_close'] ="</ul>";
		$data2['num_tag_open'] = "<li>";
		$data2['num_tag_close'] = "</li>";
		$data2['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$data2['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$data2['next_tag_open'] = "<li>";
		$data2['next_tagl_close'] = "</li>";
		$data2['prev_tag_open'] = "<li>";
		$data2['prev_tagl_close'] = "</li>";
		$data2['first_tag_open'] = "<li>";
		$data2['first_tagl_close'] = "</li>";
		$data2['last_tag_open'] = "<li>";
		$data2['last_tagl_close'] = "</li>";
		$offset2=$this->uri->segment(4) ? $this->uri->segment(4) : 0;
		$this->pagination->initialize($data2);
		//buat paggingnya
		$data2['pagination']=$this->pagination->create_links();
		$limit2=$data2['per_page'];


//pagging menu tab 3


		$data3['base_url']=site_url('verifikasi/index/');
		$data3['total_rows']=$this->provider_m->get_total_rows_course_4();
		$data3['per_page'] =10;
		$data3['page_query_string'] = FALSE;
		//config for bootstrap pagination class integration
		$data3['full_tag_open'] = "<ul class='pagination' style='float: right'>";
		$data3['full_tag_close'] ="</ul>";
		$data3['num_tag_open'] = "<li>";
		$data3['num_tag_close'] = "</li>";
		$data3['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$data3['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$data3['next_tag_open'] = "<li>";
		$data3['next_tagl_close'] = "</li>";
		$data3['prev_tag_open'] = "<li>";
		$data3['prev_tagl_close'] = "</li>";
		$data3['first_tag_open'] = "<li>";
		$data3['first_tagl_close'] = "</li>";
		$data3['last_tag_open'] = "<li>";
		$data3['last_tagl_close'] = "</li>";

		$this->pagination->initialize($data3);
		//buat paggingnya
		$data3['pagination']=$this->pagination->create_links();
		$limit3=$data3['per_page'];


		 //batas data dalam 1 halaman
		$offset3=$this->uri->segment(4) ? $this->uri->segment(4) : 0; // uri 1= nama controller, uri 2= method, mengambil url yg ke 3  (nama lain dari if else)
		$data['prov'] = $this->provider_m->get_all_course($limit,$offset);
		$data['prov_approved'] = $this->provider_m->get_all_course_approved($limit2,$offset2,$data2);
		$data['prov_rejected'] = $this->provider_m->get_all_course_rejected($limit3,$offset3,$data3);		
		$this->load->view('main_layout', $data,$data2,$data3);

	}


	public function terms(){

		$data['title']='Provider';
		$data['page_name']= 'provider/terms_cond';
		$this->load->view('main_layout',$data);

	}

	public function contacts(){

		$data['title']='Provider';
		$data['page_name']= 'provider/contact_us';

		$this->form_validation->set_rules('name','nama anda','required');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('message','message','required');


		if($this->form_validation->run() == FALSE ){

		$this->load->view('main_layout',$data)	;

		} else {

		//insert message

		date_default_timezone_set('Asia/Jakarta');      //Don't forget this..I had used this..just didn't mention it in the post

		$datetime_variable = new DateTime();
		$datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');
		
		$data = array (
			
			'kd_user' => $this->input->post('kode_user'),
			'fullname' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'message' =>$this->input->post('message'),
			'date' => $datetime_formatted

			);

				$this->provider_m->sendmessage($data);//panggil model
				$this->session->set_flashdata('message', ' Terkima Kasih , Pesan Anda sudah terkirim');
				redirect('Provider/contacts');
			}
	}



	public function cek_pesan(){
		$data['title']='Provider';
		$data['page_name']= 'provider/cek_pesan';
		$data['pesan']=$this->provider_m->get_message();
		$this->load->view('main_layout',$data);


	}

		public function cek_pesan_limit(){
		$data['title']='Provider';
		$data['page_name']= 'provider/cek_pesan';
		$data['pesan2']=$this->provider_m->get_message_limit();
		$this->load->view('main_layout',$data);


	}

	public function pernyataan(){

	$this->form_validation->set_rules('pernyataan','pernyataan','required');

	if($this->form_validation->run() == FALSE ){

		$this->session->set_flashdata('warning', ' Maaf, Anda belum Checklist');
		redirect('Provider/terms')	;

	}else {

	$filter=$this->session->userdata('kd_user');
	$data['status'] = $this->input->post('pernyataan');
	$this->provider_m->pernyataan_m($filter,$data);
	$this->session->set_flashdata('message', ' Terkima Kasih , Silahkan Logout dan Login Kembali');
	redirect('Provider/terms');

		}

	}



	public function cetak_pelatihan($id){
		$this->load->library('FPDF');
		$this->load->helper('tanggal_helper');

		$data['kategori']=$this->provider_m->get_kategori();
		$data['kota']= $this->provider_m->get_kota();
		$data['hasil'] = $this->provider_m->get_training_cetak($id);
		$data['cetak'] = $this->provider_m->get_latih($id);
		$data['user'] = $this->provider_m->get_by_user();
		$data['total'] = count($data['hasil']);

		$this->load->view('pages/pelatihan/cetak_course',$data);
	}

	function test_ajax(){
		$data['page_name']= 'provider/test_ajax';
		$data['murid'] = $this->provider_m->get_murid();
		
		$this->load->view('main_layout',$data);

	}

	public function save_murid(){
		 

			$nama_murid=$this->input->post("nama_murid");
			$alamat_murid=$this->input->post("alamat_murid");
			$paket_murid=$this->input->post("paket_murid");
			$tanggal_daftar=$this->input->post("tanggal_daftar");
			$status_murid=$this->input->post("status_murid");

			$this->db->query("INSERT INTO murid (nama_lengkap,alamat,paket,date,status) VALUES ('$nama_murid','$alamat_murid','$paket_murid','$tanggal_daftar',$status_murid)");
				
		
	}
 }
?>