<?php 
	class mesajlar extends CI_Controller {
		
		function mesajlar(){
		parent::__construct();
		if ($this->session->userdata('oturum') < 1){ redirect('yp_giris'); }
		elseif ($this->session->userdata('rutbe') > 1){
		$this->session->set_flashdata('mesaj','Mesajlara erişmek için yetkiniz yok.!');
		redirect(site_url().'yonetim/panel');
		}	
		$this->load->model('yonetim/y_yorumlar');
		$this->load->model('yonetim/y_mesajlar');
		$veri["onaysiz_yorumlar"] = $this->y_yorumlar->onaysizlar();
		$veri["okunmamis"] = $this->y_mesajlar->okunmamis();
		$this->load->view('yonetim/ust',$veri,true);
		$this->load->model('yonetim/y_mesajlar'); 
		}
		
		function index($sayfa=""){
		$msil = $this->input->post('msil');
		if ($msil){
		for ($i=0; $i < count($msil); $i++){
		$this->y_mesajlar->msil($msil[$i]);
		}
		}
		$limit = 15;
		$veri["fsayi"] = count($this->y_mesajlar->mesajlar());
		$veri["ssayi"] = ceil($veri["fsayi"]/$limit);
		if (!is_numeric($sayfa) || $sayfa == 0 || $sayfa == "" || $sayfa > $veri["ssayi"]){ $sayfa = 1; }
		$veri["sayfa"] = $sayfa;
		$baslangic = ($sayfa*$limit)-$limit;
		$veri["mesajlar"] = $this->y_mesajlar->mesajlar($limit,$baslangic);
		$veri["title"] = "Mesajlar";
		$veri["goster"] = "yonetim/mesajlar";
		$this->load->view('yonetim/yonetim',$veri);
		}
		
		function mo(){
		$mid = $this->uri->segment(4);
		$this->y_mesajlar->okunma($mid);
		$veri["mesaj"] = $this->y_mesajlar->mesaj($mid);
		$veri["title"] = "Mesaj: ".$veri["mesaj"][0]->m_gonderen;
		$veri["goster"] = "yonetim/mesajoku";
		$this->load->view('yonetim/yonetim',$veri);
		}
	}
?>