<form action="<?php echo site_url('home/lala')?>" method="post">
	<input type="text" name="abc" placeholder="Name" value="<?php echo $post['abc']?>">
	<select name="sex">
	<?php 
	foreach ($option as $k=>$v){
		?>
		<option value="<?php echo $k?>" <?php echo $post['sex']==$k?'selected="selected"':'';?>><?php echo $v?></option>
		<?php
	}
	?>
	</select>
	<?php 
	if(!isset($post['submit'])){
		?>
		<input type="submit" name="submit" value="Submit"/>
		<?php
	}
	?>
</form>