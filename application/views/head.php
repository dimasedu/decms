<!DOCTYPE HTML>
<html>
	<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/datepicker3.css" rel="stylesheet">
	<title><?php echo $this->config->item('app_name');?></title>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-datepicker3.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.number.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/highcharts.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/tinymce/tinymce.min.js"></script>
  
      <style type="text/css">
        body{ padding: 70px 0px; }
      </style>
      <script type="text/javascript">
 
        window.setTimeout(function(){
        $("#pesan").fadeOut(800,0).slideUp(800, function(){
         $(this).remove();
        })
      }, 2000);

        window.setTimeout(function(){
        $("#termin").slideUp(800,0).fadeOut(1000, function(){
         $(this).remove();
        })
      }, 5000);
        
      </script>
      
      <style type="text/css">

.dropdown-submenu {
    position: relative;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}
      </style>
	
	</head>
	<body>
  <div id="status-msg"></div>
	<div class="navbar navbar-default navbar-fixed-top">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="<?php echo site_url();?>/depan" class="navbar-brand"><img src="<?php echo base_url();?>assets/img/logo.png" width="32"> DE-CMS</a>        </div>
        <div class="navbar-collapse collapse navbar-inverse-collapse">
          <ul class="nav navbar-nav">
              <li class="active"> <a href="<?php echo site_url();?>/depan"><i class="glyphicon glyphicon-home"></i>&nbsp;&nbsp;Home</a></li>
              

              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-tags"></i>&nbsp;&nbsp;Pages<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li> <?php echo anchor('adminpage','<i class="glyphicon glyphicon-tags"></i>&nbsp;&nbsp;All Page');?></li>
                <li> <?php echo anchor('adminpage/addpage','<i class="glyphicon glyphicon-tags"></i>&nbsp;&nbsp;Add New');?></li>
              </ul>
              </li>                                   
                
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-book"></i>&nbsp;&nbsp;Posts<b class="caret"></b></a>
              <ul class="dropdown-menu">
                
                <li> <?php echo anchor('admincategory','<i class="glyphicon glyphicon-tags"></i>&nbsp;&nbsp;Category');?></li>
                <li class="divider"></li>
                <li> <?php echo anchor('adminpost','<i class="glyphicon glyphicon-tags"></i>&nbsp;&nbsp;All Post');?></li>
                <li> <?php echo anchor('adminpost/addpost','<i class="glyphicon glyphicon-tags"></i>&nbsp;&nbsp;Add New');?></li>
                
              </ul>
              </li>

              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-picture"></i>&nbsp;&nbsp;Media<b class="caret"></b></a>
              <ul class="dropdown-menu">
                
                <li> <?php echo anchor('adminmedia','<i class="glyphicon glyphicon-picture"></i>&nbsp;&nbsp;Media');?></li>
                
              </ul>
              </li>

              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;&nbsp;Modul<b class="caret"></b></a>
              <ul class="dropdown-menu">

                  <li> <?php echo anchor('modcomments','<i class="glyphicon glyphicon-list-alt"></i>&nbsp;&nbsp;Comment');?></li>
                  <li> <?php echo anchor('modslideshow','<i class="glyphicon glyphicon-list-alt"></i>&nbsp;&nbsp;Slideshow');?></li>
                  <li> <?php echo anchor('modgallery','<i class="glyphicon glyphicon-list-alt"></i>&nbsp;&nbsp;Gallery');?></li>
                  <li> <?php echo anchor('modproduk','<i class="glyphicon glyphicon-list-alt"></i>&nbsp;&nbsp;Produk');?></li>
              </ul>
              </li>     
                      

              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;User <b class="caret"></b></a>
              <ul class="dropdown-menu">
              <li> <a href="<?php echo site_url();?>/pengguna"><i class="glyphicon glyphicon-user"></i> Data Pengguna</a></li>
              </ul>
              </li>
                    
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-cog"></i>&nbsp;&nbsp;Setting <b class="caret"></b></a>
              <ul class="dropdown-menu">
              <li><a href="<?php echo site_url();?>/setting"><i class="glyphicon glyphicon-cog"></i> Site Setting</a></li>
              <li class="divider"></li>
              <li> <a href="<?php echo site_url();?>/adminmenu"><i class="glyphicon glyphicon-cog"></i> Manage Menu</a></li>
              <li class="divider"></li>
              <li> <a href="<?php echo site_url();?>/hddman/backup"><i class="glyphicon glyphicon-cog"></i> Backup Sistem</a></li>
              <li> <a href="<?php echo site_url();?>/hddman/restore"><i class="glyphicon glyphicon-cog"></i> Restore Sistem</a></li>

              </ul>
              </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Hai, <?php echo $this->session->userdata('namalengkap');?></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tools <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li> <a href="<?php echo site_url();?>/user/profil">Profil</a></li>
                <li> <a href="<?php echo site_url();?>/auth/logout">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
    </div>