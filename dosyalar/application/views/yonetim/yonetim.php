<?php 
echo $this->load->view('yonetim/ust');
?>
	<div id="ust">
	<div id="usol"><img src="<?php echo base_url(); ?>tema/resimler/erenalp.png" alt="" /></div>
	<div id="usag">
	<ul>
	<li><h1><a href="<?php echo site_url(); ?>yonetim/ping">PİNG AT</a></h1></li>
	<li><img src="<?php echo base_url().'tema/resimler/Comment-icon.png'; ?>" width="24" alt="" /><font><?php echo $onaysiz_yorumlar; ?> Onaysız</font></li>
	<li><img src="<?php echo base_url().'tema/resimler/mail_2.png'; ?>" width="24" alt="" /><font><?php echo $okunmamis; ?> Okunmamış</font></li>
	<li><?php echo 'Hoşgeldin, <strong>'.$this->session->userdata('kadi').'</strong>'; ?>
	<a href="<?php echo site_url(); ?>/yonetim/panel/cikis" class="power"></a></li>
	</ul>
	</div>
	</div>
	<div id="sol">
	<script type="text/javascript">
	$(document).ready(function(){
	$("#solMenu li a").hover(function(){
	var i = $("#solMenu li a").index(this);
	$("#solMenu li font").eq(i).show('fast');
	},function(){
	var i = $("#solMenu li a").index(this);
	$("#solMenu li font").eq(i).hide('fast');
	});
	});
	</script>
	<div id="solMenu">
	<ul>
	<li><font>Sistem ayarları</font><a title="Sistem ayarları" class="ypm-sistem" href="<?php echo site_url(); ?>yonetim/panel/sistem_ayarlari"></a></li>
	<li><font>Mesajlar</font><a title="Mesajlar" class="ypm-mesaj" href="<?php echo site_url(); ?>yonetim/mesajlar"></a></li>
	<li><font>Filmler</font><a title="Filmler" class="ypm-filmler" href="<?php echo site_url(); ?>yonetim/filmler"></a></li>
	<li><font>Etiketler</font><a title="Etiketler" class="ypm-etiketler" href="<?php echo site_url(); ?>yonetim/etiketler"></a></li>
	<li  style="height:43px;"><font>Türler</font><a title="Türler" class="ypm-turler" href="<?php echo site_url(); ?>yonetim/turler"></a></li>
	<li><font>Partlar</font><a title="Partlar" class="ypm-partlar" href="<?php echo site_url(); ?>yonetim/partlar"></a></li>
	<li style="height:44px;"><font>Yorumlar</font><a title="Yorumlar" class="ypm-yorumlar" href="<?php echo site_url(); ?>yonetim/yorumlar"></a></li>
	<li><font>Takım</font><a class="ypm-takim" title="Takım" href="<?php echo site_url(); ?>yonetim/takim"></a></li>
	<li><font>Sayfalar</font><a class="ypm-sayfalar" title="Sayfalar" href="<?php echo site_url(); ?>yonetim/sayfalar"></a></li>
	<li><font>Anketler</font><a class="ypm-puanlar" title="Anketler" href="<?php echo site_url(); ?>yonetim/anketler"></a></li>
	<li><font>Reklamlar</font><a class="ypm-reklamlar" title="Reklamlar" href="<?php echo site_url(); ?>yonetim/reklamlar"></a></li>
	<li><font>Film botları</font><a class="ypm-zaman" title="Film botları" href="<?php echo site_url(); ?>yonetim/bot"></a></li>
	</ul>
	</div>
	</div>
	<div id="sagUst"><h3>Sağ üst</h3></div>
	<div id="sag">
	<?php if ($this->session->flashdata('mesaj')){ 
	echo "<div class='dialog info'><span class='close' id='info'></span><span class='icon'></span><h1>UYARI</h1><p>".$this->session->flashdata('mesaj')."</p></div>";
	} $this->load->view($goster); ?></div>
</body>
</html>