<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Urunler extends CI_Controller {
	public function __construct()
        {
			parent::__construct();
			error_reporting(0);
			$this->load->library("session");  
			
			if(!$this->session->userdata("oturum_data")){
				redirect(base_url().'admin/login');
			}    
        }
	public function index()
	{
		$data["title"]="ÜRÜNLER";
		$sql = $this->db->query("SELECT a.*, b.Adi AS KategoriAdi FROM urunler a JOIN kategoriler b ON b.KategoriID = a.KategoriID AND b.Statu = '1' WHERE a.Statu = '1'");
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
		$data['ustkategoriler'] = $this->db->query("SELECT * FROM kategoriler WHERE UstKategoriID = '0' AND Statu = '1'")->result();
	 
		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/urunler/urunekle');
		$this->load->view('admin/shared/_footer');
		
	}
/*	public function altkategorigetir(id){
		$data2['ustkategoriler'] = $this->db->query("SELECT * FROM kategoriler WHERE UstKategoriID = '".$id."' AND Statu = '1'")->result();	
		return $data2;
	}*/
	public function kategoriListe($id)
    {
        global $con;
        
		$id = $this->db->post['id'];
        
        $kod="SELECT
  K.KategoriID, K.Adi,
  (SELECT COUNT(A.KategoriID) FROM kategoriler AS A WHERE A.UstKategoriID=K.KategoriID ) as altKategoriSayisi
              FROM kategoriler AS K
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

	public function uruneklekaydet()
	{
		//klasör yolu al
		$kategoriid = $this->input->post('kategori');
		$kategoriler=$this->Urunler_Model->kategori_cek($kategoriid);
		$klasor_yolu = $kategoriler[0]->klasor_yolu;
		//ürün adı al
		$urun_adi=$this->input->post('urun_ad');

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
		// var_dump($str);
		$config['upload_path'] = './uploads/'.$klasor_yolu.'/';
        $config['allowed_types'] = 'gif|jpg|png|JPEG|JPG|PNG';
        $config['max_size'] = 7000;
        $config['max_width'] = 7000;
        $config['max_height'] = 7000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('resim')) {
	
		//    $error = array('error' => $this->upload->display_errors());
		$data = array(
			'urun_ad' => $this->input->post('urun_ad'),
			'urun_kat_id' => $this->input->post('kategori'),
			'urun_kunye' => $this->input->post('urun_kunye'),
			'urun_icerik' => $this->input->post('urun_icerik'),
			'urun_mac' => $str,
			'urun_fiyat' => $this->input->post('urun_fiyat'),
			'urun_icbilgi' => $this->input->post('urun_icbilgi'),
			'urun_genelbilgi' => $this->input->post('urun_genelbilgi'),
			'urun_ozellikler' => $this->input->post('urun_ozellikler'),
			'urun_resim' => '',
		
		);
		$this->Urunler_Model->insert_data('urunler',$data);
		$this->session->set_flashdata("sonuc","Ürün Ekleme İşlemi Başarı ile Gerçekleştirildi");
        } else {
            $data = array(
				'urun_ad' => $this->input->post('urun_ad'),
				'urun_kat_id' => $this->input->post('kategori'),
				'urun_kunye' => $this->input->post('urun_kunye'),
				'urun_icerik' => $this->input->post('urun_icerik'),
				'urun_mac' => $str,
				'urun_fiyat' => $this->input->post('urun_fiyat'),
				'urun_icbilgi' => $this->input->post('urun_icbilgi'),
				'urun_genelbilgi' => $this->input->post('urun_genelbilgi'),
				'urun_ozellikler' => $this->input->post('urun_ozellikler'),
				'urun_resim' => $this->upload->data('file_name'),
			
			);
			$this->Urunler_Model->insert_data('urunler',$data);
            $this->session->set_flashdata("sonuc","Ürün Ekleme İşlemi Başarı ile Gerçekleştirildi");
		
		}
	
		redirect(base_url()."admin/urunler/urun_ekle",$data); 
	}

}
