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
	public function profilekle()
	{
		$data["title"]="profil Ekle";
		$data['sidebartitle'] = "adminprofil";
		$data['profil'] = $this->db->query("SELECT * FROM profil WHERE Statu = '1'")->result();
	 
		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/profil/profilekle');
		$this->load->view('admin/shared/_footer');
		
	} 
	public function profileklekaydet()
	{		
		$data = array(
			'Baslik' => $this->input->post('baslik'),
			'Soru' => $this->input->post('soru'),
			'Cevap' => $this->input->post('cevap')  
		);
		$resultid = $this->Database_Model->insert_data('profil',$data);
		 
		if($resultid){
			$this->session->set_flashdata("sonucbasarili","Ürün Ekleme İşlemi Başarı ile Gerçekleştirildi.");
		}else{
			$this->session->set_flashdata("sonucbasarisiz","Ürün Ekleme İşlemi Başarı Başarısız.");
		}
		
		redirect(base_url()."admin/profil",$data); 
	}
	public function profilduzenle($id){
		$data["title"]="profil Düzenle"; 
		$data['sidebartitle'] = "adminprofil";
		$data['urun'] = $this->db->query("SELECT * FROM profil WHERE profilID = '".$id."' AND Statu = '1'")->result();
	 
		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/profil/profilduzenle');
		$this->load->view('admin/shared/_footer');
	}
	
	public function profilduzenlekaydet($id)
	{  
		$data2 = array(
			'Baslik' => $this->input->post('baslik'),
			'Soru' => $this->input->post('soru'),
			'Cevap' => $this->input->post('cevap')
		); 
		$this->Database_Model->update_data("profil",$data2,$id);
		$this->session->set_flashdata("sonuc","Kayıt Güncelleme İşlemi Başarı ile Gerçekleştirildi");
		redirect(base_url()."admin/profil"); 
	} 
 
}
