<form action="" method="post">
<div id="islemyap">
<li><button type="submit" class="buton" onclick="return confirm('Silmek istediğinizden eminmisiniz?')">Seçilenleri sil</button></li>
</div>
<table border="0">
<thead>
<tr>
<td>#</td>
<td><input type="checkbox" class="tumunu-sec" title="Hepsini Seç"></td>
<td>Film başlık</td>
<td>Ekleyen</td>
<td>E-Posta</td>
<td>Eklenme tarihi</td>
<td>Son düzenlenme tarihi</td>
<td>Durum</td>
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
<?php 

	$i=1;
	foreach ($yorumlar as $y){
	echo '<tr>';
	echo '<td>'.$i++.'</td>';
	echo '<td><input type="checkbox" name="ysil[]" value="'.$y->id.'" /></td>';
	echo '<td><a href="'.site_url().'yonetim/yorumlar/yd/'.$y->id.'">'.$y->film_baslik.'</a></td>';
	echo '<td>'.$y->y_yazan.'</td>';
	echo '<td>'.$y->y_mail.'</td>';
	echo '<td>'.$y->y_tarih.'</td>';
	echo '<td>'.$y->y_sgt.'</td>';
	echo '<td style="text-align:center">'; echo $y->y_onay == 1 ? "<img src='".base_url()."/tema/resimler/tick-icon.png' width='26' alt='' />" : "<img src='".base_url()."/tema/resimler/delete-icon.png' width='26' alt='' />"; echo '</td>';
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
<td></td>
</tr>
</tfoot>
</table>
<div id="sayfalama">
<?php 
	$limit = 4;
	if ($ssayi > 0){
	if ($sayfa > 1){
	echo '<a href="'.site_url().'yonetim/yorumlar/index/1">İlk sayfa</a>';
	}
	for ($i=$sayfa-$limit; $i < $limit + $sayfa+1; $i++){
	if ($i > 0 and $i <= $ssayi){
	if ($i == $sayfa){
	echo '<a class="saktif" href="'.site_url().'yonetim/yorumlar/index/'.$i.'">'.$i.'</a>';
	}else {
	echo '<a href="'.site_url().'yonetim/yorumlar/index/'.$i.'">'.$i.'</a>';
	}
	}
	}
	if ($sayfa != $ssayi){
	echo '<a href="'.site_url().'yonetim/yorumlar/index/'.($sayfa+1).'">Sonraki</a>';
	}
	}
?>
</div>