<?php
header('Content-type: text/xml');
echo "<?xml version=\"1.0\" encoding=\"ISO-8859-9\" ?>\n";
echo "<urlset xmlns=\"http://www.google.com/schemas/sitemap/0.84\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:schemaLocation=\"http://www.google.com/schemas/sitemap/0.84 http://www.google.com/schemas/sitemap/0.84/sitemap.xsd\">";
$xml_ciktisi = "\n<url>\n<loc>".site_url()."</loc>\n<changefreq>daily</changefreq>\n<priority>1.00</priority>\n</url>";
foreach ($sitemap as $s)
{
$xml_ciktisi .= "\n<url>\n<loc>".site_url()."izle/".$s->film_sef."</loc>\n<changefreq>daily</changefreq>\n<priority>0.80</priority>\n</url>";
};
echo $xml_ciktisi ."\n</urlset>";
?>