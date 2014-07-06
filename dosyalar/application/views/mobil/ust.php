<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title><?php echo $title; ?></title>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" />
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
</head>
<body data-role="content">
<style type="text/css">
header {overflow:auto;}
header img{margin:5px;float:left;}
.filmler {}
.filmler li {overflow:auto;}
.filmler li .ui-icon {display:none;}
.filmler li img{width:50px;float:left;}
.filmler li .imdbvd {display:block;overflow:auto;margin-top:2px;}
.filmler li span {font-size:11px;color:#444!important;float:left;margin-right:5px;}
.filmler li a {float:left;margin:0px!important;margin-left:60px!important;height:75px;padding:0px 0px 0px 0px!important;font-size:15px;display:block;}
.filmler li .filmaciklama {margin-top:3px;}
.film {text-align:center;font-size:14px;}
.film .filmbilgileri {margin:10px;}
.film .filmbilgileri span {display:block;font-weight:bold;}
#footer {width:100%;height:30px;}
</style>
<div class="section" data-role="page">
<header data-role="header">
<img src="http://www.sozlerin.net/film/tema/resimler/ust-logo.png" alt="site logo" style="float:right;" width="98" height="28" />
<a href="#popupMenu" data-rel="popup" data-role="button" data-transition="slideup" data-icon="gear" data-theme="b">Kategoriler</a>
<div data-role="popup" id="popupMenu" data-theme="d">
        <ul data-role="listview" data-inset="true" style="min-width:210px;" data-theme="d">
<?php 
foreach ($turler as $t){
	echo '<li><a data-ajax="false" href="'.site_url().'mobil/anasayfa/kategori/'.$t->tur_sef.'">'.$t->tur_baslik.'</a></li>';
}
?>
        </ul>
</div>
</header>
		<a href="<?php echo site_url(); ?>/mobil/anasayfa" data-role="button" data-ajax="false">Anasayfa</a>