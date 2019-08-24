<div data-entries="item">
	<div class="row form-group">
		<div class="col-3 bold">Тема:</div>
		<div class="col-9" data-entries="title"><?=$item['title'];?></div>
	</div>
	<div class="row form-group">
		<div class="col-3 bold">Имя:</div>
		<div class="col-9"><?=$item['name'];?></div>
	</div>
	<div class="row form-group">
		<div class="col-3 bold">Телефон:</div>
		<div class="col-9"><?=$item['phone'];?></div>
	</div>
	<div class="row form-group">
		<div class="col-3 bold">E-mail:</div>
		<div class="col-9"><?=$item['email'];?></div>
	</div>
	<div class="row form-group">
		<div class="col-3 bold">Комментарий:</div>
		<div class="col-9"><?=nl2br($item['text']);?></div>
	</div>
	<div class="row form-group">
		<div class="col-3 bold">Дата:</div>
		<div class="col-9"><?=date('d.m.Y H:i', strtotime($item['add_date']));?></div>
	</div>

	<div class="form-actions">
		<?=btn_back($this->page)?>
		<div class="right">
			<?=btn_delete($this->page.'/delete/'.$item['id']);?>
		</div>
	</div>
</div>