<form action="" method="post">
<div id="islemyap">
<ul>
<li><a class="buton" href="<?php echo site_url(); ?>/yonetim/turler/te">Tür ekle</a></li>
<li><button type="submit" class="buton" onclick="return confirm('Silmek istediğinizden eminmisiniz?')">Seçilenleri sil</button></li>
</ul>
</div>
<table>
<thead>
<tr>
<td>#</td>
<td><input type="checkbox" class="tumunu-sec" title="Hepsini Seç"></td>
<td>Başlık</td>
<td>Sef</td>
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
	foreach ($turler as $t){
	echo '<tr>';
	echo '<td>'.$i++.'</td>';
	echo '<td><input type="checkbox" name="tsil[]" value="'.$t->id.'" /></td>';
	echo '<td><a href="'.site_url().'yonetim/turler/td/'.$t->id.'">'.$t->tur_baslik.'</a></td>';
	echo '<td>'.$t->tur_sef.'</td>';
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