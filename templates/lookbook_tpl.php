<?php
$d->reset();
$sql = "select tenkhongdau,ten,id,photo,mota from #_news where type='album' and tenkhongdau='".$_GET['id']."'";
$d->query($sql);
$dslookbook = $d->result_array();
?>


<div id="lookbook">
	
	<?php foreach ($dslookbook as $key => $value) {
		$d->reset();
		$sql = "select id,ten$lang as ten,thumb,photo FROM #_hinhanh where id_hinhanh='".$value['id']."' and type='album'";
		$d->query($sql);
		$hinhthemsp = $d->result_array();
		?>
		<div class="motlookbook">
			<div class="thongtinlookbook">
				<h3><?=$value['ten']?></h3>
				<div class="thongtin_ft">
					<p class="thongtin_mota"><?=$value['mota']?></p>
					<a href="look-book.html"><?=_quaylai?></a>
				</div>
			</div>	
			<div id="col_img">
				<?php foreach ($hinhthemsp as $key => $value1){ ?>
					<div class="hinhthemsp">
						<a href="<?php if($value1['photo']!=NULL) echo _upload_hinhthem_l.$value1['photo']; else echo 'images/noimage.gif';?>"  class="swipebox">
							<img src="<?=_upload_hinhthem_l.$value1['photo']?>" alt="<?=$value1['ten']?>">
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php } ?>
	
</div>