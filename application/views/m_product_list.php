<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/index')?>">Home</a></li>
	<li><a href="javascript:void(0);">Product</a></li>
	<li class="active">Product list</li>
</ol>
<!-- 搜索框 -->
<div class="marginbottom10">
	<form class="form-inline" action="<?php echo site_url('product/ls')?>" method="post">
		<div class="form-group">
			<label class="sr-only">Product name</label> <input type="text" placeholder="Product name" class="form-control" name="name" />
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-info">
				<i class="fa fa-search"></i> Search
			</button>
			<a class="btn btn-success" href="<?php echo site_url('product/add')?>" role="button"><i class="fa fa-plus"></i> Add product</a>
		</div>
	</form>
</div>


<script type="text/javascript">
<!--
function updateOrder(){
	$('#myform').submit();
}
//-->
</script>


<form id="myform" action="<?php echo site_url('product/updateOrder')?>" method="post">
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover <!--text-center-->">
			<thead>
				<tr>
					<th width="10%">Order<i class="fa fa-refresh pull-right" style="margin-top: 3px; cursor: pointer;" data-toggle="tooltip"
						data-placement="top" title="Update order" onclick="updateOrder()"></i></th>
					<th>Product name</th>
					<th>Category</th>
					<th>Partner</th>
					<th>Interest rate</th>
					<th>Purchase starting point</th>
					<th>Status</th>
					<th>Operation</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if (empty ( $plist )) {
				?>
				<tr>
					<td colspan="8">No data</td>
				</tr>
				<?php
			} else {
				foreach ( $plist as $v ) {
					?>
					<tr>
					<td><input type="text" class="form-control input-sm orderinput"
						name="listorder[<?=$v['id']?>]" value="<?=$v['listorder']?>"></td>
					<td><a href="<?php echo site_url('ps/detail/'.$v['id']);?>" target="_blank"><?=$v['name']?></a></td>
					<td><?=$pcate[$v['cateid']]?></td>
					<td><?=$group[$v['group_id']]?></td>
					<td><?=$v['earn_min'].'%~'.$v['earn_max'].'%'?></td>
					<td><?=$v['buy_min'].'thousand yuan'?></td>
					<td>
					<?php 
					$status = '';
					switch ($v['status']) {
						case 1 :
							$status = '<span class="label label-info">Preheat</span>';
							break;
						case 2 :
							$status = '<span class="label label-success">Hot</span>';
							break;
						case 3 :
							$status = '<span class="label label-default">Sold out</span>';
							break;
					}
					echo $status;
					?>
					</td>
					<td><a href="<?php echo site_url('product/edit/'.$v['id'])?>"
						class="btn btn-xs btn-info" role="button"> <i class="fa fa-edit"></i> Edit </a> &nbsp;&nbsp;
                        <a href="javascript:if(confirm('Are you sure you want to delete ?')){window.location.href='<?php echo site_url('product/delete/'.$v['id'].'/'.$offset)?>';}"
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
