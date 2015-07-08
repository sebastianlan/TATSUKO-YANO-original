<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/index')?>">Home</a></li>
	<li><a href="javascript:void(0);">Administrator</a></li>
	<li class="active">Edit password</li>
</ol>
<form class="form-horizontal" action="<?php echo site_url('admin/editPwd');?>" method="post">
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label"><span class="required">*</span>Current password</label>
		<div class="col-sm-8">
			<input type="password" class="form-control" placeholder="" name="password1" required />
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label"><span class="required">*</span>Password</label>
		<div class="col-sm-8">
			<input type="password" class="form-control" placeholder="" name="password2" required />
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label"><span class="required">*</span>Confirm password</label>
		<div class="col-sm-8">
			<input type="password" class="form-control" placeholder="" name="password3" required />
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-info">Update</button>
		</div>
	</div>
</form>
