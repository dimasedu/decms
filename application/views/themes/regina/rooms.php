<section id="portfolio" style="margin-top:90px;">
	<div class="row">
		<div class="container">
			<div class="section-header">
		        <h2 class="section-title wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown; text-align:left; margin-bottom:-5px;">List of Rooms</h2>
		        <i class="glyphicon glyphicon-user"></i> <span class="label label-info" title="Published by Administrator">Administrator</span>
						    
		   	</div>

		   	<?php
		   		if(!empty($rooms)){
		   			foreach($rooms as $row):
		   				?>
		   				<div class="portfolio-item designing isotope-item" style="position: relative; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px);">
		                    <div class="portfolio-item-inner">
		                        <img class="img-responsive img-rounded" src="<?php echo base_url();?>uploads/<?php echo $row->featimage;?>" alt="">
		                        <div class="portfolio-info"> 
		                            <a class="preview" href="<?php echo base_url();?>uploads/<?php echo $row->featimage;?>" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
		                        </div>
		                    </div>
		                    <p><b><?php echo $row->nama_kamar;?></b></p>
		                    <?php echo $row->deskripsi;?>
		                    <ul class="iconfacility">
		                    	<li><a href="#" data-toggle="tooltip" data-placement="top" title="<?php echo $row->bed_desc;?>"><img src="<?php echo base_url();?>uploads/iconkamar/kamar.png" /> </a></li>
								<li><a href="#" data-toggle="tooltip" data-placement="top" title="<?php echo $row->area;?> M2"><img src="<?php echo base_url();?>uploads/iconkamar/ukuran.png" /> </a></li>
								

								<?php if($row->ac == 1):?>
								
								<li><a href="#" data-toggle="tooltip" data-placement="top" title="Full AC"><img src="<?php echo base_url();?>uploads/iconkamar/iconrooms_full-ac.png" /> </a></li>
								<?php
								endif;
								?>


								<?php if($row->wifi == 1):?>
								
								<li><a href="#" data-toggle="tooltip" data-placement="top" title="Wifi Gratis"><img src="<?php echo base_url();?>uploads/iconkamar/iconrooms2.png" /> </a></li>
								<?php
								endif;
								?>

								<?php if($row->telpon == 1):?>
								
								<li><a href="#" data-toggle="tooltip" data-placement="top" title="Akses Telpon International"><img src="<?php echo base_url();?>uploads/iconkamar/iconrooms3.png" /> </a></li>
								<?php
								endif;
								?>

								<?php if($row->deposit == 1):?>
								
								<li><a href="#" data-toggle="tooltip" data-placement="top" title="Safe Deposit Box"><img src="<?php echo base_url();?>uploads/iconkamar/iconrooms4.png" /> </a></li>
								<?php
								endif;
								?>

								<?php if($row->lcd == 1):?>
								
								<li><a href="#" data-toggle="tooltip" data-placement="top" title="TV LCD 32 Inch"><img src="<?php echo base_url();?>uploads/iconkamar/iconrooms6.png" /> </a></li>
								<?php
								endif;
								?>

								<?php if($row->teh == 1):?>
								
								<li><a href="#" data-toggle="tooltip" data-placement="top" title="Fasilitas Teh dan Kopi"><img src="<?php echo base_url();?>uploads/iconkamar/iconrooms7.png" /> </a></li>
								<?php
								endif;
								?>

								<?php if($row->hair == 1):?>
								
								<li><a href="#" data-toggle="tooltip" data-placement="top" title="Hair Dryer"><img src="<?php echo base_url();?>uploads/iconkamar/iconrooms8.png" /> </a></li>
								<?php
								endif;
								?>

								<?php if($row->shower == 1):?>
								
								<li><a href="#" data-toggle="tooltip" data-placement="top" title="Kamar Mandi dengan Shower"><img src="<?php echo base_url();?>uploads/iconkamar/iconrooms9.png" /> </a></li>
								<?php
								endif;
								?>

								<?php if($row->mejakerja == 1):?>
								
								<li><a href="#" data-toggle="tooltip" data-placement="top" title="Meja Kerja"><img src="<?php echo base_url();?>uploads/iconkamar/mejakerja.png" /> </a></li>
								<?php
								endif;
								?>

								<?php if($row->mineral == 1):?>
								
								<li><a href="#" data-toggle="tooltip" data-placement="top" title="Air Mineral"><img src="<?php echo base_url();?>uploads/iconkamar/airmineral.png" /> </a></li>
								<?php
								endif;
								?>

								<?php if($row->rokok == 1):?>
								
								<li><a href="#" data-toggle="tooltip" data-placement="top" title="No Smoking Area"><img src="<?php echo base_url();?>uploads/iconkamar/nosmoking.png" /> </a></li>
								<?php
								endif;
								?>

								
							</ul>
		                </div><!--/.portfolio-item-->
		   				<?php
		   			endforeach;
		   		}
		   	?>
		</div>
	</div>
</section>
