<div class="container">
<div class="row">
	<div class="col-lg-12 col-sm-12 col-xs-12">
		
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="glyphicon glyphicon-list-alt"></i> <b>Add Menu</b></div>
				<div class="panel-body">
				<?php echo $this->session->flashdata('pesan');?>
				<?php echo form_open('adminmenu/adddetail/'.$this->uri->segment(3));?>
					<table class="table table-striped table-condensed">
						<tr>
							<th>Display Name</th>
							<th>:</th>
							<td>
								<?php echo form_error('displayname');?>
								<?php echo form_input(array(
									'name'=>'displayname',
									'id'=>'displayname',
									'class'=>'form-control input-sm',
									'value'=>set_value('displayname'),
									'autofocus'=>'autofocus'
								));?>
							</td>
						</tr>

						<tr>
							<th>Type</th>
							<th>:</th>
							<td>
							<div class="row">
								<div class="col-lg-3 col-md-3 col-xs-3">
									<input type="radio" name="menutype" id="menutype" value="page" required> Pages
								</div>
								<div class="col-lg-8 col-md-8 col-xs-8">
									<select name="pages" id="pages" class="form-control input-sm">
										<?php
											foreach($pages as $page):
												echo '<option value="'.$page->id.'|'.$page->page_title.'">'.$page->page_title.'</option>';
											endforeach;
										?>										
									</select>
								</div>
							</div>	
							<br>
							<div class="row">
								<div class="col-lg-3 col-md-3 col-xs-3">
									<input type="radio" name="menutype" id="menutype" value="category" required> Categories
								</div>
								<div class="col-lg-8 col-md-8 col-xs-8">
									<select name="category" id="category" class="form-control input-sm">
										<?php
											foreach($categories as $cat):
												echo '<option value="'.$cat->id.'|'.$cat->slug.'">'.$cat->category_name.'</option>';
											endforeach;
										?>										
									</select>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-3 col-md-3 col-xs-3">
									<input type="radio" name="menutype" id="menutype" value="link" required> Link
								</div>
								<div class="col-lg-8 col-md-8 col-xs-8">
									
									<?php echo form_input(array(
										'name'=>'urllink',
										'id'=>'urllink',
										'class'=>'form-control input-sm',
										'placeholder'=>'http://www.domain.com'
									));?>
								</div>
							</div>	
							</td>
						</tr>

						<tr>
							<th>Menu Parent</th>
							<th>:</th>
							<td>
								<select name="parent" id="parent" class="form-control input-sm">
									<option value="0">--Choose Parent--</option>
									<?php
										foreach($parents as $parent):
											echo '<option value="'.$parent->id.'">'.$parent->menu_name.'</option>';
										endforeach;
									?>										
								</select>
							</td>
						</tr>

						<tr>
							<th colspan="3">
							<button type="submit" name="simpan" id="simpan" class="btn btn-info">
								<i class="glyphicon glyphicon-saved"></i> Save Menu
							</button>
							<?php
								echo anchor('adminmenu/edit/'.$this->uri->segment(3),'<i class="glyphicon glyphicon-backward"></i> Back',array(
									'class'=>'btn btn-warning'
									));
							?>
							</th>
						</tr>
					</table>
					

				<?php echo form_close();?>

				</div>
			</div>
	</div>
	</div>
</div>			