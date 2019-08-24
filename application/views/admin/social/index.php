<? if(empty($items)) { ?>

<?=action_result('info', 'У вас не создано еще ни одной записи. Записи создаются в базе данных.');?>

<? } else { ?>

<table class="table table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th></th>
			<th>Заголовок</th>
			<th>Ссылка</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<? foreach($items as $item) { ?>
		<tr>
			<td class="w50"><?=$item['num'];?></td>
			<td class="w75">
				<span style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; font-size: 18px; border-radius: 100%; background: #50abad; color: #fff;">
					<?=fa($item['icon_admin']);?>
				</span>
			</td>
			<td>
				<div data-entries="title"><?=$item['title'];?></div>
				<div class="h6 text-gray"><?=$item['brief'];?></div>
			</td>
			<td><?=entries_link($item['link']);?></td>
			<td class="text-right"><?=visibility($item['visibility']);?></td>
			<td class="w75">
				<?=btn_edit($this->page.'/edit/'.$item['id']);?>
			</td>
		</tr>
	<? } ?>
	</tbody>
</table>

<?=$this->pagination->create_links(); ?>

<? } ?>