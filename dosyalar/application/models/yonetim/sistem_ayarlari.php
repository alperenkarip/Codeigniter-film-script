<?php 
	class sistem_ayarlari extends CI_Model {
		
		function sistem($veri){
		$this->db->update('sistem',$veri);
		}
		
	}
?>