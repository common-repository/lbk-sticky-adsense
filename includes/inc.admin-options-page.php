<h1 class = "wp-heading-inline">
		Sticky Adsense
</h1>
<hr class="wp-header-end">
<form id="landingOptions" method="post" action="options.php">
<?php settings_fields( 'lbk_sticky_adsense_settings' ); ?>

<h2>Hiển thị</h2>
<table class="form-table" role="presentation">

	<tbody>
		<tr>
			<th>
				<label for="main_content_width">Enter google adsense id</label>
			</th>
			<td>
				<input  type="text" name="sticky_adsense_client_id" id="sticky_adsense_client_id" value="<?php echo esc_attr(get_option('sticky_adsense_client_id') !== '') ? get_option('sticky_adsense_client_id')  : "1200" ?>" class="regular-text" onchange="myScript()">
			</td>
		</tr>
		<tr>
			<th scope="row">Hiển thị Quảng Cáo</th>
			<td>
				<label for="display_sticky_adsense"><input <?php if(get_option('display_sticky_adsense') == 'yes') echo 'checked'; ?> name="display_sticky_adsense" type="checkbox" id="display_sticky_adsense" value="yes">Hiển thị Quảng Cáo</label>
			</td>
		</tr>
		<tr>
			<th scope="row"></th>
			<td>
				<label for="hide_sticky_adsense_on_page"><input <?php if(get_option('hide_sticky_adsense_on_page') == 'yes') echo 'checked'; ?> name="hide_sticky_adsense_on_page" type="checkbox" id="hide_sticky_adsense_on_page" value="yes">Không hiển thị tại trang</label>
			</td>
		</tr>
		<tr>
			<th scope="row"></th>
			<td>
				<label for="hide_sticky_adsense_on_single"><input <?php if(get_option('hide_sticky_adsense_on_single') == 'yes') echo 'checked'; ?> name="hide_sticky_adsense_on_single" type="checkbox" id="hide_sticky_adsense_on_single" value="yes">Không hiển thị tại trang chi tiết bài viết</label>
			</td>
		</tr>
		<tr>
			<th scope="row"></th>
			<td>
				<label for="hide_sticky_adsense_on_product_page"><input <?php if(get_option('hide_sticky_adsense_on_product_page') == 'yes') echo 'checked'; ?> name="hide_sticky_adsense_on_product_page" type="checkbox" id="hide_sticky_adsense_on_product_page" value="yes">Không hiển thị tại trang chi tiết sản phẩm</label>
			</td>
		</tr>
	</tbody>
</table>

<h2>Khoảng Cách</h2>
<table class="form-table" role="presentation">
	<tbody>
		<tr>
			<th><label for="main_content_width">Chiều rộng khối nội dung</label></th>
			<td><input  type="number" name="main_content_width" id="main_content_width" value="<?php echo esc_attr(get_option('main_content_width') !== '') ? get_option('main_content_width')  : "1200" ?>" class="regular-text" onchange="myScript()"><span class ="description">Chiều rộng hay gặp: 1024 - 1200 - 1280 - 1366 - 1440... </span></td>
		</tr>
		<tr>
			<th><label for="sticky_adsense_col_width">Chiều rộng khối quảng cáo</label></th>
			<td><input type="number" name="sticky_adsense_col_width" id="sticky_adsense_col_width" value="<?php echo esc_attr(get_option('sticky_adsense_col_width') !== '') ? get_option('sticky_adsense_col_width')  : "200" ?>" class="regular-text" onchange="myScript()"><span class ="description">Chiều rộng hay gặp: 200 - 250 </span></td>
		</tr>
		<tr>
			<th><label for="sticky_adsense_top_space">Khoảng cách đến phía trên</label></th>
			<td><input type="number" name="sticky_adsense_top_space" id="sticky_adsense_top_space" value="<?php echo esc_attr(get_option('sticky_adsense_top_space') !== '') ? get_option('sticky_adsense_top_space')  : "150" ?>" class="regular-text"><span class ="description">Khoảng cách hay gặp: 100 - 150 </span></td>
		</tr>
		<tr>
			<th><label for="sticky_adsense_space">Khoảng cách giữa quảng cáo và nội dung</label></th>
			<td><input type="number" name="sticky_adsense_space" id="sticky_adsense_space" value="<?php echo esc_attr(get_option('sticky_adsense_space') !== '') ? get_option('sticky_adsense_space')  : "0" ?>" class="regular-text" onchange="myScript()"></td>
		</tr>
		<p class="description sticty_adsense_message "></p>

	</tbody>
</table>
<script type="text/javascript">
	function myScript() {
		var message = document.querySelector('.sticty_adsense_message');
		
		var contentWidth = document.querySelector('#main_content_width').value;
		var stickyAdsenseDivWidth = document.querySelector('#sticky_adsense_col_width').value;
		var adsenseTopSpace = document.querySelector('#sticky_adsense_top_space').value;
		var adsenseSpace = document.querySelector('#sticky_adsense_space').value; 


		var minDeviceWidth = parseInt(contentWidth) + parseInt(stickyAdsenseDivWidth)*2 + parseInt(adsenseSpace)*2;
		message.innerHTML = 'Quảng cáo của bạn chỉ có thể hiện thị trên thiết bị có màn hình lớn hơn ' +'<kbd>' + minDeviceWidth + 'px'+'</kbd>'; 
		if(minDeviceWidth > 1920) {
			message.classList.add('notice-warning');
			message.classList.add('notice');
		}else {
			message.classList.remove('notice-warning');
			message.classList.remove('notice');
		}
	}
	myScript();
</script>

<?php settings_fields( 'lbk_sticky_adsense_settings' ); ?>
	<p class="submit">		
		<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
	</p>

</form>