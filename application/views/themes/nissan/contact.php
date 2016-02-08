<div class="container">
    <!-- start:page content -->
    <div id="page-content" class="right-sidebar has-breaking-news">

    <div class="article">
        <div class="row">
            <div class="col-xs-12 col-md-8 col-lg-8">
                
            	<header>
					<h2 itemprop="name">Contact Us</h2>
					<span class="borderline"></span>
				</header>

				<div class="well well-sm">
					Silahkan gunakan form berikut untuk menghubungi kami.
				</div>

				<?php
					echo $this->session->flashdata('pesan');
				?>

				<?php
					echo form_open('home/contactsend');
				?>

				<div class="form-group">
					<label for="nama">Nama Lengkap</label>
					<?php
						echo form_input(array(
							'name'=>'nama',
							'id'=>'nama',
							'class'=>'form-control input-sm',
							'required'=>'required'
							));
					?>
				</div>

				<div class="form-group">
					<label for="nama">Email</label>
					<?php
						echo form_input(array(
							'name'=>'email',
							'id'=>'email',
							'class'=>'form-control input-sm',
							'required'=>'required',
							'type'=>'email'
							));
					?>
				</div>

				<div class="form-group">
					<label for="nama">No. Telp / HP</label>
					<?php
						echo form_input(array(
							'name'=>'telp',
							'id'=>'telp',
							'class'=>'form-control input-sm',
							'required'=>'required'
							));
					?>
				</div>

				<div class="form-group">
					<label for="nama">Pesan Anda</label>
					<?php
						echo form_textarea(array(
							'name'=>'pesan',
							'id'=>'pesan',
							'class'=>'form-control input-sm',
							'required'=>'required',
							'rows'=>5
							));
					?>
				</div>

				<button class="btn btn-success" name="kirim" id="kirim">
					<i class="glyphicon glyphicon-ok"></i> Kirim Pesan
				</button>

				<?php
					echo form_close();
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

