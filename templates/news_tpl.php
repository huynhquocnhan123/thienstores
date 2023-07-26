

<div class="box_container tips">

	<h1 class="tieude_giua"><span><?=$title_cat?></span></h1>

	<div class="wap_box_new">
		<?php for($i = 0, $count_tintuc = count($tintuc); $i < $count_tintuc; $i++){ ?>
			<div class="box_news">
				<div class="news_img">
					<a href="<?=$com?>/<?=$tintuc[$i]['tenkhongdau']?>.html" title="<?=$tintuc[$i]['ten']?>"><img src="thumb/460x260/1/<?php if($tintuc[$i]['photo']!=NULL)echo _upload_tintuc_l.$tintuc[$i]['photo'];else echo 'images/noimage.png';?>" alt="<?=$tintuc[$i]['ten']?>" /></a>    
				</div>
				<div class="news_content">
					<h3 class="ten"><a href="<?=$com?>/<?=$tintuc[$i]['tenkhongdau']?>.html" title="<?=$tintuc[$i]['ten']?>"><?=$tintuc[$i]['ten']?></a></h3>
					<div class="mota"><?=$tintuc[$i]['mota']?></div>
				</div>
				
				<div class="clear"></div>         
			</div><!---END .box_new--> 
		<?php } ?>
	</div><!---END .wap_box_new-->
	<div class="clear"></div>
	<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
</div><!---END .box_container-->