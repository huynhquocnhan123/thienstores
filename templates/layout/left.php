<?php
	//$d->reset();
//	$sql_tinmoi = "select id,ten$lang as ten,tenkhongdau,thumb,mota$lang as mota from #_news where type='tintuc' and hienthi=1 and noibat=1 order by stt,id desc";
//	$d->query($sql_tinmoi);
//	$tinmoi = $d->result_array();
//
$d->reset();
$sql_hotro = "select ten$lang as ten,dienthoai,email,yahoo,skype from #_yahoo where hienthi=1 and type='yahoo' order by stt,id desc";
$d->query($sql_hotro);
$hotro = $d->result_array();
//	
$d->reset();
$sql_quangcao = "select id,ten$lang as ten,link,photo from #_slider where hienthi=1 and type='quangcao' order by stt,id desc";
$d->query($sql_quangcao);
$quangcao = $d->result_array();
//	
//	$d->reset();
//	$sql_lkweb="select id,ten$lang as ten,link from #_lkweb where hienthi=1 and type='lkweb' order by stt,id desc";
//	$d->query($sql_lkweb);
//	$lkweb=$d->result_array();


?>


<div id="danhmuc_left">

	<?php	
	$d->reset();
	$sql_dvquan="select ten$lang as ten,tenkhongdau,id from #_product_danhmuc where type='sanpham' and hienthi=1 and noibat=0 order by stt asc,id desc";
	$d->query($sql_dvquan);
	$p_danhmuc=$d->result_array();	

	?>
	
	<h3 class="title">Sản phẩm</h3>
	<ul <?php if($_REQUEST['id_danhmuc']=='' && $_REQUEST['id_list']=='') echo 'class="show"' ?>>	
		<?php 
		for($i = 0; $i < count($p_danhmuc); $i++)
		{ 
			$d->reset();
			$sql_dvquan="select ten$lang as ten,tenkhongdau,id from #_product_list where id_danhmuc=".$p_danhmuc[$i]['id']." and type='sanpham' and hienthi=1 order by stt asc,id desc";
			$d->query($sql_dvquan);
			$p_list=$d->result_array();               
			?>
			<li class="<?php if($_REQUEST['id_danhmuc'] == $p_danhmuc[$i]['tenkhongdau']) echo 'active'; ?>">
				<a class="" ><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
					width="14" height="14"
					viewBox="0 0 172 172"
					style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#000000"><path d="M7.16667,28.66667l78.83333,131.1556l78.83333,-131.1556z"></path></g></g></svg><?=$p_danhmuc[$i]['ten']?></a>
					
					<ul class="dm_cap2">
						<li><a class="<?php if($_REQUEST['id_danhmuc'] == $p_danhmuc[$i]['tenkhongdau'] || $_REQUEST['id_danhmuc'] == $p_danhmuc[$i]['id']) echo 'active'; ?>" href="san-pham/<?=$p_danhmuc[$i]['tenkhongdau']?>/" >Tất cả</a></li>
						<?php if(count($p_list)>0) { ?>
							<?php 
							for($j=0;$j<count($p_list);$j++) 
							{ 
								$d->reset();
								$sql_dvquan="select ten$lang as ten,tenkhongdau,id from #_product where id_list=".$p_list[$j]['id']." and type='sanpham' and hienthi=1 order by stt asc,id desc";
								$d->query($sql_dvquan);
								$p_product=$d->result_array();     
								?>
								<li>
									<a class="<?php if($_REQUEST['id_list'] == $p_list[$j]['id']) echo 'active'; ?>" href="san-pham/<?=$p_list[$j]['id']?>/<?=$p_list[$j]['tenkhongdau']?>/"><?=$p_list[$j]['ten']?></a>

								</li>
								<?php 
							} 
							?>
						<?php } ?>    
					</ul>
					
				</li>
			<?php } ?>
		</ul>
	</div>