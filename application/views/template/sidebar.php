
<?php
$menu = $this->uri->segment(1); 
?>
<body class="bg-theme bg-theme1">
 
<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="<?php echo base_url(); ?>">
       <img src="<?php echo base_url('');?>tema/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        <?php if ($this->session->userdata('username') && $this->session->userdata('level') != 'user') { ?>
       <h5 class="logo-text"><?= $this->session->userdata('nama')?></h5>
       <span><?= $this->session->userdata('level')?></span>
       <?php } ?>
      
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      <li>
        <a href="<?= site_url('home')?>" class="nav-item nav-link <?php if($menu=='home'){ echo 'active'; }?>">
          <i ></i> <span>Dashboard</span>
        </a>
      </li>

      <li>
        <a href="<?= site_url('caraousel')?>" class="nav-item nav-link">
          <i class="zmdi zmdi-invert-colors"></i> <span>Caraousel</span>
        </a>
      </li>

      <li>
        <a href="<?= site_url('kategori')?>" class="nav-item nav-link">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>Kategori Konten</span>
        </a>
      </li>

      <li>
        <a href="<?= site_url('konten')?>" class="nav-item nav-link">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>Konten</span>
        </a>
      </li>

      <li>
        <a href="<?= site_url('video')?>" class="nav-item nav-link">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>Video</span>
        </a>
      </li>

      <li>
      <?php  if($this->session->userdata('level')=='admin'){ ?> 
      <a href="<?= site_url('user/user1')?>" class="nav-item nav-link <?php if($menu=='user'){ echo 'active'; }?>">
          <i class="zmdi zmdi-grid"></i> <span>User</span>
          </a>
          <?php }?>
      </li>
     
      <li>
      <?php  if($this->session->userdata('level')=='admin'){ ?> 
        <a href="<?= site_url('konfigurasi')?>" class="nav-item nav-link">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>Konfigurasi</span>
        </a>
        <?php }?>
      </li>
    </ul>
   
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class="fa fa-envelope-open-o"></i></a>
    </li>
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class="fa fa-bell-o"></i></a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title"><?= $this->session->userdata('nama')?></h6>
            
            </div>
           </div>
          </a>
        </li>
        
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
        <li class="dropdown-divider"></li>
        <a href="<?= base_url('auth/logout')?>"><li class="dropdown-item"><i class="icon-power mr-2"></i> Logout</li></a>
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->