<script type="text/javascript">
function addInvest(){
	var html = '';
	html += '<div class="form-group investrow">';
	html += '	<div class="col-sm-2"><label class="col-sm-2 control-label sr-only">Earnings</label></div>';
	html += '	<div class="col-sm-2">';
	html += '		<div class="input-group">';
	html += '			<input type="text" class="form-control" placeholder="Time limit"';
	html += '				name="mydeadline[]" required />';
	html += '			<div class="input-group-addon">months</div>';
	html += '		</div>';
	html += '	</div>';
	html += '	<div class="col-sm-2">';
	html += '		<div class="input-group">';
	html += '			<input type="text" class="form-control" placeholder="Price"';
	html += '				name="mymoney[]" required />';
	html += '		<div class="input-group-addon">thousand yuan</div>';
	html += '		</div>';
	html += '	</div>';
	html += '	<div class="col-sm-2">';
	html += '		<div class="input-group">';
	html += '			<input type="text" class="form-control" placeholder="Interest rate"';
	html += '				name="myearn[]" required />';
	html += '			<div class="input-group-addon">%</div>';
	html += '		</div>';
	html += '	</div>';
	html += '	<div class="col-sm-2">';
	html += '		<button type="button" class="btn btn-danger"';
	html += '			onclick="delInvest(this)"><i class="fa fa-times"></i> Delete</button>';
	html += '	</div>';
	html += '</div>';
	$('.investrow:last').after($(html));
}

function delInvest(obj){
	$(obj).parents('.investrow').remove();
}


var index = 1;
function addAttach(){
	var html ='';
	html += '<div class="form-group attachrow">';
	html += '	<label class="col-sm-2 control-label sr-only">Product file</label>';
	html += '	<div class="col-sm-4">';
	html += '		<input type="file" class="form-control"';
	html += '			name="attach_'+index+'"/>';
	html += '	</div>';
	html += '	<div class="col-sm-2">';
	html += '		<button type="button" class="btn btn-danger"';
	html += '			onclick="delAttach(this)"><i class="fa fa-times"></i> Delete</button>';
	html += '	</div>';
	html += '</div>';
	$('.attachrow:last').after($(html));
	index++;
}

function delAttach(obj){
	$(obj).parents('.attachrow').remove();
}
</script>

<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/index')?>">Home</a></li>
	<li><a href="javascript:void(0);">Product</a></li>
	<li><a href="<?php echo site_url('product/ls')?>">Product list</a></li>
	<li class="active">Add product</li>
</ol>
<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('product/add');?>" method="post">
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label"><span class="required">*</span>Product name</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" placeholder="" name="name" required />
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">Keywords(SEO)</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" placeholder="Can multiple , seperate keywords with comma ." name="keywords" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Description(SEO)</label>
		<div class="col-sm-8">
			<textarea rows="6" cols="80" name="desc"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label"><span class="required">*</span>Category</label>
		<div class="col-sm-4">
			<select class="form-control" name="cateid">
				<?php
				foreach ( $pcate as $k => $v ) {
					?>
					<option value="<?=$v['id']?>"><?=$v['name']?></option>
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
					<option value="<?=$v['id']?>"><?=$v['name']?></option>
					<?php
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label"><span class="required">*</span>Explain</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" placeholder="Such as : 10% interest rate" name="earn_type" required />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label"><span class="required">*</span>Time limit</label>
		<div class="col-sm-2">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="" name="deadline" required />
				<div class="input-group-addon">months</div>
			</div>
		</div>
	</div>
	<div class="form-group investrow">
		<label class="col-sm-2 control-label"><span class="required">*</span>Earnings</label>
		<div class="col-sm-2">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Time limit" name="mydeadline[]" required />
				<div class="input-group-addon">months</div>
			</div>
		</div>
		<div class="col-sm-2">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Price" name="mymoney[]" required />
				<div class="input-group-addon">thousand yuan</div>
			</div>
		</div>
		<div class="col-sm-2">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Interest rate" name="myearn[]" required />
				<div class="input-group-addon">%</div>
			</div>
		</div>
		<div class="col-sm-2">
			<button type="button" class="btn btn-success" onclick="addInvest()"><i class="fa fa-plus"></i> Add</button>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-2 control-label"><span class="required">*</span>Purchase starting point</label>
		<div class="col-sm-2">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="" name="buy_min" required />
				<div class="input-group-addon">thousand yuan</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label"><span class="required">*</span>Intro</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" placeholder="Buy Buy Buy" name="product_desc" required />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Basic information</label>
		<div class="col-sm-8">
			<textarea rows="6" cols="80" id="product_baseinfo" name="product_baseinfo" required></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Details</label>
		<div class="col-sm-8">
			<textarea rows="6" cols="80" id="product_detail" name="product_detail" required></textarea>
		</div>
	</div>
	<!-- file start -->
	<div class="form-group attachrow">
		<label class="col-sm-2 control-label">Product file</label>
		<div class="col-sm-4">
			<input type="file" class="form-control" name="attach_0"/>
		</div>
		<div class="col-sm-2">
			<button type="button" class="btn btn-success" onclick="addAttach()"><i class="fa fa-plus"></i> Add</button>
		</div>
	</div>
	<!-- file end -->
	<div class="form-group">
		<label class="col-sm-2 control-label"><span class="required">*</span>Status</label>
		<div class="col-sm-2">
			<select class="form-control" name="status">
				<?php
				foreach ( $status as $k => $v ) {
					?>
					<option value="<?=$k?>"><?=$v?></option>
					<?php
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">Order</label>
		<div class="col-sm-1">
			<input type="text" class="form-control" placeholder="" name="listorder" value="0" />
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-info">Submit</button>
			<button type="button" class="btn btn-default" onclick="javascript:history.go(-1);">Go back</button>
		</div>
	</div>
</form>
<!-- 配置文件 -->
<script type="text/javascript"
	src="<?php echo base_url('ueditor/ueditor.config.js');?>">
</script>
<!-- 编辑器源码文件 -->
<script type="text/javascript"
	src="<?php echo base_url('ueditor/ueditor.all.js');?>">
</script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue1 = UE.getEditor('product_baseinfo');
    var ue2 = UE.getEditor('product_detail');
</script>