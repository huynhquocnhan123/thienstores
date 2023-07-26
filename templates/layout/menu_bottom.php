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
	<ul>
		<li ><a class="<?php if($_REQUEST['com'] == 'index') echo 'active'; ?>" href="index.html">
		Trang chủ</a></li>

		<li>
			<a class="<?php if($_REQUEST['com'] == 'san-pham') echo 'active'; ?>" href="san-pham.html">Sản phẩm</a>
			<ul>
				<?php for($i = 0; $i < count($p_danhmuc); $i++){ ?>
					<li>
						<a href="san-pham/<?=$p_danhmuc[$i]['tenkhongdau']?>/"><?=$p_danhmuc[$i]['ten']?></a>
					</li>
				<?php } ?>
			</ul>
		</li>
		<li><a class="<?php if($_REQUEST['com'] == 'gioi-thieu') echo 'active'; ?>" href="gioi-thieu.html">Giới thiệu</a></li>
		<li>
			<a class="<?php if($_REQUEST['com'] == 'memories') echo 'active'; ?>" href="javascript:avoid()">Memories</a>
			<ul>
				<?php for($j = 0; $j < count($memories); $j++){ ?>
					<li>
						<a href="memories/<?=$memories[$j]['tenkhongdau']?>.html"><?=$memories[$j]['ten']?></a>
					</li>
				<?php } ?>
			</ul>
		</li>
		<li><a class="<?php if($_REQUEST['com'] == 'lien-he') echo 'active'; ?>" href="lien-he.html">Liên hệ</a></li>
	</ul>
</nav>
