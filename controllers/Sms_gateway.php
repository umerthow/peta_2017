<?php
class Sms_gateway extends CI_controller{

public function index(){
	$data['title']='SMS GATE WAY PERUMNAS';
	$data['page_name']= 'sms/index';
	$this->load->view('main_layout',$data);
}

public function groups($id){
	$data['title']='SMS GATE WAY PERUMNAS';
	$data['page_name']= 'sms/groups';
	$data['nama'] = $this->sms_m->get_grup_name($id);
	$data['detail']= $this->sms_m->get_kontak($id);
	$this->load->view('main_layout',$data);
}

public function proses_kirim(){
define("MESABOT_TOKEN","Ohf3rNTudcT5SkpOh2a0caZeMX2bNHeJuCQD7HSz");
$this->load->library('Mesabot');
$nomer = $this->input->post('phone');
$pesan = $this->input->post('pesan');
try {

						    // 1 phone number
						    $data2 = [
						        'destination' => $nomer,
						        'text' => $pesan
						    ];				 
						    $mesabot = new Mesabot();
						    $mesabot->sms($data2);
						    print_r($mesabot->response());
						} catch (Exception $e) {
						    echo $e->getMessage();
						}
$this->session->set_flashdata('berhasil', ' Single SMS berhasil dikirim');
$data['page_name']= 'sms/index';
$this->load->view('main_layout',$data);
}

public function smsblast(){
	$data['title']='Provider';
	$data['page_name']= 'sms/blast';
	$data['list'] = $this->sms_m->get_grup();
	$this->load->view('main_layout',$data)	;

}

public function deletegroups($id){
$this->sms_m->deletegroups($id);
$this->session->set_flashdata('berhasil', ' Group berhasil didelete');
$data['list'] = $this->sms_m->get_grup();
$data['page_name']= 'sms/blast';
$this->load->view('main_layout',$data);
}

public function group_sms(){
	$data['title']='Provider';
	$data['page_name']= 'sms/tambahgroup';

	$this->load->view('main_layout',$data)	;
}

public function proses_kirim_massal(){
define("MESABOT_TOKEN","Ohf3rNTudcT5SkpOh2a0caZeMX2bNHeJuCQD7HSz");
$this->load->library('Mesabot');
	$group = $this->input->post('group');
	$x =  $this->sms_m->get_grup_name($group);
	$namagroup = $x->nama_group;

	$pesan = $this->input->post('pesan');
	$groupnya=array();
	$groupnya = $this->sms_m->get_kontak($group);

	//echo json_encode($groupnya->kontak);
	 foreach ($groupnya as $key => $value) {
		$kontak = $value->kontak;
	
	 	$pieces = implode(",", $kontak);
	 	echo $pieces;
	 	
	 }


	//  $kontak  = $value->kontak;
	// 	try {
	// 			 $data = [
	// 		    'destination' =>  $kontak,
	// 			'text' => $pesan
	// 				    ];

	// 		$mesabot = new Mesabot();
	// 		$mesabot->sms($data);
	// 		//print_r($mesabot->response());
	// 				} catch (Exception $e) {
	// 					echo $e->getMessage();
	// 										}
	// 		}
	// $this->session->set_flashdata('berhasil', ' GROUP SMS  ke '.$namagroup.' berhasil dikirim');
	// redirect('sms_gateway/smsblast'); 
}

public function uploadkontak(){
date_default_timezone_set('Asia/Jakarta');      //Don't forget this..I had used this..just didn't mention it in the post
$datetime_variable = new DateTime();
$datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');
$namagroup['nama_group'] = $this->input->post('groupname');
$namagroup['date'] =$datetime_formatted;


 $this->form_validation->set_rules('groupname','groupname','required');
 if($this->form_validation->run() == FALSE ){
 			$data['page_name']= 'sms/tambahgroup';
			$this->load->view('main_layout',$data);
		
		}else {		
					$this->sms_m->insertgroup($namagroup);
					$config['upload_path'] = './temp_file/';
					$config['allowed_types'] = 'xls|xlsx';
					$config['max_size'] = '5000';//2mb
					$config['file_name'] = 'kontak.xls';
					$config['overwrite'] = true;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					$this->load->library('excel');

					if(!$this->upload->do_upload('attachkontak'))
					{
						$error = array('error' => $this->upload->display_errors());
		                //$this->test_excel($error);
		                $result = array(
			                'isSuccess' => false,
			                'message' => $this->upload->display_errors('', '')
	           			 );

						//
					
					}else {
						 $inputFileName = './temp_file/kontak.xls';
						 $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
						 $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
						 $settingParameter = $this->sms_m->ambil_group()->row();

						 if(!empty($sheetData)){
						 	$kontakData = array();
							foreach ($sheetData as $rowNo => $row) {


							$nomor = str_replace("+62", "0", $row["B"]);
							$nomor = str_replace("'", "", $row["B"]);
							$nomor = str_replace("(", "", $row["B"]);
							$nomor = str_replace(")", "", $row["B"]);
							$nomor = str_replace(".", "", $row["B"]);
							$nomor = str_replace(" ", "", $row["B"]);
							if(!preg_match('/[^+0-9]/',trim($row["B"]))){
								        // cek apakah no hp karakter 1-3 adalah +62
								          if(substr(trim($nomor), 0, 3)=='+62'){
								            $nomor = trim($nomor);
								        }
								        // cek apakah no hp karakter 1 adalah 0
								        else if(substr(trim($nomor), 0, 1)=='0'){
								            $nomor = '+62'.substr(trim($nomor), 1);
								        }
								          // cek apakah no hp karakter 1 adalah 8
								         else if(substr(trim($nomor), 0, 1)=='8'){
								            $nomor = '+62'.substr(trim($nomor), 0);
								        }

								          else if(substr(trim($nomor), 0, 2)=='62'){
								            $nomor = '+'.substr(trim($nomor), 0);
								        }




								        $nomor = substr_replace($nomor,'0',0,3); 
								         
								    }


							//$nomor = substr_replace($nomor,'0',0,3);	

						 if($rowNo == 1) continue;
							$temp = array(
									"idgroup" => $settingParameter->id_group,
									// "nama" => $row["D"],
									"nama" => $row["A"],
									"kontak" => $nomor,
								);	    
							 $kontakData[] = $temp;
						 }
						
						  if ($this->sms_m->import_kontak($kontakData)) {
			                        $this->session->set_flashdata('berhasil', ' Data Group SMS  berhasil diupload');
									redirect('sms_gateway/smsblast');
			                    }
					}

		}
}

}

public function setemailnew() {
			
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
			$ABC = 'Silahkan Cek email TESTING';
			$message= $ABC;
			$name = 'Perumnas Training Agenda';
            $from_email = 'dept.diklat@perumnas.co.id';
           

            //set to_email id to which you want to receive mails
             $to_email = 'ahmad.umar@perumnas.co.id';

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
?>