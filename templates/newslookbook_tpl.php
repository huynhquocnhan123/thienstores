<?php
$d->reset();
$sql = "select tenkhongdau,ten$lang as ten,id,photo,mota$lang as mota,noidung from #_news where type='album'";
$d->query($sql);
$dslookbook = $d->result_array();
?>


<div id="lookbook">
	
	<?php foreach ($dslookbook as $k => $value) {?>
		<div class="motlookbook">
			<div class="thongtinlookbook">
				<a href="look-book/<?=$value['tenkhongdau']?>.html"><h3><?=$value['ten']?></h3></a>
				<div class="loobook_content"><?=$value['noidung']?></div>
				<div class="thongtin_ft">
					
					<p class="thongtin_mota"><?=$value['mota']?></p>
					<a href="look-book/<?=$value['tenkhongdau']?>.html"><?=_seemore?></a>
				</div>
			</div>	
			<div id="col_img">
					<div class="look_book_img">
						<a href="look-book/<?=$value['tenkhongdau']?>.html"><img src="<?=_upload_tintuc_l.$value['photo']?>" alt="<?=$value['ten']?>"></a>		
					</div>
			</div>
		</div>
	<?php } ?>
	
</div>