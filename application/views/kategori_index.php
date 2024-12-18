<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="<?php echo base_url('');?>tema/blogger-master/img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Blogger</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="<?php echo base_url('');?>tema/blogger-master/css/linearicons.css">
			<link rel="stylesheet" href="<?php echo base_url('');?>tema/blogger-master/css/font-awesome.min.css">
			<link rel="stylesheet" href="<?php echo base_url('');?>tema/blogger-master/css/bootstrap.css">
			<link rel="stylesheet" href="<?php echo base_url('');?>tema/blogger-master/css/owl.carousel.css">
			<link rel="stylesheet" href="<?php echo base_url('');?>tema/blogger-master/css/main.css">
			<style>
			/* Section Styling */
			.category-area {
				font-family: Arial, sans-serif;
				padding: 20px 0;
				background-color: #f9f9f9;
				margin-bottom: 0px; /* Warna latar belakang soft */
			}

			/* Judul */
			.category-area h1 {
				font-size: 36px; /* Ukuran font lebih besar */
				font-weight: bold;
				color: #333; /* Warna gelap untuk judul */
				text-align: center;
				margin-bottom: 20px;
				margin-top: 25px;
			}

			/* Paragraf */
			.category-area p {
				font-size: 18px; /* Ukuran teks lebih besar */
				line-height: 2; /* Jarak antar baris */
				text-align: justify; /* Rata kanan-kiri */
				color: #555; /* Warna teks sedikit lebih terang */
				margin: 0 auto;
				max-width: 1000px; /* Maksimal lebar teks agar lebih enak dibaca */
			}

			.travel-area {
				margin-top: 0px;
			}

			/* Container untuk mengatur item horizontal */
.coba {
    display: flex; /* Mengatur elemen anak menjadi horizontal */
    flex-wrap: wrap; /* Membuat elemen turun ke bawah jika tidak cukup */
    justify-content: center; /* Memusatkan elemen secara horizontal */
    gap: 100px; /* Jarak antar elemen */
    padding: 20px;
}

/* Card untuk setiap gambar dan judul */
.uji {
    text-align: center; /* Membuat teks berada di tengah */
    width: 360px; /* Lebar tiap card */
    border: 1px solid #ddd; /* Garis tepi tipis */
    border-radius: 8px; /* Membulatkan sudut */
    padding: 10px;
    background-color: #f9f9f9; /* Latar belakang */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Efek bayangan */
    transition: transform 0.3s; /* Efek transisi */
}

.uji img {
    width: 100%; /* Gambar akan menyesuaikan lebar card */
    height: 480px; /* Tinggi gambar tetap */
    object-fit: cover; /* Menjaga proporsi gambar */
    border-radius: 8px; /* Membulatkan gambar */
}

.uji h2 {
    font-size: 16px; /* Ukuran font judul */
    color: #333; /* Warna teks */
    margin: 10px 0 0; /* Jarak atas judul */
}

.uji:hover {
    transform: scale(1.05); /* Membuat card membesar saat dihover */
}


			</style>
		</head>
		<body>

			<!-- Start Header Area -->
			<header class="default-header">
				<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container">
						  <a class="navbar-brand" href="<?= base_url()?>">
                <span ><?= $konfig->judul_website;?></span>
						  
						  </a>
						  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						    <span class="navbar-toggler-icon"></span>
						  </button>

						  <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
						    <ul class="navbar-nav">
								<li><a href="<?= base_url()?>">Home</a></li>
								<li class="dropdown">
							      <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
							        Kategori
							      </a>
								 
							      <div class="dropdown-menu">
								  <?php foreach ($kategori as $kate) { ?>
							        <a class="dropdown-item" href="<?= base_url('welcome/kategori/'.$kate['id_kategori'])?>"><?= $kate['nama_kategori']?></a>
									<?php } ?>
							      </div>
								 
							    </li>	
												
						    </ul>

							 <!-- Form Pencarian -->
							 <form class="form-inline my-2 my-lg-0" action="<?= base_url('welcome/cari') ?>" method="GET">
								<input 
									class="form-control mr-sm-2" 
									type="search" 
									name="keyword" 
									placeholder="Cari..." 
									aria-label="Search"
									style="width: 200px;" 
								>
								<button 
									class="btn btn-outline-success my-2 my-sm-0" 
									type="submit">
									Search
								</button>
							</form>
						  </div>						
					</div>
				</nav>
			</header>
			<!-- End Header Area -->

				<!-- Start category Area -->
			<section class="category-area section-gap" id="news" >
				<div class="container">
					
								<h1 class="mb-10">Re: Zero Hajimeru Isekai Seikatsu</h1>
								<p><?= $konfig->profil_website;?></p>
							
				</div>	
			</section>
			<!-- End category Area -->
			
			<!-- Start travel Area -->
			<section class="travel-area section-gap" id="travel">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10"><?= $nama_kategori;?></h1>
								
							</div>
						</div>
					</div>		
					
					<div class="row" id="content-container">
					 <?php foreach ($kontenn as $kk) { ?>
						
						<div class="col-lg-6 travel-left">
						 <div class="single-travel media pb-70">
							  <img class="img-fluid d-flex  mr-3" src="<?= base_url().'./tema/assets/images/'.$kk['foto']?>" width="30%" alt="">
							  
							  <div class="media-body align-self-center">
							    <h4 class="mt-0"><a href="<?= base_url('welcome/artikel/'.$kk['slug'])?>">
								<?= $kk['judul']?>
								</a></h4>
							    <p>
									<?= substr($kk['isi_konten'], 0, 200); ?> <!-- Batas 200 karakter -->
									<?php if (strlen($kk['isi_konten']) > 200): ?>
										... <a href="<?= base_url('welcome/artikel/'.$kk['slug']) ?>">Baca Selengkapnya</a>
									<?php endif; ?>
								</p>						 
							  </div>
						 </div>							
											
						</div>
						<?php  } ?>		
					</div>
					<?php if (!empty($video)): ?> <!-- Cek jika video tidak kosong -->
