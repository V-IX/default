$(document).ready(function(){
	$('[data-feedback]').click(function(){
		
		$('#popupFeedbackTask').val($(this).attr('data-feedback'));
		
	});
	
	$('[data-toggle="ajaxForm"]').submit(function(event){
		
		event.preventDefault();
		
		var ajaxForm = $(this);
		
		if(ajaxForm.attr('data-thanks')) thanks = ajaxForm.attr('data-thanks');
		else thanks = '#popupThanks';
		
		validation = formValidation(ajaxForm);
		
		if(validation === true)
		{
			var action = ajaxForm.attr('action');
			var data = ajaxForm.serialize();
			
			$.ajax({
				type  : "POST",
				url   : action,
				data  : data,
				cashe : false,
				async : false,
				error : function () {
					alert('Ошибка запроса');
					return false;
				},
				success : function(data) {
					if(!!!data.error && data.error != false)
					{
						alert('Ошибка запроса');
						return false;
					}
					
					if (data.error) {
						alert (data.error);
						return false;
					}
					
					$('[data-modal="close"]').click();
					modal_show(thanks);
					
					ajaxForm.find('.form-input').val('');
					
				},
			});
		}
		return false;
	});
	
	$('[data-rules="required"]').change(function(){
		$(this).removeClass('input-error');
	});
	
	$('[data-input="email"]').change(function(){
		var pattern = /^([a-z0-9_.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
		if(pattern.test($(this).val())){
			$(this).removeClass('input-error');
		}
	});
	
	$('[data-input="num"]').bind("change keyup input click", function() {
		if (this.value.match(/[^0-9]/g)) {
			this.value = this.value.replace(/[^0-9]/g, '');
		}
	});
	
	$('[data-input="text"]').bind("change keyup input click", function() {
		if (this.value.match(/[^a-zA-Zа-яА-ЯёЁ .]/g)) {
			this.value = this.value.replace(/[^a-zA-Zа-яА-ЯёЁ .]/g, '');
		}
	});
});

function formValidation(form)
{
	validation = true;
	
	form.find('[data-rules="required"]').each(function(){
		formInput = $(this);
		v = $.trim(formInput.val());
		formInput.val(v);
		if(formInput.val() === ""){
			formInput.addClass('input-error');
			validation = false;
		}
	});
	
	form.find('[data-input="email"]').each(function(){
		formInput = $(this);
		v = $.trim(formInput.val());
		
		formEmailPattern = /^([a-z0-9_.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
		if(formInput.val() !== "" && !formEmailPattern.test(formInput.val())){
			formInput.addClass('input-error');
			validation = false;
		}
	});
	
	return validation;
}