<?php
class Pelelangan extends CI_Controller{


public function __construct(){
	parent:: __construct();	
	
	if (! $this->session->userdata('is_login') ){
			
			 redirect('user/login');
		}
	
	
	}


public function list_lelang(){



	$data['aku'] = array (40,50,30,20,40,50,20,20);
	$array = array(40,50,30,20,40,50,20,20);

	$jadi = (array_count_values($array));

	echo "$array[0]"+ "muncul"+implode($jadi);

	 echo implode(" ",$jadi);


}

public function tambah(){
	$data['title']='Provider';
	$data['page_name']= 'lelang/add_auction';
	$data['kategori'] = $this->provider_m->get_kategori();

	$this->form_validation->set_rules('judul_course','judul pelatihan','required');
	$this->form_validation->set_rules('kategori','kategori','required');
	$this->form_validation->set_rules('tanggal_aanj','waktu ','required');
	$this->form_validation->set_rules('selesai_aanj','selesai_waktu ','required');
	$this->form_validation->set_rules('harga','harga ','required');
	$this->form_validation->set_rules('tanggal_tor','waktu batas akhir TOR','required');

	if($this->form_validation->run() == FALSE ){
		$this->load->view('main_layout',$data);
	//	redirect('pelatihan/tambah/',$id)	;

	}else {
				date_default_timezone_set('Asia/Jakarta');      //Don't forget this..I had used this..just didn't mention it in the post
				$datetime_variable = new DateTime();
				$datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');
				$config['upload_path'] = './temp_file/';
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size'] = '2048'; //2mb
				$config['file_name'] = 'doc_lelang_0';
				$config['overwrite'] = false;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);


				if($this->upload->do_upload('doc_deskripsi'))
				{
					$image_data2 = $this->upload->data();
				} else
					{		
						$this->session->set_flashdata('error', '  Upload DOC DESKRIPSI  Gagal ,Format tidak sesuai!');
					    redirect('Pelelangan/list_lelang');
					}

				if($this->upload->do_upload('torr'))
				{
					$image_data3 = $this->upload->data();
				} else
					{		
						$this->session->set_flashdata('error', '  Upload TOR/KAK Gagal ,Format tidak sesuai!');
					    redirect('Pelelangan/list_lelang');
					}
				
				$data = array (
			
									
									'judul' => $this->input->post('judul_course'),
									'id_kategori' => $this->input->post('kategori'),
									'deskripsi' => $this->input->post('deskripsi'),
									'waktu_aanwijzing'=> $this->input->post('tanggal_aanj'),
									'selesai_aanwijzing'=> $this->input->post('selesai_aanj'),
									'waktu_tor'=> $this->input->post('tanggal_tor'),
									'harga'=> $this->input->post('harga'),
									'harga_selesai'=> $this->input->post('harga_selesai'),
									'biaya_lelang' => $this->input->post('biaya_lelang'),
									'doc_deskripsi'=>$image_data2['file_name'],
									'doc_tor'=>$image_data3['file_name'],
									'date_publish' =>$datetime_formatted,
									'status' => $this->input->post('status'),
									
									);

				 $this->pelelangan_m->insert($data);
				 $this->session->set_flashdata('message', 'Data Pelelangan berhasil ditambah');
				 redirect('Pelelangan/list_lelang');
	}

}


public function edit_lelang($id){

		$data['title']='Provider';
		$data['page_name']= 'lelang/edit';
		$data['kategori']=$this->provider_m->get_kategori();
		$data['kota']= $this->provider_m->get_kota();
		$data['edit_pelelangan']= $this->pelelangan_m->detail_pelelangan($id)->row();
		$this->load->view('main_layout',$data);
	}



