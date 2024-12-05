<?php

class Urunler_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();	
}

	public function insert_data($table,$data)
	{ 
		$this->db->insert($table,$data);
		return $this->db->insert_id();	
	}
	public function insert_foto($table,$data)
	{
		
		$this->db->insert($table,$data);
		return $this->db->insert_id();	
	}
	public function update_data($table,$data,$id, $columnName)
	{
 
		$this->db->where($columnName,$id);
		$this->db->update($table,$data);
		return true;	
	}
	public function urun_update_data($table,$data,$id)
	{
		
		$this->db->where("UrunID",$id);
		$this->db->update($table,$data);
		return true;	
	}
	public function kategoriler()
	{
		$this->db->from("urun_kategori");
		$query=$this->db->get();
		return $query->result();

	
	}
	public function urun_cek($id)
	{
		$this->db->from("urunler");
		$this->db->where("UrunID",$id);
		$query=$this->db->get();
		return $query->result();

	}

	public function urun_galerisi($id)
	{
		$query=$this->db->query("SELECT * FROM urunler JOIN urun_foto ON urunler.UrunID=urun_foto.UrunID WHERE urunler.UrunID='".$id."'");
		return $query->result();
	}

	public function urun_komple_cek($id)
	{
		$query=$this->db->query("SELECT * FROM urunler JOIN urun_kategori ON KategoriID.Id=urunler.KategoriID WHERE urunler.UrunID='".$id."'");
		return $query->result();
	}
	public function kategori_cek($id)
	{
		$this->db->from("urun_kategori");
		$this->db->where("KategoriID",$id);
		$query=$this->db->get();
		//var_dump($query->result());
		return $query->result();

	}
	public function urunler()
	{
		$this->db->from("urunler");
		$this->db->join('urun_kategori','urunler.KategoriID=urun_kategori.KategoriID');
		$query=$this->db->get();
		return $query->result();

	}
	public function get_urunler($id)
	{
		$this->db->from("urunler");
		$this->db->where('KategoriID',$id);
		$query=$this->db->get();
		return $query->result();

	}

	public function musteri_login($email,$sifre)
	{ 
		//echo $email.$sifre;
		$this->db->select('*');
		$this->db->from('musteriler');
		$this->db->where('Email',$email);
		$this->db->where('Sifre',$sifre);
		
		$this->db->limit(1);
		
		$query=$this->db->get();
		
		if($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}
	
	}
	
	
	
	
	
	
	
	
	
	
}













