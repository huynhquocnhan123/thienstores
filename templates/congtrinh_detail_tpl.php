<div class="tieude_giua"><?=$title_cat?></div>
<div class="box_container">
    <div class="content">   
    	
		<?php if(count($hinhthem) > 0) { ?>
             <div class="overHide">
     
    <div class="list masonry">
           <?php for($j=0,$count_hinhthem=count($hinhthem);$j<$count_hinhthem;$j++){?>
         <li class="oneNews masonry-brick wow slideInUp" data-wow-delay="400ms">
                    <a class="swipebox" href="<?=_upload_hinhthem_l.$hinhthem[$j]['photo']; ?>" title="DYSTOPIAN CUSTOM">
                         <img class="mo" src="<?=_upload_hinhthem_l.$hinhthem[$j]['photo']; ?>"/>
                    </a>
                </li>
              <?php } ?>
             
        <div class="clear"></div>
    </div>

</div>
        <?php } ?>
    

        <?=$row_detail['noidung']?>  
        <div class="addthis_native_toolbox"></div>  

        <?php if(count($tintuc_khac) > 0) { ?>   
        <div class="othernews">
             <div class="cactinkhac"><?=_cacbaikhac?></div>
             <ul>
                <?php for($i = 0, $count_tintuc_khac = count($tintuc_khac); $i < $count_tintuc_khac; $i++){ ?>
                    <li><a href="<?=$com?>/<?=$tintuc_khac[$i]['tenkhongdau']?>-<?=$tintuc_khac[$i]['id']?>.html" title="<?=$tintuc_khac[$i]['ten']?>"><?=$tintuc_khac[$i]['ten']?></a> (<?=make_date($tintuc_khac[$i]['ngaytao'])?>)</li>
                <?php }?>
             </ul>
        </div><!--.othernews-->
        <?php }?>
        
    </div><!--.content-->




</div><!--.box_container-->
         