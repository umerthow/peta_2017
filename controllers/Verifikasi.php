<?php


class Verifikasi extends CI_controller{


public function __construct(){
	parent:: __construct();	
	
	
	
	
	}

	public function approval($id){
		//$data['title']='Provider';
		//$data['page_name']= 'verifikasi/index';

		//$this->load->view('main_layout',$data);

		//$id['id_course'] = $this->input->post('kode_user');
		$aprv=2;

		$this->verifikasi_m->approved_course($id,$aprv);
		$this->session->set_flashdata('berhasil', ' Data has changed');
		redirect('Provider/course_filter');
	}

	public function rejected($id){
		$aprv=4;
		$this->verifikasi_m->rejected_course($id,$aprv);
		$this->session->set_flashdata('berhasil', ' Data has changed');
		redirect('Provider/course_filter');
	}


	public function approval_usul(){
		 $id 			=  $_POST['id'];
		 $aprv 			= 2;
		 $sesinya 		= $this->db->get_where('tview_trans_pelatihan', array('id_tp' => $id))->row();
		 $nip 			= $sesinya->nip;
		 $this->load->model('panel_user_m');
		 $cek_laporan 	= $this->panel_user_m->cek_laporan_peserta($nip);	

		if ($sesinya)
			{
				
				//buiat session
								$data_training = array(
								'id_tp' =>$sesinya->id_tp,
								'email_atasan' =>$sesinya->email_atasan,
								'dah_masuk' => TRUE
								);
			$this->session->set_userdata($data_training);
					
			}
		if ($sesinya->tgl_post3 == '') {

							$status = array("STATUS"=>"false"); 
                            echo json_encode ($status) ;
			} else if (count($cek_laporan) >  1 ){
				 
				 $status = array("STATUS"=>"gagal"); 
                            echo json_encode ($status) ;

			} else


			{
				// $status = array("STATUS"=>"true"); 
				// echo json_encode ($status) ;
				$this->verifikasi_m->approved_usul($id,$aprv);
				$this->setemail2($id);
			}
			

		// $this->verifikasi_m->approved_usul($id,$aprv);
		// $this->setemail2($id);
		//$this->session->set_flashdata('berhasil', ' Data has changed');
		//redirect('Training/verification_training_request');
	}

	public function setemail2($id)
			{
			 $sesinya = $this->db->get_where('tview_trans_pelatihan', array('id_tp' => $id))->row();


		if ($sesinya)
			{
				
				//buiat session
								$data_training = array(
								'id_tp' =>$sesinya->id_tp,
								'email_pegawai' =>$sesinya ->email_pegawai,
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
			$email=$this->session->userdata('email_pegawai');

			$subject='Notifikasi | Perumnas Training Agenda';
			//$data['page_name']= 'evaluasi/konfirmasi';
			//$msg = $this->load->view('main_layout_panel',$data,TRUE);
			//$msg = 'Mohon untuk mengisi form evaluasi Lv3 , usulan pelatihan dari Saudara ' +$this->session->userdata('Nama_pegawai')+ 'melalui link dibawah ini <br/> ,'+ '<a href= "http://infotraining.perumnas.co.id/Panel_user/evaluation_3/"' +$this->session->userdata('id_tp')+'<br/>Terima kasih';
			$ABC = 'Silahkan klik link dibawah ini untuk mengkonfirmasi usulan pelatihan karyawan Anda an.'.$this->session->userdata('Nama_pegawai').'

			. <br/>Registration_PeTA/update_verification_status/update_code='.$this->session->userdata('Nama_pegawai').'= http://infotraining.perumnas.co.id/Panel_user/evaluation_3/'.$this->session->userdata('id_tp').'"</a> <a href=http://infotraining.perumnas.co.id/Panel_user/evaluation_3/'.$this->session->userdata('id_tp').'>Link Pre Evaluasi Level 3</a>';
			//$message= $ABC;
			$message= $this->load->view('pages/email/tmpt_approved',$data,TRUE);
			$name = 'Perumnas Training Agenda';
            $from_email = 'dept.diklat@perumnas.co.id';
           

            //set to_email id to which you want to receive mails
             $to_email = $this->session->userdata('email_pegawai');

            //configure email settings
         
				 
  			// $config = array();
            // $config['useragent'] = 'CodeIgniter';
            // $config['mailpath'] = "/usr/sbin/sendmail -t -i";
            // $config['protocol'] = "mail";
            // $config['smtp_host'] = "aspmx.l.google.com";
            // $config['smtp_port'] = "587";
            // $config['smtp_user'] = 'infotraining.perumnas@gmail.com';
            // $config['smtp_pass'] = 'infotraining123';
            // $config['mailtype'] = 'html';
            // $config['charset'] = 'utf-8';
            // $config['wordwrap'] = TRUE;
            // $config['newline'] = "\r\n"; //use double quotes
            // $config['crlf']    = "\n";
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
                              $this->session->set_flashdata('message', ' Email sudah terkirim Ke Ybs , Data has changed');
                            	$status = array("STATUS"=>"true"); 
                            	echo json_encode ($status) ;
                           }
                           else
                          {
                           show_error($this->email->print_debugger());
                            $this->session->set_flashdata('meesage', ' Mohon Pastikan Koneksi Internet Anda Aktif');
                            $status = array("STATUS"=>"false"); 
                            echo json_encode ($status) ;
                          }
                      }
			    }

