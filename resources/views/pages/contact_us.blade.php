@extends('head')
@section('content')
@include('banner')
@include('function.function')
<div class="page-contact-us">
    <div class="container contact-container">
        <div class="contact manage-section">
            <div class="text-center">
                <h1>Get in touch</h1>
                <p>let's talk about your project</p>
            </div>
            <form action="" id="contact_form">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-4 col-xl-4">
                        <div class="form-group">
                            <label for="name">
                                Name
                            </label>
                            <input type="text" class="form-control" placeholder="Name" autocomplete="off" name="name" id="name">
                            <span id="e_name" class="text-warning"></span>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-xl-4">
                        <div class="form-group">
                            <label for="name">
                                Phone
                            </label>
                            <input type="text" class="form-control" placeholder="Phone" autocomplete="off" name="phone" id="phone">
                            <span id="e_phone" class="text-warning"></span>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-xl-4">
                        <div class="form-group">
                            <label for="email">
                                Email
                            </label>
                            <input type="text" class="form-control" placeholder="Email" autocomplete="off" name="email" id="email">
                            <span id="e_email" class="text-warning"></span>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-xl-12">
                        <div class="form-group">
                            <label for="message">
                                Message
                            </label>
                           <textarea name="message" id="message"  rows="6" placeholder="Message" class="form-control"></textarea>
                           <span id="e_message" class="text-warning"></span>
                        </div>
                    </div>
                </div>
            </form>
            <div class="text-center ">
                <button type="button" id="btn_message" class="btn-default btn-primary">
                    <span class="" id="spin" role="status" aria-hidden="true"></span>
                    <span id="send_value">
                        Send
                    </span>
               
                </button>
            </div>
            <div class="contact-info">
                <div class="text-center">
                    @if(setting('site.address'))
                    <div class="address">
                        <div class="con-title"><b>Address</b></div>
                        <p>{{setting('site.address')}}</p>
                    </div>
                    @endif
                    @if(setting('site.hotline'))
                    <div class="address">
                        <div class="con-title"><b>Hotline</b></div>
                        <p>{{setting('site.hotline')}}</p>
                    </div>
                    @endif
                    @if(setting('site.mobile_phone'))
                    <div class="address">
                        <div class="con-title"><b>Phone Number</b></div>
                        <p>{{setting('site.mobile_phone')}}</p>
                    </div>
                    @endif
                    @if(setting('site.email'))
                    <div class="address">
                        <div class="con-title"><b>Email</b></div>
                        <p>{{setting('site.email')}}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
    </div>
    <div class="map" class="mt-4">
        {!!setting('site.map')!!}
    </div>
</div>
<script>
    $(document).ready(function(){

        function validatePhone(phone) {
            var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
            if (filter.test(phone)) {
                return true;
            }
            else {
                return false;
            }
        };
        function validateEmail($email) {
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if(emailReg.test( $email )){
                return true;
            }
            else{
                return false;
            }
        };

        $('#btn_message').click(function(){
           
            var name = $.trim($('#name').val());
            var phone = $.trim($('#phone').val());
            var email = $('#email').val();
            var message = $('#message').val();

            if(name !="" && message!="" && validatePhone(phone) == true && validateEmail(email)== true){
                $('#send_value').text('Sending...');
                $('#spin').addClass('spinner-border spinner-border-sm mr-2');
                $.ajax({
                    url:'/send-mail',
                    type:'POST',
                    data: $('#contact_form').serialize(),
                    dataType:'json',
                    success:function(data){
                        if(data.sended){
                            $('#send_value').text('Send');
                            $('#spin').removeClass('spinner-border spinner-border-sm mr-2');
                            swal({
                                title:"Success",
                                icon:'success',
                                text:"Your message has sended",
                                timer: 2000,
                            })
                        }
                    }
                });
            }
            name ==""? $('#e_name').text('this field is required') :$('#e_name').text('')

            phone ==""? $('#e_phone').text('this field is required') : validatePhone(phone)==true? $('#e_phone').text('') : $('#e_phone').text('It is not phone number')

            email ==""? $('#e_email').text('this field is required') : validateEmail(email)==true? $('#e_email').text('') : $('#e_email').text('It is not Email')

            message ==""? $('#e_message').text('this field is required') : $('#e_message').text('')

        });
    })
</script>


@endsection