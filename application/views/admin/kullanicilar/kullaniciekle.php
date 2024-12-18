<?php 
  	if($this->session->flashdata("sonucbasarili"))
	{
?>
<div class="panel-body">
    <div class="alert alert-success">
        <strong>İşlem :</strong> <?=$this->session->flashdata("sonucbasarili")?>
    </div>
</div>
<?php
	}
 	if($this->session->flashdata("sonucbasarisiz")){
?>
	<div class="panel-body">
        <div class="alert alert-danger">
            <strong>İşlem :</strong> <?=$this->session->flashdata("sonucbasarisiz")?>
        </div>
    </div>
<?php
	}
?>
<main id="main" class="main"> 
	<section class="section dashboard">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">  
					<div class="col-12">
						<div class="card"> 
							<div class="card-body with-border">
								<h5 class="card-title">Kullanıcı Ekle   </h5>  
								<form class="forms-sample" method="POST" action="<?=base_url()?>admin/kullanicilar/kullanicieklekaydet" enctype="multipart/form-data">
									<div class="row mb-3">
										<label for="inputEmail3" class="col-sm-2 col-form-label">Adı</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="Adi" name="Adi">
										</div>
									</div>
									<div class="row mb-3">
										<label class="col-sm-2 col-form-label">Soyadı</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="Soyadi" name="Soyadi">
										</div>
									</div>
									
									<div class="row mb-3">
										<label class="col-sm-2 col-form-label">Email</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="Email" name="Email">
										</div>
									</div>  
									<div class="row mb-3">
										<label for="inputEmail3" class="col-sm-2 col-form-label">Kullanıcı Adı</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="KullaniciAdi" name="KullaniciAdi">
										</div>
									</div>
									<div class="row mb-3">
										<label class="col-sm-2 col-form-label">Şifre</label>
										<div class="col-sm-10">
											<input type="password" class="form-control" id="Sifre" name="Sifre">
										</div>
									</div>  
									<div class="row mb-3">
										<label   class="col-sm-2 col-form-label">Tel</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="Tel" name="Tel">
										</div>
									</div>  
									<div class="row mb-3">
										<label  class="col-sm-2 col-form-label">Meslek</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="DogumTarihi" name="DogumTarihi">
										</div>
									</div>  
									<div class="row mb-3">
										<label  class="col-sm-2 col-form-label">Adres</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="Cinsiyet" name="Cinsiyet">
										</div>
									</div>  
									<div class="row mb-3">
										<label  class="col-sm-2 col-form-label">Özet</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="Ozet" name="Ozet">
										</div>
									</div>  
									<div class="row mb-3">
										<label  class="col-sm-2 col-form-label">Facebook</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="Facebook" name="Facebook">
										</div>
									</div>  
									<div class="row mb-3">
										<label  class="col-sm-2 col-form-label">Twitter</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="Twitter" name="Twitter">
										</div>
									</div>  
									<div class="row mb-3">
										<label  class="col-sm-2 col-form-label">Instagram</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="Instagram" name="Instagram">
										</div>
									</div>  
									<div class="row mb-3">
										<label  class="col-sm-2 col-form-label">Linkedin</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="Linkedin" name="Linkedin">
										</div>
									</div>  
									<div class="row mb-3">
										<label  class="col-sm-2 col-form-label">Fotoğraf</label>
										<div class="col-sm-10">
											<input type="file" class="form-control" id="Foto" name="Foto">
										</div>
									</div>  
									<button type="submit" class="btn btn-success mr-2">Kaydet</button>
									<button class="btn btn-light" type="button" onclick="window.location.href='<?=base_url()?>admin/kullanicilar'">İptal</button>
								</form>
                   			</div> 
               			</div>
            		</div>
        		</div>
    		</div>
		</div> 
	</section> 
</main>
