<?php 
	class y_yorumlar extends CI_Model {
	
		function yorumlar($limit="",$baslangic=""){
		$this->db->select('yorumlar.*,filmler.film_baslik');
		$this->db->join('filmler','yorumlar.film_id=filmler.id','inner');
		$this->db->order_by('yorumlar.id','desc');
		if ($limit){
		$this->db->limit($limit,$baslangic);
		}
		$s = $this->db->get('yorumlar');
		return $s->result();
		}
		
		function onaysizlar(){
		$this->db->where('y_onay',0);
		$sorgu = $this->db->get('yorumlar');
		return $sorgu->num_rows();
		}
		
		function yorum($id){
		$this->db->select('yorumlar.*,filmler.film_baslik');
		$this->db->join('filmler','yorumlar.film_id=filmler.id','inner');
		$this->db->where('yorumlar.id',$id);
		$sorgu = $this->db->get('yorumlar');
		return $sorgu->result();
		}
		
		function yd($id){
		$this->db->where('id',$id);
		$duzenle = $this->db->update('yorumlar',array('y_yorum' => $this->input->post('y_yorum'),'y_onay' => $this->input->post('y_onay'),'y_sgt' => date('y.m.d m.i.s')));
		if ($duzenle){ return true; }else { return false; }
		}
		
		function yorum_sil($id){
		$this->db->where('id',$id);
		$this->db->delete('yorumlar');
		}
	}
?>