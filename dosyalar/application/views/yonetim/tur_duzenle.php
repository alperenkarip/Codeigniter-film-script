<div id="ypf_sol" style="width:900px">
<form action="" method="post">
<ul class="form-duzen"><li class="fd-li">
<label for="tur_baslik">Tür</label>
</li><li class="fd-li">
<input type="text" name="tur_baslik" value="<?php echo $tur[0]->tur_baslik; ?>"  />
</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">
<label for="tur_keyw">Kategori anahtar kelimeleri</label>
</li><li class="fd-li">
<input type="text" name="tur_keyw" value="<?php echo $tur[0]->tur_keyw; ?>" />
</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">
<label for="tur_desc">Kategori açıklaması</label>
</li><li class="fd-li">
<input type="text" name="tur_desc"  value="<?php echo $tur[0]->tur_desc; ?>"/>
</li></ul><div style="clear:both"></div>
<input type="submit" value="Gönder" class="buton" name="tduzenle" />
</form>
</div>
<div id="ypf_sag">
<div id="listeUL">
<h3>Bu tür <?php echo $kullanan[1]; ?> filmde kullanılıyor</h3>
<ul>
<?php 
	$y = 0;
	$z = 0;
	for ($i=0; $i < count($kullanan[0]); $i++){
	echo '<li><a href="'.site_url().'yonetim/filmler/fd/'.$kullanan[0][$i]->film_id.'">'.$kullanan[0][$i]->film_baslik.'</a></li>';
	}
?>
</ul>
</div>
</div>