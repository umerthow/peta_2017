<?php


class Panel_user extends CI_controller{


private $forum;

public function __construct(){
	parent:: __construct();	
	
 	$this->load->library('FPDF');
	$this->db->reconnect();
	
	}



	public function index(){
	
	$data['title']='Provider';
	$data['page_name']= 'panel_user/index';


		if (isset($_POST['q'])) {
			$data['ringkasan'] = $this->input->post('cari');
			// se session userdata untuk pencarian, untuk paging pencarian
			$this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
		}
		else {
			$data['ringkasan'] = $this->session->userdata('sess_ringkasan');
		}


		
	
		//$this->db->like('judul_course', $data['ringkasan']);
     


	$limit=2;	
	$data['prov_approved'] = $this->provider_m->get_all_course_approved($data['ringkasan'],$limit);
	$data['pddk_bj'] = $this->provider_m->get_all_pddk_bj();
	$data['kategori'] = $this->provider_m->get_kategori();
	$data['edit_user']= $this->panel_user_m->get_all_comment();
	$this->load->view('main_layout_panel',$data);


	} 

	public function authentifikasi(){
	 $username =  $_GET["user"];
	 $password =  $_GET["pass"];
	 $user= $this->panel_user_m->get_by_username_password_auth($username,$password);

			if ($user)
			{
				//buiat session
								$data_user = array(
								'fullname' =>$user->fullname,
								'ID_User'	=>$user->ID_User,
								'NIP' 		=>$user->NIP,
								'group'     =>$user->group,
								'email'		=>$user->email,
								'dah_login' => TRUE
								);
								
				$this->session->set_userdata($data_user);
				redirect('panel_user');
			}
				else
				{
					//pesan gagal
					$this->session->set_flashdata('error','Username dan Password Anda Salah!');
					redirect('panel_user');
				}
	}

	public function calender_panel(){

	//header('Content-type:application/json');
		//$data = json_encode($this->verifikasi_m->get_date());


	$fp = fopen('./phplec/json/events.json', 'w');
	fwrite($fp,json_encode($this->verifikasi_m->get_date()));
	fclose($fp);



	$vars['title']='Provider';
	$vars['page_name']= 'panel_user/calendar_course';
	$vars['result']=$this->verifikasi_m->get_date();

	$this->load->view('main_layout_panel',$vars);


	}

	public function tanggal(){

	

	$data['title']='Provider';
	$data['page_name']= 'panel_user/tanggal';

	$this->load->view('main_layout_panel',$data);

	



	}


	public function test(){

		header('Content-type:application/json');
		//$data = json_encode($this->verifikasi_m->get_date());


		 $fp = fopen('./phplec/json/events.json', 'w');
	     fwrite($fp, json_encode($this->verifikasi_m->get_date()));

	   //  if ( ! write_file('./eur_countries_array.json', $arr))
	   //  {
	   //      echo 'Unable to write the file';
	   //  }
	   //  else
	   //  {
	   //      echo 'file written';
	   //  }   
	    // $this->load->view('european_countries_view', $data);




	}


	public function tambah_course(){

		$myJSVar = $this->input->post('myOrderString');
		echo $myJSVar;
	}



	public function login(){
		$data['title']='Provider';
		$data['page_name']= 'panel_user/index';

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
			$user= $this->panel_user_m->get_by_username_password($username,$password);

			if ($user)
			{
				//buiat session
								$data_user = array(
								'fullname' =>$user->fullname,
								'ID_User'	=>$user->ID_User,
								'NIP' 		=>$user->NIP,
								'group'     =>$user->group,
								'email'		=>$user->email,
								'dah_login' => TRUE
								);
								
				$this->session->set_userdata($data_user);
				redirect('panel_user');
			}
				else
				{
					//pesan gagal
					$this->session->set_flashdata('error','Username dan Password Anda Salah!');
					redirect('panel_user');
				}
			}
	}


	public function logout()
	{
		
		$data_user = array (
		'fullname',
		'id',
		'dah_login',
		
		
		);
		$this->session->unset_userdata($data_user);
		$this->session->sess_destroy();
	
		redirect('panel_user');
			
		
		
	}

	public function detail($id){
	$id=$this->encrypt->decode($id);
	if (! $this->session->userdata('dah_login') ){
			
			 $this->session->set_flashdata('message', ' Silahkan Login Dahulu Untuk Mendaftar Pelatihan');
			 redirect('panel_user');

		}
	$nip = $this->session->userdata('NIP');	
	$cek_laporan= $this->panel_user_m->cek_laporan_peserta($nip);	
	if( count($cek_laporan) >  1 ){
		 $this->session->set_flashdata('message', ' Administrasi laporan pelatihan Anda masih ada yang belum selesai, cek di : <br/><br/><h4>Dashbard Menu <span class="label label-danger">Service / Pelatihanku </span></h4>');
		 redirect('panel_user');
	}


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
				//'biaya_course'=>$row->biaya_course,
				'gatel'=>$row->gatel,
				'rating'=>$row->rating
				
				);

		}
		if(empty($data)) { 

				$data['title']='Provider ';
				$data['page_name']= 'Pelatihan/detail';
				$this->session->set_flashdata('cook', ' Data not found');
				$this->load->view('main_layout_panel', $data);

		} else{



			$kategori = $row->id_kategori;
			$data['title']='Provider';
			$data['page_name']= 'panel_user/detail';
			$data['rekomendation'] = $this->panel_user_m->get_all_course_limit($kategori);
			$this->load->view('main_layout_panel',$data);

	}

}

public function detail_ajax(){
	$id = $_POST['id'];
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
				//'biaya_course'=>$row->biaya_course,
				'gatel'=>$row->gatel,
				'rating'=>$row->rating
				
				);

		}
		if(empty($data)) { 

				$data['title']='Provider ';
				$data['page_name']= 'Pelatihan/detail';
				$this->session->set_flashdata('cook', ' Data not found');
				//$this->load->view('pages/panel_user/get_course_view',$data);
				//$this->load->view('main_layout_panel', $data);

		} else{



			$kategori = $row->id_kategori;
			$data['title']='Provider';
			$data['page_name']= 'panel_user/detail';
			$data['rekomendation'] = $this->panel_user_m->get_all_course_limit($kategori);
			$this->load->view('pages/panel_user/get_course_view',$data);
			//$this->load->view('main_layout_panel',$data);

	}
	// echo " AAAA ".$id."";
}


public function get_rekomendation_course(){

	$data = $this->panel_user_m->get_all_course_limit(4);
	echo json_encode($data);

}

public function get_rekomendation_limit($kategori){
	$data = $this->panel_user_m->get_all_course_limit($kategori);

}


public function detail_pddk_bj($id){
	$id=$this->encrypt->decode($id);
	if (! $this->session->userdata('dah_login') ){
			
			 $this->session->set_flashdata('message', ' Silahkan Login Dahulu Untuk Mendaftar Pelatihan');
			 redirect('panel_user');

		}

	
	$row = $this->provider_m->get_one_pddk_bj($id);
	
//$data['detail']=$this->provider_m->get_all_pddk_course_tujuan($id);

	if ($row) {

			$data = array (
				'nama_provider'=>$row->nama_provider,
				'id_course' => $row->id_course,
				'judul_course' => $row->judul_course,
				'nama_kategori'=>$row->nama_kategori,
				'waktu_in'=>$row->waktu_in,
				'waktu_out'=>$row->waktu_out,
				'tempat_pelatihan'=>$row->tempat_pelatihan,
				'kota_course'=>$row->kota_course,
				'cp'=>$row->CP,
				//'biaya_course'=>$row->biaya_course,
				'gatel'=>$row->gatel,
				'rating'=>$row->rating
				
				);

		}



			$data['tujuan_pelatihan'] = $this->provider_m->get_all_pddk_course_tujuan($id);

		
		if(empty($data)) { 

				$data['title']='Provider ';
				$data['page_name']= 'panel_user/detail_pddk_bj';
				$this->session->set_flashdata('cook', ' Data not found');
				$this->load->view('main_layout_panel', $data);

		} else{


			

			$data['title']='Provider';
			$data['page_name']= 'panel_user/detail_pddk_bj';

			$this->load->view('main_layout_panel',$data);

	}

}


