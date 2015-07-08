<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/index')?>">Home</a></li>
	<li><a href="javascript:void(0);">Banner</a></li>
	<li><a href="<?php echo site_url('ads/ls')?>">Banner list</a></li>
	<li class="active">Edit banner</li>
</ol>
<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('ads/edit/'.$adsid);?>" method="post">
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label"><span class="required">*</span>Title</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" placeholder="" name="title" required value="<?=$ads['title']?>"/>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Image</label>
		<div class="col-sm-3">
			<input type="file" class="form-control" name="pic"/>
			<p>Proposal&nbsp;:&nbsp;<?php echo $ads['width'];?>x<?php echo $ads['height'];?> px</p>
		</div>
		<?php 
		if($ads['pic']!=''){
			?>
			<div class="col-sm-6">
				<img src="<?php echo base_url($ads['pic']);?>" style="border: 1px solid #ccc;"
                width="<?php echo $ads['width']/5;?>" height="<?php echo $ads['height']/5;?>"/>
			</div>
			<?php
		}
		?>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">Link</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" placeholder="" name="link" value="<?=$ads['link']?>" />
			<p>The link address begins with "http://"</p>
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">Order</label>
		<div class="col-sm-1">
			<input type="text" class="form-control" placeholder="" name="listorder" value="<?=$ads['listorder']?>" />
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-info">Submit</button>
			<button type="button" class="btn btn-default" onclick="javascript:history.go(-1);">Go back</button>
		</div>
	</div>
</form>
