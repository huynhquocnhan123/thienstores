<?php  if(!defined('_source')) die("Error");

$d->reset();
$sql = "select id,ten$lang as ten,tenkhongdau,thumb,photo,masp,gia,giacu FROM #_product where spbanchay>0 and type='sanpham' and hienthi=1 order by stt asc,id desc limit 0,12";		
$d->query($sql);
$product_bc = $d->result_array();	





?>