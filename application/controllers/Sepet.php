<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sepet extends CI_Controller {
	public function __construct()
        {
			parent::__construct();
			error_reporting(0);
			$this->load->library("session");  
			$this->load->model("Database_Model");  
			 
        }
	public function index()
	{
		$data["title"] = "Sepetimdeki Ürünler"; 
		  
		$this->load->view('shared/header',$data); 
		$this->load->view('sepet/index');
		$this->load->view('shared/footer');
	}
	public function sepetdetay(){
		$data["title"] = "Sepetimdeki Ürünler"; 
 
		$this->load->view('shared/header',$data); 
		$this->load->view('sepet/sepetdetay');
		$this->load->view('shared/footer');
	}
	public function sepeteekle($urunid){
 		$cart_products = $this->session->userdata('sepetim');
		$cart_products[$urunid]["urunid"] = $urunid;
		$cart_products[$urunid]["adet"]   = $cart_products[$urunid]["adet"]+1;
		$pos = array_search($urunid, $cart_products); 
		if ($pos !== false) { 
			$this->session->set_userdata('sepetim', $cart_products);
		}else{
			$this->session->set_userdata('sepetim', $cart_products);
		}
		$html  = '';  
		$html .='<div class="hm-minicart-trigger is-active">';
		$html .=	'<span class="item-icon"></span>';
		 
		$toplam = 0; 
		$say    = 0;
		foreach($this->session->userdata('sepetim') as $key => $rs){
			$vpr = $this->db->query("SELECT * FROM urunler WHERE UrunID = '".$key."' ")->result(); 
			$say = $say + 1;
			$toplam+=($vpr[0]->Fiyat*$rs['adet']);
		}
			
		$html .= '	<span class="item-text">'.$toplam;
		$html .= '		<span class="cart-item-count">'.$say.'</span>';
		$html .= '	</span>';
		$html .= '</div>';
		$html .= '<span></span>';
		$html .= '<div class="minicart">';
		$html .= '	<ul class="minicart-product-list" >'; 
		$toplam = 0; 
		foreach($this->session->userdata('sepetim') as $key => $rs){
			$vpr = $this->db->query("SELECT * FROM urunler WHERE UrunID = '".$key."' ")->result(); 
			
			$html .= '<li>';
			$html .= '	<a href="'.base_url().'assets/single-product.html" class="minicart-product-image">';
			$html .= '		<img src="'.base_url().'uploads/urunler/'.$vpr[0]->UrunID.'/'.$vpr[0]->UrunResim.'" alt="cart products">';
			$html .= '	</a>';
			$html .= '	<div class="minicart-product-details">';
			$html .= '		<h6><a href="'.base_url().'urunler/urundetay/'.$vpr[0]->UrunID.'">'.$vpr[0]->Adi.'</a></h6>';
			$html .= '		<span>'.$vpr[0]->Fiyat.' x '.$rs['adet'].'</span>';
			$html .= '	</div>';
			$html .= '	<button class="close" title="Remove">';
			$html .= '		<i class="fa fa-close"></i>';
			$html .= '	</button>';
			$html .= '</li>';
			$toplam+=($vpr[0]->Fiyat*$rs['adet']);
		}  
		$html .= '</ul>';
		$html .= '	<p class="minicart-total">Toplam: <span>'.$toplam.' ₺</span></p>';
		$html .= '	<div class="minicart-button">';
		$html .= '		<a href="'.base_url().'sepet/sepetdetay" class="li-button li-button-fullwidth li-button-dark">';
		$html .= '			<span>Tümünü Gör</span>';
		$html .= '		</a>';
		$html .= '		<a href="'.base_url().'assets/checkout.html" class="li-button li-button-fullwidth">';
		$html .= '			<span>Checkout</span>';
		$html .= '		</a>';
		$html .= '	</div>';
		$html .= '</div>';
		echo $html;
	}
	public function sepettensil($urunid){
 		$cart_products = $this->session->userdata('sepetim');
		 
		 
		unset($cart_products[$urunid]);
		 
		$this->session->set_userdata('sepetim', $cart_products);
		
		$html  = '';  
		$html .='<div class="hm-minicart-trigger is-active">';
		$html .=	'<span class="item-icon"></span>';
		 
		$toplam = 0; 
		$say    = 0;
		foreach($this->session->userdata('sepetim') as $key => $rs){
			$vpr = $this->db->query("SELECT * FROM urunler WHERE UrunID = '".$key."' ")->result(); 
			$say = $say + 1;
			$toplam+=($vpr[0]->Fiyat*$rs['adet']);
		}
			
		$html .= '	<span class="item-text">'.$toplam;
		$html .= '		<span class="cart-item-count">'.$say.'</span>';
		$html .= '	</span>';
		$html .= '</div>';
		$html .= '<span></span>';
		$html .= '<div class="minicart">';
		$html .= '	<ul class="minicart-product-list" >'; 
		$toplam = 0; 
		foreach($this->session->userdata('sepetim') as $key => $rs){
			$vpr = $this->db->query("SELECT * FROM urunler WHERE UrunID = '".$key."' ")->result(); 
			
			$html .= '<li>';
			$html .= '	<a href="'.base_url().'assets/single-product.html" class="minicart-product-image">';
			$html .= '		<img src="'.base_url().'uploads/urunler/'.$vpr[0]->UrunID.'/'.$vpr[0]->UrunResim.'" alt="cart products">';
			$html .= '	</a>';
			$html .= '	<div class="minicart-product-details">';
			$html .= '		<h6><a href="'.base_url().'urunler/urundetay/'.$vpr[0]->UrunID.'">'.$vpr[0]->Adi.'</a></h6>';
			$html .= '		<span>'.$vpr[0]->Fiyat.' x '.$rs['adet'].'</span>';
			$html .= '	</div>';
			$html .= '	<button class="close" title="Remove">';
			$html .= '		<i class="fa fa-close"></i>';
			$html .= '	</button>';
			$html .= '</li>';
			$toplam+=($vpr[0]->Fiyat*$rs['adet']);
		}  
		$html .= '</ul>';
		$html .= '	<p class="minicart-total">Toplam: <span>'.$toplam.' ₺</span></p>';
		$html .= '	<div class="minicart-button">';
		$html .= '		<a href="'.base_url().'sepet/sepetdetay" class="li-button li-button-fullwidth li-button-dark">';
		$html .= '			<span>Tümünü Gör</span>';
		$html .= '		</a>';
		$html .= '		<a href="'.base_url().'assets/checkout.html" class="li-button li-button-fullwidth">';
		$html .= '			<span>Checkout</span>';
		$html .= '		</a>';
		$html .= '	</div>';
		$html .= '</div>';
		echo $html;
	}
	public function sepeturunsil($urunid){
		$cart_products = $this->session->userdata('sepetim'); 
		unset($cart_products[$urunid]); 
		$this->session->set_userdata('sepetim', $cart_products);
		redirect('sepet/sepetdetay','refresh');
	}
	public function sepeturunekle($urunid){
		$cart_products = $this->session->userdata('sepetim');
		$cart_products[$urunid]["urunid"] = $urunid;
		$cart_products[$urunid]["adet"]   = $cart_products[$urunid]["adet"]+1;
		$pos = array_search($urunid, $cart_products); 
		if ($pos !== false) { 
			$this->session->set_userdata('sepetim', $cart_products);
		}else{
			$this->session->set_userdata('sepetim', $cart_products);
		}
		redirect('sepet/sepetdetay','refresh');
	}
}
