<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
        {
                parent::__construct();
                error_reporting(0);
                $this->load->model("Session_Model");
				$this->load->library("session");
                
             
        }
		public function index()
		{
			$this->load->view('admin/login/index');
		}
		public function girisyap()
		{
			session_start();
			$eml = $this->input->post("email");
			$sfr = $this->input->post("password");
			$email = $this->security->xss_clean($eml);
			$password = $this->security->xss_clean($sfr);
			 
			$result=$this->Session_Model->login($email,$password);
			if($result)
			{
			$oturum_dizi=array(
				'id'     =>$result[0]->id,
				'email'  =>$result[0]->email,
				'password'  =>$result[0]->password,
				'adi'=>$result[0]->adi, 
				'soyadi'=>$result[0]->soyadi
			);	
			 
			$this->session->set_userdata('user',$oturum_dizi);
			  redirect(base_url().'admin/home');
			}
			else{
				$this->session->set_flashdata("sonuc","Yanlış email yada şifre");
				redirect(base_url().'admin/login');	
			}	
		}
		public function logout(){
				 
				$this->session->unset_userdata();
				redirect(base_url());
		}
	
		 
}