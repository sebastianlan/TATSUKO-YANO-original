<style>
@
utf-8
html {
	_overflow-y: scroll
}

body,a,div,dl,dd,dt,h1,h2,h3,h4,h5,h6,h7,li,ul,p,span,img,input {
	padding: 0px;
	margin: 0px;
	font-size: 12px
}

img {
	vertical-align: middle;
	border-style: none
}

body {
	font-family: "Microsoft Yahei";
	background: #FFFFFF;
	font-size: 12px;
	color: #333333;
	line-height: 1.5em;
}

a {
	text-decoration: none;
}

li {
	list-style: none
}

.clear {
	clear: both;
}

ul,li {
	list-style: none;
}

.job-list ul,.job-list li {
	padding: 0px;
	margin: 0px;
	list-style: none;
	color: #333;
}

.job-list li {
	margin-top: 15px;
	padding-bottom: 15px;
	border-bottom: 1px dashed #ccc;
	background: url('../images/jobico.png') no-repeat 0px 3px;
	padding-left: 25px;
}

.job-list li a {
	color: #333;
	text-decoration: none;
}

.job-list li a:hover {
	color: #9f4f00;
}

.job-list li div.title {
	line-height: 20px;
}

.job-list li span.date {
	display: inline-block;
	float: right;
	color: #999;
}

.job-list li div.job-des {
	line-height: 20px;
	margin-top: 5px;
	color: #999999;
}

.article-right p {
	color: #999;
	line-height: 22px;
}

.article-right .active {
	color: #9f4f00;
}

.job-list-title {
	height: 37px;
	line-height: 37px;
	border-bottom: 1px dashed #ccc;
	background: url('../images/jobico2.png') no-repeat top left;
	padding-left: 35px;
}

.job-list-title span.title {
	display: inline-block;
	color: #666666;
	font-size: 18px;
}

.job-list-title span.address {
	margin-left: 15px;
	color: #666666;
	display: inline-block;
}

.job-list-title span.date {
	float: right;
	margin-right: 5px;
	display: inline-block;
	color: #999;
}

.job-list-con,.job-why-con,.job-us-con {
	margin-top: 15px;
	margin-bottom: 30px;
	padding-left: 5px;
}

.job-list-con h4 {
	font-size: 12px;
	color: #333;
	font-weight: bold;
	line-height: 30px;
}

.job-list-con p,.job-back p,.job-why-con p {
	line-height: 22px;
	color: #666666;
}

.list .arrow {
	margin-top: 20px;
	height: 50px;
	line-height: 50px;
	border-bottom: 1px dashed #ccc;
}

.list .arrow a {
	padding-right: 70px;
	padding-left: 5px;
	display: inline-block;
	font-size: 18px;
	color: #333;
}

.list .arrow a.active i {
	color: #ec5801;
}

.job-list-title2 {
	
}

.job-list2 ul {
	padding: 0px;
	margin: 0px;
	list-style: none;
	color: #333;
}

.page-title0 {
	font-size: 30px;
	color: #ec5601;
}

.job-list-title0 {
	line-height: 37px;
	border-bottom: 1px solid #ccc;
}

.job-list-title0 span.add {
	color: #999999;
	display: inline-block;
}

.job-list-conn input {
	border: 0px solid #c00;
	margin-left: 10px;
}

.job-list-conn img {
	vertical-align: top;
	margin-left: 10px;
	float: left
}

.job-list-conn {
	margin-top: 15px;
	margin-bottom: 30px;
	padding-left: 5px;
	text-align: center
}

.job-list-conn h4 {
	font-size: 12px;
	color: #333;
	font-weight: bold;
	line-height: 30px;
}

.job-list-conn p {
	line-height: 22px;
	color: #666666;
}

.job-ceshi {
	width: 845px;
	margin: 0 auto
}

.cheshi_left {
	width: 360px;
	float: left;
	overflow: hidden
}

.cheshi_right {
	width: 360px;
	float: left;
	overflow: hidden
}

