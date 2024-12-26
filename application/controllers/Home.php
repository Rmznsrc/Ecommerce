<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
        {
			parent::__construct();
			error_reporting(0);
			$this->load->library("session");  
			$this->load->model("Database_Model");  
			 
        }
	public function index()
	{
		$data["title"] = "Anasayfa";
		$data["sidebartitle"] = "anasayfa";
		
		$usql = $this->db->query("SELECT a.* FROM urun_kategori a WHERE a.Statu = '1' AND a.UstKategoriID = '0'");
		$data['ustkategoriler'] = $usql->result();
		
		$data['depArr'] = $this->gethtml();
		$this->load->view('shared/header',$data);
		$this->load->view('shared/slider');
		$this->load->view('home/index');
		$this->load->view('shared/footer');
	}
	public function gethtml($parent_id = 0, $say = 0)
	{
		$return_arr = array();
		$query = $this->db->where('UstKategoriID',$parent_id)->get('urun_kategori');
	
			foreach ($query->result() as $r)
			{
				$arr = array(
					//'KategoriID' => $r->KategoriID,
					'Adi' => $r->Adi
				);
				$sayi = $r->KategoriID;
				while($sayi != 0){
					$veri = $this->db->query("SELECT UstKategoriID FROM urun_kategori WHERE KategoriID = '".$sayi."' ")->result();
					$sayi = $veri[0]->UstKategoriID;
					$say++;
				}
				if ($this->has_children($r->KategoriID) && $say <=2)
				{ 
					$children = $this->gethtml($r->KategoriID, $say);
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
