<div data-entries="item">
	<div class="page-preview">
		<div class="img">
			<?=check_img(PATH_UPLOADS.'/'.$folder.'/thumb/'.$item['img']);?>
		</div>
		<div class="descr">
			<h4 class="mb15" data-entries="title"><?=$item['title'];?></h4>
			<?=iconlist([
				['text' => anchor($this->page.'/'.$item['alias'], '', ['target' => '_blank']), 'icon' => fa('external-link'.ICON_SUFFIX)],
				['text' => $item['brief'] != '' ? nl2br($item['brief']) : EMPTY_TEXT, 'icon' => fa('file-text-o'.ICON_SUFFIX)],
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
		<?=$item['text'] != '' ? $item['text'] : EMPTY_TEXT;?>
	</div>

	<hr class="mt30 mb30" />

	<h3 class="mb20">SEO:</h3>

	<?=iconlist([
		['text' => $item['meta_title'] != '' ? $item['meta_title'] : EMPTY_TEXT, 'icon' => fa('bullhorn'.ICON_SUFFIX)],
		['text' => $item['meta_description'] != '' ? nl2br($item['meta_description']) : EMPTY_TEXT, 'icon' => fa('tags'.ICON_SUFFIX)],
		['text' => $item['img_alt'] != '' ? $item['img_alt'] : EMPTY_TEXT, 'icon' => fa('image'.ICON_SUFFIX)],
	]);?>

	<div class="form-actions mt30">
		<?=btn_edit_alt($this->page.'/edit/'.$item['id'])?>
		<?=btn_back($this->page)?>
		<div class="right">
			<?=btn_delete($this->page.'/delete/'.$item['id']);?>
		</div>
	</div>
</div>