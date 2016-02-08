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
                if(!empty($galleries)){
                foreach($galleries as $row):
            ?>
            <a href="<?php echo base_url('uploads/'.$row->image_file);?>">
                <img 
                    src="<?php echo base_url('uploads/'.$row->image_file);?>",
                    data-big="<?php echo base_url('uploads/'.$row->image_file);?>"
                    data-title="<?php echo $row->image_title;?>"
                    data-description="<?php echo $row->image_description;?>"
                >
            </a>

            <?php
            endforeach;
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