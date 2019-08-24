<?=form_open_multipart('', ['class' => 'responsive-form', 'data-toggle' => 'entryform']);?>

<?=$this->admincreator
	->set_name('title')
	->set_label('Заголовок')
	->set_value($item['title'])
	->set_required()
	->create(); ?>
	
<? if($this->nesting) { ?>
<? $opts = [0 => 'Корень']; foreach($parents as $parent) $opts[$parent['id']] = '&nbsp;&nbsp;&nbsp;'.$parent['title'];?>
<?=$this->admincreator
	->set_name('id_parent')
	->set_type('select')
	->set_label('Категория')
	->set_options($opts)
	->set_value($item['id_parent'])
	->set_required()
	->create(); ?>
<? } else { ?>
<input type="hidden" name="id_parent" value="0" />
<? } ?>

<?=$this->admincreator
	->set_name('link')
	->set_label('Ссылка')
	->set_value($item['link'])
	->create(); ?>

<hr class="mt30 mb30" />

<div class="h3 bold mb20">Настройки ссылки</div>

<?=$this->admincreator
	->set_name('target')
	->set_type('select')
	->set_label('Открыть ссылку')
	->set_options(['_self' => 'В текущем окне', '_blank' => 'В новом окне'])
	->set_value($item['target'])
	->create(); ?>

<?=$this->admincreator
	->set_name('num')
	->set_label('Номер по порядку')
	->set_value($item['num'])
	->label_info('На сайте выводится в обратном порядке')
	->create(); ?>
	
<?=$this->admincreator
	->set_name('noindex')
	->set_type('checkbox')
	->set_label('Noindex')
	->label_info('Закрыть ссылку от индексации')
	->set_value($item['noindex'] == 1)
	->create(); ?>
	
<?=$this->admincreator
	->set_name('visibility')
	->set_type('checkbox')
	->set_label('Отображать на сайте')
	->set_value($item['visibility'] == 1)
	->create(); ?>

<div class="form-actions">
    <?=btn_save();?>
    <?=btn_save_exit();?>
    <?=btn_back($this->page);?>
</div>
<?=form_close();?>