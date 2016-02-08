<section id="portfolio" style="margin-top:90px;">
	<div class="row">
		<div class="container">
			<div class="section-header">
		        <h2 class="section-title wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown; text-align:left; margin-bottom:-5px;">Galleries</h2>
		    </div>

		   	<?php
		   		if(!empty($galleries)){
		   			foreach($galleries as $row):
		   				?>
		   				<div class="portfolio-item designing isotope-item" style="position: relative; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px);">
		                    
		                    
		                    <div class="portfolio-item-inner">
		                        <img class="img-responsive img-rounded" src="<?php echo base_url();?>uploads/<?php echo $row->image_file;?>" alt="">
		                        <div class="portfolio-info"> 
		                            <a class="preview" href="<?php echo base_url();?>uploads/<?php echo $row->image_file;?>" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
		                        	
		                        </div>
		                    	
		                    </div>
		                    <h4 class="section-title wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"><b><?php echo $row->image_title;?></b></h4>
		                    <p class="wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"><?php echo $row->image_description;?></p>
		                    
		                </div><!--/.portfolio-item-->
		   				<?php
		   			endforeach;
		   		}
		   	?>
		</div>
	</div>
</section>
