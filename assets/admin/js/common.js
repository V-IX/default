$(document).ready(function(){
	
	// CUSTOM SELECT
	
	$('select.form-input').styler();
	
	
	// CUSTOM CHECKERS
	
	$('input[type="checkbox"]').each(function(){
		$(this).wrap('<div class="checker '+$(this).attr('data-class')+'"></div>');
		$(this).after('<div class="checker-view"></div>');
	});
	
	$('input[type="radio"]').each(function(){
		$(this).wrap('<div class="radio '+$(this).attr('data-class')+'"></div>');
		$(this).after('<div class="radio-view"></div>');
	});
	
	
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
		el.after('<a href="javascript:void(0)" class="btn" data-formfile="btn"><i class="fa fa-search"></i><span>Обзор</span></a>');
		el.after('<a href="javascript:void(0)" class="form-file-clear form-file-clear-hidden" data-formfile="clear" title="очистить выбранный файл"><i class="fa fa-times"></i></a>');
		
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
	
	
	// TOOLTIPS
	
	$('[data-toggle="tooltip"], .tooltips').tooltip();
	
	
	// NOTE
	$('.note-close').click(function(){
		$(this).closest('.note').hide();
	});
	
	
	// CUSTOM TABS
	$('.tabs-list a').click(function(){
		var t = $(this).attr('href');
		$(this).closest('.tabs-list').find('a').removeClass('active');
		$(this).addClass('active');
		$(t).fadeIn(300).siblings().hide();
	});
	
	var hash = window.location.hash;
	if(hash.length)
	{
		$('[href="'+hash+'"]').click();
	}
	
});