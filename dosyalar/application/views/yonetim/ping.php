<h2 style="padding:5px;text-align:center;">Sıksık ping atmaktan sakının. Botlar sitenizi aynı halde bulmaması gerekir. Ancak yeni bir film girildiğinde ping atın.
</br>
Ping atma işlemi uzun sürer. Pingler atılana kadar sayfayı kapatmayınız.
</h2>
<div id="ypf_sol">
<style type="text/css">
#ipler {background:#eee;border:1px solid #ccc;padding:5px;height:400px;overflow:auto;}
.ipler {background:#eee;border:1px solid #ccc;padding:5px;height:400px;overflow:auto;}
</style>
<form action="" method="post">
<textarea name="pingat" id="ipler" cols="30" rows="10">
<?php 
if ($this->input->post('pingat')){
for ($i = 0; $i < $len; $i++) {
    $pingurl = trim($oku[$i]);    
    pingle($pingurl,$site,$url,"weblogUpdates.ping");
    pingle($pingurl,$site,$url,"weblogUpdates.extendedPing");
}
}
?>
</textarea>
<input type="submit" name="pingat" value="PİNG AT" class="buton" />
</form>
</div>
<div id="ypf_sag" style="width:500px;">
<form action="" method="post">
<textarea name="ipler" class="ipler">
<?php
	foreach ($parcala as $ip){
	echo $ip;
	}
 ?>
</textarea>
<input type="submit" value="Listeyi kaydet" class="buton" />
</form>
</div>