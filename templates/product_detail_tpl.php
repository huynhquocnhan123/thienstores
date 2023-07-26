<?php 
  
  $d->reset();
  $sql_sizechart = "select photo from #_background where type='sizechart' limit 0,1";
  $d->query($sql_sizechart); 
  $size_chart = $d->fetch_array();

?>

<link href="magiczoomplus/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen"/>
<!--Tags sản phẩm-->
<link href="css/tab.css" type="text/css" rel="stylesheet" />

<div class="product_deatails_container">

    <div class="product_details_area">
      <div class="product_details_title">
        <div class="product_details_left">
          <div>Sản phẩm</div>
        </div>
        <div class="product_details_right">
          <div>Phụ tùng chơi xe <span> \ </span> <?=$title_cat ?> </div>
        </div>
      </div>

      <div class="zoom_slick">
        <div class="slick2">                
          <a data-zoom-id="Zoom-detail" id="Zoom-detail" class="MagicZoom" href="<?php if($row_detail['photo'] != NULL)echo _upload_sanpham_l.$row_detail['photo'];else echo 'images/noimage.gif';?>" title="<?=$row_detail['ten']?>">
            <img class='cloudzoom' src="<?php if($row_detail['photo'] != NULL)echo _upload_sanpham_l.$row_detail['photo'];else echo 'images/noimage.gif';?>" />
          </a>

          <?php $count=count($hinhthem); if($count>0) {?>
            <?php for($j=0,$count_hinhthem=count($hinhthem);$j<$count_hinhthem;$j++){?>
              <a data-zoom-id="Zoom-detail" id="Zoom-detail" class="MagicZoom" href="<?php if($hinhthem[$j]['photo']!=NULL) echo _upload_hinhthem_l.$hinhthem[$j]['photo']; else echo 'images/noimage.gif';?>" title="<?=$row_detail['ten']?>" >
                <img src="<?php if($hinhthem[$j]['photo']!=NULL) echo _upload_hinhthem_l.$hinhthem[$j]['photo']; else echo 'images/noimage.gif';?>" /></a>  
          <?php }} ?>
        </div><!--.slick-->

        <?php $count=count($hinhthem); if($count>0) {?>
        <div class="slick">                
          <p><img src="<?=_upload_sanpham_l.$row_detail['thumb']?>" /></p>
            <?php for($j=0,$count_hinhthem=count($hinhthem);$j<$count_hinhthem;$j++){?>
              <p><img src="<?=_upload_hinhthem_l.$hinhthem[$j]['thumb']?>" /></p>
            <?php } ?>
        </div><!--.slick-->
        <?php } ?>
      </div>

      <div class="products_details">

        <h3 class="products_details_name">
          <?=$row_detail['ten']?>
        </h3>
        <div class="products_details_price">
          <span class="now_price">
            <?=number_format($row_detail['gia'],0, ',', '.').'đ';?>
          </span>
          <?php if($row_detail['giacu'] > 0) { ?>
            <span class="old_price"><?=number_format($row_detail['giacu'],0, ',', '.').'đ';?></span>
          <?php } ?>
        </div>
        <?php if($row_detail['masp'] != '') { ?>
          <div class="products_details_code">
            <b>Mã sản phẩm : <?=$row_detail['masp']?></b> 
          </div>
        <?php } ?>
        <?php if($row_detail['mota'] != '') { ?>
          <div class="products_details_short_desc">
            <b>Thông số sản phẩm : </b> 
            <div class="short_desc_content">
               <?=$row_detail['mota']?>
            </div>
          </div>
        <?php } ?>
        <div class="products_details_quantity">
          <b>Số lượng:</b>
            <div class="number-input">
              <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" ></button>
                <input class="soluong" min="1" name="soluong" value="1" type="number">
              <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
            </div>
        </div>
        <div class="products_details_add_to_cart">
          <a class="buy_btn dathang2" data-id="<?=$row_detail['id']?>" >THANH TOÁN</a> 
          <a class="dathang btn-addcart" data-id="<?=$row_detail['id']?>" >THÊM VÀO GIỎ HÀNG</a>
        </div>

      </div>

      <div class="clear"></div>

      <div class="products_details_main_contents">
        <h3>Mô tả sản phẩm</h3>
        <?php if ($row_detail['noidung'] != '') { ?>
          <span><?=$row_detail['noidung']?></span>
        <?php } ?>
      </div>

      <div class="clear"></div>

      <div class="other_products">
        <div class="other_products_title">
          <div class="other_products_left">
            <div>Các sản phẩm tương tự</div>
          </div>
        </div>
        <div class="slick_other_products">
          <?php foreach ($product as $key => $value) { ?>
            <div class="other_products_items">
              <a href="san-pham/<?=$value['tenkhongdau']?>.html" class="other_product_image">
                <img src="<?=_upload_sanpham_l.$value['thumb']?>" alt="<?=$value['ten']?>">
              </a>
              <div class="box_info_other_product">

                <div class="other_product_name">
                  <?=$value['ten']?>
                </div>
            
                <div class="other_products_price">
                  <p class="other_now_products_price">
                    <?php if($value['gia'] != 0)echo number_format($value['gia'],0, ',', '.').' đ';else echo _lienhegia; ?>
                  </p>
          
                  <?php if($value['giacu'] !=0 ){ ?>
                    <p class="product_old_price">
                      <?=number_format($value['giacu'],0, ',', '.').' đ';?>
                    </p>  
                  <?php } ?>
                </div>

              </div>

              <div class="other_details_button">
                <a class="other_details_link" href="san-pham/<?=$value['tenkhongdau']?>.html">Xem chi tiết</a>
              </div>

            </div>
          <?php } ?>
        </div>
      </div>

      <div id="brands_container_details">

        <?php include _template."layout/brand_container.php";?>

      </div>

      <div id="popup_size_chart">
        <div id="wp_size_chart">
          <img src="<?=_upload_hinhanh_l.$size_chart['photo']?>" alt="Size chart">
          <span class="close_size_popup">Close</span>
        </div>
      </div>
        
      <div class="clear"></div>  
    </div>

    <div class="category_area">
      <?php include _template."layout/category_list.php";?>
    </div>

</div>