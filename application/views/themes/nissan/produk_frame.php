<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Galleria Classic Theme</title>
        <style>

            /* Demo styles */
            html,body{background:#222;margin:0;}
            body{border-top:4px solid #000;}
            .content{color:#777;font:12px/1.4 "helvetica neue",arial,sans-serif;width:700px;margin:20px auto;}
            h1{font-size:12px;font-weight:normal;color:#ddd;margin:0;}
            p{margin:0 0 20px}
            a {color:#22BCB9;text-decoration:none;}
            .cred{margin-top:20px;font-size:11px;}

            /* This rule is read by Galleria to define the gallery height: */
            #galleria{height:450px}

        </style>

        <!-- load jQuery -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>

        <!-- load Galleria -->
        <script src="<?php echo base_url();?>3rdparty/galleria/galleria-1.4.2.min.js"></script>

    </head>
<body>
    <div class="content">
        <!-- Adding gallery images. We use resized thumbnails here for better performance, but it’s not necessary -->

        <div id="galleria">
           
           <?php
            if(!empty($query->produk_image1)){
                ?>
                 <a href="<?php echo $query->produk_image1;?>">
                    <img 
                        src="<?php echo $query->produk_image1;?>",
                        data-big="<?php echo $query->produk_image1;?>">
                </a>
                <?php
            }
           ?>


           <?php
            if(!empty($query->produk_image2)){
                ?>
                 <a href="<?php echo $query->produk_image2;?>">
                    <img 
                        src="<?php echo $query->produk_image2;?>",
                        data-big="<?php echo $query->produk_image2;?>">
                </a>
                <?php
            }
           ?>

           <?php
            if(!empty($query->produk_image3)){
                ?>
                 <a href="<?php echo $query->produk_image3;?>">
                    <img 
                        src="<?php echo $query->produk_image3;?>",
                        data-big="<?php echo $query->produk_image3;?>">
                </a>
                <?php
            }
           ?>

           <?php
            if(!empty($query->produk_image4)){
                ?>
                 <a href="<?php echo $query->produk_image4;?>">
                    <img 
                        src="<?php echo $query->produk_image4;?>",
                        data-big="<?php echo $query->produk_image4;?>">
                </a>
                <?php
            }
           ?>


           <?php
            if(!empty($query->produk_image5)){
                ?>
                 <a href="<?php echo $query->produk_image5;?>">
                    <img 
                        src="<?php echo $query->produk_image5;?>",
                        data-big="<?php echo $query->produk_image5;?>">
                </a>
                <?php
            }
           ?>

           <?php
            if(!empty($query->produk_image6)){
                ?>
                 <a href="<?php echo $query->produk_image6;?>">
                    <img 
                        src="<?php echo $query->produk_image6;?>",
                        data-big="<?php echo $query->produk_image6;?>">
                </a>
                <?php
            }
           ?>

           <?php
            if(!empty($query->produk_image7)){
                ?>
                 <a href="<?php echo $query->produk_image7;?>">
                    <img 
                        src="<?php echo $query->produk_image7;?>",
                        data-big="<?php echo $query->produk_image7;?>">
                </a>
                <?php
            }
           ?>

           <?php
            if(!empty($query->produk_image8)){
                ?>
                 <a href="<?php echo $query->produk_image8;?>">
                    <img 
                        src="<?php echo $query->produk_image8;?>",
                        data-big="<?php echo $query->produk_image8;?>">
                </a>
                <?php
            }
           ?>

            
            
        </div>
   </div>

    <script>

    // Load the classic theme
    Galleria.loadTheme('<?php echo base_url();?>3rdparty/galleria/galleria.classic.min.js');

    // Initialize Galleria
    Galleria.run('#galleria',{

        autoplay : 4000,
        transition : 'fade',
        transitionSpeed : 2000
    });

    </script>
    </body>
</html>