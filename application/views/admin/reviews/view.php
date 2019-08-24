<div data-entries="item">
	<div class="page-preview">
		<div class="img">
			<?=check_img(PATH_UPLOADS.'/'.$folder.'/thumb/'.$item['img'], [], 'user.png');?>
		</div>
		<div class="descr">
			<h4 class="mb15" data-entries="title"><?=$item['name'];?></h4>
			<?=iconlist([
				['text' => $item['phone'] != '' ? $item['phone'] : EMPTY_TEXT, 'icon' => fa('phone'.ICON_SUFFIX)],
				['text' => $item['email'] != '' ? $item['email'] : EMPTY_TEXT, 'icon' => fa('envelope-o'.ICON_SUFFIX)],
				['text' => $item['link'] != '' ? anchor($item['link'], $item['link'], ['target' => '_blank']) : EMPTY_TEXT, 'icon' => fa('link'.ICON_SUFFIX)],
			]);?>
		</div>
	</div>

	<hr class="mt30 mb30" />

	<h3 class="mb20">Информация:</h3>
	
	<?=iconlist([
		iconlist_visibility($item['visibility']),
		['text' => date('d.m.Y H:i', strtotime($item['pub_date'])), 'icon' => fa('bullhorn'.ICON_SUFFIX)],
		['text' => date('d.m.Y H:i', strtotime($item['add_date'])), 'icon' => fa('calendar-plus-o'.ICON_SUFFIX)],
	]);?>

	<hr class="mt30 mb30" />

	<h3 class="mb20">Текст страницы:</h3>
	
	<div class="text-editor">
		<?=$item['text'] != '' ? nl2br($item['text']) : EMPTY_TEXT;?>
	</div>

	<div class="form-actions mt30">
		<?=btn_edit_alt($this->page.'/edit/'.$item['id'])?>
		<?=btn_back($this->page)?>
		<div class="right">
			<?=btn_delete($this->page.'/delete/'.$item['id']);?>
		</div>
	</div>
</div>