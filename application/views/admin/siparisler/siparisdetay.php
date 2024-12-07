<main id="main" class="main"> 
	<section class="section profile">
	  <div class="row">
		<div class="col-lg-12">
		  <div class="row">  
			<div class="col-12">
			  	<div class="card"> 
			  		<div class="card-header ">
						<h5 class="card-title">
						<a href="<?=base_url()?>admin/siparisler" class="btn btn-secondary"><i class="bi bi-arrow-left-circle-fill"></i> Geri Dön</a>	
					<br><br>	Sipariş Detayları </h5>
					</div>
				<div class="card-body  ">
					<div class="tab-pane fade show active profile-overview" id="profile-overview" role="tabpanel">
         
      
				  <div class="tab-pane fade show active profile-overview" id="profile-overview">
          
					<h5 class="card-title"><?=$siparisdetay[0]->Tip?> Adresi</h5>

					<div class="row">
						<div class="col-lg-3 col-md-4 label ">Adres Başlık</div>
						<div class="col-lg-9 col-md-8"><?=$siparisdetay[0]->Baslik?></div>
					</div>

						<div class="row">
						<div class="col-lg-3 col-md-4 label">Alıcı</div>
						<div class="col-lg-9 col-md-8"><?=$siparisdetay[0]->AliciAdi." ".$siparisdetay[0]->AliciSoyadi?></div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-md-4 label ">Alıcı Tel</div>
							<div class="col-lg-9 col-md-8"><?=$siparisdetay[0]->AliciTel?></div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-md-4 label ">Adres Türü</div>
							<div class="col-lg-9 col-md-8"><?=$siparisdetay[0]->AdresTuru?></div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-md-4 label ">İlçe/Mahalle/Sokak </div>
							<div class="col-lg-9 col-md-8"><?=$siparisdetay[0]->Sehir."/".$siparisdetay[0]->Ilce."/".$siparisdetay[0]->Mahalle?></div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-md-4 label ">Adres </div>
							<div class="col-lg-9 col-md-8"><?=$siparisdetay[0]->Adres?></div>
						</div>

                </div>
				<h5 class="card-title">Ürün Bilgileri</h5>
 				
<!-- Table with stripped rows -->
<table class="table table-striped">
  <thead>
	<tr>
	  <th scope="col">#</th> 
	  <th scope="col">Ürün Adı</th>
	  <th scope="col">Kategori</th>
	  <th scope="col">Adet</th>
	  <th scope="col">Fiyat</th>
	  <th scope="col">Resim</th>
	</tr>
  </thead>
  <tbody>
  <?php $say = 1; $geneltoplam = 0;
	foreach($siparis as $key => $rs){
		$geneltoplam += ($rs->Fiyat*$rs->Adet)
	?>
	<tr>
	  <th scope="row"><?=$say?></th>
	  
	  <td><?=$rs->Adi?></td>
	  <td><?=$rs->urunkategorisi?></td>
	  <td><?=$rs->Adet?></td>
	  <td><?=$rs->Fiyat?></td>
	  <td><img src="<?=base_url()?>uploads/urunler/<?=$rs->UrunID?>/<?=$rs->UrunResim?>" style="width:50px;height:50px;"/></td>

	</tr>
 <?php $say++;}?>
	<tfoot>
		<tr>
			<th colspan="4"></th> 
			<th>Toplam Tutar:</th> 
			<th><?=$geneltoplam?> TL</th>
  		</tr>
  </tfoot>
	 
  </tbody>
</table>
                
                </div>
				  
				</div>

			  </div>
			</div> 

		  </div>
		</div>  
	  </div>
	</section> 
</main> 
 

 