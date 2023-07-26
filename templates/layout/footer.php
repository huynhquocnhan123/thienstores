<?php 
$d->reset();
$sql_introduce = "select noidung,mota from #_about where type='about' limit 0,1";
$d->query($sql_introduce);
$company_introduce = $d->fetch_array();


$d->reset();
$sql_contact = "select noidung from #_about where type='footer' limit 0,1";
$d->query($sql_contact);
$company_contact = $d->fetch_array();

$d->reset();
$sql_contact = "select photo from #_background where type='logo' limit 0,1";
$d->query($sql_contact); 
$logo_ft = $d->fetch_array();


$d->reset();
$sql2="select * from #_news where type='chinhsach' and hienthi=1 order by stt asc,id desc";
$d->query($sql2);
$chinhsach_ft=$d->result_array();

$d->reset();
$sql_social="select photo,link,ten from #_slider where type='social' and hienthi=1 order by stt asc,id desc";
$d->query($sql_social);
$social=$d->result_array();
?>
<div id="main_footer">

  <div class="col_footer_infomation">
    <div class="footer_information_title">Cửa Hàng</div>
    <div class="footer_address">
        <?=$company_contact['noidung']?>
      </div>
  </div>

  <div class="col_footer_policy">
    <div class="footer_policy_title">Hỗ trợ khách hàng</div>
    <div class="footer_policy">
      <?php  for($i=0;$i<count($chinhsach_ft);$i++){ ?>
        <div class="policy_name"><a href="news/<?=$chinhsach_ft[$i]['tenkhongdau']?>.html"><?=$chinhsach_ft[$i]['ten']?></a></div>
      <?php } ?>
    </div>
  </div>

  <div class="col_footer_social">
    <div class="footer_social_title">Theo dõi chúng tôi</div>
    <div class="social">
         <?php foreach ($social as $key => $value) { ?>
          <a href="<?=$value['link']?>" target="_blank"><img src="<?=_upload_hinhanh_l.$value['photo']?>" ></a>
        <?php } ?>
      </div>
  </div>

</div>






