<main id="main" class="main"> 
	<section class="section dashboard">
	  <div class="row">
	 
		<div class="col-lg-12">
		  <div class="row">  
			<div class="col-12">
			  <div class="card"> 
				<div class="card-body with-border">
				  <h5 class="card-title">Kullanıcılar &emsp; <a type="button" class="btn btn-success btn-sm" href="<?=base_url()?>admin/kullanicilar/kullaniciekle"><i class="bi bi-plus"></i> Yeni Kullanıcı Ekle</a> </h5> 
				  <table class="table datatable">
					<thead>
					  <tr>
						<th> ID </th>
						<th> Kullanıcı Adı </th> 
						<th>Email</th>
						<th>Adı Soyadı</th> 
						<th>Tel</th> 
						<th>Meslek</th> 
						<th>Adres</th> 
						<th>Ozet</th> 
						<th>Facebook</th> 
						<th>Twitter</th> 
						<th>Instagram</th> 
						<th>Linkedin</th> 
						<th>Foto</th> 
						<th>İŞLEMLER</th>
					  </tr>
					</thead>
					<tbody>
						<?php 
						foreach($kullanicilar as $key => $rs){
						?> 
					  <tr>
						<td><?=$rs->KullaniciID?></td> 
						<td><?=$rs->KullaniciAdi?></td> 
						<td><?=$rs->Email?></td> 
						<td><?=$rs->Adi." ".$rs->Soyadi?></td>   
						<td><?=$rs->Tel?></td>    
						<td><?=$rs->Meslek?></td> 
						<td><?=$rs->Adres?></td>   
						<td><?=$rs->Ozet?></td>   
						<td><?=$rs->Facebook?></td>   
						<td><?=$rs->Twitter?></td>   
						<td><?=$rs->Instagram?></td>   
						<td><?=$rs->Linkedin?></td>     
						<td>
						    <a href="<?=base_url()?>uploads/profil/<?=$rs->Foto?>" alt="<?=$rs->Adi." ".$rs->Soyadi?>" data-lightbox="photos">
								<img class="img-fluid" alt="<?=$rs->Adi?>" src="<?=base_url().'uploads/profil/'."/".$rs->Foto?>" style="width:50px;height:50px;"/>
							</a>	
						
						</td>   
						<td> 
							<a type="button" class="btn btn-primary btn-sm" href="<?=base_url()?>admin/kullanicilar/kullaniciduzenle/<?=$rs->KullaniciID?>"><i class="bi bi-pencil"></i> </a>
							<a type="button" class="btn btn-danger btn-sm"  href="<?=base_url()?>admin/kullanicilar/kullanicisil/<?=$rs->KullaniciID?>"><i class="bi bi-trash"></i> </a>
						</td> 
					  </tr>
					 <?php } ?>
					</tbody>
				  </table>  
				</div> 
			  </div>
			</div>  
		  </div>
		</div>  
	  </div>
	</section> 
</main> 
 

 