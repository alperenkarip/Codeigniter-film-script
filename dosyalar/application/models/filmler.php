<?php 
	class filmler extends CI_Model {
	
	public function filmsayi(){
	$this->db->select('id');
	$sorgu = $this->db->get('filmler');
	$sayi = $sorgu->num_rows();
	return $sayi;
	}
	
	public function rss(){
	$sql = "select * from filmler order by id desc limit 40";
	$sorgu = $this->db->query($sql);
	return $sorgu->result();
	}
	
	public function sitemap(){
	$this->db->order_by('id','desc');
	$sorgu = $this->db->get('filmler');
	return $sorgu->result();	
	}
	
	public function filmleri_cek($veri="",$baslangic="",$limit=""){
	$tarih = date('Y-m-d H:i:00');
	if ($veri){	
	foreach ($veri as $v){	$this->db->or_where(array("tur_id" => $v));	}
	$this->db->join('filmler','film_turleri.film_id=filmler.id','inner');
	$this->db->group_by('filmler.id');
	$this->db->order_by('filmler.film_zaman','desc');
	$this->db->where('filmler.film_zaman <',$tarih);
	$this->db->limit(30);
	$sorgu = $this->db->get("film_turleri");
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
	}else {
	$this->db->order_by('film_zaman','desc');
	$this->db->where('filmler.film_zaman <',$tarih);
	$this->db->limit($baslangic,$limit);
	$sorgu = $this->db->get('filmler');
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
	
	public function film_cek_tur($veri="",$baslangic,$limit){
	$tarih = date('Y-m-d H:i:00');
	$this->db->join('film_turleri','film_turleri.tur_id=turler.id','inner');
	$this->db->join('filmler','filmler.id=film_turleri.film_id','inner');
	$this->db->where('tur_sef',$veri);
	$this->db->order_by('film_zaman','desc');
	$this->db->group_by('filmler.id');
	$this->db->where('filmler.film_zaman <',$tarih);
	$this->db->limit($baslangic,$limit);
	$sorgu = $this->db->get("turler");
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
	
	function filmtur($tur){
	$this->db->where('tur_sef',$tur);
	$sorgu = $this->db->get('turler');
	return $sorgu->result();
	}
	
	function tursayi($tur){
	$this->db->select('id');
	$this->db->where('tur_sef',$tur);
	$sorgu = $this->db->get('turler');
	$tursayi = "";
	foreach ($sorgu->result_array() as $turler){
	$this->db->where('tur_id',$turler["id"]);
	$sorgu = $this->db->get('film_turleri');
	$tursayi = $sorgu->num_rows();
	}
	return $tursayi;
	}
	
	public function filmi_cek($veri=""){
	$this->db->join('film_turleri','film_turleri.film_id=filmler.id','inner');
	$this->db->join('turler','turler.id=film_turleri.tur_id','inner');
	$this->db->where('film_sef',$veri);
	$this->db->group_by('film_turleri.id');
	$sorgu = $this->db->get('filmler');
	return $sorgu->result();
	}
	
	
	public function film_etiket($veri=""){
	$this->db->join('etiketler','etiketler.id=etiketi.etiket_id','inner');
	$this->db->where('etiketi.film_id',$veri);
	$sorgu = $this->db->get('etiketi');
	return $sorgu->result();
	}
	
	public function etiket($et){
	$this->db->where('e_sef',$et);
	$sorgu = $this->db->get('etiketler');
	return $sorgu->result();
	}
	
	public function film_part($veri=""){
	$sql = "select partlar.*,filmler.id from partlar inner join filmler on filmler.id=partlar.film_id  where partlar.film_id=? order by partlar.p_sira asc ";
	$sorgu = $this->db->query($sql,array($veri));
	// $v["psayisi"] = $this->db->affected_rows();
	foreach ($sorgu->result_array() as $t){
	$v[] = $t;
	}
	$sorgu->free_result();
	return @$v;
	}
	
	public function yorumlar($fid){
	$this->db->where('film_id',$fid);
	$this->db->where('y_ust','0');
	$this->db->where('y_onay',1);
	$this->db->order_by('id','desc');
	$sorgu = $this->db->get('yorumlar');
	$yorumlar = $sorgu->result();
	$v["yorumlar"] = $yorumlar;
	foreach ($yorumlar as $y){
	$this->db->where('y_ust',$y->id);
	$this->db->order_by('id','desc');
	$this->db->where('y_onay',1);
	$sorgu2 = $this->db->get('yorumlar');
	$v["yanitlar"][] = $sorgu2->result();
	}
	return @$v;
	}
	
	public function yorumyanitlari($id){
	$this->db->where('film_id',$id);
	$this->db->where('y_ust >',0);
	$sorgu = $this->db->get('yorumlar');
	return $sorgu->result();
	}
	
	public function onecikanyorumlar($fid){
	$this->db->where('film_id',$fid);
	$this->db->where('y_onay',1);
	$this->db->where('y_ust',0);
	$this->db->order_by('y_puan','desc');
	$this->db->limit('3');
	$sorgu = $this->db->get('yorumlar');
	return $sorgu->result();
	}
	
	public function yorum_ekle($veri=""){
	if ($this->db->insert('yorumlar',$veri)){ return true; }else { return false; }
	}	
	
	public function yyanit($veri=""){
	if ($this->db->insert('yorumlar',$veri)){ return true; }else { return false; }
	}
	
	public function ypuan($durum,$id){
	if ($durum == "arti"){
	$sql = "update yorumlar set y_puan=y_puan+1 where id='$id'";
	$guncelle = $this->db->query($sql);
	if ($guncelle){return true;}else {return false;}
	}elseif ($durum == "eksi"){
	$sql = "update yorumlar set y_puan=y_puan-1 where id='$id'";
	$guncelle = $this->db->query($sql);
	if ($guncelle){return true;}else {return false;}
	}
	}
	
	public function anket(){
	$this->db->where('anket.anket_durum',1);
	$sorgu = $this->db->get('anket');
	$sr["anketler"] = $sorgu->result();
	foreach ($sr["anketler"] as $s){
	$this->db->where('anket_id',$s->id);
	$v = $this->db->get('anket_soru');
	$sr["sorular"][] = $v->result();
	}
	return $sr;
	// echo '<pre>';
	// print_r($sr);
	}
	
	public function anketoy(){
	$id = $this->input->post('soruid');
	$sql = "update anket_soru set anket_oy=anket_oy+1 where id='$id'";
	$guncelle = $this->db->query($sql);
	if ($guncelle){return true;}else {return false;}
	}
	
	public function puanlar($id){
	$this->db->where('p_filmid',$id);
	$sorgu = $this->db->get('puanlar');
	$i = 0; $z = 0; $x = 0;
	foreach ($sorgu->result_array() as $p){
	$dizi[] = $p;
	if ($p["p_puan"] == 1){	$i++; }
	if ($p["p_puan"] == 2){	$z++; }
	if ($p["p_puan"] == 3){	$x++; }
	}
	$dizi["psayi"] = count(@$dizi);
	$dizi["pcg"] = $i;
	$dizi["pie"] = $z;
	$dizi["pbb"] = $x;
	return $dizi;
	}
	
	public function puanver($veri){
	$ip =  $veri["p_ip"];
	$fid =  $veri["p_filmid"];
	$this->db->where('p_ip',$ip);
	$this->db->where('p_filmid',$fid);
	$sorgu = $this->db->get('puanlar');
	if ($sorgu->num_rows() < 1){
	$this->db->insert('puanlar',$veri);
	}
	}
	
	public function fgosterim($id){
	$sql = "update filmler set film_gosterim=film_gosterim+1 where id='$id'";
	$d = $this->db->query($sql);
	if ($d){ return true; }else { return false; }
	}
	
	}
?>