<?php 
	
	class y_turler extends CI_Model{
		
		function turler(){
			$this->db->order_by('id','desc');
			$turler = $this->db->get('turler');
			return $turler->result();
		}
		
		function t_duzenle($id,$tsef){
		$this->db->where('id',$id);
		$d = $this->db->update('turler',array('tur_baslik' => $this->input->post('tur_baslik'),'tur_sef' => $tsef,'tur_keyw' => $this->input->post('tur_keyw'),'tur_desc' => $this->input->post('tur_desc')));
		if ($d){ return true; }else { return false; }
		}
		
		function t_al($id){
		$this->db->where('id',$id);
		$sorgu = $this->db->get('turler');
		return $sorgu->result();
		}
		
		function t_kullanan($id){
		$this->db->select('film_turleri.*,filmler.film_baslik');
		$this->db->join('filmler','film_turleri.film_id=filmler.id','inner');
		$this->db->where('tur_id',$id);
		$say = $this->db->get('film_turleri');
		$dizi = array($say->result(),$say->num_rows());
		return $dizi;
		}
		
		function tur_ekle($veri){
		$ekle = $this->db->insert('turler',$veri);
		if ($ekle){ return true; }else { return false; }
		}
		
		function tur_sil($id){
		// turlerden sil
		$this->db->where('id',$id);
		$this->db->delete('turler');
		// film turleri sil
		$this->db->where('tur_id',$id);
		$this->db->delete('film_turleri');
		}
	}
	
?>