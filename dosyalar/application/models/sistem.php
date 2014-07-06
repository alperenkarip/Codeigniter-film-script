<?php 
	class sistem extends CI_Model {
		public function sistem(){
			$sorgu = $this->db->get('sistem');
			return $sorgu->result();
		}
	}
?>