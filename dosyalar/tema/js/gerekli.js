		function duzelt(){
		$("#partlari ul li:first span a#pyukari").remove();
		$("#partlari ul li:last span a#pasagi").remove();
		$("#partlari ul li:last span").css({'width':'30px','margin-left':'13px'});
		$("#partlari ul li:first span").css({'width':'30px','margin-left':'13px'});
		}
$(function(){
	var d = $("#d4filmler*").eq(0).html();
	$("#duzen4sol").html(d);
	$("#duzen4sag a.d4film").hover(function(){
	var i = $("#duzen4sag a.d4film").index(this);
	var d = $("#d4filmler*").eq(i).html();
	$("#duzen4sol").html(d);
	});
	$("a.manh").hover(function(){
	var i = $(".manh").index(this);
		$("#ust2sag #mturler .mmenuicerik").eq(i).show();
	},function(){
		$("#ust2sag #mturler .mmenuicerik").hide();
	});
	$(".mmenuicerik").hover(function(){
	var i = $(".mmenuicerik").index(this);
	$("#ust2sag #mturler .mmenuicerik").eq(i).show();
	},function(){
	$("#ust2sag #mturler .mmenuicerik").hide();
	});
	
$(".film_kod .postTabs_titles").next().remove();
$(".film_kod .postTabs_titles").remove();
$(".film_kod iframe").css({'height':'100%'});
$(".film_kod iframe").css({'width':'100%'});
	
	$("#i2fpuan ul li a").live('click',function(){
		var tip = $(this).attr('class');
		$.post('',{'tip':tip,'puanver':'puanver'},function(sonuc){
		$("#i2fpuan").html(sonuc);
		});
		return false;
	});
	$(".anketsg").click(function(){
	var index = $(".anketsg").index(this);
	$("ul.anketsc:eq("+index+") li").each(function(i){
	var yuzde = $(this).attr('class');
	$("ul.anketsc:eq("+index+") li .anketyuzdecizgi").eq(i).animate({
	'width':''+yuzde+'%'
	},1700);
	// $("ul.anketsc:eq("+index+") li font").eq(i).fadeIn('slow');
	});
	return false;
	});
	$(".anketov").click(function(){
	var index = $(".anketov").index(this);
	var kntrl = $(".anketsc:eq("+index+") li .anketinput input:checked").length;
	if (kntrl > 0){
	var anketid = $(".anketsc:eq("+index+") li").attr('id');
	var cid = $(".anketsc:eq("+index+") li .anketinput input:checked").val();
	$.ajax({
	type:"POST",
	url:"",
	data:{'anketid':anketid,'soruid':cid,'anketoy':'ver'},
	success:function(sonuc){
	$("ul.anketsc:eq("+index+") li").each(function(i){
	var yuzde = $(this).attr('class');
	$("ul.anketsc:eq("+index+") li .anketyuzdecizgi").eq(i).animate({
	'width':''+yuzde+'%'
	},1700);
	$("ul.anketsc:eq("+index+") li .anketinput").eq(i).hide().fadeIn('slow').html(''+yuzde+'%');
	$("ul.anketsc:eq("+index+") li .anketinput input").remove();
	});
	}
	});}else {
	alert("Herhangi bir şıkkı işaretlemediniz..");
	}
	return false;
	});
});