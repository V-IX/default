<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">

<head>
	
	<title><?=$seo['pagetitle'];?></title>
	
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="viewport" content="width=1000" />
	
	<?=link_tag('assets/admin/css/reset.css'.$version);?>
	
	<?=link_tag(PATH_PLUGINS.'/elfinder/css/jquery-ui.css');?>
	<?=link_tag(PATH_PLUGINS.'/elfinder/css/theme.css');?>
	<?=link_tag(PATH_PLUGINS.'/elfinder/css/elfinder.min.css');?>
	<?=link_tag(PATH_PLUGINS.'/elfinder/css/icons.css');?>
	
	<?=link_tag('favicon.ico', 'shortcut icon', 'image/ico');?>
	<?=link_tag('favicon.ico', 'shortcut', 'image/ico');?>
	
	<? $csrf = $this->security->get_csrf_hash();?>
	<script>
		base_url = "<?=base_url()?>"
		csrf_test_name = "<?=$csrf;?>"
	</script>
	
	<?=script(PATH_PLUGINS.'/jquery/jquery-1.6.2.min.js');?>
	<?=script(PATH_PLUGINS.'/jquery/jquery-ui-1.8.14.min.js');?>
	
	<?=script(PATH_PLUGINS.'/elfinder/js/elfinder.full.js');?>
	<?=script(PATH_PLUGINS.'/elfinder/js/i18n/elfinder.ru.js');?>

</head>
<body>
	<script type="text/javascript" charset="utf-8">
		$().ready(function() {
			var elf = $('#elfinder').elfinder({
				
				validName  : /^[a-zA-Z0-9_%\-]$/,
				lang       : 'ru',
				url        : '<?=base_url('/admin/files/elfinder_init');?>',
				customData : {
					csrf_test_name: "<?=$this->security->get_csrf_hash(); ?>"
				}
				
			}).elfinder('instance');
		});
	</script>
	
	<div id="elfinder"></div>
</body>
</html>