<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/index')?>">Home</a></li>
	<li><a href="javascript:void(0);">Online testing</a></li>
	<li><a href="<?php echo site_url('survey/ls')?>">Test list</a></li>
	<li class="active">Test details</li>
</ol>
<form class="form-horizontal">
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">Participant</label>
		<div class="col-sm-8">
			<p class="form-control-static"><?php echo $survey['name'];?></p>
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">Contact</label>
		<div class="col-sm-8">
			<p class="form-control-static"><?php echo $survey['contact'];?></p>
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">Time</label>
		<div class="col-sm-8">
			<p class="form-control-static"><?php echo date('Y-m-d H:i:s',$survey['createtime']);?></p>
		</div>
	</div>
	<hr />
	<?php 
	foreach ($survey['answer'] as $k=>$v){
		$q = $question[$k]['qu'];
		if($question[$k]['type'] == 'text'){
			$a = $v;
		}else{
			$a = $question[$k]['option'][$v];
		}
		?>
		<div class="form-group ">
			<label for="email" class="col-sm-2 control-label">Q</label>
			<div class="col-sm-8">
				<p class="form-control-static"><?php echo $q;?> ?</p>
			</div>
		</div>
		<div class="form-group ">
			<label for="email" class="col-sm-2 control-label">A</label>
			<div class="col-sm-8">
				<p class="form-control-static"><?php echo $a;?></p>
			</div>
		</div>
		<?php
	}
	?>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="button" class="btn btn-default" onclick="javascript:history.go(-1);">Go back</button>
		</div>
	</div>
</form>
