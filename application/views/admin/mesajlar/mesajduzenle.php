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
                        <h4 class="card-title">Mesaj Ekle</h4>
                        <p class="card-description"> </p>
                        <form class="forms-sample" method="POST" action="<?=base_url()?>admin/mesajlar/mesajduzenlekaydet/<?=$mesaj[0]->MesajID?>">
                             <div class="row mb-3">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Ad</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="Ad" name="Ad" value="<?=$mesaj[0]->Ad?>">
								</div>
							</div>
							<div class="row mb-3">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Soyad</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="Soyad" name="Soyad" value="<?=$mesaj[0]->Soyad?>">
								</div>
							</div>
							 
							<div class="row mb-3">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="Email" name="Email" value="<?=$mesaj[0]->Email?>">
								</div>
							</div>  
							<div class="row mb-3">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Tel</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="Tel" name="Tel" value="<?=$mesaj[0]->Tel?>">
								</div>
							</div>  
							<div class="row mb-3">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Açıklama</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="Aciklama" name="Aciklama" value="<?=$mesaj[0]->Aciklama?>">
								</div>
							</div>  
							<div class="row mb-3">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Konu</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="Konu" name="Konu" value="<?=$mesaj[0]->Konu?>">
								</div>
							</div>  
							  
                            <button type="submit" class="btn btn-success mr-2">Kaydet</button>
                            <button class="btn btn-light" type="button" onclick="window.location.href='<?=base_url()?>admin/mesajlar'">İptal</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<br><br></section>

</main>
