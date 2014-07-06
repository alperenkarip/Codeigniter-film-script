<?php 
	class filmler extends CI_Controller {
		
		function filmler(){
		parent::__construct();
		if ($this->session->userdata('oturum') < 1){ redirect('yp_giris'); }
		elseif ($this->session->userdata('rutbe') > 2){
		$msj["msj"] = "Bu verilere erişmek için yetkiniz yok.!";
		$this->load->view('msj',$msj,true);
		$veri["goster"] = "msj";
		$this->load->view('yonetim/yonetim',$veri);
		}else {	
		$this->load->model('yonetim/y_yorumlar');
		$this->load->model('yonetim/y_mesajlar');
		$veri["onaysiz_yorumlar"] = $this->y_yorumlar->onaysizlar();
		$veri["okunmamis"] = $this->y_mesajlar->okunmamis();
		$this->load->view('yonetim/ust',$veri,true);
		$this->load->model('yonetim/y_filmler'); }
		error_reporting(0);
		}
		
		function index($sayfa=""){
		if ($this->input->post('fsil')){
		$sil = $this->input->post('fsil');
		$say = count($sil);
		for ($i=0; $i < $say; $i++){
		$resim = $this->y_filmler->fr_al($sil[$i]);
		if (isset($resim)){
		$bol = explode('|',$resim[0]->film_resim);
		for ($z=0; $z < count($bol); $z++){
		$rsil = $bol[$z];
		$base = strlen(base_url());
		$rurl = substr($rsil,$base,strlen($rsil));
		@unlink('tema/arkaplanlar/'.$sil[$i].'.png');
		@unlink('tema/arkaplanlar/'.$sil[$i].'.jpg');
		@unlink($rurl);
		}
		}
		$this->y_filmler->film_sil($sil[$i]);
		}
		}
		if ($kelime = $this->input->get('fara')){
		$veri["title"] = "\"".$this->input->get('fara')."\" arama sonuçları";
		$limit = 15;
		$veri["fsayi"] = count($this->y_filmler->fara($kelime));
		$veri["ssayi"] = ceil($veri["fsayi"]/$limit);
		if (!is_numeric($sayfa) || $sayfa == 0 || $sayfa == "" || $sayfa > $veri["ssayi"]){ $sayfa = 1; }
		$veri["sayfa"] = $sayfa;
		$baslangic = ($sayfa*$limit)-$limit;
		$veri["filmler"] = $this->y_filmler->fara($kelime,$limit,$baslangic);
		if (count($veri["filmler"]) < 1){
		$this->session->set_flashdata('mesaj',$kelime.' ile ilgili hiç bir sonuç bulunamadı.');
		redirect(site_url().'yonetim/filmler');
		}
		$veri["goster"] = "yonetim/filmler";
		}else {
		$veri["title"] = "Filmler";
		$limit = 15;
		$veri["fsayi"] = $this->y_filmler->fsayi();
		$veri["ssayi"] = ceil($veri["fsayi"]/$limit);
		if (!is_numeric($sayfa) || $sayfa == 0 || $sayfa == "" || $sayfa > $veri["ssayi"]){ $sayfa = 1; }
		$veri["sayfa"] = $sayfa;
		$baslangic = ($sayfa*$limit)-$limit;
		$veri["filmler"] = $this->y_filmler->filmleri_al($limit,$baslangic);
		$veri["goster"] = "yonetim/filmler";
		}
		$this->load->view('yonetim/yonetim',$veri);
		}
		
	function fe(){
	$veri["title"] = "Film ekle";
	$this->load->helper('sef');
	$this->load->model('etiketler');
	$veri["ustune"] = $this->etiketler->ustun_etiketler();
	if ($this->input->post('sid')){
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,''.$this->input->post('s_id').'');
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
	$ci = curl_exec($ch);
	curl_close($ch);
	preg_match_all('#<td bgcolor="white" colspan="2">(.*?)</td>#si',$ci,$baslik);
	preg_match_all('#<h1>(.*?)</h1>#si',$baslik[0][0],$baslik);
	$baslik_ing = mysql_real_escape_string(iconv('ISO-8859-9','UTF-8',strip_tags(trim($baslik[1][0])))); 
	preg_match_all('#<td width="40%">(.*?)<br>(.*?)<b>(.*?)</b><br>(.*?)#si',$ci,$baslik_tr);
	@$baslik_tr = mysql_real_escape_string(iconv('ISO-8859-9','UTF-8',strip_tags(trim($baslik_tr[2][0]))));
	preg_match_all('#<td valign="top" width="1000">(.*?)<table width="100%" cellpadding="0" cellspacing="0">(.*?)</table>().*?</td>#si',$ci,$gerekliler);
	preg_match_all('#<b>Y(.*?)netmen(.*?)</b><br>(.*?)<br>#si',$gerekliler[1][0],$yonetmen);
	$yonetmen = iconv('ISO-8859-9','UTF-8',strip_tags(trim($yonetmen[3][0])));
	$yonetmen = mysql_real_escape_string($yonetmen);
	preg_match_all('#<tr><td><a(.*?)>(.*?)</a>(.*?)</td></tr>#si',$gerekliler[1][0],$oyuncular);
	$oyuncular = mysql_real_escape_string(iconv('ISO-8859-9','UTF-8',implode(',',$oyuncular[2])));
	preg_match_all('#<b>G(.*?)sterim tarihi</b><br>(.*?)<br>#si',$gerekliler[2][0],$gosterim_tarihi);
	@$gosterim_tarihi = mysql_real_escape_string(iconv('ISO-8859-9','UTF-8',strip_tags(trim($gosterim_tarihi[2][0]))));
	preg_match_all('#<b>Yap(.*?)m :</b>(.*?)<br>#si',$gerekliler[2][0],$yapim);
	$yapim = mysql_real_escape_string(iconv('ISO-8859-9','UTF-8',strip_tags($yapim[2][0])));
	preg_match_all('#<br><br><b>(.*?)lke :</b>(.*?)<a(.*?)>(.*?)</a><br>#si',$gerekliler[2][0],$ulke);
	$ulke = mysql_real_escape_string(iconv('ISO-8859-9','UTF-8',strip_tags($ulke[4][0])));
	preg_match_all('#<b>IMDB Puan :</b>(.*?)<br>#si',$gerekliler[2][0],$imdb);
	@$imdb = mysql_real_escape_string(iconv('ISO-8859-9','UTF-8',strip_tags($imdb[1][0])));
	preg_match_all('#<div class="plot" style="margin-top:20px">(.*?)</div>#si',$ci,$ozet);
	$ozet = mysql_real_escape_string(iconv('ISO-8859-9','UTF-8',strip_tags($ozet[1][0])));
	preg_match_all('#<td width="20%">(.*?)<img(.*?)src="(.*?)"(.*?)>(.*?)</td>#si',$ci,$resim);
	$resim = "http://divxplanet.com".strip_tags($resim[3][0]);
	$this->session->set_flashdata('divxresim',$resim);
	preg_match_all('#<b>T(.*?)r :</b>(.*?)<br>#si',$ci,$turler);
	$turler = mysql_real_escape_string(iconv('ISO-8859-9','UTF-8',strip_tags($turler[2][0])));
	preg_match_all('#<tr id=(.*?)>(.*?)<td>(.*?)</td></tr>#si',$ci,$part);
	preg_match_all('#<textarea  id="vidText-(.*?)"(.*?)>(.*?)</textarea>#si',$part[0][0],$partk);
	$pkdegis = array('width="640"','height="385"');
	$pkdegisc = array('','');
	$partk = mysql_real_escape_string(str_replace($pkdegis,$pkdegisc,$partk[3][0]));
	preg_match_all('#<tr id=spec_item_2_(.*?)><td width=5><img src=/_img/arrows1.gif></td><td >(.*?)</td>#si',$part[0][0],$part);
	$part = mysql_real_escape_string(iconv('ISO-8859-9','UTF-8',strip_tags($part[2][0])));
if (!$part){ $part = "part";}
if (!$baslik_tr){ $veri["baslik"] = $baslik_ing;}else {
	$veri["baslik"] = $baslik_tr." - ".$baslik_ing;
}
if (!$baslik_ing){ $baslik_ing = "baslik_ing";}
if (!$gosterim_tarihi){ $gosterim_tarihi = "";}
if (!$yonetmen){ $yonetmen = "";}
if (!$yapim){ $yapim = "";}
if (!$ulke){ $ulke = "";}
if (!$oyuncular){ $oyuncular = "";}
if (!$ozet){ $ozet = "";}
if (!$imdb){ $imdb = "";}
if (!$resim){ $resim = "";}
if (!$turler){ $turler = "";}
	$veri["gosterimt"] = $gosterim_tarihi;
	$veri["yonetmen"] = $yonetmen;
	$veri["yapim"] = $yapim." - ".$ulke;
	$veri["oyuncular"] = $oyuncular;
	$veri["ozet"] = $ozet;
	$veri["imdb"] = $imdb;
	$veri["resim"] = $resim;
	$veri["sturler"] = $turler;
	$veri["partb"] = $part;
	$veri["partk"] = $partk;
 	$this->load->view('yonetim/film_ekle',$veri,true);
	// echo '<pre>';
	// print_r($veri);
	}
		if ($this->input->post("fekle")){
$this->form_validation->set_rules("film_baslik","Başlık","required|trim|xss_clean");
		// $this->form_validation->set_rules("film_tip",'Tip',"required|trim");
		// $this->form_validation->set_rules("film_imdb",'İMDB',"required|trim");
		// $this->form_validation->set_rules("film_gosterim_tarihi",'Gösterim tarihi',"required|trim");
		// $this->form_validation->set_rules("film_yonetmen",'Yönetmen',"required|trim");
		// $this->form_validation->set_rules("film_yapim",'Yapım tarihi',"required|trim");
		// $this->form_validation->set_rules("film_ozet",'Konu,özet',"required|trim|min_length[20]");
		$this->form_validation->set_rules("p_baslik",'Part başlık',"required");
		$this->form_validation->set_rules("p_kod",'Part kod',"required");
		$this->form_validation->set_rules("ftur",'Tür',"required");
		
		if ($this->form_validation->run() == FALSE){
		$this->session->set_flashdata('mesaj',validation_errors());
		redirect(site_url()."/yonetim/filmler/fe");
		}else {
			$tip = $_FILES["film_resim"]["type"];
			$resim = $this->session->flashdata('divxresim');
			if (!$tip AND !$resim){
			$this->session->set_flashdata('mesaj','Film için resim belirlemediniz lütfen geri dönüp film için resim belirleyin..');
			redirect(site_url().'yonetim/filmler');
			$islem = false;
			}elseif ($this->input->post('film_arka_pos')){
			if (!$_FILES["film_arka"]["name"]){
			$this->session->set_flashdata('mesaj','Film arkaplanına pozisyon belirlemek için ilk önce bir arkaplan belirmelelisiniz.');
			redirect(site_url().'yonetim/filmler');
			}else {	$islem = true; }
			}elseif ($_FILES["film_arka"]['tmp_name']){
			if (!$this->input->post('film_arka_pos')){ $poz = '0px'; }
			$tip = $_FILES["film_arka"]["type"];
			if ($tip != 'image/jpeg' AND $tip != 'image/png'){
			$this->session->set_flashdata('mesaj','Sadece PNG ve JPG uzantılı dosyalar geçerlidir.'); 
			redirect(site_url().'yonetim/filmler');
			}else { $islem = true; }
			}elseif ($_FILES["film_resim"]['tmp_name']){
			if ($_FILES["film_resim"]['size'] > (1024*1024*3)){
			$this->session->set_flashdata('mesaj','Dosya boyutu 3MB\' geçmemelidir.');
			redirect(site_url().'yonetim/filmler');
			}elseif ($tip != 'image/jpeg' AND $tip != 'image/png'){
			$this->session->set_flashdata('mesaj','Sadece PNG ve JPG uzantılı dosyalar geçerlidir.'); 
			redirect(site_url().'yonetim/filmler');
			}else { $islem = true; }
			}else {
			$islem = true;
			}

		if (@$islem){
		$sef = sef_link($this->input->post('film_baslik'));
		$fzaman = $this->input->post('film_zaman');
		if ($fzaman < 10){
		$fzaman = date('Y-m-d').' '.date('H').':'.(date('i')-3);
		}
		$fekle = $this->y_filmler->film_ekle(array(array('film_baslik' => $this->input->post('film_baslik'),'film_sef' => $sef,'film_tip' => $this->input->post('film_tip'),'film_imdb' => $this->input->post('film_imdb'),'film_gosterim_tarihi' => $this->input->post('film_gosterim_tarihi'),'film_eklenme_tarihi' => date('y-m-d h:i:s'),'film_yonetmen' => $this->input->post('film_yonetmen'),'film_yapim' => $this->input->post('film_yapim'),'film_oyuncular' => $this->input->post('film_oyuncular'),'film_ozet' => $this->input->post('film_ozet'),'film_ekleyen' => $this->session->userdata('kadi'),'film_zaman' => $fzaman),$this->input->post('ftur')));
		}
		
	if ($fekle){
			ob_start();
			
			
			if ($this->input->post('film_arka_pos')){
			$poz = $this->input->post('film_arka_pos');
			}
			
			if ($_FILES["film_arka"]['tmp_name']){
			$isim = $_FILES["film_arka"]["name"];
			$uzanti = explode('.',$isim);
			$uzanti = $uzanti[1];
			copy($_FILES["film_arka"]['tmp_name'],'tema/arkaplanlar/'.$fekle.'.'.$uzanti);
			$arkar = base_url().'tema/arkaplanlar/'.$fekle.'.'.$uzanti;
			}
			
			if (@$poz && @$arkar){
			@$farka = $poz.'||'.$arkar;
			@$post = array('film_arka' => @$farka);
			$guncelle = $this->y_filmler->filmi_duzenle($fekle,$post);
			}
			
			if ($_FILES["film_resim"]['tmp_name']){
			$tarih = date('d_m_y');
			$tip = $_FILES["film_resim"]["type"];
			$isim = $_FILES["film_resim"]["name"];
			$uzanti = explode('.',$isim);
			$uzanti = $uzanti[1];
			copy($_FILES["film_resim"]['tmp_name'],'resimler/kucuk/'.$fekle."-".$tarih."-kucuk".".".$uzanti);
			copy($_FILES["film_resim"]['tmp_name'],'resimler/buyuk/'.$fekle."-".$tarih."-buyuk".".".$uzanti);
			$urlsi = base_url().'resimler/kucuk/'.$fekle."-".$tarih."-kucuk".".".$uzanti."|".base_url().'resimler/buyuk/'.$fekle."-".$tarih."-buyuk".".".$uzanti;
			$this->y_filmler->frekle($fekle,$urlsi);
			$boyut = explode('|',$urlsi);
			$kucuk = './'.substr($boyut[0],strlen(base_url()),500);
			$buyuk = './'.substr($boyut[1],strlen(base_url()),500);
			$this->load->library('SimpleImage');
			$image = new SimpleImage();
			$image->load(''.$buyuk.'');
			$image->resize(300,450);
			$image->save('resimler/buyuk/'.$fekle."-".$tarih."-buyuk".".".$uzanti);
			$image->load(''.$kucuk.'');
			$image->resize(162,242);
			$image->save('resimler/kucuk/'.$fekle."-".$tarih."-kucuk".".".$uzanti);
			}elseif ($resim){
			$uzanti = substr($resim,-3,3);
			$tarih = date('d_m_y');
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
	grab_image(''.$resim.'','resimler/buyuk/'.$fekle."-".$tarih."-buyuk".".".$uzanti);
	grab_image(''.$resim.'','resimler/kucuk/'.$fekle."-".$tarih."-kucuk".".".$uzanti);
			$urlsi = base_url().'resimler/kucuk/'.$fekle."-".$tarih."-kucuk".".".$uzanti."|".base_url().'resimler/buyuk/'.$fekle."-".$tarih."-buyuk".".".$uzanti;
			$this->y_filmler->frekle($fekle,$urlsi);
			}
		
		if ($this->input->post('etiketler')){
		$etktlr = $this->input->post('etiketler');
		}else {
		$fbasl = $this->input->post('film_baslik');
		$etiket_baslik = explode(' ',$fbasl);
		$etktlr = $etiket_baslik;
		}
	
		if (isset($etktlr)){
		if (isset($etktlr[0])){
		$esay = count($etktlr);
		for ($i=0; $i < $esay; $i++){
		$etekle = $this->y_filmler->f_et_ekle(array('e_baslik' => trim($etktlr[$i]),'fid' => $fekle),sef_link($etktlr[$i]));
		
			if ($etekle[0] == FALSE){
			$this->y_filmler->f_et_eklee($etekle[1],$etekle[2]);
			}
		}
		}
		}
		// if (isset($prtlar)){
		$prtlr = $this->input->post('p_baslik');
		$prtlr2 = $_POST["p_kod"];
		$psy = count($prtlr);
		
			for ($i=0; $i < $psy; $i++){
			$baslik = $prtlr[$i];
			if (strlen($baslik) < 1){ $baslik = 'Part '.($i+1); }
			$kod = $prtlr2[$i];
			$sira = $i+1;
			$this->y_filmler->fp_ekle(array('p_baslik' => $baslik,'p_sira' => $sira,'p_kod' => $kod,'film_id' => $fekle));
			}
			// }
			
		$this->session->set_flashdata('mesaj','Film başarıyla eklendi.');
		redirect(site_url().'yonetim/filmler');
		}else {
		$this->session->set_flashdata('mesaj','Bir sorun oluştu film eklenemedi.');
		redirect(site_url().'yonetim/filmler');
		}
		
		}
		}
		
		$veri["turler"] = $this->y_filmler->turler();
		$veri["goster"] = "yonetim/film_ekle";
		$this->load->view('yonetim/yonetim',$veri);

		}
		
		function fd($id){
			$this->load->model('etiketler');
			$veri["ustune"] = $this->etiketler->ustun_etiketler();
			if ($this->input->post('tur_id')){ $this->y_filmler->f_tur_ekle(); }
			if ($this->input->post('tsil')){ $this->y_filmler->f_tur_sil();	}
			if ($this->input->post('et_ekle')){
			$this->load->helper('sef');
			$esef = sef_link($this->input->post('etiket'));	
			$ekle = $this->y_filmler->f_et_ekle(array('e_baslik' => $this->input->post('etiket'),'fid' => $this->input->post('fid')),$esef);
			if ($ekle[0]){ 
			$veri["etiketleri"] = $this->y_filmler->etiketleri_al($this->input->post('fid')); 
			$this->load->view('yonetim/f_et',$veri);	
			}
			else {
			$this->y_filmler->f_et_eklee($ekle[1],$ekle[2]);
			$veri["etiketleri"] = $this->y_filmler->etiketleri_al($this->input->post('fid')); 
			$this->load->view('yonetim/f_et',$veri);	
			}
			}if($this->input->post('esil')){ $sil = $this->y_filmler->e_sil();
			if ($sil){$veri["etiketleri"] = $this->y_filmler->etiketleri_al($this->input->post('fid')); $this->load->view('yonetim/f_et',$veri);}
			}
			if ($this->input->post('part_b_guncelle')){
			$pguncelle = $this->y_filmler->film_part_b_guncelle();
			}
			
			if ($this->input->post('part_k_guncelle')){
			$pguncelle = $this->y_filmler->film_part_k_guncelle();
			}
			
			if ($this->input->post('fp_ekle')){
			$baslik = $this->input->post('p_baslik');
			if (strlen($baslik) < 1){ $baslik = 'Part '.$this->input->post('p_sira'); }
			$pekle = $this->y_filmler->fp_ekle(array('p_baslik' => $baslik,'p_sira' => $this->input->post('p_sira'),'p_kod' => $this->input->post('p_kod'),'film_id' => $this->input->post('fid')));
			if ($pekle){
			$veri["partlar"] = $this->y_filmler->film_partlari($this->input->post("fid"));
			$this->load->view('yonetim/partlari',$veri);
			}
			}
			
			if ($this->input->post('partsil')){
			$sil = $this->y_filmler->fp_sil();
			if ($sil){
			$veri["partlar"] = $this->y_filmler->film_partlari($this->input->post("fid"));
			$this->load->view('yonetim/partlari',$veri);
			$this->y_filmler->fpsg($veri["partlar"]);
			}
			}
			
			if ($this->input->post('pasagi')){
			$pasagi = $this->y_filmler->p_asagi();
			if ($pasagi){ $this->y_filmler->p_asagi_s();
			$veri["partlar"] = $this->y_filmler->film_partlari($this->input->post("fid"));
			$this->load->view('yonetim/partlari',$veri);
			}
			}	

			if ($this->input->post('pyukari')){
			$pyukari = $this->y_filmler->p_yukari();
			if ($pyukari){ $this->y_filmler->p_yukari_o();
			$veri["partlar"] = $this->y_filmler->film_partlari($this->input->post("fid"));
			$this->load->view('yonetim/partlari',$veri);
			}
			}			
			
			if ($id == "" || !is_numeric($id)){
			redirect(site_url().'yonetim/filmler');
			}else {if (!$this->input->post('part_b_guncelle') && !$this->input->post('py') && !$this->input->post('partsil') && !$this->input->post('pa') && !$this->input->post('fp_ekle') && !$this->input->post('part_k_guncelle') && !$this->input->post('tur_id') && !$this->input->post('et_ekle') && !$this->input->post('esil')){
			$veri["film"] = $this->y_filmler->filmi_al($id);
			$veri["title"] = "Film düzenle - ".$veri["film"][0]->film_baslik;
			$veri["turler"] = $this->y_filmler->turler();
			$veri["fturleri"] = $this->y_filmler->f_turleri($veri["film"][0]->id);
			$veri["etiketleri"] = $this->y_filmler->etiketleri_al($veri["film"][0]->id);
			$veri["partlar"] = $this->y_filmler->film_partlari($veri["film"][0]->id);
			if (!$veri["film"]){ $this->session->set_flashdata('mesaj','Böyle bir film bulunamadı.'); redirect('yonetim/filmler'); }
			$parcala = explode('|',$veri["film"][0]->film_resim);
			$resim_p = explode('/',$parcala[0]);
			@$resim = $resim_p[6];
			$k_sil = substr($parcala[0],-strlen($resim),strlen($resim));
			@$b_sil = substr($parcala[1],-strlen($resim),strlen($resim));
			if ($this->input->post('film_guncelle')){
			if ($_FILES["film_resim"]['tmp_name']){
			if (file_exists('resimler/kucuk/'.$k_sil)){
			$rsilk = unlink("resimler/kucuk/".$k_sil);
			$rsilb = unlink("resimler/buyuk/".$b_sil);
			}$tarih = date('d_m_y');
			ob_start();
			if ($_FILES["film_resim"]['size'] > (1024*1024*3)){
			$this->session->set_flashdata('mesaj','Dosya boyutu 3MB\' geçmemelidir.'); redirect(site_url().'yonetim/filmler');
			}else {
			$tip = $_FILES["film_resim"]["type"];
			$isim = $_FILES["film_resim"]["name"];
			$uzanti = explode('.',$isim);
			$uzanti = $uzanti[1];
			if ($tip != 'image/jpeg' AND $uzanti != 'jpg' AND $tip != 'image/png' AND $uzanti != "png"){
			$this->session->set_flashdata('mesaj','Sadece PNG ve JPG uzantılı dosyalar geçerlidir.'); redirect(site_url().'yonetim/filmler');
			}else {
			copy($_FILES["film_resim"]['tmp_name'],'resimler/kucuk/'.$veri["film"][0]->id."-".$tarih."-kucuk".".".$uzanti);
			copy($_FILES["film_resim"]['tmp_name'],'resimler/buyuk/'.$veri["film"][0]->id."-".$tarih."-buyuk".".".$uzanti);
			$urlsi = base_url().'resimler/kucuk/'.$veri["film"][0]->id."-".$tarih."-kucuk".".".$uzanti."|".base_url().'resimler/buyuk/'.$veri["film"][0]->id."-".$tarih."-buyuk".".".$uzanti;
			$boyut = explode('|',$urlsi);
			$kucuk = './'.substr($boyut[0],strlen(base_url()),500);
			$buyuk = './'.substr($boyut[1],strlen(base_url()),500);
			$this->load->library('SimpleImage');
			$image = new SimpleImage();
			$image->load(''.$buyuk.'');
			$image->resize(300,450);
			$image->save('resimler/buyuk/'.$veri["film"][0]->id."-".$tarih."-buyuk".".".$uzanti);
			$image->load(''.$kucuk.'');
			$image->resize(162,242);
			$image->save('resimler/kucuk/'.$veri["film"][0]->id."-".$tarih."-kucuk".".".$uzanti);
			}}}
			$this->load->helper('sef');
			if (@$urlsi){ $test = "film_resim" ." = '".$urlsi."',"; }
			$farka = explode('||',$veri["film"][0]->film_arka);
			$farkaisim = substr($farka[1],-4,4);
			if (@$this->input->post('film_arka_pos')){
			if (!$farka[1]){
			if (!$_FILES["film_arka"]["name"]){
			$this->session->set_flashdata('mesaj','Film arkaplanına pozisyon belirlemek için ilk önce bir arkaplan belirlemelisiniz');
			redirect(site_url().'yonetim/filmler');
			}else {
			$tip = $_FILES["film_arka"]["type"];
			$isim = $_FILES["film_arka"]["name"];
			$uzanti = explode('.',$isim);
			$uzanti = $uzanti[1];
			if ($tip != 'image/jpeg' AND $tip != 'image/png'){
			$this->session->set_flashdata('mesaj','Sadece PNG ve JPG uzantılı dosyalar geçerlidir.'); redirect(site_url().'yonetim/filmler');
			}else {
			@unlink('tema/arkaplanlar/'.$id.$farkaisim);
			copy($_FILES["film_arka"]['tmp_name'],'tema/arkaplanlar/'.$id.'.'.$uzanti);
			$arkar = base_url().'tema/arkaplanlar/'.$id.'.'.$uzanti;
			}}
			}else {
			if ($_FILES["film_arka"]["name"]){
			$tip = $_FILES["film_arka"]["type"];
			$isim = $_FILES["film_arka"]["name"];
			$uzanti = explode('.',$isim);
			$uzanti = $uzanti[1];
			if ($tip != 'image/jpeg' AND $tip != 'image/png'){
			$this->session->set_flashdata('mesaj','Sadece PNG ve JPG uzantılı dosyalar geçerlidir.'); redirect(site_url().'yonetim/filmler');
			}else {
			@unlink('tema/arkaplanlar/'.$id.$farkaisim);
			copy($_FILES["film_arka"]['tmp_name'],'tema/arkaplanlar/'.$id.'.'.$uzanti);
			$arkar = base_url().'tema/arkaplanlar/'.$id.'.'.$uzanti;
			}
			}else {
			$poz = $this->input->post('film_arka_pos');
			$arkar = $farka[1];
			}}
			}
			if ($_FILES["film_arka"]["name"]){
			if (!$farka[0]){
			if ($this->input->post('film_arka_pos')){
			$poz = $this->input->post('film_arka_pos');
			}else {
			$poz = '0px';
			$tip = $_FILES["film_arka"]["type"];
			$isim = $_FILES["film_arka"]["name"];
			$uzanti = explode('.',$isim);
			$uzanti = $uzanti[1];
			if ($tip != 'image/jpeg' AND $tip != 'image/png'){
			$this->session->set_flashdata('mesaj','Sadece PNG ve JPG uzantılı dosyalar geçerlidir.'); redirect(site_url().'yonetim/filmler');
			}else {
			@unlink('tema/arkaplanlar/'.$id.$farkaisim);
			copy($_FILES["film_arka"]['tmp_name'],'tema/arkaplanlar/'.$id.'.'.$uzanti);
			$arkar = base_url().'tema/arkaplanlar/'.$id.'.'.$uzanti;
			}
			}}else {
			$poz = $this->input->post('film_arka_pos');
			}
			}
			if (!$this->input->post('film_arka_pos') && !$_FILES["film_arka"]["name"]){
			if ($farka[1]){
			$poz = '0px';
			$arkar = $farka[1];
			}
			}
			@$farka = $poz.'||'.$arkar;
			@$post = array('film_baslik' => $this->input->post('film_baslik'),'film_sef' => sef_link($this->input->post('film_baslik')),$test.'film_arka' => $farka,'film_tip' => $this->input->post('film_tip'),'film_imdb' => $this->input->post('film_imdb'),'film_gosterim_tarihi' => $this->input->post('film_gosterim_tarihi'),'film_sgt' => date('d.m.y h:i'),'film_yonetmen' => $this->input->post('film_yonetmen'),'film_yapim' => $this->input->post('film_yapim'),'film_oyuncular' => $this->input->post('film_oyuncular'),'film_ozet' => $this->input->post('film_ozet'),'film_zaman' => $this->input->post('film_zaman'));
			$guncelle = $this->y_filmler->filmi_duzenle($veri["film"][0]->id,$post);
			if ($guncelle){ $this->session->set_flashdata('mesaj','Film başarıyla güncellendi.'); 
			redirect(site_url().'yonetim/filmler');
			}
			else { $this->session->set_flashdata('mesaj','Bir sorun oluştu film güncellenemedi.'); redirect(site_url().'yonetim/filmler'); }
			}
			$veri["goster"] = "yonetim/film_duzenle";
			$this->load->view('yonetim/yonetim',$veri);
			}
			}
		}
		
	}
?>