<?php 
	class y_takim extends CI_Model {
		
		function takim(){
			$this->db->order_by('t_rutbe','asc');
			$sorgu = $this->db->get('takim');
			return $sorgu->result();
		}
		
		function kull($id){
		$this->db->where('id',$id);
		$sorgu = $this->db->get('takim');
		return $sorgu->result();
		}
		
		function kd($id,$veri){
		$this->db->where('id',$id);
		$duzenle = $this->db->update('takim',$veri);
		if ($duzenle){ return true; }else { return false; }
		}
		
		function yekle(){
		$ekle = $this->db->insert('takim',array('t_isim' => $this->input->post('t_isim'),'t_sifre' => md5(sha1($this->input->post('t_sifre'))),'t_rutbe' => $this->input->post('t_rutbe'),'t_mail' => $this->input->post('t_mail')));
		if ($ekle){ return true; }else { return false; }
		}
		
		function ksil($id){
		$this->db->where('id',$id);
		$this->db->delete('takim');
		}
	}
?>