<div class="page-content">
	<div class="container">
		<div class="page-top">
			<?=$this->breadcrumbs->create_links();?>
			<h1 class="page-title"><?=$pageinfo['title'];?></h1>
			<? if($pageinfo['brief']) { ?><div class="page-brief"><?=$pageinfo['brief'];?></div><? } ?>
		</div>
		
		<ul class="news-list">
		<? foreach($items as $item) { ?>
			<li>
				<a href="<?=base_url($this->page.'/'.$item['alias']);?>" class="news-item">
					<div class="image">
						<?=check_img(PATH_UPLOADS.'/'.$this->page.'/thumb/'.$item['img'], ['alt' => $item['img_alt']]);?>
					</div>
					<div class="description">
						<div class="date">
							<?=fa5r('calendar-alt');?>
							<?=translate_date($item['pub_date']);?>
						</div>
						<div class="title"><?=$item['title'];?></div>
						<div class="brief"><?=$item['brief'];?></div>
						<div class="bottom">
							<span class="more">Читать далее</span>
						</div>
					</div>
				</a>
			</li>
		<? } ?>
		</ul>
		
		<?=$this->pagination->create_links();?>

		<? if(strip_tags($pageinfo['text']) != '' && uri(2) == '') { ?>
		<div class="page-text">
			<div class="text-editor">
				<?=$pageinfo['text'];?>
			</div>
		</div>
		<? } ?>
	</div>
</div>
