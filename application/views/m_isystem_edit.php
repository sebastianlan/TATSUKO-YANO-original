<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/index')?>">Home</a></li>
    <li><a href="javascript:void(0);">Administrator</a></li>
	<li class="active">Config setting</li>
</ol>
<form class="form-horizontal" action="<?php echo site_url('isystem/edit');?>" method="post">
	<?php
	if (empty ( $params )) {
		?>
		<p>No config</p>
		<?php
	} else {
		?>
		<?php 
		foreach ($params as $v){
			switch ($v['type']){
				case '1':
					?>
					<div class="form-group ">
						<label for="email" class="col-sm-2 control-label"><span class="required">*</span><?=$v['title']?></label>
						<div class="col-sm-8">
							<input type="text" class="form-control" placeholder="" name="<?=$v['key']?>" required value="<?=$v['value']?>" />
						</div>
					</div>
					<?php
					break;
				    case '2':
					break;
			}
		}
		?>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-info">Submit</button>
			</div>
		</div>
		<?php
	}
	?>

</form>
