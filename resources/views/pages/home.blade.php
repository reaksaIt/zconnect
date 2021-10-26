@extends('head')
@section('content')
@include('banner')
@include('function.function')
<div class="page-home">
	<section class="manage-section">
		<div class="container">
			<div class="welcome">
				<div class="row">
					<div class="col-12 col-md-12 col-xl-6 order-sm-2 order-xl-1">
						<img data-src="{{ Voyager::image(setting('site.welcome_image'))}}" alt="" class="img">
					</div>
					<div class="col-12 col-md-12 col-xl-6 order-sm-1 order-xl-2">
						<h1 class="title" title="{{ setting('site.welcome_title')}}">{{setting('site.welcome_title')}}</h1>
						<p>{!! setting('site.welcome')!!}</p>
					</div>
				</div>
			</div>

		</div>
	</section>
	<section class="manage-section query-post">
		<div class="container qp-container">
			<div class="services">
				<div class="service-title text-center">
					<h2 class="title">We build technology to empower your business​</h2>
				</div>
				
				<div class="row">
					@foreach($posts as $post)
					<div class="col-12 col-md-6 col-xl-3 col-post pb-md-4">
						<div class="card card-post">
							<div class="card-head">
								<a href="/post/{{$post->slug}}">
									<img data-src="{{Voyager::image($post->image)}}" alt="" class="img">
								</a>
							</div>
							<div class="card-body">
								<h4 title="{{$post->seo_title}}">{{ $post->title}}</h4>
								<p>{{$post->excerpt}}</p>
							</div>
							<!-- <div class="card-footer">
								<div class="text-center">
									<a href="/post/{{$post->slug}}">
										<button class="btn-primary btn-sm">View More</button>
									</a>
								</div>
							</div> -->
						</div>
						
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
	<section class="manage-section section-reason">
		<div class="container reason-container">
			<div class="reason">
				<div class="title text-center">
					<h2>Top Reason Why Choose Us!</h2>
				</div>
				<div class="row">
					@php
						$reason = App\Reason::all();
						foreach($reason as $reasons):
					@endphp
					<div class="col-12 col-md-6 col-xl-3 pb-md-4">
						<div class="card">
							<div class="card-header">
								<img data-src="{{Voyager::image($reasons->image)}}" alt="" class="img">
							</div>
							<div class="card-body">
								<div class="text-center title-reason">
									<h3 class="h3-title">{{$reasons->title}}</h3>
								</div>
							</div>
						</div>
					</div>
						
					@php
						endforeach;
					@endphp
				</div>
			</div>
		</div>
	</section>
</div>
@endsection