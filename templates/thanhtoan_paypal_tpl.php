
<div class="content_main">
   	<center>
    	<img src="images/animated-paypal-loading.gif" alt="Icon" class="img_loading" />
    </center> 
</div> 

<?php
	$d->reset();
	$sql_banner = "select photo from #_background where type='logo'";
	$d->query($sql_banner);
	$banner_p = $d->fetch_array();
	$d->reset();
	$sql_tigia = "select tigia from #_company";
	$d->query($sql_tigia);
	$tigia = $d->fetch_array();
	$paypal_url = 'https://www.paypal.com/cgi-bin/webscr';
	$paypal_id="syshop.vn@gmail.com";
	// $paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
	// $paypal_id="quocbao-seller@gmail.com";
	$tongthanhtoan  = $_POST['thongthanhtoan']/$tigia['tigia'];

 ?>

<form action="<?=$paypal_url?>" method="post" class="form_pay">
	<input type="hidden" name="business" value="<?=$paypal_id?>">
	<input type="hidden" name="cmd" value="_xclick">
	<input type="hidden" name="item_name" value="<?=$madonhang?>">
	<input type="hidden" name="item_number" value="<?=count($_SESSION['cart']);?>">
	<input type="hidden" name="credits" value="510">
	<input type="hidden" name="userid" value="1">
	<!-- Tổng phụ + VAT + Phí ship + Số tiền giảm -->
	<input type="hidden" name="amount" value="<?=$tongthanhtoan;?>">
	<input type="hidden" name="cpp_header_image" value="http://<?=$config_url?>/<?=_upload_hinhanh_l.$banner_p['photo']?>" >
	<input type="hidden" name="no_shipping" value="1">
	<input type="hidden" name="currency_code" value="USD">
	<input type="hidden" name="handling" value="0">
	<input type="hidden" name="cancel_return" value="http://<?=$config_url?>/gio-hang.html">
	<input type="hidden" name="return" value="http://<?=$config_url?>/success-paypal/<?=md5($madonhang)?>/">
</form>

