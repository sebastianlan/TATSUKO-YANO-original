<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/index')?>">Home</a></li>
	<li><a href="javascript:void(0);">Info</a></li>
	<li class="active">Info list</li>
</ol>

<div class="marginbottom10">
	<a class="btn btn-success" href="<?php echo site_url('info/add')?>" role="button"><i class="fa fa-plus"></i> Add info</a>
</div>

<script type="text/javascript">
<!--
function updateOrder(){
	$('#myform').submit();
}
//-->
</script>

<form id="myform" action="<?php echo site_url('info/updateOrder')?>" method="post">
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover <!--text-center-->">
			<thead>
				<tr>
					<th width="8%">Order<i class="fa fa-refresh pull-right" style="margin-top: 3px; cursor: pointer;" data-toggle="tooltip"
						data-placement="top" title="Update order" onclick="updateOrder()"></i></th>
					<th>Title</th>
					<th width="15%">Category</th>
					<th width="10%">Status</th>
					<th width="15%">Update time</th>
					<th width="15%">Operation</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if (empty ( $infolist )) {
				?>
				<tr>
					<td colspan="6">No data</td>
				</tr>
				<?php
			} else {
				foreach ( $infolist as $v ) {
					?>
					<tr>
					<td><input type="text" class="form-control input-sm orderinput" name="listorder[<?=$v['id']?>]" value="<?=$v['listorder']?>"></td>
					<td><?=$v['title']?></td>
					<td><?=$infocate[$v['cateid']]?></td>
					<td>
					<?php 
					if($v['isvalid']){
						?>
						<span class="label label-success">Online</span>
						<?php
					}else{
						?>
                       	<span class="label label-warning">OffLine</span>
						<?php
					}
					?>
					</td>
					<td><?=date('Y-m-d H:i:s',$v['updatetime']?$v['updatetime']:$v['createtime'])?></td>
					<td><a href="<?php echo site_url('info/edit/'.$v['id'])?>"
						class="btn btn-xs btn-info" role="button"> <i class="fa fa-edit"></i> Edit </a> &nbsp;&nbsp;
                        <a href="javascript:if(confirm('Are you sure you want to delete ?')){window.location.href='<?php echo site_url('info/delete/'.$v['id'].'/'.$offset)?>';}"
						class="btn btn-xs btn-danger"> <i class="fa fa-trash-o"></i> Delete </a>
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
		 <?php echo $this->pagination->create_links(); ?>
	</div>
</div>
