<?php 
	class panel extends CI_Controller{
		
		function panel(){
		parent::__construct();
		// session_start();
		$this->load->model('yonetim/y_yorumlar');
		$this->load->model('yonetim/y_mesajlar');
		$veri["onaysiz_yorumlar"] = $this->y_yorumlar->onaysizlar();
		$veri["okunmamis"] = $this->y_mesajlar->okunmamis();
		$this->load->view('yonetim/ust',$veri,true);
		if ($this->session->userdata('oturum') < 1){ redirect('yp_giris'); }
		}
		
		function index(){
		$veri["title"] = "Panel";
		$veri["goster"] = "yonetim/anasayfa";
		$this->load->view('yonetim/yonetim',$veri);
		}
		
		function sistem_ayarlari(){
		$veri["title"] = "Genel ayarlar";
		if ($this->session->userdata('rutbe') > 1){
		$this->session->set_flashdata('mesaj','Sistem ayarlarına erişmek için yetkiniz yok.!');
		redirect(site_url().'yonetim/panel');
		}else {
		$veri["deger"] = $this->sistem->sistem();
		$arkaplan = $veri["deger"][0]->site_arkaplan;
		$veri["goster"] = "yonetim/sistem_ayarlari";
		$this->form_validation->set_rules('site_baslik','Site başlık','trim|required|min_length[5]');
		$this->form_validation->set_rules('site_key','Anahtar kelimeler','trim|required|min_length[5]');
		$this->form_validation->set_rules('site_desc','Site açıklama','trim|required|min_length[5]');
		$this->form_validation->set_rules('site_film_sayi','Görünecek film sayısı','trim|required|min_length[1]');

		if ($this->form_validation->run() == FALSE){ echo validation_errors(); }else {
		$this->load->model('yonetim/sistem_ayarlari');
		if ($_FILES["site_arka"]["name"]){
		if ($_FILES["site_arka"]["type"] != 'image/jpeg' AND $_FILES["site_arka"]["type"] != 'image/png' AND $_FILES["site_arka"]["type"] != 'image/gif'){
		$this->session->set_flashdata('mesaj','Sadece PNG,JPG ve GİF uzantılı dosyalar geçerlidir.'); 
		redirect(site_url().'yonetim/panel/sistem_ayarlari');
		}else {
		$isim = $_FILES["site_arka"]["name"];
		$type = substr($isim,-4,4);
		copy($_FILES["site_arka"]['tmp_name'],'tema/site_arka'.$type);
		$arkaplan = base_url().'tema/site_arka'.$type;
		$this->sistem_ayarlari->sistem(array('site_baslik' => $this->input->post('site_baslik'),'site_key' => $this->input->post('site_key'),'site_desc' => $this->input->post('site_desc'),'site_yorum' => $this->input->post('site_yorum'),'site_yorum_onay' => $this->input->post('s_y_onay'),'site_facebook' => $this->input->post('site_facebook'),'site_twitter' => $this->input->post('site_twitter'),'site_eposta' => $this->input->post('site_eposta'),'site_arkaplan' => $arkaplan,'site_duzen' => $this->input->post('site_duzen'),'site_film_sayi' => $this->input->post('site_film_sayi'),'site_arka_t' => $this->input->post('site_arka_t'),'site_cache' => $this->input->post('site_cache'),'site_cache_sure' => $this->input->post('site_cache_sure'),'site_alt' => $this->input->post('site_alt')));
		$this->session->set_flashdata('mesaj','Sistem ayarları güncellendi.');
		redirect('yonetim/panel/sistem_ayarlari','location');
		}
		}else {
		$this->sistem_ayarlari->sistem(array('site_baslik' => $this->input->post('site_baslik'),'site_key' => $this->input->post('site_key'),'site_desc' => $this->input->post('site_desc'),'site_yorum' => $this->input->post('site_yorum'),'site_yorum_onay' => $this->input->post('s_y_onay'),'site_facebook' => $this->input->post('site_facebook'),'site_twitter' => $this->input->post('site_twitter'),'site_eposta' => $this->input->post('site_eposta'),'site_duzen' => $this->input->post('site_duzen'),'site_film_sayi' => $this->input->post('site_film_sayi'),'site_arka_t' => $this->input->post('site_arka_t'),'site_cache' => $this->input->post('site_cache'),'site_cache_sure' => $this->input->post('site_cache_sure'),'site_alt' => $this->input->post('site_alt')));
		$this->session->set_flashdata('mesaj','Sistem ayarları güncellendi.');
		redirect('yonetim/panel/sistem_ayarlari','location');
		}}
		$this->load->view('yonetim/yonetim',$veri);
		}
		}
		
		function cikis(){
			$this->session->unset_userdata('oturum');
			$this->session->unset_userdata('kadi');
			$this->session->unset_userdata('kid');
			$this->session->unset_userdata('rutbe');
			$this->session->set_flashdata('hata','Başarıyla çıkış yaptınız.');
			redirect('yp_giris');
		}
	}
?>