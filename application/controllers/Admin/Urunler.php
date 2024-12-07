<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Urunler extends CI_Controller {
	public function __construct()
        {
			parent::__construct();
			error_reporting(0);
			$this->load->library("session");  
			$this->load->model("Urunler_Model");  
			
 
			
			if(!$this->session->userdata("oturum_data")){
				redirect(base_url().'admin/login');
			}    
        }
	public function index()
	{
		$data['sidebartitle'] = "adminurunler";
		$data["title"]="ÜRÜNLER";
		$sql = $this->db->query("SELECT a.*, b.Adi AS KategoriAdi FROM urunler a LEFT JOIN urun_kategori b ON b.KategoriID = a.KategoriID AND b.Statu = '1' WHERE a.Statu = '1'");
		$data['urunler'] = $sql->result();

		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/urunler/index');
		$this->load->view('admin/shared/_footer');
	}
	public function urunsil($id)
	{
		$data["title"]="Ürünler";
		$this->db->query("UPDATE urunler SET Statu = '0' WHERE UrunID= '".$id."'");
		$this->session->set_flashdata("sonuc","Kayıt Silme İşlemi Başarı ile Gerçekleştirildi");
		redirect(base_url()."admin/urunler",$data); 

	}
	public function urunekle()
	{
		$data["title"]="Ürün Ekle";
		$data['ustkategoriler'] = $this->db->query("SELECT * FROM urun_kategori WHERE UstKategoriID = '0' AND Statu = '1'")->result();
	 
		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/urunler/urunekle');
		$this->load->view('admin/shared/_footer');
		
	}
/*	public function altkategorigetir(id){
		$data2['ustkategoriler'] = $this->db->query("SELECT * FROM urun_kategori WHERE UstKategoriID = '".$id."' AND Statu = '1'")->result();	
		return $data2;
	}*/
	

	public function uruneklekaydet()
	{
		//klasör yolu al
		$kategoriid  = $this->input->post('kategori');
	//	var_dump( $this->input->post('kategori'));
		$kategoriler = $this->Urunler_Model->kategori_cek($kategoriid);
		$klasor_yolu = $kategoriler[0]->klasor_yolu;
		//ürün adı al
		$urun_adi = $this->input->post('urunadi');

		//karakterleri küçült
		$str= mb_strtolower($urun_adi,'UTF-8');
		//türkçe karakterleri dönüştür
		$str= str_replace(
			['ı','ş','ü','ğ','ç','ö'],
			['i','s','u','g','c','o'],
			$str
		);
		//harf ve sayılar hariç karakterleri - işaretine döndürür
		$str = preg_replace('/[^a-z0-9]/','-',$str);
		//birden fazla - işaretini teke düşür
		$str = preg_replace('/-+/','-',$str);
 
		
		$data = array(
			'Adi' => $this->input->post('urunadi'),
			'KategoriID' => $this->input->post('kategori'),
			'UrunKunye' => $this->input->post('urunkunye'),
			'UrunIcerik' => $this->input->post('urunicerik'),
			'UrunMac' => $str,
			'Fiyat' => $this->input->post('fiyat'),
			'UrunIcBilgi' => $this->input->post('urunicbilgi'),
			'UrunGenelBilgi' => $this->input->post('urungenelbilgi'),
			'UrunOzellikler' => $this->input->post('urunozellikler'),
			'UrunResim' => '',
		
		);
		$resultid = $this->Urunler_Model->insert_data('urunler',$data);
		 
		if (!file_exists('./uploads/urunler/'.$resultid)) {
			mkdir('./uploads/urunler/'.$resultid, 0777, true);
		}
		$config['upload_path'] = './uploads/urunler/'.$resultid.'/';
        $config['allowed_types'] = 'gif|jpg|png|JPEG|JPG|PNG';
        $config['max_size'] = 7000;
        $config['max_width'] = 7000;
        $config['max_height'] = 7000;

        $this->load->library('upload', $config); 
	 
		
        if ($this->upload->do_upload('resim')) {
				$data2 = array( 
					'UrunResim' => $this->upload->data('file_name'), 
				);
		 
			$this->Urunler_Model->urun_update_data("urunler",$data2,$resultid);
			$this->session->set_flashdata("sonucbasarili","Ürün Ekleme İşlemi Başarı ile Gerçekleştirildi.");
		}else{
			$this->session->set_flashdata("sonucbasarisiz","Ürün Ekleme İşlemi Başarı Başarısız.");
		}
		
		redirect(base_url()."admin/urunler",$data); 
	}
	public function urunduzenle($id){
		$data["title"]="Ürün Düzenle";
		$data['ustkategoriler'] = $this->db->query("SELECT * FROM urun_kategori WHERE UstKategoriID = '0' AND Statu = '1'")->result();
		$data['urun'] = $this->db->query("SELECT * FROM urunler WHERE UrunID = '".$id."' AND Statu = '1'")->result();
	 
		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/urunler/urunduzenle');
		$this->load->view('admin/shared/_footer');
	}
	
	public function urunduzenlekaydet($id)
	{ 
		$urun_adi = $this->input->post('urunadi');
		$str = mb_strtolower($urun_adi,'UTF-8');

		$str = str_replace(
			['ı','ş','ü','ğ','ç','ö'],
			['i','s','u','g','c','o'],
			$str
		);
		//harf ve sayılar hariç karakterleri - işaretine döndürür
		$str = preg_replace('/[^a-z0-9]/','-',$str);
		//birden fazla - işaretini teke düşür
		$str = preg_replace('/-+/','-',$str);

 
	
		$config['upload_path'] = './uploads/urunler/'.$id.'/';
        $config['allowed_types'] = 'gif|jpg|png|JPEG|JPG|PNG';
        $config['max_size'] = 7000;
        $config['max_width'] = 7000;
        $config['max_height'] = 7000;

        $this->load->library('upload', $config); 
	 
		
        if ($this->upload->do_upload('resim')) {
	
			$data2 = array(
				'Adi' 			 => $this->input->post('urunadi'),
				'KategoriID' 	 => $this->input->post('kategori'),
				'UrunKunye' 	 => $this->input->post('urunkunye'),
				'UrunIcerik' 	 => $this->input->post('urunicerik'),
				'UrunMac' 		 => $str,
				'Fiyat'		     => $this->input->post('fiyat'),
				'UrunIcBilgi'    => $this->input->post('urunicbilgi'),
				'UrunGenelBilgi' => $this->input->post('urungenelbilgi'),
				'UrunOzellikler' => $this->input->post('urunozellikler'),
				'UrunResim' 	 => $this->upload->data('file_name')
			);
		} else {
			 $data2 = array(
				'Adi' 			 => $this->input->post('urunadi'),
				'KategoriID' 	 => $this->input->post('kategori'),
				'UrunKunye' 	 => $this->input->post('urunkunye'),
				'UrunIcerik' 	 => $this->input->post('urunicerik'),
				'UrunMac' 		 => $str,
				'Fiyat'		     => $this->input->post('fiyat'),
				'UrunIcBilgi'    => $this->input->post('urunicbilgi'),
				'UrunGenelBilgi' => $this->input->post('urungenelbilgi'),
				'UrunOzellikler' => $this->input->post('urunozellikler') 
			 );
		}
 
		
		
		$this->Urunler_Model->urun_update_data("urunler",$data2,$id);
		
		$this->session->set_flashdata("sonuc","Kayıt Güncelleme İşlemi Başarı ile Gerçekleştirildi");
		redirect(base_url()."admin/urunler"); 
	}
	
	
	public function kategoriListe($id)
		{
			global $con;
			
			$id = $this->db->post['id'];
			
			$kod="SELECT
	  K.KategoriID, K.Adi,
	  (SELECT COUNT(A.KategoriID) FROM urun_kategori AS A WHERE A.UstKategoriID=K.KategoriID ) as altKategoriSayisi
				  FROM urun_kategori AS K
				  WHERE K.UstKategoriID = {$id}";
			$sql=mysqli_query($con,$kod);
			while($veri=mysqli_fetch_assoc($sql))
			{
				echo $veri["kategoriAdi"]." -> ";
				
				if($veri["altKategoriSayisi"]>0)
					kategoriListe($veri["id"]);
				
				 

			}
			
			echo "</ul>";
		}
}
