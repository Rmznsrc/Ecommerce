<?php

class Database_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();	
}

	public function insert_data($table,$data)
	{
		
		$this->db->insert($table,$data);
		return $this->db->insert_id();	
	}
	public function get_urunler($id)
	{
		$this->db->from("urunler");
		$this->db->where('urun_kat_id',$id);
		$query=$this->db->get();
		return $query->result();

	}
	public function sef_url($text)
  {
    // karakterleri küçült
    $text = mb_strtolower($text, 'UTF-8');
    // karakterleri türkçeye dönüştür
    $text = str_replace(
      ['ı', 'ş', 'ü', 'ğ', 'ç', 'ö'],
      ['i', 's', 'u', 'g', 'c', 'o'],
      $text
    );
    // harf ve sayılar hariç karakterleri - işaretine dönüştür
    $text = preg_replace('/[^a-z0-9]/', '-', $text);
    // birden fazla - işaretine teke düşür
    $text = preg_replace('/-+/', '-', $text);
    // baştaki ve sondaki - işaretine kaldır
    return trim($text, '-');
  }
	public function update_data($table,$data,$id)
	{
		
		$this->db->where("Id",$id);
		$this->db->update($table,$data);
		return true;	
	}
	public function update_data_with_column($table,$data,$id, $idcolumnname)
	{
		
		$this->db->where($idcolumnname,$id);
		$this->db->update($table,$data);
		return true;	
	}
	public function mesaj_listesi()
	{
		$query = $this->db->get('mesajlar');
		return $query->result();
	}
	public function mesaj_cek($id)
	{
		$query = $this->db->query("SELECT * FROM mesajlar WHERE Id='".$id."'");
		return $query->result();
	}

	public function get_urun($id)
	{
		
		$sql="SELECT turu.adi as turadi,urun_kategori.adi as katadi, urunler.* FROM urunler
		LEFT JOIN turu
		ON urunler.turu=turu.Id
		LEFT JOIN urun_kategori
		ON urunler.kategori_id=urun_kategori.Id
		WHERE urunler.Id=".$id;
		
	
	$query=$this->db->query($sql);
	
	if($query->num_rows()==1){
		return $query->result();
	}else{
		return false;
	}
	}
	
	public function get_kategori($id)
	{
		
		$sql="SELECT turu.adi as turadi,urun_kategori.adi as katadi,urunler.* FROM urunler
		LEFT JOIN turu
		ON urunler.turu=turu.Id
		LEFT JOIN urun_kategori
		ON urunler.kategori_id=urun_kategori.Id
		WHERE urunler.kategori_id=".$id;
		
		//"ORDER BY urunler.adi";
	
			$query=$this->db->query($sql);
	
		if($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}
	}

	public function login($email,$sifre)
	{
		
		//echo $email.$sifre;
	$this->db->select('*');
	$this->db->from('musteriler');
	$this->db->where('email',$email);
	$this->db->where('sifre',$sifre);
	
	$this->db->limit(1);
	
	$query=$this->db->get();
	
	if($query->num_rows()==1){
		return $query->result();
	}else{
		return false;
	}
	
	}
	


	
	public function get_sepet_urunler($id)
	{
		$sql="SELECT urunler.adi as uadi, urunler.sfiyat as ufiyat, sepet.* FROM sepet
		LEFT JOIN urunler
		ON sepet.urun_id=urunler.Id
		WHERE sepet.musteri_id=".$id;
		
		$query=$this->db->query($sql);
		
		if($query->num_rows()>=0){
			return $query->result();
			
		}else{
			return false;
		}
		
		
	}
	
	public function onyuz_urunkategori()
	{
		$sql="SELECT * FROM urun_kategori";
		$query=$this->db->query($sql);
		if($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}
	}
	public function GetAllSSS(){
		$sql = "SELECT * FROM SSS WHERE statu = '1'";
		$query = $this->db->query($sql);
		if($query->num_rows()>=0){
			return $query->result();
			
		}else{
			return false;
		}
		
	}
	
	
	public function getSSS($id){
		$this->db->where('SSSID',$id);
		$query = $this->db->get('SSS');
		return $query->row();

	}
	public function updateSSS($id, $data)
	{
		$this->db->where('SSSID',$id);
		return $this->db->update('SSS',$data);
	}
	
	public function deleteSSS($id)
    {
        return $this->db->delete('SSS', ['SSSID' => $id]);
    }
	
}













