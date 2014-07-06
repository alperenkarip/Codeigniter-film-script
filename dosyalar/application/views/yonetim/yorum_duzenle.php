<script type="text/javascript">
$(function () {
    $("select").selectbox();
});
</script>
<p id="veri_bilgi">Bu yorum <strong><?php echo $yorum[0]->film_baslik; ?></strong> başlıklı filme <strong><?php echo $yorum[0]->y_tarih; ?> </strong>tarihinde gönderilmiş. Son düzenlenme tarihi <strong><?php echo $yorum[0]->y_sgt; ?></strong></p>
<div id="ypf_sol">
	<form action="" method="post">
<ul class="form-duzen"><li class="fd-li">
	<label for="y_onay">Durum</label>
</li><li class="fd-li">
	<select name="y_onay" id="">
	<option value="1" <?php echo $yorum[0]->y_onay == 1 ? 'selected="selected"' : ''; ?> >Onaylandı</option>
	<option value="0" <?php echo $yorum[0]->y_onay == 0 ? 'selected="selected"' : ''; ?> >Onaylanmadı</option>
	</select>
</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">
	<label for="y_yazan">Yazan</label>
</li><li class="fd-li">
	<input type="text" name="y_yazan" value="<?php echo $yorum[0]->y_yazan; ?>" readonly="readonly" />
</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">
	<label for="y_mail">E-Posta</label>
</li><li class="fd-li">
	<input type="text" name="y_mail" value="<?php echo $yorum[0]->y_mail; ?>" readonly="readonly" />
</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">
	<label for="y_yorum">Yorum</label>
</li><li class="fd-li">
	<textarea name="y_yorum" id="" cols="30" rows="10"><?php echo $yorum[0]->y_yorum; ?></textarea>
</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">
</li><li class="fd-li">
	<input type="submit" class="buton" style="padding:10px;width:200px" value="Gönder" name="yorum_duzenle" />
	</form>
</div>