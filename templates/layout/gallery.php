<?php

$d->reset();

$sql_gallery = "select ten$lang as ten,link,photo from #_slider where  type='gallery' and hienthi=1 order by stt asc limit 0,2";

$d->query($sql_gallery);

$gallery=$d->result_array();

?>

<div class="wp_gallery">

	<?php foreach ($gallery as $key => $value) { ?>

		<div class="gallery__item zoom_hinh">

			<a href="<?=$value['link']?>" target="_blank"><img  src="thumb/1000x1000/1/<?=_upload_hinhanh_l.$value['photo']?>" alt="Gallery"></a>

		</div>

	<?php } ?>
	<div class="clear"></div>
</div>
