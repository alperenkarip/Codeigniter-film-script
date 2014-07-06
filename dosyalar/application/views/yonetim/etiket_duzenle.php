<div id="ypf_sol"><form action="" method="post">
<ul class="form-duzen"><li class="fd-li">
<label for="e_baslik">Etiket</label>
</li><li class="fd-li">
<input type="text" name="e_baslik" value="<?php echo $etiket[0]->e_baslik; ?>" />
</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">
<input type="submit" class="buton" value="Gönder" name="eduzenle" />
</form></div>
<div id="ypf_sag">
<div id="listeUL">
<h3>Bu etiket <?php echo $kullanan[1]; ?> filmde kullanılıyor</h3>
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