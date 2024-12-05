 
 
<main id="main" class="main"> 
	<section class="section dashboard">
	  <div class="row">
	 
		<div class="col-lg-12">
		  <div class="row">  
			<div class="col-12">
			  <div class="card">

			

				<div class="card-body with-border">
				  <h5 class="card-title">SSS &emsp; <a type="button" class="btn btn-success btn-sm" href="<?=base_url()?>admin/sss/sssekle"><i class="bi bi-plus"></i> Yeni Ürün Ekle</a> </h5> 
				 
			   
				  <table class="table datatable">
					<thead>
					  <tr>
						<th>SSS ID </th>
						<th>BAŞLIK</th>
						<th>SORU</th>
						<th>CEVAP</th> 
						<th>İŞLEMLER</th>
					  </tr>
					</thead>
					<tbody>
						<?php 
						foreach($sss as $key => $rs){
						?> 
					  <tr>
						<td><?=$rs->SSSID?></td> 
						<td><?=$rs->Baslik?></td> 
						<td><?=$rs->Soru?></td> 
						<td><?=$rs->Cevap?></td>   
						<td> 
							<a type="button" class="btn btn-primary btn-sm" href="<?=base_url()?>admin/sss/sssduzenle/<?=$rs->SSSID?>"><i class="bi bi-pencil"></i> </a>
							<a type="button" class="btn btn-danger btn-sm"  href="<?=base_url()?>admin/sss/ssssil/<?=$rs->SSSID?>"><i class="bi bi-trash"></i> </a>
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
 

 