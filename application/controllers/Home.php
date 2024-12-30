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
		 
		$this->load->view('shared/header',$data);
		$this->load->view('shared/slider');
		$this->load->view('home/index');
		$this->load->view('shared/footer');
	}
	 
}
