 
 
<main id="main" class="main"> 
	<section class="section dashboard">
	  <div class="row">
	 
		<div class="col-lg-12">
		  <div class="row">  
			<div class="col-12">
			  <div class="card"> 
				<div class="card-body with-border">
				  <h5 class="card-title">Siparişler &emsp; </h5>  
				  <table class="table datatable">
					<thead>
					  <tr>
						<th>ID </th>
						<th>SİPARİŞ NO</th>
						<th>SİPARİŞ TARİHİ</th>
						<th>MÜŞTERİ</th>
						<th>SİPARİŞ DURUMU</th> 
						<th>İŞLEMLER</th>
					  </tr>
					</thead>
					<tbody>
						<?php 
						foreach($siparisler as $key => $rs){
						?> 
					  <tr>
						<td><?=$rs->SiparisID?></td> 
						<td><?=$rs->SiparisNo?></td> 
						<td><?=$rs->SiparisTarihi?></td> 
						<td><?=$rs->musteri?></td>   
						<td><?=$rs->SiparisDurumAdi?></td>
						<td> 
							<a type="button" class="btn btn-primary btn-sm" href="<?=base_url()?>admin/siparisler/siparisdetay/<?=$rs->SiparisID?>"><i class="bi bi-list"></i> </a>
							<a type="button" class="btn btn-primary btn-sm" href="<?=base_url()?>admin/siparisler/siparisduzenle/<?=$rs->SiparisID?>"><i class="bi bi-pencil"></i> </a>
							<a type="button" class="btn btn-danger btn-sm"  href="<?=base_url()?>admin/siparisler/siparissil/<?=$rs->SiparisID?>"><i class="bi bi-trash"></i> </a>
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
 

 