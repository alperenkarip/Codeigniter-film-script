<div id="islemyap" style="float:right;">
<ul>
<li style="float:right;"><form action="<?php echo site_url(); ?>/yonetim/etiketler" method="GET"><input type="text" name="eara" placeholder="Aramak için birşeyler yaz.!"/><input type="submit" value="Ara" class="buton" /></form></li>
</ul>
</div>
<form action="" method="post">
<div id="islemyap">
<ul>
<li><a href="<?php echo site_url(); ?>/yonetim/etiketler/uee" class="buton">Üstün etiket ekle</a></li>
<li><button type="submit" class="buton" onclick="return confirm('Silmek istediğinizden eminmisiniz?')">Seçilenleri sil</button></li>
</ul>
</div>
<table cellspacing="0">
<thead>
<tr>
<td>#</td>
<td><input type="checkbox" class="tumunu-sec" title="Hepsini Seç"></td>
<td>Etiket</td>
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
	foreach ($etiketler as $e){
	echo '<tr>';
	echo '<td>'.$i++.'</td>';
	echo '<td><input type="checkbox" name="esil[]" value="'.$e->id.'" /></td>';
	echo '<td><a href="'.site_url().'yonetim/etiketler/ed/'.$e->id.'">'.$e->e_baslik.'</a></td>';
	echo '<td>'.$e->e_sef.'</td>';
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
	if (@$_GET["eara"]){
	$eara = "/?eara=".$_GET["eara"];
	}else {
	$eara = "";
	}
	if ($ssayi > 0){
	if ($sayfa > 1){
	echo '<a href="'.site_url().'yonetim/etiketler/index/1'.$eara.'">İlk sayfa</a>';
	}
	for ($i=$sayfa-$limit; $i < $limit + $sayfa+1; $i++){
	if ($i > 0 and $i <= $ssayi){
	if ($i == $sayfa){
	echo '<a class="saktif" href="'.site_url().'yonetim/etiketler/index/'.$i.$eara.'">'.$i.'</a>';
	}else {
	echo '<a href="'.site_url().'yonetim/etiketler/index/'.$i.$eara.'">'.$i.'</a>';
	}
	}
	}
	if ($sayfa != $ssayi){
	echo '<a href="'.site_url().'yonetim/etiketler/index/'.($sayfa+1).$eara.'">Sonraki</a>';
	}
	}
?>
</div>