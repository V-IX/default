<div class="row dashboard-stat-row">
	<div class="col-3">
		<div class="dashboard-stat success">
			<div class="icon"><?=fa('bullhorn');?></div>
			<div class="details">
				<div class="num"><?=$counter['news'];?></div>
				<div class="descr"><div class="text-overflow">новостей</div></div>
			</div>
			<a href="<?=base_url('admin/news/create');?>" class="link">
				Добавить новость
				<?=fa('plus-square-o');?>
			</a>
		</div>
	</div>
	<div class="col-3">
		<div class="dashboard-stat warning">
			<div class="icon"><?=fa('file-text-o');?></div>
			<div class="details">
				<div class="num"><?=$counter['articles'];?></div>
				<div class="descr"><div class="text-overflow">статей</div></div>
			</div>
			<a href="<?=base_url('admin/articles/create');?>" class="link">
				Добавить статью
				<?=fa('plus-square-o');?>
			</a>
		</div>
	</div>
	<div class="col-3">
		<div class="dashboard-stat info">
			<div class="icon"><?=fa('files-o');?></div>
			<div class="details">
				<div class="num"><?=$counter['pages'];?></div>
				<div class="descr"><div class="text-overflow">страниц</div></div>
			</div>
			<a href="<?=base_url('admin/pages/create');?>" class="link">
				Добавить страницу
				<?=fa('plus-square-o');?>
			</a>
		</div>
	</div>
	<div class="col-3">
		<div class="dashboard-stat error">
			<div class="icon"><?=fa('cog');?></div>
			<div class="details">
				<div class="num"><?=$siteinfo['title']?></div>
				<div class="descr"><div class="text-overflow"><?=$siteinfo['descr']?></div></div>
			</div>
			<a href="<?=base_url('admin/settings/edit');?>" class="link">
				Изменить настройки
				<?=fa('plus-square-o');?>
			</a>
		</div>
	</div>
</div>

<hr class="mb25" />

<div class="row messages-row">
<? if(!empty($feedbacks)) { ?>
	<div class="col-6">
		<div class="panel">
			<div class="panel-head">
				<?=fa('envelope-o');?> Новые сообщения
			</div>
			<div class="panel-body">
				<ul class="messages">
				<? foreach($feedbacks as $feedback) { ?>
					<li>
						<a href="<?=base_url('admin/feedback/view/'.$feedback['id']);?>" class="message">
							<div class="clearfix">
								<div class="icon"><?=fa('envelope-o');?></div>
								<div class="text">
									<span class="bold"><?=$feedback['phone'];?></span>
									<? if($feedback['name'] != '') { ?><span class="text-gray">- <?=$feedback['name'];?></span><? } ?>
									<span class="text-gray">- <?=$feedback['title'];?></span>
								</div>
								<div class="date">
									<div><?=date('d.m.Y', strtotime($feedback['add_date']));?></div>
									<div><?=date('H:i:s', strtotime($feedback['add_date']));?></div>
								</div>
							</div>
						</a>
					</li>
				<? } ?>
				</ul>
				<div class="text-right mt15">
					<a href="<?=base_url('admin/feedback');?>">Перейти ко всем сообщениям</a>
				</div>
			</div>
		</div>
	</div>
<? } ?>
<? if(!empty($faqs)) { ?>
	<div class="col-6">
		<div class="panel">
			<div class="panel-head">
				<?=fa('comments-o');?> Новые вопросы
			</div>
			<div class="panel-body">
				<ul class="messages">
				<? foreach($faqs as $faq) { ?>
					<li>
						<a href="<?=base_url('admin/faq/view/'.$faq['id']);?>" class="message">
							<div class="clearfix">
								<div class="icon"><?=fa('comment-o');?></div>
								<div class="text">
									<span class="bold"><?=$faq['phone'];?></span>
									<? if($faq['name'] != '') { ?><span class="text-gray">- <?=$faq['name'];?></span><? } ?>
									<span class="text-gray">- <?=$faq['title'];?></span>
								</div>
								<div class="date">
									<div><?=date('d.m.Y', strtotime($faq['add_date']));?></div>
									<div><?=date('H:i:s', strtotime($faq['add_date']));?></div>
								</div>
							</div>
						</a>
					</li>
				<? } ?>
				</ul>
				<div class="text-right mt15">
					<a href="<?=base_url('admin/reviews');?>">Перейти ко всем отзывам</a>
				</div>
			</div>
		</div>
	</div>
<? } ?>
</div>

<hr class="mb25" />

<div class="row messages-row">
	<div class="col-6">
		<div class="panel">
			<div class="panel-head">
				<?=fa('bullhorn');?> Последние новости
			</div>
			<div class="panel-body">
				<ul class="publications">
				<? foreach($news as $new) { ?>
					<li>
						<div class="publication clearfix">
							<div class="img">
								<?=check_img('assets/uploads/news/thumb/'.$new['img']);?>
								<a href="<?=base_url('admin/news/edit/'.$new['id']);?>" class="block-edit">
									<span class="icon"><?=fa('pencil');?></span>
								</a>
							</div>
							<div class="descr">
								<a href="<?=base_url('admin/news/view/'.$new['id']);?>" class="title"><?=$new['title'];?></a>
								<div class="date text-gray"><?=translate_date($new['add_date']);?></div>
								<div class="brief"><?=$new['brief'];?></div>
							</div>
						</div>
					</li>
				<? } ?>	
				</ul>
				<div class="text-right mt15">
					<a href="<?=base_url('admin/news');?>">Новости компании</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="panel">
			<div class="panel-head">
				<?=fa('file-text-o');?> Последние статьи
			</div>
			<div class="panel-body">
				<ul class="publications">
				<? foreach($articles as $new) { ?>
					<li>
						<div class="publication clearfix">
							<div class="img">
								<?=check_img('assets/uploads/articles/thumb/'.$new['img']);?>
								<a href="<?=base_url('admin/articles/edit/'.$new['id']);?>" class="block-edit">
									<span class="icon"><?=fa('pencil');?></span>
								</a>
							</div>
							<div class="descr">
								<a href="<?=base_url('admin/articles/view/'.$new['id']);?>" class="title"><?=$new['title'];?></a>
								<div class="date text-gray"><?=translate_date($new['add_date']);?></div>
								<div class="brief"><?=$new['brief'];?></div>
							</div>
						</div>
					</li>
				<? } ?>	
				</ul>
				<div class="text-right mt15">
					<a href="<?=base_url('admin/articles');?>">Полезная информация</a>
				</div>
			</div>
		</div>
	</div>
</div>