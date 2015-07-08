<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/index')?>">Home</a></li>
	<li><a href="javascript:void(0);">Product</a></li>
	<li class="active">Category list</li>
</ol>

<div class="marginbottom10">
	<a class="btn btn-success" href="<?php echo site_url('product/addCate')?>" role="button"><i class="fa fa-plus"></i> Add category</a>
</div>

<script type="text/javascript">
<!--
function updateOrder(){
	$('#myform').submit();
}
//-->
</script>


<form id="myform" action="<?php echo site_url('product/updateCateOrder')?>" method="post">
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover <!--text-center-->">
			<thead>
				<tr>
					<th width="10%">Order<i class="fa fa-refresh pull-right" style="margin-top: 3px; cursor: pointer;" data-toggle="tooltip"
						data-placement="top" title="Update order" onclick="updateOrder()"></i></th>
					<th >Category name</th>
					<th width="10%">Status</th>
					<th width="15%">Operation</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if (empty ( $productcatelist )) {
				?>
				<tr>
					<td colspan="4">No data</td>
				</tr>
				<?php
			} else {
				foreach ( $productcatelist as $v ) {
					?>
					<tr>
					<td><input type="text" class="form-control input-sm orderinput"
						name="listorder[<?=$v['id']?>]" value="<?=$v['listorder']?>"></td>
					<td><?=$v['name']?></td>
					<td>
					<?php 
					if($v['isvalid']){
						?>
						<span class="label label-success">Available</span>
						<?php
					}else{
						?>
						<span class="label label-warning">Unavailable</span>
						<?php
					}
					?>
					</td>
					<td><a href="<?php echo site_url('product/editCate/'.$v['id'])?>"
						class="btn btn-xs btn-info" role="button"> <i class="fa fa-edit"></i> Edit </a> &nbsp;&nbsp;
                        <a href="javascript:if(confirm('Are you sure you want to delete ?')){window.location.href='<?php echo site_url('product/deleteCate/'.$v['id'].'/'.$offset)?>';}"
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