.job-ceshi img {
	vertical-align: top
}
</style>
<div class="article-left">
	<div class="job-list">
		<div class="job-list-title0">
			<div class="page-title0">
				<strong>Online Risk Test</strong>
			</div>
			<span class="add">Please fill in listed below information , * is required .</span>
		</div>
		<div class="job-ceshi">
			<div class="cheshi_left">
				<form name="formSeach" id="formSeach" action="/key.aspx" onSubmit="Seach()">
					<p style="width: 350px; overflow: hidden">
						<span style="text-align: left; line-height: 3em">Name</span><br>
                        <input type="text" name="k" size="34" class="cpkey" value="<?php echo isset($fields['name'])?$fields['name']:'';?>" style="height: 36px; line-height: 22px; color: #999999; background: #f2f0f0; border: #909090 1px solid; padding-left: 5px;" />
						<span style="color: red; margin-left: 5px;">*</span>
					</p>
					<p style="width: 350px; overflow: hidden">
						<span style="text-align: left; line-height: 3em">Occupation</span><br>
						<input type="text" name="k" size="34" class="cpkey" value="<?php echo isset($fields['job'])?$fields['job']:'';?>" style="height: 36px; line-height: 22px; color: #999999; background: #f2f0f0; border: #909090 1px solid; padding-left: 5px;" />
					</p>
					<p style="width: 350px; overflow: hidden">
						<span style="text-align: left; line-height: 3em">Burden</span><br>
						<?php
						$jtfd = isset ( $fields ['jtfd'] ) ? $fields ['jtfd'] : '';
						?>
						<input type="text" name="k" size="34" class="cpkey" value="<?php echo isset($jtfdoption[$jtfd])?$jtfdoption[$jtfd]:'';?>" style="height: 36px; line-height: 22px; color: #999999; background: #f2f0f0; border: #909090 1px solid; padding-left: 5px;" />
					</p>
					<p style="width: 350px; overflow: hidden">
						<span style="text-align: left; line-height: 3em">Experience</span><br>
						<?php
						$tzjy = isset ( $fields ['tzjy'] ) ? $fields ['tzjy'] : '';
						?>
						<input type="text" name="k" size="34" class="cpkey" value="<?php echo isset($tzjyoption[$tzjy])?$tzjyoption[$tzjy]:'';?>" style="height: 36px; line-height: 22px; color: #999999; background: #f2f0f0; border: #909090 1px solid; padding-left: 5px;" />
					</p>
					<p style="width: 350px; overflow: hidden">
						<span style="text-align: left; line-height: 3em">Factor</span><br>
						<?php
						$syys = isset ( $fields ['syys'] ) ? $fields ['syys'] : '';
						?>
						<input type="text" name="k" size="34" class="cpkey" value="<?php echo isset($syysoption[$syys])?$syysoption[$syys]:'';?>" style="height: 36px; line-height: 22px; color: #999999; background: #f2f0f0; border: #909090 1px solid; padding-left: 5px;" />
					</p>
				</form>


			</div>

			<div class="right">
				<form name="formSeach" id="formSeach">
					<p style="width: 350px; overflow: hidden">
						<span style="text-align: left; line-height: 3em">Mobile No</span><br>
                        <input type="text" name="k" size="34" class="cpkey" value="<?php echo isset($fields['mobile'])?$fields['mobile']:'';?>" style="height: 36px; line-height: 22px; color: #999999; background: #f2f0f0; border: #909090 1px solid; padding-left: 5px;" />
						<span style="color: red; margin-left: 5px;">*</span>
					</p>
					<p style="width: 350px; overflow: hidden">
						<span style="text-align: left; line-height: 3em">Level</span><br>
						<?php
						$tzljcd = isset ( $fields ['tzljcd'] ) ? $fields ['tzljcd'] : '';
						?>
						<input type="text" name="k" size="34" class="cpkey" value="<?php echo isset($tzljcdoption[$tzljcd])?$tzljcdoption[$tzljcd]:'';?>" style="height: 36px; line-height: 22px; color: #999999; background: #f2f0f0; border: #909090 1px solid; padding-left: 5px;" />
					</p>
					<p style="width: 350px; overflow: hidden">
						<span style="text-align: left; line-height: 3em">Condition</span><br>
						<?php
						$zyqk = isset ( $fields ['zyqk'] ) ? $fields ['zyqk'] : '';
						?>
						<input type="text" name="k" size="34" class="cpkey" value="<?php echo isset($zyqkoption[$zyqk])?$zyqkoption[$zyqk]:'';?>" style="height: 36px; line-height: 22px; color: #999999; background: #f2f0f0; border: #909090 1px solid; padding-left: 5px;" />
					</p>
					<p style="width: 350px; overflow: hidden">
						<span style="text-align: left; line-height: 3em">Investment</span><br>
						<?php
						$zytz = isset ( $fields ['zytz'] ) ? $fields ['zytz'] : '';
						?>
						<input type="text" name="k" size="34" class="cpkey" value="<?php echo isset($zytzoption[$zytz])?$zytzoption[$zytz]:'';?>" style="height: 36px; line-height: 22px; color: #999999; background: #f2f0f0; border: #909090 1px solid; padding-left: 5px;" />
					</p>
				</form>
				</p>

			</div>

		</div>

	</div>

</div>