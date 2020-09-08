<section class="home-slider">
	<div class="home-slider-list" id="homeSlider">
	<? foreach($slider as $slide) { ?>
		<? $tag_class = 'home-slider-item';?>
		<? $tag_open = $slide['link'] != '' ? '<a href="'.(preg_match('#^(\w+:)?//#i', $slide['link']) ? $slide['link'] : base_url($slide['link'])).'" class="'.$tag_class.'" >' : '<div class="'.$tag_class.'">'?>
		<? $tag_close = $slide['link'] != '' ? '</a>' : '</div>'?>
		<?=$tag_open;?>
			<div class="image"
			 data-slider-pc="<?=base_url(PATH_UPLOADS.'/slider/thumb/'.$slide['img']);?>"
			 data-slider-mobile="<?=base_url(PATH_UPLOADS.'/slider/thumb/'.$slide['mobile']);?>"></div>
			<? if($slide['show_text']) { ?>
			<div class="container container-<?=$slide['align'];?>">
				<div class="inner">
					<div class="description">
						<div class="title"><?=nl2br($slide['title']);?></div>
						<? if($slide['text']) { ?><div class="text"><?=nl2br($slide['text']);?></div><? } ?>
					</div>
					<? if($slide['btn'] != '') { ?>
					<div class="more">
						<span class="btn"><?=$slide['btn'];?></span>
					</div>
					<? } ?>
				</div>
			</div>
			<? } ?>
		<?=$tag_close;?>
	<? } ?>
	</div>
</section>

<script>
	$('#homeSlider').owlCarousel({
		loop: true,
		nav: true,
		items: 1,
		navText: ['<?=fa5s('angle-left');?>', '<?=fa5s('angle-right');?>'],
		dots: true,
		lazyLoad: true
	});

	$(function () {
		let attr = $(window).width() > 768
			? 'data-slider-pc'
			: 'data-slider-mobile';

		$('#homeSlider .image').each(function(){

			let bg = $(this).attr(attr);
			$(this)
				.css('background-image', 'url(' + bg + ')')
				.addClass('show');

		});
	});
</script>
