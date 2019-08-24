$(document).ready(function(){
	
	// DELETE MODAL
	
	$('[data-entries="delete"]').click(function(event){
		
		event.preventDefault();
		
		el = $(this);
		
		$('#deleteEntryForm').attr('action', el.attr('href'));
		$('#deleteEntryTitle').text('"' + el.closest('[data-entries="item"]').find('[data-entries="title"]').text() + '"');
		
		$('#deleteEntryModal').modal('show');
		
		return false;
	})
	
	
	// ENTRIES TREE
	
	$('[data-entries="title"]').click(function(){
		el = $(this);
		parent = el.closest('[data-entrie-id]');
		id = parent.attr('data-entrie-id');
		items = $('[data-entrie-parent="' + id + '"]');
		
		if(parent.hasClass('entries-tree-item-open'))
		{
			parent.removeClass('entries-tree-item-open');
			entries_tree_hide(id);
			
		} else {
			
			parent.addClass('entries-tree-item-open');
			items.show();
		}
	});
	
	function entries_tree_hide(id)
	{
		items = $('[data-entrie-parent="' + id + '"]');
		size = items.size();
		if(size > 0)
		{
			items.each(function(){
				el = $(this);
				el_id = el.attr('data-entrie-id');
				
				el.hide();
				el.removeClass('entries-tree-item-open');
				
				entries_tree_hide(el_id);
			});
		}
	}
	
	
	// AJAX IMAGE DELETE
	
	$('[data-formfile-remove]').click(function(event){
		
		event.preventDefault();
		
		if(!confirm('Удалить изображение?')) return;
		
		el = $(this);
		action = el.attr('href');
		type = el.attr('data-formfile-remove');
		
		$.ajax({
			type: "POST",
			url: action,
			data: {
				csrf_test_name : csrf_test_name,
				type: type,
				delete_img : 'delete'
			},
			error: function () {
				alert('Ошибка запроса');
			},
			success: function(data) {
				if(data.error)
				{
					alert(data.error);
					return false;
				}
				
				el.closest('[data-formfile="preview"]').remove();
			}
        });
		
		return false;
	});
	
	
	// SAVE AND EXIT
	
	$('[data-entryform="close"]').click(function(){
		
		el = $(this).closest('[data-toggle="entryform"]');
		el.attr('action', el.attr('action') + '/close');
		
		return;
		
	});
	
	
	// STRING COUNTER
	
	$('[data-toggle="strcount"]').each(function(){
		
		el = $(this);
		id = el.attr('name');
		counter = $('[data-strcount="' + id + '"]');
		total = el.attr('data-strcount-needle')
		counter.html('<span data-strcount-text="count">0</span> / <span data-strcount-text="total">' + total + '</span>')
		
		string_counter($(this));
	});
	
	$('[data-toggle="strcount"]').bind('input', function(){
		string_counter($(this));
	});
	
	function string_counter(el)
	{
		id = el.attr('name');
		counter = $('[data-strcount="' + id + '"]');
		counter_current = counter.find('[data-strcount-text="count"]');
		
		current = parseInt(el.val().length);
		total = parseInt(el.attr('data-strcount-needle'));
		allow = parseInt(el.attr('data-strcount-allow'));
		
		counter_current.text(current);
		
		if(current == 0 || current > total) {
			
			counter.attr('class', 'form-counter text-error');
		
		} else if(current >= allow && current <= total) {
			
			counter.attr('class', 'form-counter text-success');
			
		} else {
			
			counter.attr('class', 'form-counter text-warning');
			
		}
	}
	
	
	// ALIAS AND META TITLE
	
	$('[data-toggle="translate_title"]').click(function(){
		$('[name="alias"]').val(translit($('[name="title"]').val(), true));
	});
	
	$('[data-toggle="copy_title"]').click(function(){
		$('[name="meta_title"]').val($('[name="title"]').val());
	});
	
	$('[name="title"]').change(function(){
		v = $(this).val();
		alias = $('[name="alias"]');
		meta_title = $('[name="meta_title"]');
		
		if(alias.size() && alias.val() == '')
			alias.val(translit(v, true));
		
		if(meta_title.size() && meta_title.val() == '')
			meta_title.val(v);
	});
	
});


function translit(str, lower)
{
	var space = '-';
	if(lower) str = str.toLowerCase();
	var transl = {
		'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'e', 'ж': 'zh',  'з': 'z', 'и': 'i', 'й': 'j', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n', 'о': 'o', 'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'h', 'ц': 'c', 'ч': 'ch', 'ш': 'sh', 'щ': 'sh', 'ъ': '', 'ы': 'y', 'ь': '', 'э': 'e', 'ю': 'yu', 'я': 'ya', 'А': 'A', 'Б': 'B', 'В': 'V', 'Г': 'G', 'Д': 'D', 'Е': 'E', 'Ё': 'E', 'Ж': 'ZH',  'З': 'Z', 'И': 'I', 'Й': 'J', 'К': 'K', 'Л': 'L', 'М': 'M', 'Н': 'N', 'О': 'O', 'П': 'P', 'Р': 'R', 'С': 'S', 'Т': 'T', 'У': 'U', 'Ф': 'F', 'Х': 'H', 'Ц': 'C', 'Ч': 'CH', 'Ш': 'SH', 'Щ': 'SH', 'Ъ': '', 'Ы': 'Y', 'Ь': '', 'Э': 'E', 'Ю': 'YU', 'Я': 'YA', ' ': space, '_': space, '`': space, '~': space, '!': space, '@': space, '#': space, '$': space, '%': space, '^': space, '&': space, '*': space, '(': space, ')': space, '-': space, '\=': space, '+': space, '[': space, ']': space, '\\': space, '|': space, '/': space, '.': space, ',': space, '{': space, '}': space, '\'': space, '"': space, ';': space, ':': space, '?': space, '<': space, '>': space, '№':	space, '»':	space, '«':	space
	};
	var result = '';
	var current_sim = '';
					
	for(var i=0; i < str.length; i++) {
		if(transl[str[i]] !== undefined) {
			 if(current_sim !== transl[str[i]] || current_sim !== space){
				 result += transl[str[i]];
				 current_sim = transl[str[i]];
															}                                                                             
		}
		else {
			result += str[i];
			current_sim = str[i];
		}                              
	}
	return TrimStr(result);
}

function TrimStr(s) {
	s = s.replace(/^-/, '');
	return s.replace(/[-]{2,}/gim, '-').replace(/[^-0-9a-zA-Z]/gim,'');
}