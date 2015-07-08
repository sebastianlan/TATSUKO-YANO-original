<div class="hhome">
	<div class="home">
		<div class="hileft">
			<img src="<?php echo base_url('static/frontend/images/homef.gif')?>" />&nbsp;&nbsp;Your position :
            <a href="<?php echo site_url();?>">Home</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">About us</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Contact us</a>
		</div>
		<div class="hiright">
			<a href="javascript:history.go(-1);">Go back&gt;&gt;</a>
		</div>
	</div>
</div>
<div class="mmune">
	<?php 
	foreach ($adslist as $ads){
		?>
		<h2>
		<img src="<?php echo base_url($ads['pic'])?>"
			alt="<?php echo $ads['title']?>" width="<?php echo $ads['width']?>"
			height="<?php echo $ads['height']?>" />
	</h2>
		<?php
	}
	?>
</div>


<div class="mini">
	<div class="ipros_nav">
		<div class="yidiudiu">
			<div>
				<a href="<?=site_url('about/profile')?>">
					<div class="ipro_com"">
						<p>PROFILE</p>
						<H5>Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc.</H5>
					</div>
				</a>
			</div>
			<div>
				<a href="<?=site_url('about/leader')?>">
					<div class="ipro_com">
						<p>LEADER</p>
						<H5>Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent id tempor ipsum.</H5>
					</div>
				</a>
			</div>
			<div>
				<a href="<?=site_url('about/partner')?>">
					<div class="ipro_com">
						<p>PARTNERS</p>
						<H5>Fusce at massa ac nunc porta fringilla sed eget neque. Quisque quis pretium nulla. Fusce eget bibendum neque.</H5>
					</div>
				</a>
			</div>
			<div class="current">
				<div class="ipro_com nomarginright" id="ipro_com_hover">
					<p>CONTACT US</p>
					<H5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis.</H5>
				</div>
			</div>

		</div>
	</div>
	<div class="ipros_list">
		<blockquote>
			<div class="picdiv">
				<h2>Contact us</h2>
				<div class="ipro_conot">
					<div class="font1">
						<h1>Consultation & Appointment</h1>
						<p>
							<img src="<?php echo base_url('static/frontend/images/dianhua.jpg')?>" width="72" height="66" />
						</p>
						<p style="margin-top: 13px;">
							<span style="color: #666666; font-size: 14px;">TEL</span><br />
							<span style="color: #333333; font-size: 18px; line-height: 2em; font-family: Arial; font-weight: bold;">400 8888 8888</span>
						</p>
					</div>

					<div class="fontt">
						<h3 data-lng="121.473193" data-lat="31.233112">Headquarters</h3>
						<p>Tel : <span>021 8768 0986</span></p>
						<p>fax : 021 8768 0986</p>
						<p>Address : 4896 Desert Broom Court Newark, NJ 07102 United States</p>
					</div>
					<div class="fontt" id="shenzheng">
						<h3 data-lng="114.070202" data-lat="22.54807">Shenzhen branch</h3>
                        <p>Tel : <span>021 8768 0986</span></p>
                        <p>fax : 021 8768 0986</p>
                        <p>Address : 4896 Desert Broom Court Newark, NJ 07102 United States</p>
					</div>
					<div class="fontt">
						<h3 data-lng="121.526034" data-lat="31.233552">Shanghai branch</h3>
                        <p>Tel : <span>021 8768 0986</span></p>
                        <p>fax : 021 8768 0986</p>
                        <p>Address : 4896 Desert Broom Court Newark, NJ 07102 United States</p>
					</div>
					<div class="fontt">
						<h3 data-lng="121.473193" data-lat="31.233112">Beijing branch</h3>
                        <p>Tel : <span>021 8768 0986</span></p>
                        <p>fax : 021 8768 0986</p>
                        <p>Address : 4896 Desert Broom Court Newark, NJ 07102 United States</p>
					</div>
					<div class="fontt">
						<h3 data-lng="120.720345" data-lat="31.329724">Hangzhou branch</h3>
                        <p>Tel : <span>021 8768 0986</span></p>
                        <p>fax : 021 8768 0986</p>
                        <p>Address : 4896 Desert Broom Court Newark, NJ 07102 United States</p>
					</div>
					<div id="imap" style="width: 1136px; height: 398px"></div>
				</div>
			</div>

			<p class="clear"></p>

		</blockquote>


		<h6 class="clear"></h6>
	</div>

</div>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=CNX6IoL7z7h5Zgs2xPU0gp8E"></script>
<script type="text/javascript">
	
var map = new BMap.Map("imap");            // 创建Map实例
var point = new BMap.Point(114.070202,22.54807);
map.centerAndZoom(point, 16);

var top_left_control = new BMap.ScaleControl({anchor: BMAP_ANCHOR_TOP_LEFT});// 左上角，添加比例尺
var top_left_navigation = new BMap.NavigationControl();  //左上角，添加默认缩放平移控件
var top_right_navigation = new BMap.NavigationControl({anchor: BMAP_ANCHOR_TOP_RIGHT, type: BMAP_NAVIGATION_CONTROL_SMALL}); //右上角，仅包含平移和缩放按钮
/*缩放控件type有四种类型:
BMAP_NAVIGATION_CONTROL_SMALL：仅包含平移和缩放按钮；BMAP_NAVIGATION_CONTROL_PAN:仅包含平移按钮；BMAP_NAVIGATION_CONTROL_ZOOM：仅包含缩放按钮*/

//添加控件和比例尺
	map.addControl(top_left_control);        
	map.addControl(top_left_navigation);     
	//map.addControl(top_right_navigation);    


var marker = new BMap.Marker(point);
map.addOverlay(marker); 

var html = $('#shenzheng').html();

var opts = {
	enableMessage:false
}
var infoWindow = new BMap.InfoWindow(html, opts);  // 创建信息窗口对象
marker.openInfoWindow(infoWindow); //开启信息窗口

$(".fontt h3").click(function(){
	//console.log($(this).data('map'));
	if($(this).data('lng')==''||$(this).data('lat')==''){
		return false;
	}
	point = new BMap.Point($(this).data('lng'),$(this).data('lat'));
	map.centerAndZoom(point, 16);
	marker = new BMap.Marker(point);
	map.addOverlay(marker);
	html = $(this).parent('.fontt').html(); 
	infoWindow = new BMap.InfoWindow(html, opts);
	marker.openInfoWindow(infoWindow);
});	


</script>

<div class="clear"></div>
