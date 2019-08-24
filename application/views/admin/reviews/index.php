<? if(empty($items)) { ?>

<?=action_result('info', 'У вас не создано еще ни одной записи. Вы можете '.anchor('admin/'.uri(2).'/create', 'создать запись.'));?>

<? } else { ?>

<table class="table table-hover">
	<thead>
		<tr>
			<td class="entries-new"><?=is_read(0);?></td>
			<th class="w100">Изображение</th>
			<th>Имя</th>
			<th>Контакты</th>
			<th>Опубликовано</th>
			<th>Дата</th>
			<th></th>
			<th>Действия</th>
		</tr>
	</thead>
	<tbody>
	<? foreach($items as $item) { ?>
		<tr data-entries="item">
			<td class="entries-new"><?=is_read($item['is_read']);?></td>
			<td class="w100">
				<?=check_img(PATH_UPLOADS.'/'.$folder.'/thumb/'.$item['img'], ['class' => 'block w75'], 'user.png');?>
			</td>
			<td>
				<div data-entries="title"><?=$item['name'];?></div>
				<div class="text-gray h6"><?=character_limiter($item['text'], 200);?></div>
			</td>
			<td>
				<div><?=$item['phone'] ? fa('phone mr5'.ICON_SUFFIX).' '.$item['phone'] : null;?></div>
				<div><?=$item['email'] ? fa('at mr5'.ICON_SUFFIX).' '.$item['email'] : null;?></div>
				<?=entries_link($item['link']);?>
			</td>
			<td nowrap><?=entries_date($item['pub_date']);?></td>
			<td nowrap><?=entries_date($item['add_date']);?></td>
			<td class="text-right"><?=visibility($item['visibility']);?></td>
			<td class="w150">
				<?=btn_view($this->page.'/view/'.$item['id']);?>
				<?=btn_edit($this->page.'/edit/'.$item['id']);?>
				<?=btn_delete($this->page.'/delete/'.$item['id']);?>
			</td>
		</tr>
	<? } ?>
	</tbody>
</table>

<?=$this->pagination->create_links(); ?>

<div class="form-actions mt20">
	<?=btn_create($this->page.'/create')?>
</div>

<? } ?>