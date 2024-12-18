
<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
    <div id="menghilang">
      <?php echo $this->session->flashdata('alert', true);?>
    </div>
    <a href="<?= site_url('video/tambah')?>"><button>Tambah Konten</button>

	<div class="row">
	 <div class="col-12 col-lg-12">
	   <div class="card">
	     <div class="card-header">Konten
		  <div class="card-action">
             <div class="dropdown">
             <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
              <i class="icon-options"></i>
             </a>
              <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="javascript:void();">Action</a>
              <a class="dropdown-item" href="javascript:void();">Another action</a>
              <a class="dropdown-item" href="javascript:void();">Something else here</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="javascript:void();">Separated link</a>
               </div>
              </div>
             </div>
		 </div>
	       <div class="table-responsive">
                 <table class="table align-items-center table-flush table-borderless">
                  <thead>
                   <tr>
                   <th>Judul</th>
                    <th>Foto</th>
           <th>Kategori</th>
                     <th>Aksi</th>
                   </tr>
                   </thead>

                   <?php foreach($video as $tonton): ?>

                   <tbody>
                    <tr>
                    <td><?=$tonton['judul']?></td>
                <td><img src="<?= base_url().'./tema/assets/images/video/'.$tonton['foto']?>" width="100px" alt=""></td>
                <td value="<?= $tonton['id_kategori']?>"><?= $tonton['nama_kategori']?></td>
                    <td>
                    <a class="btn btn-sm btn-warning" href="<?= site_url('video/edit/'.$tonton['id_video'])?>"><i class="fa fa-edit"></i>
                    |
                    <a class="btn btn-sm btn-danger" onClick="return confirm('Apakah kamu sungguh ingin menghapusnya')"
                     href="<?= site_url('video/hapus/'.$tonton['id_video'])?>"><i class="fa fa-trash"></i>
                    </td>
                   </tr>

                 </tbody>
                   <?php endforeach;?>
                </table>
               </div>

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