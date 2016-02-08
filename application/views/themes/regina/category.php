<section id="portfolio" style="margin-top:90px;">
	<div class="row">
		<div class="container">
			<div class="section-header">
		        <h2 class="section-title wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown; text-align:left; margin-bottom:-5px; text-transform: capitalize; font-size:25px;">Posts of <?php echo $cat_name;?> &raquo;</h2>
		    </div>

		    <?php
		    	if(!empty($categories)){

		    		foreach($categories as $row):
		    			?>
		    			<div class="bs-callout bs-callout-info" id="callout-glyphicons-empty-only">
						    <h4><?php echo anchor(site_url().'/post/'.$row->id.'-'.url_title($row->post_title,"_",TRUE),$row->post_title);?></h4>
						    <i class="glyphicon glyphicon-time"></i> <span class="label label-info"><?php echo date('d-m-Y H:i:s', strtotime($row->input_date));?></span>&nbsp;&nbsp;
						    <i class="glyphicon glyphicon-user"></i> <span class="label label-info">Administrator</span>
						    <p>
						    <?php
						    	$text = str_replace("<p>", "", $row->post_text);
						    	$text = str_replace("</p>", "", $row->post_text);
						    	$cuplikan = word_limiter($text, 40);

						    	echo $cuplikan;
						    ?></p>
						</div>
		    			<?php
		    		endforeach;

		    	}
		    ?>
	</div>
</section>