<h1 style="text-align: center;">Season mana yang ingin kamu tonton?</h1>
<div class="coba">
    <?php foreach($video as $tonton): ?>
    <div class="uji">
        <img src="<?= base_url().'./tema/assets/images/video/'.$tonton['foto']?>" alt="Gambar Potret">
        <h2><a href="<?= base_url('video/tampil/'.$tonton['id_video'])?>">
            <?= $tonton['judul'] ?>
        </a></h2>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?> <!-- Tutup cek kondisi -->

				</div>					
			</section>
			<!-- End travel Area -->
			
			
			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget">
								<h6>Top Products</h6>
								<ul class="footer-nav">
								<?php foreach ($kategori as $kate) { ?>
									<li><a href="<?= base_url('welcome/kategori/'.$kate['id_kategori'])?>"><?= $kate['nama_kategori']?></a></li>
									<?php } ?>   
								</ul>
							</div>
						</div>
						<div class="col-lg-6  col-md-12">
							<div class="single-footer-widget newsletter">
								<h6><?= $konfig->judul_website;?></h6>
								<p><?= $konfig->profil_website;?></p>
								<div class="col-lg-6 col-sm-12 footer-social">
									<a href="<?= $konfig->facebook;?>"><i class="fa fa-facebook"></i></a>
									
									<a href="<?= $konfig->instagram;?>"><i class="fa fa-instagram"></i></a>

									<a href="https://www.youtube.com/watch?v=EO9kZA9B9Hk&list=PLPanbgyToztbLcypmWAFGf739Alfxk3qS"><i class="fa fa-youtube"></i></a>

									<a href="https://id.pinterest.com/pin/897342294500294427/"><i class="fa fa-pinterest"></i></a>
								</div>
							</div>
						</div>
							
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget mail-chimp">
								<h6 class="mb-20">Butuh Informasi Terkait LN?</h6>
								<ul >
									<li>CEK DI SINI</li>
									<li><a href="https://witchculttranslation.com/">Light Novel</a></li>
								</ul>
								
							</div>
						</div>	
							
					</div>

					

					<div class="row footer-bottom d-flex justify-content-between">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						<p class="col-lg-4 col-sm-10 footer-text">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						<div class="col-lg-8 col-sm-8 footer-social">
							<p><i>*Disclamer: These Social Media Account is not mine</i></p>
						</div>
					</div>
				</div>
			</footer>
			<!-- End footer Area -->		

			<script src="<?php echo base_url('');?>tema/blogger-master/js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
			<script src="<?php echo base_url('');?>tema/blogger-master/js/vendor/bootstrap.min.js"></script>
			<script src="<?php echo base_url('');?>tema/blogger-master/js/jquery.ajaxchimp.min.js"></script>
			<script src="<?php echo base_url('');?>tema/blogger-master/js/parallax.min.js"></script>			
			<script src="<?php echo base_url('');?>tema/blogger-master/js/owl.carousel.min.js"></script>		
			<script src="<?php echo base_url('');?>tema/blogger-master/js/jquery.magnific-popup.min.js"></script>				
			<script src="<?php echo base_url('');?>tema/blogger-master/js/jquery.sticky.js"></script>
			<script src="<?php echo base_url('');?>tema/blogger-master/js/main.js"></script>	
		</body>
	</html>