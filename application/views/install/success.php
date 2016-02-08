
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Aktivasi Aplikasi Laporan BOS 15</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 600px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
   
                                   <link rel="shortcut icon" href="<?php echo base_url();?>asset/ico/favicon.png">
  </head>

  <body>

    <div class="container" id="container">
      <form class="form-signin" action="<?php echo site_url();?>keygen/getkey" method="post">
      
        <fieldset>
          <legend><strong>Aktivasi Aplikasi Laporan BOS 15</strong></legend>
        </fieldset>
         <div class="alert alert-success"><b>Sukses!</b> Selamat Kode aktivasi berhasil.</div>
        
       <?php echo anchor('auth/login', 'Lanjutkan ke Aplikasi', array('class'=>'btn btn-primary'));?>
      </form>

    </div> <!-- /container -->

    

  </body>
</html>
