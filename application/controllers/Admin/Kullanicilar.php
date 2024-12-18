<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kullanicilar extends CI_Controller {
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
		$data['sidebartitle'] = "adminkullanicilar";
		
		$data["title"]="Kullanicilar";
		
		$sql = $this->db->query("SELECT * FROM kullanicilar WHERE Statu = '1'");
		$data['kullanicilar'] = $sql->result();

		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/kullanicilar/index');
		$this->load->view('admin/shared/_footer');
	}
	public function kullanicisil($id)
	{
		$data["title"]		  = "Kullanıcılar";
		$data['sidebartitle'] = "adminkullanicilar";
		$this->db->query("UPDATE kullanicilar SET Statu = '0' WHERE KullaniciID = '".$id."'");
		$this->session->set_flashdata("sonuc","Kayıt Silme İşlemi Başarı ile Gerçekleştirildi");
		redirect(base_url()."admin/kullanicilar",$data);  
	}
	public function kullaniciekle()
	{
		$data["title"]		  = "Kullanıcı Ekle";
		$data['sidebartitle'] = "adminkullanicilar";
		$data['kullanicilar']   = $this->db->query("SELECT * FROM kullanicilar WHERE Statu = '1'")->result();
	 
		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/kullanicilar/kullaniciekle');
		$this->load->view('admin/shared/_footer');
		
	} 
	public function kullanicieklekaydet()
	{		
		$data = array(
			'Adi' => $this->input->post('Adi'),
			'Soyadi' => $this->input->post('Soyadi'),
			'Email' => $this->input->post('Email'),  
			'KullaniciAdi' => $this->input->post('KullaniciAdi'), 
			'Sifre' => md5($this->input->post('Sifre')),  
			'Tel' => $this->input->post('Tel'),  
			'Meslek' => $this->input->post('Meslek'),  
			'Adres' => $this->input->post('Adres'), 
			'Ozet' => $this->input->post('Ozet'),
			'Facebook' => $this->input->post('Facebook'),
			'Twitter' => $this->input->post('Twitter'),
			'Instagram' => $this->input->post('Instagram'),
			'Linkedin' => $this->input->post('Linkedin')
		);

	 
		$resultid = $this->Database_Model->insert_data('kullanicilar',$data);
		 
		$config['upload_path'] = './uploads/profil/';
        $config['allowed_types'] = 'gif|jpg|png|JPEG|JPG|PNG';
        $config['max_size'] = 7000;
        $config['max_width'] = 7000;
        $config['max_height'] = 7000;

        $this->load->library('upload', $config); 
	 
		
        if ($this->upload->do_upload('Foto')) {
				$data2 = array( 
					'Foto' => $this->upload->data('file_name'), 
				);
		 
			$this->Database_Model->update_data_with_column("kullanicilar",$data2,$resultid,"KullaniciID");
			$this->session->set_flashdata("sonucbasarili","Kullanıcı Ekleme İşlemi Başarı ile Gerçekleştirildi.");
		}else{
			$this->session->set_flashdata("sonucbasarisiz","Kullanıcı Ekleme İşlemi Başarısız.");
		} 
		redirect(base_url()."admin/kullanicilar",$data); 
	}
	public function kullaniciduzenle($id){
		$data["title"]		  = "Kullanıcı Düzenle"; 
		$data['sidebartitle'] = "adminkullanicilar";
		$data['kullanici'] = $this->db->query("SELECT * FROM kullanicilar WHERE KullaniciID = '".$id."' AND Statu = '1'")->result();
	 
		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/kullanicilar/kullaniciduzenle');
		$this->load->view('admin/shared/_footer');
	}
	
	public function kullaniciduzenlekaydet($id)
	{  
		$data = array(
			'Adi' => $this->input->post('Adi'),
			'Soyadi' => $this->input->post('Soyadi'),
			'Email' => $this->input->post('Email'),  
			'KullaniciAdi' => $this->input->post('KullaniciAdi'), 
			'Sifre' => md5($this->input->post('Sifre')),  
			'Tel' => $this->input->post('Tel'),  
			'Meslek' => $this->input->post('Meslek'),  
			'Adres' => $this->input->post('Adres'), 
			'Ozet' => $this->input->post('Ozet'),
			'Facebook' => $this->input->post('Facebook'),
			'Twitter' => $this->input->post('Twitter'),
			'Instagram' => $this->input->post('Instagram'),
			'Linkedin' => $this->input->post('Linkedin')
		);
		$this->Database_Model->update_data_with_column("kullanicilar",$data,$id,"KullaniciID");
		
		$config['upload_path'] = './uploads/profil/';
        $config['allowed_types'] = 'gif|jpg|png|JPEG|JPG|PNG';
        $config['max_size'] = 7000;
        $config['max_width'] = 7000;
        $config['max_height'] = 7000;

        $this->load->library('upload', $config); 
	  
        if ($this->upload->do_upload('Foto')) {
				$data2 = array( 
					'Foto' => $this->upload->data('file_name'), 
				);
		 
			$this->Database_Model->update_data_with_column("kullanicilar",$data2,$id,"KullaniciID");
			$this->session->set_flashdata("sonucbasarili","Kullanıcı Ekleme İşlemi Başarı ile Gerçekleştirildi.");

			
		}else{
			$this->session->set_flashdata("sonucbasarisiz","Kullanıcı Ekleme İşlemi Başarısız.");
		} 
  
		redirect(base_url()."admin/kullanicilar"); 
	} 
 
}
