<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('asset/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/owlcarousel/owl.carousel.min.css')}}">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <link rel="stylesheet" href="{{asset('asset/style.css')}}">


   
   
    <script src="{{asset('asset/jquery/jquery-3.6.0.min.js')}}"></script>
</head>
<body>
    <div class="loader">
        <div id="loader_spinner">
            <div class="loader-spinner"></div>
        </div>
    </div>
    <header class="main-head">
        <div class="container">
            <div class="flex-menu">
                <div class="brand">
                    <div class="logo">
                        <a href="/">
                            <img class="img" data-src="{{Voyager::image(setting('site.logo'))}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="menu">
                    {{menu('main')}}
                </div>
                <div class="request-quote">
                    <a href="/request-quote" class="a-link">
                        <div class="quote">
                            Request Quote
                        </div>
                    </a>
                </div>
            </div>
            
        </div>
        
    </header>
    <div class="page-manager">
        <div class="yiel">
            @yield('content')
        </div>
    </div>

    <footer>
        <div class="manage-footer">
            <div class="power-by text-center">
                <div class="logo">
                    <a href="/">
                        <img src="{{Voyager::image(setting('site.logo'))}}" alt="" class="img">
                    </a>
                </div>
                <p class="copies-right">
                    Copyright© <?php echo date("Y"); ?> zconnect. All rights Reserved.
                </p>
            </div>
        </div>
    </footer>


    
    <script src="{{ asset('asset/owlcarousel/owl.carousel.min.js')}}"></script>    
   
    <script src="{{ asset('asset/lazyload/jquery.lazy.min.js') }}"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script src="{{ asset('asset/style.js')}}"></script>
    <script src="{{ asset('asset/bootstrap/bootstrap.min.js') }}"></script>
</body>

</html>