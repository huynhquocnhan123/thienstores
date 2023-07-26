<?php

	$d->reset();
	$sql_banner = "select photo from #_background where type='logo' limit 0,1";
	$d->query($sql_banner);
	$row_logo = $d->fetch_array();
	
	$d->reset();
	$sql_banner = "select photo$lang as photo from #_background where type='banner' limit 0,1";
	$d->query($sql_banner);
	$row_banner = $d->fetch_array();
	
	
?>
<?php if($deviceType=="phone") {?>
<div class="content_top">
    <div id="logo">
    	<a href=".">
    		<img class="logo" src="<?=_upload_hinhanh_l.$row_logo['photo']?>" />
    	</a>	
    </div>

    <div class="clear"></div>
</div>
<?php } ?>

<?php /*?>


  

<div id="lienket" class="link_lienket">
	<a class="fb" title="facebook" href="<?=$company['facebook']?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
	<a class="gg" title="google+" href="<?=$company['google']?>" target="_blank"><i class="fa fa-google" aria-hidden="true"></i></a>
	<a class="tw" title="twitter" href="<?=$company['twitter']?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
	
	<a class="yt" title="youtube" href="<?=$company['youtube']?>" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
	</div>
?>
<?php */?>


