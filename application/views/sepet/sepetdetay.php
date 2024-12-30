 <!--Shopping Cart Area Strat-->
 <div class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">Sil</th>
                                    <th class="li-product-thumbnail">Resim</th>
                                    <th class="cart-product-name">Ürün</th>
                                    <th class="li-product-price">Fiyat</th>
                                    <th class="li-product-quantity">Adet</th>
                                    <th class="li-product-subtotal">Toplam</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                $toplam = 0; 
                                foreach($this->session->userdata('sepetim') as $key => $rs){
                                    $vpr = $this->db->query("SELECT * FROM urunler WHERE UrunID = '".$key."' ")->result(); 
                                ?>
                                <tr>
                                    <td class="li-product-remove"><a href="<?=base_url()?>sepet/sepeturunsil/<?=$key?>"><i class="fa fa-times"></i></a></td>
                                    <td class="li-product-thumbnail"><a href="#"><img src="<?=base_url().'uploads/urunler/'.$key.'/'.$vpr[0]->UrunResim?>" alt="<?=$vpr[0]->Adi?>" style="width:100px;height:100px;"></a></td>
                                    <td class="li-product-name"><a href="#"><?=$vpr[0]->Adi?></a></td>
                                    <td class="li-product-price"><span class="amount"><?=$vpr[0]->Fiyat?> ₺</span></td>
                                    <td class="quantity">
                                        <label>Adet</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box"  value="<?=$rs['adet']?>" readonly disabled type="number">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </td>
                                    <td class="product-subtotal"><span class="amount"><?=($rs['adet']*$vpr[0]->Fiyat)?></span></td>
                                </tr>
                                <?php $toplam+=($vpr[0]->Fiyat*$rs['adet']);} ?> 
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Kupon Kodu" type="text">
                                    <input class="button" name="apply_coupon" value="Kuponu Uygula" type="submit">
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Sepet Toplamı</h2>
                                <ul> 
                                    <li>Toplam <span><?=$toplam?></span></li>
                                </ul>
                                <a href="#">Ödeme Adımına Geç</a>
                            </div>
                        </div>
                    </div>
                     
                </form>
            </div>
        </div>
    </div>
</div> 