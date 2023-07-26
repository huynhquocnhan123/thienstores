<?php

$madonhang2 = $_GET['madonhang'];

$data['ghichu'] = "Đã thanh toán qua PayPal";

$sql = "select madonhang from #_donhang where madonhang2='".$madonhang2."'";

$d->query($sql);
$mdh = $d->fetch_array();
$sql_ttkh = "select * from #_donhang where madonhang2='".$madonhang2."'";
$d->query($sql_ttkh);
$ttkh = $d->fetch_array();
$d->setTable('donhang');

$d->setWhere('madonhang2', $madonhang2);

if($d->update($data))
{	
	$ten_kh = $ttkh['hoten'];
	$thongbao='Order '.$mdh['madonhang'].' has been paid. <br> We will contact you in the shortest time.';
	if(is_array($_SESSION['cart']))
	{
		$max = count($_SESSION['cart']);
		$coloi = false;
		for($i=0;$i<$max;$i++){
			$pid = $_SESSION['cart'][$i]['productid'];
			$q = $_SESSION['cart'][$i]['qty'];
			$size = $_SESSION['cart'][$i]['size'];
			$mausac = $_SESSION['cart'][$i]['mausac'];
		}
		include_once "phpMailer/class.phpmailer.php";	
		$mail = new PHPMailer();
					$mail->IsSMTP(); 				// Gọi đến class xử lý SMTP
					$mail->Host       = $ip_host;   // tên SMTP server
					$mail->SMTPAuth   = true;       // Sử dụng đăng nhập vào account
					$mail->Username   = $mail_host; // SMTP account username
					$mail->Password   = $pass_mail;  
					
					//Thiết lập thông tin người gửi và email người gửi
					$mail->SetFrom($mail_host,$_POST['ten_lienhe']);
					
					$mail->AddAddress($company['email'], 'Đơn hàng từ website '.$_SERVER["SERVER_NAME"]);
					$mail->AddAddress($ttkh['email'], 'Đơn hàng từ website '.$_SERVER["SERVER_NAME"]);
					//Thiết lập email nhận email hồi đáp
					
					//nếu người nhận nhấn nút Reply
					$mail->AddReplyTo($ttkh['email'],'Đơn hàng từ website '.$_SERVER["SERVER_NAME"]);
					/*=====================================
					 * THIET LAP NOI DUNG EMAIL
					*=====================================*/
					//Thiết lập tiêu đề
					$mail->Subject    = "Đơn hàng từ website ".$_SERVER["SERVER_NAME"];
					$mail->IsHTML(true);
					//Thiết lập định dạng font chữ
					$mail->CharSet = "utf-8";		
					$body = '<table>';
					$body .= '
					<tr>
					<th colspan="2">&nbsp;</th>
					</tr>
					<tr>
					<th colspan="2">Đơn hàng từ website</th>
					</tr>
					<tr>
					<th colspan="2"><a href="'.$_SERVER["SERVER_NAME"].'">SYStore</a></th>
					</tr>
					<tr>
					<th colspan="2">&nbsp;</th>
					</tr>
					<tr>
					<th style="text-align:left">Xin chào '.$ttkh['hoten'].',<br>
					Cám ơn bạn đã đặt hàng tại SYStore.<br>
					Hi vọng bạn có một trải nghiệm mua sắm thú vị tại SYStore.com<br>
					SYStore đang xử lý đơn hàng của bạn và một kiện hàng thuộc đơn hàng #'.$ttkh['madonhang'].' đã được đóng gói và giao cho đơn vị vận chuyển. Vui lòng xem nội dung bên dưới để biết thêm chi tiết.<br>
					Nếu bạn có thắc mắc về đơn hàng của mình, xin vui lòng liên hệ SYStore qua email: '.$company['email'].'<br>
					Thân ái,<br>
					SYStore</th>
					</tr>
					<tr>
					<th colspan="2">&nbsp;</th>
					</tr>
					<tr>
					<th style="text-align:left">Hello '.$ttkh['hoten'].',<br>
					Thank you for choosing SYStore.<br>
					We hope you enjoy your recent SYStore.com purchase.<br>
					We are processing your order and a package from your Order #'.$ttkh['madonhang'].' is being shipped. Please see below for more details.<br>
					If you have any question about your order, feel free to contact us via email: '.$company['email'].'<br>
					Lots of love,<br>
					SYStore</th>
					</tr>
					<tr>
					<th colspan="2">&nbsp;</th>
					</tr>
					<tr>
					<th>Mã đơn hàng :</th><td>'.$ttkh['madonhang'].'</td>
					</tr>
					<tr>
					<th>Họ tên :</th><td>'.$ttkh['hoten'].'</td>
					</tr>
					<tr>
					<th>Địa chỉ :</th><td>'.$ttkh['diachi'].'</td>
					</tr>
					<tr>
					<th>Email :</th><td>'.$ttkh['email'].'</td>
					</tr>
					<tr>
					<th>Điện thoại :</th><td>'.$ttkh['dienthoai'].'</td>
					</tr>
					
					<tr>
					<th>Nội dung :</th><td>'.$ttkh['noidung'].'</td>
					</tr>
					';
					$body .= '</table>';
					
					
						#------------Chi tiết đơn hàng---------------------
					$body.='<table border="0" cellpadding="5px" cellspacing="1px" style="color:#000000; background:#d4d4d4; width:100%;">';
					if(is_array($_SESSION['cart']))
					{
						$body.= '<tr bgcolor="#F0F0F0" height="35px">
						<td align="center">STT</td>
						<td style="text-align:center;">Hình</td>
						<td style="text-align:center;" class="gh_an">Tên sản phẩm</td>
						<td align="center">Đơn giá</td>
						<td align="center">Số lượng</td>
						<td align="center">Thành tiền</td>
						</tr>';
						$max=count($_SESSION['cart']);
						for($i=0;$i<$max;$i++)
						{
							$pid=$_SESSION['cart'][$i]['productid'];
							$size=$_SESSION['cart'][$i]['size'];
							$mausac=$_SESSION['cart'][$i]['mausac'];
							$q=$_SESSION['cart'][$i]['qty'];
							$pmasp=get_code($pid);					
							$pname=get_product_name($pid);
							$pphoto=get_product_photo($pid);
							
							if($q==0) continue;
							
							$body.= '<tr bgcolor="#FFFFFF" style="color:#000000;">';
							$body.='<td width="10%" align="center">'.($i+1).'</td>';
							$body.='<td width="15%" align="center">
							<img src="http://'.$config_url.'/upload/sanpham/'.$pphoto.'" style="max-height:50px; margin:5px 0;" />
							</td>';
							$body.='<td width="25%" style="padding:0px 10px; box-sizing:border-box;" align="center">'.$pname.'</td>';				
							$body.="<td width='15%' align='center'>".get_price($pid)."&nbsp;$</td>";                 
							
							$body.='<td width="10%" align="center">'.$q.'</td>';
							$body.="<td width='15%' align='center'>".get_price($pid)*$q."&nbsp;$</td>";
							$body.='</tr>';
						}
						$body.='<tr>
						<td colspan="5" style="background:#F0F0F0; height:35px; text-align:right; padding-right:10px;">Tổng tiền</td>
						<td style="background: #fff;text-align: center;">'.get_order_total().'&nbsp;$</td>
						</tr>
						<tr>
						<td colspan="5" style="background:#F0F0F0; height:35px; text-align:right; padding-right:10px;">Phí ship</td>
						<td style="background: #fff;text-align: center;">'.$ttkh['phiship'].'&nbsp;$</td>
						</tr>
						<tr>
						<td colspan="5" style="background:#F0F0F0; height:35px; text-align:right; padding-right:10px;">Phí PayPal</td>
						<td style="background: #fff;text-align: center;">10&nbsp;$</td>
						</tr>	
						<tr>
						<td colspan="5" style="background:#F0F0F0; height:35px; text-align:right; padding-right:10px;">Tổng thanh toán</td>
						<td style="background: #fff;text-align: center;">'.$ttkh['tongthanhtoan'].'&nbsp;$</td>
						</tr>';
					}
					else
					{
						$body.='<tr bgColor="#FFFFFF"><td>Không có sản phẩm nào trong giỏ hàng!</td>';
					}
					$body.='</table>';
				   #------------Chi tiết đơn hàng---------------------
					
					$mail->Body = $body;
					$_SESSION['cart']=0;
					$mail->Send();
					unset($_SESSION['cart']);
					
				}
				
				
			}
			else
			{
				$thongbao='Hệ thống bị lỗi <br> Qúy khách liên hệ số hotline: '.$company['dienthoai'];
			}
			?>