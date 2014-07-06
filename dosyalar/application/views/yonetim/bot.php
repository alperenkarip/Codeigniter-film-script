<div id="test"></div>
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

})
</script>
<div id="botsol">
<ul>
<li><a href="<?php echo site_url(); ?>/yonetim/bot/site/direkizle">Direkizle.com</a></li>
<li><a href="#">Filmizle.com.tr</a></li>
</ul>
</div>
<div id="botsag">
<?php 
	if ($bot){
?>
<script type="text/javascript">
$(function(){
	// $("#film_ekle").live('click',function(){
	// var link = $(this).attr('title');
	// $.post('http://www.sozlerin.net/film/index.php/yonetim/bot/site/direkizle',{'link':link,'eklenicek':'ekle'},function(sonuc){
	// $("#test").html(sonuc);
	// });
	// });
})
</script>
<div id="mmru2229"></div>
<ul class="bfilm">
<?php 
	$linkler = @$filmler[1];
	$basliklar = @$filmler[2];
	$dizi = array(array($linkler,$basliklar));
	$i=0;
	foreach ($dizi as $f){
	// echo '<pre>';
	// print_R($f);
		for ($x=0; $x < count($f[0]); $x++){
	echo '
<li class="bfilm">
<ul>
<li>'.$f[1][$x].'</li>
<form action="" method="post">
<li style="float:right;padding:8.5px 5px;margin-left:1px;"><input type="hidden" name="f_link" value="'.$f[0][$x].'" /><input type="submit" value="gonder" name="eklenicek" /></li>
<li ><strong>Zaman : </strong>
';
?>
<script type="text/javascript">
$(document).ready(function(){
$('#film_zaman<?php echo $x; ?>').datetimepicker();
});
</script>
<?php
echo '
<input type="text" name="film_zaman" id="film_zaman'.$x.'" /></li>
</form>
</ul>
</li>
	';
		}
	}
?>
</ul>
<?php
$limit=5;
		$ssayisi = 20;
		$sayfa = $this->uri->segment(5);
		echo '<ul id="bsayfalama">';
		echo '<li><a href="'.site_url().'yonetim/bot/site/direkizle/1">İlk</a></li>';
		if ($sayfa > $ssayisi){ $sayfa=1; }
		$goster = ($sayfa*$limit)-$limit;
		if ($sayfa > 1){
		echo '<li><a href="'.site_url().'yonetim/bot/site/direkizle/'.($sayfa-1).'">Önceki</a></li>';
		}
		for ($i=$sayfa - $limit; $i < $sayfa + $limit+1; $i++){
		if ($i > 0 and $i <= $ssayisi){
		if ($i == $sayfa){
		echo '<li><a style="background:red;color:#fff;" href="'.site_url().'yonetim/bot/site/direkizle/'.$i.'">'.$i.'</a></li>';
		}else {
		echo '<li><a href="'.site_url().'yonetim/bot/site/direkizle/'.$i.'">'.$i.'</a></li>';
		}
		}
		}
		if ($sayfa > 0){
		echo '<li><a href="'.site_url().'yonetim/bot/site/direkizle/'.($sayfa+1).'">Sonraki</a></li>';
		}
		echo '</ul>';
?>
<?php
	}else {
	echo '<h2 style="text-align:center;padding:5px;">Lütfen sol menüden bağlanmak istediğiniz siteyi seçin.</h2>';
	}
	?>

</div>