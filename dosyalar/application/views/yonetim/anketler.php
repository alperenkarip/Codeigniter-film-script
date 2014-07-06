<div id="islemyap" style="float:right;">
<ul>

</ul>
</div>
<form action="" method="post">
<div id="islemyap">
<ul>
<li><a href="<?php echo site_url(); ?>/yonetim/anketler/ae" class="buton">Anket ekle</a></li>
<li><button type="submit" class="buton" onclick="return confirm('Silmek istediğinizden eminmisiniz?')">Seçilenleri sil</button></li>
</ul>
</div>
<table cellspacing="0">
<thead>
<tr>
<td>#</td>
<td><input type="checkbox" class="tumunu-sec" title="Hepsini Seç"></td>
<td>Başlık</td>
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
	foreach ($anketler as $a){
	echo '<tr>';
	echo '<td>'.$i++.'</td>';
	echo '<td><input type="checkbox" name="asil[]" value="'.$a->id.'" /></td>';
	echo '<td><a href="'.site_url().'yonetim/anketler/ad/'.$a->id.'">'.$a->anket_baslik.'</a></td>';
	echo '<td>';
	echo $a->anket_durum == 1 ? 'Aktif' : 'Pasif';
	echo '</td>';
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
</tr>
</tfoot>
</table>
<div id="sayfalama">
<?php 
	$limit = 4;
	if ($ssayi > 0){
	if ($sayfa > 1){
	echo '<a href="'.site_url().'yonetim/anketler/index/1'.'">İlk sayfa</a>';
	}
	for ($i=$sayfa-$limit; $i < $limit + $sayfa+1; $i++){
	if ($i > 0 and $i <= $ssayi){
	if ($i == $sayfa){
	echo '<a class="saktif" href="'.site_url().'yonetim/anketler/index/'.$i.'">'.$i.'</a>';
	}else {
	echo '<a href="'.site_url().'yonetim/anketler/index/'.$i.'">'.$i.'</a>';
	}
	}
	}
	if ($sayfa != $ssayi){
	echo '<a href="'.site_url().'yonetim/anketler/index/'.($sayfa+1).'">Sonraki</a>';
	}
	}
?>
</div>