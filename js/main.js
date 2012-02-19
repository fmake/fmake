$(document).ready(function(){
	$('div.feedback_input input[name="email"]').focus(
		function(){
			if($(this).val()=='' || $(this).val()=='E-mail')$(this).attr('value','');
		}
	);
	$('div.feedback_input input[name="email"]').focusout(
		function(){
			if($(this).val()=='') $(this).attr('value','E-mail');
		}
	);
	$('div.feedback_input input[name="name"]').focus(
		function(){
			if($(this).val()=='' || $(this).val()=='Имя')$(this).attr('value','');
		}
	);
	$('div.feedback_input input[name="name"]').focusout(
		function(){
			if($(this).val()=='') $(this).attr('value','Имя');
		}
	);	
	$('.feedback .feedback_submit button').live('click',function(){
		var flag = 1;
		var valid_email = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
		if(!valid_email.test($('div.feedback_input input[name="email"]').val()) || $('div.feedback_input input[name="email"]').val()==''){
			flag=0;
			$('div.feedback_input input[name="email"]').css('border','1px solid red');
		}
		if($('div.feedback_input input[name="name"]').val()==''){
			flag=0;
			$('div.feedback_input input[name="name"]').css('border','1px solid red');			
		}
		if(flag){
			alert("Ваша заявка принята.");
			$('.feedback form').submit();
		}
		return false;
	});
});