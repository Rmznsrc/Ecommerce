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
				  <h5 class="card-title">Kategoriler &emsp;  </h5> 
                        <form class="forms-sample" method="POST" action="<?=base_url()?>admin/kategoriler/kategorieklekaydet">
                             <div class="row mb-3">
								<label for="ustkategori" class="col-sm-2 col-form-label">Üst Kategori</label>
								<div class="col-sm-10">
									<select name="ustkategori" id="ustkategori" class="form-control select2">
										<option value="">Seçiniz</option>
									<?php 
									foreach($kategoriler as $key => $rsk){
									?>
										<option value="<?=$rsk->KategoriID?>"><?=$rsk->Adi?></option>
									<?php } ?>
									</select>
								</div>
							</div>
							<div class="row mb-3">
								<label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="kategori" name="kategori">
								</div>
							</div>
							 
							
                            <button type="submit" class="btn btn-success mr-2">Kaydet</button>
                            <button class="btn btn-light" type="button" onclick="window.location.href='<?=base_url()?>admin/kategoriler'">İptal</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<br><br></section>

</main>
