<?php 
	
	class partlar extends CI_Controller{
		
		function partlar(){
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
		$this->load->model('yonetim/y_partlar'); }
		}
		
		function index($sayfa=""){
		$veri["title"] = "Partlar";
		if ($this->input->post('psil')){
		$sil = $this->input->post('psil');
		$say = count($sil);
		for ($i=0; $i < $say; $i++){
		$this->y_partlar->part_sil($sil[$i]);
		}		
		}
		$limit = 15;
		$veri["fsayi"] = count($this->y_partlar->partlar());
		$veri["ssayi"] = ceil($veri["fsayi"]/$limit);
		if (!is_numeric($sayfa) || $sayfa == 0 || $sayfa == "" || $sayfa > $veri["ssayi"]){ $sayfa = 1; }
		$veri["sayfa"] = $sayfa;
		$baslangic = ($sayfa*$limit)-$limit;
		$veri["partlar"] = $this->y_partlar->partlar($limit,$baslangic);
		$veri["goster"] = "yonetim/partlar";
		$this->load->view('yonetim/yonetim',$veri);
		}
		
	}
	
	
?>