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
	<input type="text" name="a_baslik" />
</li></ul><div style="clear:both"></div><ul class="form-duzen"><li class="fd-li">
<label for="film_tip">Durum</label>
</li><li class="fd-li">
<select name="durum"><option value="1">Aktif</option><option value="0">Pasif</option></select>
</li></ul><div style="clear:both"></div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#f_part_ekle").click(function(i){
		var say = $("#partlari ul li").length;
			$("#partlari ul").append('<li class="z" id="'+say+'"><span class="psayisi"><a href="#" onclick="return false;" class="icon-trash" id="partsil"></a><a href="#" onclick="return false;" class="icon-arrow-up" id="pyukari"></a><a href="#" onclick="return false;" class="icon-arrow-down" id="pasagi"></a></span><input type="text"  name="p_baslik[]" class="pb" style="width:80%"/><div class="dpsonuc" ></div>	</li>');			
		});

jQuery.fn.sortElements = (function(){
 
    var sort = [].sort;
 
    return function(comparator, getSortable) {
 
        getSortable = getSortable || function(){return this;};
 
        var placements = this.map(function(){
 
            var sortElement = getSortable.call(this),
                parentNode = sortElement.parentNode,
 
                // Since the element itself will change position, we have
                // to have some way of storing its original position in
                // the DOM. The easiest way is to have a 'flag' node:
                nextSibling = parentNode.insertBefore(
                    document.createTextNode(''),
                    sortElement.nextSibling
                );
 
            return function() {
 
                if (parentNode === this) {
                    throw new Error(
                        "You can't sort elements if any one is a descendant of another."
                    );
                }
 
                // Insert before flag:
                parentNode.insertBefore(this, nextSibling);
                // Remove flag:
                parentNode.removeChild(nextSibling);
 
            };
 
        });
 
        return sort.call(this, comparator).each(function(i){
            placements[i].call(getSortable.call(this));
        });
 
    };
 
})();

jQuery(function($) {
    $('.z').sortElements(function(a, b){
        return parseFloat($(a).attr('id')) > parseFloat($(b).attr('id')) ? 1 : -1;
    });
});

		$("#pyukari").live('click',function(){
		
			var i = $("#partlari ul li #pyukari").index(this);
var z = i-1;			
			$("#partlari ul li").eq(i).attr('id',''+z+'');
			$("#partlari ul li").eq(z).attr('id',''+i+'');
			jQuery(function($) {
    $('.z').sortElements(function(a, b){
        return parseFloat($(a).attr('id')) > parseFloat($(b).attr('id')) ? 1 : -1;
    });
});
		});
		$("#pasagi").live('click',function(){
		
			var i = $("#partlari ul li #pasagi").index(this);
var z = i+1;			
			$("#partlari ul li").eq(i).attr('id',''+z+'');
			$("#partlari ul li").eq(z).attr('id',''+i+'');
			jQuery(function($) {
    $('.z').sortElements(function(a, b){
        return parseFloat($(a).attr('id')) > parseFloat($(b).attr('id')) ? 1 : -1;
    });
});
		});
	
		$("#partlari ul li a#partsil").live('click',function(){
			if (confirm("Silmek istediğinizden eminmisiniz?")){
			var i = $("#partlari ul li #partsil").index(this);
			$("#partlari ul li").eq(i).remove();
			}
		});
		
	});
</script>
<div id="ypf_sag">
<div id="prt">
<div id="partlari">
<a href="#" onclick="return false;" id="f_part_ekle" class="buton">Anket ekle</a>
	<ul>
			<li class="z" id="0">
			<span class="psayisi">
			<a href="#" class="icon-trash" onclick="return false;" id="partsil"></a>
			<a href="#" class="icon-arrow-up" onclick="return false;" id="pyukari"></a>
			<a href="#" class="icon-arrow-down" onclick="return false;" id="pasagi"></a>
			</span>
	
			<input type="text"  name="p_baslik[]" class="pb" style="width:80%"/>
			<div class="dpsonuc" ></div>
			</li>		
			
	</ul>
</div>
</div>
</div>
<div style="clear:both;"></div>
<div style="margin:0 auto;width:250px;"><input type="submit" style="width:250px;padding:10px" class="buton" name="aekle" value="Gönder"></div>

</form>