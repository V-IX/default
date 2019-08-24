$(document).ready(function(){
	
	// CUSTOM INPUT FILE
	
	formfile = '[data-toggle="formfile"]';
	formfileItem = '[data-formfile="item"]';
	formfileInput = '[data-formfile="input"]';
	formfileBtn = '[data-formfile="btn"]';
	formfileClear = '[data-formfile="clear"]';
	
	$(formfile).each(function(){
		
		el = $(this);
		id = el.attr('name');
		
		el.wrap('<div class="form-file" data-formfile="item" data-formfile-name="' + name + '"></div>');
		el.after('<input type="text" class="form-input" data-formfile="input" readonly placeholder="Файл не выбран" />');
		el.after('<a href="javascript:void(0)" class="btn" data-formfile="btn"><i class="fa5 fas fa-search"></i><span>Обзор</span></a>');
		el.after('<a href="javascript:void(0)" class="form-file-clear form-file-clear-hidden" data-formfile="clear" title="очистить выбранный файл"><i class="fa5 fas fa-times"></i></a>');
		
	});
	
	$(formfileBtn).click(function(event){
		
		event.preventDefault();
		
		$(this).closest(formfileItem).find(formfile).click();
		
		return false;
		
	});
	
	$(formfile).change(function() {
		
		el = $(this);
		val = el.val().split("\\");
		newVal = val[val.length-1];
		
		el.closest(formfileItem).find(formfileInput).val(newVal);
		closer = el.closest(formfileItem).find(formfileClear);
		
		if(newVal == '') closer.addClass('form-file-clear-hidden');
		else closer.removeClass('form-file-clear-hidden');
		
	});
	
	$(formfileClear).click(function(event){
		
		event.preventDefault();
		
		item = $(this).closest(formfileItem);
		item.find(formfile).val('');
		item.find(formfileInput).val('');
		
		$(this).addClass('form-file-clear-hidden');
		
		return false;
		
	});
	
});


// MODALS

$(document).ready(function(){
	
	$(document).on('click', '[data-toggle="modal"]', function(){
		
		event.preventDefault();
		
		id = $(this).attr('href');
		modal_show(id);
		
	});
	
	$(document).on('click', '[data-modal="close"]', function(){
		
		event.preventDefault();
		
		container = $(this).closest('[data-modal-container]');
		container.hide();
		container.find('.popup').removeClass('show');
		
		$('body').removeClass('overflow');
		
	});
	
});
	
function modal_show(id)
{
	if($('body > [data-modal-container="' + id + '"]').size() == 0)
	{
		$('body').append('<div class="popup-container" data-modal="container" data-modal-container="' + id + '"><div class="popup-background" data-modal="close"></div></div>');
		$(id).appendTo('[data-modal-container="' + id + '"]');
	}
	
	$('body').addClass('overflow');
	
	$('[data-modal-container="' + id + '"]').fadeIn(100, function(){
		$('[data-modal-container="' + id + '"] .popup').addClass('show');
	});
}

function modal_hide(id)
{
	$(id).removeClass('show');
	$(id).closest('[data-modal-container]').hide();
	
	$('body').removeClass('overflow');
}