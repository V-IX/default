<?=form_open('', ['class' => 'responsive-form', 'data-toggle' => 'entryform']);?>

<div class="mb30">
	<textarea class="form-input" name="text" rows="10"><?=set_value('text', $file);?></textarea>
</div>

<div class="form-actions">
	<?=btn_save();?>
    <?=btn_save_exit();?>
    <?=btn_back($this->page);?>
</div>

<?=form_close();?>