public function proses_edit_lelang(){
	date_default_timezone_set('Asia/Jakarta');      //Don't forget this..I had used this..just didn't mention it in the post
	$datetime_variable = new DateTime();
	$datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');
	$id['id_lelang'] = $this->input->post('id_lelang');
	$data = array (
									'id_lelang' => $this->input->post('id_lelang'),
									'judul' => $this->input->post('judul_course'),
									'id_kategori' => $this->input->post('kategori'),
									'deskripsi' => $this->input->post('deskripsi'),
									'waktu_aanwijzing'=> $this->input->post('tanggal_aanj'),
									'selesai_aanwijzing'=> $this->input->post('selesai_aanj'),
									'waktu_tor'=> $this->input->post('tanggal_tor'),
									'harga'=> $this->input->post('harga'),
									'harga_selesai'=> $this->input->post('harga_selesai'),
									'biaya_lelang' => $this->input->post('biaya_lelang'),
									'status' =>  $this->input->post('status'),
									'date_publish' =>$datetime_formatted
									
									);

				if ($_FILES['torr']['name'] != '')
					{
					$config['upload_path'] = './temp_file/';
					$config['allowed_types'] = 'gif|jpg|png|pdf';
					$config['max_size'] = '2048'; //2mb
					
					$this->upload->initialize($config);
						
					if($this->upload->do_upload('torr'))
					{
						$image_data = $this->upload->data();
					} 
					else
					{		
						$this->session->set_flashdata('error', ' Update & Upload TOR Gagal Dimensi gambar tidak sesuai!');
					    redirect('Pelelangan/edit_pelelangan/'.$id);
					}
						$data['doc_tor'] = $image_data['file_name'];
				}

				if ($_FILES['doc_deskripsi']['name'] != '')
					{
					$config['upload_path'] = './temp_file/';
					$config['allowed_types'] = 'gif|jpg|png|pdf';
					$config['max_size'] = '2048'; //2mb
					
					$this->upload->initialize($config);
						
					if($this->upload->do_upload('doc_deskripsi'))
					{
						$image_data2 = $this->upload->data();
					} 
					else
					{		
						$this->session->set_flashdata('error', ' Update & Upload DOC DESKRIPSI Gagal Dimensi gambar tidak sesuai!');
					    redirect('Pelelangan/edit_pelelangan/'.$id);
					}
						$data['doc_deskripsi'] = $image_data2['file_name'];
				}
			$this->pelelangan_m->update_lelang($data,$id);
			$this->session->set_flashdata('message', ' Data Pelelangan berhasil diupdate');
			redirect('pelelangan/list_lelang');		
}



public function delete_lelang($id){
	
		$this->pelelangan_m->delete_lelang($id);
		$this->session->set_flashdata('message', 'Data telah dihapus');
		redirect('pelelangan/list_lelang');		

}

public function detail_item($id){
		$filter = $this->session->userdata('kd_user') ;
		$id=$this->encrypt->decode($id);
		$data['title']='Provider';
		$data['page_name']= 'lelang/detail_item';
		//$data['download'] = $this->pelelangan_m->detail_trasaction_prv($filter,$id)->row();
		$data['kategori']=$this->provider_m->get_kategori();
		$data['kota']= $this->provider_m->get_kota();
		$data['edit_user']= $this->provider_m->get_by_profil($filter);
		$data['comment_anj'] =$this->pelelangan_m->get_comment_anj($id)->result();
		$data['edit_pelelangan']= $this->pelelangan_m->detail_pelelangan($id)->row();
		$data['download'] =$this->pelelangan_m->get_status($id,$filter);
		$this->session->set_flashdata('cook', ' Data not found');
		$this->load->view('main_layout',$data);
}

