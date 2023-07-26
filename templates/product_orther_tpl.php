<?php 	

$d->reset();

$sql_slider_banner = "select ten$lang as ten,link,photo from #_slider where  type='banner_product' and hienthi=1 order by stt,id desc";

$d->query($sql_slider_banner);

$slider_banner=$d->fetch_array();

?>
<input type="hidden" value="1" class="soluong"  />
<div class="box_container">
		<div class="wp_product inside mh-600">
			<?php
			foreach($product as $k => $value){
				$d->reset();
				$sql = "select id,ten$lang as ten,thumb,photo FROM #_hinhanh where id_hinhanh='".$value['id']."' and type='sanpham' limit 0,1";
				$d->query($sql);
				$hinhthemsp = $d->fetch_array();
				?>	
				<div class="product__item">
					<a href="<?=$com?>/<?=$value['tenkhongdau']?>.html" class="product__image">
						<img class="img" src="images/loading.gif" data-src="<?=_upload_sanpham_l.$value['thumb']?>" alt="<?=$value['ten']?>">
					</a>
					<?php if($hinhthemsp['photo']!=''){ ?> 
						<a href="<?=$com?>/<?=$value['tenkhongdau']?>.html" title="<?=$value['ten']?>" class="product__image-plus">
							<img class="img" src="<?=_upload_hinhthem_l.$hinhthemsp['thumb']?>" alt="<?=$value['ten']?>" />
						</a>
					<?php } ?>
					<a href="<?=$com?>/<?=$value['tenkhongdau']?>.html" class="product__name">
						<?=$value['ten']?>
					</a>
					<br>
					<p class="product__price">
						<?php if($value['gia'] != 0)echo number_format($value['gia'],0, ',', '.').' đ';else echo _lienhegia; ?>
					</p>
					<?php if($value['giacu'] !=0 ){ ?>
						<p class="product_old_price">
							<?=number_format($value['giacu'],0, ',', '.').' đ';?>
						</p>	
					<?php } ?>
					<?php if($value['mausac']!=''){ ?> 
					<div class="product_color">
						<a href="<?=$com?>/<?=$value['tenkhongdau']?>.html">
						<?php 
						$arr_mausac = explode(',',$value['mausac']);

						foreach($arr_mausac as $key=>$value2)
						{
							echo '<span class="mausac2" style="background:'.$value2.'"></span>';
						}
						?>
						</a>
						<div class="clear"></div>
					</div>
					<?php } ?>

				</div>
			<?php } ?>
			<div class="clear"></div>
			
		</div>
	<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
	<div class="clear"></div>
</div>






