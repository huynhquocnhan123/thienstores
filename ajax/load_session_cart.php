<?php 
include ("ajax_config.php");
if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
    remove_product($_REQUEST['pid'],$_REQUEST['size'],$_REQUEST['mausac']);
}
else if($_REQUEST['command']=='clear'){
    unset($_SESSION['cart']);
}
else if($_REQUEST['command']=='update'){
    $max=count($_SESSION['cart']);
    for($i=0;$i<$max;$i++){
        $pid=$_SESSION['cart'][$i]['productid'];
        $size=$_SESSION['cart'][$i]['size'];
        $mausac=$_SESSION['cart'][$i]['mausac'];
        $q=intval($_REQUEST['product'.$pid.$size.$mausac]);

        if($q>0 && $q<=99999){
            $_SESSION['cart'][$i]['qty']=$q;
        }
        else{
            $msg='Some proudcts not updated!, quantity must be a number between 1 and 99999';
        }
    }
}
?>
<script type="text/javascript">
    function del(pid,size,mausac){
        if(confirm('Bạn muốn xóa sản phẩm này ra khỏi giỏ hàng ?')){
            document.form2.pid.value=pid;
            document.form2.size.value=size;
            document.form2.mausac.value=mausac;
            document.form2.command.value='delete';
            document.form2.submit();
        }
    }
    
</script>
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
<span class="close_cart"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
    width="24" height="24"
    viewBox="0 0 172 172"
    style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#000000"><path d="M40.90039,30.76628l-10.13411,10.13411l45.09961,45.09961l-45.09961,45.09961l10.13411,10.13411l45.09961,-45.09961l45.09961,45.09961l10.13411,-10.13411l-45.09961,-45.09961l45.09961,-45.09961l-10.13411,-10.13411l-45.09961,45.09961z"></path></g></g></svg></span>
