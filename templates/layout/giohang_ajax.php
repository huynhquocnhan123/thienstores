
<!--Mua hàng-->
<script type="text/javascript">
	$(document).ready(function(e) {


		$('.size').click(function(){
			$('.size').removeClass('active_size');
			$(this).addClass('active_size');
		});


		$('.mausac').click(function(){
			$('.mausac').removeClass('active_mausac');
			$(this).addClass('active_mausac');
		});


		$('a.dathang').click(function(){
				
				var id_sp = $(this).attr('data-id');
			
				// if($('.size').length && $('.active_size').length==false)
				// {
				// 	add_popup('Vui lòng chọn size');
				// 	return false;
				// }
				if($('.active_size').length)
				{
					var size = $('.active_size').html();
				}
				else
				{
					var size = '';
				}

				// if($('select.select_size option.size').length && $('select.select_size option.size').length==false)
				// {
				// 	alert('Bạn vui lòng chọn Size');
				// 	return false;
				// }
				// if($('select.select_size option.size').length)
				// {
				// 	var size = $('select.select_size option.size:selected').val();
				// }
				// else
				// {
				// 	var size = '';
				// }
				
				// if($('.mausac').length && $('.active_mausac').length==false)
				// {
				// 	add_popup('Vui lòng chọn màu sắc');
				// 	return false;
				// }
				if($('.active_mausac').length)
				{
					var mausac = $('.active_mausac').attr('data-id');				
				}
				else
				{
					var mausac = '';
				}
					var act = "dathang";
					var id = id_sp;
					
					var soluong = $('.soluong').val();
					
					
					if(soluong>0)
					{
						$.ajax({
							type:'post',
							url:'ajax/cart.php',
							dataType:'json',
							data:{id:id,size:size,mausac:mausac,soluong:soluong,act:act},
							beforeSend: function() {
								$('.thongbao').html('<p><img src="images/loader_p.gif"></p>');  
							},
							error: function(){
								add_popup('<?=_hethongloi?>');
							},
							success:function(kq){
								
								$('.sp_cart_top,.count_cart').html(kq.sl);
								$('.load').load('ajax/load_session_cart.php');
								$('.load_session_cart').addClass('show');
								$('.over-play').fadeIn(300);
							}
						});
					}
					else
					{
						alert('<?=_nhapsoluong?>');
					}
			return false;
		});

		$('a.dathang2').click(function(){

				

				var id_sp = $(this).attr('data-id');

			

				// if($('.size').length && $('.active_size').length==false)

				// {

				// 	alert('Bạn vui lòng chọn Size');

				// 	return false;

				// }

				if($('.active_size').length)

				{

					var size = $('.active_size').html();

				}

				else

				{

					var size = '';

				}



				// if($('select.select_size option.size').length && $('select.select_size option.size').length==false)

				// {

				// 	alert('Bạn vui lòng chọn Size');

				// 	return false;

				// }

				// if($('select.select_size option.size').length)

				// {

				// 	var size = $('select.select_size option.size:selected').val();

				// }

				// else

				// {

				// 	var size = '';

				// }

				

				// if($('.mausac').length && $('.active_mausac').length==false)

				// {

				// 	alert('Bạn vui lòng chọn Màu');

				// 	return false;

				// }

				if($('.active_mausac').length)

				{

					var mausac = $('.active_mausac').attr('data-id');				

				}

				else

				{

					var mausac = '';

				}

					var act = "dathang";

					var id = id_sp;

					

					var soluong = $('.soluong').val();

					

					

					if(soluong>0)

					{

						$.ajax({

							type:'post',

							url:'ajax/cart.php',

							dataType:'json',

							data:{id:id,size:size,mausac:mausac,soluong:soluong,act:act},

							beforeSend: function() {

								$('.thongbao').html('<p><img src="images/loader_p.gif"></p>');  

							},

							error: function(){

								add_popup('<?=_hethongloi?>');

							},

							success:function(kq){

								add_popup_cart(kq.thongbao);

								$('.sp_cart_top,.count_cart').html(kq.sl);

								$('.load').load('ajax/load_session_cart.php');

								window.location.replace("gio-hang.html");

							}

						});

					}

					else

					{

						alert('<?=_nhapsoluong?>');

					}

			return false;

		});

		
	});
</script>
<!--Mua hàng-->