<div id="islemyap" style="float:right;">
<ul>
<li style="float:right;"><form action="<?php echo site_url(); ?>/yonetim/filmler" method="GET"><input type="text" name="fara" placeholder="Aramak için birşeyler yaz.!"/><input type="submit" value="Ara" class="buton" /></form></li>
</ul>
</div>
<form action="" method="post">
<div id="islemyap">
<ul>
<li><a href="<?php echo site_url(); ?>/yonetim/filmler/fe" class="buton">Film ekle</a></li>
<li><button type="submit" class="buton" onclick="return confirm('Silmek istediğinizden eminmisiniz?')">Seçilenleri sil</button></li>
</ul>
</div>
<table cellspacing="0" border="none">
<thead>
<tr>
<td>#</td>
<td><input type="checkbox" class="tumunu-sec" title="Hepsini Seç"></td>
<td>Başlık</td>
<td>Eklenme tarihi</td>
<td>Son düzenlenme tarihi</td>
<td>Ekleyen</td>
<td>İD</td>
</tr>
</thead>
<tbody>
<script type="text/javascript">
$(function () {
    $(".tumunu-sec").click(function(){
         $(this).closest('table')
                .find(':checkbox').attr('checked', this.checked);
    });
});
</script>
<style type="text/css">
.sureli td{background:#f3f3f3!important;}
</style>
<?php 

	$i=1;
	$tarih = date('Y-m-d H:i:00');
	foreach ($filmler as $f){
	echo '<tr class="tabloliste';
	if ($f->film_zaman > $tarih){ echo " sureli"; }
	echo '" >';
	echo '<td>'.$i++.'</td>';
	echo '<td><input type="checkbox" name="fsil[]" value="'.$f->id.'" /></td>';
	echo '<td><a href="'.site_url().'yonetim/filmler/fd/'.$f->id.'">'.$f->film_baslik.'</a></td>';
	echo '<td>'.$f->film_eklenme_tarihi.'</td>';
	echo '<td>'.$f->film_sgt.'</td>';
	echo '<td>'.$f->film_ekleyen.'</td>';
	echo '<td>'.$f->id.'</td>';
	echo '</tr>';
	}
	echo '</form>';
	
?>
</tbody>
<tfoot>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
</tfoot>
</table>
<div id="sayfalama">
<?php 
	$limit = 4;
	if (@$_GET["fara"]){
	$fara = "/?fara=".$_GET["fara"];
	}else {
	$fara = "";
	}
	if ($ssayi > 0){
	if ($sayfa > 1){
	echo '<a href="'.site_url().'yonetim/filmler/index/1'.$fara.'">İlk sayfa</a>';
	}
	for ($i=$sayfa-$limit; $i < $limit + $sayfa+1; $i++){
	if ($i > 0 and $i <= $ssayi){
	if ($i == $sayfa){
	echo '<a class="saktif" href="'.site_url().'yonetim/filmler/index/'.$i.$fara.'">'.$i.'</a>';
	}else {
	echo '<a href="'.site_url().'yonetim/filmler/index/'.$i.$fara.'">'.$i.'</a>';
	}
	}
	}
	if ($sayfa != $ssayi){
	echo '<a href="'.site_url().'yonetim/filmler/index/'.($sayfa+1).$fara.'">Sonraki</a>';
	}
	}
?>
</div>