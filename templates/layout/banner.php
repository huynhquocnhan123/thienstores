<?php 	

$d->reset();

$sql_slider_banner = "select * from #_about where  type='banner' and hienthi=1 order by stt,id desc";

$d->query($sql_slider_banner);

$slider_banner=$d->fetch_array();

?>
<div class="wp_banner">
	<img src="<?=_upload_hinhanh_l.$slider_banner['photo']?>" alt="banner">
	<div class="banner_content">
		<div class="text">
			<?=$slider_banner['noidung']?>
		</div>
	</div>
</div>
