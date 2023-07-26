<?php

$d->reset();
$sql="select ten$lang as ten,tenkhongdau,id,thumb,photo,noibat from #_product_danhmuc where hienthi=1 and noibat=1 and type='thuonghieu' order by stt,id desc";
$d->query($sql);
$new_brand=$d->result_array();	

?>
<div class="brands_index">
	
	<div class="brands_title">
		<div class="brands_title_left">
			<div>Thương hiệu</div>
		</div>
	</div>

	<div class="slick_brands">
		<?php for($i = 0; $i < count($new_brand); $i++){ ?>
			<div class="brands_items">

				<a href="thuong-hieu/<?=$new_brand[$i]['tenkhongdau']?>/" class="product__image">
					<img class="img" src="thumb/140x80/1/<?=_upload_sanpham_l.$new_brand[$i]['photo']?>" alt="<?=$new_brand[$i]['ten']?>">
				</a>

			</div>
		<?php } ?>
			
	</div>

</div>