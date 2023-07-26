<?php 
$d->reset();
$sql="select ten$lang as ten,tenkhongdau,id,thumb,noibat from #_product_danhmuc where hienthi=1 and noibat=1 and type='sanpham' order by stt,id desc limit 0,10";
$d->query($sql);
$p_danhmuc=$d->result_array();	

$d->reset();
$sql2="select ten$lang as ten,tenkhongdau,id,thumb,noibat from #_product_danhmuc where hienthi=1 and noibat=1 and type='thuonghieu' order by stt,id desc limit 0,10";
$d->query($sql2);
$p_danhmuc2=$d->result_array();	
?>
<div class="banner">
	<div class="container__category">
		<ul class="category_list_level">
			<li>
				<div class="category_title">
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAACXBIWXMAAAsTAAALEwEAmpwYAAAA1klEQVR4nM2SwQoBURSGvwUba02zt5K1hWTpLWy8hBRW8gSmxIairChPwCNYWFCsLVHE7uiYGSFjZmw49dWt85//3HPvgX+KNFABaj5Ugcxrcco02E16yKTrQw8xDQ5Ow1tETIPzbIycNsFQrWlwAeJqEMumgxe7aA2QfDLYLZFGGamXkGELWczss4vmVONpsF8hAwvpN9+jOdV4GhzXdtdPqCbQCHWH7RyxGgFHOH35iJGw3zgd3b8xYW8C5HQ5Qi5SAYi6Bhp5oA10fFBNUW/+WPy7uAKE6VDqsVf8dwAAAABJRU5ErkJggg==">
					DANH MỤC SẢN PHẨM
				</div>
				<ul>
					<?php for($i = 0; $i < count($p_danhmuc); $i++){
						$d->reset();
						$sql_dvquan="select ten$lang as ten,tenkhongdau,id from #_product_list where id_danhmuc=".$p_danhmuc[$i]['id']." and type='sanpham' and hienthi=1 order by stt asc,id desc";
						$d->query($sql_dvquan);
						$p_list=$d->result_array();
						?>
						<li class="category_level_1">
							<div class="category_level1_name">
								<a href="san-pham/<?=$p_danhmuc[$i]['tenkhongdau']?>/"><?=$p_danhmuc[$i]['ten']?></a>
							</div>
							<?php if(count($p_list)>0) { ?>
								<ul class="category_level_2">
									<?php for($j=0;$j<count($p_list);$j++) {
										$d->reset();
										$sql="select ten$lang as ten,tenkhongdau,id from #_product_cat where id_list=".$p_list[$j]['id']." and type='sanpham' and hienthi=1 order by stt asc,id desc";
										$d->query($sql);
										$p_cat=$d->result_array();
										?>
										<li>
											<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAkAAAAJCAYAAADgkQYQAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAVUlEQVR4nIWQXQ5AQAwG17s9J9lwa8sxRoomn6ZiHtvpbykBYIyxC2AAFuDgZgeaxVVan2SkqWSVGd2F+iE49a/TpuNsyYxJJbvOxO4dgPl1nZL96QTiZcX2auS/RgAAAABJRU5ErkJggg==">
											<a href="san-pham/<?=$p_list[$j]['id']?>/<?=$p_list[$j]['tenkhongdau']?>/"><?=$p_list[$j]['ten']?></a>
										</li>
									<?php } ?>

								</ul>

							<?php } ?>
						</li>
					<?php } ?>
				</ul>
			</li>
		</ul>



		<ul class="brand_list_level">
			<li>
				<div class="category_title">
					THƯƠNG HIỆU
				</div>
				<ul>
					<?php for($i = 0; $i < count($p_danhmuc2); $i++){
						$d->reset();
						$sql_dvquan="select ten$lang as ten,tenkhongdau,id from #_product_list where id_danhmuc=".$p_danhmuc2[$i]['id']." and type='thuonghieu' and hienthi=1 order by stt asc,id desc";
						$d->query($sql_dvquan);
						$p_list=$d->result_array();
						?>
						<li class="brand_level_1">
							<div class="brand_level1_name">
								<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAVklEQVR4nJ2PAQrAIAwDb3vqNv+n7oFKQES0ohgIFL22KRzoBhwQgQB8wGVBP5A6x/JX5QwoFb8tqM4ZqBhboG9BBZ+BT3+MNVVrh8v1oOBaJaseoKUyfx0rWo4UvE0AAAAASUVORK5CYII=">
								<a href="thuong-hieu/<?=$p_danhmuc2[$i]['tenkhongdau']?>/"><?=$p_danhmuc2[$i]['ten']?></a>
							</div>
							<?php if(count($p_list)>0) { ?>
								<ul class="brand_level_2">
									<?php for($j=0;$j<count($p_list);$j++) {
										$d->reset();
										$sql="select ten$lang as ten,tenkhongdau,id from #_product_cat where id_list=".$p_list[$j]['id']." and type='thuonghieu' and hienthi=1 order by stt asc,id desc";
										$d->query($sql);
										$p_cat=$d->result_array();
										?>
										<li>
											<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAVklEQVR4nJ2PAQrAIAwDb3vqNv+n7oFKQES0ohgIFL22KRzoBhwQgQB8wGVBP5A6x/JX5QwoFb8tqM4ZqBhboG9BBZ+BT3+MNVVrh8v1oOBaJaseoKUyfx0rWo4UvE0AAAAASUVORK5CYII=">
											<a href="thuong-hieu/<?=$p_list[$j]['id']?>/<?=$p_list[$j]['tenkhongdau']?>/"><?=$p_list[$j]['ten']?></a>
										</li>
									<?php } ?>

								</ul>

							<?php } ?>
						</li>
					<?php } ?>
				</ul>
			</li>
		</ul>
	</div>
	<div class="container__img">
		<img src="images/banner.jpg">
	</div>
</div>