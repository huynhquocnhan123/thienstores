<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/my_script.js"></script>
<link href="fontawesome/css/font-awesome.css" type="text/css" rel="stylesheet" />
<!--Menu mobile-->
<script type="text/javascript" src="js/jquery.mmenu.min.all.js"></script>
<script type="text/javascript">
	$(function() {
		$m = $('nav#menu').html();
		$('nav#menu_mobi').append($m);
		$('nav#menu_mobi .search').addClass('search_mobi').removeClass('search');
		$('.hien_menu').click(function(){
			$('nav#menu_mobi').css({height: "auto"});
		});
		$('.user .fa-user-plus').toggle(function(){
			$('.user ul').slideDown(300);
		},function(){
			$('.user ul').slideUp(300);
		});
		
		$('nav#menu_mobi').mmenu({
			extensions	: [ 'effect-slide-menu', 'pageshadow' ],
			searchfield	: true,
			counters	: true,
			navbar 		: {
				title		: 'Menu'
			},
			navbars		: [
			{
				position	: 'top',
				content		: [ 'searchfield' ]
			}, {
				position	: 'top',
				content		: [
				'prev',
				'title',
				'close'
				]
			}, {
				position	: 'bottom',
				content		: [

				]
			}
			]
		});
	});
</script>
<!--Menu mobile-->

<!--Hover menu-->
<script language="javascript" type="text/javascript">
	$(document).ready(function() { 
		//Hover vào menu xổ xuống
		$(".menu ul li").hover(function(){
			$(this).find('ul:first').css({visibility: "visible",display: "none"}).slideDown(200); 
		},function(){ 
			$(this).find('ul:first').css({visibility: "hidden"}).slideUp(200);
		}); 
		$(".menu ul li").hover(function(){
			$(this).find('>a').addClass('active2'); 
		},function(){ 
			$(this).find('>a').removeClass('active2'); 
		}); 
		$("#danhmuc > ul > li > a").click(function(){
			if($(this).parents('li').children('ul').find('li').length>0)
			{
				$("#danhmuc ul li ul").hide(300);
				
				if($(this).hasClass('active'))
				{
					$("#danhmuc ul li a").removeClass('active');
					$(this).parents('li').find('ul:first').hide(300); 
					$(this).removeClass('active');
				}
				else
				{
					$("#danhmuc ul li a").removeClass('active');
					$(this).parents('li').find('ul:first').show(300); 
					$(this).addClass('active');
				}
				return false;
			}
		});
		$("#hamburger-icon").click(function(){
			$('#slide_menu').addClass('show');
			$('.over-play').fadeIn(300);
		});
		$(".close_menu").click(function(){
			$('#slide_menu').removeClass('show');
			$('.over-play').fadeOut(300);
		});
		$(".open_search").click(function(){
			$('#search_index').fadeIn(300);
			$('.over-play').fadeIn(300);
		});
		$(".close_cart").click(function(){
			$('.load_session_cart').removeClass('show');
			$('.over-play').fadeOut(300);
		});
		$(".over-play").click(function(){
			$('#slide_menu').removeClass('show');
			$('.load_session_cart').removeClass('show');
			$('#search_index').fadeOut(300);
			$(this).fadeOut(300);

		});
		$("#danhmuc_left ul.show li:first-child").addClass('active');
		
		
		$("#danhmuc_left ul li").click(function(){
			$('#danhmuc_left ul li').removeClass('active');
			$(this).addClass('active');
			$(this).find('.dm_cap2').slideDown(300);
			
		});
		$("#danhmuc_left ul li ul li a.active").parents('#danhmuc_left ul li').addClass("active");
		$(".list_menu li").click(function(){
			$(this).find('.dm_cap1').stop().slideToggle(300);
			$(this).find('.circle-plus').stop().toggleClass('opened');
		});
		$(".open_cart").click(function(){
			$('.load_session_cart').toggleClass('show');
			$('.search').removeClass('show');
			$('.over-play').fadeIn(300);
		});
		$(".open_search").click(function(){
			$('.search').stop().toggleClass('show');
			$('.load_session_cart').removeClass('show');
		});
		
		$('#slick_product').slick({
			infinite: true,//Lặp lại
			accessibility:false,
		  	slidesToScroll: 3, //Số item cuộn khi chạy
		  	slidesToShow: 3,
		  	autoplay:false,  //Tự động chạy
			autoplaySpeed:3000,  //Tốc độ chạy
			speed:700,//Tốc độ chuyển slider
			arrows:false, //Hiển thị mũi tên
			centerMode:false,  //item nằm giữa
			dots:false,  //Hiển thị dấu chấm
			draggable:true,  //Kích hoạt tính năng kéo chuột
			pauseOnHover:true,
			responsive: [
			{
				breakpoint:1200,
				settings: {
					slidesToShow: 3,
				}
			},
			{
				breakpoint:920,
				settings: {
					slidesToShow: 2,
				}
			},
			{
				breakpoint:620,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2, 
				}
			},
			{
				breakpoint:270,
				settings: {
					slidesToShow: 2,
				}
			}
			]
		});

		$('.slick_brands').slick({
			infinite: true,//Lặp lại
			accessibility:false,
		  	slidesToScroll: 5, //Số item cuộn khi chạy
		  	slidesToShow: 5,
		  	autoplay:false,  //Tự động chạy
			autoplaySpeed:3000,  //Tốc độ chạy
			speed:700,//Tốc độ chuyển slider
			arrows:false, //Hiển thị mũi tên
			centerMode:false,  //item nằm giữa
			dots:false,  //Hiển thị dấu chấm
			draggable:true,  //Kích hoạt tính năng kéo chuột
			pauseOnHover:true,
			responsive: [
			{
				breakpoint:1200,
				settings: {
					slidesToShow: 5,
				}
			},
			{
				breakpoint:920,
				settings: {
					slidesToShow: 3,
				}
			},
			{
				breakpoint:620,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2, 
				}
			},
			{
				breakpoint:270,
				settings: {
					slidesToShow: 2,
				}
			}
			]
		});


	});  