public function transaction() {
	$filter = $this->session->userdata('kd_user') ;
	$id_lelang = $this->input->post('id_lelang');
	$id_provider = $this->input->post('id_prov');
	$email=$this->input->post('email_prov');
	$cek_trasaksi = $this->pelelangan_m->get_by_lelang_prov($id_lelang,$id_provider);

	if ($cek_trasaksi){

			$this->session->set_flashdata('message', 'Maaf ,  Anda Sudah Mendaftar Pelelangan ini silahkan tunggu untuk diproses');
			redirect('dashboard');

		} else {
					date_default_timezone_set('Asia/Jakarta');      //Don't forget this..I had used this..just didn't mention it in the post
					$datetime_variable = new DateTime();
					$datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');
					$config['upload_path'] = './temp_file/';
								$config['allowed_types'] = 'gif|jpg|png|pdf|docx|doc';
								$config['max_size'] = '2048'; //2mb
								$config['file_name'] = 'doc_bkt_trnsf_0';
								$config['overwrite'] = false;
								$this->load->library('upload', $config);
								$this->upload->initialize($config);
								$this->upload->do_upload('bkt_transfer');
								$image_data = $this->upload->data();
													//if 
							$data = array (
								'id_lelang' => $this->input->post('id_lelang'),
								'id_provider' => $this->input->post('id_prov'),
								'kode_user' => $this->input->post('kode_user'),
								'doc_bukti'=>$image_data['file_name'],
								'status' => 0,
								'date' =>$datetime_formatted

								);
							$this->session->set_flashdata('message', ' Upload bukti Transfer Berhasil');
							 $this->pelelangan_m->daftarkan($data);
							 $id =  $id_lelang;
							// $this->email_notf($id,$filter);
							 redirect('Pelelangan/selesai');
							
					}
}

public function email_notf($id,$filter){

$sesix = $this->pelelangan_m->get_status($id,$filter);

		if ($sesix)
			{
				
				//buiat session
								$data_notif = array(
								'id_lelang' =>$sesix->id_lelang,
								'email_provider' =>$sesix->email,
								'nama_provider' =>$sesix->nama_provider,
								'judul' =>$sesix->judul,
								'waktu_aanwijzing'=>$sesix->waktu_aanwijzing,
								'dah_masuk' => TRUE
								);
			$this->session->set_userdata($data_notif);	
			$pecah1 = explode(" ", $this->session->userdata('waktu_aanwijzing'));					
			$this->waktu->formatDate($pecah1[0],"id");
			$email=$this->session->userdata('email_provider');
			$subject='Notification (No Reply) - Perumnas Training Agenda';
			$message='Terima Kasih   <b>'.$this->session->userdata('nama_provider').' </b> sudah mendaftarkan  keikutsertaan lelang dengan Judul Lelang '.$this->session->userdata('judul').'

			<br/>Kami Akan melalukan verifikasi dalam waktu 2x24 Jam, mohon tunggu untuk diproses. Kami akan menginformasikan melalui email ketika berkas Anda sudah diproses, dan pastikan email yang anda daftarkan di profil provider <b/>aktif!</b><br/><br/> Terima kasih';
			$name = 'Perumnas Training Agenda';
            $from_email = 'dept.diklat@perumnas.co.id';
           

            //set to_email id to which you want to receive mails
            $to_email = $email;

            //configure email settings
            $config = array();
             	 $config = Array(
				 'protocol' => 'smtp',
				 'smtp_host' => 'ssl://smtp.googlemail.com',
				 'smtp_port' => 465,
				 'smtp_user' => 'infotraining.perumnas@gmail.com',
				 'smtp_pass' => 'infotraining123',
				 'smtp_timeout' => 30,
				 'mailtype' => 'html',
				 'charset' => 'iso-8859-1',
				 'wordwrap' => TRUE,
				 );
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
			                             $this->session->set_flashdata('message', ' Upload bukti Transfer Berhasil');
											redirect('Pelelangan/selesai');
			                           }
			                           else
			                          {
			                           show_error($this->email->print_debugger());
			                          }
			}
}
public function selesai(){
	$data['title']='Provider';
	$data['page_name']= 'lelang/selesai';
	$this->load->view('main_layout',$data);
}

