<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
        {
                parent::__construct();
                error_reporting(0);
               	$this->load->model("Admin_Model");
				$this->load->library("session"); 
        }
		public function index()
		{
			$this->load->view('admin/login/index');
		}
		public function girisyap()
		{
			$eml 	  = $this->input->post("email");
			$sfr 	  = $this->input->post("password");
			$email    = $this->security->xss_clean($eml);
			$password = $this->security->xss_clean($sfr); 
		
			$result=$this->Admin_Model->login($email,$password);
		 
			if($result )
			{
				$oturum_dizi=array(
					'id'=>$result[0]->KullaniciID, 
					'email'=>$result[0]->Email,
					'sifre'=>$result[0]->Sifre,
					'adi'=>$result[0]->Adi,
					'soyadi'=>$result[0]->Soyadi,
					'tel'=>$result[0]->Tel,
					'foto'=>$result[0]->Foto, 
					'meslek'=>$result[0]->Meslek, 
					'twitter'=>$result[0]->Twitter, 
					'facebook'=>$result[0]->Facebook, 
					'instagram'=>$result[0]->Instagram, 
					'linkedin'=>$result[0]->Linkedin, 
					'ozet'=>$result[0]->Ozet 
					);	
				$this->session->set_userdata('oturum_data',$oturum_dizi);
				redirect(base_url().'admin/home');
			}
			else{
				$this->session->set_flashdata("login_hata","Geçersiz Email yada Sifre");
				$this->load->view('admin/login/index');	
			}	
		}
		public function logout(){
				 
				$this->session->unset_userdata('oturum_data');	
				$this->session->sess_destroy();
				redirect(base_url().'admin/login');
		}
	
		 
}