</script>
<script  type="text/javascript">
	$(document).ready(function () {
		'use strict';
		var c, currentScrollTop = 0,
		navbar = $('.wap_menu');
		var menu_height = $('.wap_menu').height() + 20;
		$('#slider,.box_container.product').css('margin-top',menu_height);
		$(window).scroll(function () {
			var a = $(window).scrollTop();
			var b = navbar.height();

			currentScrollTop = a;

			if (c < currentScrollTop && a > b + b) {
				navbar.addClass("scrollUp");
			} else if (c > currentScrollTop && !(a <= b)) {
				navbar.removeClass("scrollUp");
			}
			c = currentScrollTop;

			console.log(a);
		});

	});
</script>
<!--Hover menu-->
<script type="text/javascript" src="js/slick.min.js"></script>
<script src="js/fotorama.js" type="text/javascript"></script>
<!--Thêm alt cho hình ảnh-->
<script type="text/javascript">
	$(document).ready(function(e) {
		$('img').each(function(index, element) {
			if(!$(this).attr('alt') || $(this).attr('alt')=='')
			{
				$(this).attr('alt','<?=$company['ten']?>');
			}
		});

	});
</script>
<script type="text/javascript"> 
	function doEnter(evt){
		var key;
		if(evt.keyCode == 13 || evt.which == 13){
			onSearch(evt);
		}
	}
	function onSearch(evt) {			

		var keyword = document.getElementById("keyword").value;
		if(keyword=='' || keyword=='<?=_nhaptukhoatimkiem?>...')
		{
			$('#keyword').css("border","1px solid red");
			$("#keyword").attr("placeholder", "Bạn chưa nhập từ khóa !").placeholder();
		}
		else{
			location.href = "tim-kiem.html&keyword="+keyword;
			loadPage(document.location);			
		}
	}		
</script>   
<!--Tim kiem-->


<?php if($template=='index') { ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#slick_slider').slick({
			infinite: true,//Lặp lại
			accessibility:false,
		  	slidesToScroll: 1, //Số item cuộn khi chạy
		  	slidesToShow: 1,
		  	autoplay:true,  //Tự động chạy
			autoplaySpeed:3000,  //Tốc độ chạy
			speed:2000,//Tốc độ chuyển slider
			arrows:false, //Hiển thị mũi tên
			centerMode:false,  //item nằm giữa
			dots:false,  //Hiển thị dấu chấm
			draggable:true,  //Kích hoạt tính năng kéo chuột
			pauseOnHover:true
		});	


		});
	</script>
