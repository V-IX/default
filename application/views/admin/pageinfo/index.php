<? if(empty($items)) { ?>

<?=action_result('info', 'У вас не создано еще ни одной страницы. Страницы создаются в базе данных.');?>

<? } else { ?>

<table class="table table-hover">
	<thead>
		<tr>
			<th>Название</th>
			<th>Заголовок</th>
			<th>Alias</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<? foreach($items as $item) { ?>
		<tr data-entries="item">
			<td><?=$item['name'];?></td>
			<td><?=$item['title'];?></td>
			<td><?=$item['alias'];?></td>
			<td class="w50">
				<?=btn_edit($this->page.'/edit/'.$item['id']);?>
			</td>
		</tr>
	<? } ?>
	</tbody>
</table>

<?=$this->pagination->create_links(); ?>

<? } ?>