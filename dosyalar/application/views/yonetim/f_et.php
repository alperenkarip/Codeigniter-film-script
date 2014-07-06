<div class="fet">
<ul>
<?php 
	foreach ($etiketleri as $er){
		echo '<li>'; 
		echo '<a href="#" class="etiketsil" onclick="return false" id="'.$er->etiket_id.'">'.$er->e_baslik.'</a>';
		echo'</li>';
	}
?>
</ul>
</div>