<?php 
echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
echo '<rss version="2.0">';
echo '<channel>';
echo '<title>'.$sistem[0]->site_baslik.' - Rss</title>';
echo '<link>'.site_url().'</link>';
echo '<description>'.$sistem[0]->site_desc.'</description>';
    
	foreach ($rss as $r){
	echo '  <item>
            <title>'.$r->film_baslik.'</title>
            <description>'.$r->film_ozet.'</description>
            <link>'.site_url().'anasayfa/izle/'.$r->film_sef.'</link>
            <pubDate>'. date("D, d M Y H:i:s O", strtotime($r->film_zaman)).'</pubDate>
    </item>';
	}
	
		
echo '</channel>';
echo '</rss>';

?>