
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

<?php 
 
	$adminanasayfa	  = "";
	$adminurunler	  = "";
	$adminkategoriler = "";
	$adminsiparisler  = "";
	$adminmusteriler  = "";
	$adminsss  		  = "";
  $adminkullanicilar = "";
	switch($sidebartitle){
		case "adminanasayfa":
			$adminanasayfa="";
			$adminurunler="collapsed";
			$adminkategoriler="collapsed";
			$adminsiparisler="collapsed";
			$adminmusteriler="collapsed";
			$adminsss="collapsed";
      $adminkullanicilar = "collapsed";
		break;
		case "adminurunler":
			$adminanasayfa="collapsed";
			$adminurunler="";
			$adminkategoriler="collapsed";
			$adminsiparisler="collapsed";
			$adminmusteriler="collapsed";
			$adminsss="collapsed";
      $adminkullanicilar = "collapsed";
		break;
		case "adminkategoriler":
			$adminanasayfa="collapsed";
			$adminurunler="collapsed";
			$adminkategoriler="";
			$adminsiparisler="collapsed";
			$adminmusteriler="collapsed";
			$adminsss="collapsed";
      $adminkullanicilar = "collapsed";
		break;
		case "adminsiparisler":
			$adminanasayfa="collapsed";
			$adminurunler="collapsed";
			$adminkategoriler="collapsed";
			$adminsiparisler="";
			$adminmusteriler="collapsed";
			$adminsss="collapsed";
      $adminkullanicilar = "collapsed";
		break;
		case "adminmusteriler":
			$adminanasayfa="collapsed";
			$adminurunler="collapsed";
			$adminkategoriler="collapsed";
			$adminsiparisler="collapsed";
			$adminmusteriler="";
			$adminsss="collapsed";
      $adminkullanicilar = "collapsed";
		break;
		case "adminsss":
			$adminanasayfa	  = "collapsed";
			$adminurunler	  = "collapsed";
			$adminkategoriler = "collapsed";
			$adminsiparisler  = "collapsed";
			$adminmusteriler  = "collapsed";
			$adminsss 		  = "";
      $adminkullanicilar = "collapsed";
		break;
    case "adminkullanicilar":
			$adminanasayfa	  = "collapsed";
			$adminurunler	  = "collapsed";
			$adminkategoriler = "collapsed";
			$adminsiparisler  = "collapsed";
			$adminmusteriler  = "collapsed";
			$adminsss 		  = "collapsed";
      $adminkullanicilar = "";
		break;
    default:
      $adminanasayfa	  = "collapsed";
			$adminurunler	  = "collapsed";
			$adminkategoriler = "collapsed";
			$adminsiparisler  = "collapsed";
			$adminmusteriler  = "collapsed";
			$adminsss 		  = "collapsed";
      $adminkullanicilar = "collapsed";
    break;
    
	}

?>


  <li class="nav-item">
    <a class="nav-link <?=$adminanasayfa?>" href="<?=base_url()?>admin">
      <i class="bi bi-grid"></i>
      <span>Anasayfa</span>
    </a>
  </li>

 

  <li class="nav-item">
    <a class="nav-link <?=$adminurunler?>"  href="<?=base_url()?>admin/urunler">
      <i class="ri-shopping-cart-fill"></i><span>Ürünler</span>
    </a>
     
  </li>

  <li class="nav-item">
    <a class="nav-link <?=$adminkategoriler?>"  href="<?=base_url()?>admin/kategoriler">
      <i class="ri-list-check-2"></i><span>Kategoriler</span>
    </a>
   
  </li>

  <li class="nav-item">
    <a class="nav-link <?=$adminsiparisler?>" href="<?=base_url()?>admin/siparisler">
      <i class="ri-luggage-cart-fill"></i><span>Siparişler</span> 
    </a> 
  </li>

  <li class="nav-item">
    <a class="nav-link <?=$adminmusteriler?>" href="<?=base_url()?>admin/musteriler">
      <i class="ri-user-star-fill"></i><span>Müşteriler</span> 
    </a>
     
  </li> 
  <li class="nav-item">
    <a class="nav-link <?=$adminsss?>" href="<?=base_url()?>admin/sss">
      <i class="ri-questionnaire-fill"></i><span>Sıkça Sorulan Sorular</span> 
    </a>
     
  </li> 
  <li class="nav-heading">Admin</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="<?=base_url()?>admin/kullanicilar">
      <i class="bi bi-person"></i>
      <span>Kullanıcılar</span>
    </a>
  </li> 

  

  <li class="nav-item">
    <a class="nav-link collapsed" href="<?=base_url()?>admin/mesajlar">
      <i class="bi bi-envelope"></i>
      <span>Mesajlar</span>
    </a>
  </li> 
 
  

</ul>

</aside> 
