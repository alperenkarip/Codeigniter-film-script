<style type="text/css">
#partlari ul li:first-child .psayisi {width:45px!important;margin-left:13px;}
#partlari ul li:last-child .psayisi {width:45px!important;margin-left:13px;}
</style>
<div id="partlari">
<a href="#" onclick="return false;" id="f_part_ekle" class="buton">Soru ekle</a>
	<ul>
	<?php 
	foreach ($siklar as $s){
	echo '
			<li class="z" data="'.$s->id.'">
			<span class="psayisi" style="width: 45px!important; margin-left: 13px;">
			<font style="float:left;width:24px;font-size:11px;margin-top:7px;">'.$s->anket_oy.'</font>
			<a href="#" class="icon-trash" onclick="return false;" id="partsil"></a>
			</span>
	';
	echo '<input type="text"  name="p_baslik[]" id="'.$s->id.'" class="pb" value="'.$s->anket_soru.'" style="width:80%"/>';
	echo '<div class="dpsonuc" ></div></li>	';
	}
	?>
	</ul>
</div>