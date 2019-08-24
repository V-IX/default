<?=form_open_multipart('', ['class' => 'responsive-form', 'data-toggle' => 'entryform']);?>

<?=$this->admincreator
	->set_name('name')
	->set_label('Имя')
	->set_required()
	->create(); ?>
	
<?=$this->admincreator
	->set_name('text')
	->set_type('textarea')
	->set_label('Текст')
	->set_params(['rows' => '5'])
	->create(); ?>

<?=$this->admincreator
	->set_name('link')
	->set_label('Ссылка')
	->create(); ?>

<?=$this->admincreator
	->set_name('img')
	->set_type('file')
	->set_label('Изображение')
	->label_info('Рекомендуемый размер не меньше '.$size['x'].'x'.$size['y'])
	->create(); ?>

<div class="row form-group">
	<div class="col-3 form-collabel">
		Дата
	</div>
	<div class="col-9 form-colinput">
		<div class="row">
			<div class="col-6">
				<div class="datepicker">
					<input type="text" class="form-input" name="date" readonly data-toggle="datepicker" value="<?=set_value('date', date('d.m.Y'));?>" placeholder="Дата" />
				</div>
				<?=form_error('date'); ?>
			</div>
			<div class="col-6">
				<input type="text" class="form-input" name="time" value="<?=set_value('time', date('H:i'));?>" placeholder="Время" />
				<?=form_error('time'); ?>
			</div>
		</div>
	</div>
</div>
	
<?=$this->admincreator
	->set_name('visibility')
	->set_type('checkbox')
	->set_label('Отображать на сайте')
	->set_value(true)
	->create(); ?>

<div class="form-actions">
	<?=btn_add();?>
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