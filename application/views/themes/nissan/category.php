<div class="container">
    <!-- start:page content -->
    <div id="page-content" class="right-sidebar has-breaking-news">

    <div class="article">
        <div class="row">
            <div class="col-xs-12 col-md-8 col-lg-8">
                
            	<header>
					<h2 itemprop="name">Category : <?php echo ucwords($cat_name);?></h2>
					<span class="borderline"></span>
				</header>

                <?php if(!empty($categories)){
					foreach($categories as $row):
					?>
						<div class="col-sm-4">
						<!-- start:article -->
			            <article class="thumb thumb-lay-two cat-5" itemscope="" itemtype="http://schema.org/Article">
			                <div class="thumb-wrap relative">
			                    <a itemprop="url" href="<?php echo site_url('home/post/'.$row->id.'/'.url_title($row->post_title,'-',TRUE));?>"><span class="bttrlazyloading-wrapper bttrlazyloading-loaded">
			                    <canvas class="bttrlazyloading-clone" width="100" height="100" style="display: none;"></canvas>
			                    <img itemprop="image" class="bttrlazyloading img-responsive animated fadeIn" data-bttrlazyloading-md-src="<?php echo base_url();?>uploads/<?php echo $row->featimage;?>" width="237" height="143" alt="<?php echo $row->post_title;?>" style="display: block;" src="<?php echo base_url();?>uploads/<?php echo $row->featimage;?>"></span></a>
			                    <a href="<?php echo site_url('home/category/'.$row->slug);?>" class="theme"><?php echo $row->category_name;?></a>
			                </div>
			                <span class="published" itemprop="dateCreated"><?php echo date('d F Y', strtotime($row->input_date));?></span>                    
			                <h3 itemprop="name"><a itemprop="url" href="<?php echo site_url('home/post/'.$row->id.'/'.url_title($row->post_title,'-',TRUE));?>"><?php echo $row->post_title;?></a></h3>
			            </article>
			            <!-- end:article -->
		            </div>
		                    
					<?php
					endforeach;
				}

				?>


			</div>

			<div class="col-xs-12 col-md-4 col-lg-4">
				
				<header><h2>CONTACT US</h2><span class="borderline"></span></header>
	           <table class="table table-responsive">
	             <tr>
	               <th colspan="2" class="info"> Hotline</th>
	              
	             </tr>
	             <tr>
	               <th><i class="glyphicon glyphicon-phone-alt"></i>
	               <b>0283-352727</b></th>
	             </tr>
	             <tr>
	               <th><i class="glyphicon glyphicon-phone"></i> <b>0819-1152-2112</b></th>
	             </tr>
	             <tr>
	               <th><i class="glyphicon glyphicon-phone"></i> <b>0858-4219-5679</b></th>
	             </tr>

	             <tr>
	               <th><i class="glyphicon glyphicon-phone"></i> <b>0852-2633-9917</b></th>
	             </tr>

	             <tr>
	               <th colspan="2" class="info"> Address</th>
	              
	             </tr>

	              <tr>
	               <th><i class="glyphicon glyphicon-home"></i> <b>Jalan Kol. Soegiono 147 Kota Tegal - Jawa Tengah</b></th>
	             </tr>


	           </table>
	           <span class="borderline"></span>

	           
	                     <header><h2>OUR LOCATION</h2><span class="borderline"></span></header>
	                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.1824788966856!2d109.1195540144155!3d-6.8687251691126265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xf6608e4de67f062f!2sNissan!5e0!3m2!1sid!2sid!4v1453581859607" width="360" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	        
	          <span class="borderline"></span>
				
				<header><h2>ARTIKEL LAINNYA</h2><span class="borderline"></span></header>
				<div class="list-group">
				  
				  
				  <?php echo $this->reginalib->show_other_articles();?>
				  
				</div>
				<span class="borderline"></span>

			</div>

       
            </div>


            </div>
            
        </div>
    </div>



<!-- #======================================================= -->

