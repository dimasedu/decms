<?php

class Reginalib{
	
	function __construct()
	{
		$this->CI =& get_instance();
	}


	function show_menu()
	{
		$this->CI->db->select('menu_head.id, menu_detail.*');
		$this->CI->db->join('menu_head','menu_head.id = menu_detail.menu_head_id');
		$this->CI->db->order_by('menu_detail.menu_order','ASC');
		$query = $this->CI->db->get_where('menu_detail', array('menu_detail.menu_parent'=>0, 'menu_head.default_menu'=>1))->result();

		if(!empty($query)){

			foreach($query as $row):
				if($this->has_child($row->id) == TRUE){
					?>
					<li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $row->menu_name;?><b class="caret"></b></a>
		              <ul class="dropdown-menu">
		              	<?php echo $this->get_menu_child($row->id);?>
		              </ul>
		            </li>
				<?php
				}else{
					echo '<li>'.anchor($row->menu_link, $row->menu_name).'</li>';
				}
			endforeach;

		}
	}


	function show_menu_nissan()
	{
		$this->CI->db->select('menu_head.id, menu_detail.*');
		$this->CI->db->join('menu_head','menu_head.id = menu_detail.menu_head_id');
		$this->CI->db->order_by('menu_detail.menu_order','ASC');
		$query = $this->CI->db->get_where('menu_detail', array('menu_detail.menu_parent'=>0, 'menu_head.default_menu'=>1))->result();

		if(!empty($query)){

			foreach($query as $row):

				if($this->has_child($row->id) == TRUE){
					?>
					

					<li id="nav-menu-item-<?php echo $row->id;?>" class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children ">
                        <a href="#" class="menu-link main-menu-link"><?php echo $row->menu_name;?></a>
                            <?php
                            	//if($row->menu_type == "category"){


                            		?>
                            		<div class="subnav-container">
		                                <ul class="subnav-menu">

		                                <?php
		                                	$qchild = $this->CI->db->get_where('menu_detail', array('menu_parent'=>$row->id))->result();

		                                	if(!empty($qchild)){

		                                		foreach($qchild as $rowchild):
		                                ?>
			                                <li id="nav-menu-item-<?php echo $row->id;?>" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-taxonomy menu-item-object-category menu-category-7  current"><a href="#" class="menu-link sub-menu-link"><?php echo $rowchild->menu_name;?></a>

				                                <div class="subnav-posts">

				                                <?php
				                                	$ex = explode("/", $rowchild->menu_link);
				                                	$catchild = $ex[1];

				                                	/*$this->CI->db->select('post_category.id, post.*');
													$this->CI->db->join('post_category','post_category.id = post.category_id');
													$this->CI->db->order_by('post.id','ASC');

													$qpost = $this->CI->db->get_where('post',array('post_category.slug'=>$catchild))->result();
													*/

													$qpost = $this->CI->db->get_where('mod_produk',array('produk_cat'=>$catchild))->result();
													
													foreach($qpost as $rowpost):
				                                	?>
					                                <!-- start:article-->
								                    <article class="linkbox large text-center">
								                        <a href="<?php echo site_url('modproduk/show/'.$rowpost->id.'/'.url_title($rowpost->produk_title,'-',TRUE).'.html');?>">
								                            <div class="thumb-wrap">
								                            	<span class="bttrlazyloading-wrapper bttrlazyloading-loaded">
								                            	<canvas class="bttrlazyloading-clone" width="100" height="100" style="display: none;"></canvas>
								                            	<img itemprop="image" class="bttrlazyloading img-responsive animated fadeIn" data-bttrlazyloading-md-src="<?php echo $rowpost->produk_image1;?>" width="190" height="140" alt="<?php echo $rowpost->produk_image1;?>" style="display: block;" src="<?php echo $rowpost->produk_image1;?>"></span>
								                            </div>
								                            <h3><?php echo $rowpost->produk_title;?></h3>
								                        </a>
								                        
								                    </article>
								                    <!-- end:article-->
								                    <?php
								                    	endforeach;
								                    ?>

							                    </div>
						                    </li>
					                    <?php 
					                    	endforeach;
					                    }
					                    ?>
										</ul>
									</div>

									
					</li>
				<?php
				}else{
					?>
					<li id="nav-menu-item-<?php echo $row->id;?>" class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page page_item page-item-116 current_page_item ">
                        
                        <?php echo anchor($row->menu_link, $row->menu_name, array('class'=>'menu-link main-menu-link','title'=>$row->menu_name));?>
                    </li>
					<?php
					//echo '<li>'.anchor($row->menu_link, $row->menu_name).'</li>';
				}
			endforeach;

		}
	}


