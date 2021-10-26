@extends('head')
@section('content')
@include('banner')
@include('function.function')
<div class="page-about-us">
    <div class="container">
        <h1>Hellow World</h1>
        <h1>{{about("about_info")}}</h1>




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
                                    <img src="{{Voyager::image($reasons->image)}}" alt="">
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
</div>



@endsection