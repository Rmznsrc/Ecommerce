 
<link href="<?=base_url()?>assets/treeviewfiles/depthtree.css" rel="stylesheet">
 <main id="main" class="main"> 
	<section class="section dashboard">
	  <div class="row"> 
		<div class="col-lg-12">
		  <div class="row">  
			<div class="col-12">
			  <div class="card"> 
				<div class="card-body with-border">
				  <h5 class="card-title">Kategoriler &emsp; <a type="button" class="btn btn-success btn-sm" href="<?=base_url()?>admin/kategoriler/kategoriekle"><i class="bi bi-plus"></i> Yeni Kategori Ekle</a> </h5>  
				  <table class="table datatable">
					<thead>
					  <tr>
						<th>ID </th>
						<th>ADI</th>
						<th>ÜST KATEGORİ</th> 
						<th>İŞLEMLER</th>
					  </tr>
					</thead>
					<tbody>
						<?php 
						foreach($kategoriler as $key => $rs){
						?> 
					  <tr>
						<td><?=$rs->KategoriID?></td> 
						<td><?=$rs->Adi?></td>  
						<td><?=$rs->UstKategori?></td>   
						<td> 
							<a type="button" class="btn btn-primary btn-sm" href="<?=base_url()?>admin/kategoriler/kategoriduzenle/<?=$rs->KategoriID?>"><i class="bi bi-pencil"></i> </a>
							<a type="button" class="btn btn-danger btn-sm"  href="<?=base_url()?>admin/kategoriler/kategorisil/<?=$rs->KategoriID?>"><i class="bi bi-trash"></i> </a>
						</td> 
					  </tr>
					 <?php } ?>
					</tbody>
				  </table>  
<br><br>
<h3 style="text-align:center"><b>KATEGORİ ŞEMASI </b></h3>
<div class="treeview">
<?php  
  $depArr = $controller->gethtml(); 
  ?>
<div class="body genealogy-body genealogy-scroll">
  <div class="genealogy-tree"> 
      <?php   
        function my_print($array) {
          $output = "<ul class='active'>";
          foreach ($array as $key=> $value) {
              if (is_array($value)) {
                
                 // $output .= "<li>".$key.my_print($value)."</li>";
                  $output .=' <li><a href="javascript:void(0);"><div class="member-view-box"><div class="member-header"><span style="font-size:11px;">'.$key.'</span></div><div class="member-image"><img src="https://cdn-icons-png.flaticon.com/128/13653/13653783.png" alt="Member"></div><div class="member-footer"><div class="name"><span></span></div><div class="downline"><span>2 | 3</span></div></div></div></a>'. my_print($value).'</li>';
            
                  
              } else {
                  $output .= '<li> <a href="javascript:void(0);"><div class="member-view-box"><div class="member-header"><span style="font-size:11px;">'.$value.'</span></div><div class="member-image"><img src="https://cdn-icons-png.flaticon.com/128/13653/13653783.png" alt="Member"></div><div class="member-footer"><div class="name"><span>'.$value.'</span></div><div class="downline"><span>2 | 3</span></div></div></div></a></li>';                 
              }
          }
          $output .= "</ul>";
          return $output;
      } 
      echo my_print($depArr); 
      ?> 
  </div>
</div>
 
</div> 
				</div> 
			  </div>
			</div>  
		  </div>
		</div>  
	  </div>
	</section> 
</main>  
<script src="<?=base_url()?>assets/treeviewfiles/depthtree.js"></script>

 