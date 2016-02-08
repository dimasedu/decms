
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Aktivasi Software</title>
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
   
   
  <link rel="shortcut icon" href="<?php echo base_url();?>asset/ico/favicon.png">
  </head>

  <body>

    <div class="container" id="container">
      <form class="form-signin" action="<?php echo site_url();?>/install/proses" method="post">
      
        <fieldset>
          <legend><strong>Aktivasi Software</strong></legend>
        </fieldset>
         <?php
    echo validation_errors();
    ?>
        <div class="alert alert-warning"> Silahkan Aktivkan Kode Registrasi terlebih dahulu</div>
        <span class="label label-success">Aktivasi</span>
        <div class="well well-sm">
          <p>- Masukkan Nama Instansi serta Alamat pada kolom yang telah disediakan.</p>
          <p>- Kemudian tekan tombol <b>Get App ID</b></p>
          <p>- Kirimkan Nama Instansi berserta Alamat dan APP ID ke nomor <b>0857-134-80888</b> untuk memperoleh kode aktivasi.</p> 
        </div>
        <table class="table table-striped">
        <tr>
            <td>Nama Instansi</td>
            <td>:</td>
            <td><input type="text" class="form-control input-sm" name="nama" value="<?php echo $nama;?>" autocomplte="off" required>
          </tr>
          <tr>
            <td>Alamat Instansi</td>
            <td>:</td>
            <td><input type="text" class="form-control input-sm" name="alamat" value="<?php echo $alamat;?>" required> 
          </tr>
         
          <tr>
            <td>APP ID</td>
            <td>:</td>
            <td><input type="text" class="form-control input-sm" name="appid" readonly value="<?php echo $appid;?>" required> 
          </tr>
          <tr>
            <td>Kode Aktivasi</td>
            <td>:</td>
            <td><input type="text" class="form-control input-sm" name="regkey"> 
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td><input type="submit" name="genid" value="Get App ID" class="btn btn-primary">&nbsp;
            <input type="submit" name="aktiv" value="Aktivasi" class="btn btn-primary">
          </tr>
        </table>
        <hr>
        <p><?php echo $this->config->item('app_name');?> &copy; 2015<br>
        Powered by <b><?php echo anchor('http://desoftware.web.id','DE SOFTWARE');?></b></p>
        <small>Page rendered in <strong>{elapsed_time}</strong> seconds</small>
      </form>

     
    </div> <!-- /container -->


    

  </body>
</html>
