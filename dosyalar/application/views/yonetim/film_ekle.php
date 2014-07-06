<?php 
if ($this->input->post('sid')){
	?>
	<script type="text/javascript">
	$(function(){
	var turler = "<?php echo $sturler; ?>";
	var exp = turler.split(',');
	for (var i=0; i < exp.length; i++){
	var tur = exp[i].toLowerCase();
	$(".squaredFour input[title*="+tur+"]").attr('checked','checked');
	}
	$("#dxk").hide();
	$("#partlari ul").append('<li class="z" id="0"><span class="psayisi"><a href="#" class="icon-trash" onclick="return false;" id="partsil"></a><a href="#" class="icon-arrow-up" onclick="return false;" id="pyukari"></a><a href="#" class="icon-arrow-down" onclick="return false;" id="pasagi"></a></span><input type="text" value="<?php echo $partb; ?>" name="p_baslik[]" class="pb"><input value="<?php echo htmlspecialchars($partk); ?>" type="text" name="p_kod[]" class="pk"><div class="dpsonuc"></div></li>');
	});
	</script>
<script type="text/javascript">
$(document).ready(function(){
	// $("#sag").prepend("<div class='dialog info'><span class='close' id='info'></span><span class='icon'></span><h1>UYARI</h1><p>Film <strong>etiketleri</strong>,<strong>kategorileri</strong> ve <strong>resimi</strong> bot tarafından eklenmez bunları elle yapmak zorundasınız... <strong>Film türleri : </strong> <?php echo $sturler; ?></p></div>");
	$("input[name=film_baslik]").val('<?php echo $baslik; ?>');
	$("input[name=film_gosterim_tarihi]").val('<?php echo $gosterimt; ?>');
	$("input[name=film_yonetmen]").val('<?php echo $yonetmen; ?>');
	$("input[name=film_yapim]").val('<?php echo $yapim; ?>');
	$("input[name=film_imdb]").val('<?php echo $imdb; ?>');
	$("input[name=film_oyuncular]").val('<?php echo $oyuncular; ?>');
	$("textarea[name=film_ozet]").val("<?php echo $ozet; ?>");
});
</script>
	<?php
	}
	?>
<h2>DivxPlanet.com</h2>
<form action="" method="post" style="width:500px;">
<ul class="form-duzen"><li class="fd-li">
<label for="s_id">Film Link</label>
</li><li class="fd-li">
<input type="text" style="width:90%" name="s_id" placeholder="Örn: http://divxplanet.com/sub/m/11942/Curb-Your-Enthusiasm.html" /><a class="ibilgi" href="#">?</a>
</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">
<label for="film_tip"></label>
</li><li class="fd-li">
<input type="submit" value="Film bilgilerini çek" class="buton" name="sid" />
</li></ul><div style="clear:both"></div>
</form>

<?php 
	echo '<form action="" enctype="multipart/form-data" name="fekle" id="yeni_film" method="post">';
?>
<script type="text/javascript">
$(function () {
    $("select").selectbox();
	$(".ibilgi").click(function(){
		alert("Bu bölüm DivxPlanet.com'dan belirlenen filmin bilgilerini çekmeye yarar. Bu alana DivxPlanet.com'daki belirlediğiniz film'in url'ini yapıştırınız.");
	});
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
	echo '<ul class="form-duzen"><li class="fd-li">';
	echo '<label for="film_baslik">Başlık</label>';
	echo '</li><li class="fd-li">';
	echo '<input type="text" name="film_baslik" />';
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo '<label for="film_tip">Dublaj</label>';
	echo '</li><li class="fd-li">';
	echo '<select name="film_tip"><option value="1">Altyazı</option><option value="2">Türkçe dublaj</option><option value="3">Yerli film</option></select>';
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo '<label for="film_imdb">İMDB</label>';
	echo '</li><li class="fd-li">';
	echo '<input type="text" name="film_imdb" />';
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo '<label for="film_gosterim_tarihi">Gösterim tarihi</label>';
	echo '</li><li class="fd-li">';
	echo '<input type="text" name="film_gosterim_tarihi" />';
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo '<label for="film_zaman">Ekleneceği saat</label>';
	echo '</li><li class="fd-li">';
	echo '<input type="text" name="film_zaman" id="film_zaman" />';
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo '<label for="film_yonetmen">Yönetmen</label>';
	echo '</li><li class="fd-li">';
	echo '<input type="text" name="film_yonetmen" />';
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo form_label('Yapım tarihi','film_yapim');
	echo '</li><li class="fd-li">';
	echo form_input(array('name' => 'film_yapim'));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo form_label('Oyuncular','film_oyuncular');
	echo '</li><li class="fd-li">';
	echo form_input(array('name' => 'film_oyuncular'));
	echo '</li></ul><div style="clear:both"></div><ul id="dxk" class="form-duzen"><li class="fd-li">';
	echo form_input(array('type' => 'hidden','value' => $this->session->userdata('kadi'),'name' => 'film_ekleyen','readonly' => 'readonly'));
	echo form_label('Resim','film_resim');
	echo '</li><li class="fd-li">';
	echo form_input(array('name' => 'film_resim','type' => 'file'));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	
	if (@$resim){
	echo form_label('Resim','film_resim');
	echo '</li><li class="fd-li">';
	echo '<img src="'.$resim.'" width="50" height="50" alt="" />';
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	}
	
	echo form_label('Film arkaplan','film_arka');
	echo '</li><li class="fd-li">';
	echo form_input(array('name' => 'film_arka','type' => 'file'));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo form_label('Ark.. Pozisyonu','film_arka');
	echo '</li><li class="fd-li">';
	echo form_input(array('name' => 'film_arka_pos'));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo form_label('Konusu','film_ozet');	
	echo '</li><li class="fd-li">';
	echo form_textarea(array('name' => 'film_ozet'));
	echo '</li>';
	
?>
</div>
<div id="ypf_sag">
<div id="ypturler">

<ul>
<?php 
	$i = 0;
	$z = 0;
	foreach ($turler as $tr){
	echo '<li class="squaredFour">';
	echo '<label for="ftur">'.$tr->tur_baslik.'</label>';
	echo '<input title="'.strtolower($tr->tur_baslik).'" type="checkbox" id="checkbox" name="ftur[]" value="'.$tr->id.'" />';
	echo '</li>';
	}

?>
</ul>
</div>
<div style="clear:both"></div>
<script type="text/javascript">
$(document).ready(function(){
	$("#etiket_ekle").click(function(){
	var deger = $("input[name=fet_ekle]").val();
	var bol = deger.split(",");
	for (i=0; i < bol.length; i++){
		$(".fet ul").append('<li id="'+i+'"><a href="#" onclick="return false;" id="etiket_sil" >'+bol[i]+'</a><input type="hidden" name="etiketler[]" value="'+bol[i]+'"/></li>');
	}
	});
	
	$("#etiket_sil").live('click',function(){
		var index = $("a#etiket_sil").index(this);
		$(".fet ul li").eq(index).remove();
	});

});
</script>
<div id="ypf_et">
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
		$(".fet ul").prepend('<li><a href="#" onclick="return false;" id="etiket_sil">'+val+'</a><input type="hidden" name="etiketler[]" value="'+val+'"></li>');
	});
})
</script>
<?php 	echo form_input(array('name' => 'fet_ekle','id' => 'fetekle')); echo form_button('e_ekle','Ekle','id="etiket_ekle" class="buton" style="padding:5px"');?>
<div class="etg">
<div class="fet">
<ul>

