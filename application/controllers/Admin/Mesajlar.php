<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mesajlar extends CI_Controller {
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
		$data['sidebartitle'] = "adminmesajlar";
		
		$data["title"]="Mesajlar";
		
		$sql = $this->db->query("SELECT * FROM mesajlar WHERE Statu = '1'");
		$data['mesajlar'] = $sql->result();

		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/mesajlar/index');
		$this->load->view('admin/shared/_footer');
	}
	public function mesajsil($id)
	{
		$data["title"] = "Mesajlar";
		$data['sidebartitle'] = "adminmesajlar";
		$this->db->query("UPDATE mesajlar SET Statu = '0' WHERE MesajID = '".$id."'");
		$this->session->set_flashdata("sonuc","Kayıt Silme İşlemi Başarı ile Gerçekleştirildi");
		redirect(base_url()."admin/mesajlar",$data); 

	}
	public function mesajekle()
	{
		$data["title"]="Mesaj Ekle";
		$data['sidebartitle'] = "adminmesajlar";
		$data['mesajlar'] = $this->db->query("SELECT * FROM mesajlar WHERE Statu = '1'")->result();
	 
		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/mesajlar/mesajekle');
		$this->load->view('admin/shared/_footer');
		
	} 
	public function mesajeklekaydet()
	{		
		$data = array(
			'Ad' => $this->input->post('Ad'),
			'Soyad' => $this->input->post('Soyad'),
			'Email' => $this->input->post('Email'),
			'Tel' => $this->input->post('Tel'),
			'Aciklama' => $this->input->post('Aciklama'),
			'Konu' => $this->input->post('Konu'),
			'Tarih' => $this->input->post('Tarih')  
		);
		$resultid = $this->Database_Model->insert_data('mesajlar',$data);
		 
		if($resultid){
			$this->session->set_flashdata("sonucbasarili","Ekleme İşlemi Başarı ile Gerçekleştirildi.");
		}else{
			$this->session->set_flashdata("sonucbasarisiz","Ekleme İşlemi Başarı Başarısız.");
		}
		
		redirect(base_url()."admin/mesajlar",$data); 
	}
	public function mesajduzenle($id){
		$data["title"]="Mesaj Düzenle"; 
		$data['sidebartitle'] = "adminmesaj";
		$data['mesaj'] = $this->db->query("SELECT * FROM mesajlar WHERE MesajID = '".$id."' AND Statu = '1'")->result();
	 
		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/mesajlar/mesajduzenle');
		$this->load->view('admin/shared/_footer');
	}
	
	public function mesajduzenlekaydet($id)
	{  
		$data = array(
			'Ad' => $this->input->post('Ad'),
			'Soyad' => $this->input->post('Soyad'),
			'Email' => $this->input->post('Email'),
			'Tel' => $this->input->post('Tel'),
			'Aciklama' => $this->input->post('Aciklama'),
			'Konu' => $this->input->post('Konu'),
			'Tarih' => $this->input->post('Tarih')  
		);
		$this->Database_Model->update_data_with_column("mesajlar",$data,$id,'MesajID');
		$this->session->set_flashdata("sonuc","Kayıt Güncelleme İşlemi Başarı ile Gerçekleştirildi");
		redirect(base_url()."admin/mesajlar"); 
	} 
 
}
