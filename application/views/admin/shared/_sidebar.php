
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

<?php 
 
	$adminanasayfa	  = "";
	$adminurunler	  = "";
	$adminkategoriler = "";
	$adminsiparisler  = "";
	$adminmusteriler  = "";
	$adminsss  		  = "";
	switch($sidebartitle){
		case "adminanasayfa":
			$adminanasayfa="";
			$adminurunler="collapsed";
			$adminkategoriler="collapsed";
			$adminsiparisler="collapsed";
			$adminmusteriler="collapsed";
			$adminsss="collapsed";
		break;
		case "adminurunler":
			$adminanasayfa="collapsed";
			$adminurunler="";
			$adminkategoriler="collapsed";
			$adminsiparisler="collapsed";
			$adminmusteriler="collapsed";
			$adminsss="collapsed";
		break;
		case "adminkategoriler":
			$adminanasayfa="collapsed";
			$adminurunler="collapsed";
			$adminkategoriler="";
			$adminsiparisler="collapsed";
			$adminmusteriler="collapsed";
			$adminsss="collapsed";
		break;
		case "adminsiparisler":
			$adminanasayfa="collapsed";
			$adminurunler="collapsed";
			$adminkategoriler="collapsed";
			$adminsiparisler="";
			$adminmusteriler="collapsed";
			$adminsss="collapsed";
		break;
		case "adminmusteriler":
			$adminanasayfa="collapsed";
			$adminurunler="collapsed";
			$adminkategoriler="collapsed";
			$adminsiparisler="collapsed";
			$adminmusteriler="";
			$adminsss="collapsed";
		break;
		case "adminsss":
			$adminanasayfa	  = "collapsed";
			$adminurunler	  = "collapsed";
			$adminkategoriler = "collapsed";
			$adminsiparisler  = "collapsed";
			$adminmusteriler  = "collapsed";
			$adminsss 		  = "";
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
    <a class="nav-link <?=$adminkategoriler?>"  href="<?=base_url()?>">
      <i class="ri-list-check-2"></i><span>Kategoriler</span>
    </a>
   
  </li>

  <li class="nav-item">
    <a class="nav-link <?=$adminsiparisler?>"   href="#">
      <i class="ri-luggage-cart-fill"></i><span>Siparişler</span> 
    </a> 
  </li>

  <li class="nav-item">
    <a class="nav-link <?=$adminmusteriler?>" href="#">
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
    <a class="nav-link collapsed" href="users-profile.html">
      <i class="bi bi-person"></i>
      <span>Kullanıcılar</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-faq.html">
      <i class="bi bi-question-circle"></i>
      <span>F.A.Q</span>
    </a>
  </li><!-- End F.A.Q Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-contact.html">
      <i class="bi bi-envelope"></i>
      <span>Contact</span>
    </a>
  </li><!-- End Contact Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-register.html">
      <i class="bi bi-card-list"></i>
      <span>Register</span>
    </a>
  </li><!-- End Register Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-login.html">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Login</span>
    </a>
  </li><!-- End Login Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-error-404.html">
      <i class="bi bi-dash-circle"></i>
      <span>Error 404</span>
    </a>
  </li><!-- End Error 404 Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-blank.html">
      <i class="bi bi-file-earmark"></i>
      <span>Blank</span>
    </a>
  </li><!-- End Blank Page Nav -->

</ul>

</aside><!-- End Sidebar-->
