<nav class="navigation">
	<div class="container">
		<a href="javascript:void(0)" class="navigation-btn"><?=fa('bars');?> Меню сайта</a>
		<div class="navigation-list">
			<ul>
				<? foreach($nav_header as $navlink) { ?>
					<li>
						<div class="navigation-item">
							<?=navlink($navlink, ['class' => 'navigation-link']);?>

							<? if(!empty($navlink['childs'])) { ?>
								<ul class="navigation-child">
									<? foreach($navlink['childs'] as $navchild) { ?>
										<li>
											<?=navlink($navchild);?>
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
