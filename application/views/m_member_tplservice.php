<script src="<?php echo base_url('static/my97datepicker/WdatePicker.js');?>"></script>

<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/index')?>">Home</a></li>
	<li><a href="<?php echo site_url('member/ls')?>">Member</a></li>
	<li><a href="<?php echo site_url('member/buylist/'.$member_id)?>">Purchased products list</a></li>
	<li class="active">Contract renewal</li>
</ol>
<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('member/tplservice/'.$tplid);?>" method="post">
	<?php
	if ($member ['nickname'] != '') {
		?>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">Name</label>
		<div class="col-sm-8">
			<p class="form-control-static"><?php echo $member['nickname']?></p>
		</div>
	</div>
		<?php
	}
	?>
	
	<?php
	if ($member ['mobile'] != '') {
		?>
		<div class="form-group mobileform">
		<label for="email" class="col-sm-2 control-label">Mobile No</label>
		<div class="col-sm-8">
			<p class="form-control-static"><?php echo $member['mobile']?></p>
		</div>
	</div>
		<?php
	}
	?>
	
	<?php
	if ($member ['idcard'] != '') {
		?>
		<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">ID card No</label>
		<div class="col-sm-8">
			<p class="form-control-static"><?php echo $member['idcard']?></p>
		</div>
	</div>
		<?php
	}
	?>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">Template name</label>
		<div class="col-sm-4">
			<p class="form-control-static">
				<a href="<?php echo site_url('ps/detail/'.$mp['product_id'])?>" target="_blank"><?php echo $mp['tplname']?></a>
			</p>
		</div>
	</div>
	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">Payment method</label>
		<div class="col-sm-4">
			<p class="form-control-static"><?php echo $eran_time[$mp['type']];?></p>
		</div>
	</div>

	<div class="form-group ">
		<label for="email" class="col-sm-2 control-label">Purchase Date</label>
		<div class="col-sm-4">
			<p class="form-control-static"><?php echo date('Y-m-d',$mp['buytime']);?></p>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Price</label>
		<div class="col-sm-2">
			<p class="form-control-static"><?php echo $mp['buymoney']/1000;?> thousand yuan</p>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Interest rate</label>
		<div class="col-sm-2">
			<p class="form-control-static"><?php echo $mp['earn'];?>%</p>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Time limit</label>
		<div class="col-sm-2">
			<p class="form-control-static"><?php echo $mp['overtime'];?> months</p>
		</div>
	</div>

	<!-- 续存期设定  开始 -->
	<?php
	if (! empty ( $earnlist )) {
		foreach ( $earnlist as $k => $v ) {
			?>
        <div class="form-group earnrow">
		<label class="col-sm-2 control-label <?=$k!=0?'sr-only':''?>"><span class="required">*</span>Earnings</label>
		<div class="col-sm-2">
			<div class="input-group">
				<input type="text" class="form-control paydate" placeholder="Purchase Date" onclick="WdatePicker()" name="time[]" required value="<?=date('Y-m-d',$v['time'])?>" />
			</div>
		</div>
		<div class="col-sm-2">
			<div class="input-group">
				<input type="text" class="form-control interest" placeholder="Price" name="money[]" required value="<?=$v['money']?>" />
				<div class="input-group-addon">yuan</div>
			</div>
		</div>
				<?php
			if ($k == 0) {
				?>
					<div class="col-sm-1">
			<button type="button" class="btn btn-success" onclick="addEarn()">
				<i class="fa fa-plus"></i> Add
			</button>
		</div>
					<?php
			} else {
				?>
					<div class="col-sm-1">
			<button type="button" class="btn btn-danger" onclick="delEarn(this)">
				<i class="fa fa-times"></i> Delete
			</button>
		</div>
					<?php
			}
			?>
			<div class="col-sm-2">
				<button type="button" class="btn btn-warning" onclick="openmodel(this)">Payment</button>
			</div>
			<div class="col-sm-2">
				<button type="button" class="btn btn-info" onclick="openmodel(this)">Send message</button>
			</div>
	</div>
			<?php
		}
	} else {
		?>
		<div class="form-group earnrow">
		<label class="col-sm-2 control-label"><span class="required">*</span>Earnings</label>
		<div class="col-sm-2">
			<div class="input-group">
				<input type="text" class="form-control paydate" placeholder="Purchase Date" onclick="WdatePicker()" name="time[]" required value="" />
			</div>
		</div>
		<div class="col-sm-2">
			<div class="input-group">
				<input type="text" class="form-control interest" placeholder="Price" name="money[]" required value="" />
				<div class="input-group-addon">yuan</div>
			</div>
		</div>
		<div class="col-sm-1">
			<button type="button" class="btn btn-success" onclick="addEarn()">
				<i class="fa fa-plus"></i> Add
			</button>
		</div>
		<div class="col-sm-1">
			<button type="button" class="btn btn-info" onclick="openmodel(this)">Send message</button>
		</div>
	</div>
		<?php
	}
	
	?>
	
	<script type="text/javascript">
	function addEarn(){
		var html = '';
		html += '<div class="form-group earnrow">';
		html += '	<div class="col-sm-2"><label class="col-sm-2 control-label sr-only">Earnings</label></div>';
		html += '	<div class="col-sm-2">';
		html += '		<div class="input-group">';
		html += '			<input type="text" class="form-control paydate" placeholder="Purchase Date" onclick="WdatePicker()"';
		html += '				name="time[]" required/>';
		html += '		</div>';
		html += '	</div>';
		html += '	<div class="col-sm-2">';
		html += '		<div class="input-group">';
		html += '			<input type="text" class="form-control interest" placeholder="Price"';
		html += '				name="money[]" required />';
		html += '		<div class="input-group-addon">yuan</div>';
		html += '		</div>';
		html += '	</div>';
		html += '	<div class="col-sm-1">';
		html += '		<button type="button" class="btn btn-danger"';
		html += '			onclick="delEarn(this)"><i class="fa fa-times"></i> Delete</button>';
		html += '	</div>';
		html += '	<div class="col-sm-1">';
		html += '		<button type="button" class="btn btn-info" onclick="openmodel(this)">Send message</button>';
		html += '	</div>';
		html += '</div>';
		$('.earnrow:last').after($(html));
	}

	function delEarn(obj){
		$(obj).parents('.earnrow').remove();
	}


	function openmodel(obj){
		//检测是否有手机号
		if(!$('.mobileform')[0]){
			$('#noticecontent').html("The user has no phone number , can't send information .").css('color','red');
			$('#noticemodel').modal('show');
			return false;
		}
		var paydate = $(obj).parents('.earnrow').find('.paydate').val();
		var interest = $(obj).parents('.earnrow').find('.interest').val();
		if(paydate == '' || interest == ''){
			$('#noticecontent').html("Purchase Date or price is wrong , can't send information .").css('color','red');
			$('#noticemodel').modal('show');
		}else{
			//替换
			var content = $('#hiddensms').html();
			content = content.replace('paydate',paydate);
			content = content.replace('interest',interest);
			$('#smscontent').text(content);
			$('#smsmodel').modal('show');
			//send sms
			$('#send').click(function(){
				$('#smsmodel').modal('hide');
				$('#noticecontent').html('Sending......');
				$('#noticemodel').modal('show');
				$.post('<?php echo site_url('member/sendsms')?>',{'member_id':<?php echo $member_id;?>,'content':$('#smscontent').text()},function(response){
					if(response['code'] == 1){
						$('#noticecontent').html(response['msg']).css('color','green');
					}else{
						$('#noticecontent').html(response['msg']).css('color','red');
					}
				});
			});
		}
	}
	
	</script>

	<!-- 续存期设定 结束 -->


	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-info">Submit</button>
			<button type="button" class="btn btn-default"onclick="javascript:history.go(-1);">Go back</button>
		</div>
	</div>

	<div class="modal fade" id="smsmodel">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Please make sure the message content .</h4>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label class="col-sm-2 control-label">Message content</label>
							<div id="hiddensms" style="display: none;">Dear guest <?php echo $member['nickname']?> , the [<?php echo $product['name']?>] product you buy on paydate to deal with ¥interest has to pay to your reserved accounts , please note to check .</div>
							<div class="col-sm-8">
								<textarea id="smscontent" rows="6" cols="60">Dear guest <?php echo $member['nickname']?> , the [<?php echo $product['name']?>] product you buy on paydate to deal with ¥interest has to pay to your reserved accounts , please note to check .</textarea>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="send">Confirm</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<div class="modal fade" id="noticemodel">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Notice</h4>
				</div>
				<div class="modal-body">
					<p id="noticecontent" style=""></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

</form>
