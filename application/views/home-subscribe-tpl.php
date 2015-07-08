<?php
?>
<style>
@utf-8
html{ _overflow-y: scroll}
body,a,div,dl,dd,dt,h1,h2,h3,h4,h5,h6,h7,li,ul,p,span,img,input{ padding:0px; margin:0px; font-size:12px}
img{ vertical-align:middle ; border-style:none}
body{ font-family:"Microsoft Yahei"; background:#FFFFFF; font-size:12px; color:#333333;line-height:1.5em;}
a{ text-decoration:none;}
li{ list-style:none}
.clear{clear:both;}

ul,li{list-style:none;}


.job-list ul,.job-list li{
	padding:0px;
	margin: 0px;
	list-style: none;
	color: #333;
}
.job-list li{
	margin-top: 15px;
	padding-bottom: 15px;
	border-bottom: 1px dashed #ccc; 
	background: url('../images/jobico.png') no-repeat 0px 3px;
	padding-left: 25px;
}
.job-list li a{
	color: #333;
	text-decoration: none;
}
.job-list li a:hover{
	color: #9f4f00;
}
.job-list li div.title{
	line-height: 20px;
}
.job-list li span.date{
	display: inline-block;
	float: right;
	color: #999;
}

.job-list li div.job-des{
	line-height: 20px;
	margin-top: 5px;
	color: #999999;
}

.article-right p{
	color: #999;
	line-height: 22px;
}
.article-right .active{
	color: #9f4f00;
}
.job-list-title{
	height: 37px;
	line-height: 37px;
	border-bottom: 1px dashed #ccc; 
	background: url('../images/jobico2.png') no-repeat top left;
	padding-left: 35px;
}
.job-list-title span.title{
	display: inline-block;
	color: #666666;
	font-size: 18px;
}
.job-list-title span.address{
	margin-left: 15px;
	color: #666666;
	display: inline-block;

}

.job-list-title span.date{
	float: right;
	margin-right: 5px;
	display: inline-block;
	color: #999;
}
.job-list-con,.job-why-con,.job-us-con{
	margin-top:15px;
	margin-bottom: 30px; 
	padding-left: 5px;
}
.job-list-con h4{
	font-size: 12px;
	color: #333;
	font-weight: bold;
	line-height: 30px;
}
.job-list-con p,.job-back p,.job-why-con p{
	line-height: 22px;
	color: #666666;
}

.list .arrow{
	margin-top: 20px;
	height: 50px;
	line-height: 50px;
	border-bottom: 1px dashed #ccc; 
}

.list .arrow a{
	padding-right: 70px;
	padding-left: 5px;
	display: inline-block;
	font-size: 18px;
	color: #333;
}
.list .arrow a.active i{
	color: #ec5801;
}

.job-list-title2{
}

.job-list2 ul{
	padding:0px;
	margin: 0px;
	list-style: none;
	color: #333;
}

.page-title0{
	font-size: 30px;
	color: #ec5601;

}

.job-list-title0{
	line-height: 37px;
	border-bottom: 1px solid #ccc; 
}

.job-list-title0 span.add{
	color:#999999;
	display: inline-block;

}

.job-list-conn input {border:0px solid #c00; margin-left:10px;} 


.job-list-conn img{ vertical-align:top; margin-left:10px; float:left}

.job-list-conn{
	margin-top:15px;
	margin-bottom: 30px; 
	padding-left: 5px; text-align:center
}
.job-list-conn h4{
	font-size: 12px;
	color: #333;
	font-weight: bold;
	line-height: 30px;
}
.job-list-conn p{
	line-height: 22px;
	color: #666666;
}



</style>
<div class="job-list">
	<div class="job-list-title0">
        <div class="page-title0">Online Booking</div>
        <span class="add">Please fill in listed below information , * is required .</span>
	</div>
	<div class="job-list-conn">
		<form name="formSeach" id="formSeach"action="<?php echo site_url('home/subscribe')?>" method="post">
            <p style="width: 790px; overflow: hidden; margin-bottom: 20px;">
                <span style="float: left; width: 230px; text-align: right; line-height: 2em">Name</span>
                <input type="text" name="name" size="27" class="cpkey" value="<?php echo isset($fields['name'])?$fields['name']:'';?>" required style="height: 23px; line-height: 22px; color: #999999; padding-left: 5px; background: #faf0db; border: #909090 1px solid; float: left; margin-left: 10px;" />
                <span style="color: #a40000; float: left; line-height: 2em; margin-left: 8px;">*</span>
                <span style="color: #6e6e6e; float: left; line-height: 2em; margin-left: 8px;">Please enter your real name</span>
            </p>
            <p style="width: 790px; overflow: hidden; margin-bottom: 17px;">
                <span style="float: left; width: 230px; text-align: right; line-height: 2em">Mobile No</span>
                <input type="text" name="mobile" size="27" class="cpkey" value="<?php echo isset($fields['mobile'])?$fields['mobile']:'';?>" required style="height: 23px; line-height: 22px; color: #999999; padding-left: 5px; background: #faf0db; border: #909090 1px solid; float: left; margin-left: 10px;" />
                <span style="color: #a40000; float: left; line-height: 2em; margin-left: 8px;">*</span>
                <span style="color: #6e6e6e; float: left; line-height: 2em; margin-left: 8px;">Please enter your contact phone number</span>
            </p>

            <p style="width: 790px; overflow: hidden">
                <span style="float: left; width: 230px; text-align: right; line-height: 2em">Product</span>
                <?php
                $wantprodcut = isset ( $fields ['wantproduct'] ) ? $fields ['wantproduct'] : array ();
                foreach ( $product as $k => $v ) {
                    ?>
                    <input type="checkbox" name="wantproduct[]" value="<?php echo $k;?>" class="cpkey" <?php echo in_array($k, $wantprodcut)?'checked':'';?> style="margin-top: 6px; float: left; background: #faf0db; border: none; margin-left: 10px;">
                    <span style="float: left; width: 90px;"><?php echo $v;?></span>
                <?php
                }
                ?>
            </p>

            <div id="box3" class="box3">
                <p style="width: 790px; overflow: hidden; margin-bottom: 17px; margin-top: 17px;">
                    <span style="float: left; width: 230px; text-align: right; line-height: 2em">Age</span>
                    <input type="text" name="age" size="27" class="cpkey" value="<?php echo isset($fields['age'])?$fields['age']:'';?>" style="height: 23px; line-height: 22px; color: #999999; padding-left: 5px; background: #faf0db; border: #909090 1px solid; float: left; margin-left: 10px;" />
                </p>

                <?php
                $type = isset ( $fields ['type'] ) ? $fields ['type'] : 0;
                ?>

                <p style="width: 790px; overflow: hidden">
                    <span style="float: left; width: 230px; text-align: right; line-height: 2em">Character</span>
                    <input type="radio" name="type" value="1" <?php echo $type==1?'checked':'';?> class="cpkey" style="margin-top: 6px; float: left; background: #faf0db; border: none; margin-left: 10px;">
                    <span style="float: left; width: 90px;">option1</span>
                    <input type="radio" name="type" value="2" <?php echo $type==2?'checked':'';?> class="cpkey" style="margin-top: 6px; float: left; background: #faf0db; border: none; margin-left: 10px;">
                    <span style="float: left; width: 90px;">option2</span>
                </p>
                <p style="width: 790px; overflow: hidden; margin-bottom: 17px; margin-top: 17px;">
                    <span style="float: left; width: 230px; text-align: right; line-height: 2em">E-mail</span>
                    <input type="text" name="email" size="27" class="cpkey" value="<?php echo isset($fields['email'])?$fields['email']:'';?>" style="height: 23px; line-height: 22px; color: #999999; padding-left: 5px; background: #faf0db; border: #909090 1px solid; float: left; margin-left: 10px;" />
                </p>
                <p style="width: 790px; overflow: hidden">
                    <span style="float: left; width: 230px; text-align: right; line-height: 2em">Condition</span>
                    <?php
                    $oldproduct = isset ( $fields ['oldproduct'] ) ? $fields ['oldproduct'] : array ();
                    foreach ( $product as $k => $v ) {
                        ?>
                        <input type="checkbox" name="oldproduct[]" value="<?php echo $k;?>" class="cpkey" <?php echo in_array($k, $oldproduct)?'checked':'';?> style="margin-top: 6px; float: left; background: #faf0db; border: none; margin-left: 10px;">
                        <span style="float: left; width: 90px;"><?php echo $v;?></span>
                    <?php
                    }
                    ?>
                </p>
                <p style="width: 790px; overflow: hidden; margin-bottom: 17px; margin-top: 17px;">
                    <span style="float: left; width: 230px; text-align: right; line-height: 2em">Description</span>
                    <textarea name="desc" rows="8" cols="70" id="textContent" style="margin-top: 6px; float: left; background: #faf0db; border: 1px #999999 solid; margin-left: 10px;; margin-left: 10px;"><?php echo isset($fields['desc'])?$fields['desc']:'';?></textarea>
                </p>
                <p style="width: 790px; overflow: hidden; margin-bottom: 17px; margin-top: 17px;">
                    <span style="float: left; width: 230px; text-align: right; line-height: 2em">Address</span>
                    <input type="text" name="addr" size="50" class="cpkey" value="<?php echo isset($fields['addr'])?$fields['addr']:'';?>" style="height: 23px; line-height: 22px; color: #999999; padding-left: 5px; background: #faf0db; border: #909090 1px solid; float: left; margin-left: 10px;" />
                </p>
                <p style="width: 790px; overflow: hidden; margin-bottom: 17px; margin-top: 17px;">
                    <span style="float: left; width: 230px; text-align: right; line-height: 2em">Postcode</span>
                    <input type="text" name="areacode" size="27" class="cpkey" value="<?php echo isset($fields['areacode'])?$fields['areacode']:'';?>" style="height: 23px; line-height: 22px; color: #999999; padding-left: 5px; background: #faf0db; border: #909090 1px solid; float: left; margin-left: 10px;" />
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
		</form>
	</div>
</div>