<?php } ?>
<?php if($template=='product_detail') { ?>
	<!-- slick -->
	<script type="text/javascript">
		$(document).ready(function(){
			$('.mz-hint-message').html("Phóng to");
			$('.slick2').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				fade: true,
				autoplay:false,
			   //Tự động chạy
			   autoplaySpeed:5000,
			  adaptiveHeight: true, //Tốc độ chạy
			  asNavFor: '.slick'			 
			});
			$('.slick').slick({
				slidesToShow: 4,
				slidesToScroll:4,
				asNavFor: '.slick2',
				dots: false,
				centerMode: false,
				focusOnSelect: true,
				vertical:false,
				verticalSwiping: false,
				arrows:false,
				responsive: [
				{
					breakpoint:2000,
					settings: {
						arrows: true,
					}
				},
				{
					breakpoint:700,
					settings: {
						arrows: false,
					}
				}
				]

			});
			return false;
		});
	</script>
	<!-- slick -->

	<script type="text/javascript">
		$(document).ready(function(){
			$("#size_chart .click_size_chart").click(function() {
				$("#popup_size_chart").addClass('active');

			});
			$(".close_size_popup").click(function() {
				$("#popup_size_chart").removeClass('active');

			});
		});
	</script>
	<script src="magiczoomplus/magiczoomplus.js" type="text/javascript"></script>
	<script type="text/javascript">
		var mzOptions = {
			zoomMode:false,
			hint:false,
			onExpandClose: function(){MagicZoom.refresh();}
		};
	</script>
<?php } ?>


