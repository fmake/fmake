
function getBodyScrollTop()
{
  return self.pageYOffset || (document.documentElement && document.documentElement.scrollTop) || (document.body && document.body.scrollTop);
}


function showBasket() {
	$("#hide-all").show();

	$('#hide-all').css({
		width:		$(document).width(),
		height:		$(document).height()
	});
	
	$(".basket-show").css({
		top:		getBodyScrollTop() + 40
	});
}


$(document).ready(function(){
	// ����� ����� ���� ��������
	$(".s-chose").live('click',function () {
	    $(".s-chose-group .s-chose").removeClass("s-chose-active");
	    $(this).addClass("s-chose-active");
	});

	// ������ ����� ������� ��������
	$(".chose-item div").live('click',function () {
	    $(".chose-item div").removeClass("active");
	    $(this).addClass("active");
	});

	
});