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

			<!-- start banner Area -->


			
<!-- start banner Area -->
<?php foreach ($caraousel as $kate){ ?>
<section class="banner-area relative" id="home" data-parallax="scroll" data-image-src="<?= base_url().'./tema/assets/images/caraousel/'.$kate['foto']?>">
				<div class="overlay-bg overlay"></div>
				<div class="container">
					<div class="row fullscreen">
						<div class="banner-content d-flex align-items-center col-lg-12 col-md-12">
							<h1>
								Re: Zero Kara Hajimeru Isekai Seikatsu <br>
								Tappei Nagatsuki								
							</h1>
						</div>	
																	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
			<?php } ?>
<!-- End banner Area -->

			<!-- Start travel Area -->
			<section class="travel-area section-gap" id="travel">
				<div class="container" >
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Topik terbaru</h1>
								<p>Berikut ini adalah topik terbaru dari artikel yang diunggah</p>
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
<!-- Tombol Pagination -->
<div class="pagination-container">
    <ul class="pagination">
        <?php 
        $total_pages = ceil($total_konten / $limit);  // Menghitung jumlah total halaman
        $current_page = ($offset / $limit) + 1;  // Menghitung halaman saat ini
        ?>

        <!-- Tombol Previous -->
        <?php if ($current_page > 1): ?>
            <li class="page-item"><a class="page-link" href="<?= site_url('welcome/index/'.($offset - $limit)) ?>">Previous</a></li>
        <?php else: ?>
            <li class="page-item disabled"><span class="page-link">Previous</span></li>
        <?php endif; ?>

        <!-- Tombol Halaman -->
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?= ($i == $current_page) ? 'active' : '' ?>">
                <a class="page-link" href="<?= site_url('welcome/index/'.(($i - 1) * $limit)) ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>

        <!-- Tombol Next -->
        <?php if ($current_page < $total_pages): ?>
            <li class="page-item"><a class="page-link" href="<?= site_url('welcome/index/'.($offset + $limit)) ?>">Next</a></li>
        <?php else: ?>
            <li class="page-item disabled"><span class="page-link">Next</span></li>
        <?php endif; ?>
    </ul>
		</div>

					
		</div>					
			</section>
			<!-- End travel Area -->
			
			
			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget">
								<h6>Kategori</h6>
								<ul class="footer-nav">
								<?php foreach ($kategori as $kate) { ?>
                           		 <li>
                                <a href="<?= base_url('welcome/kategori/'.$kate['id_kategori'])?>"><?= $kate['nama_kategori']?></a>
                           		 </li>
								
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
<!-- Konten HTML -->

			
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