public function verification_lelang(){
	$data['title']='Provider';
	$data['page_name']= 'lelang/transaction_lelang_ver';
	$data['base_url']=site_url('Pelelangan/verification_lelang/');
	$data['total_rows']=$this->pelelangan_m->get_total_rows();
	$data['per_page'] =10;
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

		$this->pagination->initialize($data);
		//buat paggingnya
		$data['pagination']=$this->pagination->create_links();
		$limit=$data['per_page'];	

//pagging menu tab 2


		$data2['base_url']=site_url('Pelelangan/verification_lelang/');
		$data2['total_rows']=$this->pelelangan_m->get_total_rows_approved();
		$data2['per_page'] =10;

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
	//pagging menu tab 3

		$data3['base_url']=site_url('Pelelangan/verification_lelang/');
		$data3['total_rows']=$this->pelelangan_m->get_total_rows_rejected();
		$data3['per_page'] =10;

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

		$offset=$this->uri->segment(3) ? $this->uri->segment(3) : 0; // uri 1= nama controller, uri 2= method, mengambil url yg ke 3  (nama lain dari if else)
		$data['lelang'] =$this->pelelangan_m->get_all_total_rows($limit,$offset);
		$data['lelang_approved'] = $this->pelelangan_m->get_total_rows_approved($data2);
		$data['lelang_rejected'] = $this->pelelangan_m->get_total_rows_rejected($data3);
		$this->load->view('main_layout', $data,$data2,$data3);



}

public function detail_transaction($id){
		$data['title']='Provider';
		$data['page_name']= 'lelang/trasaction_detail';
		$data['kategori']=$this->pelelangan_m->get_total_rows();
		$data['edit_pelelangan']= $this->pelelangan_m->detail_trasaction($id)->row();
		$this->session->set_flashdata('cook', ' Data not found');
		$this->load->view('main_layout',$data);

}

public function approval_lelang($id){
		$aprv=1;

		$this->pelelangan_m->approved_lelang($id,$aprv);
		$this->session->set_flashdata('berhasil', ' Data has changed');
		$this->email_helper($id);
		//redirect('Pelelangan/verification_lelang');
}

public function rejected_lelang($id){
		$aprv=2;
		$this->pelelangan_m->rejected_lelang($id,$aprv);
		$this->session->set_flashdata('berhasil', ' Data has changed');
		redirect('Pelelangan/verification_lelang');
}



