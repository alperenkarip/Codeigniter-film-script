<?php 
	class anasayfa extends CI_Controller {
	
		function anasayfa(){
		parent::__construct();
		$this->load->library('user_agent');
		if ($this->agent->is_mobile()){
		redirect(site_url().'mobil');
		}
		$k = $this->uri->segment(2);
		$this->load->model('sistem');
		$veri["sistem"] = $this->sistem->sistem();
		if ($veri["sistem"][0]->site_cache){
		$this->output->cache($veri["sistem"][0]->site_cache_sure);
		}
		$veri["duzen"] = $veri["sistem"][0]->site_duzen;
		if (!$this->input->post('yorum') && !$this->input->post('puanver') && $k != 'k' && !$this->input->post('mesaj')){
		$this->load->model('kategoriler');
		$this->load->model('etiketler');
		$this->load->model('yonetim/y_sayfalar');
		$veri["sayfalar"] = $this->y_sayfalar->sayfalar();
		$veri["ustun_e"] = $this->etiketler->ustun_etiketler();
		$veri["turler"] = $this->kategoriler->katCek();
		$this->load->model('yonetim/y_reklamlar');
		$veri["reklamkatalt"] = $this->y_reklamlar->reklamkatalt();
		$veri["arkareklam"] = $this->y_reklamlar->arkareklam();
		$veri["fizleorta"] = $this->y_reklamlar->fizleorta();
		$veri["reklamust"] = $this->y_reklamlar->reklam_ust();
		$veri["reklamsol"] = $this->y_reklamlar->reklamsol();
		$veri["reklamsag"] = $this->y_reklamlar->reklamsag();
		if ($veri["reklamsol"]){
		$rid = $veri["reklamsol"][0]->id;
		$this->load->helper('cookie');
		if ($veri["reklamsol"][0]->r_sinir != 0){
		$this->input->set_cookie(array('name' => 'rgoster'.$rid,'value' => $rid,'expire' => time()+(60*60*24)));
		if (get_cookie('rgoster'.$rid.'') != $rid){
		$this->y_reklamlar->rgosterim($rid);
		}
		if ($veri["reklamsol"][0]->r_gosterim == $veri['reklamsol'][0]->r_sinir){
		$this->y_reklamlar->rgs($rid);
		}
		}
		}
		if ($veri["reklamsag"]){
		$rid = $veri["reklamsag"][0]->id;
		$this->load->helper('cookie');
		if ($veri["reklamsag"][0]->r_sinir != 0){
		$this->input->set_cookie(array('name' => 'rgoster'.$rid,'value' => $rid,'expire' => time()+(60*60*24)));
		if (get_cookie('rgoster'.$rid.'') != $rid){
		$this->y_reklamlar->rgosterim($rid);
		}
		if ($veri["reklamsag"][0]->r_gosterim == $veri['reklamsag'][0]->r_sinir){
		$this->y_reklamlar->rgs($rid);
		}
		}
		}
		if ($veri["reklamust"]){
		$rid = $veri["reklamust"][0]->id;
		$this->load->helper('cookie');
		if ($veri["reklamust"][0]->r_sinir != 0){
		$this->input->set_cookie(array('name' => 'rgoster'.$rid,'value' => $rid,'expire' => time()+(60*60*24)));
		if (get_cookie('rgoster'.$rid.'') != $rid){
		$this->y_reklamlar->rgosterim($rid);
		}
		if ($veri["reklamust"][0]->r_gosterim == $veri['reklamust'][0]->r_sinir){
		$this->y_reklamlar->rgs($rid);
		}
		}
		}
		$this->load->view('ust',$veri,true);
		}
		}
		
		public function index($sayfa=""){
		$site = $this->sistem->sistem();
		$veri["title"] = $site[0]->site_baslik;
		$veri["aciklama"] = $site[0]->site_desc;
		$veri["anahtar"] = $site[0]->site_key;
		$this->load->view('ust',$veri);
		$this->load->model('filmler');
		$limit = $site[0]->site_film_sayi;
		$veri["fsayi"] = $this->filmler->filmsayi();
		$veri["ssayi"] = ceil($veri["fsayi"]/$limit);
		if (!is_numeric($sayfa) || $sayfa == "" || $sayfa == "0" || $sayfa > $veri["ssayi"]) { $sayfa=1; } 
		$veri["sayfa"] = $sayfa;
		$veri["limit"] = $limit;
		$veri["fonk"] = "s";
		$baslangic = ($sayfa*$limit)-$limit;
		$veri["f"] = $this->filmler->filmleri_cek('',$limit,$baslangic);
		$veri["icerik"] = "filmler";
		$this->load->view('orta',$veri);
		$this->load->view('alt');		
		}
		
		public function k($kat=""){
		$veri["duzen"] = 1;
		$site = $this->sistem->sistem();
		$baslangic = 0;
		$limit = $site[0]->site_film_sayi;
		$limit = $limit;
		$veri["k"] = "k";
		$this->load->model('filmler');
		if (!$kat){ $veri["f"] = $this->filmler->filmleri_cek('',$limit,$baslangic); }else { $veri["f"] = $this->filmler->filmleri_cek(explode('-',$kat)); }
		$this->load->view('filmler',$veri);
		}
		
		public function filmleri($tur="",$sayfa=""){
		$site = $this->sistem->sistem();
		$this->load->model('filmler');
		$limit = $site[0]->site_film_sayi;
		$veri["fsayi"] = $this->filmler->tursayi($tur);
		$veri["ssayi"] = ceil($veri["fsayi"]/$limit);
		if (!is_numeric($sayfa) || $sayfa == "" || $sayfa == "0" || $sayfa > $veri["ssayi"]) { $sayfa=1; } 
		$veri["sayfa"] = $sayfa;
		$veri["limit"] = $limit;
		$veri["fonk"] = $tur;
		$baslangic = ($sayfa*$limit)-$limit;
		$veri["f"] = $this->filmler->film_cek_tur($tur,$limit,$baslangic);
		$veri["icerik"] = "filmler";
		$tb = $this->filmler->filmtur($tur);
		$veri["title"] = $tb[0]->tur_baslik." Filmleri - ".$site[0]->site_baslik;
		$veri["aciklama"] = $tb[0]->tur_desc;
		$veri["anahtar"] = $tb[0]->tur_keyw;
		$this->load->view('ust',$veri);
		$this->load->view('orta',$veri);
		$this->load->view('alt');	
		}
		
		public function izle($film="",$part=""){
		$ip = $this->input->ip_address();
		$this->load->model('filmler');
		$veri["film"] = $this->filmler->filmi_cek($film);
		$fid = @$veri["film"][0]->film_id;
		if (!isset($fid)){ 
		redirect(site_url());
		die();
		}
		if (get_cookie('filmg'.$fid) != $fid){
		$izlenme = $this->filmler->fgosterim($fid);
		if ($izlenme){
		$this->input->set_cookie(array('name' => 'filmg'.$fid,'value' => $fid,'expire' => time()+(60*60*24)));
		}
		}
		if ($this->input->post('puanver')){
		$pver = $this->filmler->puanver(array('p_puan' => $this->input->post('tip'),'p_ip' => $ip,'p_filmid' => $fid));
		$veri["puanlar"] = $this->filmler->puanlar($fid);
		$this->load->view('puanlari',$veri);
		}elseif ($this->input->post('ypuan')){
		$yid = $this->input->post('yid');
		if (get_cookie('ypuan'.$yid) != $yid){
		if ($this->input->post('y-arti')){
		$guncelle = $this->filmler->ypuan('arti',$this->input->post('yid'));
		if ($guncelle){
		$this->input->set_cookie(array('name' => 'ypuan'.$yid,'value' => $yid,'expire' => time()+(60*60*24)));
		}
		}elseif ($this->input->post('y-eksi')){
		$guncelle = $this->filmler->ypuan('eksi',$this->input->post('yid'));
		if ($guncelle){
		$this->input->set_cookie(array('name' => 'ypuan'.$yid,'value' => $yid,'expire' => time()+(60*60*24)));
		}
		}
		}
		}elseif ($this->input->post('anketoy')){
		if (get_cookie('anketoy'.$this->input->post('anketid')) != $this->input->post('anketid')){
		$anketoy = $this->filmler->anketoy();
		if ($anketoy){
		$this->input->set_cookie(array('name' => 'anketoy'.$this->input->post('anketid'),'value' => $this->input->post('anketid'),'expire' => time()+(60*60*24)));
		}
		}
		}else {
		$veri["anket"] = $this->filmler->anket();
		$this->load->model('yonetim/y_reklamlar');
		$veri["reklam"] = $this->y_reklamlar->rorreklam();
		if ($veri["reklam"]){
		$rid = $veri["reklam"][0]->id;
		$this->load->helper('cookie');
		
		if ($veri["reklam"][0]->r_sinir != 0){
		$this->input->set_cookie(array('name' => 'rgoster'.$rid,'value' => $rid,'expire' => time()+(60*60*24)));
		if (get_cookie('rgoster'.$rid.'') != $rid){
		$this->y_reklamlar->rgosterim($rid);
		}
		if ($veri["reklam"][0]->r_gosterim == $veri['reklam'][0]->r_sinir){
		$this->y_reklamlar->rgs($rid);
		}
		}
		}
		$veri["parca"] = $this->uri->segment(5);
		if (!$veri["film"][0]->id){ redirect(site_url()); }
		$veri["etiketleri"] = $this->filmler->film_etiket($fid);
		$veri["partlar"] = $this->filmler->film_part($fid);
		$veri["puanlar"] = $this->filmler->puanlar($fid);
		$psayisi = count($veri["partlar"]);
		if ($veri["parca"] > $psayisi){ redirect(''.site_url().'anasayfa/izle/'.$veri["film"][0]->film_sef.''); }
		$veri["yorumlar"] = $this->filmler->yorumlar($fid);
		$veri["yorumyanitlari"] = $this->filmler->yorumyanitlari($fid);
		$veri["onecikanyorumlar"] = $this->filmler->onecikanyorumlar($fid);
		$veri["icerik"] = "izle";
		$site = $this->sistem->sistem();
		$veri["title"] = $veri["film"][0]->film_baslik." - ".$site[0]->site_baslik;
		$veri["aciklama"] = mb_substr($veri["film"][0]->film_ozet,0,120);
		$veri["anahtar"] = $this->etiketler->etiketleri($veri["film"][0]->film_id);
		$resim = explode('|',$veri["film"][0]->film_resim);
		$veri["resim"] = $resim[0];
		$this->load->view('ust',$veri);
		$this->load->view('orta',$veri);
		$this->load->view('alt');	
		}}
		
		public function yorum_yap(){
		$ip = $_SERVER["REMOTE_ADDR"];
		if (get_cookie('yorumyap') == time() || get_cookie('yorumyap') < time()){
		$sistem = $this->sistem->sistem();
		$msj["msj"] = "Kısa bir süreliğine filmler yoruma kapatılmıştır.";
		if ($sistem[0]->site_yorum != 1){ $this->load->view('yorum_yap',$this->load->view('msj',$msj),true); }else {
		$tarih = date('Y-m-d H:m:i');
		$y_onay =$sistem[0]->site_yorum_onay;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('yazan','İsim','trim|required|min_length[3]|max_length[25]|xss_clean|strip_tags');
		$this->form_validation->set_rules('mail','E-Posta','trim|required|min_length[3]|max_length[50]|email|xss_clean|strip_tags');
		$this->form_validation->set_rules('yorum','Yorumun','trim|required|min_length[3]|max_length[200]|xss_clean|strip_tags');
		$this->load->model('filmler');
		if ($this->form_validation->run() == FALSE){ echo validation_errors();	} else {
		$veriler = array('y_yazan' => $this->input->post('yazan'),'y_mail' => $this->input->post('mail'),'y_tarih' => $tarih,'y_yorum' => $this->input->post('yorum'),'y_onay' => $y_onay,'film_id' => $this->input->post('fid'),'y_kip' => $ip);
		$ekle = $this->filmler->yorum_ekle($veriler);
		if ($ekle){
		$this->input->set_cookie(array('name' => 'yorumyap','value' => time()+30,'expire' => time()+30));
		}else { }
		}}}}
		
		public function yyanit(){
		$ip = $_SERVER["REMOTE_ADDR"];
		$this->input->set_cookie(array('name' => 'yorumyap','value' => time()+30,'expire' => time()+30));
		if (get_cookie('yorumyap') == time() || get_cookie('yorumyap') < time()){
		$isim = $this->input->post('yazan');
		$mail = $this->input->post('mail');
		$yorum = $this->input->post('yorum');
		$yorumid = $this->input->post('yid');
		$sistem = $this->sistem->sistem();
		$msj["msj"] = "Kısa bir süreliğine filmler yoruma kapatılmıştır.";
		if ($sistem[0]->site_yorum != 1){ echo 'filmler yoruma kapalı'; }else {
		$tarih = date('Y-m-d H:m:i');
		$y_onay =$sistem[0]->site_yorum_onay;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('yazan','İsim','trim|required|min_length[5]|max_length[25]|xss_clean|strip_tags');
		$this->form_validation->set_rules('mail','E-Posta','trim|required|min_length[5]|max_length[50]|valid_email|xss_clean|strip_tags');
		$this->form_validation->set_rules('yorum','Yorumun','trim|required|min_length[5]|max_length[200]|xss_clean|strip_tags');
		$this->load->model('filmler');
		if ($this->form_validation->run() == FALSE){ echo validation_errors();	} else {
		$veriler = array('y_yazan' => $this->input->post('yazan'),'y_mail' => $this->input->post('mail'),'y_tarih' => $tarih,'y_yorum' => $this->input->post('yorum'),'y_onay' => $y_onay,'y_ust' => $this->input->post('yid'),'y_kip' => $ip,'film_id' => $this->input->post('fid'));
		$ekle = $this->filmler->yyanit($veriler);
		if ($ekle){	echo "eklendi";	}else { echo "eklenmedi"; }
		}}
		}}
		
		public function etiketler(){
		$veri["title"] = 'Etiketler ';
		$veri["aciklama"] = 'Sitede bulunan etiketlerin bir listesi';
		$veri["anahtar"] = 'etiketler,etiket,film etiketleri,etkili filmler';
		$this->load->view('ust',$veri);
		$this->load->model('etiketler');
		$veri["etiketler"] = $this->etiketler->etiketler();
		$veri["icerik"] = "etiketler";
		$this->load->view('orta',$veri);
		$this->load->view('alt');
		}
		
		public function etiket($etiket,$sayfa=""){
		$site = $this->sistem->sistem();
		$this->load->model('etiketler');
		$limit = $site[0]->site_film_sayi;
		$veri["etsayi"] = $this->etiketler->etsayi($etiket);
		$veri["ssayi"] = ceil($veri["etsayi"]/$limit);
		if (!is_numeric($sayfa) || $sayfa == "" || $sayfa == "0" || $sayfa > $veri["etsayi"]) { $sayfa=1; } 
		$veri["sayfa"] = $sayfa;
		$veri["limit"] = $limit;
		$veri["fonk"] = "etiket";
		$baslangic = ($sayfa*$limit)-$limit;
		$veri["f"] = $this->etiketler->etiket_kontrol($etiket,$baslangic,$limit);
		if ($veri["f"] == FALSE){ redirect(site_url().'anasayfa/etiketler'); }
		$veri["icerik"] = "filmler";
		$this->load->model('filmler');
		$et = $this->filmler->etiket($etiket);
		$veri["title"] = $et[0]->e_baslik." - ".$site[0]->site_baslik;
		$veri["aciklama"] = $site[0]->site_desc;
		$veri["anahtar"] = $site[0]->site_key;
		$this->load->view('ust',$veri);
		$this->load->view('orta',$veri);
		$this->load->view('alt');
		}
		
		public function iletisim(){
		if ($this->input->post('mesaj')){
		$this->form_validation->set_rules('m_gonderen','İsim','required|trim|xss_clean');
		$this->form_validation->set_rules('m_mail','E-Posta','required|trim|xss_clean');
		$this->form_validation->set_rules('m_mesaj','Mesaj','required|trim|xss_clean');
		if ($this->form_validation->run() == FALSE){
		$this->session->set_flashdata('mesaj',validation_errors());
		}else {
		$this->load->model('yonetim/y_mesajlar');
		$mg = $this->y_mesajlar->mesajgonder();
		if ($mg){ echo "eklendi"; }else { return false; }
		}
		}else {		
		$veri["icerik"] = "iletisim";
		$site = $this->sistem->sistem();
		$veri["title"] = "İletişim - ".$site[0]->site_baslik;
		$veri["aciklama"] = $site[0]->site_desc;
		$veri["anahtar"] = $site[0]->site_key;
		$this->load->view('ust',$veri);
		$this->load->view('orta',$veri);
		$this->load->view('alt');
		}
		}
		
		public function sayfa($id,$sef){
		if ($sef){
		$this->load->model('yonetim/y_sayfalar');
		$veri["sayfa"] = $this->y_sayfalar->sayfa($id,$sef);
		if ($veri["sayfa"][0]->s_sef != $sef){		redirect(site_url());		}
		$veri["icerik"] = "sayfa";
		$site = $this->sistem->sistem();
		$veri["title"] = $veri["sayfa"][0]->s_baslik." - ".$site[0]->site_baslik;
		$veri["aciklama"] = $site[0]->site_desc;
		$veri["anahtar"] = $site[0]->site_key;
		$this->load->view('ust',$veri);
		$this->load->view('orta',$veri);
		$this->load->view('alt');
		}else { redirect(site_url()); }
		}
		
		public function ara($ara="",$sayfa=""){
		$this->load->model('ara');
		$kelime = $ara;
		$degistir = array('%C3%87','%C3%A7','%C5%9F','%C5%9E' ,'%C4%9E','%C4%9F','%C4%B0','%C4%B1','%C3%96','%C3%B6','%C3%9C','%C3%BC');
		$degisecek = array('Ç','ç','ş','Ş','Ğ','ğ','İ','ı','Ö','ö','Ü','ü');
		$kelime = str_replace($degistir,$degisecek,$kelime);
		if ($this->input->post('kelime')){
		redirect(site_url().'ara/'.$this->input->post('kelime'));
		}
		$veri["icerik"] = "filmler";
		$site = $this->sistem->sistem();
		$limit = $site[0]->site_film_sayi;
		$z["f"] = $this->ara->arama($ara);
		$veri["etsayi"] = count($z["f"]["filmler"]);
		$veri["ssayi"] = ceil($veri["etsayi"]/$limit);
		if (!is_numeric($sayfa) || $sayfa == "" || $sayfa == "0" || $sayfa > $veri["etsayi"]) { $sayfa=1; } 
		$veri["sayfa"] = $sayfa;
		$veri["limit"] = $limit;
		$veri["fonk"] = "ara";
		$baslangic = ($sayfa*$limit)-$limit;
		$veri["f"] = $this->ara->arama($kelime,$limit,$baslangic);
		$veri["title"] = "\"".$kelime."\" arama sonuçları";
		$veri["aciklama"] = $site[0]->site_desc;
		$veri["anahtar"] = $site[0]->site_key;
		$this->load->view('ust',$veri);
		$this->load->view('orta',$veri);
		$this->load->view('alt');
		}
		
		public function rss(){
		$this->load->model('sistem');
		$veri["sistem"] = $this->sistem->sistem();
		$this->load->model('filmler');
		$veri["rss"] = $this->filmler->rss();
		$this->load->view('rss',$veri);
		}
		
		public function sitemap(){
		$this->load->model('filmler');
		$veri["sitemap"] = $this->filmler->sitemap();
		$this->load->view('sitemap',$veri);
		}
		
		}
?>