<!DOCTYPE html>
<!-- saved from url=(0073) -->
<html lang="en" style="" class=" js no-touch csstransforms3d csstransitions csstransforms"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="DE SOFTWARE TEGAL">
    <title>REGINA HOTEL PEMALANG</title>
	<!-- core CSS -->
    <link href="<?php echo base_url();?>assets/themes/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/themes/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/themes/css/animate.min.css" rel="stylesheet"> 
    <link href="<?php echo base_url();?>assets/themes/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/themes/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/datepicker3.css" rel="stylesheet"> 
	
        <!--<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/themes/css/slider-style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/themes/css/slider-custom.css">
		<script type="text/javascript" src="<?php echo base_url();?>assets/themes/js/modernizr.custom.79639.js"></script>--> 
        <script src="<?php echo base_url();?>assets/themes/js/jquery.js"></script>
    <script src="<?php echo base_url();?>assets/themes/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-datepicker3.js"></script>        
        
        
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?php echo base_url();?>/uploads/<?php echo $set->logo;?>"> 
</head> 

<body id="home">
    <header id="header">
        
        <nav id="main-nav" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo site_url();?>"><img src="<?php echo base_url();?>/uploads/<?php echo $set->logo;?>" alt="logo" width="100"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                       <?php echo $this->reginalib->show_menu();?>                      
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->