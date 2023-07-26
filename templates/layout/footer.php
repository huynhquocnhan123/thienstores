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

  <div class="col_footer_logo">
    <div class="footer_logo_title">Cửa hàng</div>
    <a href="." class="logo_ft"><img src="<?=_upload_hinhanh_l.$row_logo['photo']?>" alt=""></a>
    <span class="intro_logo"><?=$company_introduce['mota']?></span>
  </div>

  <div class="col_footer_infomation">
    <div class="footer_information_title">Thông tin</div>
    <div class="footer_address">
        <?=$company_contact['noidung']?>
      </div>
  </div>

  <div class="col_footer_policy">
    <div class="footer_policy_title">Chính sách</div>
    <div class="footer_policy">
      <?php  for($i=0;$i<count($chinhsach_ft);$i++){ ?>
        <div class="policy_name"><a href="news/<?=$chinhsach_ft[$i]['tenkhongdau']?>.html"><?=$chinhsach_ft[$i]['ten']?></a></div>
      <?php } ?>
    </div>
  </div>

  <div class="col_footer_social">
    <div class="footer_social_title">Thông tin</div>
    <div id="fanpage_content">
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0"></script>
        <div class="fb-page" data-href="<?=$company['fanpage']?>" data-tabs="timeline" data-width="360" data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?=$company['fanpage']?>" class="fb-xfbml-parse-ignore"><a href="<?=$company['fanpage']?>"><?=$company['ten']?></a></blockquote></div>
    </div>
  </div>

</div>