	function show_menu_mobile()
	{
		echo '<nav id="mobile-menu" class="mm-menu mm-horizontal mm-offcanvas mm-front mm-hassearch">
				<ul id="menu-main-menu" class="nav clearfix mm-list mm-panel mm-opened mm-current">
				<li id="mobile-nav-menu-item-0" class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-0 current_page_item "><a title="Homepage" href="'.site_url().'">Home</a></li>';
		$this->CI->db->select('menu_head.id, menu_detail.*');
		$this->CI->db->join('menu_head','menu_head.id = menu_detail.menu_head_id');
		$this->CI->db->order_by('menu_detail.menu_order','ASC');
		$query = $this->CI->db->get_where('menu_detail', array('menu_detail.menu_parent'=>0, 'menu_head.default_menu'=>1))->result();

		if(!empty($query)){

			$no = 0;
			foreach($query as $row):
				$no++;
				if($this->has_child($row->id) == TRUE){	

					?>
					<li id="mobile-nav-menu-item-<?php echo $row->id;?>" class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children "><a class="mm-subopen" href="#mm-<?php echo $row->id;?>"></a><a href="#"><?php echo $row->menu_name;?></a>
					</li>

					<ul class="sub-menu mm-list mm-panel mm-hidden" id="mm-<?php echo $row->id;?>"><li class="mm-subtitle"><a class="mm-subclose" href="#menu-main-menu"><?php echo $row->menu_name;?></a></li>

    					<?php
                        	$qchild = $this->CI->db->get_where('menu_detail', array('menu_parent'=>$row->id))->result();

                        	if(!empty($qchild)){

                        		foreach($qchild as $rowchild):
                        			
                        			$ex = explode("/", $rowchild->menu_link);
                                	$catchild = $ex[1];

									$qpost = $this->CI->db->get_where('mod_produk',array('produk_cat'=>$catchild))->result();
									
									foreach($qpost as $rowpost):
										?>
										 <li id="mobile-nav-menu-item-<?php echo $rowpost->id;?>" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-taxonomy menu-item-object-category menu-category-7 "><a href="<?php echo site_url('modproduk/show/'.$rowpost->id.'/'.url_title($rowpost->produk_title,'-',TRUE).'.html');?>"><?php echo $rowpost->produk_title;?></a></li>
										<?php
									endforeach;

                        		endforeach;
                        	}	
                        ?>
   	
					</ul>
				<?php



				}else{
					?>
					<li id="mobile-nav-menu-item-<?php echo $row->id;?>" class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item current_page_item ">
					<?php echo anchor($row->menu_link, $row->menu_name, array('title'=>$row->menu_name));?></li>
					
					<?php
				}
			endforeach;

		}

		echo '</ul>';
		echo '</nav>';
	}


	function show_other_articles($id="")
	{

		$this->CI->db->select('post_category.id, post.*');
		$this->CI->db->join('post_category','post_category.id = post.category_id');
		$this->CI->db->order_by('post.id','ASC');

		if(!empty($id) || $id <> "")
		{
			$this->CI->db->where('post.id <>', $id);
		}

		$query = $this->CI->db->get_where('post',array('post_category.slug'=>'artikel'))->result();

		if(!empty($query)){
			$no = 0;
			foreach($query as $row):
				$no++;
				echo '<a href="'.site_url('home/post/'.$row->id.'/'.url_title($row->post_title,'-', TRUE).'.html').'" class="list-group-item">'.$row->post_title.'</a>';
			endforeach;
		}
		
	}


	function show_services()
	{
		$this->CI->db->select('post_category.id, post.*');
		$this->CI->db->join('post_category','post_category.id = post.category_id');
		$this->CI->db->order_by('post.id','ASC');

		$query = $this->CI->db->get_where('post',array('post_category.slug'=>'fasilitas'))->result();

		if(!empty($query)){
			foreach($query as $row):
			?>
			<div class="portfolio-item designing isotope-item" style="position: relative; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px);">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive img-rounded" src="<?php echo base_url();?>uploads/<?php echo $row->featimage;?>" alt="">
                        <div class="portfolio-info"> 
                            <a class="preview" href="<?php echo base_url();?>uploads/<?php echo $row->featimage;?>" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                    <p><b><?php echo $row->post_title;?></b></p>
                    <?php echo $row->post_text;?>
                </div><!--/.portfolio-item-->
			<?php
			endforeach;
		}
	}


	function show_artikel()
	{
		$this->CI->db->select('post_category.category_name, post_category.slug, post.*');
		$this->CI->db->join('post_category','post_category.id = post.category_id');
		$this->CI->db->order_by('post.id','ASC');

		$query = $this->CI->db->get_where('post',array('post_category.slug'=>'artikel'))->result();

		if(!empty($query)){
			foreach($query as $row):
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
	}


	function get_menu_child($parent, $level=1)
	{
		$query = $this->CI->db->get_where('menu_detail', array('menu_detail.menu_parent'=>$parent))->result();

		if(!empty($query)){

			foreach($query as $row):
				echo '<li>'.anchor($row->menu_link, $row->menu_name).'</li>';
			endforeach;

		}
	}


	


	function has_child($id)
	{
		$query = $this->CI->db->get_where('menu_detail', array('menu_parent'=>$id));

		if($query->num_rows() <> 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}


	function show_populer($jml=5)
	{
		$this->CI->db->order_by('hit','DESC');
		$this->CI->db->limit($jml);
		$query = $this->CI->db->get('post')->result();


		if(!empty($query)){
			?>
			<table class="table table-striped table-responsive">
			<?php
			foreach($query as $row):
				echo '<tr><td><span class="badge">'.$row->hit.'</span><br>Reads</td><td>';
				echo '<a href="'.site_url('home/post/'.$row->id.'/'.url_title($row->post_title,'-', TRUE).'.html').'">'.$row->post_title.'</a>';
				
				echo '</td></tr>';
			endforeach;
			?>
			</table>
			<?php
		}
	}

//end of class	
}