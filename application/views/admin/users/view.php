<div data-entries="item">
	<div class="page-preview">
		<div class="img">
		<?=img('assets/uploads/nophoto/user.png');?>
		</div>
		<div class="descr">
			<h4 class="h4 mb20">
				<span data-entries="title"><?=$item['login'];?></span>
				<span class="regular">
					- <?=$item['name'];?>
					<? if($item['id'] == $userid) { ?>
					<span class="text-gray h5 ml5">(мой профиль)</span>
					<? } ?>
				</span>
			</h4>
			<?=iconlist([
				['text' => $access['title'], 'icon' => fa('user-circle-o'.ICON_SUFFIX)],
				['text' => $item['email'] ?? EMPTY_TEXT, 'icon' => fa('envelope-o'.ICON_SUFFIX)],
				['text' => $item['phone'] ?? EMPTY_TEXT, 'icon' => fa('phone'.ICON_SUFFIX)],
			]);?>
		</div>
	</div>
	
	<div class="form-actions">
		<?=btn_edit_alt($this->page.'/edit/'.$item['id']);?>
		<?=btn_back($this->page)?>
		<? if($item['id'] != $userid) { ?>
			<?=btn_delete($this->page.'/delete/'.$item['id']);?>
		<? } else { ?>
			<?=anchor('admin/'.$this->page.'/password', fa('lock mr5') . 'Изменить пароль', ['class' => 'btn btn-warning']);?>
		<? } ?>
	</div>
</div>