<header class="header">
	<div class="container">
		<div class="header-logo">
			<a href="<?=base_url();?>" class="logo-wrap">
				<?=img(array('src' => base_url('assets/uploads/settings/'.$siteinfo['img']), 'alt' => $siteinfo['img_alt'], 'class' => 'logo'));?>
				<?/*<div class="logo-text">
					<div class="logo-title"><?=$siteinfo['title'];?></div>
					<div class="logo-descr"><?=$siteinfo['descr'];?></div>
				</div>*/?>
			</a>
		</div>
		<div class="header-right">
			<div class="header-contacts">
				<ul class="phones">
					<li><a href="tel:<?=$siteinfo['phone'];?>"><?=mask($siteinfo['phone'], $siteinfo['mask_phone']);?></a></li>
					<li><a href="tel:<?=$siteinfo['phone_extra'];?>"><?=mask($siteinfo['phone_extra'], $siteinfo['mask_phone_extra']);?></a></li>
				</ul>
				<div class="email">
					<a href="mailto:<?=$siteinfo['email'];?>"><?=$siteinfo['email'];?></a>
				</div>
			</div>
			<div class="header-callback">
				<a href="#popupFeedback" class="btn" data-toggle="modal" data-feedback="Заказать звонок: шапка">Заказать звонок</a>
			</div>
		</div>
	</div>
</header>
