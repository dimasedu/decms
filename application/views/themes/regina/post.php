<?php
	if(!empty($post->featimage)){
		$margin = '';
		?>
		<section id="portfolio">
		<div class="row">
			<img src="<?php echo base_url();?>uploads/<?php echo $post->featimage;?>" height="450" width="1500" class="image-responsive">
		</div>
		</section>
		<?php
	}else{
		$margin = 'style="margin-top:90px;';
	}
?>
<section id="portfolio" <?php echo $margin;?>>
	<div class="row">
		<div class="container">
			<div class="section-header">
		        <h2 class="section-title wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown; text-align:left; margin-bottom:-5px;"><?php echo $post->post_title;?></h2>
		        <i class="glyphicon glyphicon-time"></i> <span class="label label-info"><?php echo date('d-m-Y H:i:s', strtotime($post->input_date));?></span>&nbsp;&nbsp;
				<i class="glyphicon glyphicon-user"></i> <span class="label label-info">Administrator</span>
						    
		   	</div>

		   	<p class="wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown; margin-top:15px;">
		   	<?php echo $post->post_text;?>
		   	</p>
		</div>
	</div>
</section>