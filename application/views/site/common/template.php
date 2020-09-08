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
		const base_url = "<?=base_url();?>",
			csrf_test_name = "<?=$csrf;?>";
	</script>
	
	<?=script(PATH_PLUGINS.'/jquery/jquery-3.5.0.min.js');?>
	<?=script(PATH_SITE.'/js/form.js'.$version);?>
	<?=script(PATH_SITE.'/js/common.js'.$version);?>
	<?=script(PATH_SITE.'/js/content.js'.$version);?>
	<? foreach($scripts as $script) { ?><?=script($script.$version);?><? } ?>
	
	<?=$siteinfo['code_before'] ?? null;?>
	
</head>
<body class="<?=!empty($pageinfo) ? 'pageview-'.$pageinfo['alias'] : null;?>">

<? $this->load->view('site/common/template_header'); ?>

<? $this->load->view('site/common/template_navigation'); ?>

<div class="content">
	<? $this->load->view('site/'.$view); ?>
</div>

<? $this->load->view('site/common/template_footer'); ?>

<? $this->load->view('site/common/template_modals'); ?>

<? $this->load->view('site/common/template_scripts'); ?>
	
<?=$siteinfo['code_after'] ?? null;?>

</body>
</html>
