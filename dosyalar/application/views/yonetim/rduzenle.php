<script type="text/javascript">
$(function () {
    $("select").selectbox();
	var konum = $("#rkonum").val();
	if (konum == 1){
	$("#ronce*").show();
	}else {
	$("#ronce*").hide();
	}

	$("#rkonum").change(function(){
	var konum = $(this).val();
	if (konum == 1){
	$("#ronce*").show();
	}else {
	$("#ronce*").hide();
	}
	});
});
</script>
<?php echo form_open_multipart(); ?>
<ul class="form-duzen"><li class="fd-li">
	<label for="r_baslik">Başlık</label>
</li><li class="fd-li">
	<input type="text" name="r_baslik" value="<?php echo $reklam[0]->r_baslik; ?>" />
</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">
	<label for="r_kod">Reklam durumu</label>
</li><li class="fd-li">
<?php 	echo form_dropdown('r_durum',array('1' => 'Açık','0' => 'Kapalı'),$reklam[0]->r_durum); ?>
</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">
	<label for="r_sinir">Reklam gösterim sayısı</label>
</li><li class="fd-li">
<input type="text" name="r_sinir" placeholder="Eğer bir sınır belirlemek istemiyorsanız boş bırakın." value="<?php echo $reklam[0]->r_sinir; ?>" />
</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">
	<label for="r_konum">Reklam konumu</label>
</li><li class="fd-li">
<?php 	echo form_dropdown('r_konum',array('1' => 'Film öncesi','2' => 'Üst','3' => '(D3) Kategori altı','4' => 'Sol','5' => 'Sağ','6' => 'Film izle orta','7' => 'Arkaplan'),$reklam[0]->r_konum,'id="rkonum"'); ?>
</li></ul><div style="clear:both"></div>

<ul class="form-duzen" id="ronce" style="display:none;"><li class="fd-li">
	<label for="r_sure">Süre</label>
</li><li class="fd-li">
	<input type="text" name="r_sure" value="<?php echo $reklam[0]->r_sure; ?>"  />
</li></ul>

<div style="clear:both"></div>

<ul class="form-duzen" id="ronce"><li class="fd-li">
	<label for="r_gec">Reklamı geç butonu olsunmu ?</label>
</li><li class="fd-li">
<?php 	echo form_dropdown('r_gec',array('1' => 'Evet','0' => 'Hayır'),$reklam[0]->r_gec); ?>
</li></ul>

<div style="clear:both"></div>
<?php 
$parcala = explode('||',$reklam[0]->r_kod);
if (strlen($parcala[1]) > 0 || strlen($parcala[0]) > 0){
?>
<script type="text/javascript">
$(function(){
	$("#yp_tab .yp_tab:first").show();
	$(".yp_tab_menu a:first").addClass('aktif');
})
</script>
<?php
}else {
?>
<script type="text/javascript">
$(function(){
	$("#yp_tab .yp_tab:last").show();
	$(".yp_tab_menu a:last").addClass('aktif');
})
</script>
<?php
}
?>
<script type="text/javascript">
$(function(){
	$(".yp_tab_menu a").click(function(){
		var i = $(".yp_tab_menu a").index(this);
		$(".yp_tab").hide();
		$(".yp_tab").eq(i).show();
		$(".yp_tab:lt("+i+") input").attr('name','test');
		$(".yp_tab:gt("+i+") input").attr('name','test');
		$(".yp_tab:lt("+i+") textarea").attr('name','test');
		$(".yp_tab:gt("+i+") textarea").attr('name','test');
		$(".yp_tab_menu a").removeClass('aktif');
		$(this).addClass('aktif');
		$(".yp_tab:eq("+i+") input").each(function(i){
		var cl = $(".yp_tab input").eq(i).attr('class');
		$(".yp_tab input").eq(i).attr('name',''+cl+'');
		});
		$(".yp_tab:eq("+i+") textarea").each(function(i){
		var cl = $(".yp_tab textarea").eq(i).attr('class');
		$(".yp_tab textarea").eq(i).attr('name',''+cl+'');
		});
	});
})
</script>
<style type="text/css">
#yp_tab {}
#yp_tab .yp_tab_menu {}
#yp_tab .yp_tab_menu a.aktif{background:white;}
#yp_tab .yp_tab_menu a{border:1px solid #ccc;background:#eee;padding:5px;color:#000;float:left;}
#yp_tab .yp_tab_menu a:first-child{border-right:none;border-radius:5px 0px 0px 0px;}
#yp_tab .yp_tab_menu a:last-child{border-radius:0px 5px 0px 0px;border-left:none;}
#yp_tab .yp_tab_menu a:hover{background:rgb(223, 223, 223);}
#yp_tab .yp_tab{display:none;}
</style>
<?php 
$rkod = $reklam[0]->r_kod;
$parcala = explode('||',$rkod);
// print_r($parcala);
?>
<div id="yp_tab">
<ul class="form-duzen"><li class="fd-li">
</li><li class="fd-li">
<div class="yp_tab_menu">
<a href="#" onclick="return false">Resim ile reklam</a>
<a href="#" onclick="return false">Kod ile reklam</a>
</div>
</li></ul>
<div style="clear:both;"></div>
<div class="yp_tab">
<ul class="form-duzen"><li class="fd-li">
	<label for="r_resim">Reklam resim</label>
</li><li class="fd-li">
<?php 	echo form_input(array('name' => 'r_resim','type' => 'file','class' => 'r_resim')); ?>
<img src="<?php echo $parcala[0]; ?>" style="width:100px;max-height:50px" alt="" />
</li></ul>
<div style="clear:both"></div>

<ul class="form-duzen"><li class="fd-li">
	<label for="r_link">Reklam link</label>
</li><li class="fd-li">
<input type="text" name="r_link" value="<?php echo $parcala[1]; ?>" class="r_link"/>
</li></ul>
<div style="clear:both"></div>
</div>

<div class="yp_tab">
<ul class="form-duzen"><li class="fd-li">
	<label for="r_kod">Reklam kodu</label>
</li><li class="fd-li">
<textarea style="width:98%" class="ckeditor" name="ckeditor" id="" cols="30" rows="10"><?php 
if (!$parcala[0]){
echo $parcala[2];
}
 ?></textarea>
</li></ul>
<div style="clear:both"></div>
</div>

</div>

<ul class="form-duzen">
<li class="fd-li">
</li><li class="fd-li">
	<input type="submit" class="buton" style="padding:10px;width:200px" value="Gönder" name="rd" />
	</form></ul>
