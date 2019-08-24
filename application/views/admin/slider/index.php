<? if(empty($items)) { ?>

<?=action_result('info', 'У вас не создано еще ни одной записи. Вы можете '.anchor('admin/'.$this->page.'/create', 'создать запись.'));?>

<? } else { ?>

<table class="table table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Изображение</th>
			<th>Заголовок</th>
			<th>Ссылка</th>
			<th></th>
			<th>Действия</th>
		</tr>
	</thead>
	<tbody>
	<? foreach($items as $item) { ?>
		<tr data-entries="item">
			<td class="w50"><?=$item['num'];?></td>
			<td class="w150">
				<?=check_img(PATH_UPLOADS.'/'.$folder.'/thumb/'.$item['img'], ['class' => 'block w125']);?>
			</td>
			<td>
				<div data-entries="title"><?=$item['title'];?></div>
				<div class="h6 text-gray"><?=$item['text'];?></div>
			</td>
			<td><?=entries_link($item['link']);?></td>
			<td class="text-right"><?=visibility($item['visibility']);?></td>
			<td class="w125">
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