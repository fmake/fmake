
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
	// слева выбор пола футболок
	$(".s-chose").click(function () {
	    $(".s-chose-group .s-chose").removeClass("s-chose-active");
	    $(this).addClass("s-chose-active");
	});

	// справа выбор мужских футболок
	$(".chose-item div").click(function () {
	    $(".chose-item div").removeClass("active");
	    $(this).addClass("active");
	});

	
});