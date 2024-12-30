<?php 

$fveri = $this->db->query("SELECT * FROM Hakkimizda WHERE Statu = '1'")->result();
?>

<div class="footer"> 
                <div class="footer-static-top">
                    <div class="container"> 
                        <div class="footer-shipping pt-60 pb-55 pb-xs-25">
                            <div class="row">
                                
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="<?=base_url()?>assets/images/shipping-icon/1.png" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Ücretsiz Teslimat</h2>
                                            <p>Ücretsiz İade</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="<?=base_url()?>assets/images/shipping-icon/2.png" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Güvenli Ödeme</h2>
                                            <p>Dünyanın en popüler ve güvenli ödeme yöntemleriyle ödeme yapın.</p>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="<?=base_url()?>assets/images/shipping-icon/3.png" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Güvenle Alışveriş Yapın</h2>
                                            <p>Alıcı Korumamız, tıklamadan teslimata kadar satın alma işleminizi kapsar.</p>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="<?=base_url()?>assets/images/shipping-icon/4.png" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>7/24 Yardım Merkezi</h2>
                                            <p>Bir sorunuz mu var? Bir Uzmanı arayın veya çevrimiçi sohbet edin.</p>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div> 
                    </div>
                </div> 
                <div class="footer-static-middle">
                    <div class="container">
                        <div class="footer-logo-wrap pt-50 pb-35">
                            <div class="row"> 
                                <div class="col-lg-4 col-md-6">
                                    <div class="footer-logo">
                                        <img src="<?=base_url()?>assets/images/menu/logo/1.jpg" alt="Footer Logo">
                                        <p class="info">
                                            Online Satış Sitesi
                                        </p>
                                    </div>
                                    <ul class="des">
                                        <li>
                                            <span>Adres: </span>
                                           <?=$fveri[0]->Adres?>
                                        </li>
                                        <li>
                                            <span>Tel: </span>
                                            <a href="#"> <?=$fveri[0]->Tel?></a>
                                        </li>
                                        <li>
                                            <span>Email: </span>
                                            <a href="mailto:// <?=$fveri[0]->Email?>"> <?=$fveri[0]->Email?></a>
                                        </li>
                                    </ul>
                                </div> 
                                <div class="col-lg-2 col-md-3 col-sm-6">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Ürün</h3>
                                        <ul>
                                             <li><a href="#">Fiyatlar düşüyor</a></li>
                                            <li><a href="#">Yeni ürünler</a></li>
                                            <li><a href="#">En iyi satışlar</a></li>
                                            <li><a href="#">Bize ulaşın</a></li>
                                        </ul>
                                    </div>
                                </div> 
                                <div class="col-lg-2 col-md-3 col-sm-6">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Şirketimiz</h3>
                                        <ul>
                                            <li><a href="#">Teslimat</a></li>
                                            <li><a href="#">Yasal Uyarı</a></li>
                                            <li><a href="#">Hakkımızda</a></li>
                                            <li><a href="#">Bize ulaşın</a></li>
                                        </ul>
                                    </div>
                                </div> 
                                <div class="col-lg-4">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Bizi Takip Edin</h3>
                                        <ul class="social-link">
                                            <li class="twitter">
                                                <a href="<?=$fveri[0]->twitter?>" data-toggle="tooltip" target="_blank" title="Twitter">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li> 
                                            <li class="facebook">
                                                <a href="<?=$fveri[0]->facebook?>" data-toggle="tooltip" target="_blank" title="Facebook">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="youtube">
                                                <a href="<?=$fveri[0]->youtube?>" data-toggle="tooltip" target="_blank" title="Youtube">
                                                    <i class="fa fa-youtube"></i>
                                                </a>
                                            </li>
                                            <li class="instagram">
                                                <a href="<?=$fveri[0]->instagram?>" data-toggle="tooltip" target="_blank" title="Instagram">
                                                    <i class="fa fa-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div> 
                                    <div class="footer-newsletter">
                                        <h4>Bültene kaydolun</h4>
                                        <form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="footer-subscribe-form validate" target="_blank" novalidate>
                                           <div id="mc_embed_signup_scroll">
                                              <div id="mc-form" class="mc-form subscribe-form form-group" >
                                                <input id="mc-email" type="email" autocomplete="off" placeholder="Mail Adresinizi Giriniz" />
                                                <button  class="btn" id="mc-submit">Abone Ol</button>
                                              </div>
                                           </div>
                                        </form>
                                    </div> 
                                </div> 
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="footer-static-bottom pt-55 pb-55">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12"> 
                                <div class="footer-links">
                                    <ul>
                                    <li><a href="#">Çevrimiçi Alışveriş</a></li>
                                    <li><a href="#">Promosyonlar</a></li>
                                    <li><a href="#">Siparişlerim</a></li>
                                    <li><a href="#">Yardım</a></li>
                                    <li><a href="#">Müşteri Hizmetleri</a></li>
                                    <li><a href="#">Destek</a></li>
                                    <li><a href="#">En Popülerler</a></li>
                                    <li><a href="#">Yeni Gelenler</a></li>
                                    <li><a href="#">Özel Ürünler</a></li>
                                    <li><a href="#">Üreticiler</a></li>
                                    <li><a href="#">Mağazalarımız</a></li>
                                    <li><a href="#">Kargolama</a></li>
                                    <li><a href="#">Ödemeler</a></li>
                                    <li><a href="#">Garanti</a></li>
                                    <li><a href="#">İadeler</a></li>
                                    <li><a href="#">Ödeme</a></li>
                                    <li><a href="#">İndirim</a></li>
                                    <li><a href="#">İadeler</a></li>
                                    <li><a href="#">Politika Kargolama</a></li> 
                                    </ul>
                                </div> 
                                <div class="copyright text-center">
                                    <a href="#">
                                        <img src="<?=base_url()?>assets/images/payment/1.png" alt="">
                                    </a>
                                </div> 
                                <div class="copyright text-center pt-25">
                                    <span>Created By Ramazan Sürücü</span>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                echo "<pre>";
                print_r($this->session->sepetim);
                echo "</pre>";
                ?>
            </div> 
            <div class="modal fade modal-wrapper" id="exampleModalCenter" >
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-inner-area row">
                                <div class="col-lg-5 col-md-6 col-sm-6"> 
                                    <div class="product-details-left">
                                        <div class="product-details-images slider-navigation-1">
                                            <div class="lg-image">
                                                <img src="<?=base_url()?>assets/images/product/large-size/1.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="<?=base_url()?>assets/images/product/large-size/2.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="<?=base_url()?>assets/images/product/large-size/3.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="<?=base_url()?>assets/images/product/large-size/4.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="<?=base_url()?>assets/images/product/large-size/5.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="<?=base_url()?>assets/images/product/large-size/6.jpg" alt="product image">
                                            </div>
                                        </div>
                                        <div class="product-details-thumbs slider-thumbs-1">                                        
                                            <div class="sm-image"><img src="<?=base_url()?>assets/images/product/small-size/1.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="<?=base_url()?>assets/images/product/small-size/2.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="<?=base_url()?>assets/images/product/small-size/3.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="<?=base_url()?>assets/images/product/small-size/4.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="<?=base_url()?>assets/images/product/small-size/5.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="<?=base_url()?>assets/images/product/small-size/6.jpg" alt="product image thumb"></div>
                                        </div>
                                    </div>
                                    <!--// Product Details Left -->
                                </div>

                                <div class="col-lg-7 col-md-6 col-sm-6">
                                    <div class="product-details-view-content pt-60">
                                        <div class="product-info">
                                            <h2>Today is a good day Framed poster</h2>
                                            <span class="product-details-ref">Reference: demo_15</span>
                                            <div class="rating-box pt-20">
                                                <ul class="rating rating-with-review-item">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="review-item"><a href="#">Read Review</a></li>
                                                    <li class="review-item"><a href="#">Write Review</a></li>
                                                </ul>
                                            </div>
                                            <div class="price-box pt-20">
                                                <span class="new-price new-price-2">$57.98</span>
                                            </div>
                                            <div class="product-desc">
                                                <p>
                                                    <span>100% cotton double printed dress. Black and white striped top and orange high waisted skater skirt bottom. Lorem ipsum dolor sit amet, consectetur adipisicing elit. quibusdam corporis, earum facilis et nostrum dolorum accusamus similique eveniet quia pariatur.
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="product-variants">
                                                <div class="produt-variants-size">
                                                    <label>Dimension</label>
                                                    <select class="nice-select">
                                                        <option value="1" title="S" selected="selected">40x60cm</option>
                                                        <option value="2" title="M">60x90cm</option>
                                                        <option value="3" title="L">80x120cm</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="single-add-to-cart">
                                                <form action="#" class="cart-quantity">
                                                    <div class="quantity">
                                                        <label>Quantity</label>
                                                        <div class="cart-plus-minus">
                                                            <input class="cart-plus-minus-box" value="1" type="text">
                                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                        </div>
                                                    </div>
                                                    <button class="add-to-cart" type="submit">Add to cart</button>
                                                </form>
                                            </div>
                                            <div class="product-additional-info pt-25">
                                                <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a>
                                                <div class="product-social-sharing pt-25">
                                                    <ul>
                                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li> 
                                                        <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
           
        </div>
        
        <script src="<?=base_url()?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="<?=base_url()?>assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="<?=base_url()?>assets/js/vendor/popper.min.js"></script>
        <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>assets/js/ajax-mail.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.meanmenu.min.js"></script>
        <script src="<?=base_url()?>assets/js/wow.min.js"></script>
        <script src="<?=base_url()?>assets/js/slick.min.js"></script>
        <script src="<?=base_url()?>assets/js/owl.carousel.min.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.magnific-popup.min.js"></script>
        <script src="<?=base_url()?>assets/js/isotope.pkgd.min.js"></script>
        <script src="<?=base_url()?>assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.mixitup.min.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.countdown.min.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.counterup.min.js"></script>
        <script src="<?=base_url()?>assets/js/waypoints.min.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.barrating.min.js"></script>
        <script src="<?=base_url()?>assets/js/jquery-ui.min.js"></script>
        <script src="<?=base_url()?>assets/js/venobox.min.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.nice-select.min.js"></script>
        <script src="<?=base_url()?>assets/js/scrollUp.min.js"></script>
        <script src="<?=base_url()?>assets/js/main.js"></script>
        <script src="<?=base_url()?>assets/toastr/toastr.min.js" type="text/javascript"></script>

<script>
function triggerBucket(){
    $('.ht-currency-trigger,  .hm-minicart-trigger').on('click', function (e) {
        e.preventDefault();
        $(this).toggleClass('is-active');
        $(this).siblings(' .ht-currency, .minicart, .cw-sub-menu li').slideToggle();
    });
}
function AddToCart(urunid){ 
    $.ajax({
        type: "POST",
        url: '<?=base_url()."sepet/sepeteekle/"?>'+urunid,
        data: {urunid : urunid   },
        success: function(result) {
            console.log(result);
            $("#BucketChangeli").html(result);
            toastOpen('Başarılı','Ürün Sepete Eklendi','success');
            triggerBucket();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            toastOpen('Başarısız','İşlem Başarısız','error');
        }
    }); 


}
function RemoveToCart(urunid){ 
    $.ajax({
        type: "POST",
        url: '<?=base_url()."sepet/sepettensil/"?>'+urunid,
        data: {urunid : urunid   },
        success: function(result) {
            console.log(result);
            $("#BucketChangeli").html(result);
            toastOpen('Başarılı','Ürün Sepetten Silindi','success');
            triggerBucket();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            toastOpen('Başarısız','İşlem Başarısız','error');
        }
    }); 
}
 
</script>
    </body> 
</html>