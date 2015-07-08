<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/index')?>">Home</a></li>
	<li><a href="javascript:void(0);">Online testing</a></li>
	<li class="active">Test list</li>
</ol>

	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover <!--text-center-->">
			<thead>
				<tr>
					<th>Participant</th>
					<th>Contact</th>
					<th>Time</th>
					<th >Status</th>
					<th width="15%">Operation</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if (empty ( $surveylist )) {
				?>
				<tr>
					<td colspan="6">No data</td>
				</tr>
				<?php
			} else {
				foreach ( $surveylist as $v ) {
					?>
				<tr>
					<td><?=$v['name']?></td>
					<td><?=$v['contact']?></td>
					<td><?=date('Y-m-d H:s',$v['createtime'])?></td>
					<td>
					<?php 
					if($v['isdeal']){
						?>
						<span class="label label-success">Handled</span>
						<?php
					}else{
						?>
						<span class="label label-warning">Undisposed</span>
						<?php
					}
					?>
					</td>
					<td><a href="javascript:if(confirm('Are you sure you want to dispose ?')){window.location.href='<?php echo site_url('survey/deal/'.$v['id'].'/'.$offset)?>';}"
						class="btn btn-xs btn-success <?php echo $v['isdeal']?'disabled':'';?>"> <i class="fa fa-check"></i> Dispose </a>&nbsp;&nbsp;
                        <a href="<?php echo site_url('survey/detail/'.$v['id'])?>"
						class="btn btn-xs btn-info" role="button"> <i class="fa fa-file-text"></i> View details </a>
                    </td>
				</tr>
				<?php
				}
			}
			
			?>

			</tbody>
		</table>
	</div>
<!-- 分页 -->
<div class="row pull-right">
	<div class="col-sm-12">
		 <?php echo $this->pagination->create_links(); ?>
	</div>
</div>
