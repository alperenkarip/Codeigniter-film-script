<?php 
	class anasayfa extends CI_Controller {
		
		function anasayfa(){
		parent::__Construct();
		$this->load->model('filmler');
		$this->load->model('kategoriler');
		$this->load->model('sistem');
		}
		
		function index($sayfa=""){
		$sistem = $this->sistem->sistem();
		$veri["title"] = $sistem[0]->site_baslik;
		$veri["turler"] = $this->kategoriler->katCek();
		$this->load->view('mobil/ust',$veri);
		$veri["icerik"] = "mobil/filmler";
		$toplam = $this->filmler->filmsayi();
		$limit = 10;
		$ssayi = ceil($toplam/$limit);
		if ($sayfa == 0 || empty($sayfa) || !is_numeric($sayfa) || $sayfa > $ssayi){$sayfa=1;}
		$veri["ssayi"] = $ssayi;
		$sayfa = $sayfa-1;
		$veri["sayfa"] = $sayfa;
		$veri["fonk"] = 'index';
		$sayfa = $sayfa*$limit;
		$veri["filmler"] = $this->filmler->filmleri_cek('',$limit,$sayfa);
		$this->load->view('mobil/icerik',$veri);
		$this->load->view('mobil/alt');
		}
		
		function kategori($tur=""){
		$limit = 10;
		$toplam = $this->filmler->tursayi($tur);
		$sayfa = $this->uri->segment(5);
		$kategori = $this->uri->segment(4);
		$veri["kategori"] = $kategori;
		$ssayi = ceil($toplam/$limit);
		if ($sayfa == 0 || empty($sayfa) || !is_numeric($sayfa) || $sayfa > $ssayi){$sayfa=1;}
		$veri["ssayi"] = $ssayi;
		$sayfa = $sayfa-1;
		$veri["sayfa"] = $sayfa;
		$veri["fonk"] = 'kategori';
		$sayfa = $sayfa*$limit;
		$veri["icerik"] = "mobil/filmler";
		$veri["filmler"] = $this->filmler->film_cek_tur($tur,$limit,$sayfa);
		$data["title"] = $veri["filmler"]["filmler"][0]["tur_baslik"]." Filmleri";
		$data["turler"] = $this->kategoriler->katCek();
		$this->load->view('mobil/ust',$data);
		$this->load->view('mobil/icerik',$veri);
		$this->load->view('mobil/alt');
		}
		
		function izle($film){
		$veri["film"] = $this->filmler->filmi_cek($film);
		$data["title"] = $veri["film"][0]->film_baslik;
		$data["turler"] = $this->kategoriler->katCek();
		$this->load->view('mobil/ust',$data);
		$veri["icerik"] = "mobil/izle";
		$veri["parca"] = $this->uri->segment(6);
		$fid = @$veri["film"][0]->film_id;
		$veri["partlar"] = $this->filmler->film_part($fid);
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
		$this->load->view('mobil/icerik',$veri);
		$this->load->view('mobil/alt');
		}
	
	}
?>