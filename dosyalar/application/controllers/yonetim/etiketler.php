<?php 
	class etiketler extends CI_Controller {
		
		function etiketler(){
		parent::__construct();
		if ($this->session->userdata('oturum') < 1){ redirect('yp_giris'); }
		$this->load->model('yonetim/y_yorumlar');
		$this->load->model('yonetim/y_mesajlar');
		$veri["onaysiz_yorumlar"] = $this->y_yorumlar->onaysizlar();
		$veri["okunmamis"] = $this->y_mesajlar->okunmamis();
		$this->load->view('yonetim/ust',$veri,true);
		$this->load->model('yonetim/y_etiketler');
		}
		
		function index($sayfa=""){
		if ($this->input->post('esil')){
		$e = $this->input->post('esil');
		for ($i=0; $i < count($e); $i++){
		$this->y_etiketler->etiket_sil($e[$i]);
		}
		}
		if ($kelime = $this->input->get('eara')){
		$veri["title"] = "\"".$this->input->get('eara')."\" arama sonuçları";
		$limit = 15;
		$veri["esayi"] = count($this->y_etiketler->eara($kelime));
		$veri["ssayi"] = ceil($veri["esayi"]/$limit);
		if (!is_numeric($sayfa) || $sayfa == 0 || $sayfa == "" || $sayfa > $veri["ssayi"]){ $sayfa = 1; }
		$veri["sayfa"] = $sayfa;
		$baslangic = ($sayfa*$limit)-$limit;
		$veri["etiketler"] = $this->y_etiketler->eara($kelime,$limit,$baslangic);
		if (count($veri["etiketler"]) < 1){
		$this->session->set_flashdata('mesaj',$kelime.' ile ilgili hiç bir sonuç bulunamadı.');
		redirect(site_url().'yonetim/etiketler');
		}
		$veri["goster"] = "yonetim/etiketler";
		}else {
		$veri["title"] = "Etiketler";
		$limit = 15;
		$veri["esayi"] = $this->y_etiketler->esayi();
		$veri["ssayi"] = ceil($veri["esayi"]/$limit);
		if (!is_numeric($sayfa) || $sayfa == 0 || $sayfa == "" || $sayfa > $veri["ssayi"]){ $sayfa = 1; }
		$veri["sayfa"] = $sayfa;
		$baslangic = ($sayfa*$limit)-$limit;
		$veri["etiketler"] = $this->y_etiketler->etiketler($limit,$baslangic);
		$veri["goster"] = "yonetim/etiketler";
		}
		$this->load->view('yonetim/yonetim',$veri);
		}
		
		function ed(){
			$eid = $this->uri->segment(4);
			$this->load->helper('sef');
			$veri["kullanan"] = $this->y_etiketler->e_kullanan($eid);
			if ($this->input->post('eduzenle')){
			$this->form_validation->set_rules('e_baslik','Etiket','required|trim|xss_clean|min_length[1]');
			if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('mesaj',validation_errors());
			redirect(site_url().'yonetim/etiketler');
			}else {
			$sef = $this->input->post('e_baslik');
			$duzenle = $this->y_etiketler->e_duzenle($eid,sef_link($sef));
			if ($duzenle){
			$this->session->set_flashdata('mesaj','Etiket başarıyla düzenlendi.');
			redirect(site_url().'yonetim/etiketler');
			}else {
			$this->session->set_flashdata('mesaj','Bir sorun oluştu etiket düzenlenemedi.');
			redirect(site_url().'yonetim/etiketler');
			}
			}}
			$veri["etiket"] = $this->y_etiketler->e_al($eid);
			$veri["title"] = "Etiket duzenle - ".$veri["etiket"][0]->e_baslik;
			$veri["goster"] = 'yonetim/etiket_duzenle';
			$this->load->view('yonetim/yonetim',$veri);
		}
		
		function uee(){
		$veri["title"] = "Etiket ekle";
		$this->load->helper('sef');
		if ($this->input->post('uee')){
		$this->form_validation->set_rules('e_baslik','Başlık','required|trim|min_length[1]');
		if ($this->form_validation->run() == FALSE){
		$this->session->set_flashdata('mesaj',validation_errors());
		redirect(site_url().'yonetim/etiketler');
		}else {
		$uee = $this->y_etiketler->uee(array('e_baslik' => $this->input->post('e_baslik'),'e_sef' => sef_link($this->input->post('e_baslik')),'e_ustun' => 1));
		if ($uee){
		$this->session->set_flashdata('mesaj','Üstün etiket eklendi');
		redirect(site_url().'yonetim/etiketler');
		}else {
		$this->session->set_flashdata('mesaj','Bir sorun oluştu etiket eklenemedi.');
		redirect(site_url().'yonetim/etiketler');
		}
		}
		}
			$veri["goster"] = 'yonetim/e_ustun';
			$this->load->view('yonetim/yonetim',$veri);
		}
		
	}
?>