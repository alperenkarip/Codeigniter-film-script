<script type="text/javascript">
$(function () {
    $("select").selectbox();
});
</script>
<?php 
	echo $this->session->flashdata('mesaj');
	echo form_open_multipart(); 
	echo '<ul class="form-duzen"><li class="fd-li">';
	echo form_label('Site Başlık','site_baslik');
	echo '</li><li class="fd-li">';
	echo form_input(array('name' => 'site_baslik','value' => $deger[0]->site_baslik));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo form_label('Site Anahtar kelimeleri','site_key');
	echo '</li><li class="fd-li">';
	echo form_input(array('name' => 'site_key','value' => $deger[0]->site_key));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo form_label('Site Açıklaması','site_desc');
	echo '</li><li class="fd-li">';
	echo form_input(array('name' => 'site_desc','value' => $deger[0]->site_desc));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	
	echo form_label('Site Facebook adresi','site_facebook');
	echo '</li><li class="fd-li">';
	echo form_input(array('name' => 'site_facebook','value' => $deger[0]->site_facebook));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	
	echo form_label('Görünecek film sayısı','site_film_sayi');
	echo '</li><li class="fd-li">';
	echo form_input(array('name' => 'site_film_sayi','value' => $deger[0]->site_film_sayi));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';

	echo form_label('Site arkaplan resmi','site_arka');
	echo '</li><li class="fd-li">';
	echo form_input(array('name' => 'site_arka','type' => 'file'));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	
	echo form_label('Site arkaplan resmi','site_arka');
	echo '</li><li class="fd-li">';
	echo '<img src="'.$deger[0]->site_arkaplan.'" width="100" height="50" alt="" />';
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	
	echo form_label('Arkaplan tekrarlansınmı ?','site_arka_t');
	echo '</li><li class="fd-li">';
	echo form_dropdown('site_arka_t',array('1' => 'Evet','0' => 'Hayır'),$deger[0]->site_arka_t,'id="htmlselect"');
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	
	echo form_label('Cache(Önbellek)','site_cache');
	echo '</li><li class="fd-li">';
	echo form_dropdown('site_cache',array('1' => 'Açık','0' => 'Kapalı'),$deger[0]->site_cache,'id="htmlselect"');
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	
	echo form_label('Cache Süre (DAKİKA)','site_cache_sure');
	echo '</li><li class="fd-li">';
	echo form_input(array('name' => 'site_cache_sure','value' => $deger[0]->site_cache_sure));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	
	echo form_label('Site Twitter adresi','site_twitter');
	echo '</li><li class="fd-li">';
	echo form_input(array('name' => 'site_twitter','value' => $deger[0]->site_twitter));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo form_label('Site E-Posta adresi','site_eposta');
	echo '</li><li class="fd-li">';
	echo form_input(array('name' => 'site_eposta','value' => $deger[0]->site_eposta));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';
	echo form_label('Filmler nasıl sıralansın ?','site_duzen');
	echo '</li><li class="fd-li">';
	echo form_dropdown('site_duzen',array('1' => 'jQNested','2' => 'Yanyana(Gelişmiş)','3' => 'Altalta','4' => 'Yanyana(Tek bilgi)'),$deger[0]->site_duzen,'id="htmlselect"');
	echo '</li></ul><ul class="form-duzen"><li class="fd-li">';
	echo form_label('Filmlere yorum yapılsınmı ?','site_yorum');
	echo '</li><li class="fd-li">';
	echo form_dropdown('site_yorum',array('1' => 'Evet','0' => 'Hayır'),$deger[0]->site_yorum,'id="htmlselect"');
	echo '</li></ul><ul class="form-duzen"><li class="fd-li">';
	echo form_label('Yorumlar otomatik onaylansınmı?','s_y_onay');
	echo '</li><li class="fd-li">';
	echo form_dropdown('s_y_onay',array('1' => 'Evet','0' => 'Hayır'),$deger[0]->site_yorum_onay,'id="htmlselectt"');
	echo '</li></ul><ul class="form-duzen"><li class="fd-li">';
	
	echo form_label('Site alt bilgi','site_alt');
	echo '</li><li class="fd-li">';
	echo form_textarea(array('class' => 'ckeditor','name' => 'site_alt','value' => $deger[0]->site_alt));
	echo '</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">';

	echo '<br><div style="clear:both"></div>';
	echo form_submit('sistem_ayarlari','Gönder','class=buton');
	echo form_close();
?>