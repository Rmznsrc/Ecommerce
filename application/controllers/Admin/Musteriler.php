<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Musteriler extends CI_Controller {
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
		$data['sidebartitle'] = "adminmusteriler";
		
		$data["title"]="Müşteriler";
		
		$sql = $this->db->query("SELECT * FROM musteriler WHERE Statu = '1'");
		$data['musteriler'] = $sql->result();

		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/musteriler/index');
		$this->load->view('admin/shared/_footer');
	}
	public function musterisil($id)
	{
		$data["title"]		  = "Müşteriler";
		$data['sidebartitle'] = "adminmusteriler";
		$this->db->query("UPDATE musteriler SET Statu = '0' WHERE MusteriID = '".$id."'");
		$this->session->set_flashdata("sonuc","Kayıt Silme İşlemi Başarı ile Gerçekleştirildi");
		redirect(base_url()."admin/musteriler",$data);  
	}
	public function musteriekle()
	{
		$data["title"]		  = "Müşteri Ekle";
		$data['sidebartitle'] = "adminmusteriler";
		$data['musteriler']   = $this->db->query("SELECT * FROM musteriler WHERE Statu = '1'")->result();
	 
		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/musteriler/musteriekle');
		$this->load->view('admin/shared/_footer');
		
	} 
	public function musterieklekaydet()
	{		
		$data = array(
			'Baslik' => $this->input->post('Adi'),
			'Soru' => $this->input->post('Soyadi'),
			'Cevap' => $this->input->post('Email'),  
			'Sifre' => $this->input->post('Sifre'),  
			'Tel' => $this->input->post('Tel'),  
			'DogumTarihi' => $this->input->post('DogumTarihi'),  
			'Cinsiyet' => $this->input->post('Cinsiyet') 
		);
		$resultid = $this->Database_Model->insert_data('musteriler',$data);
		 
		if($resultid){
			$this->session->set_flashdata("sonucbasarili","Ekleme İşlemi Başarı ile Gerçekleştirildi.");
		}else{
			$this->session->set_flashdata("sonucbasarisiz","Ekleme İşlemi Başarı Başarısız.");
		}
		
		redirect(base_url()."admin/musteriler",$data); 
	}
	public function musteriduzenle($id){
		$data["title"]		  = "Müşteri Düzenle"; 
		$data['sidebartitle'] = "adminmusteriler";
		$data['musteriler'] = $this->db->query("SELECT * FROM musteriler WHERE MusteriID = '".$id."' AND Statu = '1'")->result();
	 
		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/musteriler/musteriduzenle');
		$this->load->view('admin/shared/_footer');
	}
	
	public function musteriduzenlekaydet($id)
	{  
		$data2 = array(
			'Baslik' => $this->input->post('Adi'),
			'Soru' => $this->input->post('Soyadi'),
			'Cevap' => $this->input->post('Email'),  
			'Sifre' => $this->input->post('Sifre'),  
			'Tel' => $this->input->post('Tel'),  
			'DogumTarihi' => $this->input->post('DogumTarihi'),  
			'Cinsiyet' => $this->input->post('Cinsiyet') 
		);
		$this->Database_Model->update_data("musteriler",$data2,$id);
		$this->session->set_flashdata("sonuc","Kayıt Güncelleme İşlemi Başarı ile Gerçekleştirildi");
		redirect(base_url()."admin/musteriler"); 
	} 
 
}
