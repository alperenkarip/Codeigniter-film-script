<?php 
	class turler extends CI_Controller {
	
		function turler(){
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
		$this->load->model('yonetim/y_turler'); }
		}
		
		function index(){
		$veri["title"] = "Türler";
		if ($this->input->post('tsil')){
		$t = $this->input->post('tsil');
		for ($i=0; $i < count($t); $i++){
		$this->y_turler->tur_sil($t[$i]);
		}}
		$veri["turler"] = $this->y_turler->turler();
		$veri["goster"] = "yonetim/turler";
		$this->load->view('yonetim/yonetim',$veri);
		}
		
		function td(){
			$tid = $this->uri->segment(4);
			$this->load->helper('sef');
			$veri["kullanan"] = $this->y_turler->t_kullanan($tid);
			if ($this->input->post('tduzenle')){
			$this->form_validation->set_rules('tur_baslik','Tür','required|trim|xss_clean|min_length[1]');
			$this->form_validation->set_rules('tur_keyw','Anahtar kelimeler','required|trim|xss_clean|min_length[1]');
			$this->form_validation->set_rules('tur_desc','Açıklama','required|trim|xss_clean|min_length[1]');
			if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('mesaj',validation_errors());
			redirect(site_url().'yonetim/turler');
			}else {
			$sef = $this->input->post('tur_baslik');
			$duzenle = $this->y_turler->t_duzenle($tid,sef_link($sef));
			if ($duzenle){
			$this->session->set_flashdata('mesaj','Tür başarıyla düzenlendi.');
			redirect(site_url().'yonetim/turler');
			}else {
			$this->session->set_flashdata('mesaj','Bir sorun oluştu tür düzenlenemedi.');
			redirect(site_url().'yonetim/turler');
			}
			}}
			$veri["tur"] = $this->y_turler->t_al($tid);
			$veri["title"] = "Tür düzenle - ".$veri["tur"][0]->tur_baslik;
			$veri["goster"] = 'yonetim/tur_duzenle';
			$this->load->view('yonetim/yonetim',$veri);
		}
		
		function te(){
		$veri["title"] = "Tür ekle";
		if ($this->input->post('tekle')){
		$this->form_validation->set_rules('tur_baslik','Tür','required|trim|xss_clean|min_length[1]');
		if ($this->form_validation->run() == FALSE){
		$this->session->set_flashdata('mesaj',validation_errors());
		redirect(site_url().'yonetim/turler');
		}else {
		$this->load->helper('sef');
		$tekle = $this->y_turler->tur_ekle(array('tur_baslik' => $this->input->post('tur_baslik'),'tur_sef' => sef_link($this->input->post('tur_baslik')),'tur_keyw' => $this->input->post('tur_keyw'),'tur_desc' => $this->input->post('tur_desc')));
		if ($tekle){
		$this->session->set_flashdata('mesaj','Tür başarıyla eklendi');
		redirect(site_url().'yonetim/turler');
		}else {
		$this->session->set_flashdata('mesaj','Bir sorun oluştu tür eklenemedi.');
		redirect(site_url().'yonetim/turler');
		}
		}
		}
		$veri["goster"] = "yonetim/tur_ekle";
		$this->load->view('yonetim/yonetim',$veri);
		}
		
	}
	
?>