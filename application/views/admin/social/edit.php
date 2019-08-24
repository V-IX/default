<?=form_open_multipart('', ['class' => 'responsive-form', 'data-toggle' => 'entryform']);?>

<?=$this->admincreator
	->set_name('link')
	->set_label('Ссылка')
	->set_required()
	->set_value($item['link'])
	->create(); ?>

<?=$this->admincreator
	->set_name('brief')
	->set_label('Подсказка')
	->set_value($item['brief'])
	->create(); ?>

<hr class="mt30 mb30" />

<div class="h3 bold mb20">Настройки ссылки</div>

<?=$this->admincreator
	->set_name('icon_front')
	->set_label('Иконка')
	->set_value($item['icon_front'])
	->label_info('Только для опытных пользователей')
	->create(); ?>

<?=$this->admincreator
	->set_name('num')
	->set_label('Номер по порядку')
	->set_value($item['num'])
	->label_info('На сайте выводится в обратном порядке')
	->create(); ?>
	
<?=$this->admincreator
	->set_name('visibility')
	->set_type('checkbox')
	->set_label('Отображать на сайте')
	->set_value($item['visibility'] == 1)
	->create(); ?>

<input type="hidden" name="title" value="<?=$item['title'];?>" />
	
<div class="form-actions">
    <?=btn_save();?>
    <?=btn_save_exit();?>
    <?=btn_back($this->page);?>
</div>
<?=form_close();?>