<?php

class Slider_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();	
}

	public function insert_data($table,$data)
	{
		
		$this->db->insert($table,$data);
		return $this->db->insert_id();	
	}
	
	public function update_data($table,$data,$id)
	{
		
		$this->db->where("Id",$id);
		$this->db->update($table,$data);
		return true;	
	}
	public function slider_listesi()
	{
		$query = $this->db->get('slider');
		return $query->result();
	}
	public function slider_cek($id)
	{
		$query = $this->db->query("SELECT * FROM slider WHERE Id='".$id."'");
		return $query->result();
	}
	public function kategoriler()
	{
		$this->db->from("urun_kategori");
		$query=$this->db->get();
		return $query->result();
	}

	public function kategori_cek($id)
	{
		$this->db->from("urun_kategori");
		$this->db->where("Id",$id);
		$query=$this->db->get();
		return $query->result();

	}


	
	
	
	
	
	
	
	
	
	
}