<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/index')?>">Home</a></li>
	<li><a href="javascript:void(0);">Info</a></li>
	<li><a href="<?php echo site_url('info/ls')?>">Info list</a></li>
	<li class="active">Edit info</li>
</ol>
<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('info/edit/'.$infoid);?>" method="post">
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label"><span class="required">*</span>Title</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" placeholder="" name="title" required value="<?=$info['title']?>"/>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label"><span class="required">*</span>Category</label>
		<div class="col-sm-4">
			<select class="form-control" name="cateid">
				<?php
				foreach ( $infocate as $k => $v ) {
					?>
					<option value="<?=$v['id']?>" <?php echo $info['cateid']==$v['id']?'selected="selected"':'';?>><?=$v['name']?></option>
					<?php
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">Keywords(SEO)</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" placeholder="Can multiple , seperate keywords with comma ." name="keywords" value="<?=$info['keywords']?>"/>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Description(SEO)</label>
		<div class="col-sm-8">
			<textarea rows="6" cols="80" name="desc"><?=$info['desc']?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Content</label>
		<div class="col-sm-8">
			<textarea id="contentbox" name="content"><?=$info['content']?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Attachment</label>
		<div class="col-sm-4">
			<input type="file" class="form-control" name="attach"/>
		</div>
		<?php 
		if($info['attach']!=''){
			$pathinfo = pathinfo($info['attach']);
			?>
			<div class="col-sm-4">
				<p class="form-control-static"><a href="<?php echo base_url($info['attach']);?>"><?php echo $pathinfo['basename']?></a></p>
			</div>
			<?php 
		}
		?>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">Order</label>
		<div class="col-sm-1">
			<input type="text" class="form-control" placeholder="" name="listorder" value="<?=$info['listorder']?>" />
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-2">
			<div class="checkbox">
				<label> <input type="checkbox" <?php echo $info['isvalid']==1?'checked="checked"':'';?> name="isvalid">&nbsp;Online </label>
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