public function email_helper($id){
	$this->load->library('waktu');
		$sesix = $this->pelelangan_m->detail_trasaction($id)->row();

		if ($sesix)
			{
				
				//buiat session
								$data_notif = array(
								'id_lelang' =>$sesix->id_lelang,
								'email_provider' =>$sesix->email,
								'nama_provider' =>$sesix->nama_provider,
								'judul' =>$sesix->judul,
								'waktu_aanwijzing'=>$sesix->waktu_aanwijzing,
								'selesai_aanwijzing'=>$sesix->selesai_aanwijzing,
								'dah_masuk' => TRUE
								);
			$this->session->set_userdata($data_notif);	
			$pecah1 = explode(" ", $this->session->userdata('waktu_aanwijzing'));
			$pecah3 = explode(" ", $this->session->userdata('selesai_aanwijzing'));					
			$this->waktu->formatDate($pecah1[0],"id");
			$email=$this->session->userdata('email_provider');
			//$email="ahmad.umar.bbm@gmail.com";
			$subject='Notification (No Reply) - Perumnas Training Agenda';
			$message='Status keikutsertaan lelang   <b>'.$this->session->userdata('nama_provider').' </b> dengan Judul Lelang '.$this->session->userdata('judul').' telah  <b>disetujui</b>. 
			Mohon login ke <a href="http://infotraining.perumnas.co.id">infotraining.perumnas.co.id</a> untuk mendownload dokumen TOR/KAK.<br/>Kami turut mengundang Anda untuk mengikuti kegiatan Pemberian Penjelesan (Aanwidjing) Secara Online pada :<br/> Tanggal :'.$this->waktu->formatDate($pecah1[0],"id").'<br/>Pukul      : '.$pecah1[1].'<br/> s/d <br/> Tanggal :'.$this->waktu->formatDate($pecah3[0],"id").'<br/> Pukul :'.$pecah3[1].' <br/> Tempat : infotraining.perumnas.co.id  .

			<br/><br/><br/>Terima kasih';
			$name = 'Perumnas Training Agenda';
            $from_email = 'dept.diklat@perumnas.co.id';
           

            //set to_email id to which you want to receive mails
            $to_email = $email;

            //configure email settings
            //   $config = array();
            // $config['useragent'] = 'CodeIgniter';
            // $config['mailpath'] = "/usr/sbin/sendmail -t -i";
            // $config['protocol'] = "mail";
            // $config['smtp_host'] = "mail.perumnas.co.id";
            // $config['smtp_port'] = "587";
            // $config['smtp_user'] = 'rendy@perumnas.co.id';
            // $config['smtp_pass'] = 'ajisoko';
            // $config['mailtype'] = 'html';
            // $config['charset'] = 'utf-8';
            // $config['wordwrap'] = TRUE;
            // $config['newline'] = "\r\n"; //use double quotes
            // $config['crlf']    = "\n";
           //load email library
          $config = array();
            $config['useragent'] = 'CodeIgniter';
            $config['mailpath'] = "/usr/sbin/sendmail -t -i";
            $config['protocol'] = "mail";
            $config['smtp_host'] = "aspmx.l.google.com";
            $config['smtp_port'] = "587";
            $config['smtp_user'] = 'infotraining.perumnas@gmail.com';
            $config['smtp_pass'] = 'infotraining123';
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n"; //use double quotes
            $config['crlf']    = "\n";
          //  //load email library
			 $this->load->library('email', $config);
			 $this->email->initialize($config); 
			

            //send mail
            $this->email->from($from_email, $name);
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($message);
          
			             if($this->email->send())
			                           {
			                             $this->session->set_flashdata('berhasil', ' Data has changed');
											redirect('Pelelangan/verification_lelang');
			                           }
			                           else
			                          {
			                           show_error($this->email->print_debugger());
			                          }
			}
		}


public function status_penawaran(){
	$data['title']='Provider ';
	$data['page_name']= 'lelang/list';
	$filter=$this->session->userdata('kd_user');
	$data['lelang'] = $this->pelelangan_m->get_lelang($filter);
	$this->load->view('main_layout',$data)	;

}

public function aanj_comment(){
	date_default_timezone_set('Asia/Jakarta');      //Don't forget this..I had used this..just didn't mention it in the post

	$datetime_variable = new DateTime();
	$datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');
								$config['upload_path'] = './temp_file/';
								$config['allowed_types'] = 'gif|jpg|png|pdf';
								$config['max_size'] = '2048'; //2mb
								$config['file_name'] = 'doc_attach_0';
								$config['overwrite'] = false;
								$this->load->library('upload', $config);
								$this->upload->initialize($config);
								$this->upload->do_upload('attach');
								$image_data = $this->upload->data();


							

	$data = array(
		'id_lelang' => $this->input->post('id_lelang'),
		'id_provider' => $this->input->post('id_prov'),
		'kd_user' => $this->session->userdata('kd_user') ,
		'comment' => $this->input->post('comment'),
		'creator' => $this->session->userdata('nama_depan'), 
		'attach'=>$image_data['file_name'],
		'date' => $datetime_formatted,
		);
	$id=$this->input->post('id_lelang');
	$this->pelelangan_m->save_comment($data);
	$this->session->set_flashdata('cook', ' Data not found');
	$this->session->set_flashdata('message', ' Komentar Anda berhasil diberikan');
	redirect('Pelelangan/detail_item/'.$this->encrypt->encode($id), 'location', 301);
	
}




}

?>