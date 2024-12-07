<main id="main" class="main"> 
	<section class="section dashboard">
	  <div class="row">
	 
		<div class="col-lg-12">
		  <div class="row">  
			<div class="col-12">
			  <div class="card"> 
				<div class="card-body with-border">
				  <h5 class="card-title">Müşteriler &emsp; <a type="button" class="btn btn-success btn-sm" href="<?=base_url()?>admin/musteriler/musteriekle"><i class="bi bi-plus"></i> Yeni Müşteri Ekle</a> </h5> 
				  <table class="table datatable">
					<thead>
					  <tr>
						<th>Müşteri ID </th>
						<th>Adi Soyadi</th>
						<th>Email</th>
						<th>Sifre</th> 
						<th>Tel</th> 
						<th>Doğum Tarihi</th> 
						<th>Cinsiyet</th> 
						<th>İŞLEMLER</th>
					  </tr>
					</thead>
					<tbody>
						<?php 
						foreach($musteriler as $key => $rs){
						?> 
					  <tr>
						<td><?=$rs->MusteriID?></td> 
						<td><?=$rs->Adi." ".$rs->Soyadi?></td> 
						<td><?=$rs->Email?></td> 
						<td><?=$rs->Sifre?></td>   
						<td><?=$rs->Tel?></td>   
						<td><?=$rs->DogumTarihi?></td>   
						<td><?=$rs->Cinsiyet?></td>   
						<td> 
							<a type="button" class="btn btn-primary btn-sm" href="<?=base_url()?>admin/musteriler/musteriduzenle/<?=$rs->MusteriID?>"><i class="bi bi-pencil"></i> </a>
							<a type="button" class="btn btn-danger btn-sm"  href="<?=base_url()?>admin/musteriler/musterisil/<?=$rs->MusteriID?>"><i class="bi bi-trash"></i> </a>
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
 

 