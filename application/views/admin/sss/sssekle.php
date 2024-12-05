 


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
              <main id="main" class="main"> 
	<section class="section dashboard">
	  <div class="row">
	 
		<div class="col-lg-12">
		  <div class="row">  
			<div class="col-12">
			  <div class="card">

			

				<div class="card-body with-border">
				  <h5 class="card-title">Sıkça Sorulan Sorular &emsp;  </h5> 
				 
                    
                        <form enctype="multipart/form-data" class="forms-sample" method="POST" action="<?=base_url()?>admin/sss/ssseklekaydet">
                             <div class="row mb-3">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Başlık</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="baslik" name="baslik">
								</div>
							</div>
							<div class="row mb-3">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Soru</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="soru" name="soru">
								</div>
							</div>
							 
							<div class="row mb-3">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Cevap</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="cevap" name="cevap">
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
