<?php 
	class y_reklamlar extends CI_Model {
		
	function reklamlar(){
	$this->db->order_by('id','desc');
	$sorgu = $this->db->get('reklam');
	return $sorgu->result();
	}
	
	function reklam($id){
	$this->db->where('id',$id);
	$sorgu = $this->db->get('reklam');
	return $sorgu->result();
	}
	
	function reklamsol(){
	$sql = "select id,r_kod,r_sure,r_gec,r_gosterim,r_sinir from reklam where r_durum='1' and r_konum='4' order by rand() limit 1 ";
	$sorgu = $this->db->query($sql);
	return $sorgu->result();
	}
	
	function reklamkatalt(){
	$sql = "select id,r_kod,r_sure,r_gec,r_gosterim,r_sinir from reklam where r_durum='1' and r_konum='3' order by rand() limit 1 ";
	$sorgu = $this->db->query($sql);
	return $sorgu->result();
	}
	
	function fizleorta(){
	$sql = "select id,r_kod,r_sure,r_gec,r_gosterim,r_sinir from reklam where r_durum='1' and r_konum='6' order by rand() limit 1 ";
	$sorgu = $this->db->query($sql);
	return $sorgu->result();
	}
	
	function arkareklam(){
	$sql = "select id,r_kod,r_sure,r_gec,r_gosterim,r_sinir from reklam where r_durum='1' and r_konum='7' order by rand() limit 1 ";
	$sorgu = $this->db->query($sql);
	return $sorgu->result();
	}
	
	function reklamsag(){
	$sql = "select id,r_kod,r_sure,r_gec,r_gosterim,r_sinir from reklam where r_durum='1' and r_konum='5' order by rand() limit 1 ";
	$sorgu = $this->db->query($sql);
	return $sorgu->result();
	}
	
	function rorreklam(){
	$sql = "select id,r_kod,r_sure,r_gec,r_gosterim,r_sinir from reklam where r_durum='1' and r_konum='1' order by rand() limit 1 ";
	$sorgu = $this->db->query($sql);
	return $sorgu->result();
	}
	
	function reklam_ust(){
	$sql = "select id,r_kod,r_sure,r_gec,r_gosterim,r_sinir from reklam where r_durum='1' and r_konum='2' order by rand() limit 1 ";
	$sorgu = $this->db->query($sql);
	return $sorgu->result();
	}
	
	function rgs($id){
	$this->db->where('id',$id);
	$this->db->update('reklam',array('r_durum' => 0));
	}
	
	function rgosterim($id){
	$sql = "update reklam set r_gosterim=r_gosterim+1 where id='$id'";
	$this->db->query($sql);
	}
	
	function rd($id,$veri){
	$this->db->where('id',$id);
	$duzenle = $this->db->update('reklam',$veri);
	if ($duzenle){ return true; }else { return false; }
	}
	
	function re($veri){
	$ekle = $this->db->insert('reklam',$veri);
	if ($ekle){ return true; }else { return false; }
	}
	
	function sonid(){
	$this->db->select('id');
	$this->db->limit(1);
	$this->db->order_by('id','desc');
	$sorgu = $this->db->get('reklam');
	$id = $sorgu->result();
	if ($id){ return $id[0]->id; }else { return 0; }
	}
	
	function rsil($id){
	$this->db->where('id',$id);
	$this->db->delete('reklam');
	}
	
	}
?>