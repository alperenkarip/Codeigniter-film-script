<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Giriş - Yönetim paneli</title>
</head>
<body>
<style type="text/css">
body {
font-family:Arial;
}
#login-box {
	width:333px;
	height: 352px;
	padding: 58px 76px 0 76px;
	color: #ebebeb;
	font: 12px Arial, Helvetica, sans-serif;
	background: url(tema/resimler/login-box-backg.png) no-repeat left top;
}

#login-box img {
	border:none;
}

#login-box h2 {
	padding:0;
	margin:0;
	color: #ebebeb;
	font: bold 44px "Calibri", Arial;
}


#login-box-name {
	float: left;
	display:inline;
	width:80px;
	text-align: right;
	padding: 14px 10px 0 0;
	margin:0 0 7px 0;
}

#login-box-field {
	float: left;
	display:inline;
	width:230px;
	margin:0;
	margin:0 0 7px 0;
}


.form-login  {
	width: 205px;
	padding: 10px 4px 6px 3px;
	border: 1px solid #0d2c52;
	background-color:#1e4f8a;
	font-size: 16px;
	color: #ebebeb;
}


.login-box-options  {
	clear:both;
	padding-left:87px;
	font-size: 11px;
}

.login-box-options a {
	color: #ebebeb;
	font-size: 11px;
}
.kpgiris {
background:url(tema/resimler/login-btn.png);
width:103px;
height:42px;
margin-left:90px;
border:none;
cursor:pointer;
}
#kpgiris {
width:490px;
margin:0 auto;
}
.kpghata {
padding:5px;
background:#eee;
border:1px solid #ddd;
color:#333;
text-align:center;
margin:5px;
border-radius:5px;
-webkit-border-radius:5px;
-moz-border-radius:5px;
font-size:12px;
}
</style>
<div id="kpgiris">
<?php if ($this->session->flashdata('data')){ ?><div class="kpghata">asdsadsa<?php echo $this->session->flashdata('hata'); ?></div><?php } ?>
<?php echo form_open('yp_giris/k_kontrol'); ?>
<div id="login-box">
<H2>Erenalp</H2>
Erenalp film sistemi yönetim paneli giriş formu.
<br />
<br />
<div id="login-box-name" style="margin-top:20px;">Kullanıcı adı:</div>
<div id="login-box-field" style="margin-top:20px;"><input name="isim" class="form-login" title="Username" value="" size="30" maxlength="2048" /></div>
<div id="login-box-name">Şifre:</div>
<div id="login-box-field"><input name="sifre" type="password" class="form-login" title="Password" value="" size="30" maxlength="2048" /></div>
<br />
<br />
<br />
<?php echo form_submit ('submit','','class="kpgiris"'); ?>
</div>
<?php echo form_close(); ?>
</div>
</body>
</html>