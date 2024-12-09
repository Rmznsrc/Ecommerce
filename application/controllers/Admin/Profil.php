<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	public function __construct()
        {
			parent::__construct();
			error_reporting(0);
			$this->load->library("session");  
			$this->load->model("Database_Model");  
			
 
			
			if(!$this->session->userdata("oturum_data")){
				redirect(base_url().'admin/login');
			}    
        }
	public function index()
	{
		$data['sidebartitle'] = "adminprofil";
		
		$data["title"]="Profil";
		
		$sql = $this->db->query("SELECT * FROM kullanicilar WHERE KullaniciID='".$this->session->oturum_data['id']."' AND Statu = '1'");
		$data['profil'] = $sql->result();

		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/profil/index');
		$this->load->view('admin/shared/_footer');
	}
	public function profilsil($id)
	{
		$data["title"]="profil";
		$data['sidebartitle'] = "adminprofil";
		$this->db->query("UPDATE profil SET Statu = '0' WHERE profilID = '".$id."'");
		$this->session->set_flashdata("sonuc","Kayıt Silme İşlemi Başarı ile Gerçekleştirildi");
		redirect(base_url()."admin/profil",$data); 

	}  
	public function profilduzenlekaydet($id)
	{  
		$data2 = array(
			'Adi' => $this->input->post('Adi'),
			'Soyadi' => $this->input->post('Soyadi'),
			'Tel' => $this->input->post('Tel'),
			'Meslek' => $this->input->post('Meslek'),
			'Adres' => $this->input->post('Adres'),
			'Email' => $this->input->post('Email'),
			'Twitter' => $this->input->post('Twitter'),
			'Facebook' => $this->input->post('Facebook'),
			'Instagram' => $this->input->post('Instagram'),
			'Linkedin' => $this->input->post('Linkedin'), 
		); 
		$this->Database_Model->update_data("kullanicilar",$data2,$id);
		$this->session->set_flashdata("sonuc","Kayıt Güncelleme İşlemi Başarı ile Gerçekleştirildi");
		redirect(base_url()."admin/profil"); 
	} 
	public function profilsifredegistir($id)
	{  
		$mevcutsifre 	 =  md5($this->input->post('mevcutsifre'));
		$yenisifre       =  $this->input->post('yenisifre');
		$yenisifretekrar =  $this->input->post('yenisifretekrar');
		if($mevcutsifre == $this->session->oturum_data['sifre']){
			$data2 = array(
				'Sifre' => md5($yenisifre), 
			); 
			$this->Database_Model->update_data_with_column("kullanicilar",$data2,$id,'KullaniciID');
			$this->session->set_flashdata("sonucbasarili","Kayıt Güncelleme İşlemi Başarı ile Gerçekleştirildi"); 
		}else{
			$this->session->set_flashdata("sonucbasarisiz","Kayıt Güncelleme İşlemi Başarısız. Mevcut şifre doğru değil!"); 
		} 
		redirect(base_url()."admin/profil"); 
	}
}
