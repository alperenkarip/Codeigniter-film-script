<?php 
// echo '<pre>';
// print_r($f);
	error_reporting(0);
if ($duzen == 4){
?>
<div id="duzen4" class="sc">
	<div id="duzen4sol">
	
	</div>
	<div id="duzen4sag">
	
<?php 
	$i=0;
	foreach ($f["filmler"] as $x){
	$resim = explode('|',$x["film_resim"]);
	echo '<a class="d4film" href="'.site_url().'izle/'.$x["film_sef"].'"><img src="'.$resim[0].'" alt="'.$x["film_baslik"].'" /></a>';
	echo '<div id="d4filmler">';
?>
	<div class="duzen4solresim"><a href="<?php echo site_url(); ?>/izle/<?php echo $x["film_sef"]; ?>"><img src="<?php echo $resim[1]; ?>" alt="<?php echo $x["film_baslik"] ?>" /></a></div>
	<div class="duzen4solbilgiler">
	<div class="d4sbu">
	<h3 class="d4sbb"><?php echo $x["film_baslik"]; ?></h3>
	<h4 class="d4sbi" style="margin-right:10px">İMDB <?php echo $x["film_imdb"] ?></h4>
	<h4 class="d4sbt"><?php if (@$x["film_tip"] == 1){echo 'Altyazı';}elseif (@$x["film_tip"] == 2){echo 'Türkçe dublaj';}elseif (@$x["film_tip"] == 3){echo 'Yerli film';} ?></h4>
	</div>
	<div class="d4sbd">
	<div class="d4sby">
	<span class="d4sbx">Tür:</span>
	<span class="d4sbz"><?php foreach ($f['turleri'][$i++] as $v){ echo '<a href="'.site_url().''.$v->tur_sef.'/filmleri">'.$v->tur_baslik.'</a>,';	} ?></span>
	</div>
	<div class="d4sby">
	<span class="d4sbx">Filmin konusu:</span>
	<span class="d4sbz" style="width:100%;overflow:hidden;"><?php echo mb_substr($x["film_ozet"],0,400); ?>....</span>
	</div>
	</div>
	</div>
<?php
	echo '</div>';
	}
?>
	</div>
</div>
<?php 
	echo '<div style="clear:both;"></div>';
	$limit = 5;
	if ($this->uri->segment(2) == "filmleri"){
	$kategori = 'filmleri'."/";
	}else {
	$kategori = "";
	}
	$etiket = @$f["filmler"][0]["e_sef"];
	if (isset($etiket)){
	$etiket = $etiket."/";
	}else {
	$etiket = "";
	}
	$ara = $this->uri->segment(1);
	if ($ara == 'ara'){
	$ara = $this->uri->segment(2).'/';
	}else {
	$ara = "";
	}
if ($ssayi > 0){
	echo '<div id="sayfala">';
	echo '<a href="'.site_url().''.$fonk.'/'.$kategori.''.$etiket.$ara.'1">İlk sayfa</a>';
	for ($i=$sayfa - $limit; $i < $sayfa+$limit+1; $i++){
		if ($i > 0 && $i <= $ssayi){
if ($i == $sayfa){
	echo '<a class="saktif" href="'.site_url().''.$fonk.'/'.$kategori.''.$etiket.$ara.''.$i.'">'.$i.'</a>';
}else {
	echo '<a href="'.site_url().''.$fonk.'/'.$kategori.''.$etiket.$ara.''.$i.'">'.$i.'</a>';
}
		}
	}
if ($sayfa != $ssayi){
	echo '<a href="'.site_url().''.$fonk.'/'.$kategori.''.$etiket.$ara.''.($sayfa+1).'">Sonraki</a>';
}
	echo '</div>';
}
?>
<?php
}elseif ($duzen == 1){
?>
<script type="text/javascript" src="<?php echo base_url(); ?>tema/nested/jquery.nested.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>tema/tipsy/jquery.tipsy.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>tema/tipsy/tipsy.css" />
<script type="text/javascript">
$(function() {
	$('#filmler li').tipsy({gravity: 'w', fade: false,html:true,title:function(){
	var i = $(this).index();
			return $('#filmler li #d1h').eq(i).html();
	},trigger:'manual'});
	$(".reklam").hide();
});
</script>
<script type="text/javascript" >
  $(function() { 
  $("#filmler li:even").addClass("box size23");
  $("#filmler li:odd").addClass("box size22");
  $("#filmler").nested();
	// $("#filmler li").css({'margin':'-10px!important'});
	$("#filmler li").each(function(i){
	var genislik = $("#filmler li").eq(i).width();
	var yukseklik = $("#filmler li").eq(i).height();
	$("#filmler li img").eq(i).width(""+genislik+"");
	$("#filmler li img").eq(i).height(""+yukseklik+"");
	});
  });
</script>
<ul id="filmler">
<?php 
if (count($f["filmler"]) < 1){
	echo '<h2>Film bulunamadı.</h2>';
}
else {
	foreach (@$f["filmler"] as $film){
		$frs = explode('|',$film["film_resim"]);
		// class="box size'.rand(32,35).'"
		echo '<li>';
		echo '<a href="'.site_url().'izle/'.$film["film_sef"].'"><img src="'.$frs[0].'" alt="'.$film["film_baslik"].' filmi izle" />
		<div id="d1h">
		<div class="d1fh"><h3>'.$film["film_baslik"].'</h3><br/>
		<p class="d1fha">'.substr($film["film_ozet"],0,300).'.....</p>
		</div>
		<br/>
		<div class="d1fhalt">
		<span class="d1fhd"><strong>';
		if (@$film["film_tip"] == 1){echo 'Altyazı';}elseif (@$film["film_tip"] == 2){echo 'Türkçe dublaj';}elseif (@$film["film_tip"] == 3){echo 'Yerli film';}
		echo '</strong></span>
		<span class="d1fhi"><strong>'.$film["film_imdb"].'</strong></span>
		</div>
		</div>
		</a>';	
		echo '</li>';		
	}
}
?>
</ul>
<?php 
if (!$k){
	echo '<div style="clear:both;"></div>';
	$limit = 5;
	if ($this->uri->segment(2) == "filmleri"){
	$kategori = $this->uri->segment(2)."/";
	}else {
	$kategori = "";
	}
	$etiket = @$f["filmler"][0]["e_sef"];
	if (isset($etiket)){
	$etiket = $etiket."/";
	}else {
	$etiket = "";
	}
	$ara = $this->uri->segment(1);
	if ($ara == 'ara'){
	$ara = $this->uri->segment(2).'/';
	}else {
	$ara = "";
	}
if ($ssayi > 0){
	echo '<div id="sayfala">';
	echo '<a href="'.site_url().''.$fonk.'/'.$kategori.''.$etiket.$ara.'1">İlk sayfa</a>';
	for ($i=$sayfa - $limit; $i < $sayfa+$limit+1; $i++){
		if ($i > 0 && $i <= $ssayi){
if ($i == $sayfa){
	echo '<a class="saktif" href="'.site_url().''.$fonk.'/'.$kategori.''.$etiket.$ara.''.$i.'">'.$i.'</a>';
}else {
	echo '<a href="'.site_url().''.$fonk.'/'.$kategori.''.$etiket.$ara.''.$i.'">'.$i.'</a>';
}
		}
	}
if ($sayfa != $ssayi){
	echo '<a href="'.site_url().''.$fonk.'/'.$kategori.''.$etiket.$ara.''.($sayfa+1).'">Sonraki</a>';
}
	echo '</div>';
}
}
?>
<?php
}elseif ($duzen == 2){

?>
<script type="text/javascript">
$(function(){
$(".reklam").hide();
})
</script>
<ul id="D2">
<?php
if (count($f["filmler"]) < 1){
	echo '<h2>Film bulunamadı.</h2>';

}
else {
	$i=0; $z=0;
	foreach ($f["filmler"] as $film){
	@$filmr = explode('|',@$film['film_resim']);
		echo '<li class="d2fli">';
		echo '<div id="d2sol">'; 
		echo '<div class="d2resim">';
		echo '<span class="d2dublaj">';
		if (@$film["film_tip"] == 1){echo 'Altyazı';}elseif (@$film["film_tip"] == 2){echo 'Türkçe dublaj';}elseif (@$film["film_tip"] == 3){echo 'Yerli film';}
		echo '</span>';
		echo '<span class="d2imdb">İMDB '.@$film["film_imdb"].'</span>';
		echo '<a href="'.site_url().'izle/'.@$film["film_sef"].'"><img src="'.@$filmr[0].'" alt="'.@$film["film_baslik"].' filmi izle" /></a></div>';
		echo '</div>';
		echo '<div id="d2sag">';
		echo '<h3 class="d2baslik cf2"><a href="'.site_url().'izle/'.@$film["film_sef"].'">'.@$film["film_baslik"].'</a></h3>';
		echo '<ul class="d2li"><li><span><strong>Tür : </strong></span>';
		foreach ($f['turleri'][$i++] as $v){ echo '<a href="'.site_url().''.$v->tur_sef.'/filmleri">'.$v->tur_baslik.'</a> ';	}
		echo '</li>';
		echo '<li>'.mb_substr($film["film_ozet"],0,300).'... </li>';
		echo '</ul>';
		echo '</div>';
	echo '<div style="clear:both;"></div>';
	$puanlari = $f["puanlari"][$z++];
	echo '<ul class="d2puan"><li>Çok iyi ('.$puanlari['pcg'].')</li><li>Fena değil ('.$puanlari['pie'].')</li><li>Berbat('.$puanlari['pbb'].')</li><li>Toplam ('.$puanlari["psayi"].') Oy</li></ul>';
		echo '</li>';
	}
}
 ?>
</ul>
<?php 
	echo '<div style="clear:both;"></div>';
	$limit = 5;
	if ($this->uri->segment(2) == "filmleri"){
	$kategori = $this->uri->segment(3)."/";
	}else {
	$kategori = "";
	}
	$etiket = @$f["filmler"][0]["e_sef"];
	if (isset($etiket)){
	$etiket = $etiket."/";
	}else {
	$etiket = "";
	}
	$ara = $this->uri->segment(1);
	if ($ara == 'ara'){
	$ara = $this->uri->segment(2).'/';
	}else {
	$ara = "";
	}
if ($ssayi > 0){
	echo '<div id="sayfala">';
	echo '<a href="'.site_url().''.$fonk.'/'.$kategori.''.$etiket.$ara.'1">İlk sayfa</a>';
	for ($i=$sayfa - $limit; $i < $sayfa+$limit+1; $i++){
		if ($i > 0 && $i <= $ssayi){
if ($i == $sayfa){
	echo '<a class="saktif" href="'.site_url().''.$fonk.'/'.$kategori.''.$etiket.$ara.''.$i.'">'.$i.'</a>';
}else {
	echo '<a href="'.site_url().''.$fonk.'/'.$kategori.''.$etiket.$ara.''.$i.'">'.$i.'</a>';
}
		}
	}
if ($sayfa != $ssayi){
	echo '<a href="'.site_url().''.$fonk.'/'.$kategori.''.$etiket.$ara.''.($sayfa+1).'">Sonraki</a>';
}
	echo '</div>';
}
?>
<?php
}elseif ($duzen == 3){
// echo '<pre>';
// print_r($f);
?>
<div id="d3">
<div id="d3sol">
<ul class="d3filmler">
	<?php 
	$i=0;$z=0;$x=0;
	if ($f["filmler"] > 0){
	foreach ($f["filmler"] as $d3){
	$fr = explode('|',$d3["film_resim"]);
	echo '<li class="d3filmler-li">';
	echo '<div class="d3fbaslik"><h3><a href="'.site_url().'izle/'.@$d3["film_sef"].'">'.$d3["film_baslik"].'</a></h3></div>';
	echo '<div class="d3fbalt">'.substr($d3["film_eklenme_tarihi"],0,10).' Tarihinde Eklenmiş, <strong>'.$d3["film_gosterim"].'</strong> Kişi İzlemiş, <strong>'.$f["yorums"][$x++].'</strong> Yorum Yapılmış</div>';
	echo '<div class="d3ffilm">
	<div class="d3fresim"><span class="d3fd">';
	if (@$d3["film_tip"] == 1){echo 'Altyazı';}elseif (@$d3["film_tip"] == 2){echo 'Türkçe dublaj';}elseif (@$d3["film_tip"] == 3){echo 'Yerli film';}
	echo '</span><a href="'.site_url().'izle/'.@$d3["film_sef"].'"><img width="162" height="242" src="'.$fr[0].'" alt="'.$d3["film_baslik"].' izle" /></a></div>
	<div class="d3fb"><ul>'; 
	echo '<li><div class="d3fo">'.$d3["film_ozet"].'</div></li><li><span><strong>İMDB : </strong></span> '.$d3["film_imdb"].'</li>';
echo '<li><span><strong>Türleri :</strong></span> ';
	foreach ($f['turleri'][$i++] as $v){ echo '<a href="'.site_url().''.$v->tur_sef.'/filmleri">'.$v->tur_baslik.'</a> ';	}
echo '</li>';
echo '<li><span><strong>Yapım tarihi : </strong></span>'.$d3["film_yapim"].'</li>';
echo '<li><span><strong>Yönetmen : </strong></span>'.$d3["film_yonetmen"].'</li>';
echo '<li><span><strong>Oyuncular : </strong></span>'.$d3["film_oyuncular"].'</li>';
	echo'</ul></div>
	</div>';
	$puanlari = $f["puanlari"][$z++];
	echo '<ul class="d3puan"><li>Çok iyi ('.$puanlari['pcg'].')</li><li>Fena değil ('.$puanlari['pie'].')</li><li>Berbat('.$puanlari['pbb'].')</li><li>Toplam ('.$puanlari["psayi"].') Oy</li></ul>';
	echo '</li>';
	echo '<div style="clear:both;"></div>';
	}
	}else {
	echo '<h2 style="margin:10px;">Film bulunamadı.</h2>';
	}
	?>
</ul>
<?php 
	echo '<div style="clear:both;"></div>';
	$limit = 5;
	if ($this->uri->segment(2) == "filmleri"){
	$kategori = $this->uri->segment(3)."/";
	}else {
	$kategori = "";
	}
	$etiket = $this->uri->segment(2);
	if ($etiket == 'etiket'){
	$etiket = @$f["filmler"][0]["e_sef"];
	$etiket = $etiket."/";
	}else {
	$etiket = "";
	}
	$ara = $this->uri->segment(1);
	if ($ara == 'ara'){
	$ara = $this->uri->segment(2).'/';
	}else {
	$ara = "";
	}
if ($ssayi > 0){
	echo '<div id="sayfala">';
	echo '<a href="'.site_url().''.$fonk.'/'.$kategori.''.$etiket.$ara.'1">İlk sayfa</a>';
	for ($i=$sayfa - $limit; $i < $sayfa+$limit+1; $i++){
		if ($i > 0 && $i <= $ssayi){
if ($i == $sayfa){
	echo '<a class="saktif" href="'.site_url().''.$fonk.'/'.$kategori.''.$etiket.$ara.''.$i.'">'.$i.'</a>';
}else {
	echo '<a href="'.site_url().''.$fonk.'/'.$kategori.''.$etiket.$ara.''.$i.'">'.$i.'</a>';
}
		}
	}
if ($sayfa != $ssayi){
	echo '<a href="'.site_url().''.$fonk.'/'.$kategori.''.$etiket.$ara.''.($sayfa+1).'">Sonraki</a>';
}
	echo '</div>';
}
?>
</div>
<div id="d3sag">
<ul id="d3sagli">
<li>
<div class="d3sagkatbas"><h3>Türler</h3></div>
<ul class="d3e_ustun">
<?php 
	foreach ($turler as $t){
echo '<li>';
echo '<i class="d3-sag-menu-ok"></i>';
echo '<a href="'.site_url().''.$t->tur_sef.'/filmleri">'.$t->tur_baslik.'</a>';
echo '<span class="d3-sag-menu-sayi"></span>';
echo '</li>';
	}
?>
</ul>
</li>
<li>
<div class="d3sagkatbas"><h3>Tercihler</h3></div>
<ul class="d3e_ustun">
<?php 
	foreach ($ustun_e as $e){
	echo '<li>'; 
echo '<i class="d3-sag-menu-ok"></i>';
	echo '<a href="'.site_url().'etiket/'.$e->e_sef.'">'.$e->e_baslik.'</a>';
echo '<span class="d3-sag-menu-sayi"></span>';
	echo'</li>';
	}
?>
</ul>
</li>
</ul>
<?php 
	$reklamkatalt = explode('||',@$reklamkatalt[0]->r_kod);
	if (strlen(@$reklamkatalt[2]) > 0){
?>
<div class="d3sagkatbas"><h3>Reklamlar</h3></div>
<div id="d3kataltreklam" class="reklam">
<?php 
	echo $reklamkatalt[2];
?>
</div>
<?php 
}
?>
</div>
</div>
<?php
}
?>