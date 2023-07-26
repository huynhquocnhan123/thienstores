<?php 	

$d->reset();

$sql_slider_banner = "select ten$lang as ten,link,photo from #_slider where  type='banner_product' and hienthi=1 order by stt,id desc";

$d->query($sql_slider_banner);

$slider_banner=$d->fetch_array();

?>
<input type="hidden" value="1" class="soluong"  />
<div class="box_container_product_inside">
		<div class="top_bar product">
			<div class="left">
				<span class="title"><?=$title_cat?></span>
			</div>
		</div>
		<div class="slick_product_inside">
			<?php
			foreach($product as $k => $value){
				$d->reset();
				$sql = "select id,ten$lang as ten,thumb,photo FROM #_hinhanh where id_hinhanh='".$value['id']."' and type='sanpham' limit 0,1";
				$d->query($sql);
				$hinhthemsp = $d->fetch_array();
				?>	
				<div class="product_inside_items">
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

					<div class="details_button_inside">
						<a class="details_link" href="san-pham/<?=$value['tenkhongdau']?>.html">Xem chi tiết</a>
					</div>

				</div>
			<?php } ?>
			<div class="clear"></div>
		</div>
		<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
	<div class="clear"></div>
</div>






