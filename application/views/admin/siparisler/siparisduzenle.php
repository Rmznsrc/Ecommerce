 
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
                        <h4 class="card-title">Sipariş Düzenle</h4>
                        <p class="card-description"> </p>
                        <form class="forms-sample" method="POST" action="<?=base_url()?>admin/siparisler/siparisduzenlekaydet/<?=$siparis[0]->SiparisID?>">
                             
                            <div class="row mb-3">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Sipariş Durumu</label>
								<div class="col-sm-10">
                                <select class="form-select" id="floatingSelect" name="SiparisDurumID" aria-label="Floating label select example">
                                    <option value = "">Seçiniz</option> 
                                        <?php 
                                        foreach($siparisdurum as $key => $rs){
                                        ?>
                                    <option value = "<?=$rs->SiparisDurumID?>" <?php if($rs->SiparisDurumID == $siparis[0]->SiparisDurumID){ ?>selected <?php }?>><?=$rs->Adi?></option>
                                        <?php } ?>
                                    </select>
                                   
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
