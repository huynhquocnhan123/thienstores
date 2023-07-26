<?php
include ("ajax_config.php");

$id=(int)$_POST['id'];

$d->reset();
$sql_our_store = "select id,thumb,photo,noidung$lang as noidung FROM #_news where hienthi=1 and type='img_our_store' and id='".$id."' ";
$d->query($sql_our_store);
$hinh_our_store = $d->fetch_array();

$d->reset();
$sql_hinhthem = "select id,ten$lang as ten,thumb,photo FROM #_hinhanh where id_hinhanh='".$hinh_our_store['id']."' and type='img_our_store' order by stt,id desc";
$d->query($sql_hinhthem);
$hinhthem_our_store = $d->result_array();
?>
<script type="text/javascript">
	$(document).ready(function()
     {
  $(".close").click(function() {
    $('#wp_popup_mauve').css("display", "none");
  });
});
</script>

<div id="popup_mauve">
	<div id="slide_img"><img src="thumb/900x700/2/<?=_upload_hinhthem_l.$hinhthem_our_store[0]['photo']?>" alt=""></div>
	<div id="store_content"><?=$hinh_our_store['noidung']?></div>
</div>
<div class="close"><i class="fa fa-times-circle"></i></div>