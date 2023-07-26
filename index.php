<?php

session_start();

$session=session_id();

@define ( '_template' , './templates/');

@define ( '_source' , './sources/');

@define ( '_lib' , './admin/lib/');

include_once _lib."Mobile_Detect.php";

$detect = new Mobile_Detect;

$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');



$lang_default = array("");



if(isset($_SESSION['lang']))

{

	$lang=$_SESSION['lang'];

}

else

{

	$lang="";

}

require_once _source."lang$lang.php";	

include_once _lib."config.php";

include_once _lib."constant.php";

include_once _lib."functions.php";

include_once _lib."class.database.php";

include_once _lib."functions_user.php";

include_once _lib."functions_giohang.php";

include_once _lib."file_requick.php";

include_once _source."counter.php";	

?>



<!doctype html>

  <html lang="vi">

  <head itemscope itemtype="http://schema.org/WebSite" >

    <base href="http://<?=$config_url?>/" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0, user-scalable=yes">

    <link rel="canonical" href="<?=getCurrentPageURL()?>" />

    <?php include _template."layout/seoweb.php";?>

    <?php include _template."layout/web_css.php";?> 

    <?=$company['codethem']?>   

  </head>

  <body onLoad="<?php echo 'initialize();'; ?>">
    <div id="pre-loader"><div class="loader"></div></div>
    <div id="wapper">

      <?php if($template!='giohang') {  ?>

        <div class="wap_menu <?php if($template=='index') echo 'fixed_index'?>">

          <div class="menu">

            <?php include _template."layout/menu_top.php";?>

          </div><!---END .menu-->

        </div><!---END .wap_menu--> 

      <?php } ?>

      <div id="main_content">

        <?php include _template.$template."_tpl.php"; ?>  

        <?php if($template=='index') {  ?>

        <div id="slider">

          <!-- <?php include _template."layout/slider.php";?> -->

        </div>

        <div class="clear"></div> 


        <div id="motocycle_accessories">

          <?php include _template."layout/motocycle_accessories.php";?>

        </div>

        <div class="clear"></div> 

        <div id="news_container">

          <?php include _template."layout/news_container.php";?>

        </div>

        <div class="clear"></div> 

        <div id="brands_container">

          <?php include _template."layout/brand_container.php";?>

        </div>

        <div class="clear"></div> 

      <?php } ?> 

        <div class="clear"></div>

      </div>
      <?php if($template=='index') {  ?>

        <div id="banner">

          <?php include _template."layout/banner.php";?>

        </div>   
      <?php } ?>

      <?php if($template!='giohang') {  ?>

        <div id="wap_footer">

          <?php include _template."layout/footer.php";?>

          <div class="clear"></div>

        </div>

      <?php } ?>

    </div>

    <div id="slide_menu">

      <?php include _template."layout/slide_menu.php";?>

    </div>

    <div class="load_session_cart">

      <div id="wp_session_cart">

        <p class="number_product">Giỏ hàng (<span class="count_cart"><?php if(count($_SESSION['cart'])>0)echo count($_SESSION['cart']);else echo '0';?></span>)</p>

        <div class="load">

          <form name="form2" method="post">

            <input type="hidden" name="pid" />

            <input type="hidden" name="size" />

            <input type="hidden" name="mausac" />

            <input type="hidden" name="command" />

            <ul id="list_cart">

              <?php 

              $max=count($_SESSION['cart']);

              for($i=0;$i<$max;$i++)

              {

                $pid=$_SESSION['cart'][$i]['productid'];

                $size=$_SESSION['cart'][$i]['size'];

                $mausac=$_SESSION['cart'][$i]['mausac'];

                $q=$_SESSION['cart'][$i]['qty'];

                $pmasp=get_code($pid);                  

                $pname=get_product_name($pid);

                $pprice=get_price($pid);

                $pphoto=get_product_photo($pid);

                $ptenkhongdau = get_product_tenkhongdau($pid);

                ?>



                <li>

                  <div class="img_cart"><a href="san-pham/<?=$ptenkhongdau?>.html"><img src="thumb/100x100/1/<?=_upload_sanpham_l.$pphoto?>"></a></div>                

                  <div class="cart_info">

                    <p class="cart_pname"><a href="san-pham/<?=$ptenkhongdau?>.html"><?=$pname;?></a></p>

                    <span><?=$size?> / <span class="color_box" style="background-color: <?=$mausac?>"></span></span>

                    <div class="q_price">

                      <span class="quantity"><?=$q?></span> X <span class="price"><?php if($pprice > 0)echo number_format($pprice,0, ',', '.').'  VND';else echo _lienhe; ?></span>

                    </div>

                  </div>

                  <span class="remove_link remove-cart"><a  href="javascript:del(<?=$pid?>,'<?=$size?>','<?=$mausac?>')">Xóa</a></span>

                </li>      

              <?php } ?>              

            </ul>

          </form>

          <div class="oder_total"><span>Tổng tiền:</span><span><?=number_format(get_order_total(),0, ',', '.').' '.'VND'?></span></div>

          <div class="check_out">

            <a href="gio-hang.html" class="check_out_btn">Tiến hành thanh toán</a>

            <a href="san-pham.html" class="shopping_btn">Tiếp tục mua hàng</a>

          </div>

        </div>

        <span class="close_cart"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"

          width="24" height="24"

          viewBox="0 0 172 172"

          style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#000000"><path d="M40.90039,30.76628l-10.13411,10.13411l45.09961,45.09961l-45.09961,45.09961l10.13411,10.13411l45.09961,-45.09961l45.09961,45.09961l10.13411,-10.13411l-45.09961,-45.09961l45.09961,-45.09961l-10.13411,-10.13411l-45.09961,45.09961z"></path></g></g></svg></span>

        </div>

      </div>
      
        <div id="search_index">
          <span class="title">What product are you looking for?</span>
          <div class="wp_btn_search">
            <input type="text" onkeypress="doEnter(event,'keyword');" name="keyword" id="keyword" placeholder="Search..." value="<?=@$tukhoa?>" >
            <p class="btn_search" aria-hidden="true" 
            title="<?=_search?>" onclick="onSearch(event,'keyword');" ><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
            width="30" height="30"
            viewBox="0 0 172 172"
            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#000000"><path d="M73.45833,21.5c-28.63214,0 -51.95833,23.32621 -51.95833,51.95833c0,28.63212 23.32619,51.95833 51.95833,51.95833c12.38529,0 23.77079,-4.37509 32.71191,-11.64583l35.15446,35.15446c1.34815,1.40412 3.35005,1.96971 5.23364,1.47866c1.88359,-0.49105 3.35456,-1.96202 3.84561,-3.84561c0.49105,-1.88359 -0.07455,-3.88549 -1.47866,-5.23364l-35.15446,-35.15446c7.27074,-8.94112 11.64583,-20.32663 11.64583,-32.71191c0,-28.63212 -23.32619,-51.95833 -51.95833,-51.95833zM73.45833,32.25c22.82242,0 41.20833,18.38593 41.20833,41.20833c0,11.11769 -4.38529,21.16215 -11.49886,28.56169c-0.43849,0.32229 -0.8255,0.7093 -1.14779,1.14779c-7.39953,7.11357 -17.44399,11.49886 -28.56169,11.49886c-22.82242,0 -41.20833,-18.38593 -41.20833,-41.20833c0,-22.8224 18.38591,-41.20833 41.20833,-41.20833z"></path></g></g></svg></p>
          </div>
        </div>
   
     
      <?php include _template."layout/web_js.php";?>

      <?php include _template."layout/giohang_ajax.php";?>

      <?php //include _template."layout/pupop.php"; ?>

      <?php //include _template."layout/fb_chat_chay.php"; ?>

      <?php //include _template."layout/donotcopyme.php"; ?>

      <div class="over-play"></div>

    </body>

    </html>