<?php if($com=='gio-hang') { ?>
	<script type="text/javascript">
		$(document).ready(function(e){
			$('.phiship').change(function(){
				var phiship = $(this).val();
				$.ajax({
					type:'POST',
					url:'ajax/phiship.php',
					dataType:'json',
					data: {phiship:phiship},
					success: function(res){
						$('.showphiship').html(res.phiship);
						$('.phishipan').val(res.phishipan);
						$('.tongthanhtoan').html(res.tongthanhtoan);
						$('input.tongthanhtoanan').val(res.tongthanhtoanan);
					}
				})
			});
			$('span.btn_discount').click(function(){

				var magiamgia = $('input.magiamgia').val();

				var phiship = $('option[name="phiship"]:selected').val();
				

			$('.thongbao_saima').html('');//để xóa khi nhập lần 2 trở lên

			$('.phantramgiamgia').html('0 %')

			if(magiamgia !='')

			{	

				$.ajax({

					url:'ajax/phiship.php',

					type:'POST',

					dataType:'json',

					data:{magiamgia:magiamgia,phiship:phiship},

					success:function(res){

						$('.showphiship').html(res.phiship);

						$('input.phishipan').val(res.phishipan);

						$('.thongbao_saima').css({display:'block'});

						$('.thongbao_saima').html(res.thongbao_saima);

						$('.thongbao_saima').html(res.thongbao_gioihan);

						$('.thongbao_saima').html(res.thongbao);

						$('.phantramgiamgia').html(res.phantramgiamgia);

						//Tổng thanh toán

						$('span.tongthanhtoan').html(res.tongthanhtoan);

						$('input.tongthanhtoanan').val(res.tongthanhtoanan);

						$('input.phantramgiamgiaan').val(res.phantramgiamgia);

						$('input.magiamgiaan').val(res.magiamgiaan);	



					}

				});



			}

			else

			{
				$('.thongbao_saima').css({display:'block'});

				$('.thongbao_saima').html('<span style="color:red">You have not entered a discount code!</span>');
			};

		});

			$('.phiship').change(function(){
				var phiship = $(this).val();
				var magiamgia = $('input.magiamgia').val();
				$.ajax({
					type:'POST',
					url:'ajax/phiship.php',
					dataType:'json',
					data: {phiship:phiship,magiamgia:magiamgia},
					success: function(res){
						$('.showphiship').html(res.phiship);
						$('.phishipan').val(res.phishipan);
						$('.tongthanhtoan').html(res.tongthanhtoan);
						$('input.tongthanhtoanan').val(res.tongthanhtoanan);
					}
				})
			});

			$('#httt').on('change', function() {

				if($("option:selected").val()==2){
					$("#tk_nganhang").slideDown(300);

				}else{
					$("#tk_nganhang").slideUp(300);
				}
			});


			$('.click_ajax2').click(function(){
				
				
				if(isEmpty($('#hoten').val(), "<?=_nhaphoten?>"))
				{
					$('#hoten').focus();
					return false;
				}
				if(isEmpty($('#dienthoai').val(), "<?=_nhapsodienthoai?>"))
				{
					$('#dienthoai').focus();
					return false;
				}
				if(isPhone($('#dienthoai').val(), "<?=_nhapsodienthoai?>"))
				{
					$('#dienthoai').focus();
					return false;
				}


				if(isEmpty($('#diachi').val(), "<?=_nhapdiachi?>"))
				{
					$('#diachi').focus();
					return false;
				}

				if(isEmpty($('#email').val(), "<?=_emailkhonghople?>"))
				{
					$('#email').focus();
					return false;
				}

				if(isEmail($('#email').val(), "<?=_emailkhonghople?>"))
				{
					$('#email').focus();
					return false;
				}

				if(isEmpty($('#noidung').val(), "<?=_nhapnoidung?>"))
				{
					$('#noidung').focus();
					return false;
				}
				if(isEmpty($('#httt').val(), "<?=_chonhinhthucthanhtoan?>"))
				{

					$('#httt').focus();

					return false;
				}
				if(isEmpty($('.phiship').val(), "Vui lòng chọn mục phí ship"))
				{
					$('.phiship').focus();
					return false;
				}
				if($('input[name=httt]:checked').val()==3){
					$('#frm_order').attr('action','thanh-toan-pay-pal.html');		
				}
				else{
					$('#frm_order').attr('action','');
				}
				frm_order.submit();
			});    
		});
	</script>

<?php } ?>
<?php if($com=='dang-ky'){ ?>

	<link href="css/datepicker.css" type="text/css" rel="stylesheet" />

	<script type='text/javascript' src='js/jquery.ui.datepicker.js'></script>

	<script type='text/javascript' src='js/jquery-ui.custom.js'></script>

	<script language="javascript">	

		$(function() {

			$( ".date" ).datepicker({

				dateFormat: "dd/mm/yy",

				changeMonth: true,

				changeYear: true,

				dayNamesMin: [ "T2", "T3", "T4", "T5", "T6", "T7", "CN" ],

				monthNamesShort: [ "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12" ],

				yearRange: "1900:now"

			});

		});

	</script>



	<script type="text/javascript">

		$(document).ready(function(e) {

			$('#tendangnhap').blur(function(){

				if(isSpace($('#tendangnhap').val(), "<?=_tendangnhapkhongduocchuakhoangtrang?>"))

				{

					$('#tendangnhap').focus();

					return false;

				}

				if(isCharacters($('#tendangnhap').val(), "<?=_tendangnhapkhongduocchuakitudatbiethoactiengvietcodau?>"))

				{

					$('#tendangnhap').focus();

					return false;

				}

				if(isCharacterlimit($('#tendangnhap').val(), "<?=_tendangnhaptu6den30kitu?>",6,30))

				{

					$('#tendangnhap').focus();

					return false;

				}



			});

			$('#matkhau').blur(function(){

				if(isSpace($('#matkhau').val(), "<?=_matkhaukhongduocchuakhoangtrang?>"))

				{

					$('#matkhau').focus();

					return false;

				}

				if(isCharacterlimit($('#matkhau').val(), "<?=_matkhautu6den30kitu?>",6,30))

				{

					$('#matkhau').focus();

					return false;

				}

			});

			$('#nhaplaimatkhau').blur(function(){

				if(isRepassword($('#matkhau').val(),$('#nhaplaimatkhau').val(), "<?=_matkhaunhaplaikhongdung?>"))

				{

					$('#nhaplaimatkhau').val('');

					$('#nhaplaimatkhau').focus();

					return false;

				}

			});

			$('.click_ajax').click(function(){

				if(isEmpty($('#tendangnhap').val(), "<?=_nhaptendangnhap?>"))

				{

					$('#tendangnhap').focus();

					return false;

				}

				if(isEmpty($('#matkhau').val(), "<?=_nhapmatkhau?>"))

				{

					$('#matkhau').focus();

					return false;

				}

				if(isEmpty($('#nhaplaimatkhau').val(), "<?=_nhapnhaplaimatkhau?>"))

				{

					$('#nhaplaimatkhau').focus();

					return false;

				}

				if(isEmpty($('#ten_lienhe').val(), "<?=_nhaphoten?>"))

				{

					$('#ten_lienhe').focus();

					return false;

				}

				if(isEmpty($('#dienthoai_lienhe').val(), "<?=_nhapsodienthoai?>"))

				{

					$('#dienthoai_lienhe').focus();

					return false;

				}

				if(isPhone($('#dienthoai_lienhe').val(), "<?=_sodienthoaikhongdung?>"))

				{

					$('#dienthoai_lienhe').focus();

					return false;

				}

				if(isEmpty($('#email_lienhe').val(), "<?=_nhapemail?>"))

				{

					$('#email_lienhe').focus();

					return false;

				}

				if(isEmail($('#email_lienhe').val(), "<?=_emailkhonghople?>"))

				{

					$('#email_lienhe').focus();

					return false;

				}

				if(isEmpty($('#capcha').val(), "<?=_nhapmabaove?>"))

				{

					$('#capcha').focus();

					return false;

				}

				$.ajax({

					type:'post',

					url:$(".frm").attr('action'),

					data:$(".frm").serialize(),

					dataType:'json',

					beforeSend: function() {

						$('.thongbao').html('<p><img src="images/loader_p.gif"></p>');  

					},

					error: function(){

						add_popup('<?=_hethongloi?>');

					},

					success:function(kq){

						add_popup(kq.thongbao);

						$('#capcha').val('');

						if(kq.nhaplai=='tontai')

						{

							$('#tendangnhap').focus();

						}

						if(kq.nhaplai=='nhaplai')

						{

							$(".frm")[0].reset();

						}

					}

				});

			});    

		});

	</script>



	<script type="text/javascript">

		$(document).ready(function(){

			$("#reset_capcha").click(function() {

				$("#hinh_captcha").attr("src", "sources/captcha.php?"+Math.random());

				return false;

			});

		});

	</script>



<?php } ?>





