<? if(!empty($slider)) $this->load->view('site/common/slider');?>

<section class="home-about">
	<div class="wrapper">
		<h1 class="title"><?=$pageinfo['title'];?></h1>
		<div class="text">
			<div class="text-editor">
				<?=$pageinfo['text'];?>
			</div>
		</div>
		<div class="bottom">
			<a href="<?=base_url('about');?>" class="btn">Подробнее</a>
		</div>
	</div>
</section>

<section class="home-social">
	<div class="wrapper">
		<div class="title">Мы в социальных сетях</div>
		<ul class="list">
		<? foreach($socials as $social) { ?>
			<li>
				<noindex>
					<a href="<?=$social['link'];?>" rel="nofollow" target="_blank" title="<?=htmlspecialchars($social['brief']);?>"><i class="fa5 <?=$social['icon_front'];?>"></i></a>
				</noindex>
			</li>
		<? } ?>
		</ul>
	</div>
</section>