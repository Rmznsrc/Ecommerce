
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
 
    <div class="col-lg-12">
      <div class="row">  
        <div class="col-12">
          <div class="card">

        

            <div class="card-body">
              <h5 class="card-title">Ürün Ekle</h5> 
            
              <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ürün Ekleme Formu</h5>
 
              <form method="POST" action="<?=base_url()?>admin/urunler/uruneklekaydet">
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Ürün Adı</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="urunadi" name="urunadi">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Ürün Fiyatı</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="fiyat" name="fiyat">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Ürün Kategorisi</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" id="kategori" name="kategori" onchange="UrunKategoriSec(this.value)" >
                      <?php 
                     
                      foreach($ustkategoriler as $key => $rsk){
                      ?>
                    <option value="<?=$rsk->KategoriID?>"><?=$rsk->Adi?></option>
                      <?php } ?>
                      <option value="">Seçiniz</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Stok</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="stok" name="stok">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Açıklama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="aciklama" name="aciklama">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Kaydet</button> 
                </div>
              </form> 

            </div>
          </div> 
            </div> 
          </div>
        </div>  
      </div>
    </div>  
  </div>
</section>

</main>
