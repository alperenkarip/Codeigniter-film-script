<div id="partlari">
<a href="#" onclick="return false;" id="f_part_ekle" class="buton">Part ekle</a>
	<ul>
	<?php 
		$i = 1;
		foreach ($partlar as $p){
		// echo $p->p_sira;
			echo '<li data="'.$p->id.'">';
			echo '<span class="psayisi">
			<a href="#" onclick="return false;" class="icon-trash" id="partsil"></a>
			<a href="#" onclick="return false;" class="icon-arrow-up" id="pyukari"></a>
			<a href="#" onclick="return false;" class="icon-arrow-down" id="pasagi"></a>
			</span>';
			echo '
			<input type="text"  name="p_baslik" class="pb" id="'.$p->p_sira.'" value="'.$p->p_baslik.'" />
			<input type="text"  name="p_kod" id="'.$p->p_sira.'" class="pk" value="'.htmlspecialchars($p->p_kod).'" />';
			echo '<div class="dpsonuc" ></div>';
			echo'</li>';
		}
	?>
	</ul>
</div>