<?php
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$d = new database($config['database']);
	
	#Thông tin công ty
	$d->reset();
	$sql_company = "select *,ten$lang as ten,diachi$lang as diachi from #_company limit 0,1";
	$d->query($sql_company);
	$company= $d->fetch_array();
	
	switch($com)
	{
		case 'thanh-toan-pay-pal':
			$title = "Paypal";
			$title_cat = "Paypal";
			$source = "thanhtoan_paypal";
			$template = "thanhtoan_paypal";
			break;

		case 'success-paypal':
			$title = "Success Paypal";
			$title_cat = "Success Paypal";
			$source = "success_paypal";
			$template = "success_paypal";
			break;
		
		case 'gioi-thieu':
			$type = "about";
			$title = "Our Story";
			$title_cat = "Our Story";
			$title_other = "Our Story";
			$source = "about";
			$template = "about";
			break;
		
		case 'cau-hoi-thuong-gap':
			$type = "faq";
			$title = "Câu hỏi thường gặp";
			$title_cat = "Câu hỏi thường gặp";
			$source = "about";
			$template = "about";
			break;

		case 'news':
			$type = "tintuc";
			$title = _tintuc;
			$title_cat = _tintuc;
			$title_other = _tinlienquan;
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;
		case 'tips':
			$type = "tips";
			$title = _tips;
			$title_cat = _tips;
			$title_other = _tinlienquan;
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;

		case 'dich-vu':
			$type = "dichvu";
			$title = _dichvu;
			$title_cat = _dichvu;
			$title_other = _tinlienquan;
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;
			
		case 'thong-tin-thanh-toan':
			$type = "thanhtoan";
			$title = "Thông tin thanh toán";
			$title_cat = "Thông tin thanh toán";
			$title_other = _tinlienquan;
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;
			
		case 'chinh-sach':
			$type = "chinhsach";
			$title = _chinhsach;
			$title_cat = _chinhsach;
			$title_other = _tinlienquan;
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;
		case 'memories':
			$type = "memories";
			$title = "Memories";
			$title_cat = "Memories";
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;
			
		case 'look-book':
			$type = "album";
			$title = "Look Book";
			$title_cat = "LOOKBOOK";
			$title_other = _lookbookrelated;
			$source = "news";
			$template = isset($_GET['id']) ? "lookbook" : "newslookbook";
			break;
			
		case 'lien-he':
			$type = "lienhe";
			$title = _lienhe;
			$title_cat = _lienhe;
			$source = "contact";
			$template = "contact";
			break;

		case 'tim-kiem':
			$type = "sanpham";
			$title = _ketquatimkiem;
			$title_cat = _ketquatimkiem;
			$source = "search";
			$template = "product";
			break;
			
		case 'tags':
			$type = "sanpham";
			$title = _tagsanpham;
			$title_cat = _tagsanpham;
			$source = "product";
			$template = "product";
			break;	
			
		case 'tag':
			$type = "tintuc";
			$title = _tagbaiviet;
			$title_cat = _tagbaiviet;
			$source = "news";
			$template = "news";
			break;	
		case 'product-new-arrival':
			$type = "sanpham";
			$title = _newarrival;
			$title_cat = _newarrival;
			$title_other = "Other New Products";
			$source = "product";
			$template = isset($_GET['id']) ? "product_detail" : "productnewarrival";
			break;


		case 'san-pham':
			$type = "sanpham";
			$title = "Sản phẩm";
			$title_cat = "Sản phẩm";
			$title_other = "Sản phẩm khác";
			$source = "product";
			$template = isset($_GET['id']) ? "product_detail" : "product";
			break;

		case 'thuong-hieu':
			$type = "thuonghieu";
			$title = "Thương hiệu";
			$title_cat = "Thương hiệu";
			$title_other = "Thương hiệu khác";
			$source = "product";
			$template = isset($_GET['id']) ? "product_detail" : "product";
			break;

		case 'san-pham-moi':
		case 'san-pham-khuyen-mai':
			$type = "sanpham";
			$title = _sanpham;
			$title_cat = _sanpham;
			$title_other = _sanphamkhac;
			$source = "product";
			$template = isset($_GET['id']) ? "product_detail" : "product_orther";
			break;

		case 'sale':
			$type = "sanpham";
			$title = _sale;
			$title_cat = _sale;
			$title_other = _salerelated;
			$source = "product";
			$template = isset($_GET['id']) ? "product_detail" : "sale";
			break;

		case 'faps':
			$type = "chinhsach";
			$title = _faps;
			$title_cat = _faps;
			$title_other = _fapsrelated;
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;

		case 'collection':
			$type = "collection";
			$title = "Collection";
			$title_cat = "Collection";
			$title_other = _fapsrelated;
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;

		case 'events':
			$type = "events";
			$title = "Events";
			$title_cat = "Events";
			$title_other = "Events Khác";
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;
		
		case 'stories':
			$type = "Stories";
			$title = _mauvecorner;
			$title_cat = _mauvecorner;
			$title_other = "Other About Us";
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "stories";
			break;
			
		case 'mauveladies':
			$type = "mauveladies";
			$title = "Mauveladies";
			$title_cat = "Mauveladies Us";
			$source = "news";
			$template = "mauveladies";
			break;	

		case 'video':
			$title = 'Video Clip';
			$title_cat = "Video Clip";
			$source = "video";
			$template = "video";
			break;
		
		case 'gio-hang':
			$type = "giohang";
			$title = _giohang;
			$title_cat = _giohang;
			$source = "giohang";
			$template = "giohang";
			break;	
			
		case 'thanh-toan':
			$type = "thanhtoan";
			$title = _thanhtoan;
			$title_cat = _thanhtoan;
			$source = "thanhtoan";
			$template = "thanhtoan";
			break;
			
		case 'dang-ky':
			$type = "dangky";
			$title = _dangky;
			$title_cat = _dangky;
			$source = "dangky";
			$template = "dangky";
			break;
			
		case 'dang-nhap':
			$type = "dangnhap";
			$title = _dangnhap;
			$title_cat = _dangnhap;
			$source = "dangnhap";
			$template = "dangnhap";
			break;
		
		case 'quen-mat-khau':
			$type = "quenmatkhau";
			$title = _quenmatkhau;
			$title_cat = _quenmatkhau;
			$source = "quenmatkhau";
			$template = "quenmatkhau";
			break;
			
		case 'thay-doi-thong-tin':
			$type = "thaydoithongtin";
			$title = _thaydoithongtin;
			$title_cat = _thaydoithongtin;
			$source = "thaydoithongtin";
			$template = "thaydoithongtin";
			break;
			
		case 'dang-xuat':
			logout();
			break;
				
			
		case 'ngonngu':
			if(isset($_GET['lang']))
			{
				switch($_GET['lang'])
					{
						case '':
							$_SESSION['lang'] = '';
							break;
						case 'en':
							$_SESSION['lang'] = 'en';
							break;
						default: 
							$_SESSION['lang'] = '';
							break;
					}
			}
			else{
				$_SESSION['lang'] = '';
			}
		redirect($_SERVER['HTTP_REFERER']);
		break;
											
		default: 
			$source = "index";
			$template = "index";
			break;
	}
	
	if($source!="") include _source.$source.".php";	
	if($_REQUEST['com']=='logout')
	{
		session_unregister($login_name);
		header("Location:index.php");
	}

	$arr_animate =array("wow bounce","wow flash","wow pulse","wow rubberBand","wow shake","wow swing","wow tada","wow wobble","wow jello","wow bounceIn","wow bounceInDown","wow bounceInLeft","wow bounceInRight","wow bounceInUp","wow bounceOut","wow bounceOutDown","wow bounceOutLeft","wow bounceOutRight","wow bounceOutUp","wow fadeIn","wow fadeInDown","wow fadeInDownBig","wow fadeInLeft","wow fadeInLeftBig","wow fadeInRight","wow fadeInRightBig","wow fadeInUp","wow fadeInUpBig","wow fadeOut","wow fadeOutDown","wow fadeOutDownBig","wow fadeOutLeft","wow fadeOutLeftBig","wow fadeOutRight","wow fadeOutRightBig","wow fadeOutUp","wow fadeOutUpBig","wow flip","wow flipInX","wow flipInY","wow flipOutX","wow flipOutY");		
?>