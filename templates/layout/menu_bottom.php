<?php 
$d->reset();
$sql="select ten$lang as ten,tenkhongdau,id,thumb,noibat from #_product_danhmuc where hienthi=1 and noibat=0 and type='sanpham' order by stt,id desc";
$d->query($sql);
$p_danhmuc=$d->result_array();	

$d->reset();
$sql_memories="select ten$lang as ten,tenkhongdau,id,thumb from #_news where hienthi=1 and type='memories' order by stt,id desc ";
$d->query($sql_memories);
$memories=$d->result_array();  
?>
<nav id="menu">
	<ul class="list_menu">
			<li >
				<a class="<?php if($_REQUEST['com'] == 'index') echo 'active'; ?>" href="index.html">
					Trang chủ
				</a>
			</li>
			<li ><a class="<?php if($_REQUEST['com'] == 'gioi-thieu') echo 'active'; ?>" href="gioi-thieu.html">
			Giới thiệu</a></li>
			<li>
				<a class="<?php if($_REQUEST['com'] == 'san-pham') echo 'active'; ?>" href="san-pham.html">
					Phụ tùng đồ chơi xe 
				</a>
				<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAPCAYAAAA71pVKAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAkElEQVR4nOXQoQ3CABCF4YKoqkOgMCwASWXXwLAAK2CRrMAUbIDCYpgAg2IDCP1I4URpAq2GZy75773L3SXJnwpTFB29BSZ1sMINy5bgAtfKX4c5Ll7aIG2E0uDClzenjnB4ttljGHyAXfAjxp/WyrAN4wnzqIJnbQ/pVbfjHqESa/S/v/J9yAznqnYOJb+vB32crStj7iGaAAAAAElFTkSuQmCC">
				<ul>
					<?php for($i = 0; $i < count($p_danhmuc); $i++){
						$d->reset();
						$sql_dvquan="select ten$lang as ten,tenkhongdau,id from #_product_list where id_danhmuc=".$p_danhmuc[$i]['id']." and type='sanpham' and hienthi=1 order by stt asc,id desc";
						$d->query($sql_dvquan);
						$p_list=$d->result_array();
						?>
						<li>
							<a href="san-pham/<?=$p_danhmuc[$i]['tenkhongdau']?>/"><?=$p_danhmuc[$i]['ten']?></a>
							<?php if(count($p_list)>0) { ?>
								<ul class="dm_cap2">
									<?php for($j=0;$j<count($p_list);$j++) {
										$d->reset();
										$sql="select ten$lang as ten,tenkhongdau,id from #_product_cat where id_list=".$p_list[$j]['id']." and type='sanpham' and hienthi=1 order by stt asc,id desc";
										$d->query($sql);
										$p_cat=$d->result_array();
										?>
										<li><a href="san-pham/<?=$p_list[$j]['id']?>/<?=$p_list[$j]['tenkhongdau']?>/"><?=$p_list[$j]['ten']?></a>
										</li>
									<?php } ?>

								</ul>

							<?php } ?>
						</li>
					<?php } ?>
				</ul>
			</li>
			<li>
				<a class="<?php if($_REQUEST['com'] == 'thuong-hieu') echo 'active'; ?>" href="thuong-hieu.html">
					Thương hiệu
				</a>
				<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAPCAYAAAA71pVKAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAkElEQVR4nOXQoQ3CABCF4YKoqkOgMCwASWXXwLAAK2CRrMAUbIDCYpgAg2IDCP1I4URpAq2GZy75773L3SXJnwpTFB29BSZ1sMINy5bgAtfKX4c5Ll7aIG2E0uDClzenjnB4ttljGHyAXfAjxp/WyrAN4wnzqIJnbQ/pVbfjHqESa/S/v/J9yAznqnYOJb+vB32crStj7iGaAAAAAElFTkSuQmCC">
				<ul>
					<?php for($i = 0; $i < count($p_thuonghieu); $i++){
						$d->reset();
						$sql_dvquan="select ten$lang as ten,tenkhongdau,id from #_product_list where id_danhmuc=".$p_thuonghieu[$i]['id']." and type='thuonghieu' and hienthi=1 order by stt asc,id desc";
						$d->query($sql_dvquan);
						$p_list_brand=$d->result_array();
						?>
						<li>
							<a href="thuong-hieu/<?=$p_thuonghieu[$i]['tenkhongdau']?>/"><?=$p_thuonghieu[$i]['ten']?></a>
							<?php if(count($p_list_brand)>0) { ?>
								<ul class="dm_cap2">
									<?php for($j=0;$j<count($p_list_brand);$j++) { ?>
										<li><a href="thuonghieu/<?=$p_list_brand[$j]['id']?>/<?=$p_list_brand[$j]['tenkhongdau']?>/"><?=$p_list_brand[$j]['ten']?></a>
										</li>
									<?php } ?>

								</ul>

							<?php } ?>
						</li>
					<?php } ?>
				</ul>
			</li>
			<li ><a class="<?php if($_REQUEST['com'] == 'news') echo 'active'; ?>" href="news.html">
			Tin tức</a></li>
			<li ><a class="<?php if($_REQUEST['com'] == 'lien-he') echo 'active'; ?>" href="lien-he.html">
			Liên hệ</a></li>
		</ul>
</nav>
