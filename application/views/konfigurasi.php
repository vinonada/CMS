<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah user</title>
</head>
<body> 
    <form action="<?= base_url('konfigurasi/update')?>" method="post">
  
   
<div class="col-sm-12 col-xl-6">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Tambah Konfigurasi</h6>
       
        <div class="form-floating mb-3">
            <input type="text" class="form-control" 
                name = "judul_website" placeholder="judul" value="<?= $konfig->judul_website; ?>">
            <label for="floatingInput">Judul Website</label>
        </div>

        <div>
            <label for="">Profil</label>
            <p></p>
            <textarea name="profil_website" id="" cols="30" rows="10">
            <?= $konfig->profil_website; ?>
            </textarea>
        </div>
        <p></p>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" 
                name = "instagram" placeholder="judul" value="<?= $konfig->instagram; ?>">
            <label for="floatingInput">Instagram</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" 
                name = "facebook" placeholder="judul" value="<?= $konfig->facebook; ?>">
            <label for="floatingInput">Facebook</label>
        </div>

        <div class="form-floating mb-3">
            <input type="email" class="form-control" 
                name = "email" placeholder="judul" value="<?= $konfig->email; ?>">
            <label for="floatingInput">Email</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" 
                name = "alamat" placeholder="judul" value="<?= $konfig->alamat; ?>">
            <label for="floatingInput">Alamat</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" 
                name = "no_wa" placeholder="judul" value="<?= $konfig->no_wa; ?>">
            <label for="floatingInput">No WA</label>
        </div>
            <p></p>

            <input type="submit" value="tambah">
            <?php echo form_close();?>
        </div>
        
    </div>
</div>
    </form>
</body>
</html>

	   </div>
	 </div>
	</div><!--End Row-->
  
    <!--start overlay-->
    <div class="overlay toggle-menu"></div>
		<!--end overlay-->
		
    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
