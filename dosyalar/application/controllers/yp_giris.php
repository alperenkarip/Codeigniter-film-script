<?php 
	class yp_giris extends CI_Controller {

	function index(){
	$this->load->view('yonetim/yp_giris');	
	}
	function k_kontrol(){
	$this->load->helper('security');
	
	$this->form_validation->set_rules('isim',"Kullanıcı adı",'trim|required|xss_clean');
	$this->form_validation->set_rules('sifre',"Şifre",'trim|required|xss_clean');
	
	if ($this->form_validation->run() == FALSE){ $this->session->set_flashdata('hata',validation_errors()); redirect('yp_giris'); }
	else {	
	$this->load->model('yonetim/kullanici');
	$kontrolet = $this->kullanici->k_kontrol();
	if ($kontrolet){
	$veri = array('kid' => $kontrolet[0]->id,'kadi' => $this->input->post('isim'),'rutbe' => $kontrolet[0]->t_rutbe,'oturum' => true);
	$this->session->set_userdata($veri);
	redirect('yonetim/panel','refresh');
	}else { $this->session->set_flashdata('hata','Kullanıcı adı yada şifre hatalı.!'); 	redirect('yp_giris'); 	}
	}}
	
	}
?>