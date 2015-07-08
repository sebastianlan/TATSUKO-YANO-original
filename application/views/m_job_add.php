<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/index')?>">Home</a></li>
	<li><a href="<?php echo site_url('job/ls')?>">Job</a></li>
	<li class="active">Add job</li>
</ol>
<form class="form-horizontal" action="<?php echo site_url('job/add');?>" method="post">
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label"><span class="required">*</span>Position</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" placeholder="" name="title" required />
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label"><span class="required">*</span>Location</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" placeholder="" name="area" required />
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
		<label class="col-sm-2 control-label">Details</label>
		<div class="col-sm-8">
			<textarea id="contentbox" name="content"></textarea>
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">Order</label>
		<div class="col-sm-1">
			<input type="text" class="form-control" placeholder="" name="listorder" value="0" />
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-2">
			<div class="checkbox">
				<label> <input type="checkbox" checked="checked" name="isvalid">&nbsp;Online </label>
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
    var ue = UE.getEditor('contentbox');
</script>
