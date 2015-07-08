<link rel="stylesheet" href="<?php echo base_url('static/datepicker/bootstrap-datetimepicker.min.css');?>">
<script src="<?php echo base_url('static/datepicker/bootstrap-datetimepicker.min.js');?>"></script>

<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/index')?>">Home</a></li>
	<li><a href="javascript:void(0);">Product</a></li>
	<li><a href="<?php echo site_url('product/ls')?>">Product list</a></li>
	<li class="active">Edit product</li>
</ol>
<form class="form-horizontal" action="<?php echo site_url('product/edit/'.$productid);?>" method="post">
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label"><span class="required">*</span>Product name</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" placeholder="" name="name" required value="<?=$product['name']?>"/>
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">Keywords(SEO)</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" placeholder="Can multiple , seperate keywords with comma ." name="keywords" value="<?=$product['keywords']?>"/>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Description(SEO)</label>
		<div class="col-sm-8">
			<textarea rows="6" cols="80" name="desc"><?=$product['desc']?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label"><span class="required">*</span>Category</label>
		<div class="col-sm-4">
			<select class="form-control" name="cateid">
				<?php
				foreach ( $pcate as $k => $v ) {
					?>
					<option value="<?=$v['id']?>" <?php echo $product['cateid']==$v['id']?'selected="selected"':'';?>><?=$v['name']?></option>
					<?php
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label"><span class="required">*</span>Partner</label>
		<div class="col-sm-4">
			<select class="form-control" name="group_id">
				<?php
				foreach ( $group as $k => $v ) {
					?>
					<option value="<?=$v['id']?>" <?php echo $product['group_id']==$v['id']?'selected="selected"':'';?>><?=$v['name']?></option>
					<?php
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label"><span class="required">*</span>Issue time</label>
		<div class="col-sm-4">
			<div class="input-group">
				<div id="datetimepicker" class="input-append">
					<input data-format="yyyy-MM-dd" type="text" name="faxing_time" value="<?=date('Y-m-d',$product['faxing_time'])?>"></input> <span class="add-on"> <i class="fa fa-calendar" style="font-size: 1.3em;"> </i>
					</span>
				</div>
			</div>
			<script type="text/javascript">
    			$('#datetimepicker').datetimepicker({
      				pickTime: false
    			});
			</script>
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label"><span class="required">*</span>Interest rate</label>
		<div class="col-sm-2">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Min interest rate" name="earn_min" value="<?=$product['earn_min']?>"/>
				<div class="input-group-addon">%</div>
			</div>
		</div>
		<div class="col-sm-1" style="width: 40px; line-height: 30px;">
			<p> -- </p>
		</div>
		<div class="col-sm-2">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Max interest rate" name="earn_max" value="<?=$product['earn_max']?>"/>
				<div class="input-group-addon">%</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label"><span class="required">*</span>Time limit</label>
		<div class="col-sm-2">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="" name="deadline" required value="<?=$product['deadline']?>"/>
				<div class="input-group-addon">months</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label"><span class="required">*</span>Purchase starting point</label>
		<div class="col-sm-2">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="" name="buy_min" required value="<?=$product['buy_min']?>"/>
				<div class="input-group-addon">thousand yuan</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label"><span class="required">*</span>Price</label>
		<div class="col-sm-2">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="" name="total_money" required value="<?=$product['total_money']?>" />
				<div class="input-group-addon">thousand yuan</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label"><span class="required">*</span>Investment area</label>
		<div class="col-sm-2">
			<select class="form-control" name="invest_id">
				<?php
				foreach ( $invest as $k => $v ) {
					?>
					<option value="<?=$k?>" <?php echo $product['invest_id']==$k?'selected="selected"':'';?>><?=$v?></option>
					<?php
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label"><span class="required">*</span>Earnings allocation</label>
		<div class="col-sm-2">
			<select class="form-control" name="earn_time">
				<?php
				foreach ( $earn_time as $k => $v ) {
					?>
					<option value="<?=$k?>" <?php echo $product['earn_time']==$k?'selected="selected"':'';?>><?=$v?></option>
					<?php
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label"><span class="required">*</span>Earnings type</label>
		<div class="col-sm-2">
			<select class="form-control" name="earn_type">
				<?php
				foreach ( $earn_type as $k => $v ) {
					?>
					<option value="<?=$k?>" <?php echo $product['earn_type']==$k?'selected="selected"':'';?>><?=$v?></option>
					<?php
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Use</label>
		<div class="col-sm-8">
			<textarea rows="6" cols="80" name="invest_way"><?=$product['invest_way']?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Earnings description</label>
		<div class="col-sm-8">
			<textarea rows="6" cols="80" name="earn_desc"><?=$product['earn_desc']?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Measure</label>
		<div class="col-sm-8">
			<textarea rows="6" cols="80" name="way"><?=$product['way']?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Remark</label>
		<div class="col-sm-8">
			<textarea rows="6" cols="80" name="remark"><?=$product['remark']?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label"><span class="required">*</span>Status</label>
		<div class="col-sm-2">
			<select class="form-control" name="status">
				<?php
				foreach ( $status as $k => $v ) {
					?>
					<option value="<?=$k?>" <?php echo $product['status']==$k?'selected="selected"':'';?>><?=$v?></option>
					<?php
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">Order</label>
		<div class="col-sm-1">
			<input type="text" class="form-control" placeholder="" name="listorder" value="<?=$product['listorder']?>" />
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-info">Submit</button>
			<button type="button" class="btn btn-default" onclick="javascript:history.go(-1);">Go back</button>
		</div>
	</div>
</form>
