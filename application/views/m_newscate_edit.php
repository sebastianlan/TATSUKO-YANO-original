<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/index')?>">Home</a></li>
	<li><a href="javascript:void(0);">News</a></li>
	<li><a href="<?php echo site_url('news/lsCate')?>">Category list</a></li>
	<li class="active">Edit category</li>
</ol>
<form class="form-horizontal" action="<?php echo site_url('news/editCate/'.$newscateid);?>" method="post">
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label"><span class="required">*</span>Category name</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" placeholder="Category name" name="name" required value="<?=$newscate['name']?>"/>
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">Order</label>
		<div class="col-sm-1">
			<input type="text" class="form-control" placeholder="" name="listorder" value="<?=$newscate['listorder']?>" />
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-2">
			<div class="checkbox">
				<label> <input type="checkbox" <?php echo $newscate['isvalid']==1?'checked="checked"':'';?> name="isvalid">&nbsp;Available </label>
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
