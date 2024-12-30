<!doctype html>
<html class="no-js" lang="zxx"> 
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>ONLİNE SATIŞ SİTESİ</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>assets/images/favicon.png">
        <link rel="stylesheet" href="<?=base_url()?>assets/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/css/fontawesome-stars.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/css/meanmenu.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/css/slick.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/css/animate.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/css/jquery-ui.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/css/venobox.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/css/nice-select.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/css/magnific-popup.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/css/helper.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/style.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/css/responsive.css"> 
  
        <link href="<?=base_url()?>assets/toastr/toastr.min.css" rel="stylesheet">
        
    </head>
    <body> 
        <script>

function toastOpen(title,desc,type){
	toastr.error(desc, title,{
		tapToDismiss: true,
		toastClass: 'toast',
		containerId: 'toast-container',
		debug: false,
		showMethod: 'fadeIn', 
		showDuration: 300,
		showEasing: 'swing',
		hideMethod: 'fadeOut',
		hideDuration: 1000,
		hideEasing: 'swing',
		closeMethod: false,
		closeDuration: false,
		closeEasing: false,
		extendedTimeOut: 0,
		  iconClasses: {
			error: 'toast-error',
			info: 'toast-info',
			success: 'toast-success',
			warning: 'toast-warning'
		  },
		iconClass: 'toast-'+type,
		positionClass: 'toast-bottom-right',
		timeOut: 3000, 
		titleClass: 'toast-title',
		messageClass: 'toast-message',
		escapeHtml: false,
		target: 'body',
		closeHtml: '<button type="button">&times;</button>',
		newestOnTop: true,
		preventDuplicates: false,
		progressBar: true
	});
}//toastOpen
</script>
    <?php  
    $veri = $this->db->query("SELECT a.KategoriID, a.Adi as k1, b.Adi as k2, c.Adi as k3
    FROM urun_kategori a 
    JOIN urun_kategori b ON a.KategoriID = b.UstKategoriID AND b.statu = '1'
    JOIN urun_kategori c ON b.KategoriID = c.UstKategoriID AND c.statu = '1'
    WHERE a.Statu = '1' AND a.UstKategoriID = '0' ")->result();
    foreach($veri as $key => $rs){
        $arr[$rs->k1][$rs->k2][$rs->k3] = $rs->k3;
        $arr[$rs->k1][$rs->k2][$rs->k3] = $rs->KategoriID;
    }
    ?>
        <div class="body-wrapper"> 
            <header> 
                <div class="header-top">
                    <div class="container">
                        <div class="row"> 
                            <div class="col-lg-3 col-md-4">
                                <div class="header-top-left">
                                    <ul class="phone-wrap">
                                        <li><span>Tel:</span><a href="<?=base_url()?>assets/#">0555 555 55 55</a></li>
                                    </ul>
                                </div>
                            </div> 
                            <div class="col-lg-9 col-md-8">
                                <div class="header-top-right">
                                    <ul class="ht-menu"> 
                                        <li>
                                            <div class="ht-setting-trigger"><span>Ayarlar</span></div>
                                            <div class="setting ht-setting">
                                                <ul class="ht-setting-list">
                                                    <li><a href="<?=base_url()?>assets/login-register.html">Hesabım</a></li>
                                                    <li><a href="<?=base_url()?>assets/checkout.html">Çıkış Yap</a></li>
                                                    <li><a href="<?=base_url()?>assets/login-register.html">Kayıt Ol</a></li>
                                                </ul>
                                            </div>
                                        </li> 
                                         
                                        <li>
                                            <span class="language-selector-wrapper">Dil :</span>
                                            <div class="ht-language-trigger"><span>Türkçe</span></div>
                                            <div class="language ht-language">
                                                <ul class="ht-setting-list" style="width:90px;">
                                                    <li><a href="<?=base_url()?>assets/#"><img src="<?=base_url()?>assets/images/menu/flag-icon/1.jpg" alt="">English</a></li>
                                                    <li class="active"><a href="<?=base_url()?>assets/#"><img src="<?=base_url()?>assets/images/menu/flag-icon/3.jpg" alt="">Türkçe</a></li>
                                                </ul>
                                            </div>
                                        </li> 
                                    </ul>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div> 
                <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                    <div class="container">
                        <div class="row">
                            
                            <div class="col-lg-3">
                                <div class="logo pb-sm-30 pb-xs-30">
                                    <a href="<?=base_url()?>assets/index.html">
                                        <img src="<?=base_url()?>assets/images/menu/logo/1.jpg" alt="">
                                    </a>
                                </div>
                            </div> 
                            <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                                 
                                <form action="#" class="hm-searchbox">
                                    <select class="nice-select select-search-category">
                                        <option value="0">All</option>                         
                                        <?php 
                                        $veri = $this->db->query("SELECT a.KategoriID, a.Adi  
                                        FROM urun_kategori a  
                                        WHERE a.Statu = '1' AND a.UstKategoriID = '0' ")->result();
                                        foreach($veri as $key => $rs){ ?> 
                                        <option value="<?=$rs->KategoriID?>"><?=$rs->Adi?></option>
                                        <?php } ?>
                                    </select>
                                    <input type="text" placeholder="Aranacak kelimeyi giriniz...">
                                    <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                                </form> 
                                <div class="header-middle-right">
                                    <ul class="hm-menu"> 
                                        <li class="hm-wishlist">
                                            <a href="<?=base_url()?>assets/wishlist.html">
                                                <span class="cart-item-count wishlist-item-count">0</span>
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                        </li> 
                                        <li class="hm-minicart" id="BucketChangeli">
                                            <div class="hm-minicart-trigger">
                                                <span class="item-icon"></span>
                                                <?php 
                                                $toplam = 0; 
                                                $say    = 0;
                                                foreach($this->session->userdata('sepetim') as $key => $rs){
                                                    $vpr = $this->db->query("SELECT * FROM urunler WHERE UrunID = '".$key."' ")->result(); 
                                                    $say = $say + 1;
                                                    $toplam+=($vpr[0]->Fiyat*$rs['adet']);
                                                }
                                                ?>
                                                <span class="item-text"><?=$toplam?>
                                                    <span class="cart-item-count"><?=$say?></span>
                                                </span>
                                            </div>
                                            <span></span>
                                            <div class="minicart">
                                                <ul class="minicart-product-list" >
                                                    <?php
                                                    $toplam = 0; 
                                                    foreach($this->session->userdata('sepetim') as $key => $rs){
                                                        $vpr = $this->db->query("SELECT * FROM urunler WHERE UrunID = '".$key."' ")->result(); 
                                                    ?>
                                                    <li>
                                                        <a href="<?=base_url()?>assets/single-product.html" class="minicart-product-image">
                                                            <img src="<?=base_url()?>uploads/urunler/<?=$vpr[0]->UrunID?>/<?=$vpr[0]->UrunResim?>" alt="cart products">
                                                        </a>
                                                        <div class="minicart-product-details">
                                                            <h6><a href="<?=base_url()?>urunler/urundetay/<?=$vpr[0]->UrunID?>"><?=$vpr[0]->Adi?></a></h6>
                                                            <span><?=$vpr[0]->Fiyat?> x <?=$rs['adet']?> </span>
                                                        </div>
                                                        <button class="close" title="Remove" onclick="RemoveToCart('<?=$key?>')">
                                                            <i class="fa fa-close"></i>
                                                        </button>
                                                    </li>
                                                    <?php $toplam+=($vpr[0]->Fiyat*$rs['adet']);} ?> 
                                                </ul>
                                                <p class="minicart-total">Toplam: <span><?=$toplam?> ₺</span></p>
                                                <div class="minicart-button">
                                                    <a href="<?=base_url()?>sepet/sepetdetay" class="li-button li-button-fullwidth li-button-dark">
                                                        <span>Tümünü Gör</span>
                                                    </a>
                                                    <a href="<?=base_url()?>assets/checkout.html" class="li-button li-button-fullwidth">
                                                        <span>Checkout</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li> 
                                    </ul>
                                </div> 
                            </div> 
                        </div>
                    </div>
                </div> 
                <div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12"> 
                                <div class="hb-menu">
                                    <nav>
                                        <ul>
                                            <li class="dropdown-holder"><a href="blog-left-sidebar.html">Kategoriler</a>
                                                <ul class="hb-dropdown">
                                                    <?php foreach($arr as $key => $rk1){ ?> 
                                                    <li class="sub-dropdown-holder"><a href="blog-left-sidebar.html"><?=$key?></a>
                                                            <ul class="hb-dropdown hb-sub-dropdown">
                                                                <?php foreach($rk1 as $key2 => $rk2){ ?>
                                                                <li>
                                                                    <a href="blog-2-column.html"><?=$key2?></a> 
                                                                </li>
                                                                <?php } ?> 
                                                            </ul>
                                                        </li> 
                                                    <?php }?>
                                                 </ul>
                                            </li>       
                                            <li><a href="<?=base_url()?>assets/about-us.html">Hakkımızda</a></li>
                                            <li><a href="<?=base_url()?>assets/contact.html">İletişim</a></li>  
                                        </ul> 
                                    </nav>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
              
                <div class="mobile-menu-area d-lg-none d-xl-none col-12">
                    <div class="container"> 
                        <div class="row">
                            <div class="mobile-menu">
                            </div>
                        </div>
                    </div>
                </div> 
            </header> 