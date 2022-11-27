<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />


<style type="text/css">

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0; 
    font-family: Raleway, sans-serif;
}

body {
    background: linear-gradient(90deg, #C7C5F4, #776BCC);       
}

.container {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
}

.screen {       
    background: linear-gradient(90deg, #5D54A4, #7C78B8);       
    position: relative; 
    height: 600px;
    width: 360px;   
    box-shadow: 0px 0px 24px #5C5696;
}

.screen__content {
    z-index: 1;
    position: relative; 
    height: 100%;
}

.screen__background {       
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 0;
    -webkit-clip-path: inset(0 0 0 0);
    clip-path: inset(0 0 0 0);  
}

.screen__background__shape {
    transform: rotate(45deg);
    position: absolute;
}

.screen__background__shape1 {
    height: 520px;
    width: 520px;
    background: #FFF;   
    top: -50px;
    right: 120px;   
    border-radius: 0 72px 0 0;
}

.screen__background__shape2 {
    height: 220px;
    width: 220px;
    background: #6C63AC;    
    top: -172px;
    right: 0;   
    border-radius: 32px;
}

.screen__background__shape3 {
    height: 540px;
    width: 190px;
    background: linear-gradient(270deg, #5D54A4, #6A679E);
    top: -24px;
    right: 0;   
    border-radius: 32px;
}

.screen__background__shape4 {
    height: 400px;
    width: 200px;
    background: #7E7BB9;    
    top: 420px;
    right: 50px;    
    border-radius: 60px;
}

.login {
    width: 320px;
    padding: 30px;
    padding-top: 156px;
}

.login__field {
    padding: 20px 0px;  
    position: relative; 
}

.login__icon {
    position: absolute;
    top: 30px;
    color: #7875B5;
}

.login__input {
    border: none;
    border-bottom: 2px solid #D1D1D4;
    background: none;
    padding: 10px;
    padding-left: 24px;
    font-weight: 700;
    width: 63%;
    transition: .2s;
}

.login__input:active,
.login__input:focus,
.login__input:hover {
    outline: none;
    border-bottom-color: #6A679E;
}

.login__submit {
    background: #fff;
    font-size: 14px;
    margin-top: 30px;
    padding: 16px 20px;
    border-radius: 26px;
    border: 1px solid #D4D3E8;
    text-transform: uppercase;
    font-weight: 700;
    display: flex;
    align-items: center;
    width: 100%;
    color: #4C489D;
    box-shadow: 0px 2px 2px #5C5696;
    cursor: pointer;
    transition: .2s;
}

.login__submit:active,
.login__submit:focus,
.login__submit:hover {
    border-color: #6A679E;
    outline: none;
}

.button__icon {
    font-size: 24px;
    margin-left: auto;
    color: #7875B5;
}

.social-login { 
    position: absolute;
    height: 140px;
    width: 160px;
    text-align: center;
    bottom: 0px;
    right: 0px;
    color: #fff;
}

.social-icons {
    display: flex;
    align-items: center;
    justify-content: center;
}

.social-login__icon {
    padding: 20px 10px;
    color: #fff;
    text-decoration: none;  
    text-shadow: 0px 0px 8px #7875B5;
}

.social-login__icon:hover {
    transform: scale(1.5);  
}
.height-100{height: 100vh}.card{width: 400px;border: none;height: 300px;box-shadow: 0px 5px 20px 0px #6F1667;z-index: 1;display: flex;justify-content: center;align-items: center}.card h6{color: #6F1667;font-size: 20px}.inputs input{width: 40px;height: 40px}input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button{-webkit-appearance: none;-moz-appearance: none;appearance: none;margin: 0}.form-control:focus{box-shadow: none;border: 2px solid #6F1667}.validate{border-radius: 20px;height: 40px;background-color: #6F1667;border: 1px solid #6F1667;width: 100%}.content a{color:#D64F4F;transition: all 0.5s}.content a:hover{color: #6F1667}
</style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

</head>
<body>
  
    
       
<div class="container">
    <div class="screen">
        <div class="screen__content">
            <div class="login">
<!--                        method="POST" action="{{ route('login') }}" @csrf
 -->
                <div class="login__field">
                    <i class="login__icon fas fa-user"></i>
                    <select class="login__input" style="width: 35%;" id="code" placeholder="Telephone number">
                        @php 
                        $countries = App\Models\countries::where('stat',1)->get();
                        @endphp
                        @foreach($countries as $countrie)
                        <option value="{{ $countrie->phonecode }}">{{$countrie->name}}</option>
                        @endforeach
                    </select>
                    <input type="number" class="login__input" id="phone" placeholder="Telephone number">
                </div>
               
                <button class="button login__submit" id="btnSubmit">
                    <span class="button__text">Log In Now</span>
                    <i class="button__icon fas fa-chevron-right"></i>
                </button>               
    
            </div>
           
          
        </div>
        <div class="screen__background">
            <span class="screen__background__shape screen__background__shape4"></span>
            <span class="screen__background__shape screen__background__shape3"></span>      
            <span class="screen__background__shape screen__background__shape2"></span>
            <span class="screen__background__shape screen__background__shape1"></span>
        </div>      
    </div>
</div>

<div id="myModal1" class="modal " role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="    background: transparent;
    border: transparent;">
    <div id="app"> 
        <div class="container height-100 d-flex justify-content-center align-items-center"> 
        <div class="position-relative"> 
        <div class="card p-2 text-center"> 
        <h6>Please enter the one time password 
        <br> 
</h6> 
    <div> 

</div> 
    <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2"> 
         <input type="hidden" name="email" id="email">
        <input class="m-2 text-center form-control rounded" type="text" id="input1" v-on:keyup="inputenter(1)" maxlength="1" /> 
    <input class="m-2 text-center form-control rounded" v-on:keyup="inputenter(2)" type="text" id="input2" maxlength="1" /> 
    <input class="m-2 text-center form-control rounded" v-on:keyup="inputenter(3)" type="text" id="input3" maxlength="1" /> 
    <input class="m-2 text-center form-control rounded" v-on:keyup="inputenter(4)" type="text" id="input4" maxlength="1" /> 
</div> 
    <div class="mt-4"> 
        <button class="btn btn-danger px-4 validate" id="btnSubmit1" style="color: #000000!important;
    background-color: #C7C5F4!important;
    border-radius: 30px!important;
    -webkit-box-sizing: border-box!important;
    font-weight: 529!important;
    border: aliceblue;">Validate
    </button> 
</div> 
    <div class="mt-3 content d-flex justify-content-center align-items-center"> 
        <span>
    </span> 
    <a href="#" class="text-decoration-none ms-3">
    </a> 
</div> 
</div> 
</div>
</div> </div>
    </div>

  </div>
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js" type="text/javascript"></script>

<script type="text/javascript">
    

    $(document).ready(function() {
    $("#btnSubmit").click(function(){
       if($("#phone").val().length != 0){
        


  $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
 var phone = $("#phone").val();
  var code = $("#code").val();
  console.log(code)
 $.ajax({
        url: '{{ url('logins')}}',
        type: 'post',
        dataType: 'json',
        data: {
            phone :phone,
            code:code,
        },
        success: function(data) {
                 if(data.success){
                 
                    $("#email").val(data.email)
                       console.log(data);
                       $('#myModal1').show();


$('#email1').val(data.email);



                  
                 }
                 }
    });




       }
    }); 
    function closemodal(){
    
 
   $('#myModal1').hide();
   
  
 
}


    $("#btnSubmit1").click(function(){
       if($("#email").val() != null){
        


  $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
 var email = $("#email").val();
  var password = $("#input1").val()+$("#input2").val()+$("#input3").val()+$("#input4").val();
 $.ajax({
        url: '{{ route('login')}}',
        type: 'post',
        dataType: 'json',
        data: {
            password :password,
            email:email,
        },
        success: function(data) {
                   window.setTimeout(function(){location.reload()},2000);
                 }
    });




       }
    }); 
});


    var app = new Vue({
  el: '#app',
  methods: {
    inputenter(id) {

        const inputs = document.querySelectorAll('#otp > *[id]');
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].addEventListener('keydown', function(event) {
                if (event.key === "Backspace") {
                    inputs[i].value = '';
                    if (i !== 0) inputs[i - 1].focus();
                } else {
                    if (i === inputs.length - 1 && inputs[i].value !== '') {
                        return true;
                    } else if (event.keyCode > 47 && event.keyCode < 58) {
                        inputs[i].value = event.key;
                        if (i !== inputs.length - 1) inputs[i + 1].focus();
                        event.preventDefault();
                    } else if (event.keyCode > 64 && event.keyCode < 91) {
                        inputs[i].value = String.fromCharCode(event.keyCode);
                        if (i !== inputs.length - 1) inputs[i + 1].focus();
                        event.preventDefault();
                    }
                }
            });
        }

        }
  }
});
</script>

</body>
</html>

