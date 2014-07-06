<?php 
	class y_filmler extends CI_Model {
		
		function filmleri_al($limit="",$baslangic=""){
		$this->db->select('id,film_baslik,film_eklenme_tarihi,film_sgt,film_ekleyen,film_zaman');
		$this->db->order_by('id','desc');
		$this->db->limit($limit,$baslangic);
		$islem = $this->db->get('filmler');
		return $islem->result();
		}
		
		function fsayi(){
		$sorgu = $this->db->get('filmler');
		return $sorgu->num_rows();
		}
		
		function filmi_al($id){
		$this->db->where('id',$id);
		$sorgu = $this->db->get('filmler');
		if ($sorgu->num_rows() == 1){ 
		return $sorgu->result();
		}else { return false; }
		}
		
		function film_ekle($veri){
		$fsef = $veri[0]['film_sef'];
		$this->db->where('film_sef',$fsef);
		$say = $this->db->get('filmler');

		$fekle = $this->db->insert('filmler',$veri[0]);
		$fid = mysql_insert_id();
		if ($say->num_rows() > 0){
		$filmsefi = $veri[0]["film_sef"]."-".$fid;
		$sql = "update filmler set film_sef=\"$filmsefi\" where id=\"$fid\"";
		$this->db->query($sql);
		}
		for ($i=0; $i < count($veri[1]); $i++){
		$turid = $veri[1][$i];
		$tekle = $this->db->insert('film_turleri',array('tur_id' => $turid,'film_id' => $fid));
		}
		if ($fekle && $tekle){
		return $fid;
		}else {
		echo mysql_error();
		}
		}
		
		function bot_fekle($veri){
		$fsef = $veri['film_sef'];
		$this->db->where('film_sef',$fsef);
		$sg = $this->db->get('filmler');
		if ($sg->num_rows() > 0){
		return false;
		}else {
		$this->db->where('film_sef',$fsef);
		$say = $this->db->get('filmler');
		$fekle = $this->db->insert('filmler',$veri);
		$fid = mysql_insert_id();
		if ($say->num_rows() > 0){
		$filmsefi = $veri["film_sef"]."-".$fid;
		$sql = "update filmler set film_sef=\"$filmsefi\" where id=\"$fid\"";
		$this->db->query($sql);
		}
		if ($fekle){
		return $fid;
		}}
		}
		
		function bot_tkontrol($sef){
		$this->db->select('id');
		$this->db->where('tur_sef',$sef);
		$this->db->limit(1);
		$sorgu = $this->db->get('turler');
		if ($sorgu->num_rows() > 0){
		return $sorgu->result();
		}else {
		return false;
		}
		}
		
		function bot_turekle($tid,$fid,$v=""){
		if (!$v){
		$this->db->insert('film_turleri',array('tur_id' => $tid,'film_id' => $fid));
		}else {
		$this->db->select('id');
		$this->db->limit(1);
		$t = $this->db->get('turler');
		$y = $t->result();
		$this->db->insert('film_turleri',array('tur_id' => $y[0]->id,'film_id' => $v));
		}
		}
		
		function film_sil($id){
		// filmi sil
		$this->db->where('id',$id);
		$this->db->delete('filmler');
		// etiket sil
		$this->db->where('film_id',$id);
		$this->db->delete('etiketi');
		// partları sil
		$this->db->where('film_id',$id);
		$this->db->delete('partlar');
		// türleri sil
		$this->db->where('film_id',$id);
		$this->db->delete('film_turleri');
		}
		
		function fr_al($id){
		$this->db->select('film_resim');
		$this->db->where('id',$id);
		$sr = $this->db->get('filmler');
		return $sr->result();
		}
		
		function filmi_duzenle($id,$post){
		$this->db->where('id',$id);
		$guncelle = $this->db->update('filmler',$post);
		if ($guncelle){ return true; }else { return false; }
		}
		
		function turler(){
		$this->db->order_by('id','asc');
		$sorgu = $this->db->get('turler');
		return $sorgu->result();
		}
		
		function f_turleri($id){
		$this->db->select('tur_id');
		$this->db->where('film_id',$id);
		$this->db->order_by('tur_id','asc');
		$sorgu = $this->db->get('film_turleri');
		return $sorgu->result();
		}
		
		function f_tur_ekle(){
		$ekle = $this->db->insert('film_turleri',array('tur_id' => $this->input->post('tur_id'),'film_id' => $this->input->post('film_id')));
		}
		
		function f_tur_sil(){
		$this->db->where('tur_id',$this->input->post('tur_id'));
		$this->db->where('film_id',$this->input->post('film_id'));
		$this->db->delete('film_turleri');
		}
		
		function frekle($id,$resim){
		$this->db->where('id',$id);
		$this->db->update('filmler',array('film_resim' => $resim));
		}
		
		function f_et_ekle($veri,$esef){
		$this->db->where('e_sef',$esef);
		$sorgu = $this->db->get('etiketler');
		if ($sorgu->num_rows() > 0){
		$idal = $sorgu->result();
		$fid = $veri['fid'];
		return array(false,$idal[0]->id,$fid);
		}else {
		$this->db->insert('etiketler',array('e_baslik' => $veri['e_baslik'],'e_sef' => $esef));
		$e_id = mysql_insert_id();
		$this->db->insert('etiketi',array('etiket_id' => $e_id,'film_id' => $veri['fid']));
		return array(true,'');
		}
		}
		
		function f_et_eklee($idsi,$fid){
		$sql = "select film_id from etiketi where etiket_id=? and film_id=?";
		$ar = $this->db->query($sql,array($idsi,$fid));
		if ($ar->num_rows() == FALSE){
		$this->db->insert('etiketi',array('etiket_id' => $idsi,'film_id' => $fid));		
		}
		}
		
		function etiketleri_al($fid){
		$this->db->join('etiketler','etiketi.etiket_id=etiketler.id');
		$this->db->order_by('etiketi.id','desc');
		$this->db->where('etiketi.film_id',$fid);
		$sorgu = $this->db->get('etiketi');
		return $sorgu->result();
		}
		
		function e_sil(){
		$this->db->where('film_id',$this->input->post('fid'));
		$this->db->where('etiket_id',$this->input->post('eid'));
		$sil = $this->db->delete('etiketi');
		if ($sil){ return true; }else { return false; }
		}
		
		function film_partlari($id){
		$this->db->where('film_id',$id);
		$this->db->order_by('p_sira','asc');
		$sorgu = $this->db->get('partlar');
		return $sorgu->result();
		}
		
		function film_part_b_guncelle(){
		$this->db->where('p_sira',$this->input->post('sira'));
		$this->db->where('film_id',$this->input->post('fid'));
		$guncelle = $this->db->update('partlar',array('p_baslik' => $this->input->post('baslik')));
		if ($guncelle){ return true; }else { return false; }
		}
	
		function film_part_k_guncelle(){
		$this->db->where('p_sira',$this->input->post('sira'));
		$this->db->where('film_id',$this->input->post('fid'));
		$guncelle = $this->db->update('partlar',array('p_kod' => htmlspecialchars_decode($this->input->post('part_kod'))));
		if ($guncelle){ return true; }else { return false; }
		}
		
		function fp_ekle($veri){
		$pekle = $this->db->insert('partlar',$veri);
		if ($pekle){ return true; }else { return false; }
		}
		
		function fp_sil(){
		$this->db->where('p_sira',$this->input->post('p_sira'));
		$this->db->where('film_id',$this->input->post('fid'));
		$sil = $this->db->delete('partlar');
		if ($sil){ return true; }else {return false;}
		}
		
		function fpsg($veri){
		$sayi = $this->input->post('p_sayi');
		$s=1;
		for ($i=0; $i < $sayi-1; $i++){
		$z = $s++;
		$id = $veri[$i]->id;
		$sql = "update partlar set p_sira=$z where id=$id";
		$this->db->query($sql);
		}
		}
		
		function p_asagi(){
		$sayi = $this->input->post('psayi');
		$sira = $this->input->post('p_sira');
		$fid = $this->input->post('fid');
		$sql = "update partlar set p_sira=p_sira+1 where p_sira=? and film_id=? and p_sira > 0 and p_sira < ?";
		$art = $this->db->query($sql,array($sira,$fid,$sayi+1));
		if ($art){ return true; }else { return false; }
		}
		
		function p_asagi_s(){
		$sayi = $this->input->post('psayi');
		$fid = $this->input->post('fid');
		$pid = $this->input->post('pasagi');
		$sql = "update partlar set p_sira=p_sira-1 where id=? and film_id=? and p_sira > 0 and p_sira < ?";
		$art = $this->db->query($sql,array($pid,$fid,$sayi+1));
		if ($art){ return true; }else {return false;}
		}
		
		function p_yukari(){
		$sayi = $this->input->post('psayi');
		$sira = $this->input->post('p_sira');
		$fid = $this->input->post('fid');
		$sql = "update partlar set p_sira=p_sira-1 where p_sira=? and film_id=? and p_sira > 0 and p_sira < ?";
		$art = $this->db->query($sql,array($sira,$fid,$sayi+1));
		if ($art){ return true; }else { return false; }
		}
		
		function p_yukari_o(){
		$sayi = $this->input->post('psayi');
		$fid = $this->input->post('fid');
		$pid = $this->input->post('pyukari');
		$sql = "update partlar set p_sira=p_sira+1 where id=? and film_id=? and p_sira > 0 and p_sira < ?";
		$art = $this->db->query($sql,array($pid,$fid,$sayi+1));
		if ($art){ return true; }else {return false;}
		}
		
		function fara($kelime,$limit="",$baslangic=""){
		$this->db->select('id,film_baslik,film_eklenme_tarihi,film_sgt,film_zaman,film_ekleyen');
		$this->db->like('film_baslik',$kelime);
		if ($limit){
		$this->db->limit($limit,$baslangic);
		}
		$sorgu = $this->db->get('filmler');
		return $sorgu->result();
		}
	}
?>