<?php  $banner = App\Banner::all(); ?>

@foreach($banner as $banners)
	<div class="banner">
		<?php
			$bann = json_decode($banners->banner_gallery);

		?>
		
		<div class="slide owl-carousel">
			<?php foreach($bann as $slide): ?>
				<div class="manage-slide">
					<img data-src="{{Voyager::image($slide)}}" alt="" class="img">
				</div>
			<?php endforeach;?>
		</div>
	</div>
	@endforeach