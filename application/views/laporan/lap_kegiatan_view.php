<div class="container">
    <div class="col-lg-12 col-md-12 col-xs-12">
		 
    	<div class="panel panel-primary">
    		<div class="panel-heading"><i class="glyphicon glyphicon-book"></i>&nbsp;&nbsp;<b>Laporan Perkembangan Kegiatan</b></div>
    		<div class="panel-body">
            <?php echo form_open('laporan/kegiatan');?>
    			<table class="table table-striped">
    				<tr>
    					<th width="10%">Tahun Anggaran</th>
    					<th width="1%">:</th>
    					<th width="45%">
                        <select name="tahun" class="form-control">
                        <?php
                            $now = date('Y');
                            for($i=2015; $i<=2020; $i++):
                                
                                if($now == $i){
                                    $select = 'selected="selected"';
                                }else{
                                    $select = '';
                                }

                                echo '<option '.$select.'>'.$i.'</option>';
                            endfor;
                        ?>
                        </select></th>
    				</tr>
    				<tr>
    					<th width="10%">Sampai Bulan</th>
    					<th width="1%">:</th>
    					<th width="45%">
                        <select name="bulan" class="form-control">
                        <?php
                            echo $this->fungsiku->option_bulan();
                        ?>
                        </select></th>
    				</tr>

    				<tr>
    					<th width="10%">&nbsp;</th>
    					<th width="1%">&nbsp;</th>
    					<th width="45%"><?php echo form_submit(array('name'=>'proses','value'=>'Proses Laporan','class'=>'btn btn-success'));?></th>
    				</tr>

    			</table>
                <?php echo form_close();?>
    		</div>
    	</div>
    </div>
</div>    		