<?php

include ("ajax_config.php");

$magiamgia = $_POST['magiamgia'];



$return['phiship'] = number_format($_POST['phiship'],0, ',', '.');

$return['phishipan'] = $_POST['phiship'];

if($magiamgia!='')

{

	/*Kiểm tra có tồn tại + còn số lần không?*/

	$d->reset();

	$sql =  "SELECT phantramgiamgia,solangiamgia FROM table_news_danhmuc WHERE ten='".$magiamgia."' and solangiamgia>0 ";

	$d->query($sql);

	$rowgiamgia = $d->fetch_array();

	

	if(empty($rowgiamgia))

	{

		$return['phiship'] = number_format($_POST['phiship'],0, ',', '.');

		$return['phishipan'] = $_POST['phiship'];

		$return['thongbao_saima']= "<span style='color:red'>Coupon code is incorrect or has expired!</span>";	

		$tientongthanhtoan = get_order_total();

		$return['tongthanhtoan']=number_format($tientongthanhtoan + $_POST['phiship'],0, ',', '.');

		$return['tongthanhtoanan']=$tientongthanhtoan + $_POST['phiship'] ;	

	}

	else

	{

		

			$phantramgiamgia = 100 - $rowgiamgia['phantramgiamgia'];



			if($phantramgiamgia>=0)

			{

				

				$tientongthanhtoan = get_order_total()*($phantramgiamgia / 100);

				$return['gioihansanpham'] = $rowgiamgia['gioihansanpham'];

				$return['gioihansanphamfree'] = $rowgiamgia['gioihansanphamfree'];

				$return['magiamgiaan'] = $magiamgia;

				$return['tongthanhtoan']=number_format($tientongthanhtoan + $_POST['phiship'],0, ',', '.');

				$return['tongthanhtoanan']=$tientongthanhtoan + $_POST['phiship'] ;		

				$return['phantramgiamgia'] = $rowgiamgia['phantramgiamgia'].'%';

				$return['thongbao']='<span style="color:green">Enter the code successfully! You get '.$rowgiamgia['phantramgiamgia'].'% off</span>' ;

				

			}



		

	}	

}else{

	$tientongthanhtoan = get_order_total();

	$return['tongthanhtoan']=number_format($tientongthanhtoan + $_POST['phiship'],0, ',', '.');

	$return['tongthanhtoanan']=$tientongthanhtoan + $_POST['phiship'] ;	

}

echo json_encode($return);

?>   





