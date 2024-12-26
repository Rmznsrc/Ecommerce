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

		$usql = $this->db->query("SELECT a.* FROM urun_kategori a WHERE a.Statu = '1' AND a.UstKategoriID = '0'");
		$data['ustkategoriler'] = $usql->result();
		
		foreach($data['ustkategoriler'] as $key => $rsk){
			$ustid = $rsk->KategoriID;
			$vsay = $this->db->query("SELECT COUNT(KategoriID) as say FROM urun_kategori WHERE UstKategoriID = '".$ustid."' AND Statu = '1'")->result();
			$say = $vsay;
			//var_dump($say);
			while($say > 0){
				$v = $this->db->query("SELECT * FROM urun_kategori WHERE UstKategoriID = '".$ustid."' AND Statu = '1'")->result();
				//var_dump($v);
				$data['K'][$v[0]->Adi] =$v[0]->Adi;
				
				$ustid = $v[0]->KategoriID;
				//var_dump($ustid);
				$var = $this->db->query("SELECT COUNT(KategoriID) as say FROM urun_kategori WHERE UstKategoriID = '".$ustid."' AND Statu = '1'")->result();
				$say = $var[0]->say;
			}
			
		}
		$data['kategoriler']  = $this->db->query("SELECT * FROM urun_kategori WHERE Statu = '1'")->result();

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
		$data['kategoriler']  = $this->db->query("SELECT * FROM urun_kategori WHERE Statu = '1'")->result();
	 
		$this->load->view('admin/shared/_header',$data);
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/kategoriler/kategoriekle');
		$this->load->view('admin/shared/_footer'); 
	} 
	public function kategorieklekaydet()
	{		
		$data = array(
			'UstKategoriID' => $this->input->post('ustkategori'),
			'Adi'   		=> $this->input->post('kategori') 
		);
		$resultid = $this->Database_Model->insert_data('urun_kategori',$data);
		 
		if($resultid){
			$this->session->set_flashdata("sonucbasarili","Kategori Ekleme İşlemi Başarı ile Gerçekleştirildi.");
		}else{
			$this->session->set_flashdata("sonucbasarisiz","Kategori Ekleme İşlemi Başarı Başarısız.");
		}
		redirect(base_url()."admin/kategoriler",$data); 
	}
  
	public function get_cat_by_parent($id) {
		$sql = $this->db->query("SELECT * FROM urun_kategori WHERE UstKategoriID = '".$id."'");
		$data = $sql->result();
		 
		return $data;
	}
	
	public function recursive( $array, $depth, $label ) {
		$depth++;
		 
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

public	function get_categorytree($parent_id = 0)
{
 
    $return_arr = array();

    $query = $this->db->where('UstKategoriID',$parent_id)->get('urun_kategori');
	

    foreach ($query->result() as $r)
    {
        $arr = array(
            'KategoriID' => $r->KategoriID,
            'Adi' => $r->Adi
        );
	 
        if ($this->has_children($r->KategoriID))
        {
			 
            $children = $this->get_categorytree($r->KategoriID);
            if ($children)
            {
                $arr['children'] = $children;
				 
            }
			 
        }

        $return_arr[] = $arr;

    }

    return $return_arr;

}


	public	function gethtml($parent_id = 0)
	{
		$return_arr = array();
		$query = $this->db->where('UstKategoriID',$parent_id)->get('urun_kategori');
		foreach ($query->result() as $r)
		{
			$arr = array(
				//'KategoriID' => $r->KategoriID,
				'Adi' => $r->Adi
			);
			if ($this->has_children($r->KategoriID))
			{
				$children = $this->gethtml($r->KategoriID);
				if ($children)
				{
					$arr = $children;
				}
			} 
			$return_arr[$r->Adi] = $arr;
		}
		return $return_arr;
	}
	function has_children($id)
	{
		$this->db->where('UstKategoriID',$id);
		$this->db->from('urun_kategori');
		return $this->db->count_all_results();
	}

}
