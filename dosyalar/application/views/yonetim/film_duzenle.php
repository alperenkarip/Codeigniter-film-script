<?php
$farka = explode('||',$film[0]->film_arka);
$fresim = explode('|',$film[0]->film_resim);
?>
<script type="text/javascript">
	$(function(){
	$(".fturekle").click(function(){
	var deger = $(this).val();
	if ($(this).is(':checked')){
	$.post('',{'tur_id':deger,'film_id':<?php echo $film[0]->id; ?>},function(sonuc){
	$("body").append(sonuc);
	});
	}else {
	var deger = $(this).val();
	$.post('',{'tur_id':deger,'tsil':'tsil','film_id':<?php echo $film[0]->id; ?>},function(sonuc){
	$("body").append(sonuc);
	});
	}
	});
	});
</script>
<script type="text/javascript">
$(function () {
    $("select").selectbox();
});
</script>
<script type="text/javascript">
$(document).ready(function(){
(function($) {
	$.timepicker.regional['tr'] = {
		timeOnlyTitle: 'Zaman Seçiniz',
		timeText: 'Zaman',
		hourText: 'Saat',
		minuteText: 'Dakika',
		secondText: 'Saniye',
		millisecText: 'Milisaniye',
		timezoneText: 'Zaman Dilimi',
		currentText: 'Şu an',
		closeText: 'Tamam',
		monthNames: ['Ocak','Şubat','Mart','Nisan','Mayıs','Haziran',
		'Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık'],
		monthNamesShort: ['Oca','Şub','Mar','Nis','May','Haz',
		'Tem','Ağu','Eyl','Eki','Kas','Ara'],
		dayNames: ['Pazar','Pazartesi','Salı','Çarşamba','Perşembe','Cuma','Cumartesi'],
		dayNamesShort: ['Pz','Pt','Sa','Ça','Pe','Cu','Ct'],
		dayNamesMin: ['Pz','Pt','Sa','Ça','Pe','Cu','Ct'],
		dateFormat: 'yy-mm-dd',
		timeFormat: 'HH:mm',
		amNames: ['ÖÖ', 'Ö'],
		pmNames: ['ÖS', 'S'],
		isRTL: false
	};
	$.timepicker.setDefaults($.timepicker.regional['tr']);
})(jQuery);

$('#film_zaman').datetimepicker();
})
</script>
<div id="ypf_sol">
<?php
	echo form_open_multipart();
	echo '<ul class="form-duzen"><li class="fd-li">';
	echo form_label('Başlık','film_baslik');
	echo '</li><li class="fd-li">';
	echo form_input(array('name' => 'film_baslik','value' => $film[0]->film_baslik));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo form_label('Dublaj','film_tip');
	echo '</li><li class="fd-li">';
	echo form_dropdown('film_tip',array('1' => 'Altyazı','2' => 'Türkçe dublaj','3' => 'Yerli film'),$film[0]->film_tip);
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo form_label('İMDB puanı','film_imdb');
	echo '</li><li class="fd-li">';
	echo form_input(array('name' => 'film_imdb','value' => $film[0]->film_imdb));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo form_label('Gösterim tarihi','film_gosterim_tarihi');
	echo '</li><li class="fd-li">';
	echo form_input(array('name' => 'film_gosterim_tarihi','value' => $film[0]->film_gosterim_tarihi));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo form_label('Ekleneceği saat','film_zaman'); 
	echo '</li><li class="fd-li">';
	echo form_input(array('name' => 'film_zaman','value' => $film[0]->film_zaman,'id' => 'film_zaman'));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo form_label('Yönetmen','film_yonetmen');
	echo '</li><li class="fd-li">';
	echo form_input(array('name' => 'film_yonetmen','value' => $film[0]->film_yonetmen));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo form_label('Yapım tarihi','film_yapim');
	echo '</li><li class="fd-li">';
	echo form_input(array('name' => 'film_yapim','value' => $film[0]->film_yapim));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo form_label('Oyuncular','film_oyuncular');
	echo '</li><li class="fd-li">';
	echo form_input(array('name' => 'film_oyuncular','value' => $film[0]->film_oyuncular));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo form_label('Ekleyen','film_ekleyen');
	echo '</li><li class="fd-li">';
	echo form_input(array('name' => 'film_ekleyen','readonly' => 'readonly','value' => $film[0]->film_ekleyen));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo form_label('Resim','film_resim');
	echo '</li><li class="fd-li">';
	echo form_input(array('name' => 'film_resim','type' => 'file'));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo form_label('Resim','film_resim');
	echo '</li><li class="fd-li">';
	echo '<img src="'.@$fresim[0].'" width="50" height="50" alt="" />';
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo form_label('Film arkaplan','film_arka');
	echo '</li><li class="fd-li">';
	echo form_input(array('name' => 'film_arka','type' => 'file'));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo form_label('Ark.. Pozisyonu','film_arka');
	echo '</li><li class="fd-li">';
	echo form_input(array('name' => 'film_arka_pos','value' => $farka[0]));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo form_label('Arkaplan','film_resim');
	echo '</li><li class="fd-li">';
	echo '<img src="'.@$farka[1].'" width="50" height="50" alt="" />';
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo form_label('Konusu','film_ozet');
	echo '</li><li class="fd-li">';
	echo form_textarea(array('name' => 'film_ozet','value' => $film[0]->film_ozet));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo form_submit('film_guncelle','Gönder','class="buton"');
	echo form_close();
