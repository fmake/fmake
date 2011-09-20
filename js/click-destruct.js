destruct = {};
idMetod = 0;
function destructExec(){
	jQuery.each(destruct, function(func, obj) {
		if(typeof(obj.func) == "function" && !obj.notDestruct){
			obj.func(obj.element,obj.val);
		}else{
			delete obj.notDestruct;
		}
	});
}

function addDestruct(method,param){
	destruct[method] = {val:param};	
}

function getFnName(fn) {
	//alert(getFnName(arguments.callee));
    return fn.toString().match(/function ([^(]*)\(/)[1];
}

function addOnclick(selector,clickMethod,destructMethod,param){
	if(typeof(clickMethod) != "function"){alert(clickMethod + ' it`s no function');}
	if(typeof(destructMethod) != "function"){alert(destructMethod + ' it`s no function');}
	//alert(destructMethod + ' it`s no function');
	destruct[getFnName(clickMethod)+idMetod++] = {func:destructMethod,val:param,element:$(selector)};	
	$(selector).click(function(){
		if(clickMethod(this,param,destruct)){
			//alert(destruct[destructMethod].notDestruct);
			return true;
		}
		return false;
	});
}

$("html").click(function(){
	destructExec();
});