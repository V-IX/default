<?=form_open_multipart('', ['class' => 'responsive-form', 'data-toggle' => 'entryform']);?>

<?=$this->admincreator
	->set_name('name')
	->set_label('Имя')
	->set_value($item['name'])
	->set_required()
	->create(); ?>
	
<? if($item['phone'] != '') { ?>
<?=$this->admincreator
	->set_name('phone')
	->set_label('Телефон')
	->set_value($item['phone'])
	->set_params(['readonly' => 'readonly'])
	->create(); ?>
<? } ?>

<? if($item['email'] != '') { ?>
<?=$this->admincreator
	->set_name('email')
	->set_label('E-mail')
	->set_value($item['email'])
	->set_params(['readonly' => 'readonly'])
	->create(); ?>
<? } ?>

<?=$this->admincreator
	->set_name('link')
	->set_label('Ссылка')
	->set_value($item['link'])
	->create(); ?>
	
<?=$this->admincreator
	->set_name('text')
	->set_type('textarea')
	->set_label('Текст')
	->set_value($item['text'])
	->set_params(['rows' => '5'])
	->create(); ?>

<?=$this->admincreator
	->set_name('img')
	->set_type('file')
	->set_label('Изображение')
	->label_info('Рекомендуемый размер не меньше '.$size['x'].'x'.$size['y'])
	->file_origin($item['img'], PATH_UPLOADS.'/'.$folder.'/thumb')
	->file_delete('admin/'.$this->page.'/ajaxImageDelete/'.$item['id'])
	->create(); ?>

<div class="row form-group">
	<div class="col-3 form-collabel">
		Дата
	</div>
	<div class="col-9 form-colinput">
		<div class="row">
			<div class="col-6">
				<div class="datepicker">
					<input type="text" class="form-input" name="date" readonly data-toggle="datepicker" value="<?=set_value('date', date('d.m.Y', strtotime($item['pub_date'])));?>" placeholder="Дата" />
				</div>
				<?=form_error('date'); ?>
			</div>
			<div class="col-6">
				<input type="text" class="form-input" name="time" value="<?=set_value('time', date('H:i', strtotime($item['pub_date'])));?>" placeholder="Время" />
				<?=form_error('time'); ?>
			</div>
		</div>
	</div>
</div>
	
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

<script>
	$('[data-toggle="datepicker"]').datepicker({
		firstDay: 1,
		showOn: 'button',
		buttonText: '<?=fa('calendar');?>',
		dateFormat: 'dd.mm.yy',
		showOtherMonths: true,
		selectOtherMonths: true,
		changeMonth: true,
		changeYear: true
    });
	
	$('[name="time"]').inputmask('99:99');
</script>