</ul>
</div>
</div>
<div style="clear:both;"></div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#f_part_ekle").click(function(i){
		var say = $("#partlari ul li").length;
			$("#partlari ul").append('<li class="z" id="'+say+'"><span class="psayisi"><a href="#" onclick="return false;" class="icon-trash" id="partsil"></a><a href="#" onclick="return false;" class="icon-arrow-up" id="pyukari"></a><a href="#" onclick="return false;" class="icon-arrow-down" id="pasagi"></a></span><input type="text"  name="p_baslik[]" class="pb" /><input type="text"  name="p_kod[]" class="pk"  /><div class="dpsonuc" ></div>	</li>');			
		});

jQuery.fn.sortElements = (function(){
 
    var sort = [].sort;
 
    return function(comparator, getSortable) {
 
        getSortable = getSortable || function(){return this;};
 
        var placements = this.map(function(){
 
            var sortElement = getSortable.call(this),
                parentNode = sortElement.parentNode,
 
                // Since the element itself will change position, we have
                // to have some way of storing its original position in
                // the DOM. The easiest way is to have a 'flag' node:
                nextSibling = parentNode.insertBefore(
                    document.createTextNode(''),
                    sortElement.nextSibling
                );
 
            return function() {
 
                if (parentNode === this) {
                    throw new Error(
                        "You can't sort elements if any one is a descendant of another."
                    );
                }
 
                // Insert before flag:
                parentNode.insertBefore(this, nextSibling);
                // Remove flag:
                parentNode.removeChild(nextSibling);
 
            };
 
        });
 
        return sort.call(this, comparator).each(function(i){
            placements[i].call(getSortable.call(this));
        });
 
    };
 
})();

jQuery(function($) {
    $('.z').sortElements(function(a, b){
        return parseFloat($(a).attr('id')) > parseFloat($(b).attr('id')) ? 1 : -1;
    });
});

		$("#pyukari").live('click',function(){
		
			var i = $("#partlari ul li #pyukari").index(this);
var z = i-1;			
			$("#partlari ul li").eq(i).attr('id',''+z+'');
			$("#partlari ul li").eq(z).attr('id',''+i+'');
			jQuery(function($) {
    $('.z').sortElements(function(a, b){
        return parseFloat($(a).attr('id')) > parseFloat($(b).attr('id')) ? 1 : -1;
    });
});
		});
		$("#pasagi").live('click',function(){
		
			var i = $("#partlari ul li #pasagi").index(this);
var z = i+1;			
			$("#partlari ul li").eq(i).attr('id',''+z+'');
			$("#partlari ul li").eq(z).attr('id',''+i+'');
			jQuery(function($) {
    $('.z').sortElements(function(a, b){
        return parseFloat($(a).attr('id')) > parseFloat($(b).attr('id')) ? 1 : -1;
    });
});
		});
	
		$("#partlari ul li a#partsil").live('click',function(){
			if (confirm("Silmek istediğinizden eminmisiniz?")){
			var i = $("#partlari ul li #partsil").index(this);
			$("#partlari ul li").eq(i).remove();
			}
		});
		
	});
</script>
</div>
<div style="clear:both"></div>
<div id="prt">
<div id="partlari">
<a href="#" onclick="return false;" id="f_part_ekle" class="buton">Part ekle</a>
	<ul>
	
			
	</ul>
</div>
</div>
</div>
<div style="clear:both;"></div>
<input type="hidden" value="fekle" name="fekle"  />
<div style="margin:0 auto;width:250px;"><input type="submit" style="width:250px;padding:10px" class="buton" name="fekle" value="Gönder" /></div>
</form>