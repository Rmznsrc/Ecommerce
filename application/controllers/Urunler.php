<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Urunler extends CI_Controller {
	public function __construct()
        {
			parent::__construct();
			error_reporting(0);
			$this->load->library("session");  
			$this->load->model("Database_Model");  
			 
        }
	public function index()
	{
		$data["title"] = "Urunler";
		$data["sidebartitle"] = "Urunler";
		
		$usql = $this->db->query("SELECT b.adi as KategoriAdi, a.* 
		FROM urunler a 
		JOIN urun_kategori b ON a.KategoriID = b.KategoriID
		WHERE a.Statu = '1'");
		$data['urunler'] = $usql->result();
		 
		$this->load->view('shared/header',$data); 
		$this->load->view('urunler/index');
		$this->load->view('shared/footer');
	}
	 
}
