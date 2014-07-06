<script type="text/javascript">
$(function () {
    $("select").selectbox();
});
</script>
	<form action="" method="post">
	<div id="ypf_sol">
<ul class="form-duzen"><li class="fd-li">
	<label for="a_baslik">Başlık</label>
</li><li class="fd-li">
	<input type="text" value="<?php echo $anket[0]->anket_baslik; ?>" name="a_baslik" />
</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">
<label for="film_tip">Durum</label>
</li><li class="fd-li">
<select name="durum">
<option value="1" <?php echo $anket[0]->anket_durum == 1 ? "selected=\"selected\"" : ""; ?>>Aktif</option>
<option value="0" <?php echo $anket[0]->anket_durum == 0 ? "selected=\"selected\"" : ""; ?>>Pasif</option>
</select>
</li></ul><div style="clear:both"></div>
</div>

<div id="ypf_sag">
<script type="text/javascript">
	$(document).ready(function(){
		var pb = $(".pb");

	pb.live('blur',partBaslik);
		
		
		function partBaslik(){
		var baslik = $(this).val();
		var sid = $(this).attr('id');
		$.post('',{'baslik':baslik,'sid':sid},function(sonuc){

		});
		}
				
		$("#f_part_ekle").live('click',function(){
		var esayi = $(".eklenecek").length;
		if (esayi < 1){
		var psay = $("#partlari ul li").length+1;
		var data = parseInt($("#partlari ul li:last").attr('data'))+1;
		$("#partlari ul:last").append('<li class="eklenecek" data="'+data+'" style="width:405px"><span></span><input type="text" name="p_baslik" class="pb" style="width:80%;" /><div class="dpsonuc"><a href="#" onclick="return false;" class="yp_ekle" ><div class="icon-ok"></div></a></div></li>');
		$(".yp_ekle").click(function(){
		$("#partlari ul li:last").removeClass('eklenecek');
		$("#partlari ul li:last").removeClass('hatali');
		});
		}else {
		$("#partlari ul li:last").addClass('hatali');
		}
		});
		
		
		$(".yp_ekle").live('click',function(){
		var anket_baslik = $("#partlari ul li:last input:first").val();
		$.post('',{'anketekle':'anketekle','anket_baslik':anket_baslik,'aid':"<?php echo $anket[0]->id; ?>"},function(sonuc){
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
		var sid = $("#partlari ul li:eq("+i+") input").attr('id');
		$.post('',{'soru_sil':'ps','sid':sid},function(sonuc){
		$("#prt").html(sonuc);
		duzelt();
		});
		}
		});
		
		duzelt();
		
	});
</script>
<div style="clear:both;"></div>
<div id="prt">
<?php $this->load->view('yonetim/anket_siklar'); ?>
</div>
</div>
<div style="clear:both;"></div>
<div style="margin:0 auto;width:250px;"><input type="submit" style="width:250px;padding:10px" class="buton" name="anket_guncelle" value="Gönder"></div>

</form>