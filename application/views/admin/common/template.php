<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">

<head>

	<title><?=$seo['pagetitle'];?></title>
	
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="viewport" content="width=1000" />
	
	<?=link_tag('assets/admin/css/reset.css'.$version);?>
	<?=link_tag('assets/admin/css/template.css'.$version);?>
	<?=link_tag('assets/admin/css/content.css'.$version);?>
	<?=link_tag(PATH_PLUGINS.'/font-awesome/css/font-awesome.min.css');?>
	<? foreach($styles as $css) { ?><?=link_tag($css.$version);?><? } ?>
	
	<?=link_tag('favicon.ico', 'shortcut icon', 'image/ico');?>
	<?=link_tag('favicon.ico', 'shortcut', 'image/ico');?>

    <? $csrf = $this->security->get_csrf_hash();?>
    <script>
        base_url = "<?=base_url()?>"
        csrf_test_name = "<?=$csrf;?>"
    </script>

	<?=script(PATH_PLUGINS.'/jquery/jquery-1.9.1.min.js');?>
	<?=script(PATH_PLUGINS.'/bootstrap/js/bootstrap.min.js');?>
	<?=script(PATH_PLUGINS.'/jquery.formstyler/jquery.formstyler.js');?>
	<?=script('assets/admin/js/common.js'.$version);?>
	<?=script('assets/admin/js/template.js'.$version);?>
	<?=script('assets/admin/js/content.js'.$version);?>
	<? foreach($scripts as $script) { ?><?=script($script.$version);?><? } ?>

</head>
<body>
<div class="super-wrapper">
	<div class="header">
		<div class="row">
			<div class="col-6">
				<div class="header-title">
					<?=anchor('/admin', '<span>'.$siteinfo['title'].'</span> admin-panel');?>
				</div>
			</div>
			<div class="col-6 text-right">
				<div class="header-user">
					Добро пожаловать, 
					<div class="header-dropdown">
						<a href="javascript:void(0)"><?=$userinfo['login'];?></a>
						<div class="header-dropdown-info">
							<div class="header-dropdown-info-in">
								<div class="row">
									<div class="col-10">
										<div><?=$userinfo['name'];?></div>
										<div class="mt5 mb5 h6 text-gray text-overflow"><?=$userinfo['email'];?></div>
										<span class="text-gray h6">
											<? if($userinfo['access'] == ACCESS_ADMIN) {?>
												Администратор
											<? } else { ?>
												Пользователь
											<? } ?>
										</span>
									</div>
									<div class="header-dropdown-edit col-2 text-right">
										<?=anchor('/admin/users/edit/'.$userid, fa('pencil'), array('class' => 'btn btn-icon btn-info'));?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="header-nav">
					<?=anchor('/', fa('home'));?>
					<?=anchor('/admin', fa('th-list'));?>
					<?=anchor('/admin/login/logout', fa('sign-out'));?>
				</div>
			</div>
		</div>
	</div>
	<div class="content clearfix">
		<div class="left-side">
			<ul class="left-menu">
			<? foreach($sidenav as $nav) { ?>
				<li>
					<?
						$params = ['class' => ''];
						$params['class'] .= uri(2) == $nav['alias'] ? ' current' : null;
						if($nav['alias'] == 'files') $params['target'] = '_blank';
						
						$nav['link'] = $nav['link'] != '' ? 'admin/'.$nav['link'] : 'js';
					?>
					<?=anchor($nav['link'], fa($nav['icon'].' fa-fw').' '.$nav['name'], $params);?>
					<? if(!empty($nav['childs'])) { ?>
						<ul class="submenu">
						<? foreach($nav['childs'] as $child) { ?>
							<li>
								<? $current = uri(2) == $child['alias'] ? 'current' : '';?>
								<? $child['link'] = $child['link'] != '' ? 'admin/'.$child['link'] : 'js';
									$_label = '';
									if(array_key_exists($child['alias'], $admin_bells) and $admin_bells[$child['alias']]['count'] != 0) {
									$_label = '<span class="label label-'.$admin_bells[$child['alias']]['color'].'">'.$admin_bells[$child['alias']]['count'].'</span>';
								} ?>
								<?=anchor($child['link'], fa($child['icon'].' fa-fw').' '.$child['name'].$_label, array('class' => 'submenu-item '.$current));?>
								<? if($child['create_btn']) { ?>
									<a href="<?=base_url($child['link'].'/create');?>" class="create_btn"><?=fa('plus')?></a>
								<? } ?>
							</li>
						<? } ?>
						</ul>
					<? } ?>
				</li>
			<? } ?>
			</ul>
		</div>
		<div class="right-side">
			<div class="right-side-in">
				<div class="right-side-top">
					<?=$this->breadcrumbs->create_admin_links(); ?>
					<h1 class="page-title">
						<?=$seo['title'];?>
					</h1>
				</div>
				<div class="page-content">
					<?=$this->session->flashdata('result'); ?>
					<?=($error) ? action_result('error', $error) : null;?>
					<? $this->load->view('admin/'.$view);?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="footer">
	<div class="col-6">
		<div class="cms-info">
			<span><?=$cms['title'];?></span> <?=$cms['version'];?>
		</div>
	</div>
	<div class="col-6 text-right">
		<div class="narisuem-info"><?=$cms['copyright'];?></div>
	</div>
</div>

<div class="modal fade" id="deleteEntryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog w500">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-close" data-dismiss="modal" aria-label="Close"></div>
				<div class="modal-title h4 medium"><?=fa('warning text-error mr5');?> Подтвердить удаление записи</div>
			</div>
			<?=form_open('', array('id' => 'deleteEntryForm'))?>
			<div class="modal-body">
				<div class="text-editor">Вы действительно хотите удалить запись <strong id="deleteEntryTitle"></strong>?</div>
			</div>
			<div class="modal-footer text-right">
				<button class="btn btn-success">Подтвердить</button>
				<span class="btn btn-error" data-dismiss="modal">Отмена</span>
				<input type="hidden" name="delete" value="delete" />
			</div>
			<?=form_close();?>
		</div>
	</div>
</div>

</body>
</html>