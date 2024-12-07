<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siparisler extends CI_Controller {
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
		$data['sidebartitle'] = "adminsiparisler";
		$data["title"]="Siparişler";
		$sql = $this->db->query("SELECT a.SiparisNo,a.SiparisTarihi, e.Adi as SiparisDurumAdi, a.SiparisID,
        (SELECT CONCAT(z.Adi,' ', z.Soyadi) FROM musteriler z WHERE z.MusteriID = a.MusteriID) AS musteri
        FROM siparis a 
        JOIN siparis_detay b ON a.SiparisID = b.SiparisID AND b.Statu = '1'
        JOIN siparis_durum e ON e.SiparisDurumID = a.SiparisDurumID 
        JOIN urunler c ON b.UrunID = c.UrunID AND c.Statu = '1'
        JOIN urun_kategori d ON d.KategoriID = c.KategoriID AND d.Statu = '1'
        WHERE a.Statu = '1'");
		$data['siparisler'] = $sql->result();

		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/siparisler/index');
		$this->load->view('admin/shared/_footer');
	}
	public function siparissil($id)
	{
		$data["title"]="Siparişler";
		$this->db->query("UPDATE siparis SET Statu = '0' WHERE SiparisID = '".$id."'");
		$this->session->set_flashdata("sonuc","Kayıt Silme İşlemi Başarı ile Gerçekleştirildi");
		redirect(base_url()."admin/siparisler",$data); 

	}
 
  
	 
	public function siparisduzenle($id){
		$data["title"]="Sipariş Düzenle"; 
		$data['sidebartitle'] = "adminsiparisler";
		$data['siparis']   = $this->db->query("SELECT * FROM siparis WHERE SiparisID = '".$id."' AND Statu = '1'")->result();
        $data['siparisdurum'] = $this->db->query("SELECT * FROM siparis_durum WHERE  Statu = '1'")->result();

		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/siparisler/siparisduzenle');
		$this->load->view('admin/shared/_footer');
	}
	
	public function siparisduzenlekaydet($id)
	{ 
		  
        $data2 = array(
            'SiparisDurumID' => $this->input->post('SiparisDurumID'), 
        );
		  
		$this->Database_Model->update_data_with_column("siparis",$data2,$id, 'SiparisID');
		
		$this->session->set_flashdata("sonuc","Kayıt Güncelleme İşlemi Başarı ile Gerçekleştirildi");
		redirect(base_url()."admin/siparisler"); 
	}
    public function siparisdetay($id){
        $data["title"]="Sipariş Detay"; 
        $data['sidebartitle'] = "adminsiparisler";
		
		$data['siparis']   = $this->db->query("SELECT b.*,c.*,e.Adi AS siparisdurumu,d.Adi AS urunkategorisi, a.SiparisNo, a.SiparisTarihi
        FROM siparis_detay b 
        JOIN siparis a ON a.SiparisID = b.SiparisID AND b.Statu = '1'
        JOIN siparis_durum e ON e.SiparisDurumID = a.SiparisDurumID 
        JOIN urunler c ON b.UrunID = c.UrunID  
        JOIN urun_kategori d ON d.KategoriID = c.KategoriID  
        WHERE a.Statu = '1' AND a.SiparisID = '".$id."'")->result(); 

		$data['siparisdetay']   = $this->db->query("SELECT b.Adi AS siparisdurumu , a.SiparisNo, a.SiparisTarihi,c.Adi,c.Soyadi,  d.*  
		FROM  siparis a  
		JOIN siparis_durum b ON b.SiparisDurumID = a.SiparisDurumID   
		JOIN musteriler c ON c.MusteriID = a.MusteriID
		JOIN musteri_adresler d ON d.MusteriAdresID = a.MusteriAdresID
		WHERE a.Statu = '1' AND a.SiparisID = '".$id."'")->result();


		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/siparisler/siparisdetay');
		$this->load->view('admin/shared/_footer');
    }
	 
}