?>
</div>
<div id="ypf_sag">
<div id="ypturler">
<ul>
<?php 
	echo form_open();
	$i = 0;
	foreach ($turler as $tr){
	echo '<li>';
	echo form_label($tr->tur_baslik,'ftur');
	echo '<input type="checkbox"  name="ftur[]" class="fturekle" value="'.$tr->id.'"';
	for ($i=0; $i < count($fturleri); $i++){
	echo @$fturleri[$i]->tur_id == $tr->id ? 'checked="checked"' : '';
	}
	echo '/>';
	echo '</li>';
	}
	echo form_close();
?>
</ul>
</div>
<div style="clear:both"></div>
<script type="text/javascript">
$(document).ready(function(){
	$("#etiket_ekle").click(function(){
	var deger = $("input[name=fet_ekle]").val();
	var film_id = $("#ypf_et").attr('class');
	if (!deger){
	alert("Boş değer.");
	}else {
	var virgul = deger.split(",");
	for (i=0; i < virgul.length; i++){
	$.post('',{'fid':film_id,'et_ekle':'et_ekle','etiket':virgul[i]},function(sonuc){
	$(".etg").html(sonuc);
	})}}});
	
	$(".etiketsil").live('click',function(){
		var fid = <?php echo $film[0]->id; ?>;
		var eid = $(this).attr('id');
		var index = $('.etiketsil').index(this);
		$.post('',{'esil':'esil','eid':eid,'fid':fid},function(sonuc){
		$(".etg").html(sonuc);
		});
	});
});

</script>
<div id="ypf_et" class="<?php echo strip_tags($film[0]->id); ?>">
<div id="ustune">
<h3>Üstün etiketler</h3>
<?php 
	foreach ($ustune as $u){
	echo '<a href="#" onclick="return false;">'.$u->e_baslik.'</a>';
	}
