<?php
	if(!empty($page->featimage)){
		$margin = '';
		?>
		<section id="portfolio">
		<div class="row">
			<img src="<?php echo base_url();?>uploads/<?php echo $page->featimage;?>" height="450" width="1500" class="image-responsive">
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
		        <h2 class="section-title wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown; text-align:left; margin-bottom:-5px;"><?php echo $page->page_title;?></h2>
		        <p class="wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"><?php echo $page->page_body;?></p>
		   	</div>
		</div>
	</div>
</section>