<?php 
	class takim extends CI_Controller {
		
		function takim(){
		parent::__construct();
		if ($this->session->userdata('oturum') < 1){ redirect('yp_giris'); }
		elseif ($this->session->userdata('rutbe') > 1){
		$this->session->set_flashdata('mesaj','Yetkili ayarlarına erişmek için yetkiniz yok.!');
		redirect(site_url().'yonetim/panel');
		}else {	
		$this->load->model('yonetim/y_yorumlar');
		$this->load->model('yonetim/y_mesajlar');
		$veri["onaysiz_yorumlar"] = $this->y_yorumlar->onaysizlar();
		$veri["okunmamis"] = $this->y_mesajlar->okunmamis();
		$this->load->view('yonetim/ust',$veri,true);
		$this->load->model('yonetim/y_takim'); }
		}
		
		function index(){
		$veri["title"] = "Site kadrosu";
		$ksil = $this->input->post('ksil');
		if ($ksil){
		for ($i=0; $i < count($ksil); $i++){
			$this->y_takim->ksil($ksil[$i]);			
		}
		}
		$veri["takim"] = $this->y_takim->takim();
		$veri["goster"] = "yonetim/takim";
		$this->load->view('yonetim/yonetim',$veri);
		}
	
		function kd(){
		$kid = $this->uri->segment(4);
		$veri["kull"] = $this->y_takim->kull($kid);
		$veri["title"] = "Kullanıcı - ".$veri["kull"][0]->t_isim;
		$ksifre = $veri["kull"][0]->t_sifre;
		$sifre = $this->input->post('t_sifre');
		if ($this->input->post('kd')){
		$this->form_validation->set_rules('t_isim','İsim','required|trim');
		$this->form_validation->set_rules('t_sifre','Şifre','required|trim');
		$this->form_validation->set_rules('t_mail','Eposta','required|trim');
		if ($this->form_validation->run() == FALSE){
		$this->session->set_flashdata('mesaj',validation_errors());
		redirect(site_url().'yonetim/takim');
		}else {
		if ($ksifre != $sifre){
		$duzenle = $this->y_takim->kd($kid,array('t_isim' => $this->input->post('t_isim'),'t_sifre' => md5(sha1($this->input->post('t_sifre'))),'t_rutbe' => $this->input->post('t_rutbe'),'t_mail' => $this->input->post('t_mail')));
		}else {
		$duzenle = $this->y_takim->kd($kid,array('t_isim' => $this->input->post('t_isim'),'t_rutbe' => $this->input->post('t_rutbe'),'t_mail' => $this->input->post('t_mail')));
		}
		if ($duzenle){
		$this->session->set_flashdata('mesaj','Kullanıcı başarıyla düzenlendi.');
		redirect(site_url().'yonetim/takim');
		}else {
		$this->session->set_flashdata('mesaj','Bir sorun oluştu kullanıcı düzenlenemedi.');
		redirect(site_url().'yonetim/takim');
		}
		}
		}
		$veri["goster"] = "yonetim/kd";
		$this->load->view('yonetim/yonetim',$veri);
		}
		
		function ye(){
		$veri["title"] = "Yardımcı ekle";
		if ($this->input->post('yekle')){
		$this->form_validation->set_rules('t_isim','Kullanıcı adı','required|trim|');
		$this->form_validation->set_rules('t_sifre','Şifre','required|trim');
		if ($this->form_validation->run() == FALSE){
		$this->session->set_flashdata('mesaj',validation_errors());
		redirect(site_url().'yonetim/takim');
		}else {
		$ekle = $this->y_takim->yekle();
		if ($ekle){
		$this->session->set_flashdata('mesaj','Yardımcı başarıyla eklendi.');
		redirect(site_url().'yonetim/takim');
		}else {
		$this->session->set_flashdata('mesaj','Bir sorun oluştu yardımcı eklenemedi.');
		redirect(site_url().'yonetim/takim');
		}
		}
		}		
		$veri["goster"] = "yonetim/y_ekle";
		$this->load->view('yonetim/yonetim',$veri);
		}
	}
?>