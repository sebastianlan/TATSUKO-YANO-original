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


function addAttach(){
	var index = $('.attachrow').size();
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
}

function delOldAttach(id,obj){
	var str = $('#delattach').val();
	//ajax delete
	if(str == ''){
		$('#delattach').val(id);
	}else{
		$('#delattach').val(str+','+id);
	}
	$(obj).parents('.attachrow').remove();
}

function delAttach(obj){
	$(obj).parents('.attachrow').remove();
}
</script>

<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/index')?>">Home</a></li>
	<li><a href="javascript:void(0);">Product</a></li>
	<li><a href="<?php echo site_url('product/ls')?>">Product list</a></li>
	<li class="active">Edit product</li>
</ol>
<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('product/edit/'.$productid);?>" method="post">
	<input type="hidden" id="delattach" name="delattach" value="" />
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label"><span class="required">*</span>Product name</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" placeholder="" name="name" required value="<?=$product['name']?>"/>
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">Keywords(SEO)</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" placeholder="Can multiple , seperate keywords with comma ." form=""  name="keywords" value="<?=$product['keywords']?>"/>
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
	<div class="form-group">
		<label class="col-sm-2 control-label"><span class="required">*</span>Explain</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" placeholder="Such as : 10% interest rate" name="earn_type" required value="<?=$product['earn_type']?>"/>
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
	<?php 
	foreach ($productearn as $k=>$v){
		?>
		<div class="form-group investrow">
			<label class="col-sm-2 control-label <?=$k!=0?'sr-only':''?>"><span class="required">*</span>Earnings</label>
			<div class="col-sm-2">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Time limit" name="mydeadline[]" required value="<?=$v['time']?>"/>
					<div class="input-group-addon">months</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Price" name="mymoney[]" required value="<?=$v['money']?>"/>
					<div class="input-group-addon">thousand yuan</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Interest rate" name="myearn[]" required value="<?=$v['earn']?>"/>
					<div class="input-group-addon">%</div>
				</div>
			</div>
			<?php 
			if($k == 0){
				?>
				<div class="col-sm-2">
					<button type="button" class="btn btn-success" onclick="addInvest()"><i class="fa fa-plus"></i> Add</button>
				</div>
				<?php
			}else{
				?>
				<div class="col-sm-2">
					<button type="button" class="btn btn-danger" onclick="delInvest(this)"><i class="fa fa-times"></i> Delete</button>
				</div>
				<?php
			}
			?>
			
		</div>
		<?php
	}
	?>
	
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
		<label class="col-sm-2 control-label"><span class="required">*</span>Intro</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" placeholder="Buy Buy Buy" name="product_desc" required value="<?=$product['product_desc']?>"/>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Basic information</label>
		<div class="col-sm-8">
			<textarea rows="6" cols="80" id="product_baseinfo" name="product_baseinfo" required><?=$product['product_baseinfo']?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Details</label>
		<div class="col-sm-8">
			<textarea rows="6" cols="80" id="product_detail" name="product_detail" required><?=$product['product_detail']?></textarea>
		</div>
	</div>
	
	
	<?php 
	if(empty($productattach)){
		?>
		<div class="form-group attachrow">
			<label class="col-sm-2 control-label">Product file</label>
			<div class="col-sm-4">
				<input type="file" class="form-control" form=""  name="attach_0"/>
			</div>
			<div class="col-sm-2">
				<button type="button" class="btn btn-success" onclick="addAttach()"><i class="fa fa-plus"></i> Add</button>
			</div>
		</div>
		<?php
	}else{
		foreach ($productattach as $k=>$v){
			?>
				<div class="form-group attachrow">
					<label class="col-sm-2 control-label <?=$k!=0?'sr-only':''?>">Product file</label>
					<div class="col-sm-4">
						<input type="file" class="form-control" name="attach_<?=$k?>"/>
					</div>
					<div class="col-sm-2">
						<p class="form-control-static"><a href="<?php echo base_url($v['filepath']);?>"><?php echo $v['filename']?></a></p>
					</div>
					<?php 
					if($k==0){
						?>
						<div class="col-sm-2">
							<button type="button" class="btn btn-success" onclick="addAttach()"><i class="fa fa-plus"></i> Add</button>
						</div>
						<?php
					}else{
						?>
						<div class="col-sm-2">
							<button type="button" class="btn btn-danger" onclick="delOldAttach('<?=$v['id']?>',this)"><i class="fa fa-times"></i> Delete</button>
						</div>
						<?php
					}
					?>
					
				</div>
				<?php
			}
	}
	
	?>
	
	
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