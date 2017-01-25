<?php 
class Training extends CI_Controller{


	public function __construct(){
	parent:: __construct();	
	
	if (! $this->session->userdata('is_login') ){
			
			 redirect('user/login');
		}
	
	
	}



	public function verification_training_request(){

		$data['title']='Provider';
		$data['page_name']= 'verifikasi/verification_training';
		$data['prov'] = $this->training_m->get_all_view_training();
		$data['prov_approved'] = $this->training_m->get_all_view_training_approved();
		$data['prov_rejected'] = $this->training_m->get_all_view_training_rejected();
		$data['prov_month'] = $this->training_m->get_all_view_month();

		$this->load->view('main_layout', $data);


	}


	public function detail_usul_course($id){
		$data['title']='Provider';
		$data['page_name']= 'provider/detail_request';
		$data['files_server'] = $this->training_m->get_list_doc_pelatihan($id);
		$data['training'] = $this->training_m->get_detail_usul_course($id)->row();
		$this->load->view('main_layout', $data);

	}

	public function detail_request_course($id){
		$data['title']='Provider';
		$data['page_name']= 'provider/detail_request';
		$data['training_new'] = $this->training_m->get_detail_request_course($id)->row();
		$this->load->view('main_layout', $data);

	}

	public function verification_support_request(){

	$data['title']='Provider';
	$data['page_name']= 'verifikasi/verification_request';
	$data['prov'] = $this->training_m->get_all_view_training_request();
	$data['prov_approved'] = $this->training_m->get_all_view_training_request_approved();
	$data['prov_rejected'] = $this->training_m->get_all_view_training_request_rejected();

	$this->load->view('main_layout', $data);


	}

	
	public function delete_detail_usul_course($id){
                $this->session->set_flashdata('berhasil', ' Data has changed');
                $this->setemail4($id);
		//
		

		redirect('Training/verification_training_request');
	}

	public function sent_preassesment($id){
		$id=260;
	$this->sent_checkpoint_daf($id);
	}

	public function sent_checkpoint_daf($id){
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
           //load email library
          
			 $this->load->library('email', $config);

							
			$email=$this->session->userdata('email_atasan');

			$subject='Confirm Form Evaluasi Level - 3 PRE | Perumnas Training Agenda';
			//$data['page_name']= 'evaluasi/konfirmasi';
			//$msg = $this->load->view('main_layout_panel',$data,TRUE);
			//$msg = 'Mohon untuk mengisi form evaluasi Lv3 , usulan pelatihan dari Saudara ' +$this->session->userdata('Nama_pegawai')+ 'melalui link dibawah ini <br/> ,'+ '<a href= "http://infotraining.perumnas.co.id/Panel_user/evaluation_3/"' +$this->session->userdata('id_tp')+'<br/>Terima kasih';
			$ABC = 'Silahkan klik link dibawah ini untuk mengkonfirmasi usulan pelatihan karyawan Anda an.'.$this->session->userdata('Nama_pegawai').'

			. <br/>Registration_PeTA/update_verification_status/update_code='.$this->session->userdata('Nama_pegawai').'= http://infotraining.perumnas.co.id/Panel_user/evaluation_3/'.$this->session->userdata('id_tp').'"</a> <a href=http://infotraining.perumnas.co.id/Panel_user/evaluation_3/'.$this->session->userdata('id_tp').'>Link Pre Evaluasi Level 3</a>';
			//$message= $ABC;
			$data['sesinya'] = $sesinya;
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
                              $this->session->set_flashdata('message', ' Email sudah terkirim Ke Atasan Ybs , untuk mengisi Form Evaluasi');
                            redirect('training/verification_training_request');
                           }
                           else
                          {
                           show_error($this->email->print_debugger());
                            $this->session->set_flashdata('meesage', ' Mohon Pastikan Koneksi Internet Anda Aktif');
                             redirect('panel_usertraining/verification_training_request');
                          }
                      }
	}

	public function setemail4($id)
			{
			 $sesinya = $sesinya = $this->db->get_where('tview_trans_pelatihan', array('id_tp' => $id))->row();
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
			$message= $this->load->view('pages/email/tmpt_reset',$data,TRUE);
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
                            //redirect('training/verification_training_request');
                              $this->db->where('id_tp', $id);
							  $this->db->delete('ttrans_pelatihan');
                           }
                           else
                          {
                           show_error($this->email->print_debugger());
                            $this->session->set_flashdata('meesage', ' Mohon Pastikan Koneksi Internet Anda Aktif');
                             redirect('training/verification_training_request');
                          }
                      }
			    }	


	}
?>