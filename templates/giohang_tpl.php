<?php
if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
	remove_product($_REQUEST['pid'],$_REQUEST['size'],$_REQUEST['mausac']);
}
else if($_REQUEST['command']=='clear'){
	unset($_SESSION['cart']);
}
else if($_REQUEST['command']=='update'){
	$max=count($_SESSION['cart']);
	for($i=0;$i<$max;$i++){
		$pid=$_SESSION['cart'][$i]['productid'];
		$size=$_SESSION['cart'][$i]['size'];
		$mausac=$_SESSION['cart'][$i]['mausac'];
		$q=intval($_REQUEST['product'.$pid.$size.$mausac]);
		
		if($q>0 && $q<=99999){
			$_SESSION['cart'][$i]['qty']=$q;
		}
		else{
			$msg='Some proudcts not updated!, quantity must be a number between 1 and 99999';
		}
	}
}


$d->reset();
$sql = " select id,ten$lang as ten,phiship from #_news_danhmuc where type='phiship' ";
$d->query($sql);
$dsphishipes =  $d->result_array();

$d->reset();
$sql_bank = " select noidung$lang as noidung from #_about where type='taikhoannganhang' ";
$d->query($sql_bank);
$bank_card =  $d->fetch_array();

$d->reset();
$sql_banner = "select photo from #_background where type='logo' limit 0,1";
$d->query($sql_banner);
$row_logo = $d->fetch_array();
?>
<script type="text/javascript">
	function del(pid,size,mausac){
		if(confirm('Bạn muốn xóa sản phẩm này ra khỏi giỏ hàng ?')){
			document.form1.pid.value=pid;
			document.form1.size.value=size;
			document.form1.mausac.value=mausac;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function clear_cart(){
		if(confirm('This will empty your shopping cart, continue?')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
	function update_cart(){
		document.form1.command.value='update';
		document.form1.submit();
	}
	function quaylai()
	{
		history.go(-1);
	}
	
	function doEnter_update(evt){
		var key;
		if(evt.keyCode == 13 || evt.which == 13){
			update_cart(evt);
		}
	}
</script>
<div class="content">
	<div class="left_gh">
		<a href="."><img class="logo" src="<?=_upload_hinhanh_l.$row_logo['photo']?>" /></a>
		<form name="form1" method="post">
			<input type="hidden" name="pid" />
			<input type="hidden" name="size" />
			<input type="hidden" name="mausac" />
			<input type="hidden" name="command" /> 
			
			<div id="wp_cart_total">
				<div id="giohang">
					<h3>GIỎ HÀNG</h3>
					<div class="list_cart">	
						<?php if(is_array($_SESSION['cart'])){
							$max=count($_SESSION['cart']);
							for($i=0;$i<$max;$i++)
							{
								$pid=$_SESSION['cart'][$i]['productid'];
								$size=$_SESSION['cart'][$i]['size'];
								$mausac=$_SESSION['cart'][$i]['mausac'];
								$q=$_SESSION['cart'][$i]['qty'];
								$pmasp=get_code($pid);					
								$pname=get_product_name($pid);
								$pphoto=get_product_photo($pid);
								$ptenkhongdau = get_product_tenkhongdau($pid);
								if($q==0) continue;
								?>
								<div class="cart_item">	
									<div class="cart_item__img">
										<a href="san-pham/<?=$ptenkhongdau?>.html">
										<img src="<?=_upload_sanpham_l.$pphoto?>"/>
										</a>
									</div>
									<div class="cart_item__info">
										<div class="cart_item__name">
											<a href="san-pham/<?=$ptenkhongdau?>.html" class="name"><?=$pname?></a>
										</div>
										<div class="cart_item__price">
											<span><?=number_format(get_price($pid),0, ',', '.')?>&nbsp;đ</span>
											<span style="padding: 0 10px">X</span>
											<input onblur="update_cart()" onKeyPress="doEnter_update(event)"  type="text" name="product<?=$pid?><?=$size?><?=$mausac?>" value="<?=$q?>" maxlength="5" size="2" style="text-align:center; border:1px solid #d2d2d2; padding:3px 0;" />

										</div>
										<div class="cart_item__color">
											<p>Màu: </p>
											<span class="color_box" style="background-color: <?=$mausac?>"></span>
										</div>
										<div class="cart_item__size">
											<p>Size: </p>
											<span class="size_box"><?=$size?></span>
										</div>
									</div>
									<div class="cart_item__info2">	
										<div class="cart_item__total">
											<span>Thành tiền</span>
										</div>
										<div class="cart_item__total_price">
											<span><?=number_format(get_price($pid)*$q,0, ',', '.') ?>&nbsp;đ</span>
										</div>
										<div class="cart_item__delete">
											<a id="delete" style="text-decoration: none;color: #797878;" href="javascript:del(<?=$pid?>,'<?=$size?>','<?=$mausac?>')">Xóa</a>
										</div>
									</div>	
								</div>	
							<?php } ?>

						<?php } ?>
					</div>
				</div>
				
				<div id="cart_total">
					<h3><?=_tonggiohang?></h3>
					<p><?=_tongtien?><span style="float: right;"><?=number_format(get_order_total(),0, ',', '.')?>&nbsp;đ</span></p>
					<p><?=_phiship?><span style="float:right; "><span class="showphiship">0</span>&nbsp;đ</span></p>
					<!-- <div id="discount">

   						<div class="flex">

   						<input type="text" name="magiamgia" class ="magiamgia" placeholder="Nhập mã giảm giá">

   						<span class="btn_discount">Apply</span>

   						</div>

   						<p class="thongbao_saima"></p>

   					</div> -->
					<p><?=_tongthanhtoan?><span style="float:right; "><span class="tongthanhtoan"><?=number_format(get_order_total(),0, ',', '.')?></span>&nbsp;đ</span></p>
				</div>

			</div>	
		</form>
	</div><!--.left_gh-->
	

	<div class="right_gh">
		<a href="."><img class="logo" src="<?=_upload_hinhanh_l.$row_logo['photo']?>" /></a>
		<form method="post" name="frm_order" id="frm_order" action="" enctype="multipart/form-data" onsubmit="return check();">
			<div class=" col_w50 frm_lienhe">	
				<div class="td_gh"><?=_chitietthanhtoan?></div>
				<input type="hidden" name="phishipan" value="" class="phishipan">
				<input name="tongthanhtoan" class="tongthanhtoanan" type="hidden" value="">
				<input name="magiamgiaan" class="magiamgiaan" type="hidden" value="">
				<div class="item_lienhe"><input name="hoten" type="text" id="hoten" value="<?php if($_POST['hoten']!='')echo $_POST['hoten'];else echo $info_user['ten']?>" placeholder="Họ tên khách hàng" /></div>
				<div class="item_lienhe"><input onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="dienthoai" id="dienthoai" value="<?php if($_POST['dienthoai']!='')echo $_POST['dienthoai'];else echo $info_user['dienthoai']?>" type="text" placeholder="Số điện thoại" /></div> 
				<div class="item_lienhe"><input name="diachi" type="text" id="diachi" value="<?php if($_POST['diachi']!='')echo $_POST['diachi'];else echo $info_user['diachi']?>" placeholder="Địa chỉ giao hàng" /></div>

				<div class="item_lienhe"><input name="email" type="text" id="email" value="<?php if($_POST['email']!='')echo $_POST['email'];else echo $info_user['email']?>" placeholder="Email"/></div>

				<div class="item_lienhe"><textarea name="noidung"  cols="50" rows="4" placeholder="Ghi chú"><?=$_POST['noidung']?></textarea></div>

				<div class="item_lienhe">
					<div class="td_gh">Hình thức thanh toán</div>
					<select name="httt" id="httt">
						<option value=""><?=_chonhinhthucthanhtoan?></option>
						<?php for($i=0,$count_get_httt=count($get_httt);$i<$count_get_httt;$i++) { ?>
							<option value="<?=$get_httt[$i]['id']?>"><?=$get_httt[$i]['ten']?></option>
						<?php } ?>
					</select>
					<div id="tk_nganhang">
							<?=$bank_card['noidung']?>
							<div class="clear"></div>
					</div>
				</div>
				<div class="item_lienhe">
					<div class="td_gh">Vận chuyển đến</div>
					<select class="phiship">
						<option name="phiship" value="0">Chọn vị trí</option>
						<?php for($z=0; $z < count($dsphishipes); $z++){ ?>
							<option name="phiship" value="<?= $dsphishipes[$z]['phiship'] ?>"><?=$dsphishipes[$z]['ten'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<input class="btn button click_ajax" type="button" value="<?=_tieptucmuahang?>" onclick="window.location.href='index.html'" style="color:#000;float: left; background:#fff; padding:6px 25px; border-radius:0;text-decoration: underline;" />
			<input title='<?=_dathang?>' type="button" class="click_ajax click_ajax2" value="<?=_dathang?>" style="float:right;" />
		</form>

		<div class="clear"></div>
	</div>
</div>


