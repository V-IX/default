<div class="page-preview">
	<div class="img"><?=check_img('assets/uploads/settings/'.$siteinfo['img'], array());?></div>
	<div class="descr">
		<h2 class="bold mb5"><?=$siteinfo['title'];?></h2>
		<div class="h4 text-gray"><?=$siteinfo['descr'];?></div>
	</div>
</div>

<hr class="mt30 mb30" />

<h3 class="mb20">Информация:</h3>

<?=iconlist([
	['text' => $siteinfo['owner'] != '' ? $siteinfo['owner'] : EMPTY_TEXT, 'icon' => fa('user'.ICON_SUFFIX)],
	['text' => $siteinfo['details'] != '' ? nl2br($siteinfo['details']) : EMPTY_TEXT, 'icon' => fa('file-text-o'.ICON_SUFFIX)],
	['text' => $siteinfo['copyright'] != '' ? nl2br($siteinfo['copyright']) : EMPTY_TEXT, 'icon' => fa('copyright'.ICON_SUFFIX)],
]);?>

<hr class="mt30 mb30" />

<h3 class="mb20">Контакты:</h3>

<?=iconlist([
	['text' => $siteinfo['email'] != '' ? $siteinfo['email'] : EMPTY_TEXT, 'icon' => fa('envelope-o'.ICON_SUFFIX)],
	['text' => $siteinfo['phone'] != '' ? mask($siteinfo['phone'], $siteinfo['mask_phone']) : EMPTY_TEXT, 'icon' => fa('phone'.ICON_SUFFIX)],
	['text' => $siteinfo['phone_extra'] != '' ? mask($siteinfo['phone_extra'], $siteinfo['mask_phone_extra']) : EMPTY_TEXT, 'icon' => fa('phone'.ICON_SUFFIX)],
	['text' => $siteinfo['phone_city'] != '' ? mask($siteinfo['phone_city'], $siteinfo['mask_phone_city']) : EMPTY_TEXT, 'icon' => fa('phone-square'.ICON_SUFFIX)],
	['text' => $siteinfo['skype'] != '' ? $siteinfo['skype'] : EMPTY_TEXT, 'icon' => fa('skype'.ICON_SUFFIX)],
	['text' => $siteinfo['address'] != '' ? nl2br($siteinfo['address']) : EMPTY_TEXT, 'icon' => fa('map-marker'.ICON_SUFFIX)],
]);?>

<hr class="mt30 mb30" />

<h3 class="mb20">SEO:</h3>

<?=iconlist([
	['text' => $siteinfo['meta_title'] != '' ? $siteinfo['meta_title'] : EMPTY_TEXT, 'icon' => fa('bullhorn'.ICON_SUFFIX)],
	['text' => $siteinfo['meta_description'] != '' ? nl2br($siteinfo['meta_description']) : EMPTY_TEXT, 'icon' => fa('tags'.ICON_SUFFIX)],
	['text' => $siteinfo['img_alt'] != '' ? $siteinfo['img_alt'] : EMPTY_TEXT, 'icon' => fa('image'.ICON_SUFFIX)],
]);?>

<hr class="mt30 mb30" />

<h3 class="mb20">Заглушка:</h3>

<?=iconlist([
	[
		'text' => $siteinfo['enable'] == 1 ? 'Сайт доступен всем' : 'Доступ к сайту ограничен',
		'icon' => $siteinfo['enable'] == 1 ? fa('eye fa-fw text-success') : fa('eye-slash fa-fw text-error'),
	],
	['text' => $siteinfo['cap_title'] != '' ? $siteinfo['cap_title'] : 'Сайт временно закрыт', 'icon' => fa('bullhorn'.ICON_SUFFIX)],
	['text' => $siteinfo['cap_descr'] != '' ? nl2br($siteinfo['cap_descr']) : 'Приносим свои извинения и гарантируем в скором времени наладить работу', 'icon' => fa('align-left'.ICON_SUFFIX)],
]);?>

<div class="form-actions mt30">
	<?=anchor('admin/'.$this->page.'/edit', fa('pencil mr5').' Изменить настройки', ['class' => 'btn btn-success']);?>
	<?=anchor('admin', fa('home mr5').' Вернуться на главную', ['class' => 'btn']);?>
</div>

<hr class="mt30 mb30" />

<h3 class="mb20">Продвинутое:</h3>

<div>
	<?=anchor('admin/'.$this->page.'/cache', fa('refresh mr5').' Обновить кэш', ['class' => 'btn btn-warning mr5']);?>
	<?=anchor('/home/sitemap', fa('sitemap mr5').' Сгенерировать sitemap.xml', ['class' => 'btn btn-success mr5', 'target' => '_blank']);?>
	<?=anchor('/sitemap.xml', fa('file-text-o mr5').' Открыть sitemap.xml', ['class' => 'btn btn-info mr5', 'target' => '_blank']);?>
</div>

<div class="mt20" style="display: inline-block; border: 3px solid rgba(255, 0, 0, 0.4); padding: 20px;">
	<div class="mb15 h6 bold text-error"><?=fa('warning mr5');?> Некорректное заполнение этих файлов может привести к поломке сайта!</div>
	<?=anchor('admin/'.$this->page.'/robots', fa('pencil mr5').' Редактировать robots.txt', ['class' => 'btn btn-warning mr5']);?>
	<?=anchor('admin/'.$this->page.'/htaccess', fa('pencil mr5').' Редактировать .htaccess', ['class' => 'btn btn-warning mr5']);?>
</div>