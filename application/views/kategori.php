
<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
    <div id="menghilang">
      <?php echo $this->session->flashdata('alert', true);?>
    </div>

     <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambah Kategori
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <form action="<?= base_url('kategori/simpan')?>" method="post" >
      <div class="form-group">
            <label for="input-1">Nama Kategori</label>
            <input type="text" class="form-control" name="nama_kategori">
      </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>

	<div class="row">
	 <div class="col-12 col-lg-12">
	   <div class="card">
	     <div class="card-header">Recent Order Tables
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
                     <th>No</th>
                     <th>Nama Kategori Konten</th>
                     <th>Aksi</th>
                   </tr>
                   </thead>

                   <?php $no=1; foreach($categories as $kategori): ?>

                   <tbody><tr>
                    <td><?= $no++; ?></td>
                    <td><?= $kategori->nama_kategori; ?></td>
                    <td>
                    <a class="btn btn-sm btn-warning" href="<?= site_url('kategori/edit/'.$kategori->id_kategori)?>"><i class="fa fa-edit"></i>
                    |
                    <a class="btn btn-sm btn-danger" onClick="return confirm('Apakah kamu sungguh ingin menghapusnya')"
                     href="<?= site_url('kategori/hapus/'.$kategori->id_kategori)?>"><i class="fa fa-trash"></i>
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
