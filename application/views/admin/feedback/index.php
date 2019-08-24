<? if(empty($items)) { ?>

<?=action_result('info', 'У вас нет ни одного входящего сообщения.');?>

<? } else { ?>

<table class="table table-hover">
	<thead>
		<tr>
			<th class="entries-new"><?=is_read(0);?></th>
			<th>Тема</th>
			<th>ФИО</th>
			<th>Контакты</th>
			<th>Дата</th>
			<th>Действия</th>
		</tr>
	</thead>
	<tbody>
	<? foreach($items as $item) { ?>
		<tr data-entries="item">
			<td class="entries-new"><?=is_read($item['is_read']);?></td>
			<td data-entries="title"><?=$item['title'];?></td>
			<td><?=$item['name'] ? fa('user-circle-o'.ICON_SUFFIX).' '.$item['name'] : null;?></td>
			<td>
				<div><?=$item['phone'] ? fa('phone'.ICON_SUFFIX).' '.$item['phone'] : null;?></div>
				<div><?=$item['email'] ? fa('at'.ICON_SUFFIX).' '.$item['email'] : null;?></div>
			</td>
			<td nowrap><?=entries_date($item['add_date']);?></td>
			<td class="w125">
				<?=btn_view($this->page.'/view/'.$item['id']);?>
				<?=btn_delete($this->page.'/delete/'.$item['id']);?>
			</td>
		</tr>
	<? } ?>
	</tbody>
</table>

<?=$this->pagination->create_links(); ?>

<? } ?>