<form action="" method="post">
<div id="islemyap">
<ul>
<li><a href="<?php echo site_url(); ?>/yonetim/takim/ye" class="buton">Yardımcı ekle</a></li>
<li><button type="submit" class="buton" onclick="return confirm('Silmek istediğinizden eminmisiniz?')">Seçilenleri sil</button></li>
</ul>
</div>
<table cellspacing="0" border="none">
<thead>
<tr>
<td>#</td>
<td><input type="checkbox" class="tumunu-sec" title="Hepsini Seç"></td>
<td>Kullanıcı adı</td>
<td>E-Posta</td>
<td>Rütbe</td>
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
	foreach ($takim as $t){
	echo '<tr class="tabloliste">';
	echo '<td>'.$i++.'</td>';
	echo '<td><input type="checkbox" name="ksil[]" value="'.$t->id.'" /></td>';
	echo '<td><a href="'.site_url().'yonetim/takim/kd/'.$t->id.'">'.$t->t_isim.'</a></td>';
	echo '<td>'.$t->t_mail.'</td>';
	echo '<td>'.$t->t_rutbe.'</td>';
	echo '<td>'.$t->id.'</td>';
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
</tr>
</tfoot>
</table>