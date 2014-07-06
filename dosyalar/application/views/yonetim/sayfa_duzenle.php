	<form action="" method="post">
<ul class="form-duzen"><li class="fd-li">
	<label for="s_baslik">Başlık</label>
</li><li class="fd-li">
	<input type="text" name="s_baslik" value="<?php echo $sayfa[0]->s_baslik; ?>" />
</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">
	<label for="s_keyw">Anahtar kelimeler</label>
</li><li class="fd-li">
	<input type="text" name="s_keyw" value="<?php echo $sayfa[0]->s_keyw; ?>"  />
</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">
	<label for="s_desc">Açıklama</label>
</li><li class="fd-li">
<input type="text" name="s_desc" value="<?php echo $sayfa[0]->s_desc; ?>" />
</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">
	<label for="s_icerik">İçerik</label>
</li><li class="fd-li">
	<textarea name="s_icerik" style="width:98%;" class="ckeditor" cols="30" rows="10"><?php echo $sayfa[0]->s_icerik; ?></textarea>
</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">
</li><li class="fd-li">
	<input type="submit" class="buton" style="padding:10px;width:200px" value="Gönder" name="sayfa_duzenle" />
	</form>
