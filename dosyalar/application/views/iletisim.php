<script type="text/javascript">
	$(function(){
		var yazan = $("#yazan");
		var mail = $("#mail");
		var yorum = $("#yorum");
		yazan.blur(yazan_kontrol);
		mail.blur(mail_kontrol);
		yorum.blur(yorum_kontrol);
		$(".y_gonder").click(function(){
		if (yazan_kontrol() & mail_kontrol() & yorum_kontrol()){
		$.ajax({
		type:"POST",
		url:"<?php echo site_url(); ?>/anasayfa/iletisim",
		data:{"m_gonderen":yazan.val(),'m_mail':mail.val(),'m_mesaj':yorum.val(),'mesaj':'mesaj'},
		success:function(sonuc){
		if (sonuc == "eklendi"){
		// $("#yy").fadeOut('slow');
		$("#yy").fadeOut('fast').fadeIn('fast').html("<h3 style='text-align:center;'>Teşekkür ederiz . Mesajınız gönderildi.</h3>");
		}else {
		$("#yy").fadeOut('fast').fadeIn('fast').html("<h3 style='text-align:center;'>Bir sorun oluştu mesajınız gönderilemedi.</h3>");
		}
		}
		});
		}
		});

		function yazan_kontrol(){
		if (jQuery.trim(yazan.val()).length < 5){ $("#yazan").removeClass('olumlu'); $("#yazan").addClass('olumsuz'); return false; }else {
		$("#yazan").removeClass('olumsuz');		$("#yazan").addClass('olumlu');	return true; }}
		function mail_kontrol(){ var e = jQuery.trim(mail.val());
		var regexp = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9­]+.[a-z]{2,4}$/;
		if (!regexp.test(e)){ $("#mail").removeClass('olumlu'); $("#mail").addClass('olumsuz'); return false; }else {
		$("#mail").removeClass('olumsuz');		$("#mail").addClass('olumlu');	return true; }}
		function yorum_kontrol(){
		if (jQuery.trim(yorum.val()).length < 7){ $("#yorum").removeClass('olumlu'); $("#yorum").addClass('olumsuz'); return false; } else {
		$("#yorum").removeClass('olumsuz'); $("#yorum").addClass('olumlu'); return true; }}
	})
</script>
<div id="sayfa">
<h2 class="sbaslik">İletişim</h2>
<?php 
	if ($this->session->flashdata('mesaj')){
	echo $this->session->flashdata('mesaj');
	}
?>
<div id="ssol"><form id="yy" action="" method="post">
<label for="m_gonderen">İsim <sup style="color:red">*</sup></label>
<input class="input" id="yazan" type="text" name="m_gonderen" />
<label for="m_mail">E-Posta <sup style="color:red">*</sup></label>
<input class="input" id="mail" type="text" name="m_mail" />
<label for="m_mesaj">Mesajınız <sup style="color:red">*</sup></label>
<textarea id="yorum" class="input" name="m_mesaj" id="" cols="30" rows="10"></textarea><br/></br>
<input class="buton y_gonder" style="text-align:center" type="buton" value="Gönder" />
</form></div>
<div id="ssag">
<h3 class="sbaslik">İletişim detayları</h3>
<span><i class="icon-envelope"></i> <?php echo $sistem[0]->site_eposta; ?></span>
<h3 class="sbaslik">Sosyal medya</h3>
<a target="_blank" href="<?php echo $sistem[0]->site_facebook; ?>"><img width="42" height="42" src="<?php echo base_url(); ?>tema/resimler/face.png" alt="" /></a>
<a target="_blank" href="<?php echo $sistem[0]->site_twitter; ?>"><img width="42" height="42" src="<?php echo base_url(); ?>tema/resimler/twi.png" alt="" /></a>
</div>
</div>