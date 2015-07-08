<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/index')?>">Home</a></li>
	<li><a href="javascript:void(0);">Partner</a></li>
	<li><a href="<?php echo site_url('group/ls')?>">Partner list</a></li>
	<li class="active">Edit partner</li>
</ol>
<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('group/edit/'.$groupid);?>" method="post">
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label"><span class="required">*</span>Name</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" placeholder="" name="name" required value="<?=$group['name']?>"/>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label"><span class="required">*</span>Category</label>
		<div class="col-sm-4">
			<select class="form-control" name="cateid" required>
				<?php
				foreach ( $groupcate as $k => $v ) {
					?>
					<option value="<?=$v['id']?>" <?php echo $group['cateid']==$v['id']?'selected="selected"':'';?>><?=$v['name']?></option>
					<?php
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label"><span class="required">*</span>Logo</label>
		<div class="col-sm-4">
			<input type="file" class="form-control" name="logo"/>
			<p>Proposal&nbsp;:&nbsp;163x53&nbsp;px</p>
		</div>
		<div class="col-sm-4">
			<img src="<?php echo base_url($group['logo']);?>" style="border: 1px solid #ccc;" width="163" height="53"/>
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">Order</label>
		<div class="col-sm-1">
			<input type="text" class="form-control" placeholder="" name="listorder" value="<?=$group['listorder']?>" />
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-2">
			<div class="checkbox">
				<label> <input type="checkbox" <?php echo $group['isvalid']==1?'checked="checked"':'';?> name="isvalid">&nbsp;Online </label>
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