public function about(){
			$data['title']='Provider';
			$data['page_name']= 'panel_user/about';

			$this->load->view('main_layout_panel',$data);

	}


	public function daftar($id){
			$filter=$this->session->userdata('NIP');
			
			$row = $this->provider_m->get_latih($id);
			$data = array (
				'nama_provider'=>$row->nama_provider,
				'id_course' => $row->id_course,
				'id_provider' => $row->id_provider,
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
				//'biaya_course'=>$row->biaya_course,
				'gatel'=>$row->gatel,
				'rating'=>$row->rating,
				
				
				);

			$data['edit_user']= $this->panel_user_m->get_by_user($filter)->row();
			$data['atasan'] = $this->panel_user_m->get_atasan()->result_array();
			$this->session->set_userdata($data);
			$data['title']='Provider';
			$data['page_name']= 'panel_user/pendaftaran';


			$this->load->view('main_layout_panel',$data);
	}

	public function daftar_pddk($id){
			$id=$this->encrypt->decode($id);
			$filter=$this->session->userdata('NIP');
			
			$row = $this->provider_m->get_latih_bjjg($id);
			$data = array (
				'nama_provider'=>$row->nama_provider,
				'id_course' => $row->id_course,
				'id_provider' => $row->id_provider,
				'judul_course' => $row->judul_course,
				'nama_kategori'=>$row->nama_kategori,
				'waktu_in'=>$row->waktu_in,
				'waktu_out'=>$row->waktu_out,
				'tempat_pelatihan'=>$row->tempat_pelatihan,
				'kota_course'=>$row->kota_course,
				'cp'=>$row->CP,
				//'biaya_course'=>$row->biaya_course,
				'gatel'=>$row->gatel,
				'rating'=>$row->rating,
				
				);

			$data['edit_user']= $this->panel_user_m->get_by_user($filter)->row();
			$data['atasan'] = $this->panel_user_m->get_atasan()->result_array();
			$this->session->set_userdata($data);
			$data['title']='Provider';
			$data['page_name']= 'panel_user/pendaftaran_pnddk';


			$this->load->view('main_layout_panel',$data);
	}



	public function daftarkan(){
		define("MESABOT_TOKEN","Ohf3rNTudcT5SkpOh2a0caZeMX2bNHeJuCQD7HSz");
		$this->load->library('Mesabot');
		
		$inputan = $this->input->post('nama_group');

		$id_course = $this->input->post('id_course');
		$nip = $this->input->post('nip');
		$user = $this->panel_user_m->get_by_nip_course($id_course,$nip);

		if ($user){

			$this->session->set_flashdata('message', 'Maaf ,  Anda Sudah Mendaftar Pelatihan ini silahkan tunggu untuk diproses');
			redirect('panel_user');

		} else {



					date_default_timezone_set('Asia/Jakarta');      //Don't forget this..I had used this..just didn't mention it in the post
					$datetime_variable = new DateTime();
					$datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');
					$pesan = "Bawahan Anda telah mendaftar Pelatihan melalui PetA Perumnas, silahkan cek email Anda untuk melakukan Verifikasi .Thanks PSDM PUSAT";

					$data = array ( 

						'ID_User' => $this->input->post('id_user'),
						'ID_Pegawai' => $this->input->post('id_pegawai'),
						'id_provider' =>$this->input->post('id_prov'),
						'id_course' => $this->input->post('id_course'),
						'NIP' => $this->input->post('nip'),
						'Nama_pegawai' =>$this->input->post('nama_peserta'),
                        'email_pegawai' => $this->session->userdata('email'),
						'jabatan'=>$this->input->post('jabatan'),
						'unit_kerja' => $this->input->post('unor'),
						'no_hp' =>$this->input->post('no_hp'),
						'nama_atasan' => $this->input->post('atasan_nama'),
						'no_hp_atasan' => $this->input->post('atasan_hp'),
						'email_atasan' => $this->input->post ('atasan_email'),
						'keterangan' => $this->input->post('keterangan'),
						'date' => $datetime_formatted,
						);


					try {

						    // 1 phone number
						    $data2 = [
						        'destination' => $this->input->post('atasan_hp'),
						        'text' => $pesan
						    ];

						    // boradcast
						    // $data = [
						    //     'destination' => ['phone_number1','phone_number2'],
						    //     'text' => 'test'
						    // ];

						    $mesabot = new Mesabot();
						    $mesabot->sms($data2);
						   // print_r($mesabot->response());
						} catch (Exception $e) {
						    echo $e->getMessage();
						}



					$this->session->set_userdata($data);
					$this->panel_user_m->registration($data);
				//$this->session->set_flashdata('message', ' Yea , Pendaftaran Training Berhasil ');
					redirect('panel_user/checkpoint_daf');
			}
	}


	public function daftarkan_pnddk(){

		$id_course = $this->input->post('id_course');
		$nip = $this->input->post('nip');
		$user = $this->panel_user_m->get_by_nip_pnddk($id_course,$nip);

		if ($user){

			$this->session->set_flashdata('message', 'Maaf ,  Anda Sudah Mendaftar Pelatihan ini silahkan tunggu untuk diproses');
			redirect('panel_user');

		}else {



					date_default_timezone_set('Asia/Jakarta');      //Don't forget this..I had used this..just didn't mention it in the post
					$datetime_variable = new DateTime();
					$datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');

					$data = array ( 

						'ID_User' => $this->input->post('id_user'),
						'ID_Pegawai' => $this->input->post('id_pegawai'),
						'id_provider' =>$this->input->post('id_prov'),
						'id_course' => $this->input->post('id_course'),
						'NIP' => $this->input->post('nip'),
						'Nama_pegawai' =>$this->input->post('nama_peserta'),
                        'email_pegawai' => $this->session->userdata('email'),
						'jabatan'=>$this->input->post('jabatan'),
						'unit_kerja' => $this->input->post('unor'),
						'no_hp' =>$this->input->post('no_hp'),
						'nama_atasan' => $this->input->post('atasan_nama'),
						'no_hp_atasan' => $this->input->post('atasan_hp'),
						'email_atasan' => $this->input->post ('atasan_email'),

						'nama_bawahan' => $this->input->post('bawahan_nama'),
						'no_hp_bawahan' => $this->input->post('bawahan_hp'),
						'email_bawahan' => $this->input->post ('bawahan_email'),

						'nama_rekan' => $this->input->post('rekan_nama'),
						'no_hp_rekan' => $this->input->post('rekan_hp'),
						'email_rekan' => $this->input->post ('rekan_email'),
						'keterangan' => $this->input->post('keterangan'),
						'date' => $datetime_formatted,
						);

					$this->session->set_userdata($data);
					$this->panel_user_m->registration_pddk($data);
					//$this->session->set_flashdata('message', ' Yea , Pendaftaran Training Berhasil ');
					redirect('panel_user/checkpoint_daf_pddk');
			}

	}
	



	public function check_daftar(){

		$data['title']='Provider';
		$data['page_name']= 'panel_user/check_daftar';
		$filter=$this->session->userdata('id_tp');
		$this->load->view('main_layout_panel',$data,$filter);

		$sesinya = $this->db->get('tview_trans_pelatihan','$filter')->row();

		if ($sesinya)
			{
				
				//buiat session
								$data_training = array(
								'id_tp' =>$sesinya->id_tp,
								'email_atasan' =>$sesinya->email_atasan,
								'dah_masuk' => TRUE
								);
								
				$this->session->set_userdata($data_training);
				$this->checkpoint_daf($data_training);
			}
	}

	public function checkpoint_daf(){
	define("MESABOT_TOKEN","Ohf3rNTudcT5SkpOh2a0caZeMX2bNHeJuCQD7HSz");
	$this->load->library('Mesabot');
	
	$sesinya = $this->db->get('tview_trans_pelatihan','$filter')->row();

	$pesan = "terima kasih telah mendaftar pelatihan ".$sesinya->judul_course." melalui PeTA Perumnas. PSDM PUSAT";
	$phone = $this->session->userdata('no_hp');
	$pesan2 = "Bawahan Anda telah mendaftar Pelatihan melalui PetA Perumnas, silahkan cek email Anda untuk melakukan Verifikasi";
	$phone2 = $this->session->userdata('no_hp_atasan');
	try {

						    // 1 phone number
						    $data2 = [
						        'destination' => $phone,
						        'text' => $pesan
						    ];

						     $data3 = [
						        'destination' => $phone2,
						        'text' => $pesan2
						    ];

						    // boradcast
						    // $data = [
						    //     'destination' => ['phone_number1','phone_number2'],
						    //     'text' => 'test'
						    // ];

						    $mesabot = new Mesabot();
						    $mesabot->sms($data2);
						    $mesabot->sms($data3);
						   // print_r($mesabot->response());
						} catch (Exception $e) {
						    echo $e->getMessage();
						}
					


	if ($sesinya)
			{
				
				//buiat session
								$data_training = array(
								'id_tp' =>$sesinya->id_tp,
								'email_atasan' =>$sesinya->email_atasan,
								'Nama_pegawai' =>$sesinya ->nama_pegawai,
								'dah_masuk' => TRUE
								);
			$data['sesinya'] = $sesinya;
			 $config = array();
            $config['useragent'] = 'CodeIgniter';
            $config['mailpath'] = "/usr/sbin/sendmail -t -i";
            $config['protocol'] = "mail";
            $config['smtp_host'] = "mail.perumnas.co.id";
            $config['smtp_port'] = "587";
            $config['smtp_user'] = 'infotraining@perumnas.co.id';
            $config['smtp_pass'] = 'infotraining123';
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n"; //use double quotes
            $config['crlf']    = "\n";
           //load email library
           //load email library
          
			 $this->load->library('email', $config);

			$this->session->set_userdata($data_training);					
			$email=$this->session->userdata('email_atasan');

			$subject='Confirm Form Evaluasi Level - 3 PRE | Perumnas Training Agenda';
			//$data['page_name']= 'evaluasi/konfirmasi';
			//$msg = $this->load->view('main_layout_panel',$data,TRUE);
			//$msg = 'Mohon untuk mengisi form evaluasi Lv3 , usulan pelatihan dari Saudara ' +$this->session->userdata('Nama_pegawai')+ 'melalui link dibawah ini <br/> ,'+ '<a href= "http://infotraining.perumnas.co.id/Panel_user/evaluation_3/"' +$this->session->userdata('id_tp')+'<br/>Terima kasih';
			$ABC = 'Silahkan klik link dibawah ini untuk mengkonfirmasi usulan pelatihan karyawan Anda an.'.$this->session->userdata('Nama_pegawai').'

			. <br/>Registration_PeTA/update_verification_status/update_code='.$this->session->userdata('Nama_pegawai').'= http://infotraining.perumnas.co.id/Panel_user/evaluation_3/'.$this->session->userdata('id_tp').'"</a> <a href=http://infotraining.perumnas.co.id/Panel_user/evaluation_3/'.$this->session->userdata('id_tp').'>Link Pre Evaluasi Level 3</a>';
			//$message= $ABC;
			$message= $this->load->view('pages/email/tmpt_pre3',$data,TRUE);
			$name = 'Perumnas Training Agenda';
            $from_email = 'dept.diklat@perumnas.co.id';
           

            //set to_email id to which you want to receive mails
             $to_email = $this->session->userdata('email_atasan');

            //configure email settings
         
				 
  			// $config = array();
     //        $config['useragent'] = 'CodeIgniter';
     //        $config['mailpath'] = "/usr/sbin/sendmail -t -i";
     //        $config['protocol'] = "mail";
     //        $config['smtp_host'] = "aspmx.l.google.com";
     //        $config['smtp_port'] = "587";
     //        $config['smtp_user'] = 'infotraining.perumnas@gmail.com';
     //        $config['smtp_pass'] = 'infotraining123';
     //        $config['mailtype'] = 'html';
     //        $config['charset'] = 'utf-8';
     //        $config['wordwrap'] = TRUE;
     //        $config['newline'] = "\r\n"; //use double quotes
     //        $config['crlf']    = "\n";
           //load email library
           //load email library
          
			 $this->load->library('email', $config);
			  $this->email->initialize($config); 
			 $this->email->set_newline("\r\n");

            //send mail
            $this->email->from($from_email, $name);
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($message);
            if($this->email->send())
                           {
                              $this->session->set_flashdata('message', ' Email sudah terkirim Ke Atasan Anda , Kami menuggu Approve Atasan Anda untuk mengisi Form Evaluasi');
                            redirect('panel_user/selesai_daftar');
                           }
                           else
                          {
                           show_error($this->email->print_debugger());
                            $this->session->set_flashdata('meesage', ' Mohon Pastikan Koneksi Internet Anda Aktif');
                             redirect('panel_user');
                          }
                      }
	}

	public function checkpoint_daf_pddk(){
		define("MESABOT_TOKEN","Ohf3rNTudcT5SkpOh2a0caZeMX2bNHeJuCQD7HSz");
		$this->load->library('Mesabot');
		$sesinya = $this->db->get('tview_trans_pendidikan','$filter')->row();

		$pesan = "terima kasih telah mendaftar program ".$sesinya->judul_course." melalui PeTA Perumnas. PSDM PUSAT";
		$phone = $this->session->userdata('no_hp');
		$ke_phone1 = $sesinya->no_hp_atasan;
		$ke_phone2 = $sesinya->no_hp_bawahan;
		$ke_phone3 = $sesinya->no_hp_rekan;		
		 
		$ke_pesan1 = "Bawahan Anda Mendaftar Program ".$sesinya->judul_course." silahkan cek email Anda untuk melakukan evaluasi. Terima kasih. PSDM Pusat"	;
		$ke_pesan2 = "Atasan Anda Mendaftar Program ".$sesinya->judul_course." silahkan cek email Anda untuk melakukan evaluasi. Terima kasih. PSDM Pusat";
		$ke_pesan3 = "Rekan Anda Mendaftar Program ".$sesinya->judul_course." silahkan cek email Anda untuk melakukan evaluasi. Terima kasih. PSDM Pusat";
					
		

		 	try {

						    // 1 phone number
		 					$data = [
						        'destination' => $phone,
						        'text' => $pesan
						    ];
						    $data2 = [
						        'destination' => $ke_phone1,
						        'text' => $ke_pesan1
						    ];
						     $data3 = [
						        'destination' => $ke_phone2,
						        'text' => $ke_pesan2
						    ];
						     $data4 = [
						        'destination' => $ke_phone3,
						        'text' => $ke_pesan3
						    ];


						     

						    // boradcast
						    // $data = [
						    //     'destination' => ['phone_number1','phone_number2'],
						    //     'text' => 'test'
						    // ];

						    $mesabot = new Mesabot();
						    $mesabot->sms($data);
						    $mesabot->sms($data2);
						    $mesabot->sms($data3);
						    $mesabot->sms($data4);

						    
						   // print_r($mesabot->response());
						} catch (Exception $e) {
						    echo $e->getMessage();
						}
							//end kirim sms


		if ($sesinya)
			{
				
				//buiat session
								$data_training = array(
								'id_tpddk' =>$sesinya->id_tpddk,
								'email_atasan' =>$sesinya->email_atasan,
								'email_rekan' => $sesinya->email_rekan,
								'email_bawahan' => $sesinya->email_bawahan,
								'Nama_pegawai' =>$sesinya ->nama_pegawai,
								'dah_masuk' => TRUE
								);

								$kirim = array (
								$sesinya->email_atasan,
								$sesinya->email_rekan,
								$sesinya->email_bawahan,
								);

				$data['sesinya'] = $sesinya;
			 $config = array();
            $config['useragent'] = 'CodeIgniter';
            $config['mailpath'] = "/usr/sbin/sendmail -t -i";
            $config['protocol'] = "mail";
            $config['smtp_host'] = "mail.perumnas.co.id";
            $config['smtp_port'] = "587";
            $config['smtp_user'] = 'infotraining@perumnas.co.id';
            $config['smtp_pass'] = 'infotraining123';
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n"; //use double quotes
            $config['crlf']    = "\n";				

			// $data['sesinya'] = $sesinya;
			// $config['protocol'] = 'smtp';
   //          $config['smtp_host'] = 'ssl://smtp.gmail.com';
   //          $config['smtp_port'] = '465';
   //          $config['smtp_user'] = 'infotraining.perumnas@gmail.com';
   //          $config['smtp_pass'] = 'infotraining123';
   //          $config['mailtype'] = 'html';
   //          $config['charset'] = 'iso-8859-1';
   //          $config['wordwrap'] = TRUE;
   //          $config['newline'] = "\r\n"; //use double quotes
            // //$this->load->library('email', $config);
            // $this->email->set_newline("\r\n");
            // $this->email->initialize($config); 
           //load email library
            
			 $this->load->library('email', $config);

			$this->session->set_userdata($data_training);

			//$email=$this->session->userdata('email_atasan');

			 $message1= $this->load->view('pages/email/tmpt_pre3_pddk_atasan',$data,TRUE);
			 $message2= $this->load->view('pages/email/tmpt_pre3_pddk_rekan',$data,TRUE);
			 $message3= $this->load->view('pages/email/tmpt_pre3_pddk_bawahan',$data,TRUE);

			//$message1= "pesan 1";
			//$message2= "pesan 2";
			//$message3= "pesan 3";


			$subject='Confirm Form Evaluasi Level - 3 PRE | Perumnas Training Agenda';
				

			$name = 'Perumnas Training Agenda';
            $from_email = 'dept.diklat@perumnas.co.id';
           

            //set to_email id to which you want to receive mails
             //$to_email = $this->session->userdata('email_atasan');

           	 $this->load->library('email', $config);
			 $this->email->initialize($config); 
			 $this->email->set_newline("\r\n");

            //send mail
           //$this->email->from($from_email, $name);



            //$this->email->to($kirim);
             
            if( $this->email->to($kirim[0] )) {
            	$this->email->from($from_email, $name);
            	$this->email->message($message1);
                $this->email->to($kirim[0]);
                $this->email->subject($subject);
                $this->email->send();
            } 

             if ($this->email->to($kirim[1])) {
             	$this->email->from($from_email, $name);
            	$this->email->message($message2);
                $this->email->to($kirim[1]);
                $this->email->subject($subject);
                $this->email->send();
            }

           
            	$this->email->from($from_email, $name);
            	$this->email->message($message3);
                $this->email->to($kirim[2]);
                $this->email->subject($subject);
             

            


           
            if($this->email->send())
                           {
                              $this->session->set_flashdata('message', ' Email sudah terkirim Ke Atasan, Rekan dan Bawahan Anda , Kami menuggu Approvement untuk mengisi Form Evaluasi');
                            redirect('panel_user/selesai_daftar_pddk');
                           }
                           else
                          {
                           show_error($this->email->print_debugger());
                            $this->session->set_flashdata('message', ' Mohon Pastikan Koneksi Internet Anda Aktif!');
                             redirect('panel_user');
                          }
                      }

	}

	public function resend_checkpoint_daf_pddk($id){
		$sesinya = $this->db->query ('select * from tview_trans_pendidikan where id_tpddk = '.$id.'')->row();

		if ($sesinya)
			{
				
				//buiat session
								$data_training = array(
								'id_tpddk' =>$sesinya->id_tpddk,
								'email_atasan' =>$sesinya->email_atasan,
								'email_rekan' => $sesinya->email_rekan,
								'email_bawahan' => $sesinya->email_bawahan,
								'Nama_pegawai' =>$sesinya ->nama_pegawai,
								'dah_masuk' => TRUE
								);

								$kirim = array (
								$sesinya->email_atasan,
								$sesinya->email_rekan,
								$sesinya->email_bawahan,
								);

				$data['sesinya'] = $sesinya;
			 $config = array();
            $config['useragent'] = 'CodeIgniter';
            $config['mailpath'] = "/usr/sbin/sendmail -t -i";
            $config['protocol'] = "mail";
            $config['smtp_host'] = "mail.perumnas.co.id";
            $config['smtp_port'] = "587";
            $config['smtp_user'] = 'infotraining@perumnas.co.id';
            $config['smtp_pass'] = 'infotraining123';
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n"; //use double quotes
            $config['crlf']    = "\n";				

			// $data['sesinya'] = $sesinya;
			// $config['protocol'] = 'smtp';
   //          $config['smtp_host'] = 'ssl://smtp.gmail.com';
   //          $config['smtp_port'] = '465';
   //          $config['smtp_user'] = 'infotraining.perumnas@gmail.com';
   //          $config['smtp_pass'] = 'infotraining123';
   //          $config['mailtype'] = 'html';
   //          $config['charset'] = 'iso-8859-1';
   //          $config['wordwrap'] = TRUE;
   //          $config['newline'] = "\r\n"; //use double quotes
            // //$this->load->library('email', $config);
            // $this->email->set_newline("\r\n");
            // $this->email->initialize($config); 
           //load email library
            
			 $this->load->library('email', $config);

			$this->session->set_userdata($data_training);

			//$email=$this->session->userdata('email_atasan');

			 $message1= $this->load->view('pages/email/tmpt_pre3_pddk_atasan',$data,TRUE);
			 $message2= $this->load->view('pages/email/tmpt_pre3_pddk_rekan',$data,TRUE);
			 $message3= $this->load->view('pages/email/tmpt_pre3_pddk_bawahan',$data,TRUE);

			//$message1= "pesan 1";
			//$message2= "pesan 2";
			//$message3= "pesan 3";


			$subject='Confirm Form Evaluasi Level - 3 PRE | Perumnas Training Agenda';
				

			$name = 'Perumnas Training Agenda';
            $from_email = 'dept.diklat@perumnas.co.id';
           

            //set to_email id to which you want to receive mails
             //$to_email = $this->session->userdata('email_atasan');

           	 $this->load->library('email', $config);
			 $this->email->initialize($config); 
			 $this->email->set_newline("\r\n");

            //send mail
           //$this->email->from($from_email, $name);



            //$this->email->to($kirim);
             
            if( $this->email->to($kirim[0] )) {
            	$this->email->from($from_email, $name);
            	$this->email->message($message1);
                $this->email->to($kirim[0]);
                $this->email->subject($subject);
                $this->email->send();
            } 

             if ($this->email->to($kirim[1])) {
             	$this->email->from($from_email, $name);
            	$this->email->message($message2);
                $this->email->to($kirim[1]);
                $this->email->subject($subject);
                $this->email->send();
            }

           
            	$this->email->from($from_email, $name);
            	$this->email->message($message3);
                $this->email->to($kirim[2]);
                $this->email->subject($subject);
             

            


           
            if($this->email->send())
                           {
                              $this->session->set_flashdata('message', ' Email sudah terkirim Ke Atasan, Rekan dan Bawahan Anda , Kami menuggu Approvement untuk mengisi Form Evaluasi');
                            redirect('panel_user/selesai_daftar_pddk');
                           }
                           else
                          {
                           show_error($this->email->print_debugger());
                            $this->session->set_flashdata('message', ' Mohon Pastikan Koneksi Internet Anda Aktif!');
                             redirect('panel_user');
                          }
                      }

	}

	public function selesai_daftar(){
		$data['title']='Provider';
		$data['page_name']= 'panel_user/check_daftar';
		$filter=$this->session->userdata('id_tp');
		$this->load->view('main_layout_panel',$data,$filter);
		$this->setemail($filter);
	}

	public function selesai_daftar_pddk(){
		$data['title']='Provider';
		$data['page_name']= 'panel_user/checkout_daftar';
		$filter=$this->session->userdata('id_tpddk');
		$this->load->view('main_layout_panel',$data,$filter);
	}

        public function evaluation_3_done(){
		$data['page_name']= 'evaluasi/evaluation_3';
		$data['point'] = $this->panel_user_m->pelatihan_need_approve(1);
		$this->load->view('main_layout_panel',$data);
	}

	public function evaluation_3($id){
	if (empty ($id)) {
		$this->session->set_flashdata('berhasil','Terima Kasih, Isian Form Evaluasi  Lv 3 Anda akan segera diproses!  ');
		redirect('Panel_user/evaluation_3/1');
	} else {
		
	$data['title']='Provider';
	$data['page_name']= 'evaluasi/evaluation_3';
	$data['point'] = $this->panel_user_m->pelatihan_need_approve($id);


	 $sesi_nya = $this->db->get_where('tview_trans_pelatihan', array('id_tp' => $id))->row();
	
		if ($sesi_nya)
			{
				
				//buiat session
								$data_kompt = array(
								'id_pegawai' =>$sesi_nya->id_pegawai,
								'dah_masuk' => TRUE
								);
								
				$this->session->set_userdata($data_kompt);
			}

	$milik =$this->session->userdata('id_pegawai');			

	$data['kompetensi'] = $this->panel_user_m->get_kompetensi($milik);
	
	$this->load->view('main_layout_panel',$data);
		}
	}

	public function evaluation_3_pddk_post_up($id){
		if (empty ($id)) {
		$this->session->set_flashdata('message','Terima Kasih, Isian Form Evaluasi  Lv 3 Anda akan segera diproses!  ');
		redirect('Panel_user/evaluation_3/1');
	} else {
	$data['title']='Provider';
	$data['page_name']= 'evaluasi/evaluation_3_isi_atasan_post';
	$data['point'] = $this->panel_user_m->pendidikan_need_approve($id);
	$data['tujuan'] = $this->panel_user_m->tujuan_need_approval($id);

	$sesi_nya = $this->db->get('tview_trans_pendidikan','$filter')->row();

		if ($sesi_nya)
			{
				
				//buiat session
								$data_kompt = array(
								'id_pegawai' =>$sesi_nya->id_pegawai,
								'dah_masuk' => TRUE
								);
								
				$this->session->set_userdata($data_kompt);
			}

	$milik =$this->session->userdata('id_pegawai');			

	$data['kompetensi'] = $this->panel_user_m->get_kompetensi($milik);
	$this->load->view('main_layout_panel',$data);
		}
	}

	public function evaluation_3_pddk_post_middle($id){
		if (empty ($id)) {
		$this->session->set_flashdata('message','Terima Kasih, Isian Form Evaluasi  Lv 3 Anda akan segera diproses!  ');
		redirect('Panel_user/evaluation_3/1');
	} else {
	$data['title']='Provider';
	$data['page_name']= 'evaluasi/evaluation_3_isi_rekan_post';
	$data['point'] = $this->panel_user_m->pendidikan_need_approve($id);
	$data['tujuan'] = $this->panel_user_m->tujuan_need_approval($id);

	$sesi_nya = $this->db->get('tview_trans_pendidikan','$filter')->row();

		if ($sesi_nya)
			{
				
				//buiat session
								$data_kompt = array(
								'id_pegawai' =>$sesi_nya->id_pegawai,
								'dah_masuk' => TRUE
								);
								
				$this->session->set_userdata($data_kompt);
			}

	$milik =$this->session->userdata('id_pegawai');			

	$data['kompetensi'] = $this->panel_user_m->get_kompetensi($milik);
	$this->load->view('main_layout_panel',$data);
		}
	}

	public function evaluation_3_pddk_post_low($id){
		if (empty ($id)) {
		$this->session->set_flashdata('message','Terima Kasih, Isian Form Evaluasi  Lv 3 Anda akan segera diproses!  ');
		redirect('Panel_user/evaluation_3/1');
	} else {
	$data['title']='Provider';
	$data['page_name']= 'evaluasi/evaluation_3_isi_bawahan_post';
	$data['point'] = $this->panel_user_m->pendidikan_need_approve($id);
	$data['tujuan'] = $this->panel_user_m->tujuan_need_approval($id);

	$sesi_nya = $this->db->get('tview_trans_pendidikan','$filter')->row();

		if ($sesi_nya)
			{
				
				//buiat session
								$data_kompt = array(
								'id_pegawai' =>$sesi_nya->id_pegawai,
								'dah_masuk' => TRUE
								);
								
				$this->session->set_userdata($data_kompt);
			}

	$milik =$this->session->userdata('id_pegawai');			

	$data['kompetensi'] = $this->panel_user_m->get_kompetensi($milik);
	$this->load->view('main_layout_panel',$data);
		}
	}


	public function evaluation_3_pddk_up($id){
	define("MESABOT_TOKEN","Ohf3rNTudcT5SkpOh2a0caZeMX2bNHeJuCQD7HSz");
	$this->load->library('Mesabot');	
		if (empty ($id)) {
		$this->session->set_flashdata('message','Terima Kasih, Isian Form Evaluasi  Lv 3 Anda akan segera diproses!  ');
		redirect('Panel_user/evaluation_3/1');
	} else {
	$data['title']='Provider';
	$data['page_name']= 'evaluasi/evaluation_3_isi_atasan';
	$data['point'] = $this->panel_user_m->pendidikan_need_approve($id);
	$data['tujuan'] = $this->panel_user_m->tujuan_need_approval($id);

	$sesi_nya = $this->db->get('tview_trans_pendidikan','$filter')->row();
	$phone = $sesi_nya->no_hp;
	//$phone2 = $sesinya->no_hp_atasan;
	$pesan = "Atasan Anda telah melakukan verifikasi preevaluasi Pelatihan Anda. Terima kasih. PSDM PERUMNAS PUSAT";
	$pesan2 = "Terima kasih telah menggunakan PeTA Perumnas.";

		try {

						    // 1 phone number
						    $data2 = [
						        'destination' =>$phone,
						        'text' => $pesan
						    ];

						    // boradcast
						    // $data = [
						    //     'destination' => ['phone_number1','phone_number2'],
						    //     'text' => 'test'
						    // ];

						    $mesabot = new Mesabot();
						    $mesabot->sms($data2);
						   // print_r($mesabot->response());
						} catch (Exception $e) {
						    echo $e->getMessage();
						}
		if ($sesi_nya)
			{
				
				//buiat session
								$data_kompt = array(
								'id_pegawai' =>$sesi_nya->id_pegawai,
								'dah_masuk' => TRUE
								);
								
				$this->session->set_userdata($data_kompt);
			}



	$milik =$this->session->userdata('id_pegawai');			

	$data['kompetensi'] = $this->panel_user_m->get_kompetensi($milik);
	$this->load->view('main_layout_panel',$data);
		}
	}

	public function evaluation_3_pddk_middle($id){
	define("MESABOT_TOKEN","Ohf3rNTudcT5SkpOh2a0caZeMX2bNHeJuCQD7HSz");
	$this->load->library('Mesabot');		
		if (empty ($id)) {
		$this->session->set_flashdata('message','Terima Kasih, Isian Form Evaluasi  Lv 3 Anda akan segera diproses!  ');
		redirect('Panel_user/evaluation_3/1');
	} else {
	$data['title']='Provider';
	$data['page_name']= 'evaluasi/evaluation_3_isi_rekan';
	$data['point'] = $this->panel_user_m->pendidikan_need_approve($id);
	$data['tujuan'] = $this->panel_user_m->tujuan_need_approval($id);

	$sesi_nya = $this->db->get('tview_trans_pendidikan','$filter')->row();
	$phone = $sesi_nya->no_hp;
	//$phone2 = $sesinya->no_hp_atasan;
	$pesan = "Rekan Kerja Anda telah melakukan verifikasi preevaluasi Pelatihan Anda. Terima kasih. PSDM PERUMNAS PUSAT";
	$pesan2 = "Terima kasih telah menggunakan PeTA Perumnas.";

	try {

						    // 1 phone number
						    $data2 = [
						        'destination' =>$phone,
						        'text' => $pesan
						    ];

						    // boradcast
						    // $data = [
						    //     'destination' => ['phone_number1','phone_number2'],
						    //     'text' => 'test'
						    // ];

						    $mesabot = new Mesabot();
						    $mesabot->sms($data2);
						  // print_r($mesabot->response());
						} catch (Exception $e) {
						    echo $e->getMessage();
						}
		if ($sesi_nya)
			{
				
				//buiat session
								$data_kompt = array(
								'id_pegawai' =>$sesi_nya->id_pegawai,
								'dah_masuk' => TRUE
								);
								
				$this->session->set_userdata($data_kompt);
			}

	$milik =$this->session->userdata('id_pegawai');			

	$data['kompetensi'] = $this->panel_user_m->get_kompetensi($milik);
	$this->load->view('main_layout_panel',$data);
		}
	}



	public function evaluation_3_pddk_low($id){
	define("MESABOT_TOKEN","Ohf3rNTudcT5SkpOh2a0caZeMX2bNHeJuCQD7HSz");
	$this->load->library('Mesabot');
		if (empty ($id)) {
		$this->session->set_flashdata('message','Terima Kasih, Isian Form Evaluasi  Lv 3 Anda akan segera diproses!  ');
		redirect('Panel_user/evaluation_3/1');
	} else {
	$data['title']='Provider';
	$data['page_name']= 'evaluasi/evaluation_3_isi_bawahan';
	$data['point'] = $this->panel_user_m->pendidikan_need_approve($id);
	$data['tujuan'] = $this->panel_user_m->tujuan_need_approval($id);

	
	$sesi_nya = $this->db->get('tview_trans_pendidikan','$filter')->row();
	$phone = $sesi_nya->no_hp;
	//$phone2 = $sesinya->no_hp_atasan;
	$pesan = "Bawahan Anda telah melakukan verifikasi preevaluasi Pelatihan Anda. Terima kasih. PSDM PERUMNAS PUSAT";
	$pesan2 = "Terima kasih telah menggunakan PeTA Perumnas.";

	try {

						    // 1 phone number
						    $data2 = [
						        'destination' =>$phone,
						        'text' => $pesan
						    ];

						    // boradcast
						    // $data = [
						    //     'destination' => ['phone_number1','phone_number2'],
						    //     'text' => 'test'
						    // ];

						    $mesabot = new Mesabot();
						    $mesabot->sms($data2);
						   // print_r($mesabot->response());
						} catch (Exception $e) {
						    echo $e->getMessage();
						}
		if ($sesi_nya)
			{
				
				//buiat session
								$data_kompt = array(
								'id_pegawai' =>$sesi_nya->id_pegawai,
								'dah_masuk' => TRUE
								);
								
				$this->session->set_userdata($data_kompt);
			}

	$milik =$this->session->userdata('id_pegawai');			

	$data['kompetensi'] = $this->panel_user_m->get_kompetensi($milik);
	$this->load->view('main_layout_panel',$data);
		}
	}

	public function update_pre(){
		date_default_timezone_set('Asia/Jakarta');      //Don't forget this..I had used this..just didn't mention it in the post
		$datetime_variable = new DateTime();
		$datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');


				foreach($_POST['options'] as $option)
				{
				    $this->db->insert('ttrans_lv3_pre', $option);
				}

				$id = $this->input->post('options[0][id_tp]');
					 	
				$status = 5;
				$date = $datetime_formatted;	 		
					
					 	
					 	$this->panel_user_m->update_statuspre($status,$id,$date);

					 	// foreach($_POST['kompetensi'] as $kompetensinya){

					 	// 	$this->db->insert('ttrans_kompt',$kompetensinya);
					 	// }

					 	$nama_kompetensi =$_POST['nama_kompetensi'];
					 	 $count = count($_POST['nama_kompetensi']);
							 for($i=0; $i<$count; $i++) {
					 			      $data = array(
							          'id_tp'=>$id,
							          'nama_kompetensi' => $nama_kompetensi[$i],
							        
						          );
		       				$this->db->insert('ttrans_kompt', $data); 
		  				 }

		  				 $level = $_POST['season'];
		  				 $count2 = count($_POST['season']);
		  				  for($i=0; $i<$count2; $i++) {
					 			      $data = array(
							          'id_tp'=>$id,
							          'level' => $level[$i],
							        
						          );
		       				$this->db->insert('ttrans_result_soal', $data); 
		  				 }
					 	$this->session->set_flashdata('berhasil','Terima Kasih, Isian Form Evaluasi  Lv 3 Anda akan segera diproses!  ');
					// $this->panel_user_m->input_evaluasi_3($data);
					 	redirect('panel_user/evaluation_3/'.$id);
					 	//$this->email_helper($id);
					 
					

	}


	public function search_rekap_teraphis($id){
		$data['soal'] = $this->panel_user_m->get_soal_kompetensi($id);
		$a = $this->panel_user_m->get_soal_kompetensi($id);
		$no=1;
			foreach ($a as $key => $value) {

				$code = $value['ids'];
				$result = $this->db->query('SELECT * FROM tsoal_kompetensi AS tsk INNER JOIN tsoal_kompetensi_item AS tski ON tsk.ids=tski.ids
					WHERE tsk.id_kompetensi='.$id.' AND tsk.ids= '.$code++.'');

				$result2 = $result->result_array();
				

				//echo $value['ids'];
			}
			
				
				$data['loop'] = $result2;
				  foreach($result2 as $row) {

				  	$data['item'][] = $row['item'];
				  	//$this->load->view('pages/panel_user/soalkompt',$data);
				 }
			//echo $code;

		$this->load->view('pages/panel_user/soalkompt',$data);


		// echo ' <div class="panel panel-danger" id="example-basic">
		// 	    <div class="panel-heading" style="padding:15px;">Form Kompetensi &mdash; yang bersangkutan 
			  
			    	
			    
		// 	    </div>
		// 	    <div class="panel-body">
		// 	     content
		// 	    </div>
		// 	    </div>';
	}

	public function insert_post_pddk(){
		$id_tx= $this->input->post('tx_course');
		$id_tujuan = $this->input->post('item');
		$tujuan = $this->input->post('tujuan');
		$point_post = $this->input->post('nilai_pre4');
		$atasan = $this->input->post('id_pengisi');

		 $count = count($_POST['item']);
		 for($i=0; $i<$count; $i++) {
		       $data = array(
		          'id_tpddk'=>$id_tx,
		          'id_item' => $id_tujuan[$i],
		          'item' => $tujuan[$i], 
		          'id_atasan' => $atasan,
		          'nilai' => $point_post[$i],
		          'status' => 0,
		          );
		       $this->db->insert('ttrans_lv3_pddk_post', $data); 
		   }
	$id=$id_tx;	
	$status=$this->input->post('status_atasan');

	if($atasan == 0 ){
		
		$this->db->query("UPDATE ttrans_pddk SET status_atasan_post = $status  where id_tpddk=$id");

	} else if ($atasan == 1){

		$this->db->query("UPDATE ttrans_pddk SET status_rekan_post = $status  where id_tpddk=$id");

	} else if ($atasan == 2){
		
		$this->db->query("UPDATE ttrans_pddk SET status_bawahan_post = $status  where id_tpddk=$id");
	}
     $this->session->set_flashdata('berhasil', ' Data evaluasi  berhasil dinilai');
	 redirect('Panel_user/evaluation_3/1');

	}

	public function insert_pre_pddk(){
		
		$id_tx= $this->input->post('tx_course');
		$id_tujuan = $this->input->post('item');
		$tujuan = $this->input->post('tujuan');
		$point_pre = $this->input->post('nilai_pre4');
		$atasan = $this->input->post('id_pengisi');

		 $count = count($_POST['item']);
		 for($i=0; $i<$count; $i++) {
		       $data = array(
		          'id_tpddk'=>$id_tx,
		          'id_item' => $id_tujuan[$i],
		          'item' => $tujuan[$i], 
		          'id_atasan' => $atasan,
		          'nilai' => $point_pre[$i],
		          'status' => 0,
		          );
		       $this->db->insert('ttrans_lv3_pddk_pre', $data); 
		   }
	$id=$id_tx;	

	 $level = $_POST['season'];
		  				 $count2 = count($_POST['season']);
		  				  for($i=0; $i<$count2; $i++) {
					 			      $data = array(
							          'id_tp'=>$id,
							          'level' => $level[$i],
							        
						          );
		       				$this->db->insert('ttrans_result_soal', $data); 
		  				 }
	$status=$this->input->post('status_atasan');

	if($atasan == 0 ){
	 $this->panel_user_m->update_statuspre_pddk($status,$id);
	} else if ($atasan == 1 ){

		$this->db->query("UPDATE ttrans_pddk SET status_rekan = $status  where id_tpddk=$id");

	} else if ($atasan == 2){
		$this->db->query("UPDATE ttrans_pddk SET status_bawahan = $status  where id_tpddk=$id");
	}
     $this->session->set_flashdata('berhasil', ' Data evaluasi  berhasil dinilai');
	 redirect('Panel_user/evaluation_3/1');

	}



	public function email_helper($id){

		$sesix = $this->db->get('tview_trans_pelatihan','$id')->row();

		if ($sesix)
			{
				
				//buiat session
								$data_notif = array(
								'id_tp' =>$sesix->id_tp,
								'email_atasan' =>$sesix->email_atasan,
								'Nama_pegawai' =>$sesix->nama_pegawai,
								'judul_course' =>$sesix->judul_course,
								'dah_masuk' => TRUE
								);
			$this->session->set_userdata($data_notif);						

			$email="ahmad.umar.bbm@gmail.com";
			$subject='Usulan Pelatihan  - Perumnas Training Agenda';
			$message='Form Evaluasi  Usulan Pelatihan '.$this->session->userdata('Nama_pegawai').' dengan Judul Pelatihan '.$this->session->userdata('judul_course').' telah  diisi  , Terima kasih';
			$name = 'Perumnas Training Agenda';
            $from_email = 'dept.diklat@perumans.co.id';
           

            //set to_email id to which you want to receive mails
            $to_email = $email;

            //configure email settings
       
           $config = array();
            $config['useragent'] = 'CodeIgniter';
            $config['mailpath'] = "/usr/sbin/sendmail -t -i";
            $config['protocol'] = "mail";
            $config['smtp_host'] = "mail.perumnas.co.id";
            $config['smtp_port'] = "587";
            $config['smtp_user'] = 'infotraining@perumnas.co.id';
            $config['smtp_pass'] = 'infotraining123';
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n"; //use double quotes
            $config['crlf']    = "\n";
           //load email library
          
			 $this->load->library('email', $config);
			  $this->email->initialize($config); 
			 $this->email->set_newline("\r\n");

            //send mail
            $this->email->from($from_email, $name);
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($message);
          
			             if($this->email->send())
			                           {
			                              $this->session->set_flashdata('berhasil', 'Form Evaluasi Lv 3 Berhasil disi, Terima kasih ');
					redirect('panel_user/evaluation_3');
			                          
			                           }
			                           else
			                          {
			                           show_error($this->email->print_debugger());
			                          }
			}
		}



	public function evaluation_3_post($id){
	if (empty ($id)) {
		$this->session->set_flashdata('message', 'Form POST Evaluasi Lv 3 diproses!  ');
		redirect('Panel_user/evaluation_3_post/1');
	} else {
				$data['title']='Provider';
				$data['page_name']= 'evaluasi/evaluation_3_post';
				$data['point'] = $this->panel_user_m->pelatihan_need_approve_post($id);
				$data['post3'] = $this->panel_user_m->pelatihan_need_approve_post3($id);
				$this->load->view('main_layout_panel',$data);
		}

		}


	public function update_post3(){
		date_default_timezone_set('Asia/Jakarta');      //Don't forget this..I had used this..just didn't mention it in the post
		$datetime_variable = new DateTime();
		$datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');
		$id = $this->input->post('options[0][id_tp]');

				foreach($_POST['options'] as $option)
				{
				    $this->db->insert('ttrans_lv3_post', $option);
				  //  $this->db->where('id_tl3pre',$id);
				  //  $this->db->update('ttrans_lv3_pre',$option);
				}

			
					 	
				$status = 1;
				
				$date = $datetime_formatted;	 		
					
					// 	'id_tp' => $this->input->post('id_tp'),
					// 	'pre_1' => $this->input->post('options1'),
					// 	//'item' => $this->input->post('options1'),
					// 	'pre_1' =>$this->input->post('options2'),
					// 	'pre_1'=>$this->input->post('options3'),
					// 	'pre_1' => $this->input->post('options4'),
					// 	'pre_1' =>$this->input->post('options5'),
					// 	'pre_1' => $this->input->post('options6'),
					// 	'pre_1' => $this->input->post('options7'),
					// 	'pre_1' => $this->input->post('options8'),
					// 	'pre_1' => $this->input->post('options9'),
					// 	'pre_1' => $this->input->post('options10'),
					 		$id = $this->input->post('options[0][id_tp]');
					 	$this->panel_user_m->update_statuspost($status,$id,$date);

					 	$data = array (
					 		'id_tp' => $id,
					 		'nilai' => $this->input->post('point4'),
					 		'date' => $date,
					 		'status' => 1
					 		);
					 	$this->panel_user_m->nilai_ev4($data);
					// $this->panel_user_m->input_evaluasi_3($data);
					$this->session->set_flashdata('berhasil', 'Form Post Evaluasi Lv 3 Berhasil disi, Terima kasih ');
					redirect('panel_user/evaluation_3_done');
	
	}











//evaluation end

	public function conver_pdf(){
		$filter=$this->session->userdata('id_tp');
		$this->load->library('fpdf');
		$this->load->helper('tanggal_helper');
		
		$data['training'] = $this->db->get('tview_trans_pelatihan','$filter')->row();
		$this->load->view('pages/panel_user/print',$data);
	
		}

	public function usul_pdf($id){
		$id=$this->encrypt->decode($id);
		$filter=$id;
		$this->load->library('fpdf');
		$this->load->helper('tanggal_helper');
		
		$data['training'] = $this->panel_user_m->get_view_training($id)->row();
		
		$this->load->view('pages/panel_user/print',$data);
	
		}


	public function setemail()
			{
			 $filter=$this->session->userdata('id_tp');
			// $this->load->library('FPDF');
			// $this->load->helper('tanggal_helper');
			 $training= $this->db->get('tview_trans_pelatihan','$filter')->row();
			// $this->load->view('pages/panel_user/print',$data);
			$email=$this->session->userdata('email');
			$subject='Usulan Pelatihan Anda - Perumnas Training Agenda';
			$message='Form Usulan Pelatihan :<b>'.$training->judul_course.'</b> <br/>Atas nama :'.$training->nama_pegawai.' kami lampirkan dalam lampiran Email ini,<br/><br/> Terima kasih <br/>'.'infotraining.perumnas.co.id - PeTA';
			$name = 'Perumnas Training Agenda';
            $from_email = 'dept.diklat@perumnas.co.id';
           

            //set to_email id to which you want to receive mails
            $to_email = $this->session->userdata('email');

            //configure email settings
           $config = array();
            $config['useragent'] = 'CodeIgniter';
            $config['mailpath'] = "/usr/sbin/sendmail -t -i";
            $config['protocol'] = "mail";
            $config['smtp_host'] = "mail.perumnas.co.id";
            $config['smtp_port'] = "587";
            $config['smtp_user'] = 'infotraining@perumnas.co.id';
            $config['smtp_pass'] = 'infotraining123';
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n"; //use double quotes
            $config['crlf']    = "\n";
            
            $this->load->library('email');
            $this->email->initialize($config); 
			//$this->email->set_newline("\r\n");   
           // $to_email = $this->session->userdata('email');

           //  //configure email settings
           //  $config['protocol'] = 'smtp';
           //  $config['smtp_host'] = 'ssl://smtp.gmail.com';
           //  $config['smtp_port'] = '465';
           //  $config['smtp_user'] = 'infotraining.perumnas@gmail.com';
           //  $config['smtp_pass'] = 'infotraining123';
           //  $config['mailtype'] = 'html';
           //  $config['charset'] = 'iso-8859-1';
           //  $config['wordwrap'] = TRUE;
           //  $config['newline'] = "\r\n"; //use double quotes
           //  //$this->load->library('email', $config);
           //  $this->email->set_newline("\r\n");
           //  $this->email->initialize($config); 

            //send mail
            $this->email->from($from_email, $name);
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->message($message);
          $attachment = $this->email->attach('./arsip/'.$this->session->userdata('NIP').'/'.$this->session->userdata('id_tp').'.pdf');
          if(!$attachment){
          	$this->conver_pdf();
          	$this->email->attach('./arsip/'.$this->session->userdata('NIP').'/'.$this->session->userdata('id_tp').'.pdf');
          	$this->email->send();
          	 $this->session->set_flashdata('message', ' Email sudah terkirim ');
                            	redirect('panel_user/check_daftar');

          } else {
             if($this->email->send())
                           {
                              $this->session->set_flashdata('message', ' Email sudah terkirim ');
                            	redirect('panel_user/check_daftar');
                           }
                           else
                          {
                           show_error($this->email->print_debugger());
                          }
			    }
			}

public function polling(){
$id =  $_POST['id'];
$table = 'tref_kategori';
$vote = $this->input->post('radios');

$vote =  $_POST['id'];
$this->panel_user_m->polling_m($table,$vote);

// $status = array("STATUS"=>"false");
//  if($userName=='admin' && $userPassword=='admin'){
//    $status = array("STATUS"=>"true"); 
//   }

$status = array("STATUS"=>"true"); 
$this->panel_user_m->polling_m($table,$vote); 
 echo json_encode ($status) ;

// $ip = $_SERVER['REMOTE_ADDR'];

// $data_user = array(
// 								'ip' =>$ip
// 										);
								
// $this->session->set_userdata($data_user);
// $sessions=$this->session->userdata('ip');
// 			if(!empty($ip)){
				
// 				$this->panel_user_m->polling_m($table,$vote);
// 				$this->session->set_flashdata('message', ' Terima Kasih atas Vote Anda  ');
// 			} else {

// 				$this->session->set_flashdata('error', 'Anda Sudah pernah Vote');
// 			}
// 			redirect('panel_user');
}

public function resetsession() 

	{

		$ip = $_SERVER['REMOTE_ADDR'];
		$data_user = array(
								'ip' =>$ip,
								'dah_login' => TRUE
								);
		$this->session->unset_userdata($data_user);
		$this->session->set_flashdata('message', ' udah Reset');
		redirect('panel_user');
	}



	public function comment(){

		if (! $this->session->userdata('dah_login') ){
			
			 $this->session->set_flashdata('message', ' Silahkan Login Dahulu Untuk Memposting Komentar');
			 redirect('panel_user');

		}

		date_default_timezone_set('Asia/Jakarta');      //Don't forget this..I had used this..just didn't mention it in the post

		$datetime_variable = new DateTime();
		$datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');

		$filter=$this->session->userdata('NIP');
		$data['edit_user']= $this->panel_user_m->get_by_user($filter)->row();

		$data = array(
			'ID_User' => $this->input->post('id_user'),
			'NIP' => $this->input->post('nip'),
			'Nama_pegawai' =>$this->input->post('nama_peserta'),
			'comment' =>$this->input->post('comment_box'),
			'date' => $datetime_formatted
			);

		$this->panel_user_m->comment_save($data);
		$this->session->set_flashdata('comment', ' Komentar berhasil di posting');
		redirect('panel_user');

	}


	public function pencarian(){

		$data['title']='Provider';
		$data['page_name']= 'panel_user/search';
		$data['hasil_pencarian'] = array();
		$this->form_validation->set_rules('kata_kunci','kata_kunci','required');
		if($this->form_validation->run() == TRUE ) {
		
			$kata_kunci = $this->input->post('kata_kunci');
			$data['hasil_pencarian'] = $this->panel_user_m->get_pencarian($kata_kunci);
			
		
			}
		$data['kata_kunci'] = $this->input->post('kata_kunci');
		$this->load->view('main_layout_panel',$data);

		}


public function request_new(){
		$filter=$this->session->userdata('NIP');
		$data['title']='Provider';
		$data['page_name']= 'panel_user/request_new';
		

		$data['edit_user']= $this->panel_user_m->get_by_user($filter)->row();
		$data['kategori']=$this->provider_m->get_kategori();
		$data['kota']= $this->provider_m->get_kota();
		$data['pendaftar'] = $this->panel_user_m->get_jumlah()->result();
		$this->load->view('main_layout_panel', $data);
	}

	public function request_cource_oldp(){
		$filter=$this->session->userdata('NIP');
		$data['title']='Provider';
		//$data['page_name']= 'panel_user/request_new';
		$data['page_name']= 'panel_user/request_oldp';

		$data['edit_user']= $this->panel_user_m->get_by_user($filter)->row();
		$data['kategori']=$this->provider_m->get_kategori();
		$data['kota']= $this->provider_m->get_kota();
		$data['pendaftar'] = $this->panel_user_m->get_jumlah()->result();
		$this->load->view('main_layout_panel', $data);
	}

public function tambahkan(){
	//define("MESABOT_TOKEN","Ohf3rNTudcT5SkpOh2a0caZeMX2bNHeJuCQD7HSz");
	//$this->load->library('Mesabot');
	date_default_timezone_set('Asia/Jakarta');      //Don't forget this..I had used this..just didn't mention it in the post

		$datetime_variable = new DateTime();
		$datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');
	if($this->input->post('nama_persh')==''){
		$data['title']='Provider';
		$data['page_name']= 'panel_user/request_new_finish';
		$this->form_validation->set_rules('judul','judul_course','required');
		$this->form_validation->set_rules('kategori','nama_kategori','required');
		
		if($this->form_validation->run() == FALSE ){

		 
		$this->session->set_flashdata('message', 'Data Tidak Lengkap, Mohon diisi secara lengkap!');
		redirect('Panel_user/request_new');

		}else 

		 {
		 	$data_request = array (
					'ID_User' =>$this->input->post('id_user'),
					'NIP' =>$this->input->post('nip'),
					'Nama_pegawai' =>$this->input->post('nama_peserta'),
					'jabatan' =>$this->input->post('jabatan'),
					'unit_kerja'=>$this->input->post('unor'),
					'no_hp'=>$this->input->post('no_hp'),
					'emailku'=>$this->input->post('emailku'),
					'nama_provider' =>'Tidak Memiliki Provider',					
					'judul_course' => $this->input->post('judul'),
					'kota_course' =>$this->input->post('kota'),
					'id_kategori' => $this->input->post('kategori'),
					'waktu_in'=> $this->input->post('tanggal'),
					'lokasi_pelatihan' => $this->input->post('lokasi'),		
					'keterangan'=> $this->input->post('keterangan'),
					'date_request'=>$datetime_formatted,
					
					);
			$this->panel_user_m->add_new_request($data_request);
			 $this->session->set_userdata($data_request);
		 	$this->load->view('main_layout_panel', $data);
			//echo "beres"; 
		 }

		
	}else {

		$data['title']='Provider ';
	$data['page_name']= 'panel_user/request_new';
	$this->form_validation->set_rules('nama_persh','nama_persh','required');
	$this->form_validation->set_rules('judul','judul_course','required');
	$this->form_validation->set_rules('kategori','nama_kategori','required');
	$this->form_validation->set_rules('tanggal','waktu','required');
	$this->form_validation->set_rules('kota','kota','required');
	$this->form_validation->set_rules('tanggal','tanggal','required');


	if($this->form_validation->run() == FALSE ){

		 
		$this->session->set_flashdata('message', 'Data Tidak Lengkap, Mohon diisi secara lengkap!');
		redirect('Panel_user/request_new');

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
				$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
				$config['max_size'] = '2048'; //2mb
			
				$config['overwrite'] = false;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$this->upload->do_upload('brosur');
				$image_data2 = $this->upload->data();
				$data_request = array (
					'ID_User' =>$this->input->post('id_user'),
					'NIP' =>$this->input->post('nip'),
					'Nama_pegawai' =>$this->input->post('nama_peserta'),
					'jabatan' =>$this->input->post('jabatan'),
					'unit_kerja'=>$this->input->post('unor'),
					'no_hp'=>$this->input->post('no_hp'),
					'emailku'=>$this->input->post('emailku'),
					'nama_provider' =>$this->input->post('nama_persh'),
					'judul_course' => $this->input->post('judul'),
					'kota_course' =>$this->input->post('kota'),
					'id_kategori' => $this->input->post('kategori'),
					'content'=> $this->input->post('no_telp'),
					'website'=> $this->input->post('website'),
					'email'=> $this->input->post('email'),
					'waktu_in'=> $this->input->post('tanggal'),
					'gatel'=>$image_data2['file_name'],
					'lokasi_pelatihan' => $this->input->post('lokasi'),
					'biaya' => $this->input->post('biaya'),
					'skill' => $this->input->post('skill'),
					'knowledge' => $this->input->post('knowledge'),
					'attitude' => $this->input->post('attitudeq'),
					'attitude1' => $this->input->post('attitude[0]'),
					'attitude2' => $this->input->post('attitude[1]'),
					'attitude3' => $this->input->post('attitude[2]'),
					'attitude4' => $this->input->post('attitude[3]'),
					'attitude5' => $this->input->post('attitude[4]'),
					'attitude6' => $this->input->post('attitude[5]'),
					'attitude7' => $this->input->post('attitude[6]'),
					'keterangan'=> $this->input->post('keterangan'),
					'date_request'=>$datetime_formatted,
					);
				
				
				 $this->panel_user_m->add_new_request($data_request);
				 $judul = $this->input->post('judul');
				  $pesan = 'Usulan pelatihan '.$judul.' telah diterima oleh Dept Diklat. terima kasih. PSDM Perumnas';
				 // try {

					// 	    // 1 phone number
					// 	    $data2 = [
					// 	        'destination' => $this->input->post('no_hp'),
					// 	        'text' => $pesan
					// 	    ];

					// 	    $mesabot = new Mesabot();
					// 	    $mesabot->sms($data2);
					// 	   // print_r($mesabot->response());
					// 	} catch (Exception $e) {
					// 	    echo $e->getMessage();
					// 	}


				  $this->session->set_flashdata('berhasil', ' Usulan pelatihan Anda berhasil ditambahkan. Dept Diklat Akan segera memproses usulan Anda. Thanks!');
				 $this->session->set_userdata($data_request);
				  redirect('Panel_user/request_new_finish',$data_request);
				}

	}
	
}

public function request_new_finish($data_request) {
		$data['title']='Provider';
		$data['page_name']= 'panel_user/request_new_finish';
		$this->session->set_flashdata('berhasil', ' Usulan pelatihan Anda berhasil ditambahkan. Dept Diklat Akan segera memproses usulan Anda. Thanks!');
		$this->load->view('main_layout_panel', $data);


}


public function pelatihanku(){

		$filter=$this->session->userdata('NIP');
		$data['title']='Provider';
		$data['page_name']= 'panel_user/pelatihanku';
		$data['course'] = $this->panel_user_m->pelatihanku($filter);
		$data['list_pddk'] = $this->panel_user_m->pget_all_pddk_list($filter);
		$this->load->view('main_layout_panel', $data);
}


public function evaluation(){
	if (! $this->session->userdata('dah_login') ){
			
			 $this->session->set_flashdata('message', ' Silahkan Login Dahulu Untuk Mengisi Form Evaluasi');
			 redirect('panel_user');

		}


$filter=$this->session->userdata('NIP');
$data['edit_user']= $this->panel_user_m->get_by_user($filter)->row();
$data['title']='Provider';
$data['page_name']= 'panel_user/form-evaluasi';
$data['course'] = $this->panel_user_m->evaluasi_1($filter);
$this->load->view('main_layout_panel', $data);

}


public function tambah_survey(){
$datetime_variable = new DateTime();
$datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');

foreach($_POST['season'] as $option)
				{
				   array_sum($_POST['season']);
				}

$a = array_sum(($_POST['season']));
$b = count($_POST['season']);

$c = ($a/$b);

$data = array (

		'id_provider' => $this->input->post('prov'),
		'id_course' => $this->input->post('course'),
		'NIP' => $this->input->post('NIP'),
		'nilai' => $a,
		'jumlah' =>$b,
		'rata_rata' => $c,
		'keterangan'=> $this->input->post('season18'),
		'date_in'=> $datetime_formatted,

	);

$status = 1;
$id = $this->input->post('option_1');
$this->panel_user_m->update_status_ev_1($status,$id);
// $data = array (
// 					'id_provider' =>$this->input->post('prov'),
// 					'id_course' =>$this->input->post('course'),
// 					'NIP' =>$this->input->post('NIP'),
// 					'season1' =>$this->input->post('season1'),
// 					'season2' =>$this->input->post('season2'),
// 					'season3' =>$this->input->post('season3'),
// 					'season4' =>$this->input->post('season4'),
// 					'season5' =>$this->input->post('season5'),
// 					'season6' =>$this->input->post('season6'),
// 					'season7' =>$this->input->post('season7'),
// 					'season8' =>$this->input->post('season8'),
// 					'season9' =>$this->input->post('season9'),
// 					'season10' =>$this->input->post('season10'),
// 					'season11' =>$this->input->post('season11'),
// 					'season12' =>$this->input->post('season12'),
// 					'season13' =>$this->input->post('season13'),
// 					'season14' =>$this->input->post('season14'),
// 					'season15' =>$this->input->post('season15'),
// 					'season16' =>$this->input->post('season16'),
// 					'season17' =>$this->input->post('season17'),
// 					'keterangan'=> $this->input->post('season18'),
// 					'date_in'=> $datetime_formatted,
					
// 					);
				
				  $this->panel_user_m->add_new_survey($data);
				  $this->panel_user_m->add_rating();
				   $this->session->set_flashdata('berhasil', ' Terimas Kasih Sudah Mengisi Form Evaluasi Pelatihan');
					redirect('Panel_user/evaluation_form');

					}




public function evaluation_form(){
		if (! $this->session->userdata('dah_login') ){
					
					 $this->session->set_flashdata('message', ' Silahkan Login Dahulu Untuk Mengisi Form Evaluasi');
					 redirect('panel_user');

				}


		$filter=$this->session->userdata('NIP');
		$data['edit_user']= $this->panel_user_m->get_by_user($filter)->row();
		$data['title']='Provider';
		$data['page_name']= 'panel_user/steps';
		$data['course'] = $this->panel_user_m->evaluasi_1($filter);
		$this->load->view('main_layout_panel', $data);
		}

public function rejected_atasan($id){

		$aprv=4;
		$this->verifikasi_m->rejected_usul($id,$aprv);
		$this->session->set_flashdata('message', ' Pelatihan telah ditolak!');
		redirect('panel_user/evaluation_3');
	}

public function  check_php(){

		echo phpinfo();
	}


public function tambahkan_pddk(){
		$id_course = $this->input->post('judul');
		$nip = $this->input->post('nip');
		$user = $this->panel_user_m->get_by_nip_pddk($id_course,$nip);

		if ($user){

			$this->session->set_flashdata('message', 'Maaf ,  Anda Sudah Mendaftar Pelatihan ini silahkan tunggu untuk diproses');
			redirect('panel_user/request_new');

		} else 

	date_default_timezone_set('Asia/Jakarta');      //Don't forget this..I had used this..just didn't mention it in the post

	$datetime_variable = new DateTime();
	$datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');

	$data['title']='Provider ';
	$data['page_name']= 'panel_user/request_new';
	$this->form_validation->set_rules('nama_persh','nama_persh','required');
	$this->form_validation->set_rules('judul','judul_course','required');
	


	if($this->form_validation->run() == FALSE ){

		 
		$this->session->set_flashdata('message', 'Data Tidak Lengkap, Mohon diisi secara lengkap!');
		redirect('Panel_user/request_new');

		}else 

		 {


			
			//$this->load->library('upload', $config);
			//$this->upload->initialize($config);

						
			
			
//proses update

				$config['upload_path'] = './brosur/';
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size'] = '2048'; //2mb
			
				$config['overwrite'] = false;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if($this->upload->do_upload('brosur'))
				{
					$image_data2 = $this->upload->data();
				
				}

				if($this->upload->do_upload('form'))
				{
					$image_data4 = $this->upload->data();
				} 
				
				
				$data = array (
					'ID_User' =>$this->input->post('id_user'),
					'NIP' =>$this->input->post('nip'),
					'Nama_pegawai' =>$this->input->post('nama_peserta'),
					'jabatan' =>$this->input->post('jabatan'),
					'unit_kerja'=>$this->input->post('unor'),
					'nama_provider' =>$this->input->post('nama_persh'),
					'judul_course' => $this->input->post('judul'),
					'kota_course' =>$this->input->post('kota'),
					'id_kategori' => $this->input->post('kategori'),
					'content'=> $this->input->post('no_telp'),
					'website'=> $this->input->post('website'),
					'email'=> $this->input->post('email'),
					'waktu_in'=> $this->input->post('tanggal'),
					'gatel'=>$image_data2['file_name'],
					'formulir' => $image_data4['file_name'],
					'keterangan'=> $this->input->post('keterangan'),
					'date' => $datetime_formatted
					);
				
				 $this->panel_user_m->add_new_request($data);
				 $this->session->set_flashdata('berhasil', ' Usulan pelatihan Anda berhasil ditambahkan');
				 redirect('Panel_user/request_new');
				}
}

public function upload_doc($id) {
	$id=$this->encrypt->decode($id);
	if (! $this->session->userdata('dah_login') ){
			
			 $this->session->set_flashdata('message', ' Silahkan Login Dahulu Untuk Mendaftar Pelatihan');
			 redirect('panel_user');

		}
	$data['id']= $id;
	$sesinya = $this->db->get_where('tview_trans_pelatihan', array('id_tp' => $id))->row();

	$data = array (
				'id' =>$sesinya->id_tp,
				'nama_provider'=>$sesinya->nama_provider,
				'id_course' => $sesinya->id_course,
				'judul_course' => $sesinya->judul_course,
				'tujuan_pelatihan'=>$sesinya->tujuan_pelatihan,
				'nama_kategori'=>$sesinya->nama_kategori,
				'waktu_in'=>$sesinya->waktu_in,
				'waktu_out'=>$sesinya->waktu_out,
				'kota_course'=>$sesinya->kota_course,
				'nama_pegawai' => $sesinya->nama_pegawai,
				'nip' => $sesinya->nip,
				
				
				
				);
	$data['page_name']= 'panel_user/upload_doc_view';
	$this->load->view('main_layout_panel', $data);
}

public function training_upload_doc(){
$id_tp = $this->input->post('id_tp');		
$training = $this->db->get_where('ttrans_pelatihan', array('id_tp' => $id_tp))->row();

	if($training->status_evaluasi_1 == 0){
		$status = array("STATUS"=>"belum_upload"); 
                    echo json_encode ($status) ;

	} else {
					if(empty($_FILES['file']['name'])){
			$status = array("STATUS"=>"false"); 
           		 echo json_encode ($status) ;
           		 return false;
		} else if (!empty($_FILES['file']['name'])){

					if($this->input->post('pilihan') == 1) {
						$config['upload_path'] = './assets/uploaded/';
						$config['allowed_types'] = 'rar|zip|gif|jpg|jpeg|png|pdf|doc|docx|ppt|pptx|xls|xlsx';
						$config['max_size'] = '50480'; //2mb
						$config['file_name'] = 'laporan_doc';
						$config['overwrite'] = false;
						//$this->load->library->('upload',$config);
						$this->upload->initialize($config);
						if(!$this->upload->do_upload('file')){

										$status = array("STATUS"=>"false"); 
						           		 echo json_encode ($status) ;

						           		 
						           		 return false;
										}

								
						$image_data3 = $this->upload->data();
									$data = array (
											'id_tp' => $this->input->post('id_tp'),
											'nip' => $this->input->post('nip'),
											'laporan' => $image_data3['file_name']
										);
									$this->panel_user_m->insert_laporan_training($data,$id_tp);

									$status = array("STATUS"=>"true"); 
						            echo json_encode ($status) ;
								} else {
									$config['upload_path'] = './assets/uploaded/';
									$config['allowed_types'] = 'zip|pdf|doxc|ppt|pptx';
									$config['max_size'] = '50480'; //2mb
									$config['file_name'] = 'presentation_doc';
									$config['overwrite'] = false;
									//$this->load->library->('upload',$config);
									$this->upload->initialize($config);

						           		if(!$this->upload->do_upload('file')){

										$status = array("STATUS"=>"false"); 
						           		 echo json_encode ($status) ;
						           		 return false;
										}

									$image_data2 = $this->upload->data();
									$data = array (
											'id_tp' => $this->input->post('id_tp'),
											'nip' => $this->input->post('nip'),
											'laporan' => $image_data2['file_name']
										);
									$this->panel_user_m->insert_laporan_training($data,$id_tp);
									$status = array("STATUS"=>"true"); 
						            echo json_encode ($status) ;

					}
						
						$this->setemail_laporan($id_tp);
			}
	}



		

				 

					//$this->listFiles();
				
					
			
			
	}

public function listFiles($id){
	$this->load->helper('file');
	//$files = get_filenames('./assets/uploaded/');
	$files_server = $this->panel_user_m->get_list_doc_pelatihan($id);
	echo json_encode($files_server);
}


public function delfiles($idtp){
  $id = $this->input->post('file_id');	
  $this->panel_user_m->del_doc_pelatihan($id);

  if ($this->input->post('file_to_remove')) 
				{	
					$this->db->query('update ttrans_pelatihan set status_laporan = 0 where id_tp ='.$idtp.'');
					$file_to_remove = $this->input->post('file_to_remove');
					unlink('./assets/uploaded/'.$file_to_remove);
					$status = array("STATUS"=>"true"); 
                    echo json_encode ($status) ;

				} else {

					echo "gagal";
				}
	 }

public function cek_survey($id){

	$training = $this->db->get_where('ttrans_pelatihan', array('id_tp' => $id))->row();

	if($training->status_evaluasi_1 == 0){
		$status = array("STATUS"=>"belum_upload"); 
                    echo json_encode ($status) ;

	} else {
					$status = array("STATUS"=>"true"); 
                    echo json_encode ($status) ;
	}

}


public function setemail_laporan($id)
			{
			
			// $this->load->library('FPDF');
			// $this->load->helper('tanggal_helper');
			 $training= $this->db->get_where('tview_trans_pelatihan', array('id_tp' => $id))->row();

			// $this->load->view('pages/panel_user/print',$data);
			$nip = $training->nip;
			$nama= $training->nama_pegawai;
			$pelatihan = $training->judul_course;
			$subject='Notifikasi Laporan Pelatihan '.$pelatihan.'- Perumnas Training Agenda';
			$message='Dokumen laporan pelatihan :<b>'.$training->judul_course.'</b> <br/>Atas nama :<b>'.$training->nama_pegawai.'</b><br/> sudah diupload melalui PeTA <br/><br/> Terima kasih <br/>'.'infotraining.perumnas.co.id - PeTA';
			$name = 'Perumnas Training Agenda';
            $from_email = 'infotraining@perumnas.co.id';
           

            //set to_email id to which you want to receive mails
            $to_email = 'ahmad.umar@perumnas.co.id';

            //configure email settings
           $config = array();
            $config['useragent'] = 'CodeIgniter';
            $config['mailpath'] = "/usr/sbin/sendmail -t -i";
            $config['protocol'] = "mail";
            $config['smtp_host'] = "mail.perumnas.co.id";
            $config['smtp_port'] = "587";
            $config['smtp_user'] = 'infotraining@perumnas.co.id';
            $config['smtp_pass'] = 'infotraining123';
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n"; //use double quotes
            $config['crlf']    = "\n";
            
            $this->load->library('email');
            $this->email->initialize($config); 
			 //send mail
            $this->email->from($from_email, $name);
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($message);
          
         
             if($this->email->send())
                           {
                             
						           // echo "email terkirim" ;
                            	
                           }
                           else
                          {
                          show_error($this->email->print_debugger());
                           
                          }
			  }

    public function get_form_tanpa_provider(){
    	$id=$this->input->post('id');
    	if ($id == 1) {

    		$data['page_name']= 'panel_user/detail';
			$data['kategori']=$this->provider_m->get_kategori();
			$data['kota']= $this->provider_m->get_kota();
    		$this->load->view('pages/panel_user/get_dengan_prov',$data);

    	} else {

    		$data['title']='Provider';
			$data['page_name']= 'panel_user/detail';
			$data['kategori']=$this->provider_m->get_kategori();
			$data['kota']= $this->provider_m->get_kota();
    		$this->load->view('pages/panel_user/get_tanpa_prov',$data);
    	}

    }

}




?>