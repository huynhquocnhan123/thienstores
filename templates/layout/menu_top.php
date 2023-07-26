<?php
$d->reset();
$sql="select ten$lang as ten,tenkhongdau,id,thumb,noibat from #_product_danhmuc where hienthi=1 and noibat=1 and type='sanpham' order by stt,id desc";
$d->query($sql);
$p_danhmuc=$d->result_array();	

$d->reset();
$sql2="select ten$lang as ten,tenkhongdau,id,thumb,noibat from #_product_danhmuc where hienthi=1 and noibat=1 and type='thuonghieu' order by stt,id desc";
$d->query($sql2);
$p_thuonghieu=$d->result_array();

$d->reset();
$sql = "select tenkhongdau,ten$lang as ten,id,photo from #_news where type='album'";
$d->query($sql);
$dslookbook = $d->result_array();

$d->reset();
$sql_banner = "select photo from #_background where type='logo' limit 0,1";
$d->query($sql_banner);
$row_logo = $d->fetch_array();


$d->reset();
$sql="select ten$lang as ten,tenkhongdau,id,thumb from #_news where hienthi=1 and type='chinhsach' ";
$d->query($sql);
$dschinhsach=$d->result_array();  

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
?>
<script type="text/javascript">
	function del(pid,size,mausac){
		if(confirm('Bạn muốn xóa sản phẩm này ra khỏi giỏ hàng ?')){
			document.form2.pid.value=pid;
			document.form2.size.value=size;
			document.form2.mausac.value=mausac;
			document.form2.command.value='delete';
			document.form2.submit();
		}
	}

</script>
<nav id="menu">
	<div class="col_w20 main_logo">
		<a href=".">
			<img class="logo" src="<?=_upload_hinhanh_l.$row_logo['photo']?>" />
		</a>
	</div>
	<div class="wap_roof_top_menu">

		<div class="wap_search roof_top_menu">
			
			<div class="search">

				<input type="text" onkeypress="doEnter(event,'keyword');" name="keyword" id="keyword" placeholder="<?=_search?>..." value="<?=@$tukhoa?>" >

				<p class="btn_search" aria-hidden="true" 

				title="<?=_search?>" onclick="onSearch(event,'keyword');" ><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"

				width="20" height="20"

				viewBox="0 0 172 172"

				style=" fill:#ffffff;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M73.45833,21.5c-28.63214,0 -51.95833,23.32621 -51.95833,51.95833c0,28.63212 23.32619,51.95833 51.95833,51.95833c12.38529,0 23.77079,-4.37509 32.71191,-11.64583l35.15446,35.15446c1.34815,1.40412 3.35005,1.96971 5.23364,1.47866c1.88359,-0.49105 3.35456,-1.96202 3.84561,-3.84561c0.49105,-1.88359 -0.07455,-3.88549 -1.47866,-5.23364l-35.15446,-35.15446c7.27074,-8.94112 11.64583,-20.32663 11.64583,-32.71191c0,-28.63212 -23.32619,-51.95833 -51.95833,-51.95833zM73.45833,32.25c22.82242,0 41.20833,18.38593 41.20833,41.20833c0,11.11769 -4.38529,21.16215 -11.49886,28.56169c-0.43849,0.32229 -0.8255,0.7093 -1.14779,1.14779c-7.39953,7.11357 -17.44399,11.49886 -28.56169,11.49886c-22.82242,0 -41.20833,-18.38593 -41.20833,-41.20833c0,-22.8224 18.38591,-41.20833 41.20833,-41.20833z"></path></g></g></svg></p>

				<!-- <div id="kqsearch"></div> -->

				<!-- <div class="recommend_search">

					<h4>Từ khóa gợi ý:</h4>

					<?php foreach ($goiy as $key => $value) { ?>

						<a class="keyword2" data-keyword="<?=$value['ten']?>"><?=$value['ten']?></a>

					<?php } ?>

				</div> -->

			</div>

			<span class="rooftop_border"> / </span>

			<div class="wap_hotline">
				<a class="hotline" href="tel:<?=preg_replace('/[^0-9]/','',$company['dienthoai']);?>">
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAACXBIWXMAAAsTAAALEwEAmpwYAAAA/ElEQVR4nO3UzSpFURgG4J3C9CR1yIRyDzLADTDBmIGhGBzlNriBk9yIyzg3QKT8TQgdHu1stSx7i33Wnsg7/uqpb73fyrI/HUxhB9NNAYu48Z4ehlMD4wHwkU5qZN/X3KGdEjlWnm5K5LACeUlWAqxUILdopUJGcVaC7CYBAmgzAp6aqPEQTiJoLSlSQG2cB8gD5pu6/McAusRsE9Aq+hE0F820MDMotIXXALrHel6GvHVFvfM76g70MxRQPyrDc8UX1KndxmJ14Rt9l17tFWIJFz+EtmsheTBRckdxrjGZJTjYDZyWAFdYGAgIgxEs4wBH2MPYp6H/ZL/MG2hWUD9FHwmrAAAAAElFTkSuQmCC">
				</a>
				<span class="hotline_title">Hotline: </span>
				<a class="hotline" href="tel:<?=preg_replace('/[^0-9]/','',$company['dienthoai']);?>">
					<h3><?=$company['dienthoai']?></h3>
				</a>
			</div>

			<span class="rooftop_border"> / </span>

			<div class="wap_cart">
				<a class="open_cart">
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAACXBIWXMAAAsTAAALEwEAmpwYAAABH0lEQVR4nN3UMUuCURTGcREhMXCqQQI3P0BJLa02FvgVHPoESdDkEjQGDkIN4dIq1KDg0BLoYENztORsuEiT/uOFp0Gh995z1aEOnO15749z33tvIvGvCrgBRurbdSGvzNfuOpBNYA9oCRkCgyX6PA47ZDX17JrqZQXIsQs5XRJ48vk/GeAzEJgCRSci6DoQaXoBQgrAzAh8AXlvRFDXiFyaACE1A/ABZK1ADhhrgXvgKqYvgJ2QKZoC+kDSvIBPAe9C6ro3Pl0xTQQ0CKuOBUlrvzs6ZT7dBsreiKDt6MkHUo5cSrktK3AETLQFPWAjZuLocKB8yYJE2+R8VYGThVw75Aj/1P4vuYOF3J31Mj4Cb8CZI1tV7iH6zhv5k/UNLKjgI+3eLSwAAAAASUVORK5CYII=">
					<span class="sp_cart_top"><?=count($_SESSION['cart'])?></span>
				</a>
			</div>

		</div>
	</div>

</nav>

