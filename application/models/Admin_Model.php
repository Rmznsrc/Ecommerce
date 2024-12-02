<?php


class Admin_Model extends CI_Model {

		function __construct(){
			parent::__construct();

		}

public function login($email,$sifre)
	{
		
		//echo $email.$sifre;
		$this->db->select('*');
		$this->db->from('kullanicilar');
		$this->db->where('email',$email);
		$this->db->where('sifre',md5($sifre));
		
		$this->db->limit(1);
		
		$query=$this->db->get();
		
		if($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}
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
	
	
	
	
	
	
	
	
}