<?php if($com=='dang-nhap'){ ?>

	<script type="text/javascript">

		$(document).ready(function(e) {

			$('.click_ajax').click(function(){

				if(isEmpty($('#tendangnhap').val(), "<?=_nhaptendangnhap?>"))

				{

					$('#tendangnhap').focus();

					return false;

				}

				if(isEmpty($('#matkhau').val(), "<?=_nhapmatkhau?>"))

				{

					$('#matkhau').focus();

					return false;

				}

				if(isEmpty($('#capcha').val(), "<?=_nhapmabaove?>"))

				{

					$('#capcha').focus();

					return false;

				}

				$.ajax({

					type:'post',

					url:$(".frm").attr('action'),

					data:$(".frm").serialize(),

					dataType:'json',

					beforeSend: function() {

						$('.thongbao').html('<p><img src="images/loader_p.gif"></p>');  

					},

					error: function(){

						add_popup('aaaa');

						$(".frm")[0].reset();

					},

					success:function(kq){

						add_popup(kq.thongbao);

						$('#capcha').val('');

						if(kq.nhaplai=='nhaplai')

						{

							$(".frm")[0].reset();

						}

						if(kq.chuyentrang=='chuyentrang')

						{

							setTimeout(function(){location.href="http://<?=$config_url?>"},2000);

						}



					}

				});

			});    

		});

	</script>



	<script type="text/javascript">

		$(document).ready(function(){

			$("#reset_capcha").click(function() {

				$("#hinh_captcha").attr("src", "sources/captcha.php?"+Math.random());

				return false;

			});

		});

	</script>





<?php } ?>







<script type="text/javascript">

	$("select.account").click(function() {

		var open = $(this).data("isopen");

		if(open) {

			window.location.href = $(this).val()

		}

	  //set isopen to opposite so next time when use clicked select box

	  //it wont trigger this event

	  $(this).data("isopen", !open);

	});

</script>

