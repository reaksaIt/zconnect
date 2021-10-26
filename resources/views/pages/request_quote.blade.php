@extends('head')
@section('content')
@include('banner')
<div class="page-quote manage-section">
    <div class="container">
        <div class="quote">
            <div class="text-center">
                <h1>Request Quote</h1>
            </div>
            <form action="" id="formRequest">
                @csrf
                <div class="form-group">
                    <label for="">
                        Company Name or your name
                    </label>
                    <input type="text" class="form-control" autocomplete="off" placeholder="Company Name or Your Name" id="companyName" name="companyName">
                    <span class="text-danger" id="e_companyName"></span>
                </div>
                <div class="form-group">
                    <label for="" class="">Phone Number</label>
                    <input type="text" placeholder="Phone Number" class="form-control" id="phoneNumber" name="phoneNumber">
                    <span class="text-danger" id="e_phoneNumber"></span>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" placeholder="Email" autocomplete="off" class="form-control" id="email" name="email">
                    <span class="text-danger" id="e_email"></span>
                </div>
               
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" class="form-control" autocomplete="off" placeholder="Address" id="address" name="address">
                    <span class="text-danger" id="e_address"></span>
                </div>
                <div class="form-group">
                    <label for="">Brand of camera that we providing</label>
                    <select name="cameraBrand" id="cameraBrand" class="custom-select">
                        <option value="0">Select</option>
                        <?php
                            $camera_brand = App\CameraBrand::all();
                            foreach( $camera_brand as $brands):
                        ?>
                        <option value="{{$brands->brand_name}}">{{$brands->brand_name}}</option>
                       <?php   endforeach; ?>
                    </select>
                    <span class="text-danger" id="e_cameraBrand"></span>
                </div>
                <div class="form-group">
                    <label for="">How many megapixel of camera that you want?</label>
                    <div class="form-control">
                        <?php
                            $mp = App\PexelCamera::all();
                            foreach($mp as $mps):

                        ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="pexelCamera[]" type="checkbox" value="{{$mps->pexel_value}}">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{$mps->pexel_value}}
                            </label>
                        </div>
                        <?php endforeach; ?>
                        
                    </div>
                    <span class="text-danger" id="e_megapexelCamera"></span>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>MP</th>
                            <th>Amount Camera</th>
                            <th>Estimate Cable length</th>
                            <th>Remark</th>
                        </tr>
                    </thead>
                    <tbody id="mylist">

                    </tbody>
                </table>
            </form>
            <div class="btn-request text-center">
                <button type="button" class="btn btn-primary" id="requestQuote">Request</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#requestQuote').click(function(){
            

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


            var company_name = $.trim($('#companyName').val());
            var phone_number = $.trim($('#phoneNumber').val());
            var email = $.trim($('#email').val());
            var address = $.trim($('#address').val());
            var camera_brand = $('#cameraBrand').val();
            var cameraAmount = $('input[name="cameraAmount[]"]').val();
            console.log(cameraAmount);


            var camera_pexel = [];
            $('input:checkbox:checked').map(function(){
                camera_pexel.push($(this).val());
            })
            

           if(company_name!="" && validatePhone(phone_number)==true && validateEmail(email)==true && address!="" && camera_brand !=0 && camera_pexel!=0){
                $.ajax({
                    url:'/postRequest',
                    type:'POST',
                    dataType:'json',
                    data:$('#formRequest').serialize(),
                    success: function(response){
                        alert('Success');
                    }
                });
            }else{
                alert("some field is required");
            }
        })
    });
</script>   
@endsection