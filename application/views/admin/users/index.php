<? if(empty($items)) { ?>

<?=note('info', 'У вас не создано еще ни одного пользователя. Вы можете '.anchor('admin/'.uri(2).'/create', 'создать пользователя', array('class' => 'medium')));?>

<? } else { ?>

<table class="table table-hover">
	<thead>
		<tr>
			<th>Роль</th>
			<th>Пользователь</th>
			<th>Контакты</th>
			<th>Дата</th>
			<th>Действия</th>
		</tr>
	</thead>
	<tbody>
	<? foreach($items as $item) { ?>
		<tr data-entries="item">
			<? $a = $access[$item['access']];?>
			<td class="w150">
				<span class="label label-small label-<?=$a['label'];?>"><?=$a['title'];?></span>
			</td>
			<td>
				<div><?=fa('user-circle-o fa-fw text-gray mr5');?> <span data-entries="title"><?=$item['login'];?></span></div>
				<div><?=fa('address-card-o fa-fw text-gray mr5');?> <?=$item['name'];?></div>
			<td>
				<div><?=$item['email'] ? fa('envelope-o fa-fw text-gray mr5').' '.$item['email'] : null;?></div>
				<div><?=$item['phone'] ? fa('phone fa-fw text-gray mr5').' '.$item['phone'] : null;?></div>
			</td>
			<td nowrap><?=entries_date($item['add_date']);?></td>
			<td class="w150">
				<?=btn_view($this->page.'/view/'.$item['id']);?>
				<?=btn_edit($this->page.'/edit/'.$item['id']);?>
				<? if($item['id'] != $userid) { ?>
					<?=btn_delete($this->page.'/delete/'.$item['id']);?>
				<? } else { ?>
					<?=anchor('admin/'.$this->page.'/password', fa('lock'), ['class' => 'btn btn-warning btn-icon', 'title' => 'Изменить свой пароль', 'data-toggle' => 'tooltip']);?>
				<? } ?>
			</td>
		</tr>
	<? } ?>
	</tbody>
</table>

<?=$this->pagination->create_links(); ?>

<div class="form-actions mt20">
	<?=btn_create($this->page.'/create', 'Добавить пользователя');?>
</div>

<? } ?>