<?php if($com == 'thay-doi-thong-tin'){ ?>

	<script type='text/javascript' src='js/jquery.ui.datepicker.js'></script>

	<script type='text/javascript' src='js/jquery-ui.custom.js'></script>

	<script language="javascript">	

		$(function() {

			$( ".date" ).datepicker({

				dateFormat: "dd/mm/yy",

				changeMonth: true,

				changeYear: true,

				dayNamesMin: [ "T2", "T3", "T4", "T5", "T6", "T7", "CN" ],

				monthNamesShort: [ "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12" ],

				yearRange: "1900:now"

			});

		});

	</script>



	<script type="text/javascript">

		$(document).ready(function(e) {

			$('#matkhau').blur(function(){

				if(isSpace($('#matkhau').val(), "<?=_matkhaukhongduocchuakhoangtrang?>"))

				{

					$('#matkhau').focus();

					return false;

				}

				if(isCharacterlimit($('#matkhau').val(), "<?=_matkhautu6den30kitu?>",6,30))

				{

					$('#matkhau').focus();

					return false;

				}

			});

			$('#nhaplaimatkhau').blur(function(){

				if(isRepassword($('#matkhau').val(),$('#nhaplaimatkhau').val(), "<?=_matkhaunhaplaikhongdung?>"))

				{

					$('#nhaplaimatkhau').val('');

					$('#nhaplaimatkhau').focus();

					return false;

				}

			});

			$('.click_ajax').click(function(){

				if(isEmpty($('#tendangnhap').val(), "<?=_nhaptendangnhap?>"))

				{

					$('#tendangnhap').focus();

					return false;

				}

				if($('#matkhaucu').val()!='')

				{

					$('#matkhaucu').blur(function(){

						if(isSpace($('#matkhaucu').val(), "<?=_matkhaucukhongduocchuakhoangtrang?>"))

						{

							$('#matkhaucu').focus();

							return false;

						}

						if(isCharacterlimit($('#matkhaucu').val(), "<?=_matkhaucutu6den30kitu?>",6,30))

						{

							$('#matkhaucu').focus();

							return false;

						}

					});

					if(isEmpty($('#matkhau').val(), "<?=_nhapmatkhaumoi?>"))

					{

						$('#matkhau').focus();

						return false;

					}

					if(isEmpty($('#nhaplaimatkhau').val(), "<?=_nhapnhaplaimatkhaumoi?>"))

					{

						$('#nhaplaimatkhau').focus();

						return false;

					}

				}



				if(isEmpty($('#ten_lienhe').val(), "<?=_nhaphoten?>"))

				{

					$('#ten_lienhe').focus();

					return false;

				}

				if(isEmpty($('#dienthoai_lienhe').val(), "<?=_nhapsodienthoai?>"))

				{

					$('#dienthoai_lienhe').focus();

					return false;

				}



				if(isEmpty($('#email_lienhe').val(), "<?=_nhapemail?>"))

				{

					$('#email_lienhe').focus();

					return false;

				}



				if(isEmpty($('#capcha').val(), "<?=_nhapmabaove?>"))

				{

					$('#capcha').focus();

					return false;

				}

				$.ajax({

					type:'post',

					url:$(".frm").attr('action'),

					data:$(".frm").serialize(),

					dataType:'json',

					beforeSend: function() {

						$('.thongbao').html('<p><img src="images/loader_p.gif"></p>');  

					},

					error: function(){

						add_popup('<?=_hethongloi?>');

					},

					success:function(kq){

						add_popup(kq.thongbao);

						$('#capcha').val('');

						if(kq.nhaplai=='nhaplai')

						{

							$(".frm")[0].reset();

						}

						if(kq.chuyentrang=='chuyentrang')

						{

							setTimeout(function(){location.href="index.html"},2000);

						}

					}

				});

			});    

		});

	</script>



	<script type="text/javascript">

		$(document).ready(function(){

			$("#reset_capcha").click(function() {

				$("#hinh_captcha").attr("src", "sources/captcha.php?"+Math.random());

				return false;

			});

		});

	</script>

<?php } ?>
<!--Code gữ thanh menu trên cùng-->
<script type="text/javascript">
	$(document).ready(function(){
		$(window).scroll(function(){
			var cach_top = $(window).scrollTop();
			var heaigt_header = $('.wap_menu').height() + 40;

			if(cach_top > 25){
				$('div.wap_menu').addClass('fixed');
				
			}else{
				$('div.wap_menu').removeClass('fixed');
				
			}
		});
	});
