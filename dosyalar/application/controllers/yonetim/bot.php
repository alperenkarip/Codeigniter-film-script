<?php 
	class bot extends CI_Controller{
	
		function bot(){
		parent::__construct();
		if ($this->session->userdata('oturum') < 1){ redirect('yp_giris'); }
		elseif ($this->session->userdata('rutbe') > 1){
		$this->session->set_flashdata('mesaj','Bot ayarlarına erişmek için yetkiniz yok.!');
		redirect(site_url().'yonetim/panel');
		}else {	
		$this->load->model('yonetim/y_yorumlar');
		$this->load->model('yonetim/y_mesajlar');
		$veri["onaysiz_yorumlar"] = $this->y_yorumlar->onaysizlar();
		$veri["okunmamis"] = $this->y_mesajlar->okunmamis();
		$this->load->view('yonetim/ust',$veri,true);
		$this->load->model('yonetim/y_filmler'); }
		}
		
		function index(){
		$veri["title"] = "Film botları";
		$veri["bot"] = FALSE;
		$veri["goster"] = "yonetim/bot";
		$this->load->view('yonetim/yonetim',$veri);
		}
		
		function site(){
		$site = $this->uri->segment(4);
		$veri["title"] = "Bot - ".$site;
		$sayfa = $this->uri->segment(5);
		if ($site == 'direkizle'){
		$veri["bot"] = TRUE;
		if ($this->input->post('eklenicek')){
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_REFERER,'http://www.direkizle.com/');  
	curl_setopt ($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 6.2) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.168 Safari/535.19");  
	curl_setopt($ch,CURLOPT_URL,''.$this->input->post('f_link').'');
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
	$ci = curl_exec($ch);
	curl_close($ch);
	$test = preg_match_all('#<div class="filmbaslik"><h2><a href="(.*?)" rel="bookmark" title="(.*?)">(.*?)</a></h2></div>#si',$ci,$baslik);
	$test = preg_match_all('#<p>(.*?)</p>#si',$ci,$sonuc);
	$test = preg_match_all('#id=\'(.*?)_(.*?)\' (.*?) href="(.*?)"#si',$ci,$sonuc2);
	$test = preg_match_all('#<span class=\'postTabs_titles\'><b>(.*?)</b></span>#si',$sonuc2[0][1],$sonuc3);
	$test = preg_match_all('#id=\'postTabs_ul_(.*)\'>(.*)#si',$ci,$sonuc4);
	// $test = preg_match_all('#<div class=\'postTabs_divs(.*?)\' id=\'postTabs_(.*?)_(.*?)\'>(.*?)</div>#si',$ci,$bak);
	$test = preg_match_all('#<div class=\'postTabs_divs(.*?)\' id=\'postTabs_(.*?)_(.*?)\'>(.*?)</div>(.*?)#si',$ci,$bak);
	// $test = preg_match_all('#<div class=\'postTabs_divs(.*?)\' id=\'postTabs_(.*?)_(.*?)\'>(.*)</div>(.*?)#si',$ci,$bak2);
	// preg_match_all('#<div id="mmru(.*?)"></div>(.*?)<script type="text/javascript">(.*?)</script>#si',$bak2[0][0],$bak);
	// print_r($bak);
	// $test = preg_match_all('#<div class=\'postTabs_divs(.*?)\' id=\'postTabs_(.*?)_(.*?)\'>(.*?)</div>(.*?)#si',$bak[0][0],$bak);
	// echo '<pre>';
	// print_r($bak);
	$test = preg_match('#<div class="KoD8 imdb">(.*?)</div>#si',$ci,$imdb);
	$test = preg_match_all('#<div id="mmru(.*?)"></div>(.*?)<script type="text/javascript">(.*?)</script>#si' , $sonuc4[0][0], $script);
		// echo '<pre>';
	// print_r($script);
	$test = preg_match_all('#<div class="KoD8 flg"><img src="(.*?)" alt="(.*?)" />#si',$ci,$filmtip);
	$filmtip = trim(strip_tags($filmtip[2][0]));
	if ($filmtip == 'turkce-dublaj'){
	$filmtip = 2;
	}elseif ($filmtip == "altyazili"){
	$filmtip = 1;
	}elseif ($filmtip == "yerli-film"){
	$filmtip = 3;
	}
	$d = array('&#8211;','&#8217;','&#8216;');
	$dd = array('-','\'','"');
	$baslik = trim(strip_tags($baslik[3][0]));
	$baslik = str_replace($d,$dd,$baslik);
	$bilgi = $sonuc[0][1];
	preg_match_all('#<br />(.*?)#si',$ci,$yapim);
	if (strstr($sonuc[0][1],'Tür') || strstr($sonuc[0][1],'Yapım') ||strstr($sonuc[0][1],'Yönetmen') || strstr($sonuc[0][1],'Süre')){
	preg_match_all('#Tür(.*?)<br />#si',$sonuc[0][1],$turler);
	$turler = @$turler[1][0];
	preg_match_all('#Yönetmen(.*?)<br />#si',$sonuc[0][1],$yonetmen);
	$yonetmen = @$yonetmen[1][0];
	if (empty($yonetmen)){ $yonetmen = "Yönetmen"; }
	preg_match_all('#Yapım(.*?)<br />#si',$sonuc[0][1],$yapim);
	$yapim = @$yapim[1][0];
	if (empty($yapim)){ $yapim = "yapim"; }
	preg_match_all('#Oyuncular(.*?)<br />#si',$sonuc[0][1],$oyuncular);
	$oyuncular = @$oyuncular[1][0];
	if (empty($oyuncular)){ $oyuncular = "oyuncular"; }
	}else {
	preg_match_all('#Tür(.*?)<br />#si',$sonuc[0][2],$turler);
	$turler = $turler[1][0];
	preg_match_all('#Yönetmen(.*?)<br />#si',$sonuc[0][2],$yonetmen);
	$yonetmen = $yonetmen[1][0];
	if (empty($yonetmen)){ $yonetmen = "Yönetmen"; }
	preg_match_all('#Yapım(.*?)<br />#si',$sonuc[0][2],$yapim);	
	$yapim = $yapim[1][0];
	if (empty($yapim)){ $yapim = "yapim"; }
	preg_match_all('#Oyuncular(.*?)<br />#si',$sonuc[0][2],$oyuncular);	
	$oyuncular = $oyuncular[1][0];
	if (empty($oyuncular)){ $oyuncular = "oyuncular"; }
	}
	if (strstr(strtolower($sonuc[0][2]),'konu')){
	$ozet = trim(strip_tags($sonuc[0][2]));
	$ozet = str_replace($d,$dd,$ozet);
	}else {
	$ozet = trim(strip_tags($sonuc[0][3]));
	$ozet = str_replace($d,$dd,$ozet);
	}
	$imdb = substr(str_replace('&nbsp;','',trim(strip_tags($imdb[0]))),-6,90);
	$this->load->helper('sef');
	$fzaman = $this->input->post('film_zaman');
	if (!$fzaman){
	$fzaman = date('Y-m-d').' '.date('H').':'.(date('i')-5);
	}
	$turler = str_replace(':','',$turler);
	$yapim = str_replace(':','',$yapim);
	$oyuncular = str_replace(':','',$oyuncular);
	$yonetmen = str_replace(':','',$yonetmen);
	$oyuncular = str_replace(':','',$oyuncular);
	$ekle = $this->y_filmler->bot_fekle(array('film_baslik' => $baslik,'film_sef' => sef_link($baslik),'film_tip' => $filmtip,'film_imdb' => $imdb,'film_gosterim_tarihi' => 'bulunamadı','film_eklenme_tarihi' => date('y-m-d h:i:s'),'film_yonetmen' => $yonetmen,'film_yapim' => $yapim,'film_oyuncular' => $oyuncular,'film_ozet' => $ozet,'film_zaman' => $fzaman,'film_ekleyen' => $this->session->userdata('kadi')));
	if ($ekle){
	$partbaslik = $sonuc3[0];
	$psayi = count($partbaslik);
	$degiscek = array('<p>','</p>');
	$degistir = array('','');
	$partlar = $bak[0];
	// echo '<pre>';
	// print_r($partlar);
	$mailru = $script[3];
	$partlar = array(array($partbaslik,$partlar,$mailru));
	function grab_image($url,$saveto){
    $ch = curl_init ($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
    $raw=curl_exec($ch);
    curl_close ($ch);
    if(file_exists($saveto)){ unlink($saveto); }
    $fp = fopen($saveto,'x');
    fwrite($fp, $raw);
    fclose($fp);
	}
	$ilkb = strip_tags($partlar[0][0][0]);
	$iki = strip_tags($partlar[0][0][1]);
	$d = array('<span class=\'postTabs_titles\'>','</span>','<b>','</b>',$ilkb,$iki,);
	$dd = array('','','','','','');
	$mr = 0;$mu=0;
	$etayir = explode(' ',$baslik);
	foreach ($etayir as $e){
	$et1 = $this->y_filmler->f_et_ekle(array('e_baslik' => $e,'fid' => $ekle),sef_link($e));
	if ($et1[0] == FALSE){
	$this->y_filmler->f_et_eklee($et1[1],$et1[2]);
	}
	}
	foreach ($partlar as $p){
	$fx=1;
	for ($i=0; $i < $psayi; $i++){
	$pb = trim(strip_tags($p[0][$i]));
	$pk = $p[1][$i];
	if (strstr($pk,'src="http://cdnjs.cloudflare.com/ajax/libs/swfobject/2.2/swfobject.js "')){
	$msay = count($p[2]);
	if ($i > $msay){
	$mailruv = $pk.'<script type="text/javascript">'.$p[2][$mr++].'</script>';
	$this->y_filmler->fp_ekle(array('p_baslik' => $pb,'p_sira' => $fx++,'p_kod' => $mailruv."</div>",'film_id' => $ekle));
	}else {
	$vk = $pk.'<script type="text/javascript">'.$p[2][$mu++].'</script>';
	$this->y_filmler->fp_ekle(array('p_baslik' => $pb,'p_sira' => $fx++,'p_kod' => $vk."</div>",'film_id' => $ekle));
	}
	}else {
	$this->y_filmler->fp_ekle(array('p_baslik' => $pb,'p_sira' => $fx++,'p_kod' => $pk,'film_id' => $ekle));
	}
	}
	}
	$resim = $sonuc[0][0];
	preg_match_all('#(.*?)<img(.*?)src="(.*?)"(.*?)/>(.*?)#',$resim,$rresim);
	$resim = trim($rresim[3][0]);
	$ruzanti = substr($resim,-4,4);
	$tarih = date('d_m_y');
	$buyuk = 'resimler/buyuk/'.$ekle."-".$tarih."-buyuk".$ruzanti;
	$kucuk = 'resimler/kucuk/'.$ekle."-".$tarih."-kucuk".$ruzanti;
	grab_image(''.$resim.'','./'.$kucuk);
	grab_image(''.$resim.'','./'.$buyuk);
	$this->y_filmler->frekle($ekle,base_url().$kucuk.'|'.base_url().$buyuk);
	$turler = explode(',',$turler);
	$i=0;
	foreach ($turler as $tr){
	$tur = trim($tr);
	$tid = $this->y_filmler->bot_tkontrol(sef_link($tur));
	if ($tid){
	$i++;
	$this->y_filmler->bot_turekle($tid[0]->id,$ekle);
	}else {
	if ($i < 1){
	$this->y_filmler->bot_turekle(0,$ekle,$ekle);
	}}
	}
	$this->load->library('SimpleImage');
	$image = new SimpleImage();
	$image->load(''.$buyuk.'');
	$image->resize(300,450);
	$image->save($kucuk);
	$image->load(''.$kucuk.'');
	$image->resize(162,242);
	$image->save($kucuk);	
	$this->session->set_flashdata('mesaj','Film başarıyla eklendi.');
	redirect(site_url().'yonetim/bot/site/direkizle');
	}else {
	$this->session->set_flashdata('mesaj','Bir sorun oluştu filmin varlığından ya da diğer sebeplerden dolayı film eklenemedi..');
	redirect(site_url().'yonetim/bot/site/direkizle');
	}
	}else {
	$ch = curl_init();
	if ($sayfa){
	curl_setopt($ch,CURLOPT_URL,'http://www.direkizle.com/page/'.$sayfa.'');
	}else {
	curl_setopt($ch,CURLOPT_URL,'http://www.direkizle.com');
	}
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
	$ci = curl_exec($ch);
	curl_close($ch);
	$test = preg_match_all('#<div class="filmbaslik"><h2><a href="(.*?)" rel="bookmark" title="(.*?)">(.*?)</a></h2></div>#si',$ci,$filmler);
	$veri["filmler"] = $filmler;
		}
		}elseif ($site == 'filmizle'){
		$veri["bot"] = TRUE;
		}else {
		$veri["bot"] = FALSE;
		}
// if (!$this->input->post('eklenicek')){
		$veri["goster"] = "yonetim/bot";
		$this->load->view('yonetim/yonetim',$veri);
// }
		}
	
	}
?>