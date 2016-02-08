<?php

class Decmslib {

	var $CI;

	function __construct()
	{
		$this->CI =& get_instance();
	}


	function menu_child($parent, $level=1)
	{
		$query = $this->CI->db->get_where('menu_detail', array('menu_parent'=>$parent))->result();

		if(!empty($query)){

			foreach($query as $row):
			echo form_hidden('menuid[]',$row->id);
			?>
			<tr>
				<td><?php echo $row->menu_name;?></td>
				<td><?php 
					if($row->menu_type == "link"){
						echo $row->menu_link;
					}else{
						echo site_url().'/'.$row->menu_link;
					}
				?></td>
				<td><?php echo form_input(array('value'=>$row->menu_order,'name'=>'menuorder[]','class'=>'form-control input-sm', 'style'=>'width:50px;'));?></td>
				<td>
				<?php echo anchor('adminmenu/deletedetail/'.$row->id,'Delete', array(
					'class'=>'btn btn-sm btn-danger'
				));?>
				</td>
			</tr>
			<?php
			$this->menu_child($row->id, $level+1);
			endforeach;
		}
	}

        
//end of class	
}