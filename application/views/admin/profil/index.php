<main id="main" class="main">
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

<script>
function sifrekontrol(){
	var yenisifre 		= $("#yenisifre").val();
	var yenisifretekrar = $("#yenisifretekrar").val();
	if(yenisifre != yenisifretekrar){
		$("#skontdiv").html('<span style="color:red;">Şifre uyuşmuyor!</span>');
	}else{
		$("#skontdiv").html('<span style="color:green;">Şifre uyuşuyor.</span>'); 
	}
}
</script>
<section class="section profile">
  <div class="row">
	<div class="col-xl-4">

	  <div class="card">
		<div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

		  <img src="<?=base_url()?>uploads/profil/<?=$this->session->oturum_data['foto']?>" alt="Profile" class="rounded-circle">
		  <h2><?=$this->session->oturum_data['adi']?> <?=$this->session->oturum_data['soyadi']?></h2>
		  <h3><?=$this->session->oturum_data['meslek']?></h3>
		  <div class="social-links mt-2">
			<a href="<?=$this->session->oturum_data['twitter']?>" class="twitter"><i class="bi bi-twitter"></i></a>
			<a href="<?=$this->session->oturum_data['facebook']?>" class="facebook"><i class="bi bi-facebook"></i></a>
			<a href="<?=$this->session->oturum_data['instagram']?>" class="instagram"><i class="bi bi-instagram"></i></a>
			<a href="<?=$this->session->oturum_data['linkedin']?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
		  </div>
		</div>
	  </div>

	</div>

	<div class="col-xl-8"> 
	  <div class="card">
		<div class="card-body pt-3"> 
		  <ul class="nav nav-tabs nav-tabs-bordered"> 
			<li class="nav-item">
			  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Genel Bakış</button>
			</li> 
			<li class="nav-item">
			  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Profili Düzenle</button>
			</li> 
			<li class="nav-item">
			  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Ayarlar</button>
			</li> 
			<li class="nav-item">
			  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Şifre Değiştir</button>
			</li> 
		  </ul>
		  <div class="tab-content pt-2"> 
			<div class="tab-pane fade show active profile-overview" id="profile-overview">
			  <h5 class="card-title">Hakkımda</h5>
			  <p class="small fst-italic"><?=$this->session->oturum_data['ozet']?></p> 
			  <h5 class="card-title">Profil Detayları</h5> 
			  <div class="row">
				<div class="col-lg-3 col-md-4 label ">Ad Soyad</div>
				<div class="col-lg-9 col-md-8"><?=$this->session->oturum_data['adi']?> <?=$this->session->oturum_data['soyadi']?></div>
			  </div> 
			  <div class="row">
				<div class="col-lg-3 col-md-4 label">Meslek</div>
				<div class="col-lg-9 col-md-8"><?=$this->session->oturum_data['meslek']?></div>
			  </div> 
			  <div class="row">
				<div class="col-lg-3 col-md-4 label">Adres</div>
				<div class="col-lg-9 col-md-8"><?=$this->session->oturum_data['adres']?></div>
			  </div> 
			  <div class="row">
				<div class="col-lg-3 col-md-4 label">Tel</div>
				<div class="col-lg-9 col-md-8"><?=$this->session->oturum_data['tel']?></div>
			  </div> 
			  <div class="row">
				<div class="col-lg-3 col-md-4 label">Email</div>
				<div class="col-lg-9 col-md-8"><?=$this->session->oturum_data['email']?></div>
			  </div> 
			</div> 
			<div class="tab-pane fade profile-edit pt-3" id="profile-edit"> 
			  <form>
				<div class="row mb-3">
				  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profil Resmi</label>
				  <div class="col-md-8 col-lg-9">
					<img src="<?=base_url()?>uploads/profil/<?=$this->session->oturum_data['foto']?>" alt="Profile">
					<div class="pt-2">
					  <a href="#" class="btn btn-primary btn-sm" title="Yeni Profil Resmi Yükle"><i class="bi bi-upload"></i></a>
					  <a href="#" class="btn btn-danger btn-sm" title="Profil Resmi Kaldır"><i class="bi bi-trash"></i></a>
					</div>
				  </div>
				</div>

				<div class="row mb-3">
				  <label for="ad" class="col-md-4 col-lg-3 col-form-label">Ad</label>
				  <div class="col-md-8 col-lg-9">
					<input name="ad" id="ad" type="text" class="form-control" value="<?=$this->session->oturum_data['adi']?>">
				  </div>
				</div>
				<div class="row mb-3">
				  <label for="soyad" class="col-md-4 col-lg-3 col-form-label">Soyad</label>
				  <div class="col-md-8 col-lg-9">
					<input name="soyad" id="soyad" type="text" class="form-control" value="<?=$this->session->oturum_data['soyadi']?>">
				  </div>
				</div>
				<div class="row mb-3">
				  <label for="ozet" class="col-md-4 col-lg-3 col-form-label">Özet</label>
				  <div class="col-md-8 col-lg-9">
					<textarea class="form-control" name="ozet" id="ozet" style="height: 100px"><?=$this->session->oturum_data['ozet']?></textarea>
				  </div>
				</div>
 
				<div class="row mb-3">
				  <label for="meslek" class="col-md-4 col-lg-3 col-form-label">Meslek</label>
				  <div class="col-md-8 col-lg-9">
					<input type="text" class="form-control" id="meslek" name="meslek" value="<?=$this->session->oturum_data['meslek']?>">
				  </div>
				</div> 
				<div class="row mb-3">
				  <label for="adres" class="col-md-4 col-lg-3 col-form-label">Adres</label>
				  <div class="col-md-8 col-lg-9">
					<input type="text" class="form-control" id="adres" name="adres" value="<?=$this->session->oturum_data['adres']?>">
				  </div>
				</div>

				<div class="row mb-3">
				  <label for="tel" class="col-md-4 col-lg-3 col-form-label">Tel</label>
				  <div class="col-md-8 col-lg-9">
					<input type="text" class="form-control" id="tel" name="tel" value="<?=$this->session->oturum_data['tel']?>">
				  </div>
				</div>

				<div class="row mb-3">
				  <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
				  <div class="col-md-8 col-lg-9">
					<input name="email" type="email" class="form-control" id="Email" value="<?=$this->session->oturum_data['email']?>">
				  </div>
				</div>

				<div class="row mb-3">
				  <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter</label>
				  <div class="col-md-8 col-lg-9">
					<input type="text" class="form-control" id="twitter" name="twitter" value="<?=$this->session->oturum_data['twitter']?>">
				  </div>
				</div>

				<div class="row mb-3">
				  <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook</label>
				  <div class="col-md-8 col-lg-9">
					<input name="facebook" type="text" class="form-control" id="facebook" value="<?=$this->session->oturum_data['facebook']?>">
				  </div>
				</div>

				<div class="row mb-3">
				  <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram</label>
				  <div class="col-md-8 col-lg-9">
					<input name="instagram" type="text" class="form-control" id="instagram" value="<?=$this->session->oturum_data['instagram']?>">
				  </div>
				</div>

				<div class="row mb-3">
				  <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin</label>
				  <div class="col-md-8 col-lg-9">
					<input name="linkedin" type="text" class="form-control" id="linkedin" value="<?=$this->session->oturum_data['linkedin']?>">
				  </div>
				</div>

				<div class="text-center">
				  <button type="submit" class="btn btn-primary">Değişiklikleri Kaydet</button>
				</div>
			  </form>
			</div>

			<div class="tab-pane fade pt-3" id="profile-settings"> 
			  <form>

				<div class="row mb-3">
				  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Bildirimleri</label>
				  <div class="col-md-8 col-lg-9">
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" id="changesMade" checked>
					  <label class="form-check-label" for="changesMade">
						Changes made to your account
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" id="newProducts" checked>
					  <label class="form-check-label" for="newProducts">
						Information on new products and services
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" id="proOffers">
					  <label class="form-check-label" for="proOffers">
						Marketing and promo offers
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
					  <label class="form-check-label" for="securityNotify">
						Security alerts
					  </label>
					</div>
				  </div>
				</div>

				<div class="text-center">
				  <button type="submit" class="btn btn-primary">Değişiklikleri Kaydet</button>
				</div>
			  </form>  
			</div> 
			<div class="tab-pane fade pt-3" id="profile-change-password"> 
			  <form method="POST" action="<?=base_url()?>admin/profil/profilsifredegistir/<?=$this->session->oturum_data['id']?>"> 
				<div class="row mb-3">
				  <label for="mevcutsifre" class="col-md-4 col-lg-3 col-form-label">Mevcut Şifre</label>
				  <div class="col-md-8 col-lg-9">
					<input name="mevcutsifre" type="password" class="form-control" id="mevcutsifre">
				  </div>
				</div>

				<div class="row mb-3">
				  <label for="yenisifre" class="col-md-4 col-lg-3 col-form-label">Yeni Şifre</label>
				  <div class="col-md-8 col-lg-9">
					<input name="yenisifre" type="password" class="form-control" id="yenisifre">
				  </div>
				</div>

				<div class="row mb-3">
				  <label for="yenisifretekrar" class="col-md-4 col-lg-3 col-form-label">Yeni Şifre Tekrar</label>
				  <div class="col-md-8 col-lg-9">
					<input onkeyup="sifrekontrol()" name="yenisifretekrar" type="password" class="form-control" id="yenisifretekrar">
					<div style="margin-top:5px;" id="skontdiv"></div>
				  </div>
				</div>

				<div class="text-center">
				  <button type="submit" class="btn btn-primary">Şifreyi Değiştir</button>
				</div>
			  </form> 
			</div> 
		  </div>  
		</div>
	  </div> 
	</div>
  </div>
</section> 
</main> 
