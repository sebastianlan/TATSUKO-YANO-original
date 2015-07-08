<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/index')?>">Home</a></li>
	<li><a href="<?php echo site_url('member/ls')?>">Member</a></li>
	<li class="active">Purchased products list</li>
</ol>
<!-- 搜索框 -->
<div class="marginbottom10">
	<form class="form-inline" action="<?php echo site_url('member/buylist/'.$member_id)?>" method="post">
		<div class="form-group">
			<label class="sr-only">Template name</label> <input type="text" placeholder="Template name" class="form-control" name="tplname" />
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-info">
				<i class="fa fa-search"></i> Search
			</button>
			<a class="btn btn-success" href="<?php echo site_url('member/buy/'.$member_id)?>" role="button"><i class="fa fa-plus"></i> Purchase product</a>
		</div>
	</form>
</div>


<form id="myform">
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover <!--text-center-->">
			<thead>
				<tr>
					<th>Template name</th>
					<th>Purchase Date</th>
					<th>Price</th>
					<th>Payment method</th>
					<th>Interest rate</th>
					<th>Time limit</th>
					<th>Earnings</th>
					<th>Operation</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if (empty ( $mplist )) {
				?>
				<tr>
					<td colspan="8">No data</td>
				</tr>
				<?php
			} else {
				foreach ( $mplist as $v ) {
					?>
					<tr>
					<td><?=$v['tplname']?></td>
					<td><?=date('Y-m-d',$v['buytime'])?></td>
					<td><?php echo ($v['buymoney']/1000).' thousand yuan'?></td>
					<td><?=$eran_time[$v['type']]?></td>
					<td><?=$v['earn']?>%</td>
					<td><?=$v['overtime']?> months</td>
					<td><?=$v['total']?> yuan</td>
					<td><a href="<?php echo site_url('member/editbuy/'.$v['id'])?>"
						class="btn btn-xs btn-info" role="button"> <i class="fa fa-edit"></i> Edit </a> &nbsp;&nbsp;
                        <a href="javascript:if(confirm('Are you sure you want to delete ?')){window.location.href='<?php echo site_url('member/deletebuy/'.$v['id'])?>';}"
						class="btn btn-xs btn-danger"> <i class="fa fa-trash-o"></i> Delete </a> &nbsp;&nbsp;
                        <a href="<?php echo site_url('member/tplservice/'.$v['id'])?>"
						class="btn btn-xs btn-success"> <i class="fa fa-plus"></i> Contract renewal  </a>
                    </td>
				</tr>
				<?php
				}
			}
			
			?>

			</tbody>
		</table>
	</div>
</form>
<!-- 分页 -->
<div class="row pull-right">
	<div class="col-sm-12">
		 <?php echo $this->pagination->create_links (); ?>
	</div>
</div>
