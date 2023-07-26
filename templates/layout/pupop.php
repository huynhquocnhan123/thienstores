<?php
$sql_pupop="select photo,ten,hienthi from #_background where hienthi=1 and type='pupop' limit 0,1";
$d->query($sql_pupop);
$pupop=$d->fetch_array();

$sql_fanpage="select photo,ten,hienthi from #_company where hienthi=1 and type='pupop' limit 0,1";
$d->query($sql_pupop);
$pupop=$d->fetch_array();

if(isset($_SESSION['pupop']))
{
	$_SESSION['pupop'] = $_SESSION['pupop'] + 1;
}
else
{
	$_SESSION['pupop'] = 0;
}

if($pupop['hienthi']==1 and $_SESSION['pupop']<1){
	?>

	<link href="css/popup.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript">
		$(document).ready(function(e) {      
			var loginbox = '#login-box';

			var laycao = $('.login-popup').height();
			var layrong = $('.login-popup').width();
			$('.login-popup').css({'width':layrong});	

			$(loginbox).fadeIn(300);
			var chieucao = $(loginbox).height() / 2;
			var chieurong = $(loginbox).width() /2;
			$(loginbox).css({'margin-top':-200,'margin-left':-chieurong});

			$('body').append('<div id="baophu"></div>');
			$('#baophu').fadeIn(300);

			$('#baophu, .close-popup').live('click',function(){
				$('#baophu, .login-popup').fadeOut(300, function(){
					$('#baophu').remove();
				});			
			});
		});
	</script>
	<div id="login-box" class="login-popup">
		<div class="close-popup" title="Đóng quảng cáo">x</div>
		<div class="login">
			<div class="col_w50 popuptrai" style="width: 45%">
				<a href="<?=$pupop['link']?>" title="Xem ngay">
					<img src="thumb/450x450/2/<?=_upload_hinhanh_l.$pupop['photo']?>" class="img_pop_up" /> 
				</a>
			</div>
			<?php 
			$d->reset();
			$sql="select ten,mota,noidung from #_about where  type='about'";
			$d->query($sql);
			$gioithieupopup=$d->fetch_array();
			?>
			<div class="col_w50 popupphai" style="width: 55%">
				<div class="fanpage_popup">
					<h3>Like us on Facebook</h3>
					<p>Stay update with our newest Promotion and Collection</p>
					<div class="fb-like" data-href="<?=$company['fanpage']?>" data-width="400" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
					<div id="fb-root"></div>
					<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0&appId=1858359911051054&autoLogAppEvents=1"></script>
				</div>
				<?php include _template."layout/dangkynhantin.php";?>
			</div>
		</div>
		<div class="clear"></div>
	</div>
<?php } ?>
