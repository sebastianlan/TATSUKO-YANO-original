<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/index')?>">Home</a></li>
	<li><a href="javascript:void(0);">Member</a></li>
	<li class="active">Member list</li>
</ol>
<!-- 搜索框 -->
<div class="marginbottom10">
	<form class="form-inline" action="<?php echo site_url('member/ls')?>" method="post">
		<div class="form-group">
			<label class="sr-only">Name</label> <input type="text" placeholder="Name" class="form-control" name="nickname" />
		</div>
		<div class="form-group">
			<label class="sr-only">ID card No</label> <input type="text" placeholder="ID card No" class="form-control" name="idcard" />
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-info">
				<i class="fa fa-search"></i> Search
			</button>
			<a class="btn btn-success" href="<?php echo site_url('member/add')?>" role="button"><i class="fa fa-plus"></i> Add member</a>
		</div>
	</form>
</div>

<form id="myform">
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover <!--text-center-->">
			<thead>
				<tr>
					<th>Name</th>
					<th>Mobile No</th>
					<th>ID card No</th>
					<th>E-mail</th>
					<th>Gender</th>
					<th>Age</th>
					<th>Regtime</th>
					<th>Operation</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if (empty ( $memberlist )) {
				?>
				<tr>
					<td colspan="8">No data</td>
				</tr>
				<?php
			} else {
				foreach ( $memberlist as $v ) {
					?>
					<td><?=$v['nickname']?></td>
					<td><?=$v['mobile']?></td>
					<td><?=$v['idcard']?></td>
					<td><?=$v['email']?></td>
					<td>
					<?php 
					$sex = '';
					switch ($v['sex']) {
						case 0 :
							$sex = 'Unknown';
							break;
						case 1 :
							$sex = 'Male';
							break;
						case 2 :
							$sex = 'Female';
							break;
					}
					echo $sex;
					?>
					</td>
					<td><?=$v['age']?></td>
					<td><?=date('Y-m-d H:i:s',$v['createtime'])?></td>
					<td><a href="<?php echo site_url('member/edit/'.$v['id'])?>"
						class="btn btn-xs btn-info" role="button"> <i class="fa fa-edit"></i> Edit </a> &nbsp;&nbsp;
						<a href="javascript:if(confirm('Are you sure you want to delete ?')){window.location.href='<?php echo site_url('member/delete/'.$v['id'].'/'.$offset)?>';}"
						class="btn btn-xs btn-danger"> <i class="fa fa-trash-o"></i> Delete </a> &nbsp;&nbsp;
						<a href="<?php echo site_url('member/buylist/'.$v['id'])?>"
						class="btn btn-xs btn-success"> <i class="fa fa-trash-o"></i> Purchased products </a>
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