	public function rejected_usul(){
		define("MESABOT_TOKEN","Ohf3rNTudcT5SkpOh2a0caZeMX2bNHeJuCQD7HSz");
		$this->load->library('Mesabot');
		$id = $this->input->post('bookId');
		$sesinya = $this->db->get_where('tview_trans_pelatihan', array('id_tp' => $id))->row();
		$no_hp = $sesinya->no_hp;
		$judul = $sesinya->judul_course;
		$reason =   $this->input->post('reason_rejected');
		$pesan = 'PeTA - Usulan pelatihan '.$judul.' kami tolak silahkan cek email untuk info selengkapnya. Dept Diklat';
					 try {

						    // 1 phone number
						    $data2 = [
						        'destination' => $no_hp,
						        'text' => $pesan
						    ];

						    $mesabot = new Mesabot();
						    $mesabot->sms($data2);
						   // print_r($mesabot->response());
						} catch (Exception $e) {
						    echo $e->getMessage();
						}

		 $aprv=2;
		$this->verifikasi_m->rejected_usul($id,$aprv);



		$this->setemail3($id,$reason);
	}

	

	public function setemail3($id,$reason)
			{
				$sesinya = $this->db->get_where('tview_trans_pelatihan', array('id_tp' => $id))->row();

		if ($sesinya)
			{
				
				//buiat session
								$data_training = array(
								'id_tp' =>$sesinya->id_tp,
								'email_pegawai' =>$sesinya ->email_pegawai,
								'email_atasan' =>$sesinya->email_atasan,
								'Nama_pegawai' =>$sesinya ->nama_pegawai,
								'dah_masuk' => TRUE
								);
			$data['sesinya'] = $sesinya;
			$data['alasan'] = $reason;
			 // $config = array();
    //         $config['useragent'] = 'CodeIgniter';
    //         $config['mailpath'] = "/usr/sbin/sendmail -t -i";
    //         $config['protocol'] = "mail";
    //         $config['smtp_host'] = "mail.perumnas.co.id";
    //         $config['smtp_port'] = "587";
    //         $config['smtp_user'] = 'infotraining@perumnas.co.id';
    //         $config['smtp_pass'] = 'infotraining123';
    //         $config['mailtype'] = 'html';
    //         $config['charset'] = 'utf-8';
    //         $config['wordwrap'] = TRUE;
    //         $config['newline'] = "\r\n"; //use double quotes
    //         $config['crlf']    = "\n";
           //load email library
           //load email library
            $config = array();
             $config['useragent'] = 'CodeIgniter';
            $data['sesinya'] = $sesinya;
			$config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.gmail.com';
            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'infotraining.perumnas@gmail.com';
            $config['smtp_pass'] = 'infotraining123';
            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n"; //use double quotes
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->initialize($config); 
           //load email library
          
			 

			$this->session->set_userdata($data_training);					
			$email=$this->session->userdata('email_pegawai');

			$subject='Notifikasi | Perumnas Training Agenda';
			//$data['page_name']= 'evaluasi/konfirmasi';
			//$msg = $this->load->view('main_layout_panel',$data,TRUE);
			//$msg = 'Mohon untuk mengisi form evaluasi Lv3 , usulan pelatihan dari Saudara ' +$this->session->userdata('Nama_pegawai')+ 'melalui link dibawah ini <br/> ,'+ '<a href= "http://infotraining.perumnas.co.id/Panel_user/evaluation_3/"' +$this->session->userdata('id_tp')+'<br/>Terima kasih';
			$ABC = 'Silahkan klik link dibawah ini untuk mengkonfirmasi usulan pelatihan karyawan Anda an.'.$this->session->userdata('Nama_pegawai').'

			. <br/>Registration_PeTA/update_verification_status/update_code='.$this->session->userdata('Nama_pegawai').'= http://infotraining.perumnas.co.id/Panel_user/evaluation_3/'.$this->session->userdata('id_tp').'"</a> <a href=http://infotraining.perumnas.co.id/Panel_user/evaluation_3/'.$this->session->userdata('id_tp').'>Link Pre Evaluasi Level 3</a>';
			//$message= $ABC;
			$message= $this->load->view('pages/email/tmpt_rejected',$data,TRUE);
			$name = 'Perumnas Training Agenda';
            $from_email = 'dept.diklat@perumnas.co.id';
           

            //set to_email id to which you want to receive mails
             $to_email = $this->session->userdata('email_pegawai');

            //configure email settings
                   
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
                              $this->session->set_flashdata('message', ' Email Notifikasi sudah terkirim Ke Ybs , Data has changed');
                            redirect('training/verification_training_request');
                           }
                           else
                          {
                           show_error($this->email->print_debugger());
                            $this->session->set_flashdata('meesage', ' Mohon Pastikan Koneksi Internet Anda Aktif');
                             redirect('training/verification_training_request');
                          }
                      }
			    }




	public function approval_request($id){
		define("MESABOT_TOKEN","Ohf3rNTudcT5SkpOh2a0caZeMX2bNHeJuCQD7HSz");
		$this->load->library('Mesabot');
		$aprv=1;

		$this->verifikasi_m->approved_request($id,$aprv);
		$this->verifikasi_m->inserttopelatihan($id);
		$person = $this->training_m->get_detail_request_course($id)->row();
		$no_hp = $person->no_hp;
		$judul = $person->judul_course;
				  $pesan = 'Usulan pelatihan '.$judul.' telah disetujui oleh Dept Diklat.Segera daftar di Dasboard PeTA ,terima kasih. PSDM Perumnas';
				 try {

						    // 1 phone number
						    $data2 = [
						        'destination' => $no_hp,
						        'text' => $pesan
						    ];

						    $mesabot = new Mesabot();
						    $mesabot->sms($data2);
						   // print_r($mesabot->response());
						} catch (Exception $e) {
						    echo $e->getMessage();
						}

		$this->session->set_flashdata('berhasil', ' Data has changed');
		redirect('Training/verification_support_request');
	}

	public function rejected_request($id){
		$aprv=2;
		$this->verifikasi_m->rejected_request($id,$aprv);
		$this->session->set_flashdata('berhasil', ' Data has changed');
		redirect('Training/verification_support_request');
	}



