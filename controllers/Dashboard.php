<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_controller {

	public function __construct(){
	parent:: __construct();	
	
	if (! $this->session->userdata('is_login') ){
			
			 redirect('user/login');
			 //echo site_url('dashboard/page_down')
		}
	
	
	}
	
	public function index()
	{
		$data['title'] = 'dashboard';
		//$data['page_name'] = 'user/dashboard';
		$data['page_name'] = 'dashboard/index';
		$data['angka']= $this->provider_m->realtime_info_m()->row();
		$data['datanya']= $this->provider_m->get_request_karyawan();
		$data['lelang']=$this->pelelangan_m->get_data_lelang();
		$this->load->view('main_layout',$data);
	}

	public function page_down(){

		$this->load->view('pages/dashboard/maintenance');
	}
}
