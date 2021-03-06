<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/index')?>">Home</a></li>
	<li><a href="javascript:void(0);">Member</a></li>
	<li><a href="<?php echo site_url('member/ls')?>">Member list</a></li>
	<li class="active">Edit member</li>
</ol>
<form class="form-horizontal" action="<?php echo site_url('member/edit/'.$memberid);?>" method="post">
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">Name</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" placeholder="" name="nickname" value="<?php echo $member['nickname'];?>"/>
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label"><span class="required">*</span>Mobile No</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" placeholder="" name="mobile" required value="<?php echo $member['mobile'];?>"/>
		</div>
		<div class="col-sm-4">
			<p class="form-control-static">Can be used as a login</p>
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label"><span class="required">*</span>ID card No</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" placeholder="" name="idcard" value="<?php echo $member['idcard'];?>"/>
		</div>
		<div class="col-sm-4">
			<p class="form-control-static">Can be used as a login</p>
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label"><span class="required">*</span>Password</label>
		<div class="col-sm-4">
			<input type="password" class="form-control" placeholder="" name="password" />
			<p>Blank not modify</p>
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">E-mail</label>
		<div class="col-sm-4">
			<input type="email" class="form-control" placeholder="" name="email" value="<?php echo $member['email'];?>"/>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Gender</label>
		<div class="col-sm-1">
			<select class="form-control" name="sex">
				<option value="1" <?php echo $member['sex'] == 1?'selected="selected"':''?>>Male</option>
				<option value="2" <?php echo $member['sex'] == 2?'selected="selected"':''?>>Female</option>
			</select>
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">Age</label>
		<div class="col-sm-1">
			<input type="text" class="form-control" placeholder="" name="age" value="<?php echo $member['age'];?>"/>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-info">Submit</button>
			<button type="button" class="btn btn-default" onclick="javascript:history.go(-1);">Go back</button>
		</div>
	</div>
</form>
