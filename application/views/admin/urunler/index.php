<main id="main" class="main">

 

<section class="section dashboard">
  <div class="row">
 
    <div class="col-lg-12">
      <div class="row">  
        <div class="col-12">
          <div class="card">

        

            <div class="card-body">
              <h5 class="card-title">Ürünler &emsp; <a type="button" class="btn btn-success btn-sm" href="<?=base_url()?>admin/urunler/urunekle"><i class="bi bi-plus"></i> Yeni Ürün Ekle</a> </h5> 
              <div id="reportsChart"></div>
           
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>ÜRÜN ID </th>
                    <th>ADI</th>
                    <th>FİYAT</th>
                    <th>KATEGORİ</th>
                    <th>STOK</th>
                    <th>AÇIKLAMA</th>
                    <th>İŞLEMLER</th>
                  </tr>
                </thead>
                <tbody>
					<?php 
					foreach($urunler as $key => $rs){
					?> 
                  <tr>
                    <td><?=$rs->UrunID?></td> 
                    <td><?=$rs->Adi?></td> 
                    <td><?=$rs->Fiyat?></td> 
                    <td><?=$rs->KategoriAdi?></td> 
                    <td><?=$rs->Stok?></td> 
                    <td><?=$rs->Aciklama?></td> 
                    <td>
                    <a type="button" class="btn btn-warning btn-sm" href="<?=base_url()?>admin/urunler/urundetay"><i class="bi bi-list"></i> </a>
                    <a type="button" class="btn btn-primary btn-sm" href="<?=base_url()?>admin/urunler/urunduzenle"><i class="bi bi-pencil"></i> </a>
                    <a type="button" class="btn btn-danger btn-sm"  href="<?=base_url()?>admin/urunler/urunsil/<?=$rs->UrunID?>"><i class="bi bi-trash"></i> </a>
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

</main><!-- End #main -->