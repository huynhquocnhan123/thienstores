<?php 
$d->reset();
$sql_list_collection = "select * from #_news where  type='collection' and hienthi=1 order by stt,id desc limit 0,3";
$d->query($sql_list_collection);
$list_collection=$d->result_array();

$d->reset();
$sql_collection = "select * from #_about where  type='collection' and hienthi=1 order by stt,id desc limit 0,2";
$d->query($sql_collection);
$collection=$d->fetch_array();
?>
<div id="collection_index">
	<div class="box_container">
		<div class="top_bar">
			<div class="left">
				<span>Collection</span>
				<span class="title">FETISH BRAND'S COLLECTION</span>
			</div>
		</div>
		<div class="collection_content">
			<div class="collection_desc">
				<?=$collection['noidung']?>
			</div>
			<div class="list_collection">
				<?php foreach ($list_collection as $key => $value) { ?>
					<div class="product__item">
					<a href="collection/<?=$value['tenkhongdau']?>.html" class="product__image">
						<img class="img" src="thumb/460x610/1/<?=_upload_tintuc_l.$value['photo']?>" alt="<?=$value['ten']?>">
					</a>
					<a href="collection/<?=$value['tenkhongdau']?>.html" class="see_more">Go to collection <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAABmJLR0QA/wD/AP+gvaeTAAAAWklEQVQ4je3SsQmAQBBE0YdnHVZhYge2YgcaWYFlaCc2ZWR0iZHIIh74s9ngMwzLT/G0GCKFCSumcqX1Jfdobkp3zDiw5GP1rGA8CZugHbNs/JwMOsGP/fMCJ1QDCz6uuPd7AAAAAElFTkSuQmCC"/></a>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>