//Evaluasi-start


	
	public function detail_ev3($id){

		$data['title']='Provider';
		$data['page_name']= 'verifikasi/detail_ev_3';
		$data['training'] = $this->training_m->get_detail_usul_course($id)->row();
		$data['detail']=$this->verifikasi_m->get_detail_ev3($id)->result_array();
		//$data2['detail']=$this->verifikasi_m->get_detail_ev3_post($id)->result_array();
		$data['detail_average']=$this->verifikasi_m->get_detail_ev3_avg($id)->row();
		$data['kompetensi']= $this->verifikasi_m->get_kompt($id);
		$data['nilai_post4'] = $this->verifikasi_m->get_nilai($id);
		$this->load->view('main_layout',$data);
	}


	//public training
	public function detail_ev3_pddk($id){
		$data['title']='Provider';
		$data['page_name']= 'verifikasi/detail_status_assm_ev3';
		$data['training'] = $this->training_m->get_detail_usul_pddk($id)->row();
		$data['detail']=$this->verifikasi_m->detail_ev3_pddk($id)->result_array();
		$data['detail_average']=$this->verifikasi_m->detail_ev3_pddk_avg($id)->row();
		//$data['kompetensi']= $this->verifikasi_m->get_kompt($id);
		//$data['nilai_post4'] = $this->verifikasi_m->get_nilai($id);
		$this->load->view('main_layout',$data);

	}

	public function detail_ev3_pddk_post($id){
		$data['title']='Provider';
		$data['page_name']= 'verifikasi/detail_status_assm_ev3_post';
		$data['training'] = $this->training_m->get_detail_usul_pddk($id)->row();
		$data['detail']=$this->verifikasi_m->detail_post_ev3_pddk($id)->result_array();
		$data['detail_average']=$this->verifikasi_m->detail_post_ev3_pddk_avg($id)->row();
		//$data['kompetensi']= $this->verifikasi_m->get_kompt($id);
		//$data['nilai_post4'] = $this->verifikasi_m->get_nilai($id);
		$this->load->view('main_layout',$data);

	}

	public function convert_excel($id){
		$data['title']='Provider';
		$data['training'] = $this->training_m->get_detail_usul_pddk($id)->row();
		$data['detail']=$this->verifikasi_m->detail_ev3_pddk($id)->result_array();
		$data['detail_average']=$this->verifikasi_m->detail_ev3_pddk_avg($id)->row();
		//$data['kompetensi']= $this->verifikasi_m->get_kompt($id);
		//$data['nilai_post4'] = $this->verifikasi_m->get_nilai($id);
		$this->load->view('pages/verifikasi/detail_status_assm_ev3_exl',$data);

	}

	public function convert_excel_ps($id){
		$data['title']='Provider';
		$data['training'] = $this->training_m->get_detail_usul_pddk($id)->row();
		$data['detail']=$this->verifikasi_m->detail_post_ev3_pddk($id)->result_array();
		$data['detail_average']=$this->verifikasi_m->detail_post_ev3_pddk_avg($id)->row();
		$this->load->view('pages/verifikasi/detail_post_assm_ev3_exl',$data);
	}


	public function evaluasi_1_start(){
		$data['title']='Provider';
		$data['page_name']= 'verifikasi/list_evaluasi_1';
		$data['list'] = $this->verifikasi_m->get_all_list_level1();
		$this->load->view('main_layout',$data);
	}

	public function evaluasi_3_start(){
		$data['title']='Provider';
		$data['page_name']= 'verifikasi/list_evaluasi_3';
		$data['list'] = $this->verifikasi_m->get_all_list();
		$data['list_pddk'] = $this->verifikasi_m->get_all_pddk_list();
		$this->load->view('main_layout',$data);
	}

	public function evaluasi_3_post(){
		$data['title']='Provider Evaluasi Level 3 Pendidikan Berjenjang';
		$data['page_name']= 'verifikasi/list_evaluasi_3_post';
		$data['list'] = $this->verifikasi_m->get_all_list_post();
		$data['list_pddk'] = $this->verifikasi_m->get_all_pddk_list_post();
		$this->load->view('main_layout',$data);
	}


	public function update_post_3($id){

		$planpost = $this->input->post('post_3_plan');
		$this->db->set("tgl_post3",$planpost);
		$this->db->where('id_tp',$id);
   		$this->db->update("ttrans_pelatihan");
   		redirect('Verifikasi/detail_ev3/'.$id);
	}

	
	public function check_point_post($id){
			 $sesinya = $this->db->get_where('tview_trans_pelatihan', array('id_tp' => $id))->row();

		if ($sesinya)
			{
				
				//buiat session
								$data_training = array(
								'id_tp' =>$sesinya->id_tp,
								'email_atasan' =>$sesinya->email_atasan,
								'Nama_pegawai' =>$sesinya ->nama_pegawai,
								'dah_masuk' => TRUE
								);
			$this->session->set_userdata($data_training);	
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
		$email='ahmad.umar.bbm@gmail.com';  //$this->session->userdata('email_atasan');
		$subject='Confirm Form Evaluasi Level - 3 POST | Perumnas Training Agenda';
		$ABC = 'Salam, <br/><br/>Silahkan Mengisi Form <b>Post Evaluasi Level 3 </b>untuk Pelatihan an. '.$this->session->userdata('Nama_pegawai').'

			. <br>Melalui link beirkut ini <br/>Registration_PeTA/update_verification_status/update_code='.$this->session->userdata('Nama_pegawai').'= http://infotraining.perumnas.co.id/Panel_user/evaluation_3_post/'.$this->session->userdata('id_tp').'"</a> <a href=http://infotraining.perumnas.co.id/Panel_user/evaluation_3_post/'.$this->session->userdata('id_tp').'>Link Post Evaluasi Level 3</a>';
		$data['sesinya'] = $sesinya;
		$message= $this->load->view('pages/email/tmpt_post3',$data,TRUE);
		$name = 'Perumnas Training Agenda';
        $from_email = 'ahmad.umar.bbm@gmail.com';
        $to_email = $this->session->userdata('email_atasan');
        
			  $this->email->initialize($config); 
			 $this->email->set_newline("\r\n");

            //send mail
            $this->email->from($from_email, $name);
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($message);
            if($this->email->send())
                           {
                              $this->session->set_flashdata('message', ' Email sudah terkirim , Kami menuggu Approve Atasan Anda untuk mengisi Form Evaluasi');
                            redirect('Verifikasi/evaluasi_3_post');
                           }
                           else
                          {
                           show_error($this->email->print_debugger());
                          }
                      }


	}

	function check_point_post_pddk($id){
			 $sesinya = $this->db->get_where('tview_trans_pelatihan', array('id_tp' => $id))->row();

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
            //$this->load->library('email', $config);
            // $this->email->set_newline("\r\n");
            // $this->email->initialize($config); 
           //load email library
            
			 $this->load->library('email', $config);

			$this->session->set_userdata($data_training);

			//$email=$this->session->userdata('email_atasan');

			 $message1= $this->load->view('pages/email/tmpt_post3_pddk_atasan',$data,TRUE);
			 $message2= $this->load->view('pages/email/tmpt_post3_pddk_rekan',$data,TRUE);
			 $message3= $this->load->view('pages/email/tmpt_post3_pddk_bawahan',$data,TRUE);

			//$message1= "pesan 1";
			//$message2= "pesan 2";
			//$message3= "pesan 3";


			$subject='Confirm Form Evaluasi Level - 3 POST | Perumnas Training Agenda';
				

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
                              $this->session->set_flashdata('message', ' Email sudah terkirim Ke Atasan, Rekan dan Bawahan '.$sesinya->nama_pegawai.', Kami menuggu Approvement untuk mengisi Form Evaluasi');
                            redirect('Verifikasi/evaluasi_3_post');
                           }
                           else
                          {
                           show_error($this->email->print_debugger());
                            $this->session->set_flashdata('message', ' Mohon Pastikan Koneksi Internet Anda Aktif!');
                             redirect('Verifikasi/evaluasi_3_post');
                          }
                      }
	}




	public function evaluasi_4_start(){

		$data['title']='Provider';
		$data['page_name']= 'verifikasi/list_evaluasi_4';
		$data['list'] = $this->verifikasi_m->get_all_list_ev4();
		$this->load->view('main_layout',$data);
	}

	public function conver_pdf($id){
		
		$filter=$id;
		$this->load->library('FPDF');
		$this->load->library('Waktu');
		$this->load->helper('tanggal_helper');
		$data['training'] =  $this->panel_user_m->get_view_training($id)->row();
		$data['detail']=$this->verifikasi_m->get_detail_ev3($id)->result_array();
		$data['detail_average']=$this->verifikasi_m->get_detail_ev3_avg($id)->row();
		$data['rfg']=$id;
		$this->load->view('pages/panel_user/print_evaluasi',$data);
		//$this->load->view('pages/panel_user/print',$data);
		//$this->setemail();
		
		}

	function update_penilai($id){
		$nama_a = $this->input->post('nama_a');
		$email_a = $this->input->post('email_a');
		$nama_b = $this->input->post('nama_b');
		$email_b = $this->input->post('email_b');
		$nama_r = $this->input->post('nama_r');
		$email_r = $this->input->post('email_r');

		$data = array (
			'nama_atasan' => $this->input->post('nama_a'),
			'email_atasan' => $this->input->post('email_a'),
			'nama_bawahan' => $this->input->post('nama_b'),
			'email_bawahan' => $this->input->post('email_b'),
			'nama_rekan' => $this->input->post('nama_r'),
			'email_rekan' => $this->input->post('email_r'),
			);

		$this->verifikasi_m->update_penilaix($data,$id);

		// $this->db->query('update  ttrans_pddk set nama_atasan ='$nama_a', email_atasan=$email_a,nama_rekan =$nama_r ,
		// 	email_rekan=$email_r,
		// 	nama_bawahan =$nama_b,
		// 	email_bawahan=$email_b
		// 	WHERE id_tpddk='.$id.' ');
		$this->session->set_flashdata('message', ' Data Penilai Updated!');
		redirect('Verifikasi/detail_ev3_pddk/'.$id.'');
	}

	function efektivitas(){
		$data['title']='Provider';
		$data['page_name']= 'verifikasi/list_efektivitas';
		$data['list'] = $this->verifikasi_m->get_all_effe();
		$this->load->view('main_layout',$data);
		
	}


	public function carikan_blast(){
		 $id =  $_POST['id'];
		$provider = array();
		$sesinya = $this->db->query ('select * from trequest_info inner join tref_kategori on trequest_info.id_kategori = tref_kategori.id_kategori where trequest_info.id_request= '.$id.'')->row();
		$provider = $this->db->query ('select * from temail_blast order by nama_provider asc')->result();

		$data = array (
			
				'judul_course' => $sesinya->judul_course,
				'nama_kategori'=>$sesinya->nama_kategori,
				'waktu_in'=>$sesinya->waktu_in,
				'kota_course'=>$sesinya->kota_course,
				);

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
            $this->load->library('email', $config);
            $this->email->initialize($config); 
			$this->email->set_newline("\r\n");
            $name = 'Perumnas Training Agenda';
            $from_email = 'infotraining@perumnas.co.id';
            $subject='Employee Training Request | Perumnas Training Agenda';
            $message1= $this->load->view('pages/email/request_provider',$data,TRUE);

            if(!empty($provider)) {

            	foreach ($provider as $key => $value) {
				$this->email->clear();
				$this->email->to($value->email);
	    		$this->email->from($from_email, $name);
	    		$this->email->subject($subject);
	    		$this->email->message($message1);
	    		$this->email->send();
                          
	    	

			};
							   $status = array("STATUS"=>"true"); 
                            	echo json_encode ($status) ;

            }else{
            					show_error($this->email->print_debugger());
            					$status = array("STATUS"=>"false"); 
                            	echo json_encode ($status) ;

            }
			

		 //redirect('Training/verification_support_request');

	}

	public function resend_checkpoint_daf_pddk(){
		$id = $_POST['id'];
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
                              $this->session->set_flashdata('message', ' Email sudah terkirim Ke Atasan, Rekan dan Bawahan Ybs.<ul><li>'.$sesinya->email_atasan.'</li><li>'.$sesinya->email_bawahan.'</li><li>'.$sesinya->email_rekan.'</li></ul>');
                              $status = array("STATUS"=>"true"); 
                            	echo json_encode ($status) ;
                           // redirect('Verifikasi/evaluasi_3_post');
                           }
                           else
                          {
                           show_error($this->email->print_debugger());
                            $this->session->set_flashdata('message', ' Mohon Pastikan Koneksi Internet Anda Aktif!');
                            $status = array("STATUS"=>"false"); 
                            	echo json_encode ($status) ;
                             //redirect('Verifikasi/evaluasi_3_post');
                          }
                      }
	}

	}
?>