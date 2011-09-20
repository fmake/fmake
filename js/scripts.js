function getObj(id){
	return document.getElementById(id);
}

function moreSearch(){

	if(getObj('filters').style.display == 'none' || getObj('filters').style.display == ''){
		getObj('filters').style.display = 'block';
		getObj('filters_true').value = 1;
		getObj('arrow').innerHTML = '&#9650;';
	}else{
		getObj('filters').style.display = 'none';
		getObj('filters_true').value = 0;
		getObj('arrow').innerHTML = '&#9660;';
	}
}





function toObj(str){
	var arr = str.split(";");
	var obj = {};
	for(var i=0;i<arr.length;i++){
		var tmp = arr[i].split(":");
		obj[tmp[0]] = tmp[1];
	}
	return obj;
}

function showChild(parent){
	parentData = toObj($('#'+parent).attr('rel'));
	alert(parentData['id']);
}

function setGeneralParent(from,to){
	
	// выставить одного родителя
	from = toObj(from);
	to = toObj(to);
	xajax_setGeneralParent(from['id'],to['id']);
	
}

function setParent(child,parent){
	// выставить родителя
	parent = toObj(parent);
	child = toObj(child);
	xajax_setParent(child['id'],parent['id']);
}

$(document).ready(function(){	

	// если нужно оставить действия
	notRemove = false;
	$("#tree li div").hover(function(){
		if(!notRemove)
			$(this).addClass("hover-li");
	},function(){
		if(!notRemove)
			$(this).removeClass("hover-li");
	});
	

	nowDraggable = false;
	$(".draggable").draggable({
		//containment: '#center',
		opacity: 0.9,
		handle: '.cursor-move',
		addClasses: "hide-action",
		helper: function(event, ui) {
			nowDraggable = !nowDraggable;
			return $(this).clone().find("div").eq(0).addClass("hide-action");
		},
		stop: function(event, ui) {
			//nowDraggable = false;
			;
		},
		tolerance: 'pointer' 
	}).disableSelection();
	

	

	
	$(".droppable div").droppable({
		hoverClass: 'ui-state-active-div',
		greedy: true,
		drop: function(event, ui) {
			setGeneralParent(ui.draggable.attr("rel"),$(this).parent().attr("rel"));
			$(this).parent().after(ui.draggable);
		}
	});
	$(".droppable_inner").droppable({
		hoverClass: 'ui-state-active',
		greedy: true,
		drop: function(event, ui) {
		
			setParent(ui.draggable.attr("rel"),$(this).parent().parent().attr("rel"));
			$(this).parent().parent().find(".children").eq(0).append(ui.draggable);
		}
	});
	
});


// управляем сменой приудалении
function showChange(show_id,selector_id){
	$('#'+show_id).css('display','block');
	xajax_getSelector(selector_id);
	notRemove = true;
	return false;
}

function hideChange(show_id){
	$('#'+show_id).css('display','none');
	notRemove = false;
	return false;
}




// checkbox 
classesGlobalArray = ['category-check','subject-check'];
function checkCount(classArray){
	var querysStr = [];
	querysStr[0] = '';
	querysStr[1] = '';
	var count = 0;
	for(var i=0;i < classArray.length; i++){
		$("."+classArray[i]).each(function(){
			if($(this).attr("checked")){
				querysStr[i] += $(this).val()+",";
				count++;
			}
		 });
	}
	//alert(querysStr[1]);
	if(count > 0){
		$("#fixed-count-sites").show();
	}
	xajax_getCountSite(querysStr[0],querysStr[1]);
}

function check_children(obj,className){

	if($(obj).attr("checked")){
		//alert(className);
		$("."+className).attr("checked", "checked"); 
	}else{
		$("."+className).attr("checked", ""); 
	}	
	checkCount(classesGlobalArray);

}








