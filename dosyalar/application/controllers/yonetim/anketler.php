<?php 
	class anketler extends CI_Controller{
	
		function anketler(){
		parent::__construct();
		if ($this->session->userdata('oturum') < 1){ redirect('yp_giris'); }
		elseif ($this->session->userdata('rutbe') > 1){
		$this->session->set_flashdata('mesaj','Anket ayarlarına erişmek için yetkiniz yok.!');
		redirect(site_url().'yonetim/panel');
		}else {	
		$this->load->model('yonetim/y_yorumlar');
		$this->load->model('yonetim/y_mesajlar');
		$veri["onaysiz_yorumlar"] = $this->y_yorumlar->onaysizlar();
		$veri["okunmamis"] = $this->y_mesajlar->okunmamis();
		$this->load->view('yonetim/ust',$veri,true);
		$this->load->model('yonetim/y_anketler'); }
		}
	
		function index($sayfa=""){
		if ($this->input->post('asil')){
		$a = $this->input->post('asil');
		for ($i=0; $i < count($a); $i++){
		$this->y_anketler->anket_sil($a[$i]);
		}
		}
		$veri["title"] = "Anketler";
		$limit = 15;
		$veri["asayi"] = $this->y_anketler->asayi();
		$veri["ssayi"] = ceil($veri["asayi"]/$limit);
		if (!is_numeric($sayfa) || $sayfa == 0 || $sayfa == "" || $sayfa > $veri["ssayi"]){ $sayfa = 1; }
		$veri["sayfa"] = $sayfa;
		$baslangic = ($sayfa*$limit)-$limit;
		$veri["anketler"] = $this->y_anketler->anketler($limit,$baslangic);
		$veri["goster"] = "yonetim/anketler";
		$this->load->view('yonetim/yonetim',$veri);
		}
		
		function ae(){
		$veri["title"] = "Anket ekle";
		if ($this->input->post('aekle')){
		$baslik = $this->input->post('a_baslik');
		$siklar = $this->input->post('p_baslik');
		$durum = $this->input->post('durum');
		$this->y_anketler->anket_ekle($siklar);
		}
		$veri["goster"] = "yonetim/anket_ekle";
		$this->load->view('yonetim/yonetim',$veri);
		}
		
		function ad(){
		$veri["title"] = "Anket düzenle";
		$veri["anket"] = $this->y_anketler->anket_al($this->uri->segment(4));
		$veri["siklar"] = $this->y_anketler->anket_siklar($veri["anket"][0]->id);
		if ($this->input->post('baslik')){
		$this->y_anketler->anket_guncelle($this->input->post('sid'));
		}else if($this->input->post('soru_sil')){
		$this->y_anketler->anket_soru_sil($this->input->post('sid'));
		$veri["siklar"] = $this->y_anketler->anket_siklar($veri["anket"][0]->id);
		$this->load->view('yonetim/anket_siklar',$veri);
		}elseif ($this->input->post('anketekle')){
		$this->y_anketler->anket_soru_ekle();
		$veri["siklar"] = $this->y_anketler->anket_siklar($veri["anket"][0]->id);
		$this->load->view('yonetim/anket_siklar',$veri);
		}elseif($this->input->post('anket_guncelle')){
		$guncelle = $this->y_anketler->ag($this->uri->segment(4));
			if ($guncelle){ $this->session->set_flashdata('mesaj','Anket başarıyla güncellendi.'); 
			redirect(site_url().'yonetim/anketler');
			}
			else { $this->session->set_flashdata('mesaj','Bir sorun oluştu anket güncellenemedi.'); redirect(site_url().'yonetim/anketler'); }
		}else {
		$veri["goster"] = "yonetim/anket_duzenle";
		$this->load->view('yonetim/yonetim',$veri);
		}}
	
	}
?>