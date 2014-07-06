<?php 
	class y_partlar extends CI_Model{
		
		function partlar($limit="",$baslangic=""){
			$this->db->select('partlar.*,filmler.film_baslik');
			$this->db->join('filmler','partlar.film_id=filmler.id','inner');
			$this->db->order_by('partlar.id','desc');
			if ($limit){
			$this->db->limit($limit,$baslangic);
			}
			$sorgu = $this->db->get('partlar');
			return $sorgu->result();
		}
		
		function part_sil($id){
		$this->db->where('id',$id);
		$this->db->delete('partlar');
		}
		
	}
?>