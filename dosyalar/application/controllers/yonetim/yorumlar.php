<?php 
	class yorumlar extends CI_Controller{
	
		function yorumlar(){
		parent::__construct();
		if ($this->session->userdata('oturum') < 1){ redirect('yp_giris'); }
		else {
		$this->load->model('yonetim/y_yorumlar');
		$this->load->model('yonetim/y_mesajlar');
		$veri["onaysiz_yorumlar"] = $this->y_yorumlar->onaysizlar();
		$veri["okunmamis"] = $this->y_mesajlar->okunmamis();
		$this->load->view('yonetim/ust',$veri,true);
		$this->load->model('yonetim/y_yorumlar'); }
		}
		
		function index($sayfa=""){
		$veri["title"] = "Yorumlar";
		$ysil = $this->input->post('ysil');
		if ($ysil){
		for ($i=0; $i < count($ysil); $i++){
		$this->y_yorumlar->yorum_sil($ysil[$i]);
		}
		}
		$limit = 15;
		$veri["fsayi"] = count($this->y_yorumlar->yorumlar());
		$veri["ssayi"] = ceil($veri["fsayi"]/$limit);
		if (!is_numeric($sayfa) || $sayfa == 0 || $sayfa == "" || $sayfa > $veri["ssayi"]){ $sayfa = 1; }
		$veri["sayfa"] = $sayfa;
		$baslangic = ($sayfa*$limit)-$limit;
		$veri["yorumlar"] = $this->y_yorumlar->yorumlar($limit,$baslangic);
		$veri["goster"] = "yonetim/yorumlar";
		$this->load->view('yonetim/yonetim',$veri);
		}
		
		function yd(){
		$yid = $this->uri->segment(4);
		if ($this->input->post('yorum_duzenle')){
		$this->form_validation->set_rules('y_yorum','Yorum','trim|required|min_length[1]|xss_clean');
		if ($this->form_validation->run() == FALSE){
		$this->session->set_flashdata('mesaj',validation_errors());
		redirect(site_url().'yonetim/yorumlar');
		}else {
		$duzenle = $this->y_yorumlar->yd($yid);
		if ($duzenle){ 
		$this->session->set_flashdata('mesaj','Yorum düzenlendi.');
		redirect(site_url().'yonetim/yorumlar');
		}else {
		$this->session->set_flashdata('mesaj','Bir sorun oluştu yorum düzenlenemedi..');
		redirect(site_url().'yonetim/yorumlar');
		}
		}
		}
		$veri["yorum"] = $this->y_yorumlar->yorum($yid);
		$veri["title"] = "Yorum düzenle - ".$veri["yorum"][0]->film_baslik;
		$veri["goster"] = "yonetim/yorum_duzenle";
		$this->load->view('yonetim/yonetim',$veri);
		}
		
	}
?>