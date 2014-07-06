<?php 
	class kullanici extends CI_Model{
		
		function k_kontrol(){
		$this->db->select('id,t_isim,t_rutbe');
		$this->db->where('t_isim',trim($this->input->post('isim')));
		$this->db->where('t_sifre',md5(sha1($this->input->post('sifre'))));
		$kontrolet = $this->db->get('takim');
		if ($kontrolet->num_rows() == TRUE){ return $kontrolet->result(); }else { return false; }
		}
		
	}
?>