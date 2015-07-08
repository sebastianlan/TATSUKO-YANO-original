<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/index')?>">Home</a></li>
	<li><a href="javascript:void(0);">Administrator</a></li>
	<li class="active">Administrator list</li>
</ol>

<div class="marginbottom10">
	<a class="btn btn-success" href="<?php echo site_url('isystem/addUser')?>" role="button"><i class="fa fa-plus"></i> Add administrator</a>
</div>

<form id="myform" method="post">
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover <!--text-center-->">
			<thead>
				<tr>
					<th width="">No</th>
					<th width="">Username</th>
					<th width="">Nickname</th>
					<!-- <th>权限</th>  -->
					<th width="">Creation time</th>
					<th width="">Operation</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if (empty ( $userlist )) {
				?>
				<tr>
					<td colspan="5">No data</td>
				</tr>
				<?php
			} else {
				foreach ( $userlist as $k=>$v ) {
					?>
				<tr>
					<td><?=$k+1;?></td>
					<td><?=$v['username']?></td>
					<td><?=$v['nickname']?></td>
					<td><?=date('Y-m-d H:i',$v['createtime'])?></td>
					<td><a href="<?php echo site_url('isystem/editUser/'.$v['id'])?>"
						class="btn btn-xs btn-info" role="button"> <i class="fa fa-edit"></i> Edit </a> &nbsp;&nbsp;
                        <a href="javascript:if(confirm('Are you sure you want to delete ?')){window.location.href='<?php echo site_url('isystem/delUser/'.$v['id'].'/'.$offset)?>';}"
						class="btn btn-xs btn-danger" <?php echo $v['cannotdel']?'disabled="disabled"':'';?>> <i class="fa fa-trash-o"></i> Delete </a>
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
