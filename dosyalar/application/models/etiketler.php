<?php 
	class etiketler extends CI_Model {
	
	public function etiketler(){
	$sorgu = $this->db->get('etiketler');
	return $sorgu->result();
	}
	
	public function etiketleri($id){
	$this->db->select('etiketler.e_baslik');
	$this->db->join('etiketler','etiketi.etiket_id=etiketler.id','inner');
	$this->db->where("etiketi.film_id",$id);
	$sorgu = $this->db->get('etiketi');
	return $sorgu->result();
	}
	
	public function etiket_kontrol($veri,$baslangic,$limit){
	$tarih = date('Y-m-d H:i:00');
	$sql = "select * from etiketler inner join etiketi on etiketi.etiket_id=etiketler.id inner join filmler on etiketi.film_id=filmler.id where filmler.film_zaman < '$tarih' and etiketler.e_sef=? group by etiketi.film_id order by filmler.film_zaman desc limit $baslangic,$limit";
	$sorgu = $this->db->query($sql,array($veri));
	foreach ($sorgu->result_array() as $flm){
	$film['filmler'][] = $flm;
	$f_id = $flm["id"];
	$this->db->select('id');
	$this->db->where('film_id',$f_id);
	$ysorgu = $this->db->get('yorumlar');
	$film["yorums"][] = $ysorgu->num_rows();
	$this->db->select('turler.tur_baslik,turler.tur_sef');
	$this->db->join('turler','film_turleri.tur_id=turler.id','inner');
	$this->db->where('film_turleri.film_id',$f_id);
	$f_sorgu = $this->db->get('film_turleri');
	$film['turleri'][] = $f_sorgu->result();
	$this->db->where('p_filmid',$f_id);
	// $this->db->group_by('p_filmid');
	$sorgu = $this->db->get('puanlar');
	$i = 0; $z = 0; $x = 0;
	$p = $sorgu->result_array();
	$dizi = $p;
	$dizi["psayi"] = count(@$dizi);
	$this->db->where('p_filmid',$f_id);
	$this->db->where('p_puan',1);
	$this->db->from('puanlar');
	$dizi["pcg"] = $this->db->count_all_results();
	$this->db->where('p_filmid',$f_id);
	$this->db->where('p_puan',2);
	$this->db->from('puanlar');
	$dizi["pie"] = $this->db->count_all_results();
	$this->db->where('p_filmid',$f_id);
	$this->db->where('p_puan',3);
	$this->db->from('puanlar');
	$dizi["pbb"] = $this->db->count_all_results();
	$film["puanlari"][] = $dizi;
	}
	return @$film;
	}
	
	function etsayi($et){
	$this->db->select('id');
	$this->db->where('e_sef',$et);
	$sorgu = $this->db->get('etiketler');
	$etsayi = "";
	foreach ($sorgu->result_array() as $et){
	$this->db->where('etiket_id',$et["id"]);
	$sorgu = $this->db->get('etiketi');
	$etsayi = $sorgu->num_rows();
	}
	return $etsayi;
	}
	
	public function ustun_etiketler(){
	$this->db->where('e_ustun',1);
	$sorgu = $this->db->get('etiketler');
	return $sorgu->result();
	}
	
	}
?>