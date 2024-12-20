<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SSS extends CI_Controller {
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
		$data['sidebartitle'] = "adminsss";
		
		$data["title"]="SSS";
		
		$sql = $this->db->query("SELECT * FROM sss WHERE Statu = '1'");
		$data['sss'] = $sql->result();

		

		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/sss/index');
		$this->load->view('admin/shared/_footer');
	}
	public function ssssil($id)
	{
		$data["title"]="SSS";
		$data['sidebartitle'] = "adminsss";
		$this->db->query("UPDATE sss SET Statu = '0' WHERE SSSID = '".$id."'");
		$this->session->set_flashdata("sonuc","Kayıt Silme İşlemi Başarı ile Gerçekleştirildi");
		redirect(base_url()."admin/sss",$data); 

	}
	public function sssekle()
	{
		$data["title"]="SSS Ekle";
		$data['sidebartitle'] = "adminsss";
		$data['sss'] = $this->db->query("SELECT * FROM sss WHERE Statu = '1'")->result();
	 
		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/sss/sssekle');
		$this->load->view('admin/shared/_footer');
		
	}
 
	

	public function ssseklekaydet()
	{		
		$data = array(
			'Baslik' => $this->input->post('baslik'),
			'Soru' => $this->input->post('soru'),
			'Cevap' => $this->input->post('cevap')  
		);
		$resultid = $this->Database_Model->insert_data('sss',$data);
		 
		if($resultid){
			$this->session->set_flashdata("sonucbasarili","Ekleme İşlemi Başarı ile Gerçekleştirildi.");
		}else{
			$this->session->set_flashdata("sonucbasarisiz","Ekleme İşlemi Başarı Başarısız.");
		}
		
		redirect(base_url()."admin/sss",$data); 
	}
	public function sssduzenle($id){
		$data["title"]="SSS Düzenle"; 
		$data['sidebartitle'] = "adminsss";
		$data['sss'] = $this->db->query("SELECT * FROM sss WHERE SSSID = '".$id."' AND Statu = '1'")->result();
	 
		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/sss/sssduzenle');
		$this->load->view('admin/shared/_footer');
	}
	
	public function sssduzenlekaydet($id)
	{  
		$data2 = array(
			'Baslik' => $this->input->post('baslik'),
			'Soru' => $this->input->post('soru'),
			'Cevap' => $this->input->post('cevap')
		); 
		$this->Database_Model->update_data("sss",$data2,$id);
		$this->session->set_flashdata("sonuc","Kayıt Güncelleme İşlemi Başarı ile Gerçekleştirildi");
		redirect(base_url()."admin/sss"); 
	} 
 
}
