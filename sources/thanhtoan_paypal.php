<?php if(!defined('_source')) die("Error");	
if(count($_SESSION['cart'])>0)
{
	#Nếu click thanh toán thành công
	if(isset($_POST['hoten']))
	{	
		#Lấy thông tin đơn hàng
		$httt = $_POST['httt'];
		$hoten = $_POST['hoten'];
		$diachi = $_POST['diachi'];
		$dienthoai = $_POST['dienthoai'];
		$thanhpho = (int)$_POST['thanhpho'];
		$quan = (int)$_POST['quan'];		
		$email = $_POST['email'];
		$noidung = $_POST['noidung'];
		$ip = getRealIPAddress();
		$id_user = $_SESSION['login']['id'];
		$phiship = $_POST['phishipan'];
		$tongthanhtoan = $_POST['thongthanhtoan'];
		$ghichu = 'Chưa thanh toán';

		//Validate dữ liệu
		$httt = (int)$httt;
		$hoten = trim(strip_tags($hoten));
		$dienthoai = trim(strip_tags($dienthoai));	
		$diachi = trim(strip_tags($diachi));	
		$email = trim(strip_tags($email));	
		$noidung = trim(strip_tags($noidung));
		$lastname = trim(strip_tags($lastname));

		$hoten = mysql_real_escape_string($hoten);
		$dienthoai = mysql_real_escape_string($dienthoai);
		$diachi = mysql_real_escape_string($diachi);
		$email = mysql_real_escape_string($email);
		$noidung = mysql_real_escape_string($noidung);	
		$tonggia = get_order_total();				
		$ngaydangky = time();
		$ngaycapnhat = time();	
		
		$coloi = false;		
		if ($hoten == NULL) { 
			$coloi=true; $error = _nhaphoten;
		} 
		if ($dienthoai == NULL) { 
			$coloi=true; $error = _nhapsodienthoai;
		}
		
		if ($diachi == NULL) { 
			$coloi=true; $error = _nhapdiachi;
		}
		#Nếu không điền đầy đủ thông tin cần thiết
		if($coloi==true)
		{
			transfer(_vuilongdiendayduthongtin, "cart.html");
		}
		#Nếu điền đầy đủ thông tin cần thiết
		if ($coloi==false) 
		{	

			#Mẫu mã đơn hàng VD:05032016NN101
			$donhangmau = date('dmY').'NN';
			
			#Kiểm tra mã đơn hàng lớn nhất trong ngày
			$d->reset();
			$sql = "select id,madonhang from #_donhang where madonhang like '$donhangmau%' order by id desc limit 0,1";
			$d->query($sql);
			$max_order = $d->fetch_array();
			
			#Nếu không tồn tại đơn hàng nào trong ngày hôm nay
			if(empty($max_order['id']))
			{
				$songaunhien = 101;
			}
			else
			{
				(int)$songaunhien =  substr($max_order['madonhang'],10)+1;
			}
			#Mã đơn hàng của đơn hàng hiện tại là
			$madonhang = date('dmY').'NN'.$songaunhien;
			$madonhang2 = md5($madonhang);
			

			$sql = "INSERT INTO  table_donhang (httt,madonhang,madonhang2,hoten,dienthoai,thanhpho,quan,diachi,email,tonggia,noidung,ngaytao,tinhtrang,ngaycapnhat,ip,id_user,phiship,ghichu,tongthanhtoan) 

			VALUES ('$httt','$madonhang','$madonhang2','$hoten','$dienthoai','$thanhpho','$quan','$diachi','$email','$tonggia','$noidung','$ngaydangky','1','$ngaycapnhat','$ip','$id_user','$phiship','$ghichu','$tongthanhtoan')";	
			if(mysql_query($sql))
			{
				if(is_array($_SESSION['cart']))
				{
					$max = count($_SESSION['cart']);
					$coloi = false;
					for($i=0;$i<$max;$i++){
						$pid = $_SESSION['cart'][$i]['productid'];
						$q = $_SESSION['cart'][$i]['qty'];
						$size = $_SESSION['cart'][$i]['size'];
						$mausac = $_SESSION['cart'][$i]['mausac'];
						$pmasp = get_code($pid);					
						$pname = magic_quote(get_product_name($pid));
						$pphoto = get_product_photo($pid);
						$pgia = get_price($pid);
						$ptonggia = get_price($pid)*$q;

					#Nếu số lượng bằng ko thì bỏ qua
						if($q == 0) continue;
						$sql = "INSERT INTO table_chitietdonhang (madonhang,masp,ten,size,mausac,gia,soluong,tonggia,ngaytao,photo,id_sanpham) VALUES ('$madonhang','$pmasp','$pname','$size','$mausac','$pgia','$q','$ptonggia','$ngaydangky','$pphoto','$pid')";

						if(mysql_query($sql) == true)
						{
							$coloi = true;
						}	
						else
						{
							transfer("Đơn hàng của bạn chưa được gửi<br>Vui lòng điền đầy đủ thông tin lại<br>Cảm ơn", "gio-hang.html");
						}
					}
				}
				else
				{
					transfer("Xin lỗi quý khách.<br>Hệ thống bị lỗi, xin quý khách thử lại.", "http://".$config_url);	
				}
			}
		}
		else
		{
			transfer("Bạn chưa mua sản phẩm nào.Vui lòng chọn mua sản phẩm.<br/>Cảm Ơn!!!.", ".");
		}
	}
}
?>

