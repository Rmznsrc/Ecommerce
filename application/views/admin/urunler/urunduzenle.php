
<script>
function UrunKategoriSec(katid){
  console.log(katid);
 
		$.ajax({
			type: "POST",
			url: '<?=base_url()?>'+"admin/urunler/kategoriListe",
			data: {
			  id : katid,  
			},
			success: function(result) { 
        console.log(result);
			 
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		}); 
 
}
</script>


<main id="main" class="main"> 
<section class="section dashboard">
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">


                <?php if($this->session->flashdata("sonucbasarili"))
				 {
					 ?>


                <div class="panel-body">
                    <div class="alert alert-success">
                        <strong>İşlem :</strong> <?=$this->session->flashdata("sonucbasarili")?>
                    </div>
                </div>


                <?php
					}
				 ?>
				 <?php if($this->session->flashdata("sonucbasarisiz"))
				 {
					 ?>


                <div class="panel-body">
                    <div class="alert alert-danger">
                        <strong>İşlem :</strong> <?=$this->session->flashdata("sonucbasarisiz")?>
                    </div>
                </div>


                <?php
					}
				 ?>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ürün Ekle</h4>
                        <p class="card-description"> </p>
                        <form enctype="multipart/form-data" class="forms-sample" method="POST" action="<?=base_url()?>admin/urunler/urunduzenlekaydet/<?=$urun[0]->UrunID?>">
                             <div class="row mb-3">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Ürün Adı</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="urunadi" name="urunadi" value="<?=$urun[0]->Adi?>">
								</div>
							</div>
							<div class="row mb-3">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Ürün Fiyatı</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="fiyat" name="fiyat"  value="<?=$urun[0]->Fiyat?>">
								</div>
							</div>
							<div class="row mb-3">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Ürün Kategorisi</label>
								<div class="col-sm-10">
									<select class="form-control select2" id="kategori" name="kategori"  > <!-- onchange="UrunKategoriSec(this.value)"-->
										<option value="">Seçiniz</option>
									  <?php 
									 
									  foreach($ustkategoriler as $key => $rsk){
									  ?>
										<option value="<?=$rsk->KategoriID?>"><?=$rsk->Adi?></option>
									  <?php } ?>

									</select>
								</div>
							</div>
							<div class="row mb-3">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Stok</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="stok" name="stok"  value="<?=$urun[0]->Stok?>">
								</div>
							</div>
							<div class="row mb-3">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Açıklama</label> 
							 
								 <input type="text" class="form-control" id="aciklama" name="aciklama"  value="<?=$urun[0]->Aciklama?>">
							  
							</div> 
							
							<div class="row mb-3">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Ürün Künye</label> 
								 
								 <input type="text" class="form-control" id="urunkunye" name="urunkunye"  value="<?=$urun[0]->UrunKunye?>">
							 
							</div> 
							<div class="row mb-3">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Ürün İçerik</label> 
								 
								 <input type="text" class="form-control" id="urunicerik" name="urunicerik"  value="<?=$urun[0]->UrunIcerik?>">
							 
							</div> 
							<div class="row mb-3">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Ürün Mac</label> 
							 
								 <input type="text" class="form-control" id="urunmac" name="urunmac"  value="<?=$urun[0]->UrunMac?>">
							   
							</div> 
							<div class="row mb-3">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Ürün Genel Bilgi</label> 
								 
								 <input type="text" class="form-control" id="urungenelbilgi" name="urungenelbilgi"  value="<?=$urun[0]->UrunGenelBilgi?>">
							  
							</div> 
							<div class="row mb-3">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Ürün Özellikler</label> 
								 
								 <input type="text" class="form-control" id="urunozellikler" name="urunozellikler"  value="<?=$urun[0]->UrunOzellikler?>">
							 
							</div> 
							
                            <div class="satir"> 
                                <div class="file-upload">
                                    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Resim Ekle</button>

                                    <div class="image-upload-wrap">
                                        <input name="resim" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                                        <div class="drag-text">
                                            <h3>Sürükle Bırak veya Yükle</h3>
                                        </div>
                                    </div>
                                    <div class="file-upload-content">
                                        <img class="file-upload-image" src="#" alt="your image" />
                                        <div class="image-title-wrap">
                                            <button type="button" onclick="removeUpload()" class="remove-image">Kaldır
                                                <span class="image-title">Yüklenen Fotoğraf</span></button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-success mr-2">Kaydet</button>
                            <button class="btn btn-light">İptal</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<br><br></section>

</main>
