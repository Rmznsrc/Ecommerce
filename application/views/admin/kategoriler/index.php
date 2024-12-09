 
 
<style>
.treeview {
    float: left;
    width: 100%;
    background-color: #F5F5F5;
    padding: 15px 30px 30px;
    
	ul {
        float: left;
        width: 100%;
        position: relative;

        li {
            float: left;
            width: 100%;
            border-left: 1px solid #444;
            padding: 10px 0;

            div {
                float: left;
                width: 100%;
                font-family: Arial;
                font-size: 15px;
                color: #444;
                line-height: 1.5;
                padding-left: 33px;
                position: relative;
                bottom: -20px;

                &:before {
                    content: "";
                    width: 30px;
                    height: 1px;
                    background-color: #444;
                    position: absolute;
                    top: 50%;
                    bottom: 50%;
                    left: 0;
                }
            }
            ul {
                margin: 20px 0;
                li {
                    border-left-color: #AAA;
                    margin-left: 50px;
                    width: calc(100% - 50px);

                    div {
                        color: #AAA;
                        padding-left: 15px;

                        &:before {
                            background-color: #AAA;
                            width: 10px;
                        }
                    }
                }
            }
        }
    }
}
</style>
 
 <main id="main" class="main"> 
	<section class="section dashboard">
	  <div class="row"> 
		<div class="col-lg-12">
		  <div class="row">  
			<div class="col-12">
			  <div class="card"> 
				<div class="card-body with-border">
				  <h5 class="card-title">Kategoriler &emsp; <a type="button" class="btn btn-success btn-sm" href="<?=base_url()?>admin/kategoriler/kategoriekle"><i class="bi bi-plus"></i> Yeni SSS Ekle</a> </h5>  
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

<div class="treeview">
	<?php 
 
	$parents = $controller->get_cat_by_parent(0);
 
	foreach( $parents as $row ) {
		echo $row->Adi;
		echo "<br />";
		$controller->recursive($row, 0, $row->Adi );
 
	 }?>
</div>


				</div> 
			  </div>
			</div>  
		  </div>
		</div>  
	  </div>
	</section> 
</main> 
 

 