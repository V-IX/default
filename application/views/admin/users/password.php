<?=form_open_multipart('', ['class' => 'responsive-form', 'data-toggle' => 'entryform']);?>

<?=$this->admincreator
	->set_name('old_password')
	->set_label('Старый пароль')
	->set_params(['type' => 'password'])
	->set_required()
	->create(); ?>

<?=$this->admincreator
	->set_name('password')
	->set_label('Новый пароль')
	->set_params(['type' => 'password'])
	->set_required()
	->create(); ?>

<?=$this->admincreator
	->set_name('confirm_password')
	->set_label('Подтверждение пароля')
	->set_params(['type' => 'password'])
	->set_required()
	->create(); ?>
	
<div class="form-actions">
    <?=btn_save('Изменить пароль', 'lock');?>
    <?=btn_back($this->page);?>
</div>
<?=form_close();?>