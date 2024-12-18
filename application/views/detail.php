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
                /* Style untuk kotak komentar */
.comment-box {
    border: 1px solid #ddd; /* Garis tepi */
    border-radius: 8px; /* Sudut melengkung */
    padding: 15px; /* Ruang dalam */
    margin-bottom: 20px; /* Jarak antar komentar */
    background-color: #f9f9f9; /* Warna latar belakang lembut */
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); /* Bayangan ringan */
}

/* Username */
.comment-box .username {
    font-size: 18px; /* Ukuran lebih besar */
    font-weight: bold; /* Teks tebal */
    color: #333; /* Warna teks */
    display: block; /* Agar username tetap berada di atas tanggal */
    margin-bottom: 5px; /* Jarak bawah */
}

/* Tanggal */
.comment-box .comment-date {
    font-size: 14px; /* Ukuran lebih kecil */
    color: #777; /* Warna teks abu-abu */
    margin-bottom: 10px; /* Jarak dengan isi komentar */
    display: block; /* Tampil di baris baru */
}

/* Isi komentar */
.comment-box .comment-content {
    font-size: 16px; /* Ukuran standar */
    color: #444; /* Warna teks */
    line-height: 1.5; /* Jarak antar baris */
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
						  </div>						
					</div>
				</nav>
			</header>
			<!-- End Header Area -->
		
<!-- Start post Area -->
<div class="post-wrapper pt-100">
    <!-- Start post Area -->
    <section class="post-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="single-page-post">
                        <img class="img-fluid" src="<?= base_url().'./tema/assets/images/'.$kontenn->foto?>" width="50%" alt="">
                        <div class="top-wrapper ">
                            <div class="row d-flex justify-content-between">
                                <h2 class="col-lg-8 col-md-12 text-uppercase">
                                   <?= $kontenn->judul;?>
                                </h2>
                                <div class="col-lg-4 col-md-12 right-side d-flex justify-content-end">
                                    <div class="desc">
                                        <h2><?= $kontenn->nama;?></h2>
                                        <h3><?= $kontenn->tanggal;?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tags">
                            <ul>
                                <li><a href="#"><?= $kontenn->nama_kategori;?></a></li>
                            </ul>
                        </div>
                        <div class="single-post-content">
                            <?php 
                            $paragraphs = explode("\n", $kontenn->isi_konten);
                            foreach ($paragraphs as $paragraph): 
                                if (trim($paragraph) != ''): // Pastikan tidak ada paragraf kosong
                            ?>
                                <p><?= $paragraph; ?></p>
                            <?php 
                                endif;
                            endforeach; 
                            ?>
                        </div>

                        
                        <!-- Start nav Area -->
                        <section class="nav-area pt-50 pb-100">
                            <div class="container">
                                <div class="row justify-content-between">
                                   <!-- Prev Post -->
<?php if (!empty($prev_post)): ?>
    <div class="col-sm-6 nav-left justify-content-start d-flex">
        <div class="thumb">
            <img src="<?= base_url('path/to/image/' . $prev_post->image) ?>" alt="">
        </div>
        <div class="details">
            <p>Prev Post</p>
            <h4 class="text-uppercase">
                <a href="<?= base_url('beranda/artikel/' . $prev_post->slug) ?>">
                    <?= $prev_post->judul ?>
                </a>
            </h4>
        </div>
    </div>
<?php endif; ?>


                                    <!-- Next Post -->
                                    <?php if (!empty($next_post)): ?>
                                        <div class="col-sm-6 nav-right justify-content-end d-flex">
                                            <div class="details">
                                                <p>Next Post</p>
                                                <h4 class="text-uppercase">
                                                    <a href="<?= base_url('welcome/artikel/' . $next_post->slug) ?>">
                                                        <?= $next_post->judul ?>
                                                    </a>
                                                </h4>
                                            </div>
                                            
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>    
                        </section>
                        <!-- End nav Area -->


                        <div class="container d-flex justify-content-between">
                            <!-- Section 1 -->
                            <section class="commentform-area pb-120 pt-80 mb-100">
                                <h5 class="text-uppercase pb-50">Leave a Reply</h5>
                                <form action="<?= base_url('beranda/tambah_komentar') ?>" method="post">
                                    <input type="hidden" name="id_konten" value="<?= $kontenn->id_konten ?>">
                                    <textarea class="form-control mb-10" name="isi_komen" placeholder="Comment" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Comment'" required=""></textarea>
                                    <input type="hidden" name="id" value="<?= $this->uri->segment(3, 0) ?>">
                                    <input name="username" placeholder="Enter your username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your username'" class="common-input mb-20 form-control" required="" type="text">
                                    <input type="submit" value="Komen" class="btn btn-primary">
                                </form>
                            </section>

                            <!-- Section 2 -->
                            <section class="saranform-area pb-120 pt-80 mb-100">
                                <h5 class="text-uppercase pb-50">Send a Suggestion</h5>
                                <form action="<?= base_url('welcome/tambah_saran') ?>" method="post">
                                    <textarea class="form-control mb-10" name="isi_saran" placeholder="Suggestion" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Suggestion'" required=""></textarea>
                                    <input type="hidden" name="id" value="<?= $this->uri->segment(3, 0) ?>">
                                    <input name="username" placeholder="Enter your username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your username'" class="common-input mb-20 form-control" required="" type="text">
                                    <input type="submit" value="Send" class="btn btn-primary">
                                </form>
                            </section>
                        </div>

                    
                    </div>
                </div>
               
                <div class="col-lg-4 sidebar-area ">
                    <div class="single_widget search_widget">
                        <div id="imaginary_container"> 
                        <form class="form-inline my-2 my-lg-0" action="<?= base_url('welcome/cari') ?>" method="GET">
                            <div class="input-group stylish-input-group">
                                <input type="search" class="form-control"  placeholder="Search" 
 
									name="keyword" 
                                >
                                <span class="input-group-addon">
                                    <button type="submit">
                                        <span class="lnr lnr-magnifier"></span>
                                    </button>  
                                </span>
                            </div>
                        </form>
                        </div> 
                    </div>

                    <div>
                       
                     <?php if (!empty($kontenn->audio_url)): ?>
                    <div class="youtube-player">
                        <iframe 
                            width="100%" 
                            height="166" 
                            src="https://www.youtube.com/embed/<?= $kontenn->audio_url ?>" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                    </div>
                    <?php endif; ?>
                        
                    </div>

                    <div>
                
<?php if (!empty($kontenn->audio)): ?>
    <div style="margin-top: 20px;">
        <h4>Putar Audio</h4>
        <audio controls>
            <source src="<?= base_url('tema/assets/audio/'.$kontenn->audio) ?>" type="audio/mpeg">
            Browser Anda tidak mendukung elemen audio.
        </audio>
        <br>
        <a href="<?= base_url('tema/assets/audio/'.$kontenn->audio) ?>" download>
            Download Audio
        </a>
    </div>
<?php else: ?>
    <p>Tidak ada audio untuk artikel ini.</p>
<?php endif; ?>


                     <?php if (!empty($kontenn->ost)): ?>
                    <div class="youtube-player">
                        <iframe 
                            width="100%" 
                            height="166" 
                            src="https://www.youtube.com/embed/<?= $kontenn->ost ?>" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                    </div>
                    <?php endif; ?>
                        
                    </div>

                   
                    <div class="single_widget cat_widget">
                        <h4 class="text-uppercase pb-20">post categories</h4>
                        
                        <ul>
                        <?php foreach ($kategori as $kate) { ?>
                            <li>
                                <a href="<?= base_url('welcome/kategori/'.$kate['id_kategori'])?>"><?= $kate['nama_kategori']?></a>
                            </li>
                        <?php } ?>                           
                        </ul>
                    </div>

                    <h2 class="text-uppercase">Replay : </h2>
                    <?php foreach ($komen as $ko) { ?>
                        <div class="single_widget about_widget comment-box">
                            <strong class="username"><?= htmlspecialchars($ko['username']); ?></strong>
                            <div class="comment-date"><?= $ko['tanggal']; ?></div>
                            <p class="comment-content"><?= nl2br(htmlspecialchars($ko['isi_komen'])); ?></p>
                        </div>
                    <?php } ?>
                     
                </div>
            </div>
        </div>    
    </section>
    <!-- End post Area -->  
</div>
<!-- End post Area -->

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