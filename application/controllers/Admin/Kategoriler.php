<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategoriler extends CI_Controller {
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
		$data['sidebartitle'] = "adminkategoriler";
		$data["title"]		  = "Kategoriler";
		$sql = $this->db->query("SELECT a.*, b.Adi as UstKategori 
		FROM urun_kategori a 
		LEFT JOIN urun_kategori b ON a.UstKategoriID = b.KategoriID
		WHERE a.Statu = '1'");
		$data['kategoriler'] = $sql->result();

		$usql = $this->db->query("SELECT a.*	FROM urun_kategori a WHERE a.Statu = '1' AND a.UstKategoriID = '0'");
		$data['ustkategoriler'] = $usql->result();

		$data['controller'] = $this; 

		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/kategoriler/index');
		$this->load->view('admin/shared/_footer');
	}
	public function kategorisil($id)
	{
		$data["title"]		  = "Kategoriler";
		$data['sidebartitle'] = "adminkategoriler";
		$this->db->query("UPDATE urun_kategori SET Statu = '0' WHERE KategoriID = '".$id."'");
		$this->session->set_flashdata("sonuc","Kayıt Silme İşlemi Başarı ile Gerçekleştirildi");
		redirect(base_url()."admin/kategoriler",$data); 

	}
	public function kategoriekle()
	{
		$data["title"]="Kategori Ekle";
		$data['sidebartitle'] = "adminkategori";
		$data['kategoriler'] = $this->db->query("SELECT * FROM urun_kategori WHERE Statu = '1'")->result();
	 
		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/kategoriler/kategoriekle');
		$this->load->view('admin/shared/_footer');
		
	}
 
	

	public function kategorieklekaydet()
	{		
		$data = array(
			'Baslik' => $this->input->post('baslik'),
			'Soru' => $this->input->post('soru'),
			'Cevap' => $this->input->post('cevap')  
		);
		$resultid = $this->Database_Model->insert_data('urun_kategori',$data);
		 
		if($resultid){
			$this->session->set_flashdata("sonucbasarili","Ürün Ekleme İşlemi Başarı ile Gerçekleştirildi.");
		}else{
			$this->session->set_flashdata("sonucbasarisiz","Ürün Ekleme İşlemi Başarı Başarısız.");
		}
		
		redirect(base_url()."admin/sss",$data); 
	}
	public function kategoriduzenle($id){
		$data["title"]		  = "Kategori Düzenle"; 
		$data['sidebartitle'] = "adminkategori";
		$data['urun'] = $this->db->query("SELECT * FROM urun_kategori WHERE KategoriID = '".$id."' AND Statu = '1'")->result();
	 
		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/kategoriler/kategoriduzenle');
		$this->load->view('admin/shared/_footer');
	}
	
	public function kategoriduzenlekaydet($id)
	{  
		$data2 = array(
			'Baslik' => $this->input->post('baslik'),
			'Soru' => $this->input->post('soru'),
			'Cevap' => $this->input->post('cevap')
		); 
		$this->Database_Model->update_data_with_column("urun_kategori",$data2,$id,'KategoriID');
		$this->session->set_flashdata("sonuc","Kayıt Güncelleme İşlemi Başarı ile Gerçekleştirildi");
		redirect(base_url()."admin/sss"); 
	} 
	public function kategoriListe($id)
    {
             
        echo "<ul>";
        
        $kod="SELECT K.KategoriID, K.Adi,
              (SELECT COUNT(A.KategoriID) FROM urun_kategori AS A WHERE A.UstKategoriID = K.KategoriID ) as altKategoriSayisi
              FROM urun_kategori AS K
              WHERE K.UstKategoriID = {$id}";
        $sql= $this->db->query($kod)->result();
        foreach($sql as $key1 => $rssq)
        {
            echo "<li>".$rssq->Adi;
            
            if($rssq->altKategoriSayisi>0)
                $this->kategoriListe($rssq->KategoriID);
            
            echo "</li>";

        }
        
        echo "</ul>";

		
    }
	public function get_cat_by_parent($id) {
		$sql = $this->db->query("SELECT * FROM urun_kategori WHERE UstKategoriID = '".$id."'");
		$data = $sql->result();
		 
		return $data;
	}
	
	public function recursive( $array, $depth, $label ) {
		$depth++;
		//var_dump($array);
		$data   = $this->get_cat_by_parent( $array->KategoriID );
		if(count($data)) {
			foreach( $data as $row) {
				echo $label;
				echo " &#x2192; ";
				echo $row->Adi;
				echo "<br />";
				$this->recursive( $row, $depth, $label . " &#x2192; " . $row->Adi );
			}
		}
	}
	

}
