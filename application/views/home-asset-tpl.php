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

.job-list-title0b {
	line-height: 37px;
	border-bottom: 1px dashed #ccc;
}

.job-list-title0b span.add {
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

.job-zaixian {
	width: 703px;
	height: 1220px;
	border: #cdcbcb 1px solid;
}

.job-list-conn2 img {
	vertical-align: top;
	margin-left: 10px;
	float: left
}

.job-list-conn2 {
	margin-top: 15px;
	margin-bottom: 30px;
	padding-left: 5px;
}

.job-list-conn2 h4 {
	font-size: 12px;
	color: #333;
	font-weight: bold;
	line-height: 30px;
}

.job-list-conn2 p {
	line-height: 22px;
	color: #666666;
}
</style>
<div class="job-list">
	<div class="job-list-title0b">
		<div class="page-title0">Online Asset Allocation</div>
		<span class="add">Please fill in listed below information , * is required .</span>
	</div>
	<form name="formSeach" id="formSeach" action="<?php echo site_url('home/asset')?>" method="post">
		<div class="job-list-conn2">
			<div class="job-zaixian">
                <p style="width: 703px; height: 32px; background: #e8e2e2; border-bottom: #cdcbcb 1px solid;"><span style="line-height: 2.2em; color: #000000; font-weight: bold; font-size: 14px; padding-left: 15px">Basic Information</span></p>
                <p style="width: 703px; height: 32px; border-bottom: #cdcbcb 1px solid;">
                    <span style="float: left; width: 150px; height: 32px; line-height: 2.5em; border-right: #cdcbcb 1px solid; color: #000000; padding-left: 10px">Real name : </span>
                    <input type="text" name="name" size="34" class="cpkey" required value="<?php echo isset($fields['name'])?$fields['name']:''?>" style="height: 20px; width: 160px; margin-top: 5px; line-height: 20px; margin-left: 10px; color: #999999; padding-left: 5px; border: #abadb3 1px solid; float: left;" />
                    <span style="float: left; width: 150px; height: 32px; line-height: 2.2em; border-left: #cdcbcb 1px solid; border-right: #cdcbcb 1px solid; color: #000000; margin-left: 10px; padding-left: 10px">Mobile No : </span>
                    <input type="text" name="mobile" size="34" class="cpkey" required value="<?php echo isset($fields['mobile'])?$fields['mobile']:''?>" style="height: 20px; width: 160px; margin-top: 5px; line-height: 20px; margin-left: 10px; color: #999999; padding-left: 5px; border: #abadb3 1px solid; float: left;" />
                </p>
                <p style="width: 703px; height: 32px; border-bottom: #cdcbcb 1px solid;">
                    <span style="float: left; width: 150px; height: 32px; line-height: 2.5em; border-right: #cdcbcb 1px solid; color: #000000; padding-left: 10px">Health status : </span>
                    <input type="text" name="jiankang" size="150" class="cpkey" value="<?php echo isset($fields['jiankang'])?$fields['jiankang']:''?>" style="height: 20px; width: 430px; margin-top: 5px; line-height: 20px; margin-left: 10px; color: #999999; padding-left: 5px; border: #abadb3 1px solid; float: left;" />
                </p>
                <p style="width: 703px; height: 32px; border-bottom: #cdcbcb 1px solid;">
                    <span style="float: left; width: 150px; height: 32px; line-height: 2.5em; border-right: #cdcbcb 1px solid; color: #000000; padding-left: 10px">Consumer preference : </span>
                    <input type="text" name="xiaofei" size="150" class="cpkey"value="<?php echo isset($fields['xiaofei'])?$fields['xiaofei']:''?>" style="height: 20px; width: 430px; margin-top: 5px; line-height: 20px; margin-left: 10px; color: #999999; padding-left: 5px; border: #abadb3 1px solid; float: left;" />
                </p>
                <p style="width: 703px; height: 32px; border-bottom: #cdcbcb 1px solid;">
                    <span style="float: left; width: 150px; height: 32px; line-height: 2.5em; border-right: #cdcbcb 1px solid; color: #000000; padding-left: 10px">Industry : </span>
                    <a class="btn-select" id="btn_select">
                        <select name="hangye" style="width: 200px; height: 22px; margin-top: 5px; margin-left: 10px;">
                            <option>— Null —</option>
                            <?php
                            $hangye = isset ( $fields ['hangye'] ) ? $fields ['hangye'] : '';
                            foreach ( $hangyeoption as $k => $v ) {
                                ?>
                                <option value="<?php echo $k;?>"
                                    <?php echo $hangye==$k ?'selected="selected"':'';?>><?php echo $v;?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </a>
                </p>
                <?php
                $youqiye = isset ( $fields ['youqiye'] ) ? $fields ['youqiye'] : '';
                ?>
                <p style="width: 703px; height: 32px; border-bottom: #cdcbcb 1px solid;">
                    <span style="float: left; width: 150px; height: 32px; line-height: 2.5em; border-right: #cdcbcb 1px solid; color: #000000; padding-left: 10px">Business : </span>
                    <input type="radio" name="youqiye" value="1"<?php echo $youqiye==1?'checked':'';?> class="cpkey"style="margin-top: 10px; float: left; background: #faf0db; border: none; margin-left: 10px;">
                    <span style="float: left; width: 30px; margin-left: 5px; line-height: 2.5em">Yes</span>
                    <input type="radio" name="youqiye" value="2"<?php echo $youqiye==2?'checked':'';?> class="cpkey"style="margin-top: 10px; float: left; background: #faf0db; border: none; margin-left: 10px;">
                    <span style="float: left; width: 30px; margin-left: 5px; line-height: 2.5em">No</span>
                </p>
                <p style="width: 703px; height: 32px; border-bottom: #cdcbcb 1px solid;">
                    <span style="float: left; width: 150px; height: 32px; line-height: 2.5em; border-right: #cdcbcb 1px solid; color: #000000; padding-left: 10px">Source of income : </span>
                    <?php
                    $shouru = isset ( $fields ['shouru'] ) ? $fields ['shouru'] : array ();
                    foreach ( $shouruoption as $k => $v ) {
                        ?>
                        <input type="checkbox" name="shouru[]" value="<?php echo $k;?>" <?php echo in_array($k, $shouru)?'checked':''?> style="margin-top: 10px; float: left; background: #faf0db; border: none; margin-left: 10px;">
                        <span style="float: left; width: 56px; line-height: 2.5em; margin-left: 3px;"><?php echo $v;?></span>
                    <?php
                    }
                    ?>
                </p>
                <p style="width: 703px; height: 32px; border-bottom: #cdcbcb 1px solid;">
                    <span style="float: left; width: 150px; height: 32px; line-height: 2.5em; border-right: #cdcbcb 1px solid; color: #000000; padding-left: 10px">Parents alimony : </span>
                    <input type="text" name="fumushanyang" size="150" class="cpkey" value="" style="height: 20px; width: 430px; margin-top: 5px; line-height: 20px; margin-left: 10px; color: #999999; padding-left: 5px; border: #abadb3 1px solid; float: left;" />
                </p>
                <p style="width: 703px; height: 32px; border-bottom: #cdcbcb 1px solid;">
                    <span style="float: left; width: 150px; height: 32px; line-height: 2.5em; border-right: #cdcbcb 1px solid; color: #000000; padding-left: 10px">Alimony purpose : </span>
                    <a class="btn-select" id="btn_select">
                        <select name="shanyang"
                                style="width: 200px; height: 22px; margin-top: 5px; margin-left: 10px;">
                            <option>— Null —</option>
                            <?php
                            $shanyang = isset ( $fields ['shanyang'] ) ? $fields ['shanyang'] : '';
                            foreach ( $shanyangoption as $k => $v ) {
                                ?>
                                <option value="<?php echo $k;?>" <?php echo $shanyang==$k ?'selected="selected"':'';?>><?php echo $v;?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </a>
                </p>
                <p style="width: 703px; height: 32px; background: #e8e2e2; border-bottom: #cdcbcb 1px solid;">
                    <span style="line-height: 2.2em; color: #000000; font-weight: bold; font-size: 14px; padding-left: 15px">Investment History</span>
                </p>
                <p style="width: 703px; height: 32px; border-bottom: #cdcbcb 1px solid;">
                    <span style="float: left; width: 150px; height: 32px; line-height: 2.5em; border-right: #cdcbcb 1px solid; color: #000000; padding-left: 10px">Good at direction : </span>
                    <input type="text" name="sctzfx" size="150" class="cpkey" value="" style="height: 20px; width: 430px; margin-top: 5px; line-height: 20px; margin-left: 10px; color: #999999; padding-left: 5px; border: #abadb3 1px solid; float: left;" />
                </p>
                <p style="width: 703px; height: 32px; border-bottom: #cdcbcb 1px solid;">
                    <span style="float: left; width: 150px; height: 32px; line-height: 2.5em; border-right: #cdcbcb 1px solid; color: #000000; padding-left: 10px">Investment product : </span>
                    <?php $cjtzcp = isset ( $fields ['cjtzcp'] ) ? $fields ['cjtzcp'] : array (); ?>
                    <input type="checkbox" name="cjtzcp[]" value="1" <?php echo in_array(1, $cjtzcp)?'checked':''?> class="cpkey" style="margin-top: 10px; float: left; background: #faf0db; border: none; margin-left: 10px;">
                    <span style="float: left; width: 50px; line-height: 2.5em; margin-left: 3px;">option1</span>
                    <input type="checkbox" name="cjtzcp[]" value="2" <?php echo in_array(2, $cjtzcp)?'checked':''?> class="cpkey" style="margin-top: 10px; float: left; background: #faf0db; border: none; margin-left: 10px;">
                    <span style="float: left; width: 50px; line-height: 2.5em; margin-left: 3px;">option2</span>
                    <input type="checkbox" name="cjtzcp[]" value="3" <?php echo in_array(3, $cjtzcp)?'checked':''?> class="cpkey" style="margin-top: 10px; float: left; background: #faf0db; border: none; margin-left: 10px;">
                    <span style="float: left; width: 50px; line-height: 2.5em; margin-left: 3px;">option3</span>
                    <input type="checkbox" name="cjtzcp[]" value="4" <?php echo in_array(4, $cjtzcp)?'checked':''?> class="cpkey" style="margin-top: 10px; float: left; background: #faf0db; border: none; margin-left: 10px;">
                    <span style="float: left; width: 50px; line-height: 2.5em; margin-left: 3px;">option4</span>
                    <input type="checkbox" name="cjtzcp[]" value="5" <?php echo in_array(5, $cjtzcp)?'checked':''?> class="cpkey" style="margin-top: 10px; float: left; background: #faf0db; border: none; margin-left: 10px;">
                    <span style="float: left; width: 50px; line-height: 2.5em; margin-left: 3px;">option5</span>
                    <input type="checkbox" name="cjtzcp[]" value="6" <?php echo in_array(6, $cjtzcp)?'checked':''?> class="cpkey" style="margin-top: 10px; float: left; background: #faf0db; border: none; margin-left: 10px;">
                    <span style="float: left; width: 50px; line-height: 2.5em; margin-left: 3px;">option6</span>
                </p>
                <p style="width: 703px; height: 32px; border-bottom: #cdcbcb 1px solid;">
                    <span style="float: left; width: 150px; height: 32px; line-height: 2.5em; border-right: #cdcbcb 1px solid; color: #000000; padding-left: 10px">Concerned problem : </span>
                    <?php
                    $tzgzwt = isset ( $fields ['tzgzwt'] ) ? $fields ['tzgzwt'] : array ();
                    foreach ( $tzgzwtoption as $k => $v ) {
                        ?>
                        <input type="checkbox" name="tzgzwt[]" value="<?php echo $k;?>" <?php echo in_array($k, $tzgzwt)?'checked':''?> class="cpkey" style="margin-top: 10px; float: left; background: #faf0db; border: none; margin-left: 10px;">
                        <span style="float: left; width: 60px; line-height: 2.5em; margin-left: 3px;"><?php echo $v;?></span>
                    <?php
                    }
                    ?>
                </p>
                <p style="width: 703px; height: 32px; border-bottom: #cdcbcb 1px solid;">
                    <span style="float: left; width: 150px; height: 32px; line-height: 2.5em; border-right: #cdcbcb 1px solid; color: #000000; padding-left: 10px">Information source : </span>
                    <?php
                    $tzzxly = isset ( $fields ['tzzxly'] ) ? $fields ['tzzxly'] : array ();
                    foreach ( $tzzxlyoption as $k => $v ) {
                        ?>
                        <input type="checkbox" name="tzzxly[]" value="<?php echo $k;?>" <?php echo in_array($k, $tzzxly)?'checked':''?> class="cpkey" style="margin-top: 10px; float: left; background: #faf0db; border: none; margin-left: 10px;">
                        <span style="float: left; width: 60px; line-height: 2.5em; margin-left: 3px;"><?php echo $v;?></span>
                    <?php
                    }
                    ?>
                </p>
			</div>
					<?php
					if (! isset ( $fields ['submit'] )) {
						?>
							<input type="hidden" name="submit" />
                                <p style="width: 588px; overflow: hidden; text-align: center; margin-top: 22px;">
                                    <input type="image" class="image" src="<?php echo base_url('static/frontend/images/submit.jpg')?>" align="top" style="margin-top: 25px;; margin-left: 10px;">
                                </p>
							<?php
					}
					?>
				</div>
	</form>
</div>