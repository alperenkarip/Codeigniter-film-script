<?php if (!$parca){ $parca=1; $par = $parca-1;}else {$par = $parca-1; } error_reporting(0); ?>
<?php 
$farka = explode('||',$film[(count($film)-1)]->film_arka);
if (strlen($farka[0]) > 0 || strlen($farka[1]) > 0){
?>
<style type="text/css">
body {
background:url(<?php echo $farka[1]; ?>) <?php echo $farka[0]; ?> center fixed;
	-webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
</style>
<?php } ?>
<div id="izle2">
<div id="i2film_baslik" style="display:none;"><h3 class="cf1"><?php echo $film[0]->film_baslik; ?></h3></div>
<div id="i2film" class="">
<div id="i2filmsol">
<script type="text/javascript">
$(function(){
$("#rFilm").hide();
 setTimeout(function(){
 $("#rKod").hide();
 $("#rgec").hide();
 $("#rFilm").show();
 },<?php echo @$reklam[0]->r_sure; ?>000);
$("#rgec").click(function(){
 $("#rKod").hide();
 $("#rgec").hide();
 $("#rFilm").show();
});
})
 </script>
<div style="clear:both;"></div>
<div class="film_kod">
 <div id="rKod" align="center" style="display:block;">
<?php $parcala = explode('||',@$reklam[0]->r_kod); echo $parcala[2]; ?>
 </div>
 <div style="clear:both"></div>
 <?php 
 if (@$reklam[0]->r_gec == 1){
 echo '<div style="text-align:center;"><a href="#" id="rgec">Reklamı geç</a></div>';
 }
 ?>
 <div id="rFilm"><?php echo $partlar[$par]["p_kod"]; ?></div>
 </div>
</div>
<div id="i2filmsag">
<div id="i2filmsagust">
<?php 
?>
<div id="i2film_b"><font style="font-size:18px;font-weight:bold;" class="cf1"> <?php 	if ($film[0]->film_tip == 1){echo 'Altyazı';}elseif ($film[0]->film_tip == 2){echo 'Türkçe dublaj';}elseif ($film[0]->film_tip == 3){echo 'Yerli film';} ?></font><div style="float:right;"><div class="icon-eye-open"></div> <i><?php echo $film[0]->film_gosterim; ?> kez izlendi</i>&nbsp;&nbsp;&nbsp;<div class="icon-comment"></div>&nbsp;<i><?php echo count($yorumlar["yorumlar"]); ?> yorum yapılmış</i></div></div>
<ul>
<li><label>İMDB Puanı :</label><span><?php echo $film[0]->film_imdb; ?></span></li>
<li><label>Gösterim tarihi :</label><span><?php echo $film[0]->film_gosterim_tarihi; ?></span></li>
<li><label>Yönetmen :</label><span><?php echo $film[0]->film_yonetmen; ?></span></li>
<li><label>Yapım :</label><span><?php echo $film[0]->film_yapim; ?></span></li>
<li><label>Tür :</label><span><?php 	foreach ($film as $v){	echo "<a href='".site_url()."".$v->tur_sef."/filmleri'>".$v->tur_baslik."</a>,"; } ?></span></li>
<li style="padding:0px 0px;"><label>Oyuncular :</label><span><?php echo $film[0]->film_oyuncular; ?></span></li>
</ul>
</div>
<div id="i2filmsagalt" class="sc">
<h2 class="cf1"><?php echo $film[0]->film_baslik; ?></h2>
<span class="film_konu"><?php echo $film[0]->film_ozet; ?></span>
</div>
<div style="clear:both;"></div>
<div id="i2kalt">
<span><?php foreach ($etiketleri as $v){ echo '<a href="'.site_url().'etiket/'.$v->e_sef.'">'.$v->e_baslik.'</a>,';} ?></span>
<div id="i2fpuan">
<?php echo $this->load->view('puanlari'); ?>
</div>
</div>
</div>
<div style="clear:both;"></div>
<div id="i2filmpartlar">
<div class="film_parcalari"><?php $pa = 0; foreach ($partlar as $v){ 
$pa++;
echo '<a class="buton'; 
if ($pa == $par+1){
echo ' aktif';
}
echo'" href="'.site_url().'anasayfa/izle/'.$film[0]->film_sef.'/part/'.$v["p_sira"].'">'.$v["p_baslik"].'</a>';} ?>
</div>
</div>
<div style="clear:both;"></div>
<?php 
	$fizleorta = explode('||',@$fizleorta[0]->r_kod);
	if (strlen(@$fizleorta[2]) > 0){
	echo '<div id="fizleorta">';
	echo $fizleorta[2];
	echo '</div>';
	}
?>
<div style="clear:both;"></div>
<div id="i2filmpartlar" style="overflow:auto">
<div class="addthis_toolbox addthis_default_style addthis_32x32_style" style="float:left;"><table>
<tr><td>
<a title="alperenkarip" href="javascript:(function(){var hght=400;var wdth=490; var nmbr=Number((window.screen.width-wdth)/3);var hghts=Number((window.screen.height-hght)/3);window.open('https://plusone.google.com/_/+1/confirm?hl=tr&url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title),'','width='+wdth+',height='+hght+',left='+nmbr+',top='+hghts+',scrollbars=no');})();" class="gpluss" style="display:block;width:32px;height:32px;background-position: 0 -4160px !important;background-image:url(//s7.addthis.com/static/r07/widget39_32x32.png)"></a></td>
<td><script>function fbs_click()  {u=location.href;t=document.title;window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');
return false;}</script>
<span>
<a href="http://www.facebook.com/share.php?u=Buraya Url Gelecek" style="display:block;width:32px;height:32px;background-position: 0 -3392px !important;background-image:url(http://ct5.addthis.com/static/r07/widget056_32x32.gif)" onclick="return fbs_click()" target="_blank"></a>
</td>
<td>
<a class="addthis_button_twitter"></a></td><td>
<a class="addthis_button_email"></a></td><td>
<a class="addthis_button_blogger"></a></td><td>
<a class="addthis_button_delicious"></a>
<a class="addthis_button_friendfeed"></a>
<a class="addthis_button_linkedin"></a>
<a class="addthis_button_yahoomail"></a>
<a class="addthis_button_compact"></a></td></tr></table>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f2551d25c61b3f7"></script>
<style>.gpluss:hover{opacity:0.6;filter: alpha(opacity=60);}</style>
<!-- Koddosstu Button END -->
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style " style="margin-top:10px;float:right;width:400px;">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_google_plusone" style="width:53px;margin-top:3px;"></a>
<a class="addthis_button_tweet" style="width:83px;"></a>
<a class="addthis_button_pinterest_pinit"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-519e70864ca25d19"></script>
<!-- AddThis Button END -->
</div>

<div id="i2filmyorumlar">
<?php $this->load->view('yorum_yap'); ?>
<div class="y_yap">
<div class="yorum_baslik cf1"><i style="margin-top:4px!important;" class="kucuk-ok"></i> "<?php echo $film[0]->film_baslik; ?>" Filmine yapılan  yorumlar</div>
<ul class="yorumlar">
<script type="text/javascript">
$(document).ready(function(){
	$(".yanitla-link").click(function(){
	var i = $('.yanitla-link').index(this);
	$(".y-yanit").eq(i).slideToggle('slow');
	return false;
	});
	$(".yy_gonder").click(function(){
	var i = $('.yy_gonder').index(this);
	var isim = $(".y-yanit input[name=yy_isim]").eq(i).val();
	var mail = $(".y-yanit input[name=yy_mail]").eq(i).val();
	var yanit = $(".y-yanit input[name=y_yanit]").eq(i).val();
	var yid = $(".y-yanit input[name=yy_isim]").eq(i).attr('class');
	$.ajax({
	type:"POST",
	url:"<?php echo site_url(); ?>/anasayfa/yyanit",
	data:{"yazan":isim,'mail':mail,'yorum':yanit,'yid':yid,'fid':<?php echo $film[0]->film_id; ?>},
	success:function(sonuc){
	if (sonuc == "eklendi"){
	$(".y-yanit").slideUp('slow',function(){
	$(this).remove();
	});
	// $(".y-yanit").eq(i).remove();
	$(".yyanitlari").eq(i).prepend('<div class="y-yanit-y" style="background:rgb(233, 233, 233);display:none;"><strong>'+isim+'</strong>&nbsp;'+yanit+'</div>');
	$(".yyanitlari:eq("+i+") .y-yanit-y").eq(0).show('slow');
	}else {
	var p = $(".y-yanit p").eq(i).attr('class');
	if (p != 'pvar'){
	$('.y-yanit').eq(i).prepend('<p class="pvar" style="display:none;font-size: 11px;padding: 5px;color: rgb(172, 55, 55);background: #ffeceb!important;border: 1px solid #f2c4c2!important;">Girdiğiniz bilgiler eksik veya geçersiz.</p>');
	$(".y-yanit p").eq(i).show('slow');;
	}else {
	$(".y-yanit p").eq(i).fadeOut().fadeIn();
	}
	}
	}
	});
	});
	$(".daha-fazla-yanit").click(function(){
	var i = $(".daha-fazla-yanit").index(this);
	var sayi = $(".yyanitlari:eq("+i+") div:visible").length;
	$(".yyanitlari:eq("+i+") div:lt("+(sayi+2)+")").slideDown();
	return false;
	});
	$(".yorum-arti").click(function(){
		var i = $(".yorum-arti").index(this);
		var yid = $(this).attr('id');
		$.ajax({
		type:"POST",
		url:"",
		data:{"yid":yid,"y-arti":"y-arti","ypuan":"yp"},
		success:function(sonuc){
		var sayi = parseInt($(".yorum-eksi").next().eq(i).text());
		$(".yorum-eksi").next().eq(i).html((sayi+1));
		$("#puanver*:eq("+i+") a").hide();
		$("#puanver*").eq(i).prepend('<a href="#" onclick="return false" style="opacity:0.5"><img src="<?php echo base_url(); ?>tema/resimler/arti.png" alt="" /></a><a href="#" onclick="return false" style="opacity:0.5"><img src="<?php echo base_url(); ?>tema/resimler/eksi.png" alt="" /></a>');
		}
		});
		return false;
	});
	$(".yorum-eksi").click(function(){
		var i = $(".yorum-eksi").index(this);
		var yid = $(this).attr('id');
		$.ajax({
		type:"POST",
		url:"",
		data:{"yid":yid,"y-eksi":"y-eksi","ypuan":"yp"},
		success:function(sonuc){
		var sayi = parseInt($(".yorum-eksi").next().eq(i).text());
		$(".yorum-eksi").next().eq(i).html((sayi-1));
		$("#puanver*:eq("+i+") a").hide();
		$("#puanver*").eq(i).prepend('<a href="#" onclick="return false" style="opacity:0.5"><img src="<?php echo base_url(); ?>tema/resimler/arti.png" alt="" /></a><a href="#" onclick="return false" style="opacity:0.5"><img src="<?php echo base_url(); ?>tema/resimler/eksi.png" alt="" /></a>');
		}
		});
		return false;
	});
});
</script>
<?php
$yorumlarr = $yorumlar["yorumlar"];
$i=0;
if (count($yorumlar["yorumlar"]) > 0){
 foreach ($yorumlarr as $y){
$yanitlar = $yorumlar["yanitlar"][$i++];
echo '<li>
<div class="yorumlar-av"><img src="http://cdnstatic.visualizeus.com/css/images/noAvatar3.gif" alt="avatar yok" /></div>
<div class="yorumlar-s">';
if (get_cookie('ypuan'.$y->id) != $y->id){
echo '<div class="y_yazan">'.$y->y_yazan.'<div id="puanver" class="y-artieksi">'; 
echo '<a href="#" id="'.$y->id.'" class="yorum-arti"><img src="'.base_url().'tema/resimler/arti.png" alt="" /></a><a class="yorum-eksi" id="'.$y->id.'" href="#"><img src="'.base_url().'tema/resimler/eksi.png" alt="" /></a>';
echo '<font>'.$y->y_puan.'</font></div></div>';
}else {
echo '<div class="y_yazan">'.$y->y_yazan.'<div class="y-artieksi">'; 
echo '<a href="#" onclick="return false" style="opacity:0.5"><img src="'.base_url().'tema/resimler/arti.png" alt="" /></a><a href="#" onclick="return false" style="opacity:0.5"><img src="'.base_url().'tema/resimler/eksi.png" alt="" /></a>';
echo '<font>'.$y->y_puan.'</font></div></div>';
}
echo '<div class="y_yorum">'.$y->y_yorum.'</div>';
if (get_cookie('yorumyap') == time() || get_cookie('yorumyap') < time()){
echo '<div class="y-yanit"><input style="width:40%!important;" type="text" class="'.$y->id.'" name="yy_isim" placeholder="İsim yada takma adın" /><input style="width:54.8%;" type="text" name="yy_mail" placeholder="E-Posta adresin" /><input style="width:97%!important;margin:-2px 1px;" type="text" name="y_yanit" placeholder="Bu yorum için yanıtın" /><div style="clear:both;"></div><button class="yy_gonder">Yanıtla</button></div>';
}else {
echo '<div class="y-yanit"><p style="font-size: 11px;padding: 5px;color: rgb(172, 55, 55);background: #ffeceb!important;border: 1px solid #f2c4c2!important;">30 saniye arayla yorum yapabilirsiniz.Tekrar yorum yapabilmek için bekleyin.</p></div>';
}
echo '<a href="#" class="yanitla-link">Yanıtla</a><div style="clear:both;"></div>'; 
if (count($yanitlar) > 0){
echo '<div class="y-yanit-b">Bu yoruma ('.count($yanitlar).') yanıt verildi</div>';
}
echo '<div class="yyanitlari">';
$yg = 0;
foreach ($yanitlar as $ya){
// echo $yg++;
?>
<script type="text/javascript">$(document).ready(function(){ 	$(".yyanitlari:eq(<?php echo $yg++; ?>) div:lt(2)").show(); });</script>
<?php
echo '<div class="y-yanit-y" style="display:none;"><strong>'.$ya->y_yazan.'</strong>&nbsp;'.$ya->y_yorum.'</div>';
}
echo '</div>';
if (count($yanitlar) > 2){
echo '<a href="#" class="daha-fazla-yanit">Daha fazlasını göster</a>';
}else {
echo '<a href="#" class="daha-fazla-yanit" style="display:none;">Daha fazlasını göster</a>';
}
echo'</div>';
echo '</li>';
}
}else {
echo "<p style='padding:5px;text-align:center;'>Henüz yorum yok..</p>";
}
 ?>
</ul>
</div>
</div>
<div id="i2anketyorum">
<div class="y_yap">
<div class="yorum_baslik cf1"><i style="margin-top:4px!important;" class="kucuk-ok"></i> Öne çıkan yorumlar</div>
<ul class="yorumlar">
<?php 
if (count($onecikanyorumlar) > 0){
foreach ($onecikanyorumlar as $y){
echo '<li>
<div class="yorumlar-av"><img src="http://cdnstatic.visualizeus.com/css/images/noAvatar3.gif" alt="avatar yok" /></div>
<div class="yorumlar-s" style="width:82%!important;">';
if (get_cookie('ypuan'.$y->id) != $y->id){
echo '<div class="y_yazan">'.$y->y_yazan.'<div id="puanver" class="y-artieksi">'; 
echo '<a href="#" id="'.$y->id.'" class="yorum-arti"><img src="'.base_url().'tema/resimler/arti.png" alt="" /></a><a class="yorum-eksi" id="'.$y->id.'" href="#"><img src="'.base_url().'tema/resimler/eksi.png" alt="" /></a>';
echo '<font>'.$y->y_puan.'</font></div></div>';
}else {
echo '<div class="y_yazan">'.$y->y_yazan.'<div class="y-artieksi">'; 
echo '<a href="#" onclick="return false" style="opacity:0.5"><img src="'.base_url().'tema/resimler/arti.png" alt="" /></a><a href="#" onclick="return false" style="opacity:0.5"><img src="'.base_url().'tema/resimler/eksi.png" alt="" /></a>';
echo '<font>'.$y->y_puan.'</font></div></div>';
}
echo '<div class="y_yorum">'.$y->y_yorum.'</div></div>';
echo '</li>';
} 
}else {
echo "<p style='padding:5px;text-align:center;'>Henüz yorum yok..</p>";
}
?>
</ul>
</div>
<?php 
// echo '<pre>';
// print_r($anket);
?>
<?php 
$i=0;$y=0;
foreach ($anket["anketler"] as $a){
$y++;
$kt = $anket["sorular"][$y-1];
?>
<div class="y_yap">
<div class="yorum_baslik cf1"><i style="margin-top:4px!important;" class="kucuk-ok"></i> Anket</div>
<div class="ankets">
<h3 class="cf1"><?php echo $a->anket_baslik; ?></h3>
<ul class="anketsc">
<?php 
for ($z=0; $z < 6; $z++){
$toplam[$z] = $kt[$z]->anket_oy;
}
$xxx = array_sum($toplam);
	foreach ($anket["sorular"][$i++] as $s){
	$yuzde = round($s->anket_oy/$xxx*100);
	if (get_cookie('anketoy'.$a->id) != $a->id){
	echo '<li id="'.$a->id.'" class="'.$yuzde.'"><div class="anketinput"><input type="radio" name="ankets1" value="'.$s->id.'" /></div><span>'.$s->anket_soru.'</span><div class="anketyuzdecizgi"></div></li>';
	}else {
	echo '<li id="'.$a->id.'" class="'.$yuzde.'"><div class="anketinput">%'.$yuzde.'</div><span>'.$s->anket_soru.'</span><div class="anketyuzdecizgi" style="width:'.$yuzde.'%"></div></li>';
	}
	}
?>
</ul>
<div class="anketos"><a href="#" class="anketov"><font>Oy ver </font><div class="kucuk-ok-beyaz"></div></a><a href="#" class="anketsg"><font>Sonuçları göster </font><div class="kucuk-ok"></div></a></div>
</div>
</div>
<?php
}
?>
</div>
</div>
</div>