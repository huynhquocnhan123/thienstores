<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<?php
session_start();
$session=session_id();

@define ( '_template' , './templates/');
@define ( '_source' , './sources/');
@define ( '_lib' , './admin/lib/');

$lang="";

require_once _source."lang$lang.php";	
include_once _lib."config.php";
include_once _lib."constant.php";
include_once _lib."functions.php";
include_once _lib."class.database.php";
include_once _lib."functions_user.php";
include_once _lib."functions_giohang.php";
include_once _lib."file_requick.php";
	

$header_xml = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n<urlset xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\" xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">

<author>".$row_setting['ten']."</author>";

$footer_xml = "<author>".$row_setting['ten']."</author></urlset>";
$file_topic = fopen("sitemap.xml", "w+");

fwrite($file_topic, $header_xml);

fwrite($file_topic, "<url><loc>http://".$config_url."</loc><changefreq>weekly</changefreq><priority>1.0</priority></url>");
fwrite($file_topic, "<url><loc>http://".$config_url."/index.html</loc><changefreq>weekly</changefreq><priority>1.0</priority></url>");
fwrite($file_topic, "<url><loc>http://".$config_url."/gioi-thieu.html</loc><changefreq>weekly</changefreq><priority>1.0</priority></url>");
fwrite($file_topic, "<url><loc>http://".$config_url."/san-pham.html</loc><changefreq>weekly</changefreq><priority>1.0</priority></url>");

fwrite($file_topic, "<url><loc>http://".$config_url."/khuyen-mai.html</loc><changefreq>weekly</changefreq><priority>1.0</priority></url>");
fwrite($file_topic, "<url><loc>http://".$config_url."/tin-tuc.html</loc><changefreq>weekly</changefreq><priority>1.0</priority></url>");

fwrite($file_topic, "<url><loc>http://".$config_url."/lien-he.html</loc><changefreq>weekly</changefreq><priority>1.0</priority></url>");


$typesp = "sanpham";

$sql_list = "select  id,tenkhongdau,ngaytao from #_product_danhmuc where type='".$typesp."' and hienthi=1 order by stt asc";
$d->query($sql_list);
$dmsp = $d->result_array();

foreach ($dmsp as $key_d => $value) {
fwrite($file_topic, "<url><loc>http://".$config_url."/san-pham/".$value['tenkhongdau']."/"."</loc><lastmod>".date('d/m/Y - g:i A',$value['ngaytao'])."</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>");

	
	$sql2="select id,tenkhongdau,ngaytao from #_product_list where id_danhmuc=".$value['id']." and type='".$typesp."' and hienthi=1 order by stt asc ";
	$d->query($sql2);
	$list_sp=$d->result_array();
	
	foreach ($list_sp as $key_c => $value2) {
		fwrite($file_topic, "<url><loc>http://".$config_url."/san-pham/".$value['id']."/".$value2['tenkhongdau']."/"."</loc><lastmod>".date('d/m/Y - g:i A',$value2['ngaytao'])."</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>");

	}

}

/*product-type*/	
$sql = "select id,tenkhongdau,ngaytao from table_product where type='".$typesp."' and hienthi=1 order by ngaytao desc,stt asc";
$d->query($sql);
$detail = $d->result_array();
foreach ($detail as $key_d => $m_dt) {
fwrite($file_topic, "<url><loc>http://".$config_url."/san-pham/".$m_dt['tenkhongdau'].".html</loc><lastmod>".date('d/m/Y - g:i A',$m_dt['ngaytao'])."</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>");
}



/*news-type*/
$sql_news = "select id,tenkhongdau,ngaytao from table_news where type='tintuc' and hienthi=1 order by ngaytao desc,stt asc";
$d->query($sql_news);
$news_s = $d->result_array();
foreach ($news_s as $key_d => $m_dt) {
fwrite($file_topic, "<url><loc>http://".$config_url."/tin-tuc/".$m_dt['tenkhongdau'].".html"."</loc><lastmod>".date('d/m/Y - g:i A',$m_dt['ngaytao'])."</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>");
}


/*news-type*/
$sql_news = "select id,tenkhongdau,ngaytao from table_news where type='dichvu' and hienthi=1 order by ngaytao desc,stt asc";
$d->query($sql_news);
$news_s = $d->result_array();
foreach ($news_s as $key_d => $m_dt) {
fwrite($file_topic, "<url><loc>http://".$config_url."/dich-vu/".$m_dt['tenkhongdau'].".html"."</loc><lastmod>".date('d/m/Y - g:i A',$m_dt['ngaytao'])."</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>");
}

/*news-type*/
$sql_news = "select id,tenkhongdau,ngaytao from table_news where type='duan' and hienthi=1 order by ngaytao desc,stt asc";
$d->query($sql_news);
$news_s = $d->result_array();
foreach ($news_s as $key_d => $m_dt) {
fwrite($file_topic, "<url><loc>http://".$config_url."/du-an/".$m_dt['tenkhongdau'].".html"."</loc><lastmod>".date('d/m/Y - g:i A',$m_dt['ngaytao'])."</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>");
}



/*tao-sitemap*/
fwrite($file_topic, $footer_xml);
fclose($file_topic);

transfer("Đã cập nhật sitemap ! ", "sitemap.xml");


?>