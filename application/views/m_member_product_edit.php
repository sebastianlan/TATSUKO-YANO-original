<script src="<?php echo base_url('static/my97datepicker/WdatePicker.js');?>"></script>

<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/index')?>">Home</a></li>
	<li><a href="<?php echo site_url('member/ls')?>">Member</a></li>
	<li><a href="<?php echo site_url('member/buylist/'.$member_id)?>">Purchased products list</a></li>
	<li class="active">Edit purchased product</li>
</ol>
<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('member/editbuy/'.$tplid.'/'.$member_id);?>" method="post">
	<?php
	if ($member ['nickname'] != '') {
	?>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">Name</label>
		<div class="col-sm-8">
			<p class="form-control-static"><?php echo $member['nickname']?></p>
		</div>
	</div>
	<?php
	}
	?>
	
	<?php
	if ($member ['mobile'] != '') {
		?>
		<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">Mobile No</label>
		<div class="col-sm-8">
			<p class="form-control-static"><?php echo $member['mobile']?></p>
		</div>
	</div>
		<?php
	}
	?>
	
	<?php
	if ($member ['idcard'] != '') {
		?>
		<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">ID card No</label>
		<div class="col-sm-8">
			<p class="form-control-static"><?php echo $member['idcard']?></p>
		</div>
	</div>
		<?php
	}
	?>
	<div class="form-group">
		<label class="col-sm-2 control-label"><span class="required">*</span>Product Name</label>
		<div class="col-sm-4">
			<select class="form-control" id="product_id" name="product_id" required>
				<?php
				foreach ( $productlist as $k => $v ) {
					?>
					<option value="<?=$v['id']?>" <?php echo $v['id']==$mp['product_id']?'selected="selected"':'';?>><?=$v['name']?></option>
					<?php
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label"><span class="required">*</span>Template name</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" placeholder="" name="tplname" id="tplname"value="<?=$mp['tplname']?>" />
		</div>
	</div>
	
	<script type="text/javascript">
		$('#product_id').change(function(){
			$('#tplname').val($('#product_id>option[value='+$(this).val()+']').html());
		});
		//$('#product_id').change();
	</script>

	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label"><span class="required">*</span>Payment method</label>
		<div class="col-sm-4">
			<select class="form-control" name="type" required>
				<?php
				foreach ( $eran_time as $k => $v ) {
					?>
					<option value="<?=$k?>" <?php echo $k==$mp['type']?'selected="selected"':'';?>><?=$v?></option>
					<?php
				}
				?>
			</select>
		</div>
	</div>

	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label"><span class="required">*</span>Purchase Date</label>
		<div class="col-sm-4">
			<div class="input-group">
				<div class="input-group">
				<input type="text" class="form-control" placeholder="" onclick="WdatePicker()" value="<?=date('Y-m-d',$mp['buytime'])?>" name="buytime" required />
			</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label"><span class="required">*</span>Price</label>
		<div class="col-sm-2">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="" name="buymoney" required value="<?=$mp['buymoney']?>"/>
				<div class="input-group-addon">yuan</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label"><span class="required">*</span>Interest rate</label>
		<div class="col-sm-2">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="" name="earn" required value="<?=$mp['earn']?>"/>
				<div class="input-group-addon">%</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label"><span class="required">*</span>Time limit</label>
		<div class="col-sm-2">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="" name="overtime" required value="<?=$mp['overtime']?>"/>
				<div class="input-group-addon">months</div>
			</div>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-info">Submit</button>
			<button type="button" class="btn btn-default" onclick="javascript:history.go(-1);">Go back</button>
		</div>
	</div>
</form>
