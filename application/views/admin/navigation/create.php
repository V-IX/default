<?=form_open_multipart('', ['class' => 'responsive-form', 'data-toggle' => 'entryform']);?>

<?=$this->admincreator
	->set_name('title')
	->set_label('Заголовок')
	->set_required()
	->create(); ?>
	
<? if($this->nesting) { ?>
<? $opts = [0 => 'Корень']; foreach($parents as $parent) $opts[$parent['id']] = '&nbsp;&nbsp;&nbsp;'.$parent['title'];?>
<?=$this->admincreator
	->set_name('id_parent')
	->set_type('select')
	->set_label('Категория')
	->set_options($opts)
	->set_required()
	->create(); ?>
<? } else { ?>
<input type="hidden" name="id_parent" value="0" />
<? } ?>

<?=$this->admincreator
	->set_name('link')
	->set_label('Ссылка')
	->set_required()
	->create(); ?>

<hr class="mt30 mb30" />

<div class="h3 bold mb20">Настройки ссылки</div>

<?=$this->admincreator
	->set_name('target')
	->set_type('select')
	->set_label('Открыть ссылку')
	->set_options(['_self' => 'В текущем окне', '_blank' => 'В новом окне'])
	->create(); ?>

<?=$this->admincreator
	->set_name('num')
	->set_label('Номер по порядку')
	->set_value(1)
	->label_info('На сайте выводится в обратном порядке')
	->create(); ?>
	
<?=$this->admincreator
	->set_name('noindex')
	->set_type('checkbox')
	->set_label('Noindex')
	->label_info('Закрыть ссылку от индексации')
	->create(); ?>
	
<?=$this->admincreator
	->set_name('visibility')
	->set_type('checkbox')
	->set_label('Отображать на сайте')
	->set_value(true)
	->create(); ?>

<div class="form-actions">
	<?=btn_add();?>
	<?=btn_back($this->page);?>
	<input type="hidden" name="position" value="<?=$position;?>" />
</div>
<?=form_close();?>