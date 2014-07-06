<div id="etiketler">
	<?php
	foreach ($etiketler as $e){
		echo '<a title="'.$e->e_baslik.' ile ilgili filmler" href="'.site_url().'anasayfa/etiket/'.$e->e_sef.'">'.$e->e_baslik.'</a>';
	}
	?>
</div>