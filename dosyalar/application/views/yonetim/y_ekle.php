<script type="text/javascript">
$(function () {
    $("select").selectbox();
});
</script>
	<form action="" method="post">
<ul class="form-duzen"><li class="fd-li">
	<label for="t_isim">Kullanıcı adı</label>
</li><li class="fd-li">
	<input type="text" name="t_isim" />
</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">
	<label for="t_sifre">Şifre</label>
</li><li class="fd-li">
<input type="text" name="t_sifre"  />
</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">
	<label for="t_rutbe">Rütbe</label>
</li><li class="fd-li">
<?php 	echo form_dropdown('t_rutbe',array('1' => 'Yönetici','2' => 'Yardımcı')); ?>
</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">
<label for="t_mail">E-Posta</label>
</li><li class="fd-li">
<input type="text" name="t_mail"  />
</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">
</li><li class="fd-li">
	<input type="submit" class="buton" style="padding:10px;width:200px" value="Gönder" name="yekle" />
	</form>
