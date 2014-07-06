<?php 
	class kategoriler extends CI_Model{
		
		public function katCek(){
			$this->db->select('id,tur_baslik,tur_sef');
			$sr = $this->db->get('turler');
			return $sr->result();
		}
		
	}
?>