</script>

<?php if($com=='lien-he'){ ?>

	<script type="text/javascript">
		$(document).ready(function(e) {
			$('.click_ajax').click(function(){
				if(isEmpty($('#ten_lienhe').val(), "<?=_nhaphoten?>"))
				{
					$('#ten_lienhe').focus();
					return false;
				}

				if(isEmpty($('#dienthoai_lienhe').val(), "<?=_nhapsodienthoai?>"))
				{
					$('#dienthoai_lienhe').focus();
					return false;
				}
				if(isPhone($('#dienthoai_lienhe').val(), "<?=_nhapsodienthoai?>"))
				{
					$('#dienthoai_lienhe').focus();
					return false;
				}
				if(isEmpty($('#email_lienhe').val(), "<?=_emailkhonghople?>"))
				{
					$('#email_lienhe').focus();
					return false;
				}
				if(isEmail($('#email_lienhe').val(), "<?=_emailkhonghople?>"))
				{
					$('#email_lienhe').focus();
					return false;
				}

				if(isEmpty($('#noidung_lienhe').val(), "<?=_nhapnoidung?>"))
				{
					$('#noidung_lienhe').focus();
					return false;
				}
				if(isEmpty($('#capcha').val(), "<?=_nhapmabaove?>"))
				{
					$('#capcha').focus();
					return false;
				}
				$.ajax({
					type:'post',
					url:$(".frm").attr('action'),
					data:$(".frm").serialize(),
					dataType:'json',
					beforeSend: function() {
						$('.thongbao').html('<p><img src="images/loader_p.gif"></p>');     
					},
					error: function(){
						add_popup('<?=_hethongloi?>');
					},
					success:function(kq){
						add_popup(kq.thongbao);
						$('#capcha').val('');
						if(kq.nhaplai=='nhaplai')
						{
							$(".frm")[0].reset();
						}


					}
				});
			});    
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#reset_capcha").click(function() {
				$("#hinh_captcha").attr("src", "sources/captcha.php?"+Math.random());
				return false;
			});
		});
	</script>
<?php } ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('.form_pay').submit();
	});
</script>

<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.3.0/dist/lazyload.min.js"></script>
<script>
	const myLazyLoad = new LazyLoad({
		elements_selector: ".item--image,.img"
	});
</script>
<!-- <script>
	window.addEventListener('DOMContentLoaded', (event) => {
		let splash_screen = document.createElement('div');
		splash_screen.className = 'splash-screen';
		splash_screen.innerHTML = `
		<div class="splash-screen-text">
		<div class="splash-screen-loaded-text">N</div>
		<div class="splash-screen-loading-text">itomeyo</div>
		</div>
		`
		if (sessionStorage.getItem('sss-splash')) {
			let splash = document.querySelector('.splash-screen');
			if (splash) splash.parentNode.removeChild(splash_screen);
		} else {
			sessionStorage.setItem('sss-splash', 1);
			document.body.appendChild(splash_screen);
		}
		document.body.style.opacity = 1;
	})
</script> -->
<script>
  // 2. This code loads the IFrame Player API code asynchronously.
  var tag = document.createElement('script');

  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  // 3. This function creates an <iframe> (and YouTube player)
  //    after the API code downloads.
  var player;
  function onYouTubeIframeAPIReady() {
  	player = new YT.Player('video_banner', {
  		height: '390',
  		width: '640',
  		events: {
  			'onReady': onPlayerReady,
  			'onStateChange': onPlayerStateChange
  		}
  	});
  }

  // 4. The API will call this function when the video player is ready.
  function onPlayerReady(event) {
  	event.target.playVideo();
  }

  // 5. The API calls this function when the player's state changes.
  //    The function indicates that when playing a video (state=1),
  //    the player should play for six seconds and then stop.
  var done = false;
  function onPlayerStateChange(event) {
  	if (event.data == YT.PlayerState.PLAYING && !done) {
  		setTimeout(stopVideo, 6000);
  		done = true;
  	}
  }

</script>