<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/index')?>">Home</a></li>
	<li><a href="javascript:void(0);">Product</a></li>
	<li class="active">Appointment list</li>
</ol>

	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover <!--text-center-->">
			<thead>
				<tr>
					<th>Appointment of product</th>
					<th>Appointment of people</th>
					<th width="10%">Mobile No</th>
					<th width="15%">Appointment time</th>
					<th width="10%">Status</th>
					<th width="15%">Operation</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if (empty ( $orderlist )) {
				?>
				<tr>
					<td colspan="6">No data</td>
				</tr>
				<?php
			} else {
				foreach ( $orderlist as $v ) {
					?>
				<tr>
					<td><?=$v['pname']?></td>
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
					<td><a href="javascript:if(confirm('Are you sure you want to dispose ?')){window.location.href='<?php echo site_url('order/deal/'.$v['id'].'/'.$offset)?>';}"
						class="btn btn-xs btn-success <?php echo $v['isdeal']?'disabled':'';?>"> <i class="fa fa-check"></i> Dispose </a>
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
