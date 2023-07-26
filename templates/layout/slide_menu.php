<?php

$d->reset();

$sql="select ten$lang as ten,tenkhongdau,id,thumb,noibat from #_product_danhmuc where hienthi=1 and noibat=1 and type='sanpham' order by stt,id desc";

$d->query($sql);

$p_danhmuc=$d->result_array();	

$d->reset();
$sql_brand="select ten$lang as ten,tenkhongdau,id,thumb,noibat from #_product_danhmuc where hienthi=1 and noibat=1 and type='thuonghieu' order by stt,id desc";
$d->query($sql_brand);
$p_thuonghieu=$d->result_array();	

$d->reset();
$sql_memories="select ten$lang as ten,tenkhongdau,id,thumb from #_news where hienthi=1 and type='memories' order by stt,id desc ";
$d->query($sql_memories);
$memories=$d->result_array();  

?>

<a href=".">

	<img class="logo" src="thumb/120x120/2/<?=_upload_hinhanh_l.$row_logo['photo']?>" />

</a>

<ul class="list_menu">

	<li>
		<a href=".">Home</a>
	</li>

	<li >
		<a class="<?php if($_REQUEST['com'] == 'gioi-thieu') echo 'active'; ?>" href="gioi-thieu.html">
			Giới thiệu</a>
	</li>
	
	<li>

		<a href="javascript:avoid()">Shop</a>

		<ul class="dm_cap1">

			<li><a href="san-pham.html">Phụ tùng đồ chơi xe</a></li>

			<?php 

			for($i = 0; $i < count($p_danhmuc); $i++){ 

				$d->reset();

				$sql_dvquan="select ten$lang as ten,tenkhongdau,id from #_product_list where id_danhmuc=".$p_danhmuc[$i]['id']." and type='sanpham' and hienthi=1 order by stt asc,id desc";

				$d->query($sql_dvquan);

				$p_list=$d->result_array();

				?>

				<li>

					<a href="san-pham/<?=$p_danhmuc[$i]['tenkhongdau']?>/"><?=$p_danhmuc[$i]['ten']?></a>
					<?php if(count($p_list)>0) { ?>

						<ul class="dm_cap2">

							<?php for($j=0;$j<count($p_list);$j++) { ?>

								<li><a href="san-pham/<?=$p_list[$j]['id']?>/<?=$p_list[$j]['tenkhongdau']?>/"><?=$p_list[$j]['ten']?></a></li>

							<?php } ?>

						</ul>

					<?php } ?>   
				</li>

			<?php } ?>

		</ul>

		<div class="circle-plus closed">

			<div class="circle">

				<div class="horizontal"></div>

				<div class="vertical"></div>

			</div>

		</div>

	</li>
	<li>

		<a href="javascript:avoid()">Thương hiệu</a>

		<ul class="dm_cap1">

			<li><a href="thuong-hieu.html">Các thương hiệu đồ chơi xe</a></li>

			<?php 

			for($i = 0; $i < count($p_thuonghieu); $i++){ 

				$d->reset();

				$sql_dvquan="select ten$lang as ten,tenkhongdau,id from #_product_list where id_danhmuc=".$p_thuonghieu[$i]['id']." and type='sanpham' and hienthi=1 order by stt asc,id desc";

				$d->query($sql_dvquan);

				$p_list_brand=$d->result_array();

				?>

				<li>

					<a href="thuong-hieu/<?=$p_thuonghieu[$i]['tenkhongdau']?>/"><?=$p_thuonghieu[$i]['ten']?></a>
					<?php if(count($p_list_brand)>0) { ?>

						<ul class="dm_cap2">

							<?php for($j=0;$j<count($p_list_brand);$j++) { ?>

								<li><a href="thuong-hieu/<?=$p_list_brand[$j]['id']?>/<?=$p_list_brand[$j]['tenkhongdau']?>/"><?=$p_list_brand[$j]['ten']?></a></li>

							<?php } ?>

						</ul>

					<?php } ?>   
				</li>

			<?php } ?>

		</ul>

		<div class="circle-plus closed">

			<div class="circle">

				<div class="horizontal"></div>

				<div class="vertical"></div>

			</div>

		</div>

	</li>
	<li >
		<a class="<?php if($_REQUEST['com'] == 'news') echo 'active'; ?>" href="news.html">Tin tức</a>
	</li>
	<li >
		<a class="<?php if($_REQUEST['com'] == 'lien-he') echo 'active'; ?>" href="lien-he.html">Liên hệ</a>
	</li>

</ul>

<span class="close_menu">

	<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"

	width="30" height="30"

	viewBox="0 0 172 172"

	style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#000000"><path d="M30.96,13.76c-9.45834,0 -17.2,7.74166 -17.2,17.2v110.08c0,9.45834 7.74166,17.2 17.2,17.2h110.08c9.45834,0 17.2,-7.74166 17.2,-17.2v-110.08c0,-9.45834 -7.74166,-17.2 -17.2,-17.2zM30.96,20.64h110.08c5.73958,0 10.32,4.58042 10.32,10.32v110.08c0,5.73958 -4.58042,10.32 -10.32,10.32h-110.08c-5.73958,0 -10.32,-4.58042 -10.32,-10.32v-110.08c0,-5.73958 4.58042,-10.32 10.32,-10.32zM57.47219,52.60781l-4.86437,4.86437l28.52781,28.52781l-28.52781,28.52781l4.86437,4.86437l28.52781,-28.52781l28.52781,28.52781l4.86437,-4.86437l-28.52781,-28.52781l28.52781,-28.52781l-4.86437,-4.86437l-28.52781,28.52781z"></path></g></g></svg>

</span>