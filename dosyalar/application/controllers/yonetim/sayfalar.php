<?php 
	class sayfalar extends CI_Controller {
		
		function sayfalar(){
		parent::__construct();
		if ($this->session->userdata('oturum') < 1){ redirect('yp_giris'); }
		elseif ($this->session->userdata('rutbe') > 1){
		$this->session->set_flashdata('mesaj','Sayfa ayarlarına erişmek için yetkiniz yok.!');
		redirect(site_url().'yonetim/panel');
		}else {	
		$this->load->model('yonetim/y_yorumlar');
		$this->load->model('yonetim/y_mesajlar');
		$veri["onaysiz_yorumlar"] = $this->y_yorumlar->onaysizlar();
		$veri["okunmamis"] = $this->y_mesajlar->okunmamis();
		$this->load->view('yonetim/ust',$veri,true);
		$this->load->model('yonetim/y_sayfalar'); }
		}
		
		function index(){
		$veri["title"] = "Sayfalar";
		$ssil = $this->input->post('ssil');
		if ($ssil){
		for ($i=0; $i < count($ssil); $i++){
		$this->y_sayfalar->ssil($ssil[$i]);
		}
		}
		
		$veri["sayfalar"] = $this->y_sayfalar->sayfalar();
		$veri["goster"] = "yonetim/sayfalar";
		$this->load->view('yonetim/yonetim',$veri);
		}
		
		function sd(){
		$sid = $this->uri->segment(4);
		$this->load->helper('sef');
		$veri["sayfa"] = $this->y_sayfalar->sayfa($sid);
		$veri["title"] = "Sayfa düzenle - ".$veri["sayfa"][0]->s_baslik;
		if ($this->input->post('sayfa_duzenle')){
		$this->form_validation->set_rules('s_baslik','Başlık','required|trim|xss_clean');
		$this->form_validation->set_rules('s_icerik','İçerik','required|trim');
		if ($this->form_validation->run() == FALSE){
		$this->session->set_flashdata('mesaj',validation_errors());
		redirect(site_url().'yonetim/sayfalar');
		}else {
		$duzenle = $this->y_sayfalar->sd($sid,sef_link($this->input->post('s_baslik')));
		if ($duzenle){ 
		$this->session->set_flashdata('mesaj','Sayfa düzenlendi.');
		redirect(site_url().'yonetim/sayfalar');
		}else { 
		$this->session->set_flashdata('mesaj','Bir sorun oluştu sayfa düzenlenemedi.');
		redirect(site_url().'yonetim/sayfalar');
		}
		}
		}
		$veri["goster"] = "yonetim/sayfa_duzenle";
		$this->load->view('yonetim/yonetim',$veri);
		}
		
		function se(){
		$veri["title"] = "Sayfa ekle";
		$this->load->helper('sef');
		if ($this->input->post('sekle')){
		$this->form_validation->set_rules('s_baslik','Başlık','trim|required|xss_clean');
		$this->form_validation->set_rules('s_icerik','İçerik','trim|required');
		if ($this->form_validation->run() == FALSE){
		$this->session->set_flashdata('mesaj',validation_errors());
		redirect(site_url().'yonetim/sayfalar');
		}else {
		$ekle = $this->y_sayfalar->se(sef_link($this->input->post('s_baslik')));
		if ($ekle){
		$this->session->set_flashdata('mesaj','Sayfa başarıyla eklendi.');
		redirect(site_url().'yonetim/sayfalar');
		}else {
		$this->session->set_flashdata('mesaj','Bir sorun oluştu sayfa eklenemedi.');
		redirect(site_url().'yonetim/sayfalar');
		}
		}
		}
		$veri["goster"] = "yonetim/sayfa_ekle";
		$this->load->view('yonetim/yonetim',$veri);
		}
		
	}
?>