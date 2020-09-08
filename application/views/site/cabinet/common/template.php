<section class="cabinet page-content">
	<div class="container">
		
		<? $this->load->view('site/common/warning');?>
		
		<div class="cabinet-content">
			<div class="cabinet-content-left">
				<nav class="cabinet-nav">
					<div class="cabinet-nav-title">Личный кабинет</div>
					<ul class="cabinet-nav-list">
					<? foreach($cmenu as $_cmenu) { ?>
						<li>
							<a href="<?=base_url($_cmenu['link']);?>" class="cabinet-nav-item <?=uri(2) == $_cmenu['alias'] ? 'current' : null?>">
								<?=$_cmenu['icon'];?>
								<?=$_cmenu['title'];?>
							</a>
						</li>
					<? } ?>
					</ul>
				</nav>
			</div>
			<div class="cabinet-content-right">
				<? $this->load->view('site/cabinet/'.$subview);?>
			</div>
		</div>
	</div>
</section>
