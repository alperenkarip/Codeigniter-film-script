<?php 
	class reklamlar extends CI_Controller {
		
		function reklamlar(){
		parent::__construct();
		if ($this->session->userdata('oturum') < 1){ redirect('yp_giris'); }
		elseif ($this->session->userdata('rutbe') > 1){
		$this->session->set_flashdata('mesaj','Reklam ayarlarına erişmek için yetkiniz yok.!');
		redirect(site_url().'yonetim/panel');
		}else {	
		$this->load->model('yonetim/y_yorumlar');
		$this->load->model('yonetim/y_mesajlar');
		$veri["onaysiz_yorumlar"] = $this->y_yorumlar->onaysizlar();
		$veri["okunmamis"] = $this->y_mesajlar->okunmamis();
		$this->load->view('yonetim/ust',$veri,true);
		$this->load->model('yonetim/y_reklamlar'); }
		}
		
		function index(){
		$veri["title"] = "Reklamlar";
		$rsil = $this->input->post('rsil');
		if ($rsil){
		for ($i=0; $i < count($rsil); $i++){
		$veri["reklam"] = $this->y_reklamlar->reklam($rsil[$i]);
		$risim = explode('||', $veri["reklam"][0]->r_kod);
		$risim = explode('reklam_resimleri/',$risim[0]);
		@unlink('tema/reklam_resimleri/'.$risim[1]);
		$this->y_reklamlar->rsil($rsil[$i]);
		}
		}
		$veri["reklamlar"] = $this->y_reklamlar->reklamlar();
		$veri["goster"] = "yonetim/reklamlar";
		$this->load->view('yonetim/yonetim',$veri);
		}
		
		function rd(){
		$rid = $this->uri->segment(4);
		$veri["reklam"] = $this->y_reklamlar->reklam($rid);
		$rkodu =  explode('||', $veri["reklam"][0]->r_kod);
		$resim = $rkodu[0];
		if ($this->input->post('rd')){
		$this->form_validation->set_rules('r_baslik','Başlık','required');
		if ($this->form_validation->run() == FALSE){
		$this->session->set_flashdata('mesaj',validation_errors());
		redirect(site_url().'yonetim/reklamlar');
		}else {
		if ($this->input->post('r_link') || strlen(@$_FILES["r_resim"]["name"]) > 0){
		if (strlen($rkodu[0]) < 1){
		if (strlen(@$_FILES["r_resim"]["name"]) < 1){
		$islem = false;
		$this->session->set_flashdata('mesaj','Reklam için herhangi bir resim belirtmediniz.');
		redirect(site_url().'yonetim/reklamlar');
		}
		}if ($_FILES["r_resim"]["name"]){
		if ($_FILES["r_resim"]["type"] != 'image/jpeg' AND $_FILES["r_resim"]["type"] != 'image/png' AND $_FILES["r_resim"]["type"] != 'image/gif'){
		$islem = false;
		$this->session->set_flashdata('mesaj','Sadece PNG,JPG ve GİF uzantılı dosyalar geçerlidir.'); 
		redirect(site_url().'yonetim/reklamlar');
		}elseif (!$this->input->post('r_link')){
		$islem = false;
		$this->session->set_flashdata('mesaj','Reklam linki boş bırakılamaz.'); 
		redirect(site_url().'yonetim/reklamlar');
		}else {
		$islem = true;
		$isim = $_FILES["r_resim"]["name"];
		$risim = explode('reklam_resimleri/',$rkodu[0]);
		$type = substr($isim,-4,4);
		@unlink('tema/reklam_resimleri/'.$risim[1]);
		copy($_FILES["r_resim"]['tmp_name'],'tema/reklam_resimleri/'.$rid.$type);
		$resim = base_url().'tema/reklam_resimleri/'.$rid.$type;
		}
		}if ($this->input->post('r_link')){
		$islem = true;
		$link = $this->input->post('r_link');
		}
		if ($islem){
		$rkod = $resim.'||'.$link.'||'.'<a href="'.$link.'"><img src="'.$resim.'" alt="" /></a>';
		$duzenle = $this->y_reklamlar->rd($rid,array('r_baslik' => $this->input->post('r_baslik'),'r_kod' => $rkod,'r_sure' => $this->input->post('r_sure'),'r_gec' => $this->input->post('r_gec'),'r_sinir' => $this->input->post('r_sinir'),'r_konum' => $this->input->post('r_konum'),'r_durum' => $this->input->post('r_durum')));
		if ($duzenle){
		$this->session->set_flashdata('mesaj','Reklam düzenlendi.');
		redirect(site_url().'yonetim/reklamlar');
		}else {
		$this->session->set_flashdata('mesaj','Bir sorun oluştu reklam düzenlenemedi.');
		redirect(site_url().'yonetim/reklamlar');
		}
		}else {
		$this->session->set_flashdata('mesaj','Bir sorun oluştu reklam güncellenemedi.');
		redirect(site_url().'yonetim/reklamlar');
		}
		}elseif ($this->input->post('ckeditor')){
		if ($this->input->post('r_konum') == 7){
		$islem = false;
		$this->session->set_flashdata('mesaj','Arkaplan için kod giremezsiniz.');
		redirect(site_url().'yonetim/reklamlar');
		}else {
		$islem = true;
		if ($islem){
		$rkod = "||"."||".$this->input->post('ckeditor');
		$risim = explode('reklam_resimleri/',$rkodu[0]);
		@unlink('tema/reklam_resimleri/'.$risim[1]);
		$duzenle = $this->y_reklamlar->rd($rid,array('r_baslik' => $this->input->post('r_baslik'),'r_kod' => $rkod,'r_sure' => $this->input->post('r_sure'),'r_gec' => $this->input->post('r_gec'),'r_sinir' => $this->input->post('r_sinir'),'r_konum' => $this->input->post('r_konum'),'r_durum' => $this->input->post('r_durum')));
		if ($duzenle){
		$this->session->set_flashdata('mesaj','Reklam düzenlendi.');
		redirect(site_url().'yonetim/reklamlar');
		}else {
		$this->session->set_flashdata('mesaj','Bir sorun oluştu reklam düzenlenemedi.');
		redirect(site_url().'yonetim/reklamlar');
		}
		}
		}}else {
		$islem = false;
		$this->session->set_flashdata('mesaj','Reklam için herhangi bir kod veya link belirtmediniz. Lütfen boş alan bırakmayın.');
		redirect(site_url().'yonetim/reklamlar');
		}
		}
		}
		$veri["goster"] = "yonetim/rduzenle";
		$veri["title"] = "Reklam düzenle - ".$veri["reklam"][0]->r_baslik;
		$this->load->view('yonetim/yonetim',$veri);
		}
		
		function re(){
		$veri["title"] = "Reklam ekle";
		$sonid = $this->y_reklamlar->sonid(); 	$sonid = ($sonid)+1;
		if ($this->input->post('re')){
		$this->form_validation->set_rules('r_baslik','Başlık','required|trim');
		// $this->form_validation->set_rules('r_sure','Süre','required|trim|is_natural');
		if ($this->form_validation->run() == FALSE){
		$this->session->set_flashdata('mesaj',validation_errors());
		redirect(site_url().'yonetim/reklamlar');
		}else {
		if (strlen($this->input->post('r_link')) > 0 || strlen(@$_FILES["r_resim"]["name"]) > 0){
		if ($this->input->post('r_link') == "" || $_FILES["r_resim"]["name"] == ""){
		$islem = false;
		$this->session->set_flashdata('mesaj','Reklam linki yada reklam resmi girilmedi..');
		redirect(site_url().'yonetim/reklamlar');
		}else {
		$tip = $_FILES["r_resim"]["type"];
		if ($tip){
		if ($tip != 'image/jpeg' AND $tip != 'image/png' AND $tip != 'image/gif'){
		$this->session->set_flashdata('mesaj','Sadece PNG,JPG ve GİF uzantılı dosyalar geçerlidir.'); redirect(site_url().'yonetim/reklamlar');
		}else {
		$isim = $_FILES["r_resim"]["name"];
		$type = substr($isim,-4,4);
		$uzanti = explode('.',$isim);
		$uzanti = $uzanti[1];
		copy($_FILES["r_resim"]['tmp_name'],'tema/reklam_resimleri/'.$sonid.$type);
		}
		}
		$rkod = base_url().'tema/reklam_resimleri/'.$sonid.$type.'||'.$this->input->post('r_link').'||<a href="'.$this->input->post('r_link').'"><img src="'.base_url().'tema/reklam_resimleri/'.$sonid.$type.'" alt="" /></a>';
		}}elseif ($this->input->post('ckeditor')){
		if ($this->input->post('r_konum') == 7){
		$islem = false;
		$this->session->set_flashdata('mesaj','Arkaplan için kod giremezsiniz.');
		redirect(site_url().'yonetim/reklamlar');
		}else {
		$islem = true;
		$rkod = '||'.'||'.$this->input->post('ckeditor');
		}
		}else {
		$islem = false;
		$this->session->set_flashdata('mesaj','Reklam linki yada kodu belirtilmedi.');
		redirect(site_url().'yonetim/reklamlar');
		}
		$ekle = $this->y_reklamlar->re(array('r_baslik' => $this->input->post('r_baslik'),'r_kod' => $rkod,'r_tarih' => date('y.m.d h.m.i'),'r_sure' => $this->input->post('r_sure'),'r_gec' => $this->input->post('r_gec'),'r_sinir' => $this->input->post('r_sinir'),'r_konum' => $this->input->post('r_konum'),'r_durum' => $this->input->post('r_durum')));
		if ($ekle){
		$this->session->set_flashdata('mesaj','Reklam eklendi.');
		redirect(site_url().'yonetim/reklamlar');
		}else {
		$this->session->set_flashdata('mesaj','Bir sorun oluştu reklam eklenemedi.');
		redirect(site_url().'yonetim/reklamlar');
		}
		}
		}
		$veri["goster"] = "yonetim/rekle";
		$this->load->view('yonetim/yonetim',$veri);
		}
	}
?>