<form action="" method="post">
<div id="islemyap">
<ul>
<li><a href="<?php echo site_url(); ?>/yonetim/sayfalar/se" class="buton">Sayfa ekle</a></li>
<li><button type="submit" class="buton" onclick="return confirm('Silmek istediğinizden eminmisiniz?')">Seçilenleri sil</button></li>
</ul>
</div>
<table cellspacing="0" border="none">
<thead>
<tr>
<td>#</td>
<td><input type="checkbox" class="tumunu-sec" title="Hepsini Seç"></td>
<td>Başlık</td>
<td>Sef</td>
<td>Anahtar kelimeler</td>
<td>Açıklama</td>
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
	foreach ($sayfalar as $s){
	echo '<tr class="tabloliste">';
	echo '<td>'.$i++.'</td>';
	echo '<td><input type="checkbox" name="ssil[]" value="'.$s->id.'" /></td>';
	echo '<td><a href="'.site_url().'yonetim/sayfalar/sd/'.$s->id.'">'.$s->s_baslik.'</a></td>';
	echo '<td>'.$s->s_sef.'</td>';
	echo '<td>'.substr($s->s_keyw,0,25).'...</td>';
	echo '<td>'.substr($s->s_desc,0,25).'...</td>';
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
</tr>
</tfoot>
</table>