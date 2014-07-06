<?php if (!$parca){ $parca=1; $par = $parca-1;}else {$par = $parca-1; } error_reporting(0); ?>
<?php
 $resim = explode('|',$film[0]->film_resim); ?>
<div class="film">
<div class="filmbilgileri">
<img src="<?php echo $resim[1]; ?>" alt="film baslik" />
<span>İMDB</span><?php echo $film[0]->film_baslik; ?>
<span>Gösterim tarihi</span><?php echo $film[0]->film_gosterim_tarihi; ?>
<span>Yönetmen</span><?php echo $film[0]->film_yonetmen; ?>
<span>Yapım</span><?php echo $film[0]->film_yapim; ?>
<span>Tür</span>komedi,dram,komedi,Savaş,komedi,
<span>Oyuncular</span><?php echo $film[0]->film_oyuncular; ?>
<span>Açıklama</span><?php echo $film[0]->film_ozet; ?>
</div>
<div class="partlar">
<?php 
	foreach ($partlar as $v){
	echo '<a data-ajax="false" href="'.site_url().'mobil/anasayfa/izle/'.$film[0]->film_sef.'/part/'.$v["p_sira"].'" data-role="button" data-inline="true">'.$v["p_baslik"].'</a>';
	}
?>
</div>
<br/>
<div class="filmkod">
<?php echo $partlar[$par]["p_kod"]; ?>
</div>
</div>