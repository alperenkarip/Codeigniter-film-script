<?php 
	class y_anketler extends CI_Model {
	
	function anketler($limit="",$baslangic=""){
	$this->db->limit($limit,$baslangic);
	$sorgu = $this->db->get('anket');
	return $sorgu->result();
	}
	
	function asayi(){
	return $this->db->count_all('anket');
	}
	
	function anket_ekle($veri){
	$this->db->insert('anket',array('anket_baslik' => $this->input->post('a_baslik'),'anket_durum' => $this->input->post('durum')));
	$id = mysql_insert_id();
	foreach ($veri as $v){
	$this->db->insert('anket_soru',array('anket_soru' => $v,'anket_oy' => 0,'anket_id' => $id));
	}
	}
	
	function anket_guncelle($id){
	$baslik = $this->input->post('baslik');
	$sql = "update anket_soru set anket_soru='$baslik' where id='$id'";
	$guncelle = $this->db->query($sql);
	if ($guncelle){return true;}else {return false;}
	}

	function anket_soru_sil($id){
	$this->db->where('id',$id);
	$this->db->delete('anket_soru');
	}
	
	function anket_soru_ekle(){
	$this->db->insert('anket_soru',array('anket_soru' => $this->input->post('anket_baslik'),'anket_id' => $this->input->post('aid')));
	}
	
	function ag($id){
	$this->db->where('id',$id);
	$guncelle = $this->db->update('anket',array('anket_baslik' => $this->input->post('a_baslik'),'anket_durum' => $this->input->post('durum')));
	if ($guncelle){return true;}else {return false;}
	}
	
	function anket_al($id){
	$this->db->where('id',$id);
	$sorgu = $this->db->get('anket');
	return $sorgu->result();
	}
	
	function anket_siklar($id){
	$this->db->select('anket_soru,id,anket_oy');
	$this->db->where('anket_id',$id);
	$sorgu = $this->db->get('anket_soru');
	return $sorgu->result();
	}
	
	function anket_sil($id){
	$this->db->where('id',$id);
	$this->db->delete('anket');
	$this->db->where('anket_id',$id);
	$this->db->delete('anket_soru');
	}
	
	}
?>