<?php

$d->reset();
$sql = "select * from #_product where type='sanpham' and hienthi=1  order by stt,id desc limit 0,24";
$d->query($sql);
$new_product = $d->result_array();
?>
<!-- <a href="san-pham/<?=$value['tenkhongdau']?>.html" class="product__image"> -->
<div class="product_index">
	
		<div class="motocycle_accessories_title">
			<div class="motocycle_accessories_title_left">
				<div>Tất cả sản phẩm</div>
			</div>
		</div>
		<div class="slick_product">
			<?php
			foreach($new_product as $k => $value){
				$d->reset();
				$sql = "select id,ten$lang as ten,thumb,photo FROM #_hinhanh where id_hinhanh='".$value['id']."' and type='sanpham' limit 0,1";
				$d->query($sql);
				$hinhthemsp = $d->fetch_array();
				?>	
				<div class="product_items">
					<a href="san-pham/<?=$value['tenkhongdau']?>.html" class="product__image">
						<img class="img" src="<?=_upload_sanpham_l.$value['thumb']?>" alt="<?=$value['ten']?>">
					</a>
					
					<div class="box_info_product">
						<div class="products_name">
							<?=$value['ten']?>
						</div>
						
						<div class="products_price">
							<p class="products_price">
								<?php if($value['gia'] != 0)echo number_format($value['gia'],0, ',', '.').' đ';else echo _lienhegia; ?>
							</p>
					
							<?php if($value['giacu'] !=0 ){ ?>
								<p class="product_old_price">
									<?=number_format($value['giacu'],0, ',', '.').' đ';?>
								</p>	
							<?php } ?>
						</div>

					</div>

					<div class="details_button">
						<a class="details_link" href="san-pham/<?=$value['tenkhongdau']?>.html">Xem chi tiết</a>
					</div>

				</div>
			<?php } ?>
			
		</div>
	
</div>