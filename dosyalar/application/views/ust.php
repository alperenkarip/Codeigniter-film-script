<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>tema/css/stil.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>tema/css/glyphicons.css" type="text/css" />
	<title><?php echo $title; ?></title>
	<meta property="og:title" content="<?php echo $title; ?>" />
	<meta property="og:description" content="<?php echo $aciklama; ?>" />
	<?php if (isset($resim)){?> <meta property="og:image" content="<?php echo $resim; ?>" /> <?php } ?>
<meta name="description" content="<?php echo $aciklama; ?>" />
<meta name="keywords" content="<?php if (is_array($anahtar)){ foreach ($anahtar as $a){ echo $a->e_baslik.","; } }else { echo $anahtar; } ?>" />
<link rel="alternate" href="/rss/" title="rss" type="application/rss+xml" />
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/cufon/1.09i/cufon-yui.js"></script>
<script src="<?php echo base_url(); ?>tema/js/myriad-pro.cufonfonts.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>tema/js/gerekli.js" type="text/javascript"></script>
<script type="text/javascript">
Cufon.replace('.myriad_pro_semibold_italic', { fontFamily: 'Myriad Pro Semibold Italic', hover: true }); 
Cufon.replace('.myriad_pro_semibold', { fontFamily: 'Myriad Pro Semibold', hover: true }); 
Cufon.replace('.cf1', { fontFamily: 'Myriad Pro Regular', hover: true }); 
Cufon.replace('.myriad_pro_condensed_italic', { fontFamily: 'Myriad Pro Condensed Italic', hover: true }); 
Cufon.replace('.cf3', { fontFamily: 'Myriad Pro Condensed', hover: true }); 
Cufon.replace('.myriad_pro_bold_italic', { fontFamily: 'Myriad Pro Bold Italic', hover: true }); 
Cufon.replace('.myriad_pro_bold_condensed_italic', { fontFamily: 'Myriad Pro Bold Condensed Italic', hover: true }); 
Cufon.replace('.cf2', { fontFamily: 'Myriad Pro Bold Condensed', hover: true }); 
Cufon.replace('.myriad_pro_bold', { fontFamily: 'Myriad Pro Bold', hover: true }); 
</script>
</head>
<body>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter21393037 = new Ya.Metrika({id:21393037,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/21393037" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
	<?php 
	@$arkareklam = explode('||',$arkareklam[0]->r_kod);
	if (@$arkareklam[0]){
	echo '<style type="text/css">.areklam {background:url('.$arkareklam[0].') top center no-repeat #000000!important; }</style>';
	}
	?>
<style type="text/css">
.areklam {
	background:#fff;
	float:left;
	width: 100%;
	height: 100%;
	overflow:hidden;
	position : fixed;
	_position : absolute;
	top	: 0;
	_top : expression(eval(document.body.scrollTop));
	margin: 0px 0px 0px 0px;
	padding: 0px 0px 0px 0px;
	border: 0px;
	z-index:0;
	}

.areklam a{
	float:left;
	width: 100%;
	height: 100%;
	overflow:hidden;
	margin: 0px 0px 0px 0px;
	padding: 0px 0px 0px 0px;
	border: 0px;
	}
</style>
	<div id="hepsi">
	<?php 
	if (@$arkareklam[1]){
echo '<div class="areklam">';
	echo '<a href="'.$arkareklam[1].'" target="_blank"></a>';
echo '</div>';
	}else {
?>
<style type="text/css">
body {background:url(<?php echo $sistem[0]->site_arkaplan;  ?>) <?php echo $sistem[0]->site_arka_t > 0 ? '' : 'no-repeat'; ?>  fixed;
-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}
</style>
<?php
	}
	?>
<div id="ust2">
<div id="ust2sol"><a href="<?php echo site_url(); ?>"><img alt="<?php echo $sistem[0]->site_baslik; ?>" src="<?php echo base_url(); ?>tema/resimler/erenalp2.png" alt="" /></a></div>
<div id="ust2sag">
<div id="ust2menu">
	<a class="cf2" href="<?php echo site_url(); ?>"><h3>Anasayfa</h3></a>
	<a class="cf2 manh" href="<?php echo site_url(); ?>"><h3>Türler</h3></a>
	<a class="cf2 manh" href="<?php echo site_url(); ?>"><h3>Tercihler</h3></a>
	<a class="cf2 manh" href="<?php echo site_url(); ?>"><h3>Sen belirle</h3></a>
	<?php 
	foreach ($sayfalar as $s){
echo '<a class="cf2" href="'.site_url().'sayfa/'.$s->id.'/'.$s->s_sef.'"><h3>'.$s->s_baslik.'</h3></a>';
	}
	?>
	<a class="cf2" href="<?php echo site_url(); ?>iletisim"><h3>Bize ulaşın</h3></a>
<form style="width:140px;overflow:auto;" action="<?php echo site_url().'/anasayfa/ara/'; ?>" method="post"><input style="margin-top:12px;" class="input" type="text" name="kelime" placeholder="Ne izlemek istersin?" />
	</form>
	</div>
	<div id="mturler" class="manh">
	<div class="mmenuicerik" style="display:none;">
<?php 
	foreach ($turler as $t){
	echo '<a href="'.site_url().$t->tur_sef.'/filmleri">'.$t->tur_baslik.'</a>';
	}
?>
	</div>
	</div>
	<div id="mturler" class="manh">
	<div class="mmenuicerik" style="display:none;">
<?php 
	foreach ($ustun_e as $e){
	echo '<a href="'.site_url().'etiket/'.$e->e_sef.'">'.$e->e_baslik.'</a>';
	}
?>
	</div>
	</div>
<div id="mturler" class="manh">
	<div class="uTurler mmenuicerik menuicerikb" style="display:none;">
	<?php 
	foreach ($turler as $t){
	echo '<a href=/t/'.$t->id.'><i class="check-icon"></i>';
	echo $t->tur_baslik;
	echo '</a>';
	}
	?>
	</div>
	</div>
</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
	var kat = "";
	$(".uTurler a").click(function(e){
	$(".reklam").remove();
	e.preventDefault();
	kat = "";
	var index = $('.uTurler a').index(this);
	$(".mmenuicerik i").eq(index).toggleClass("itik");
	$(this).toggleClass("secti");
	$(".uTurler a").filter(".secti").each(function(){	kat += "-"+$(this).attr("href").slice(3); 	});
	if (kat==""){ kat ="0"; }
	kat = kat.slice(1);
	$.get("<?php echo site_url(); ?>/anasayfa/k/"+kat,function(sonuc){
	$("#orta").html(sonuc);
	});
	});
	});
</script>
<?php 
	$reklamust = explode('||',@$reklamust[0]->r_kod);
	if (strlen(@$reklamust[2]) > 0){
	echo '<div id="reklamUst" class="reklam">';
	echo $reklamust[2];
	echo '</div>';
	}
	$reklamsol = explode('||',@$reklamsol[0]->r_kod);
	if (strlen(@$reklamsol[2]) > 0){
	echo '<div id="reklamsol" class="reklam">';
	echo $reklamsol[2];
	echo '</div>';
	}
	$reklamsag = explode('||',@$reklamsag[0]->r_kod);
	if (strlen(@$reklamsag[2]) > 0){
	echo '<div id="reklamsag" class="reklam">';
	echo $reklamsag[2];
	echo '</div>';
	}
	?>