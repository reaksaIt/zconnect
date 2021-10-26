<!DOCTYPE html>
<html>
<head>
	<title>{{ $post->title }}</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1>{{ $post->title }}</h1>
				<img src="{{ Voyager::image( $post->image ) }}" style="width:100%">
				<p>{!! $post->body; !!}</p>
				<?php
					$galleries = json_decode($post->gallery);
					if($galleries):
					foreach( $galleries as $gall):

				?>

				<img src="{{ Voyager::image($gall)}}" alt="" style="width: 300px;height: 200px; object-fet:cover">
				<?php endforeach;endif; ?>
			</div>
		</div>
	</div>

</body>
</html>