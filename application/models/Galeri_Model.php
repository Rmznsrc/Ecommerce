<?php


class Galeri_Model extends CI_Model {

		function __construct(){
			parent::__construct();

		}

        public function galeri_cek(){
            $query = $this->db->query("SELECT * FROM urunler JOIN urun_foto ON urunler.urun_id=urun_foto.urun_id JOIN urun_kategori ON urun_kategori.Id=urunler.urun_kat_id");
            return $query->result();
        }
	
	
	
	
	
	
}
