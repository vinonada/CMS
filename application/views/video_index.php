<html lang="en" class="no-js">
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
    .title-center{
        text-align: center;
        margin-top: 20px;
    margin-bottom: 20px;
    }           
/* Container utama yang mengatur gambar dan video */
.content-container {
    margin-bottom: 20px;
    display: flex;
    align-items: center; /* Menjaga konten sejajar secara vertikal */
    justify-content: space-between; /* Gambar di kiri dan video di kanan */
    gap: 5px; /* Jarak minimal */
    padding: 10px;
    border: 1px solid #ddd; /* Garis tepi untuk kontainer */
    border-radius: 10px; /* Membuat sudut kontainer melengkung */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Bagian gambar */
.left-content img {
   margin-left: 90px;
    width: 300px; /* Lebar gambar */
    height: auto;
    border-radius: 10px; /* Membuat gambar melengkung */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Bagian video */
.right-content iframe {
    margin-right: 90px;
    width: 700px; /* Lebar video */
    height: 500px; /* Tinggi video */
    border-radius: 10px; /* Membuat sudut video melengkung */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Responsif untuk layar kecil */
@media (max-width: 768px) {
    .content-container {
        flex-direction: column; /* Tata letak vertikal */
        gap: 0px;
    }

    .left-content img,
    .right-content iframe {
        width: 90%; /* Lebar gambar dan video menyesuaikan layar */
        height: auto;
    }
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
<!-- Start post Area -->
<div class="post-wrapper pt-60">
    <!-- Start post Area -->
    <section class="post-area">
        <div class="container">
            <div class="row justify-content-center">
               
            </div>
        </div>    
    </section>
    <!-- End post Area -->  
</div>

 <?php foreach($video as $tonton): ?>
    <h2 class="title-center"><?=$tonton['judul']?></h2> <!-- Judul di tengah atas -->
<div class="content-container">

    <!-- Bagian Gambar -->
    <div class="left-content">
        <img src="<?= base_url().'./tema/assets/images/video/'.$tonton['foto']?>" alt="Gambar Potret">
    </div>
    
    <!-- Bagian Video -->
    <?php if (!empty($tonton['url'])): ?>
    <div class="right-content">
        <iframe 
            width="100%" 
            height="200" 
            src="https://www.youtube.com/embed/<?= $tonton['url'] ?>" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
            allowfullscreen>
        </iframe>
    </div>
    <?php endif; ?>
</div>
<?php endforeach; ?> 

</body>
</html>