<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
   
    <div class="row mt-3">
      <div class="col-lg-6">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Tambah Caraousel</div>
           <hr>
           <?= form_open_multipart('caraousel/simpan'); ?>
           <input type="hidden" name="id_caraousel " value="<?= $this->uri->segment(3,0)?>">

           <div class="form-group">
            <label for="input-1">Judul</label>
            <input type="text" class="form-control" id="input-1" placeholder="judul" name="judul">
           </div>
           
           <div class="form-group">
            <label for="input-4">Foto</label>
            <input type="file" class="form-control" id="input-4" name="foto">
           </div>
           
           <div class="form-group">
            <button type="submit" class="btn btn-light px-5"><i class="icon-lock"></i> Tambah</button>
          </div>
          </form>
         </div>
         </div>
      </div>
   
    <div class="table-responsive">
                 <table class="table align-items-center table-flush table-borderless">
                  <thead>
                   <tr>
                     <th>Judul</th>
                    
                     <th>Foto</th>
                     <th>Aksi</th>
                   </tr>
                   </thead>

                   <?php foreach($caraousel as $konten) { ?>

                   <tbody>
                    <tr>
                    <td><?= $konten['judul']; ?></td>
                   
                    <td><img src="<?= base_url().'./tema/assets/images/caraousel/'.$konten['foto']?>" width="200px" alt=""></td>
                    <td>
                  
                    <a class="btn btn-sm btn-danger" onClick="return confirm('Apakah kamu sungguh ingin menghapusnya')"
                     href="<?= site_url('caraousel/hapus/'.$konten['id_caraousel'])?>"><i class="fa fa-trash"></i>
                    </td>
                   </tr>

                 </tbody>
                   <?php } ?>
                </table>
               </div>




<!--start overlay-->
<div class="overlay toggle-menu"></div>
		<!--end overlay-->
		
    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->