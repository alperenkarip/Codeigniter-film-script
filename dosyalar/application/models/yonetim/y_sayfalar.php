<?php 
	class y_sayfalar extends CI_Model {
		
		function sayfalar(){
			$this->db->select('id,s_baslik,s_sef,s_keyw,s_desc');
			$this->db->order_by('id','desc');
			$sorgu = $this->db->get('sayfalar');
			return $sorgu->result();
		}
		
		function sayfa($id,$sef=""){
		$this->db->where('id',$id);
		$sorgu = $this->db->get('sayfalar');
		return $sorgu->result();
		}
		
		function sd($id,$sef){
		$this->db->where('id',$id);
		$duzenle = $this->db->update('sayfalar',array('s_baslik' => $this->input->post('s_baslik'),'s_sef' => $sef,'s_icerik' => $this->input->post('s_icerik'),'s_keyw' => $this->input->post('s_keyw'),'s_desc' => $this->input->post('s_desc')));
		if ($duzenle){ return true; }else { return false; }
		}
		
		function se($sef){
		$ekle = $this->db->insert('sayfalar',array('s_baslik' => $this->input->post('s_baslik'),'s_sef' => $sef,'s_icerik' => $this->input->post('s_icerik'),'s_keyw' => $this->input->post('s_keyw'),'s_desc' => $this->input->post('s_desc')));
		if ($ekle){ return true; }else { return false; }
		}
		
		function ssil($id){
		$this->db->where('id',$id);
		$this->db->delete('sayfalar');
		}
		}
?>