    <ul class="filmler" data-role="listview" data-inset="true">
<?php 
error_reporting(0);
if (count($filmler["filmler"]) < 1){
echo "<h3 style='padding:5px;'>Film bulunamadı</h3>";
}else {
foreach ($filmler["filmler"] as $f){
$resim = explode('|',$f['film_resim']);
echo '
        <li>
		<a data-ajax="false" style="width:95%;" href="'.site_url().'mobil/izle/'.$f['film_sef'].'">
		<img src="'.$resim[0].'" alt="'.$f['film_baslik'].'" />
		<br/>
		<font>'.$f["film_baslik"].' </font><font style="font-size:11px;color:#333;">('.$f["film_gosterim"].' kez izlenmiş)</font>
<div class="imdbvd"> <span>İMDB '.$f["film_imdb"].'</span> <span>';
$tip = $f["film_tip"];
if ($tip == 1){
echo "Altyazı";
}elseif ($tip == 2){
echo "Türkçe dublaj";
}else {
echo "Yerli film";
}
 echo '</span> </div>
<p class="filmaciklama"></p>
</a>
		</li>
';
}

}
?>
    </ul>

	<?php
	$limit = 1;
	$sayfa=$sayfa+1;
	if (isset($kategori)){
	$kategori = $kategori."/";
	}else {
	$kategori = "";
	}
	echo '<a data-role="button" data-inline="true" href="'.site_url().'mobil/anasayfa/'.$fonk.'/'.$kategori.'1">İlk sayfa</a>';
	for ($i=$sayfa - $limit; $i < $sayfa + $limit+1; $i++){
	if ($i > 0 and $i <= $ssayi){
	if ($i == $sayfa){
	echo '<a data-role="button" data-inline="true" class="ui-btn-active" href="'.site_url().'mobil/anasayfa/'.$fonk.'/'.$kategori.''.$i.'">'.$i.'</a>';
	}else {
	echo '<a data-role="button" data-inline="true" href="'.site_url().'mobil/anasayfa/'.$fonk.'/'.$kategori.''.$i.'">'.$i.'</a>';
	}
	}
	}
	?>