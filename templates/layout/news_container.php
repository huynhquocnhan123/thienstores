<?php

$d->reset();
$sql = "select * from #_product where type='sanpham' and hienthi=1 and spbanchay=1 order by stt,id desc limit 0,24";
$d->query($sql);
$best_saler = $d->result_array();

?>

<div class="product_saler">
	
	<!-- <div class="news_title">
		<div class="news_title_left">
			<div>Best saler</div>
		</div>
	</div>

	<div class="gallery">

		<?php  for($i=0;$i<count($best_saler);$i++){ ?>

  			<a href="news/<?=$best_saler[$i]['tenkhongdau']?>.html" class="gallery__item<?=$i?> ">
    			<img src="<?=_upload_tintuc_l.$best_saler[$i]['photo']?>" class="gallery__img<?=$i?>" alt="<?=$best_saler[$i]['ten']?>">

    			<div class="box_title_hot_news_post1<?=$i?>">

					<div class="box_name_hot_news<?=$i?>"><?=catchuoi($best_saler[$i]['ten'],60)?></div>

					<div class="box_short_desc_hot_news<?=$i?>"><?=catchuoi($best_saler[$i]['mota'],150)?></div>
				</div>

  			</a>

  		<?php } ?>

	</div>

	<div class="hot_news_see_all">
		<a href="news.html">
			Đọc thêm
		</a>
	</div> -->
	<div class="motocycle_accessories_title">
		<div class="motocycle_accessories_title_left">
			<div>Best saler</div>
		</div>
	</div>
	<div class="slick_product">
		<?php
		foreach($best_saler as $k => $value){
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