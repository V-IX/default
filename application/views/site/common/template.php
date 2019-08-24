<!DOCTYPE html>
<html lang="ru">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	
	<title><?=$seo['title'];?></title>
	<meta name="keywords" content="<?=$seo['keywords'];?>" />
	<meta name="description" content="<?=$seo['description'];?>" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<link rel="canonical" href="<?=$seo['canonical'];?>" />
	
	<? if($siteinfo['color']) { ?><meta name="theme-color" content="#<?=$siteinfo['color'];?>" /><? } ?>
	
	<?=link_tag('favicon.ico'.$version, 'shortcut icon', 'image/ico');?>
	<?=link_tag('favicon.ico'.$version, 'shortcut', 'image/ico');?>
	
	<?=link_tag(PATH_SITE.'/css/style.css'.$version);?>
	<? foreach($styles as $css) { ?><?=link_tag($css.$version);?><? } ?>
	
	<?=link_tag(PATH_PLUGINS.'/font-awesome5/css/all.min.css'.$version);?>
	<?=link_tag(PATH_PLUGINS.'/font-roboto/font.css');?>
	
	<script>
		base_url = "<?=base_url();?>";
		csrf_test_name = "<?=$csrf;?>";
	</script>
	
	<?=script(PATH_PLUGINS.'/jquery/jquery-1.9.1.min.js');?>
	<?=script(PATH_PLUGINS.'/ajaxForm/form.js'.$version);?>
	<?=script(PATH_SITE.'/js/common.js'.$version);?>
	<?=script(PATH_SITE.'/js/content.js'.$version);?>
	<? foreach($scripts as $script) { ?><?=script($script.$version);?><? } ?>
	
	<?=$siteinfo['code_before'] ?? null;?>
	
</head>
<body class="<?=!empty($pageinfo) ? 'pageview-'.$pageinfo['alias'] : null;?>">

<header class="header">
	<div class="wrapper">
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
<nav class="tmenu">
	<div class="wrapper">
        <a href="javascript:void(0)" class="tmenu-btn"><?=fa('bars');?> Меню сайта</a>
		<div class="tmenu-list">
			<ul>
			<? foreach($tmenu as $_tmenu) { ?>
				<li>
					<div class="tmenu-item">
						<?=navlink($_tmenu, ['class' => 'tmenu-link']);?>
						
						<? if(!empty($_tmenu['childs'])) { ?>
							<ul class="tmenu-child">
							<? foreach($_tmenu['childs'] as $_tchild) { ?>
								<li>
									<?=navlink($_tchild);?>
								</li>
							<? } ?>
							</ul>
						<? } ?>
					</div>
				</li>
			<? } ?>
			</ul>
		</div>
	</div>
</nav>

<div class="content">
	<? $this->load->view('site/'.$view); ?>
</div>

<footer class="footer">
	<div class="wrapper">
		<div class="copyright">
			<?=nl2br($siteinfo['copyright']);?>
		</div>
		<div class="developer">
			<noindex>
				<a href="http://narisuemvse.by" rel="nofollow" target="_blank">
					<span class="label">Разработано</span>
					<i class="icon icon-developer"></i>
					<span class="link">Narisuemvse.by</span>
				</a>
			</noindex>
		</div>
	</div>
</footer>

<div class="popup" id="popupFeedback">
	<a href="javascript:void(0)" class="popup-close" data-modal="close"><?=fa5s('times');?></a>
	<div class="popup-top">
		<div class="title">Заказать звонок</div>
		<div class="brief">Оставьте заявку и наши специалисты свяжутся с Вами в ближайшее время</div>
	</div>
	<?=form_open('contacts/ajaxFeedback', ['class' => 'popup-form', 'data-toggle' => 'ajaxForm']);?>
		<ul class="inputs">
			<li>
				<input type="text" name="name" class="form-input" placeholder="Ваше имя" />
			</li>
			<li>
				<input type="tel" name="phone" class="form-input" placeholder="Ваш телефон *" data-rules="required" />
			</li>
		</ul>
		<div class="actions">
			<button class="btn btn-xl">Отправить</button>
			<input type="hidden" name="title" id="popupFeedbackTask" value="" />
		</div>
	<?=form_close();?>
</div>

<div class="popup" id="popupThanks">
	<a href="javascript:void(0)" class="popup-close" data-modal="close"><?=fa5s('times');?></a>
	<div class="popup-top">
		<div class="title">Спасибо заявку</div>
		<div class="brief">Мы свяжемся с Вами в ближайшее рабочее время</div>
	</div>
</div>
	
<?=$siteinfo['code_after'] ?? null;?>

</body>
</html>