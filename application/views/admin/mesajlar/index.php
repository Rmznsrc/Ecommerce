
 <main id="main" class="main"> 
	<section class="section dashboard">
	  <div class="row"> 
		<div class="col-lg-12">
		  <div class="row">  
			<div class="col-12">
			  <div class="card"> 
				<div class="card-body with-border">
				  <h5 class="card-title">Mesajlar &emsp; <a type="button" class="btn btn-success btn-sm" href="<?=base_url()?>admin/mesajlar/mesajekle"><i class="bi bi-plus"></i> Yeni Mesaj Ekle</a> </h5>  
			 
				  <table class="table datatable">
					<thead>
					  <tr>
						<th>ID </th>
						<th>Ad Soyad</th>
						<th>Email</th>
						<th>Tel</th> 
						<th>Açıklama</th> 
						<th>Konu</th> 
						<th>Tarih</th> 
						<th>İŞLEMLER</th>
					  </tr>
					</thead>
					<tbody>
						<?php 
						foreach($mesajlar as $key => $rs){
						?> 
					  <tr>
						<td><?=$rs->MesajID?></td> 
						<td><?=$rs->Ad." ".$rs->Soyad?></td> 
						<td><?=$rs->Email?></td> 
						<td><?=$rs->Tel?></td>   
						<td><?=$rs->Aciklama?></td>   
						<td><?=$rs->Konu?></td>   
						<td><?=$rs->Tarih?></td>   
						<td> 
							<a type="button" class="btn btn-primary btn-sm" href="<?=base_url()?>admin/mesajlar/mesajduzenle/<?=$rs->MesajID?>"><i class="bi bi-pencil"></i> </a>
							<a type="button" class="btn btn-danger btn-sm"  href="<?=base_url()?>admin/mesajlar/mesajsil/<?=$rs->MesajID?>"><i class="bi bi-trash"></i> </a>
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
 

 