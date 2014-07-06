<script type="text/javascript">
	$(document).ready(function(){
		var yazan = $("input[id=yazan]");
		var mail = $("input[id=mail]");
		var yorum = $("textarea[id=yorum]");
		var fid = <?php echo $film[0]->film_id; ?>;
		yazan.blur(yazan_kontrol);
		mail.blur(mail_kontrol);
		yorum.blur(yorum_kontrol);
		$(".y_gonder").click(function(){
		// alert($(this).val());
		if (yazan_kontrol() & mail_kontrol() & yorum_kontrol()){
		$.ajax({
		type:"POST",
		url:"<?php echo site_url(); ?>/anasayfa/yorum_yap",
		data:{"yazan":$("#i2filmyorumlar #yazan").val(),'mail':$("#i2filmyorumlar #mail").val(),'yorum':$("#i2filmyorumlar #yorum").val(),'fid':fid},
		success:function(sonuc){
		$("form#yy").fadeOut('fast').fadeIn('fast').html("<h3 style='text-align:center;padding: 5px;color: #333;'><?php echo $sistem[0]->site_yorum_onay == 1 ? 'Teşekkür ederiz.! Yorumunuz eklendi.' : 'Yorumunuz onaylandıktan sonra yorumlardaki yerini alacaktır..'; ?></h3>");
		}
		}).one();
		}
		});
		function yazan_kontrol(){
		if (jQuery.trim($("#i2filmyorumlar #yazan").val()).length < 5){ yazan.removeClass('olumlu'); yazan.addClass('olumsuz'); return false; }else {
		yazan.removeClass('olumsuz');		yazan.addClass('olumlu');	return true; }}
		function mail_kontrol(){ var e = jQuery.trim($("#i2filmyorumlar #mail").val());
		var regexp = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9­]+.[a-z]{2,4}$/;
		if (!regexp.test(e)){ mail.removeClass('olumlu'); mail.addClass('olumsuz'); return false; }else {
		mail.removeClass('olumsuz'); mail.addClass('olumlu');	return true; }}
		function yorum_kontrol(){
		if (jQuery.trim($("#i2filmyorumlar #yorum").val()).length < 7){ yorum.removeClass('olumlu'); yorum.addClass('olumsuz'); return false; } else {
		yorum.removeClass('olumsuz'); yorum.addClass('olumlu'); return true; }}
	});
</script>
<?php 
if (get_cookie('yorumyap') == time() || get_cookie('yorumyap') < time()){
?>
<div class="y_yap">
<div class="yorum_baslik cf1"><i style="margin-top:4px!important;" class="kucuk-ok"></i> Film hakkındaki düşüncelerin neler ?</div>
<form  id="yy" action="" method="post">
<input id="yazan" class="" type="text" placeholder="İsim yada takma adın" name="yazan" />
<input id="mail" class="" type="text" placeholder="E-Posta adresin" name="mail" />
<textarea  id="yorum" class="" name="yorum" placeholder="Film hakkında yazmak istediklerin neler ?" cols="30" rows="10"></textarea>
<input type="button" value="Gönder" class="y_gonder" />
</form>
</div>
<?php 
}else {
echo '<p style="font-size: 11px;padding: 5px;color: rgb(172, 55, 55);background: #ffeceb!important;border: 1px solid #f2c4c2!important;">30 saniye arayla yorum yapabilirsiniz.Tekrar yorum yapabilmek için bekleyin.</p>';
}
?>
