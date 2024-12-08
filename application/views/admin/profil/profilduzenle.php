 
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
                        <h4 class="card-title">SSS Ekle</h4>
                        <p class="card-description"> </p>
                        <form enctype="multipart/form-data" class="forms-sample" method="POST" action="<?=base_url()?>admin/sss/sssduzenlekaydet/<?=$sss[0]->SSSID?>">
                             <div class="row mb-3">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Başlık</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="baslik" name="baslik" value="<?=$sss[0]->Baslik?>">
								</div>
							</div>
							<div class="row mb-3">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Soru</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="soru" name="soru"  value="<?=$sss[0]->Soru?>">
								</div>
							</div>
							 
							<div class="row mb-3">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Cevap</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="cevap" name="cevap"  value="<?=$sss[0]->Cevap?>">
								</div>
							</div>
							 

                            <button type="submit" class="btn btn-success mr-2">Kaydet</button>
                            <button class="btn btn-light" type="button" onclick="window.location.href='<?=base_url()?>admin/sss'">İptal</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<br><br></section>

</main>
