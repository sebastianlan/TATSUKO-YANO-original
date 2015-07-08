<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/index')?>">Home</a></li>
	<li><a href="javascript:void(0);">Administrator</a></li>
	<li><a href="<?php echo site_url('isystem/addUser')?>">Administrator list</a></li>
	<li class="active">Edit administrator</li>
</ol>
<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('isystem/editUser/'.$id);?>" method="post">
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label"><span class="required">*</span>Username</label>
		<div class="col-sm-8">
			<p class="form-control-static"><?php echo $user['username']?></p>
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">Password</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" placeholder="Blank not modify" name="pwd"/>
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label"><span class="required">*</span>Nickname</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" placeholder="" name="nickname" required value="<?php echo $user['nickname']?>"/>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label"><span class="required">*</span>Power</label>
		<div class="col-sm-8">
			<div class="checkbox">
                <?php
                foreach ($power as $k=>$v) {
                    ?>
                <label style="margin-right: 30px;"> <input type="checkbox" <?php echo in_array($k, $userpower)?'checked="checked"':'';?> name="power[]" value="<?= $k ?>">&nbsp;<?= $v ?></label>
                    <?php
                }
                ?>
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
