<form action="" method="post">
<div id="islemyap">
<ul>
<li><a href="<?php echo site_url(); ?>/yonetim/reklamlar/re" class="buton">Reklam ekle</a></li>
<li><button type="submit" class="buton" onclick="return confirm('Silmek istediğinizden eminmisiniz?')">Seçilenleri sil</button></li>
</ul>
</div>
<table cellspacing="0" border="none">
<thead>
<tr>
<td>#</td>
<td><input type="checkbox" class="tumunu-sec" title="Hepsini Seç"></td>
<td>Başlık</td>
<td>Gösterim sayısı</td>
<td>Süre</td>
<td>Konum</td>
<td>Eklenme tarihi</td>
<td>Film</td>
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
<?php 

	$i=1;
	foreach ($reklamlar as $s){
	echo '<tr class="tabloliste">';
	echo '<td>'.$i++.'</td>';
	echo '<td><input type="checkbox" name="rsil[]" value="'.$s->id.'" /></td>';
	echo '<td><a href="'.site_url().'yonetim/reklamlar/rd/'.$s->id.'">'.$s->r_baslik.'</a></td>';
	echo '<td>'.$s->r_gosterim.' / '.$s->r_sinir.'</td>';
	echo '<td>'.$s->r_sure.'</td>';
	echo '<td>'; 
	if ($s->r_konum == 1){
	echo 'Film öncesi';
	}elseif ($s->r_konum == 2){
	echo 'Üst';
	}elseif ($s->r_konum == 3){
	echo '(D3) Kategori altı';
	}elseif ($s->r_konum == 4){
	echo 'Sol';
	}elseif ($s->r_konum == 5){
	echo 'Sağ';
	}elseif ($s->r_konum == 6){
	echo 'Film izle orta';
	}elseif ($s->r_konum == 7){
	echo 'Arkaplan';
	}
	echo '</td>';
	echo '<td>'.$s->r_tarih.'</td>';
	echo '<td style="text-align:center">'; echo $s->r_durum == 1 ? "<img src='".base_url()."/tema/resimler/tick-icon.png' width='26' alt='' />" : "<img src='".base_url()."/tema/resimler/delete-icon.png' width='26' alt='' />"; echo '</td>';
	echo '<td>'.$s->id.'</td>';
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
<td></td>
</tr>
</tfoot>
</table>