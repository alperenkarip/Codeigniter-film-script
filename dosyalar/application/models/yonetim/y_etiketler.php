<?php 
	
	class y_etiketler extends CI_Model{
		
		function etiketler($limit,$baslangic){
			$this->db->order_by('e_ustun','desc');
			$this->db->order_by('id','desc');
			$this->db->limit($limit,$baslangic);
			$etiketler = $this->db->get('etiketler');
			return $etiketler->result();
		}
		
		function esayi(){
		$sorgu = $this->db->get('etiketler');
		return $sorgu->num_rows();
		}
		
		function e_duzenle($id,$esef){
		$this->db->where('id',$id);
		$d = $this->db->update('etiketler',array('e_baslik' => $this->input->post('e_baslik'),'e_sef' => $esef));
		if ($d){ return true; }else { return false; }
		}
		
		function e_al($id){
		$this->db->where('id',$id);
		$sorgu = $this->db->get('etiketler');
		return $sorgu->result();
		}
		
		function e_kullanan($id){
		$this->db->select('etiketi.*,filmler.film_baslik');
		$this->db->join('filmler','etiketi.film_id=filmler.id','inner');
		$this->db->where('etiket_id',$id);
		$this->db->limit(15);
		$say = $this->db->get('etiketi');
		$dizi = array($say->result(),$say->num_rows());
		return $dizi;
		}
		
		function etiket_sil($id){
		// etiketlerden sil
		$this->db->where('id',$id);
		$this->db->delete('etiketler');
		// etiketi sil
		$this->db->where('etiket_id',$id);
		$this->db->delete('etiketi');
		}
		
		function eara($kelime,$limit="",$baslangic=""){
		$this->db->like('e_baslik',$kelime);
		if ($limit){
		$this->db->limit($limit,$baslangic);
		}
		$sorgu = $this->db->get('etiketler');
		return $sorgu->result();
		}
		
		function uee($veri){
		$uee = $this->db->insert('etiketler',$veri);
		if ($uee){ return true; }else { return false; }
		}
	}
	
?>