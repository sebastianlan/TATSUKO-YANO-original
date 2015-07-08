<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/index')?>">Home</a></li>
	<li><a href="javascript:void(0);">Banner</a></li>
	<li class="active">Banner list</li>
</ol>

<script type="text/javascript">
function updateOrder(){$('#myform').submit();}
</script>


<form id="myform" action="<?php echo site_url('ads/updateOrder')?>" method="post">
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover <!--text-center-->">
			<thead>
				<tr>
					<th width="8%">Order<i class="fa fa-refresh pull-right" style="margin-top: 3px; cursor: pointer;"
                    data-toggle="tooltip" data-placement="top" title="Update order" onclick="updateOrder()"></i></th>
					<th width="12%">Module</th>
					<th>Title</th>
					<th>Image</th>
					<th>Link</th>
					<th width="5%">Operation</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if (empty ( $adslist )) {
				?>
				<tr>
					<td colspan="6">No data</td>
				</tr>
				<?php
			} else {
				foreach ( $adslist as $v ) {
					$module = '';
					switch ($v['key']){
						case 'index' :
							$module = 'Home';
							break;
						case 'about' :
							$module = 'About us';
							break;
						case 'product' :
							$module = 'Product & Service';
							break;
						case 'news' :
							$module = 'News';
							break;
						case 'vip' :
							$module = 'Members area';
							break;
						case 'info' :
							$module = 'Information';
							break;
						case 'job' :
							$module = 'Join us';
						case 'online' :
							$module = 'On-line testing';
							break;
					}
					?>
					<tr>
					<td><input type="text" class="form-control input-sm orderinput"
						name="listorder[<?=$v['id']?>]" value="<?=$v['listorder']?>"></td>
					<td><?=$module?></td>
					<td><?=$v['title']?></td>
					<td>
						<?php 
						if($v['pic']!=''){
							?>
							<img src="<?php echo base_url($v['pic'])?>" width="<?php echo $v['width']/5;?>" height="<?php echo $v['height']/5;?>">
							<?php
						}
						?>
					</td>
					<?php 
					if($v['link']!=''){
						?>
						<td><a href='<?php echo $v['link']?>' target='_blank'><?php echo $v['link']?></a></td>
						<?php
					}else{
						?>
						<td>No data</td>
						<?php
					}
					?>
					
					<td><a href="<?php echo site_url('ads/edit/'.$v['id'])?>"
						class="btn btn-xs btn-info" role="button"> <i class="fa fa-edit"></i> Edit </a>
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

