<?php 
$d->reset();
$sql_image = "select ten$lang as ten,link,photo from #_slider where  type='gioithieu' and hienthi=1 order by stt,id desc limit 0,2";
$d->query($sql_image);
$image=$d->result_array();

$d->reset();
$sql_about_us = "select * from #_about where  type='about' and hienthi=1 order by stt,id desc limit 0,2";
$d->query($sql_about_us);
$about_us=$d->fetch_array();
?>
<div id="about_index">
	<div class="box_container">
		<div class="top_bar">
			<div class="left">
				<span>About Us</span>
				<span class="title">OUR STORY</span>
			</div>
			<a href="gioi-thieu.html" class="see_more">See more <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAABmJLR0QA/wD/AP+gvaeTAAAAWklEQVQ4je3SsQmAQBBE0YdnHVZhYge2YgcaWYFlaCc2ZWR0iZHIIh74s9ngMwzLT/G0GCKFCSumcqX1Jfdobkp3zDiw5GP1rGA8CZugHbNs/JwMOsGP/fMCJ1QDCz6uuPd7AAAAAElFTkSuQmCC"/></a>
		</div>
		<div class="wp_about">
			<div class="col_w50 pdr20">
				<div class="about_desc">
					<?=$about_us['mota']?>
				</div>
				<img src="thumb/600x664/1/<?=_upload_hinhanh_l.$image[0]['photo']?>" alt="">
			</div>
			<div class="col_w50 pdl20"><img src="thumb/600x664/1/<?=_upload_hinhanh_l.$image[1]['photo']?>" alt=""></div>
			<div class="clear"></div>
		</div>
	</div>
</div>