?>
</div>
<script type="text/javascript">
$(function(){
	$("#ustune a").live('click',function(){
		var val = $(this).text();
		var fid = <?php echo $film[0]->id; ?>;
$.post('',{'fid':fid,'et_ekle':'et_ekle','etiket':val},function(sonuc){
	$(".etg").html(sonuc);
	});
});
});
</script>
<?php 	echo form_input(array('name' => 'fet_ekle','id' => 'fetekle')); echo form_button('e_ekle','Ekle','id="etiket_ekle" class="buton" style="padding:5px"');?>
<div class="etg"><?php $this->load->view('yonetim/f_et'); ?></div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		var pb = $(".pb");
		var pk = $(".pk");
		
	// pb.blur(partBaslik);
	// pk.blur(partKod);
	pb.live('blur',partBaslik);
	pk.live('blur',partKod);
		
		
		function partBaslik(){
		var baslik = $(this).val();
		var sira = $(this).attr('id');
		$.post('',{'part_b_guncelle':'part','baslik':baslik,'sira':sira,'fid':<?php echo $film[0]->id; ?>},function(sonuc){
		
		});
		}
		
		function partKod(){
		var sira = $(this).attr('id');
		var film_kod = $(this).val();
		$.post('',{'part_k_guncelle':'part','part_kod':film_kod,'sira':sira,'fid':<?php echo $film[0]->id; ?>},function(sonuc){

		});
		}
		
		$("#f_part_ekle").live('click',function(){
		var esayi = $(".eklenecek").length;
		if (esayi < 1){
		var psay = $("#partlari ul li").length+1;
		var data = parseInt($("#partlari ul li:last").attr('data'))+1;
		$("#partlari ul:last").append('<li class="eklenecek" data="'+data+'"><span></span><input type="text" name="p_baslik" class="pb" id="'+psay+'" /><input type="text" name="partlar[]" id="'+psay+'" class="pk" /><div class="dpsonuc"><a href="#" onclick="return false;" class="yp_ekle" ><div class="icon-ok"></div></a></div></li>');
		$(".yp_ekle").click(function(){
		$("#partlari ul li:last").removeClass('eklenecek');
		$("#partlari ul li:last").removeClass('hatali');
		});
		}else {
		$("#partlari ul li:last").addClass('hatali');
		}
		});
		
		
		$(".yp_ekle").live('click',function(){
		var p_baslik = $("#partlari ul li:last input:first").val();
		var p_kod = $("#partlari ul li:last input:last").val();
		var p_sira = $("#partlari ul li:last input:last").attr('id');
		$.post('',{'fp_ekle':'partekle','p_baslik':p_baslik,'p_kod':p_kod,'p_sira':p_sira,'fid':"<?php echo $film[0]->id; ?>"},function(sonuc){
		$(".yp_ekle").remove();
		$(".dpsonuc:last").append('<img width="20" style="float:right;margin-top:-3px;" src="<?php echo base_url(); ?>/tema/resimler/yukleniyor.gif" alt="" />');
		setTimeout(function(){
		$("#prt").html(sonuc);
$(".dpsonuc:last").fadeOut('slow').fadeIn('slow').html('<div class="icon-ok"></div>');
duzelt();
		},1000);		
		});
		});
		
		$("#partlari ul li span a#partsil").live('click',function(){
		var i = $("#partlari ul li span a#partsil").index(this);
		if (confirm("Silmek istediğinize eminmisiniz?")){
		var p_sira = $("#partlari ul li:eq("+i+") input").attr('id');
		var fid = "<?php echo $film[0]->id; ?>";
		var p_sayi = $("#partlari ul li span.psayisi").length;
		$.post('',{'partsil':'ps','p_sayi':p_sayi,'p_sira':p_sira,'fid':fid},function(sonuc){
		$("#prt").html(sonuc);
		duzelt();
		});
		}
		});
		
		duzelt();
		
		$("#partlari ul li span #pasagi").live('click',function(){
		var i = $("#partlari ul li span #pasagi").index(this);
		var p_sira = $("#partlari ul li:eq("+i+") input").attr('id');
		var p_sayi = $("#partlari ul li span.psayisi").length;
		var fid = "<?php echo $film[0]->id; ?>";
		var pid = $("#partlari ul li:eq("+i+")").next().attr('data');
		$.post('',{'pa':'pa','pasagi':pid,'p_sira':p_sira,'fid':fid,'psayi':p_sayi},function(sonuc){
		$("#prt").html(sonuc);
		duzelt();
		});
		});
		
		$("#partlari ul li span #pyukari").live('click',function(){
		var i = $("#partlari ul li span #pyukari").index(this)+1;
		var p_sira = $("#partlari ul li:eq("+i+") input").attr('id');
		var p_sayi = $("#partlari ul li span.psayisi").length;
		var fid = "<?php echo $film[0]->id; ?>";
		var pid = $("#partlari ul li:eq("+i+")").prev().attr('data');
		$.post('',{'py':'py','pyukari':pid,'p_sira':p_sira,'fid':fid,'psayi':p_sayi},function(sonuc){
		$("#prt").html(sonuc);
		duzelt();
		});
		
		});
	});
</script>
<div style="clear:both;"></div>
<div id="prt">
<?php $this->load->view('yonetim/partlari'); ?>
</div>
</div>