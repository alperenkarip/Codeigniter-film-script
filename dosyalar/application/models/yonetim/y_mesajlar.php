<?php 
	class y_mesajlar extends CI_Model {
		
		function mesajlar($limit="",$baslangic=""){
		$this->db->order_by('m_durum','asc');
		if ($limit){
		$this->db->limit($limit,$baslangic);
		}
		$sorgu = $this->db->get('mesajlar');
		return $sorgu->result();
		}
		
		function mesaj($id){
		$this->db->where('id',$id);
		$sorgu = $this->db->get('mesajlar');
		return $sorgu->result();
		}
		
		function okunmamis(){
		$this->db->where('m_durum',0);
		$sorgu = $this->db->get('mesajlar');
		return $sorgu->num_rows();
		}
		
		function msil($id){
		$this->db->where('id',$id);
		$this->db->delete('mesajlar');
		}
		
		function okunma($id){
		$this->db->where('id',$id);
		$this->db->update('mesajlar',array('m_durum' => 1));
		}
		
		function mesajgonder(){
		$ekle = $this->db->insert('mesajlar',array('m_gonderen' => $this->input->post('m_gonderen'),'m_mail' => $this->input->post('m_mail'),'m_mesaj' => $this->input->post('m_mesaj'),'m_durum' => 0,'m_tarih' => date('y.m.d h.i.s')));
		if ($ekle){ return true; } else { return false; }
		}
		
	}
?>