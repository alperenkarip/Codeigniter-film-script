<form action="" method="post">
<div id="islemyap">
<ul>
<li><button type="submit" class="buton" onclick="return confirm('Silmek istediğinizden eminmisiniz?')">Seçilenleri sil</button></li>
</ul>
</div>
<table cellspacing="0" border="none">
<thead>
<tr>
<td>#</td>
<td><input type="checkbox" class="tumunu-sec" title="Hepsini Seç"></td>
<td>Gönderen</td>
<td>Mail</td>
<td>Mesaj</td>
<td>Durum</td>
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
.okunmamis td{background:#f9f9cd!important;}
</style>
<?php 
	$i=1;
	foreach ($mesajlar as $m){	
	echo '<tr class="tabloliste';
	echo $m->m_durum == 0 ? ' okunmamis' : '"';
	echo '">';
	echo '<td>'.$i++.'</td>';
	echo '<td><input type="checkbox" name="msil[]" value="'.$m->id.'" /></td>';
	echo '<td><a href="'.site_url().'yonetim/mesajlar/mo/'.$m->id.'">'.$m->m_gonderen.'</a></td>';
	echo '<td>'.$m->m_mail.'</td>';
	echo '<td>'.substr($m->m_mesaj,0,25).'...</td>';
	echo '<td style="text-align:center;"';
	echo'>'; echo $m->m_durum == 0 ? "<img src='".base_url()."tema/resimler/new-message-icon.png' />" : "<img src='".base_url()."tema/resimler/message-already-read-icon.png' />"; echo'</td>';
	echo '<td>'.$m->id.'</td>';
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
	if ($ssayi > 0){
	if ($sayfa > 1){
	echo '<a href="'.site_url().'yonetim/mesajlar/index/1">İlk sayfa</a>';
	}
	for ($i=$sayfa-$limit; $i < $limit + $sayfa+1; $i++){
	if ($i > 0 and $i <= $ssayi){
	if ($i == $sayfa){
	echo '<a class="saktif" href="'.site_url().'yonetim/mesajlar/index/'.$i.'">'.$i.'</a>';
	}else {
	echo '<a href="'.site_url().'yonetim/mesajlar/index/'.$i.'">'.$i.'</a>';
	}
	}
	}
	if ($sayfa != $ssayi){
	echo '<a href="'.site_url().'yonetim/mesajlar/index/'.($sayfa+1).'">Sonraki</a>';
	}
	}
?>
</div>