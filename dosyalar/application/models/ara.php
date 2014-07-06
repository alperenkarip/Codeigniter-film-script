<?php 
	class ara extends CI_Model {
		
	function arama($kelime,$limit="",$baslangic=""){
	$tarih = date('Y-m-d H:i:00');
	if ($limit){ $sinir = " limit $baslangic,$limit"; }else { $sinir = ""; }
	$sql = "select filmler.*,.etiketler.id from etiketler inner join etiketi on etiketler.id=etiketi.etiket_id right join filmler on etiketi.film_id=filmler.id where filmler.film_zaman < '$tarih' and (etiketler.e_baslik like '%$kelime%' or filmler.film_baslik like '%$kelime%') group by etiketi.film_id order by filmler.film_zaman desc $sinir";
	$sorgu = $this->db->query($sql);
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
		
	}
	// $this->db->order_by('film_zaman','desc');
	// $this->db->where('filmler.film_zaman <',$tarih);
	// $sorgu = $this->db->get('filmler',15,$sayfa);
	// foreach ($sorgu->result_array() as $flm){
	// $film['filmler'][] = $flm;
	// $f_id = $flm["id"];
	// $this->db->select('turler.tur_baslik,turler.tur_sef');
	// $this->db->join('turler','film_turleri.tur_id=turler.id','inner');
	// $this->db->where('film_turleri.film_id',$f_id);
	// $f_sorgu = $this->db->get('film_turleri');
	// $film['turleri'][] = $f_sorgu->result();
	// $this->db->where('p_filmid',$f_id);
	// $this->db->group_by('p_filmid');
	// $sorgu = $this->db->get('puanlar');
	// $i = 0; $z = 0; $x = 0;
	// $p = $sorgu->result_array();
	// $dizi = $p;
	// if (@$p[0]["p_puan"] == 1){	$i++; }
	// if (@$p[0]["p_puan"] == 2){	$z++; }
	// if (@$p[0]["p_puan"] == 3){	$x++; }
	// $dizi["psayi"] = count(@$dizi);
	// $dizi["pcg"] = $i;
	// $dizi["pie"] = $z;
	// $dizi["pbb"] = $x;
	// $film["puanlari"][] = $dizi;
	// }
	// return $film;
?>